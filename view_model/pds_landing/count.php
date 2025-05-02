<?php
header('Content-Type: application/json');

try {
    // Connect to database using PDO
    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=pds_form", "root", "1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['allowed' => false, 'error' => 'DB connection failed']);
    exit;
}

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'] ?? null;

// Temporary fallback for testing
if (!$user_id) {
    $user_id = 1;
}

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM personal_information WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['total'] < 5) {
        echo json_encode(['allowed' => true]);
    } else {
        echo json_encode(['allowed' => false]);
    }
} catch (PDOException $e) {
    echo json_encode(['allowed' => false, 'error' => 'Query failed']);
}
