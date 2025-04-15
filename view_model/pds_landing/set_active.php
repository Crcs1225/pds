<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'] ?? null;
$pds_id = $data['pds_id'] ?? null;



$conn = new mysqli("localhost:3307", "root", "1234", "pds_form");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "DB connection failed"]);
    exit;
}

// Set all to inactive
$conn->query("UPDATE personal_information SET status = 'inactive' WHERE user_id = " . intval($user_id));

// Set selected one to active
$stmt = $conn->prepare("UPDATE personal_information SET status = 'active' WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $pds_id, $user_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update status"]);
}

$stmt->close();
$conn->close();
?>
