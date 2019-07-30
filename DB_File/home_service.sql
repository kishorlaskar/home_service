-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 06:24 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$56xcfIsySRSbz9E.i4F.x.wsyZeYweFGYCHyUEGI0lAtIog0EC/f6', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `service_provider_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rank` double(8,2) DEFAULT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_date_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `client_id`, `service_provider_id`, `sub_category_id`, `status`, `rank`, `comment`, `booking_date_time`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 6, '<span class=\"btn-primary\">pending</span>', 3.00, 'dddd', NULL, '2019-03-10 02:18:31', '2019-03-11 02:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(5, 'Appliance Repair', '2019-03-07 13:42:05', '2019-03-07 13:42:05'),
(6, 'Gadgets Repair', '2019-03-07 13:42:18', '2019-03-07 13:42:18'),
(7, 'Beauty Services', '2019-03-07 13:42:31', '2019-03-07 13:42:31'),
(8, 'Laundry Home Service', '2019-03-07 13:42:43', '2019-03-07 13:42:43'),
(11, 'Cleaning and Pest Control', '2019-03-07 14:07:33', '2019-03-07 14:07:33'),
(12, 'Home and Office Renovation', '2019-03-07 14:07:49', '2019-03-07 14:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `password`, `address`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'customer@gmail.com', '$2y$10$9bdPVQqBAU4VqNblRNZcyOQj50quvtZBdpCu9gMP1v3vJOfpBvVHG', NULL, '22222222', NULL, '2019-03-02 14:30:38', '2019-03-02 14:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_01_27_204655_create_admins_table', 1),
(3, '2019_03_02_161833_create_service_providers_table', 1),
(4, '2019_03_02_161952_create_categories_table', 1),
(5, '2019_03_02_162016_create_sub_categories_table', 1),
(6, '2019_03_02_162044_create_clients_table', 1),
(7, '2019_03_02_162106_create_bookings_table', 1),
(8, '2019_03_02_165027_create_service_provider_sub_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `name`, `email`, `password`, `address`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'Service Provider', 'service_provider@gmail.com', '$2y$10$9bdPVQqBAU4VqNblRNZcyOQj50quvtZBdpCu9gMP1v3vJOfpBvVHG', NULL, '1111111111', NULL, '2019-03-02 14:12:01', '2019-03-02 14:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_sub_category`
--

CREATE TABLE `service_provider_sub_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_provider_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `resources` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_provider_sub_category`
--

INSERT INTO `service_provider_sub_category` (`id`, `service_provider_id`, `sub_category_id`, `resources`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 3, '2019-03-11 02:18:31', '2019-03-11 02:18:31'),
(2, 3, 7, 6, '2019-03-11 08:37:22', '2019-03-11 08:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_details` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing` int(11) DEFAULT NULL,
  `payment` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_and_conditions` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `photo`, `service_details`, `pricing`, `payment`, `terms_and_conditions`, `created_at`, `updated_at`) VALUES
(6, 5, 'Refrigerator Servicing', 'D:\\Xampp\\tmp\\php5E69.tmp', 'Enough of calling the refrigerator repair centre a million times! At Sheba.xyz, you can hire the best Fridge repair service. The trusted professionals, experts in fridge service, are here to offer good refrigerator service near you', 100, 'Only Service Charge\r\n• Visiting Charges: 100 tk, if no service is availed\r\n• Excludes all components & parts (if used)\r\n• Excludes any Transportation cost (if used)\r\n• After service completion, customer will pay through online or COD . For payment details please check SMS or in your Sheba profile.', '• Nocturnal service period is from 10.00pm to 8.00am\r\n• Minimum 4 Hours Lead time after service booking\r\n• In excess of BDT 500 will be charged as Emergency Support Service Charge for availing this service at Nocturnal service period\r\n• If for any reason the customer refuses to take service after order confirmation, only the Emergency Support Service Charge will be applicable\r\n• Sheba.xyz or its representatives are not liable for any direct or incidental loss or damage of the client’s property or personal security during availing the service, caused by accident, theft, burglary or any other type of incidental damages.\r\n• The client is singularly responsible for monitoring, using and supervising the activities of the resource provided by service providers.\r\n• SERVICE (10PM to 8AM)', '2019-03-07 13:48:59', '2019-03-07 13:48:59'),
(7, 5, 'TV (LCD/LED)  servicing', 'D:\\Xampp\\tmp\\php7ADC.tmp', 'home_service offers a platform for TV installation services which can help you to connect with the best TV service centers and on ground technicians to relieve you of any additional burden. With home_service. you can avail quick and quality services at your doorstep, removing the hassle involved in TV repairs.', 100, 'Only Service Charge.\r\nVisiting Charges: 100 tk, if no service is availed.\r\nExcludes all components & parts (if used).\r\nExcludes any Transportation cost (if used).', '• Nocturnal service period is from 10.00pm to 8.00am\r\n• Minimum 4 Hours Lead time after service booking\r\n• In excess of BDT 500 will be charged as Emergency Support Service Charge for availing this service at Nocturnal service period\r\n• If for any reason the customer refuses to take service after order confirmation, only the Emergency Support Service Charge will be applicable\r\n• Sheba.xyz or its representatives are not liable for any direct or incidental loss or damage of the client’s property or personal security during availing the service, caused by accident, theft, burglary or any other type of incidental damages.\r\n• The client is singularly responsible for monitoring, using and supervising the activities of the resource provided by service providers.', '2019-03-07 13:52:23', '2019-03-07 13:52:23'),
(8, 5, 'Generator Services', 'D:\\Xampp\\tmp\\php3AB4.tmp', 'Any kind of Generator\'s Health Checkup or Radiator Servicing at your home by calling the best professional repairmen to your house via home service', 200, '• Only Service Charge\r\n• Visiting Charges: 200tk , if no service is availed\r\n• Excludes all components & parts (if used)\r\n• Excludes any Transportation cost (if used)', '• Nocturnal service period is from 10.00pm to 8.00am\r\n• Minimum 4 Hours Lead time after service booking\r\n• In excess of BDT 500 will be charged as Emergency Support Service Charge for availing this service at Nocturnal service period\r\n• If for any reason the customer refuses to take service after order confirmation, only the Emergency Support Service Charge will be applicable\r\n• Sheba.xyz or its representatives are not liable for any direct or incidental loss or damage of the client’s property or personal security during availing the service, caused by accident, theft, burglary or any other type of incidental damages.\r\n• The client is singularly responsible for monitoring, using and supervising the activities of the resource provided by service providers.', '2019-03-10 23:19:21', '2019-03-10 23:19:21'),
(9, 5, 'AC Service and Repair', 'D:\\Xampp\\tmp\\php2C6.tmp', 'At home service you can hire expert AC repair service near you. Our professional Service Providers will give you the best AC repair service. From general inspection to changing AC parts you can avail every AC related service within few moment.\r\n\r\nWe offer:\r\nAC Checkup\r\nAC Basic Servicing\r\nAC Gas Charge\r\nAC Master Service\r\nAC Water Drop Solution\r\nAC Installation  \r\nAC Shifting Service\r\nAC Compressor Fitting\r\nAC Dismantling\r\nAC Capacitor Replacement\r\nAC Service Repairing', 500, 'You only have to pay the service charge including materials/parts cost if taken\r\nVising cost will have to pay if no service is availed', 'Night Service: 10pm to 8am\r\nNight service starts from 10:00 pm to 8:00 am\r\nMinimum 4 Hours Lead time after service booking\r\nIn excess of BDT 500 will be charged as Emergency Support Service Charge\r\nIf for any reason the customer refuses to take service after order confirmation, only the Emergency Support Service Charge will be applicable\r\nSheba.xyz will not liable for any direct or incidental loss/damage of client’s property or personal security during availing the service, caused by accident, theft, burglary or any other type of incidental damages.\r\nClient is singularly responsible for monitoring, using and supervising the activities provided by Service providers.\r\nBy availing the service, clients automatically discharge Sheba.xyz from any claims or legal/moral liabilities other than stated in the Terms of service specified by Sheba.xyz.\r\nAC Checkup Service: AC Checkup service offers only diagnosis of your Air Conditioner by an expert technician who perform initial tests for problem identification. \r\n\r\nAC Basic Servicing: AC Basic service offers primary diagnosis, filter cleaning, test and identify problems by an expert AC technician. \r\n\r\nAC Gas Charge: This service offers performance checkup and post gas refill. If there is a leakage; most of the time AC can be fixed onsite but sometimes it might take longer time. For that you have to wait for 1 or 2 days. \r\n\r\nAC Master Service: AC Master Service offers  detail cleaning of indoor and outdoor unit including minor problem fixing (excluding materials and parts). Service charge varies on your AC amount, height, weight and difficulties. \r\n\r\nAC Water Drop Solution: This service offers identification of the source of dripping water from you AC and fixation water drainage system accordingly. Any additional materials/parts will be charged separately.\r\n\r\nAC Shifting Service: This service is to shift your AC unit from one place or floor to the loading truck. Only service charge is applicable for this service. Service charge varies on your AC amount, height, weight and difficulties. \r\n\r\nAC Compressor Fitting With Gas Charge: This service offers old Compressor removal and new Compressor installation. Compressor price and warranty differs as per manufacturer.\r\n\r\nAC Dismantling: This service offers dismantling AC from home or workplace and disconnecting all the electrical wiring from the AC unit. \r\n\r\nAC Capacitor Replacement: This service offers replacing AC capacitor with a new one. Capacitor price and warranty differs as per manufacturer. \r\n\r\nAC Circuit Repairing: This service offers repairing for the circuits of you AC. Circuit box price and warranty differs as per manufacturer.', '2019-03-10 23:24:34', '2019-03-10 23:24:34'),
(10, 5, 'Microwave Oven Repair', 'D:\\Xampp\\tmp\\php3259.tmp', 'Now find the best microwave oven repair service here, only on home service! We offer you a platform to hire experts for microwave oven repair. With the best microwave oven repair service near you, get that faulty microwave oven fixed right away!', 500, '• Only Service Charge\r\n• Visiting Charges: 100 tk, if no service is availed\r\n• Excludes all components & parts (if used)\r\n• Excludes any Transportation cost (if used)', '• Nocturnal service period is from 10.00pm to 8.00am\r\n• Minimum 4 Hours Lead time after service booking\r\n• In excess of BDT 500 will be charged as Emergency Support Service Charge for availing this service at Nocturnal service period\r\n• If for any reason the customer refuses to take service after order confirmation, only the Emergency Support Service Charge will be applicable\r\n• Sheba.xyz or its representatives are not liable for any direct or incidental loss or damage of the client’s property or personal security during availing the service, caused by accident, theft, burglary or any other type of incidental damages.\r\n• The client is singularly responsible for monitoring, using and supervising the activities of the resource provided by service providers.', '2019-03-10 23:26:57', '2019-03-10 23:26:57'),
(11, 6, 'Desktop Services', 'D:\\Xampp\\tmp\\php60FD.tmp', 'Are you fed up with your desktop problems? Has it been causing you great inconvenience? No need to worry, as home service offers solution to all your desktop problems without you needing to get out of the comfort of your home or workplace. We will give you the full services and support at your door step.', 500, 'What to Expect?\r\n• Solution to any Hardware (e.g. Motherboard, Hard Drive, Power Supply Unit etc.) related problem\r\n• Solution to any Software (e.g. OS Installation, Virus etc.) related problem\r\n• UPS service\r\n\r\nWhat\'s Included\r\n• Material and component cost (If necessary) \r\n• Transportation cost ( If applicable) \r\n\r\nWhat\'s Excluded\r\n• Material cost', '• Nocturnal service period is from 10.00pm to 8.00am', '2019-03-10 23:30:26', '2019-03-10 23:30:26'),
(12, 6, 'CCTV Camera Services & Repair', 'D:\\Xampp\\tmp\\php1765.tmp', 'Need help with affordable CCTV Camera installation or repair? Welcome to home service, our experts perform successful CCTV camera installations and provide valuable services according to the requirements of customers. We promises to connect you with the best professionals who will provide you first-class service.', 300, '<h5>What to Expect?</h5> \r\n• Camera repairing by our vetted technician \r\n• Dismounting and mounting of existing cameras \r\n• Running cables check from cameras to monitor or recording devices\r\n• Software upgradation or installation \r\n\r\n<h5>Price Includes</h5>\r\n• Service charge\r\n\r\n<h5>Price Excludes</h5>\r\n• Material and component cost (If necessary) \r\n• Transportation cost ( If applicable)', '• Nocturnal service period is from 10.00pm to 8.00am', '2019-03-10 23:36:40', '2019-03-10 23:36:40'),
(13, 6, 'Access Control Services', 'D:\\Xampp\\tmp\\php885F.tmp', 'Welcome to home service, our experts perform successful access control installations and provide valuable services according to the requirements of customers. We promises to connect you with the best professionals who will provide you first-class service.', 50, '<h4>What to Expect?</h4>\r\n• Site inspection\r\n• Access control mounting \r\n• Wiring\r\n• Punctual service delivery \r\n• Vetted professional technician \r\n• Software upgradation or installation\r\n• Repairing\r\n\r\n<h4>Price Includes</h4>\r\n• Service charge\r\n\r\n<h4>Price Excludes</h4>\r\n• Material and component cost (If necessary)\r\n• Transportation cost ( If applicable)', '• Warranty on consumables and parts will be as per manufacturer.', '2019-03-10 23:48:05', '2019-03-10 23:48:05'),
(14, 6, 'Internet Networking Services', 'D:\\Xampp\\tmp\\php6FDD.tmp', 'Welcome to home service, our experts perform successful internet networking services such as installations and provide valuable services according to the requirements of customers. We promises to connect you with the best professionals who will provide you first-class service.', 50, '<h4>What to Expect?</h4>\r\n• Verified technician \r\n• LAN cabling \r\n• Work scope assessment', '• Pricing will be determined after work scope assessment by the service provider.', '2019-03-10 23:50:09', '2019-03-10 23:50:09'),
(15, 7, 'Beauty Salon Services', 'D:\\Xampp\\tmp\\php2632.tmp', '<h4>Available only for female</h4>\r\n<h4>What\'s Included</h4>\r\n• High quality products from renown brands, ex: VLCC, Shahnaz herbal, Shivani’s aroma, Loreal, Matrix, Streax etc.\r\n• 100+ hour trained beauticians in specific fields.\r\n• High quality salon instruments and techniques.\r\n• High Quality makeup products from brands like MAC, NYX, Rimmel, Huda Beauty etc.\r\n• Hair extension for wedding service only. \r\n• Good quality natural hena cones for mehendi services.\r\n\r\n<h4>What’s Excluded</h4>\r\n• Any heavy(>1.5kg) salon machineries \r\n• Male services \r\n• Harmful ray treatments', 0, '<h4>Waxing</h4>\r\nStarting Price: ৳ 250\r\n<h4>Spa Facial</h4>\r\nStarting Price: ৳ 700\r\n<h4>Brightening Treatment</h4>\r\nStarting Price: ৳ 350\r\n<h4>Hair Cut</h4>\r\nStarting Price: ৳ 200\r\n<h4>Hair Colour</h4>\r\nStarting Price: ৳ 250', '• Nocturnal service period is from 10.00pm to 8.00am', '2019-03-11 00:00:46', '2019-03-11 00:00:46'),
(16, 7, 'Body Therapy & Wellness', 'D:\\Xampp\\tmp\\phpDFA6.tmp', '<h4>Available only for female</h4>\r\n<h4>Description:</h4>\r\nThai Massage: Thai massage typically works with compression of rhythmic pressing movements directed into muscle tissues by either the hand or fingers. It usually takes place on a flat surface or on the floor. Thai massage can be both relaxing and energizing, so it is a good choice if you want to be active after your massage. It is usually done with massage oil or massage cream. <br>\r\n\r\nAroma Therapy: Aromatherapy massage uses massage oil or lotion that contains essential oils. During an aromatherapy massage, you inhale these essential oil molecules or absorb them through your skin. They are thought to promote beneficial changes in your mind and body by affecting the region of the brain known to influence the nervous system that help you ease your stress and anxiety and also hydrates your skin at the same time.<br>\r\n\r\nPain Relief Massage: Pain relief massages are designed for stress reduction and pain relief from our day to day lives. It helps to improve your flexibility, relieve regular body aches like lower back pain etc. It also helps to stimulate the release of endorphins as well<br>\r\n \r\nRelaxation Massage: Relaxation massage is a smooth, gentle, flowing style that promotes general relaxation, relieves muscular tension, plus improves circulation and range of movement. Your therapist will aim to relax, revive and rejuvenate you at a massage. We, however, recommend deeper styles when dealing with pain or discomfort. this is specifically for you to relax and to relief you from your day to day stress.<br>\r\n\r\nScrubbing: A body scrub is a particularly a body treatment that is basically a facial for the body: It exfoliates and hydrates your skin, leaving it smooth and soft. A body scrub is done with usually sea salt or sugar which is mixed with some kind of massage oil and an aromatic like essential oils. If the scrub uses salt, it might be called a salt scrub, salt glow, or sea salt scrub. <br>\r\n\r\nNotes & Precautions\r\nApplying pressure to tender muscle knots can hurt, but there is a difference between that type of discomfort and pain due to excessive or inappropriate pressure and stretching. While it may be difficult to avoid some discomfort when targeting muscle knots, a qualified, licensed massage therapist should be able to adjust the massage pressure and movements so that you are not in pain.\r\nPlease choose your service and type as per your need. The duration will exactly be what you choose.<br>', NULL, 'Foot therapy<br>\r\nStarting Price: ৳ 300<br>\r\nFull Body Therapy<br>\r\nStarting Price: ৳ 1100<br>\r\nHead, Neck & Shoulder<br>\r\nStarting Price: ৳ 500<br>\r\nBack Therapy<br>\r\nStarting Price: ৳ 500<br>', NULL, '2019-03-11 00:11:23', '2019-03-11 00:11:23'),
(17, 7, 'Wedding and Mehendi', 'D:\\Xampp\\tmp\\phpBE8F.tmp', '<h4>Available only for female</h4>\r\n<h4>What to Expect?</h4>\r\nComplete wedding makeover solution\r\nTailored packages for various wedding events\r\nBackground checked, well trained female beautician\r\nProfessional service at your doorstep\r\nConvenient service delivery\r\nProper hygiene maintenance\r\nHigh-end cosmetic and equipment<br>\r\n\r\nService booking- 3 hours prior to service delivery<br>\r\n \r\nService availability- 9 Am to 7 pm <br>\r\n\r\n\r\n<h4>Differentiation between beautician</h4> \r\n\r\nStandard-Makeup artist with minimum one year of experience \r\nSemi expert-specialized makeup artist with 2 years of experience \r\nExpert-specialized makeup artist having experience of 5 years or above', NULL, 'Akth/Engagement Makeup<br>\r\nStarting Price: ৳ 4000<br>\r\nHolud/Mehendi Makeup<br>\r\nStarting Price: ৳ 6000<br>\r\nWedding/Reception Makeup<br>\r\nStarting Price: ৳ 9000<br>\r\nMehendi<br>\r\nStarting Price: ৳ 125<br>', NULL, '2019-03-11 00:15:37', '2019-03-11 00:15:37'),
(18, 8, 'General Laundry Services', 'D:\\Xampp\\tmp\\php5D.tmp', '<h4>About this Service<h4>\r\nOur Service Provider ensure that your clothes are handled by professionals. Our quality services are quick and simple. Washing is a method of cleaning, usually with water & often some kind of detergent Every customer’s laundry is washed with extreme care by our laundry specialists, who are well trained to preserve cloth quality. After completing the process cycle, our team folds and packs your laundry at your door step as per your convenient times. \r\n<h4>What\'s Included</h4>\r\n• Professional Handling<br>\r\n• Every customer product is washed with extreme care<br>\r\n• Special Instruction are headed<br>\r\n• Smart Packaging<br>\r\n• Affordable price<br>\r\n• * Free Door Step Service if order amount is 100 or above\r\n\r\n<h4>What’s Excluded</h4>\r\n• Express Service <br>\r\n• Hanger Packaging (Except Blazer, Saree etc )<br>', NULL, 'Men\'s Wear<br>\r\nStarting Price: ৳ 7<br>\r\nHousehold & Accessories<br>\r\nStarting Price: ৳ 3<br>\r\nKids Wear<br>\r\nStarting Price: ৳ 7<br>\r\nWomen\'s Wear<br>\r\nStarting Price: ৳ 7<br>', NULL, '2019-03-11 00:19:10', '2019-03-11 00:19:10'),
(19, 11, 'Professional Home Cleaning', 'D:\\Xampp\\tmp\\php95CF.tmp', 'This service will help you cleaning your home and also help removing deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and  neatly.\r\n\r\n\r\n<h3>What\'s Included</h3>\r\nExpert Cleaner<br>\r\nUsage of professional cleaning tools<br>\r\nReasonable price<br>\r\nRemoval of deep <br>\r\n\r\n<h3>What\'s Exclude</h3> \r\nRepairing', NULL, 'Bathroom Deep Cleaning<br>\r\nStarting Price: ৳ 1000<br>\r\nKitchen Deep Cleaning<br>\r\nStarting Price: ৳ 990<br>\r\nCarpet Cleaning<br>\r\nStarting Price: ৳ 600<br>\r\nChair/Sofa Cleaning<br>\r\nStarting Price: ৳ 950<br>\r\nCommon Space Cleaning<br>\r\nStarting Price: ৳ 3000<br>\r\nFloor Deep Cleaning for Home<br>\r\nStarting Price: ৳ 2000<br>\r\nVertical Blind Cleaning<br>\r\nStarting Price: ৳ 1500<br>', NULL, '2019-03-11 00:25:16', '2019-03-11 00:25:16'),
(20, 11, 'Pest Control Service', 'D:\\Xampp\\tmp\\php6E0.tmp', 'These services are complete solution of pest and bugs of your house. Are professional service providers will ask for some hour from you and get on work to completely remove your tension.\r\n<h3>What\'s Included</h3>\r\nAffordable price<br>\r\nNon-biodegradable chemical use<br>\r\nOdorless<br>\r\n\r\n<h3>What’s Excluded</h3>\r\nRepairing', NULL, 'Residential Pest Control<br>\r\nStarting Price: ৳ 300<br>\r\nCommercial Pest Control<br>\r\nStarting Price: ৳ 150<br>', NULL, '2019-03-11 00:27:56', '2019-03-11 00:27:56'),
(21, 11, 'Tank Cleaning Services', 'D:\\Xampp\\tmp\\php644F.tmp', '<h3>About the Service</h3>\r\nThrough this service,  service providers will make your tank free from all types of waste and germ. Keep both of your tank clean and use fresh water.\r\n\r\n<h3>What\'s Included</h3>\r\n• Expert cleaner<br>\r\n• Non-biodegradable chemical use<br>\r\n• Machine use if required<br>', NULL, 'Septic Tank Cleaning Services<br>\r\nStarting Price: ৳ 2400<br>\r\nManual Water Tank Cleaning Services<br>\r\nStarting Price: ৳ 3000<br>\r\nAutomatic Water Tank Cleaning<br>\r\nStarting Price: ৳ 3750', NULL, '2019-03-11 00:32:42', '2019-03-11 00:32:42'),
(22, 11, 'Fridge Cleaning', 'D:\\Xampp\\tmp\\phpE176.tmp', 'This service will help you cleaning your fridge up to bottom. Our service providers will gently clean your fridge with harmless chemicals.\r\n\r\n<h3>What\'s Included</h3>\r\nExpert Cleaner<br>\r\nUsage of professional cleaning tools<br>\r\nReasonable price<br>\r\n<h3>What\'s Exclude</h3> \r\nRepairing', NULL, 'Fridge Cleaning<br>\r\nStarting Price: ৳ 380', NULL, '2019-03-11 00:35:25', '2019-03-11 00:35:25'),
(23, 12, 'Wooden Furniture & Door works', 'D:\\Xampp\\tmp\\php87B0.tmp', 'Custom furniture describes your taste and increases the beauty of your home. Our service provider will make your dream furniture true. \r\n\r\n<h3>★★★ Pricing ★★★:</h3> \r\nInspection/Visitation charge: 200 TK, if no service is availed. \r\nIf the order is confirmed to be served, no visiting charge will be needed. \r\nSeparate pricing structure according to service and material. \r\n<h3>What\'s Included</h3>\r\n• Best quality materials<br>\r\n• Expert carpenter<br>\r\n• Reasonable price<br>\r\n\r\n<h3>What’s Excluded</h3>\r\n• Minimum size of the furniture', NULL, 'Plywood Furniture<br>\r\nStarting Price: ৳ 7500<br>\r\nVeneer Board Furniture<br>\r\nStarting Price: ৳ 6600<br>\r\nFurniture & Door Repair<br>\r\nStarting Price: ৳ 300<br>\r\nNew Furniture & Door<br>\r\nStarting Price: ৳ 5000', NULL, '2019-03-11 00:38:19', '2019-03-11 00:38:19'),
(24, 12, 'Wall Painting & wallpaper', 'D:\\Xampp\\tmp\\php4DA7.tmp', 'For making your home look new and glitter our service providers are always ready with their best quality service.\r\n• Enamel Paint\r\n• Plastic paint \r\n• Distemper paint\r\n• Wall Paper Pasting \r\n\r\n<h3>★★★ Pricing ★★★: </h3>\r\nInspection/Visitation charge: 200 TK, if no service is availed. \r\nIf the order is confirmed to be served, no visiting charge will be needed. \r\nSeparate pricing structure according to service and material. \r\n\r\n<h3>What\'s Included</h3>\r\n• Professional and expert resource<br>\r\n• A smooth distributed coating on your wooden furniture surface by brushing<br>\r\n• Proper Chemicals and pigment matching your desired finishing<br>\r\n• Long lasting quality.<br>\r\n\r\n<h3>What\'s Excluded</h3>\r\n• Seller cost<br>\r\n• Minimum size<br>', NULL, 'Plastic Paint reject<br>\r\nStarting Price: ৳ 1000<br>\r\nWallpaper Pasting<br>\r\nStarting Price: ৳ 720<br>\r\nEnamel Paint<br>\r\nStarting Price: ৳ 400<br>\r\nPlastic paint<br>\r\nStarting Price: ৳ 2000<br>\r\nTexture/Design Paint<br>\r\nStarting Price: ৳ 1000', NULL, '2019-03-11 00:41:21', '2019-03-11 00:41:21'),
(25, 12, 'Furniture Cover Repair', 'D:\\Xampp\\tmp\\phpAF7A.tmp', 'home service Introduces you with the revolutionary solution to repair your furniture cover in emergency need. Hire a Labor Based on Your Requirement . Whether you need to change the cover of you bed,Sofa, Chinese Chair/normal wooden chair hire a labor. This Service has been designed to give you the easiest solution in a budget rate for any kind of wooden door or furniture repair', NULL, 'Sofa Cover repair<br>\r\nStarting Price: ৳ 2800', NULL, '2019-03-11 00:42:51', '2019-03-11 00:42:51'),
(26, 12, 'Glass & Thai Work', 'D:\\Xampp\\tmp\\php2B1A.tmp', '<h3>★★★ Pricing ★★★:<h3> \r\nInspection/Visitation charge: 200 TK, if no service is availed. <br>\r\nIf the order is confirmed to be served, no visiting charge will be needed. <br>\r\nSeparate pricing structure according to service and material. <br>', NULL, 'Sliding Glass Door<br>\r\nStarting Price: ৳ 5880<br>\r\nThai Door/Window Lock Repair<br>\r\nStarting Price: ৳ 120<br>\r\nThai Glass Partition<br>\r\nStarting Price: ৳ 490<br>\r\nThai Furniture Services<br>\r\nStarting Price: ৳ 1500<br>\r\nMosquito net Services<br>\r\nStarting Price: ৳ 600', NULL, '2019-03-11 00:45:34', '2019-03-11 00:45:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_client_id_foreign` (`client_id`),
  ADD KEY `bookings_service_provider_id_foreign` (`service_provider_id`),
  ADD KEY `bookings_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

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
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_providers_email_unique` (`email`);

--
-- Indexes for table `service_provider_sub_category`
--
ALTER TABLE `service_provider_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_provider_sub_categories_service_provider_id_foreign` (`service_provider_id`),
  ADD KEY `service_provider_sub_categories_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_provider_sub_category`
--
ALTER TABLE `service_provider_sub_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provider_sub_category`
--
ALTER TABLE `service_provider_sub_category`
  ADD CONSTRAINT `service_provider_sub_categories_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_provider_sub_categories_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
