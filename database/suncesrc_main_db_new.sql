-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2024 at 08:52 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suncesrc_main_db_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page_tabs`
--

CREATE TABLE `about_page_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_page_tabs`
--

INSERT INTO `about_page_tabs` (`id`, `name`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Suncity', 'Welcome to Suncity Polyclinic!', 'Located in Batha, Riyadh, Suncity Polyclinic is a modern healthcare facility dedicated to providing top-notch medical services since its establishment in July 2007. This clinic offers convenient features for all visitors, including extensive parking facilities and complimentary Wi-Fi.', 1, '2024-11-16 10:30:34', '2024-11-16 10:33:18'),
(2, 'Key Services & Facilities', 'To Accomodate All Patients', '<p>Emergency Care: Immediate support for critical health needs.</p><p>Ambulance Services: Ensuring timely transportation for patients in need.</p><p>Diverse Medical Team: Suncity Polyclinic boasts a highly skilled team of physicians and nurses from various nationalities, including Bangladeshi, Indian, Egyptian, Pakistani, and Nepali professionals, all committed to patient-centered care.</p><p>Outpatient Department: Capable of serving over 300 patients daily, across various specialized departments.</p><p>Insurance Services at Suncity Polyclinic Suncity Polyclinic partners with 20+ leading insurance providers to help you find the right health insurance plan in minutes, offering comprehensive coverage for various treatments.</p>', 1, '2024-11-16 10:41:59', '2024-11-16 10:41:59'),
(3, 'Our Vision & Mission', 'Our Vision & Mission', '<p>Vision: To be the premier healthcare provider for every patient.</p><p>Mission: To deliver compassionate, high-quality healthcare and foster an environment for research and learning.</p>', 1, '2024-11-18 17:45:19', '2024-11-18 17:45:19'),
(4, 'Our Values', 'Our Values', '<p>Patient-Centric Care: Prioritizing the needs of patients and families, ensuring their active participation in decisions, and fostering open communication.</p><p>Safety: Implementing best practices to deliver safe, reliable care.</p><p>Excellence: Offering exceptional clinical care and patient experience, alongside educational opportunities for healthcare providers.</p><p>Accountability: Ensuring responsibility across all organizational levels to maintain the highest standards of healthcare delivery.</p>', 1, '2024-11-18 17:45:57', '2024-11-18 17:45:57'),
(5, '24/7 Fast Support:', '24/7 Fast Support:', '<p>Around-the-Clock Availability: We’re here for you 24 hours a day, ensuring accessible support through:</p><p>Customer Service: Prompt assistance for all inquiries.</p><p>Information Screening: Guidance on services and procedures.</p><p>Live Chat: Instant online support.</p><p>Scheduling &amp; Appointments: Easy booking options to fit your schedule.</p>', 1, '2024-11-18 17:46:17', '2024-11-18 17:46:17'),
(6, 'Strategic Focus & Social Commitment', 'Strategic Focus & Social Commitment', '<p>Inclusive Access: Our services are available to everyone in need.</p><p>Core Specialties: We emphasize our strengths in specific medical fields.</p><p>World-Class Experience: Committed to excellence in patient care, safety, and overall experience.</p><p>Community Impact: We prioritize positive contributions to the communities and environment we serve.</p><p>Ethical Standards: We operate with the highest ethical and legal standards to support and enhance our healthcare services.</p>', 1, '2024-11-18 17:46:34', '2024-11-18 17:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `app_links`
--

CREATE TABLE `app_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `folder_indexing` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `icon` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_links`
--

INSERT INTO `app_links` (`id`, `name`, `route`, `parent_id`, `folder_indexing`, `type`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Project Settings', NULL, 0, 13, 'folder', 8, '0', '2023-08-14 07:56:06', '2024-11-17 03:10:51'),
(2, 'HCL Links', 'app-links.index', 1, NULL, 'link', NULL, '1', '2023-08-14 07:57:15', '2023-08-18 22:54:45'),
(3, 'Role & Permissions', 'roles.index', 1, NULL, 'link', NULL, '1', '2023-08-14 07:59:05', '2023-08-14 07:59:05'),
(4, 'Notifications', NULL, 0, 99, 'folder', 19, '0', '2023-08-14 12:22:45', '2024-11-17 02:55:28'),
(5, 'Create', 'notifications.create', 4, NULL, 'link', NULL, '1', '2023-08-14 12:23:37', '2023-08-14 12:23:37'),
(6, 'List', 'notifications.index', 4, NULL, 'link', NULL, '1', '2023-08-14 12:24:04', '2023-08-14 12:24:04'),
(8, 'Categories', 'categories.index', 0, 9, 'folder', 10, '0', '2023-08-17 03:48:25', '2024-11-18 01:59:47'),
(9, 'Department List', 'departments.index', 0, 8, 'folder', 0, '1', '2023-08-17 03:52:24', '2024-11-17 02:58:22'),
(18, 'Contact Email List', 'contacts.index', 0, 7, 'folder', 25, '1', '2023-09-02 01:08:40', '2024-11-17 02:58:22'),
(19, 'Blogs', 'blogs.index', 0, 10, 'folder', 1, '1', '2023-09-02 05:53:39', '2024-11-18 01:59:37'),
(20, 'App Settings', NULL, 0, 12, 'folder', 0, '1', '2024-06-12 03:08:46', '2024-11-17 02:58:22'),
(21, 'Slider List', 'home-page-sliders.index', 50, NULL, 'link', NULL, '1', '2024-06-12 03:09:20', '2024-11-17 03:10:17'),
(24, 'Testimonial List', 'testimonials.index', 20, NULL, 'link', NULL, '1', '2024-06-12 07:15:37', '2024-06-12 07:15:37'),
(25, 'Health Insurance', 'healthInsurance', 50, NULL, 'link', NULL, '1', '2024-06-12 07:31:09', '2024-11-16 05:54:27'),
(26, 'Achievements Countdown Info', 'businessInfo', 0, 11, 'folder', 17, '1', '2024-06-13 03:38:02', '2024-11-17 02:58:22'),
(29, 'Consult Our Doctors', 'consultDoctors', 30, NULL, 'link', NULL, '1', '2024-06-14 08:11:52', '2024-11-15 21:31:39'),
(30, 'About Page', NULL, 0, 6, 'folder', 17, '1', '2024-06-14 08:46:59', '2024-11-17 02:58:22'),
(43, 'Contact Details', 'contactInfo', 0, 5, 'folder', 12, '1', '2024-06-15 09:51:31', '2024-11-17 02:58:22'),
(45, 'Doctor List', 'doctors.index', 0, 2, 'folder', 26, '1', '2024-11-12 21:23:39', '2024-11-17 02:58:22'),
(46, 'Services', 'services.index', 0, 4, 'folder', 13, '1', '2024-11-14 02:06:45', '2024-11-17 02:58:22'),
(47, 'Appointment List', 'appointment.list', 0, 3, 'folder', 1, '1', '2024-11-14 04:13:44', '2024-11-17 02:58:22'),
(48, 'Suncity Dental care', 'sunCityDentalCare', 20, NULL, 'link', NULL, '1', '2024-11-15 11:59:47', '2024-11-15 11:59:47'),
(49, 'Health Packages', 'health-packages.index', 50, NULL, 'link', NULL, '1', '2024-11-15 23:06:36', '2024-11-16 05:58:24'),
(50, 'Suncity', NULL, 0, 1, 'folder', 2, '1', '2024-11-16 04:05:07', '2024-11-17 02:58:22'),
(51, 'Photo Gallery', 'photoGallery', 50, NULL, 'link', NULL, '1', '2024-11-16 04:07:40', '2024-11-16 04:07:40'),
(52, 'Video Gallery', 'video-galleries.index', 50, NULL, 'link', NULL, '1', '2024-11-16 05:48:47', '2024-11-16 05:48:47'),
(53, 'Logo & Favicon Set', 'logoFavicon', 20, NULL, 'link', NULL, '1', '2024-11-17 02:54:28', '2024-11-17 02:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `description`, `image`, `view_count`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 9, 'Effects of Tobacco Use on Oral Health', '<p>Tobacco use has long been associated with numerous health problems, but its impact on dental health is often overlooked. When it comes to maintaining a healthy and beautiful smile, tobacco use can have devastating effects.&nbsp;</p><h2>1. Tooth Discoloration</h2><p>One of the most common dental issues caused by tobacco use is <a href=\"https://www.goldenstatedentistry.com/blog/causes-of-tooth-discoloration-and-how-to-prevent-and-treat-it\">tooth discoloration</a>. The nicotine and tar present in cigarettes can stain the teeth, leaving them yellow or brown in appearance. This not only affects the aesthetic appeal of your smile but also indicates poor oral hygiene.</p><h2>2. Increased Risk for Gum Disease</h2><p>Furthermore, tobacco use greatly increases the risk of developing <a href=\"https://www.goldenstatedentistry.com/blog/5-signs-you-may-have-gum-disease\">gum disease</a>. The chemicals in tobacco products irritate the gums, causing them to become inflamed and prone to infection. This can lead to <a href=\"https://www.goldenstatedentistry.com/blog/receding-gums-causes-symptoms-treatment-prevention\">gum recession</a>, tooth loss, and even bone damage if left untreated. Additionally, smoking weakens the immune system, making it harder for your body to fight off infections, including those in the mouth.</p><h2>3. Bad Breath</h2><p>Smokers are also more likely to experience <a href=\"https://www.goldenstatedentistry.com/blog/7-common-causes-of-bad-breath\">bad breath</a>, also known as halitosis. The combination of tobacco smoke and the build-up of bacteria in the mouth creates an unpleasant odor that can be difficult to mask. This can be embarrassing in social situations and can negatively impact your self-confidence.</p><h2>4. Dry Socket</h2><p>Smokers are three times more likely to develop a dry socket following a tooth extraction. A dry socket occurs when there is improper healing at the site of extraction, and a blood clot at the site does not form, comes out, or dissolves before the wound is healed. A dry socket is very painful because it exposes the underlying nerves and jawbone at the socket and delays healing.&nbsp;</p><h2>5. Increased Risk of Oral Cancer</h2><p>In addition to these oral health issues, tobacco use has been linked to an increased risk of oral cancer. The chemicals in tobacco products can damage the cells in the mouth and throat, leading to the development of cancerous tumors. Early detection and treatment are crucial for a positive outcome, but prevention by quitting tobacco use altogether is the best approach.</p><h2>Conclusion</h2><p>To protect your dental health, it is crucial to quit tobacco use. Not only will this improve the appearance of your smile, but it will also reduce your risk of gum disease, bad breath, and oral cancer. If you are struggling to quit, consider seeking support from healthcare professionals or support groups dedicated to helping individuals overcome tobacco addiction.</p>', 'media/uploads/blog-images/173199489426.jpg', 16, 1, '2023-09-02 02:00:32', '2024-11-29 11:51:05'),
(2, NULL, 9, 'Tooth Scaling and Root Planing: Everything You Need to Know About Deep Cleaning', '<h2>What is Tooth Scaling and Root Planing?</h2><p>Scaling and Root Planing, otherwise know as deep cleaning, is a procedure that gets rid of tartar (hardened minerals) buildup from your teeth and root surfaces. This nonsurgical procedure treats and sometimes reverses early stages of periodontal (gum) disease.&nbsp;</p><h2>What are the benefits of Tooth Scaling and Root Planing?</h2><p>Scaling and root planing offers several key benefits for those with gum disease.</p><p><strong>1. Stops gum disease progression</strong></p><p>SRP helps prevent gum disease from progressing by removing plaque and tartar, stopping further inflammation and infection.</p><p><strong>2. Reduces gum inflammation and bleeding</strong></p><p>This procedure also reduces gum inflammation and bleeding, allowing the gums to heal and return to a healthy state.</p><p><strong>3. Eliminates bad breath</strong></p><p>By eliminating the bacteria responsible for bad breath, it can significantly improve breath quality.</p><p><strong>4. Prevents tooth loss</strong></p><p>Scaling and root planing helps prevent tooth loss by protecting the supporting tissue and bone from damage.</p><p><strong>5. Improves overall health</strong></p><p>maintaining healthy gums through a deep cleaning treatment can improve overall health, as gum disease is linked to conditions like heart disease and diabetes.</p><h2>Who needs Tooth Scaling and Root Planing?</h2><p>The best candidate for scaling and root planing in Walnut Creek, CA is someone, who is showing signs of existing <a href=\"https://www.goldenstatedentistry.com/blog/5-signs-you-may-have-gum-disease\">gum disease</a>. These signs include:</p><p>1. Periodontal pockets greater than 4mm&nbsp;</p><p>2. Significant plaque and tartar below the gumline</p><p>3. Persistent bad breath</p><p>4. Red, swollen gums</p><p>5. Bleeding when brushing or flossing your teeth</p><p>6. Bone loss visible on a <a href=\"https://www.goldenstatedentistry.com/blog/dental-xrays-why-they-are-important\">dental x-ray</a></p><p>7. Noticeable tooth movement/mobility</p><p>8. <a href=\"https://www.goldenstatedentistry.com/blog/receding-gums-causes-symptoms-treatment-prevention\">Gum recession</a>&nbsp;</p><p>Generally, people at higher risk of gum disease, such as smokers, people with diabetes, pregnant women, or people with a history of dental disease, may benefit from a deep cleaning.</p><p>During a routine dental exam, <a href=\"https://www.goldenstatedentistry.com/our-team\">our team</a> can determine whether root scaling and root planing is right for your oral health situation.&nbsp;</p><h2>What should you expect from a Tooth Scaling and Root Planing Procedure?</h2><p>Scaling and root planing is typically performed in two one-hour appointments, two mouth quadrants at a time. The procedure can also be performed in all in one day, if the patient so desires.</p><p><strong>Part 1:Tooth Scaling</strong></p><p>Your dentist will start the deep cleaning by numbing an entire side of your mouth. Then the dentist will scale and remove the hardened plaque and buildup from your teeth above and below the gumline, down to the very bottom of the periodontal pocket.</p><p><strong>Part 2: Root Planing</strong></p><p>After removing the plaque, your dentist will smooth out (plane) the rough surfaces on the roots of your teeth. Smoothing the root surface helps prevent bacteria, plaque, and tartar from reattaching to your teeth below the gumline. Root planing also allows your gums to firmly reattach to your teeth and heal.</p><h2>What should you expect after the procedure?</h2><p>Scaling and root planing typically leaves the gums tender and the teeth sensitive for up to a week. Your gums may also bleed and feel swollen. You can manage any discomfort with over-the-counter pain medication, like ibuprofen or acetaminophen.</p>', 'media/uploads/blog-images/173191468989.jpg', 5, 1, '2023-09-03 12:14:35', '2024-11-23 00:57:15'),
(3, NULL, 9, '5 Common Dental Emergencies That Require An Immediate Dental Visit', '<p><strong>Dental emergencies can strike at any time, often causing severe pain and discomfort. Knowing which situations require an immediate dental visit can save your teeth and alleviate unnecessary suffering.</strong></p><h2>1. Severe Toothache</h2><p>A severe toothache can be a sign of a serious dental issue, such as an infection or <a href=\"https://www.goldenstatedentistry.com/blog/top-causes-of-tooth-decay\">deep decay</a>. When the pain becomes unbearable, it\'s crucial to see your Walnut Creek dentist immediately to determine the cause and receive appropriate treatment. Ignoring a <a href=\"https://www.goldenstatedentistry.com/blog/10-common-causes-of-a-toothache-and-suggested-treatment-options\">severe toothache</a> can lead to more complicated problems, including abscesses and tooth loss.</p><p>In the meantime, you can try rinsing your mouth with warm salt water and taking over-the-counter pain relievers to manage the pain. However, these are temporary measures, and only a professional dental evaluation can provide a permanent solution.</p><h2>2. Broken or Chipped Tooth</h2><p>A broken or chipped tooth can occur due to various reasons such as biting down on something hard or experiencing trauma to the face. When this happens, it\'s important to see a dentist as soon as possible to prevent further damage and restore the tooth\'s functionality.</p><p>In the interim, rinse your mouth with warm water and try to save any pieces of the tooth. Apply a cold compress to the outside of your mouth to reduce swelling, and avoid using the affected tooth until you can get professional dental care.</p><h2>3. Knocked-Out Tooth</h2><p>A knocked-out tooth is one of the most urgent dental emergencies. If you act quickly, there\'s a good chance the tooth can be reimplanted. First, retrieve the tooth, holding it by the crown (the top part), and avoid touching the root. Rinse it gently with water if it\'s dirty, but don\'t scrub it or remove any attached tissue fragments.</p><p>Try to place the tooth back in its socket if possible. If that\'s not feasible, keep it moist by placing it in a container of milk or a saline solution. Get to your <a href=\"https://www.zocdoc.com/practice/golden-state-dentistry-94096?lock=true&amp;isNewPatient=false&amp;referrerType=widget&amp;__hstc=261236434.14d23dae5c91ac784c3cd0089145bb87.1712701108429.1728422301786.1728673225147.25&amp;__hssc=261236434.10.1728673225147&amp;__hsfp=81399884&amp;hsCtaTracking=c097b52b-622c-447c-b1c9-d4ef6d17bbf9%7Cadcf67e1-4a45-4164-a168-f8ef9a857a38\">Walnut Creek dentist</a> immediately, ideally within 30 minutes, to increase the chances of successful reimplantation.</p><h2>4. Lost Filling or Crown</h2><p>Losing a <a href=\"https://www.goldenstatedentistry.com/blog/composite-fillings-a-better-alternative-to-amalgam\">filling</a> or a <a href=\"https://www.goldenstatedentistry.com/blog/dental-crowns-everything-you-need-to-know\">dental crown</a> can often leave your sensitive nerves and dental pulp exposed, which can cause radiating pain and lead to an infection. It\'s important to see a dentist as soon as possible to replace the restoration and protect the tooth.</p><p>Until you can get to the dentist, try to keep the area clean and avoid chewing on the affected side. You can use dental cement, available at most pharmacies, to temporarily cover the exposed area and protect it from further damage.</p><h2>5. Abscessed Tooth</h2><p>An abscessed tooth is a serious infection that can cause severe pain, swelling, and even fever. It typically occurs due to untreated cavities, <a href=\"https://www.goldenstatedentistry.com/blog/5-signs-you-may-have-gum-disease\">gum disease</a>, or trauma to the tooth. Recognizing the symptoms early and seeking immediate dental care is crucial to prevent the infection from spreading.</p>', 'media/uploads/blog-images/173191467746.jpg', 15, 1, '2023-09-03 12:14:59', '2024-11-23 00:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Chefwear', 1, '2023-08-17 07:21:51', '2023-08-19 09:12:26'),
(3, 'Dresses / Jumpsuits', 1, '2023-08-19 09:12:39', '2023-08-19 09:12:39'),
(4, 'Footwear', 1, '2023-08-19 09:12:53', '2023-08-19 09:12:53'),
(5, 'Innerwear', 1, '2023-08-19 09:13:06', '2023-08-19 09:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'John Hans', 'faruk.bm01@gmail.com', '0', 'ggh', '2024-11-18 04:11:59', '2024-11-18 04:11:59'),
(2, 'John Hans', 'faruk.bm01@gmail.com', '0', 'ggh', '2024-11-18 04:12:45', '2024-11-18 04:12:45'),
(3, 'Md Omar Faruk', 'faruk.bddevs@gmail.com', '0', 'gsd', '2024-11-18 04:12:56', '2024-11-18 04:12:56'),
(4, 'Md Omar Faruk', 'faruk.bddevs@gmail.com', '0', 'gsdf', '2024-11-18 04:13:23', '2024-11-18 04:13:23'),
(5, 'John Hans', 'faruk.bm02@gmail.com', '0', 'gsdf', '2024-11-18 04:14:29', '2024-11-18 04:14:29'),
(6, 'James', 'faruk.bm01@gmail.com', '0', 'sgsdf', '2024-11-18 04:15:25', '2024-11-18 04:15:25'),
(7, 'John Hans', 'faruk.bm01@gmail.com', '0', 'sgsdf', '2024-11-18 04:18:19', '2024-11-18 04:18:19'),
(8, 'John Hans', 'faruk.bm01@gmail.com', '0', 'gsfd', '2024-11-18 04:20:44', '2024-11-18 04:20:44'),
(9, 'John Hans', 'faruk.bm01@gmail.com', '0', 'asdf', '2024-11-18 04:21:17', '2024-11-18 04:21:17'),
(10, 'Omar Faruk', 'faruk@bddevs.com', '0', 'I want to this service', '2024-11-18 15:43:29', '2024-11-18 15:43:29'),
(11, 'abcd test', 'altafhossain@suncity.com', '0', 'hy', '2024-11-18 15:49:48', '2024-11-18 15:49:48'),
(12, 'Book Station Bd', 'faruk.bm01@gmail.com', '0', 'tr', '2024-11-18 16:03:55', '2024-11-18 16:03:55'),
(13, 'Mr Fazle Rabbi', 'arman@gmail.com', '0', 'this aramn', '2024-11-18 21:15:00', '2024-11-18 21:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `image` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ophthalmology', 'Enhancing Vision Care for a Brighter Tomorrow', 'media/uploads/departments/173150120160.jpg', 'Our Ophthalmology Department is dedicated to providing compassionate, high-quality eye care. With a focus on advanced diagnostics and personalized treatments, we aim to improve vision health and enhance quality of life. Our skilled team is committed to delivering excellence in every patient experience.', 1, '2024-11-12 22:12:51', '2024-11-13 06:33:21'),
(2, 'Gynecology', 'Comprehensive Care in Gynecology: Ensuring Women\'s Health and Wellness', 'media/uploads/departments/173195653135.jpg', 'Gynecology is the medical practice that focuses on the health of the female reproductive system, including the uterus, ovaries, fallopian tubes, and vagina. It addresses a range of conditions and provides preventive care, diagnostics, and treatments for various health concerns.\r\n\r\nKey Areas in Gynecology:\r\nPreventive Care:\r\n\r\nRoutine pelvic exams.\r\nPap smears for cervical cancer screening.\r\nHPV vaccinations.\r\nBreast exams.\r\nCommon Conditions:\r\n\r\nMenstrual disorders (e.g., heavy bleeding, irregular cycles).\r\nPolycystic Ovary Syndrome (PCOS).\r\nEndometriosis.\r\nPelvic inflammatory disease (PID).\r\nUterine fibroids.\r\nVaginal infections (e.g., yeast infections, bacterial vaginosis).\r\nReproductive Health:\r\n\r\nContraceptive counseling.\r\nFertility evaluations and treatments.\r\nManagement of menopause and hormone therapy.\r\nPregnancy-related conditions (e.g., ectopic pregnancies).\r\nSurgical Interventions:\r\n\r\nHysterectomy.\r\nLaparoscopy and hysteroscopy.\r\nMyomectomy for fibroids.\r\nSurgical treatment of ovarian cysts.\r\nCancer Management:\r\n\r\nScreening and treatment of gynecological cancers (cervical, ovarian, uterine, vaginal, and vulvar).', 1, '2024-11-13 03:37:31', '2024-11-19 00:02:11'),
(3, 'Dialectology', NULL, '', NULL, 1, '2024-11-13 03:37:31', '2024-11-13 03:37:31'),
(4, 'Internal Medicine', 'Expert Care in Internal Medicine: Diagnosing, Treating, and Preventing Adult Diseases', 'media/uploads/departments/173195909459.jpg', 'Key Areas of Focus in Internal Medicine:\r\nPreventive Care:\r\n\r\nHealth screenings (e.g., diabetes, hypertension, cholesterol).\r\nImmunizations and vaccinations.\r\nLifestyle counseling (e.g., smoking cessation, diet, exercise).\r\nDiagnosis and Management of Diseases:\r\n\r\nCardiovascular Disorders: Hypertension, heart failure, coronary artery disease.\r\nEndocrine Disorders: Diabetes, thyroid disorders, adrenal and pituitary issues.\r\nRespiratory Conditions: Asthma, COPD, pneumonia.\r\nGastrointestinal Issues: GERD, liver diseases, irritable bowel syndrome.\r\nRenal Diseases: Chronic kidney disease, electrolyte imbalances.\r\nHematologic Disorders: Anemia, clotting disorders.\r\nInfectious Diseases: Viral and bacterial infections, tuberculosis, HIV/AIDS.\r\nChronic Disease Management:\r\n\r\nLong-term care for conditions like diabetes, hypertension, and arthritis.\r\nCoordination with other specialists as needed.\r\nHospital and Critical Care:\r\n\r\nExpertise in managing acutely ill patients in hospital settings.\r\nCare in intensive care units (ICU) for severe conditions.\r\nDiagnostic Expertise:\r\n\r\nSkilled in interpreting lab tests, imaging, and other diagnostic tools.\r\nDifferential diagnosis of complex symptoms.\r\nSubspecialties in Internal Medicine:\r\nCardiology (heart).\r\nEndocrinology (hormones).\r\nGastroenterology (digestive system).\r\nPulmonology (lungs).\r\nRheumatology (joints and autoimmune diseases).\r\nHematology (blood).\r\nInfectious Diseases.\r\nNephrology (kidneys).', 1, '2024-11-13 03:37:31', '2024-11-19 00:44:54'),
(5, 'Family Medicine', 'Family Medicine: Comprehensive, Continuous, and Holistic Care for All Ages and Stages of Life', 'media/uploads/departments/173195950364.jpg', 'Key Aspects of Family Medicine:\r\nPreventive Care:\r\n\r\nRoutine check-ups and health screenings.\r\nImmunizations and vaccinations.\r\nLifestyle counseling (diet, exercise, smoking cessation).\r\nManagement of Acute and Chronic Conditions:\r\n\r\nAcute illnesses like infections, minor injuries, and respiratory conditions.\r\nChronic diseases such as diabetes, hypertension, asthma, and arthritis.\r\nComprehensive Care Across Ages:\r\n\r\nPediatrics: Growth monitoring, immunizations, and common childhood illnesses.\r\nAdolescents: Guidance on mental health, puberty, and lifestyle choices.\r\nAdults: Management of chronic conditions and preventive screenings.\r\nElderly: Geriatric care, fall prevention, and cognitive health.\r\nFamily-Centered Approach:\r\n\r\nAddressing family health dynamics and hereditary conditions.\r\nCounseling for mental and emotional well-being.\r\nContinuity of Care:\r\n\r\nBuilding long-term relationships with patients.\r\nCoordinating with specialists when needed and managing transitions of care.\r\nKey Competencies of Family Physicians:\r\nBroad medical knowledge spanning multiple disciplines.\r\nEmphasis on patient education and shared decision-making.\r\nExpertise in handling undifferentiated and multi-system diseases.\r\nScope of Practice:\r\nFamily medicine is one of the most versatile specialties, often encompassing:\r\n\r\nOffice-based care.\r\nMinor surgical procedures.\r\nObstetric care in some settings.\r\nGeriatric and palliative care.\r\nFamily physicians play a critical role in fostering health and wellness within communities by providing accessible and continuous care tailored to the individual and family.', 1, '2024-11-13 03:37:31', '2024-11-19 00:51:43'),
(6, 'Orthopedic', 'Orthopedics: Advanced Care for Bones, Joints, and Musculoskeletal Health', 'media/uploads/departments/173195979429.jpg', 'Key Areas in Orthopedics:\r\nBone Disorders:\r\n\r\nFractures and dislocations.\r\nOsteoporosis and bone density disorders.\r\nBone infections (osteomyelitis).\r\nJoint Disorders:\r\n\r\nArthritis (osteoarthritis, rheumatoid arthritis).\r\nJoint injuries (e.g., ACL tears, meniscal injuries).\r\nJoint replacements (hip, knee, and shoulder arthroplasties).\r\nSpinal Disorders:\r\n\r\nScoliosis and spinal deformities.\r\nHerniated discs and sciatica.\r\nSpinal fractures and stenosis.\r\nSports Injuries:\r\n\r\nSprains, strains, and overuse injuries.\r\nRotator cuff injuries and tennis elbow.\r\nRehabilitation and return-to-play guidance.\r\nPediatric Orthopedics:\r\n\r\nCongenital abnormalities (e.g., clubfoot, hip dysplasia).\r\nGrowth-related conditions (e.g., scoliosis, limb length discrepancies).\r\nTrauma and Emergencies:\r\n\r\nComplex fractures and polytrauma management.\r\nOpen wounds involving tendons or bones.\r\nCommon Orthopedic Treatments:\r\nNon-Surgical:\r\n\r\nPhysical therapy and rehabilitation.\r\nMedications (pain relievers, anti-inflammatories).\r\nBracing and orthotics.\r\nSurgical:\r\n\r\nFracture fixation (internal and external).\r\nArthroscopy for minimally invasive joint repair.\r\nJoint replacement and reconstruction.\r\nCorrective surgeries for deformities.\r\nSubspecialties in Orthopedics:\r\nSports Medicine.\r\nSpine Surgery.\r\nJoint Replacement.\r\nTrauma Surgery.\r\nPediatric Orthopedics.\r\nHand and Upper Limb Surgery.\r\nFoot and Ankle Surgery', 1, '2024-11-13 03:37:31', '2024-11-19 00:56:34'),
(7, 'Pediatric', 'Comprehensive Overview of Pediatrics: Roles, Training, Subspecialties, and Key Skills', 'media/uploads/departments/173199330257.jpg', 'Role of a Pediatrician\r\nA pediatrician is a doctor who manages the physical, behavioral, and mental health of children. They provide care for a wide range of medical issues, from minor illnesses to serious health conditions, and help in preventive health care.\r\n\r\nKey Responsibilities:\r\nPreventive Care:\r\n\r\nAdministering immunizations.\r\nMonitoring growth and development.\r\nEducating parents about nutrition, safety, and behavior.\r\nDiagnosis and Treatment:\r\n\r\nIdentifying and treating common illnesses like infections and allergies.\r\nManaging chronic conditions like asthma, diabetes, and congenital disorders.\r\nSpecialist Referral:\r\n\r\nDirecting patients to pediatric sub-specialists for conditions beyond their expertise.\r\nFamily Support:\r\n\r\nOffering guidance on emotional and social development.\r\nAssisting with coping strategies for illnesses or disabilities.\r\nSubspecialties in Pediatrics\r\nNeonatology: Care of premature and critically ill newborns.\r\nPediatric Cardiology: Diagnosis and management of heart conditions in children.\r\nPediatric Endocrinology: Treating growth disorders, diabetes, and hormonal issues.\r\nPediatric Neurology: Managing neurological disorders like epilepsy or developmental delays.\r\nPediatric Oncology: Diagnosis and treatment of cancers in children.\r\nPediatric Surgery: Performing surgical interventions for congenital and acquired conditions.\r\nTraining Pathway\r\nMedical School: 5–6 years (depending on the country).\r\nPediatrics Residency: 3–4 years of specialized training in pediatrics.\r\nFellowship (Optional): 1–3 years for subspecialization.\r\nLicensure and Certification: Depending on regional boards (e.g., RCPCH, ABP).\r\nCommon Pediatric Conditions\r\nNewborn Concerns:\r\nJaundice\r\nFeeding issues\r\nCongenital abnormalities\r\nChildhood Illnesses:\r\nRespiratory infections (bronchiolitis, pneumonia)\r\nGastroenteritis\r\nEar infections\r\nChronic Conditions:\r\nAsthma\r\nADHD (Attention Deficit Hyperactivity Disorder)\r\nAutism Spectrum Disorders\r\nVaccination-Preventable Diseases:\r\nMeasles, Mumps, Rubella\r\nPolio\r\nDiphtheria\r\nKey Skills for Pediatricians\r\nStrong communication with children and parents.\r\nPatience and empathy.\r\nClinical expertise in managing diverse conditions.\r\nAnalytical skills for diagnosis and treatment planning.\r\nPediatrics in Practice\r\nWorkplaces:\r\n\r\nHospitals\r\nClinics\r\nCommunity health centers\r\nSpecialized care units (NICUs, PICUs)\r\nWork-Life Balance:\r\n\r\nShift patterns can vary, especially in hospital settings.\r\nCommunity pediatricians often have more predictable hours.\r\nScope:\r\n\r\nPreventive medicine is a large component.\r\nOpportunities for research and teaching', 1, '2024-11-13 03:37:31', '2024-11-19 10:15:02'),
(8, 'Dermatology', NULL, '', NULL, 1, '2024-11-13 03:37:31', '2024-11-13 03:37:31'),
(9, 'Dental', 'Comprehensive Overview of Dentistry: Roles, Training, Specializations, and Key Procedures', 'media/uploads/departments/173199355430.jpg', 'Role of a Dentist\r\nA dentist ensures oral health through preventive, diagnostic, and therapeutic care. Their expertise helps in maintaining the functional and aesthetic aspects of the oral cavity.\r\n\r\nKey Responsibilities:\r\nPreventive Care:\r\n\r\nEducating patients on oral hygiene and nutrition.\r\nConducting regular dental check-ups and cleanings.\r\nApplying fluoride treatments and sealants.\r\nDiagnosis and Treatment:\r\n\r\nTreating dental issues such as cavities, gum diseases, and infections.\r\nPerforming procedures like root canals, extractions, and fillings.\r\nCosmetic Dentistry:\r\n\r\nTeeth whitening and veneers.\r\nAligning teeth using braces or clear aligners.\r\nSurgical Care:\r\n\r\nCorrective jaw surgery.\r\nDental implants and wisdom tooth extraction.\r\nCollaboration:\r\n\r\nWorking with orthodontists, periodontists, and other specialists for comprehensive care.\r\nSpecializations in Dentistry\r\nOrthodontics: Correcting alignment issues with braces or aligners.\r\nPeriodontics: Focused on gum diseases and supporting structures.\r\nEndodontics: Specializing in root canal treatments.\r\nOral and Maxillofacial Surgery: Managing facial trauma, tumors, or corrective surgeries.\r\nProsthodontics: Designing and fitting dentures, crowns, and bridges.\r\nPediatric Dentistry: Oral care for children.\r\nCosmetic Dentistry: Aesthetic enhancements to improve smiles.\r\nTraining Pathway\r\nUndergraduate Degree: Bachelor’s in Dentistry (BDS or DDS) – 4–6 years.\r\nInternship/Residency: Practical training in clinical dentistry.\r\nLicensing: Passing regional licensing exams.\r\nSpecialization (Optional): 2–4 years for advanced fields like oral surgery or orthodontics.\r\nCommon Dental Procedures\r\nDiagnostic:\r\nX-rays and oral exams.\r\nRestorative:\r\nFillings, crowns, and bridges.\r\nPreventive:\r\nCleanings and sealants.\r\nSurgical:\r\nWisdom tooth extractions and implants.\r\nAesthetic:\r\nTeeth whitening and reshaping.\r\nKey Skills for Dentists\r\nManual Dexterity: Precision in handling tools.\r\nCommunication: Explaining procedures and care instructions.\r\nAttention to Detail: Accurate diagnosis and treatment.\r\nEmpathy: Reducing patient anxiety during procedures.\r\nScope and Workplaces\r\nPrivate Practice: Owning or working in dental clinics.\r\nHospitals: Handling oral surgeries or trauma cases.\r\nAcademia and Research: Teaching future dentists or advancing techniques.\r\nCommunity Services: Providing care in underserved areas', 1, '2024-11-13 03:37:31', '2024-11-19 10:19:14'),
(10, 'Laboratory', 'Laboratory Medicine: Essential Diagnostics for Disease Detection and Patient Care', 'media/uploads/departments/173196015712.jpg', 'Key Areas of Laboratory Medicine:\r\nClinical Chemistry:\r\n\r\nTesting blood, urine, and other fluids for biomarkers like glucose, cholesterol, and electrolytes.\r\nEnzyme, hormone, and protein level assessments.\r\nHematology:\r\n\r\nAnalysis of blood components, such as red and white blood cells and platelets.\r\nScreening for anemia, clotting disorders, and blood cancers.\r\nMicrobiology:\r\n\r\nIdentification of bacterial, viral, fungal, and parasitic infections.\r\nAntibiotic susceptibility testing.\r\nImmunology and Serology:\r\n\r\nTesting for immune responses, autoimmune diseases, and infections (e.g., HIV, hepatitis).\r\nAllergy testing and antigen-antibody reactions.\r\nMolecular Diagnostics:\r\n\r\nDetection of genetic mutations and infectious agents through DNA/RNA analysis.\r\nTechniques like PCR (Polymerase Chain Reaction).\r\nPathology:\r\n\r\nExamination of tissue and cellular samples for cancer, infections, and other abnormalities.\r\nBlood Banking and Transfusion Medicine:\r\n\r\nBlood typing, crossmatching, and managing blood supply for transfusions.\r\nToxicology:\r\n\r\nScreening for drugs, alcohol, and poisons in the body.\r\nRole of the Laboratory in Healthcare:\r\nDiagnosis: Providing data to identify diseases or conditions.\r\nMonitoring: Tracking disease progression and treatment effectiveness.\r\nScreening: Early detection of diseases, such as cancer or metabolic disorders.\r\nResearch: Advancing understanding of diseases and developing new therapies.\r\nCommon Tests Performed:\r\nComplete Blood Count (CBC).\r\nBasic Metabolic Panel (BMP).\r\nLiver and kidney function tests.\r\nCulture and sensitivity tests.\r\nCoagulation profiles (e.g., PT/INR, aPTT)', 1, '2024-11-13 03:37:31', '2024-11-19 01:02:37'),
(11, 'Radiology', 'Comprehensive Overview of Radiology: Roles, Training, Subspecialties, and Key Imaging Techniques', 'media/uploads/departments/173199430316.jpg', 'Role of a Radiologist\r\nRadiologists are medical doctors who specialize in interpreting medical images to detect, diagnose, and monitor diseases or injuries. They also perform image-guided procedures.\r\n\r\nKey Responsibilities:\r\nImage Interpretation:\r\nAnalyzing X-rays, MRIs, CT scans, ultrasounds, and nuclear medicine images.\r\nDiagnosis and Consultation:\r\nCollaborating with other physicians to confirm diagnoses.\r\nImage-Guided Interventions:\r\nPerforming minimally invasive procedures such as biopsies and catheter placements.\r\nTreatment Guidance:\r\nSupporting treatments like radiation therapy for cancers.\r\nTypes of Radiology\r\nDiagnostic Radiology:\r\nFocused on imaging to identify diseases (e.g., mammography, CT scans, and ultrasounds).\r\nInterventional Radiology:\r\nPerforming minimally invasive procedures using imaging for guidance.\r\nTherapeutic Radiology (Radiation Oncology):\r\nUsing radiation to treat diseases like cancer.\r\nNuclear Medicine:\r\nUsing radioactive substances for imaging and therapy (e.g., PET scans, radionuclide therapy).\r\nTraining Pathway\r\nMedical School: 5–6 years to earn an MBBS or equivalent degree.\r\nResidency in Radiology: 4–5 years of specialized training in imaging techniques.\r\nFellowship (Optional): 1–3 years for subspecialty training (e.g., neuroradiology, pediatric radiology).\r\nLicensure and Certification: Passing exams from relevant medical boards or councils.\r\nSubspecialties in Radiology\r\nNeuroradiology: Imaging of the brain, spine, and nervous system.\r\nMusculoskeletal Radiology: Focused on bones, joints, and soft tissues.\r\nPediatric Radiology: Imaging specialized for infants and children.\r\nInterventional Radiology: Minimally invasive, image-guided treatments.\r\nOncologic Imaging: Specialized imaging for detecting and monitoring cancers.\r\nCommon Radiology Procedures\r\nX-Ray: Basic imaging for fractures, infections, and lung conditions.\r\nCT Scan: Detailed cross-sectional images for internal organ evaluation.\r\nMRI: High-resolution imaging of soft tissues and the nervous system.\r\nUltrasound: Real-time imaging for pregnancy, abdominal issues, or blood flow.\r\nPET Scan: Nuclear imaging for metabolic activity, often in cancer detection.\r\nFluoroscopy: Dynamic imaging to guide procedures like catheter placements.\r\nKey Skills for Radiologists\r\nTechnical Expertise: Mastery of imaging technology and software.\r\nAnalytical Thinking: Accurate interpretation of complex images.\r\nCommunication: Reporting findings clearly to other physicians.\r\nAttention to Detail: Spotting subtle abnormalities.\r\nScope and Workplaces\r\nHospitals: Imaging departments and emergency diagnostics.\r\nOutpatient Clinics: Diagnostic imaging centers.\r\nResearch: Advancing imaging technologies and applications.\r\nAcademic Roles: Teaching radiology to medical students and residents', 1, '2024-11-13 03:37:31', '2024-11-19 10:31:43'),
(12, 'Medicine', 'Comprehensive Overview of Internal Medicine: Roles, Subspecialties, Training, and Key Responsibilities', 'media/uploads/departments/173199448982.jpg', 'Role of a Physician in Medicine\r\nPhysicians in this department are known as internists. They are experts in managing complex medical cases and chronic illnesses, providing comprehensive care to adults.\r\n\r\nKey Responsibilities:\r\nPatient Assessment:\r\nConducting thorough history-taking and physical examinations.\r\nDiagnosis and Management:\r\nIdentifying and treating a wide range of illnesses like diabetes, hypertension, and infections.\r\nPreventive Care:\r\nPromoting health through screenings, lifestyle modifications, and vaccination programs.\r\nCoordination of Care:\r\nReferring patients to specialists and collaborating with multidisciplinary teams for holistic care.\r\nSubspecialties in Internal Medicine\r\nThe medicine department includes several subspecialties for advanced care:\r\n\r\nCardiology: Focused on heart diseases (e.g., coronary artery disease, arrhythmias).\r\nGastroenterology: Managing digestive system disorders (e.g., ulcers, liver disease).\r\nPulmonology: Specializing in lung and respiratory conditions (e.g., asthma, COPD).\r\nNephrology: Focused on kidney diseases and dialysis care.\r\nEndocrinology: Treating hormonal imbalances (e.g., diabetes, thyroid disorders).\r\nRheumatology: Managing autoimmune and joint disorders (e.g., arthritis, lupus).\r\nInfectious Diseases: Specializing in the diagnosis and treatment of complex infections.\r\nHematology/Oncology: Focusing on blood disorders and cancer management.\r\nTraining Pathway\r\nMedical School: 5–6 years to earn an MBBS or equivalent degree.\r\nResidency in Internal Medicine: 3–4 years of intensive training.\r\nFellowship (Optional): 1–3 years for subspecialty expertise.\r\nLicensure and Certification: Meeting the requirements of local medical boards or councils.\r\nCommon Conditions Treated\r\nChronic Diseases:\r\nHypertension, diabetes, hyperlipidemia.\r\nInfectious Diseases:\r\nTuberculosis, pneumonia, sepsis.\r\nAcute Illnesses:\r\nStroke, myocardial infarction, acute kidney injury.\r\nPreventive Care Needs:\r\nCancer screenings, managing risk factors for cardiovascular disease.\r\nKey Skills for Internists\r\nDiagnostic Acumen: Ability to interpret clinical signs and diagnostic results accurately.\r\nCommunication: Explaining complex conditions and treatment plans to patients.\r\nCritical Thinking: Managing patients with multiple, coexisting diseases.\r\nCollaboration: Working seamlessly with specialists and healthcare teams.\r\nScope and Workplaces\r\nHospitals: General wards, intensive care units, and emergency departments.\r\nOutpatient Clinics: Managing chronic diseases and preventive care.\r\nResearch: Exploring new treatments and guidelines for disease management.\r\nAcademic Roles: Teaching medical students and mentoring residents.', 1, '2024-11-13 03:37:31', '2024-11-19 10:34:49'),
(14, 'General Physician', 'General Physician', 'media/uploads/departments/173194038635.jpg', 'General Physician', 1, '2024-11-18 19:33:06', '2024-11-18 19:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `department_id`, `name`, `email`, `phone`, `address`, `religion`, `gender`, `specialty`, `qualification`, `description`, `photo`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 4, 'Dr. Malek Nadeem Asif', 'lyryveqyfy@mailinator.com', '01859303777', 'Velit ex reiciendis', 'Omnis magna nobis co', 'Male', 'Internal Medicine - M.B.B.S (Pakistan) MRCP (London, UK), MACP (USA)', 'mbbs', 'Dr. Malek Nadeem Asif: Your trusted expert in internal medicine, dedicated to your health and well-being.', 'media/uploads/doctors/173194523080.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-12 20:49:35', '2024-11-23 19:54:12'),
(5, 0, 5, 'Dr. Mujibur Rahman', 'info@suncitypolyclinicsa.com', '053 453 4808', 'riyadh', 'islam', 'Male', 'Specialist Family Medicine - M.B.B.S (Bangladesh) MRCP(UK), MRCP (Ireland), FRCP (Eden), MRCGP (Inl)', 'mbbs', 'Dr. Mujibur Rahman: Caring for your family\'s health with expertise and compassion in family medicine.', 'media/uploads/doctors/173193446444.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/\\\"}\"}', 1, '2024-11-18 17:54:24', '2024-11-23 19:51:48'),
(9, 0, 6, 'Dr. A.J. Ansary', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Male', 'Orthopedic Resident - M.B.B.S', 'mbbs', 'Dr. A.J. Ansary: Committed to restoring mobility and enhancing lives through expert orthopedic care.', 'media/uploads/doctors/173194026032.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/\\\"}\"}', 1, '2024-11-18 19:31:00', '2024-11-23 19:54:39'),
(10, 0, 1, 'Dr. Imran Ahmad', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Male', 'Ophthalmologist - M.B.B.S (India) MS (Ophthalmology)', 'mbbs', 'Dr. Imran Ahmad: Regular eye exams are essential for maintaining vision health and detecting early issues.', 'media/uploads/doctors/173194067888.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/www.facebook.com\\\\\\/\\\"}\"}', 1, '2024-11-18 19:37:58', '2024-11-23 19:55:30'),
(12, 0, 2, 'Dr. Ranna Ismaeel', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Female', 'Specialist Obs- Gynae - M.B.B.S (Pakistan) MCPS (Pakistan), PLAB 1 & 2 (UK), MRCOG 1 2 (UK)', 'mbbs', 'Dr. Ranna Ismaeel: Compassionate care in obs- and gynecology for every stage of womanhood', 'media/uploads/doctors/173194520514.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:09:07', '2024-11-23 19:56:03'),
(14, 0, 2, 'Dr. Afroza Khanum', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Female', 'Specialist Obs- Gynae - MBBS (Bangladesh) Diploma in Obs & Gyne (Ireland), MRCPI (Ireland), MRCOG, Part 1 & 2 (UK)', 'mbbs', 'Dr. Afroza Khanum: A registrar in obstetrics and gynecology provides critical care for women\'s reproductive health.', 'media/uploads/doctors/173194281975.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:13:39', '2024-11-23 19:57:07'),
(15, 0, 14, 'Dr. Mohammad Tariq', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Male', 'Senior General Physician - M.B.B.S (Bangladesh) Diabetic Trained Physician Trained in skin, VD & Sex', 'mbbs', 'Dr. Mohammad Tariq: A Senior General Physician offers expert care, managing a wide range of adult health issues.', 'media/uploads/doctors/173194486687.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:47:46', '2024-11-23 19:57:39'),
(16, 0, 14, 'Dr. Mahmudul Hasan', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Male', 'Senior General Physician - M.B.B.S (Bangladesh) Trained in skin, VD & Sex', 'mbbs', 'Dr. Mahmudul Hasan: Senior General Physicians provide comprehensive, skilled care across various medical conditions.', 'media/uploads/doctors/173194534593.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:55:45', '2024-11-23 19:58:07'),
(17, 0, 14, 'Dr. Afroza Ahmed', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Female', 'General Physician - M.B.B.S (Bangladesh)', 'mbbs', 'Dr. Afroza Ahmed: A General Physician offers compassionate care, addressing various health concerns in women.', 'media/uploads/doctors/173194545060.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:57:30', '2024-11-23 19:58:25'),
(18, 0, 14, 'Dr. Majidha CK', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Female', 'General Physician - M.B.B.S (Kerala, India)', 'mbbs', 'Dr. Majidha CK: A General Physician provides expert care for women’s health, focusing on overall well-being.', 'media/uploads/doctors/17319454947.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:58:14', '2024-11-23 19:59:31'),
(19, 0, 14, 'Dr. Ashhar Areekadan', 'info@suncitypolyclinicsa.com', '053 453 4808', 'riyadh', 'islam', 'Male', 'General Physician - M.B.B.S (Kerala, India)', 'mbbs', 'Dr. Ashhar Areekadan: A General Physician provides primary care, managing diverse health conditions for all ages.', 'media/uploads/doctors/173194553610.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:58:56', '2024-11-23 19:59:22'),
(20, 0, 9, 'Dr. Rukaiya Shaheen', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Female', 'General Dentist - B.D.S (Bangladesh)', 'mbbs', 'Dr. Rukaiya Shaheen: A General Dentist provides comprehensive dental care, focusing on prevention and treatment.', 'media/uploads/doctors/17319455938.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 20:59:53', '2024-11-23 19:59:07'),
(21, 0, 9, 'Dr. Mohammad Umair', 'info@suncitypolyclinicsa.com', '0534534808', 'riyadh', 'islam', 'Male', 'Orthodontist/ Dental Surgeon B.D.S (Pakistan) RDS, MHC (PH-UK), MHC (Prosthetic-UK)', 'mbbs', 'Dr. Mohammad Umair: A Dental Surgeon specializes in performing surgical procedures to treat complex dental issues.', 'media/uploads/doctors/173194564075.png', '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, '2024-11-18 21:00:40', '2024-11-23 19:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `description` text DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`id`, `doctor_id`, `patient_id`, `day`, `time`, `description`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-14 00:00:00', '16:00:00', 'I want to visit this selected doctor.', NULL, 1, '2024-11-13 19:10:41', '2024-11-13 19:10:41'),
(2, 2, 1, '2024-11-19 01:00:00', '01:00:00', 'Appointment apply test.', NULL, 1, '2024-11-13 19:15:20', '2024-11-13 19:15:20'),
(3, 1, 1, '2024-11-15 15:30:00', '15:30:00', 'New user appoinment without logged in.', NULL, 1, '2024-11-14 04:19:11', '2024-11-14 04:19:11'),
(4, 3, 1, '2024-11-20 01:30:00', '01:30:00', 'asdf', NULL, 1, '2024-11-17 22:40:10', '2024-11-17 22:40:10'),
(5, 3, 1, '2024-11-21 00:30:00', '00:30:00', 'hh', NULL, 1, '2024-11-17 22:43:06', '2024-11-17 22:43:06'),
(6, 1, 1, '2024-11-28 11:30:00', '11:30:00', 'gh', NULL, 1, '2024-11-17 22:43:50', '2024-11-17 22:43:50'),
(7, 3, 1, '2024-11-19 01:30:00', '01:30:00', 'Test', NULL, 1, '2024-11-18 15:40:36', '2024-11-18 15:40:36'),
(8, 1, 2, '2024-11-22 00:00:00', '00:00:00', 'hy', NULL, 1, '2024-11-18 15:50:38', '2024-11-18 15:50:38'),
(9, 2, 3, '2024-11-23 00:30:00', '00:30:00', 'hi', NULL, 1, '2024-11-18 15:51:20', '2024-11-18 15:51:20'),
(10, 20, 1, '2024-11-22 00:30:00', '00:30:00', 'hy', NULL, 1, '2024-11-18 21:02:01', '2024-11-18 21:02:01'),
(11, 9, 1, '2024-11-22 01:30:00', '01:30:00', 'hy', NULL, 1, '2024-11-18 21:03:16', '2024-11-18 21:03:16'),
(12, 9, 4, '2024-11-25 13:30:00', '13:30:00', 'Lorem Ipsum', NULL, 1, '2024-11-18 21:30:16', '2024-11-18 21:30:16'),
(13, 18, 1, '2024-11-23 01:30:00', '01:30:00', 'from karela', NULL, 1, '2024-11-18 21:34:38', '2024-11-18 21:34:38'),
(14, 15, 1, '2024-11-23 00:30:00', '00:30:00', 'dhaka', NULL, 1, '2024-11-18 21:37:35', '2024-11-18 21:37:35'),
(15, 15, 1, '2024-11-24 00:30:00', '00:30:00', 'lorem ipsum', NULL, 1, '2024-11-18 21:45:47', '2024-11-18 21:45:47'),
(16, 16, 1, '2024-11-25 01:00:00', '01:00:00', 'dolor sit', NULL, 1, '2024-11-18 21:47:13', '2024-11-18 21:47:13'),
(17, 17, 5, '2024-11-24 01:00:00', '01:00:00', 'hellow world', NULL, 1, '2024-11-18 22:01:11', '2024-11-18 22:01:11'),
(18, 18, 6, '2024-11-25 03:00:00', '03:00:00', 'hello test', NULL, 1, '2024-11-18 22:04:07', '2024-11-18 22:04:07'),
(19, 18, 9, '2024-11-07 00:30:00', '00:30:00', 'sfasdfsadfaf', NULL, 1, '2024-11-24 15:09:32', '2024-11-24 15:09:32');

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
-- Table structure for table `health_packages`
--

CREATE TABLE `health_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `maximum` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_packages`
--

INSERT INTO `health_packages` (`id`, `name`, `price`, `description`, `image`, `duration`, `maximum`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Fullbody Checkup', 185, '1. CBC 2. BLOOD GROUP 3. RANDOM BLOOD SUGAR 4. LIVER ENZYME (GOT) 5. LIVER ENZYME (GPT) 6. TRIGLYCERIDES 7. CHOLESTEROL 8. CREATININE 9. URIC ACID 10. S.UREA 11. URINE ANALYSIS 12. STOOL ANALYSIS 13. ULTRASOUND ABDOMEN 14. CHEST X-RAY PA VIEW', NULL, NULL, NULL, 1, 1, '2024-11-15 11:11:51', '2024-11-15 11:20:54'),
(2, 'Basic Health Package SP1', 55, '1. FASTING BLOOD SUGAR 2. URIC ACID 3. CHOLESTEROL 4. TRIGLYCERIDES 5. BP', NULL, NULL, NULL, 1, 1, '2024-11-15 11:16:14', '2024-11-18 19:18:44'),
(3, 'Basic Health Package SP2', 35, '1. FASTING BLOOD SUGAR 2. CHOLESTEROL 3. TRIGLYCERIDES', NULL, NULL, NULL, 1, 1, '2024-11-15 11:17:10', '2024-11-18 19:19:08'),
(4, 'Circumcision Full Package', 400, '1. Same day Discharge 2. 10 minutes peocedure 3. No Pain or Blood Loss 4. Modern system pleasant environment', NULL, NULL, NULL, 1, 1, '2024-11-15 11:17:34', '2024-11-18 19:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `home_header_sliders`
--

CREATE TABLE `home_header_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_header_sliders`
--

INSERT INTO `home_header_sliders` (`id`, `user_id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Best Care & Best Doctor', 'Expands Access To Care For Patients And Supports Community Health Staff And Our Doctors. Consult With Our Doctors In Saudi Arabia', 'media/uploads/home-header-sliders/173146102638.jpg', 1, '2024-06-12 02:52:53', '2024-11-12 19:23:46'),
(2, NULL, 'Health Support You Can Trust', 'With experienced doctors and a patient-first approach, we deliver reliable and comprehensive care for every patient.', 'media/uploads/home-header-sliders/173146157094.jpg', 1, '2024-11-12 19:32:50', '2024-11-12 19:32:50'),
(3, NULL, 'Trusted Healthcare Access', 'Get quality care access with our doctors in Saudi Arabia. Supporting patients, community, and health staff.', 'media/uploads/home-header-sliders/173146164585.png', 1, '2024-11-12 19:34:05', '2024-11-12 19:34:05');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_14_125455_create_realtime_notifications_table', 1),
(7, '2023_08_14_130622_create_sessions_table', 1),
(8, '2023_08_14_173218_create_contacts_table', 1),
(9, '2023_08_16_055327_create_categories_table', 1),
(10, '2023_08_16_055605_create_divisions_table', 1),
(11, '2023_08_16_055717_create_product_types_table', 1),
(12, '2023_08_16_055739_create_colors_table', 1),
(13, '2023_08_16_055807_create_genders_table', 1),
(14, '2023_08_16_055829_create_ages_table', 1),
(15, '2023_08_16_062847_create_keywords_table', 1),
(16, '2023_08_16_063216_create_products_table', 1),
(17, '2023_08_16_063438_create_product_keywords_table', 1),
(18, '2023_08_16_070828_create_product_variants_table', 1),
(19, '2023_08_16_074529_create_user_wishes_table', 1),
(20, '2023_08_17_070610_create_orders_table', 1),
(21, '2023_08_17_070637_create_order_records_table', 1),
(22, '2023_8_14_094147_create_roles_table', 1),
(23, '2023_8_14_094148_create_app_links_table', 1),
(24, '2023_09_02_073317_create_blogs_table', 2),
(25, '2024_06_12_080335_create_home_header_sliders_table', 3),
(27, '2024_06_12_091143_create_settings_table', 4),
(28, '2024_06_12_124204_create_testimonials_table', 5),
(29, '2024_06_12_131717_create_our_histories_table', 6),
(30, '2024_06_12_133730_create_our_team_members_table', 7),
(34, '2024_11_13_01415_create_doctors_table', 8),
(35, '2024_11_13_014223_create_doctor_appointments_table', 8),
(36, '2024_11_13_01422_create_patients_table', 8),
(37, '2023_08_16_055605_create_departments_table', 9),
(38, '2024_11_14_052825_create_services_table', 9),
(39, '2024_11_14_094027_create_health_packages_table', 10),
(40, '2024_11_16_101738_create_video_galleries_table', 11),
(42, '2024_11_16_162341_create_about_page_tabs_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birth` varchar(25) DEFAULT NULL,
  `blood` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `religion`, `gender`, `birth`, `blood`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Md. Habibullah Khan', NULL, '01755003939', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-14 04:19:11', '2024-11-14 04:19:11'),
