<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = new mysqli("localhost:3307", "root", "1234", "pds_form");

if ($con->connect_error) {
    file_put_contents("debug_log.txt", " ❌ Database connection failed.\n", FILE_APPEND);
    die(json_encode(["success" => false, "error" => "Database connection failed."]));
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    file_put_contents("debug_log.txt", " ❌ Invalid request method.\n", FILE_APPEND);
    die(json_encode(["success" => false, "error" => "Invalid request method."]));
}

$personalInfoId = isset($_POST["personalInfoId"]) ? intval($_POST["personalInfoId"]) : 0;
if ($personalInfoId <= 0) {
    file_put_contents("debug_log.txt", " ❌ Invalid personalInfoId.\n", FILE_APPEND);
    die(json_encode(["success" => false, "error" => "Invalid personalInfoId."]));
}

file_put_contents("debug_log.txt", " 📂 Received Files: " . print_r($_FILES, true) . "\n", FILE_APPEND);
file_put_contents("debug_log.txt", " 📝 Received POST: " . print_r($_POST, true) . "\n", FILE_APPEND); // Full POST dump

$uploadDir = "upload/";
$idDir = $uploadDir . "id/";
$signatureDir = $uploadDir . "signature/";
$swornDir = $uploadDir . "sworn/";

if (!is_dir($idDir)) mkdir($idDir, 0777, true);
if (!is_dir($signatureDir)) mkdir($signatureDir, 0777, true);
if (!is_dir($swornDir)) mkdir($swornDir, 0777, true);

function uploadFile($fileKey, $targetDir, $personalInfoId) {
    if (
        isset($_FILES[$fileKey]) &&
        is_uploaded_file($_FILES[$fileKey]['tmp_name']) &&
        $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK &&
        $_FILES[$fileKey]['size'] > 0
    ) {
        $fileTmpPath = $_FILES[$fileKey]['tmp_name'];
        $fileExt = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        $newFileName = "user" . $personalInfoId . "_" . uniqid() . "." . $fileExt;
        $destPath = $targetDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            return $destPath;
        }
    }
    return false;
}

// 🔁 Try to upload files
$idPath = uploadFile("C4_Picture", $idDir, $personalInfoId);
$signaturePath = uploadFile("C4_Signature", $signatureDir, $personalInfoId);
$swornPath = uploadFile("Sworn_Sig", $swornDir, $personalInfoId);

// ✅ Check hidden inputs for existing file paths if no new file
$idPath = $idPath ?: ($_POST["existing_C4_Picture"] ?? false);
$signaturePath = $signaturePath ?: ($_POST["existing_C4_Signature"] ?? false);
$swornPath = $swornPath ?: ($_POST["existing_Sworn_Sig"] ?? false);

// 📝 Log file fallback logic
file_put_contents("debug_log.txt", " 📄 Final ID Path: " . ($idPath ?: "❌ NONE") . "\n", FILE_APPEND);
file_put_contents("debug_log.txt", " ✍️ Final Signature Path: " . ($signaturePath ?: "❌ NONE") . "\n", FILE_APPEND);
file_put_contents("debug_log.txt", " 📜 Final Sworn Path: " . ($swornPath ?: "❌ NONE") . "\n", FILE_APPEND);

$giid = $_POST["GIID"] ?? "N/A";
$idLPNO = $_POST["ID_L_PNO"] ?? "N/A";
$dPoi = $_POST["D_PoI"] ?? "N/A";
$dateAccomplish = $_POST["date_Accomplish"] ?? "N/A";
$dateSworn = $_POST["dateSworn"] ?? "N/A";
$personAdminOath = $_POST["personAdminOath"] ?? "N/A";

// 🧾 Log text inputs
file_put_contents("debug_log.txt", " 🧾 GIID: $giid | ID_L_PNO: $idLPNO | D_PoI: $dPoi | Date Accomplish: $dateAccomplish | Sworn: $dateSworn | Admin Oath: $personAdminOath\n", FILE_APPEND);

// Build INSERT
$columns = ["personal_info_id", "government_issued_id", "id_license_passport_no", "date_place_of_issuance", "date_accomplished", "subscribed_and_sworn_date", "person_administering_oath"];
$values = [$personalInfoId, $giid, $idLPNO, $dPoi, $dateAccomplish, $dateSworn, $personAdminOath];
$placeholders = array_fill(0, count($values), "?");

if ($signaturePath !== false) {
    $columns[] = "person_signature";
    $placeholders[] = "?";
    $values[] = $signaturePath;
}
if ($idPath !== false) {
    $columns[] = "id_picture";
    $placeholders[] = "?";
    $values[] = $idPath;
}
if ($swornPath !== false) {
    $columns[] = "signature_of_person_administering_oath";
    $placeholders[] = "?";
    $values[] = $swornPath;
}

$sql = "INSERT INTO attachment (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $placeholders) . ")";
$stmt = $con->prepare($sql);

$types = "";
foreach ($values as $val) {
    $types .= is_int($val) ? "i" : "s";
}

// 🧪 Final log of values being inserted
file_put_contents("debug_log.txt", " 🛠 Bind Types: $types | Values: " . print_r($values, true) . "\n", FILE_APPEND);

$stmt->bind_param($types, ...$values);

if ($stmt->execute()) {
    file_put_contents("debug_log.txt", " ✅ Database insert successful. Insert ID: " . $con->insert_id . "\n", FILE_APPEND);
    echo json_encode(["success" => true, "id" => $con->insert_id]);
} else {
    file_put_contents("debug_log.txt", " ❌ Database insert failed: " . $stmt->error . "\n", FILE_APPEND);
    echo json_encode(["success" => false, "error" => "Database insert failed: " . $stmt->error]);
}

$stmt->close();
$con->close();
