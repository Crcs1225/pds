<?php

header("Content-Type: application/json");

try {
    // Read raw POST data
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['user_id']) || !is_numeric($input['user_id'])) {
        echo json_encode(["success" => false, "error" => "Invalid request."]);
        exit;
    }

    $id = intval($input['user_id']);

    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=pds_form", "root", "1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Get file paths
    $stmt = $pdo->prepare("SELECT id_picture, person_signature, signature_of_person_administering_oath FROM attachment WHERE personal_info_id = ?");
    $stmt->execute([$id]);
    $paths = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($paths) {
        foreach ($paths as $filePath) {
            if (!empty($filePath)) {
                $fullPath = __DIR__ . '/' . $filePath;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }
    }

    // 2. Delete from main table
    $deleteStmt = $pdo->prepare("DELETE FROM personal_information WHERE id = ?");
    $success = $deleteStmt->execute([$id]);

    if ($success) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to delete record."]);
    }

} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => "Database error: " . $e->getMessage()]);
}
?>