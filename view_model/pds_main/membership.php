<?php
ob_start();
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = new mysqli("localhost:3307", "root", "1234", "pds_form");

// Read raw JSON input
$json_data = file_get_contents("php://input");

// Log the raw input for debugging
file_put_contents("debug_log.txt", "Raw input:\n" . $json_data . "\n", FILE_APPEND);

// Check if data was received
if ($json_data === false || empty($json_data)) {
    echo json_encode(["success" => false, "error" => "No input data received"]);
    exit;
}

// Decode JSON
$data = json_decode($json_data, true);

// Check for JSON decoding errors or missing 'membership' field
if ($data === null || !isset($data['membership'])) {
    echo json_encode(["success" => false, "error" => "Invalid JSON format or missing 'membership' field"]);
    exit;
}

$membershipRecords = $data['membership'];

$insertedIds = [];
$errors = [];

// Loop through each recognition entry
foreach ($membershipRecords as $entry) {
    // Extract values, with fallback defaults
    $personal_info_id = $entry['personal_info_id'] ?? null;
    $organization_name = $entry['value'] ?? 'N/A';
    

    // Validate personal_info_id
    if (!$personal_info_id) {
        $errors[] = "Missing personal_info_id for one of the civil service entries.";
        continue;
    }

    // Validate if personal_info_id exists in personal_information table
    $checkStmt = $con->prepare("SELECT id FROM personal_information WHERE id = ?");
    $checkStmt->bind_param("i", $personal_info_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows === 0) {
        $errors[] = "Invalid personal_info_id: $personal_info_id";
        $checkStmt->close();
        continue;
    }
    $checkStmt->close();

    // Insert into database
    $stmt = $con->prepare("INSERT INTO memberships (personal_info_id, organization_name) 
        VALUES (?, ?)");

    if (!$stmt) {
        $errors[] = "SQL prepare failed: " . $con->error;
        continue;
    }

    $stmt->bind_param("is", $personal_info_id, $organization_name);

    if ($stmt->execute()) {
        $insertedIds[] = $stmt->insert_id;
    } else {
        $errors[] = "SQL execute failed: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();

// Return response
$response = ["success" => empty($errors), "inserted_ids" => $insertedIds];
if (!empty($errors)) {
    $response["errors"] = $errors;
}

echo json_encode($response);
?>
