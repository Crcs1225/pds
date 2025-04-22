-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 22, 2025 at 04:51 AM
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

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `personal_info_id`, `government_issued_id`, `id_license_passport_no`, `date_place_of_issuance`, `person_signature`, `date_accomplished`, `id_picture`, `subscribed_and_sworn_date`, `person_administering_oath`, `signature_of_person_administering_oath`, `created_at`, `updated_at`) VALUES
(7, 64, 'Driver\'s License', 'A07-21-854734', 'Lingayen', 'upload/signature/user64.png', '2025-01-01', 'upload/id/user64.png', '2025-01-12', 'Admin Oath', 'upload/sworn/user64.png', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(13, 83, 'dsfds', 'fdsf', 'fdsf', NULL, '0000-00-00', NULL, '0000-00-00', '', 'upload/sworn/user83.png', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(15, 87, 'dsfds', 'fdsf', 'fdsf', 'upload/signature/user87.png', '0000-00-00', 'upload/id/user87.png', '0000-00-00', '', 'upload/sworn/user87.png', '2025-04-22 02:43:18', '2025-04-22 02:43:18');

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

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `personal_info_id`, `full_name`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(16, 83, 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25');

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

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`id`, `personal_info_id`, `educ_level`, `name_of_school`, `basic_education_degree_course`, `from_year`, `to_year`, `highest_level_units_earned`, `year_graduated`, `scholarship_academic_honors_received`, `created_at`, `updated_at`) VALUES
(141, 64, 'Elementary', 'Pilar Elementary School', 'Basic Education', '2009', '2015', '', '2015', 'Honor', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(142, 64, 'Secondary', 'Bolinao Integrated School', 'Basic Education', '2015', '2021', '', '2021', 'Honor', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(143, 64, 'Vocational', '', '', '0000', '0000', '', '0000', '', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(144, 64, 'College', 'Pangasinan State University', 'BS Computer Science', '2021', '2025', '', '2025', 'Distinction', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(145, 64, 'Graduate Studies', '', '', '0000', '0000', '', '0000', '', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(166, 69, 'Elementary', 'Pilar Elementary School', 'Basic Education', '2009', '2015', '', '2015', 'Honor', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(167, 69, 'Secondary', 'Bolinao Integrated School', 'Basic Education', '2015', '2021', '', '2021', 'Honor', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(168, 69, 'Vocational', '', '', '0000', '0000', '', '0000', '', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(169, 69, 'College', 'Pangasinan State University', 'BS Computer Science', '2021', '2025', '', '2025', 'Distinction', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(170, 69, 'Graduate Studies', '', '', '0000', '0000', '', '0000', '', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(246, 83, 'Elementary', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(247, 83, 'Secondary', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(248, 83, 'Vocational', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(249, 83, 'College', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(250, 83, 'Graduate Studies', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(256, 87, 'Elementary', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(257, 87, 'Secondary', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(258, 87, 'Vocational', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(259, 87, 'College', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(260, 87, 'Graduate Studies', '', '', '0000', '0000', '', '0000', '', '2025-04-22 02:43:17', '2025-04-22 02:43:17');

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

--
-- Dumping data for table `family_background`
--

INSERT INTO `family_background` (`id`, `personal_info_id`, `spouse_surname`, `spouse_firstname`, `spouse_middlename`, `spouse_name_extension`, `spouse_occupation`, `spouse_employer`, `spouse_business_address`, `spouse_telephone_no`, `father_surname`, `father_firstname`, `father_middlename`, `father_name_extension`, `mother_maiden_name`, `mother_surname`, `mother_firstname`, `mother_middlename`, `created_at`, `updated_at`) VALUES
(34, 64, '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'Caracas', 'Edwin', 'Casta', '', 'N/A', 'Awisan', 'Trudz', 'Agnawa', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(39, 69, 'Caracas', 'Marc Daniel', '', '', '', 'N/A', 'N/A', 'N/A', 'Caracas', 'Edwin', 'Casta', '', 'N/A', 'Awisan', 'Trudz', 'Agnawa', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(47, 82, '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'Caracas', 'Edwin', 'Casta', '', 'N/A', 'Awisan', 'Trudz', 'Agnawa', '2025-04-22 01:05:26', '2025-04-22 01:05:26'),
(57, 83, '', '', '', '', '', 'N/A', 'N/A', 'N/A', '', '', '', '', 'N/A', '', '', '', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(59, 87, '', '', '', '', '', 'N/A', 'N/A', 'N/A', '', '', '', '', 'N/A', '', '', '', '2025-04-22 02:43:17', '2025-04-22 02:43:17');

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

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `personal_info_id`, `organization_name`, `created_at`, `updated_at`) VALUES
(5, 64, 'org x', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(25, 83, 'sfdsf', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(26, 83, 'dfdsf', '2025-04-22 02:33:25', '2025-04-22 02:33:25');

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
  `pds_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
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

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `pds_name`, `user_id`, `cs_id_no`, `surname`, `firstname`, `middle_name`, `name_extension`, `date_of_birth`, `place_of_birth`, `sex`, `civil_status`, `height`, `weight`, `bloodtype`, `gsis_no`, `pagibig_no`, `philhealth_no`, `sss_no`, `tin_no`, `agency_employee_no`, `citizenship`, `dual_citizenship`, `country`, `res_house_no`, `res_street`, `res_subdivision`, `res_barangay`, `res_city`, `res_province`, `res_zip`, `perm_house_no`, `perm_street`, `perm_subdivision`, `perm_barangay`, `perm_city`, `perm_province`, `perm_zip`, `telephone_no`, `mobile_no`, `email`, `status`, `created_at`, `updated_at`) VALUES
(64, 'PDS 1', 1, '', 'Caracas', 'Marc Daniel', 'Awisan', '', '2002-12-25', 'Bolinao', 'Male', 'Single', 168.00, 68.00, '', '', '', '', '', '', '', 'Filipino', 'By Birth', '', '', '', '', 'Pilar', 'Bolinao', 'Pangasinan', '2406', '', '', '', '', '', '', '', '', '09380013909', 'mrcdnlcrccs@gmail.com', 'inactive', '2025-04-14 00:50:57', '2025-04-21 05:15:02'),
(69, 'pds 5', 1, '', 'Caracas', 'Marc Daniel', 'Awisan', '', '2020-12-12', 'Bolinao', 'Male', 'Single', 168.00, 68.00, '', '', '', '', '', '', '', 'Filipino', 'By Birth', '', '', '', '', 'Pilar', 'Bolinao', 'Pangasinan', '2406', '', 'Pilar', '', '', 'Bolinao', '01', '2406', '09380013909', '09473445453', 'mrcdnlcrccs@gmail.com', 'active', '2025-04-14 08:36:49', '2025-04-22 02:47:25'),
(82, 'new', 1, '', 'Caracas', 'Marc Daniel', 'Awisan', '', '3002-12-12', 'Bolinao', 'Male', 'Single', 168.00, 68.00, '', '', '', '', '', '', '', 'Filipino', 'By Birth', 'Pilipinas', '', '', '', 'Pilar', 'Bolinao', 'Pangasinan', '2406', '', '', '', '', '', '', '', '', '0974953353', 'mrcdnlcrccs@gmail.com', 'inactive', '2025-04-22 01:05:26', '2025-04-22 02:47:25'),
(83, 'new', 1, '', 'Caracas', 'Marc Daniel', 'Awisan', '', '2002-12-12', 'Bolinao', 'Male', 'Single', 168.00, 68.00, '', '', '', '', '', '', '', 'Filipino', 'By Birth', 'Pilipinas', '', '', '', 'Pilar', 'Bolinao', 'Pangasinan', '2406', '', '', '', '', '', '', '', '', '098335', 'mrcdnlcrccs@gmail.com', 'inactive', '2025-04-22 02:33:25', '2025-04-22 02:47:25'),
(87, 'sda', 1, '', 'Caracas', 'Marc Daniel', 'Awisan', '', '2002-12-12', 'Bolinao', 'Male', 'Single', 168.00, 68.00, '', '', '', '', '', '', '', 'Filipino', 'By Birth', 'Pilipinas', '', '', '', 'Pilar', 'Bolinao', 'Pangasinan', '2406', '', '', '', '', '', '', '', '', '5632335', 'mrcdnlcrccs@gmail.com', 'inactive', '2025-04-22 02:43:17', '2025-04-22 02:47:25');

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

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `personal_info_id`, `name`, `address`, `telephone_no`, `created_at`, `updated_at`) VALUES
(6, 64, 'person 1', 'person_1@geemail.com', '09654623341', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(17, 83, 'sdfds', 'dsafsfsfda', 'N/A', '2025-04-22 02:33:25', '2025-04-22 02:33:25');

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

--
-- Dumping data for table `special_skills_hobbies`
--

INSERT INTO `special_skills_hobbies` (`id`, `personal_info_id`, `skill_hobby`, `created_at`, `updated_at`) VALUES
(9, 64, 'coding', '2025-04-14 00:50:57', '2025-04-14 00:50:57');

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

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `personal_info_id`, `question_code`, `answer`, `details`, `response_date`, `created_at`, `updated_at`) VALUES
(337, 64, '1', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(338, 64, '2', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(339, 64, '3', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(340, 64, '4', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(341, 64, '5', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(342, 64, '6', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(343, 64, '7', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(344, 64, '8', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(345, 64, '9', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(346, 64, '10', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(347, 64, '11', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(348, 64, '12', 'No', 'N/A', '0000-00-00', '2025-04-14 00:50:57', '2025-04-14 00:50:57'),
(397, 69, '1', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(398, 69, '2', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(399, 69, '3', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(400, 69, '4', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(401, 69, '5', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(402, 69, '6', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(403, 69, '7', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(404, 69, '8', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(405, 69, '9', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(406, 69, '10', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(407, 69, '11', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(408, 69, '12', 'Yes', 'N/A', '0000-00-00', '2025-04-14 08:36:49', '2025-04-14 08:36:49'),
(577, 83, '1', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(578, 83, '2', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(579, 83, '3', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(580, 83, '4', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(581, 83, '5', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(582, 83, '6', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(583, 83, '7', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(584, 83, '8', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(585, 83, '9', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(586, 83, '10', 'No', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(587, 83, '11', 'No', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(588, 83, '12', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:33:25', '2025-04-22 02:33:25'),
(601, 87, '1', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(602, 87, '2', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(603, 87, '3', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(604, 87, '4', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(605, 87, '5', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(606, 87, '6', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:17', '2025-04-22 02:43:17'),
(607, 87, '7', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:18', '2025-04-22 02:43:18'),
(608, 87, '8', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:18', '2025-04-22 02:43:18'),
(609, 87, '9', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:18', '2025-04-22 02:43:18'),
(610, 87, '10', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:18', '2025-04-22 02:43:18'),
(611, 87, '11', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:18', '2025-04-22 02:43:18'),
(612, 87, '12', 'Yes', 'N/A', '0000-00-00', '2025-04-22 02:43:18', '2025-04-22 02:43:18');

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

--
-- Dumping data for table `voluntary_work`
--

INSERT INTO `voluntary_work` (`id`, `personal_info_id`, `organization_name_address`, `work_from`, `work_to`, `number_of_hours`, `position_nature_of_work`, `created_at`, `updated_at`) VALUES
(4, 64, 'any', '2021-01-01', '2021-03-03', 500, 'any', '2025-04-14 00:50:57', '2025-04-14 00:50:57');

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
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `personal_info_id`, `work_from`, `work_to`, `position_title`, `department_agency`, `monthly_salary`, `salary_grade`, `status_of_appointment`, `govt_service`, `created_at`, `updated_at`) VALUES
(3, 64, '2020-01-01', '2025-01-01', 'Any', 'Company X', 15000.00, '14', 'any', 'No', '2025-04-14 00:50:57', '2025-04-14 00:50:57');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `civil_service_eligibility`
--
ALTER TABLE `civil_service_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `family_background`
--
ALTER TABLE `family_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `learning_and_development`
--
ALTER TABLE `learning_and_development`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `non_academic_distinctions`
--
ALTER TABLE `non_academic_distinctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
