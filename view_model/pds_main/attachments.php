<?php
$con = new mysqli("localhost:3307", "root", "1234", "pds_form");

// Check connection
if ($con->connect_error) {
    file_put_contents("debug_log.txt", " Database connection failed.\n", FILE_APPEND);
    die(json_encode(["success" => false, "error" => "Database connection failed."]));
}

// Ensure POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    file_put_contents("debug_log.txt", " Invalid request method.\n", FILE_APPEND);
    die(json_encode(["success" => false, "error" => "Invalid request method."]));
}

$personalInfoId = isset($_POST["personalInfoId"]) ? intval($_POST["personalInfoId"]) : 0;
if ($personalInfoId <= 0) {
    file_put_contents("debug_log.txt", " Invalid personalInfoId.\n", FILE_APPEND);
    die(json_encode(["success" => false, "error" => "Invalid personalInfoId."]));
}

// Log received files
file_put_contents("debug_log.txt", " Received Files: " . print_r($_FILES, true) . "\n", FILE_APPEND);

// Define upload directories
$uploadDir = "upload/";
$idDir = $uploadDir . "id/";
$signatureDir = $uploadDir . "signature/";
$swornDir = $uploadDir . "sworn/";

// Ensure folders exist
if (!is_dir($idDir)) mkdir($idDir, 0777, true);
if (!is_dir($signatureDir)) mkdir($signatureDir, 0777, true);
if (!is_dir($swornDir)) mkdir($swornDir, 0777, true);

function uploadFile($fileKey, $targetDir, $personalInfoId) {
    if (!isset($_FILES[$fileKey])) {
        file_put_contents("debug_log.txt", " No file uploaded for key: $fileKey\n", FILE_APPEND);
        return null;
    }

    if ($_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
        file_put_contents("debug_log.txt", " File upload error for $fileKey: " . $_FILES[$fileKey]['error'] . "\n", FILE_APPEND);
        return null;
    }

    $fileTmpPath = $_FILES[$fileKey]['tmp_name'];
    $fileExt = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
    $newFileName = "user" . $personalInfoId . "." . $fileExt;
    $destPath = $targetDir . $newFileName;

    file_put_contents("debug_log.txt", " Attempting to move file: $fileTmpPath to $destPath\n", FILE_APPEND);

    // Check if the temporary file exists
    if (!file_exists($fileTmpPath)) {
        file_put_contents("debug_log.txt", " Temporary file does not exist: $fileTmpPath\n", FILE_APPEND);
        return null;
    }

    // Attempt to move the file
    if (!move_uploaded_file($fileTmpPath, $destPath)) {
        file_put_contents("debug_log.txt", " move_uploaded_file() failed for $fileKey\n", FILE_APPEND);
        return null;
    }

    // Verify that the file was successfully saved
    if (!file_exists($destPath)) {
        file_put_contents("debug_log.txt", " File does not exist after move: $destPath\n", FILE_APPEND);
        return null;
    }

    file_put_contents("debug_log.txt", " File moved successfully: $destPath\n", FILE_APPEND);
    return $destPath;
}

// Process file uploads
$idPath = uploadFile("C4_Picture", $idDir, $personalInfoId);
$signaturePath = uploadFile("C4_Signature", $signatureDir, $personalInfoId);
$swornPath = uploadFile("Sworn_Sig", $swornDir, $personalInfoId);

// If any file upload failed, return an error **before** inserting into the database
if (!$idPath) file_put_contents("debug_log.txt", " ⚠️ ID Picture not uploaded.\n", FILE_APPEND);
if (!$signaturePath) file_put_contents("debug_log.txt", " ⚠️ Signature not uploaded.\n", FILE_APPEND);
if (!$swornPath) file_put_contents("debug_log.txt", " ⚠️ Sworn Signature not uploaded.\n", FILE_APPEND);


// Get text inputs
$giid = $_POST["GIID"] ?? "N/A";
$idLPNO = $_POST["ID_L_PNO"] ?? "N/A";
$dPoi = $_POST["D_PoI"] ?? "N/A";
$dateAccomplish = $_POST["date_Accomplish"] ?? "N/A";
$dateSworn = $_POST["dateSworn"] ?? "N/A";
$personAdminOath = $_POST["personAdminOath"] ?? "N/A";

// Prepare SQL query to insert data
$stmt = $con->prepare("
    INSERT INTO attachment 
    (personal_info_id, government_issued_id, id_license_passport_no, date_place_of_issuance, person_signature, date_accomplished, id_picture, subscribed_and_sworn_date, person_administering_oath, signature_of_person_administering_oath) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("isssssssss", $personalInfoId, $giid, $idLPNO, $dPoi, $signaturePath, $dateAccomplish, $idPath, $dateSworn, $personAdminOath, $swornPath);

// Execute query
if ($stmt->execute()) {
    file_put_contents("debug_log.txt", " Database insert successful. Insert ID: " . $con->insert_id . "\n", FILE_APPEND);
    echo json_encode(["success" => true, "id" => $con->insert_id]);
} else {
    file_put_contents("debug_log.txt", " Database insert failed: " . $stmt->error . "\n", FILE_APPEND);
    echo json_encode(["success" => false, "error" => "Database insert failed: " . $stmt->error]);
}

$stmt->close();
$con->close();
?>
