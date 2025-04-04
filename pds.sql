-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 04, 2025 at 09:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pds_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `government_issued_id` varchar(255) NOT NULL,
  `id_license_passport_no` varchar(100) NOT NULL,
  `date_place_of_issuance` varchar(255) DEFAULT NULL,
  `person_signature` varchar(255) DEFAULT NULL,
  `date_accomplished` date DEFAULT NULL,
  `id_picture` varchar(255) DEFAULT NULL,
  `subscribed_and_sworn_date` date DEFAULT NULL,
  `person_administering_oath` varchar(255) DEFAULT NULL,
  `signature_of_person_administering_oath` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `civil_service_eligibility`
--

CREATE TABLE `civil_service_eligibility` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `career_service` varchar(255) NOT NULL,
  `rating` decimal(5,2) DEFAULT NULL,
  `date_of_examination` date DEFAULT NULL,
  `place_of_examination` varchar(255) DEFAULT NULL,
  `license_no` varchar(50) DEFAULT NULL,
  `date_of_validity` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `educ_level` varchar(50) NOT NULL DEFAULT 'N/A',
  `name_of_school` varchar(150) NOT NULL DEFAULT 'N/A',
  `basic_education_degree_course` varchar(150) DEFAULT 'N/A',
  `from_year` year(4) DEFAULT NULL,
  `to_year` year(4) DEFAULT NULL,
  `highest_level_units_earned` varchar(50) DEFAULT 'N/A',
  `year_graduated` year(4) DEFAULT NULL,
  `scholarship_academic_honors_received` text DEFAULT 'N/A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_background`
--

