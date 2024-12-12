-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2024 at 04:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_suncity`
--

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE `ages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`id`, `name`, `age`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adult', NULL, 1, '2023-08-19 11:07:42', '2023-08-19 11:07:59'),
(2, 'Children', NULL, 1, '2023-08-19 11:08:12', '2023-08-19 11:08:12'),
(3, 'Other', NULL, 1, '2023-08-19 11:08:25', '2023-08-19 11:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `app_links`
--

CREATE TABLE `app_links` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `folder_indexing` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_links`
--

INSERT INTO `app_links` (`id`, `name`, `route`, `parent_id`, `folder_indexing`, `type`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'APP Settings', NULL, 0, 99, 'folder', 8, '1', '2023-08-14 07:56:06', '2023-09-03 02:53:32'),
(2, 'HCL Links', 'app-links.index', 1, NULL, 'link', NULL, '1', '2023-08-14 07:57:15', '2023-08-18 22:54:45'),
(3, 'Role & Permissions', 'roles.index', 1, NULL, 'link', NULL, '1', '2023-08-14 07:59:05', '2023-08-14 07:59:05'),
(4, 'Notifications', NULL, 0, 99, 'folder', 19, '1', '2023-08-14 12:22:45', '2023-09-04 23:06:18'),
(5, 'Create', 'notifications.create', 4, NULL, 'link', NULL, '1', '2023-08-14 12:23:37', '2023-08-14 12:23:37'),
(6, 'List', 'notifications.index', 4, NULL, 'link', NULL, '1', '2023-08-14 12:24:04', '2023-08-14 12:24:04'),
(7, 'Product Settings', NULL, 0, 3, 'folder', 10, '1', '2023-08-17 03:47:30', '2023-09-04 23:07:21'),
(8, 'Categories', 'categories.index', 7, NULL, 'link', 10, '1', '2023-08-17 03:48:25', '2023-08-27 06:10:19'),
(9, 'Department List', 'departments.index', 0, NULL, 'folder', 0, '1', '2023-08-17 03:52:24', '2024-11-12 21:33:52'),
(10, 'Ages', 'ages.index', 7, NULL, 'link', NULL, '1', '2023-08-17 03:53:05', '2023-08-19 09:57:21'),
(11, 'Genders', 'genders.index', 7, NULL, 'link', NULL, '1', '2023-08-17 03:54:01', '2023-08-27 06:11:02'),
(12, 'Colors', 'colors.index', 7, NULL, 'link', NULL, '1', '2023-08-17 04:34:02', '2023-08-27 06:11:23'),
(13, 'Product Types', 'product-types.index', 7, NULL, 'link', NULL, '1', '2023-08-17 04:34:32', '2023-08-27 06:11:45'),
(14, 'Add New Product', 'addNewProduct', 0, 1, 'folder', 21, '1', '2023-08-17 05:15:24', '2023-08-27 06:58:07'),
(15, 'Add New Product old', 'addNewProduct', 0, 99, 'folder', 0, '0', '2023-08-17 05:16:25', '2023-08-27 06:58:07'),
(16, 'Product List', 'products.index', 0, 2, 'folder', 24, '1', '2023-08-22 22:17:20', '2023-08-27 06:58:07'),
(17, 'Order List', 'orders.index', 0, 4, 'folder', 22, '1', '2023-08-22 22:17:40', '2023-09-04 23:07:22'),
(18, 'Contact Email List', 'contacts.index', 0, 6, 'folder', 25, '1', '2023-09-02 01:08:40', '2023-09-04 23:07:22'),
(19, 'Blogs', 'blogs.index', 0, 5, 'folder', 1, '1', '2023-09-02 05:53:39', '2023-09-04 23:07:22'),
(20, 'Home Page', NULL, 0, NULL, 'folder', 0, '1', '2024-06-12 03:08:46', '2024-06-14 10:10:13'),
(21, 'Slider List', 'home-page-sliders.index', 20, NULL, 'link', NULL, '1', '2024-06-12 03:09:20', '2024-06-12 03:09:20'),
(22, 'Who We Are & Our Commitment', 'whoWeAreAndOurCommitment', 20, NULL, 'link', NULL, '1', '2024-06-12 05:02:03', '2024-06-12 05:02:03'),
(23, 'Why Choose Us', 'whyChooseUs', 20, NULL, 'link', NULL, '1', '2024-06-12 06:40:05', '2024-06-12 06:40:05'),
(24, 'Testimonial List', 'testimonials.index', 20, NULL, 'link', NULL, '1', '2024-06-12 07:15:37', '2024-06-12 07:15:37'),
(25, 'Our History List', 'our-histories.index', 20, NULL, 'link', NULL, '1', '2024-06-12 07:31:09', '2024-06-12 07:31:09'),
(26, 'Business Countdown Info', 'businessInfo', 20, NULL, 'link', NULL, '1', '2024-06-13 03:38:02', '2024-06-13 03:39:23'),
(27, 'Premier Partner', 'premierPartner', 20, NULL, 'link', NULL, '1', '2024-06-13 06:07:43', '2024-06-13 06:07:43'),
(28, 'Our Certifications', 'ourCertifications', 20, NULL, 'link', NULL, '1', '2024-06-14 07:53:49', '2024-06-14 07:53:49'),
(29, 'Only Certifications', 'onlyCertifications', 20, NULL, 'link', NULL, '1', '2024-06-14 08:11:52', '2024-06-14 08:11:52'),
(30, 'About Page', NULL, 0, NULL, 'folder', 17, '1', '2024-06-14 08:46:59', '2024-06-14 08:46:59'),
(31, 'Who We Are & How operate', 'aboutPageWhoWeAre', 30, NULL, 'link', NULL, '1', '2024-06-14 08:47:41', '2024-06-14 08:47:41'),
(32, 'Our Commitment', 'aboutPageOurCommitment', 30, NULL, 'link', NULL, '1', '2024-06-14 09:29:46', '2024-06-14 09:29:46'),
(33, 'Our Product Gallery', 'aboutOurProductGallery', 30, NULL, 'link', NULL, '1', '2024-06-14 10:09:49', '2024-06-14 10:09:49'),
(34, 'Meet Our Team', 'meetOurTeam', 30, NULL, 'link', NULL, '1', '2024-06-14 10:18:37', '2024-06-14 10:18:37'),
(35, 'Our Team', 'our-team-members.index', 20, NULL, 'link', NULL, '1', '2024-06-14 12:49:45', '2024-06-14 12:49:45'),
(36, 'About Us Page First Section', 'aboutPageFirstSection', 30, NULL, 'link', NULL, '1', '2024-06-14 23:45:40', '2024-06-14 23:45:40'),
(37, 'Our Customers', 'aboutOurCustomer', 30, NULL, 'link', NULL, '1', '2024-06-15 00:23:49', '2024-06-15 00:23:49'),
(38, 'Promises Page', NULL, 0, NULL, 'folder', 14, '1', '2024-06-15 05:27:09', '2024-06-15 05:27:09'),
(39, 'Our Values', 'ourValues', 38, NULL, 'link', NULL, '1', '2024-06-15 05:27:40', '2024-06-15 05:27:40'),
(40, 'Our Goals', 'ourGoals', 38, NULL, 'link', NULL, '1', '2024-06-15 05:40:24', '2024-06-15 05:40:24'),
(41, 'Bottom Section', 'promisePageBottomSection', 38, NULL, 'link', NULL, '1', '2024-06-15 06:07:36', '2024-06-15 06:07:36'),
(42, 'Contact Details', NULL, 0, NULL, 'folder', 3, '1', '2024-06-15 09:51:02', '2024-06-15 09:51:02'),
(43, 'Contact Info', 'contactInfo', 42, NULL, 'link', NULL, '1', '2024-06-15 09:51:31', '2024-06-15 09:51:31'),
(44, 'Get In Touch (Contact Page)', 'contactUsPageFooter', 42, NULL, 'link', NULL, '1', '2024-06-15 10:00:03', '2024-06-15 10:00:03'),
(45, 'Doctor List', 'doctors.index', 0, NULL, 'folder', 26, '1', '2024-11-12 21:23:39', '2024-11-12 21:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `description`, `image`, `view_count`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Different Ways to Ship Apparel from Overseas: Streamline Your Global Shipping Strategy', '<p><strong>There are several different ways to ship apparel from overseas, including using international carriers, freight forwarding services, and dropshipping methods. Shipping apparel internationally can be done through various carriers such as FedEx, DHL, UPS, or USPS.</strong></p><p>Freight forwarding services can also be utilized, which consolidate shipments with other goods to reduce costs. Additionally, dropshipping allows apparel to be shipped directly from the manufacturer or supplier to the customer, eliminating the need for inventory storage and management.</p><p>These options provide flexibility and convenience for businesses looking to import and distribute apparel from overseas.</p><h4><strong>Understanding Logistics For Apparel</strong></h4><p>Different Ways to Ship Apparel from Overseas brings to light the importance of logistics in the global apparel industry. As the demand for apparel continues to grow, efficient shipping modes play a crucial role in ensuring timely delivery and customer satisfaction.</p><p>Shipping modes such as air freight, sea freight, and land transportation offer their unique advantages and impact the apparel industry differently.&nbsp;<strong>Air freight</strong> is known for its speed, making it ideal for urgent shipments and time-sensitive products. On the other hand,&nbsp;<strong>sea freight</strong> is more cost-effective and suitable for bulk shipments, allowing apparel manufacturers and retailers to save on transportation costs.</p><p>Moreover, the choice of shipping mode can have a significant impact on the overall supply chain. Quick and reliable delivery can lead to reduced lead times, increased inventory turnover, and enhanced customer loyalty. It also allows the apparel industry to expand their reach, explore new markets, and establish a global presence.</p><p>Understanding logistics for apparel is essential for businesses operating in the international marketplace. By leveraging the right shipping modes, apparel companies can streamline their operations, achieve cost-efficiency, and meet customer demands effectively.</p><h4><strong>Air Freight Pros And Cons</strong></h4><figure class=\"table\"><table><tbody><tr><td><strong>Speed and reliability:</strong> Air freight is known for its fast delivery times, making it an ideal option for shipping apparel from overseas. With airlines operating on fixed schedules, you can expect your goods to arrive on time. Additionally, air freight provides a high level of reliability, reducing the risk of delays or damage to your shipments.</td></tr><tr><td><strong>Cost implications:</strong> While air freight offers speed and reliability, it comes at a higher cost compared to other shipping methods. The high transport fees, handling charges, and fuel surcharges associated with air freight can significantly impact your overall shipping costs. Therefore, it is essential to carefully assess your budget and weigh the benefits against the expenses before choosing air freight as your preferred shipping method for apparel.</td></tr></tbody></table></figure><h4><strong>Choosing Container Shipping</strong></h4><p>Choosing the right method for shipping apparel from overseas is crucial for any business. When it comes to container shipping, there are two options to consider: full container load (FCL) and less container load (LCL).</p><p><strong>Full container load (FCL)</strong> is ideal for large shipments where you need an entire container for your apparel. With FCL, you have the flexibility to load and secure your products within a container without sharing the space with other shipments. This ensures that your apparel is protected throughout the entire journey.</p><p><strong>Less container load (LCL)</strong> is suitable for smaller shipments that don\'t require a full container. LCL combines multiple shipments from different companies into one container, allowing you to share the cost of shipping. However, since your apparel will be packed with other items, there is a higher risk of damage or loss.</p><p>When it comes to sea shipping timelines, the duration will vary depending on the origin and destination of your shipment. It\'s important to consider the transit time, which includes loading and unloading at ports, customs clearance, and potential delays due to weather conditions. Shipping companies can provide estimated timelines, but it\'s essential to factor in potential delays and plan accordingly.</p><h4><strong>Cross-country Trucking And Rail</strong></h4><p>Shipping apparel from overseas requires careful consideration of different transportation methods. Cross-country trucking and rail play a crucial role in last-mile delivery. These modes of transportation are often used to transport apparel from ports or distribution centers to local warehouses or retail stores. Trucking provides the flexibility and reliability required for timely delivery, while rail offers a cost-effective and environmentally friendly option for transporting large quantities of apparel over long distances.</p><p>Intermodal shipping strategies, which combine trucking and rail, further optimize the transportation process. By utilizing both modes of transportation, intermodal shipping can reduce costs and improve efficiency. This strategy involves loading apparel onto containers, which can be easily transferred between trucks and trains. Additionally, intermodal shipping provides greater capacity, allowing for the transportation of larger volumes of apparel.</p><p>Overall, cross-country trucking and rail are essential components of the apparel shipping process. By leveraging intermodal shipping strategies, businesses can efficiently transport apparel from overseas to their desired destinations.</p><h4><strong>Exploring Air And Sea Integration</strong></h4><p>When it comes to shipping apparel from overseas, finding the right balance between cost and speed is crucial. One option to consider is air and sea integration, which offers a hybrid approach. This method combines the advantages of air freight and ocean freight to optimize both time efficiency and affordability.</p><p>Air freight is known for its speed and reliability. It allows for quick transportation of apparel, especially for time-sensitive shipments. On the other hand, ocean freight is a cost-effective solution for shipping large quantities of apparel over longer distances.</p><p>By combining these two modes of transportation, businesses can benefit from reduced costs without compromising on delivery speed. Hybrid shipping routes utilize air freight for the initial leg of the journey and then switch to sea freight for the remaining distance. This strategy allows for a cost-efficient yet timely delivery process.</p><p>With air and sea integration, apparel companies can ensure their products reach their destination in a timely manner while keeping transportation costs under control.</p><h4><strong>Economy Vs. Expediency In Apparel Shipping</strong></h4><p>Shipping apparel from overseas requires careful consideration of various factors, including cost and efficiency. Two main options to compare are economy shipping and expedited shipping. In terms of cost-effectiveness, economy shipping offers a more affordable solution. It allows for bulk shipment at a lower price, making it ideal for businesses looking to minimize expenses. However, it usually has a longer delivery time.</p><p>On the other hand, expedited shipping provides quicker delivery, which is necessary for time-sensitive shipments. Although it may be more expensive, it ensures that the apparel reaches its destination promptly. This option is particularly important for businesses that need to meet tight deadlines or fulfill last-minute orders.</p><p>When considering these options, it\'s essential to assess your specific shipping requirements. If cost is a primary concern and time is not of the essence, economy shipping can be a suitable choice. If speed and efficiency are critical, investing in expedited shipping will ensure a timely delivery. By carefully evaluating your needs, you can select the optimal shipping method for your apparel shipments from overseas.</p><h4><strong>Navigating Apparel Import Regulations</strong></h4><p>There are several key considerations to keep in mind when shipping apparel from overseas. Navigating apparel import regulations is crucial in ensuring a smooth and legal process. One important aspect to consider is tariffs and trade agreements. Understand the specific tariff rates and trade agreements between the country of origin and the destination country can help determine the overall cost of importing apparel. Additionally, it is important to carefully review the documentation and legal requirements associated with importing apparel. This may include ensuring compliance with labeling and safety regulations, as well as obtaining necessary permits and certifications.</p><p>By thoroughly understanding the regulations and legal considerations involved in shipping apparel from overseas, businesses can better navigate the import process and avoid any potential issues or delays. It is important to stay informed and up-to-date with any changes or updates to import regulations to ensure a successful and efficient shipping experience.</p><h4><strong>Apparel Specific Packaging Tips</strong></h4><p>When shipping apparel from overseas, it is essential to pay attention to material handling and safety in order to minimize damage during transit.</p><ul><li>Use sturdy corrugated boxes to protect the apparel from external pressure and mishandling.</li><li>Consider using padded mailers or poly bags for lighter garments.</li><li>Wrap fragile items, such as accessories or delicate fabrics, in tissue paper or bubble wrap.</li><li>Clearly label each package with the recipient\'s address and contact information.</li><li>Include a return address in case the package needs to be sent back.</li><li>Indicate that the package contains apparel to ensure proper handling.</li><li>Seal the packages tightly to prevent any items from falling out during transit.</li><li>Use packaging tape that is strong and durable.</li><li>Consider adding inner packaging, such as tissue paper or foam inserts, to provide extra cushioning.</li></ul><p>By following these apparel-specific packaging tips, you can ensure that your garments arrive safely and remain in excellent condition when shipped overseas.</p><h4><strong>FAQs: Different Ways To Ship Apparel From Overseas</strong></h4><p><strong>What Is The Best Way To Ship Clothes Overseas?</strong>&nbsp;</p><p>The best way to ship clothes overseas is by using a reliable international shipping service. Ensure your clothes are properly packaged, use a sturdy box, and fill any empty space with packing material. Include a detailed inventory list and consider insuring your shipment for additional protection.&nbsp;</p><p><strong>How Do I Ship Merch Internationally?</strong>&nbsp;</p><p>To ship merch internationally, follow these guidelines: 1. Choose a reliable shipping carrier that offers international services. 2. Check and comply with customs regulations of the destination country. 3. Package the merch securely to protect it during transit. 4. Fill out customs declarations accurately with detailed item descriptions.&nbsp;&nbsp;</p><p><strong>How Is Clothing Shipped Overseas?</strong></p><p>Clothing is shipped overseas through international shipping services. It is securely packaged and sent via air or sea freight. The clothing is usually placed in containers or boxes to ensure protection during transit. Shipping fees vary based on weight, destination, and delivery speed.&nbsp;</p><p><strong>What Is The Least Expensive Way To Ship Clothes?</strong>&nbsp;</p><p>The most affordable way to ship clothes is to use USPS First Class Mail or Flat Rate shipping options. These services offer competitive rates and reliable delivery for clothing items.&nbsp;</p><p><strong>Conclusion</strong>&nbsp;</p><p>To sum up, there are several effective ways to ship apparel from overseas. By understanding the different options available such as air freight, sea freight, and express courier services, you can make informed decisions based on your specific requirements. It\'s crucial to consider factors like cost, speed, and reliability to ensure successful delivery.</p><p>By following these guidelines, you can streamline your shipping process and ensure timely delivery of your apparel orders from overseas.</p><p><br>&nbsp;</p>', 'media/uploads/blog-images/169379788458.jpg', 305, 'ship apparel from overseas', 'There are several different ways to ship apparel from overseas, including using international carriers, freight forwarding services, and dropshipping methods. Shipping apparel internationally can be done through various carriers such as FedEx, DHL, UPS, or USPS.', 1, '2023-09-02 02:00:32', '2024-06-14 05:42:42'),
(2, NULL, 'The Ultimate Guide to Buying Clothes Overseas: Insider Tips for Global Fashion Finds', '<p><strong>The Ultimate Guide to Buying Clothes Overseas offers valuable insights into purchasing clothes from international sellers, including tips for finding the best deals and ensuring a smooth shopping experience. As the world becomes more connected, buying clothes from other countries has become increasingly popular.</strong></p><p>Whether you\'re looking for unique fashion pieces or seeking to save money on designer brands, shopping overseas can offer a wide range of options. However, navigating the process can be daunting, so it\'s important to have a comprehensive guide that covers everything from researching reliable sellers to understanding international sizing charts.</p><p>This guide will equip you with the knowledge and confidence to make savvy clothing purchases from overseas sources.</p><h4><strong>The Ultimate Guide To Buying Clothes Overseas</strong></h4><p>The allure of foreign brands and styles can be irresistible when shopping for clothes overseas. However, one challenge that arises is navigating size differences and fitting. To ensure a successful clothing purchase abroad, it is essential to consider a few important factors. Firstly, always check the sizing charts provided by the brand or store you are purchasing from. Take your measurements and compare them to the chart to find the most accurate size. Additionally, it is helpful to know your size equivalents in the country you are visiting. Research the conversion charts beforehand to make the shopping experience smoother. Lastly, reading customer reviews can provide valuable insights into the sizing and fit of the clothes. This can help you make an informed decision before making a purchase. Overall, by being aware of size differences and doing proper research, buying clothes overseas can be a rewarding and stylish experience.</p><h4><strong>Research Before You Fly</strong></h4><p>Traveling overseas is exciting, and one of the best ways to immerse yourself in another culture is by buying clothes that are unique to that region. However, before you embark on your shopping adventure, it is essential to conduct thorough research. It is crucial to familiarize yourself with the cultural dress codes and norms of the country you will be visiting, as customs and traditions regarding clothing can vary greatly. This understanding will help you avoid any inadvertent cultural faux pas while ensuring that you dress appropriately and respectfully.</p><p>Another important aspect of researching before you fly is learning a few key phrases in the local language. While English is widely spoken in many tourist destinations, knowing basic phrases will enhance your shopping experience. Being able to communicate your preferences and negotiate prices will enable you to find the best deals and discover unique pieces. By taking the time to research and prepare, you can make the most of your overseas shopping experience, finding the perfect clothes to add to your wardrobe and creating lasting memories.</p><h4><strong>Discovering Local Fashion Trends</strong></h4><p>When buying clothes overseas, one of the best ways to discover local fashion trends is by utilizing social media and travel blogs for inspiration.&nbsp;<strong>Social media platforms</strong>, such as Instagram and Pinterest, allow travelers to follow local influencers and fashion bloggers who share their personal style and highlight the latest fashion trends in the area. By following these influencers, you can get a&nbsp;<strong>glimpse of the local fashion scene</strong> and gather inspiration for your own wardrobe.</p><p>Additionally, browsing through&nbsp;<strong>travel blogs</strong> that focus on fashion and style can provide valuable insights into the local fashion trends of different countries and regions. These blogs often feature&nbsp;<strong>recommendations for popular local boutiques and markets</strong> where you can find unique and on-trend clothing pieces.</p><p>When looking for popular local boutiques and markets, it\'s essential to do your research and&nbsp;<strong>read reviews</strong> from other travelers to ensure you\'re visiting reputable establishments. Furthermore,&nbsp;<strong>checking out local fashion events and festivals</strong> can also help you immerse yourself in the local fashion culture and discover emerging designers and trends.</p><p>In conclusion, by utilizing social media, travel blogs, and conducting thorough research, you can stay informed about local fashion trends and make the most of your clothing shopping experience overseas.</p><h4><strong>Currency And Budgeting Strategies</strong></h4><p>When buying clothes overseas, one of the key considerations is managing foreign exchange rates to get better deals. You need to set a realistic budget without compromising on quality.&nbsp;<strong>Researching current exchange rates</strong> is crucial to understand the value of your local currency compared to the currency used in the country you\'ll be visiting. Use online currency converters to keep track of the exchange rates and&nbsp;<strong>plan your budget accordingly</strong>. It\'s advisable to&nbsp;<strong>monitor the rates over a period of time</strong> to identify any fluctuations that may affect your spending.&nbsp;<strong>Consider using a prepaid travel card</strong> that allows you to load funds in advance and take advantage of favorable rates. Another strategy is to&nbsp;<strong>shop during seasonal sales</strong> or look for local markets where you can find unique clothing items at reasonable prices. By&nbsp;<strong>being mindful of foreign exchange rates and setting a realistic budget</strong>, you can make the most out of buying clothes overseas.</p><h4><strong>Mastering The Art Of Bargaining</strong></h4><p>The key to successfully buying clothes overseas is mastering the art of bargaining. In order to negotiate the best prices, it is important to understand the cultural do\'s and don\'ts while negotiating. Effective communication tactics can also be helpful in getting better deals.</p><p>When bargaining, it is crucial to be respectful and polite.&nbsp;<strong>Observe local customs</strong> and be mindful of the&nbsp;<strong>appropriate behavior for bargaining</strong>. While it is acceptable to negotiate prices in some cultures, in others it may be seen as rude or offensive.&nbsp;<strong>Do your research</strong> and&nbsp;<strong>learn about the local customs and practices</strong> so that you can approach bargaining with confidence.</p><p><strong>Maintaining a friendly and positive attitude</strong> during negotiations can also work in your favor.&nbsp;<strong>Build rapport with the seller</strong> by engaging in small talk and showing genuine interest. This can help create a more pleasant atmosphere for bargaining and potentially lead to better prices.</p><p><strong>Listening carefully</strong> to the seller and&nbsp;<strong>paying attention to non-verbal cues</strong> can provide valuable insights during negotiations.&nbsp;<strong>Ask relevant questions</strong> and&nbsp;<strong>show that you are knowledgeable</strong> about the product. This demonstrates your seriousness as a buyer and may help in negotiating a favorable price.</p><p>Finally,&nbsp;<strong>be prepared to walk away</strong> if the price is not acceptable. Sometimes, sellers may reconsider their initial offer when faced with the possibility of losing a potential sale.</p><p>By mastering the art of bargaining, understanding cultural sensitivities, and using effective communication tactics, you can become a savvy buyer and get the best deals when buying clothes overseas.</p><h4><strong>Shipping Vs. Packing Your Finds</strong></h4><p>The ultimate guide to buying clothes overseas wouldn\'t be complete without considering the options for shipping versus packing your finds. Evaluating the cost and logistics of international shipping is an important factor to take into account. It\'s essential to weigh the expenses associated with shipping your purchases back home versus organizing creative and ingenious packing hacks to bring your clothes with you.</p><p>There can be advantages to both methods. Shipping allows for convenience and the ability to purchase larger quantities of clothing without the worry of carrying them yourself. However, it can be costly, with additional fees such as customs duties and taxes. On the other hand, packing your finds can be a fun challenge. You can experience the joy of personal shopping and the satisfaction of successfully fitting everything into your luggage. Plus, there\'s the added benefit of avoiding potential shipping delays or mishaps.</p><p>Ultimately, the decision between shipping and packing your finds will depend on your budget, shopping habits, and the specific circumstances of your trip. Consider the pros and cons of each option to determine the best fit for you.</p><h4><strong>Navigating Customs And Duty Fees</strong></h4><p>The process of buying clothes overseas can be both exciting and daunting. However, it\'s important to be aware of the potential customs and duty fees that may be incurred. Understanding tax exemptions and duty-free concessions can help you navigate these extra costs and save money on your clothing purchases.</p><p>One strategy to minimize extra costs is to familiarize yourself with the tax exemptions and duty-free limits of the country you\'re visiting. Each country has its own rules and regulations regarding customs fees, so it\'s essential to do your research beforehand. This will enable you to determine the maximum value of clothing items you can bring back without incurring any additional charges.</p><p>Another effective approach is to consider the timing of your purchases. Taking advantage of duty-free shopping periods or special promotions can help you save a significant amount of money. These opportunities are often available during holiday seasons or major sales events.</p><p>Lastly, if you plan on making substantial clothing purchases overseas, it may be worth considering shipping the items back home instead of carrying them with you. This can help avoid exceeding duty-free limits and decrease the risk of additional charges.</p><h4><strong>Embracing Sustainable Shopping Overseas</strong></h4><p>The ultimate guide to buying clothes overseas is all about embracing sustainable shopping practices. One important aspect to consider is the identification of eco-friendly clothing brands and shops. Look for brands that prioritize sustainable materials and ethical production practices. These brands often use organic or recycled materials, minimize waste, and support fair trade. By purchasing from these brands, you contribute to the reduction of environmental impact and also support the livelihoods of local communities.</p><p>Another important factor to consider is the impact of your purchases on local economies and the environment. When you buy clothes overseas, you have the opportunity to support local artisans and small businesses. This helps to stimulate the local economy and preserve traditional craftsmanship.</p><p>Moreover, buying clothes overseas can also have environmental benefits. By choosing locally made clothing, you reduce the carbon footprint associated with long-distance shipping.</p><h4><strong>FAQs: The Ultimate Guide To Buying Clothes overseas</strong></h4><p>&nbsp;</p><p><strong>How Do You Buy Clothes That You Will Actually Wear?</strong></p><p>To buy clothes you\'ll actually wear: 1) Know your personal style and comfort, 2) Consider the occasion and dress code, 3) Find clothes that fit well and flatter your body type, 4) Choose versatile pieces that can be mixed and matched, and 5) Prioritize quality over quantity for long-lasting wear.</p><h4><strong>How To Get A Bunch Of Clothes For Cheap?</strong></h4><p>To get a bunch of cheap clothes, try shopping during sales, clearance events, or at thrift stores. Online platforms and apps offering secondhand clothing may also have affordable options. Consider joining clothing swap communities or organizing swaps with friends. Don\'t forget to compare prices and look for discounts or promo codes before making a purchase.</p><p><strong>Why Do We Buy Clothes From Other Countries?</strong></p><p>We buy clothes from other countries because they offer a variety of styles and designs not easily found locally. Plus, the cost of production and labor is often lower in those countries, making clothes more affordable for consumers.&nbsp;</p><p><strong>How To Budget For Clothes Shopping?</strong></p><p>To budget for clothes shopping, follow these guidelines: 1. Determine your monthly clothing allowance and stick to it. 2. Prioritize your needs over wants and focus on essential items. 3. Research and compare prices to find the best deals. 4. Look for sales, discounts, and second-hand options to save money.&nbsp;</p><p><strong>Conclusion</strong></p><p>To sum up, buying clothes overseas can offer you a world of unique fashion finds and great deals. By following the steps outlined in this guide, you\'ll be well-prepared to navigate the challenges and make the most of your international shopping experience.&nbsp;</p><p>Remember to research local customs, sizes, and shipping policies before making any purchases. Happy shopping!</p><p><br>&nbsp;</p>', 'media/uploads/blog-images/16937978469.jpg', 346, 'Clothes Shopping, Buy Clothes From Other Countries', 'The Ultimate Guide to Buying Clothes Overseas offers valuable insights into purchasing clothes from international sellers, including tips for finding the best deals and ensuring a smooth shopping experience. As the world becomes more connected, buying clothes from other countries has become increasingly popular.', 1, '2023-09-03 12:14:35', '2024-06-15 20:17:44'),
(3, NULL, 'Why Should You Prefer Bangladeshi Garments Buying House? Discover the Benefits!', '<p><strong>Bangladeshi Garments Buying Houses should be preferred for their competitive prices and high-quality products. Bangladeshi Garments Buying Houses offer a range of benefits that make them a preferred choice for buyers.</strong></p><p>Firstly, they provide competitive prices due to the country\'s low production and labor costs. Secondly, they ensure high-quality products by maintaining strict quality control measures throughout the production process. Thirdly, Buying Houses in Bangladesh have well-established relationships with numerous manufacturers, allowing them to offer a wide range of products and styles.</p><p>Additionally, they have extensive knowledge and experience in the garment industry, ensuring efficient communication and seamless coordination between buyers and manufacturers. Lastly, Bangladeshi Garments Buying Houses are known for their ethical and sustainable practices, making them a responsible choice for socially conscious buyers.</p><h4><strong>Reasons To Prefer Bangladeshi Garment Houses</strong></h4><p>There are several compelling reasons why you should consider preferring Bangladeshi garment buying houses for your sourcing needs. Firstly, Bangladeshi garment houses hold a unique position in the global textile market. With a well-established and extensive network of manufacturers, suppliers, and exporters, they are equipped to cater to the diverse requirements of international buyers.</p><p>Moreover, Bangladesh has a rich history of textile craftsmanship, dating back centuries. This heritage, combined with the country\'s skilled workforce, enables Bangladeshi garment houses to offer a wide range of high-quality products.</p><p>Another key advantage is the high-value proposition they offer for bulk purchasers. As one of the largest textile exporters in the world, Bangladeshi garment houses have the capacity to handle large orders efficiently and cost-effectively. Their economies of scale, coupled with competitive pricing, make them an attractive choice for businesses looking to optimize their sourcing strategies.</p><h4><strong>Considering Cost-effective Solutions</strong></h4><p>Considering cost-effective solutions is essential when choosing a Bangladeshi garments buying house. One of the key advantages of competitive pricing is access to affordable labor and materials. Bangladesh has a large pool of skilled and semi-skilled workers who can produce garments at lower wages compared to many other countries. Additionally, the country has a strong textile industry that provides a steady supply of quality materials at competitive prices.</p><p>By opting for a Bangladeshi buying house, you can significantly reduce your overall garment production cost. The combination of affordable labor and materials allows for cost savings without compromising on the quality of the end product. This makes Bangladesh an attractive destination for businesses looking for cost-effective solutions in the garment industry.</p><h4><strong>Quality Standards In Production</strong></h4><p>When it comes to buying garments, Bangladeshi buying houses are a preferred choice due to their commitment to quality standards. These buying houses ensure alignment with international quality benchmarks, ensuring that the garments produced meet the highest standards. They implement stringent quality controls at every stage of production, ensuring that the garments are of excellent quality and meet the requirements of the buyers.</p><p>One of the reasons why Bangladeshi buying houses are favored is their reputation for reliable garment production. They have established themselves as trustworthy and dependable partners in the garment industry. Buyers can rely on them to deliver high-quality garments consistently, meeting deadlines and exceeding expectations. This reputation is built on years of experience and a commitment to excellence.</p><h4><strong>Variety And Flexibility Offered</strong></h4><p>Bangladeshi garments buying houses are the preferred choice for many buyers due to the&nbsp;<strong>wide range of garment categories and styles</strong> they offer. These buying houses cater to diverse fashion tastes and requirements, ensuring that buyers can find exactly what they are looking for. The&nbsp;<strong>customization capabilities</strong> of Bangladeshi garment buying houses further add to their appeal. Buyers have the opportunity to modify and personalize garments according to their specific needs and preferences. This flexibility allows buyers to stand out in the market and cater to their own unique customer base. Another advantage of Bangladeshi garment buying houses is their&nbsp;<strong>quick adaptation to fashion trends</strong>. They stay updated with the latest styles and designs, ensuring that buyers can access the most fashionable and in-demand garments. With such variety and flexibility, it\'s no wonder that Bangladeshi garment buying houses are the preferred choice for many buyers.</p><h4><strong>Streamlined Supply And Logistics</strong></h4><p>One of the key reasons to prefer buying garments from a Bangladeshi buying house is the streamlined supply and logistics offered by this region. The proximity of Bangladesh to key shipping routes ensures easier and faster transportation of goods. The efficient supply chain management practiced by the buying houses in Bangladesh further contributes to smooth operations and timely deliveries.</p><p>The benefits of local logistical support cannot be undermined. Being situated in Bangladesh, the buying houses have easy access to local resources and networks that enable them to effectively manage the entire supply chain. This includes warehousing, transportation, and distribution of products. The local expertise combined with the understanding of international market trends allows Bangladeshi buying houses to meet customer demands effectively.</p><p>In conclusion, the streamlined supply and logistics provided by Bangladeshi buying houses, due to their proximity to shipping routes and efficient supply chain management, along with the benefits of local logistical support, make them a preferred choice for garment buyers.</p><h4><strong>Ethical Sourcing And Sustainability</strong></h4><p>When choosing a garments buying house, it is important to prioritize ethical sourcing and sustainability. Bangladeshi garments buying houses have made commendable efforts towards these goals. They place a strong emphasis on ethical labor practices, ensuring that workers are treated fairly and provided with safe working conditions.</p><p>Moreover, these buying houses have implemented initiatives for sustainable production. This includes the use of eco-friendly materials and processes that minimize environmental impact. They adhere to strict compliance with environmental standards, such as water and energy conservation, waste management, and reducing greenhouse gas emissions.</p><p>By preferring Bangladeshi garments buying house, you can make a conscious choice to support ethical practices and reduce your carbon footprint. Their commitment to sustainability and ethical sourcing sets them apart in the global fashion industry.</p><h4><strong>The Surge In Technological Advancement</strong></h4><p>The surge in technological advancement has revolutionized the Bangladeshi garments buying house industry. One major factor contributing to this transformation is the continuous investment in modern manufacturing technology. The use of technology for design and pattern making has streamlined the entire production process. It has reduced the dependency on manual labor and increased efficiency. Turnaround times have significantly improved, enabling quicker delivery of orders. Moreover, the accuracy in design and pattern making has reached unprecedented levels. This ensures that the final garments meet the highest quality standards, satisfying the demands of international buyers. Bangladeshi garments buying houses are embracing these technological advancements, positioning themselves as leaders in the global market. Investing in modern manufacturing technology has proven to be a game-changer, enabling them to offer superior products and services to their clients.</p><p>&nbsp;</p><h4><strong>Why Should You Prefer Bangladeshi Garments Buying House?</strong></h4><p><strong>Why Should You Prefer Bangladeshi Garments Buying House?</strong></p><p>Strategic partnerships play a crucial role in enhancing business growth. Bangladeshi Garments Buying Houses offer the advantage of establishing such partnerships with manufacturers. These houses provide tailored services that meet specific buyer needs. By deeply understanding buyer requirements, they ensure the right products are sourced and delivered on time.</p><p>Moreover, Bangladeshi Garments Buying Houses focus on building long-term collaborations rather than short-term transactions. This approach ensures market success for both buyers and suppliers. By nurturing relationships, these buying houses help buyers secure quality products consistently while helping local manufacturers gain a stable market presence.</p><p><strong>Advantages of Bangladeshi Garments Buying Houses</strong></p><ul><li><strong>Strategic partnerships for business growth</strong></li><li><strong>Tailored services meeting buyer needs</strong></li><li><strong>Long-term collaborations for market success</strong></li></ul><p>&nbsp;</p><h4><strong>FAQs: Why Should You Prefer Bangladeshi Garments Buying house?</strong></h4><p><strong>Why Is The Garments Industry Important In Bangladesh?</strong></p><p>The garments industry is vital in Bangladesh due to its significant contribution to the country\'s economy. It serves as a major source of employment, foreign exchange earnings, and industrial growth. The industry has helped in poverty reduction and uplifting the living standards of millions of people in Bangladesh.</p><p><strong>Why Is Bangladesh Becoming A Favourable Destination For Textile Industry?</strong></p><p>Bangladesh is becoming a favorable destination for the textile industry due to its low production costs, skilled labor force, and a large population. The country offers competitive wages and has efficient supply chains, attracting many international brands and retailers. Additionally, Bangladesh has favorable government policies and investment incentives, making it an attractive choice for textile manufacturers.&nbsp;</p><p><strong>Why Do Businesses Choose To Manufacture Their Clothing In Bangladesh?&nbsp;</strong></p><p>Businesses choose to manufacture their clothing in Bangladesh due to its low labor costs, skilled workforce, and well-established garment industry. The country offers competitive pricing, efficient production processes, and a wide range of manufacturing capabilities, making it a cost-effective and convenient choice for clothing production.&nbsp;</p><p><strong>What Part Of The Garment Industry Does Bangladesh Specialize?</strong>&nbsp;</p><p>Bangladesh specializes in the garment industry, particularly in the production of clothing and textiles. It is known for its expertise in manufacturing and exporting a wide range of garments for global brands.</p><p><strong>Conclusion</strong></p><p>In a nutshell, opting for a Bangladeshi garments buying house showcases numerous advantages. The superior quality and affordable prices offered by Bangladeshi manufacturers ensure a win-win situation for both buyers and sellers. Additionally, the country\'s strong ethical and sustainable practices contribute to its growing reputation in the global fashion industry.</p><p>By collaborating with a Bangladeshi garments buying house, you can tap into a vast pool of expertise, impressive craftsmanship, and seamless supply chain management. Make the smart choice and experience the excellence of Bangladesh\'s garment sector.</p>', 'media/uploads/blog-images/169391017074.jpg', 316, 'Garments Buying Houses, Bangladeshi Garments', 'Bangladeshi Garments Buying Houses should be preferred for their competitive prices and high-quality products. Bangladeshi Garments Buying Houses offer a range of benefits that make them a preferred choice for buyers.', 1, '2023-09-03 12:14:59', '2024-06-18 21:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Beige', 'beige', 1, '2023-08-19 11:37:14', '2023-08-19 11:37:14'),
(2, 'Black', 'black', 1, '2023-08-19 11:37:14', '2023-08-19 11:37:14'),
(3, 'Blue', 'blue', 1, '2023-08-19 11:37:14', '2023-08-19 11:37:14'),
(4, 'Blush', 'blush', 1, '2023-08-19 11:37:14', '2023-08-19 11:37:14'),
(5, 'Brown', 'brown', 1, '2023-08-19 11:37:14', '2023-08-19 11:37:14'),
(28, 'Yellow', '#FFFF00', 1, '2023-09-05 04:46:26', '2023-09-05 04:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Beverly Mckay', 'tuqijuzowa@mailinator.com', NULL, 'Ut delectus perspiciatis anim temporibus nulla inventore', 'Aperiam voluptate iure voluptatibus ipsa quia quisquam', '2023-09-02 00:39:41', '2023-09-02 00:39:41'),
(2, 'Ulric Grimes', 'kafawilala@mailinator.com', NULL, 'Aperiam temporibus enim exercitation sit maxime', 'Ad irure quo ea sed do enim irure dolore quam ut sint', '2023-09-02 00:41:36', '2023-09-02 00:41:36'),
(3, 'Orla Rosa', 'qihogan@mailinator.com', NULL, 'Proident occaecat quidem id ea incididunt quis et assumenda voluptate nemo beatae excepteur non ita', 'Quo iure rem animi ullamco aute sunt nobis dolor rerum', '2023-09-02 00:43:43', '2023-09-02 00:43:43'),
(4, 'Md. Omar Faruk', 'faruk.bm01@gmail.com', NULL, 'Test Office365 email', 'Lorem Ipsum', '2023-09-02 20:12:15', '2023-09-02 20:12:15'),
(5, 'John Hans', 'faruk.bddevs@gmail.com', NULL, 'Test Office365 email 3', 'Test Office365 email 0002', '2023-09-02 20:28:13', '2023-09-02 20:28:13'),
(6, 'James', 'arafat0009@gmail.com', NULL, 'Test Office365 email', 'asdf', '2023-09-02 20:29:25', '2023-09-02 20:29:25'),
(7, 'Md. Omar Faruk', 'faruk.bm01@gmail.com', NULL, 'Test Office365 email', 'asfd', '2023-09-02 20:51:41', '2023-09-02 20:51:41'),
(8, 'Md. Omar Faruk', 'faruk.bm01@gmail.com', NULL, 'Test Office365 email', 'Lorem Ipsum', '2023-09-03 23:48:38', '2023-09-03 23:48:38'),
(9, 'Touhid', 'touhid@gmail.com', NULL, 'Need some products', 'Dear sir,\r\n\r\nI need some clothes.', '2023-09-05 04:44:12', '2023-09-05 04:44:12'),
(10, 'RandyAmips', 'va.sigond.e.r@gmail.com', NULL, 'Чтение новостей: Почему это принципиально для меня и моего делового фуррора', 'Во всем мире, где информация изменяется с бешеной скоростью, умение оставаться в курсе мероприятий через чтение новостей делается критически важным опытом, тем более в контексте деловой работы. В этом тексте я поведаю о том, отчего для меня, как для делового человека, чтение новостей имеет высочайшее значение. \r\n \r\n1. Обновление знаний и животрепещущей инфы \r\n \r\nСовременный бизнес требует быстрого реагирования на конфигурации в мире. Чтение новостей позволяет мне быть в курсе последних событий, политических перемен, тенденций на рынке, экономических данных и других важных факторов, которые имеют все шансы воздействовать на мою деятельность. Это обновление познаний может помочь брать на себя информированные заключения. \r\n<a href=https://milkforyou.ru/>https://milkforyou.ru/</a> \r\n \r\n2. Анализ соперников и рынка \r\n \r\nЧтение новостей о конкурентах и текущих направленностях на рынке выделяет мне возможность лучше понимать, какие стратегии и стратегии трудятся у других игроков в моей области. Данный тест помогает мне адаптировать свои бизнес-процессы и замерзнуть более конкурентоспособным. \r\n \r\n3. Прогнозирование рисков и вероятностей \r\n \r\nЧтение новостей позволяет мне распознавать о вероятных рисках и возможностях, связанных с моей деятельностью. У меня есть возможность расценить, какие причины могут оказать влияние на мой бизнес и разработать стратегию для минимизации рисков и использования возможностей. \r\n \r\n4. Развитие профессиональных навыков \r\n \r\nЧтение новостей требует аналитического мышления и критичного анализа информации. Это развивает мои профессиональные способности, эти как способность анализа данных, принятия решений и коммуникации. Такие способности выжны в мире бизнеса. \r\n \r\n5. Улучшение коммуникации \r\n \r\nЧтение новостей также улучшает мои способности общения. Зная актуальную информацию, у меня есть возможность эффективнее знаться с сослуживцами, клиентами и партнерами, поддерживая информированные диалоги и дискуссии. \r\n \r\n6. Поиск вероятностей для вложений \r\n \r\nЧтение новостей о финансовых рынках и инвестициях разрешает мне отыскивать потенциально выгодные возможности для инвестирования своих средств. Важная информация о денежных трендах и индустриях может помочь мне принимать обоснованные решения о вложениях. \r\n \r\n7. Осознание глобальных направленностей \r\n \r\nМир сегодня тесно связан, и события в одной части мира имеют все шансы повлиять на иные ареалы. Чтение глобальных новостей может помочь мне понимать массовые направленности, которые могут воздействовать на мою компанию или рынок. \r\n \r\n8. Соц обязанность \r\n \r\nЧтение новостей кроме того разрешает мне оставаться в курсе соц и экологических проблем. Это может помочь мне брать на себя ответственные заключения и внедрять устойчивые практики в своем бизнесе. \r\n \r\n9. Постоянное обучение и самосовершенствование \r\n \r\nЧтение новостей провоцирует меня к неизменному обучению и самосовершенствованию. Я всегда рвусь узнавать что-то новое и развивать средства знания и навыки. \r\n \r\n10. Более действенное управление временем \r\n \r\nХотя может показаться,  собственно что чтение новостей отнимает большое количество времени, это на самом деле может помочь мне более эффективно рулить временем. Информированный выбор того,  собственно что читать, и использование специализированных источников позволяет мне фокусироваться на более важных для меня темах. \r\n \r\nВ итоге, чтение новостей становится обязательной частью моей деловой рутины. Это не только способ оставаться информированным, да и ключевой фактор в достижении фуррора в мире бизнеса. Быть в курсе событий, анализировать информацию и брать на себя информированные решения - это то, что делает меня более действенным и компетентным специалистом.', '2023-10-06 05:30:15', '2023-10-06 05:30:15'),
(11, 'CharlesInjug', 'yasen.krasen.13+95508@mail.ru', NULL, 'Mfheidjwhfuh HUJUHGUJH djwidjwfhuefejjifeh NUHUUUhufhedjefheuhufheudhuwfhu', 'Nguheidjiwfefhei ijiwdwjurFEJDKWIJFEIF аоушвцшургаруш ШОРГПГОШРГРПГОГРГ iryuieoieifegjejj bvncehfedjiehfu bddevs.com', '2023-10-24 20:34:45', '2023-10-24 20:34:45'),
(12, 'DanielUnuby', 'norvie114@gmail.com', NULL, 'Stable income from email newsletters over $30,000 per month', 'Guaranteed income from email newsletters from $30,000 per month http://marketing-56531550.propertyybecho.com/offer?11426', '2023-10-30 10:16:20', '2023-10-30 10:16:20'),
(13, 'XwIpsmHnVz', 'MNqSvu.qpwtcmt@spinapp.bar', NULL, 'lhVqDSwkePfpyapovUXVAK', 'lhVqDSwkePfpyapovUXVAK', '2023-11-05 14:39:15', '2023-11-05 14:39:15'),
(14, 'Robertcof', 'james.fm.cosmetics@gmail.com', NULL, 'URGENTLY! YOU HAVE BEEN CREDITED $45,829.33. WITHDRAW MONEY URGENTLY', 'URGENT MESSAGE! Your earnings were $45,006.90. Withdraw money urgently http://swiftcashflow-2362665.dairobustos.com/page?766', '2023-11-06 06:25:15', '2023-11-06 06:25:15'),
(15, 'Petertwisp', 'maykekoopmans@hotmail.nl', NULL, 'ELEVATE YOUR LIFESTYLE WITH EARNINGS OF $10,000 PER WEEK AND MORE', 'Master the Art of Earning: $10,000 per Week and More http://wealthpath3keuros-357273.magnetorepairs.com/euro-3388', '2023-11-07 06:05:17', '2023-11-07 06:05:17'),
(16, 'BuddyMothe', '7.91.3.228@gmail.com', NULL, 'добрейшего денечка, уважаемый пользователь!', 'немало участников движения сейчас не переживают о своих покрышках до тех пор, пока резко не затормозят. \r\n \r\nна случай если протектор оказывается очень тонким, то скаты приходят в небезопасное состояние. Помните! Одной из существенных покупок, которые совершают автомобилисты, определенно являются покрышки. \r\n \r\nСогласно пожеланиям наших профи, вовремя произведенная смена шин вашего авто важна для надежности на автостраде. \r\n<a href=https://lista.md/companie/jante>https://lista.md/companie/jante</a> \r\n \r\n \r\nприобретение новых скатов может оказаться запутанной миссией. Вы сталкиваетесь с большим ассортиментом брендов, размеров и моделей скатов , в связи с этим запросто сбиться с мысли. \r\n \r\nчтобы получить кайф от путешествия, приобретайте покрышки, которые соответствуют вашему стилю управления. \r\n \r\nВозникли вопросы в пробретении нужной \"обуви\" для автомобилей для вашего транспортного средства? наш штат сотрудников высококвалифицированных профи поможет вам своим энтузиазмом. \r\n \r\nВам нравится комфортная поездка? Или вы предпочитаете ощущать каждый поворот? Вас поняли! наши квалифицированные профи вмиг найдут вам идеальные шины! \r\n \r\nбольшое число факторов вредят вашей резине. Начиная от препятствий и заканчивая сильным солнечным светом. \r\n \r\nв случае, если вы выберете неправильные колеса, то вы можете уменьшить производительность вашего авто и его умение справляться с любым климатом. Скаты вашего средства передвижения тщательно трудятся каждый раз, когда вы выезжаете на шоссе. \r\n \r\nлучший метод выяснить, настал ли момент ставить новые шины для вашего авто, — это возложить их проверку профессионалу. \r\n \r\nв нашем автотехцентре вы сможете подобрать колеса различных марок и брендов! И все по невысоким ценам! Поможем отыскать нужным вам! \r\n \r\nнаша автомастерскую ставит на первое место хотелки клиента. учитывая этот факт множество любителей машин доверяет нам! Мы гарантируем качество! залетайте! И убедитесь сами!', '2023-11-14 14:49:31', '2023-11-14 14:49:31'),
(17, 'BuddyMothe', 'an.ya.fil.a.tova32@gmail.com', NULL, 'доброго времени суток, дорогой друг!', 'немалое число хозяинов авто сейчас не переживают о своих покрышках до тех пор, пока им не придется резко свернуть. \r\n \r\nв случае, если протектор оказывается сильно тонким, то скаты приходят в неустойчивое состояние . не забывайте! Одной из значимых покупок, которые совершают пользователи авто, действительно является резина. \r\n \r\nСогласно напутствиям наших профессионалов, вовремя произведенная смена шин вашего легкового автомобиля важна для прочности на шоссе. \r\n<a href=https://www.rabota.md/ru/joburi/mecanic/13067131>https://www.rabota.md/ru/joburi/mecanic/13067131</a> \r\n \r\n \r\nприобретение новых покрышек может оказаться нелегкой миссией. Вы сталкиваетесь с немалым выбором брендов, размеров и моделей резины , в связи с этим сразу можно потеряться. \r\n \r\nС целью получить восторг от езды, выбирайте резину, которая не противоречит вашему стилю управления. \r\n \r\nНе хватает поддержки в смене необходимой резины для вашего железного коня? наш штат сотрудников профессиональных профи поможет вам своими навыками. \r\n \r\nВам нравится комфортная поездка? Или вы отдаете предпочтение чувствовать каждый поворот? Хорошо! наши квалифицированные эксперты моментально порекомендуют вам идеальную \"обувь\" для автомобилей! \r\n \r\nбольшое число факторов вредят вашим колесам. Начиная от препятствий и заканчивая быстрым стартом. \r\n \r\nв том случае, когда вы выберете неправильную \"обувь\" для авто, то вы можете уменьшить производительность вашей ласточки и его возможность справляться с любыми погодными условиями. Шины вашей тачки старательно трудятся каждый раз, когда вы выезжаете на магистраль. \r\n \r\nлучшее средство понять, пришла ли пора присматривать новые шины для вашего средства передвижения, — это доверить их обследование эксперту. \r\n \r\nв нашем автомаркете вы сможете купить \"обувь\" для автомобилей разнообразных марок и брендов! И все по дружественным ценам! Поможем вычислить соответствующие вам! \r\n \r\nнаша мастерская по ремонту автомобилей ставит на первое место приоритеты клиента. поэтому большое количество водителей доверяет нам! Мы гарантируем качество! приглашаем в гости! И убедитесь сами!', '2023-11-17 15:08:27', '2023-11-17 15:08:27'),
(18, 'JimmieFen', 'dmit.ri.ja.ro.no.v016@gmail.com', NULL, 'рады вас видеть, дорогой друг!', 'немалое количество автолюбителей на сегодняшний день не тревожатся о своих скатах до тех пор, пока резко не затормозят. \r\n \r\nпри условии, что протектор оказывается чересчур тонким, то колеса приходят в небезопасное состояние. не забывайте! Одной из полезных покупок, которые совершают пользователи авто, действительно являются шины. \r\n \r\nСогласно напутствиям наших профессионалов, постоянная замена шин вашего железного коня важна для стойкости на асфальте. \r\n<a href=https://www.2biz.ro/anvelopele-f>https://www.2biz.ro/anvelopele-f</a> \r\n \r\n \r\nзамена новых шин может оказаться тяжелой миссией. Вы сталкиваетесь с большим выбором брендов, размеров и моделей резины , , учитывая этот факт,  запросто можно сбиться с мысли. \r\n \r\nС целью получить наслаждение от поездки, приобретайте шины, которые не противоречат вашему стилю вождения. \r\n \r\nвам нужна помощь в пробретении подходящих скатов для вашей машины? наш персонал искусных автомехаников поможет вам своими знаниями. \r\n \r\nВам нравится бесшумная езда? Или вы предпочитаете ощущать каждый поворот? Хорошо! наши безупречные специалисты моментально посоветуют вам идеальные покрышки! \r\n \r\nнереальное число факторов вредят вашим шинам. Начиная от износа и заканчивая сильным солнечным светом. \r\n \r\nв случае, если вы найдете неправильные колеса, то вы можете уменьшить эффективность вашего железного коня и его умение справляться с любым климатом. Шины вашей легковушки прилежно работают всегда, когда вы выезжаете на автостраду. \r\n \r\nлучшее средство почувствовать, наступили ли времена выбирать новые шины для вашего железного коня, — это возложить их диагностику  профессионалу. \r\n \r\nв нашем сервисном центре вы сможете приметить скаты прославненных марок и брендов! И все по невысоким ценам! Поможем купить нужным вам! \r\n \r\nнаш автоцентр ставит на первое место потребности клиента. по этой причине немалое количество участников движения доверяет нам! Мы гарантируем качество! заскакивайте! И убедитесь сами!', '2023-11-18 14:05:40', '2023-11-18 14:05:40'),
(19, 'BuddyMothe', 'vandr.ess99.1@gmail.com', NULL, 'здравствуйте, уважаемый друг!', 'множество автолюбителей в современном мире не думают о своей резине до тех пор, пока не случится поломка. \r\n \r\nкогда протектор становится сильно тонким, то колеса приходят в опасное состояние. Примите во внимание! Одной из необходимых обновок, которые делают автолюбитель, определенно являются колеса. \r\n \r\nСогласно напутствиям наших экспертов, постоянная смена шин вашего легкового автомобиля важна для стойкости на дороге. \r\n<a href=https://www.mitsu.ro/forum_new/viewtopic.php?t=9756&start=10>https://www.mitsu.ro/forum_new/viewtopic.php?t=9756&start=10</a> \r\n \r\n \r\nсмена новых скатов может оказаться непростой задачей. Вы сталкиваетесь с большим ассортиментом брендов, размеров и моделей резины , так что вмиг можно потеряться. \r\n \r\nС намерением получить наслаждение от путешествия, заказывайте покрышки, которые соответствуют вашему стилю вождения. \r\n \r\nВозникли вопросы в обновлении нужной резины для вашей ласточки? наша команда опытных специалистов поможет вам своими умениями. \r\n \r\nВам нравится тихая поездка? Или вы отдаете предпочтение ощущать каждый поворот? Вас поняли! наши квалифицированные профи запросто отыщут вам идеальную \"обувь\" для автомобилей! \r\n \r\nсотни факторов вредят вашим шинам. Начиная от износа и заканчивая ездой по поврежденным дорогам. \r\n \r\nесли вы закажите  неправильную резину, то вы можете испортить производительность вашей легковушки и его потенциал справляться с любым временем года. Скаты вашего средства передвижения тщательно трудятся всякий раз, когда вы выезжаете на линию. \r\n \r\nлучший метод разобраться, наступили ли времена приобретать новые шины для вашей тачки, — это доверить их обследование знатоку. \r\n \r\nв нашей автомастерской вы сможете купить колеса популярных марок и брендов! И все по приемлемым ценам! Поможем вычислить необходимые вам! \r\n \r\nнаш сервисный центр ставит на первое место предпочтения клиента. учитывая этот факт сотни владельцев авто доверяет нам! Мы гарантируем качество! заходите! И убедитесь сами!', '2023-11-19 15:37:54', '2023-11-19 15:37:54'),
(20, 'Charissa Hedley', 'charissa.hedley@outlook.com', NULL, 'Dear bddevs.com Administrator!', 'Do you do contact form blasts? I have a list of over 30 million website contact forms for sale, all fully tested with gsa and confirmed working. Don\'t do any blasts? Why not? I can either provide the service for you or show you how to do it and where to buy the best software for doing this. Shoot me an email or Skype me at my contact info below.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps17837@gomail2.xyz', '2023-11-20 11:19:07', '2023-11-20 11:19:07'),
(21, 'hDlRoVwJCHOIOkR', 'cJpOAO.qctdqcp@zetetic.sbs', NULL, 'sqiHnzNnjrKoDaWoRFmKiPDwdE', 'sqiHnzNnjrKoDaWoRFmKiPDwdE', '2023-11-22 11:49:02', '2023-11-22 11:49:02'),
(22, 'Darnell Spinka', 'darnell.spinka@efficiencyedge.co', NULL, 'Touching base', 'Hello,\r\n\r\nFeeling swamped?\r\n\r\nThis open tool I\'m sharing below was incredibly beneficial in streamlining my business. I entirely ditched spreadsheets and email chains for project management.\r\n\r\nhttps://www.efficiencyedge.co/for/pomobdcom-mdnh\r\n\r\nIt enabled me in setting clear tasks, define processes, manage time, and expand my business. Maybe you can find value in it too.\r\n\r\nExcuse the unsolicited advice, just sharing in case it\'s of use. Please let me know what you think.\r\n\r\nTake care,\r\n\r\nDarnell', '2023-11-30 08:47:02', '2023-11-30 08:47:02'),
(23, 'Darius', 'WiARxo.wpjtdw@gemination.hair', NULL, 'Stefan Brock', 'Stefan Brock', '2023-12-01 15:26:36', '2023-12-01 15:26:36'),
(24, 'WilliamAcurn', 'mail.for.poi.nt.94@gmail.com', NULL, 'Привет, дорогостоящие приятели! Добро пожаловать на наш сайт, где у нас куча разных штук, коие могут', 'Автосервис для Машинки: В случае если ваша машинка начала странности творить, не беспокойтесь, у нас есть волшебники, которые починят ее. Масло, тормоза, движок — они там в данном шарят! \r\n \r\nВозводим Сайты: Хотите собственный личный космический сайт? У нас есть дети, которые могут это сделать. Прекрасно, понятно, нетрудно. В том числе и если вы в вебе чайник — не страшно, они объяснят. \r\n \r\nПоддержка с Компьютером: В случае если у вас компьютер тупит, как я в арифметике, не переживайте! Мы вас спасем. Микробы, глюки, чудеса — наши эксперты разберутся. \r\n \r\nБизнес-Советы: Мечтаете о своем бизнесе, но не понимаете, с чего начать? Мы не бизнесмены, и у нас здесь есть знатоки, коие дадут совет, как не \"попасть в грабли\". \r\n \r\nШопинг интернет: Интернет-магазин для тех, кто предпочитает налегать кнопки и получать посылочки. Тут багаж от наших друзей, проверено — качество замечательное! \r\n<a href=https://mafia.md/>https://mafia.md/</a> \r\n \r\nПоддержка и Общение: У нас как в немалый семье, лишь только онлайн. Мы готовы посодействовать, поддержать, поболтать. Иногда просто важно, дабы был кто-то вблизи. \r\n \r\nИнновации и Крутые Штуки: Ну и конечно, мы смотрим за последними трендами и подкидываем вам заманчивых штукенций. Гаджеты, новинки — мы в курсе и готовы поделиться. \r\n \r\nПонятно и Честно: Тут никто не будет вас заваливать сложными текстами или техническим жаргоном. Все очень просто и ясно, как ребятам. \r\n \r\nДоверие и Дружба: Мы не просто вебсайт, мы приятели. Практически постоянно счастливы вашим вопросам и предложениям. Мы доверяем для вас, и вы можете верить нам. \r\n \r\nРезультаты и Спасибо: Вот такие у нас приключения. Мы здесь, чтобы посодействовать для вас, не зависимо от того, как вы в чем либо разбираетесь. Добро пожаловать в нашу интернет-семью!', '2023-12-02 09:12:38', '2023-12-02 09:12:38'),
(25, 'DanielLinia', '06042023@promb2b.ru', NULL, 'Уникальную возм&', 'Мы предлагаем вам уникальную возможность решения финансовых трудностей – <a href=https://b2b2c.market/yslygi/bankrotstvo/yslygi-po-bankrotstvy-fizicheskix-lic-otzyvy-o-bankrotstve-po-kredity_i2800337>списание долгов</a> через процедуру банкротства. \r\nНаша компания специализируется на помощи клиентам, которые столкнулись с задолженностями и неспособны их погасить. \r\n \r\nПреимущества сотрудничества с нами: \r\n \r\nОпыт и экспертиза: Мы обладаем многолетним опытом в области банкротства и юридической поддержки. \r\nИндивидуальный подход: Мы разрабатываем стратегии, учитывающие ваши уникальные финансовые обстоятельства. \r\nЭффективность: Наша цель - помочь вам избавиться от долгов и начать новую финансовую жизнь. \r\nКонфиденциальность: Мы гарантируем полную конфиденциальность всех ваших данных и информации. \r\n \r\nСделайте шаг к финансовой свободе! Свяжитесь с нами прямо сейчас, и наши эксперты помогут вам разработать план действий для списания д', '2023-12-04 12:42:11', '2023-12-04 12:42:11'),
(26, 'Phil Stewart', 'dontreplyhere@gmail.com', NULL, 'question', 'I have 100% fully verified website contact forms for sale. Do your own blasts - save money!\r\n\r\nQuantity	Price\r\n=====================\r\n500,000		$50\r\n1 Million	$99\r\n5 Million	$199\r\n10 Million	$299\r\n20 Million	$499\r\n\r\nCredit card payment accepted, download links provided same day of purchase. Get in touch with me at my email/skype below for more info or if you would like to order.\r\n\r\nP. Stewart\r\nSkype: live:.cid.e169e59bb6e6d159\r\nEmail: ps6721@gomail2.xyz', '2023-12-05 19:33:09', '2023-12-05 19:33:09'),
(27, 'CarlosAnync', 'jomchenry@dodo.com.au', NULL, 'Rank #1 on Google in 2 weeks with a 3-year guarantee', 'Rank #1 on Google in 2 weeks with a 3-year guarantee https://marketplacebest888.sell.app/product/we-bring-anything-to-the-top-of-google-in-2-weeks-3-year-warranty?01866042', '2023-12-05 23:55:45', '2023-12-05 23:55:45'),
(28, 'WilliamAcurn', 'mai.lfo.rpo.i.n.t9.4@gmail.com', NULL, 'Привет, дорогостоящие приятели! Добро пожаловать на наш сайт, где у нас куча различных штук, которые', 'Автосервис для Машинки: В случае если ваша машинка начала странности творить, не беспокойтесь, у нас есть волшебники, коие починят ее. Масло, тормоза, движок — они там в данном шарят! \r\n \r\nСтроим Сайты: Хотите свой личный космический вебсайт? У нас есть дети, коие могут это сделать. Красиво, понятно, несложно. В том числе и если вы в интернете чайник — не жутко, они растолкуют. \r\n \r\nПоддержка с Компьютером: Если у вас компьютер тупит, как я в арифметике, не переживайте! Мы вас спасем. Вирусы, глюки, чудеса — наши эксперты разберутся. \r\n \r\nБизнес-Советы: Мечтаете о собственном бизнесе, но не понимаете, с чего начать? Мы не бизнесмены, но у нас тут есть знатоки, коие дадут совет, как не \"попасть в грабли\". \r\n \r\nШопинг интернет: Интернет-магазин тем, кто любит налегать кнопки и получать посылочки. Тут вещи от наших приятелей, испытано — качество замечательное! \r\n<a href=https://www.efesmoldova.md/>https://www.efesmoldova.md/</a> \r\n \r\nПоддержка и Общение: У нас как в большой семье, лишь только онлайн. Мы готовы посодействовать, поддержать, поболтать. Иногда просто принципиально, чтобы был кто-то вблизи. \r\n \r\nИнновации и Крутые Штуки: Ну и конечно, мы смотрим за последними трендами и подкидываем для вас интересных штукенций. Девайсы, свежие релизы — мы в курсе и готовы разделиться. \r\n \r\nПонятно и Честно: Здесь никто не будет вас заваливать сложными словами или техническим жаргоном. Все просто и понятно, как детям. \r\n \r\nДоверие и Дружба: Мы не просто сайт, мы приятели. Практически постоянно рады вашим вопросам и услугам. Мы доверяем для вас, и вам продоставляется возможность доверять нам. \r\n \r\nИтоги и Спасибо: Вот такие у нас приключения. Мы тут, дабы помочь для вас, не зависимо от того, как вы в чем либо разбираетесь. Имущество пожаловать в нашу интернет-семью!', '2023-12-06 02:18:48', '2023-12-06 02:18:48'),
(29, 'Briansoppy', 'jeffreymonk1987@gmail.com', NULL, 'GAMEDEV: CREATE THE GAME OF YOUR DREAMS IN 10 MINUTES AND EARN $1,000,000', 'GameDev: Create the game of your dreams in 10 minutes and earn $1,000,000 http://fcc2a1.tracker.adotmob.com/pixel/visite?d=5000&r=https%3A%2F%2Fshoppy.gg%2Fproduct%2FsdrduvV%3F1389', '2023-12-08 07:53:58', '2023-12-08 07:53:58'),
(30, 'RobertQuife', 'support@donatik.io', NULL, 'Прохання заблокувати донат за образи та нецензурну лексику в ефірі', 'Прохання заблокувати донат за образи та нецензурну лексику в ефірі \r\nhttps://panini.donatik.io/uk \r\nhttps://t.me/+bPftUuNE5UY5Yzky \r\npanini.booking@gmail.com', '2024-06-15 13:22:00', '2024-06-15 13:22:00'),
(31, 'Jeremydrarp', 'novac.osta73@gmail.com', NULL, 'Have you heard how many people made a lot of money playing NOTCOIN? Play a new game and earn real mo', 'Have you heard how many people made a lot of money playing NOTCOIN? Play a new game and earn real money in cryptocurrency.  https://tinyurl.com/4wcykaas', '2024-06-16 11:26:24', '2024-06-16 11:26:24'),
(32, 'WilliamExilk', 'gabreilo.ms.s.on.72.2@gmail.com', NULL, 'Register an account on Bybit and receive exclusive rewards with the Bybit referral program! Addition', 'Register an account on Bybit and receive exclusive rewards with the Bybit referral program! Additionally, get a bonus of up to 6,045 USDT using the link - https://tinyurl.com/bddw5ye7', '2024-06-16 12:37:45', '2024-06-16 12:37:45'),
(33, 'RobertAmina', 'am.a.sl.6.1790@gmail.com', NULL, 'Play MemiFi Coin Earn and cryptocurrency and have fun   https://tinyurl.com/yc8b6r6a', 'Play MemiFi Coin Earn and cryptocurrency and have fun   https://tinyurl.com/yc8b6r6a', '2024-06-16 22:57:18', '2024-06-16 22:57:18'),
(34, 'Shanky', 'youronlinepresence2@outlook.com', NULL, 'Social Media Marketing', 'I\'m Shanky, a Social Media Marketing Manager with over 10 years of global experience. I specialize in creating tailored social media content calendars, designing branded content, conducting hashtag research, and scheduling posts. I work across Instagram, Facebook, LinkedIn, Twitter, and Pinterest to help boost your online presence and engagement. \r\n\r\nLet\'s connect at Youronlinepresence2@outlook.com to discuss it further.', '2024-06-16 23:59:40', '2024-06-16 23:59:40'),
(35, 'AmandaHorbJelea', 'amandaKigree2@gmail.com', NULL, 'Hey stud, ready for love?', 'Hey darling, want to hang out? -  http://surl.li/ulebc?blevy', '2024-06-17 01:49:43', '2024-06-17 01:49:43'),
(36, 'Mark Devito', 'devito.tamie@gmail.com', NULL, 'Dear bddevs.com Owner.', 'If you are reading this message, That means my marketing is working. I can make your ad message reach 5 million sites in the same manner for just $50. It\'s the most affordable way to market your business or services. Contact me by email virgo.t3@gmail.com or skype me at live:.cid.dbb061d1dcb9127a', '2024-06-17 05:13:33', '2024-06-17 05:13:33'),
(37, 'Cara Dooley', 'dooley.cara@msn.com', NULL, 'Hi bddevs.com Admin.', 'The May 2024 Vetted Business Directory update is now live with 7,358 NEWLY indexed & searchable businesses on the Vetted Business Platform.\r\n\r\nUnfortunately, your business was NOT ABLE TO BE INCLUDED due to some unverified business info.   \r\n\r\nDon’t worry, this is an easy fix.\r\n \r\nUse the link in my signature to easily add or update your Vetted business details and realize the powerful benefits of being a Vetted business in your local market, your service category and your business specialty.\r\n\r\nYours in trust & transparency,\r\n\r\nSarah McCormick\r\nVetted Business Specialist\r\n295 Seven Farms Drive Suite C-201\r\nCharleston, SC 29492\r\nSarah.McCormick@VettedPros.com\r\nhttps://vettedpros.com/1-2/?a=Get-Your-Business-Vetted!\r\n\r\nVetted is a game changing platform used by over 85,000 USA based businesses to share & prove their business credentials to amplify trust & transparency with shoppers and close up to 60% more sales than businesses not listed on the Vetted platform.', '2024-06-17 11:03:54', '2024-06-17 11:03:54'),
(38, 'Allison Pinckney', 'pinckney.allison@gmail.com', NULL, 'Dear bddevs.com Administrator.', 'Hi there, I apologize for using your contact form, \r\nbut I wasn\'t sure who the right person was to speak with in your company. \r\nWe have a patented application that creates Local Area pages that rank on \r\ntop of Google within weeks, we call it Local Magic.  Here is a link to the \r\nproduct page https://www.mrmarketingres.com/local-magic/ . The product \r\nleverages technology where these pages are managed dynamically by AI and \r\nit is ideal for promoting any type of business that gets customers from Google.  Can I share a testimonial \r\nfrom one of our clients in the same industry?  I\'d prefer to do a short zoom to \r\nillustrate their full case study if you have time for it? \r\nYou can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!', '2024-06-17 18:17:41', '2024-06-17 18:17:41'),
(39, 'Earn up to $10,000 per month on a unique WhatsApp platform BOT >>> https://trk.mail.ru/c/c1ubt7?2635', 'robert.english3@gmail.com', NULL, 'Earn up to $10,000 per month on a unique WhatsApp platform BOT >>> https://trk.mail.ru/c/c1ubt7?9845', 'Earn up to $10,000 per month on a unique WhatsApp platform BOT >>> https://trk.mail.ru/c/c1ubt7?3526', '2024-06-17 19:27:35', '2024-06-17 19:27:35'),
(40, 'Leola', 'leola@bddevs.com', NULL, 'Leola Gottshall', 'Hello there \r\n\r\nThe New Powerful LED Flashlight is The Perfect Flashlight For Any Situation!\r\n\r\nThe 3,000 Lumens & Adjustable Zoom gives you the wide field of view and brightness other flashlights don’t have.\r\n\r\n50% OFF + Free Shipping!  Get it Now: https://linterna.cc\r\n\r\nThanks and Best Regards, \r\n\r\nLeola', '2024-06-18 07:50:32', '2024-06-18 07:50:32'),
(41, 'mikeNivy', 'p.ro.s.p.e.rity.them.o.neyuspen@gmail.com', NULL, 'The Internet is your personal bank, which is willing to generate income for you!  - https://rb.gy/9f', 'Don\'t think about obstacles, think about possibilities! Earn up to $500 per day and allow yourself to do anything you want!\r\n - https://rb.gy/9fznxm?grardy9sek', '2024-06-18 09:30:23', '2024-06-18 09:30:23'),
(42, 'Krish', 'outsourcedigitalmarketing@outlook.com', NULL, 'Content Writing Services', 'Are you looking for a content writer or copywriter who can write according to your ideas, follow your specific tone and style, and keep your audience in mind? I specialize in crafting content that is easy to read and consistent from start to finish. I currently work with many clients, interacting with their teams via video calls to ensure everything runs smoothly. Sometimes, clients ask me to conduct keyword research and plan content topics and points to cover. I also ensure all content is SEO-friendly. My experience includes writing blogs, articles, website copy, e-commerce product descriptions, e-books, and SEO content. I am happy to work within your budget. \r\n\r\nFeel free to reach out to me at outsourcedigitalmarketing@outlook.com', '2024-06-18 18:06:27', '2024-06-18 18:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ophthalmology', 1, '2024-11-12 22:12:51', '2024-11-12 22:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `department_id`, `name`, `email`, `phone`, `address`, `religion`, `gender`, `designation`, `qualification`, `description`, `photo`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 0, 'D. Fatima', 'lyryveqyfy@mailinator.com', '01859303403', 'Velit ex reiciendis', 'Omnis magna nobis co', 'Male', 'Consectetur aut impe', 'Illum dolor sapient', 'Enim sed dolore amet', 'media/uploads/doctors/173146617580.jpg', NULL, 1, '2024-11-12 20:49:35', '2024-11-12 21:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `day` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `options` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Male', 1, '2023-08-17 03:55:15', '2023-08-17 03:55:15'),
(2, 'Femail', 1, '2023-08-19 09:21:23', '2023-08-19 09:21:23'),
(3, 'Other', 1, '2023-08-19 09:54:01', '2023-08-19 09:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `home_header_sliders`
--

CREATE TABLE `home_header_sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(36, '2024_11_13_01422_create_patients_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_order` int NOT NULL DEFAULT '1',
  `options` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `company_name`, `message`, `total_order`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Lyons Hansen Co', 'Optio et ea fuga Asperiores placeat deserunt in deserunt et velit exercitationem sint ut nisi veritatis voluptatem', 1, NULL, 1, '2023-08-22 05:36:12', '2023-08-22 22:56:49'),
(2, 3, 'Ayala and Mercado Traders', 'Fuga Est sint exercitation blanditiis sed itaque ipsum autem voluptas anim consectetur ullamco et eaque et sequi maxime Nam', 1, NULL, 1, '2023-08-22 06:38:49', '2023-08-23 02:48:29'),
(3, 4, 'Jordan and Burke LLC', 'Eum fugiat qui quae nemo et expedita voluptate consectetur excepteur provident fugiat voluptatem earum sit exercitationem quibusdam est', 3, NULL, 1, '2023-08-23 08:20:50', '2023-08-23 08:21:25'),
(4, 5, 'BM', 'I need ASAP', 3, NULL, 0, '2023-09-05 04:41:31', '2023-09-05 04:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_records`
--

CREATE TABLE `order_records` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_records`
--

INSERT INTO `order_records` (`id`, `order_id`, `user_id`, `product_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'Voluptate ut odit eo', 0, '2023-08-22 05:36:12', '2023-08-22 05:36:12'),
(2, 2, 3, 1, 'Culpa qui excepteur', 0, '2023-08-22 06:38:49', '2023-08-22 06:38:49'),
(3, 2, 3, 4, 'Nihil enim porro eos', 0, '2023-08-22 06:38:49', '2023-08-22 06:38:49'),
(4, 3, 4, 1, 'Exercitation nisi vo', 0, '2023-08-23 08:20:50', '2023-08-23 08:20:50'),
(5, 3, 4, 3, 'Debitis itaque ut ve', 0, '2023-08-23 08:20:50', '2023-08-23 08:20:50'),
(6, 3, 4, 4, 'Praesentium qui aut', 0, '2023-08-23 08:20:50', '2023-08-23 08:20:50'),
(7, 4, 5, 1, 'I need this', 0, '2023-09-05 04:41:31', '2023-09-05 04:41:31'),
(8, 4, 5, 2, 'I need this', 0, '2023-09-05 04:41:31', '2023-09-05 04:41:31'),
(9, 4, 5, 4, 'I need this', 0, '2023-09-05 04:41:31', '2023-09-05 04:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `our_histories`
--

CREATE TABLE `our_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_histories`
--

INSERT INTO `our_histories` (`id`, `created_by`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '- 2013: Dynamic Beginning', '<p>Suncity Hospital made its mark on the vibrant canvas of the fashion industry in 2013, with the opening of its dynamic, one-stop, multi-country Apparel Sourcing and buying agency.</p><p>Our journey began with a commitment to redefine the standards of global apparel sourcing.</p>', 1, '2024-06-14 11:56:11', '2024-06-14 11:56:11'),
(2, NULL, '- 2015: Started to get Recognized', '<p>Suncity Hospital positioned itself as a unique buying and sourcing agency in 2015, offering international buyers the ultimate solution for sourcing top-tier textiles, apparel, yarn, and garment accessories. We continue to shape the global fashion landscape with our distinct approach to sourcing excellence.Our customer-centric approach ensures that your experience with Suncity Hospital is nothing short of exceptional.</p>', 1, '2024-06-14 11:57:45', '2024-06-14 11:57:45'),
(3, NULL, '- 2018: Established Ourselves', '<p>In 2018, Suncity Hospital achieved a significant milestone by elevating its commitment to quality assurance. Our company become a trusted name in global garment industry.</p><p>We continue to source imported materials from reputable companies and provide our clients with high-quality products and fast turnaround times. To maintain international standards, we adhere to a quality-driven ethos.</p>', 1, '2024-06-14 11:59:15', '2024-06-14 11:59:15'),
(4, NULL, '- Continuous Evolution', '<p>Suncity Hospital has evolved since its opening in 2013, continuously recognizing and embracing excellence in all aspects. Our factories, equipped with state-of-the-art technology and staffed by highly skilled individuals, symbolize our commitment to a system-driven approach that meets universally accepted standards. Explore the ongoing evolution of Suncity Hospital.</p>', 1, '2024-06-14 12:00:12', '2024-06-14 12:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `our_team_members`
--

CREATE TABLE `our_team_members` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_team_members`
--

INSERT INTO `our_team_members` (`id`, `created_by`, `name`, `designation`, `photo`, `social_media`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Md. Kholilullah', 'Designation', 'media/uploads/our-team-members/171839126489.jpg', '{\"twitter\": \"https://twutter.com\", \"facebook\": \"https://facebook.com\", \"linkedin\": \"https://linkdin.com\"}', 1, '2024-06-12 08:32:44', '2024-06-14 12:54:24'),
(2, NULL, 'Kaiyes Ahmed', 'Managing Director', 'media/uploads/our-team-members/171839124946.jpg', '{\"twitter\": null, \"facebook\": null, \"linkedin\": null}', 1, '2024-06-14 12:51:13', '2024-06-14 12:54:09'),
(3, NULL, 'Sumon Ahmed', 'Merchandiser', 'media/uploads/our-team-members/171839123371.jpg', '{\"twitter\": null, \"facebook\": null, \"linkedin\": null}', 1, '2024-06-14 12:53:53', '2024-06-14 12:53:53'),
(4, NULL, 'Kajol Hossain', 'Finance Director', 'media/uploads/our-team-members/171839130710.jpg', '{\"twitter\": null, \"facebook\": null, \"linkedin\": null}', 1, '2024-06-14 12:55:07', '2024-06-14 12:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `product_type_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `gender_id` bigint UNSIGNED DEFAULT NULL,
  `age_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `composition` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_photo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_photo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pics` json DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `division_id`, `product_type_id`, `color_id`, `gender_id`, `age_id`, `created_by`, `name`, `composition`, `style_number`, `primary_photo`, `secondary_photo`, `color_code`, `pics`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 8, 2, 5, 2, 1, 1, 'Hope Lawson', 'sfghjk', '843', 'media/uploads/products/169272418119.jpg', NULL, 'brown', NULL, 'Delectus aliquam la', 1, '2023-08-19 12:43:18', '2023-08-22 11:09:41'),
(2, 3, 3, 5, 1, 3, 1, 1, 'Women t-shart', 'ghjk', 'xexs-2154', 'media/uploads/products/169251297127.jpg', NULL, 'beige', NULL, 'Non in at obcaecati', 1, '2023-08-19 12:46:16', '2023-08-22 11:08:50'),
(3, 4, 9, 2, 2, 3, 2, 1, 'Yvonne Montgomery', 'sdfghj', '150', 'media/uploads/products/169261750844.jpg', NULL, 'black', NULL, 'Quaerat numquam omni', 1, '2023-08-21 05:31:48', '2023-08-22 11:08:06'),
(4, 2, 7, 2, 4, 2, 1, 1, 'Selma Mueller', '80%% Organic Cotton 20% Recycled Polyester', '390', 'media/uploads/products/169261918126.jpg', NULL, 'blush', NULL, 'Voluptates incididun', 1, '2023-08-21 05:59:41', '2023-08-22 11:07:45'),
(5, 2, 3, 1, 4, 1, 1, 1, 'Azalia Galloway', 'Voluptas sed sint re', 'fjf64-37', 'media/uploads/products/169272428789.jpg', NULL, 'blush', NULL, 'Ipsum quis consequat', 1, '2023-08-22 11:11:27', '2023-08-22 11:43:20'),
(6, 2, 5, 1, 4, 2, 3, 1, 'Georgia Copeland', 'Possimus quibusdam', '861', 'media/uploads/products/169280068923.jpg', NULL, 'blush', NULL, 'Ut reiciendis tempor', 1, '2023-08-23 08:24:49', '2023-08-23 08:24:49'),
(7, 5, 8, 3, 28, 2, 2, 1, 'Venus Lyons', 'Ea et incididunt par', '989', 'media/uploads/products/169281891821.jpg', 'media/uploads/products/16928205196.jpg', '#FFFF00', NULL, 'Quam ut aspernatur r', 1, '2023-08-23 13:28:38', '2023-09-05 04:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_keywords`
--

CREATE TABLE `product_keywords` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `keyword_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aprons', 1, '2023-08-17 05:03:58', '2023-08-19 09:54:41'),
(2, 'Bikini (Bottoms)', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30'),
(3, 'Bikini (Tops)', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30'),
(4, 'Blouses', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30'),
(5, 'Boots', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30'),
(6, 'Boxer Shorts', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30'),
(7, 'Briefs', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30'),
(8, 'Cardigans', 1, '2023-08-19 09:54:30', '2023-08-19 09:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `product_type_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `gender_id` bigint UNSIGNED DEFAULT NULL,
  `age_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `master_pic` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pics` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realtime_notifications`
--

CREATE TABLE `realtime_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `send_type` bigint UNSIGNED NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Notification',
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached` json DEFAULT NULL,
  `attached_files` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `routes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `prefix`, `access`, `routes`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '1,2,3,4,5', '1,2,3,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45', 1, NULL, '2024-11-12 21:23:48'),
(2, 'Sub Admin', 'sub-admin', '1,2,3,4', NULL, 1, NULL, '2024-06-12 03:07:51'),
(3, 'Manager', 'manager', '', NULL, 1, NULL, NULL),
(4, 'Doctor', 'doctor', '1,2,3', NULL, 1, NULL, '2024-11-12 20:18:47'),
(5, 'Patient', 'patient', '1,2', NULL, 1, NULL, '2024-11-12 20:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `options` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_by`, `key`, `value`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'whoWeAreAndOurCommitment', NULL, '{\"who-we-are1\": \"<p>Suncity Hospital brings creativity and global style together. We are not just a sourcing agency; we\'re a dynamic, one-stop, multi-country hub for all your apparel needs. The Suncity Hospital brand emerged in 2013 as a beacon of fashion-forward sourcing expertise in the vibrant city of Dhaka, Bangladesh.</p>\", \"who-we-are2\": \"<p>As a unique buying and sourcing agency, we redefine the standards of excellence. Our international buyers experience more than just a service; they encounter the epitome of textile quality, apparel sophistication, and unrivaled garment accessories. We offer a seamless solution, locally sourcing premium materials from Bangladesh and globally from key fashion hubs like China, Taiwan, Hong Kong, and India.</p>\", \"our-commitment\": \"<p>Suncity Hospital offers premium quality garments at the most competitive price.</p><p>As a leading manufacturer and supplier, we specialize in providing intuitive customer service. With a commitment to ethical and sustainable solutions, we bring you a diverse range of high-quality products across various categories.</p>\"}', 1, '2024-06-12 04:38:37', '2024-06-18 21:43:14'),
(2, 1, 'whyChooseUs', NULL, '{\"1\": \"We prioritize excellence in every thread, ensuring that the garments we deliver exceed the expectations of our discerning customers. Discover the meticulous craftsmanship that sets us apart. Unveiling Pricing Transparency.\", \"2\": \"Suncity Hospital stands at the forefront of Product Development and sourcing, offering impeccable quality at competitive prices. Our commitment to on-time production, timely deliveries, and adherence to AQL standards ensures a partnership built on trust.\", \"3\": \"Experience seamless communication and coordination, coupled with on-time production, quality assurance, and inspection. Suncity Hospital is your steadfast ally in navigating the dynamic landscape of the fashion industry.\", \"4\": \"Our garments undergo rigorous colorfastness tests, ensuring vibrancy that withstands the test of time. From fabric resilience under sunlight to print durability and dye strength, Suncity Hospital crafts a spectrum of colors that captivate and endure.\", \"5\": \"We meticulously check all shipping documents in accordance with buyer instructions. Our commitment extends beyond dispatch instructions, providing timely intimation to buyers and clearing agents. Discover a streamlined shipping experience.\", \"6\": \"We meticulously check all shipping documents in accordance with buyer instructions. Our commitment extends beyond dispatch instructions, providing timely intimation to buyers and clearing agents. Discover a streamlined shipping experience.\"}', 1, '2024-06-12 06:39:02', '2024-06-12 06:39:02'),
(3, 1, 'businessInfo', NULL, '{\"businessYears\": \"10\", \"satisfiedClients\": \"700\", \"successfullCases\": \"2000\", \"globalRecognition\": \"20\"}', 1, '2024-06-13 03:35:27', '2024-06-13 03:36:57'),
(4, 1, 'premierPartner', '{\"1\":\"Partnering with the best in the industry, we guarantee swift and secure deliveries to any corner of the globe. Our commitment to quality and transparency keep us stay ahead from others.\",\"2\":\"We understand the complexities of international shipping. Our dedicated team ensures that your order complies with customs regulations, making the process seamless for you. Do you have questions or need assistance? Our fashion ambassadors are ready to guide you. Reach out to us via email, chat, or phone. Your satisfaction is our priority.\"}', '{\"1\": \"media/uploads/promises/171836657585.jpg\", \"2\": \"media/uploads/promises/171836657551.jpg\", \"3\": \"media/uploads/promises/171836657567.jpg\", \"4\": \"media/uploads/promises/171836657542.jpg\"}', 1, '2024-06-13 05:08:17', '2024-06-14 21:49:50'),
(5, 1, 'ourCertifications', 'Our certifications for our supply chain, products, and practices instills confidence that your brand is strategically sourcing from top-tier partners and employing cutting-edge techniques.', '{\"1\": \"media/uploads/our-certifications/171842952563.png\", \"2\": \"media/uploads/our-certifications/171842952554.png\", \"3\": \"media/uploads/our-certifications/171842952524.png\"}', 1, '2024-06-14 07:38:36', '2024-06-14 23:32:05'),
(6, 1, 'onlyCertifications', NULL, '{\"1\": \"media/uploads/our-certifications/171837414474.png\", \"2\": \"media/uploads/our-certifications/171837414425.png\", \"3\": \"media/uploads/our-certifications/171837416423.png\", \"4\": \"media/uploads/our-certifications/17183742147.png\"}', 1, '2024-06-14 08:09:04', '2024-06-14 08:10:14'),
(7, 1, 'aboutPageFirstSection', 'PoMo Apparel is a Pioneer apparel Supplier in Bangladesh', '{\"why-us\": \"Our commitment to sustainability, trendsetting design, price transparency, on-time delivery, and custom solutions makes us the ideal partner for global fashion brands seeking premium, responsibly sourced products.\", \"our-vision\": \"Our vision is to be the premier choice for fashion brands seeking excellence in knitwear manufacturing and apparel sourcing. We aim to set new benchmarks in quality, creativity, and ethical practices.\", \"description\": \"We\'re a leading knitwear and woven clothing manufacturer and apparel sourcing hub in Dhaka, Bangladesh. From design innovation to top-tier production, we supply high-quality knitwear, and upscale apparel, to global fashion brands worldwide.\", \"our-mission\": \"Our mission is to blend innovation, craftsmanship, and sustainability to cater to the global fashion market. We offer customized apparel solution services to meet the expectations of our clients.\"}', 1, '2024-06-14 08:31:31', '2024-06-15 01:45:51'),
(8, 1, 'aboutPageWhoWeAre', NULL, '{\"who-we-are\": \"<p>Since 2013, PoMo Apparale has provided quality woven and knitted apparel manufacturing and supply services. Collaborating with leading global brands, we\'ve established ourselves as a trusted partner in the fashion industry.</p><p>A unique buying and sourcing agency offers its international buyers the ultimate solution for sourcing quality textiles, apparels, yarn and garments accessories locally from Bangladesh and internationally from China ,Taiwan, Hong Kong and India.</p><p><img src=\\\"http://localhost:8000/media/uploads/ckeditorFiles/17183762197.jpg\\\"> At our core, we\'re your comprehensive apparel solution provider. Whether sourcing locally from Bangladesh or internationally from key hubs like China, Taiwan, Hong Kong, and India, we ensure a seamless process to acquire your desired apparel products. Our network spans diverse regions, offering you a spectrum of options and ensuring that your apparel needs are met with quality, efficiency, and a global perspective</p><p>Our strength lies in our team of seasoned professionals and quality control experts who ensure that our customers receive nothing short of excellence. From creative designers to technical experts and quality check managers, our cohesive team synergizes to produce the finest, high-quality garments.</p><p>Our state-of-the-art factories boast cutting-edge machinery and a workforce of highly skilled individuals. Our garment suppliers operate on a system-driven approach, consistently meeting universally accepted compliance standards.</p><p>At Suncity Hospital, our commitment to superior quality and meticulous attention to detail have positioned us as a reliable choice for discerning fashion brands worldwide. We take pride in our ability to consistently deliver top-notch products that meet the highest industry standards.</p>\", \"how-do-we-operate\": \"<p>Our dedicated team of professionals diligently scrutinizes every aspect of quality management, ensuring that each product meets stringent standards. From the very inception, our operations covered the entire spectrum, starting from selecting the finest yarn to crafting fabrics of various qualities in cotton, synthetic materials, and intricate blends like viscose/modal and polyester.</p><p>We supply a diverse array of garments that embody quality and craftsmanship. These meticulously produced garments transcend borders, reaching discerning customers across Europe, the USA, Canada, Mexico, Brazil, Hong Kong, and beyond. This seamless integration of superior products and expansive markets defines our ethos of delivering excellence on a global scale.</p>\"}', 1, '2024-06-14 08:45:57', '2024-06-15 00:04:32'),
(9, 1, 'aboutPageOurCommitment', NULL, '{\"signature\": \"media/uploads/about-us/171837835023.png\", \"authorName\": \"Kaiyes Ahmed\", \"commitment\": \"<p>Suncity Hospital is a well reputed buying house which has the ability to provide its international buyers cost effective value added package by our sourcing than competitors.</p><p>We are in a leading position in the buying and sourcing agency business which enables us to offer you the best quality and prices with on time deliveries.</p>\", \"authorDesignation\": \"CEO & FOUNDER\"}', 1, '2024-06-14 09:19:10', '2024-06-14 09:19:50'),
(10, 1, 'aboutPageOurCustomers', 'We\'ve extended our services across various continents. Over time, this expansive reach has cultivated a strong and loyal customer base, fostering repeated engagements and enduring relationships built on our consistent delivery of exceptional service and quality. Have a look at the most loyal clients of Suncity Hospital:', '[\"MARC LAUGE - DENMARK\", \"REITMANS - CANADA\", \"OLD GUYS RULE - UK\", \"MIM - POLAND\", \"COPPEL - MEXICO\", \"BRICE - FRANCE\", \"BLUENOTES - CANADA\", \"DOUBLE - GREECE\", \"UFO - CANADA\", null]', 1, '2024-06-14 09:55:12', '2024-06-15 00:23:04'),
(11, 1, 'aboutOurProductGallery', NULL, '{\"1\": \"media/uploads/product-gallery/171838125532.jpg\", \"2\": \"media/uploads/product-gallery/171838125519.jpg\", \"3\": \"media/uploads/product-gallery/171838127130.jpg\", \"4\": \"media/uploads/product-gallery/171838131493.jpg\", \"5\": \"media/uploads/product-gallery/171838131494.jpg\", \"6\": \"media/uploads/product-gallery/171838131453.jpg\", \"7\": \"media/uploads/product-gallery/171838131424.jpg\", \"8\": \"media/uploads/product-gallery/171838131484.jpg\", \"9\": \"media/uploads/product-gallery/171838131413.jpg\", \"10\": \"media/uploads/product-gallery/171838131464.jpg\", \"11\": \"media/uploads/product-gallery/171838131483.jpg\"}', 1, '2024-06-14 10:07:35', '2024-06-14 10:08:34'),
(12, 1, 'meetOurTeam', NULL, '{\"1\": \"As a Team, we work together to achieve a shared goal of becoming the most trusted apparel supplier. Each member brings a unique skill set and perspective, working harmoniously towards our shared goals.\", \"2\": \"Get to know the faces behind our accomplishments. We\'re dedicated, passionate, and committed to making a difference. Explore the diverse talents and expertise that make up our dynamic team.\"}', 1, '2024-06-14 10:18:10', '2024-06-15 01:10:07'),
(13, 1, 'ourValues', NULL, '{\"0\": \"Transparency\", \"1\": \"Innovation\", \"2\": \"Quality maintenance\", \"3\": \"On-time delivery\", \"4\": \"Commitment\", \"5\": \"Emergency support\", \"6\": \"Adaptability\", \"7\": \"Customer-centric approach\", \"8\": \"Collaboration\", \"9\": null, \"image1\": \"media/uploads/our-values/171845076067.jpg\", \"image2\": \"media/uploads/our-values/171845076094.jpg\", \"image3\": \"media/uploads/our-values/171845076041.jpg\", \"paragraphOne\": \"PoMo Apparel upholds its core values, guiding every team member throughout every project, regardless of its scale. Our commitment to these values remains unwavering, ensuring excellence in every endeavor, be it a large-scale initiative or a smaller project.\", \"paragraphTwo\": \"It helps us to keep our company ahead of our competitors. We ensure that orders are delivered within a specified period of time in accordance with the requirements. As part of our work with us, we adhere to our core values:\"}', 1, '2024-06-15 05:24:26', '2024-06-15 06:24:13'),
(14, 1, 'ourGoals', 'We\'re dedicated to pushing boundaries, setting new benchmarks, and earning the distinction of being the #1 choice in the industry.', '{\"1\": \"media/uploads/our-goals/171845152525.jpg\", \"2\": \"media/uploads/our-goals/17184515485.jpg\", \"3\": \"media/uploads/our-goals/171845154875.jpg\", \"4\": \"media/uploads/our-goals/171845154895.jpg\"}', 1, '2024-06-15 05:38:45', '2024-06-18 23:15:17'),
(15, 1, 'promisePageBottomSection', NULL, '{\"expertise\": \"We continuously invest in our people, training, and cutting-edge machinery to uphold our commitment to delivering high-quality products. This investment ensures that our workforce remains agile and adept at utilizing state-of-the-art machinery, allowing us to consistently produce top-tier products that meet and exceed market standards.\", \"communication\": \"Clear, effective communication is at the core of everything we do. We prioritize seamless interactions with our clients, ensuring that every detail is easily understood and managed. We have a team of experts to maintain communication with global clients.\", \"quality-control\": \"We meticulously oversee our supply chain, employing rigorous quality control measures at every stage. Each step of the process, from sourcing raw materials to delivering the final product, is rigorously evaluated to ensure adherence to the highest standards.\"}', 1, '2024-06-15 06:05:56', '2024-06-18 22:49:58'),
(16, 1, 'contactInfo', NULL, '{\"contactEmail\": \"kayes.ahmed@gmail.com\", \"contactPhone\": \"8801754 832200\"}', 1, '2024-06-15 09:49:57', '2024-06-15 10:16:04'),
(17, 1, 'contactUsPageFooter', NULL, '{\"email\": \"<p>kayes.ahmed@gmail.com&nbsp;</p><p>apparels@bddevs.com</p>\", \"address\": \"<p>PLOT: 6, UNIT: 3A ROAD: 12,&nbsp;</p><p>SECTOR: 10 UTTARA,&nbsp;</p><p>DHAKA - 1230</p>\", \"business-hours\": \"<p>Mon - Sat 9:00am - 6:00pm&nbsp;</p><p>Sunday - CLOSED</p>\", \"work-inquiries\": \"<p>(+88) 01754 832200&nbsp;</p><p>(+88) 01851 991958</p>\"}', 1, '2024-06-15 09:59:06', '2024-06-15 12:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `created_by`, `name`, `designation`, `photo`, `testimonial`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Anne Doe Smith', 'REITMANS, CANADA', 'media/uploads/testimonials/171819807792.jpg', 'Products quality is so good and excellent. There have punctuality and creativity, two huge factors in the apparel industry.', 1, '2024-06-12 07:14:37', '2024-06-14 11:44:38'),
(2, NULL, 'Anne Doe Smith', 'REITMANS, CANADA', 'media/uploads/testimonials/171838731851.jpg', 'Products quality is so good and excellent. There have punctuality and creativity, two huge factors in the apparel industry.', 1, '2024-06-14 11:48:38', '2024-06-14 11:48:38'),
(3, NULL, 'Anne Doe Smith', 'OLD GUYS RULE, UK', 'media/uploads/testimonials/17183873749.jpg', 'Cras a elit sit amet leo accumsan volutpat. Suspendisse hendreriast ehicula leo, vel efficitur felis ultrices non cras a elit sit amet leo acun volutpat.', 1, '2024-06-14 11:49:34', '2024-06-14 11:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `notifications` json DEFAULT NULL,
  `options` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `name`, `phone`, `photo`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `notifications`, `options`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Admin', '+1 (343) 985-5914', 'media/uploads/doctors/173146617580.jpg', 'admin@suncity.com', NULL, '$2y$10$HSGWNqAK0g1OyxV9ZJF7U.olmWU87Jn.DuFscw8933ecaTI59.Qpu', NULL, NULL, NULL, NULL, '{\"signature\": \"media/uploads/super-admin/169216512042.png\"}', 1, NULL, NULL, '2023-08-14 00:02:24', '2024-11-12 21:07:42'),
(2, 5, NULL, 'Natalie Whitehead', '01747448895', NULL, 'wyhahuxadi@mailinator.com', NULL, '$2y$10$coLBCI/3PsvrnACsy5wnPeO7bKA8oYjG4GG9mhPclW718vtz5o53y', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-08-21 23:36:12', '2023-08-21 23:36:12'),
(3, 5, NULL, 'Tallulah Witt', '01747448895', NULL, 'nybep@mailinator.com', NULL, '$2y$10$hgjvJXgxhkTeWvzwODEkt.Ic68.7SkjoXLzWqqAvw4fUxpgLq2uhq', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-08-22 00:38:49', '2023-08-22 00:38:49'),
(4, 5, NULL, 'Hayden Tyler', '01747448895', NULL, 'vygitaqima@mailinator.com', NULL, '$2y$10$/UpFD.11qgzZpecvPaGsxO0ezRK/Do4mJA.SeG7YjSGY5X8u2IuA6', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-08-23 02:20:50', '2023-08-23 02:20:50'),
(5, 5, NULL, 'Imran Hossain', '1747558896', NULL, 'imran_hossain82@gmail.com', NULL, '$2y$10$8Dl57l96kYlmSL9xppzgVe/qRYh/WlSo6guG3gHd5C46U.MYGBjIK', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-09-04 22:41:31', '2023-09-04 22:41:31'),
(6, 4, '24400001', 'D. Fatima', '01859303403', 'media/uploads/doctors/173146617580.jpg', 'lyryveqyfy@mailinator.com', NULL, '$2y$10$mdTwWS48hpiaHURfGj6Q5uj24Rwqx.Qo0xvd4LJIUGQhejHC7apkS', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-11-12 20:49:35', '2024-11-12 21:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishes`
--

CREATE TABLE `user_wishes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `options` json DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
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
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_header_sliders`
--
ALTER TABLE `home_header_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_records`
--
ALTER TABLE `order_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_histories`
--
ALTER TABLE `our_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_histories_created_by_foreign` (`created_by`);

--
-- Indexes for table `our_team_members`
--
ALTER TABLE `our_team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_team_members_created_by_foreign` (`created_by`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_keywords`
--
ALTER TABLE `product_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ages`
--
ALTER TABLE `ages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_links`
--
ALTER TABLE `app_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_header_sliders`
--
ALTER TABLE `home_header_sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_records`
--
ALTER TABLE `order_records`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_histories`
--
ALTER TABLE `our_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `our_team_members`
--
ALTER TABLE `our_team_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_keywords`
--
ALTER TABLE `product_keywords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realtime_notifications`
--
ALTER TABLE `realtime_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_wishes`
--
ALTER TABLE `user_wishes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `our_histories`
--
ALTER TABLE `our_histories`
  ADD CONSTRAINT `our_histories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `our_team_members`
--
ALTER TABLE `our_team_members`
  ADD CONSTRAINT `our_team_members_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
