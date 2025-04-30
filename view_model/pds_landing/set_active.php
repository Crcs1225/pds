<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'] ?? null;
$pds_id = $data['pds_id'] ?? null;

if (!$user_id || !$pds_id) {
    echo json_encode(["success" => false, "message" => "Missing user_id or pds_id"]);
    exit;
}

try {
    // Connect using PDO
    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=pds_form", "root", "1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set all personal_information to inactive for the user
    $stmt1 = $pdo->prepare("UPDATE personal_information SET status = 'inactive' WHERE user_id = :user_id");
    $stmt1->execute([':user_id' => $user_id]);

    // Set the selected PDS record to active
    $stmt2 = $pdo->prepare("UPDATE personal_information SET status = 'active' WHERE id = :pds_id AND user_id = :user_id");
    $stmt2->execute([
        ':pds_id' => $pds_id,
        ':user_id' => $user_id
    ]);

    echo json_encode(["success" => true]);

} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "DB Error: " . $e->getMessage()]);
}
?>
