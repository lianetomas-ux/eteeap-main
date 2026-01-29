-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 08:15 AM
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
-- Database: `clsu_eteeap`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_forms`
--

CREATE TABLE `application_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `civil_status` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `language` varchar(255) NOT NULL,
  `degree_program_field` varchar(255) NOT NULL,
  `first_priority` varchar(255) DEFAULT NULL,
  `second_priority` varchar(255) DEFAULT NULL,
  `third_priority` varchar(255) DEFAULT NULL,
  `goals_objectives` text DEFAULT NULL,
  `learning_activities` text DEFAULT NULL,
  `overseas_applicants` text DEFAULT NULL,
  `equivalency_accreditation` enum('Less than 1 year','1 year','2 years','3 years') NOT NULL,
  `degree_program` longtext NOT NULL,
  `school_address` longtext NOT NULL,
  `inclusive_dates` longtext NOT NULL,
  `training_program` longtext DEFAULT NULL,
  `certificate_obtained` longtext DEFAULT NULL,
  `dates_attendance` varchar(255) NOT NULL,
  `certification_examination` longtext DEFAULT NULL,
  `certifying_agency` longtext DEFAULT NULL,
  `date_certified` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `position_designation` varchar(255) DEFAULT NULL,
  `dates_of_employment` varchar(255) DEFAULT NULL,
  `address_of_company` text DEFAULT NULL,
  `status_of_employment` varchar(255) DEFAULT NULL,
  `designation_of_immediate` varchar(255) DEFAULT NULL,
  `reasons_for_moving` text DEFAULT NULL,
  `responsibilities_in_position` text DEFAULT NULL,
  `case_of_self_employment` text DEFAULT NULL,
  `awards_conferred` longtext DEFAULT NULL,
  `conferring_organizations` longtext DEFAULT NULL,
  `date_awarded` longtext DEFAULT NULL,
  `community_awards_conferred` longtext DEFAULT NULL,
  `community_conferring_organizations` longtext DEFAULT NULL,
  `community_date_awarded` longtext DEFAULT NULL,
  `work_awards_conferred` longtext DEFAULT NULL,
  `work_community_conferring_organizations` longtext DEFAULT NULL,
  `work_community_date_awarded` varchar(255) DEFAULT NULL,
  `accomplishment_description` text DEFAULT NULL,
  `date_accomplished` date DEFAULT NULL,
  `address_of_publishing` text DEFAULT NULL,
  `leisure_activities` text DEFAULT NULL,
  `special_skills` text DEFAULT NULL,
  `work_related_activities` text DEFAULT NULL,
  `volunteer_activities` text DEFAULT NULL,
  `travels_cite_places` text DEFAULT NULL,
  `essay_of_degree` text DEFAULT NULL,
  `declaration_place` text DEFAULT NULL,
  `declaration_day` varchar(255) DEFAULT NULL,
  `declaration_month_year` varchar(255) DEFAULT NULL,
  `printed_name` varchar(255) NOT NULL,
  `community_tax_certificate` varchar(255) NOT NULL,
  `issued_on` date NOT NULL,
  `issued_at` varchar(255) NOT NULL,
  `status` enum('Pending','Accepted by Admin','Rejected by Admin','Accepted by Assessor','Rejected by Assessor','Accepted by Department Coordinator','Rejected by Department Coordinator','Accepted by College Coordinator','Rejected by College Coordinator','Final Admission List') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `remarks` text DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_forms`
--

INSERT INTO `application_forms` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `profile_image`, `birthdate`, `birthplace`, `civil_status`, `sex`, `language`, `degree_program_field`, `first_priority`, `second_priority`, `third_priority`, `goals_objectives`, `learning_activities`, `overseas_applicants`, `equivalency_accreditation`, `degree_program`, `school_address`, `inclusive_dates`, `training_program`, `certificate_obtained`, `dates_attendance`, `certification_examination`, `certifying_agency`, `date_certified`, `rating`, `position_designation`, `dates_of_employment`, `address_of_company`, `status_of_employment`, `designation_of_immediate`, `reasons_for_moving`, `responsibilities_in_position`, `case_of_self_employment`, `awards_conferred`, `conferring_organizations`, `date_awarded`, `community_awards_conferred`, `community_conferring_organizations`, `community_date_awarded`, `work_awards_conferred`, `work_community_conferring_organizations`, `work_community_date_awarded`, `accomplishment_description`, `date_accomplished`, `address_of_publishing`, `leisure_activities`, `special_skills`, `work_related_activities`, `volunteer_activities`, `travels_cite_places`, `essay_of_degree`, `declaration_place`, `declaration_day`, `declaration_month_year`, `printed_name`, `community_tax_certificate`, `issued_on`, `issued_at`, `status`, `created_at`, `updated_at`, `remarks`, `house_no`, `street`, `barangay`, `city`, `province`, `zipcode`, `country`) VALUES
(226, 39, 'VIctor', 'Sam', 'Andaya', '1', 'public/profile_images/1767924796.jpg', '1111-11-01', '1', 'Single', 'Male', '1', '1', '1', '1', '1', '1', '1', '1', '1 year', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '1', '1', '11', '1', '1', '1', '1', '1', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '1', '1111-11-11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1111-11-11', '1', 'Accepted by Admin', '2026-01-08 18:13:16', '2026-01-15 22:19:45', NULL, '1', '1', '1', '1', '1', '1', '1'),
(227, 41, 'Liane Jonyl', 'Andaya', 'Tomas', '1', 'public/profile_images/1768438609.png', '2000-01-01', 'CAB', 'Single', 'Male', '1', '1', '1', '1', '1', '1', '1', '1', '1 year', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '1', '1', '1', '1', '1', '1', '11', '1', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"11\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '\"[\\\"1\\\"]\"', '1', '1999-11-11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2000-11-11', '1', 'Accepted by Department Coordinator', '2026-01-14 16:56:49', '2026-01-16 06:24:57', NULL, '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `course_name`, `course_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'BS in Information Technology', 'BSIT', '2025-06-24 08:06:24', NULL),
(2, 2, 'BS in Computer Science', 'BSCS', '2025-06-24 08:06:24', NULL),
(3, 3, 'BS in Business Administration – HRDM', 'BSBA_HRDM', '2025-06-24 08:06:24', NULL),
(4, 3, 'BS in Business Administration – Marketing', 'BSBA_MKTG', '2025-06-24 08:06:24', NULL),
(5, 4, 'BSED in English', 'BSED_ENG', '2025-06-24 08:06:24', NULL),
(6, 4, 'BSED in Science', 'BSED_SCI', '2025-06-24 08:06:24', NULL),
(7, 4, 'Bachelor of Elementary Education', 'BEED', '2025-06-24 08:06:24', NULL),
(8, 5, 'BS in Nursing', 'BSN', '2025-06-24 08:06:24', NULL),
(9, 6, 'BS in Agriculture', 'BSA', '2025-06-24 08:06:24', NULL),
(10, 7, 'BS in Engineering', 'BSE', '2025-06-24 08:06:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', '2025-06-24 08:05:20', '2025-06-24 08:05:20'),
(2, 'Computer Science', '2025-06-24 08:05:20', '2025-06-24 08:05:20'),
(3, 'Business Administration', '2025-06-24 08:05:20', '2025-06-24 08:05:20'),
(4, 'Education', '2025-06-24 08:05:20', '2025-06-24 08:05:20'),
(5, 'Nursing', '2025-06-24 08:05:20', '2025-06-24 08:05:20'),
(6, 'Agriculture', '2025-06-24 08:05:20', '2025-06-24 08:05:20'),
(7, 'Engineering', '2025-06-24 08:05:20', '2025-06-24 08:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_schedules`
--

CREATE TABLE `interview_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` varchar(255) NOT NULL,
  `interview_location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interview_schedules`
--

INSERT INTO `interview_schedules` (`id`, `applicant_id`, `interview_date`, `interview_time`, `interview_location`, `created_at`, `updated_at`) VALUES
(58, 226, '2026-01-12', '8:00 AM - 10:00 AM', 'oad', '2026-01-11 18:38:23', '2026-01-11 18:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` text NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_08_080632_create_application_forms_table', 1),
(6, '2025_03_10_015453_create_courses_table', 2),
(7, '2025_03_10_015547_create_departments_table', 3),
(8, '2025_03_10_015905_create_requirements_table', 4),
(9, '2025_03_10_020219_add_department_and_course_fields_to_courses_table', 5),
(10, '2025_03_10_020357_add_name_to_departments_table', 6),
(11, '2025_03_11_012057_create_application_forms_table', 7),
(12, '2025_03_13_024812_create_application_forms__table', 8),
(13, '2025_03_13_031201_create_application_forms_table', 9),
(14, '2025_03_13_062455_create_application_forms_table', 10),
(15, '2025_03_13_075547_add_fields_to_application_forms_table', 11),
(16, '2025_03_14_012921_create_applicants_table', 12),
(17, '2025_03_18_023833_add_status_to_application_forms', 13),
(18, '2025_03_18_052816_add_role_to_users_table', 14),
(19, '2025_03_18_053442_add_role_to_users_table', 15),
(20, '2025_03_19_022141_create_interview_schedules_table', 16),
(21, '2025_03_19_050929_create_interview_schedules_table', 17),
(22, '2025_03_27_063310_create_announcements_table', 18),
(23, '2025_03_27_070727_add_logo_to_announcements', 19),
(24, '2025_04_02_012738_add_profile_image_to_application_forms', 20),
(25, '2025_04_07_071752_create_announcements_table', 21),
(26, '2025_04_10_063137_create_posts_table', 21),
(27, '2025_05_01_065551_add_submission_count_to_application_forms_table', 22),
(28, '2025_05_01_071540_remove_submission_count_from_application_forms', 22),
(29, '2025_05_01_071939_add_submission_count_to_users', 22),
(30, '2025_05_02_025839_create_sliders_table', 22),
(31, '2025_05_02_031548_update_title_nullable_in_sliders_table', 23),
(32, '2025_05_04_033042_create_jobs_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `description`) VALUES
(11, '2025-05-04 17:04:44', '2025-05-04 17:04:44', 'About the University', '<h3><img src=\"/upload/category/clsu-1_1746407033_68180e79c0a51.jpg\"><strong>Central Luzon State University</strong></h3><p>The Central Luzon State University (CLSU), one of the renowned and prestigious state institutions of higher learning in the country, straddles a 658-hectare campus in the Science City of Muñoz, Nueva Ecija, 150 kilometers north of Manila.</p><p>The lead agency of the Muñoz Science Community and the seat of Central Luzon Agriculture, Aquatic and Resources Research and Development Consortium (CLAARRDEC).</p><p>The university was designated by the Commission on Higher Education (CHED) – National Agriculture and Fisheries Education System (NAFES) as National University College of Agriculture (NUCA) and National University College of Fisheries (NUCF). Similarly, designated as CHED Center of Excellence (COE) in Agriculture, Agricultural Engineering, Biology, Fisheries, Teacher Education, and Veterinary Medicine - the most number of COEs in Central and Northern Luzon Regions. It is likewise designated as the Center of Research Excellence in Small Ruminants by the Philippine Council for Agriculture, Aquaculture, Forestry and Natural Resources Research and Development - Department of Science and Technology (PCAARRD-DOST). Also designated by the Department of Environment and Natural Resources (DENR) as the Regional Integrated Coastal Resources Management Center. Additionally, it was picked as the Model Agro-Tourism Site for Luzon.</p><p>CLSU stands out as the only comprehensive state university in the Philippines with the most number of curricular programs accredited by the Accrediting Agency of Chartered Colleges and Universities in the Philippines (AACCUP) with Level IV accreditation. The university is further declared Cultural Property of the Philippines with the code of PH-03-0027 due to its high historical, cultural, academic, and agricultural importance to the nation.</p><p>To date, CLSU remains as one of the premier institutions of agriculture in Southeast Asia known for its breakthrough researches in aquatic culture (pioneer in the sex reversal of tilapia), ruminant, crops, orchard, and water management, living through its vision of becoming “a world-class National Research University for science and technology in agriculture and allied fields.”</p>'),
(12, '2025-05-04 17:06:59', '2025-05-04 17:06:59', 'Brief History', '<figure class=\"image\"><img src=\"/upload/category/clac_1746407188_68180f144aaa3.jpg\"></figure><h3><strong>Central Luzon State University</strong></h3><p>The Central Luzon State University (CLSU) started as a farm school, the Central Luzon Agricultural School (CLAS), through Executive Order No. 10 issued on April 12, 1907 by the then Governor of the Province of Nueva Ecija, James F. Smith, who declared a public agricultural domain in Muñoz as the site of the agricultural school.</p><p>As a farm school, the major activities of CLAS included skills training and disciplined community life for farm productivity and sound family living. The students learned the rudiments of better farming methods, agricultural mechanics and homemaking arts. These activities soon evolved into a model vocational-agricultural teaching and learning program which became its legacy to the country in so far as the CLAS experience was concerned. As a result, CLAS became a byword for productive farming methods.</p><p>CLAS was converted into the Central Luzon Agricultural College (CLAC) by virtue of Executive Order No. 393 issued by then President Elpidio Quirino on December 31, 1950. The existence of CLAC coincided in large part to the early beginning of higher education in agriculture in the Philippines. It was the first state institution in the country to offer a four-year curriculum for training teachers of vocational agriculture. One of the unique features of this program was the requirement of practicum, a special instruction requiring certain hours per week of actual work. The underlying concerns in practicum were “learning-by- doing”, acquisition of practical skills and expertise; including the value and dignity of work; and forestalling the “white-collar” mentality. Hence, CLAC was known as “the mother of vocational agricultural schools” in the country.</p><p>CLAC became the Central Luzon State University on June 18, 1964 by virtue of Republic Act No. 4067. As embodied in its enabling act, the “University shall primarily give professional and technical training in agriculture and mechanic arts besides providing advanced instruction and promoting research in literature, philosophy, the sciences, technology and art”.</p><p>Now, for more than 100 years, CLSU stands proud as one of the more renowned and prestigious higher education institutions in the country. It straddles on a 658 hectare-campus in the Science City of Muñoz, Nueva Ecija, 150 kilometers north of Manila. Then and now, the university is a shining example of an institution that has dedicated itself to the task of producing well-trained people and providing services with an indelible mark of excellence.</p>'),
(13, '2025-05-04 17:09:33', '2025-05-04 17:09:33', 'Expand Tertiary Education Equivalency and Accreditation Program (ETEEAP)', '<p><img src=\"/upload/category/eteeap-2_1746407352_68180fb8c704d.jpg\">The ETEEAP is an educational assessment scheme that recognizes knowledge, skills, and prior learning obtained by any individual from non-formal and informal education experiences.</p>'),
(14, '2025-05-04 17:10:52', '2025-05-04 17:10:52', 'Board Of Regents', '<figure class=\"image\"><img src=\"/upload/category/486049701_970642521891332_7164386350910406730_n_1746407446_68181016a4a4d.jpg\"></figure>');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `original_school_credentials` varchar(255) DEFAULT NULL,
  `certificate_of_employment` varchar(255) DEFAULT NULL,
  `nbi_barangay_clearance` varchar(255) DEFAULT NULL,
  `recommendation_letter` varchar(255) DEFAULT NULL,
  `proficiency_certificate` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `user_id`, `original_school_credentials`, `certificate_of_employment`, `nbi_barangay_clearance`, `recommendation_letter`, `proficiency_certificate`, `uploaded_at`, `created_at`, `updated_at`) VALUES
(13, 24, '1767678388_c8142108-e7a2-462d-bf85-24d5e2fc5f63.jpg', '1767678393_342e63e4-e8cf-41d1-baf2-9a4881f63668.jpg', '1767678398_19bd48dd-dbcd-4dfe-8d79-f6e5a3b76873.jpg', '1767678420_22fbdd53-767f-419a-af4c-87381777bf90.jpg', '1767678428_download (4).jpg', NULL, '2026-01-05 18:30:54', '2026-01-05 21:47:08'),
(15, 27, '1767923749_eteeap.jpg', '1767849985_download (4).jpg', '1767923752_cls.png', '1767849993_download (4).jpg', '1767849998_download (4).jpg', NULL, '2026-01-07 21:26:24', '2026-01-08 17:55:52'),
(19, 39, '1767924674_68868588_898259540529556_8400922100734361600_n.jpg', '1767924687_download (4).jpg', '1767924706_68868588_898259540529556_8400922100734361600_n.jpg', '1767924710_download (4).jpg', '1767924714_download (4).jpg', NULL, '2026-01-08 18:11:14', '2026-01-08 18:11:54'),
(20, 41, '1768438507_kindpng_5427988.png', '1768438510_kindpng_5427988.png', '1768438514_kindpng_5427988.png', '1768438518_kindpng_5427988.png', '1768438525_kindpng_5427988.png', NULL, '2026-01-14 16:55:08', '2026-01-14 16:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'system_title', 'Eteeap', '2025-04-21 17:50:36', '2025-04-21 18:05:29'),
(2, 'system_logo', 'uploads/system/logo.png', '2025-04-21 17:50:36', '2026-01-07 23:24:29'),
(3, 'system_domain', 'Eteeap', '2025-04-21 18:59:32', '2025-04-21 18:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image_path`, `active`, `created_at`, `updated_at`) VALUES
(10, 'CLSU ETEEAP', 'uploads/sliders/1750378033.jfif', 1, '2025-05-04 17:01:06', '2025-06-19 16:07:13'),
(11, 'CLSU ETEEAP', 'uploads/sliders/1750378014.jpg', 1, '2025-05-04 17:01:20', '2025-06-19 16:06:54'),
(12, 'CLSU ETEEAP', 'uploads/sliders/1750377999.jfif', 1, '2025-05-04 17:01:35', '2025-06-19 16:06:39'),
(13, 'CLSU ETEEAP', 'uploads/sliders/1750377987.jpg', 1, '2025-05-04 17:01:59', '2025-06-19 16:06:27'),
(14, 'CLSU ETEEAP', 'uploads/sliders/1750377924.jfif', 1, '2025-05-04 18:12:16', '2025-06-19 16:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `submission_count` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `name`, `submission_count`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, '20260106001', 'Liane Jonyl A. Tomas', 1, 'admin@gmail.com', 2, '2026-01-05 17:27:02', '$2y$10$0kLssqLLd2Eq2civ0OIS3uPKn.d8RclA7CmcJzXRAtCRvhYc6zGOq', NULL, '2026-01-05 17:22:06', '2026-01-05 22:00:33'),
(27, '20260106002', 'Victor Sam R. Andaya', 2, 'user@gmail.com', 1, '2026-01-05 17:27:02', '$2y$10$0kLssqLLd2Eq2civ0OIS3uPKn.d8RclA7CmcJzXRAtCRvhYc6zGOq', NULL, '2026-01-05 17:22:06', '2026-01-07 21:29:04'),
(28, '20260106003', 'Mike Francis A. Vengazo', 1, 'assesor@gmail.com', 3, '2026-01-05 17:27:02', '$2y$10$0kLssqLLd2Eq2civ0OIS3uPKn.d8RclA7CmcJzXRAtCRvhYc6zGOq', NULL, '2026-01-05 17:22:06', '2026-01-05 22:00:33'),
(29, '20260106004', 'Lorenz S. Bocatot', 1, 'department@gmail.com', 4, '2026-01-05 17:27:02', '$2y$10$kiFUqHOJ1s9fUfzCG1Zw2OQvGjbhc7OGrlatmjCWUTtPx9LVDWvf6', NULL, '2026-01-05 17:22:06', '2026-01-15 22:27:59'),
(30, '20260106005', 'Joshua L. Bautista', 1, 'college@gmail.com', 5, '2026-01-05 17:27:02', '$2y$10$0kLssqLLd2Eq2civ0OIS3uPKn.d8RclA7CmcJzXRAtCRvhYc6zGOq', NULL, '2026-01-05 17:22:06', '2026-01-12 22:49:22'),
(39, '20260109001', 'Liane Tomas', 1, 'user3@gmail.com', 1, '2026-01-08 18:10:59', '$2y$10$4dYazcKvO3BnYgH9qNrGyuqGItZt3Q.VVX6Y7xgZPL.RRLns7/xIy', NULL, '2026-01-08 18:10:54', '2026-01-12 22:49:33'),
(40, '20260112001', 'Ria', 0, 'juliriya21@gmail.com', 1, '2026-01-11 22:44:20', '$2y$10$xJNHv1H27s3HXzxEuEYseO9wDMIx5Xggaacowl7MQevnhcXf9Resy', NULL, '2026-01-11 22:43:12', '2026-01-11 22:44:20'),
(41, '20260115001', 'Ivan', 1, 'ivansky573@gmail.com', 1, '2026-01-14 16:54:42', '$2y$10$bxfRLytqufBuUh1BH5ygO.A8QsObBnO3EtvZIOi6ZQySI7e6Sq9zK', 'fK7xoSmyqYGzyDSSSwgAGzrdC5cfCDEGF3vVVEyvgECUPk0iMt9xitq0qH7l', '2026-01-14 16:52:46', '2026-01-15 22:02:58'),
(42, '20260116001', 'vof', 0, 'vofaciw893@akixpres.com', 1, '2026-01-15 22:18:30', '$2y$10$QMrPts3Occ7Et7HjOF3LdOP4ZfF5ZKz5p4cXS8.eMZAPilXwrXkla', NULL, '2026-01-15 22:17:44', '2026-01-15 22:18:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_forms`
--
ALTER TABLE `application_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interview_schedules_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_forms`
--
ALTER TABLE `application_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_forms`
--
ALTER TABLE `application_forms`
  ADD CONSTRAINT `application_forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  ADD CONSTRAINT `interview_schedules_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `application_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