(2, NULL, 'abcd xyz', NULL, '0534534808', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-18 15:50:38', '2024-11-18 15:50:38'),
(3, NULL, 'nadeem xyz', NULL, '0534534808', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-18 15:51:20', '2024-11-18 15:51:20'),
(4, NULL, 'Samiul Hasan', NULL, '01755003939', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-18 21:30:16', '2024-11-18 21:30:16'),
(5, NULL, 'Ripon', NULL, '01617706451', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-18 22:01:11', '2024-11-18 22:01:11'),
(6, NULL, 'Mr Wahid Khan', NULL, '0503915756', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-18 22:04:07', '2024-11-18 22:04:07'),
(7, NULL, 'XRdor', NULL, '88529482945', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-19 05:47:27', '2024-11-19 05:47:27'),
(8, NULL, 'Sallie', NULL, '3895389885', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-22 10:32:07', '2024-11-22 10:32:07'),
(9, NULL, 'Aaadrirsss Asscbas', NULL, '03248453448500', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-24 15:09:32', '2024-11-24 15:09:32'),
(10, NULL, 'Search Engine', NULL, '593772474', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-26 20:32:51', '2024-11-26 20:32:51'),
(11, NULL, 'Search Engine', NULL, '20902052', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-26 21:05:05', '2024-11-26 21:05:05'),
(12, NULL, 'Search Engine', NULL, '7748357197', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-27 01:04:47', '2024-11-27 01:04:47'),
(13, NULL, 'Search Engine', NULL, '6067697315', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-27 02:42:41', '2024-11-27 02:42:41'),
(14, NULL, 'Amelia', NULL, '721729862', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-29 03:11:05', '2024-11-29 03:11:05'),
(15, NULL, 'Amelia', NULL, '4283932097', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-29 04:53:21', '2024-11-29 04:53:21'),
(16, NULL, 'Amelia', NULL, '492558541', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-29 17:06:11', '2024-11-29 17:06:11'),
(17, NULL, 'Amelia', NULL, '3062847789', NULL, NULL, NULL, NULL, NULL, 1, '2024-11-29 20:13:56', '2024-11-29 20:13:56');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realtime_notifications`
--

CREATE TABLE `realtime_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `send_type` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'Notification',
  `title` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `attached` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attached`)),
  `attached_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attached_files`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `access` varchar(255) NOT NULL,
  `routes` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `prefix`, `access`, `routes`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '1,2,3,4,5', '1,2,3,7,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53', 1, NULL, '2024-11-18 01:59:45'),
(2, 'Sub Admin', 'sub-admin', '1,2,3,4', NULL, 1, NULL, '2024-06-12 03:07:51'),
(3, 'Manager', 'manager', '', NULL, 1, NULL, NULL),
(4, 'Doctor', 'doctor', '1,2,3', NULL, 1, NULL, '2024-11-12 20:18:47'),
(5, 'Patient', 'patient', '1,2', NULL, 1, NULL, '2024-11-12 20:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Doctor Consultation', 'fa-solid fa-heart-pulse', 'Access our Doctor Consultation service for expert care in our all Department.', 1, '2024-11-14 02:28:44', '2024-11-14 02:29:57'),
(2, 'Labortory Test', 'fa-solid fa-heart-pulse', 'We produce accurate test reports by experienced staff and advanced machinery', 1, '2024-11-14 02:30:40', '2024-11-14 02:30:40'),
(3, 'X-ray, Ultrasound & ECG', 'fa-solid fa-heart-pulse', 'We provide x-rays and ultrasound by experienced radiologists and high-quality machines', 1, '2024-11-14 02:31:05', '2024-11-14 02:31:05'),
(4, 'Iqama Medical Male & Female', 'fa-solid fa-heart-pulse', 'We do Iqama medical at very low cost in quick time.', 1, '2024-11-14 02:31:25', '2024-11-14 02:31:25'),
(5, 'Fullbody Checkup', 'fa-solid fa-heart-pulse', 'Full body checkup is only 185 Riyals, of which we provide accurate report with 15 tests.', 1, '2024-11-14 02:31:42', '2024-11-14 02:31:42'),
(6, 'Driving License & Baladiya Medical', 'fa-solid fa-heart-pulse', 'Baladiya Medical\r\nGet your Driving License and Baladiya Medical services with ease. Quick, reliable health checks.', 1, '2024-11-14 02:32:15', '2024-11-14 02:32:15'),
(7, 'Food Delivery & Fitness Certificate', 'fa-solid fa-heart-pulse', 'Access quick Food Delivery and Fitness Certificate services. Reliable, convenient health checks', 1, '2024-11-14 02:32:33', '2024-11-14 02:32:33'),
(8, 'Emergency Service', 'fa-solid fa-heart-pulse', 'Rely on our Emergency Service for fast, responsive care when you need it most. Here for you 24/7.', 1, '2024-11-14 02:32:55', '2024-11-14 02:32:55'),
(9, 'Ambulance Service', 'fa-solid fa-heart-pulse', 'Our Ambulance Service offers prompt, professional transport for urgent medical needs. Available 24/7.', 1, '2024-11-18 19:14:37', '2024-11-18 19:14:37'),
(10, 'Pharmacy & Insurance', 'fa-solid fa-heart-pulse', 'Get your medications and insurance support with our Pharmacy & Insurance services. Easy and reliable.', 1, '2024-11-18 19:15:02', '2024-11-18 19:15:02'),
(11, 'Dental Panorama Service', 'fa-solid fa-heart-pulse', 'Experience our Dental Panorama service for comprehensive oral health care and advanced treatments.', 1, '2024-11-18 19:15:17', '2024-11-18 19:15:17'),
(12, 'Circumcision', 'fa-solid fa-heart-pulse', 'Our Circumcision service offers safe, compassionate care for infants and children. Book today!', 1, '2024-11-18 19:15:32', '2024-11-18 19:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_by`, `key`, `value`, `options`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'businessInfo', 'Suncity Polyclinic: Confidence in healthcare in Riyadh, where patients receive dedicated care.', '{\"happyPatients\": \"250\", \"carParkingArea\": \"50\", \"qualifiedDortors\": \"18\", \"yearsOrExperience\": \"16\"}', 1, '2024-06-13 03:35:27', '2024-11-13 09:27:58'),
(5, 1, 'ourCertifications', 'Our certifications for our supply chain, products, and practices instills confidence that your brand is strategically sourcing from top-tier partners and employing cutting-edge techniques.', '{\"1\": \"media/uploads/our-certifications/171842952563.png\", \"2\": \"media/uploads/our-certifications/171842952554.png\", \"3\": \"media/uploads/our-certifications/171842952524.png\"}', 1, '2024-06-14 07:38:36', '2024-06-14 23:32:05'),
(10, 1, 'aboutPageOurCustomers', 'We\'ve extended our services across various continents. Over time, this expansive reach has cultivated a strong and loyal customer base, fostering repeated engagements and enduring relationships built on our consistent delivery of exceptional service and quality. Have a look at the most loyal clients of PoMo Apparels:', '[\"MARC LAUGE - DENMARK\", \"REITMANS - CANADA\", \"OLD GUYS RULE - UK\", \"MIM - POLAND\", \"COPPEL - MEXICO\", \"BRICE - FRANCE\", \"BLUENOTES - CANADA\", \"DOUBLE - GREECE\", \"UFO - CANADA\", null]', 1, '2024-06-14 09:55:12', '2024-06-15 00:23:04'),
(16, 1, 'contactInfo', NULL, '{\"contactEmail\":\"info@suncitypolyclinicsa.com\",\"contactPhone\":\"+966 53 453 4808\",\"address\":\"Kerala Market, Opposite of Markaz Jamal, Batha, Riyadh.\",\"twitter\":null,\"facebook\":\"https:\\/\\/web.facebook.com\\/suncitypolyclinic\",\"instagram\":\"https:\\/\\/www.instagram.com\\/suncityspolyclinic\\/\",\"tiktok\":\"https:\\/\\/www.tiktok.com\\/@suncitypolyclinic_riyadh\",\"google\":null,\"emergencyPNumber1\":\"+966 53 453 4808\",\"emergencyPNumber2\":\"+966 55 885 1003\",\"openingHoursEveryDay\":\"06:00 AM - 12:00 AM\",\"footerDescription\":\"Suncity Policlinic is a Modern Polyclinic Center it is located in the Batha, Riyadh, Capital of Saudi Arabia. Suncity Policlinic Started its journey on july, 2007.\"}', 1, '2024-06-15 09:49:57', '2024-11-18 17:49:23'),
(17, 1, 'contactUsPageFooter', NULL, '{\"email\": \"<p>kayes.ahmed@gmail.com&nbsp;</p><p>apparels@pomobd.com</p>\", \"address\": \"<p>PLOT: 6, UNIT: 3A ROAD: 12,&nbsp;</p><p>SECTOR: 10 UTTARA,&nbsp;</p><p>DHAKA - 1230</p>\", \"business-hours\": \"<p>Mon - Sat 9:00am - 6:00pm&nbsp;</p><p>Sunday - CLOSED</p>\", \"work-inquiries\": \"<p>(+88) 01754 832200&nbsp;</p><p>(+88) 01851 991958</p>\"}', 1, '2024-06-15 09:59:06', '2024-06-15 12:23:50'),
(18, 1, 'healthInsurance', 'Most medical insurance in Saudi Arabia is included in our service, secure your health!', '{\"1\":\"media\\/uploads\\/insurances\\/173157546092.png\",\"2\":\"media\\/uploads\\/insurances\\/173157546025.jpg\",\"3\":\"media\\/uploads\\/insurances\\/173157546079.png\",\"4\":\"media\\/uploads\\/insurances\\/173157546032.jpg\",\"5\":\"media\\/uploads\\/insurances\\/173157578894.png\",\"6\":\"media\\/uploads\\/insurances\\/173157578854.png\",\"7\":\"media\\/uploads\\/insurances\\/173157578851.png\",\"8\":\"media\\/uploads\\/insurances\\/173157578844.jpg\",\"9\":\"media\\/uploads\\/insurances\\/173157578864.png\",\"10\":\"media\\/uploads\\/insurances\\/173157578838.png\",\"11\":\"media\\/uploads\\/insurances\\/173157578860.png\",\"12\":\"media\\/uploads\\/insurances\\/173157578821.png\",\"13\":\"media\\/uploads\\/insurances\\/173157578861.jpg\",\"14\":\"media\\/uploads\\/insurances\\/173157578858.jpg\",\"15\":\"media\\/uploads\\/insurances\\/173157578883.png\",\"16\":\"media\\/uploads\\/insurances\\/173157578878.jpg\",\"17\":\"media\\/uploads\\/insurances\\/173157578823.jpg\",\"18\":\"media\\/uploads\\/insurances\\/173157578817.png\",\"19\":\"media\\/uploads\\/insurances\\/173194682590.png\"}', 1, '2024-11-14 03:00:47', '2024-11-18 21:20:25'),
(19, 1, 'sunCityDentalCare', 'Suncity Dentacare with a personal touch', '{\"qd1\": \"Dependability and safety in the touch of experienced hands – Suncity Dentacare, where every treatment is guaranteed to be efficient.\", \"qd2\": \"Modern treatment combined with advanced technology – Suncity Dentacare, where every service is a commitment to quality.\", \"qd3\": \"Peaceful treatment in a relaxing environment – ​​Suncity Dentacare, where your comfort is our priority.\", \"qt1\": \"Well Experience Dentist\", \"qt2\": \"High Technology Facilities\", \"qt3\": \"Comfortable Clinics\", \"description\": \"Suncity Dentacare: Our caring touch in caring for your smile. Because we know, every smile is a story, and every story is ours.\"}', 1, '2024-11-15 12:01:51', '2024-11-15 12:06:03'),
(20, 1, 'consultDoctors', 'Consult Our Doctors', '{\"qd1\": \"Consult our Orthopedic specialists in Riyadh for quality bone and joint care.\", \"qd2\": \"Consult our Gynecology experts in Riyadh for comprehensive women’s health and care.\", \"qd3\": \"Consult our skilled General Physicians, Dentists, and Ophthalmologists in Saudi Arabia for quality care in overall health, dental, and eye care needs. Your health, our priority.\", \"qt1\": \"Orthopedic\", \"qt2\": \"Gynecology\", \"qt3\": \"Comfortable Clinics\", \"description\": \"Connect with our experienced doctors in Saudi Arabia for trusted healthcare support. We’re dedicated to enhancing patient care, supporting community health staff, and ensuring quality service every step.\"}', 1, '2024-11-15 20:29:19', '2024-11-15 20:29:19'),
(21, 1, 'photoGallery', NULL, '{\"1\":\"media\\/uploads\\/photo-gallery\\/173194637215.jpg\",\"2\":\"media\\/uploads\\/photo-gallery\\/173194637220.jpg\",\"3\":\"media\\/uploads\\/photo-gallery\\/173194637258.jpg\",\"4\":\"media\\/uploads\\/photo-gallery\\/173194637220.jpg\"}', 1, '2024-11-16 04:02:09', '2024-11-18 21:12:52'),
(22, 1, 'logoFavicon', NULL, '{\"adminLogo\":\"media\\/uploads\\/logo-favicon\\/173192733426.png\",\"favicon\":\"media\\/uploads\\/logo-favicon\\/173183818118.png\",\"logo\":\"media\\/uploads\\/logo-favicon\\/173183818125.png\"}', 1, '2024-11-17 04:09:41', '2024-11-18 15:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(120) NOT NULL,
  `photo` varchar(120) NOT NULL,
  `testimonial` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `created_by`, `name`, `photo`, `testimonial`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mary Jane Mora', 'media/uploads/testimonials/173193968831.png', 'thank you dr.mujibur rahman you are amazing\r\nthank you for accommodating us and giving a right med for my husband,this polyclinic has a very good staff thats why i rate this clinic 5 star 👍', 1, '2024-06-12 07:14:37', '2024-11-18 19:21:28'),
(2, NULL, 'Suhail Sajad', 'media/uploads/testimonials/173157792924.png', 'Reception staff is very less,so it takes very long time in dealing at the reception counter,a single person on  1st floor and so many customers around her,payments,insurance,approvals,orders....how much can a single person do during peak hours', 1, '2024-06-14 11:48:38', '2024-11-18 19:22:55'),
(3, NULL, 'iam Cathy', 'media/uploads/testimonials/173193974133.png', 'I highly recommend Dr. Imran Ahmad as an Ophthalmologist. My eye been red and painful for 2 weeks and Im looking for a affordable Polyclinic and found this on Google. The receptionist referred me to him. He prescribes me eye drops and thankfully for its healed. He is surreal good Dr. ❤️ Thank you Dr. Imran Ahmad', 1, '2024-06-14 11:49:34', '2024-11-18 19:22:21'),
(4, NULL, 'Arif Robbany (arifrobbany)', 'media/uploads/testimonials/173157789954.png', 'Very good service. Every staff from the reception is very well behaved which is not usually found in other medicals. It is a hospital that helps expatriates. Bangladeshi, Pakistani and Indian doctors are always available. Let Suncity Medical play a unique role in healthcare.', 1, '2024-11-14 03:51:39', '2024-11-14 03:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `username` varchar(15) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `notifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notifications`)),
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `name`, `phone`, `photo`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `notifications`, `options`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Admin', '01617706471', 'media/uploads/admins/173236696656.png', 'admin@suncity.com', NULL, '$2y$10$dQx01D1HtDePBSQi4C9mKO3y73phnUxiJO1392C1iVlJPCsQ3dLH.', NULL, NULL, NULL, NULL, '{\"signature\": \"media/uploads/super-admin/169216512042.png\"}', 1, NULL, NULL, '2023-08-14 00:02:24', '2024-11-23 18:02:46'),
(2, 5, NULL, 'Natalie Whitehead', '01747448895', NULL, 'wyhahuxadi@mailinator.com', NULL, '$2y$10$coLBCI/3PsvrnACsy5wnPeO7bKA8oYjG4GG9mhPclW718vtz5o53y', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-08-21 23:36:12', '2023-08-21 23:36:12'),
(3, 5, NULL, 'Tallulah Witt', '01747448895', NULL, 'nybep@mailinator.com', NULL, '$2y$10$hgjvJXgxhkTeWvzwODEkt.Ic68.7SkjoXLzWqqAvw4fUxpgLq2uhq', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-08-22 00:38:49', '2023-08-22 00:38:49'),
(4, 5, NULL, 'Hayden Tyler', '01747448895', NULL, 'vygitaqima@mailinator.com', NULL, '$2y$10$/UpFD.11qgzZpecvPaGsxO0ezRK/Do4mJA.SeG7YjSGY5X8u2IuA6', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-08-23 02:20:50', '2023-08-23 02:20:50'),
(5, 5, NULL, 'Imran Hossain', '1747558896', NULL, 'imran_hossain82@gmail.com', NULL, '$2y$10$8Dl57l96kYlmSL9xppzgVe/qRYh/WlSo6guG3gHd5C46U.MYGBjIK', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-09-04 22:41:31', '2023-09-04 22:41:31'),
(6, 4, '24400001', 'Dr. Malek Nadeem Asif', '01859303777', 'media/uploads/doctors/173194523080.png', 'lyryveqyfy@mailinator.com', NULL, '$2y$10$mdTwWS48hpiaHURfGj6Q5uj24Rwqx.Qo0xvd4LJIUGQhejHC7apkS', NULL, NULL, NULL, NULL, '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"instagram\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\"}\"}', 1, NULL, NULL, '2024-11-12 20:49:35', '2024-11-18 20:53:50'),
(7, 4, '24400002', 'Dr. Malek Nadeem Asif', '+1 (722) 247-1942', 'media/uploads/doctors/173151314565.jpg', 'fegityxyq@mailinator.com', NULL, '$2y$10$3llQ/o/6vCwQqkV77LCRCugN19cRBrzMoMzqsGWlHmLk.m7s9j.uO', NULL, NULL, NULL, NULL, '{\"social_media\": \"{\\\"facebook\\\":null,\\\"twitter\\\":null,\\\"instagram\\\":null}\"}', 1, NULL, NULL, '2024-11-13 09:52:25', '2024-11-18 16:09:26'),
(8, 4, '24400003', 'Dr. Imran Ahmad', '01747551144', 'media/uploads/doctors/173193954933.jpg', 'rafypyqysa@mailinator.com', NULL, '$2y$10$t8uQB0kVZG1FTt8.T91/U.59KW/lyMgY0epsHTriAiB9BbSPNV1GS', NULL, NULL, NULL, NULL, '{\"social_media\": \"{\\\"facebook\\\":\\\"https:\\\\/\\\\/www.facebook.com\\\\/\\\",\\\"twitter\\\":\\\"https:\\\\/\\\\/www.facebook.com\\\\/\\\",\\\"instagram\\\":\\\"https:\\\\/\\\\/www.facebook.com\\\\/\\\"}\"}', 1, NULL, NULL, '2024-11-13 09:53:04', '2024-11-18 19:19:09'),
(9, 4, '24400004', 'Dr. Malek Nadeem Asif', '053 453 4808', 'media/uploads/doctors/173193436014.png', 'info@suncitypolyclinicsa.com', NULL, '$2y$10$9CLv5I.TuM7bDpUVAecGMOhi7leAX3vfihJZkMVw6TvZRNRM1j/1K', NULL, NULL, NULL, NULL, '{\"social_media\":\"{\\\"facebook\\\":\\\"https:\\\\\\/\\\\\\/web.facebook.com\\\\\\/suncitypolyclinic\\\",\\\"twitter\\\":null,\\\"instagram\\\":null}\"}', 1, NULL, NULL, '2024-11-17 23:46:20', '2024-11-18 17:52:40'),
(10, 4, '24400007', 'Imran Hasan', '01747448877', 'media/uploads/doctors/173193968510.jpg', 'test24@gmail.com', NULL, '$2y$10$khNO0vVe4UyeTCLr4oIuE.rQduwd2pSGOedg7NqBlD7YD84k72Ku2', NULL, NULL, NULL, NULL, '{\"social_media\":\"{\\\"facebook\\\":null,\\\"twitter\\\":null,\\\"instagram\\\":null}\"}', 1, NULL, NULL, '2024-11-18 19:21:25', '2024-11-18 19:21:25'),
(11, 4, '24400011', 'test', '9876544321', 'media/uploads/doctors/173194235981.jpg', 'faruk.bm01@gmail.com', NULL, '$2y$10$9b8MkNhgwDycEy2mqxXuHe21gvitHV00LZtkDUirilICNb6QhJGuC', NULL, NULL, NULL, NULL, '{\"social_media\":\"{\\\"facebook\\\":null,\\\"twitter\\\":null,\\\"instagram\\\":null}\"}', 1, NULL, NULL, '2024-11-18 20:05:59', '2024-11-18 20:05:59'),
(12, 0, NULL, 'mamunbabu', '0503915706', NULL, 'aamamun@gmail.com', NULL, '$2y$10$UWfmYeCk2yQrO0LERRYNX.ThGIXlMtRgquVc3F1uNQCudFCG5n8be', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-18 21:30:47', '2024-11-18 21:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishes`
--

CREATE TABLE `user_wishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `video` varchar(150) DEFAULT NULL,
  `view_count` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `title`, `description`, `image`, `video`, `view_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'description test', NULL, 'https://www.youtube.com/watch?v=gXYwIkXWUuQ', 0, 1, '2024-11-16 05:43:59', '2024-11-18 21:14:01'),
(2, NULL, 'description test', NULL, 'https://youtu.be/z_7wW0c296o', 0, 1, '2024-11-29 20:01:17', '2024-11-29 20:01:17'),
(3, NULL, NULL, NULL, 'https://youtu.be/H15XEe1Qb1I', 0, 1, '2024-11-29 20:15:02', '2024-11-29 20:15:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page_tabs`
--
ALTER TABLE `about_page_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_links`
--
ALTER TABLE `app_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `health_packages`
--
ALTER TABLE `health_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_header_sliders`
--
ALTER TABLE `home_header_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `realtime_notifications`
--
ALTER TABLE `realtime_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_created_by_foreign` (`created_by`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_created_by_foreign` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_wishes`
--
ALTER TABLE `user_wishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page_tabs`
--
ALTER TABLE `about_page_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_links`
--
ALTER TABLE `app_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_packages`
--
ALTER TABLE `health_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_header_sliders`
--
ALTER TABLE `home_header_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realtime_notifications`
--
ALTER TABLE `realtime_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_wishes`
--
ALTER TABLE `user_wishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
