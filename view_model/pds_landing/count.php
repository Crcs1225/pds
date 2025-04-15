<?php
header('Content-Type: application/json');


$conn = new mysqli("localhost:3307", "root", "1234", "pds_form");

// Check connection
if ($conn->connect_error) {
    echo json_encode(['allowed' => false, 'error' => 'DB connection failed']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'] ?? null;

// For testing (until session or link passes user_id)
if (!$user_id) {
    $user_id = 1; // fallback for now
}

// Count how many records this user has in personal_information
$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM personal_information WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();
$conn->close();

// Allow if less than 5
if ($result['total'] < 5) {
    echo json_encode(['allowed' => true]);
} else {
    echo json_encode(['allowed' => false]);
}
?>
