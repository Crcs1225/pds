<?php
ob_start(); // Start output buffering
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
$data = array_change_key_case($data, CASE_LOWER);

// Check for JSON decoding errors
if ($data === null) {
    echo json_encode(["success" => false, "error" => "Invalid JSON format"]);
    exit;
}

// Assign values with default values to prevent NULL errors
$personal_info_id = $data['personal_info_id'] ?? null; // Required foreign key
$spouse_surname = $data['spouse_surname'] ?? 'N/A';
$spouse_firstname = $data['spouse_firstname'] ?? 'N/A';
$spouse_middlename = $data['spouse_middlename'] ?? 'N/A';
$spouse_name_extension = $data['spouse_name_extension'] ?? '';
$spouse_occupation = $data['spouse_occupation'] ?? 'N/A';
$spouse_employer = $data['spouse_employer'] ?? 'N/A';
$spouse_business_address = $data['spouse_business_address'] ?? 'N/A';
$spouse_telephone_no = $data['spouse_telephone_no'] ?? 'N/A';

$father_surname = $data['father_surname'] ?? 'N/A';
$father_firstname = $data['father_firstname'] ?? 'N/A';
$father_middlename = $data['father_middlename'] ?? 'N/A';
$father_name_extension = $data['father_name_extension'] ?? '';

$mother_maiden_name = $data['mother_maiden_name'] ?? 'N/A';
$mother_surname = $data['mother_surname'] ?? 'N/A';
$mother_firstname = $data['mother_firstname'] ?? 'N/A';
$mother_middlename = $data['mother_middlename'] ?? 'N/A';

// Ensure `personal_info_id` exists in `personal_information` table
$checkStmt = $con->prepare("SELECT id FROM personal_information WHERE id = ?");
$checkStmt->bind_param("i", $personal_info_id);
$checkStmt->execute();
$result = $checkStmt->get_result();
if ($result->num_rows === 0) {
    echo json_encode(["success" => false, "error" => "Invalid personal_info_id"]);
    exit;
}
$checkStmt->close();

// Prepare SQL Statement (Ensure placeholders match exactly)
$stmt = $con->prepare("INSERT INTO family_background (
    personal_info_id, spouse_surname, spouse_firstname, spouse_middlename, spouse_name_extension, 
    spouse_occupation, spouse_employer, spouse_business_address, spouse_telephone_no, 
    father_surname, father_firstname, father_middlename, father_name_extension, 
    mother_maiden_name, mother_surname, mother_firstname, mother_middlename, 
    created_at, updated_at
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

if (!$stmt) {
    echo json_encode(["success" => false, "error" => "SQL prepare failed: " . $con->error]);
    exit;
}

// Corrected bind_param() (Matching number of placeholders and variables)
$stmt->bind_param("issssssssssssssss", 
    $personal_info_id, $spouse_surname, $spouse_firstname, $spouse_middlename, $spouse_name_extension, 
    $spouse_occupation, $spouse_employer, $spouse_business_address, $spouse_telephone_no, 
    $father_surname, $father_firstname, $father_middlename, $father_name_extension, 
    $mother_maiden_name, $mother_surname, $mother_firstname, $mother_middlename
);

if (!$stmt->execute()) {
    echo json_encode(["success" => false, "error" => "SQL execute failed: " . $stmt->error]);
    exit;
}

// Success response
echo json_encode(["success" => true, "message" => "Family background inserted successfully", "id" => $stmt->insert_id]);

$stmt->close();
$con->close();
?>
