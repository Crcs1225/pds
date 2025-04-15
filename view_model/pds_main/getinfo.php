<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=pds_form", "root", "1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(['success' => false, 'error' => 'Missing ID']);
    exit;
}

try {
    // 1. Personal Information
    $stmt = $pdo->prepare("SELECT * FROM personal_information WHERE id = ?");
    $stmt->execute([$id]);
    $personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$personalInfo) {
        echo json_encode(['success' => false, 'error' => 'No data found.']);
        exit;
    }

    // 2. Fetch other related tables using personal_info_id
    $tables = [
        'family_background',
        'children',
        'educational_background',
        'civil_service_eligibility',
        'work_experience',
        'voluntary_work',
        'learning_and_development',
        'special_skills_hobbies',
        'non_academic_distinctions',
        'memberships',
        'survey_responses',
        'reference',
        'attachment'
    ];

    $result = ['success' => true, 'info' => $personalInfo];

    foreach ($tables as $table) {
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE personal_info_id = ?");
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result[$table] = $rows;
    }

    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
