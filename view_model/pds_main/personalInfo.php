<?php
ob_start(); // Start output buffering
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
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

// Required fields validation
$required_fields = ['surname', 'firstname', 'dateofbirth', 'sex', 'mobilenumber'];
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode(["success" => false, "error" => "Missing required field: $field"]);
        exit;
    }
}

// Assign values (with default nulls to prevent undefined index warnings)
$id = isset($data['id']) ? $data['id'] : null;
$cs_id_no = $data['cs_id_no'] ?? null;
$pds_name = $data['pds_name'] ?? null;
$user_id = $data['user_id'] ?? null;
$surname = $data['surname'] ?? null;
$firstname = $data['firstname'] ?? null;
$middle_name = $data['middlename'] ?? null;
$name_extension = $data['nameextension'] ?? null;
$date_of_birth = $data['dateofbirth'] ?? null;
$place_of_birth = $data['placeofbirth'] ?? null;
$sex = $data['sex'] ?? null;
$civil_status = $data['civilstatus'] ?? null;
$height = $data['height'] ?? null;
$weight = $data['weight'] ?? null;
$bloodtype = $data['bloodtype'] ?? null;
$gsis_no = $data['gsis'] ?? null;
$pagibig_no = $data['pagibig'] ?? null;
$philhealth_no = $data['philhealth'] ?? null;
$sss_no = $data['sss'] ?? null;
$tin_no = $data['tin'] ?? null;
$agency_employee_no = $data['agencyno'] ?? null;
$citizenship = $data['citizenship1'] ?? null;
$dual_citizenship = $data['citizenship2'] ?? null;
$country = $data['dualcountry'] ?? null;

$res_house_no = $data['reshouse_block_lotno'] ?? null;
$res_street = $data['resstreet'] ?? null;
$res_subdivision = $data['ressubdivision_village'] ?? null;
$res_barangay = $data['resbarangay'] ?? null;
$res_city = $data['rescity_municipality'] ?? null;
$res_province = $data['resprovince'] ?? null;
$res_zip = $data['reszipcode'] ?? null;

$perm_house_no = $data['perhouse_block_lotno'] ?? null;
$perm_street = $data['perstreet'] ?? null;
$perm_subdivision = $data['persubdivision_village'] ?? null;
$perm_barangay = $data['perbarangay'] ?? null;
$perm_city = $data['percity_municipality'] ?? null;
$perm_province = $data['perprovince'] ?? null;
$perm_zip = $data['perzipcode'] ?? null;

$telephone_no = $data['telephonenumber'] ?? null;
$mobile_no = $data['mobilenumber'] ?? null;
$email = $data['emailadd'] ?? null;

// Determine if it's create or edit mode
$is_edit = !empty($id);

// Build SQL and bind params accordingly
if ($is_edit) {
    // ID provided — insert with ID (if you intend to override or use custom IDs)
    $stmt = $con->prepare("INSERT INTO personal_information (
        id, pds_name, user_id, cs_id_no, surname, firstname, middle_name, name_extension, date_of_birth, place_of_birth, sex, civil_status,
        height, weight, bloodtype, gsis_no, pagibig_no, philhealth_no, sss_no, tin_no, agency_employee_no,
        citizenship, dual_citizenship, country, res_house_no, res_street, res_subdivision, res_barangay, res_city,
        res_province, res_zip, perm_house_no, perm_street, perm_subdivision, perm_barangay, perm_city, perm_province,
        perm_zip, telephone_no, mobile_no, email, created_at, updated_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

    if (!$stmt) {
        echo json_encode(["success" => false, "error" => "SQL prepare failed: " . $con->error]);
        exit;
    }

    $stmt->bind_param("issssssssssssssssssssssssssssssssssssssss",
        $id, $pds_name, $user_id, $cs_id_no, $surname, $firstname, $middle_name, $name_extension, $date_of_birth, $place_of_birth, $sex, $civil_status,
        $height, $weight, $bloodtype, $gsis_no, $pagibig_no, $philhealth_no, $sss_no, $tin_no, $agency_employee_no,
        $citizenship, $dual_citizenship, $country, $res_house_no, $res_street, $res_subdivision, $res_barangay, $res_city,
        $res_province, $res_zip, $perm_house_no, $perm_street, $perm_subdivision, $perm_barangay, $perm_city, $perm_province,
        $perm_zip, $telephone_no, $mobile_no, $email
    );

} else {
    // No ID — use auto-increment
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

    $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssss",
        $pds_name, $user_id, $cs_id_no, $surname, $firstname, $middle_name, $name_extension, $date_of_birth, $place_of_birth, $sex, $civil_status,
        $height, $weight, $bloodtype, $gsis_no, $pagibig_no, $philhealth_no, $sss_no, $tin_no, $agency_employee_no,
        $citizenship, $dual_citizenship, $country, $res_house_no, $res_street, $res_subdivision, $res_barangay, $res_city,
        $res_province, $res_zip, $perm_house_no, $perm_street, $perm_subdivision, $perm_barangay, $perm_city, $perm_province,
        $perm_zip, $telephone_no, $mobile_no, $email
    );
}

// Execute statement
if (!$stmt->execute()) {
    echo json_encode(["success" => false, "error" => "SQL execute failed: " . $stmt->error]);
    exit;
}

// Success response
echo json_encode([
    "success" => true,
    "message" => "Record inserted successfully",
    "id" => $is_edit ? $id : $stmt->insert_id
]);

$stmt->close();
$con->close();
?>
