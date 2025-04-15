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

ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Required fields validation
$required_fields = ['surname', 'firstname', 'dateofbirth', 'sex', 'mobilenumber'];


foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode(["success" => false, "error" => "Missing required field: $field"]);
        exit;
    }
}

// Assign values with default values to prevent NULL errors
$cs_id_no = $data['cs_id_no'];
$pds_name = $data['pds_name'];
$user_id = $data['user_id']; 
$surname = $data['surname'];
$firstname = $data['firstname'];
$middle_name = $data['middlename'];
$name_extension = $data['nameextension'];
$date_of_birth = $data['dateofbirth'];
$place_of_birth = $data['placeofbirth'];
$sex = $data['sex'];
$civil_status = $data['civilstatus'];
$height = $data['height'];
$weight = $data['weight'];
$bloodtype = $data['bloodtype'];
$gsis_no = $data['gsis'];
$pagibig_no = $data['pagibig'];
$philhealth_no = $data['philhealth'];
$sss_no = $data['sss'];
$tin_no = $data['tin'];
$agency_employee_no = $data['agencyno'];
$citizenship = $data['citizenship1'];
$dual_citizenship = $data['citizenship2'];
$country = $data['dualcountry'];

// Prevent NULL errors for address fields
$res_house_no = $data['reshouse_block_lotno'];
$res_street = $data['resstreet'];
$res_subdivision = $data['ressubdivision_village'];
$res_barangay = $data['resbarangay'];
$res_city = $data['rescity_municipality'];
$res_province = $data['resprovince'];
$res_zip = $data['reszipcode'];

$perm_house_no = $data['perhouse_block_lotno'];
$perm_street = $data['perstreet'];
$perm_subdivision = $data['persubdivision_village'];
$perm_barangay = $data['perbarangay'];
$perm_city = $data['percity_municipality'];
$perm_province = $data['perprovince'];
$perm_zip = $data['perzipcode'];

// Prevent NULL errors for contact fields
$telephone_no = $data['telephonenumber'];
$mobile_no = $data['mobilenumber'];
$email = $data['emailadd'];

// Prepare SQL Statement
$stmt = $con->prepare("INSERT INTO personal_information (
    pds_name, user_id, cs_id_no, surname, firstname, middle_name, name_extension, date_of_birth, place_of_birth, sex, civil_status, 
    height, weight, bloodtype, gsis_no, pagibig_no, philhealth_no, sss_no, tin_no, agency_employee_no, 
    citizenship, dual_citizenship, country, res_house_no, res_street, res_subdivision, res_barangay, res_city, 
    res_province, res_zip, perm_house_no, perm_street, perm_subdivision, perm_barangay, perm_city, perm_province, 
    perm_zip, telephone_no, mobile_no, email, created_at, updated_at
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

if (!$stmt) {
    echo json_encode(["success" => false, "error" => "SQL prepare failed: " . $con->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssss", 
    $pds_name, $user_id, $cs_id_no, $surname, $firstname, $middle_name, $name_extension, $date_of_birth, $place_of_birth, $sex, $civil_status, 
    $height, $weight, $bloodtype, $gsis_no, $pagibig_no, $philhealth_no, $sss_no, $tin_no, $agency_employee_no, 
    $citizenship, $dual_citizenship, $country, $res_house_no, $res_street, $res_subdivision, $res_barangay, $res_city, 
    $res_province, $res_zip, $perm_house_no, $perm_street, $perm_subdivision, $perm_barangay, $perm_city, $perm_province, 
    $perm_zip, $telephone_no, $mobile_no, $email
);

if (!$stmt->execute()) {
    echo json_encode(["success" => false, "error" => "SQL execute failed: " . $stmt->error]);
    exit;
}

// Success response
echo json_encode(["success" => true, "message" => "Record inserted successfully", "id" => $stmt->insert_id]);

$stmt->close();
$con->close();
?>
