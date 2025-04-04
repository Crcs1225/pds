<?php
require 'config.php';

// Database connection
$con = new mysqli("localhost:3307", "root", "1234", "pds_form");

// Check for connection errors
if ($con->connect_error) {
    die(json_encode(["success" => false, "error" => "Database connection failed: " . $con->connect_error]));
}

// Validate the ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die(json_encode(["success" => false, "error" => "Invalid request."]));
}

$id = intval($_GET['id']); // Convert ID to integer

// Use a prepared statement to prevent SQL injection
$stmt = $con->prepare("DELETE FROM personalInfo WHERE id = ?");
$stmt->bind_param("i", $id);
$success = $stmt->execute();

// Check if delete was successful
if ($success) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to delete record."]);
}

// Close resources
$stmt->close();
$con->close();
?>
