<?php
header("Content-Type: application/json");

$con = new mysqli("localhost:3307", "root", "1234", "pds_form");
if ($con->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['action']) || $input['action'] !== 'delete' || !isset($input['id'])) {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
    exit;
}

$id = (int)$input['id'];

$stmt = $con->prepare("DELETE FROM personal_information WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Record deleted successfully"]);
} else {
    echo json_encode(["success" => false, "error" => "Delete failed: " . $stmt->error]);
}

$stmt->close();
$con->close();
