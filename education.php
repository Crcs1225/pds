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

// Check for JSON decoding errors
if ($data === null || !isset($data['education'])) {
    echo json_encode(["success" => false, "error" => "Invalid JSON format or missing 'education' field"]);
    exit;
}

$educationRecords = $data['education'];

$insertedIds = [];
$errors = [];

// Loop through each education entry
foreach ($educationRecords as $education) {
    // Extract values, with fallback defaults
    $personal_info_id = $education['personal_info_id'] ?? null;
    $educ_level = $education['level'] ?? 'N/A';
    $name_of_school = $education['elemName'] ?? $education['secondName'] ?? $education['vocName'] ?? $education['colName'] ?? $education['gradName'] ?? 'N/A';
    $basic_education_degree_course = $education['elemBasicEduc'] ?? $education['secondBasicEduc'] ?? $education['vocCourse'] ?? $education['colCourse'] ?? $education['gradCourse'] ?? 'N/A';
    $from_year = $education['elemFrom'] ?? $education['secondFrom'] ?? $education['vocFrom'] ?? $education['colFrom'] ?? $education['gradFrom'] ?? 'N/A';
    $to_year = $education['elemTo'] ?? $education['secondTo'] ?? $education['vocTo'] ?? $education['colTo'] ?? $education['gradTo'] ?? 'N/A';
    $highest_level_units_earned = $education['elemUnits'] ?? $education['secondUnits'] ?? $education['vocUnits'] ?? $education['colUnits'] ?? $education['gradUnits'] ?? 'N/A';
    $year_graduated = $education['elemYrGrad'] ?? $education['secondYrGrad'] ?? $education['vocYrGrad'] ?? $education['colYrGrad'] ?? $education['gradYrGrad'] ?? 'N/A';
    $scholarship_academic_honors_received = $education['elemHonors'] ?? $education['secondHonors'] ?? $education['vocHonors'] ?? $education['colHonors'] ?? $education['gradHonors'] ?? 'N/A';

    // Validate personal_info_id
    if (!$personal_info_id) {
        $errors[] = "Missing personal_info_id for one of the entries.";
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
    $stmt = $con->prepare("INSERT INTO educational_background (
        personal_info_id, educ_level, name_of_school, basic_education_degree_course, 
        from_year, to_year, highest_level_units_earned, year_graduated, 
        scholarship_academic_honors_received) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        $errors[] = "SQL prepare failed: " . $con->error;
        continue;
    }

    $stmt->bind_param("issssssss",
        $personal_info_id, $educ_level, $name_of_school, $basic_education_degree_course,
        $from_year, $to_year, $highest_level_units_earned, $year_graduated, 
        $scholarship_academic_honors_received
    );

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