CREATE TABLE `family_background` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `spouse_surname` varchar(50) DEFAULT 'N/A',
  `spouse_firstname` varchar(50) DEFAULT 'N/A',
  `spouse_middlename` varchar(50) DEFAULT 'N/A',
  `spouse_name_extension` varchar(10) DEFAULT 'N/A',
  `spouse_occupation` varchar(100) DEFAULT 'N/A',
  `spouse_employer` varchar(100) DEFAULT 'N/A',
  `spouse_business_address` varchar(255) DEFAULT 'N/A',
  `spouse_telephone_no` varchar(20) DEFAULT 'N/A',
  `father_surname` varchar(50) DEFAULT 'N/A',
  `father_firstname` varchar(50) DEFAULT 'N/A',
  `father_middlename` varchar(50) DEFAULT 'N/A',
  `father_name_extension` varchar(10) DEFAULT 'N/A',
  `mother_maiden_name` varchar(50) DEFAULT 'N/A',
  `mother_surname` varchar(50) DEFAULT 'N/A',
  `mother_firstname` varchar(50) DEFAULT 'N/A',
  `mother_middlename` varchar(50) DEFAULT 'N/A',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_and_development`
--

CREATE TABLE `learning_and_development` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ld_from` date NOT NULL,
  `ld_to` date DEFAULT NULL,
  `number_of_hours` int(11) NOT NULL,
  `type_of_ld` varchar(255) NOT NULL,
  `conducted_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `non_academic_distinctions`
--

CREATE TABLE `non_academic_distinctions` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `recognition` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `cs_id_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `name_extension` varchar(10) NOT NULL DEFAULT 'N/A',
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL DEFAULT 'N/A',
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` enum('Single','Married','Widowed','Separated','Divorced') NOT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `bloodtype` varchar(5) NOT NULL DEFAULT 'N/A',
  `gsis_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `pagibig_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `philhealth_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `sss_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `tin_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `agency_employee_no` varchar(20) DEFAULT 'N/A',
  `citizenship` varchar(20) NOT NULL DEFAULT 'Filipino',
  `dual_citizenship` enum('By Birth','By Naturalization','None') DEFAULT 'By Birth',
  `country` varchar(50) NOT NULL DEFAULT 'N/A',
  `res_house_no` varchar(10) NOT NULL DEFAULT 'N/A',
  `res_street` varchar(100) NOT NULL DEFAULT 'N/A',
  `res_subdivision` varchar(100) NOT NULL DEFAULT 'N/A',
  `res_barangay` varchar(100) NOT NULL DEFAULT 'N/A',
  `res_city` varchar(100) NOT NULL DEFAULT 'N/A',
  `res_province` varchar(100) NOT NULL DEFAULT 'N/A',
  `res_zip` varchar(10) NOT NULL DEFAULT 'N/A',
  `perm_house_no` varchar(10) NOT NULL DEFAULT 'N/A',
  `perm_street` varchar(100) NOT NULL DEFAULT 'N/A',
  `perm_subdivision` varchar(100) NOT NULL DEFAULT 'N/A',
  `perm_barangay` varchar(100) NOT NULL DEFAULT 'N/A',
  `perm_city` varchar(100) NOT NULL DEFAULT 'N/A',
  `perm_province` varchar(100) NOT NULL DEFAULT 'N/A',
  `perm_zip` varchar(10) NOT NULL DEFAULT 'N/A',
  `telephone_no` varchar(20) NOT NULL DEFAULT 'N/A',
  `mobile_no` varchar(15) NOT NULL DEFAULT 'N/A',
  `email` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `telephone_no` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_skills_hobbies`
--

CREATE TABLE `special_skills_hobbies` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `skill_hobby` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `question_code` varchar(10) NOT NULL,
  `answer` enum('Yes','No') NOT NULL DEFAULT 'No',
  `details` text DEFAULT 'N/A',
  `response_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voluntary_work`
--

CREATE TABLE `voluntary_work` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `organization_name_address` text NOT NULL,
  `work_from` date NOT NULL,
  `work_to` date DEFAULT NULL,
  `number_of_hours` int(11) NOT NULL,
  `position_nature_of_work` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `work_from` date NOT NULL,
  `work_to` date DEFAULT NULL,
  `position_title` varchar(255) NOT NULL,
  `department_agency` varchar(255) NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `salary_grade` varchar(50) DEFAULT NULL,
  `status_of_appointment` varchar(100) NOT NULL,
  `govt_service` enum('Yes','No') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_attachments` (`personal_info_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_children` (`personal_info_id`);

--
-- Indexes for table `civil_service_eligibility`
--
ALTER TABLE `civil_service_eligibility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_civil_service` (`personal_info_id`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_education` (`personal_info_id`);

--
-- Indexes for table `family_background`
--
ALTER TABLE `family_background`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info` (`personal_info_id`);

--
-- Indexes for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_ld` (`personal_info_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_memberships` (`personal_info_id`);

--
-- Indexes for table `non_academic_distinctions`
--
ALTER TABLE `non_academic_distinctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_distinctions` (`personal_info_id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_references_personal` (`personal_info_id`);

--
-- Indexes for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_skills` (`personal_info_id`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_survey_personal` (`personal_info_id`);

--
-- Indexes for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_voluntary_work` (`personal_info_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_info_work_experience` (`personal_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `civil_service_eligibility`
--
ALTER TABLE `civil_service_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `family_background`
--
ALTER TABLE `family_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `non_academic_distinctions`
--
ALTER TABLE `non_academic_distinctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `fk_personal_attachments` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `fk_personal_info_children` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `civil_service_eligibility`
--
ALTER TABLE `civil_service_eligibility`
  ADD CONSTRAINT `fk_personal_info_civil_service` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD CONSTRAINT `fk_personal_info_education` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `family_background`
--
ALTER TABLE `family_background`
  ADD CONSTRAINT `fk_personal_info` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  ADD CONSTRAINT `fk_personal_info_ld` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `fk_personal_info_memberships` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `non_academic_distinctions`
--
ALTER TABLE `non_academic_distinctions`
  ADD CONSTRAINT `fk_personal_info_distinctions` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `fk_references_personal` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  ADD CONSTRAINT `fk_personal_info_skills` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD CONSTRAINT `fk_survey_personal` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  ADD CONSTRAINT `fk_personal_info_voluntary_work` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `fk_personal_info_work_experience` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_information` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
