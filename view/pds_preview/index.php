<?php
require_once 'vendor/autoload.php';
use setasign\Fpdi\Fpdi;
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

try {
    $conn = new mysqli("localhost:3307", "root", "1234", "pds_form");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        throw new Exception("No user ID provided.");
    }

    // Fetch data from tables
    $personalInfoQuery = "SELECT * FROM personal_information WHERE id = ?";
    $stmtPersonalInfo = $conn->prepare($personalInfoQuery);
    $stmtPersonalInfo->bind_param("i", $id);
    $stmtPersonalInfo->execute();
    $personalInfoResult = $stmtPersonalInfo->get_result();
    $personalInfo = $personalInfoResult->fetch_assoc();

    $familyBackgroundQuery = "SELECT * FROM family_background WHERE personal_info_id = ?";
    $stmtFamilyBackground = $conn->prepare($familyBackgroundQuery);
    $stmtFamilyBackground->bind_param("i", $id);
    $stmtFamilyBackground->execute();
    $familyBackgroundResult = $stmtFamilyBackground->get_result();
    $familyBackground = $familyBackgroundResult->fetch_assoc();

    $childrenQuery = "SELECT * FROM children WHERE personal_info_id = ?";
    $stmtChildren = $conn->prepare($childrenQuery);
    $stmtChildren->bind_param("i", $id);
    $stmtChildren->execute();
    $childrenResult = $stmtChildren->get_result();
    $children = $childrenResult->fetch_all(MYSQLI_ASSOC);

    $educationalBackgroundQuery = "SELECT * FROM educational_background WHERE personal_info_id = ?";
    $stmtEducationalBackground = $conn->prepare($educationalBackgroundQuery);
    $stmtEducationalBackground->bind_param("i", $id);
    $stmtEducationalBackground->execute();
    $educationalBackgroundResult = $stmtEducationalBackground->get_result();
    $educationalBackground = $educationalBackgroundResult->fetch_all(MYSQLI_ASSOC);

    $civilServiceEligibilityQuery = "SELECT * FROM civil_service_eligibility WHERE personal_info_id = ?";
    $stmtCivilServiceEligibility = $conn->prepare($civilServiceEligibilityQuery);
    $stmtCivilServiceEligibility->bind_param("i", $id);
    $stmtCivilServiceEligibility->execute();
    $civilServiceEligibilityResult = $stmtCivilServiceEligibility->get_result();
    $civilServiceEligibility = $civilServiceEligibilityResult->fetch_all(MYSQLI_ASSOC);

    $workExperienceQuery = "SELECT * FROM work_experience WHERE personal_info_id = ?";
    $stmtWorkExperience = $conn->prepare($workExperienceQuery);
    $stmtWorkExperience->bind_param("i", $id);
    $stmtWorkExperience->execute();
    $workExperienceResult = $stmtWorkExperience->get_result();
    $workExperience = $workExperienceResult->fetch_all(MYSQLI_ASSOC);

     $voluntaryWorkQuery = "SELECT * FROM voluntary_work WHERE personal_info_id = ?";
    $stmtVoluntaryWork = $conn->prepare($voluntaryWorkQuery);
    $stmtVoluntaryWork->bind_param("i", $id);
    $stmtVoluntaryWork->execute();
    $voluntaryWorkResult = $stmtVoluntaryWork->get_result();
    $voluntaryWork = $voluntaryWorkResult->fetch_all(MYSQLI_ASSOC);

    $learningAndDevelopmentQuery = "SELECT * FROM learning_and_development WHERE personal_info_id = ?";
    $stmtLearningAndDevelopment = $conn->prepare($learningAndDevelopmentQuery);
    $stmtLearningAndDevelopment->bind_param("i", $id);
    $stmtLearningAndDevelopment->execute();
    $learningAndDevelopmentResult = $stmtLearningAndDevelopment->get_result();
    $learningAndDevelopment = $learningAndDevelopmentResult->fetch_all(MYSQLI_ASSOC);

    $specialSkillsHobbiesQuery = "SELECT * FROM special_skills_hobbies WHERE personal_info_id = ?";
    $stmtSpecialSkillsHobbies = $conn->prepare($specialSkillsHobbiesQuery);
    $stmtSpecialSkillsHobbies->bind_param("i", $id);
    $stmtSpecialSkillsHobbies->execute();
    $specialSkillsHobbiesResult = $stmtSpecialSkillsHobbies->get_result();
    $specialSkillsHobbies = $specialSkillsHobbiesResult->fetch_all(MYSQLI_ASSOC);

    $nonAcademicDistinctionsQuery = "SELECT * FROM non_academic_distinctions WHERE personal_info_id = ?";
    $stmtNonAcademicDistinctions = $conn->prepare($nonAcademicDistinctionsQuery);
    $stmtNonAcademicDistinctions->bind_param("i", $id);
    $stmtNonAcademicDistinctions->execute();
    $nonAcademicDistinctionsResult = $stmtNonAcademicDistinctions->get_result();
    $nonAcademicDistinctions = $nonAcademicDistinctionsResult->fetch_all(MYSQLI_ASSOC);

    $membershipsQuery = "SELECT * FROM memberships WHERE personal_info_id = ?";
    $stmtMemberships = $conn->prepare($membershipsQuery);
    $stmtMemberships->bind_param("i", $id);
    $stmtMemberships->execute();
    $membershipsResult = $stmtMemberships->get_result();
    $memberships = $membershipsResult->fetch_all(MYSQLI_ASSOC);

    $referenceQuery = "SELECT * FROM reference WHERE personal_info_id = ?";
    $stmtReference = $conn->prepare($referenceQuery);
    $stmtReference->bind_param("i", $id);
    $stmtReference->execute();
    $referenceResult = $stmtReference->get_result();
    $reference = $referenceResult->fetch_all(MYSQLI_ASSOC);

    $surveyResponsesQuery = "SELECT question_code, answer, details, response_date FROM survey_responses WHERE personal_info_id = ?";
    $stmtSurveyResponses = $conn->prepare($surveyResponsesQuery);
    $stmtSurveyResponses->bind_param("i", $id);
    $stmtSurveyResponses->execute();
    $surveyResponsesResult = $stmtSurveyResponses->get_result();
    
    // Initialize an array to store responses
    $surveyResponses = [];
    
    // Fetch all survey responses
    while ($row = $surveyResponsesResult->fetch_assoc()) {
        $surveyResponses[$row['question_code']] = [
            'answer' => $row['answer'],
            'details' => $row['details'], // Assuming "details" is a column in your table
            'date' => $row['response_date'],
        ];
    }

    $attachmentQuery = "SELECT * FROM attachment WHERE personal_info_id = ?";
    $stmtAttachment = $conn->prepare($attachmentQuery);
    $stmtAttachment->bind_param("i", $id);
    $stmtAttachment->execute();
    $attachmentResult = $stmtAttachment->get_result();
    $attachment = $attachmentResult->fetch_assoc();

    $basePath = $_SERVER['DOCUMENT_ROOT']; // gives you C:/xampp/htdocs
    $relativePath = '/pds/view_model/pds_main/'; // where the uploads actually live
    
    $id_picture = $basePath . $relativePath . $attachment['id_picture'];
    $signature = $basePath . $relativePath . $attachment['person_signature'];
    $administering = $basePath . $relativePath . $attachment['signature_of_person_administering_oath'];


    // Path to your PDF template
    $templatePath = 'pds.pdf';

    // Create a new FPDI instance
    $pdf = new Fpdi();

    // Import the template
    $pageCount = $pdf->setSourceFile($templatePath);
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $templateId = $pdf->importPage($pageNo);
        $pdf->AddPage('Portrait', 'Legal');
        $pdf->useTemplate($templateId);

        // Add data to the PDF (replace with your template fields)
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetTextColor(0, 0, 0);

        // Page-specific data placement
        if ($pageNo == 1) {
            // Data for page 1
            if ($personalInfo) {
                $pdf->SetXY(41, 49);
                $pdf->Write(0, $personalInfo['surname']);
                $pdf->SetXY(41, 56);
                $pdf->Write(0, $personalInfo['firstname']);
                $pdf->SetXY(41, 62);
                $pdf->Write(0, $personalInfo['middle_name']);
                $pdf->SetXY(165, 56);
                $pdf->Write(0, $personalInfo['name_extension']);
                $pdf->SetXY(41, 72);
                $pdf->Write(0, $personalInfo['date_of_birth']);
                $pdf->SetXY(41, 80);
                $pdf->Write(0, $personalInfo['place_of_birth']);
                if($personalInfo['sex'] == 'Male'){
                    $pdf->SetXY(42, 86);
                    $pdf->Write(0, "/");
                }
                else if ($personalInfo['sex'] == 'Female'){
                    $pdf->SetXY(72, 86);
                    $pdf->Write(0, "/");
                }
                if($personalInfo['civil_status'] == 'Single'){
                    $pdf->SetXY(42, 92);
                    $pdf->Write(0, "/");
                }
                else if($personalInfo['civil_status'] == 'Married'){
                    $pdf->SetXY(72, 92);
                    $pdf->Write(0, "/");
                }
                else if($personalInfo['civil_status'] == 'Widowed'){
                    $pdf->SetXY(42, 96);
                    $pdf->Write(0, "/");
                }
                else if($personalInfo['civil_status'] == 'Separated'){
                    $pdf->SetXY(72, 96);
                    $pdf->Write(0, "/");
                }
                else if($personalInfo['civil_status'] == 'Other/s'){
                    $pdf->SetXY(42, 100);
                    $pdf->Write(0, "/");
                }
                $pdf->SetXY(41, 109);
                $pdf->Write(0, $personalInfo['height']);
                $pdf->SetXY(42, 116);
                $pdf->Write(0, $personalInfo['weight']);
                $pdf->SetXY(42, 123);
                $pdf->Write(0, $personalInfo['bloodtype']);
                $pdf->SetXY(42, 130);
                $pdf->Write(0, $personalInfo['gsis_no']);
                $pdf->SetXY(42, 138);
                $pdf->Write(0, $personalInfo['pagibig_no']);
                $pdf->SetXY(42, 145);
                $pdf->Write(0, $personalInfo['philhealth_no']);
                $pdf->SetXY(42, 153);
                $pdf->Write(0, $personalInfo['sss_no']);
                $pdf->SetXY(42, 160);
                $pdf->Write(0, $personalInfo['tin_no']);
                $pdf->SetXY(42, 167);
                $pdf->Write(0, $personalInfo['agency_employee_no']);
                if($personalInfo['citizenship'] == 'Filipino'){
                    $pdf->SetXY(140, 69);
                    $pdf->Write(0, "/");
                }
                else if($personalInfo['citizenship'] == 'Dual'){
                    $pdf->SetXY(159, 69);//159
                    $pdf->Write(0, "/");
                }
                if($personalInfo['dual_citizenship'] == 'By Birth'){
                    $pdf->SetXY(165, 74);
                    $pdf->Write(0, "/");
                }
                else if($personalInfo['dual_citizenship'] == 'By Naturalization'){
                    $pdf->SetXY(180, 74);
                    $pdf->Write(0, "/");
                }
                $pdf->SetXY(140, 87);
                $pdf->Write(0, $personalInfo['country']);
                $pdf->SetXY(130, 92);
                $pdf->Write(0, $personalInfo['res_house_no']);
                $pdf->SetXY(180, 92);
                $pdf->Write(0, $personalInfo['res_street']);
                $pdf->SetXY(130, 99);
                $pdf->Write(0, $personalInfo['res_subdivision']);
                $pdf->SetXY(180, 99);
                $pdf->Write(0, $personalInfo['res_barangay']);
                $pdf->SetXY(130, 107);
                $pdf->Write(0, $personalInfo['res_city']);
                $pdf->SetXY(180, 107);
                $pdf->Write(0, $personalInfo['res_province']);
                $pdf->SetXY(130, 115);
                $pdf->Write(0, $personalInfo['res_zip']);
                $pdf->SetXY(130, 121);
                $pdf->Write(0, $personalInfo['perm_house_no']);
                $pdf->SetXY(180, 121);
                $pdf->Write(0, $personalInfo['perm_street']);
                $pdf->SetXY(130, 128);
                $pdf->Write(0, $personalInfo['perm_subdivision']);
                $pdf->SetXY(180, 128);
                $pdf->Write(0, $personalInfo['perm_barangay']);
                $pdf->SetXY(130, 135);
                $pdf->Write(0, $personalInfo['perm_city']);
                $pdf->SetXY(180, 135);
                $pdf->Write(0, $personalInfo['perm_province']);
                $pdf->SetXY(130, 145);
                $pdf->Write(0, $personalInfo['perm_zip']);
                $pdf->SetXY(130, 152);
                $pdf->Write(0, $personalInfo['telephone_no']);
                $pdf->SetXY(130, 159);
                $pdf->Write(0, $personalInfo['mobile_no']);
                $pdf->SetXY(130, 166);
                $pdf->Write(0, $personalInfo['email']);
                $pdf->SetXY(42, 178);
            }   
            if ($familyBackground) {
                $pdf->Write(0, $familyBackground['spouse_surname']);
                $pdf->SetXY(42, 185);
                $pdf->Write(0, $familyBackground['spouse_firstname']);
                $pdf->SetXY(93, 185);
                $pdf->Write(0, $familyBackground['spouse_name_extension']);
                $pdf->SetXY(42, 191);
                $pdf->Write(0, $familyBackground['spouse_middlename']);
                $pdf->SetXY(42, 197);
                $pdf->Write(0, $familyBackground['spouse_occupation']);
                $pdf->SetXY(42, 203);
                $pdf->Write(0, $familyBackground['spouse_employer']);
                $pdf->SetXY(42, 209);
                $pdf->Write(0, $familyBackground['spouse_business_address']);
                $pdf->SetXY(42, 215);
                $pdf->Write(0, $familyBackground['spouse_telephone_no']);
                $pdf->SetXY(42, 222);
                $pdf->Write(0, $familyBackground['father_surname']);
                $pdf->SetXY(42, 228);
                $pdf->Write(0, $familyBackground['father_firstname']);
                $pdf->SetXY(93, 228);
                $pdf->Write(0, $familyBackground['father_name_extension']);
                $pdf->SetXY(42, 234);
                $pdf->Write(0, $familyBackground['father_middlename']);
                $pdf->SetXY(42, 240);
                $pdf->Write(0, $familyBackground['mother_maiden_name']);
                $pdf->SetXY(42, 247);
                $pdf->Write(0, $familyBackground['mother_surname']);
                $pdf->SetXY(42, 253);
                $pdf->Write(0, $familyBackground['mother_firstname']);
                $pdf->SetXY(42, 259);
                $pdf->Write(0, $familyBackground['mother_middlename']);
                $y = 181; // Starting Y position
                $pdf->SetX(125); // Set initial X position

                if ($children) {
                    foreach ($children as $child) {
                        $pdf->SetXY(125, $y); // Set X and dynamic Y position
                        $pdf->Cell(0, 7, $child['full_name'], 0, 1, 'M'); // Print name
                        $y += 6; // Move Y position down for the next child
                    }
                }
                $y = 181; // Starting Y position
                $pdf->SetX(140); // Set initial X position

                if ($children) {
                    foreach ($children as $child) {
                        $pdf->SetXY(140, $y); // Set X and dynamic Y position
                        $pdf->Cell(0, 7, $child['date_of_birth'], 0, 1, 'R'); // Print name
                        $y += 6; // Move Y position down for the next child
                    }
                }
            }
            if ($educationalBackground)   {
                $y = 283; // Starting Y position
                $pdf->SetX(42);
                foreach ($educationalBackground as $education) {
                    $pdf->SetXY(40, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['name_of_school'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 283; // Starting Y position
                $pdf->SetX(92);
                foreach ($educationalBackground as $education) {
                    $pdf->SetXY(90, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['basic_education_degree_course'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 283; // Starting Y position
                $pdf->SetX(138);
                foreach ($educationalBackground as $education) {
                    $pdf->SetXY(138, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['from_year'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 283; // Starting Y position
                $pdf->SetX(150);
                foreach ($educationalBackground as $education) {
                    $pdf->SetXY(150, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['to_year'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 283; // Starting Y position
                $pdf->SetX(163);
                foreach ($educationalBackground as $education) {
                    $pdf->SetXY(163, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['highest_level_units_earned'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 283; // Starting Y position
                $pdf->SetX(182);
                foreach ($educationalBackground as $education) {
                    $pdf->SetXY(182, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['year_graduated'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 283; // Starting Y position
                $pdf->SetX(196);
                foreach ($educationalBackground as $education) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->SetXY(196, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $education['scholarship_academic_honors_received'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
            }
        } elseif ($pageNo == 2) {
            // Data for page 2
           if ($civilServiceEligibility) {
                $y = 27; // Starting Y position
                $pdf->SetX(5);
                foreach ($civilServiceEligibility as $civil) {
                    $pdf->SetXY(5, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $civil['career_service'], 0, 1, 'L'); // Print name
                    $y += 8.5; // Move Y position down for the next child
                }
                $y = 27; // Starting Y position
                $pdf->SetX(75);
                foreach ($civilServiceEligibility as $civil) {
                    $pdf->SetXY(75, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $civil['rating'], 0, 1, 'L'); // Print name
                    $y += 8.5; // Move Y position down for the next child
                }
                $y = 27; // Starting Y position
                $pdf->SetX(94);
                foreach ($civilServiceEligibility as $civil) {
                    $pdf->SetXY(94, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $civil['date_of_examination'], 0, 1, 'L'); // Print name
                    $y += 8.5; // Move Y position down for the next child
                }
                $y = 27; // Starting Y position
                $pdf->SetX(120);
                foreach ($civilServiceEligibility as $civil) {
                    $pdf->SetXY(120, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $civil['place_of_examination'], 0, 1, 'L'); // Print name
                    $y += 8.5; // Move Y position down for the next child
                }
                $y = 27; // Starting Y position
                $pdf->SetX(180);
                foreach ($civilServiceEligibility as $civil) {
                    $pdf->SetFont('Arial', '', 9);
                    $pdf->SetXY(180, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $civil['license_no'], 0, 1, 'L'); // Print name
                    $y += 8.5; // Move Y position down for the next child
                }
                $y = 27; // Starting Y position
                $pdf->SetX(200);
                foreach ($civilServiceEligibility as $civil) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->SetXY(200, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $civil['date_of_validity'], 0, 1, 'L'); // Print name
                    $y += 8.5; // Move Y position down for the next child
                }
            
           }
           if ($workExperience){
            $y = 116; // Starting Y position
            $pdf->SetX(4);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(4, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['work_from'], 0, 1, 'L'); // Print name
                $y += 8.5; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(21);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(21, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['work_to'], 0, 1, 'L'); // Print name
                $y += 8.5; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(40);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 11);
                $pdf->SetXY(40, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['position_title'], 0, 1, 'L'); // Print name
                $y += 8; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(94);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 11);
                $pdf->SetXY(94, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['department_agency'], 0, 1, 'L'); // Print name
                $y += 8; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(149);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(149, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['monthly_salary'], 0, 1, 'L'); // Print name
                $y += 8; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(169);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 11);
                $pdf->SetXY(169, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['salary_grade'], 0, 1, 'L'); // Print name
                $y += 8; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(181);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 11);
                $pdf->SetXY(181, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['status_of_appointment'], 0, 1, 'L'); // Print name
                $y += 8; // Move Y position down for the next child
            }
            $y = 116; // Starting Y position
            $pdf->SetX(202);
            foreach ($workExperience as $work) {
                $pdf->SetFont('Arial', '', 11);
                $pdf->SetXY(202, $y); // Set X and dynamic Y position
                $pdf->Cell(0, 7, $work['govt_service'], 0, 1, 'L'); // Print name
                $y += 8; // Move Y position down for the next child
            }
           }
            //...
        } elseif ($pageNo == 3) {
            //Data for page 3
            if ($voluntaryWork){
                $y = 30; // Starting Y position
                $pdf->SetX(5);
                foreach ($voluntaryWork as $voluntary) {
                    $pdf->SetXY(5, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $voluntary['organization_name_address'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
            }
            if ($voluntaryWork){
                $y = 30; // Starting Y position
                $pdf->SetX(96);
                foreach ($voluntaryWork as $voluntary) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->SetXY(96, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $voluntary['work_from'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 30; // Starting Y position
                $pdf->SetX(112);
                foreach ($voluntaryWork as $voluntary) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->SetXY(112, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $voluntary['work_to'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 30; // Starting Y position
                $pdf->SetX(132);
                foreach ($voluntaryWork as $voluntary) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(132, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $voluntary['number_of_hours'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 30; // Starting Y position
                $pdf->SetX(150);
                foreach ($voluntaryWork as $voluntary) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(150, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $voluntary['position_nature_of_work'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }

            }
            if ($learningAndDevelopment){
                $y = 108; // Starting Y position
                $pdf->SetX(5);
                foreach ($learningAndDevelopment as $lnd) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(5, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $lnd['title'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 108; // Starting Y position
                $pdf->SetX(96);
                foreach ($learningAndDevelopment as $lnd) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->SetXY(96, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $lnd['ld_from'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 108; // Starting Y position
                $pdf->SetX(112);
                foreach ($learningAndDevelopment as $lnd) {
                    $pdf->SetFont('Arial', '', 8);
                    $pdf->SetXY(112, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $lnd['ld_to'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 108; // Starting Y position
                $pdf->SetX(132);
                foreach ($learningAndDevelopment as $lnd) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(132, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $lnd['number_of_hours'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 108; // Starting Y position
                $pdf->SetX(145);
                foreach ($learningAndDevelopment as $lnd) {
                    $pdf->SetFont('Arial', '', 10);
                    $pdf->SetXY(145, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $lnd['type_of_ld'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 108; // Starting Y position
                $pdf->SetX(165);
                foreach ($learningAndDevelopment as $lnd) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(165, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $lnd['conducted_by'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
            }
            if ($specialSkillsHobbies){
                $y = 274; // Starting Y position
                $pdf->SetX(5);
                foreach ($specialSkillsHobbies as $skills) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(5, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $skills['skill_hobby'], 0, 1, 'L'); // Print name
                    $y += 7; // Move Y position down for the next child
                }
            }
            if ($nonAcademicDistinctions){
                $y = 274; // Starting Y position
                $pdf->SetX(60);
                foreach ($nonAcademicDistinctions as $acads) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(60, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $acads['recognition'], 0, 1, 'L'); // Print name
                    $y += 7; // Move Y position down for the next child
                }
            }
            if ($memberships){
                $y = 274; // Starting Y position
                $pdf->SetX(163);
                foreach ($memberships as $member) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(163, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $member['organization_name'], 0, 1, 'L'); // Print name
                    $y += 7; // Move Y position down for the next child
                }
            }
        } elseif ($pageNo == 4) {
             //Data for page 4
            //questionnaier
            if (isset($surveyResponses[1])) { // Check if question 1 exists
                if ($surveyResponses[1]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 26);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[1]['answer'] == 'No') {
                    $pdf->SetXY(161, 26);
                    $pdf->Write(0, "/");
                }
            }
            if (isset($surveyResponses[2])) { // Check if question 1 exists
                if ($surveyResponses[2]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 32);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[2]['answer'] == 'No') {
                    $pdf->SetXY(161, 32);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(145, 39);
                $pdf->MultiCell(40, 5, $surveyResponses[2]['details']);
            }
            if (isset($surveyResponses[3])) { // Check if question 1 exists
                if ($surveyResponses[3]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 49);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[3]['answer'] == 'No') {
                    $pdf->SetXY(161, 49);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(145, 56);
                $pdf->MultiCell(40, 5, $surveyResponses[3]['details']);
            }
            if (isset($surveyResponses[4])) { // Check if question 1 exists
                if ($surveyResponses[4]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 67);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[4]['answer'] == 'No') {
                    $pdf->SetXY(163, 67);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(165, 79);
                $pdf->MultiCell(40, 5, $surveyResponses[4]['details']);
                $pdf->SetXY(165, 74);
                $pdf->MultiCell(40, 5, $surveyResponses[4]['date']);
            }
            if (isset($surveyResponses[5])) { // Check if question 1 exists
                if ($surveyResponses[5]['answer'] == 'Yes') {
                    $pdf->SetXY(138.5, 89);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[5]['answer'] == 'No') {
                    $pdf->SetXY(164, 89);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(145, 97);
                $pdf->MultiCell(40, 5, $surveyResponses[5]['details']);
            }
            if (isset($surveyResponses[6])) { // Check if question 1 exists
                if ($surveyResponses[6]['answer'] == 'Yes') {
                    $pdf->SetXY(138, 107);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[6]['answer'] == 'No') {
                    $pdf->SetXY(164, 107);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(145, 111);
                $pdf->MultiCell(40, 5, $surveyResponses[6]['details']);
            }
            if (isset($surveyResponses[7])) { // Check if question 1 exists
                if ($surveyResponses[7]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 121);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[7]['answer'] == 'No') {
                    $pdf->SetXY(166, 121);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(166, 123);
                $pdf->MultiCell(40, 5, $surveyResponses[7]['details']);
            }
            if (isset($surveyResponses[8])) { // Check if question 1 exists
                if ($surveyResponses[8]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 132);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[8]['answer'] == 'No') {
                    $pdf->SetXY(166, 132);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(166, 135);
                $pdf->MultiCell(40, 5, $surveyResponses[8]['details']);
            }
            if (isset($surveyResponses[9])) { // Check if question 1 exists
                if ($surveyResponses[9]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 145);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[9]['answer'] == 'No') {
                    $pdf->SetXY(166, 145);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(143, 151);
                $pdf->MultiCell(40, 5, $surveyResponses[9]['details']);
            }
            if (isset($surveyResponses[10])) { // Check if question 1 exists
                if ($surveyResponses[10]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 171);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[10]['answer'] == 'No') {
                    $pdf->SetXY(166, 171);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(179, 173);
                $pdf->MultiCell(40, 5, $surveyResponses[10]['details']);
            }
            if (isset($surveyResponses[11])) { // Check if question 1 exists
                if ($surveyResponses[11]['answer'] == 'Yes') {
                    $pdf->SetXY(139, 179.5);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[11]['answer'] == 'No') {
                    $pdf->SetXY(166, 179.5);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(179, 182.5);
                $pdf->MultiCell(40, 5, $surveyResponses[11]['details']);
            }
            if (isset($surveyResponses[12])) { // Check if question 1 exists
                if ($surveyResponses[12]['answer'] == 'Yes') {
                    $pdf->SetXY(139.2, 189.1);
                    $pdf->Write(0, "/");
                } elseif ($surveyResponses[12]['answer'] == 'No') {
                    $pdf->SetXY(166.2, 189.1);
                    $pdf->Write(0, "/");
                }

                $pdf->SetXY(179, 191);
                $pdf->MultiCell(40, 5, $surveyResponses[12]['details']);
            }

            if ($reference){
                $y = 213; // Starting Y position
                $pdf->SetX(5);
                foreach ($reference as $ref) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(5, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $ref['name'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 213; // Starting Y position
                $pdf->SetX(85);
                foreach ($reference as $ref) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(85, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $ref['address'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
                $y = 213; // Starting Y position
                $pdf->SetX(135);
                foreach ($reference as $ref) {
                    $pdf->SetFont('Arial', '', 11);
                    $pdf->SetXY(135, $y); // Set X and dynamic Y position
                    $pdf->Cell(0, 7, $ref['telephone_no'], 0, 1, 'L'); // Print name
                    $y += 8; // Move Y position down for the next child
                }
            }

            if ($attachment){
                $pdf->Image($id_picture, 173, 210, 30, 30);
                $pdf->Image($signature, 110, 265, 20, 20);
                $pdf->Image($administering, 110, 310, 20, 20);
                $pdf->SetXY(32, 275);
                $pdf->Write(0, $attachment['government_issued_id']);
                $pdf->SetXY(35, 282);
                $pdf->Write(0, $attachment['id_license_passport_no']);
                $pdf->SetXY(33, 290);
                $pdf->Write(0, $attachment['date_place_of_issuance']);
                $pdf->SetXY(110, 287);
                $pdf->Write(0, $attachment['date_accomplished']);
                $pdf->SetXY(80, 300);
                $pdf->Write(0, $attachment['subscribed_and_sworn_date']);
                $pdf->SetXY(100, 321);
                $pdf->Write(0, $attachment['person_administering_oath']);
            }

             

             
            
        }
        // ... Add data for other pages ...
    }

    // Output the generated PDF to the browser
    $pdf->Output('F', 'filled_template.pdf');
    
    // ... (Confirmation page code) ...


    $maxWaitTime = 5; // Maximum wait time in seconds
    $waitTime = 0;

    while (!file_exists('filled_template.pdf') || filesize('filled_template.pdf') == 0) {
        if ($waitTime >= $maxWaitTime) {
            throw new Exception("PDF generation timeout");
        }
        sleep(1); // Wait for 1 second
        $waitTime++;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview PDS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 20px;
        }
        iframe {
            width: 80%;
            height: 600px;
            border: 1px solid #ccc;
        }
        .button-container {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            margin: 5px;
        }
        .confirm-btn {
            background-color: green;
            color: white;
        }
        .cancel-btn {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Preview Your PDS</h2>
    
    <!-- Display the generated PDF -->
    <iframe src="filled_template.pdf?rand=<?php echo time(); ?>"></iframe>

    <!-- Buttons for Confirm and Cancel -->
    <div class="button-container">
        <button onclick="submitAction('confirm')" class="confirm-btn">Confirm</button>
        <button onclick="submitAction('cancel')" class="cancel-btn">Cancel</button>
    </div>

    <script src="/pds/js/pds_preview/script.js"></script>
</body>
</html>
