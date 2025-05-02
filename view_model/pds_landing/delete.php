<?php
header("Content-Type: application/json");

// Connect using PDO
try {
    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=pds_form", "root", "1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}

// Decode incoming JSON
$input = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($input['action']) || $input['action'] !== 'delete' || !isset($input['id'])) {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
    exit;
}

$id = (int)$input['id'];

try {
    // Get image paths before deletion
    $stmt = $pdo->prepare("SELECT id_picture, person_signature, signature_of_person_administering_oath FROM attachment WHERE personal_info_id = :id");
    $stmt->execute([':id' => $id]);
    $images = $stmt->fetch(PDO::FETCH_ASSOC);

    // Delete files if they exist
    if ($images) {
        $uploadBaseDir = realpath(__DIR__ . '/../pds_main/upload');// Adjust based on your folder structure

        foreach ($images as $filePath) {
            if (!empty($filePath)) {
                $relativePath = str_replace("upload/", "", $filePath);
                $fullPath = $uploadBaseDir . '/' . $relativePath;

                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }
    }

    // Delete from personal_information (assuming ON DELETE CASCADE for related tables)
    $stmt = $pdo->prepare("DELETE FROM personal_information WHERE id = :id");
    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount()) {
        echo json_encode(["success" => true, "message" => "Record and files deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "error" => "No record found with that ID"]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => "Delete failed: " . $e->getMessage()]);
}
