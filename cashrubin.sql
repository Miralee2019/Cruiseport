-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2020 at 06:38 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashrubin`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_slider`
--

CREATE TABLE `app_slider` (
  `id` int(11) NOT NULL,
  `name_of_slider` varchar(300) DEFAULT NULL,
  `slider_image` varchar(500) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_slider`
--

INSERT INTO `app_slider` (`id`, `name_of_slider`, `slider_image`, `type`, `store_id`, `offer_id`, `is_active`, `created_date`) VALUES
(10, 'Island Vibes on Every Level', '1.png', 'promotion', NULL, NULL, 1, '2019-08-19 19:17:48'),
(11, 'On Board Activities for Kids and Teens', '2.png', 'promotion', NULL, NULL, 1, '2019-08-19 19:18:58'),
(12, 'Effy Jewelry', '3.png', 'promotion', NULL, NULL, 1, '2019-08-19 19:20:21'),
(13, 'Longines Boutique', '4.png', 'promotion', NULL, NULL, 1, '2019-08-19 19:21:47'),
(15, 'Falt 40% on Toys', 'images.jpg', 'store', 53, NULL, 1, '2019-09-25 13:06:01'),
(16, 'Discount on Nail Art', 'index.jpg', 'offer', 52, 61, 1, '2019-09-25 13:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `image_name` varchar(300) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `width` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_library`
--

INSERT INTO `image_library` (`id`, `image_name`, `category_id`, `created_date`, `height`, `width`) VALUES
(1, 'james-kresser-1060767-unsplash.jpg', 9, '2018-10-02 17:28:08', '2832', '4240'),
(2, '4458-India-Today-English.jpg', 4, '2018-11-14 15:17:46', '607', '446');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `no_of_rubs` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `card_id` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `refund_status` varchar(20) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `amount_refunded` int(11) DEFAULT '0',
  `created_at` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `transaction_key` varchar(100) DEFAULT NULL,
  `payment_json` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `store_id`, `no_of_rubs`, `amount`, `card_id`, `contact`, `email`, `refund_status`, `method`, `amount_refunded`, `created_at`, `status`, `currency`, `transaction_key`, `payment_json`) VALUES
(1, 9, 200, 64.9, 'card_B014S6q7BS4Rh1', '+919657067822', 'booksbooks502@gmail.com', NULL, 'card', 0, '1537446126', 'authorized', 'INR', 'pay_B014R4XAq1ClRv', '{"id":"pay_B014R4XAq1ClRv","entity":"payment","amount":6490,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"card","amount_refunded":0,"refund_status":null,"captured":false,"description":"Purchasing rubs","card_id":"card_B014S6q7BS4Rh1","bank":null,"wallet":null,"vpa":null,"email":"booksbooks502@gmail.com","contact":"+919657067822","notes":{"address":"XYZ"},"fee":null,"tax":null,"error_code":null,"error_description":null,"created_at":1537446126}'),
(2, 6, 1500, 486.75, 'card_B014caX7uCsEi7', '+919766672053', 'ashishjagtap008@gmail.com', NULL, 'card', 0, '1537446136', 'authorized', 'INR', 'pay_B014bYymCkyArS', '{"id":"pay_B014bYymCkyArS","entity":"payment","amount":48675,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"card","amount_refunded":0,"refund_status":null,"captured":false,"description":"Purchasing rubs","card_id":"card_B014caX7uCsEi7","bank":null,"wallet":null,"vpa":null,"email":"ashishjagtap008@gmail.com","contact":"+919766672053","notes":{"address":"XYZ"},"fee":null,"tax":null,"error_code":null,"error_description":null,"created_at":1537446136}'),
(3, 8, 10000, 3245, 'card_B01OxQxzOR6Znt', '+918319837942', 'nidhitiwari2208@outlook.com', NULL, 'card', 0, '1537447291', 'authorized', 'INR', 'pay_B01OwNhrxwMAzK', '{"id":"pay_B01OwNhrxwMAzK","entity":"payment","amount":324500,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"card","amount_refunded":0,"refund_status":null,"captured":false,"description":"Purchasing rubs","card_id":"card_B01OxQxzOR6Znt","bank":null,"wallet":null,"vpa":null,"email":"nidhitiwari2208@outlook.com","contact":"+918319837942","notes":{"address":"XYZ"},"fee":null,"tax":null,"error_code":null,"error_description":null,"created_at":1537447291}'),
(4, 9, 200, 64.9, 'card_B8HpehLy3FsRu3', '+919657067822', 'booksbooks502@gmail.com', NULL, 'card', 0, '1539251874', 'authorized', 'INR', 'pay_B8HpddjBhZaPtf', '{"id":"pay_B8HpddjBhZaPtf","entity":"payment","amount":6490,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"card","amount_refunded":0,"refund_status":null,"captured":false,"description":"Purchasing rubs","card_id":"card_B8HpehLy3FsRu3","bank":null,"wallet":null,"vpa":null,"email":"booksbooks502@gmail.com","contact":"+919657067822","notes":{"address":"XYZ"},"fee":null,"tax":null,"error_code":null,"error_description":null,"created_at":1539251874}'),
(5, 10, 200, 64.9, NULL, '+918788474240', 'nikhilgunjal@yahoo.com', NULL, 'upi', 0, '1540900802', 'authorized', 'INR', 'pay_BFq3xKgsPPST7t', '{"id":"pay_BFq3xKgsPPST7t","entity":"payment","amount":6490,"currency":"INR","status":"authorized","order_id":null,"invoice_id":null,"international":false,"method":"upi","amount_refunded":0,"refund_status":null,"captured":false,"description":"Purchasing rubs","card_id":null,"bank":null,"wallet":null,"vpa":"nikhilgunjal@ybl","email":"nikhilgunjal@yahoo.com","contact":"+918788474240","notes":{"address":"XYZ"},"fee":null,"tax":null,"error_code":null,"error_description":null,"created_at":1540900802}');

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `port_id` int(11) NOT NULL,
  `ref_ship_id` int(11) NOT NULL,
  `port_name` varchar(100) NOT NULL,
  `port_lat` double NOT NULL,
  `port_long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`port_id`, `ref_ship_id`, `port_name`, `port_lat`, `port_long`) VALUES
(1, 1, 'Nassau Bahamas', 25.047983, -77.355415),
(2, 2, 'Nassau Bahamas', 25.047983, -77.355415);

-- --------------------------------------------------------

--
-- Table structure for table `referral_app`
--

CREATE TABLE `referral_app` (
  `id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `medium` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_app`
--

INSERT INTO `referral_app` (`id`, `from_id`, `to_id`, `points`, `medium`, `created_date`, `last_updated_date`) VALUES
(1, 2, 8, 10, 'WhatsApp', '2018-09-25 11:31:23', '2018-09-25 11:31:23'),
(2, 2, 9, 10, 'Message', '2018-09-25 11:56:33', '2018-09-25 11:56:33'),
(3, 2, 10, 10, 'Email', '2018-09-25 14:33:58', '2018-09-25 14:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `ship_id` int(11) NOT NULL,
  `ship_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`ship_id`, `ship_name`) VALUES
(1, 'Riviera'),
(2, 'Norwegian sky');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `text` mediumtext,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `text`, `type`) VALUES
(1, '<p>hi</p>', NULL),
(2, '<p>hi</p>', NULL),
(3, '<p>hello</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_aaa`
--

CREATE TABLE `t_aaa` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_aaa`
--

INSERT INTO `t_aaa` (`id`, `name`, `c_date`) VALUES
(1, 'aaa', '0000-00-00 00:00:00'),
(2, 'aaa', '0000-00-00 00:00:00'),
(3, 'ww', '0000-00-00 00:00:00'),
(4, 'gg', '2018-03-27 08:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `T_Activity`
--

CREATE TABLE `T_Activity` (
  `activity_id` int(30) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_ActivityLog`
--

CREATE TABLE `T_ActivityLog` (
  `activity_log_id` int(30) NOT NULL,
  `activity_name` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `store_id` int(30) NOT NULL,
  `store_offer_id` int(11) NOT NULL,
  `store` int(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `respective_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `activity_date` date NOT NULL,
  `activity_time` time NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_ActivityLog`
--

INSERT INTO `T_ActivityLog` (`activity_log_id`, `activity_name`, `activity_type`, `store_id`, `store_offer_id`, `store`, `user_id`, `respective_id`, `points`, `activity_date`, `activity_time`, `created_date`, `last_updated_date`) VALUES
(1, 'shared an offer of', 'share', 8, 1, 0, 3, NULL, NULL, '2018-09-20', '17:53:53', '2018-09-20 12:23:53', '2018-09-20 12:23:53'),
(2, 'walkin points added', 'walkin points', 8, 0, 8, 5, NULL, NULL, '2018-09-20', '18:01:02', '2018-09-20 12:31:02', '2018-09-20 12:31:02'),
(3, 'shared an offer of', 'share', 9, 2, 0, 3, NULL, NULL, '2018-09-20', '18:05:26', '2018-09-20 12:35:26', '2018-09-20 12:35:26'),
(4, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-09-20', '18:05:50', '2018-09-20 12:35:50', '2018-09-20 12:35:50'),
(5, 'walkin points added', 'walkin points', 8, 0, 8, 1, NULL, NULL, '2018-09-20', '18:06:12', '2018-09-20 12:36:12', '2018-09-20 12:36:12'),
(6, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-09-20', '18:07:35', '2018-09-20 12:37:35', '2018-09-20 12:37:35'),
(7, 'Magazine', 'redeem_coupon', 0, 1, 0, 3, NULL, NULL, '2018-09-20', '18:23:29', '2018-09-20 12:53:29', '2018-09-20 12:53:29'),
(8, 'shared an offer of', 'share', 8, 1, 0, 2, NULL, NULL, '2018-09-20', '18:26:54', '2018-09-20 12:56:54', '2018-09-20 12:56:54'),
(9, 'favorited a store ', 'favorite_store', 10, 0, 10, 4, NULL, NULL, '2018-09-20', '18:31:17', '2018-09-20 13:01:17', '2018-09-20 13:01:17'),
(10, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-09-21', '10:54:19', '2018-09-21 05:24:19', '2018-09-21 05:24:19'),
(11, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-09-21', '15:14:16', '2018-09-21 09:44:16', '2018-09-21 09:44:16'),
(12, 'shared an offer of', 'share', 8, 4, 0, 6, NULL, NULL, '2018-09-21', '15:50:37', '2018-09-21 10:20:37', '2018-09-21 10:20:37'),
(13, 'shared an offer of', 'share', 8, 7, 0, 2, NULL, NULL, '2018-09-21', '15:56:49', '2018-09-21 10:26:49', '2018-09-21 10:26:49'),
(14, 'shared an offer of', 'share', 8, 6, 0, 3, NULL, NULL, '2018-09-21', '16:22:01', '2018-09-21 10:52:01', '2018-09-21 10:52:01'),
(15, 'gave rating to the store', 'rating', 8, 0, 0, 3, NULL, NULL, '2018-09-21', '16:22:50', '2018-09-21 10:52:50', '2018-09-21 10:52:50'),
(16, 'Hey ! you got  lucky ', 'store_send', 10, 0, 0, 4, NULL, NULL, '2018-09-21', '17:06:46', '2018-09-21 11:36:46', '2018-09-21 11:36:46'),
(17, 'favorited an offer ', 'favorite_offer', 12, 9, 12, 1, NULL, NULL, '2018-09-23', '13:36:25', '2018-09-23 08:06:25', '2018-09-23 08:06:25'),
(18, 'favorited a store ', 'favorite_store', 12, 0, 12, 1, NULL, NULL, '2018-09-23', '14:31:01', '2018-09-23 09:01:01', '2018-09-23 09:01:01'),
(19, 'favorited a store ', 'favorite_store', 7, 0, 7, 1, NULL, NULL, '2018-09-23', '14:38:35', '2018-09-23 09:08:35', '2018-09-23 09:08:35'),
(20, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-09-24', '10:01:35', '2018-09-24 04:31:35', '2018-09-24 04:31:35'),
(21, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 6, NULL, NULL, '2018-09-24', '10:37:02', '2018-09-24 05:07:02', '2018-09-24 05:07:02'),
(22, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 6, NULL, NULL, '2018-09-24', '10:37:20', '2018-09-24 05:07:20', '2018-09-24 05:07:20'),
(23, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 6, NULL, NULL, '2018-09-24', '10:37:27', '2018-09-24 05:07:27', '2018-09-24 05:07:27'),
(24, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 2, NULL, NULL, '2018-09-24', '10:54:05', '2018-09-24 05:24:05', '2018-09-24 05:24:05'),
(25, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 6, NULL, NULL, '2018-09-24', '10:56:11', '2018-09-24 05:26:11', '2018-09-24 05:26:11'),
(26, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 6, NULL, NULL, '2018-09-24', '10:56:34', '2018-09-24 05:26:34', '2018-09-24 05:26:34'),
(27, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 6, NULL, NULL, '2018-09-24', '10:57:00', '2018-09-24 05:27:00', '2018-09-24 05:27:00'),
(28, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-09-24', '10:59:07', '2018-09-24 05:29:07', '2018-09-24 05:29:07'),
(29, 'favorited a store ', 'favorite_store', 7, 0, 7, 2, NULL, NULL, '2018-09-24', '11:02:24', '2018-09-24 05:32:24', '2018-09-24 05:32:24'),
(30, 'favorited an offer ', 'favorite_offer', 12, 9, 12, 1, NULL, NULL, '2018-09-24', '11:51:09', '2018-09-24 06:21:09', '2018-09-24 06:21:09'),
(31, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 1, NULL, NULL, '2018-09-24', '11:51:17', '2018-09-24 06:21:17', '2018-09-24 06:21:17'),
(32, 'favorited an offer ', 'favorite_offer', 8, 6, 8, 6, NULL, NULL, '2018-09-24', '11:57:29', '2018-09-24 06:27:29', '2018-09-24 06:27:29'),
(33, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 2, NULL, NULL, '2018-09-24', '11:58:08', '2018-09-24 06:28:08', '2018-09-24 06:28:08'),
(34, '50% OFF on bookmyshow', 'redeem_coupon', 0, 2, 0, 2, NULL, NULL, '2018-09-24', '11:58:53', '2018-09-24 06:28:53', '2018-09-24 06:28:53'),
(35, 'convert to paytm', 'convert_to_paytm', 0, 1, 0, 2, NULL, NULL, '2018-09-24', '11:59:52', '2018-09-24 06:29:52', '2018-09-24 06:29:52'),
(36, 'favorited a store ', 'favorite_store', 7, 0, 7, 6, NULL, NULL, '2018-09-24', '12:01:44', '2018-09-24 06:31:44', '2018-09-24 06:31:44'),
(37, 'favorited a store ', 'favorite_store', 8, 0, 8, 6, NULL, NULL, '2018-09-24', '12:01:52', '2018-09-24 06:31:52', '2018-09-24 06:31:52'),
(38, 'favorited a store ', 'favorite_store', 9, 0, 9, 6, NULL, NULL, '2018-09-24', '12:02:22', '2018-09-24 06:32:22', '2018-09-24 06:32:22'),
(39, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 6, NULL, NULL, '2018-09-24', '12:03:11', '2018-09-24 06:33:11', '2018-09-24 06:33:11'),
(40, 'favorited a store ', 'favorite_store', 8, 0, 8, 2, NULL, NULL, '2018-09-24', '12:10:47', '2018-09-24 06:40:47', '2018-09-24 06:40:47'),
(41, 'shared an offer of', 'share', 8, 1, 0, 2, NULL, NULL, '2018-09-24', '12:21:58', '2018-09-24 06:51:58', '2018-09-24 06:51:58'),
(42, 'gave rating to the store', 'rating', 8, 0, 0, 2, NULL, NULL, '2018-09-24', '12:22:04', '2018-09-24 06:52:04', '2018-09-24 06:52:04'),
(43, 'shared an offer of', 'share', 8, 6, 0, 2, NULL, NULL, '2018-09-24', '14:37:15', '2018-09-24 09:07:15', '2018-09-24 09:07:15'),
(44, 'shared an offer of', 'share', 8, 6, 0, 2, NULL, NULL, '2018-09-24', '14:40:33', '2018-09-24 09:10:33', '2018-09-24 09:10:33'),
(45, 'favorited a store ', 'favorite_store', 12, 0, 12, 3, NULL, NULL, '2018-09-24', '14:41:55', '2018-09-24 09:11:55', '2018-09-24 09:11:55'),
(46, 'favorited a store ', 'favorite_store', 7, 0, 7, 3, NULL, NULL, '2018-09-24', '14:42:00', '2018-09-24 09:12:00', '2018-09-24 09:12:00'),
(47, 'favorited a store ', 'favorite_store', 8, 0, 8, 3, NULL, NULL, '2018-09-24', '14:42:15', '2018-09-24 09:12:15', '2018-09-24 09:12:15'),
(48, 'shared an offer of', 'share', 7, 5, 0, 6, NULL, NULL, '2018-09-24', '14:47:40', '2018-09-24 09:17:40', '2018-09-24 09:17:40'),
(49, 'walkin points added', 'walkin points', 8, 0, 8, 1, NULL, NULL, '2018-09-24', '14:53:36', '2018-09-24 09:23:36', '2018-09-24 09:23:36'),
(50, 'shared an offer of', 'share', 8, 4, 0, 2, NULL, NULL, '2018-09-24', '15:38:54', '2018-09-24 10:08:54', '2018-09-24 10:08:54'),
(51, '50% OFF on bookmyshow', 'redeem_coupon', 0, 2, 0, 3, NULL, NULL, '2018-09-24', '15:41:00', '2018-09-24 10:11:00', '2018-09-24 10:11:00'),
(52, 'convert to paytm', 'convert_to_paytm', 0, 2, 0, 2, NULL, NULL, '2018-09-24', '15:41:11', '2018-09-24 10:11:11', '2018-09-24 10:11:11'),
(53, 'convert to paytm', 'convert_to_paytm', 0, 2, 0, 2, NULL, NULL, '2018-09-24', '15:41:15', '2018-09-24 10:11:15', '2018-09-24 10:11:15'),
(54, '50% OFF on bookmyshow', 'redeem_coupon', 0, 2, 0, 2, NULL, NULL, '2018-09-24', '15:42:28', '2018-09-24 10:12:28', '2018-09-24 10:12:28'),
(55, '50% OFF on bookmyshow', 'redeem_coupon', 0, 2, 0, 2, NULL, NULL, '2018-09-24', '15:42:32', '2018-09-24 10:12:32', '2018-09-24 10:12:32'),
(56, 'favorited an offer ', 'favorite_offer', 8, 6, 8, 2, NULL, NULL, '2018-09-24', '15:59:38', '2018-09-24 10:29:38', '2018-09-24 10:29:38'),
(57, 'favorited a store ', 'favorite_store', 12, 0, 12, 6, NULL, NULL, '2018-09-24', '16:42:40', '2018-09-24 11:12:40', '2018-09-24 11:12:40'),
(58, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-09-24', '16:51:51', '2018-09-24 11:21:51', '2018-09-24 11:21:51'),
(59, 'convert to paytm', 'convert_to_paytm', 0, 3, 0, 3, NULL, NULL, '2018-09-24', '16:54:20', '2018-09-24 11:24:20', '2018-09-24 11:24:20'),
(60, 'shared an offer of', 'share', 7, 5, 0, 7, NULL, NULL, '2018-09-24', '20:10:03', '2018-09-24 14:40:03', '2018-09-24 14:40:03'),
(61, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-09-24', '23:43:20', '2018-09-24 18:13:21', '2018-09-24 18:13:21'),
(62, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-09-25', '11:12:10', '2018-09-25 05:42:10', '2018-09-25 05:42:10'),
(63, 'Referral added to ', 'referral_set', 0, 0, 0, 2, 1, 10, '2018-09-25', '11:31:23', '2018-09-25 06:01:23', '2018-09-25 06:01:23'),
(64, 'Referral added to ', 'referral_set', 0, 0, 0, 2, 2, 10, '2018-09-25', '11:56:33', '2018-09-25 06:26:33', '2018-09-25 06:26:33'),
(65, 'walkin points added', 'walkin points', 8, 0, 8, 9, NULL, NULL, '2018-09-25', '12:03:20', '2018-09-25 06:33:20', '2018-09-25 06:33:20'),
(66, 'favorited a store ', 'favorite_store', 17, 0, 17, 6, NULL, NULL, '2018-09-25', '12:32:58', '2018-09-25 07:02:58', '2018-09-25 07:02:58'),
(67, 'Referral added to ', 'referral_set', 0, 0, 0, 2, 3, 10, '2018-09-25', '14:33:58', '2018-09-25 09:03:58', '2018-09-25 09:03:58'),
(68, 'walkin points added', 'walkin points', 8, 0, 8, 11, NULL, NULL, '2018-09-25', '14:40:35', '2018-09-25 09:10:35', '2018-09-25 09:10:35'),
(69, 'shared an offer of', 'share', 8, 1, 0, 6, NULL, NULL, '2018-09-25', '15:24:57', '2018-09-25 09:54:57', '2018-09-25 09:54:57'),
(70, 'shared an offer of', 'share', 19, 12, 0, 2, NULL, NULL, '2018-09-25', '15:38:52', '2018-09-25 10:08:52', '2018-09-25 10:08:52'),
(71, 'shared an offer of', 'share', 8, 4, 0, 6, NULL, NULL, '2018-09-25', '15:39:20', '2018-09-25 10:09:20', '2018-09-25 10:09:20'),
(72, 'shared an offer of', 'share', 8, 6, 0, 6, NULL, NULL, '2018-09-25', '15:39:58', '2018-09-25 10:09:58', '2018-09-25 10:09:58'),
(73, 'shared an offer of', 'share', 19, 12, 0, 2, NULL, NULL, '2018-09-25', '15:41:17', '2018-09-25 10:11:17', '2018-09-25 10:11:17'),
(74, 'shared an offer of', 'share', 8, 1, 0, 6, NULL, NULL, '2018-09-25', '15:41:25', '2018-09-25 10:11:25', '2018-09-25 10:11:25'),
(75, 'shared an offer of', 'share', 7, 5, 0, 3, NULL, NULL, '2018-09-25', '16:01:09', '2018-09-25 10:31:09', '2018-09-25 10:31:09'),
(76, 'gave rating to the store', 'rating', 7, 0, 0, 3, NULL, NULL, '2018-09-25', '16:01:16', '2018-09-25 10:31:16', '2018-09-25 10:31:16'),
(77, 'shared an offer of', 'share', 7, 5, 0, 3, NULL, NULL, '2018-09-25', '16:01:35', '2018-09-25 10:31:36', '2018-09-25 10:31:36'),
(78, 'shared an offer of', 'share', 8, 7, 0, 3, NULL, NULL, '2018-09-25', '16:02:17', '2018-09-25 10:32:17', '2018-09-25 10:32:17'),
(79, 'shared an offer of', 'share', 8, 4, 0, 3, NULL, NULL, '2018-09-25', '16:02:54', '2018-09-25 10:32:54', '2018-09-25 10:32:54'),
(80, 'shared an offer of', 'share', 8, 1, 0, 3, NULL, NULL, '2018-09-25', '16:03:24', '2018-09-25 10:33:24', '2018-09-25 10:33:24'),
(81, 'shared an offer of', 'share', 19, 12, 0, 3, NULL, NULL, '2018-09-25', '16:04:26', '2018-09-25 10:34:26', '2018-09-25 10:34:26'),
(82, 'gave rating to the store', 'rating', 19, 0, 0, 3, NULL, NULL, '2018-09-25', '16:04:45', '2018-09-25 10:34:45', '2018-09-25 10:34:45'),
(83, 'shared an offer of', 'share', 14, 13, 0, 3, NULL, NULL, '2018-09-25', '16:09:56', '2018-09-25 10:39:56', '2018-09-25 10:39:56'),
(84, 'gave rating to the store', 'rating', 14, 0, 0, 3, NULL, NULL, '2018-09-25', '16:10:00', '2018-09-25 10:40:00', '2018-09-25 10:40:00'),
(85, 'shared an offer of', 'share', 7, 5, 0, 2, NULL, NULL, '2018-09-25', '16:13:11', '2018-09-25 10:43:11', '2018-09-25 10:43:11'),
(86, 'shared an offer of', 'share', 7, 5, 0, 6, NULL, NULL, '2018-09-25', '16:15:02', '2018-09-25 10:45:02', '2018-09-25 10:45:02'),
(87, 'shared an offer of', 'share', 9, 3, 0, 6, NULL, NULL, '2018-09-25', '16:17:40', '2018-09-25 10:47:40', '2018-09-25 10:47:40'),
(88, 'shared an offer of', 'share', 8, 7, 0, 10, NULL, NULL, '2018-09-25', '16:22:56', '2018-09-25 10:52:56', '2018-09-25 10:52:56'),
(89, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-09-25', '16:24:29', '2018-09-25 10:54:29', '2018-09-25 10:54:29'),
(90, 'shared an offer of', 'share', 9, 2, 0, 6, NULL, NULL, '2018-09-25', '16:30:51', '2018-09-25 11:00:51', '2018-09-25 11:00:51'),
(91, 'shared an offer of', 'share', 12, 9, 0, 3, NULL, NULL, '2018-09-25', '16:30:53', '2018-09-25 11:00:53', '2018-09-25 11:00:53'),
(92, 'gave rating to the store', 'rating', 12, 0, 0, 3, NULL, NULL, '2018-09-25', '16:31:00', '2018-09-25 11:01:00', '2018-09-25 11:01:00'),
(93, '50% OFF on bookmyshow', 'redeem_coupon', 0, 2, 0, 10, NULL, NULL, '2018-09-25', '16:32:42', '2018-09-25 11:02:42', '2018-09-25 11:02:42'),
(94, '50% OFF on bookmyshow', 'redeem_coupon', 0, 2, 0, 10, NULL, NULL, '2018-09-25', '16:32:49', '2018-09-25 11:02:49', '2018-09-25 11:02:49'),
(95, 'convert to paytm', 'convert_to_paytm', 0, 4, 0, 10, NULL, NULL, '2018-09-25', '16:36:03', '2018-09-25 11:06:03', '2018-09-25 11:06:03'),
(96, 'Mcdonald', 'redeem_coupon', 0, 4, 0, 10, NULL, NULL, '2018-09-25', '16:37:25', '2018-09-25 11:07:25', '2018-09-25 11:07:25'),
(97, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-09-25', '16:39:42', '2018-09-25 11:09:42', '2018-09-25 11:09:42'),
(98, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-09-25', '16:44:00', '2018-09-25 11:14:00', '2018-09-25 11:14:00'),
(99, 'favorited an offer ', 'favorite_offer', 19, 12, 19, 2, NULL, NULL, '2018-09-25', '17:10:52', '2018-09-25 11:40:52', '2018-09-25 11:40:52'),
(100, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-09-25', '18:05:43', '2018-09-25 12:35:43', '2018-09-25 12:35:43'),
(101, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-09-26', '00:04:01', '2018-09-25 18:34:01', '2018-09-25 18:34:01'),
(102, 'shared an offer of', 'share', 7, 5, 0, 4, NULL, NULL, '2018-09-26', '00:05:30', '2018-09-25 18:35:30', '2018-09-25 18:35:30'),
(103, 'gave rating to the store', 'rating', 7, 0, 0, 4, NULL, NULL, '2018-09-26', '00:05:49', '2018-09-25 18:35:49', '2018-09-25 18:35:49'),
(104, 'shared an offer of', 'share', 7, 5, 0, 4, NULL, NULL, '2018-09-26', '00:08:21', '2018-09-25 18:38:21', '2018-09-25 18:38:21'),
(105, 'favorited a store ', 'favorite_store', 14, 0, 14, 3, NULL, NULL, '2018-09-26', '11:41:46', '2018-09-26 06:11:46', '2018-09-26 06:11:46'),
(106, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-09-26', '11:50:27', '2018-09-26 06:20:27', '2018-09-26 06:20:27'),
(107, 'shared an offer of', 'share', 9, 2, 0, 4, NULL, NULL, '2018-09-26', '12:04:42', '2018-09-26 06:34:42', '2018-09-26 06:34:42'),
(108, 'walkin points added', 'walkin points', 9, 0, 9, 3, NULL, NULL, '2018-09-26', '13:09:23', '2018-09-26 07:39:23', '2018-09-26 07:39:23'),
(109, 'walkin points added', 'walkin points', 9, 0, 9, 8, NULL, NULL, '2018-09-26', '13:11:22', '2018-09-26 07:41:22', '2018-09-26 07:41:22'),
(110, 'walkin points added', 'walkin points', 9, 0, 9, 13, NULL, NULL, '2018-09-26', '13:12:04', '2018-09-26 07:42:04', '2018-09-26 07:42:04'),
(111, 'walkin points added', 'walkin points', 9, 0, 9, 7, NULL, NULL, '2018-09-26', '13:16:18', '2018-09-26 07:46:18', '2018-09-26 07:46:18'),
(112, 'walkin points added', 'walkin points', 9, 0, 9, 2, NULL, NULL, '2018-09-26', '13:27:09', '2018-09-26 07:57:09', '2018-09-26 07:57:09'),
(113, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2018-09-26', '13:56:22', '2018-09-26 08:26:22', '2018-09-26 08:26:22'),
(114, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-09-26', '15:47:36', '2018-09-26 10:17:36', '2018-09-26 10:17:36'),
(115, 'walkin points added', 'walkin points', 9, 0, 9, 10, NULL, NULL, '2018-09-26', '16:15:00', '2018-09-26 10:45:00', '2018-09-26 10:45:00'),
(116, 'CCD', 'redeem_coupon', 0, 3, 0, 2, NULL, NULL, '2018-09-26', '16:17:18', '2018-09-26 10:47:18', '2018-09-26 10:47:18'),
(117, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2018-09-26', '16:32:53', '2018-09-26 11:02:53', '2018-09-26 11:02:53'),
(118, 'favorited an offer ', 'favorite_offer', 8, 1, 8, 7, NULL, NULL, '2018-09-26', '16:49:23', '2018-09-26 11:19:23', '2018-09-26 11:19:23'),
(119, 'shared an offer of', 'share', 8, 1, 0, 7, NULL, NULL, '2018-09-26', '16:50:56', '2018-09-26 11:20:56', '2018-09-26 11:20:56'),
(120, 'gave rating to the store', 'rating', 8, 0, 0, 7, NULL, NULL, '2018-09-26', '16:52:44', '2018-09-26 11:22:44', '2018-09-26 11:22:44'),
(121, 'favorited a store ', 'favorite_store', 7, 0, 7, 7, NULL, NULL, '2018-09-26', '16:55:04', '2018-09-26 11:25:04', '2018-09-26 11:25:04'),
(122, 'favorited a store ', 'favorite_store', 8, 0, 8, 7, NULL, NULL, '2018-09-26', '16:55:08', '2018-09-26 11:25:08', '2018-09-26 11:25:08'),
(123, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-09-26', '17:05:24', '2018-09-26 11:35:24', '2018-09-26 11:35:24'),
(124, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:24:23', '2018-09-26 11:54:23', '2018-09-26 11:54:23'),
(125, '70-80 % OFF on amazon', 'redeem_coupon', 0, 6, 0, 2, NULL, NULL, '2018-09-26', '17:24:35', '2018-09-26 11:54:35', '2018-09-26 11:54:35'),
(126, '60 % OFF on drinks and deserts ', 'redeem_coupon', 0, 7, 0, 2, NULL, NULL, '2018-09-26', '17:24:52', '2018-09-26 11:54:52', '2018-09-26 11:54:52'),
(127, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:25:06', '2018-09-26 11:55:06', '2018-09-26 11:55:06'),
(128, '60 % OFF on drinks and deserts ', 'redeem_coupon', 0, 7, 0, 7, NULL, NULL, '2018-09-26', '17:25:24', '2018-09-26 11:55:24', '2018-09-26 11:55:24'),
(129, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:25:45', '2018-09-26 11:55:45', '2018-09-26 11:55:45'),
(130, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:26:25', '2018-09-26 11:56:25', '2018-09-26 11:56:25'),
(131, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:26:40', '2018-09-26 11:56:40', '2018-09-26 11:56:40'),
(132, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:26:53', '2018-09-26 11:56:53', '2018-09-26 11:56:53'),
(133, 'CCD', 'redeem_coupon', 0, 3, 0, 7, NULL, NULL, '2018-09-26', '17:27:09', '2018-09-26 11:57:09', '2018-09-26 11:57:09'),
(134, 'convert to paytm', 'convert_to_paytm', 0, 5, 0, 4, NULL, NULL, '2018-09-26', '17:27:24', '2018-09-26 11:57:24', '2018-09-26 11:57:24'),
(135, 'convert to paytm', 'convert_to_paytm', 0, 6, 0, 7, NULL, NULL, '2018-09-26', '17:27:39', '2018-09-26 11:57:39', '2018-09-26 11:57:39'),
(136, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-09-26', '18:02:00', '2018-09-26 12:32:00', '2018-09-26 12:32:00'),
(137, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-09-26', '18:40:45', '2018-09-26 13:10:45', '2018-09-26 13:10:45'),
(138, 'shared an offer of', 'share', 10, 14, 0, 4, NULL, NULL, '2018-09-26', '20:30:58', '2018-09-26 15:00:58', '2018-09-26 15:00:58'),
(139, 'gave rating to the store', 'rating', 10, 0, 0, 4, NULL, NULL, '2018-09-26', '20:31:10', '2018-09-26 15:01:10', '2018-09-26 15:01:10'),
(140, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-09-27', '00:11:37', '2018-09-26 18:41:37', '2018-09-26 18:41:37'),
(141, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-09-27', '11:49:20', '2018-09-27 06:19:20', '2018-09-27 06:19:20'),
(142, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-09-27', '12:13:17', '2018-09-27 06:43:17', '2018-09-27 06:43:17'),
(143, 'walkin points added', 'walkin points', 8, 0, 8, 13, NULL, NULL, '2018-09-27', '15:25:29', '2018-09-27 09:55:29', '2018-09-27 09:55:29'),
(144, 'walkin points added', 'walkin points', 9, 0, 9, 8, NULL, NULL, '2018-09-27', '15:33:07', '2018-09-27 10:03:07', '2018-09-27 10:03:07'),
(145, 'walkin points added', 'walkin points', 9, 0, 9, 13, NULL, NULL, '2018-09-27', '16:03:08', '2018-09-27 10:33:08', '2018-09-27 10:33:08'),
(146, 'walkin points added', 'walkin points', 8, 0, 8, 9, NULL, NULL, '2018-09-27', '16:22:33', '2018-09-27 10:52:33', '2018-09-27 10:52:33'),
(147, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-09-27', '16:43:13', '2018-09-27 11:13:13', '2018-09-27 11:13:13'),
(148, 'walkin points added', 'walkin points', 9, 0, 9, 10, NULL, NULL, '2018-09-27', '17:09:12', '2018-09-27 11:39:12', '2018-09-27 11:39:12'),
(149, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-09-27', '18:08:57', '2018-09-27 12:38:57', '2018-09-27 12:38:57'),
(150, 'favorited a store ', 'favorite_store', 8, 0, 8, 7, NULL, NULL, '2018-09-27', '18:47:15', '2018-09-27 13:17:15', '2018-09-27 13:17:15'),
(151, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-09-27', '19:01:10', '2018-09-27 13:31:10', '2018-09-27 13:31:10'),
(152, 'walkin points added', 'walkin points', 20, 0, 20, 4, NULL, NULL, '2018-09-27', '19:53:56', '2018-09-27 14:23:56', '2018-09-27 14:23:56'),
(153, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-09-28', '11:12:59', '2018-09-28 05:42:59', '2018-09-28 05:42:59'),
(154, 'favorited a store ', 'favorite_store', 8, 0, 8, 2, NULL, NULL, '2018-09-28', '11:53:32', '2018-09-28 06:23:32', '2018-09-28 06:23:32'),
(155, 'favorited a store ', 'favorite_store', 8, 0, 8, 2, NULL, NULL, '2018-09-28', '11:54:36', '2018-09-28 06:24:36', '2018-09-28 06:24:36'),
(156, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 2, NULL, NULL, '2018-09-28', '11:57:31', '2018-09-28 06:27:31', '2018-09-28 06:27:31'),
(157, 'favorited an offer ', 'favorite_offer', 12, 9, 12, 2, NULL, NULL, '2018-09-28', '11:58:23', '2018-09-28 06:28:23', '2018-09-28 06:28:23'),
(158, 'favorited an offer ', 'favorite_offer', 19, 12, 19, 2, NULL, NULL, '2018-09-28', '12:05:46', '2018-09-28 06:35:46', '2018-09-28 06:35:46'),
(159, 'favorited an offer ', 'favorite_offer', 8, 1, 8, 6, NULL, NULL, '2018-09-28', '12:10:56', '2018-09-28 06:40:56', '2018-09-28 06:40:56'),
(160, 'favorited an offer ', 'favorite_offer', 7, 5, 7, 6, NULL, NULL, '2018-09-28', '12:12:00', '2018-09-28 06:42:00', '2018-09-28 06:42:00'),
(161, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 6, NULL, NULL, '2018-09-28', '12:14:11', '2018-09-28 06:44:11', '2018-09-28 06:44:11'),
(162, 'favorited an offer ', 'favorite_offer', 8, 6, 8, 6, NULL, NULL, '2018-09-28', '12:14:30', '2018-09-28 06:44:30', '2018-09-28 06:44:30'),
(163, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 6, NULL, NULL, '2018-09-28', '12:17:31', '2018-09-28 06:47:31', '2018-09-28 06:47:31'),
(164, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 6, NULL, NULL, '2018-09-28', '12:17:38', '2018-09-28 06:47:38', '2018-09-28 06:47:38'),
(165, 'favorited an offer ', 'favorite_offer', 8, 1, 8, 6, NULL, NULL, '2018-09-28', '12:17:42', '2018-09-28 06:47:42', '2018-09-28 06:47:42'),
(166, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 6, NULL, NULL, '2018-09-28', '12:17:54', '2018-09-28 06:47:54', '2018-09-28 06:47:54'),
(167, 'favorited an offer ', 'favorite_offer', 9, 2, 9, 6, NULL, NULL, '2018-09-28', '12:17:59', '2018-09-28 06:47:59', '2018-09-28 06:47:59'),
(168, 'favorited an offer ', 'favorite_offer', 10, 14, 10, 6, NULL, NULL, '2018-09-28', '12:18:11', '2018-09-28 06:48:11', '2018-09-28 06:48:11'),
(169, 'favorited an offer ', 'favorite_offer', 10, 14, 10, 6, NULL, NULL, '2018-09-28', '12:18:16', '2018-09-28 06:48:16', '2018-09-28 06:48:16'),
(170, 'favorited an offer ', 'favorite_offer', 12, 9, 12, 6, NULL, NULL, '2018-09-28', '12:18:21', '2018-09-28 06:48:21', '2018-09-28 06:48:21'),
(171, 'favorited an offer ', 'favorite_offer', 19, 12, 19, 6, NULL, NULL, '2018-09-28', '12:18:26', '2018-09-28 06:48:26', '2018-09-28 06:48:26'),
(172, 'favorited an offer ', 'favorite_offer', 14, 13, 14, 6, NULL, NULL, '2018-09-28', '12:18:32', '2018-09-28 06:48:32', '2018-09-28 06:48:32'),
(173, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 2, NULL, NULL, '2018-09-28', '12:24:45', '2018-09-28 06:54:45', '2018-09-28 06:54:45'),
(174, 'favorited an offer ', 'favorite_offer', 9, 2, 9, 2, NULL, NULL, '2018-09-28', '12:24:49', '2018-09-28 06:54:49', '2018-09-28 06:54:49'),
(175, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-09-28', '12:46:04', '2018-09-28 07:16:04', '2018-09-28 07:16:04'),
(176, 'walkin points added', 'walkin points', 9, 0, 9, 2, NULL, NULL, '2018-09-28', '12:52:00', '2018-09-28 07:22:00', '2018-09-28 07:22:00'),
(177, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2018-09-28', '13:02:23', '2018-09-28 07:32:23', '2018-09-28 07:32:23'),
(178, 'walkin points added', 'walkin points', 9, 0, 9, 3, NULL, NULL, '2018-09-28', '13:04:18', '2018-09-28 07:34:18', '2018-09-28 07:34:18'),
(179, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-09-28', '13:14:59', '2018-09-28 07:44:59', '2018-09-28 07:44:59'),
(180, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2018-09-28', '13:46:30', '2018-09-28 08:16:30', '2018-09-28 08:16:30'),
(181, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-09-28', '17:01:20', '2018-09-28 11:31:20', '2018-09-28 11:31:20'),
(182, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-09-28', '17:28:10', '2018-09-28 11:58:10', '2018-09-28 11:58:10'),
(183, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-09-28', '19:28:47', '2018-09-28 13:58:47', '2018-09-28 13:58:47'),
(184, 'walkin points added', 'walkin points', 9, 0, 9, 14, NULL, NULL, '2018-09-29', '15:48:18', '2018-09-29 10:18:18', '2018-09-29 10:18:18'),
(185, 'walkin points added', 'walkin points', 9, 0, 9, 15, NULL, NULL, '2018-09-29', '15:52:35', '2018-09-29 10:22:35', '2018-09-29 10:22:35'),
(186, 'walkin points added', 'walkin points', 20, 0, 20, 17, NULL, NULL, '2018-09-29', '18:58:30', '2018-09-29 13:28:30', '2018-09-29 13:28:30'),
(187, 'shared an offer of', 'share', 10, 14, 0, 4, NULL, NULL, '2018-09-29', '21:45:12', '2018-09-29 16:15:12', '2018-09-29 16:15:12'),
(188, 'walkin points added', 'walkin points', 20, 0, 20, 17, NULL, NULL, '2018-09-30', '23:34:32', '2018-09-30 18:04:32', '2018-09-30 18:04:32'),
(189, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-01', '11:10:59', '2018-10-01 05:40:59', '2018-10-01 05:40:59'),
(190, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-01', '12:23:47', '2018-10-01 06:53:47', '2018-10-01 06:53:47'),
(191, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-01', '12:24:41', '2018-10-01 06:54:41', '2018-10-01 06:54:41'),
(192, 'favorited an offer ', 'favorite_offer', 8, 1, 8, 2, NULL, NULL, '2018-10-01', '12:26:16', '2018-10-01 06:56:16', '2018-10-01 06:56:16'),
(193, 'shared an offer of', 'share', 8, 4, 0, 2, NULL, NULL, '2018-10-01', '12:26:33', '2018-10-01 06:56:33', '2018-10-01 06:56:33'),
(194, 'walkin points added', 'walkin points', 8, 0, 8, 13, NULL, NULL, '2018-10-01', '17:16:34', '2018-10-01 11:46:34', '2018-10-01 11:46:34'),
(195, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-01', '18:06:58', '2018-10-01 12:36:58', '2018-10-01 12:36:58'),
(196, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2018-10-01', '18:10:47', '2018-10-01 12:40:47', '2018-10-01 12:40:47'),
(197, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-01', '18:46:30', '2018-10-01 13:16:30', '2018-10-01 13:16:30'),
(198, 'walkin points added', 'walkin points', 10, 0, 10, 15, NULL, NULL, '2018-10-02', '01:06:17', '2018-10-01 19:36:17', '2018-10-01 19:36:17'),
(199, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-02', '11:26:25', '2018-10-02 05:56:25', '2018-10-02 05:56:25'),
(200, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-02', '12:39:26', '2018-10-02 07:09:26', '2018-10-02 07:09:26'),
(201, 'walkin points added', 'walkin points', 9, 0, 9, 3, NULL, NULL, '2018-10-02', '13:33:33', '2018-10-02 08:03:33', '2018-10-02 08:03:33'),
(202, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-02', '14:18:14', '2018-10-02 08:48:14', '2018-10-02 08:48:14'),
(203, 'shared an offer of', 'share', 8, 17, 0, 2, NULL, NULL, '2018-10-02', '17:54:25', '2018-10-02 12:24:25', '2018-10-02 12:24:25'),
(204, 'shared an offer of', 'share', 8, 17, 0, 2, NULL, NULL, '2018-10-02', '17:54:58', '2018-10-02 12:24:58', '2018-10-02 12:24:58'),
(205, 'shared an offer of', 'share', 8, 17, 0, 4, NULL, NULL, '2018-10-02', '17:57:01', '2018-10-02 12:27:01', '2018-10-02 12:27:01'),
(206, 'gave rating to the store', 'rating', 8, 0, 0, 4, NULL, NULL, '2018-10-02', '17:57:42', '2018-10-02 12:27:42', '2018-10-02 12:27:42'),
(207, 'shared an offer of', 'share', 8, 17, 0, 4, NULL, NULL, '2018-10-02', '17:58:13', '2018-10-02 12:28:13', '2018-10-02 12:28:13'),
(208, 'shared an offer of', 'share', 8, 17, 0, 3, NULL, NULL, '2018-10-02', '17:58:17', '2018-10-02 12:28:17', '2018-10-02 12:28:17'),
(209, 'shared an offer of', 'share', 8, 17, 0, 3, NULL, NULL, '2018-10-02', '17:58:32', '2018-10-02 12:28:32', '2018-10-02 12:28:32'),
(210, 'shared an offer of', 'share', 8, 17, 0, 6, NULL, NULL, '2018-10-02', '18:00:29', '2018-10-02 12:30:30', '2018-10-02 12:30:30'),
(211, 'shared an offer of', 'share', 8, 17, 0, 10, NULL, NULL, '2018-10-02', '18:04:21', '2018-10-02 12:34:21', '2018-10-02 12:34:21'),
(212, 'shared an offer of', 'share', 8, 17, 0, 8, NULL, NULL, '2018-10-02', '18:08:41', '2018-10-02 12:38:41', '2018-10-02 12:38:41'),
(213, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-02', '18:20:55', '2018-10-02 12:50:55', '2018-10-02 12:50:55'),
(214, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-10-02', '18:30:56', '2018-10-02 13:00:56', '2018-10-02 13:00:56'),
(215, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-02', '21:20:32', '2018-10-02 15:50:32', '2018-10-02 15:50:32'),
(216, 'walkin points added', 'walkin points', 20, 0, 20, 17, NULL, NULL, '2018-10-02', '22:38:51', '2018-10-02 17:08:51', '2018-10-02 17:08:51'),
(217, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2018-10-03', '09:49:39', '2018-10-03 04:19:39', '2018-10-03 04:19:39'),
(218, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-03', '11:32:35', '2018-10-03 06:02:35', '2018-10-03 06:02:35'),
(219, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-03', '15:12:05', '2018-10-03 09:42:05', '2018-10-03 09:42:05'),
(220, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-03', '16:33:07', '2018-10-03 11:03:07', '2018-10-03 11:03:07'),
(221, 'walkin points added', 'walkin points', 8, 0, 8, 9, NULL, NULL, '2018-10-03', '16:40:48', '2018-10-03 11:10:48', '2018-10-03 11:10:48'),
(222, 'favorited a store ', 'favorite_store', 13, 0, 13, 6, NULL, NULL, '2018-10-03', '23:40:03', '2018-10-03 18:10:03', '2018-10-03 18:10:03'),
(223, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2018-10-04', '11:27:36', '2018-10-04 05:57:36', '2018-10-04 05:57:36'),
(224, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-04', '12:32:38', '2018-10-04 07:02:38', '2018-10-04 07:02:38'),
(225, 'walkin points added', 'walkin points', 9, 0, 9, 3, NULL, NULL, '2018-10-04', '14:43:28', '2018-10-04 09:13:28', '2018-10-04 09:13:28'),
(226, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-04', '14:54:36', '2018-10-04 09:24:36', '2018-10-04 09:24:36'),
(227, 'favorited an offer ', 'favorite_offer', 14, 13, 14, 2, NULL, NULL, '2018-10-04', '15:19:03', '2018-10-04 09:49:03', '2018-10-04 09:49:03'),
(228, 'shared an offer of', 'share', 14, 13, 0, 2, NULL, NULL, '2018-10-04', '15:22:01', '2018-10-04 09:52:01', '2018-10-04 09:52:01'),
(229, '60 % OFF on drinks and deserts ', 'redeem_coupon', 0, 7, 0, 2, NULL, NULL, '2018-10-04', '15:54:02', '2018-10-04 10:24:02', '2018-10-04 10:24:02'),
(230, 'convert to paytm', 'convert_to_paytm', 0, 9, 0, 2, NULL, NULL, '2018-10-04', '15:56:36', '2018-10-04 10:26:36', '2018-10-04 10:26:36'),
(231, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-04', '16:11:26', '2018-10-04 10:41:26', '2018-10-04 10:41:26'),
(232, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-04', '17:03:28', '2018-10-04 11:33:28', '2018-10-04 11:33:28'),
(233, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2018-10-04', '17:20:30', '2018-10-04 11:50:30', '2018-10-04 11:50:30'),
(234, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-04', '18:50:09', '2018-10-04 13:20:09', '2018-10-04 13:20:09'),
(235, 'walkin points added', 'walkin points', 20, 0, 20, 17, NULL, NULL, '2018-10-04', '22:33:09', '2018-10-04 17:03:09', '2018-10-04 17:03:09'),
(236, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-05', '14:18:04', '2018-10-05 08:48:04', '2018-10-05 08:48:04'),
(237, 'favorited an offer ', 'favorite_offer', 8, 1, 8, 2, NULL, NULL, '2018-10-05', '15:23:41', '2018-10-05 09:53:41', '2018-10-05 09:53:41'),
(238, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-05', '15:34:14', '2018-10-05 10:04:14', '2018-10-05 10:04:14'),
(239, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-05', '16:52:44', '2018-10-05 11:22:44', '2018-10-05 11:22:44'),
(240, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-05', '17:23:52', '2018-10-05 11:53:52', '2018-10-05 11:53:52'),
(241, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-05', '20:52:15', '2018-10-05 15:22:15', '2018-10-05 15:22:15'),
(242, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2018-10-06', '03:48:29', '2018-10-05 22:18:29', '2018-10-05 22:18:29'),
(243, 'favorited a store ', 'favorite_store', 6, 0, 6, 4, NULL, NULL, '2018-10-06', '18:22:50', '2018-10-06 12:52:50', '2018-10-06 12:52:50'),
(244, 'shared an offer of', 'share', 8, 7, 0, 4, NULL, NULL, '2018-10-06', '22:07:22', '2018-10-06 16:37:22', '2018-10-06 16:37:22'),
(245, 'shared an offer of', 'share', 8, 7, 0, 4, NULL, NULL, '2018-10-06', '22:07:42', '2018-10-06 16:37:42', '2018-10-06 16:37:42'),
(246, 'shared an offer of', 'share', 7, 19, 0, 4, NULL, NULL, '2018-10-06', '22:09:39', '2018-10-06 16:39:39', '2018-10-06 16:39:39'),
(247, 'shared an offer of', 'share', 7, 19, 0, 4, NULL, NULL, '2018-10-06', '22:09:56', '2018-10-06 16:39:56', '2018-10-06 16:39:56'),
(248, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-07', '01:25:00', '2018-10-06 19:55:00', '2018-10-06 19:55:00'),
(249, 'walkin points added', 'walkin points', 20, 0, 20, 17, NULL, NULL, '2018-10-07', '10:42:17', '2018-10-07 05:12:17', '2018-10-07 05:12:17'),
(250, 'shared an offer of', 'share', 20, 16, 0, 17, NULL, NULL, '2018-10-07', '12:32:50', '2018-10-07 07:02:50', '2018-10-07 07:02:50'),
(251, 'gave rating to the store', 'rating', 20, 0, 0, 17, NULL, NULL, '2018-10-07', '12:33:01', '2018-10-07 07:03:01', '2018-10-07 07:03:01'),
(252, 'shared an offer of', 'share', 14, 13, 0, 4, NULL, NULL, '2018-10-07', '12:42:38', '2018-10-07 07:12:38', '2018-10-07 07:12:38'),
(253, 'gave rating to the store', 'rating', 15, 0, 0, 4, NULL, NULL, '2018-10-07', '12:42:44', '2018-10-07 07:12:44', '2018-10-07 07:12:44'),
(254, 'shared an offer of', 'share', 14, 13, 0, 4, NULL, NULL, '2018-10-07', '12:43:39', '2018-10-07 07:13:39', '2018-10-07 07:13:39'),
(255, 'gave rating to the store', 'rating', 15, 0, 0, 4, NULL, NULL, '2018-10-07', '12:43:45', '2018-10-07 07:13:45', '2018-10-07 07:13:45'),
(256, 'walkin points added', 'walkin points', 20, 0, 20, 18, NULL, NULL, '2018-10-07', '22:00:00', '2018-10-07 16:30:00', '2018-10-07 16:30:00'),
(257, 'walkin points added', 'walkin points', 20, 0, 20, 4, NULL, NULL, '2018-10-07', '22:07:51', '2018-10-07 16:37:51', '2018-10-07 16:37:51'),
(258, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2018-10-08', '00:39:29', '2018-10-07 19:09:29', '2018-10-07 19:09:29'),
(259, 'walkin points added', 'walkin points', 10, 0, 10, 15, NULL, NULL, '2018-10-08', '01:01:01', '2018-10-07 19:31:01', '2018-10-07 19:31:01'),
(260, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-08', '10:38:50', '2018-10-08 05:08:50', '2018-10-08 05:08:50'),
(261, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-08', '10:49:14', '2018-10-08 05:19:14', '2018-10-08 05:19:14'),
(262, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-08', '11:07:16', '2018-10-08 05:37:16', '2018-10-08 05:37:16'),
(263, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-08', '13:03:02', '2018-10-08 07:33:02', '2018-10-08 07:33:02'),
(264, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-08', '13:07:06', '2018-10-08 07:37:06', '2018-10-08 07:37:06'),
(265, 'shared an offer of', 'share', 7, 5, 0, 2, NULL, NULL, '2018-10-08', '14:50:02', '2018-10-08 09:20:02', '2018-10-08 09:20:02'),
(266, 'gave rating to the store', 'rating', 7, 0, 0, 2, NULL, NULL, '2018-10-08', '14:50:07', '2018-10-08 09:20:07', '2018-10-08 09:20:07'),
(267, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-09', '11:30:56', '2018-10-09 06:00:56', '2018-10-09 06:00:56'),
(268, 'shared an offer of', 'share', 7, 19, 0, 2, NULL, NULL, '2018-10-09', '11:34:43', '2018-10-09 06:04:43', '2018-10-09 06:04:43'),
(269, 'shared an offer of', 'share', 7, 19, 0, 2, NULL, NULL, '2018-10-09', '11:35:02', '2018-10-09 06:05:02', '2018-10-09 06:05:02'),
(270, 'shared an offer of', 'share', 7, 20, 0, 2, NULL, NULL, '2018-10-09', '11:35:12', '2018-10-09 06:05:12', '2018-10-09 06:05:12'),
(271, 'shared an offer of', 'share', 7, 20, 0, 2, NULL, NULL, '2018-10-09', '11:35:22', '2018-10-09 06:05:22', '2018-10-09 06:05:22'),
(272, 'shared an offer of', 'share', 7, 21, 0, 2, NULL, NULL, '2018-10-09', '11:35:31', '2018-10-09 06:05:31', '2018-10-09 06:05:31'),
(273, 'shared an offer of', 'share', 7, 21, 0, 2, NULL, NULL, '2018-10-09', '11:35:44', '2018-10-09 06:05:44', '2018-10-09 06:05:44'),
(274, 'shared an offer of', 'share', 7, 22, 0, 2, NULL, NULL, '2018-10-09', '11:35:57', '2018-10-09 06:05:57', '2018-10-09 06:05:57'),
(275, 'shared an offer of', 'share', 7, 22, 0, 2, NULL, NULL, '2018-10-09', '11:36:08', '2018-10-09 06:06:08', '2018-10-09 06:06:08'),
(276, 'shared an offer of', 'share', 7, 23, 0, 2, NULL, NULL, '2018-10-09', '11:36:27', '2018-10-09 06:06:27', '2018-10-09 06:06:27'),
(277, 'shared an offer of', 'share', 7, 23, 0, 2, NULL, NULL, '2018-10-09', '11:36:37', '2018-10-09 06:06:37', '2018-10-09 06:06:37'),
(278, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-09', '11:49:59', '2018-10-09 06:19:59', '2018-10-09 06:19:59'),
(279, 'shared an offer of', 'share', 7, 23, 0, 3, NULL, NULL, '2018-10-09', '11:50:52', '2018-10-09 06:20:52', '2018-10-09 06:20:52'),
(280, 'shared an offer of', 'share', 7, 22, 0, 3, NULL, NULL, '2018-10-09', '11:51:05', '2018-10-09 06:21:05', '2018-10-09 06:21:05'),
(281, 'shared an offer of', 'share', 7, 20, 0, 3, NULL, NULL, '2018-10-09', '11:51:21', '2018-10-09 06:21:21', '2018-10-09 06:21:21'),
(282, 'shared an offer of', 'share', 7, 23, 0, 3, NULL, NULL, '2018-10-09', '11:53:23', '2018-10-09 06:23:23', '2018-10-09 06:23:23'),
(283, 'shared an offer of', 'share', 7, 22, 0, 3, NULL, NULL, '2018-10-09', '11:53:36', '2018-10-09 06:23:36', '2018-10-09 06:23:36'),
(284, 'shared an offer of', 'share', 7, 20, 0, 3, NULL, NULL, '2018-10-09', '11:53:56', '2018-10-09 06:23:56', '2018-10-09 06:23:56'),
(285, 'shared an offer of', 'share', 7, 19, 0, 3, NULL, NULL, '2018-10-09', '11:54:25', '2018-10-09 06:24:25', '2018-10-09 06:24:25'),
(286, 'shared an offer of', 'share', 7, 19, 0, 3, NULL, NULL, '2018-10-09', '11:54:35', '2018-10-09 06:24:35', '2018-10-09 06:24:35'),
(287, 'shared an offer of', 'share', 7, 21, 0, 3, NULL, NULL, '2018-10-09', '12:17:08', '2018-10-09 06:47:08', '2018-10-09 06:47:08'),
(288, 'shared an offer of', 'share', 7, 21, 0, 3, NULL, NULL, '2018-10-09', '12:17:18', '2018-10-09 06:47:18', '2018-10-09 06:47:18'),
(289, 'shared an offer of', 'share', 7, 23, 0, 4, NULL, NULL, '2018-10-09', '12:27:41', '2018-10-09 06:57:41', '2018-10-09 06:57:41'),
(290, 'shared an offer of', 'share', 7, 23, 0, 4, NULL, NULL, '2018-10-09', '12:29:37', '2018-10-09 06:59:37', '2018-10-09 06:59:37'),
(291, 'shared an offer of', 'share', 7, 23, 0, 6, NULL, NULL, '2018-10-09', '12:29:39', '2018-10-09 06:59:39', '2018-10-09 06:59:39'),
(292, 'shared an offer of', 'share', 7, 23, 0, 6, NULL, NULL, '2018-10-09', '12:30:05', '2018-10-09 07:00:05', '2018-10-09 07:00:05'),
(293, 'shared an offer of', 'share', 7, 22, 0, 6, NULL, NULL, '2018-10-09', '12:30:50', '2018-10-09 07:00:50', '2018-10-09 07:00:50'),
(294, 'shared an offer of', 'share', 7, 22, 0, 4, NULL, NULL, '2018-10-09', '12:31:06', '2018-10-09 07:01:06', '2018-10-09 07:01:06'),
(295, 'shared an offer of', 'share', 7, 22, 0, 6, NULL, NULL, '2018-10-09', '12:31:09', '2018-10-09 07:01:09', '2018-10-09 07:01:09'),
(296, 'shared an offer of', 'share', 7, 22, 0, 4, NULL, NULL, '2018-10-09', '12:31:19', '2018-10-09 07:01:19', '2018-10-09 07:01:19'),
(297, 'shared an offer of', 'share', 7, 20, 0, 6, NULL, NULL, '2018-10-09', '12:32:05', '2018-10-09 07:02:05', '2018-10-09 07:02:05'),
(298, 'shared an offer of', 'share', 7, 20, 0, 6, NULL, NULL, '2018-10-09', '12:32:32', '2018-10-09 07:02:32', '2018-10-09 07:02:32'),
(299, 'gave rating to the store', 'rating', 7, 0, 0, 6, NULL, NULL, '2018-10-09', '12:32:36', '2018-10-09 07:02:36', '2018-10-09 07:02:36'),
(300, 'shared an offer of', 'share', 7, 19, 0, 6, NULL, NULL, '2018-10-09', '12:32:49', '2018-10-09 07:02:49', '2018-10-09 07:02:49'),
(301, 'gave rating to the store', 'rating', 7, 0, 0, 6, NULL, NULL, '2018-10-09', '12:33:03', '2018-10-09 07:03:03', '2018-10-09 07:03:03'),
(302, 'shared an offer of', 'share', 7, 19, 0, 6, NULL, NULL, '2018-10-09', '12:33:27', '2018-10-09 07:03:27', '2018-10-09 07:03:27'),
(303, 'shared an offer of', 'share', 7, 20, 0, 4, NULL, NULL, '2018-10-09', '12:35:24', '2018-10-09 07:05:24', '2018-10-09 07:05:24'),
(304, 'shared an offer of', 'share', 7, 20, 0, 4, NULL, NULL, '2018-10-09', '12:35:39', '2018-10-09 07:05:39', '2018-10-09 07:05:39'),
(305, 'shared an offer of', 'share', 7, 21, 0, 6, NULL, NULL, '2018-10-09', '12:35:58', '2018-10-09 07:05:58', '2018-10-09 07:05:58'),
(306, 'shared an offer of', 'share', 7, 21, 0, 6, NULL, NULL, '2018-10-09', '12:36:22', '2018-10-09 07:06:22', '2018-10-09 07:06:22'),
(307, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-09', '13:15:53', '2018-10-09 07:45:53', '2018-10-09 07:45:53'),
(308, 'walkin points added', 'walkin points', 9, 0, 9, 10, NULL, NULL, '2018-10-09', '13:47:33', '2018-10-09 08:17:33', '2018-10-09 08:17:33'),
(309, 'shared an offer of', 'share', 7, 23, 0, 8, NULL, NULL, '2018-10-09', '15:27:48', '2018-10-09 09:57:48', '2018-10-09 09:57:48'),
(310, 'gave rating to the store', 'rating', 7, 0, 0, 8, NULL, NULL, '2018-10-09', '15:28:04', '2018-10-09 09:58:04', '2018-10-09 09:58:04'),
(311, 'shared an offer of', 'share', 7, 22, 0, 8, NULL, NULL, '2018-10-09', '15:28:23', '2018-10-09 09:58:23', '2018-10-09 09:58:23'),
(312, 'gave rating to the store', 'rating', 7, 0, 0, 8, NULL, NULL, '2018-10-09', '15:28:29', '2018-10-09 09:58:29', '2018-10-09 09:58:29'),
(313, 'shared an offer of', 'share', 7, 20, 0, 8, NULL, NULL, '2018-10-09', '15:28:49', '2018-10-09 09:58:49', '2018-10-09 09:58:49'),
(314, 'gave rating to the store', 'rating', 7, 0, 0, 8, NULL, NULL, '2018-10-09', '15:28:52', '2018-10-09 09:58:52', '2018-10-09 09:58:52'),
(315, 'shared an offer of', 'share', 7, 23, 0, 10, NULL, NULL, '2018-10-09', '15:28:52', '2018-10-09 09:58:52', '2018-10-09 09:58:52'),
(316, 'shared an offer of', 'share', 7, 19, 0, 8, NULL, NULL, '2018-10-09', '15:29:04', '2018-10-09 09:59:04', '2018-10-09 09:59:04'),
(317, 'shared an offer of', 'share', 7, 22, 0, 10, NULL, NULL, '2018-10-09', '15:29:09', '2018-10-09 09:59:09', '2018-10-09 09:59:09'),
(318, 'shared an offer of', 'share', 7, 5, 0, 8, NULL, NULL, '2018-10-09', '15:29:22', '2018-10-09 09:59:22', '2018-10-09 09:59:22'),
(319, 'gave rating to the store', 'rating', 7, 0, 0, 8, NULL, NULL, '2018-10-09', '15:29:25', '2018-10-09 09:59:25', '2018-10-09 09:59:25'),
(320, 'shared an offer of', 'share', 7, 20, 0, 10, NULL, NULL, '2018-10-09', '15:32:03', '2018-10-09 10:02:03', '2018-10-09 10:02:03'),
(321, 'shared an offer of', 'share', 7, 19, 0, 10, NULL, NULL, '2018-10-09', '15:32:35', '2018-10-09 10:02:35', '2018-10-09 10:02:35'),
(322, 'shared an offer of', 'share', 7, 5, 0, 10, NULL, NULL, '2018-10-09', '15:32:53', '2018-10-09 10:02:53', '2018-10-09 10:02:53'),
(323, 'shared an offer of', 'share', 7, 5, 0, 10, NULL, NULL, '2018-10-09', '15:33:15', '2018-10-09 10:03:15', '2018-10-09 10:03:15'),
(324, 'shared an offer of', 'share', 7, 19, 0, 10, NULL, NULL, '2018-10-09', '15:33:40', '2018-10-09 10:03:40', '2018-10-09 10:03:40'),
(325, 'shared an offer of', 'share', 7, 21, 0, 10, NULL, NULL, '2018-10-09', '15:39:09', '2018-10-09 10:09:09', '2018-10-09 10:09:09'),
(326, 'shared an offer of', 'share', 7, 21, 0, 10, NULL, NULL, '2018-10-09', '15:39:22', '2018-10-09 10:09:22', '2018-10-09 10:09:22'),
(327, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2018-10-09', '15:54:58', '2018-10-09 10:24:58', '2018-10-09 10:24:58'),
(328, 'walkin points added', 'walkin points', 8, 0, 8, 13, NULL, NULL, '2018-10-09', '16:55:47', '2018-10-09 11:25:47', '2018-10-09 11:25:47'),
(329, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-10', '12:23:06', '2018-10-10 06:53:06', '2018-10-10 06:53:06'),
(330, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-10', '13:57:28', '2018-10-10 08:27:28', '2018-10-10 08:27:28'),
(331, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-10', '15:03:53', '2018-10-10 09:33:53', '2018-10-10 09:33:53'),
(332, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-10', '17:20:53', '2018-10-10 11:50:53', '2018-10-10 11:50:53'),
(333, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-10-10', '18:06:15', '2018-10-10 12:36:15', '2018-10-10 12:36:15'),
(334, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-10', '20:22:54', '2018-10-10 14:52:54', '2018-10-10 14:52:54'),
(335, 'walkin points added', 'walkin points', 20, 0, 20, 17, NULL, NULL, '2018-10-10', '21:40:18', '2018-10-10 16:10:18', '2018-10-10 16:10:18'),
(336, 'favorited a store ', 'favorite_store', 20, 0, 20, 3, NULL, NULL, '2018-10-11', '15:28:34', '2018-10-11 09:58:34', '2018-10-11 09:58:34'),
(337, 'favorited an offer ', 'favorite_offer', 8, 6, 8, 3, NULL, NULL, '2018-10-11', '15:29:16', '2018-10-11 09:59:16', '2018-10-11 09:59:16'),
(338, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-11', '15:31:25', '2018-10-11 10:01:25', '2018-10-11 10:01:25'),
(339, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-11', '16:06:29', '2018-10-11 10:36:29', '2018-10-11 10:36:29'),
(340, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-11', '17:04:08', '2018-10-11 11:34:08', '2018-10-11 11:34:08'),
(341, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-11', '18:03:16', '2018-10-11 12:33:16', '2018-10-11 12:33:16'),
(342, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-12', '13:58:39', '2018-10-12 08:28:39', '2018-10-12 08:28:39'),
(343, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-12', '16:07:29', '2018-10-12 10:37:29', '2018-10-12 10:37:29'),
(344, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-12', '16:23:02', '2018-10-12 10:53:02', '2018-10-12 10:53:02'),
(345, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2018-10-12', '16:30:16', '2018-10-12 11:00:16', '2018-10-12 11:00:16'),
(346, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-10-12', '16:52:31', '2018-10-12 11:22:31', '2018-10-12 11:22:31'),
(347, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-12', '17:31:11', '2018-10-12 12:01:11', '2018-10-12 12:01:11'),
(348, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-13', '15:12:32', '2018-10-13 09:42:32', '2018-10-13 09:42:32'),
(349, 'shared an offer of', 'share', 9, 2, 0, 4, NULL, NULL, '2018-10-13', '15:15:23', '2018-10-13 09:45:23', '2018-10-13 09:45:23'),
(350, 'gave rating to the store', 'rating', 9, 0, 0, 4, NULL, NULL, '2018-10-13', '15:15:30', '2018-10-13 09:45:30', '2018-10-13 09:45:30'),
(351, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-10-13', '15:21:48', '2018-10-13 09:51:48', '2018-10-13 09:51:48'),
(352, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-14', '01:28:36', '2018-10-13 19:58:36', '2018-10-13 19:58:36'),
(353, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-15', '11:47:08', '2018-10-15 06:17:08', '2018-10-15 06:17:08'),
(354, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-15', '15:26:29', '2018-10-15 09:56:29', '2018-10-15 09:56:29'),
(355, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-15', '15:57:25', '2018-10-15 10:27:25', '2018-10-15 10:27:25'),
(356, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-15', '16:05:44', '2018-10-15 10:35:44', '2018-10-15 10:35:44'),
(357, 'shared an offer of', 'share', 9, 2, 0, 6, NULL, NULL, '2018-10-15', '16:29:14', '2018-10-15 10:59:14', '2018-10-15 10:59:14'),
(358, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-10-15', '16:34:23', '2018-10-15 11:04:23', '2018-10-15 11:04:23'),
(359, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 4, NULL, NULL, '2018-10-15', '16:42:19', '2018-10-15 11:12:19', '2018-10-15 11:12:19');
INSERT INTO `T_ActivityLog` (`activity_log_id`, `activity_name`, `activity_type`, `store_id`, `store_offer_id`, `store`, `user_id`, `respective_id`, `points`, `activity_date`, `activity_time`, `created_date`, `last_updated_date`) VALUES
(360, 'favorited an offer ', 'favorite_offer', 9, 2, 9, 4, NULL, NULL, '2018-10-15', '16:42:29', '2018-10-15 11:12:29', '2018-10-15 11:12:29'),
(361, 'favorited an offer ', 'favorite_offer', 10, 14, 10, 4, NULL, NULL, '2018-10-15', '16:42:42', '2018-10-15 11:12:42', '2018-10-15 11:12:42'),
(362, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 6, NULL, NULL, '2018-10-15', '16:45:18', '2018-10-15 11:15:18', '2018-10-15 11:15:18'),
(363, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 4, NULL, NULL, '2018-10-15', '16:45:24', '2018-10-15 11:15:24', '2018-10-15 11:15:24'),
(364, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 4, NULL, NULL, '2018-10-15', '16:45:39', '2018-10-15 11:15:39', '2018-10-15 11:15:39'),
(365, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 4, NULL, NULL, '2018-10-15', '16:46:58', '2018-10-15 11:16:58', '2018-10-15 11:16:58'),
(366, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 4, NULL, NULL, '2018-10-15', '16:47:09', '2018-10-15 11:17:09', '2018-10-15 11:17:09'),
(367, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 4, NULL, NULL, '2018-10-15', '16:47:20', '2018-10-15 11:17:20', '2018-10-15 11:17:20'),
(368, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 4, NULL, NULL, '2018-10-15', '16:47:50', '2018-10-15 11:17:50', '2018-10-15 11:17:50'),
(369, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 4, NULL, NULL, '2018-10-15', '16:47:54', '2018-10-15 11:17:54', '2018-10-15 11:17:54'),
(370, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 2, NULL, NULL, '2018-10-15', '16:48:55', '2018-10-15 11:18:55', '2018-10-15 11:18:55'),
(371, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-16', '12:47:41', '2018-10-16 07:17:41', '2018-10-16 07:17:41'),
(372, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-16', '15:48:28', '2018-10-16 10:18:28', '2018-10-16 10:18:28'),
(373, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 2, NULL, NULL, '2018-10-16', '16:21:29', '2018-10-16 10:51:29', '2018-10-16 10:51:29'),
(374, 'favorited a store ', 'favorite_store', 9, 0, 9, 2, NULL, NULL, '2018-10-16', '16:21:49', '2018-10-16 10:51:49', '2018-10-16 10:51:49'),
(375, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-16', '16:49:06', '2018-10-16 11:19:06', '2018-10-16 11:19:06'),
(376, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-16', '16:55:38', '2018-10-16 11:25:38', '2018-10-16 11:25:38'),
(377, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-10-16', '17:08:16', '2018-10-16 11:38:16', '2018-10-16 11:38:16'),
(378, 'walkin points added', 'walkin points', 9, 0, 9, 15, NULL, NULL, '2018-10-16', '19:57:27', '2018-10-16 14:27:27', '2018-10-16 14:27:27'),
(379, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-10-16', '20:01:50', '2018-10-16 14:31:50', '2018-10-16 14:31:50'),
(380, 'walkin points added', 'walkin points', 8, 0, 8, 1, NULL, NULL, '2018-10-17', '14:45:11', '2018-10-17 09:15:11', '2018-10-17 09:15:11'),
(381, 'shared an offer of', 'share', 19, 12, 0, 6, NULL, NULL, '2018-10-17', '14:47:34', '2018-10-17 09:17:34', '2018-10-17 09:17:34'),
(382, 'shared an offer of', 'share', 10, 14, 0, 6, NULL, NULL, '2018-10-17', '14:54:42', '2018-10-17 09:24:42', '2018-10-17 09:24:42'),
(383, 'shared an offer of', 'share', 14, 13, 0, 6, NULL, NULL, '2018-10-17', '14:55:11', '2018-10-17 09:25:11', '2018-10-17 09:25:11'),
(384, 'favorited an offer ', 'favorite_offer', 8, 7, 8, 6, NULL, NULL, '2018-10-17', '14:56:13', '2018-10-17 09:26:13', '2018-10-17 09:26:13'),
(385, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-17', '15:23:45', '2018-10-17 09:53:45', '2018-10-17 09:53:45'),
(386, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2018-10-17', '16:30:57', '2018-10-17 11:00:57', '2018-10-17 11:00:57'),
(387, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-17', '16:58:22', '2018-10-17 11:28:22', '2018-10-17 11:28:22'),
(388, 'shared an offer of', 'share', 20, 16, 0, 6, NULL, NULL, '2018-10-17', '17:35:00', '2018-10-17 12:05:00', '2018-10-17 12:05:00'),
(389, 'favorited a store ', 'favorite_store', 19, 0, 19, 6, NULL, NULL, '2018-10-17', '17:37:03', '2018-10-17 12:07:03', '2018-10-17 12:07:03'),
(390, 'favorited a store ', 'favorite_store', 19, 0, 19, 2, NULL, NULL, '2018-10-17', '17:48:35', '2018-10-17 12:18:35', '2018-10-17 12:18:35'),
(391, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-17', '21:14:31', '2018-10-17 15:44:31', '2018-10-17 15:44:31'),
(392, 'walkin points added', 'walkin points', 10, 0, 10, 15, NULL, NULL, '2018-10-18', '00:09:39', '2018-10-17 18:39:39', '2018-10-17 18:39:39'),
(393, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2018-10-18', '00:25:59', '2018-10-17 18:55:59', '2018-10-17 18:55:59'),
(394, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-18', '15:03:24', '2018-10-18 09:33:24', '2018-10-18 09:33:24'),
(395, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-18', '15:14:07', '2018-10-18 09:44:07', '2018-10-18 09:44:07'),
(396, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-19', '11:59:03', '2018-10-19 06:29:03', '2018-10-19 06:29:03'),
(397, 'CCD', 'redeem_coupon', 0, 3, 0, 4, NULL, NULL, '2018-10-19', '17:47:18', '2018-10-19 12:17:18', '2018-10-19 12:17:18'),
(398, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-22', '12:55:17', '2018-10-22 07:25:17', '2018-10-22 07:25:17'),
(399, 'shared an offer of', 'share', 8, 17, 0, 6, NULL, NULL, '2018-10-22', '14:47:35', '2018-10-22 09:17:35', '2018-10-22 09:17:35'),
(400, 'shared an offer of', 'share', 8, 7, 0, 6, NULL, NULL, '2018-10-22', '14:48:13', '2018-10-22 09:18:13', '2018-10-22 09:18:13'),
(401, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2018-10-22', '17:54:57', '2018-10-22 12:24:57', '2018-10-22 12:24:57'),
(402, 'walkin points added', 'walkin points', 9, 0, 9, 14, NULL, NULL, '2018-10-22', '18:05:10', '2018-10-22 12:35:10', '2018-10-22 12:35:10'),
(403, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-22', '18:14:51', '2018-10-22 12:44:51', '2018-10-22 12:44:51'),
(404, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-10-22', '18:55:56', '2018-10-22 13:25:56', '2018-10-22 13:25:56'),
(405, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-23', '11:39:40', '2018-10-23 06:09:40', '2018-10-23 06:09:40'),
(406, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-23', '12:59:56', '2018-10-23 07:29:56', '2018-10-23 07:29:56'),
(407, 'walkin points added', 'walkin points', 9, 0, 9, 10, NULL, NULL, '2018-10-23', '13:24:26', '2018-10-23 07:54:26', '2018-10-23 07:54:26'),
(408, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-23', '14:07:42', '2018-10-23 08:37:42', '2018-10-23 08:37:42'),
(409, 'shared an offer of', 'share', 9, 3, 0, 6, NULL, NULL, '2018-10-23', '15:17:04', '2018-10-23 09:47:04', '2018-10-23 09:47:04'),
(410, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-23', '15:18:44', '2018-10-23 09:48:44', '2018-10-23 09:48:44'),
(411, '60 % OFF on drinks and deserts ', 'redeem_coupon', 0, 7, 0, 6, NULL, NULL, '2018-10-23', '15:25:20', '2018-10-23 09:55:20', '2018-10-23 09:55:20'),
(412, 'walkin points added', 'walkin points', 24, 0, 24, 7, NULL, NULL, '2018-10-24', '10:21:13', '2018-10-24 04:51:13', '2018-10-24 04:51:13'),
(413, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-24', '12:35:58', '2018-10-24 07:05:58', '2018-10-24 07:05:58'),
(414, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-24', '12:50:32', '2018-10-24 07:20:32', '2018-10-24 07:20:32'),
(415, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-10-24', '14:44:32', '2018-10-24 09:14:32', '2018-10-24 09:14:32'),
(416, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-24', '15:05:03', '2018-10-24 09:35:03', '2018-10-24 09:35:03'),
(417, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-24', '16:46:19', '2018-10-24 11:16:19', '2018-10-24 11:16:19'),
(418, 'walkin points added', 'walkin points', 24, 0, 24, 7, NULL, NULL, '2018-10-25', '13:30:15', '2018-10-25 08:00:15', '2018-10-25 08:00:15'),
(419, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-25', '14:31:35', '2018-10-25 09:01:35', '2018-10-25 09:01:35'),
(420, 'shared an offer of', 'share', 14, 13, 0, 6, NULL, NULL, '2018-10-25', '16:29:27', '2018-10-25 10:59:27', '2018-10-25 10:59:27'),
(421, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2018-10-25', '16:30:19', '2018-10-25 11:00:19', '2018-10-25 11:00:19'),
(422, 'shared an offer of', 'share', 8, 17, 0, 1, NULL, NULL, '2018-10-25', '17:25:17', '2018-10-25 11:55:17', '2018-10-25 11:55:17'),
(423, 'shared an offer of', 'share', 14, 13, 0, 1, NULL, NULL, '2018-10-25', '17:42:56', '2018-10-25 12:12:56', '2018-10-25 12:12:56'),
(424, 'shared an offer of', 'share', 10, 14, 0, 1, NULL, NULL, '2018-10-25', '17:50:31', '2018-10-25 12:20:31', '2018-10-25 12:20:31'),
(425, 'shared an offer of', 'share', 19, 12, 0, 1, NULL, NULL, '2018-10-25', '18:05:29', '2018-10-25 12:35:29', '2018-10-25 12:35:29'),
(426, 'walkin points added', 'walkin points', 8, 0, 8, 6, NULL, NULL, '2018-10-26', '10:50:16', '2018-10-26 05:20:16', '2018-10-26 05:20:16'),
(427, 'walkin points added', 'walkin points', 8, 0, 8, 1, NULL, NULL, '2018-10-26', '11:22:07', '2018-10-26 05:52:07', '2018-10-26 05:52:07'),
(428, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-10-26', '12:06:42', '2018-10-26 06:36:42', '2018-10-26 06:36:42'),
(429, 'shared an offer of', 'share', 7, 21, 0, 19, NULL, NULL, '2018-10-26', '12:10:09', '2018-10-26 06:40:09', '2018-10-26 06:40:09'),
(430, 'shared an offer of', 'share', 7, 21, 0, 1, NULL, NULL, '2018-10-26', '12:16:56', '2018-10-26 06:46:56', '2018-10-26 06:46:56'),
(431, 'shared an offer of', 'share', 8, 17, 0, 19, NULL, NULL, '2018-10-26', '12:31:14', '2018-10-26 07:01:14', '2018-10-26 07:01:14'),
(432, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-26', '15:39:37', '2018-10-26 10:09:37', '2018-10-26 10:09:37'),
(433, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-26', '17:19:18', '2018-10-26 11:49:18', '2018-10-26 11:49:18'),
(434, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-10-26', '17:31:54', '2018-10-26 12:01:54', '2018-10-26 12:01:54'),
(435, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2018-10-29', '11:15:02', '2018-10-29 05:45:02', '2018-10-29 05:45:02'),
(436, 'walkin points added', 'walkin points', 10, 0, 10, 15, NULL, NULL, '2018-10-29', '11:19:30', '2018-10-29 05:49:30', '2018-10-29 05:49:30'),
(437, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-29', '12:48:41', '2018-10-29 07:18:41', '2018-10-29 07:18:41'),
(438, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-29', '12:51:12', '2018-10-29 07:21:12', '2018-10-29 07:21:12'),
(439, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-10-29', '12:55:43', '2018-10-29 07:25:43', '2018-10-29 07:25:43'),
(440, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-10-29', '12:56:04', '2018-10-29 07:26:04', '2018-10-29 07:26:04'),
(441, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2018-10-29', '13:09:56', '2018-10-29 07:39:56', '2018-10-29 07:39:56'),
(442, 'favorited an offer ', 'favorite_offer', 13, 8, 13, 1, NULL, NULL, '2018-10-30', '11:17:37', '2018-10-30 05:47:37', '2018-10-30 05:47:37'),
(443, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 1, NULL, NULL, '2018-10-30', '11:18:10', '2018-10-30 05:48:10', '2018-10-30 05:48:10'),
(444, 'favorited an offer ', 'favorite_offer', 13, 10, 13, 1, NULL, NULL, '2018-10-30', '11:18:39', '2018-10-30 05:48:39', '2018-10-30 05:48:39'),
(445, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 1, NULL, NULL, '2018-10-30', '11:19:38', '2018-10-30 05:49:38', '2018-10-30 05:49:38'),
(446, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 19, NULL, NULL, '2018-10-30', '11:36:37', '2018-10-30 06:06:37', '2018-10-30 06:06:37'),
(447, 'favorited an offer ', 'favorite_offer', 8, 6, 8, 19, NULL, NULL, '2018-10-30', '11:36:45', '2018-10-30 06:06:45', '2018-10-30 06:06:45'),
(448, 'favorited a store ', 'favorite_store', 13, 0, 13, 19, NULL, NULL, '2018-10-30', '11:38:08', '2018-10-30 06:08:08', '2018-10-30 06:08:08'),
(449, 'favorited a store ', 'favorite_store', 8, 0, 8, 19, NULL, NULL, '2018-10-30', '11:38:18', '2018-10-30 06:08:18', '2018-10-30 06:08:18'),
(450, 'favorited a store ', 'favorite_store', 13, 0, 13, 1, NULL, NULL, '2018-10-30', '11:48:58', '2018-10-30 06:18:58', '2018-10-30 06:18:58'),
(451, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-10-30', '15:08:48', '2018-10-30 09:38:48', '2018-10-30 09:38:48'),
(452, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-30', '15:16:06', '2018-10-30 09:46:06', '2018-10-30 09:46:06'),
(453, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-30', '16:14:44', '2018-10-30 10:44:44', '2018-10-30 10:44:44'),
(454, 'hello sir', 'store_send', 8, 0, 0, 4, NULL, NULL, '2018-10-30', '16:29:56', '2018-10-30 10:59:56', '2018-10-30 10:59:56'),
(455, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-10-31', '11:41:14', '2018-10-31 06:11:14', '2018-10-31 06:11:14'),
(456, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-10-31', '16:10:13', '2018-10-31 10:40:13', '2018-10-31 10:40:13'),
(457, 'walkin points added', 'walkin points', 8, 0, 8, 16, NULL, NULL, '2018-10-31', '16:51:22', '2018-10-31 11:21:22', '2018-10-31 11:21:22'),
(458, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-10-31', '18:03:08', '2018-10-31 12:33:08', '2018-10-31 12:33:08'),
(459, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-10-31', '22:04:40', '2018-10-31 16:34:40', '2018-10-31 16:34:40'),
(460, 'shared an offer of', 'share', 13, 10, 0, 16, NULL, NULL, '2018-11-01', '12:40:03', '2018-11-01 07:10:03', '2018-11-01 07:10:03'),
(461, 'shared an offer of', 'share', 13, 10, 0, 16, NULL, NULL, '2018-11-01', '12:41:00', '2018-11-01 07:11:00', '2018-11-01 07:11:00'),
(462, 'shared an offer of', 'share', 13, 8, 0, 16, NULL, NULL, '2018-11-01', '12:42:18', '2018-11-01 07:12:18', '2018-11-01 07:12:18'),
(463, 'shared an offer of', 'share', 13, 8, 0, 16, NULL, NULL, '2018-11-01', '12:42:25', '2018-11-01 07:12:25', '2018-11-01 07:12:25'),
(464, 'shared an offer of', 'share', 9, 3, 0, 2, NULL, NULL, '2018-11-01', '15:04:33', '2018-11-01 09:34:33', '2018-11-01 09:34:33'),
(465, 'favorited an offer ', 'favorite_offer', 9, 2, 9, 2, NULL, NULL, '2018-11-01', '15:05:10', '2018-11-01 09:35:10', '2018-11-01 09:35:10'),
(466, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 2, NULL, NULL, '2018-11-01', '15:05:27', '2018-11-01 09:35:27', '2018-11-01 09:35:27'),
(467, 'favorited a store ', 'favorite_store', 9, 0, 9, 2, NULL, NULL, '2018-11-01', '15:05:54', '2018-11-01 09:35:54', '2018-11-01 09:35:54'),
(468, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 16, NULL, NULL, '2018-11-01', '15:22:21', '2018-11-01 09:52:21', '2018-11-01 09:52:21'),
(469, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 16, NULL, NULL, '2018-11-01', '15:22:26', '2018-11-01 09:52:26', '2018-11-01 09:52:26'),
(470, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 16, NULL, NULL, '2018-11-01', '15:24:25', '2018-11-01 09:54:25', '2018-11-01 09:54:25'),
(471, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 16, NULL, NULL, '2018-11-01', '15:24:30', '2018-11-01 09:54:30', '2018-11-01 09:54:30'),
(472, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 16, NULL, NULL, '2018-11-01', '15:24:34', '2018-11-01 09:54:34', '2018-11-01 09:54:34'),
(473, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2018-11-01', '15:34:51', '2018-11-01 10:04:51', '2018-11-01 10:04:51'),
(474, 'walkin points added', 'walkin points', 8, 0, 8, 15, NULL, NULL, '2018-11-01', '15:40:22', '2018-11-01 10:10:22', '2018-11-01 10:10:22'),
(475, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-11-02', '14:10:31', '2018-11-02 08:40:31', '2018-11-02 08:40:31'),
(476, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-02', '14:16:56', '2018-11-02 08:46:56', '2018-11-02 08:46:56'),
(477, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-11-02', '16:51:03', '2018-11-02 11:21:03', '2018-11-02 11:21:03'),
(478, 'walkin points added', 'walkin points', 8, 0, 8, 16, NULL, NULL, '2018-11-02', '16:51:05', '2018-11-02 11:21:05', '2018-11-02 11:21:05'),
(479, 'walkin points added', 'walkin points', 9, 0, 9, 16, NULL, NULL, '2018-11-02', '17:17:04', '2018-11-02 11:47:04', '2018-11-02 11:47:04'),
(480, 'walkin points added', 'walkin points', 9, 0, 9, 2, NULL, NULL, '2018-11-02', '17:18:33', '2018-11-02 11:48:33', '2018-11-02 11:48:33'),
(481, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2018-11-02', '17:19:01', '2018-11-02 11:49:01', '2018-11-02 11:49:01'),
(482, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2018-11-02', '17:59:08', '2018-11-02 12:29:08', '2018-11-02 12:29:08'),
(483, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-11-12', '12:51:29', '2018-11-12 07:21:29', '2018-11-12 07:21:29'),
(484, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-11-12', '15:55:59', '2018-11-12 10:25:59', '2018-11-12 10:25:59'),
(485, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-11-12', '19:03:22', '2018-11-12 13:33:22', '2018-11-12 13:33:22'),
(486, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2018-11-13', '12:55:18', '2018-11-13 07:25:18', '2018-11-13 07:25:18'),
(487, 'walkin points added', 'walkin points', 8, 0, 8, 16, NULL, NULL, '2018-11-13', '14:46:26', '2018-11-13 09:16:26', '2018-11-13 09:16:26'),
(488, 'hi', 'store_send', 8, 0, 0, 7, NULL, NULL, '2018-11-13', '15:40:00', '2018-11-13 10:10:00', '2018-11-13 10:10:00'),
(489, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-13', '16:33:26', '2018-11-13 11:03:26', '2018-11-13 11:03:26'),
(490, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-11-13', '23:12:03', '2018-11-13 17:42:03', '2018-11-13 17:42:03'),
(491, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2018-11-14', '14:00:50', '2018-11-14 08:30:50', '2018-11-14 08:30:50'),
(492, 'favorited an offer ', 'favorite_offer', 8, 6, 8, 2, NULL, NULL, '2018-11-14', '15:02:15', '2018-11-14 09:32:15', '2018-11-14 09:32:15'),
(493, 'favorited an offer ', 'favorite_offer', 8, 26, 8, 2, NULL, NULL, '2018-11-14', '15:05:33', '2018-11-14 09:35:33', '2018-11-14 09:35:33'),
(494, 'shared an offer of', 'share', 8, 26, 0, 2, NULL, NULL, '2018-11-14', '15:05:51', '2018-11-14 09:35:51', '2018-11-14 09:35:51'),
(495, 'favorited an offer ', 'favorite_offer', 8, 26, 8, 19, NULL, NULL, '2018-11-15', '10:45:25', '2018-11-15 05:15:25', '2018-11-15 05:15:25'),
(496, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 19, NULL, NULL, '2018-11-15', '10:45:30', '2018-11-15 05:15:30', '2018-11-15 05:15:30'),
(497, 'favorited an offer ', 'favorite_offer', 8, 17, 8, 19, NULL, NULL, '2018-11-15', '10:45:38', '2018-11-15 05:15:38', '2018-11-15 05:15:38'),
(498, 'favorited an offer ', 'favorite_offer', 8, 4, 8, 19, NULL, NULL, '2018-11-15', '10:45:43', '2018-11-15 05:15:43', '2018-11-15 05:15:43'),
(499, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-15', '10:48:18', '2018-11-15 05:18:18', '2018-11-15 05:18:18'),
(500, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-11-15', '12:18:01', '2018-11-15 06:48:01', '2018-11-15 06:48:01'),
(501, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-11-15', '16:04:22', '2018-11-15 10:34:22', '2018-11-15 10:34:22'),
(502, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-11-15', '16:52:42', '2018-11-15 11:22:42', '2018-11-15 11:22:42'),
(503, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-16', '15:35:32', '2018-11-16 10:05:32', '2018-11-16 10:05:32'),
(504, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-19', '11:27:44', '2018-11-19 05:57:44', '2018-11-19 05:57:44'),
(505, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-11-20', '10:50:29', '2018-11-20 05:20:29', '2018-11-20 05:20:29'),
(506, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-20', '12:21:44', '2018-11-20 06:51:44', '2018-11-20 06:51:44'),
(507, 'favorited an offer ', 'favorite_offer', 8, 26, 8, 2, NULL, NULL, '2018-11-20', '16:46:15', '2018-11-20 11:16:15', '2018-11-20 11:16:15'),
(508, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-21', '14:56:03', '2018-11-21 09:26:03', '2018-11-21 09:26:03'),
(509, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-11-21', '17:23:52', '2018-11-21 11:53:52', '2018-11-21 11:53:52'),
(510, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-11-21', '17:38:25', '2018-11-21 12:08:25', '2018-11-21 12:08:25'),
(511, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-11-21', '19:57:34', '2018-11-21 14:27:34', '2018-11-21 14:27:34'),
(512, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2018-11-21', '21:15:10', '2018-11-21 15:45:10', '2018-11-21 15:45:10'),
(513, 'hi', 'store_send', 9, 0, 0, 2, NULL, NULL, '2018-11-22', '11:55:06', '2018-11-22 06:25:06', '2018-11-22 06:25:06'),
(514, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-22', '16:00:48', '2018-11-22 10:30:49', '2018-11-22 10:30:49'),
(515, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-11-23', '12:47:18', '2018-11-23 07:17:18', '2018-11-23 07:17:18'),
(516, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-11-23', '16:43:25', '2018-11-23 11:13:25', '2018-11-23 11:13:25'),
(517, 'walkin points added', 'walkin points', 24, 0, 24, 7, NULL, NULL, '2018-11-26', '08:05:35', '2018-11-26 02:35:35', '2018-11-26 02:35:35'),
(518, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-26', '12:46:27', '2018-11-26 07:16:27', '2018-11-26 07:16:27'),
(519, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-11-28', '12:19:31', '2018-11-28 06:49:31', '2018-11-28 06:49:31'),
(520, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-28', '12:30:47', '2018-11-28 07:00:47', '2018-11-28 07:00:47'),
(521, 'shared an offer of', 'share', 13, 8, 0, 4, NULL, NULL, '2018-11-28', '21:24:47', '2018-11-28 15:54:47', '2018-11-28 15:54:47'),
(522, 'shared an offer of', 'share', 13, 8, 0, 4, NULL, NULL, '2018-11-28', '21:25:16', '2018-11-28 15:55:16', '2018-11-28 15:55:16'),
(523, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-11-28', '21:27:17', '2018-11-28 15:57:17', '2018-11-28 15:57:17'),
(524, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-11-29', '13:00:00', '2018-11-29 07:30:00', '2018-11-29 07:30:00'),
(525, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-29', '15:08:48', '2018-11-29 09:38:48', '2018-11-29 09:38:48'),
(526, 'walkin points added', 'walkin points', 8, 0, 8, 2, NULL, NULL, '2018-11-30', '15:33:59', '2018-11-30 10:03:59', '2018-11-30 10:03:59'),
(527, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-11-30', '16:02:57', '2018-11-30 10:32:57', '2018-11-30 10:32:57'),
(528, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-11-30', '16:45:01', '2018-11-30 11:15:01', '2018-11-30 11:15:01'),
(529, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-03', '14:26:55', '2018-12-03 08:56:55', '2018-12-03 08:56:55'),
(530, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2018-12-03', '15:31:34', '2018-12-03 10:01:34', '2018-12-03 10:01:34'),
(531, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-12-03', '15:41:29', '2018-12-03 10:11:29', '2018-12-03 10:11:29'),
(532, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-12-03', '18:21:48', '2018-12-03 12:51:48', '2018-12-03 12:51:48'),
(533, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-04', '15:42:09', '2018-12-04 10:12:09', '2018-12-04 10:12:09'),
(534, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-05', '16:27:33', '2018-12-05 10:57:33', '2018-12-05 10:57:33'),
(535, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-12-05', '17:24:29', '2018-12-05 11:54:29', '2018-12-05 11:54:29'),
(536, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-12-05', '21:54:34', '2018-12-05 16:24:34', '2018-12-05 16:24:34'),
(537, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-07', '14:11:02', '2018-12-07 08:41:02', '2018-12-07 08:41:02'),
(538, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-12-07', '16:24:07', '2018-12-07 10:54:07', '2018-12-07 10:54:07'),
(539, 'walkin points added', 'walkin points', 24, 0, 24, 7, NULL, NULL, '2018-12-09', '17:46:43', '2018-12-09 12:16:43', '2018-12-09 12:16:43'),
(540, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-10', '12:19:05', '2018-12-10 06:49:05', '2018-12-10 06:49:05'),
(541, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-12', '11:33:14', '2018-12-12 06:03:14', '2018-12-12 06:03:14'),
(542, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-12-14', '00:42:46', '2018-12-13 19:12:46', '2018-12-13 19:12:46'),
(543, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-12-17', '17:38:35', '2018-12-17 12:08:35', '2018-12-17 12:08:35'),
(544, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-17', '17:38:48', '2018-12-17 12:08:48', '2018-12-17 12:08:48'),
(545, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2018-12-17', '18:08:07', '2018-12-17 12:38:07', '2018-12-17 12:38:07'),
(546, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2018-12-17', '23:15:38', '2018-12-17 17:45:38', '2018-12-17 17:45:38'),
(547, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2018-12-19', '11:21:44', '2018-12-19 05:51:44', '2018-12-19 05:51:44'),
(548, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2018-12-19', '13:04:39', '2018-12-19 07:34:39', '2018-12-19 07:34:39'),
(549, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-02', '15:50:37', '2019-01-02 10:20:37', '2019-01-02 10:20:37'),
(550, 'walkin points added', 'walkin points', 8, 0, 8, 19, NULL, NULL, '2019-01-03', '12:30:57', '2019-01-03 07:00:57', '2019-01-03 07:00:57'),
(551, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-01-03', '12:34:57', '2019-01-03 07:04:57', '2019-01-03 07:04:57'),
(552, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-18', '17:16:37', '2019-01-18 11:46:37', '2019-01-18 11:46:37'),
(553, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-01-19', '15:16:50', '2019-01-19 09:46:50', '2019-01-19 09:46:50'),
(554, 'shared an offer of', 'share', 19, 12, 0, 4, NULL, NULL, '2019-01-19', '15:26:11', '2019-01-19 09:56:11', '2019-01-19 09:56:11'),
(555, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-01-23', '22:40:11', '2019-01-23 17:10:11', '2019-01-23 17:10:11'),
(556, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-24', '12:15:57', '2019-01-24 06:45:57', '2019-01-24 06:45:57'),
(557, 'favorited a store ', 'favorite_store', 13, 0, 13, 3, NULL, NULL, '2019-01-24', '12:19:08', '2019-01-24 06:49:08', '2019-01-24 06:49:08'),
(558, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-01-24', '12:23:08', '2019-01-24 06:53:08', '2019-01-24 06:53:08'),
(559, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2019-01-24', '12:54:59', '2019-01-24 07:24:59', '2019-01-24 07:24:59'),
(560, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2019-01-24', '13:11:05', '2019-01-24 07:41:05', '2019-01-24 07:41:05'),
(561, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-01-24', '16:48:04', '2019-01-24 11:18:04', '2019-01-24 11:18:04'),
(562, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2019-01-24', '17:05:00', '2019-01-24 11:35:00', '2019-01-24 11:35:00'),
(563, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-25', '15:16:42', '2019-01-25 09:46:42', '2019-01-25 09:46:42'),
(564, 'walkin points added', 'walkin points', 8, 0, 8, 24, NULL, NULL, '2019-01-25', '19:39:39', '2019-01-25 14:09:39', '2019-01-25 14:09:39'),
(565, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-01-25', '21:28:40', '2019-01-25 15:58:40', '2019-01-25 15:58:40'),
(566, 'shared an offer of', 'share', 27, 28, 0, 4, NULL, NULL, '2019-01-26', '15:33:50', '2019-01-26 10:03:50', '2019-01-26 10:03:50'),
(567, 'gave rating to the store', 'rating', 27, 0, 0, 4, NULL, NULL, '2019-01-26', '15:33:58', '2019-01-26 10:03:58', '2019-01-26 10:03:58'),
(568, 'shared an offer of', 'share', 9, 3, 0, 4, NULL, NULL, '2019-01-26', '15:36:01', '2019-01-26 10:06:01', '2019-01-26 10:06:01'),
(569, 'shared an offer of', 'share', 13, 10, 0, 4, NULL, NULL, '2019-01-26', '15:39:33', '2019-01-26 10:09:33', '2019-01-26 10:09:33'),
(570, 'shared an offer of', 'share', 19, 12, 0, 25, NULL, NULL, '2019-01-26', '22:12:21', '2019-01-26 16:42:21', '2019-01-26 16:42:21'),
(571, 'walkin points added', 'walkin points', 8, 0, 8, 10, NULL, NULL, '2019-01-28', '12:45:09', '2019-01-28 07:15:09', '2019-01-28 07:15:09'),
(572, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-28', '13:06:43', '2019-01-28 07:36:43', '2019-01-28 07:36:43'),
(573, 'shared an offer of', 'share', 8, 29, 0, 3, NULL, NULL, '2019-01-28', '15:03:07', '2019-01-28 09:33:07', '2019-01-28 09:33:07'),
(574, 'shared an offer of', 'share', 8, 29, 0, 3, NULL, NULL, '2019-01-28', '15:04:18', '2019-01-28 09:34:18', '2019-01-28 09:34:18'),
(575, 'shared an offer of', 'share', 8, 29, 0, 10, NULL, NULL, '2019-01-28', '15:06:31', '2019-01-28 09:36:31', '2019-01-28 09:36:31'),
(576, 'gave rating to the store', 'rating', 8, 0, 0, 10, NULL, NULL, '2019-01-28', '15:07:47', '2019-01-28 09:37:47', '2019-01-28 09:37:47'),
(577, 'shared an offer of', 'share', 8, 29, 0, 7, NULL, NULL, '2019-01-28', '15:07:55', '2019-01-28 09:37:55', '2019-01-28 09:37:55'),
(578, 'shared an offer of', 'share', 8, 29, 0, 4, NULL, NULL, '2019-01-28', '15:18:41', '2019-01-28 09:48:41', '2019-01-28 09:48:41'),
(579, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-01-28', '15:20:37', '2019-01-28 09:50:37', '2019-01-28 09:50:37'),
(580, 'walkin points added', 'walkin points', 8, 0, 8, 9, NULL, NULL, '2019-01-28', '15:21:50', '2019-01-28 09:51:50', '2019-01-28 09:51:50'),
(581, 'shared an offer of', 'share', 8, 29, 0, 9, NULL, NULL, '2019-01-28', '15:24:40', '2019-01-28 09:54:40', '2019-01-28 09:54:40'),
(582, 'gave rating to the store', 'rating', 8, 0, 0, 9, NULL, NULL, '2019-01-28', '15:24:49', '2019-01-28 09:54:49', '2019-01-28 09:54:49'),
(583, 'shared an offer of', 'share', 8, 29, 0, 7, NULL, NULL, '2019-01-28', '15:49:12', '2019-01-28 10:19:12', '2019-01-28 10:19:12'),
(584, 'shared an offer of', 'share', 8, 29, 0, 9, NULL, NULL, '2019-01-28', '16:08:18', '2019-01-28 10:38:18', '2019-01-28 10:38:18'),
(585, 'walkin points added', 'walkin points', 27, 0, 27, 4, NULL, NULL, '2019-01-28', '16:30:16', '2019-01-28 11:00:16', '2019-01-28 11:00:16'),
(586, 'walkin points added', 'walkin points', 27, 0, 27, 7, NULL, NULL, '2019-01-28', '16:30:35', '2019-01-28 11:00:35', '2019-01-28 11:00:35'),
(587, 'favorited an offer ', 'favorite_offer', 27, 28, 27, 4, NULL, NULL, '2019-01-28', '19:58:29', '2019-01-28 14:28:29', '2019-01-28 14:28:29'),
(588, 'favorited an offer ', 'favorite_offer', 13, 10, 13, 4, NULL, NULL, '2019-01-28', '19:58:49', '2019-01-28 14:28:49', '2019-01-28 14:28:49'),
(589, 'favorited an offer ', 'favorite_offer', 13, 10, 13, 4, NULL, NULL, '2019-01-28', '19:58:55', '2019-01-28 14:28:55', '2019-01-28 14:28:55'),
(590, 'favorited an offer ', 'favorite_offer', 19, 12, 19, 4, NULL, NULL, '2019-01-28', '19:59:27', '2019-01-28 14:29:27', '2019-01-28 14:29:27'),
(591, 'favorited an offer ', 'favorite_offer', 19, 12, 19, 4, NULL, NULL, '2019-01-28', '19:59:29', '2019-01-28 14:29:29', '2019-01-28 14:29:29'),
(592, 'favorited a store ', 'favorite_store', 27, 0, 27, 4, NULL, NULL, '2019-01-28', '19:59:50', '2019-01-28 14:29:50', '2019-01-28 14:29:50'),
(593, 'favorited a store ', 'favorite_store', 8, 0, 8, 4, NULL, NULL, '2019-01-28', '19:59:57', '2019-01-28 14:29:57', '2019-01-28 14:29:57'),
(594, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 4, NULL, NULL, '2019-01-28', '20:01:08', '2019-01-28 14:31:08', '2019-01-28 14:31:08'),
(595, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 4, NULL, NULL, '2019-01-28', '20:01:09', '2019-01-28 14:31:09', '2019-01-28 14:31:09'),
(596, 'favorited an offer ', 'favorite_offer', 9, 3, 9, 4, NULL, NULL, '2019-01-28', '20:01:10', '2019-01-28 14:31:10', '2019-01-28 14:31:10'),
(597, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-01-29', '11:56:32', '2019-01-29 06:26:32', '2019-01-29 06:26:32'),
(598, 'shared an offer of', 'share', 8, 6, 0, 25, NULL, NULL, '2019-01-29', '11:58:00', '2019-01-29 06:28:00', '2019-01-29 06:28:00'),
(599, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-30', '11:30:00', '2019-01-30 06:00:00', '2019-01-30 06:00:00'),
(600, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 25, NULL, NULL, '2019-01-30', '12:07:32', '2019-01-30 06:37:32', '2019-01-30 06:37:32'),
(601, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 25, NULL, NULL, '2019-01-30', '12:07:38', '2019-01-30 06:37:38', '2019-01-30 06:37:38'),
(602, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 25, NULL, NULL, '2019-01-30', '12:07:54', '2019-01-30 06:37:54', '2019-01-30 06:37:54'),
(603, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-01-31', '15:13:58', '2019-01-31 09:43:58', '2019-01-31 09:43:58'),
(604, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-01-31', '15:27:51', '2019-01-31 09:57:51', '2019-01-31 09:57:51'),
(605, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-01-31', '15:34:20', '2019-01-31 10:04:20', '2019-01-31 10:04:20'),
(606, 'walkin points added', 'walkin points', 28, 0, 28, 7, NULL, NULL, '2019-02-01', '11:36:57', '2019-02-01 06:06:57', '2019-02-01 06:06:57'),
(607, 'walkin points added', 'walkin points', 28, 0, 28, 4, NULL, NULL, '2019-02-01', '11:38:38', '2019-02-01 06:08:38', '2019-02-01 06:08:38'),
(608, 'shared an offer of', 'share', 28, 31, 0, 4, NULL, NULL, '2019-02-01', '14:30:03', '2019-02-01 09:00:03', '2019-02-01 09:00:03'),
(609, 'gave rating to the store', 'rating', 28, 0, 0, 4, NULL, NULL, '2019-02-01', '14:30:20', '2019-02-01 09:00:20', '2019-02-01 09:00:20'),
(610, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-02-01', '16:57:45', '2019-02-01 11:27:45', '2019-02-01 11:27:45'),
(611, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-02-04', '11:04:43', '2019-02-04 05:34:43', '2019-02-04 05:34:43'),
(612, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-02-04', '14:24:38', '2019-02-04 08:54:38', '2019-02-04 08:54:38'),
(613, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-02-04', '16:53:26', '2019-02-04 11:23:26', '2019-02-04 11:23:26'),
(614, 'walkin points added', 'walkin points', 8, 0, 8, 24, NULL, NULL, '2019-02-04', '17:10:35', '2019-02-04 11:40:35', '2019-02-04 11:40:35'),
(615, 'walkin points added', 'walkin points', 8, 0, 8, 26, NULL, NULL, '2019-02-05', '17:22:03', '2019-02-05 11:52:03', '2019-02-05 11:52:03'),
(616, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-02-05', '17:27:05', '2019-02-05 11:57:05', '2019-02-05 11:57:05'),
(617, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-02-05', '17:27:17', '2019-02-05 11:57:17', '2019-02-05 11:57:17'),
(618, 'walkin points added', 'walkin points', 8, 0, 8, 27, NULL, NULL, '2019-02-05', '17:32:27', '2019-02-05 12:02:27', '2019-02-05 12:02:27'),
(619, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-02-07', '11:29:56', '2019-02-07 05:59:56', '2019-02-07 05:59:56'),
(620, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-02-07', '16:34:05', '2019-02-07 11:04:05', '2019-02-07 11:04:05'),
(621, 'shared an offer of', 'share', 13, 10, 0, 25, NULL, NULL, '2019-02-07', '16:42:25', '2019-02-07 11:12:25', '2019-02-07 11:12:25'),
(622, 'shared an offer of', 'share', 13, 10, 0, 25, NULL, NULL, '2019-02-07', '16:54:00', '2019-02-07 11:24:00', '2019-02-07 11:24:00'),
(623, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-02-08', '14:55:05', '2019-02-08 09:25:05', '2019-02-08 09:25:05'),
(624, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-02-08', '15:00:43', '2019-02-08 09:30:43', '2019-02-08 09:30:43'),
(625, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-02-12', '15:13:44', '2019-02-12 09:43:44', '2019-02-12 09:43:44'),
(626, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-02-14', '11:37:30', '2019-02-14 06:07:30', '2019-02-14 06:07:30'),
(627, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-02-15', '15:04:52', '2019-02-15 09:34:52', '2019-02-15 09:34:52'),
(628, 'walkin points added', 'walkin points', 29, 0, 29, 4, NULL, NULL, '2019-02-18', '20:53:30', '2019-02-18 15:23:30', '2019-02-18 15:23:30'),
(629, 'shared an offer of', 'share', 29, 33, 0, 4, NULL, NULL, '2019-02-18', '20:58:41', '2019-02-18 15:28:41', '2019-02-18 15:28:41'),
(630, 'hi new deo collection', 'store_send', 29, 0, 0, 4, NULL, NULL, '2019-02-18', '21:00:29', '2019-02-18 15:30:29', '2019-02-18 15:30:29'),
(631, 'walkin points added', 'walkin points', 30, 0, 30, 7, NULL, NULL, '2019-02-20', '11:58:33', '2019-02-20 06:28:33', '2019-02-20 06:28:33'),
(632, 'walkin points added', 'walkin points', 30, 0, 30, 4, NULL, NULL, '2019-02-20', '11:59:57', '2019-02-20 06:29:57', '2019-02-20 06:29:57'),
(633, 'hello', 'store_send', 30, 0, 0, 4, NULL, NULL, '2019-02-20', '12:13:43', '2019-02-20 06:43:43', '2019-02-20 06:43:43'),
(634, 'walkin points added', 'walkin points', 32, 0, 32, 7, NULL, NULL, '2019-03-04', '15:28:58', '2019-03-04 09:58:58', '2019-03-04 09:58:58'),
(635, 'walkin points added', 'walkin points', 32, 0, 32, 4, NULL, NULL, '2019-03-04', '15:55:50', '2019-03-04 10:25:50', '2019-03-04 10:25:50'),
(636, 'walkin points added', 'walkin points', 8, 0, 8, 25, NULL, NULL, '2019-03-06', '10:53:24', '2019-03-06 05:23:24', '2019-03-06 05:23:24'),
(637, 'walkin points added', 'walkin points', 32, 0, 32, 7, NULL, NULL, '2019-03-11', '11:53:00', '2019-03-11 06:23:00', '2019-03-11 06:23:00'),
(638, 'walkin points added', 'walkin points', 32, 0, 32, 4, NULL, NULL, '2019-03-11', '12:07:19', '2019-03-11 06:37:19', '2019-03-11 06:37:19'),
(639, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-03-11', '16:06:32', '2019-03-11 10:36:32', '2019-03-11 10:36:32'),
(640, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-03-19', '16:20:07', '2019-03-19 10:50:07', '2019-03-19 10:50:07'),
(641, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-03-19', '16:26:48', '2019-03-19 10:56:48', '2019-03-19 10:56:48'),
(642, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-03-26', '16:16:35', '2019-03-26 10:46:35', '2019-03-26 10:46:35'),
(643, 'shared an offer of', 'share', 27, 34, 0, 3, NULL, NULL, '2019-03-28', '12:56:49', '2019-03-28 07:26:49', '2019-03-28 07:26:49'),
(644, 'gave rating to the store', 'rating', 27, 0, 0, 3, NULL, NULL, '2019-03-28', '12:56:55', '2019-03-28 07:26:55', '2019-03-28 07:26:55'),
(645, 'walkin points added', 'walkin points', 9, 0, 9, 3, NULL, NULL, '2019-03-28', '13:00:02', '2019-03-28 07:30:02', '2019-03-28 07:30:02'),
(646, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2019-03-28', '13:08:03', '2019-03-28 07:38:03', '2019-03-28 07:38:03'),
(647, 'walkin points added', 'walkin points', 27, 0, 27, 4, NULL, NULL, '2019-03-28', '14:25:00', '2019-03-28 08:55:00', '2019-03-28 08:55:00'),
(648, 'hi', 'store_send', 27, 0, 0, 4, NULL, NULL, '2019-03-28', '14:45:15', '2019-03-28 09:15:15', '2019-03-28 09:15:15'),
(649, 'walkin points added', 'walkin points', 7, 0, 7, 7, NULL, NULL, '2019-04-02', '16:48:14', '2019-04-02 11:18:14', '2019-04-02 11:18:14'),
(650, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-04-02', '16:52:47', '2019-04-02 11:22:47', '2019-04-02 11:22:47'),
(651, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-04-12', '18:11:27', '2019-04-12 12:41:27', '2019-04-12 12:41:27'),
(652, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-04-13', '11:17:10', '2019-04-13 05:47:10', '2019-04-13 05:47:10'),
(653, 'walkin points added', 'walkin points', 7, 0, 7, 7, NULL, NULL, '2019-04-13', '11:25:51', '2019-04-13 05:55:51', '2019-04-13 05:55:51'),
(654, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-04-15', '13:58:28', '2019-04-15 08:28:28', '2019-04-15 08:28:28'),
(655, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2019-04-15', '15:27:50', '2019-04-15 09:57:50', '2019-04-15 09:57:50'),
(656, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-04-16', '17:59:43', '2019-04-16 12:29:43', '2019-04-16 12:29:43'),
(657, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-04-16', '18:13:51', '2019-04-16 12:43:51', '2019-04-16 12:43:51'),
(658, '70-80 % OFF on amazon', 'redeem_coupon', 0, 6, 0, 4, NULL, NULL, '2019-04-16', '18:18:29', '2019-04-16 12:48:29', '2019-04-16 12:48:29'),
(659, '60 % OFF on drinks and deserts ', 'redeem_coupon', 0, 7, 0, 3, NULL, NULL, '2019-04-16', '18:18:39', '2019-04-16 12:48:39', '2019-04-16 12:48:39'),
(660, '70-80 % OFF on amazon', 'redeem_coupon', 0, 6, 0, 4, NULL, NULL, '2019-04-16', '18:23:34', '2019-04-16 12:53:34', '2019-04-16 12:53:34'),
(661, 'walkin points added', 'walkin points', 7, 0, 7, 7, NULL, NULL, '2019-04-17', '13:18:29', '2019-04-17 07:48:29', '2019-04-17 07:48:29'),
(662, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-04-17', '18:10:10', '2019-04-17 12:40:10', '2019-04-17 12:40:10'),
(663, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2019-04-17', '18:28:25', '2019-04-17 12:58:25', '2019-04-17 12:58:25'),
(664, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-04-30', '17:24:30', '2019-04-30 11:54:30', '2019-04-30 11:54:30'),
(665, 'favorited a store ', 'favorite_store', 8, 0, 8, 7, NULL, NULL, '2019-05-01', '14:49:51', '2019-05-01 09:19:51', '2019-05-01 09:19:51'),
(666, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-02', '17:20:57', '2019-05-02 11:50:57', '2019-05-02 11:50:57'),
(667, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-08', '17:05:43', '2019-05-08 11:35:43', '2019-05-08 11:35:43'),
(668, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-05-08', '17:12:23', '2019-05-08 11:42:23', '2019-05-08 11:42:23'),
(669, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2019-05-13', '18:27:26', '2019-05-13 12:57:26', '2019-05-13 12:57:26'),
(670, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-13', '18:32:49', '2019-05-13 13:02:49', '2019-05-13 13:02:49'),
(671, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-05-14', '12:58:48', '2019-05-14 07:28:48', '2019-05-14 07:28:48'),
(672, 'walkin points added', 'walkin points', 7, 0, 7, 7, NULL, NULL, '2019-05-15', '12:05:24', '2019-05-15 06:35:24', '2019-05-15 06:35:24'),
(673, 'walkin points added', 'walkin points', 9, 0, 9, 7, NULL, NULL, '2019-05-15', '12:19:23', '2019-05-15 06:49:23', '2019-05-15 06:49:23'),
(674, 'walkin points added', 'walkin points', 9, 0, 9, 4, NULL, NULL, '2019-05-15', '13:02:54', '2019-05-15 07:32:54', '2019-05-15 07:32:54'),
(675, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-15', '13:23:07', '2019-05-15 07:53:07', '2019-05-15 07:53:07'),
(676, 'shared an offer of', 'share', 32, 36, 0, 4, NULL, NULL, '2019-05-15', '20:58:29', '2019-05-15 15:28:29', '2019-05-15 15:28:29'),
(677, 'walkin points added', 'walkin points', 32, 0, 32, 4, NULL, NULL, '2019-05-15', '21:00:18', '2019-05-15 15:30:18', '2019-05-15 15:30:18'),
(678, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-16', '17:30:34', '2019-05-16 12:00:34', '2019-05-16 12:00:34'),
(679, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-18', '12:28:22', '2019-05-18 06:58:22', '2019-05-18 06:58:22'),
(680, 'walkin points added', 'walkin points', 7, 0, 7, 4, NULL, NULL, '2019-05-20', '15:59:50', '2019-05-20 10:29:50', '2019-05-20 10:29:50'),
(681, 'walkin points added', 'walkin points', 8, 0, 8, 3, NULL, NULL, '2019-05-22', '16:10:06', '2019-05-22 10:40:06', '2019-05-22 10:40:06'),
(682, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-05-22', '16:17:34', '2019-05-22 10:47:34', '2019-05-22 10:47:34'),
(683, 'favorited an offer ', 'favorite_offer', 32, 36, 32, 4, NULL, NULL, '2019-05-22', '16:24:44', '2019-05-22 10:54:44', '2019-05-22 10:54:44'),
(684, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 4, NULL, NULL, '2019-05-22', '16:25:03', '2019-05-22 10:55:03', '2019-05-22 10:55:03'),
(685, 'favorited an offer ', 'favorite_offer', 8, 29, 8, 3, NULL, NULL, '2019-05-22', '16:30:29', '2019-05-22 11:00:29', '2019-05-22 11:00:29'),
(686, 'favorited an offer ', 'favorite_offer', 7, 23, 7, 3, NULL, NULL, '2019-05-22', '16:30:45', '2019-05-22 11:00:45', '2019-05-22 11:00:45'),
(687, 'favorited an offer ', 'favorite_offer', 8, 26, 8, 4, NULL, NULL, '2019-05-22', '16:31:05', '2019-05-22 11:01:05', '2019-05-22 11:01:05'),
(688, 'favorited a store ', 'favorite_store', 22, 0, 22, 3, NULL, NULL, '2019-05-22', '16:31:29', '2019-05-22 11:01:29', '2019-05-22 11:01:29'),
(689, 'favorited a store ', 'favorite_store', 16, 0, 16, 3, NULL, NULL, '2019-05-22', '16:31:40', '2019-05-22 11:01:40', '2019-05-22 11:01:40'),
(690, 'favorited an offer ', 'favorite_offer', 27, 34, 27, 3, NULL, NULL, '2019-05-22', '16:31:58', '2019-05-22 11:01:58', '2019-05-22 11:01:58'),
(691, 'walkin points added', 'walkin points', 32, 0, 32, 14, NULL, NULL, '2019-05-23', '12:40:07', '2019-05-23 07:10:07', '2019-05-23 07:10:07'),
(692, 'walkin points added', 'walkin points', 32, 0, 32, 4, NULL, NULL, '2019-05-23', '12:41:20', '2019-05-23 07:11:20', '2019-05-23 07:11:20'),
(693, 'walkin points added', 'walkin points', 32, 0, 32, 7, NULL, NULL, '2019-05-23', '12:44:15', '2019-05-23 07:14:15', '2019-05-23 07:14:15'),
(694, '??????? ', 'store_send', 7, 0, 0, 4, NULL, NULL, '2019-05-23', '17:22:45', '2019-05-23 11:52:45', '2019-05-23 11:52:45'),
(695, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-05-27', '14:48:37', '2019-05-27 09:18:37', '2019-05-27 09:18:37'),
(696, 'walkin points added', 'walkin points', 8, 0, 8, 21, NULL, NULL, '2019-06-03', '15:13:12', '2019-06-03 09:43:12', '2019-06-03 09:43:12'),
(697, 'hello', 'store_send', 8, 0, 0, 4, NULL, NULL, '2019-06-04', '15:09:55', '2019-06-04 09:39:55', '2019-06-04 09:39:55'),
(698, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-06-04', '16:07:19', '2019-06-04 10:37:19', '2019-06-04 10:37:19'),
(699, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-06-08', '13:59:41', '2019-06-08 08:29:41', '2019-06-08 08:29:41'),
(700, 'hello', 'store_send', 8, 0, 0, 4, NULL, NULL, '2019-06-18', '15:00:05', '2019-06-18 09:30:05', '2019-06-18 09:30:05'),
(701, 'shared an offer of', 'share', 27, 34, 0, 4, NULL, NULL, '2019-06-18', '15:12:26', '2019-06-18 09:42:26', '2019-06-18 09:42:26'),
(702, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-06-18', '16:37:13', '2019-06-18 11:07:13', '2019-06-18 11:07:13'),
(703, 'shared an offer of', 'share', 30, 39, 0, 21, NULL, NULL, '2019-06-28', '02:19:10', '2019-06-27 20:49:10', '2019-06-27 20:49:10'),
(704, 'gave rating to the store', 'rating', 30, 0, 0, 21, NULL, NULL, '2019-06-28', '02:19:34', '2019-06-27 20:49:34', '2019-06-27 20:49:34'),
(705, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-06-28', '18:17:14', '2019-06-28 12:47:14', '2019-06-28 12:47:14'),
(706, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-06-29', '19:03:15', '2019-06-29 13:33:15', '2019-06-29 13:33:15'),
(707, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-06-30', '23:29:02', '2019-06-30 17:59:02', '2019-06-30 17:59:02'),
(708, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-07-02', '19:32:08', '2019-07-02 14:02:08', '2019-07-02 14:02:08'),
(709, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-07-03', '19:46:42', '2019-07-03 14:16:42', '2019-07-03 14:16:42'),
(710, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-07-05', '20:24:41', '2019-07-05 14:54:41', '2019-07-05 14:54:41'),
(711, 'walkin points added', 'walkin points', 30, 0, 30, 21, NULL, NULL, '2019-07-07', '02:36:31', '2019-07-06 21:06:31', '2019-07-06 21:06:31'),
(712, 'Hi', 'store_send', 7, 0, 0, 4, NULL, NULL, '2019-07-07', '15:56:12', '2019-07-07 10:26:12', '2019-07-07 10:26:12'),
(713, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-07-22', '16:48:18', '2019-07-22 11:18:18', '2019-07-22 11:18:18');
INSERT INTO `T_ActivityLog` (`activity_log_id`, `activity_name`, `activity_type`, `store_id`, `store_offer_id`, `store`, `user_id`, `respective_id`, `points`, `activity_date`, `activity_time`, `created_date`, `last_updated_date`) VALUES
(714, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-07-26', '15:40:56', '2019-07-26 10:10:56', '2019-07-26 10:10:56'),
(715, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-08-06', '18:09:41', '2019-08-06 12:39:41', '2019-08-06 12:39:41'),
(716, 'walkin points added', 'walkin points', 49, 0, 49, 4, NULL, NULL, '2019-08-13', '13:55:45', '2019-08-13 08:25:45', '2019-08-13 08:25:45'),
(717, 'hi', 'store_send', 49, 0, 0, 4, NULL, NULL, '2019-08-13', '14:43:12', '2019-08-13 09:13:12', '2019-08-13 09:13:12'),
(718, 'walkin points added', 'walkin points', 8, 0, 8, 21, NULL, NULL, '2019-08-21', '17:34:39', '2019-08-21 12:04:39', '2019-08-21 12:04:39'),
(719, 'congrats! u got 100 rubs', 'store_send', 49, 0, 0, 4, NULL, NULL, '2019-08-30', '15:24:09', '2019-08-30 09:54:09', '2019-08-30 09:54:09'),
(720, 'shared an offer of', 'share', 50, 53, 0, 21, NULL, NULL, '2019-09-02', '11:57:53', '2019-09-02 06:27:53', '2019-09-02 06:27:53'),
(721, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-10', '19:27:48', '2019-09-10 13:57:48', '2019-09-10 13:57:48'),
(722, 'shared an offer of', 'share', 7, 58, 0, 7, NULL, NULL, '2019-09-11', '09:11:39', '2019-09-11 03:41:39', '2019-09-11 03:41:39'),
(723, 'gave rating to the store', 'rating', 7, 0, 0, 7, NULL, NULL, '2019-09-11', '09:11:49', '2019-09-11 03:41:49', '2019-09-11 03:41:49'),
(724, 'favorited an offer ', 'favorite_offer', 7, 58, 7, 7, NULL, NULL, '2019-09-11', '09:12:19', '2019-09-11 03:42:19', '2019-09-11 03:42:19'),
(725, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-09-11', '15:48:29', '2019-09-11 10:18:29', '2019-09-11 10:18:29'),
(726, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2019-09-13', '00:58:48', '2019-09-12 19:28:48', '2019-09-12 19:28:48'),
(727, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-13', '01:03:13', '2019-09-12 19:33:13', '2019-09-12 19:33:13'),
(728, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-09-13', '14:20:38', '2019-09-13 08:50:38', '2019-09-13 08:50:38'),
(729, 'walkin points added', 'walkin points', 8, 0, 8, 8, NULL, NULL, '2019-09-13', '15:47:58', '2019-09-13 10:17:58', '2019-09-13 10:17:58'),
(730, 'shared an offer of', 'share', 51, 56, 0, 8, NULL, NULL, '2019-09-13', '15:49:38', '2019-09-13 10:19:38', '2019-09-13 10:19:38'),
(731, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2019-09-14', '17:35:23', '2019-09-14 12:05:23', '2019-09-14 12:05:23'),
(732, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-14', '19:32:20', '2019-09-14 14:02:20', '2019-09-14 14:02:20'),
(733, 'walkin points added', 'walkin points', 51, 0, 51, 7, NULL, NULL, '2019-09-16', '13:31:52', '2019-09-16 08:01:52', '2019-09-16 08:01:52'),
(734, 'favorited an offer ', 'favorite_offer', 10, 57, 10, 37, NULL, NULL, '2019-09-16', '19:26:59', '2019-09-16 13:56:59', '2019-09-16 13:56:59'),
(735, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-18', '01:00:56', '2019-09-17 19:30:56', '2019-09-17 19:30:56'),
(736, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-19', '15:25:47', '2019-09-19 09:55:47', '2019-09-19 09:55:47'),
(737, 'shared an offer of', 'share', 52, 61, 0, 4, NULL, NULL, '2019-09-19', '22:30:51', '2019-09-19 17:00:51', '2019-09-19 17:00:51'),
(738, 'walkin points added', 'walkin points', 53, 0, 53, 4, NULL, NULL, '2019-09-19', '23:52:13', '2019-09-19 18:22:13', '2019-09-19 18:22:13'),
(739, 'Perfect Gift', 'redeem_coupon', 0, 10, 0, 4, NULL, NULL, '2019-09-20', '15:10:48', '2019-09-20 09:40:48', '2019-09-20 09:40:48'),
(740, 'Collectible Crystal Figurine & Gifts', 'redeem_coupon', 0, 11, 0, 14, NULL, NULL, '2019-09-20', '15:12:46', '2019-09-20 09:42:46', '2019-09-20 09:42:46'),
(741, 'shared an offer of', 'share', 51, 56, 0, 4, NULL, NULL, '2019-09-20', '15:21:51', '2019-09-20 09:51:51', '2019-09-20 09:51:51'),
(742, 'shared an offer of', 'share', 7, 58, 0, 4, NULL, NULL, '2019-09-20', '15:22:42', '2019-09-20 09:52:42', '2019-09-20 09:52:42'),
(743, 'Collectible Crystal Figurine & Gifts', 'redeem_coupon', 0, 11, 0, 7, NULL, NULL, '2019-09-20', '15:56:51', '2019-09-20 10:26:51', '2019-09-20 10:26:51'),
(744, 'Scent for Cents', 'redeem_coupon', 0, 9, 0, 7, NULL, NULL, '2019-09-20', '15:57:06', '2019-09-20 10:27:06', '2019-09-20 10:27:06'),
(745, 'favorited a store ', 'favorite_store', 8, 0, 8, 37, NULL, NULL, '2019-09-20', '16:55:16', '2019-09-20 11:25:16', '2019-09-20 11:25:16'),
(746, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2019-09-23', '13:04:48', '2019-09-23 07:34:48', '2019-09-23 07:34:48'),
(747, 'walkin points added', 'walkin points', 51, 0, 51, 14, NULL, NULL, '2019-09-23', '13:37:02', '2019-09-23 08:07:02', '2019-09-23 08:07:02'),
(748, 'Perfect Gift', 'redeem_coupon', 0, 10, 0, 4, NULL, NULL, '2019-09-23', '15:41:37', '2019-09-23 10:11:37', '2019-09-23 10:11:37'),
(749, 'Perfect Gift', 'redeem_coupon', 0, 10, 0, 4, NULL, NULL, '2019-09-23', '15:43:27', '2019-09-23 10:13:27', '2019-09-23 10:13:27'),
(750, 'Stay High With Style', 'redeem_coupon', 0, 8, 0, 14, NULL, NULL, '2019-09-23', '15:49:48', '2019-09-23 10:19:48', '2019-09-23 10:19:48'),
(751, 'Perfect Gift', 'redeem_coupon', 0, 10, 0, 14, NULL, NULL, '2019-09-23', '17:05:33', '2019-09-23 11:35:33', '2019-09-23 11:35:33'),
(752, 'walkin points added', 'walkin points', 53, 0, 53, 14, NULL, NULL, '2019-09-24', '00:42:37', '2019-09-23 19:12:37', '2019-09-23 19:12:37'),
(753, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2019-09-24', '00:56:16', '2019-09-23 19:26:16', '2019-09-23 19:26:16'),
(754, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-09-24', '12:30:36', '2019-09-24 07:00:36', '2019-09-24 07:00:36'),
(755, 'walkin points added', 'walkin points', 8, 0, 8, 14, NULL, NULL, '2019-09-24', '15:14:04', '2019-09-24 09:44:04', '2019-09-24 09:44:04'),
(756, 'Stay High With Style', 'redeem_coupon', 0, 8, 0, 14, NULL, NULL, '2019-09-24', '15:36:44', '2019-09-24 10:06:44', '2019-09-24 10:06:44'),
(757, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-25', '12:06:31', '2019-09-25 06:36:31', '2019-09-25 06:36:31'),
(758, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2019-09-25', '12:14:54', '2019-09-25 06:44:54', '2019-09-25 06:44:54'),
(759, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-09-25', '13:15:41', '2019-09-25 07:45:41', '2019-09-25 07:45:41'),
(760, 'shared an offer of', 'share', 52, 61, 0, 7, NULL, NULL, '2019-09-26', '15:21:48', '2019-09-26 09:51:48', '2019-09-26 09:51:48'),
(761, 'gave rating to the store', 'rating', 52, 0, 0, 7, NULL, NULL, '2019-09-26', '15:22:11', '2019-09-26 09:52:11', '2019-09-26 09:52:11'),
(762, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-09-26', '15:27:05', '2019-09-26 09:57:05', '2019-09-26 09:57:05'),
(763, 'walkin points added', 'walkin points', 8, 0, 8, 40, NULL, NULL, '2019-09-26', '16:17:27', '2019-09-26 10:47:27', '2019-09-26 10:47:27'),
(764, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-09-26', '16:24:19', '2019-09-26 10:54:19', '2019-09-26 10:54:19'),
(765, 'shared an offer of', 'share', 53, 59, 0, 4, NULL, NULL, '2019-09-26', '16:27:06', '2019-09-26 10:57:06', '2019-09-26 10:57:06'),
(766, 'Perfect Gift', 'redeem_coupon', 0, 10, 0, 4, NULL, NULL, '2019-09-26', '16:31:15', '2019-09-26 11:01:15', '2019-09-26 11:01:15'),
(767, 'Perfect Gift', 'redeem_coupon', 0, 10, 0, 4, NULL, NULL, '2019-09-26', '16:31:21', '2019-09-26 11:01:21', '2019-09-26 11:01:21'),
(768, 'shared an offer of', 'share', 52, 61, 0, 7, NULL, NULL, '2019-09-26', '16:44:26', '2019-09-26 11:14:26', '2019-09-26 11:14:26'),
(769, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-09-26', '23:20:02', '2019-09-26 17:50:02', '2019-09-26 17:50:02'),
(770, 'walkin points added', 'walkin points', 10, 0, 10, 14, NULL, NULL, '2019-09-27', '00:16:58', '2019-09-26 18:46:58', '2019-09-26 18:46:58'),
(771, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-09-28', '20:20:02', '2019-09-28 14:50:02', '2019-09-28 14:50:02'),
(772, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-09-30', '01:21:42', '2019-09-29 19:51:42', '2019-09-29 19:51:42'),
(773, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-09-30', '16:12:29', '2019-09-30 10:42:29', '2019-09-30 10:42:29'),
(774, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-01', '19:58:41', '2019-10-01 14:28:41', '2019-10-01 14:28:41'),
(775, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-10-02', '00:02:28', '2019-10-01 18:32:28', '2019-10-01 18:32:28'),
(776, 'walkin points added', 'walkin points', 49, 0, 49, 7, NULL, NULL, '2019-10-02', '12:33:29', '2019-10-02 07:03:29', '2019-10-02 07:03:29'),
(777, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-10-02', '17:25:32', '2019-10-02 11:55:32', '2019-10-02 11:55:32'),
(778, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-02', '21:16:57', '2019-10-02 15:46:57', '2019-10-02 15:46:57'),
(779, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-10-03', '09:38:46', '2019-10-03 04:08:46', '2019-10-03 04:08:46'),
(780, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-03', '22:49:37', '2019-10-03 17:19:37', '2019-10-03 17:19:37'),
(781, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-05', '02:18:08', '2019-10-04 20:48:08', '2019-10-04 20:48:08'),
(782, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-06', '19:13:49', '2019-10-06 13:43:49', '2019-10-06 13:43:49'),
(783, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-07', '23:17:36', '2019-10-07 17:47:36', '2019-10-07 17:47:36'),
(784, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-10-10', '17:35:49', '2019-10-10 12:05:49', '2019-10-10 12:05:49'),
(785, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-12', '00:19:37', '2019-10-11 18:49:37', '2019-10-11 18:49:37'),
(786, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-10-14', '16:57:47', '2019-10-14 11:27:47', '2019-10-14 11:27:47'),
(787, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-15', '18:41:36', '2019-10-15 13:11:36', '2019-10-15 13:11:36'),
(788, 'walkin points added', 'walkin points', 10, 0, 10, 4, NULL, NULL, '2019-10-17', '01:24:20', '2019-10-16 19:54:20', '2019-10-16 19:54:20'),
(789, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-10-17', '16:16:36', '2019-10-17 10:46:36', '2019-10-17 10:46:36'),
(790, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-10-31', '23:30:38', '2019-10-31 18:00:38', '2019-10-31 18:00:38'),
(791, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-11-02', '18:52:34', '2019-11-02 13:22:34', '2019-11-02 13:22:34'),
(792, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-11-15', '12:13:31', '2019-11-15 06:43:31', '2019-11-15 06:43:31'),
(793, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-11-19', '21:50:52', '2019-11-19 16:20:52', '2019-11-19 16:20:52'),
(794, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-11-20', '13:19:10', '2019-11-20 07:49:10', '2019-11-20 07:49:10'),
(795, 'walkin points added', 'walkin points', 8, 0, 8, 7, NULL, NULL, '2019-11-22', '11:33:23', '2019-11-22 06:03:23', '2019-11-22 06:03:23'),
(796, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2019-11-28', '01:52:08', '2019-11-27 20:22:08', '2019-11-27 20:22:08'),
(797, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2019-12-10', '15:07:59', '2019-12-10 09:37:59', '2019-12-10 09:37:59'),
(798, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2020-01-16', '16:55:17', '2020-01-16 11:25:17', '2020-01-16 11:25:17'),
(799, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-01-20', '20:23:15', '2020-01-20 14:53:15', '2020-01-20 14:53:15'),
(800, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-01-23', '23:48:02', '2020-01-23 18:18:02', '2020-01-23 18:18:02'),
(801, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-01-24', '23:51:15', '2020-01-24 18:21:15', '2020-01-24 18:21:15'),
(802, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-01-26', '01:45:19', '2020-01-25 20:15:19', '2020-01-25 20:15:19'),
(803, 'favorited an offer ', 'favorite_offer', 28, 49, 28, 41, NULL, NULL, '2020-02-09', '20:07:41', '2020-02-09 14:37:41', '2020-02-09 14:37:41'),
(804, 'favorited an offer ', 'favorite_offer', 28, 49, 28, 41, NULL, NULL, '2020-02-09', '20:08:50', '2020-02-09 14:38:50', '2020-02-09 14:38:50'),
(805, 'favorited an offer ', 'favorite_offer', 28, 49, 28, 41, NULL, NULL, '2020-02-09', '20:08:50', '2020-02-09 14:38:50', '2020-02-09 14:38:50'),
(806, 'favorited an offer ', 'favorite_offer', 30, 41, 30, 44, NULL, NULL, '2020-02-09', '20:12:09', '2020-02-09 14:42:09', '2020-02-09 14:42:09'),
(807, 'favorited an offer ', 'favorite_offer', 30, 41, 30, 44, NULL, NULL, '2020-02-09', '20:12:09', '2020-02-09 14:42:09', '2020-02-09 14:42:09'),
(808, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-02-09', '20:26:00', '2020-02-09 14:56:00', '2020-02-09 14:56:00'),
(809, 'favorited an offer ', 'favorite_offer', 28, 49, 28, 41, NULL, NULL, '2020-02-09', '20:59:09', '2020-02-09 15:29:09', '2020-02-09 15:29:09'),
(810, 'favorited a store ', 'favorite_store', 27, 0, 27, 41, NULL, NULL, '2020-02-10', '04:00:34', '2020-02-09 22:30:34', '2020-02-09 22:30:34'),
(811, 'favorited an offer ', 'favorite_offer', 54, 65, 54, 4, NULL, NULL, '2020-02-10', '16:20:09', '2020-02-10 10:50:09', '2020-02-10 10:50:09'),
(812, 'favorited a store ', 'favorite_store', 57, 0, 57, 4, NULL, NULL, '2020-02-10', '16:20:33', '2020-02-10 10:50:33', '2020-02-10 10:50:33'),
(813, 'favorited an offer ', 'favorite_offer', 28, 49, 28, 4, NULL, NULL, '2020-02-10', '16:22:38', '2020-02-10 10:52:38', '2020-02-10 10:52:38'),
(814, 'favorited an offer ', 'favorite_offer', 55, 66, 55, 7, NULL, NULL, '2020-02-10', '16:23:26', '2020-02-10 10:53:26', '2020-02-10 10:53:26'),
(815, 'favorited an offer ', 'favorite_offer', 27, 50, 27, 7, NULL, NULL, '2020-02-10', '16:23:31', '2020-02-10 10:53:31', '2020-02-10 10:53:31'),
(816, 'favorited a store ', 'favorite_store', 27, 0, 27, 7, NULL, NULL, '2020-02-10', '16:24:35', '2020-02-10 10:54:35', '2020-02-10 10:54:35'),
(817, 'favorited a store ', 'favorite_store', 49, 0, 49, 7, NULL, NULL, '2020-02-10', '16:24:39', '2020-02-10 10:54:39', '2020-02-10 10:54:39'),
(818, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-10', '17:55:19', '2020-02-10 12:25:19', '2020-02-10 12:25:19'),
(819, 'shared an offer of', 'share', 27, 50, 0, 4, NULL, NULL, '2020-02-10', '17:57:56', '2020-02-10 12:27:56', '2020-02-10 12:27:56'),
(820, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2020-02-10', '18:28:25', '2020-02-10 12:58:25', '2020-02-10 12:58:25'),
(821, 'favorited a store ', 'favorite_store', 49, 0, 49, 38, NULL, NULL, '2020-02-11', '20:05:37', '2020-02-11 14:35:37', '2020-02-11 14:35:37'),
(822, 'favorited a store ', 'favorite_store', 37, 0, 37, 44, NULL, NULL, '2020-02-12', '21:49:16', '2020-02-12 16:19:16', '2020-02-12 16:19:16'),
(823, 'favorited a store ', 'favorite_store', 30, 0, 30, 44, NULL, NULL, '2020-02-12', '21:49:24', '2020-02-12 16:19:24', '2020-02-12 16:19:24'),
(824, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2020-02-14', '19:01:44', '2020-02-14 13:31:44', '2020-02-14 13:31:44'),
(825, 'walkin points added', 'walkin points', 51, 0, 51, 4, NULL, NULL, '2020-02-14', '19:56:37', '2020-02-14 14:26:37', '2020-02-14 14:26:37'),
(826, 'favorited an offer ', 'favorite_offer', 30, 41, 30, 41, NULL, NULL, '2020-02-15', '07:58:28', '2020-02-15 02:28:28', '2020-02-15 02:28:28'),
(827, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-15', '09:30:55', '2020-02-15 04:00:55', '2020-02-15 04:00:55'),
(828, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-16', '20:05:34', '2020-02-16 14:35:34', '2020-02-16 14:35:34'),
(829, 'walkin points added', 'walkin points', 51, 0, 51, 4, NULL, NULL, '2020-02-17', '15:54:55', '2020-02-17 10:24:55', '2020-02-17 10:24:55'),
(830, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-18', '05:25:08', '2020-02-17 23:55:08', '2020-02-17 23:55:08'),
(831, 'favorited a store ', 'favorite_store', 28, 0, 28, 4, NULL, NULL, '2020-02-19', '00:34:16', '2020-02-18 19:04:16', '2020-02-18 19:04:16'),
(832, 'walkin points added', 'walkin points', 30, 0, 30, 44, NULL, NULL, '2020-02-19', '01:24:38', '2020-02-18 19:54:38', '2020-02-18 19:54:38'),
(833, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-19', '06:06:43', '2020-02-19 00:36:43', '2020-02-19 00:36:43'),
(834, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-02-19', '20:35:53', '2020-02-19 15:05:53', '2020-02-19 15:05:53'),
(835, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-20', '07:58:22', '2020-02-20 02:28:22', '2020-02-20 02:28:22'),
(836, 'favorited an offer ', 'favorite_offer', 42, 43, 42, 38, NULL, NULL, '2020-02-20', '12:34:07', '2020-02-20 07:04:07', '2020-02-20 07:04:07'),
(837, 'favorited an offer ', 'favorite_offer', 27, 50, 27, 38, NULL, NULL, '2020-02-20', '14:44:26', '2020-02-20 09:14:26', '2020-02-20 09:14:26'),
(838, 'favorited a store ', 'favorite_store', 27, 0, 27, 38, NULL, NULL, '2020-02-20', '14:47:48', '2020-02-20 09:17:48', '2020-02-20 09:17:48'),
(839, 'walkin points added', 'walkin points', 55, 0, 55, 41, NULL, NULL, '2020-02-21', '02:32:51', '2020-02-20 21:02:51', '2020-02-20 21:02:51'),
(840, 'walkin points added', 'walkin points', 8, 0, 8, 4, NULL, NULL, '2020-02-21', '12:51:08', '2020-02-21 07:21:08', '2020-02-21 07:21:08'),
(841, 'walkin points added', 'walkin points', 51, 0, 51, 4, NULL, NULL, '2020-02-21', '12:56:14', '2020-02-21 07:26:14', '2020-02-21 07:26:14'),
(842, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-02-21', '19:56:50', '2020-02-21 14:26:50', '2020-02-21 14:26:50'),
(843, 'walkin points added', 'walkin points', 30, 0, 30, 44, NULL, NULL, '2020-02-21', '19:57:49', '2020-02-21 14:27:49', '2020-02-21 14:27:49'),
(844, 'walkin points added', 'walkin points', 55, 0, 55, 41, NULL, NULL, '2020-02-22', '03:48:41', '2020-02-21 22:18:41', '2020-02-21 22:18:41'),
(845, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-22', '05:52:21', '2020-02-22 00:22:21', '2020-02-22 00:22:21'),
(846, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-02-22', '20:05:46', '2020-02-22 14:35:46', '2020-02-22 14:35:46'),
(847, 'walkin points added', 'walkin points', 30, 0, 30, 45, NULL, NULL, '2020-02-22', '20:16:21', '2020-02-22 14:46:21', '2020-02-22 14:46:21'),
(848, 'walkin points added', 'walkin points', 55, 0, 55, 41, NULL, NULL, '2020-02-23', '04:06:37', '2020-02-22 22:36:37', '2020-02-22 22:36:37'),
(849, 'walkin points added', 'walkin points', 30, 0, 30, 41, NULL, NULL, '2020-02-23', '20:29:00', '2020-02-23 14:59:00', '2020-02-23 14:59:00'),
(850, 'walkin points added', 'walkin points', 30, 0, 30, 44, NULL, NULL, '2020-02-23', '20:40:08', '2020-02-23 15:10:08', '2020-02-23 15:10:08'),
(851, 'favorited a store ', 'favorite_store', 49, 0, 49, 38, NULL, NULL, '2020-02-24', '13:49:01', '2020-02-24 08:19:01', '2020-02-24 08:19:01'),
(852, 'walkin points added', 'walkin points', 30, 0, 30, 44, NULL, NULL, '2020-02-25', '02:49:31', '2020-02-24 21:19:31', '2020-02-24 21:19:31'),
(853, 'walkin points added', 'walkin points', 55, 0, 55, 41, NULL, NULL, '2020-02-25', '03:03:08', '2020-02-24 21:33:08', '2020-02-24 21:33:08'),
(854, 'walkin points added', 'walkin points', 57, 0, 57, 41, NULL, NULL, '2020-02-25', '06:16:41', '2020-02-25 00:46:41', '2020-02-25 00:46:41'),
(855, 'walkin points added', 'walkin points', 30, 0, 30, 51, NULL, NULL, '2020-02-25', '22:42:24', '2020-02-25 17:12:24', '2020-02-25 17:12:24'),
(856, 'walkin points added', 'walkin points', 30, 0, 30, 52, NULL, NULL, '2020-02-26', '00:15:19', '2020-02-25 18:45:19', '2020-02-25 18:45:19'),
(857, 'walkin points added', 'walkin points', 55, 0, 55, 50, NULL, NULL, '2020-02-26', '02:02:43', '2020-02-25 20:32:43', '2020-02-25 20:32:43'),
(858, 'walkin points added', 'walkin points', 30, 0, 30, 50, NULL, NULL, '2020-02-26', '19:57:28', '2020-02-26 14:27:28', '2020-02-26 14:27:28'),
(859, 'walkin points added', 'walkin points', 57, 0, 57, 50, NULL, NULL, '2020-02-27', '05:18:58', '2020-02-26 23:48:58', '2020-02-26 23:48:58'),
(860, 'walkin points added', 'walkin points', 30, 0, 30, 50, NULL, NULL, '2020-02-27', '20:26:40', '2020-02-27 14:56:40', '2020-02-27 14:56:40'),
(861, 'walkin points added', 'walkin points', 57, 0, 57, 50, NULL, NULL, '2020-03-01', '18:19:35', '2020-03-01 12:49:35', '2020-03-01 12:49:35'),
(862, 'walkin points added', 'walkin points', 30, 0, 30, 50, NULL, NULL, '2020-03-01', '19:42:25', '2020-03-01 14:12:25', '2020-03-01 14:12:25'),
(863, 'walkin points added', 'walkin points', 30, 0, 30, 52, NULL, NULL, '2020-03-01', '19:43:43', '2020-03-01 14:13:43', '2020-03-01 14:13:43'),
(864, 'walkin points added', 'walkin points', 55, 0, 55, 50, NULL, NULL, '2020-03-02', '20:25:30', '2020-03-02 14:55:30', '2020-03-02 14:55:30'),
(865, 'walkin points added', 'walkin points', 55, 0, 55, 52, NULL, NULL, '2020-03-02', '20:51:38', '2020-03-02 15:21:38', '2020-03-02 15:21:38'),
(866, 'walkin points added', 'walkin points', 30, 0, 30, 51, NULL, NULL, '2020-03-03', '20:16:05', '2020-03-03 14:46:05', '2020-03-03 14:46:05'),
(867, 'walkin points added', 'walkin points', 55, 0, 55, 50, NULL, NULL, '2020-03-03', '21:16:27', '2020-03-03 15:46:27', '2020-03-03 15:46:27'),
(868, 'walkin points added', 'walkin points', 57, 0, 57, 50, NULL, NULL, '2020-03-04', '07:19:13', '2020-03-04 01:49:13', '2020-03-04 01:49:13'),
(869, 'walkin points added', 'walkin points', 30, 0, 30, 50, NULL, NULL, '2020-03-04', '20:04:13', '2020-03-04 14:34:13', '2020-03-04 14:34:13'),
(870, 'walkin points added', 'walkin points', 30, 0, 30, 52, NULL, NULL, '2020-03-04', '20:18:24', '2020-03-04 14:48:24', '2020-03-04 14:48:24'),
(871, 'walkin points added', 'walkin points', 55, 0, 55, 50, NULL, NULL, '2020-03-05', '03:23:50', '2020-03-04 21:53:50', '2020-03-04 21:53:50'),
(872, 'walkin points added', 'walkin points', 57, 0, 57, 50, NULL, NULL, '2020-03-05', '07:48:42', '2020-03-05 02:18:42', '2020-03-05 02:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `T_AppShare`
--

CREATE TABLE `T_AppShare` (
  `app_share_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `share_type` varchar(20) DEFAULT NULL,
  `key_1` varchar(20) DEFAULT NULL,
  `key_2` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_AssignBeacon`
--

CREATE TABLE `T_AssignBeacon` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `beacon_name` varchar(255) NOT NULL,
  `point_x` int(11) NOT NULL,
  `point_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_AssignBeacon`
--

INSERT INTO `T_AssignBeacon` (`id`, `space_id`, `beacon_name`, `point_x`, `point_y`) VALUES
(19, 5, 'v6fF', 629, 409),
(20, 5, 'aXRS', 353, 98),
(21, 1, 'cfot', 329, 357),
(22, 1, 'Y0Rn', 492, 69),
(23, 1, '7Gyl', 659, 313),
(32, 2, 'yFch', 289, 336),
(33, 2, 'v6fF', 577, 112),
(34, 6, 'aXRS', 576, 328),
(35, 6, 'v6fF', 322, 190),
(50, 4, '0gEq', 339, 103),
(51, 4, 'IbhZ', 254, 406),
(52, 8, 'yFch', 187, 93),
(53, 8, 'L2aR', 952, 340),
(56, 9, 'v6fF', 145, 324),
(57, 9, 'aXRS', 484, 327),
(58, 10, 'v6fF', 240, 246),
(59, 10, 'aXRS', 526, 249),
(68, 11, 'yFch', 865, 36),
(69, 11, 'L2aR', 938, 49),
(70, 11, 'v6fF', 529, 227),
(71, 11, 'aXRS', 529, 411),
(80, 12, 'aXRS', 887, 50),
(81, 12, 'v6fF', 951, 48),
(82, 12, 'EF03', 450, 439),
(83, 12, '39DE', 558, 294),
(84, 13, 'sImO', 202, 373),
(85, 13, 'IbhZ', 490, 260),
(86, 14, 'L2aR', 515, 442),
(87, 14, 'yFch', 487, 258),
(88, 15, '6E7F', 399, 253),
(89, 15, '6E7D', 548, 205),
(90, 17, 'aXRS', 273, 307),
(91, 17, 'v6fF', 470, 301);

-- --------------------------------------------------------

--
-- Table structure for table `T_Beacon`
--

CREATE TABLE `T_Beacon` (
  `beacon_id` int(30) NOT NULL,
  `store_id` int(20) DEFAULT NULL,
  `beacon_key` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `uuid` varchar(50) DEFAULT NULL,
  `major_value` double DEFAULT NULL,
  `minor_value` double DEFAULT NULL,
  `notification _title` varchar(50) DEFAULT NULL,
  `notification_text` text,
  `beacon_status` int(20) NOT NULL DEFAULT '0',
  `assigned_to_store` int(30) NOT NULL DEFAULT '0',
  `already_assigned` int(30) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Beacon`
--

INSERT INTO `T_Beacon` (`beacon_id`, `store_id`, `beacon_key`, `name`, `uuid`, `major_value`, `minor_value`, `notification _title`, `notification_text`, `beacon_status`, `assigned_to_store`, `already_assigned`, `created_date`, `last_updated_date`) VALUES
(1, NULL, 'L2aR', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 8654, 40321, NULL, NULL, 0, 50, 0, '2018-09-20 11:54:18', '2019-09-02 06:05:14'),
(2, NULL, 'IbhZ', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 22143, 52826, NULL, NULL, 0, 49, 0, '2018-09-20 11:54:18', '2019-08-13 08:03:45'),
(3, NULL, 'sImO', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 10304, 7788, NULL, NULL, 0, 49, 0, '2018-09-20 11:54:18', '2019-08-13 08:03:45'),
(4, NULL, 'Y0Rn', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 53273, 38057, NULL, NULL, 0, 8, 0, '2018-09-20 11:54:18', '2018-09-20 12:24:12'),
(5, NULL, '0gEq', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 38639, 62333, NULL, NULL, 0, 51, 0, '2018-09-20 11:54:18', '2020-02-14 14:20:09'),
(6, NULL, 'aXRS', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0894e', 17104, 61933, NULL, NULL, 0, 30, 0, '2018-09-20 11:54:18', '2020-02-18 18:32:33'),
(7, NULL, 'cfot', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 58609, 60661, NULL, NULL, 0, 8, 0, '2018-09-20 11:54:18', '2018-09-20 12:24:08'),
(9, NULL, 'v6fF', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 33635, 8536, NULL, NULL, 0, 30, 0, '2018-09-20 11:54:18', '2020-02-18 18:32:32'),
(11, NULL, 'yFch', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 33634, 8536, NULL, NULL, 0, 50, 0, '2018-09-30 17:21:27', '2019-09-02 06:06:11'),
(13, NULL, '7Gyl', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 32383, 21041, NULL, NULL, 0, 8, 0, '2018-10-05 12:23:23', '2018-10-30 11:36:49'),
(14, NULL, 'yM0n', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 33383, 22041, NULL, NULL, 0, 7, 0, '2019-04-02 11:10:30', '2019-04-02 11:12:23'),
(15, NULL, 'Bill0', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 33382, 22040, NULL, NULL, 0, 7, 0, '2019-04-02 11:11:13', '2019-04-02 11:12:05'),
(17, NULL, '6E7D', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 1, 2, NULL, NULL, 0, 51, 0, '2019-05-13 12:06:38', '2019-09-03 10:15:49'),
(18, NULL, '6E7F', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 3, 2, NULL, NULL, 0, 51, 0, '2019-05-13 12:21:11', '2019-09-03 10:15:49'),
(19, NULL, '39DE', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 5, 2, NULL, NULL, 0, 10, 0, '2019-05-23 03:33:22', '2019-09-10 11:05:22'),
(20, NULL, 'EF03', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 4, 2, NULL, NULL, 0, 10, 0, '2019-05-23 03:34:31', '2019-09-10 11:05:22'),
(21, NULL, '6F24', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 6, 2, NULL, NULL, 0, 53, 0, '2019-09-19 17:47:26', '2019-09-19 18:12:30'),
(22, NULL, '6F25', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 7, 2, NULL, NULL, 0, 53, 0, '2019-09-19 17:48:49', '2019-09-19 18:12:29'),
(23, NULL, '1uJA', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 48860, 51703, NULL, NULL, 0, 57, 0, '2020-02-17 12:08:40', '2020-02-17 18:24:10'),
(24, NULL, '7oBp', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 12260, 37362, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(25, NULL, 'wd2g', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 2195, 30918, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(26, NULL, '56jq', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 11344, 32574, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(27, NULL, 'g2oU', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 48960, 31444, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(28, NULL, 'VOEs', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 2376, 13239, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(29, NULL, 'Etff', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 8619, 7629, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(30, NULL, 'YH5q', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 61033, 38350, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(31, NULL, 'RKtn', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 23327, 12215, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(32, NULL, 'nlPb', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 42440, 35775, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(33, NULL, '0Sf5', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 53493, 22320, NULL, NULL, 0, 57, 0, '2020-02-17 12:08:40', '2020-02-17 18:20:14'),
(34, NULL, 'ynrc', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 51378, 21342, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(35, NULL, 'MTTK', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 28429, 18076, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(36, NULL, 'aU3e', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 43391, 61134, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(37, NULL, 'GnzC', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 17401, 47033, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(38, NULL, '6xv7', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 16071, 43362, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(39, NULL, 'FQ01', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 6076, 6365, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(40, NULL, 'ffdf', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 55337, 27376, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(41, NULL, 'qMDz', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 3029, 49078, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(42, NULL, 'bQxS', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 30994, 21560, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(43, NULL, 'hQzh', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 49489, 1235, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(44, NULL, 'dj2i', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 22000, 37169, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(45, NULL, 'Rgqr', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 38302, 59831, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(46, NULL, 'jdoK', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 15844, 55768, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(47, NULL, 'ElBU', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 18776, 39991, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(48, NULL, 'LHys', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 33692, 48635, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(49, NULL, 'j14D', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 34879, 33019, NULL, NULL, 0, 55, 0, '2020-02-17 12:08:40', '2020-02-19 03:17:04'),
(50, NULL, 'qFbX', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 44670, 1639, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40'),
(51, NULL, 'A8gy', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 26356, 63891, NULL, NULL, 0, 55, 0, '2020-02-17 12:08:40', '2020-02-19 03:17:03'),
(52, NULL, 'Ym0R', '', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', 51665, 59089, NULL, NULL, 0, 0, 0, '2020-02-17 12:08:40', '2020-02-17 12:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `T_BeaconActivity`
--

CREATE TABLE `T_BeaconActivity` (
  `beacon_activity_id` int(30) NOT NULL,
  `beacon_id` int(30) DEFAULT NULL,
  `beacon_key` varchar(50) DEFAULT NULL,
  `beacon_place` varchar(50) DEFAULT NULL,
  `user_id` int(30) NOT NULL,
  `store_id` int(20) DEFAULT NULL,
  `detected_date` date NOT NULL,
  `detected_time` time NOT NULL,
  `exit_date` date NOT NULL,
  `exit_time` time NOT NULL,
  `total_spent_time` float DEFAULT NULL,
  `flag_of_inside_store` varchar(30) DEFAULT NULL,
  `flag_of_detection` varchar(50) DEFAULT NULL,
  `active` int(5) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_BeaconActivity`
--

INSERT INTO `T_BeaconActivity` (`beacon_activity_id`, `beacon_id`, `beacon_key`, `beacon_place`, `user_id`, `store_id`, `detected_date`, `detected_time`, `exit_date`, `exit_time`, `total_spent_time`, `flag_of_inside_store`, `flag_of_detection`, `active`, `created_date`, `last_updated_date`) VALUES
(1, 0, '', '', 5, 8, '2018-09-20', '18:01:02', '2018-09-20', '18:01:02', NULL, 'inside_detection', 'detected', 0, '2018-09-20 18:01:01', '2018-09-20 12:31:02'),
(2, 0, '', '', 4, 8, '2018-09-20', '18:05:50', '2018-09-20', '18:05:50', NULL, 'inside_detection', 'detected', 0, '2018-09-20 18:05:49', '2018-09-20 12:35:50'),
(3, 0, '', '', 1, 8, '2018-09-20', '18:06:12', '2018-09-20', '18:06:12', NULL, 'inside_detection', 'detected', 0, '2018-09-20 18:06:14', '2018-09-20 12:36:12'),
(4, 0, '', '', 2, 8, '2018-09-20', '18:07:35', '2018-09-20', '18:07:35', NULL, 'inside_detection', 'detected', 0, '2018-09-20 18:07:34', '2018-09-20 12:37:35'),
(5, 0, '', '', 6, 8, '2018-09-21', '10:54:19', '2018-09-21', '10:54:19', NULL, 'inside_detection', 'detected', 0, '2018-09-21 10:54:17', '2018-09-21 05:24:19'),
(6, 0, '', '', 3, 8, '2018-09-21', '15:14:16', '2018-09-21', '15:14:16', NULL, 'inside_detection', 'detected', 0, '2018-09-21 15:14:15', '2018-09-21 09:44:16'),
(7, 0, '', '', 3, 8, '2018-09-24', '10:01:35', '2018-09-24', '10:01:35', NULL, 'inside_detection', 'detected', 0, '2018-09-24 10:01:33', '2018-09-24 04:31:35'),
(8, 0, '', '', 2, 8, '2018-09-24', '10:59:07', '2018-09-24', '10:59:07', NULL, 'inside_detection', 'detected', 0, '2018-09-24 10:59:07', '2018-09-24 05:29:07'),
(9, 0, '', '', 1, 8, '2018-09-24', '14:53:36', '2018-09-24', '14:53:36', NULL, 'inside_detection', 'detected', 0, '2018-09-24 14:53:38', '2018-09-24 09:23:36'),
(10, 0, '', '', 4, 8, '2018-09-24', '16:51:51', '2018-09-24', '16:51:51', NULL, 'inside_detection', 'detected', 0, '2018-09-24 16:51:50', '2018-09-24 11:21:51'),
(11, 0, '', '', 4, 10, '2018-09-24', '23:43:20', '2018-09-24', '23:43:20', NULL, 'inside_detection', 'detected', 0, '2018-09-24 23:43:21', '2018-09-24 18:13:20'),
(12, 0, '', '', 2, 8, '2018-09-25', '11:12:10', '2018-09-25', '11:12:10', NULL, 'inside_detection', 'detected', 0, '2018-09-25 11:12:10', '2018-09-25 05:42:10'),
(13, 0, '', '', 9, 8, '2018-09-25', '12:03:20', '2018-09-25', '12:03:20', NULL, 'inside_detection', 'detected', 0, '2018-09-25 12:08:23', '2018-09-25 06:33:20'),
(14, 0, '', '', 11, 8, '2018-09-25', '14:40:35', '2018-09-25', '14:40:35', NULL, 'inside_detection', 'detected', 0, '2018-09-25 14:40:35', '2018-09-25 09:10:35'),
(15, 0, '', '', 10, 8, '2018-09-25', '16:24:29', '2018-09-25', '16:24:29', NULL, 'inside_detection', 'detected', 0, '2018-09-25 16:25:19', '2018-09-25 10:54:29'),
(16, 0, '', '', 3, 8, '2018-09-25', '16:39:42', '2018-09-25', '16:39:42', NULL, 'inside_detection', 'detected', 0, '2018-09-25 16:39:42', '2018-09-25 11:09:42'),
(17, 0, '', '', 6, 8, '2018-09-25', '16:44:00', '2018-09-25', '16:44:00', NULL, 'inside_detection', 'detected', 0, '2018-09-25 16:43:56', '2018-09-25 11:14:00'),
(18, 0, '', '', 4, 8, '2018-09-25', '18:05:43', '2018-09-25', '18:05:43', NULL, 'inside_detection', 'detected', 0, '2018-09-25 18:05:43', '2018-09-25 12:35:43'),
(19, 0, '', '', 4, 10, '2018-09-26', '00:04:01', '2018-09-26', '00:04:01', NULL, 'inside_detection', 'detected', 0, '2018-09-26 00:04:01', '2018-09-25 18:34:01'),
(20, 0, '', '', 2, 8, '2018-09-26', '11:50:27', '2018-09-26', '11:50:27', NULL, 'inside_detection', 'detected', 0, '2018-09-26 11:50:27', '2018-09-26 06:20:27'),
(21, 0, '', '', 3, 9, '2018-09-26', '13:09:23', '2018-09-26', '13:09:23', NULL, 'inside_detection', 'detected', 0, '2018-09-26 13:09:23', '2018-09-26 07:39:23'),
(22, 0, '', '', 8, 9, '2018-09-26', '13:11:22', '2018-09-26', '13:11:22', NULL, 'inside_detection', 'detected', 0, '2018-09-26 13:11:20', '2018-09-26 07:41:22'),
(23, 0, '', '', 13, 9, '2018-09-26', '13:12:04', '2018-09-26', '13:12:04', NULL, 'inside_detection', 'detected', 0, '2018-09-26 13:11:57', '2018-09-26 07:42:04'),
(24, 0, '', '', 7, 9, '2018-09-26', '13:16:18', '2018-09-26', '13:16:18', NULL, 'inside_detection', 'detected', 0, '2018-09-26 13:16:18', '2018-09-26 07:46:18'),
(25, 0, '', '', 2, 9, '2018-09-26', '13:27:09', '2018-09-26', '13:27:09', NULL, 'inside_detection', 'detected', 0, '2018-09-26 13:27:09', '2018-09-26 07:57:09'),
(26, 0, '', '', 8, 8, '2018-09-26', '13:56:22', '2018-09-26', '13:56:22', NULL, 'inside_detection', 'detected', 0, '2018-09-26 13:56:21', '2018-09-26 08:26:22'),
(27, 0, '', '', 4, 9, '2018-09-26', '15:47:36', '2018-09-26', '15:47:36', NULL, 'inside_detection', 'detected', 0, '2018-09-26 15:47:36', '2018-09-26 10:17:36'),
(28, 0, '', '', 10, 9, '2018-09-26', '16:15:00', '2018-09-26', '16:15:00', NULL, 'inside_detection', 'detected', 0, '2018-09-26 16:15:52', '2018-09-26 10:45:00'),
(29, 0, '', '', 7, 8, '2018-09-26', '16:32:53', '2018-09-26', '16:32:53', NULL, 'inside_detection', 'detected', 0, '2018-09-26 16:32:52', '2018-09-26 11:02:53'),
(30, 0, '', '', 10, 8, '2018-09-26', '17:05:24', '2018-09-26', '17:05:24', NULL, 'inside_detection', 'detected', 0, '2018-09-26 17:06:16', '2018-09-26 11:35:24'),
(31, 0, '', '', 6, 8, '2018-09-26', '18:02:00', '2018-09-26', '18:02:00', NULL, 'inside_detection', 'detected', 0, '2018-09-26 18:01:59', '2018-09-26 12:32:00'),
(32, 0, '', '', 4, 8, '2018-09-26', '18:40:45', '2018-09-26', '18:40:45', NULL, 'inside_detection', 'detected', 0, '2018-09-26 18:40:45', '2018-09-26 13:10:45'),
(33, 0, '', '', 4, 10, '2018-09-27', '00:11:37', '2018-09-27', '00:11:37', NULL, 'inside_detection', 'detected', 0, '2018-09-27 00:11:36', '2018-09-26 18:41:37'),
(34, 0, '', '', 3, 8, '2018-09-27', '11:49:20', '2018-09-27', '11:49:20', NULL, 'inside_detection', 'detected', 0, '2018-09-27 11:49:20', '2018-09-27 06:19:20'),
(35, 0, '', '', 2, 8, '2018-09-27', '12:13:17', '2018-09-27', '12:13:17', NULL, 'inside_detection', 'detected', 0, '2018-09-27 12:13:16', '2018-09-27 06:43:17'),
(36, 0, '', '', 13, 8, '2018-09-27', '15:25:29', '2018-09-27', '15:25:29', NULL, 'inside_detection', 'detected', 0, '2018-09-27 15:25:29', '2018-09-27 09:55:29'),
(37, 0, '', '', 8, 9, '2018-09-27', '15:33:07', '2018-09-27', '15:33:07', NULL, 'inside_detection', 'detected', 0, '2018-09-27 15:33:05', '2018-09-27 10:03:07'),
(38, 0, '', '', 13, 9, '2018-09-27', '16:03:08', '2018-09-27', '16:03:08', NULL, 'inside_detection', 'detected', 0, '2018-09-27 16:03:07', '2018-09-27 10:33:08'),
(39, 0, '', '', 9, 8, '2018-09-27', '16:22:33', '2018-09-27', '16:22:33', NULL, 'inside_detection', 'detected', 0, '2018-09-27 16:27:37', '2018-09-27 10:52:33'),
(40, 0, '', '', 4, 9, '2018-09-27', '16:43:13', '2018-09-27', '16:43:13', NULL, 'inside_detection', 'detected', 0, '2018-09-27 16:43:12', '2018-09-27 11:13:13'),
(41, 0, '', '', 10, 9, '2018-09-27', '17:09:12', '2018-09-27', '17:09:12', NULL, 'inside_detection', 'detected', 0, '2018-09-27 17:10:05', '2018-09-27 11:39:12'),
(42, 0, '', '', 10, 8, '2018-09-27', '18:08:57', '2018-09-27', '18:08:57', NULL, 'inside_detection', 'detected', 0, '2018-09-27 18:08:26', '2018-09-27 12:38:57'),
(43, 0, '', '', 4, 8, '2018-09-27', '19:01:10', '2018-09-27', '19:01:10', NULL, 'inside_detection', 'detected', 0, '2018-09-27 19:01:09', '2018-09-27 13:31:10'),
(44, 0, '', '', 4, 20, '2018-09-27', '19:53:56', '2018-09-27', '19:53:56', NULL, 'inside_detection', 'detected', 0, '2018-09-27 19:53:55', '2018-09-27 14:23:56'),
(45, 0, '', '', 6, 8, '2018-09-28', '11:12:59', '2018-09-28', '11:12:59', NULL, 'inside_detection', 'detected', 0, '2018-09-28 11:12:58', '2018-09-28 05:42:59'),
(46, 0, '', '', 2, 8, '2018-09-28', '12:46:04', '2018-09-28', '12:46:04', NULL, 'inside_detection', 'detected', 0, '2018-09-28 12:46:04', '2018-09-28 07:16:04'),
(47, 0, '', '', 2, 9, '2018-09-28', '12:52:00', '2018-09-28', '12:52:00', NULL, 'inside_detection', 'detected', 0, '2018-09-28 12:51:59', '2018-09-28 07:22:00'),
(48, 0, '', '', 7, 8, '2018-09-28', '13:02:23', '2018-09-28', '13:02:23', NULL, 'inside_detection', 'detected', 0, '2018-09-28 13:02:22', '2018-09-28 07:32:23'),
(49, 0, '', '', 3, 9, '2018-09-28', '13:04:18', '2018-09-28', '13:04:18', NULL, 'inside_detection', 'detected', 0, '2018-09-28 13:04:17', '2018-09-28 07:34:18'),
(50, 0, '', '', 3, 8, '2018-09-28', '13:14:59', '2018-09-28', '13:14:59', NULL, 'inside_detection', 'detected', 0, '2018-09-28 13:14:58', '2018-09-28 07:44:59'),
(51, 0, '', '', 14, 8, '2018-09-28', '13:46:30', '2018-09-28', '13:46:30', NULL, 'inside_detection', 'detected', 0, '2018-09-28 13:46:28', '2018-09-28 08:16:30'),
(52, 0, '', '', 15, 8, '2018-09-28', '17:01:20', '2018-09-28', '17:01:20', NULL, 'inside_detection', 'detected', 0, '2018-09-28 17:01:19', '2018-09-28 11:31:20'),
(53, 0, '', '', 4, 9, '2018-09-28', '17:28:10', '2018-09-28', '17:28:10', NULL, 'inside_detection', 'detected', 0, '2018-09-28 17:28:09', '2018-09-28 11:58:10'),
(54, 0, '', '', 4, 8, '2018-09-28', '19:28:47', '2018-09-28', '19:28:47', NULL, 'inside_detection', 'detected', 0, '2018-09-28 19:28:45', '2018-09-28 13:58:47'),
(55, 0, '', '', 14, 9, '2018-09-29', '15:48:18', '2018-09-29', '15:48:18', NULL, 'inside_detection', 'detected', 0, '2018-09-29 15:48:18', '2018-09-29 10:18:18'),
(56, 0, '', '', 15, 9, '2018-09-29', '15:52:35', '2018-09-29', '15:52:35', NULL, 'inside_detection', 'detected', 0, '2018-09-29 15:52:34', '2018-09-29 10:22:35'),
(57, 0, '', '', 17, 20, '2018-09-29', '18:58:30', '2018-09-29', '18:58:30', NULL, 'inside_detection', 'detected', 0, '2018-09-29 18:58:29', '2018-09-29 13:28:30'),
(58, 0, '', '', 17, 20, '2018-09-30', '23:34:32', '2018-09-30', '23:34:32', NULL, 'inside_detection', 'detected', 0, '2018-09-30 23:34:30', '2018-09-30 18:04:32'),
(59, 0, '', '', 2, 8, '2018-10-01', '11:10:59', '2018-10-01', '11:10:59', NULL, 'inside_detection', 'detected', 0, '2018-10-01 11:10:58', '2018-10-01 05:40:59'),
(60, 0, '', '', 3, 8, '2018-10-01', '12:23:47', '2018-10-01', '12:23:47', NULL, 'inside_detection', 'detected', 0, '2018-10-01 12:23:46', '2018-10-01 06:53:47'),
(61, 0, '', '', 6, 8, '2018-10-01', '12:24:41', '2018-10-01', '12:24:41', NULL, 'inside_detection', 'detected', 0, '2018-10-01 12:24:39', '2018-10-01 06:54:41'),
(62, 0, '', '', 13, 8, '2018-10-01', '17:16:34', '2018-10-01', '17:16:34', NULL, 'inside_detection', 'detected', 0, '2018-10-01 17:16:33', '2018-10-01 11:46:34'),
(63, 0, '', '', 10, 8, '2018-10-01', '18:06:58', '2018-10-01', '18:06:58', NULL, 'inside_detection', 'detected', 0, '2018-10-01 18:07:58', '2018-10-01 12:36:58'),
(64, 0, '', '', 14, 8, '2018-10-01', '18:10:47', '2018-10-01', '18:10:47', NULL, 'inside_detection', 'detected', 0, '2018-10-01 18:10:44', '2018-10-01 12:40:47'),
(65, 0, '', '', 4, 8, '2018-10-01', '18:46:30', '2018-10-01', '18:46:30', NULL, 'inside_detection', 'detected', 0, '2018-10-01 18:46:30', '2018-10-01 13:16:30'),
(66, 0, '', '', 15, 10, '2018-10-02', '01:06:17', '2018-10-02', '01:06:17', NULL, 'inside_detection', 'detected', 0, '2018-10-02 01:06:14', '2018-10-01 19:36:17'),
(67, 0, '', '', 2, 8, '2018-10-02', '11:26:25', '2018-10-02', '11:26:25', NULL, 'inside_detection', 'detected', 0, '2018-10-02 11:26:25', '2018-10-02 05:56:25'),
(68, 0, '', '', 3, 8, '2018-10-02', '12:39:26', '2018-10-02', '12:39:26', NULL, 'inside_detection', 'detected', 0, '2018-10-02 12:39:25', '2018-10-02 07:09:26'),
(69, 0, '', '', 3, 9, '2018-10-02', '13:33:33', '2018-10-02', '13:33:33', NULL, 'inside_detection', 'detected', 0, '2018-10-02 13:33:33', '2018-10-02 08:03:33'),
(70, 0, '', '', 6, 8, '2018-10-02', '14:18:14', '2018-10-02', '14:18:14', NULL, 'inside_detection', 'detected', 0, '2018-10-02 14:18:12', '2018-10-02 08:48:14'),
(71, 0, '', '', 10, 8, '2018-10-02', '18:20:55', '2018-10-02', '18:20:55', NULL, 'inside_detection', 'detected', 0, '2018-10-02 18:21:56', '2018-10-02 12:50:55'),
(72, 0, '', '', 4, 9, '2018-10-02', '18:30:56', '2018-10-02', '18:30:56', NULL, 'inside_detection', 'detected', 0, '2018-10-02 18:30:55', '2018-10-02 13:00:56'),
(73, 0, '', '', 4, 8, '2018-10-02', '21:20:32', '2018-10-02', '21:20:32', NULL, 'inside_detection', 'detected', 0, '2018-10-02 21:20:31', '2018-10-02 15:50:32'),
(74, 0, '', '', 17, 20, '2018-10-02', '22:38:51', '2018-10-02', '22:38:51', NULL, 'inside_detection', 'detected', 0, '2018-10-02 22:38:49', '2018-10-02 17:08:51'),
(75, 0, '', '', 14, 10, '2018-10-03', '09:49:39', '2018-10-03', '09:49:39', NULL, 'inside_detection', 'detected', 0, '2018-10-03 09:49:38', '2018-10-03 04:19:39'),
(76, 0, '', '', 2, 8, '2018-10-03', '11:32:35', '2018-10-03', '11:32:35', NULL, 'inside_detection', 'detected', 0, '2018-10-03 11:32:34', '2018-10-03 06:02:35'),
(77, 0, '', '', 6, 8, '2018-10-03', '15:12:05', '2018-10-03', '15:12:05', NULL, 'inside_detection', 'detected', 0, '2018-10-03 15:12:04', '2018-10-03 09:42:05'),
(78, 0, '', '', 3, 8, '2018-10-03', '16:33:07', '2018-10-03', '16:33:07', NULL, 'inside_detection', 'detected', 0, '2018-10-03 16:33:06', '2018-10-03 11:03:07'),
(79, 0, '', '', 9, 8, '2018-10-03', '16:40:48', '2018-10-03', '16:40:48', NULL, 'inside_detection', 'detected', 0, '2018-10-03 16:45:55', '2018-10-03 11:10:48'),
(80, 0, '', '', 7, 8, '2018-10-04', '11:27:36', '2018-10-04', '11:27:36', NULL, 'inside_detection', 'detected', 0, '2018-10-04 11:27:35', '2018-10-04 05:57:36'),
(81, 0, '', '', 10, 8, '2018-10-04', '12:32:38', '2018-10-04', '12:32:38', NULL, 'inside_detection', 'detected', 0, '2018-10-04 12:33:42', '2018-10-04 07:02:38'),
(82, 0, '', '', 3, 9, '2018-10-04', '14:43:28', '2018-10-04', '14:43:28', NULL, 'inside_detection', 'detected', 0, '2018-10-04 14:43:27', '2018-10-04 09:13:28'),
(83, 0, '', '', 2, 8, '2018-10-04', '14:54:36', '2018-10-04', '14:54:36', NULL, 'inside_detection', 'detected', 0, '2018-10-04 14:54:35', '2018-10-04 09:24:36'),
(84, 0, '', '', 6, 8, '2018-10-04', '16:11:26', '2018-10-04', '16:11:26', NULL, 'inside_detection', 'detected', 0, '2018-10-04 16:11:23', '2018-10-04 10:41:26'),
(85, 0, '', '', 3, 8, '2018-10-04', '17:03:28', '2018-10-04', '17:03:28', NULL, 'inside_detection', 'detected', 0, '2018-10-04 17:03:27', '2018-10-04 11:33:28'),
(86, 0, '', '', 8, 8, '2018-10-04', '17:20:30', '2018-10-04', '17:20:30', NULL, 'inside_detection', 'detected', 0, '2018-10-04 17:20:29', '2018-10-04 11:50:30'),
(87, 0, '', '', 4, 8, '2018-10-04', '18:50:09', '2018-10-04', '18:50:09', NULL, 'inside_detection', 'detected', 0, '2018-10-04 18:50:07', '2018-10-04 13:20:09'),
(88, 0, '', '', 17, 20, '2018-10-04', '22:33:09', '2018-10-04', '22:33:09', NULL, 'inside_detection', 'detected', 0, '2018-10-04 22:33:08', '2018-10-04 17:03:09'),
(89, 0, '', '', 10, 8, '2018-10-05', '14:18:04', '2018-10-05', '14:18:04', NULL, 'inside_detection', 'detected', 0, '2018-10-05 14:19:09', '2018-10-05 08:48:04'),
(90, 0, '', '', 2, 8, '2018-10-05', '15:34:14', '2018-10-05', '15:34:14', NULL, 'inside_detection', 'detected', 0, '2018-10-05 15:34:14', '2018-10-05 10:04:14'),
(91, 0, '', '', 6, 8, '2018-10-05', '16:52:44', '2018-10-05', '16:52:44', NULL, 'inside_detection', 'detected', 0, '2018-10-07 16:52:43', '2018-10-05 11:22:44'),
(92, 0, '', '', 3, 8, '2018-10-05', '17:23:52', '2018-10-05', '17:23:52', NULL, 'inside_detection', 'detected', 0, '2018-10-05 17:23:52', '2018-10-05 11:53:52'),
(93, 0, '', '', 4, 10, '2018-10-05', '20:52:15', '2018-10-05', '20:52:15', NULL, 'inside_detection', 'detected', 0, '2018-10-05 20:52:13', '2018-10-05 15:22:15'),
(94, 0, '', '', 14, 10, '2018-10-06', '03:48:29', '2018-10-06', '03:48:29', NULL, 'inside_detection', 'detected', 0, '2018-10-06 03:48:26', '2018-10-05 22:18:29'),
(95, 0, '', '', 4, 10, '2018-10-07', '01:25:00', '2018-10-07', '01:25:00', NULL, 'inside_detection', 'detected', 0, '2018-10-07 01:24:56', '2018-10-06 19:55:00'),
(96, 0, '', '', 17, 20, '2018-10-07', '10:42:17', '2018-10-07', '10:42:17', NULL, 'inside_detection', 'detected', 0, '2018-10-07 10:42:16', '2018-10-07 05:12:17'),
(97, 0, '', '', 18, 20, '2018-10-07', '22:00:00', '2018-10-07', '22:00:00', NULL, 'inside_detection', 'detected', 0, '2018-10-07 21:59:59', '2018-10-07 16:30:00'),
(98, 0, '', '', 4, 20, '2018-10-07', '22:07:51', '2018-10-07', '22:07:51', NULL, 'inside_detection', 'detected', 0, '2018-10-07 22:07:50', '2018-10-07 16:37:51'),
(99, 0, '', '', 14, 10, '2018-10-08', '00:39:29', '2018-10-08', '00:39:29', NULL, 'inside_detection', 'detected', 0, '2018-10-08 00:39:27', '2018-10-07 19:09:29'),
(100, 0, '', '', 15, 10, '2018-10-08', '01:01:01', '2018-10-08', '01:01:01', NULL, 'inside_detection', 'detected', 0, '2018-10-08 01:00:59', '2018-10-07 19:31:01'),
(101, 0, '', '', 4, 10, '2018-10-08', '10:38:50', '2018-10-08', '10:38:50', NULL, 'inside_detection', 'detected', 0, '2018-10-08 10:38:50', '2018-10-08 05:08:50'),
(102, 0, '', '', 3, 8, '2018-10-08', '10:49:14', '2018-10-08', '10:49:14', NULL, 'inside_detection', 'detected', 0, '2018-10-08 10:49:14', '2018-10-08 05:19:14'),
(103, 0, '', '', 2, 8, '2018-10-08', '11:07:16', '2018-10-08', '11:07:16', NULL, 'inside_detection', 'detected', 0, '2018-10-08 11:07:15', '2018-10-08 05:37:16'),
(104, 0, '', '', 10, 8, '2018-10-08', '13:03:02', '2018-10-08', '13:03:02', NULL, 'inside_detection', 'detected', 0, '2018-10-08 13:04:11', '2018-10-08 07:33:02'),
(105, 0, '', '', 4, 8, '2018-10-08', '13:07:06', '2018-10-08', '13:07:06', NULL, 'inside_detection', 'detected', 0, '2018-10-08 13:07:05', '2018-10-08 07:37:06'),
(106, 0, '', '', 3, 8, '2018-10-09', '11:30:56', '2018-10-09', '11:30:56', NULL, 'inside_detection', 'detected', 0, '2018-10-09 11:30:55', '2018-10-09 06:00:56'),
(107, 0, '', '', 2, 8, '2018-10-09', '11:49:59', '2018-10-09', '11:49:59', NULL, 'inside_detection', 'detected', 0, '2018-10-09 11:49:59', '2018-10-09 06:19:59'),
(108, 0, '', '', 10, 8, '2018-10-09', '13:15:53', '2018-10-09', '13:15:53', NULL, 'inside_detection', 'detected', 0, '2018-10-09 13:16:54', '2018-10-09 07:45:53'),
(109, 0, '', '', 10, 9, '2018-10-09', '13:47:33', '2018-10-09', '13:47:33', NULL, 'inside_detection', 'detected', 0, '2018-10-09 13:48:44', '2018-10-09 08:17:33'),
(110, 0, '', '', 8, 8, '2018-10-09', '15:54:58', '2018-10-09', '15:54:58', NULL, 'inside_detection', 'detected', 0, '2018-10-09 15:54:57', '2018-10-09 10:24:58'),
(111, 0, '', '', 13, 8, '2018-10-09', '16:55:47', '2018-10-09', '16:55:47', NULL, 'inside_detection', 'detected', 0, '2018-10-09 16:55:46', '2018-10-09 11:25:47'),
(112, 0, '', '', 3, 8, '2018-10-10', '12:23:06', '2018-10-10', '12:23:06', NULL, 'inside_detection', 'detected', 0, '2018-10-10 12:23:05', '2018-10-10 06:53:06'),
(113, 0, '', '', 10, 8, '2018-10-10', '13:57:28', '2018-10-10', '13:57:28', NULL, 'inside_detection', 'detected', 0, '2018-10-10 13:58:41', '2018-10-10 08:27:28'),
(114, 0, '', '', 2, 8, '2018-10-10', '15:03:53', '2018-10-10', '15:03:53', NULL, 'inside_detection', 'detected', 0, '2018-10-10 15:03:52', '2018-10-10 09:33:53'),
(115, 0, '', '', 4, 8, '2018-10-10', '17:20:53', '2018-10-10', '17:20:53', NULL, 'inside_detection', 'detected', 0, '2018-10-10 17:20:52', '2018-10-10 11:50:53'),
(116, 0, '', '', 4, 9, '2018-10-10', '18:06:15', '2018-10-10', '18:06:15', NULL, 'inside_detection', 'detected', 0, '2018-10-10 18:06:13', '2018-10-10 12:36:15'),
(117, 0, '', '', 4, 10, '2018-10-10', '20:22:54', '2018-10-10', '20:22:54', NULL, 'inside_detection', 'detected', 0, '2018-10-10 20:22:53', '2018-10-10 14:52:54'),
(118, 0, '', '', 17, 20, '2018-10-10', '21:40:18', '2018-10-10', '21:40:18', NULL, 'inside_detection', 'detected', 0, '2018-10-10 21:40:17', '2018-10-10 16:10:18'),
(119, 0, '', '', 3, 8, '2018-10-11', '15:31:25', '2018-10-11', '15:31:25', NULL, 'inside_detection', 'detected', 0, '2018-10-11 15:31:24', '2018-10-11 10:01:25'),
(120, 0, '', '', 2, 8, '2018-10-11', '16:06:29', '2018-10-11', '16:06:29', NULL, 'inside_detection', 'detected', 0, '2018-10-11 16:06:28', '2018-10-11 10:36:29'),
(121, 0, '', '', 6, 8, '2018-10-11', '17:04:08', '2018-10-11', '17:04:08', NULL, 'inside_detection', 'detected', 0, '2018-10-11 17:04:07', '2018-10-11 11:34:08'),
(122, 0, '', '', 4, 8, '2018-10-11', '18:03:16', '2018-10-11', '18:03:16', NULL, 'inside_detection', 'detected', 0, '2018-10-11 18:03:15', '2018-10-11 12:33:16'),
(123, 0, '', '', 10, 8, '2018-10-12', '13:58:39', '2018-10-12', '13:58:39', NULL, 'inside_detection', 'detected', 0, '2018-10-12 13:57:27', '2018-10-12 08:28:39'),
(124, 0, '', '', 3, 8, '2018-10-12', '16:07:29', '2018-10-12', '16:07:29', NULL, 'inside_detection', 'detected', 0, '2018-10-12 16:07:28', '2018-10-12 10:37:29'),
(125, 0, '', '', 2, 8, '2018-10-12', '16:23:02', '2018-10-12', '16:23:02', NULL, 'inside_detection', 'detected', 0, '2018-10-12 16:23:01', '2018-10-12 10:53:02'),
(126, 0, '', '', 8, 8, '2018-10-12', '16:30:16', '2018-10-12', '16:30:16', NULL, 'inside_detection', 'detected', 0, '2018-10-12 16:30:15', '2018-10-12 11:00:16'),
(127, 0, '', '', 15, 8, '2018-10-12', '16:52:31', '2018-10-12', '16:52:31', NULL, 'inside_detection', 'detected', 0, '2018-10-12 16:52:29', '2018-10-12 11:22:31'),
(128, 0, '', '', 6, 8, '2018-10-12', '17:31:11', '2018-10-12', '17:31:11', NULL, 'inside_detection', 'detected', 0, '2018-10-12 17:31:10', '2018-10-12 12:01:11'),
(129, 0, '', '', 4, 8, '2018-10-13', '15:12:32', '2018-10-13', '15:12:32', NULL, 'inside_detection', 'detected', 0, '2018-10-13 15:12:32', '2018-10-13 09:42:32'),
(130, 0, '', '', 4, 9, '2018-10-13', '15:21:48', '2018-10-13', '15:21:48', NULL, 'inside_detection', 'detected', 0, '2018-10-13 15:21:48', '2018-10-13 09:51:48'),
(131, 0, '', '', 4, 10, '2018-10-14', '01:28:36', '2018-10-14', '01:28:36', NULL, 'inside_detection', 'detected', 0, '2018-10-14 01:28:35', '2018-10-13 19:58:36'),
(132, 0, '', '', 2, 8, '2018-10-15', '11:47:08', '2018-10-15', '11:47:08', NULL, 'inside_detection', 'detected', 0, '2018-10-15 11:47:07', '2018-10-15 06:17:08'),
(133, 0, '', '', 3, 8, '2018-10-15', '15:26:29', '2018-10-15', '15:26:29', NULL, 'inside_detection', 'detected', 0, '2018-10-15 15:26:29', '2018-10-15 09:56:29'),
(134, 0, '', '', 6, 8, '2018-10-15', '15:57:25', '2018-10-15', '15:57:25', NULL, 'inside_detection', 'detected', 0, '2018-10-15 15:57:24', '2018-10-15 10:27:25'),
(135, 0, '', '', 4, 8, '2018-10-15', '16:05:44', '2018-10-15', '16:05:44', NULL, 'inside_detection', 'detected', 0, '2018-10-15 16:05:43', '2018-10-15 10:35:44'),
(136, 0, '', '', 15, 8, '2018-10-15', '16:34:23', '2018-10-15', '16:34:23', NULL, 'inside_detection', 'detected', 0, '2018-10-15 16:34:21', '2018-10-15 11:04:23'),
(137, 0, '', '', 2, 8, '2018-10-16', '12:47:41', '2018-10-16', '12:47:41', NULL, 'inside_detection', 'detected', 0, '2018-10-16 12:47:40', '2018-10-16 07:17:41'),
(138, 0, '', '', 3, 8, '2018-10-16', '15:48:28', '2018-10-16', '15:48:28', NULL, 'inside_detection', 'detected', 0, '2018-10-16 15:48:27', '2018-10-16 10:18:28'),
(139, 0, '', '', 6, 8, '2018-10-16', '16:49:06', '2018-10-16', '16:49:06', NULL, 'inside_detection', 'detected', 0, '2018-10-16 16:49:04', '2018-10-16 11:19:06'),
(140, 0, '', '', 4, 8, '2018-10-16', '16:55:38', '2018-10-16', '16:55:38', NULL, 'inside_detection', 'detected', 0, '2018-10-16 16:55:37', '2018-10-16 11:25:38'),
(141, 0, '', '', 15, 8, '2018-10-16', '17:08:16', '2018-10-16', '17:08:16', NULL, 'inside_detection', 'detected', 0, '2018-10-16 17:08:14', '2018-10-16 11:38:16'),
(142, 0, '', '', 15, 9, '2018-10-16', '19:57:27', '2018-10-16', '19:57:27', NULL, 'inside_detection', 'detected', 0, '2018-10-16 19:57:26', '2018-10-16 14:27:27'),
(143, 0, '', '', 4, 9, '2018-10-16', '20:01:50', '2018-10-16', '20:01:50', NULL, 'inside_detection', 'detected', 0, '2018-10-16 20:01:48', '2018-10-16 14:31:50'),
(144, 0, '', '', 1, 8, '2018-10-17', '14:45:11', '2018-10-17', '14:45:11', NULL, 'inside_detection', 'detected', 0, '2018-10-17 14:45:18', '2018-10-17 09:15:11'),
(145, 0, '', '', 2, 8, '2018-10-17', '15:23:45', '2018-10-17', '15:23:45', NULL, 'inside_detection', 'detected', 0, '2018-10-17 15:23:44', '2018-10-17 09:53:45'),
(146, 0, '', '', 7, 8, '2018-10-17', '16:30:57', '2018-10-17', '16:30:57', NULL, 'inside_detection', 'detected', 0, '2018-10-17 16:30:56', '2018-10-17 11:00:57'),
(147, 0, '', '', 6, 8, '2018-10-17', '16:58:22', '2018-10-17', '16:58:22', NULL, 'inside_detection', 'detected', 0, '2018-10-17 16:58:21', '2018-10-17 11:28:22'),
(148, 0, '', '', 4, 10, '2018-10-17', '21:14:31', '2018-10-17', '21:14:31', NULL, 'inside_detection', 'detected', 0, '2018-10-17 21:14:29', '2018-10-17 15:44:31'),
(149, 0, '', '', 15, 10, '2018-10-18', '00:09:39', '2018-10-18', '00:09:39', NULL, 'inside_detection', 'detected', 0, '2018-10-18 00:09:37', '2018-10-17 18:39:39'),
(150, 0, '', '', 14, 10, '2018-10-18', '00:25:59', '2018-10-18', '00:25:59', NULL, 'inside_detection', 'detected', 0, '2018-10-18 00:25:57', '2018-10-17 18:55:59'),
(151, 0, '', '', 3, 8, '2018-10-18', '15:03:24', '2018-10-18', '15:03:24', NULL, 'inside_detection', 'detected', 0, '2018-10-18 15:03:23', '2018-10-18 09:33:24'),
(152, 0, '', '', 4, 8, '2018-10-18', '15:14:07', '2018-10-18', '15:14:07', NULL, 'inside_detection', 'detected', 0, '2018-10-18 15:14:06', '2018-10-18 09:44:07'),
(153, 0, '', '', 2, 8, '2018-10-19', '11:59:03', '2018-10-19', '11:59:03', NULL, 'inside_detection', 'detected', 0, '2018-10-19 11:59:03', '2018-10-19 06:29:03'),
(154, 0, '', '', 6, 8, '2018-10-22', '12:55:17', '2018-10-22', '12:55:17', NULL, 'inside_detection', 'detected', 0, '2018-10-22 12:55:16', '2018-10-22 07:25:17'),
(155, 0, '', '', 14, 8, '2018-10-22', '17:54:57', '2018-10-22', '17:54:57', NULL, 'inside_detection', 'detected', 0, '2018-10-22 17:54:52', '2018-10-22 12:24:57'),
(156, 0, '', '', 14, 9, '2018-10-22', '18:05:10', '2018-10-22', '18:05:10', NULL, 'inside_detection', 'detected', 0, '2018-10-22 18:05:07', '2018-10-22 12:35:10'),
(157, 0, '', '', 4, 8, '2018-10-22', '18:14:51', '2018-10-22', '18:14:51', NULL, 'inside_detection', 'detected', 0, '2018-10-22 18:14:49', '2018-10-22 12:44:51'),
(158, 0, '', '', 15, 8, '2018-10-22', '18:55:56', '2018-10-22', '18:55:56', NULL, 'inside_detection', 'detected', 0, '2018-10-22 18:55:51', '2018-10-22 13:25:56'),
(159, 0, '', '', 2, 8, '2018-10-23', '11:39:40', '2018-10-23', '11:39:40', NULL, 'inside_detection', 'detected', 0, '2018-10-23 11:39:39', '2018-10-23 06:09:40'),
(160, 0, '', '', 3, 8, '2018-10-23', '12:59:56', '2018-10-23', '12:59:56', NULL, 'inside_detection', 'detected', 0, '2018-10-23 12:59:56', '2018-10-23 07:29:56'),
(161, 0, '', '', 10, 9, '2018-10-23', '13:24:26', '2018-10-23', '13:24:26', NULL, 'inside_detection', 'detected', 0, '2018-10-23 13:25:59', '2018-10-23 07:54:26'),
(162, 0, '', '', 10, 8, '2018-10-23', '14:07:42', '2018-10-23', '14:07:42', NULL, 'inside_detection', 'detected', 0, '2018-10-23 14:09:15', '2018-10-23 08:37:42'),
(163, 0, '', '', 6, 8, '2018-10-23', '15:18:44', '2018-10-23', '15:18:44', NULL, 'inside_detection', 'detected', 0, '2018-10-23 15:18:35', '2018-10-23 09:48:44'),
(164, 0, '', '', 7, 24, '2018-10-24', '10:21:13', '2018-10-24', '10:21:13', NULL, 'inside_detection', 'detected', 0, '2018-10-24 11:51:12', '2018-10-24 04:51:13'),
(165, 0, '', '', 2, 8, '2018-10-24', '12:35:58', '2018-10-24', '12:35:58', NULL, 'inside_detection', 'detected', 0, '2018-10-24 12:35:57', '2018-10-24 07:05:58'),
(166, 0, '', '', 4, 8, '2018-10-24', '12:50:32', '2018-10-24', '12:50:32', NULL, 'inside_detection', 'detected', 0, '2018-10-24 12:50:31', '2018-10-24 07:20:32'),
(167, 0, '', '', 10, 8, '2018-10-24', '14:44:32', '2018-10-24', '14:44:32', NULL, 'inside_detection', 'detected', 0, '2018-10-24 14:46:07', '2018-10-24 09:14:32'),
(168, 0, '', '', 3, 8, '2018-10-24', '15:05:03', '2018-10-24', '15:05:03', NULL, 'inside_detection', 'detected', 0, '2018-10-24 15:05:04', '2018-10-24 09:35:03'),
(169, 0, '', '', 6, 8, '2018-10-24', '16:46:19', '2018-10-24', '16:46:19', NULL, 'inside_detection', 'detected', 0, '2018-10-24 16:46:17', '2018-10-24 11:16:19'),
(170, 0, '', '', 7, 24, '2018-10-25', '13:30:15', '2018-10-25', '13:30:15', NULL, 'inside_detection', 'detected', 0, '2018-10-25 16:00:13', '2018-10-25 08:00:15'),
(171, 0, '', '', 2, 8, '2018-10-25', '14:31:35', '2018-10-25', '14:31:35', NULL, 'inside_detection', 'detected', 0, '2018-10-25 14:31:34', '2018-10-25 09:01:35'),
(172, 0, '', '', 8, 8, '2018-10-25', '16:30:19', '2018-10-25', '16:30:19', NULL, 'inside_detection', 'detected', 0, '2018-10-25 16:30:17', '2018-10-25 11:00:19'),
(173, 0, '', '', 6, 8, '2018-10-26', '10:50:16', '2018-10-26', '10:50:16', NULL, 'inside_detection', 'detected', 0, '2018-10-26 10:50:14', '2018-10-26 05:20:16'),
(174, 0, '', '', 1, 8, '2018-10-26', '11:22:07', '2018-10-26', '11:22:07', NULL, 'inside_detection', 'detected', 0, '2018-10-26 11:22:15', '2018-10-26 05:52:07'),
(175, 0, '', '', 19, 8, '2018-10-26', '12:06:42', '2018-10-26', '12:06:42', NULL, 'inside_detection', 'detected', 0, '2018-10-26 12:06:40', '2018-10-26 06:36:42'),
(176, 0, '', '', 2, 8, '2018-10-26', '15:39:37', '2018-10-26', '15:39:37', NULL, 'inside_detection', 'detected', 0, '2018-10-26 15:39:36', '2018-10-26 10:09:37'),
(177, 0, '', '', 4, 8, '2018-10-26', '17:19:18', '2018-10-26', '17:19:18', NULL, 'inside_detection', 'detected', 0, '2018-10-26 17:19:18', '2018-10-26 11:49:18'),
(178, 0, '', '', 15, 8, '2018-10-26', '17:31:54', '2018-10-26', '17:31:54', NULL, 'inside_detection', 'detected', 0, '2018-10-26 17:31:53', '2018-10-26 12:01:54'),
(179, 0, '', '', 14, 10, '2018-10-29', '11:15:02', '2018-10-29', '11:15:02', NULL, 'inside_detection', 'detected', 0, '2018-10-29 11:15:00', '2018-10-29 05:45:02'),
(180, 0, '', '', 15, 10, '2018-10-29', '11:19:30', '2018-10-29', '11:19:30', NULL, 'inside_detection', 'detected', 0, '2018-10-29 11:19:30', '2018-10-29 05:49:30'),
(181, 0, '', '', 2, 8, '2018-10-29', '12:48:41', '2018-10-29', '12:48:41', NULL, 'inside_detection', 'detected', 0, '2018-10-29 12:48:41', '2018-10-29 07:18:41'),
(182, 0, '', '', 3, 8, '2018-10-29', '12:51:12', '2018-10-29', '12:51:12', NULL, 'inside_detection', 'detected', 0, '2018-10-29 12:51:12', '2018-10-29 07:21:12'),
(183, 0, '', '', 15, 8, '2018-10-29', '12:55:43', '2018-10-29', '12:55:43', NULL, 'inside_detection', 'detected', 0, '2018-10-29 12:55:26', '2018-10-29 07:25:43'),
(184, 0, '', '', 19, 8, '2018-10-29', '12:56:04', '2018-10-29', '12:56:04', NULL, 'inside_detection', 'detected', 0, '2018-10-29 12:56:03', '2018-10-29 07:26:04'),
(185, 0, '', '', 14, 8, '2018-10-29', '13:09:56', '2018-10-29', '13:09:56', NULL, 'inside_detection', 'detected', 0, '2018-10-29 13:09:48', '2018-10-29 07:39:56'),
(186, 0, '', '', 19, 8, '2018-10-30', '15:08:48', '2018-10-30', '15:08:48', NULL, 'inside_detection', 'detected', 0, '2018-10-30 15:08:47', '2018-10-30 09:38:48'),
(187, 0, '', '', 3, 8, '2018-10-30', '15:16:06', '2018-10-30', '15:16:06', NULL, 'inside_detection', 'detected', 0, '2018-10-30 15:16:06', '2018-10-30 09:46:06'),
(188, 0, '', '', 4, 8, '2018-10-30', '16:14:44', '2018-10-30', '16:14:44', NULL, 'inside_detection', 'detected', 0, '2018-10-30 16:14:43', '2018-10-30 10:44:44'),
(189, 0, '', '', 2, 8, '2018-10-31', '11:41:14', '2018-10-31', '11:41:14', NULL, 'inside_detection', 'detected', 0, '2018-10-31 11:41:12', '2018-10-31 06:11:14'),
(190, 0, '', '', 3, 8, '2018-10-31', '16:10:13', '2018-10-31', '16:10:13', NULL, 'inside_detection', 'detected', 0, '2018-10-31 16:10:12', '2018-10-31 10:40:13'),
(191, 0, '', '', 16, 8, '2018-10-31', '16:51:22', '2018-10-31', '16:51:22', NULL, 'inside_detection', 'detected', 0, '2018-10-31 16:51:22', '2018-10-31 11:21:22'),
(192, 0, '', '', 4, 8, '2018-10-31', '18:03:08', '2018-10-31', '18:03:08', NULL, 'inside_detection', 'detected', 0, '2018-10-31 18:03:08', '2018-10-31 12:33:08'),
(193, 0, '', '', 4, 10, '2018-10-31', '22:04:40', '2018-10-31', '22:04:40', NULL, 'inside_detection', 'detected', 0, '2018-10-31 22:04:40', '2018-10-31 16:34:40'),
(194, 0, '', '', 14, 8, '2018-11-01', '15:34:51', '2018-11-01', '15:34:51', NULL, 'inside_detection', 'detected', 0, '2018-11-01 15:34:53', '2018-11-01 10:04:51'),
(195, 0, '', '', 15, 8, '2018-11-01', '15:40:22', '2018-11-01', '15:40:22', NULL, 'inside_detection', 'detected', 0, '2018-11-01 15:40:21', '2018-11-01 10:10:22'),
(196, 0, '', '', 10, 8, '2018-11-02', '14:10:31', '2018-11-02', '14:10:31', NULL, 'inside_detection', 'detected', 0, '2018-11-02 14:12:21', '2018-11-02 08:40:31'),
(197, 0, '', '', 2, 8, '2018-11-02', '14:16:56', '2018-11-02', '14:16:56', NULL, 'inside_detection', 'detected', 0, '2018-11-02 14:16:55', '2018-11-02 08:46:56'),
(198, 0, '', '', 4, 8, '2018-11-02', '16:51:03', '2018-11-02', '16:51:03', NULL, 'inside_detection', 'detected', 0, '2018-11-02 16:51:02', '2018-11-02 11:21:03'),
(199, 0, '', '', 16, 8, '2018-11-02', '16:51:05', '2018-11-02', '16:51:05', NULL, 'inside_detection', 'detected', 0, '2018-11-02 16:51:05', '2018-11-02 11:21:05'),
(200, 0, '', '', 16, 9, '2018-11-02', '17:17:04', '2018-11-02', '17:17:04', NULL, 'inside_detection', 'detected', 0, '2018-11-02 17:17:03', '2018-11-02 11:47:04'),
(201, 0, '', '', 2, 9, '2018-11-02', '17:18:33', '2018-11-02', '17:18:33', NULL, 'inside_detection', 'detected', 0, '2018-11-02 17:18:32', '2018-11-02 11:48:33'),
(202, 0, '', '', 4, 9, '2018-11-02', '17:19:01', '2018-11-02', '17:19:01', NULL, 'inside_detection', 'detected', 0, '2018-11-02 17:19:00', '2018-11-02 11:49:01'),
(203, 0, '', '', 14, 8, '2018-11-02', '17:59:08', '2018-11-02', '17:59:08', NULL, 'inside_detection', 'detected', 0, '2018-11-02 17:59:05', '2018-11-02 12:29:08'),
(204, 0, '', '', 10, 8, '2018-11-12', '12:51:29', '2018-11-12', '12:51:29', NULL, 'inside_detection', 'detected', 0, '2018-11-12 12:53:24', '2018-11-12 07:21:29'),
(205, 0, '', '', 3, 8, '2018-11-12', '15:55:59', '2018-11-12', '15:55:59', NULL, 'inside_detection', 'detected', 0, '2018-11-12 15:55:58', '2018-11-12 10:25:59'),
(206, 0, '', '', 4, 10, '2018-11-12', '19:03:22', '2018-11-12', '19:03:22', NULL, 'inside_detection', 'detected', 0, '2018-11-12 19:03:19', '2018-11-12 13:33:22'),
(207, 0, '', '', 7, 8, '2018-11-13', '12:55:18', '2018-11-13', '12:55:18', NULL, 'inside_detection', 'detected', 0, '2018-11-13 12:55:18', '2018-11-13 07:25:18'),
(208, 0, '', '', 16, 8, '2018-11-13', '14:46:26', '2018-11-13', '14:46:26', NULL, 'inside_detection', 'detected', 0, '2018-11-13 14:46:25', '2018-11-13 09:16:26'),
(209, 0, '', '', 2, 8, '2018-11-13', '16:33:26', '2018-11-13', '16:33:26', NULL, 'inside_detection', 'detected', 0, '2018-11-13 16:33:25', '2018-11-13 11:03:26'),
(210, 0, '', '', 4, 10, '2018-11-13', '23:12:03', '2018-11-13', '23:12:03', NULL, 'inside_detection', 'detected', 0, '2018-11-13 23:12:00', '2018-11-13 17:42:03'),
(211, 0, '', '', 10, 8, '2018-11-14', '14:00:50', '2018-11-14', '14:00:50', NULL, 'inside_detection', 'detected', 0, '2018-11-14 14:02:59', '2018-11-14 08:30:50'),
(212, 0, '', '', 2, 8, '2018-11-15', '10:48:18', '2018-11-15', '10:48:18', NULL, 'inside_detection', 'detected', 0, '2018-11-15 10:48:17', '2018-11-15 05:18:18'),
(213, 0, '', '', 3, 8, '2018-11-15', '12:18:01', '2018-11-15', '12:18:01', NULL, 'inside_detection', 'detected', 0, '2018-11-15 12:18:01', '2018-11-15 06:48:01'),
(214, 0, '', '', 4, 8, '2018-11-15', '16:04:22', '2018-11-15', '16:04:22', NULL, 'inside_detection', 'detected', 0, '2018-11-15 16:04:21', '2018-11-15 10:34:22'),
(215, 0, '', '', 19, 8, '2018-11-15', '16:52:42', '2018-11-15', '16:52:42', NULL, 'inside_detection', 'detected', 0, '2018-11-15 16:52:42', '2018-11-15 11:22:42'),
(216, 0, '', '', 2, 8, '2018-11-16', '15:35:32', '2018-11-16', '15:35:32', NULL, 'inside_detection', 'detected', 0, '2018-11-16 15:35:31', '2018-11-16 10:05:32'),
(217, 0, '', '', 2, 8, '2018-11-19', '11:27:44', '2018-11-19', '11:27:44', NULL, 'inside_detection', 'detected', 0, '2018-11-19 11:27:43', '2018-11-19 05:57:44'),
(218, 0, '', '', 4, 10, '2018-11-20', '10:50:29', '2018-11-20', '10:50:29', NULL, 'inside_detection', 'detected', 0, '2018-11-20 10:50:28', '2018-11-20 05:20:29'),
(219, 0, '', '', 2, 8, '2018-11-20', '12:21:44', '2018-11-20', '12:21:44', NULL, 'inside_detection', 'detected', 0, '2018-11-20 12:21:43', '2018-11-20 06:51:44'),
(220, 0, '', '', 2, 8, '2018-11-21', '14:56:03', '2018-11-21', '14:56:03', NULL, 'inside_detection', 'detected', 0, '2018-11-21 14:56:02', '2018-11-21 09:26:03'),
(221, 0, '', '', 4, 8, '2018-11-21', '17:23:52', '2018-11-21', '17:23:52', NULL, 'inside_detection', 'detected', 0, '2018-11-21 17:23:51', '2018-11-21 11:53:52'),
(222, 0, '', '', 19, 8, '2018-11-21', '17:38:25', '2018-11-21', '17:38:25', NULL, 'inside_detection', 'detected', 0, '2018-11-21 17:38:24', '2018-11-21 12:08:25'),
(223, 0, '', '', 4, 10, '2018-11-21', '19:57:34', '2018-11-21', '19:57:34', NULL, 'inside_detection', 'detected', 0, '2018-11-21 19:57:32', '2018-11-21 14:27:34'),
(224, 0, '', '', 14, 10, '2018-11-21', '21:15:10', '2018-11-21', '21:15:10', NULL, 'inside_detection', 'detected', 0, '2018-11-21 21:14:59', '2018-11-21 15:45:10'),
(225, 0, '', '', 2, 8, '2018-11-22', '16:00:48', '2018-11-22', '16:00:48', NULL, 'inside_detection', 'detected', 0, '2018-11-22 16:00:48', '2018-11-22 10:30:48'),
(226, 0, '', '', 3, 8, '2018-11-23', '12:47:18', '2018-11-23', '12:47:18', NULL, 'inside_detection', 'detected', 0, '2018-11-23 12:47:16', '2018-11-23 07:17:18'),
(227, 0, '', '', 4, 8, '2018-11-23', '16:43:25', '2018-11-23', '16:43:25', NULL, 'inside_detection', 'detected', 0, '2018-11-23 16:43:23', '2018-11-23 11:13:25'),
(228, 0, '', '', 7, 24, '2018-11-26', '08:05:35', '2018-11-26', '08:05:35', NULL, 'inside_detection', 'detected', 0, '2018-11-26 08:05:35', '2018-11-26 02:35:35'),
(229, 0, '', '', 2, 8, '2018-11-26', '12:46:27', '2018-11-26', '12:46:27', NULL, 'inside_detection', 'detected', 0, '2018-11-26 12:46:27', '2018-11-26 07:16:27'),
(230, 0, '', '', 19, 8, '2018-11-28', '12:19:31', '2018-11-28', '12:19:31', NULL, 'inside_detection', 'detected', 0, '2018-11-28 12:19:31', '2018-11-28 06:49:31'),
(231, 0, '', '', 2, 8, '2018-11-28', '12:30:47', '2018-11-28', '12:30:47', NULL, 'inside_detection', 'detected', 0, '2018-11-28 12:30:46', '2018-11-28 07:00:47'),
(232, 0, '', '', 4, 10, '2018-11-28', '21:27:17', '2018-11-28', '21:27:17', NULL, 'inside_detection', 'detected', 0, '2018-11-28 21:27:16', '2018-11-28 15:57:17'),
(233, 0, '', '', 4, 8, '2018-11-29', '13:00:00', '2018-11-29', '13:00:00', NULL, 'inside_detection', 'detected', 0, '2018-11-29 13:00:00', '2018-11-29 07:30:00'),
(234, 0, '', '', 2, 8, '2018-11-29', '15:08:48', '2018-11-29', '15:08:48', NULL, 'inside_detection', 'detected', 0, '2018-11-29 15:08:47', '2018-11-29 09:38:48'),
(235, 0, '', '', 2, 8, '2018-11-30', '15:33:59', '2018-11-30', '15:33:59', NULL, 'inside_detection', 'detected', 0, '2018-11-30 15:33:58', '2018-11-30 10:03:59'),
(236, 0, '', '', 3, 8, '2018-11-30', '16:02:57', '2018-11-30', '16:02:57', NULL, 'inside_detection', 'detected', 0, '2018-11-30 16:02:56', '2018-11-30 10:32:57'),
(237, 0, '', '', 19, 8, '2018-11-30', '16:45:01', '2018-11-30', '16:45:01', NULL, 'inside_detection', 'detected', 0, '2018-11-30 16:45:01', '2018-11-30 11:15:01'),
(238, 0, '', '', 3, 8, '2018-12-03', '14:26:55', '2018-12-03', '14:26:55', NULL, 'inside_detection', 'detected', 0, '2018-12-03 14:26:54', '2018-12-03 08:56:55'),
(239, 0, '', '', 7, 8, '2018-12-03', '15:31:34', '2018-12-03', '15:31:34', NULL, 'inside_detection', 'detected', 0, '2018-12-03 15:31:34', '2018-12-03 10:01:34'),
(240, 0, '', '', 19, 8, '2018-12-03', '15:41:29', '2018-12-03', '15:41:29', NULL, 'inside_detection', 'detected', 0, '2018-12-03 15:41:28', '2018-12-03 10:11:29'),
(241, 0, '', '', 4, 8, '2018-12-03', '18:21:48', '2018-12-03', '18:21:48', NULL, 'inside_detection', 'detected', 0, '2018-12-03 18:21:47', '2018-12-03 12:51:48'),
(242, 0, '', '', 3, 8, '2018-12-04', '15:42:09', '2018-12-04', '15:42:09', NULL, 'inside_detection', 'detected', 0, '2018-12-04 15:42:09', '2018-12-04 10:12:09'),
(243, 0, '', '', 3, 8, '2018-12-05', '16:27:33', '2018-12-05', '16:27:33', NULL, 'inside_detection', 'detected', 0, '2018-12-05 16:27:33', '2018-12-05 10:57:33'),
(244, 0, '', '', 4, 8, '2018-12-05', '17:24:29', '2018-12-05', '17:24:29', NULL, 'inside_detection', 'detected', 0, '2018-12-05 17:24:28', '2018-12-05 11:54:29'),
(245, 0, '', '', 4, 10, '2018-12-05', '21:54:34', '2018-12-05', '21:54:34', NULL, 'inside_detection', 'detected', 0, '2018-12-05 21:54:26', '2018-12-05 16:24:34'),
(246, 0, '', '', 3, 8, '2018-12-07', '14:11:02', '2018-12-07', '14:11:02', NULL, 'inside_detection', 'detected', 0, '2018-12-07 14:11:02', '2018-12-07 08:41:02'),
(247, 0, '', '', 19, 8, '2018-12-07', '16:24:07', '2018-12-07', '16:24:07', NULL, 'inside_detection', 'detected', 0, '2018-12-07 16:24:07', '2018-12-07 10:54:07'),
(248, 0, '', '', 7, 24, '2018-12-09', '17:46:43', '2018-12-09', '17:46:43', NULL, 'inside_detection', 'detected', 0, '2018-12-09 17:46:43', '2018-12-09 12:16:43'),
(249, 0, '', '', 3, 8, '2018-12-10', '12:19:05', '2018-12-10', '12:19:05', NULL, 'inside_detection', 'detected', 0, '2018-12-10 12:19:05', '2018-12-10 06:49:05'),
(250, 0, '', '', 3, 8, '2018-12-12', '11:33:14', '2018-12-12', '11:33:14', NULL, 'inside_detection', 'detected', 0, '2018-12-12 11:33:13', '2018-12-12 06:03:14'),
(251, 0, '', '', 4, 10, '2018-12-14', '00:42:46', '2018-12-14', '00:42:46', NULL, 'inside_detection', 'detected', 0, '2018-12-14 00:42:45', '2018-12-13 19:12:46'),
(252, 0, '', '', 19, 8, '2018-12-17', '17:38:35', '2018-12-17', '17:38:35', NULL, 'inside_detection', 'detected', 0, '2018-12-17 17:38:33', '2018-12-17 12:08:35'),
(253, 0, '', '', 3, 8, '2018-12-17', '17:38:48', '2018-12-17', '17:38:48', NULL, 'inside_detection', 'detected', 0, '2018-12-17 17:38:47', '2018-12-17 12:08:48'),
(254, 0, '', '', 4, 8, '2018-12-17', '18:08:07', '2018-12-17', '18:08:07', NULL, 'inside_detection', 'detected', 0, '2018-12-17 18:08:06', '2018-12-17 12:38:07'),
(255, 0, '', '', 4, 10, '2018-12-17', '23:15:38', '2018-12-17', '23:15:38', NULL, 'inside_detection', 'detected', 0, '2018-12-17 23:15:36', '2018-12-17 17:45:38'),
(256, 0, '', '', 3, 8, '2018-12-19', '11:21:44', '2018-12-19', '11:21:44', NULL, 'inside_detection', 'detected', 0, '2018-12-19 11:21:43', '2018-12-19 05:51:44'),
(257, 0, '', '', 19, 8, '2018-12-19', '13:04:39', '2018-12-19', '13:04:39', NULL, 'inside_detection', 'detected', 0, '2018-12-19 13:04:39', '2018-12-19 07:34:39'),
(258, 0, '', '', 3, 8, '2019-01-02', '15:50:37', '2019-01-02', '15:50:37', NULL, 'inside_detection', 'detected', 0, '2019-01-02 15:50:36', '2019-01-02 10:20:37'),
(259, 0, '', '', 19, 8, '2019-01-03', '12:30:57', '2019-01-03', '12:30:57', NULL, 'inside_detection', 'detected', 0, '2019-01-03 12:30:57', '2019-01-03 07:00:57'),
(260, 0, '', '', 4, 8, '2019-01-03', '12:34:57', '2019-01-03', '12:34:57', NULL, 'inside_detection', 'detected', 0, '2019-01-03 12:34:56', '2019-01-03 07:04:57'),
(261, 0, '', '', 3, 8, '2019-01-18', '17:16:37', '2019-01-18', '17:16:37', NULL, 'inside_detection', 'detected', 0, '2019-01-18 17:16:37', '2019-01-18 11:46:37'),
(262, 0, '', '', 4, 8, '2019-01-19', '15:16:50', '2019-01-19', '15:16:50', NULL, 'inside_detection', 'detected', 0, '2019-01-19 15:16:50', '2019-01-19 09:46:50'),
(263, 0, '', '', 4, 10, '2019-01-23', '22:40:11', '2019-01-23', '22:40:11', NULL, 'inside_detection', 'detected', 0, '2019-01-23 22:40:10', '2019-01-23 17:10:11'),
(264, 0, '', '', 3, 8, '2019-01-24', '12:15:57', '2019-01-24', '12:15:57', NULL, 'inside_detection', 'detected', 0, '2019-01-24 12:15:57', '2019-01-24 06:45:57'),
(265, 0, '', '', 7, 8, '2019-01-24', '12:23:08', '2019-01-24', '12:23:08', NULL, 'inside_detection', 'detected', 0, '2019-01-24 12:22:56', '2019-01-24 06:53:08'),
(266, 0, '', '', 8, 8, '2019-01-24', '12:54:59', '2019-01-24', '12:54:59', NULL, 'inside_detection', 'detected', 0, '2019-01-24 12:54:58', '2019-01-24 07:24:59'),
(267, 0, '', '', 10, 8, '2019-01-24', '13:11:05', '2019-01-24', '13:11:05', NULL, 'inside_detection', 'detected', 0, '2019-01-24 13:15:09', '2019-01-24 07:41:05'),
(268, 0, '', '', 4, 8, '2019-01-24', '16:48:04', '2019-01-24', '16:48:04', NULL, 'inside_detection', 'detected', 0, '2019-01-24 16:48:03', '2019-01-24 11:18:04'),
(269, 0, '', '', 4, 9, '2019-01-24', '17:05:00', '2019-01-24', '17:05:00', NULL, 'inside_detection', 'detected', 0, '2019-01-24 17:04:59', '2019-01-24 11:35:00'),
(270, 0, '', '', 3, 8, '2019-01-25', '15:16:42', '2019-01-25', '15:16:42', NULL, 'inside_detection', 'detected', 0, '2019-01-25 15:16:41', '2019-01-25 09:46:42'),
(271, 0, '', '', 24, 8, '2019-01-25', '19:39:39', '2019-01-25', '19:39:39', NULL, 'inside_detection', 'detected', 0, '2019-01-25 19:39:38', '2019-01-25 14:09:39'),
(272, 0, '', '', 4, 8, '2019-01-25', '21:28:40', '2019-01-25', '21:28:40', NULL, 'inside_detection', 'detected', 0, '2019-01-25 21:28:39', '2019-01-25 15:58:40'),
(273, 0, '', '', 10, 8, '2019-01-28', '12:45:09', '2019-01-28', '12:45:09', NULL, 'inside_detection', 'detected', 0, '2019-01-28 12:49:22', '2019-01-28 07:15:09'),
(274, 0, '', '', 3, 8, '2019-01-28', '13:06:43', '2019-01-28', '13:06:43', NULL, 'inside_detection', 'detected', 0, '2019-01-28 13:06:41', '2019-01-28 07:36:43'),
(275, 0, '', '', 4, 8, '2019-01-28', '15:20:37', '2019-01-28', '15:20:37', NULL, 'inside_detection', 'detected', 0, '2019-01-28 15:20:36', '2019-01-28 09:50:37'),
(276, 0, '', '', 9, 8, '2019-01-28', '15:21:50', '2019-01-28', '15:21:50', NULL, 'inside_detection', 'detected', 0, '2019-01-28 15:21:48', '2019-01-28 09:51:50'),
(277, 0, '', '', 4, 27, '2019-01-28', '16:30:16', '2019-01-28', '16:30:16', NULL, 'inside_detection', 'detected', 0, '2019-01-28 16:30:15', '2019-01-28 11:00:16'),
(278, 0, '', '', 7, 27, '2019-01-28', '16:30:35', '2019-01-28', '16:30:35', NULL, 'inside_detection', 'detected', 0, '2019-01-28 16:30:34', '2019-01-28 11:00:35'),
(279, 0, '', '', 25, 8, '2019-01-29', '11:56:32', '2019-01-29', '11:56:32', NULL, 'inside_detection', 'detected', 0, '2019-01-29 11:56:31', '2019-01-29 06:26:32'),
(280, 0, '', '', 3, 8, '2019-01-30', '11:30:00', '2019-01-30', '11:30:00', NULL, 'inside_detection', 'detected', 0, '2019-01-30 11:29:59', '2019-01-30 06:00:00'),
(281, 0, '', '', 25, 8, '2019-01-31', '15:13:58', '2019-01-31', '15:13:58', NULL, 'inside_detection', 'detected', 0, '2019-01-31 15:13:57', '2019-01-31 09:43:58'),
(282, 0, '', '', 4, 8, '2019-01-31', '15:27:51', '2019-01-31', '15:27:51', NULL, 'inside_detection', 'detected', 0, '2019-01-31 15:27:50', '2019-01-31 09:57:51'),
(283, 0, '', '', 3, 8, '2019-01-31', '15:34:20', '2019-01-31', '15:34:20', NULL, 'inside_detection', 'detected', 0, '2019-01-31 15:34:19', '2019-01-31 10:04:20'),
(284, 0, '', '', 7, 28, '2019-02-01', '11:36:57', '2019-02-01', '11:36:57', NULL, 'inside_detection', 'detected', 0, '2019-02-01 11:36:56', '2019-02-01 06:06:57'),
(285, 0, '', '', 4, 28, '2019-02-01', '11:38:38', '2019-02-01', '11:38:38', NULL, 'inside_detection', 'detected', 0, '2019-02-01 11:38:37', '2019-02-01 06:08:38'),
(286, 0, '', '', 3, 8, '2019-02-01', '16:57:45', '2019-02-01', '16:57:45', NULL, 'inside_detection', 'detected', 0, '2019-02-01 16:57:44', '2019-02-01 11:27:45'),
(287, 0, '', '', 3, 8, '2019-02-04', '11:04:43', '2019-02-04', '11:04:43', NULL, 'inside_detection', 'detected', 0, '2019-02-04 11:04:42', '2019-02-04 05:34:43'),
(288, 0, '', '', 4, 8, '2019-02-04', '14:24:38', '2019-02-04', '14:24:38', NULL, 'inside_detection', 'detected', 0, '2019-02-04 14:24:37', '2019-02-04 08:54:38'),
(289, 0, '', '', 25, 8, '2019-02-04', '16:53:26', '2019-02-04', '16:53:26', NULL, 'inside_detection', 'detected', 0, '2019-02-04 16:53:24', '2019-02-04 11:23:26'),
(290, 0, '', '', 24, 8, '2019-02-04', '17:10:35', '2019-02-04', '17:10:35', NULL, 'inside_detection', 'detected', 0, '2019-02-04 17:10:34', '2019-02-04 11:40:35'),
(291, 0, '', '', 26, 8, '2019-02-05', '17:22:03', '2019-02-05', '17:22:03', NULL, 'inside_detection', 'detected', 0, '2019-02-05 17:22:01', '2019-02-05 11:52:03'),
(292, 0, '', '', 25, 8, '2019-02-05', '17:27:05', '2019-02-05', '17:27:05', NULL, 'inside_detection', 'detected', 0, '2019-02-05 17:27:04', '2019-02-05 11:57:05'),
(293, 0, '', '', 4, 8, '2019-02-05', '17:27:17', '2019-02-05', '17:27:17', NULL, 'inside_detection', 'detected', 0, '2019-02-05 17:27:17', '2019-02-05 11:57:17'),
(294, 0, '', '', 27, 8, '2019-02-05', '17:32:27', '2019-02-05', '17:32:27', NULL, 'inside_detection', 'detected', 0, '2019-02-05 17:32:24', '2019-02-05 12:02:27'),
(295, 0, '', '', 3, 8, '2019-02-07', '11:29:56', '2019-02-07', '11:29:56', NULL, 'inside_detection', 'detected', 0, '2019-02-07 11:29:56', '2019-02-07 05:59:56'),
(296, 0, '', '', 25, 8, '2019-02-07', '16:34:05', '2019-02-07', '16:34:05', NULL, 'inside_detection', 'detected', 0, '2019-02-07 16:34:05', '2019-02-07 11:04:05'),
(297, 0, '', '', 4, 8, '2019-02-08', '14:55:05', '2019-02-08', '14:55:05', NULL, 'inside_detection', 'detected', 0, '2019-02-08 14:55:04', '2019-02-08 09:25:05'),
(298, 0, '', '', 3, 8, '2019-02-08', '15:00:43', '2019-02-08', '15:00:43', NULL, 'inside_detection', 'detected', 0, '2019-02-08 15:00:42', '2019-02-08 09:30:43'),
(299, 0, '', '', 25, 8, '2019-02-12', '15:13:44', '2019-02-12', '15:13:44', NULL, 'inside_detection', 'detected', 0, '2019-02-12 15:13:43', '2019-02-12 09:43:44'),
(300, 0, '', '', 3, 8, '2019-02-14', '11:37:30', '2019-02-14', '11:37:30', NULL, 'inside_detection', 'detected', 0, '2019-02-14 11:37:29', '2019-02-14 06:07:30'),
(301, 0, '', '', 25, 8, '2019-02-15', '15:04:52', '2019-02-15', '15:04:52', NULL, 'inside_detection', 'detected', 0, '2019-02-15 15:04:52', '2019-02-15 09:34:52'),
(302, 0, '', '', 4, 29, '2019-02-18', '20:53:30', '2019-02-18', '20:53:30', NULL, 'inside_detection', 'detected', 0, '2019-02-18 20:53:27', '2019-02-18 15:23:30'),
(303, 0, '', '', 7, 30, '2019-02-20', '11:58:33', '2019-02-20', '11:58:33', NULL, 'inside_detection', 'detected', 0, '2019-02-20 11:58:32', '2019-02-20 06:28:33'),
(304, 0, '', '', 4, 30, '2019-02-20', '11:59:57', '2019-02-20', '11:59:57', NULL, 'inside_detection', 'detected', 0, '2019-02-20 11:59:55', '2019-02-20 06:29:57'),
(305, 0, '', '', 7, 32, '2019-03-04', '15:28:58', '2019-03-04', '15:28:58', NULL, 'inside_detection', 'detected', 0, '2019-03-04 15:28:57', '2019-03-04 09:58:58'),
(306, 0, '', '', 4, 32, '2019-03-04', '15:55:50', '2019-03-04', '15:55:50', NULL, 'inside_detection', 'detected', 0, '2019-03-04 15:55:48', '2019-03-04 10:25:50'),
(307, 0, '', '', 25, 8, '2019-03-06', '10:53:24', '2019-03-06', '10:53:24', NULL, 'inside_detection', 'detected', 0, '2019-03-06 10:53:24', '2019-03-06 05:23:24'),
(308, 0, '', '', 7, 32, '2019-03-11', '11:53:00', '2019-03-11', '11:53:00', NULL, 'inside_detection', 'detected', 0, '2019-03-11 11:52:58', '2019-03-11 06:23:00');
INSERT INTO `T_BeaconActivity` (`beacon_activity_id`, `beacon_id`, `beacon_key`, `beacon_place`, `user_id`, `store_id`, `detected_date`, `detected_time`, `exit_date`, `exit_time`, `total_spent_time`, `flag_of_inside_store`, `flag_of_detection`, `active`, `created_date`, `last_updated_date`) VALUES
(309, 0, '', '', 4, 32, '2019-03-11', '12:07:19', '2019-03-11', '12:07:19', NULL, 'inside_detection', 'detected', 0, '2019-03-11 12:07:16', '2019-03-11 06:37:19'),
(310, 0, '', '', 3, 8, '2019-03-11', '16:06:32', '2019-03-11', '16:06:32', NULL, 'inside_detection', 'detected', 0, '2019-03-11 16:06:30', '2019-03-11 10:36:32'),
(311, 0, '', '', 7, 8, '2019-03-19', '16:20:07', '2019-03-19', '16:20:07', NULL, 'inside_detection', 'detected', 0, '2019-03-19 16:20:06', '2019-03-19 10:50:07'),
(312, 0, '', '', 3, 8, '2019-03-19', '16:26:48', '2019-03-19', '16:26:48', NULL, 'inside_detection', 'detected', 0, '2019-03-19 16:26:48', '2019-03-19 10:56:48'),
(313, 0, '', '', 4, 8, '2019-03-26', '16:16:35', '2019-03-26', '16:16:35', NULL, 'inside_detection', 'detected', 0, '2019-03-26 16:16:33', '2019-03-26 10:46:35'),
(314, 0, '', '', 3, 9, '2019-03-28', '13:00:02', '2019-03-28', '13:00:02', NULL, 'inside_detection', 'detected', 0, '2019-03-28 13:00:01', '2019-03-28 07:30:02'),
(315, 0, '', '', 4, 9, '2019-03-28', '13:08:03', '2019-03-28', '13:08:03', NULL, 'inside_detection', 'detected', 0, '2019-03-28 13:08:01', '2019-03-28 07:38:03'),
(316, 0, '', '', 4, 27, '2019-03-28', '14:25:00', '2019-03-28', '14:25:00', NULL, 'inside_detection', 'detected', 0, '2019-03-28 14:24:58', '2019-03-28 08:55:00'),
(317, 0, '', '', 7, 7, '2019-04-02', '16:48:14', '2019-04-02', '16:48:14', NULL, 'inside_detection', 'detected', 0, '2019-04-02 16:48:13', '2019-04-02 11:18:14'),
(318, 0, '', '', 4, 7, '2019-04-02', '16:52:47', '2019-04-02', '16:52:47', NULL, 'inside_detection', 'detected', 0, '2019-04-02 16:52:44', '2019-04-02 11:22:47'),
(319, 0, '', '', 4, 7, '2019-04-12', '18:11:27', '2019-04-12', '18:11:27', NULL, 'inside_detection', 'detected', 0, '2019-04-12 18:11:25', '2019-04-12 12:41:27'),
(320, 0, '', '', 4, 8, '2019-04-13', '11:17:10', '2019-04-13', '11:17:10', NULL, 'inside_detection', 'detected', 0, '2019-04-13 11:17:08', '2019-04-13 05:47:10'),
(321, 0, '', '', 7, 7, '2019-04-13', '11:25:51', '2019-04-13', '11:25:51', NULL, 'inside_detection', 'detected', 0, '2019-04-13 11:25:49', '2019-04-13 05:55:51'),
(322, 0, '', '', 4, 7, '2019-04-15', '13:58:28', '2019-04-15', '13:58:28', NULL, 'inside_detection', 'detected', 0, '2019-04-15 13:58:26', '2019-04-15 08:28:28'),
(323, 0, '', '', 4, 9, '2019-04-15', '15:27:50', '2019-04-15', '15:27:50', NULL, 'inside_detection', 'detected', 0, '2019-04-15 15:27:45', '2019-04-15 09:57:50'),
(324, 0, '', '', 4, 7, '2019-04-16', '17:59:43', '2019-04-16', '17:59:43', NULL, 'inside_detection', 'detected', 0, '2019-04-16 17:59:42', '2019-04-16 12:29:43'),
(325, 0, '', '', 4, 8, '2019-04-16', '18:13:51', '2019-04-16', '18:13:51', NULL, 'inside_detection', 'detected', 0, '2019-04-16 18:13:50', '2019-04-16 12:43:51'),
(326, 0, '', '', 7, 7, '2019-04-17', '13:18:29', '2019-04-17', '13:18:29', NULL, 'inside_detection', 'detected', 0, '2019-04-17 13:18:26', '2019-04-17 07:48:29'),
(327, 0, '', '', 4, 7, '2019-04-17', '18:10:10', '2019-04-17', '18:10:10', NULL, 'inside_detection', 'detected', 0, '2019-04-17 18:10:09', '2019-04-17 12:40:10'),
(328, 0, '', '', 4, 9, '2019-04-17', '18:28:25', '2019-04-17', '18:28:25', NULL, 'inside_detection', 'detected', 0, '2019-04-17 18:28:24', '2019-04-17 12:58:25'),
(329, 0, '', '', 4, 7, '2019-04-30', '17:24:30', '2019-04-30', '17:24:30', NULL, 'inside_detection', 'detected', 0, '2019-04-30 17:24:27', '2019-04-30 11:54:30'),
(330, 0, '', '', 4, 7, '2019-05-02', '17:20:57', '2019-05-02', '17:20:57', NULL, 'inside_detection', 'detected', 0, '2019-05-02 17:20:55', '2019-05-02 11:50:57'),
(331, 0, '', '', 4, 7, '2019-05-08', '17:05:43', '2019-05-08', '17:05:43', NULL, 'inside_detection', 'detected', 0, '2019-05-08 17:05:40', '2019-05-08 11:35:43'),
(332, 0, '', '', 4, 8, '2019-05-08', '17:12:23', '2019-05-08', '17:12:23', NULL, 'inside_detection', 'detected', 0, '2019-05-08 17:12:21', '2019-05-08 11:42:23'),
(333, 0, '', '', 4, 9, '2019-05-13', '18:27:26', '2019-05-13', '18:27:26', NULL, 'inside_detection', 'detected', 0, '2019-05-13 18:27:23', '2019-05-13 12:57:26'),
(334, 0, '', '', 4, 7, '2019-05-13', '18:32:49', '2019-05-13', '18:32:49', NULL, 'inside_detection', 'detected', 0, '2019-05-13 18:32:46', '2019-05-13 13:02:49'),
(335, 0, '', '', 4, 8, '2019-05-14', '12:58:48', '2019-05-14', '12:58:48', NULL, 'inside_detection', 'detected', 0, '2019-05-14 12:58:45', '2019-05-14 07:28:48'),
(336, 0, '', '', 7, 7, '2019-05-15', '12:05:24', '2019-05-15', '12:05:24', NULL, 'inside_detection', 'detected', 0, '2019-05-15 12:05:23', '2019-05-15 06:35:24'),
(337, 0, '', '', 7, 9, '2019-05-15', '12:19:23', '2019-05-15', '12:19:23', NULL, 'inside_detection', 'detected', 0, '2019-05-15 12:19:22', '2019-05-15 06:49:23'),
(338, 0, '', '', 4, 9, '2019-05-15', '13:02:54', '2019-05-15', '13:02:54', NULL, 'inside_detection', 'detected', 0, '2019-05-15 13:02:50', '2019-05-15 07:32:54'),
(339, 0, '', '', 4, 7, '2019-05-15', '13:23:07', '2019-05-15', '13:23:07', NULL, 'inside_detection', 'detected', 0, '2019-05-15 13:23:03', '2019-05-15 07:53:07'),
(340, 0, '', '', 4, 32, '2019-05-15', '21:00:18', '2019-05-15', '21:00:18', NULL, 'inside_detection', 'detected', 0, '2019-05-15 21:00:14', '2019-05-15 15:30:18'),
(341, 0, '', '', 4, 7, '2019-05-16', '17:30:34', '2019-05-16', '17:30:34', NULL, 'inside_detection', 'detected', 0, '2019-05-16 17:30:30', '2019-05-16 12:00:34'),
(342, 0, '', '', 4, 7, '2019-05-18', '12:28:22', '2019-05-18', '12:28:22', NULL, 'inside_detection', 'detected', 0, '2019-05-18 12:28:17', '2019-05-18 06:58:22'),
(343, 0, '', '', 4, 7, '2019-05-20', '15:59:50', '2019-05-20', '15:59:50', NULL, 'inside_detection', 'detected', 0, '2019-05-20 15:59:49', '2019-05-20 10:29:50'),
(344, 0, '', '', 3, 8, '2019-05-22', '16:10:06', '2019-05-22', '16:10:06', NULL, 'inside_detection', 'detected', 0, '2019-05-22 16:10:06', '2019-05-22 10:40:06'),
(345, 0, '', '', 4, 8, '2019-05-22', '16:17:34', '2019-05-22', '16:17:34', NULL, 'inside_detection', 'detected', 0, '2019-05-22 16:17:32', '2019-05-22 10:47:34'),
(346, 0, '', '', 14, 32, '2019-05-23', '12:40:07', '2019-05-23', '12:40:07', NULL, 'inside_detection', 'detected', 0, '2019-05-23 12:49:33', '2019-05-23 07:10:07'),
(347, 0, '', '', 4, 32, '2019-05-23', '12:41:20', '2019-05-23', '12:41:20', NULL, 'inside_detection', 'detected', 0, '2019-05-23 12:41:18', '2019-05-23 07:11:20'),
(348, 0, '', '', 7, 32, '2019-05-23', '12:44:15', '2019-05-23', '12:44:15', NULL, 'inside_detection', 'detected', 0, '2019-05-23 12:44:12', '2019-05-23 07:14:15'),
(349, 0, '', '', 4, 8, '2019-05-27', '14:48:37', '2019-05-27', '14:48:37', NULL, 'inside_detection', 'detected', 0, '2019-05-27 14:48:35', '2019-05-27 09:18:37'),
(350, 0, '', '', 21, 8, '2019-06-03', '15:13:12', '2019-06-03', '15:13:12', NULL, 'inside_detection', 'detected', 0, '2019-06-03 15:13:11', '2019-06-03 09:43:12'),
(351, 0, '', '', 4, 8, '2019-06-04', '16:07:19', '2019-06-04', '16:07:19', NULL, 'inside_detection', 'detected', 0, '2019-06-04 16:07:16', '2019-06-04 10:37:19'),
(352, 0, '', '', 4, 8, '2019-06-08', '13:59:41', '2019-06-08', '13:59:41', NULL, 'inside_detection', 'detected', 0, '2019-06-08 13:59:40', '2019-06-08 08:29:41'),
(353, 0, '', '', 4, 8, '2019-06-18', '16:37:13', '2019-06-18', '16:37:13', NULL, 'inside_detection', 'detected', 0, '2019-06-18 16:37:10', '2019-06-18 11:07:13'),
(354, 0, '', '', 21, 30, '2019-06-28', '18:17:14', '2019-06-28', '18:17:14', NULL, 'inside_detection', 'detected', 0, '2019-06-28 08:47:15', '2019-06-28 12:47:14'),
(355, 0, '', '', 21, 30, '2019-06-29', '19:03:15', '2019-06-29', '19:03:15', NULL, 'inside_detection', 'detected', 0, '2019-06-29 09:33:18', '2019-06-29 13:33:15'),
(356, 0, '', '', 21, 30, '2019-06-30', '23:29:02', '2019-06-30', '23:29:02', NULL, 'inside_detection', 'detected', 0, '2019-06-30 13:59:08', '2019-06-30 17:59:02'),
(357, 0, '', '', 21, 30, '2019-07-02', '19:32:08', '2019-07-02', '19:32:08', NULL, 'inside_detection', 'detected', 0, '2019-07-02 10:02:10', '2019-07-02 14:02:08'),
(358, 0, '', '', 21, 30, '2019-07-03', '19:46:42', '2019-07-03', '19:46:42', NULL, 'inside_detection', 'detected', 0, '2019-07-03 10:16:46', '2019-07-03 14:16:42'),
(359, 0, '', '', 21, 30, '2019-07-05', '20:24:41', '2019-07-05', '20:24:41', NULL, 'inside_detection', 'detected', 0, '2019-07-05 10:54:39', '2019-07-05 14:54:41'),
(360, 0, '', '', 21, 30, '2019-07-07', '02:36:31', '2019-07-07', '02:36:31', NULL, 'inside_detection', 'detected', 0, '2019-07-06 17:06:30', '2019-07-06 21:06:31'),
(361, 0, '', '', 4, 8, '2019-07-22', '16:48:18', '2019-07-22', '16:48:18', NULL, 'inside_detection', 'detected', 0, '2019-07-22 16:48:15', '2019-07-22 11:18:18'),
(362, 0, '', '', 4, 8, '2019-07-26', '15:40:56', '2019-07-26', '15:40:56', NULL, 'inside_detection', 'detected', 0, '2019-07-26 15:40:55', '2019-07-26 10:10:56'),
(363, 0, '', '', 4, 8, '2019-08-06', '18:09:41', '2019-08-06', '18:09:41', NULL, 'inside_detection', 'detected', 0, '2019-08-06 18:09:40', '2019-08-06 12:39:41'),
(364, 0, '', '', 4, 49, '2019-08-13', '13:55:45', '2019-08-13', '13:55:45', NULL, 'inside_detection', 'detected', 0, '2019-08-13 13:55:42', '2019-08-13 08:25:45'),
(365, 0, '', '', 21, 8, '2019-08-21', '17:34:39', '2019-08-21', '17:34:39', NULL, 'inside_detection', 'detected', 0, '2019-08-21 17:34:38', '2019-08-21 12:04:39'),
(366, 0, '', '', 4, 10, '2019-09-10', '19:27:48', '2019-09-10', '19:27:48', NULL, 'inside_detection', 'detected', 0, '2019-09-10 19:27:44', '2019-09-10 13:57:48'),
(367, 0, '', '', 4, 8, '2019-09-11', '15:48:29', '2019-09-11', '15:48:29', NULL, 'inside_detection', 'detected', 0, '2019-09-11 15:48:28', '2019-09-11 10:18:29'),
(368, 0, '', '', 14, 10, '2019-09-13', '00:58:48', '2019-09-13', '00:58:48', NULL, 'inside_detection', 'detected', 0, '2019-09-13 01:16:15', '2019-09-12 19:28:48'),
(369, 0, '', '', 4, 10, '2019-09-13', '01:03:13', '2019-09-13', '01:03:13', NULL, 'inside_detection', 'detected', 0, '2019-09-13 01:03:12', '2019-09-12 19:33:13'),
(370, 0, '', '', 4, 8, '2019-09-13', '14:20:38', '2019-09-13', '14:20:38', NULL, 'inside_detection', 'detected', 0, '2019-09-13 14:20:37', '2019-09-13 08:50:38'),
(371, 0, '', '', 8, 8, '2019-09-13', '15:47:58', '2019-09-13', '15:47:58', NULL, 'inside_detection', 'detected', 0, '2019-09-13 15:47:57', '2019-09-13 10:17:58'),
(372, 0, '', '', 14, 10, '2019-09-14', '17:35:23', '2019-09-14', '17:35:23', NULL, 'inside_detection', 'detected', 0, '2019-09-14 17:53:03', '2019-09-14 12:05:23'),
(373, 0, '', '', 4, 10, '2019-09-14', '19:32:20', '2019-09-14', '19:32:20', NULL, 'inside_detection', 'detected', 0, '2019-09-14 19:32:14', '2019-09-14 14:02:20'),
(374, 0, '', '', 7, 51, '2019-09-16', '13:31:52', '2019-09-16', '13:31:52', NULL, 'inside_detection', 'detected', 0, '2019-09-16 13:31:51', '2019-09-16 08:01:52'),
(375, 0, '', '', 4, 10, '2019-09-18', '01:00:56', '2019-09-18', '01:00:56', NULL, 'inside_detection', 'detected', 0, '2019-09-18 01:00:54', '2019-09-17 19:30:56'),
(376, 0, '', '', 4, 10, '2019-09-19', '15:25:47', '2019-09-19', '15:25:47', NULL, 'inside_detection', 'detected', 0, '2019-09-19 15:25:45', '2019-09-19 09:55:47'),
(377, 0, '', '', 4, 53, '2019-09-19', '23:52:13', '2019-09-19', '23:52:13', NULL, 'inside_detection', 'detected', 0, '2019-09-19 23:52:09', '2019-09-19 18:22:13'),
(378, 0, '', '', 14, 8, '2019-09-23', '13:04:48', '2019-09-23', '13:04:48', NULL, 'inside_detection', 'detected', 0, '2019-09-23 13:04:56', '2019-09-23 07:34:48'),
(379, 0, '', '', 14, 51, '2019-09-23', '13:37:02', '2019-09-23', '13:37:02', NULL, 'inside_detection', 'detected', 0, '2019-09-23 13:37:10', '2019-09-23 08:07:02'),
(380, 0, '', '', 14, 53, '2019-09-24', '00:42:37', '2019-09-24', '00:42:37', NULL, 'inside_detection', 'detected', 0, '2019-09-24 00:42:47', '2019-09-23 19:12:37'),
(381, 0, '', '', 14, 10, '2019-09-24', '00:56:16', '2019-09-24', '00:56:16', NULL, 'inside_detection', 'detected', 0, '2019-09-24 00:56:26', '2019-09-23 19:26:16'),
(382, 0, '', '', 4, 8, '2019-09-24', '12:30:36', '2019-09-24', '12:30:36', NULL, 'inside_detection', 'detected', 0, '2019-09-24 12:30:34', '2019-09-24 07:00:36'),
(383, 0, '', '', 14, 8, '2019-09-24', '15:14:04', '2019-09-24', '15:14:04', NULL, 'inside_detection', 'detected', 0, '2019-09-24 15:14:16', '2019-09-24 09:44:04'),
(384, 0, '', '', 4, 10, '2019-09-25', '12:06:31', '2019-09-25', '12:06:31', NULL, 'inside_detection', 'detected', 0, '2019-09-25 12:06:30', '2019-09-25 06:36:31'),
(385, 0, '', '', 14, 10, '2019-09-25', '12:14:54', '2019-09-25', '12:14:54', NULL, 'inside_detection', 'detected', 0, '2019-09-25 12:15:11', '2019-09-25 06:44:54'),
(386, 0, '', '', 4, 8, '2019-09-25', '13:15:41', '2019-09-25', '13:15:41', NULL, 'inside_detection', 'detected', 0, '2019-09-25 13:15:40', '2019-09-25 07:45:41'),
(387, 0, '', '', 7, 8, '2019-09-26', '15:27:05', '2019-09-26', '15:27:05', NULL, 'inside_detection', 'detected', 0, '2019-09-26 15:27:04', '2019-09-26 09:57:05'),
(388, 0, '', '', 40, 8, '2019-09-26', '16:17:27', '2019-09-26', '16:17:27', NULL, 'inside_detection', 'detected', 0, '2019-09-26 16:17:26', '2019-09-26 10:47:27'),
(389, 0, '', '', 4, 8, '2019-09-26', '16:24:19', '2019-09-26', '16:24:19', NULL, 'inside_detection', 'detected', 0, '2019-09-26 16:24:18', '2019-09-26 10:54:19'),
(390, 0, '', '', 4, 10, '2019-09-26', '23:20:02', '2019-09-26', '23:20:02', NULL, 'inside_detection', 'detected', 0, '2019-09-26 23:19:58', '2019-09-26 17:50:02'),
(391, 0, '', '', 14, 10, '2019-09-27', '00:16:58', '2019-09-27', '00:16:58', NULL, 'inside_detection', 'detected', 0, '2019-09-27 00:17:21', '2019-09-26 18:46:58'),
(392, 0, '', '', 41, 30, '2019-09-28', '20:20:02', '2019-09-28', '20:20:02', NULL, 'inside_detection', 'detected', 0, '2019-09-28 10:50:03', '2019-09-28 14:50:02'),
(393, 0, '', '', 41, 30, '2019-09-30', '01:21:42', '2019-09-30', '01:21:42', NULL, 'inside_detection', 'detected', 0, '2019-09-29 15:51:40', '2019-09-29 19:51:42'),
(394, 0, '', '', 7, 8, '2019-09-30', '16:12:29', '2019-09-30', '16:12:29', NULL, 'inside_detection', 'detected', 0, '2019-09-30 16:12:29', '2019-09-30 10:42:29'),
(395, 0, '', '', 41, 30, '2019-10-01', '19:58:41', '2019-10-01', '19:58:41', NULL, 'inside_detection', 'detected', 0, '2019-10-01 10:28:44', '2019-10-01 14:28:41'),
(396, 0, '', '', 4, 10, '2019-10-02', '00:02:28', '2019-10-02', '00:02:28', NULL, 'inside_detection', 'detected', 0, '2019-10-02 00:02:26', '2019-10-01 18:32:28'),
(397, 0, '', '', 7, 49, '2019-10-02', '12:33:29', '2019-10-02', '12:33:29', NULL, 'inside_detection', 'detected', 0, '2019-10-02 12:33:27', '2019-10-02 07:03:29'),
(398, 0, '', '', 4, 8, '2019-10-02', '17:25:32', '2019-10-02', '17:25:32', NULL, 'inside_detection', 'detected', 0, '2019-10-02 17:25:30', '2019-10-02 11:55:32'),
(399, 0, '', '', 41, 30, '2019-10-02', '21:16:57', '2019-10-02', '21:16:57', NULL, 'inside_detection', 'detected', 0, '2019-10-02 11:47:01', '2019-10-02 15:46:57'),
(400, 0, '', '', 4, 10, '2019-10-03', '09:38:46', '2019-10-03', '09:38:46', NULL, 'inside_detection', 'detected', 0, '2019-10-03 09:38:43', '2019-10-03 04:08:46'),
(401, 0, '', '', 41, 30, '2019-10-03', '22:49:37', '2019-10-03', '22:49:37', NULL, 'inside_detection', 'detected', 0, '2019-10-03 13:19:33', '2019-10-03 17:19:37'),
(402, 0, '', '', 41, 30, '2019-10-05', '02:18:08', '2019-10-05', '02:18:08', NULL, 'inside_detection', 'detected', 0, '2019-10-04 16:48:08', '2019-10-04 20:48:08'),
(403, 0, '', '', 41, 30, '2019-10-06', '19:13:49', '2019-10-06', '19:13:49', NULL, 'inside_detection', 'detected', 0, '2019-10-06 09:43:53', '2019-10-06 13:43:49'),
(404, 0, '', '', 41, 30, '2019-10-07', '23:17:36', '2019-10-07', '23:17:36', NULL, 'inside_detection', 'detected', 0, '2019-10-07 13:47:35', '2019-10-07 17:47:36'),
(405, 0, '', '', 4, 8, '2019-10-10', '17:35:49', '2019-10-10', '17:35:49', NULL, 'inside_detection', 'detected', 0, '2019-10-10 17:35:48', '2019-10-10 12:05:49'),
(406, 0, '', '', 41, 30, '2019-10-12', '00:19:37', '2019-10-12', '00:19:37', NULL, 'inside_detection', 'detected', 0, '2019-10-11 14:49:41', '2019-10-11 18:49:37'),
(407, 0, '', '', 7, 8, '2019-10-14', '16:57:47', '2019-10-14', '16:57:47', NULL, 'inside_detection', 'detected', 0, '2019-10-14 16:57:45', '2019-10-14 11:27:47'),
(408, 0, '', '', 41, 30, '2019-10-15', '18:41:36', '2019-10-15', '18:41:36', NULL, 'inside_detection', 'detected', 0, '2019-10-15 09:11:41', '2019-10-15 13:11:36'),
(409, 0, '', '', 4, 10, '2019-10-17', '01:24:20', '2019-10-17', '01:24:20', NULL, 'inside_detection', 'detected', 0, '2019-10-17 01:24:17', '2019-10-16 19:54:20'),
(410, 0, '', '', 4, 8, '2019-10-17', '16:16:36', '2019-10-17', '16:16:36', NULL, 'inside_detection', 'detected', 0, '2019-10-17 16:16:33', '2019-10-17 10:46:36'),
(411, 0, '', '', 41, 30, '2019-10-31', '23:30:38', '2019-10-31', '23:30:38', NULL, 'inside_detection', 'detected', 0, '2019-10-31 14:00:36', '2019-10-31 18:00:38'),
(412, 0, '', '', 41, 30, '2019-11-02', '18:52:34', '2019-11-02', '18:52:34', NULL, 'inside_detection', 'detected', 0, '2019-11-02 09:22:36', '2019-11-02 13:22:34'),
(413, 0, '', '', 4, 8, '2019-11-15', '12:13:31', '2019-11-15', '12:13:31', NULL, 'inside_detection', 'detected', 0, '2019-11-15 12:13:30', '2019-11-15 06:43:31'),
(414, 0, '', '', 41, 30, '2019-11-19', '21:50:52', '2019-11-19', '21:50:52', NULL, 'inside_detection', 'detected', 0, '2019-11-19 11:20:52', '2019-11-19 16:20:52'),
(415, 0, '', '', 7, 8, '2019-11-20', '13:19:10', '2019-11-20', '13:19:10', NULL, 'inside_detection', 'detected', 0, '2019-11-20 13:19:09', '2019-11-20 07:49:10'),
(416, 0, '', '', 7, 8, '2019-11-22', '11:33:23', '2019-11-22', '11:33:23', NULL, 'inside_detection', 'detected', 0, '2019-11-22 11:33:22', '2019-11-22 06:03:23'),
(417, 0, '', '', 41, 30, '2019-11-28', '01:52:08', '2019-11-28', '01:52:08', NULL, 'inside_detection', 'detected', 0, '2019-11-27 15:22:07', '2019-11-27 20:22:08'),
(418, 0, '', '', 4, 8, '2019-12-10', '15:07:59', '2019-12-10', '15:07:59', NULL, 'inside_detection', 'detected', 0, '2019-12-10 15:07:57', '2019-12-10 09:37:59'),
(419, 0, '', '', 4, 8, '2020-01-16', '16:55:17', '2020-01-16', '16:55:17', NULL, 'inside_detection', 'detected', 0, '2020-01-16 16:55:16', '2020-01-16 11:25:17'),
(420, 0, '', '', 41, 30, '2020-01-20', '20:23:15', '2020-01-20', '20:23:15', NULL, 'inside_detection', 'detected', 0, '2020-01-20 09:53:22', '2020-01-20 14:53:15'),
(421, 0, '', '', 41, 30, '2020-01-23', '23:48:02', '2020-01-23', '23:48:02', NULL, 'inside_detection', 'detected', 0, '2020-01-23 13:18:00', '2020-01-23 18:18:02'),
(422, 0, '', '', 41, 30, '2020-01-24', '23:51:15', '2020-01-24', '23:51:15', NULL, 'inside_detection', 'detected', 0, '2020-01-24 13:21:15', '2020-01-24 18:21:15'),
(423, 0, '', '', 41, 30, '2020-01-26', '01:45:19', '2020-01-26', '01:45:19', NULL, 'inside_detection', 'detected', 0, '2020-01-25 15:15:18', '2020-01-25 20:15:19'),
(424, 0, '', '', 41, 30, '2020-02-09', '20:26:00', '2020-02-09', '20:26:00', NULL, 'inside_detection', 'detected', 0, '2020-02-09 09:55:59', '2020-02-09 14:56:00'),
(425, 0, '', '', 41, 57, '2020-02-10', '17:55:19', '2020-02-10', '17:55:19', NULL, 'inside_detection', 'detected', 0, '2020-02-10 07:25:19', '2020-02-10 12:25:19'),
(426, 0, '', '', 4, 8, '2020-02-10', '18:28:25', '2020-02-10', '18:28:25', NULL, 'inside_detection', 'detected', 0, '2020-02-10 18:28:21', '2020-02-10 12:58:25'),
(427, 0, '', '', 4, 8, '2020-02-14', '19:01:44', '2020-02-14', '19:01:44', NULL, 'inside_detection', 'detected', 0, '2020-02-14 19:01:43', '2020-02-14 13:31:44'),
(428, 0, '', '', 4, 51, '2020-02-14', '19:56:37', '2020-02-14', '19:56:37', NULL, 'inside_detection', 'detected', 0, '2020-02-14 19:56:35', '2020-02-14 14:26:37'),
(429, 0, '', '', 41, 57, '2020-02-15', '09:30:55', '2020-02-15', '09:30:55', NULL, 'inside_detection', 'detected', 0, '2020-02-14 23:00:55', '2020-02-15 04:00:55'),
(430, 0, '', '', 41, 57, '2020-02-16', '20:05:34', '2020-02-16', '20:05:34', NULL, 'inside_detection', 'detected', 0, '2020-02-16 09:35:33', '2020-02-16 14:35:34'),
(431, 0, '', '', 4, 51, '2020-02-17', '15:54:55', '2020-02-17', '15:54:55', NULL, 'inside_detection', 'detected', 0, '2020-02-17 15:54:54', '2020-02-17 10:24:55'),
(432, 0, '', '', 41, 57, '2020-02-18', '05:25:08', '2020-02-18', '05:25:08', NULL, 'inside_detection', 'detected', 0, '2020-02-17 18:55:07', '2020-02-17 23:55:08'),
(433, 0, '', '', 44, 30, '2020-02-19', '01:24:38', '2020-02-19', '01:24:38', NULL, 'inside_detection', 'detected', 0, '2020-02-18 14:54:36', '2020-02-18 19:54:38'),
(434, 0, '', '', 41, 57, '2020-02-19', '06:06:43', '2020-02-19', '06:06:43', NULL, 'inside_detection', 'detected', 0, '2020-02-18 19:36:46', '2020-02-19 00:36:43'),
(435, 0, '', '', 41, 30, '2020-02-19', '20:35:53', '2020-02-19', '20:35:53', NULL, 'inside_detection', 'detected', 0, '2020-02-19 10:05:56', '2020-02-19 15:05:53'),
(436, 0, '', '', 41, 57, '2020-02-20', '07:58:22', '2020-02-20', '07:58:22', NULL, 'inside_detection', 'detected', 0, '2020-02-19 21:28:25', '2020-02-20 02:28:22'),
(437, 0, '', '', 41, 55, '2020-02-21', '02:32:51', '2020-02-21', '02:32:51', NULL, 'inside_detection', 'detected', 0, '2020-02-20 16:02:54', '2020-02-20 21:02:51'),
(438, 0, '', '', 4, 8, '2020-02-21', '12:51:08', '2020-02-21', '12:51:08', NULL, 'inside_detection', 'detected', 0, '2020-02-21 12:51:07', '2020-02-21 07:21:08'),
(439, 0, '', '', 4, 51, '2020-02-21', '12:56:14', '2020-02-21', '12:56:14', NULL, 'inside_detection', 'detected', 0, '2020-02-21 12:56:12', '2020-02-21 07:26:14'),
(440, 0, '', '', 41, 30, '2020-02-21', '19:56:50', '2020-02-21', '19:56:50', NULL, 'inside_detection', 'detected', 0, '2020-02-21 09:26:53', '2020-02-21 14:26:50'),
(441, 0, '', '', 44, 30, '2020-02-21', '19:57:49', '2020-02-21', '19:57:49', NULL, 'inside_detection', 'detected', 0, '2020-02-21 09:27:48', '2020-02-21 14:27:49'),
(442, 0, '', '', 41, 55, '2020-02-22', '03:48:41', '2020-02-22', '03:48:41', NULL, 'inside_detection', 'detected', 0, '2020-02-21 17:18:45', '2020-02-21 22:18:41'),
(443, 0, '', '', 41, 57, '2020-02-22', '05:52:21', '2020-02-22', '05:52:21', NULL, 'inside_detection', 'detected', 0, '2020-02-21 19:22:24', '2020-02-22 00:22:21'),
(444, 0, '', '', 41, 30, '2020-02-22', '20:05:45', '2020-02-22', '20:05:45', NULL, 'inside_detection', 'detected', 0, '2020-02-22 09:35:49', '2020-02-22 14:35:45'),
(445, 0, '', '', 45, 30, '2020-02-22', '20:16:21', '2020-02-22', '20:16:21', NULL, 'inside_detection', 'detected', 0, '2020-02-22 09:46:23', '2020-02-22 14:46:21'),
(446, 0, '', '', 41, 55, '2020-02-23', '04:06:37', '2020-02-23', '04:06:37', NULL, 'inside_detection', 'detected', 0, '2020-02-22 17:36:40', '2020-02-22 22:36:37'),
(447, 0, '', '', 41, 30, '2020-02-23', '20:29:00', '2020-02-23', '20:29:00', NULL, 'inside_detection', 'detected', 0, '2020-02-23 09:59:03', '2020-02-23 14:59:00'),
(448, 0, '', '', 44, 30, '2020-02-23', '20:40:08', '2020-02-23', '20:40:08', NULL, 'inside_detection', 'detected', 0, '2020-02-23 10:10:06', '2020-02-23 15:10:08'),
(449, 0, '', '', 44, 30, '2020-02-25', '02:49:31', '2020-02-25', '02:49:31', NULL, 'inside_detection', 'detected', 0, '2020-02-24 16:19:30', '2020-02-24 21:19:31'),
(450, 0, '', '', 41, 55, '2020-02-25', '03:03:08', '2020-02-25', '03:03:08', NULL, 'inside_detection', 'detected', 0, '2020-02-24 16:33:08', '2020-02-24 21:33:08'),
(451, 0, '', '', 41, 57, '2020-02-25', '06:16:41', '2020-02-25', '06:16:41', NULL, 'inside_detection', 'detected', 0, '2020-02-24 19:46:41', '2020-02-25 00:46:41'),
(452, 0, '', '', 51, 30, '2020-02-25', '22:42:24', '2020-02-25', '22:42:24', NULL, 'inside_detection', 'detected', 0, '2020-02-25 12:12:22', '2020-02-25 17:12:24'),
(453, 0, '', '', 52, 30, '2020-02-26', '00:15:19', '2020-02-26', '00:15:19', NULL, 'inside_detection', 'detected', 0, '2020-02-25 13:45:22', '2020-02-25 18:45:19'),
(454, 0, '', '', 50, 55, '2020-02-26', '02:02:43', '2020-02-26', '02:02:43', NULL, 'inside_detection', 'detected', 0, '2020-02-25 15:32:44', '2020-02-25 20:32:43'),
(455, 0, '', '', 50, 30, '2020-02-26', '19:57:28', '2020-02-26', '19:57:28', NULL, 'inside_detection', 'detected', 0, '2020-02-26 09:27:29', '2020-02-26 14:27:28'),
(456, 0, '', '', 50, 57, '2020-02-27', '05:18:58', '2020-02-27', '05:18:58', NULL, 'inside_detection', 'detected', 0, '2020-02-26 18:48:59', '2020-02-26 23:48:58'),
(457, 0, '', '', 50, 30, '2020-02-27', '20:26:40', '2020-02-27', '20:26:40', NULL, 'inside_detection', 'detected', 0, '2020-02-27 09:56:41', '2020-02-27 14:56:40'),
(458, 0, '', '', 50, 57, '2020-03-01', '18:19:35', '2020-03-01', '18:19:35', NULL, 'inside_detection', 'detected', 0, '2020-03-01 07:49:34', '2020-03-01 12:49:35'),
(459, 0, '', '', 50, 30, '2020-03-01', '19:42:25', '2020-03-01', '19:42:25', NULL, 'inside_detection', 'detected', 0, '2020-03-01 09:12:26', '2020-03-01 14:12:25'),
(460, 0, '', '', 52, 30, '2020-03-01', '19:43:42', '2020-03-01', '19:43:42', NULL, 'inside_detection', 'detected', 0, '2020-03-01 09:13:42', '2020-03-01 14:13:42'),
(461, 0, '', '', 50, 55, '2020-03-02', '20:25:30', '2020-03-02', '20:25:30', NULL, 'inside_detection', 'detected', 0, '2020-03-02 09:55:31', '2020-03-02 14:55:30'),
(462, 0, '', '', 52, 55, '2020-03-02', '20:51:38', '2020-03-02', '20:51:38', NULL, 'inside_detection', 'detected', 0, '2020-03-02 10:21:37', '2020-03-02 15:21:38'),
(463, 0, '', '', 51, 30, '2020-03-03', '20:16:05', '2020-03-03', '20:16:05', NULL, 'inside_detection', 'detected', 0, '2020-03-03 09:46:03', '2020-03-03 14:46:05'),
(464, 0, '', '', 50, 55, '2020-03-03', '21:16:27', '2020-03-03', '21:16:27', NULL, 'inside_detection', 'detected', 0, '2020-03-03 10:46:26', '2020-03-03 15:46:27'),
(465, 0, '', '', 50, 57, '2020-03-04', '07:19:13', '2020-03-04', '07:19:13', NULL, 'inside_detection', 'detected', 0, '2020-03-03 20:49:12', '2020-03-04 01:49:13'),
(466, 0, '', '', 50, 30, '2020-03-04', '20:04:13', '2020-03-04', '20:04:13', NULL, 'inside_detection', 'detected', 0, '2020-03-04 09:34:12', '2020-03-04 14:34:13'),
(467, 0, '', '', 52, 30, '2020-03-04', '20:18:24', '2020-03-04', '20:18:24', NULL, 'inside_detection', 'detected', 0, '2020-03-04 09:48:24', '2020-03-04 14:48:24'),
(468, 0, '', '', 50, 55, '2020-03-05', '03:23:50', '2020-03-05', '03:23:50', NULL, 'inside_detection', 'detected', 0, '2020-03-04 16:53:49', '2020-03-04 21:53:50'),
(469, 0, '', '', 50, 57, '2020-03-05', '07:48:42', '2020-03-05', '07:48:42', NULL, 'inside_detection', 'detected', 0, '2020-03-04 21:18:42', '2020-03-05 02:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `T_Beacons`
--

CREATE TABLE `T_Beacons` (
  `id` int(11) NOT NULL,
  `space_id` int(11) DEFAULT NULL,
  `store_id` int(20) DEFAULT NULL,
  `is_entrance_beacon` int(10) DEFAULT NULL,
  `beacon_key` varchar(50) DEFAULT NULL,
  `beacon_name` varchar(255) NOT NULL,
  `beacon_place` varchar(50) DEFAULT NULL,
  `beacon_uuid` varchar(255) NOT NULL,
  `beacon_major` varchar(255) NOT NULL,
  `beacon_minor` varchar(255) NOT NULL,
  `beacon_text` text,
  `beacon_type` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Beacons`
--

INSERT INTO `T_Beacons` (`id`, `space_id`, `store_id`, `is_entrance_beacon`, `beacon_key`, `beacon_name`, `beacon_place`, `beacon_uuid`, `beacon_major`, `beacon_minor`, `beacon_text`, `beacon_type`, `created_date`, `last_updated_date`) VALUES
(1, NULL, 8, 1, 'cfot', 'Entry ', 'entry point', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '58609', '60661', 'welcome to Magazine', 'cashrub_beacon', '2018-09-20 17:54:08', '2018-09-27 11:00:29'),
(2, NULL, 8, NULL, 'Y0Rn', 'inside', 'inside store', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '53273', '38057', 'Magzine fiction section', 'cashrub_beacon', '2018-09-20 17:54:12', '2019-09-20 07:21:00'),
(13, NULL, 8, NULL, '7Gyl', 'inside beacon', 'kids section', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '32383', '21041', 'magazine kid\'s section', 'cashrub_beacon', '2018-10-05 17:53:48', '2018-10-30 11:36:49'),
(32, NULL, 7, NULL, 'Bill0', 'Entry', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '33382', '22040', 'Welcome to the Store...', 'cashrub_beacon', '2019-04-02 16:42:05', '2019-04-12 12:38:35'),
(33, NULL, 7, NULL, 'yM0n', 'inside ', 'Inside store', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '33383', '22041', 'Check Our Latest offers....', 'cashrub_beacon', '2019-04-02 16:42:23', '2019-04-12 12:40:45'),
(40, NULL, 10, NULL, 'EF03', 'Entry', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '4', '2', 'Welcome to seasons mall EF03', 'cashrub_beacon', '2019-05-23 09:26:48', '2019-10-03 04:12:48'),
(41, NULL, 10, NULL, '39DE', 'inside ', 'inside', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '5', '2', 'Seasons Mall - Great deals all around 39DE', 'cashrub_beacon', '2019-05-23 09:26:49', '2019-10-03 04:14:56'),
(42, NULL, 49, NULL, 'sImO', 'Entry', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '10304', '7788', 'Diamond Int Warmly Welcomes You', 'cashrub_beacon', '2019-08-13 13:33:45', '2019-10-02 07:14:23'),
(43, NULL, 49, NULL, 'IbhZ', 'Inside', 'Inside store', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '22143', '52826', 'Exclusive Deals on Gems\r\n', 'cashrub_beacon', '2019-08-13 13:33:45', '2019-10-02 07:13:25'),
(46, NULL, 50, NULL, 'L2aR', 'welcome', 'entry door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '8654', '40321', 'TenniStation welcomes you', 'cashrub_beacon', '2019-09-02 11:35:14', '2019-09-02 06:10:38'),
(47, NULL, 50, NULL, 'yFch', 'in store', 'central lobby', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '33634', '8536', 'we offer curated fashion for you', 'cashrub_beacon', '2019-09-02 11:36:11', '2019-09-02 06:12:23'),
(48, NULL, 51, NULL, '6E7F', 'Entry6E7F', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '3', '2', 'VMPL Welcomes You', 'cashrub_beacon', '2019-09-03 15:45:49', '2020-02-14 14:19:08'),
(49, NULL, 51, NULL, '6E7D', 'inside6E7D', 'inside store', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '1', '2', 'Explore our Range of Services 6E7D', 'cashrub_beacon', '2019-09-03 15:45:49', '2020-02-14 14:18:47'),
(50, NULL, 53, NULL, '6F25', 'Entry', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '7', '2', 'rijesh toys welcomes you', 'cashrub_beacon', '2019-09-19 23:42:29', '2019-09-19 18:17:23'),
(51, NULL, 53, NULL, '6F24', 'inside ', 'Inside store', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '6', '2', 'spl discount on soft toys', 'cashrub_beacon', '2019-09-19 23:42:30', '2019-09-19 18:20:00'),
(54, NULL, 51, NULL, '0gEq', 'My Desk 0gEq', 'desk', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '38639', '62333', 'Hi Buddy', 'cashrub_beacon', '2020-02-14 19:50:08', '2020-02-14 14:22:56'),
(55, NULL, 57, NULL, '0Sf5', '0Sf5 Entry', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '53493', '22320', 'Welcome at Amits Place', 'cashrub_beacon', '2020-02-17 23:50:14', '2020-02-17 18:41:58'),
(56, NULL, 57, NULL, '1uJA', '1uJA Inside', 'Inside place', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '48860', '51703', 'Explore Best in class offerings ', 'cashrub_beacon', '2020-02-17 23:54:10', '2020-02-17 18:44:25'),
(57, NULL, 30, NULL, 'v6fF', 'v6fF', 'Parklane', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '33635', '8536', 'This is v6fF', 'cashrub_beacon', '2020-02-19 00:02:32', '2020-03-01 05:38:51'),
(58, NULL, 30, NULL, 'aXRS', 'aXRS', 'Parklane', 'f7826da6-4fa2-4e98-8024-bc5b71e0894e', '17104', '61933', 'This is aXRS', 'cashrub_beacon', '2020-02-19 00:02:33', '2020-03-01 05:39:10'),
(59, NULL, 55, 1, 'A8gy', 'A8gy Entry', 'Entry Door', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '26356', '63891', 'I\'M A8gy', 'cashrub_beacon', '2020-02-19 08:47:03', '2020-02-20 04:11:57'),
(60, NULL, 55, NULL, 'j14D', 'j14D DC INSIDE', 'INSIDE', 'f7826da6-4fa2-4e98-8024-bc5b71e0893e', '34879', '33019', 'im j14D', 'cashrub_beacon', '2020-02-19 08:47:04', '2020-02-20 04:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `T_Category`
--

CREATE TABLE `T_Category` (
  `category_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_image` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Category`
--

INSERT INTO `T_Category` (`category_id`, `name`, `category_image`, `created_date`, `last_updated_date`) VALUES
(1, 'Food', 'food.jpg', '2017-03-24 06:46:38', '2017-05-30 11:45:43'),
(2, 'Lifestyle', 'life.png', '2017-03-24 06:46:38', '2017-05-30 11:45:50'),
(3, 'Electronics', 'ele.png', '2017-03-24 06:46:58', '2017-05-30 11:45:58'),
(4, 'Entertainment', 'enter.png', '2017-04-27 08:09:07', '2017-05-30 11:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `T_Categorys`
--

CREATE TABLE `T_Categorys` (
  `category_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category_image` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Categorys`
--

INSERT INTO `T_Categorys` (`category_id`, `name`, `category_image`, `created_date`, `last_updated_date`) VALUES
(1, 'Food', 'food.png', '2017-03-24 06:46:38', '2017-07-05 13:14:32'),
(2, 'Lifestyle', 'life.png', '2017-03-24 06:46:38', '2017-05-30 11:45:50'),
(3, 'Electronics', 'ele.png', '2017-03-24 06:46:58', '2017-05-30 11:45:58'),
(4, 'Entertainment', 'enter.png', '2017-04-27 08:09:07', '2017-05-30 11:46:05'),
(5, 'Drinks', 'drinks.png', '2017-05-30 11:53:08', '2017-05-30 12:08:36'),
(6, 'Health', 'health.png', '2017-05-30 11:53:08', '2017-05-30 12:09:25'),
(7, 'Fitness', 'fitness.png', '2017-05-30 11:54:01', '2017-05-30 12:10:02'),
(8, 'Home', 'home.png', '2017-05-30 11:54:01', '2017-05-30 12:10:35'),
(9, 'Auto', 'auto.png', '2017-05-30 11:54:35', '2017-05-30 12:11:10'),
(10, 'Travel', 'travel.png', '2017-05-30 11:54:35', '2017-05-30 12:11:39'),
(11, 'Beauty', 'beauty.png', '2017-05-30 11:55:14', '2017-05-30 12:12:28'),
(12, 'Shopping', 'shop.png', '2017-05-30 11:55:14', '2017-05-30 12:13:03'),
(13, 'Education', 'education.png', '2017-05-30 11:55:45', '2017-07-05 13:14:48'),
(14, 'OutDoors', 'outdoors.png', '2017-05-30 11:55:45', '2017-07-05 13:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `T_Coupon`
--

CREATE TABLE `T_Coupon` (
  `coupon_id` int(20) NOT NULL,
  `coupon_title` varchar(50) DEFAULT NULL,
  `coupon_description` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `store_offer_id` int(20) DEFAULT NULL,
  `coupon_image` text,
  `category_id` int(20) DEFAULT NULL,
  `terms` text,
  `coupon_expiry_date` date DEFAULT NULL,
  `claims` int(20) DEFAULT '0',
  `coupon_points` int(20) DEFAULT NULL,
  `status` int(20) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Coupon`
--

INSERT INTO `T_Coupon` (`coupon_id`, `coupon_title`, `coupon_description`, `store_id`, `store_offer_id`, `coupon_image`, `category_id`, `terms`, `coupon_expiry_date`, `claims`, `coupon_points`, `status`, `created_date`, `last_updated_date`) VALUES
(1, 'Magazine', '10% off', 'Magazine', NULL, 'th.jpg', 4, 'following are the terms and conditions..', '2018-09-20', 13, 10, 11, '2018-09-20 12:49:23', '2019-09-20 10:06:41'),
(2, '50% OFF on bookmyshow', '50% OFF on bookmyshow', 'bookmyshow', NULL, 'download (1).png', 2, '50% OFF on bookmyshow', '2019-09-08', 11, 10, 11, '2018-09-21 09:48:38', '2019-08-30 10:38:58'),
(3, 'CCD', 'Café Coffee Day (abbreviated as CCD) is an Indian café chain owned by Coffee Day Global Limited', 'CCD', NULL, 'ccd-logo-.jpg', 5, 'Following are the terms and conditions.', '2019-06-29', 12, 20, 11, '2018-09-24 12:16:13', '2019-09-20 10:06:44'),
(4, '50 % OFF on beverages ', '50 % OFF on beverages ', 'Mcdonald', NULL, 'images (1).jpg', 1, '50 % OFF on beverages ', '2018-09-25', 1, 12, 11, '2018-09-25 11:04:45', '2019-09-20 10:06:47'),
(5, '70 - 80 % OFF on Amazon', '70 - 80 % OFF on Amazon.. ', 'Amazon', NULL, 'images (5).jpg', 2, '70 - 80 % OFF on Amazon', '2018-09-25', 0, 10, 11, '2018-09-25 11:49:15', '2019-09-20 10:06:38'),
(6, '70-80 % OFF on amazon', '70-80 % OFF on amazon', 'Amazon', NULL, 'images (5).jpg', 2, '70-80 % OFF on amazon', '2019-11-30', 3, 12, 11, '2018-09-26 10:43:56', '2019-08-30 10:39:05'),
(7, '60 % OFF on drinks and deserts ', '60 % OFF on drinks and deserts ', 'Mcdonald', NULL, 'images (1).jpg', 1, '60 % OFF on drinks and deserts ', '2019-08-31', 15, 12, 11, '2018-09-26 10:45:14', '2019-08-30 10:39:07'),
(8, 'Stay High With Style', 'Bamboo Zip Pullover', 'Cariloha Bamboo', NULL, 'httpswww.cariloha.commediacatalogproductm_m_quarterzip_cabanablue3.jpg', 2, 'Redeem Policy', '2019-10-31', 2, 22, 9, '2019-08-30 10:36:32', '2019-10-31 19:52:27'),
(9, 'Scent for Cents', 'Perfumes & Body Mists', 'Parklane Luxe', NULL, 'index.jpg', 2, 'Redeem Policy', '2019-09-20', 1, 40, 9, '2019-09-20 09:27:55', '2019-09-20 23:29:58'),
(10, 'Perfect Gift', 'Studded Ring', 'Diamond International', NULL, 'DI.jpg', 12, 'Redeem Policy', '2019-11-15', 7, 100, 9, '2019-09-20 09:34:27', '2019-11-15 20:29:11'),
(11, 'Collectible Crystal Figurine & Gifts', 'Collectible Crystal Figurine & Gifts', 'Tag Heuer Boutique', NULL, 'tag heuer.jpg', 2, 'Redeem Policy', '2019-09-20', 2, 150, 9, '2019-09-20 09:39:29', '2019-09-20 23:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `T_CouponClaims`
--

CREATE TABLE `T_CouponClaims` (
  `id` int(20) NOT NULL,
  `coupon_id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL,
  `claim_code` int(20) DEFAULT NULL,
  `claim_date` date NOT NULL,
  `claim_status` int(20) NOT NULL DEFAULT '0',
  `request_status` int(5) NOT NULL DEFAULT '2',
  `claim_for_rubs` int(50) NOT NULL DEFAULT '0',
  `coupon_visibility_for_user` int(20) DEFAULT '2',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_CouponClaims`
--

INSERT INTO `T_CouponClaims` (`id`, `coupon_id`, `user_id`, `claim_code`, `claim_date`, `claim_status`, `request_status`, `claim_for_rubs`, `coupon_visibility_for_user`, `created_date`, `last_updated_date`) VALUES
(1, 1, 2, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:52:03', '2018-09-20 12:52:03'),
(2, 1, 2, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:52:29', '2018-09-20 12:52:29'),
(3, 1, 3, NULL, '2018-09-20', 1, 10, 10, 0, '2018-09-20 12:52:31', '2018-09-20 12:53:29'),
(4, 1, 2, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:52:33', '2018-09-20 12:52:33'),
(5, 1, 2, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:55:24', '2018-09-20 12:55:24'),
(6, 1, 1, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:55:34', '2018-09-20 12:55:34'),
(7, 1, 1, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:55:56', '2018-09-20 12:55:56'),
(8, 1, 2, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:57:06', '2018-09-20 12:57:06'),
(9, 1, 1, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 12:57:57', '2018-09-20 12:57:57'),
(10, 1, 1, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 13:00:47', '2018-09-20 13:00:47'),
(11, 1, 5, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 15:38:47', '2018-09-20 15:38:47'),
(12, 1, 5, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 15:38:50', '2018-09-20 15:38:50'),
(13, 1, 5, NULL, '2018-09-20', 1, 2, 10, 0, '2018-09-20 15:38:51', '2018-09-20 15:38:51'),
(14, 2, 2, NULL, '2018-09-24', 1, 10, 10, 0, '2018-09-24 06:28:35', '2018-09-24 06:28:53'),
(15, 2, 3, NULL, '2018-09-24', 1, 10, 10, 0, '2018-09-24 09:11:20', '2018-09-24 10:11:00'),
(16, 2, 2, NULL, '2018-09-24', 1, 10, 10, 0, '2018-09-24 10:11:58', '2018-09-24 10:12:28'),
(17, 2, 6, NULL, '2018-09-24', 1, 2, 10, 0, '2018-09-24 10:23:21', '2018-09-24 10:23:21'),
(18, 2, 9, NULL, '2018-09-25', 1, 2, 10, 0, '2018-09-25 06:28:29', '2018-09-25 06:28:29'),
(19, 2, 10, NULL, '2018-09-25', 1, 2, 10, 0, '2018-09-25 10:49:43', '2018-09-25 10:49:43'),
(20, 2, 10, NULL, '2018-09-25', 1, 10, 10, 0, '2018-09-25 11:00:49', '2018-09-25 11:02:49'),
(21, 2, 10, NULL, '2018-09-25', 1, 10, 10, 0, '2018-09-25 11:02:08', '2018-09-25 11:02:42'),
(22, 4, 10, NULL, '2018-09-25', 1, 10, 12, 0, '2018-09-25 11:05:02', '2018-09-25 11:07:25'),
(23, 3, 2, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 10:46:57', '2018-09-26 10:47:18'),
(24, 7, 2, NULL, '2018-09-26', 1, 10, 12, 0, '2018-09-26 11:18:01', '2018-09-26 11:54:52'),
(25, 7, 7, NULL, '2018-09-26', 1, 10, 12, 0, '2018-09-26 11:25:26', '2018-09-26 11:55:24'),
(26, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:25:53', '2018-09-26 11:57:09'),
(27, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:26:24', '2018-09-26 11:56:53'),
(28, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:27:03', '2018-09-26 11:56:40'),
(29, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:27:06', '2018-09-26 11:56:25'),
(30, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:28:26', '2018-09-26 11:55:45'),
(31, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:28:28', '2018-09-26 11:55:06'),
(32, 6, 2, NULL, '2018-09-26', 1, 10, 12, 0, '2018-09-26 11:28:38', '2018-09-26 11:54:35'),
(33, 3, 7, NULL, '2018-09-26', 1, 10, 20, 0, '2018-09-26 11:28:53', '2018-09-26 11:54:22'),
(34, 7, 6, NULL, '2018-09-27', 1, 2, 12, 0, '2018-09-27 10:12:01', '2018-09-27 10:12:01'),
(35, 2, 2, NULL, '2018-09-27', 1, 2, 10, 0, '2018-09-27 11:34:48', '2018-09-27 11:34:48'),
(36, 7, 6, NULL, '2018-09-28', 1, 2, 12, 0, '2018-09-28 12:31:03', '2018-09-28 12:31:03'),
(37, 7, 6, NULL, '2018-10-01', 1, 2, 12, 0, '2018-10-01 11:49:16', '2018-10-01 11:49:16'),
(38, 7, 2, NULL, '2018-10-04', 1, 10, 12, 0, '2018-10-04 10:23:36', '2018-10-04 10:24:02'),
(39, 3, 17, NULL, '2018-10-04', 1, 2, 20, 0, '2018-10-04 14:40:08', '2018-10-04 14:40:08'),
(40, 3, 4, NULL, '2018-10-15', 1, 2, 20, 0, '2018-10-15 11:00:25', '2018-10-15 11:00:25'),
(41, 2, 6, NULL, '2018-10-15', 1, 2, 10, 0, '2018-10-15 11:04:33', '2018-10-15 11:04:33'),
(42, 3, 4, NULL, '2018-10-15', 1, 10, 20, 0, '2018-10-15 11:05:53', '2018-10-19 12:17:18'),
(43, 7, 6, NULL, '2018-10-17', 1, 2, 12, 0, '2018-10-17 09:41:12', '2018-10-17 09:41:12'),
(44, 7, 6, NULL, '2018-10-17', 1, 2, 12, 0, '2018-10-17 09:41:33', '2018-10-17 09:41:33'),
(45, 7, 6, NULL, '2018-10-23', 1, 10, 12, 0, '2018-10-23 09:52:40', '2018-10-23 09:55:20'),
(46, 7, 4, NULL, '2018-10-30', 1, 2, 12, 0, '2018-10-30 10:40:29', '2018-10-30 10:40:29'),
(47, 7, 16, NULL, '2018-11-01', 1, 2, 12, 0, '2018-11-01 07:12:44', '2018-11-01 07:12:44'),
(48, 7, 16, NULL, '2018-11-01', 1, 2, 12, 0, '2018-11-01 07:13:18', '2018-11-01 07:13:18'),
(49, 7, 19, NULL, '2018-12-19', 1, 2, 12, 0, '2018-12-19 07:25:27', '2018-12-19 07:25:27'),
(50, 6, 4, NULL, '2019-01-28', 1, 10, 12, 0, '2019-01-28 14:26:17', '2019-04-16 12:48:29'),
(51, 7, 3, NULL, '2019-04-16', 1, 10, 12, 0, '2019-04-16 12:47:49', '2019-04-16 12:48:39'),
(52, 6, 4, NULL, '2019-04-16', 1, 10, 12, 0, '2019-04-16 12:52:26', '2019-04-16 12:53:34'),
(53, 2, 7, NULL, '2019-05-01', 1, 2, 10, 0, '2019-05-01 09:20:20', '2019-05-01 09:20:20'),
(54, 7, 7, NULL, '2019-05-05', 1, 2, 12, 0, '2019-05-05 13:21:27', '2019-05-05 13:21:27'),
(55, 3, 7, NULL, '2019-05-23', 1, 2, 20, 0, '2019-05-23 07:05:32', '2019-05-23 07:05:32'),
(56, 10, 4, NULL, '2019-09-20', 1, 10, 100, 0, '2019-09-20 09:40:07', '2019-09-20 09:40:48'),
(57, 11, 14, NULL, '2019-09-20', 1, 10, 150, 0, '2019-09-20 09:42:27', '2019-09-20 09:42:46'),
(58, 9, 7, NULL, '2019-09-20', 1, 10, 40, 0, '2019-09-20 10:07:35', '2019-09-20 10:27:06'),
(59, 11, 7, NULL, '2019-09-20', 1, 10, 150, 0, '2019-09-20 10:10:24', '2019-09-20 10:26:51'),
(60, 10, 4, NULL, '2019-09-23', 1, 10, 100, 0, '2019-09-23 10:11:15', '2019-09-23 10:11:37'),
(61, 10, 4, NULL, '2019-09-23', 1, 10, 100, 0, '2019-09-23 10:13:07', '2019-09-23 10:13:27'),
(62, 8, 14, NULL, '2019-09-23', 1, 10, 22, 0, '2019-09-23 10:19:24', '2019-09-23 10:19:48'),
(63, 10, 14, NULL, '2019-09-23', 1, 10, 100, 0, '2019-09-23 11:35:06', '2019-09-23 11:35:33'),
(64, 8, 14, NULL, '2019-09-24', 1, 10, 22, 0, '2019-09-24 10:05:43', '2019-09-24 10:06:44'),
(65, 10, 4, NULL, '2019-09-24', 1, 10, 100, 0, '2019-09-24 10:16:45', '2019-09-26 11:01:15'),
(66, 10, 4, NULL, '2019-09-26', 1, 10, 100, 0, '2019-09-26 10:59:14', '2019-09-26 11:01:21'),
(67, 10, 7, NULL, '2019-11-11', 1, 2, 100, 0, '2019-11-11 14:58:23', '2019-11-11 14:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `T_Feedback`
--

CREATE TABLE `T_Feedback` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `feedback_message` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_otp_auth`
--

CREATE TABLE `t_otp_auth` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `device_token` text NOT NULL,
  `otp` int(20) NOT NULL,
  `generate_time` datetime NOT NULL,
  `validate_time` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT ' 0 = not verified / active, 1 = verified, 2 = not verified / inactive, 3 = Expired '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_otp_auth`
--

INSERT INTO `t_otp_auth` (`id`, `phone_number`, `country_code`, `access_token`, `device_token`, `otp`, `generate_time`, `validate_time`, `status`) VALUES
(1, '9323630004', '', '36e4828024875d290e4dcab13a52a0f3', 'd7dp9kqkudc:APA91bHWp4VsT_sILDjMYPZq1XfF1tgO1MTaGyH1CziPDzcxWXwC4YfSL0mJKnW1uowA9VC30I2HZiS_jeria_rXMerwzbuVqQVOKHwCtHg4b0n5TCdcSIED1BLYC-LWzmmvdUnslGEnHVRHgvb9bVGtNm0dJCALLQ', 7511, '2018-09-20 17:26:09', '2018-09-20 17:26:09', 1),
(2, '9657067822', '', '6703a185ef20aba9365618bf26aa7334', 'c17okfKj3bM:APA91bEFH_HQtEYMsWWTebCoIq4nYrVVNnLnjkLt_hcW3z2YZ-eTznkGgfxFIyqGYbKd-ASl9mYWpF6U33fRrC5RY7g4PbQjZ7Pidos8kp7UUm2rpLBgJYLKC6TNsg1QaTXFYlr6micy', 2703, '2018-09-20 17:31:00', '2018-09-20 17:31:00', 1),
(3, '8319837942', '', 'b1c182cf3580e76bc70f2d2524f8cf50', 'f6C-frzynqA:APA91bEGU9VqB5Erabg_9wKxwIVVwlNyWJm_S3D-KfqzPMWb0xir3aGA252dtRuxb3h5Pf3iTFb25D35ezQAkMToXl3XoZD6dSIDMkyrxtlOFhct6kCNxhJUYxg1dqVwEOsGCQQazW8HBaqbKgpubeNdlUiWduGb_g', 9725, '2018-09-20 17:32:26', '2018-09-20 17:32:26', 1),
(4, '9970393889', '', '4cb7be68aaccb894e728155fd773fe7c', 'cx8tFBsQ19s:APA91bFOOtIf-G4QMacLI2D5YCi7EBZv89OMJDBXhv9Izkmk7AmSF4-1XpRMdzzrjnvEqm4gdqmahSkN1UHjA9DPYUyLrYYhpl6Ex3K46sdlP6Pt4kVqok4ub3pZukZPhzm5DsfFQjOO667heGzvix8dY2fBg-Qy4A', 6234, '2018-09-20 17:37:50', '2018-09-20 17:37:50', 3),
(5, '9766672053', '', 'e3e049ef3ff802c945f693117192a074', 'd2D-rRaAZGw:APA91bGOlntsgbA_Z0rQWe_dR1xrCaDr7ZOqbjyx78y0biMg6gfC7eEoqNgckSxaS9Oexyv4kVVIEoCOjRfDmIzbr3VRUVy5vbQfikHuxIoHxKqszbx9Myjril896kE1Zgyterq9uwYUrYqTIddQWpPPJZsFV4VGaQ', 6278, '2018-09-20 17:47:10', '2018-09-20 17:47:10', 1),
(6, '9405573645', '', '057e3ab7bfd35bce3bfbb1f17b001aac', 'd3aRJuWeEMA:APA91bF6u2BpEAtQOFvG1vm1MyrJIwSQgBd6ws6a5ijBi4RnGFulNm9l_ngDQQLhhiZpZIKcNt0IoXalg1rlN0j2U85a_Td1xk-6kFa40-_5EW8kYtRortshkc48mdBDHAUBSbPDHT-e', 4734, '2018-09-21 10:48:33', '2018-09-21 10:48:33', 1),
(7, '8983462134', '', '73e241d5dfda4aeb5205f6d4ab6fa261', 'eF9DEpJWb2A:APA91bFoWJtVbBugAAbX_rOjzUzT4XslvLyXAVxnwdVg1t7nqXB--t0jfD9TjAMUq4HQSMp9rWH6jgdWq7Hd6wAFSEbBIsj-YqNI95YwhqZAOijNKhk-b513f-09zhbygMKf-G-t8by-', 6390, '2018-09-24 19:59:07', '2018-09-24 19:59:07', 1),
(8, '9970393889', '', 'feea0b947c74eaecb6b8ef73f42b1b90', 'eUIol2pEIaE:APA91bE7eWk5tJzh_IpjW9-uPPswFKvsZNXa8IJGDxDL7SYjE01NYHC9HKGSUJgyu6O9dGGMhIUhljq8iOSpVq7fJC9NLiesxxNWIfEfyYpi2Z83bAj_Q1hwym5bWy_-0Fi9U7xcoIct', 8625, '2018-09-24 23:37:56', '2018-09-24 23:37:56', 1),
(9, '9970393889', '', 'feea0b947c74eaecb6b8ef73f42b1b90', 'eUIol2pEIaE:APA91bE7eWk5tJzh_IpjW9-uPPswFKvsZNXa8IJGDxDL7SYjE01NYHC9HKGSUJgyu6O9dGGMhIUhljq8iOSpVq7fJC9NLiesxxNWIfEfyYpi2Z83bAj_Q1hwym5bWy_-0Fi9U7xcoIct', 9999, '2018-09-24 23:37:56', '2018-09-24 23:37:56', 0),
(10, '9657067822', '', '731290c55808bc87ff608e1fb3c56621', 'fcEkGPuuJHk:APA91bGJj-6Ir3sy12w6s2K3ZA9LJEODGjHXicrQD9VQao6NoXQjeonarqMinuA0AcGu0THj6hbfkka0ieLnGXjcTDN5bN4f9WAkEX66x-wVbvXfFO4wwF9ZzAfsWz4J2w6v75DrtEhZ', 5643, '2018-09-25 11:06:43', '2018-09-25 11:06:43', 0),
(11, '9657067822', '', 'fbaad58f39dfd6dc5062c5f58310db87', 'fcEkGPuuJHk:APA91bGJj-6Ir3sy12w6s2K3ZA9LJEODGjHXicrQD9VQao6NoXQjeonarqMinuA0AcGu0THj6hbfkka0ieLnGXjcTDN5bN4f9WAkEX66x-wVbvXfFO4wwF9ZzAfsWz4J2w6v75DrtEhZ', 6392, '2018-09-25 11:06:44', '2018-09-25 11:06:44', 1),
(12, '8983243404', '', '3cb79e6101e6d3fde46155f12e0aa4ac', 'flMcNWMRsTQ:APA91bERXnCWc1EkMkz8tmg95UjyjL3YaxqW3LIQ8PGBRF6S0bHn4XvOJdeCMSruDRxJ6nf8em-NYbotqd0bkNKzqLROkKgFOhhEhECAu_W6XLBliWulrTDY82WrzXCy1LTJcOFoPkvR', 1699, '2018-09-25 11:30:51', '2018-09-25 11:30:51', 1),
(13, '9096774102', '', '508c71886271eb55b1140242d4166a1d', 'faa8mMCnjAU:APA91bElTWAz8y1FNlffUsHoDyO4deLh9FlzoWFgCHOZdmh3XVx6cFE-ogeVl_joVTx7Op72DKtMV0TsB4BxLeyD_flCfzIlCDsm0Pz0fBaq_lONlz9xETkOAtBaifcDjyX8THO2QuvS', 5611, '2018-09-25 11:56:12', '2018-09-25 11:56:12', 1),
(14, '9970393889', '', 'f0b54814d134c828888799f6dc5a4dc2', 'eUIol2pEIaE:APA91bE7eWk5tJzh_IpjW9-uPPswFKvsZNXa8IJGDxDL7SYjE01NYHC9HKGSUJgyu6O9dGGMhIUhljq8iOSpVq7fJC9NLiesxxNWIfEfyYpi2Z83bAj_Q1hwym5bWy_-0Fi9U7xcoIct', 6005, '2018-09-25 12:59:08', '2018-09-25 12:59:08', 0),
(15, '9405573645', '', '1f8540d44dfc6cae7605a400f679a769', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 2821, '2018-09-25 13:00:41', '2018-09-25 13:00:41', 0),
(16, '9405573645', '', 'bb5d4b2d9040b7aafffd03e288c10a8e', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 5350, '2018-09-25 13:03:30', '2018-09-25 13:03:30', 0),
(17, '9405573645', '', 'e321b65f7ec24a4a6fc7c96613dc3993', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 1626, '2018-09-25 13:22:47', '2018-09-25 13:22:47', 0),
(18, '9405573645', '', 'ca806a72a6811bf8e6763b7ddd8dd589', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 8031, '2018-09-25 13:23:29', '2018-09-25 13:23:29', 0),
(19, '9405573645', '', '42ae25d4be2bcf200ad0522a89e9d67a', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 3123, '2018-09-25 13:23:32', '2018-09-25 13:23:32', 0),
(20, '9405573645', '', '1e49006eaa05d07110adb6833d33f023', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 7476, '2018-09-25 13:23:36', '2018-09-25 13:23:36', 0),
(21, '9405573645', '', '5acd24796c21bb0992ba57326e470f63', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 3793, '2018-09-25 13:23:41', '2018-09-25 13:23:41', 0),
(22, '9405573645', '', '2b5530c4b5ccd91e91725437b8666c48', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 4329, '2018-09-25 13:23:43', '2018-09-25 13:23:43', 0),
(23, '9405573645', '', '886dfed939f8591fbe969aa4312b2f9a', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 1162, '2018-09-25 13:23:45', '2018-09-25 13:23:45', 0),
(24, '9405573645', '', '886dfed939f8591fbe969aa4312b2f9a', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 1885, '2018-09-25 13:23:45', '2018-09-25 13:23:45', 0),
(25, '9405573645', '', '886dfed939f8591fbe969aa4312b2f9a', 'cV1I7HJoWIs:APA91bEcza63vHdu8xj7jClnezWgJqtXQ32dxaP0poWCyzyfrXmWKAzyQZ8xfTKa51DFYT5OZmi1wX1YsJDPkSE2Ns1baUU_JoECt6js5qWE72oMZE_u3vvAkd50udjeB79sqfDcEvPP', 3025, '2018-09-25 13:23:45', '2018-09-25 13:23:45', 1),
(26, '9067509769', '', '07f7852a39b81d89ff5067725f0fdbf5', 'cdsY4rdGF5Y:APA91bG2CT8UWP27NCSSqDTHR9EjoFyHsKLdtQcWqmkK5Q_mNRRlAlD661pjJFZ5fFRl5UHlNI82ye4Fb0nX8KmNiEfrwGhc4wJXob2GK9oTQ4RzNaTldMcfxY8r70m0G1UuV9XvbpZS', 5300, '2018-09-25 14:33:27', '2018-09-25 14:33:27', 1),
(27, '9011192083', '', 'b5512082214b30dfb97d057fe8d967f2', 'dlGt4PpOCOk:APA91bEMdXUib5tk8ulx-g2OAYfYnrDwpHqg9uvcMVey7uu7D-llNxEJQoila1Kmimi6LVdHmw8y1zrPn4n_dkN-DaL_4NyrNO_r1nAVXArA6kdnb86pvVUjfgy5kmIxjWtB06CfTNcU', 5403, '2018-09-25 14:34:32', '2018-09-25 14:34:32', 1),
(28, '9860012437', '', 'fa33deee9382fc948c712478093e9872', 'dF248spyIrU:APA91bH33QtG2xGB1eeQ-yE4M-DIKAmco5e45WzIKAXDZPWk7F62oJl7Y2gAtLd0Oq6STRswjVI7Sz6ZsVI8_F4N_t3g38ESDCKY4hwitzNj3_jwdU5eqnnGCsq-9kRih357xC8LNnEf', 5007, '2018-09-25 16:25:30', '2018-09-25 16:25:30', 1),
(29, '8484837453', '', 'd119861191ae0f3627e735c1e4e8fed7', 'cLenLTVgl70:APA91bEY6TxXJeKz9btaiIils4gdyky00GjGo-z_3Aft99jwmBY-trujosYm7c1TOuFwl3B605kNkuIB_Zrvi4-zoOB9AsAveLvWBifCmau7qMs0uwwpNe2EtCCDnxaFtAKi12EIoHQe', 8184, '2018-09-26 12:54:46', '2018-09-26 12:54:46', 1),
(30, '9970393889', '', 'b75c6c5fca4c9fac29b6d53ace2a436e', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 1895, '2018-09-28 13:26:15', '2018-09-28 13:26:15', 0),
(31, '9970393889', '', '97861f2b2e7255a0fa8db50b8e3f9b13', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 5252, '2018-09-28 13:26:16', '2018-09-28 13:26:16', 0),
(32, '9970393889', '', '77f71206f4bdb0f1ea15507b4581f8ea', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 6611, '2018-09-28 13:27:38', '2018-09-28 13:27:38', 0),
(33, '9970393889', '', '172d3a68c92250c8ba330b6377ee5b8b', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 8795, '2018-09-28 13:29:18', '2018-09-28 13:29:18', 0),
(34, '9970393889', '', '38862fe4e0b0befc53b49a93dc3dd157', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 6479, '2018-09-28 13:29:19', '2018-09-28 13:29:19', 0),
(35, '9970393889', '', '914846cb83613a5f13ec37a6eb976293', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 4566, '2018-09-28 13:30:29', '2018-09-28 13:30:29', 0),
(36, '8407904157', '', '4a9d5d1a7d9b507cac37ece95ed4f040', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 6598, '2018-09-28 13:37:02', '2018-09-28 13:37:02', 1),
(37, '7650958215', '', 'dcc36995ff457ef93bdd940005379797', 'eTjwQ9areU4:APA91bE-e89vHge7LQlsqOgQmbzgH7-mWr_2b1VofJ6sbKsemgvnaDrvieOvaFoENTR5K3Vpdurog_F0w-ZQQypT5mLQRBd2qIyg9qkfGOnxK4iy8lHsIqHmflFraz39FDnBxuDtf32V', 6336, '2018-09-28 16:37:57', '2018-09-28 16:37:57', 1),
(38, '8668231295', '', 'a964541007daa1dadacfd0cb01486afa', 'dhRGChYOmD8:APA91bF8tf7H5f_79-hKDzRtUQbgn5Rx9toFQ2M7Yd72TS9VRK9k_QsH8SnLHr0-C26Tj2QCK0fmvkDCAZPl0Gsqa7UCf6uOj4_0COKgD2AmaIv9CtzOS_IKtox3AO-w2xWT08zn13WV', 5955, '2018-09-28 17:45:22', '2018-09-28 17:45:22', 0),
(39, '8668231295', '', '51f29e1ecbf4e6d37a996e4c948eca5b', 'dhRGChYOmD8:APA91bF8tf7H5f_79-hKDzRtUQbgn5Rx9toFQ2M7Yd72TS9VRK9k_QsH8SnLHr0-C26Tj2QCK0fmvkDCAZPl0Gsqa7UCf6uOj4_0COKgD2AmaIv9CtzOS_IKtox3AO-w2xWT08zn13WV', 8082, '2018-09-28 17:46:34', '2018-09-28 17:46:34', 1),
(40, '9158992196', '', '57bdd5d80ca4e286a564b6449c9e1062', 'daPDGtjk2TQ:APA91bFSuwL5pAxJB2qZAicA8_fUIAyKjR4lfUjtggoodwBa4tMsnsnYz1z3F4FoMUNrOCVVr8rlGlZbqyd966B1DSZmtI1Rhke8y9QH0hm2wSgMhwdtlD9sGawEENn0M1xkln2sgS6p', 7980, '2018-09-28 22:46:53', '2018-09-28 22:46:53', 1),
(41, '9158992197', '', 'c05643d00e8f9ae1ffb9be671332105a', 'cEn124pSOKw:APA91bG-qR0QV_SfRgbGa1jqhCr5Op4s8_ITzRgmnQigskfCzHxynMkayJBv-SmoNmAPXiFAACmxxCInl7KZo703doKX5RLS1n2-wvDNCDCpbaXHXwLYQbQwGYLnrbyE-RGegTXaehIX', 8636, '2018-10-05 22:56:51', '2018-10-05 22:56:51', 1),
(42, '9405573645', '', '13101b8d575e8e85cde6c445c2759faa', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 3745, '2018-10-26 11:32:09', '2018-10-26 11:32:09', 0),
(43, '9405573645', '', '513ca75cba6657984e165e5db753b1a7', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 8401, '2018-10-26 11:32:21', '2018-10-26 11:32:21', 0),
(44, '9405573645', '', '9e8704a225e374a882178d1dbbe6cc75', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 4521, '2018-10-26 11:33:35', '2018-10-26 11:33:35', 0),
(45, '9405573645', '', 'ab02fc2f4f708ba1c4dfd919178ab0e6', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 3434, '2018-10-26 11:34:33', '2018-10-26 11:34:33', 0),
(46, '9405573645', '', 'f6e57776178307efc16c7b70a7e84650', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 3447, '2018-10-26 11:34:36', '2018-10-26 11:34:36', 0),
(47, '9405573645', '', '6957ffbad2ba09008105ab6b7d915dea', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 9494, '2018-10-26 11:34:37', '2018-10-26 11:34:37', 0),
(48, '9405573645', '', 'cc55621b397e592a13bcbba047216dc6', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 8615, '2018-10-26 11:35:22', '2018-10-26 11:35:22', 0),
(49, '9405573645', '', '7340f8334aa2483025a88e8f971ce967', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 6181, '2018-10-26 11:35:29', '2018-10-26 11:35:29', 0),
(50, '9405573645', '', '30574acff4ff4a663789da6bdb940a01', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 2280, '2018-10-26 11:36:06', '2018-10-26 11:36:06', 0),
(51, '9405573645', '', 'd879385c9c9130352d54b78892e174c6', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 4810, '2018-10-26 11:36:14', '2018-10-26 11:36:14', 0),
(52, '9405573645', '', 'dc94cafb3d791d283d79f08c0a243ee0', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 3397, '2018-10-26 11:36:25', '2018-10-26 11:36:25', 0),
(53, '9405573645', '', 'ae33c621c51d93a8fcc69ce1a59d72d1', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 5564, '2018-10-26 11:36:42', '2018-10-26 11:36:42', 0),
(54, '9405573645', '', 'd54e243245601aa18c01fa7a9c01e2aa', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 4652, '2018-10-26 11:38:14', '2018-10-26 11:38:14', 0),
(55, '9405573645', '', '0c4dc010a099443b6164138ed176e150', 'fulbOPNDqyQ:APA91bFDxGFxmYPrYNytreBZrxkgb2GCDHqdt5AAmI9VQ3MSoUbCY_GMAMIpJehmmkTnggTD0zuDs0GH18Yo4r6s6Cr0hPojJgk-4FGOvoeMAhWWLs6fx1lHYd2D1xQZvFFwYO--utMJ', 8407, '2018-10-26 11:41:16', '2018-10-26 11:41:16', 0),
(56, '9405573645', '', '89d3c41902c906c2e859f75d9c46a9aa', 'fCvC0OQkiGQ:APA91bFEPoBV7zWGXZW8VQUxrpk3pecvyPmx1mm3tQDddtgW7TrHpQrCrvhdKvuF52VZuaypkiXKhLyq6CsOR3VzCyxbnGbmIw7fKfxmK-SKvQpLI-NA7R_ctwk15HmC5sENMMZp0CEr', 7464, '2018-10-26 11:44:32', '2018-10-26 11:44:32', 0),
(57, '9405573645', '', 'c70f84a42ac81933bb20ae2e3bbce5fc', 'fCvC0OQkiGQ:APA91bFEPoBV7zWGXZW8VQUxrpk3pecvyPmx1mm3tQDddtgW7TrHpQrCrvhdKvuF52VZuaypkiXKhLyq6CsOR3VzCyxbnGbmIw7fKfxmK-SKvQpLI-NA7R_ctwk15HmC5sENMMZp0CEr', 8645, '2018-10-26 11:46:10', '2018-10-26 11:46:10', 1),
(58, '8407904157', '', '8cd2f29c21de2e7caa95c8be8b4375da', 'dkC8DrrwgLw:APA91bHM60aCY-D8X5pVWwUuFXxn8G4zQSx2QFkrsBvslQAqYZQo7gZQFSWNMgRcC1L9pXfSt5Yy0IoJXoX01QbFEAfRUGTrG0l7k0Jm2EOgQvMzH2Bso-PRQcUXcB-QkPzZOdpmvy-U', 6296, '2018-10-26 18:07:43', '2018-10-26 18:07:43', 1),
(59, '9168738167', '', '96b2504f40945b1a5b3c9c3c9dd5da7b', 'cDgZ8mwFdmI:APA91bFfAD8fmmTTjCRMtZMtgFO39ccES8oQwPli2HyBcDtXRROAnE8SJYcNekvJxtDjU6eGavzxodZZM6bx1ZdugbrdLqz4w_j9u9AHqoZm2vSm1G4yOcOlRqEoaOdziZQDHnR-JheD', 4195, '2018-11-13 14:58:25', '2018-11-13 14:58:25', 0),
(60, '9168738167', '', '943b958bf9010563a9dc08c627e93839', 'cDgZ8mwFdmI:APA91bFfAD8fmmTTjCRMtZMtgFO39ccES8oQwPli2HyBcDtXRROAnE8SJYcNekvJxtDjU6eGavzxodZZM6bx1ZdugbrdLqz4w_j9u9AHqoZm2vSm1G4yOcOlRqEoaOdziZQDHnR-JheD', 9110, '2018-11-13 14:58:26', '2018-11-13 14:58:26', 1),
(61, '9405573645', '', '293375829574baa4b5181b1c3d5f58b5', 'd9uAX7XGskw:APA91bHEIO3djmUqvLXR17NY4jWPsUDV2P-ydRk3LVlofX_HIwh3-i0WOE8Pkny5prUP3MCv3yFa5fKOX67Wuf2n6kUIy0ID2kTFKWycNAcviedUJEDhFXxMvLdtWSIfNIDMCPg5N19W', 6307, '2018-11-15 10:44:48', '2018-11-15 10:44:48', 0),
(62, '9405573645', '', 'bd68d3e0b1b189da7cf4e1359d2919d5', 'd9uAX7XGskw:APA91bHEIO3djmUqvLXR17NY4jWPsUDV2P-ydRk3LVlofX_HIwh3-i0WOE8Pkny5prUP3MCv3yFa5fKOX67Wuf2n6kUIy0ID2kTFKWycNAcviedUJEDhFXxMvLdtWSIfNIDMCPg5N19W', 8507, '2018-11-15 10:44:49', '2018-11-15 10:44:49', 1),
(63, '8407904157', '', 'f35efab28418b7d5d54b8eeb8b347b98', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 2463, '2018-11-21 17:53:57', '2018-11-21 17:53:57', 1),
(64, '9405573645', '', 'f52c27ce528fb496c6460f68d01a4725', 'dIY5PRDJnSA:APA91bHuD6DCgwe--Kyr3EBGLeDS31t0LogQNSjkF4iplfvLEzuiQbjMtjxphTbymbGvR2-nEouOO8rNxgUs1rtY2IyFFuGDVz46eSFHH8DAGLM4gG4b_8QTkvmry6BZZOERj4mxSVwU', 6054, '2018-11-21 17:56:37', '2018-11-21 17:56:37', 1),
(65, '9405573645', '', 'a375b588ac5069826ec9e456e30d06ed', 'e5Q5_YoTnAk:APA91bGXIcMGAWzwRGD_LChaJk8weIW54UA1Qvw7ubYsdoCDfqFUWGu6dKYUwHSEryXSNrHKuxbYZJf87ENk6C75H7LebkCqIQd_TmjFiMaKPN7On2nmnKtlultbN_wNnSldVOiNuFC3', 6465, '2018-11-30 16:36:27', '2018-11-30 16:36:27', 0),
(66, '9405573645', '', 'a375b588ac5069826ec9e456e30d06ed', 'e5Q5_YoTnAk:APA91bGXIcMGAWzwRGD_LChaJk8weIW54UA1Qvw7ubYsdoCDfqFUWGu6dKYUwHSEryXSNrHKuxbYZJf87ENk6C75H7LebkCqIQd_TmjFiMaKPN7On2nmnKtlultbN_wNnSldVOiNuFC3', 7162, '2018-11-30 16:36:27', '2018-11-30 16:36:27', 1),
(67, '9405573645', '', '0a391438011494f446a59cb223ba4354', 'fqIUrmJgRzg:APA91bFjyNqLJwi9kA8h9eCKdQpVq6QO85boY38umS-aEyzaUQRgcnij-stdmR9QlxuYQzzCB3kq3xxnM0ikxY7FjVu9oYwn3ehfWe7MBGJDf9fbTQ5QiSVnyKSuzpSGAJbxH6LJptqK', 1439, '2018-12-03 15:34:30', '2018-12-03 15:34:30', 0),
(68, '9405573645', '', '0a391438011494f446a59cb223ba4354', 'fqIUrmJgRzg:APA91bFjyNqLJwi9kA8h9eCKdQpVq6QO85boY38umS-aEyzaUQRgcnij-stdmR9QlxuYQzzCB3kq3xxnM0ikxY7FjVu9oYwn3ehfWe7MBGJDf9fbTQ5QiSVnyKSuzpSGAJbxH6LJptqK', 6802, '2018-12-03 15:34:30', '2018-12-03 15:34:30', 1),
(69, '9168738167', '', 'ce6856fb5052cd0d3b40fd89a18f64c4', 'fJkWiu0dG3I:APA91bFN3bmUdvHxbSdE9kQ8yJTG54kBWneumlOLdiBaidMAXxRQy7Zn8YfW1zW3fRtTSYMgnGIT01dHiiEwyrN5iOFkSz3MECRwbdVGDyOe2VrIZ646nCDAg6Bl693bUiPpe_aqV6Lo', 5263, '2018-12-04 10:46:20', '2018-12-04 10:46:20', 0),
(70, '9405573645', '', '9bdf68df664e349d0cd9b1e90fcdb089', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 4660, '2019-01-18 12:19:26', '2019-01-18 12:19:26', 0),
(71, '9405573645', '', '9bdf68df664e349d0cd9b1e90fcdb089', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 6476, '2019-01-18 12:19:26', '2019-01-18 12:19:26', 0),
(72, '9405573645', '', '7fbfc09a4aaa645f0aa851b97928737b', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 1774, '2019-01-18 12:20:50', '2019-01-18 12:20:50', 0),
(73, '9405573645', '', 'c0c4f986a58e2527a725ef4231c87fa1', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 4722, '2019-01-18 12:20:51', '2019-01-18 12:20:51', 0),
(74, '9405573645', '', '0dbfd4fb06a6bdf7ed6b6f072ae042c7', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 2209, '2019-01-18 12:21:54', '2019-01-18 12:21:54', 0),
(75, '9405573645', '', '60fa48e2aac3a12794724f41ca10221d', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 1410, '2019-01-18 12:22:39', '2019-01-18 12:22:39', 0),
(76, '9405573645', '', '60fa48e2aac3a12794724f41ca10221d', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 6713, '2019-01-18 12:22:39', '2019-01-18 12:22:39', 0),
(77, '9405573645', '', 'bb71cca51655dd3f02bd4463fb52db5f', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 2405, '2019-01-18 12:25:51', '2019-01-18 12:25:51', 0),
(78, '9405573645', '', '71e686639ab93c5d985604ef4bd75216', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 5468, '2019-01-18 12:25:52', '2019-01-18 12:25:52', 0),
(79, '9405573645', '', '39cabaf8daf31fcc46dd07b53c42aec4', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 2310, '2019-01-18 12:28:26', '2019-01-18 12:28:26', 0),
(80, '9405573645', '', '032ffa71a82eb61699478de39b7fa015', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 2069, '2019-01-18 12:31:08', '2019-01-18 12:31:08', 0),
(81, '9405573645', '', '032ffa71a82eb61699478de39b7fa015', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 3572, '2019-01-18 12:31:08', '2019-01-18 12:31:08', 0),
(82, '9405573645', '', 'dc7b138a46c28979127e481d96cf0a66', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 2631, '2019-01-18 12:37:04', '2019-01-18 12:37:04', 0),
(83, '9168738167', '', '82f714085dd266252a83c64ee25c9d3d', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 7306, '2019-01-18 17:10:50', '2019-01-18 17:10:50', 0),
(84, '9168738167', '', '80a3338d0ec629c1d99042f3ab1a0527', 'fwszkQPFCdo:APA91bGSjK2u38cP4TjOLGVZYrqF6CY9P_5BW3Xr9BJP0tzIHRAXpCNkCbDBRKnBVueXfmYtHYI90248hW2hU1XBsG-K6FYJ6ssZY5ilAWP3qFWVfSXJKSB-a7Mw91X8wJ2fPj7JQx1n', 5220, '2019-01-18 17:10:51', '2019-01-18 17:10:51', 0),
(85, '9405573645', '', '73aed82a027077fa9fa2d4e73e1f610b', 'ciDDBXKU7DA:APA91bE8HPngrKZ9UfJvvbJarSke_XlriT_N5o5JcphXbQyuvbBvgq7CXHCdOZuMWu9pYFPuk-ipjzELJ2ekxVWFcjfyFNHIe-4ROkI9hZO1SnnQeUQRV9jFNiei4GR6D9-GQHucqsuf', 4637, '2019-01-25 11:33:25', '2019-01-25 11:33:25', 0),
(86, '9323630004', '', '373e2d5d4e74771bf7c782367c3eee80', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 4002, '2019-01-25 11:44:59', '2019-01-25 11:44:59', 0),
(87, '9323630004', '', '0d578ded5a310133f5b529dfeef97780', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 6979, '2019-01-25 11:49:01', '2019-01-25 11:49:01', 0),
(88, '9766672053', '', 'bef9ef65d209ef99925a89fd6ad6dea7', 'cUqie2xSvek:APA91bEhejUAbPyeW33lEo_8CQQkA-hGvurcaQCLzwsJnQdcAiiHLjRfUIZH3mzuxFoYo3jUAft9YuaRtWSsZ0UG5XdIXApDF5rOSkjwqe5k-EGThtqX2QXgRVlLnxZoDfbL2-sH1226', 2323, '2019-01-25 12:12:21', '2019-01-25 12:12:21', 0),
(89, '9766672053', '', '6cec66e1cbdac07ce374a9d032a15d85', 'cUqie2xSvek:APA91bEhejUAbPyeW33lEo_8CQQkA-hGvurcaQCLzwsJnQdcAiiHLjRfUIZH3mzuxFoYo3jUAft9YuaRtWSsZ0UG5XdIXApDF5rOSkjwqe5k-EGThtqX2QXgRVlLnxZoDfbL2-sH1226', 5814, '2019-01-25 12:13:24', '2019-01-25 12:13:24', 0),
(90, '9766672053', '', 'b9616c14b74bb71c221b15820feec806', 'cUqie2xSvek:APA91bEhejUAbPyeW33lEo_8CQQkA-hGvurcaQCLzwsJnQdcAiiHLjRfUIZH3mzuxFoYo3jUAft9YuaRtWSsZ0UG5XdIXApDF5rOSkjwqe5k-EGThtqX2QXgRVlLnxZoDfbL2-sH1226', 8649, '2019-01-25 12:46:55', '2019-01-25 12:46:55', 0),
(91, '9323630004', '', '04d0d0a4a8297ee759170cc4d9e38ae0', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 9503, '2019-01-25 12:51:15', '2019-01-25 12:51:15', 0),
(92, '9323630004', '', '3e7234fb4f03c6a1462d0353e7e06ea2', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 6372, '2019-01-25 12:52:22', '2019-01-25 12:52:22', 0),
(93, '9323630004', '', 'ebdfb16d4c3057335c2d7c26c40215b6', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 5367, '2019-01-25 12:53:57', '2019-01-25 12:53:57', 0),
(94, '9323630004', '', '9552a00365f640ba3ed7ed821e8cac40', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 4129, '2019-01-25 13:05:06', '2019-01-25 13:05:06', 0),
(95, '9323630004', '', '0df0c18fdcbb71a539a9391d95c7a800', 'cEV_HjmJmvg:APA91bGTRWpGQV-n2IDoh1luGfYZvmD-IscbkNocNyZ4uuGtRU6TBimu2hgVmTotRFjw7uJUHMH4dYx7IiCWR9S6NWfS-tCp1YrRtnBxc-YYzZaq1fLzX094yX-osLgSgueu3Hp5dbUs', 8018, '2019-01-25 13:08:05', '2019-01-25 13:08:05', 0),
(96, '9323630004', '', '6e331ff4820edc0cf96df4eb7f78d1e4', 'foqG_SWRmus:APA91bEt2h0JskyY0gYXsTHntOZ4c7NXNoKiOhyFB-W46BeMp67Ec9WPJPNlyk7mXs9crhdJI7U8JphmZY_7HLC7AvBEGKnlCO14ctIX0PIz-awTyXxiCjAzFSe3FWqI4QThzICDCXyE', 8782, '2019-01-25 14:00:42', '2019-01-25 14:00:42', 0),
(97, '9323630004', '', 'edf325a3086c2babb4fe83c8a16ac6f1', 'foqG_SWRmus:APA91bEt2h0JskyY0gYXsTHntOZ4c7NXNoKiOhyFB-W46BeMp67Ec9WPJPNlyk7mXs9crhdJI7U8JphmZY_7HLC7AvBEGKnlCO14ctIX0PIz-awTyXxiCjAzFSe3FWqI4QThzICDCXyE', 3786, '2019-01-25 14:01:34', '2019-01-25 14:01:34', 0),
(98, '9323630004', '', '6f0a9dc1bb0511464517301900fabc46', 'c5UyHtmyg_k:APA91bFJlpB0VkBRG0GxzI-37IrYBFTsKfNxJ5WRWb2WHhysZLmF4NgtobbFX89WPaq-dE1JOyoquRP42f2QCzE6LWIgIzlmNX24TBFSnQ5O5qLvqtIutb0lFqTyajZg27cMOuvWzP6t', 5351, '2019-01-25 14:06:17', '2019-01-25 14:06:17', 0),
(99, '9323630004', '', '0e111ddc6e71dec13dac76a367933886', 'c5UyHtmyg_k:APA91bFJlpB0VkBRG0GxzI-37IrYBFTsKfNxJ5WRWb2WHhysZLmF4NgtobbFX89WPaq-dE1JOyoquRP42f2QCzE6LWIgIzlmNX24TBFSnQ5O5qLvqtIutb0lFqTyajZg27cMOuvWzP6t', 1683, '2019-01-25 14:10:06', '2019-01-25 14:10:06', 0),
(100, '9323630004', '', '75222f035fe156a67c9d98f2f7a258b2', 'c5UyHtmyg_k:APA91bFJlpB0VkBRG0GxzI-37IrYBFTsKfNxJ5WRWb2WHhysZLmF4NgtobbFX89WPaq-dE1JOyoquRP42f2QCzE6LWIgIzlmNX24TBFSnQ5O5qLvqtIutb0lFqTyajZg27cMOuvWzP6t', 2458, '2019-01-25 14:22:19', '2019-01-25 14:22:19', 0),
(101, '9323630004', '', '671e56b4a2ab5acec972087f52d0b2b4', 'c5UyHtmyg_k:APA91bFJlpB0VkBRG0GxzI-37IrYBFTsKfNxJ5WRWb2WHhysZLmF4NgtobbFX89WPaq-dE1JOyoquRP42f2QCzE6LWIgIzlmNX24TBFSnQ5O5qLvqtIutb0lFqTyajZg27cMOuvWzP6t', 1172, '2019-01-25 14:28:49', '2019-01-25 14:28:49', 0),
(102, '9323630004', '', '1b8aa4702109009b086c7c6c0fea49ce', 'c5UyHtmyg_k:APA91bFJlpB0VkBRG0GxzI-37IrYBFTsKfNxJ5WRWb2WHhysZLmF4NgtobbFX89WPaq-dE1JOyoquRP42f2QCzE6LWIgIzlmNX24TBFSnQ5O5qLvqtIutb0lFqTyajZg27cMOuvWzP6t', 2110, '2019-01-25 14:30:41', '2019-01-25 14:30:41', 0),
(103, '9323630004', '', '53a5105945aacf69be17d60f9867a68c', 'c5UyHtmyg_k:APA91bFJlpB0VkBRG0GxzI-37IrYBFTsKfNxJ5WRWb2WHhysZLmF4NgtobbFX89WPaq-dE1JOyoquRP42f2QCzE6LWIgIzlmNX24TBFSnQ5O5qLvqtIutb0lFqTyajZg27cMOuvWzP6t', 7168, '2019-01-25 14:31:47', '2019-01-25 14:31:47', 0),
(104, '9323630004', '', 'd957d70377f3156d05e5fb6d1e964efc', 'ch3YSiN9bBs:APA91bFWBEs53n2y-qI9XQYnHmor88HSaDh_oty-TYDBBnzxedeEvqYFxCvCw4ULHbPdZkTaah_98woij972ywN3GDtkrmX1pz0xtDb52Rf2_4gufdx56N19HSU_kHyNxpAU9NJlSuYV', 5128, '2019-01-25 14:43:59', '2019-01-25 14:43:59', 0),
(105, '9323630004', '', 'c58b7896c4b681b14ecbcab3e894ba4c', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 4658, '2019-01-25 14:58:10', '2019-01-25 14:58:10', 0),
(106, '9323630004', '', '4d37109e1128cb480e13eb9a9e9b0e6e', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 1033, '2019-01-25 15:02:30', '2019-01-25 15:02:30', 0),
(107, '9323630004', '', '59c3d52ff851a1f2ed37cc8c7748abcf', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 2966, '2019-01-25 15:11:29', '2019-01-25 15:11:29', 0),
(108, '9323630004', '', '07bdba202f990ba94cafc910f1cbb0fc', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 8429, '2019-01-25 15:14:17', '2019-01-25 15:14:17', 0),
(109, '9323630004', '', '6d70195264e446757f2ca9a3b01341b3', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 5663, '2019-01-25 15:24:26', '2019-01-25 15:24:26', 0),
(110, '9323630004', '', '96e10c73212596584fb41d06d8b42615', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 5424, '2019-01-25 15:42:15', '2019-01-25 15:42:15', 0),
(111, '9970393889', '', '2476c7e344c2fba444559d650b245797', 'dJ-sjVjbPmU:APA91bGQIpZaW5qe0Ayo48Z2WPdixDD1F_Hiol95ORDyQ7sf-UXIG--LqLa5ql2AZe-UMaqa5I89teLm7r2jreN_9nLihnmYk658klTO1wgMrCYg0lQ98mMa1I-fKrG0v1xr11sylmXS', 3112, '2019-01-25 16:06:11', '2019-01-25 16:06:11', 0),
(112, '9970393889', '', '14f3979d9eaf907a4563a15341151a93', 'dJ-sjVjbPmU:APA91bGQIpZaW5qe0Ayo48Z2WPdixDD1F_Hiol95ORDyQ7sf-UXIG--LqLa5ql2AZe-UMaqa5I89teLm7r2jreN_9nLihnmYk658klTO1wgMrCYg0lQ98mMa1I-fKrG0v1xr11sylmXS', 3285, '2019-01-25 16:06:12', '2019-01-25 16:06:12', 0),
(113, '8407904157', '', 'e0609390f6e063d724b218746a57503b', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 9198, '2019-01-25 16:14:54', '2019-01-25 16:14:54', 0),
(114, '9323630004', '', '3ca268f21accf1ea0446367c3fd984a3', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 9500, '2019-01-25 16:35:11', '2019-01-25 16:35:11', 3),
(115, '9323630004', '', 'dd94f057dc00caae07f32200245d41cf', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 6246, '2019-01-25 16:39:03', '2019-01-25 16:39:03', 1),
(116, '9323630004', '', 'b7332b9bac9ac8ee6217179864882904', 'c1Ro9nk8fQg:APA91bFyGPCRuufxWSxkiofTUv-ylL4ypP6KNdjguX1SzEcsOpTyk6jDDKO1YpPXgIcClQ06ToWl2GaAhVsqaDuIdhKAzOQLYUIiOs290ykKw8ib51dVib3KE8tMj7Z1mIn39sJF6Z0X', 2950, '2019-01-25 16:44:41', '2019-01-25 16:44:41', 1),
(117, '9975912492', '', '2a621da30205e0f58c568637cc81b9e1', 'fJXr0-2iN9k:APA91bHuWQ6eV2-L11x0InHyV-Hgx1epvywpx1Dqxgp8j7Nxi5pXrEsI6aehfrRY8QB5r2-yPfSBVXpyAfWEtThafF85sa3SvXYfq_tJV735mn7zOE5Il2StbwbLZrCLtS5RhZKjRjj7', 3243, '2019-01-25 16:52:28', '2019-01-25 16:52:28', 1),
(118, '9970393889', '', '9eb3507ccd684e81d557f4e00c722d27', 'dxksYqvsNaQ:APA91bFSvZgTRZzKyDq1eqJXbHsOSkTHUkbFrpHOCyEQlOAitwuZJtGiom9HKJrtdx9xm4-mCSptR43_sXF391P7YlsJyW-Cl9MLtRgzTHlwT_22SnS_zCwgrqyXxdkUdr0qnfhjK3NS', 5109, '2019-01-25 17:15:38', '2019-01-25 17:15:38', 0),
(119, '9970393889', '', 'e95b23496ebb6b459f1209eb3d72ea71', 'dxksYqvsNaQ:APA91bFSvZgTRZzKyDq1eqJXbHsOSkTHUkbFrpHOCyEQlOAitwuZJtGiom9HKJrtdx9xm4-mCSptR43_sXF391P7YlsJyW-Cl9MLtRgzTHlwT_22SnS_zCwgrqyXxdkUdr0qnfhjK3NS', 1422, '2019-01-25 17:15:39', '2019-01-25 17:15:39', 0),
(120, '9970393889', '', 'e6066defa7e5999a0af3a72c27a17613', 'dxksYqvsNaQ:APA91bFSvZgTRZzKyDq1eqJXbHsOSkTHUkbFrpHOCyEQlOAitwuZJtGiom9HKJrtdx9xm4-mCSptR43_sXF391P7YlsJyW-Cl9MLtRgzTHlwT_22SnS_zCwgrqyXxdkUdr0qnfhjK3NS', 4125, '2019-01-25 17:20:17', '2019-01-25 17:20:17', 0),
(121, '9970393889', '', '1eea5bad2c0c878f816dd1229c3c2a43', 'dxksYqvsNaQ:APA91bFSvZgTRZzKyDq1eqJXbHsOSkTHUkbFrpHOCyEQlOAitwuZJtGiom9HKJrtdx9xm4-mCSptR43_sXF391P7YlsJyW-Cl9MLtRgzTHlwT_22SnS_zCwgrqyXxdkUdr0qnfhjK3NS', 7347, '2019-01-25 17:20:18', '2019-01-25 17:20:18', 0),
(122, '9970393889', '', 'c00eb351298a8452e80e13b9465ee677', 'dxksYqvsNaQ:APA91bFSvZgTRZzKyDq1eqJXbHsOSkTHUkbFrpHOCyEQlOAitwuZJtGiom9HKJrtdx9xm4-mCSptR43_sXF391P7YlsJyW-Cl9MLtRgzTHlwT_22SnS_zCwgrqyXxdkUdr0qnfhjK3NS', 7025, '2019-01-25 17:23:51', '2019-01-25 17:23:51', 0),
(123, '9970393889', '', '53c180fa8f3ac7c0d9f2385f0330ef0f', 'dxksYqvsNaQ:APA91bFSvZgTRZzKyDq1eqJXbHsOSkTHUkbFrpHOCyEQlOAitwuZJtGiom9HKJrtdx9xm4-mCSptR43_sXF391P7YlsJyW-Cl9MLtRgzTHlwT_22SnS_zCwgrqyXxdkUdr0qnfhjK3NS', 2224, '2019-01-25 17:23:52', '2019-01-25 17:23:52', 0),
(124, '8888758611', '', 'a8ab5969a4216bb6a7fb5765f5dfd4eb', 'fkvybpQH4_s:APA91bEcE1TPKeWncCjS1aPH-crHy9xAzLyXpV8P3hQvthX29YlJBBW0UpUtclA3rtwGYXBj-NXvIB7rseRyEVnsIBNxLQ72ph3pbzCOFPF_uk9GTKazwQ9uaD0sVypqsuJz7ae8wj8e', 5569, '2019-01-25 17:42:12', '2019-01-25 17:42:12', 1),
(125, '8407904157', '', '1b049690dddbed608f9cfbcd868f4ad3', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 8532, '2019-01-25 17:52:06', '2019-01-25 17:52:06', 0),
(126, '9970393889', '', 'b5f10e2e67716aa7716b67e60569687c', 'f_7ZCS1dKx8:APA91bGBSYVhQY867YgbV6agyXYKa3C1nE9S7MwRy0C4A-wn40Ns0bJo0WUZ84OyLOtqkYPCg5Nt8jDXl9zmSdht0iDHAb26d__vmxIpbxva83ck0Ba52_6A6odYLtqMnxrQwFQSNKD8', 6824, '2019-01-25 17:57:03', '2019-01-25 17:57:03', 0),
(127, '9970393889', '', '6eea25a011e04b9ec9a7e069af352f9d', 'f_7ZCS1dKx8:APA91bGBSYVhQY867YgbV6agyXYKa3C1nE9S7MwRy0C4A-wn40Ns0bJo0WUZ84OyLOtqkYPCg5Nt8jDXl9zmSdht0iDHAb26d__vmxIpbxva83ck0Ba52_6A6odYLtqMnxrQwFQSNKD8', 4160, '2019-01-25 17:57:04', '2019-01-25 17:57:04', 0),
(128, '8407904157', '', '7760c3ae50904f675b9762c8223576f7', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 2037, '2019-01-25 18:06:09', '2019-01-25 18:06:09', 0),
(129, '9970393889', '', '021a95045cd3b250348f78b7550b2c7c', 'f_7ZCS1dKx8:APA91bGBSYVhQY867YgbV6agyXYKa3C1nE9S7MwRy0C4A-wn40Ns0bJo0WUZ84OyLOtqkYPCg5Nt8jDXl9zmSdht0iDHAb26d__vmxIpbxva83ck0Ba52_6A6odYLtqMnxrQwFQSNKD8', 3827, '2019-01-25 18:13:58', '2019-01-25 18:13:58', 0),
(130, '9970393889', '', 'a9fad33c3258b53312c3fea237714806', 'f_7ZCS1dKx8:APA91bGBSYVhQY867YgbV6agyXYKa3C1nE9S7MwRy0C4A-wn40Ns0bJo0WUZ84OyLOtqkYPCg5Nt8jDXl9zmSdht0iDHAb26d__vmxIpbxva83ck0Ba52_6A6odYLtqMnxrQwFQSNKD8', 4603, '2019-01-25 18:13:59', '2019-01-25 18:13:59', 0),
(131, '9975912492', '', '937367320376c185a0ae7c8c59b66c90', 'fJXr0-2iN9k:APA91bHuWQ6eV2-L11x0InHyV-Hgx1epvywpx1Dqxgp8j7Nxi5pXrEsI6aehfrRY8QB5r2-yPfSBVXpyAfWEtThafF85sa3SvXYfq_tJV735mn7zOE5Il2StbwbLZrCLtS5RhZKjRjj7', 6725, '2019-01-25 18:27:02', '2019-01-25 18:27:02', 0),
(132, '9975912492', '', '3ac4a61412dd0c51077604303a94aeb9', 'fJXr0-2iN9k:APA91bHuWQ6eV2-L11x0InHyV-Hgx1epvywpx1Dqxgp8j7Nxi5pXrEsI6aehfrRY8QB5r2-yPfSBVXpyAfWEtThafF85sa3SvXYfq_tJV735mn7zOE5Il2StbwbLZrCLtS5RhZKjRjj7', 6033, '2019-01-25 18:37:15', '2019-01-25 18:37:15', 0),
(133, '9975912492', '', '7940cacf45416a32121ccb00bfa4a7b3', 'f1I8qXH0oXA:APA91bHiGKWHFOKOoZ3IqySgdtQ4LPSIIHuRUHIDQiOmv5jWzAc357HEJ9sRHqDl5nhZkRuKUDZV7bsmbc1w_e4R2dVWLYhYCGSQUDBD4kYbRSaGEjUxoxnzE9SWfS0KJcYq82kpHoZU', 7259, '2019-01-25 18:37:16', '2019-01-25 18:37:16', 0),
(134, '9975912492', '', 'c51787ffb36bd04c2b089d69111a8600', 'fJXr0-2iN9k:APA91bHuWQ6eV2-L11x0InHyV-Hgx1epvywpx1Dqxgp8j7Nxi5pXrEsI6aehfrRY8QB5r2-yPfSBVXpyAfWEtThafF85sa3SvXYfq_tJV735mn7zOE5Il2StbwbLZrCLtS5RhZKjRjj7', 9670, '2019-01-25 18:43:26', '2019-01-25 18:43:26', 0),
(135, '9975912492', '', '4623e2501c05eac3241689ada37d92c3', 'fJXr0-2iN9k:APA91bHuWQ6eV2-L11x0InHyV-Hgx1epvywpx1Dqxgp8j7Nxi5pXrEsI6aehfrRY8QB5r2-yPfSBVXpyAfWEtThafF85sa3SvXYfq_tJV735mn7zOE5Il2StbwbLZrCLtS5RhZKjRjj7', 4599, '2019-01-25 18:43:49', '2019-01-25 18:43:49', 0),
(136, '9975912492', '', '40dc2863ccf0ae23b9e34aa8794022c7', 'fW8bWpUCQlc:APA91bGhnpncTBXqTFOWi0wt7S7apblZMASrQ2JIl5bunZujLbvsQ1dQqwE5otz0kHBJIlWe58bWuI8luHSRaDny--ATlbAPT0fdz2wVMS1yBXsKbF_W7Ks5JYf-j_8DwKrbfmPfcb-1', 4397, '2019-01-25 18:44:23', '2019-01-25 18:44:23', 1),
(137, '8624942991', '', '32ddeec200a73d1494d7568adb408740', 'cSME6PPg4Qo:APA91bHWfrNJn-3BvG7gAhwUPa0bLAY82owuzQqM6Wbrwc4cRRZXXCaPdCSeKMut8-8u_6u0tqB5FXWUFM50yM-mydiUfzjTf4iQGTV9VnxBUlgIe2K_LNKqehC5bH-bnfFfveM-aika', 2888, '2019-01-25 19:32:42', '2019-01-25 19:32:42', 1),
(138, '9970393889', '', '2327b999bb23e172c277e3f348166adf', 'cCuyAhyu8Vo:APA91bEBHeDBdPTpzfqlexJR47lOyJZkbWT1PX92LyWR4XLdN63fAnwuBW-K_NriRlP-Gf6qYw2oYIklDycVvGQ3VFq9YOeGmpbbglazW8qVyFUotbqNX-sdKkw2xQRqWqUtiyKyabvK', 8292, '2019-01-25 20:16:37', '2019-01-25 20:16:37', 1),
(139, '8407904157', '', '0a21ed270bd0472e16e8b26595978f8d', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 7766, '2019-01-26 13:18:33', '2019-01-26 13:18:33', 0),
(140, '8407904157', '', '0cc64ed036fb3d13777aaae59e3f233e', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 9971, '2019-01-26 13:21:47', '2019-01-26 13:21:47', 0),
(141, '9405573645', '', '6728cd9c584664e19e7a8f9df63d63c2', 'ciDDBXKU7DA:APA91bE8HPngrKZ9UfJvvbJarSke_XlriT_N5o5JcphXbQyuvbBvgq7CXHCdOZuMWu9pYFPuk-ipjzELJ2ekxVWFcjfyFNHIe-4ROkI9hZO1SnnQeUQRV9jFNiei4GR6D9-GQHucqsuf', 4671, '2019-01-26 14:11:19', '2019-01-26 14:11:19', 0),
(142, '9405573645', '', 'f7aa4dac87d6bf6b6ece784ad03e4e18', 'c5aUXXyO4Yc:APA91bFr36Lk1G5JGn-RR42iTY-BAutKhrJlRmLnm7f0c7DV7lax5mhzsvhKtCgIJnfa7t8MRV01aTAtgITqFgn_XSlhZMpRJCoR2l-80LoHlEe4V8KyLHiWoONZDflgY-IdYWh29yms', 7235, '2019-01-26 22:10:49', '2019-01-26 22:10:49', 1),
(143, '9970393889', '', 'ff3b6db2b61283d284fb4a42a8cb206b', 'cZy7fFqNhwo:APA91bFh44hiL3t8OeJFm2i3tANviv1nvCFu5IZ1hpqGlX-2e37L26iTkBIG5JPQT-DvF_bcU5d2AaAo2K0X330aTI5fmoXDp8lB7hdGdozkP9SY25-mq6UYY6V1kPhOxIVTu7HvQywg', 2324, '2019-01-28 11:27:46', '2019-01-28 11:27:46', 0),
(144, '9970393889', '', '50a21c7575a4f4d5dd1877da3c832418', 'cZy7fFqNhwo:APA91bFh44hiL3t8OeJFm2i3tANviv1nvCFu5IZ1hpqGlX-2e37L26iTkBIG5JPQT-DvF_bcU5d2AaAo2K0X330aTI5fmoXDp8lB7hdGdozkP9SY25-mq6UYY6V1kPhOxIVTu7HvQywg', 8818, '2019-01-28 11:31:32', '2019-01-28 11:31:32', 0),
(145, '9970393889', '', '3b3377f0a725c71ca7de1837dfd67618', 'cZy7fFqNhwo:APA91bFh44hiL3t8OeJFm2i3tANviv1nvCFu5IZ1hpqGlX-2e37L26iTkBIG5JPQT-DvF_bcU5d2AaAo2K0X330aTI5fmoXDp8lB7hdGdozkP9SY25-mq6UYY6V1kPhOxIVTu7HvQywg', 3577, '2019-01-28 11:32:55', '2019-01-28 11:32:55', 0),
(146, '9970393889', '', '195a612f668536fb98ad5b94fe4be611', 'cZy7fFqNhwo:APA91bFh44hiL3t8OeJFm2i3tANviv1nvCFu5IZ1hpqGlX-2e37L26iTkBIG5JPQT-DvF_bcU5d2AaAo2K0X330aTI5fmoXDp8lB7hdGdozkP9SY25-mq6UYY6V1kPhOxIVTu7HvQywg', 1802, '2019-01-28 11:35:09', '2019-01-28 11:35:09', 0),
(147, '9970393889', '', '0d45b5e0660931af84b04cc2b7f34d01', 'cZy7fFqNhwo:APA91bFh44hiL3t8OeJFm2i3tANviv1nvCFu5IZ1hpqGlX-2e37L26iTkBIG5JPQT-DvF_bcU5d2AaAo2K0X330aTI5fmoXDp8lB7hdGdozkP9SY25-mq6UYY6V1kPhOxIVTu7HvQywg', 8329, '2019-01-28 11:36:29', '2019-01-28 11:36:29', 0),
(148, '9323630004', '', 'ec61f8e6cfefd0b33e93b528065ac07b', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 5916, '2019-01-28 11:48:52', '2019-01-28 11:48:52', 0),
(149, '9323630004', '', '2293ed7cb0a071eb1b439eb9faad70e9', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 3830, '2019-01-28 11:49:44', '2019-01-28 11:49:44', 0),
(150, '9323630004', '', '3516a2307d72cd27b57627fa3e30bd5b', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 5946, '2019-01-28 11:49:47', '2019-01-28 11:49:47', 0),
(151, '9323630004', '', '0c80b7745955c37c8905bc614b4cc9f7', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 9009, '2019-01-28 11:50:03', '2019-01-28 11:50:03', 0),
(152, '9970393889', '', 'c8229c4b9e399eb2c8c32305dbdb4676', 'dfgaAFf5QM0:APA91bEtJA3jUNWC7PueV5XNlsf5Ysl12iDufSb5g4jDDrf9Siube_MhUvYp9KTYgI6_BpDoxDNu9e1D4L5BQDEG5Nyvh07KYf3LHxi2d3IlCgEkdTSNZL_o-NLYoSYSoMS_HVlgEPtb', 1119, '2019-01-28 11:52:15', '2019-01-28 11:52:15', 0),
(153, '9970393889', '', '179d0f79a06ae4626d73750f4673bdaf', 'dfgaAFf5QM0:APA91bEtJA3jUNWC7PueV5XNlsf5Ysl12iDufSb5g4jDDrf9Siube_MhUvYp9KTYgI6_BpDoxDNu9e1D4L5BQDEG5Nyvh07KYf3LHxi2d3IlCgEkdTSNZL_o-NLYoSYSoMS_HVlgEPtb', 1894, '2019-01-28 12:46:13', '2019-01-28 12:46:13', 0),
(154, '9323630004', '', '57dd7f0b16790f3e18eb99d3259b7261', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 5341, '2019-01-28 14:01:07', '2019-01-28 14:01:07', 0),
(155, '9323630004', '', '74706b784e68f6a17c1442dd6d5d9f90', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 8954, '2019-01-28 14:02:36', '2019-01-28 14:02:36', 0),
(156, '9323630004', '', '680e8f7f4b156b09207da56c9de5bb3e', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 6021, '2019-01-28 14:08:37', '2019-01-28 14:08:37', 0),
(157, '9323630004', '', '2b7730ed92cd1aa158243bc013f124b7', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 8264, '2019-01-28 14:16:35', '2019-01-28 14:16:35', 0),
(158, '9323630004', '', '1e816cc52e5343c5ae4e3f5603135afe', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 8849, '2019-01-28 14:23:23', '2019-01-28 14:23:23', 0),
(159, '9323630004', '', '683624a9b1ec069df3081e12c0292363', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 6362, '2019-01-28 14:24:57', '2019-01-28 14:24:57', 0),
(160, '9323630004', '', '27555e6334e419d9b909c00784134ad1', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 6000, '2019-01-28 14:31:55', '2019-01-28 14:31:55', 0),
(161, '9323630004', '', '21876c55c087e1aa9d7d1dd1284c522d', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 1343, '2019-01-28 14:31:56', '2019-01-28 14:31:56', 0),
(162, '9323630004', '', 'b17373c7c27333f6e146400347105982', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 8198, '2019-01-28 14:31:57', '2019-01-28 14:31:57', 0),
(163, '9323630004', '', 'f83910f7367530b929913e40e3b14c88', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 2143, '2019-01-28 14:32:10', '2019-01-28 14:32:10', 0),
(164, '9323630004', '', '334a3cff42284f386a12762bcefea8d8', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 2284, '2019-01-28 14:36:49', '2019-01-28 14:36:49', 0),
(165, '9323630004', '', '0a6babe455ddc1cdaf428c3963af0919', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 5254, '2019-01-28 14:49:27', '2019-01-28 14:49:27', 0),
(166, '9323630004', '', 'a7dcc0b66c3c1b82a7f35cababa3db33', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 6867, '2019-01-28 14:57:51', '2019-01-28 14:57:51', 1),
(167, '9970393889', '', '7af23c33d922f8b9f2d35eaa35702fcb', 'c6yPYuOZ1Q4:APA91bFQVy4olGanhIKukuqAkErsorhMbYqB0fRsIp83sqfmddud5sq8CEJaeWHAbA1OI9K_MpNH5Y8EchiSLJ03Y0P8RAFWIHEeCIkF4BV8UuydcPU7ddAAzlqUDLJWiXKL6adrVxat', 6187, '2019-01-28 15:14:13', '2019-01-28 15:14:13', 1),
(168, '9096774102', '', '5d5d36c060bf0c26bd1fd3bdb3715019', 'cAZ8_Wij6Os:APA91bE_obLiGqTschdE9VFwSg9LuRiZiBO1CtkQqKxcfl53WJ58rPIhpVY137TGFdxNqIEkWJn38J4mNkI3ZknJ9q3sbnoZgsah5Hr5ONp9OPhYWiYNkhrEIcvZc2JF2V6lBxZ2HeT5', 8240, '2019-01-28 15:16:10', '2019-01-28 15:16:10', 1),
(169, '8407904157', '', '91e84a946a51500f823f7da30edd7864', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 8041, '2019-01-28 15:50:20', '2019-01-28 15:50:20', 0),
(170, '7650958215', '', '547a30a0c437754f33d21ca646f868fc', 'ccR5a3byKsQ:APA91bFDJjMeb8tqsTn594vcWLrdYYZxjctWI8gbe40w-RQDDLNeYuGGhEbgfTLklDQlnIL3XD7zXZY9mWHpOxiKwR6YI7Z1VZixnaaao7Q9t0miJOKR1rNIglIuk0NuOJyQAv7leT9U', 2662, '2019-02-01 11:04:08', '2019-02-01 11:04:08', 0),
(171, '7650958215', '', '4a7d01826f0376de668f5814b9df9192', 'ccR5a3byKsQ:APA91bFDJjMeb8tqsTn594vcWLrdYYZxjctWI8gbe40w-RQDDLNeYuGGhEbgfTLklDQlnIL3XD7zXZY9mWHpOxiKwR6YI7Z1VZixnaaao7Q9t0miJOKR1rNIglIuk0NuOJyQAv7leT9U', 6733, '2019-02-01 11:17:25', '2019-02-01 11:17:25', 0),
(172, '7650958215', '', '4f81d1ae1cb9ec43d9eaabd6f9e1719a', 'ccR5a3byKsQ:APA91bFDJjMeb8tqsTn594vcWLrdYYZxjctWI8gbe40w-RQDDLNeYuGGhEbgfTLklDQlnIL3XD7zXZY9mWHpOxiKwR6YI7Z1VZixnaaao7Q9t0miJOKR1rNIglIuk0NuOJyQAv7leT9U', 4522, '2019-02-01 11:20:36', '2019-02-01 11:20:36', 0),
(173, '8980024605', '', '4344d26a9c3f5ea85044387456bce57b', 'eMtadyLJMwE:APA91bFTO9FiAt82Xku7FC5e72FVBkkCTL9d50XYCPo8aWW1UhZm9AXd29lSdS7Y_SYmqLKcRhlkttKMOSscrCbZCdq7s3OWn84UTaaPdfvGRRqz0ApbqzyjMOdxbZJo3iK1y-jqS3lx', 3191, '2019-02-01 17:26:07', '2019-02-01 17:26:07', 0),
(174, '8980024605', '', 'ba165b8b088d2cd2f6f3555801be5391', 'eMtadyLJMwE:APA91bFTO9FiAt82Xku7FC5e72FVBkkCTL9d50XYCPo8aWW1UhZm9AXd29lSdS7Y_SYmqLKcRhlkttKMOSscrCbZCdq7s3OWn84UTaaPdfvGRRqz0ApbqzyjMOdxbZJo3iK1y-jqS3lx', 1555, '2019-02-01 17:26:39', '2019-02-01 17:26:39', 0),
(175, '8407904157', '', 'f5bac98df7ce8fd9f02662b9900d47bd', 'fjZHM_WObvI:APA91bHPOKUZ9LhtTgcUqiNhdyg7y4GHPyDMqJxBHWzroao7OCi_HUAULFYBhtUaJqIkZ4YMdvINy0bHj8A7pHYZ5isa_cpJWNgdQYxhNyfNpkLFO12nV1FhU_Rvx3Ba-tOH1stHgF8e', 7952, '2019-02-04 17:23:34', '2019-02-04 17:23:34', 0),
(176, '7650958215', '', '689a4976fb5e1d6d1673ea0fb40959a7', 'ccR5a3byKsQ:APA91bFDJjMeb8tqsTn594vcWLrdYYZxjctWI8gbe40w-RQDDLNeYuGGhEbgfTLklDQlnIL3XD7zXZY9mWHpOxiKwR6YI7Z1VZixnaaao7Q9t0miJOKR1rNIglIuk0NuOJyQAv7leT9U', 8358, '2019-02-04 17:31:51', '2019-02-04 17:31:51', 0),
(177, '9405573645', '', 'c4667e25567bd632f11f788ab5e441bd', 'c5aUXXyO4Yc:APA91bFr36Lk1G5JGn-RR42iTY-BAutKhrJlRmLnm7f0c7DV7lax5mhzsvhKtCgIJnfa7t8MRV01aTAtgITqFgn_XSlhZMpRJCoR2l-80LoHlEe4V8KyLHiWoONZDflgY-IdYWh29yms', 5592, '2019-02-04 17:35:34', '2019-02-04 17:35:34', 0),
(178, '9405573645', '', '22af35bee8f00ff1321bdb2804733af3', 'c5aUXXyO4Yc:APA91bFr36Lk1G5JGn-RR42iTY-BAutKhrJlRmLnm7f0c7DV7lax5mhzsvhKtCgIJnfa7t8MRV01aTAtgITqFgn_XSlhZMpRJCoR2l-80LoHlEe4V8KyLHiWoONZDflgY-IdYWh29yms', 6046, '2019-02-04 17:36:39', '2019-02-04 17:36:39', 0),
(179, '9405573645', '', 'e35a8131a749d74b10506e54ac2ff4fa', 'c5aUXXyO4Yc:APA91bFr36Lk1G5JGn-RR42iTY-BAutKhrJlRmLnm7f0c7DV7lax5mhzsvhKtCgIJnfa7t8MRV01aTAtgITqFgn_XSlhZMpRJCoR2l-80LoHlEe4V8KyLHiWoONZDflgY-IdYWh29yms', 8890, '2019-02-04 17:38:00', '2019-02-04 17:38:00', 0),
(180, '7650958215', '', '783dbe1d02f9b0bbd46c8105e1f21070', 'eNFNYbI1Ndk:APA91bGEOAAHdNdNyb5MZ4XA6eAVp5msr6rBPwKjdsBrlX5X5-mDg307ru1XPSNVSyd-VJO8QydWy7_3eU9R4DzAnJ-tcg7ywXFOcDBZdZKCw0xdVnqsvESaUkq26GBn3FtzJ9WYv13I', 6851, '2019-02-05 17:07:46', '2019-02-05 17:07:46', 1),
(181, '7650958215', '', '30a391cd25c05bdf9515dc1389315f58', 'eNFNYbI1Ndk:APA91bGEOAAHdNdNyb5MZ4XA6eAVp5msr6rBPwKjdsBrlX5X5-mDg307ru1XPSNVSyd-VJO8QydWy7_3eU9R4DzAnJ-tcg7ywXFOcDBZdZKCw0xdVnqsvESaUkq26GBn3FtzJ9WYv13I', 7464, '2019-02-05 17:11:21', '2019-02-05 17:11:21', 1),
(182, '7650958215', '', '30396bbae49a8325e04369f0664b9fa0', 'eNFNYbI1Ndk:APA91bGEOAAHdNdNyb5MZ4XA6eAVp5msr6rBPwKjdsBrlX5X5-mDg307ru1XPSNVSyd-VJO8QydWy7_3eU9R4DzAnJ-tcg7ywXFOcDBZdZKCw0xdVnqsvESaUkq26GBn3FtzJ9WYv13I', 8370, '2019-02-05 17:14:54', '2019-02-05 17:14:54', 1),
(183, '8180883645', '', '90063ce209106d59821499bd8601f4b7', 'dBD6YH5EXZk:APA91bG_0W6fq7VF_3C4HZ8S9BHI9H7wTHVb3Z7mwZevrGRXu7WSLMOKLYVx4oLWZZDTd6tFfHjSICJ0p2mxUfp9cHRecibOPkSJQaUQaqZ9UXPq-PgELv2KwrFUTkpIfZX1GPyznaQv', 5322, '2019-02-05 17:22:25', '2019-02-05 17:22:25', 1),
(184, '9405573645', '', '1ae74e48974b89c931ad0158fe2cbc96', 'c5aUXXyO4Yc:APA91bFr36Lk1G5JGn-RR42iTY-BAutKhrJlRmLnm7f0c7DV7lax5mhzsvhKtCgIJnfa7t8MRV01aTAtgITqFgn_XSlhZMpRJCoR2l-80LoHlEe4V8KyLHiWoONZDflgY-IdYWh29yms', 7897, '2019-02-05 17:58:42', '2019-02-05 17:58:42', 0);
INSERT INTO `t_otp_auth` (`id`, `phone_number`, `country_code`, `access_token`, `device_token`, `otp`, `generate_time`, `validate_time`, `status`) VALUES
(185, '9970393889', '', '24e8b3b94e2b4d21f470b3acdc6c1fd7', 'c6yPYuOZ1Q4:APA91bFQVy4olGanhIKukuqAkErsorhMbYqB0fRsIp83sqfmddud5sq8CEJaeWHAbA1OI9K_MpNH5Y8EchiSLJ03Y0P8RAFWIHEeCIkF4BV8UuydcPU7ddAAzlqUDLJWiXKL6adrVxat', 1700, '2019-02-05 17:59:04', '2019-02-05 17:59:04', 1),
(186, '9405573645', '', 'a922a598bbda2d4e51def69610facd47', 'c5aUXXyO4Yc:APA91bFr36Lk1G5JGn-RR42iTY-BAutKhrJlRmLnm7f0c7DV7lax5mhzsvhKtCgIJnfa7t8MRV01aTAtgITqFgn_XSlhZMpRJCoR2l-80LoHlEe4V8KyLHiWoONZDflgY-IdYWh29yms', 5061, '2019-02-05 17:59:48', '2019-02-05 17:59:48', 0),
(187, '8319837942', '', '95eb2faac46f81b3b04a983b626c5891', 'fYqnWK_r90k:APA91bHtByV3IwiJud3yWnuiw--eRxVRBy6lI-UuubgQJ-liVdCqxvYdiKHxAZIJnMNbQPlagVYlgfXc1p6xVbI9oG-__va5PVlUMDDDuynKtYolelP_0ni1S7i-v9a-5wlYd_1s_g9u', 6917, '2019-02-05 18:00:42', '2019-02-05 18:00:42', 0),
(188, '9405573645', '', 'bcc57132cc5c0a72a9dfadab3384d5ad', 'dq51iacUZuI:APA91bFE2aa7m9O6Ng_Y1GjXEaiPLIKzrdbCNsgKNZIswmS_L9_hmiXYKQcdhFt-n5uPK42mBvFto_IRdvyOfVtMpk-LS-u3_N8H87Kq6XZQwkNr2tYwRdrNU2mbY_W8lYoHhNAXEeUp', 9685, '2019-02-05 18:01:23', '2019-02-05 18:01:23', 1),
(189, '8319837942', '', 'cfa192855251fa7a677e9f9a8fa81264', 'fYqnWK_r90k:APA91bHtByV3IwiJud3yWnuiw--eRxVRBy6lI-UuubgQJ-liVdCqxvYdiKHxAZIJnMNbQPlagVYlgfXc1p6xVbI9oG-__va5PVlUMDDDuynKtYolelP_0ni1S7i-v9a-5wlYd_1s_g9u', 1080, '2019-02-05 18:01:46', '2019-02-05 18:01:46', 0),
(190, '9405573645', '', '15aa93092ffe40f3a189a39896428e14', 'dq51iacUZuI:APA91bFE2aa7m9O6Ng_Y1GjXEaiPLIKzrdbCNsgKNZIswmS_L9_hmiXYKQcdhFt-n5uPK42mBvFto_IRdvyOfVtMpk-LS-u3_N8H87Kq6XZQwkNr2tYwRdrNU2mbY_W8lYoHhNAXEeUp', 4801, '2019-02-05 18:02:15', '2019-02-05 18:02:15', 1),
(191, '8319837942', '', 'f6caec37dc8525dd1db88da3c3080242', 'fYqnWK_r90k:APA91bHtByV3IwiJud3yWnuiw--eRxVRBy6lI-UuubgQJ-liVdCqxvYdiKHxAZIJnMNbQPlagVYlgfXc1p6xVbI9oG-__va5PVlUMDDDuynKtYolelP_0ni1S7i-v9a-5wlYd_1s_g9u', 8385, '2019-02-05 18:04:01', '2019-02-05 18:04:01', 0),
(192, '8308995666', '', 'bb86f505e44d1df1bc82f45dac444abe', 'dDnpbHURe20:APA91bHagZe0VJhCn05NnQSL3-VGCoetC06lke99H9Zae8OZyMVR0Jn9COMd8WSOrzkFJYId85iatmkWr8xVMijbUHskBbJRo_AQMSpT12VvPeiDC3Fj9Qs5uKWers9ReAAfGBl4Y7tk', 9196, '2019-02-19 18:20:20', '2019-02-19 18:20:20', 1),
(193, '9890199009', '', 'b3cfaab713243c983331f15ba0d2177e', 'fiuAcP3D8-I:APA91bHBszGATBB-5XovP0E53QfPFeBqh4ek5TtvWHUWNBUdtG2i1VApeeUFpVvTXMF85jq8SFIpcKfkmwviT91QmO9bxhLu_4q0oEbCCWmDLzAmV4stKizmzVrNmcNYluTqoyF3JGuI', 3084, '2019-02-21 19:45:49', '2019-02-21 19:45:49', 1),
(194, '9983505478', '', 'd76afd6a46e9a0bdd3574339b2ac528f', 'c5EDYNujZ6A:APA91bG44lnydGOdnOM-V8otrjva2wCEOHgL_f6zmMCdRz4vOErmcC_7lA1tO6opHYMebKVuVcmjNPSxawngnU9Awe5zRG-QJSz3R8qrg6rR5gm3f2FqK6ONWltb5zwN73rUE4OPUKed', 2358, '2019-03-07 14:30:13', '2019-03-07 14:30:13', 1),
(195, '9700563665', '', 'd174d5c3018402ad177d03ca2faf0efe', 'f6A8evhaDXk:APA91bESF2yYMcXxawvaMlRl01eU3P0zhRr47XRq_s7-SaxjMcpDY_9jPwMKfakVb6L8-Vcs_b-imAg5kNaLDzHTYrCTH4SqokxlbmLoLIVHZsAtY5Vh7s29lDHYJL8F-pyMX_hy9QsP', 5103, '2019-03-11 21:00:57', '2019-03-11 21:00:57', 1),
(196, '7207741534', '', 'd99a63e8577c79d04fa0dce4bea48255', 'f6A8evhaDXk:APA91bESF2yYMcXxawvaMlRl01eU3P0zhRr47XRq_s7-SaxjMcpDY_9jPwMKfakVb6L8-Vcs_b-imAg5kNaLDzHTYrCTH4SqokxlbmLoLIVHZsAtY5Vh7s29lDHYJL8F-pyMX_hy9QsP', 3475, '2019-03-11 21:06:16', '2019-03-11 21:06:16', 1),
(197, '9920515559', '', '57e23d81e9d9a49fbc19169a4b884723', 'd12fzBuUy3g:APA91bFx7DkWRCgnKTt_2xny6LBviCN-ihCTsc8W7neohNnzsRuI6bpjeSwxUk6pwbsMbtT2-5j_n07F15EDuQuUBBTFHG_bFAmTKRSaS-WnFy9-D3zc9slZrkLVDnKSrpLHEHzfASA_', 6338, '2019-03-14 04:50:58', '2019-03-14 04:50:58', 1),
(198, '9422814907', '', 'b06c104b2afd6a4d19ec33ae755053fa', 'dhhkMfURiH8:APA91bFQN2uTed3O_Gj3cdTZqzhLPc2DGZ8jrJUhjd2ydeU7qxr5PlqOTY72Sx7VlM-VEMkmUz2GtHy4lYtE6BBVGDpecvz-niP8dPP_E5mmVtlZWSMi1wHiwYOigenBB-f9uZCj_whR', 7665, '2019-03-17 21:27:10', '2019-03-17 21:27:10', 1),
(199, '9323630004', '', '889ea9dfaf41848d784a08349680c2a5', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 2743, '2019-04-17 22:54:14', '2019-04-17 22:54:14', 0),
(200, '9323630004', '', '74c50251cc10c78e7b9b84a9776938e2', 'cCPhISpdMUU:APA91bH99WEjSvrive5TG2dfVNIpZReqhLK1WqsfnBb050bn8Ji9YGDIq2lqX6ZSSEduYm0C-kQ-tXfxF1qAAkHVtEBHZwoKOtA5o2BfAsifTYi1vaTTYcXf7u3J-Vz325l6rtk4PqCx', 9860, '2019-04-17 22:56:14', '2019-04-17 22:56:14', 0),
(201, '6502530000', '', 'f8bf1bccfd8bc1b9251489a74ee14ceb', 'fJ3A2JKsGQs:APA91bEH1jc2QeE2PHCe5cKeUKLNqgknn_e6a1Wa_JsnHT4AlR4kjnTxwU2Tba1gCpH78OPKUnFH7Ut0aAQV6rfcJrlqUYJg4Kpn39z9GIrdFLHsGrNGy_5FpyPQAtwjAhtESvMtZru_', 8093, '2019-05-13 11:18:26', '2019-05-13 11:18:26', 0),
(202, '6364908547', '', 'ff4f9fe898d76bd3aaa46f990ccd0b45', 'cZPcPkQJiog:APA91bFWVYp2jqt-Hr2mSd-dFqhc8Eaz1FWbJ2FwZvbwfjPbrjPNFAuJMw4BkspKJEJPDae6FyLdIIIt6-tuJydYX4I7ay_mNMlLiY2TwUPu6u0z-fNNyW5q-Fdq_GZNNo_TdYniTk0O', 6111, '2019-05-27 10:34:40', '2019-05-27 10:34:40', 1),
(203, '8407904157', '', 'b10d58a23643554f2dbd88bf3c7fb82a', 'ev6iZmMGxkY:APA91bHW8VdXlCiYzA5mc_bagrT8VtoGkzjlZbvRMW_UFenOAUXS0j77JZaxqjGoi4twh23icEXlqQSfOkYKjJneUPaSA6DfhmMWYMrVwVnxMDeAYrZ0DkiVWeASli_UpevJ8kzEev7S', 3527, '2019-05-31 17:36:18', '2019-05-31 17:36:18', 0),
(204, '8407904157', '', '0b19fd656ac2bebb2e8a5ab2d784f0f6', 'ev6iZmMGxkY:APA91bHW8VdXlCiYzA5mc_bagrT8VtoGkzjlZbvRMW_UFenOAUXS0j77JZaxqjGoi4twh23icEXlqQSfOkYKjJneUPaSA6DfhmMWYMrVwVnxMDeAYrZ0DkiVWeASli_UpevJ8kzEev7S', 5888, '2019-05-31 17:37:42', '2019-05-31 17:37:42', 0),
(205, '2424482448', '', 'cb7e2826770442f3942536070f138df9', 'c3d1NnJ32cU:APA91bGn-I1xTyK0g2Cv0rwVbPGd-NZHhXv4AYogEqcrFxnGl6NSGI326HkpyLfaQJlC3tEa3fuYGvQBONY_hRo4FpClvYaf9RtMW9zcEZ90CvAZO1AEtzh9vbHrvHu8Nt8PdiWFmsvV', 3006, '2019-05-31 20:03:16', '2019-05-31 20:03:16', 0),
(206, '9970393889', '', '6d4f7d0936d49c0cf1f648e17ab887ba', 'fquzeEVk3Vg:APA91bG24XnOyu5mhS9cRvz5S0iFynAm0Oy7Rj-gMlAUQ7e68bsonwsMF8CprY-6yYfB4JD7gebvBy3l-RbNEHFl4J-MUMapu0PacjLtqFGOfj8ZTYw1qBCdvoZQ_PsgvAjwxThod5NJ', 4632, '2019-08-30 13:06:05', '2019-08-30 13:06:05', 0),
(207, '9970393889', '', '2285add9c22c0f373fc0c2d506c7d551', 'fquzeEVk3Vg:APA91bG24XnOyu5mhS9cRvz5S0iFynAm0Oy7Rj-gMlAUQ7e68bsonwsMF8CprY-6yYfB4JD7gebvBy3l-RbNEHFl4J-MUMapu0PacjLtqFGOfj8ZTYw1qBCdvoZQ_PsgvAjwxThod5NJ', 3757, '2019-08-30 13:08:30', '2019-08-30 13:08:30', 0),
(208, '8983462134', '', 'cd926393f2793b708748f67813be5c79', 'fMSS0s8LBQM:APA91bGeECdTASf-45P_o9kIhrwairp8qYESdd1NoZLWR09OD_J2EMNNNKyogajiFi7pqAw-K3oS85lMcp97nlNJlYQiucD4CUkXHluLfdH1Q0EEWroQcKr6aDWFC-CqXUDwzK3C6Hv3', 8577, '2019-09-03 16:24:24', '2019-09-03 16:24:24', 0),
(209, '9359627676', '', 'a509a8a723913e6d3765130d24f37a28', 'cCoQdIhgUhE:APA91bEX5dQNCtGwWlio5i_C3mBTIGAjKtNlQF0ye1MVL_UdLFc810R9eOTTxVg59_LdwaZF-btZYvKXXy2q47PCdRJsDgEcyigVNM-tLHYkRnodTALrGNYmyoLi1FKFNgRBmVBw9n-L', 9144, '2019-09-06 13:34:25', '2019-09-06 13:34:25', 0),
(210, '9168738167', '', '8e2820bbba5aa858a6058d85d5b201b2', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 3166, '2019-09-09 17:06:56', '2019-09-09 17:06:56', 0),
(211, '9168738167', '', '1b322afcbe2313343e267d53a81ed368', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 3509, '2019-09-09 17:08:14', '2019-09-09 17:08:14', 0),
(212, '9168738167', '', '0099d3b65bd3a49c6566711c3170df0e', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 2253, '2019-09-09 17:09:18', '2019-09-09 17:09:18', 0),
(213, '9168738167', '', '6a839c76128e19a91b6a3be2666183eb', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 6661, '2019-09-09 17:10:27', '2019-09-09 17:10:27', 0),
(214, '9168738167', '', 'a009e7235017f1e12989a5c102431899', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 4946, '2019-09-09 17:11:30', '2019-09-09 17:11:30', 0),
(215, '9168738167', '', '896f972139922f3aa70fe6178e3587c5', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 2147, '2019-09-09 17:16:26', '2019-09-09 17:16:26', 0),
(216, '9168738167', '', '2d90d1e2b3f8644f683918d296d7fb03', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 7781, '2019-09-09 17:17:04', '2019-09-09 17:17:04', 0),
(217, '9168738167', '', '4b6e0cda70d2a790cec3076c5f81606d', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 5489, '2019-09-09 17:18:41', '2019-09-09 17:18:41', 0),
(218, '9168738167', '', '03e5a2acbb33115e956a18225d81ae47', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 1008, '2019-09-09 17:22:14', '2019-09-09 17:22:14', 0),
(219, '9405573645', '', '665469dca7cc788f5b9c26a9464dc540', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 4139, '2019-09-09 17:25:28', '2019-09-09 17:25:28', 0),
(220, '9405573645', '', '427010612ffd887dc27347dcd38d5807', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 5505, '2019-09-09 17:31:22', '2019-09-09 17:31:22', 0),
(221, '9168738167', '', '4d870bb78a00bcc7c9b7b45e046d7dd7', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 9909, '2019-09-09 17:32:26', '2019-09-09 17:32:26', 3),
(222, '9168738167', '', '8c73b7b6943518aeeb0c476d5cc53966', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 2445, '2019-09-09 17:36:24', '2019-09-09 17:36:24', 0),
(223, '9168738167', '', '96a725a06ea3d2ae33fb73ee7d2ed97b', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 3814, '2019-09-09 17:38:40', '2019-09-09 17:38:40', 0),
(224, '9168738167', '', '05c95bdd52bc9f270c7855d8a84bde02', 'dHy9R1Nhpqw:APA91bEIuSXr38paAGfE6b7mLx32NhpgzCfGVR8Mz_ia-TbJ184g3FGEIxYYKWTivwuwx9abEwAf8uZKLMxXAfSEDoUzk9FJE93hi-c7VeZHyR9zcAVUYAiRNwIODyqlduMdqa1UntxN', 4574, '2019-09-09 17:44:41', '2019-09-09 17:44:41', 1),
(225, '9970393889', '', '38b64f05dc754fc2996a09590232e64c', 'eq5fUkhqikY:APA91bGZ2DLv8nOzF4lF960T3rls5nuCckCrt9r0aQsI1BjNh-bdKVxP3ADzp0vXXGLY5Q2roXhZnRBvbrwHB9HDMEq_kW0VVAu7kNZfNRp6qOK3yEwOENyUsT_ZU6btdxvFudGT51Pc', 9214, '2019-09-09 21:23:34', '2019-09-09 21:23:34', 1),
(226, '8983462134', '', '2af7ee75f8a15fa812a64b1d24d8271e', 'dy2K5F0CVCE:APA91bEgImE4rl6rOE5mgmIpvidk9gW2KhbhOfrGJanS4s9Tj8tlknTZDZUQKF8MqrxwvEbRu6Z7hsuD4a_3iM9B2QXbLOty-6F9pLsxw3_kL4EsckOsAZcMKBImzahA2EBj_ZmGXFr9', 9006, '2019-09-11 08:55:30', '2019-09-11 08:55:30', 1),
(227, '8983243404', '', 'add835f03e5ad8688658e2c5ff375763', 'fo34Zz0XR1A:APA91bH2Gb6ouVOkvOFKb7jgSQyiWPveVc9JkSVkopLwo8PeF643BkuzVWgeBwkRtCyWilUsM_Ypkz3dnQpYiqU_sUPBu7J-EJRpV9rVz839fhh8f9cfcl5CVvwrAD6pkb-MIcdqAFxg', 8134, '2019-09-13 15:41:57', '2019-09-13 15:41:57', 1),
(228, '8153997112', '', '1f57661b869ba15093f5f71df9193b0b', 'fZJQVmp-hl4:APA91bE7ABzzXzbNbKVe7JDTY7oGpc2r2j7_N6xbSP9eqCGoWAbxXxivXcZ5gJlqZo9b8S2l49C_n5ulL3rbrd2YT6kqPDPjfUrPGammJ5l1bXY_5usRaZrMSCUfs3GjmP2wEiZTbtt9', 3380, '2019-09-16 11:47:26', '2019-09-16 11:47:26', 1),
(229, '8153997112', '', 'd422a8bda2cdbe5c105abe16c556658c', 'eNLAIwCaK_g:APA91bE4Mc8FIyoi1SFjrbBCUHIWc6Fqv1MXuk0AT4nvEdGe_BIYvED-ljTyxOup04FrFuAfBlKgpA31F_MczHCxSGaF9dTVxZjoziP4x5q5lQ94LfMfaUwC3DVA0iuRZ_SUc0pxBvqs', 4781, '2019-09-20 17:06:15', '2019-09-20 17:06:15', 1),
(230, '8153997112', '', 'b73b274c25d6aa2ee2f3c8e22e82aec8', 'fZJQVmp-hl4:APA91bE7ABzzXzbNbKVe7JDTY7oGpc2r2j7_N6xbSP9eqCGoWAbxXxivXcZ5gJlqZo9b8S2l49C_n5ulL3rbrd2YT6kqPDPjfUrPGammJ5l1bXY_5usRaZrMSCUfs3GjmP2wEiZTbtt9', 4507, '2019-09-20 17:10:49', '2019-09-20 17:10:49', 1),
(231, '8153997112', '', '690dacfb8088fb3fbb2147ba9fd37096', 'dlwtSYRPi7U:APA91bEdEY-I19V32ME120kjQ_ee7trGXQESLkLroPfgYUvoEf5W9pa7w_N6e9TvhgMDyXXAzBEXPajdZIAF-orGq8HfQ8mHR1dfWz3pkwYlupoNBnPPICKoS7KMvH4uWmiYY9iG95qq', 7425, '2019-09-20 22:00:49', '2019-09-20 22:00:49', 1),
(232, '8983462134', '', 'c26f03182467d70674a7dbb3af5e00e7', 'fZJQVmp-hl4:APA91bE7ABzzXzbNbKVe7JDTY7oGpc2r2j7_N6xbSP9eqCGoWAbxXxivXcZ5gJlqZo9b8S2l49C_n5ulL3rbrd2YT6kqPDPjfUrPGammJ5l1bXY_5usRaZrMSCUfs3GjmP2wEiZTbtt9', 3422, '2019-09-20 22:38:29', '2019-09-20 22:38:29', 0),
(233, '8983462134', '', 'cf2c6e85d536fb0a6a389e5046a45605', 'fQ3tY52RpJc:APA91bERtUid-x8SxEtEOKV4Ob697XJtM2kUhDKL5s6jA9AXuP-1sd1l0SOYrOVnfkXWfM0R02Jf2SrpMux9zHfKDCufdxFFYkrteK2GCqmJQAu9oru694QwHG6cLWbidt_GFtD9twgl', 8207, '2019-09-20 22:40:32', '2019-09-20 22:40:32', 1),
(234, '8153997112', '', 'cdbff3e578507b644302bcb3d29de20f', 'dDrNfvQ0KiE:APA91bHQ3dGvskwlIa45_YrvWdmShaxo-UWHCcZ3jO_2_taKtiBWN2kAYEzTBDBPdF6Qu8OUNSDqlVmEIHeeiNmZF38UGLx7UgZJnyzhc9DGz1ez4d6AK7KHUt0kWdLqYGLBRAHEnIYc', 2434, '2019-09-20 23:40:56', '2019-09-20 23:40:56', 1),
(235, '9970393889', '', 'cf1771b917c7425a0b3869031e91081a', 'dgvsQIDpYmU:APA91bH9DG-QCd1XGYvbWp_60TQbzMDZwvel6y_hgcAX0KxizUjvfwTKckSczuZ58yizAW-FqqvsI_18YHVPMfBn3ppLUOX1Sk_4DuOkVg-n2F4wAzexL5xzXKQKMQa0ynqdYbzmynpK', 4953, '2019-09-21 13:50:29', '2019-09-21 13:50:29', 1),
(236, '8983462134', '', '22b0d3cb8f4934e8a99066162c5bb091', 'dy2K5F0CVCE:APA91bEgImE4rl6rOE5mgmIpvidk9gW2KhbhOfrGJanS4s9Tj8tlknTZDZUQKF8MqrxwvEbRu6Z7hsuD4a_3iM9B2QXbLOty-6F9pLsxw3_kL4EsckOsAZcMKBImzahA2EBj_ZmGXFr9', 3481, '2019-09-24 12:00:46', '2019-09-24 12:00:46', 1),
(237, '9970393889', '', '01098adda5427743957e38fc1020095c', 'e5E-erfG0M8:APA91bFGJ34mzbz3gl4WPWBe_Hgh-aRHsATmJwNnlQQOEUnWudHgTMECq7Y4xw5rlxsfGV0p-Jaj9YG4AwyizH4eK4Iqss4IovMDsI8uyzfyI7sPH0DgVLXVKUs86N5VQEkFrQtLm5g_', 4491, '2019-09-24 15:48:58', '2019-09-24 15:48:58', 0),
(238, '9970393889', '', '8cdabe75c95ced44d3588c5ab9580705', 'cXHkIN5ichE:APA91bG-JqvGDuRhRGNCcshkb66mREmP_1qrlrx8EeFgsRxUHw_L-XXMKbvI5XEzlQEMbwHk4FAYhsWysPrYa5jUd33F-Z-0eP6sf3RUgycFnZ_A1u76-Rx0qxJE5sxZVpq4bIUhNCiD', 6044, '2019-09-24 15:52:33', '2019-09-24 15:52:33', 0),
(239, '9970393889', '', 'cd3d67b78bbbc83c4e938f4f4d8a6b0d', 'ehwVm_IQp3Y:APA91bF_8XQzQaqPVcCMLbWvIzBUAWjmp9xtdSe9e0DoEGjiWkoK7fIuzS7a93D77YrIrp9JgzWhDMhp4NzBPsNxWV0fcYaDcqhXcF2YuJo73X-Iw6P-ahZH9mP-9Qw4gLzOWrelfdAZ', 7661, '2019-09-24 15:54:35', '2019-09-24 15:54:35', 0),
(240, '9970393889', '', '29463a66b9f069331660fc042ab8ccd0', 'ehwVm_IQp3Y:APA91bF_8XQzQaqPVcCMLbWvIzBUAWjmp9xtdSe9e0DoEGjiWkoK7fIuzS7a93D77YrIrp9JgzWhDMhp4NzBPsNxWV0fcYaDcqhXcF2YuJo73X-Iw6P-ahZH9mP-9Qw4gLzOWrelfdAZ', 1509, '2019-09-24 16:34:42', '2019-09-24 16:34:42', 0),
(241, '9970393889', '', '82f522d5fe018362aab5aad2e313dbac', 'ehwVm_IQp3Y:APA91bF_8XQzQaqPVcCMLbWvIzBUAWjmp9xtdSe9e0DoEGjiWkoK7fIuzS7a93D77YrIrp9JgzWhDMhp4NzBPsNxWV0fcYaDcqhXcF2YuJo73X-Iw6P-ahZH9mP-9Qw4gLzOWrelfdAZ', 9730, '2019-09-24 16:37:57', '2019-09-24 16:37:57', 0),
(242, '9970393889', '', 'bfd331f9c8c3618e52d59f3262ceb977', 'dZCvgtp4T_Y:APA91bEPETOfomiO130o9u0tbLfufVBGXXaEIcQK2M0-QvRJ9dfziDgBwL7jIm8Yuq0iV-_zOA5Al89FKkrzDFhwGOxtQljr_XOJou0MsL6K1zKXx0DNYF66elLDikAX9YdJ958P0sGT', 3956, '2019-09-24 16:50:30', '2019-09-24 16:50:30', 0),
(243, '9970393889', '', '5e7dcad477ad40c65a18cfb1cb0f83ba', 'dZCvgtp4T_Y:APA91bEPETOfomiO130o9u0tbLfufVBGXXaEIcQK2M0-QvRJ9dfziDgBwL7jIm8Yuq0iV-_zOA5Al89FKkrzDFhwGOxtQljr_XOJou0MsL6K1zKXx0DNYF66elLDikAX9YdJ958P0sGT', 5043, '2019-09-24 16:52:06', '2019-09-24 16:52:06', 0),
(244, '9970393889', '', 'c2761d63f053f24a05dab44f4e977569', 'dhz8KlhdxYg:APA91bEdZthpOL12KzbxppidH-882CFMEgillaq8XhHzh8qNvCqdFAOJlIvWHlZWwS8aaSEiQV6qlEn88jg9Buw_IH0WbCFoW6FUHobFDHAgzQJyokXv-p9sr6J9miKoocTglEo5RFxV', 4010, '2019-09-24 16:54:15', '2019-09-24 16:54:15', 0),
(245, '8153997112', '', '531b34aee175d692dd5b0913268ad010', 'fQ3tY52RpJc:APA91bERtUid-x8SxEtEOKV4Ob697XJtM2kUhDKL5s6jA9AXuP-1sd1l0SOYrOVnfkXWfM0R02Jf2SrpMux9zHfKDCufdxFFYkrteK2GCqmJQAu9oru694QwHG6cLWbidt_GFtD9twgl', 7694, '2019-09-24 21:30:02', '2019-09-24 21:30:02', 1),
(246, '8153004388', '', '1e9a09641d9b13454342bd951336ccd9', 'dlwtSYRPi7U:APA91bEdEY-I19V32ME120kjQ_ee7trGXQESLkLroPfgYUvoEf5W9pa7w_N6e9TvhgMDyXXAzBEXPajdZIAF-orGq8HfQ8mHR1dfWz3pkwYlupoNBnPPICKoS7KMvH4uWmiYY9iG95qq', 1492, '2019-09-24 21:40:59', '2019-09-24 21:40:59', 1),
(247, '8153004388', '', '1a39d20907ec967ca4c3f5fa9f985149', 'eNLAIwCaK_g:APA91bE4Mc8FIyoi1SFjrbBCUHIWc6Fqv1MXuk0AT4nvEdGe_BIYvED-ljTyxOup04FrFuAfBlKgpA31F_MczHCxSGaF9dTVxZjoziP4x5q5lQ94LfMfaUwC3DVA0iuRZ_SUc0pxBvqs', 8655, '2019-09-25 14:21:55', '2019-09-25 14:21:55', 1),
(248, '8153004388', '', '02da017c5a3a00df0db1b060804d7d93', 'fne1ECKFvU0:APA91bHwxX4HLSih98xWb_qsPHI4kk0whEd0VnoAk0SPz3EkgkZAewL7ZQbWvV1_lNAOjLmg9P29wQcfNvcvToFt4pXUglFdy18sDAQJIEk2N-iY6JsWwQdHMV9_k_w6fModElfvBI1k', 6719, '2019-09-26 11:51:48', '2019-09-26 11:51:48', 0),
(249, '1112223334', '', 'f18d20931a1bb064c4fe72344455fbf3', 'c64DHzEv0n0:APA91bGSPTLVZQ6coWeucxEXIXIX_aZCB0ziLoiS6aG4CUGMdhI-lq8VplqTFMHnoMPkWzfJ7PrR6EYiVpJ8U2gYlzyjlm3hi7HikYIoMCYji-QkVxbf-alhuyHQJ5RACl3zB2aUqQxB', 7874, '2019-09-26 11:52:01', '2019-09-26 11:52:01', 1),
(250, '8153004388', '', '829d73af056a548fb9c7a40c419ce394', 'fne1ECKFvU0:APA91bHwxX4HLSih98xWb_qsPHI4kk0whEd0VnoAk0SPz3EkgkZAewL7ZQbWvV1_lNAOjLmg9P29wQcfNvcvToFt4pXUglFdy18sDAQJIEk2N-iY6JsWwQdHMV9_k_w6fModElfvBI1k', 7806, '2019-09-26 12:23:56', '2019-09-26 12:23:56', 0),
(251, '8153004388', '', '7903c52a7dbc2142413b8cd2d96e6180', 'fne1ECKFvU0:APA91bHwxX4HLSih98xWb_qsPHI4kk0whEd0VnoAk0SPz3EkgkZAewL7ZQbWvV1_lNAOjLmg9P29wQcfNvcvToFt4pXUglFdy18sDAQJIEk2N-iY6JsWwQdHMV9_k_w6fModElfvBI1k', 9829, '2019-09-26 12:25:20', '2019-09-26 12:25:20', 0),
(252, '8153004388', '', '36fa3a8a1b88ece3a01f6c98ee06d181', 'fne1ECKFvU0:APA91bHwxX4HLSih98xWb_qsPHI4kk0whEd0VnoAk0SPz3EkgkZAewL7ZQbWvV1_lNAOjLmg9P29wQcfNvcvToFt4pXUglFdy18sDAQJIEk2N-iY6JsWwQdHMV9_k_w6fModElfvBI1k', 5567, '2019-09-26 12:25:40', '2019-09-26 12:25:40', 0),
(253, '4445556666', '', '54f7d861f54c427e66ca3762cef48086', 'dHV7LCGJuEw:APA91bFXhGshCrSiYJtsfL93R4Bjb1Opm-CiU4MJJIHGUNi3aKDyEfYseQnpqQK97tQYyTZfAbSbPTyXfjDQP2fT7TXWjDPkq15PM0VcfGhdiyWTVY6cK9osmpF3K_pQFEB5L2d_uPzY', 3672, '2019-09-26 12:26:11', '2019-09-26 12:26:11', 0),
(254, '8153997112', '', '39978750355ed5e53fd14b33b6734a00', 'eFrBL4LYf88:APA91bEVNUuOu0qT_PfilQxRkKlve8hZOBwOPYJcnQXPU3GqF_2CSR38Tvmbn3Ihs0fDOmCL870XzOhPVc3I9p3LiGKbAn0E7PoEfzi17uTgw09vzMPQY6Oylw8JEMGXh_kx9Da_hS5G', 7355, '2019-09-26 12:50:47', '2019-09-26 12:50:47', 1),
(255, '8983462134', '', '7f7fb4a62bf1bead32268556a5737736', 'e-gZk4FTQsc:APA91bFWiDfA6C7FewErR0FVPDMj8RDFcTaEiI-cQ41O3a1f3cNr2DqNRcmkhDofIr-HGnFQPMf7LsXkc0QfqXDxEcEKlyAqdq2JhBCwrt4Ww5iw23d7NQ3rmSZyBvxxD5P4Fitb9Yd0', 2003, '2019-09-26 14:00:08', '2019-09-26 14:00:08', 1),
(256, '8407904157', '', 'd8b37f1e02465cb0678e9d4f4ae3dea7', 'e-gZk4FTQsc:APA91bFWiDfA6C7FewErR0FVPDMj8RDFcTaEiI-cQ41O3a1f3cNr2DqNRcmkhDofIr-HGnFQPMf7LsXkc0QfqXDxEcEKlyAqdq2JhBCwrt4Ww5iw23d7NQ3rmSZyBvxxD5P4Fitb9Yd0', 2628, '2019-09-26 14:02:41', '2019-09-26 14:02:41', 1),
(257, '9970393889', '', '22560b9ee17fd8ea5aa14101259eab01', 'emKXKHTl6mY:APA91bH9E6W62vGgStGNdBZaEjEdqbtObetRbBIUeZ_dAaE8WM0NA8lQR8QDTQdt4C7SHbNCN5TR-JeRoYG_ZPteOZ0hIOvSIET9QEQ0T3kUpkufJ_0w_g80SigHKYMi5e8w-LZERRVR', 8371, '2019-09-26 15:30:33', '2019-09-26 15:30:33', 1),
(258, '9511747397', '', 'ee2cd8cba40b1d378a9cec8b5a70d805', 'c0bUfYxl9vM:APA91bFnqQ1iMUQPuz2gRgLgL2K8vbCdL4kdzOMSmOgkAvHcY8wm-dqZoqRmMh8LdJJ6lnT-u3JLSt8l72KRfBltsY_PE5KTr1BDS2c4t8i3pccwxUauHZjQWqc5U0IVGlm1MPLGVZxl', 4246, '2019-09-26 16:09:36', '2019-09-26 16:09:36', 1),
(259, '8407904157', '', 'f36973d0deb42ffaefe749fea3951e6e', 'ckrG2bJH_HQ:APA91bG8dQGBfpn5aGv1rHbZzL3E6N4l6Ughhrb1mB47qa1BNSorF8QVZ2mniU2EyH-ZwQk8q2SxKuMA7rXJpX-QEYXIEVOOBr3cKOnDOD3g_F0kyFp6BDYBfCZBHpZRbVXpfpUMsP0e', 5667, '2019-09-26 23:55:57', '2019-09-26 23:55:57', 3),
(260, '8407904157', '', '498792282cd0a064121267d383ec6024', 'ckrG2bJH_HQ:APA91bG8dQGBfpn5aGv1rHbZzL3E6N4l6Ughhrb1mB47qa1BNSorF8QVZ2mniU2EyH-ZwQk8q2SxKuMA7rXJpX-QEYXIEVOOBr3cKOnDOD3g_F0kyFp6BDYBfCZBHpZRbVXpfpUMsP0e', 4241, '2019-09-27 00:01:12', '2019-09-27 00:01:12', 0),
(261, '8407904157', '', '03adfc5a3e3ddb2e987d5d360a8af2ad', 'ckrG2bJH_HQ:APA91bG8dQGBfpn5aGv1rHbZzL3E6N4l6Ughhrb1mB47qa1BNSorF8QVZ2mniU2EyH-ZwQk8q2SxKuMA7rXJpX-QEYXIEVOOBr3cKOnDOD3g_F0kyFp6BDYBfCZBHpZRbVXpfpUMsP0e', 3510, '2019-09-27 00:04:09', '2019-09-27 00:04:09', 1),
(262, '2424360479', '', '733f4c188b73b44c9d822b464ee5c3b8', 'cukC8YT3txQ:APA91bHLahY4gn9mh6MjexfPLdA4GKnhL0XsXUe8evO2bTPqEZ0UTbnTbK0OpQqrbXYXA9cv-6Wj6J66_tJQJGarAdXNSpS-jmG4mxaG87-MfjcX_7fAxa88G7eQnvj8CNXt0hdPcNyW', 3019, '2019-09-28 20:07:27', '2019-09-28 20:07:27', 3),
(263, '2424360479', '', 'a0805a785b5c10b4f8b8af83ae1346b7', 'cukC8YT3txQ:APA91bHLahY4gn9mh6MjexfPLdA4GKnhL0XsXUe8evO2bTPqEZ0UTbnTbK0OpQqrbXYXA9cv-6Wj6J66_tJQJGarAdXNSpS-jmG4mxaG87-MfjcX_7fAxa88G7eQnvj8CNXt0hdPcNyW', 6634, '2019-09-28 20:11:43', '2019-09-28 20:11:43', 0),
(264, '2424360479', '', '6660b6d9c0e5c1f12179120bc8aa413a', 'cukC8YT3txQ:APA91bHLahY4gn9mh6MjexfPLdA4GKnhL0XsXUe8evO2bTPqEZ0UTbnTbK0OpQqrbXYXA9cv-6Wj6J66_tJQJGarAdXNSpS-jmG4mxaG87-MfjcX_7fAxa88G7eQnvj8CNXt0hdPcNyW', 3205, '2019-09-28 20:13:53', '2019-09-28 20:13:53', 1),
(265, '8153004388', '', 'e39bece69d3427e3b174858a90314090', 'fne1ECKFvU0:APA91bHwxX4HLSih98xWb_qsPHI4kk0whEd0VnoAk0SPz3EkgkZAewL7ZQbWvV1_lNAOjLmg9P29wQcfNvcvToFt4pXUglFdy18sDAQJIEk2N-iY6JsWwQdHMV9_k_w6fModElfvBI1k', 5581, '2019-10-01 19:59:32', '2019-10-01 19:59:32', 0),
(266, '8153004388', '', 'e7262e9d564041dee4203efb8accd2a8', 'dKPRndFJiCk:APA91bE5WQ8qeloeEGzHoZgp_OxZ_ZRqctJUExVPASJ2J7K7bu17703SgW_zPP1r8uEj1crhYmEv1Y1FBEHf5GJvh7Xj6JHAfYEICoeAed5zWsHId1SBEsnd13wi7XrFbDrdtZa_7mVI', 9780, '2019-10-01 20:13:32', '2019-10-01 20:13:32', 1),
(267, '8983462134', '', '94d3dc5bbab40f15a9fcea543bda944f', 'fho_NA1niOo:APA91bHDoMSGVXfDFPRXJrfvsuBjVqagKyvIIsOeji5YwLqQpDiiosFHpjI4pfLELsa4feITOQhWRmLg9sdy9AL7QjrrGfYCmluF94MUT5huZ4LJC4_tgX-RLn-RomAM-8j0ZGULkGmQ', 3931, '2019-10-02 00:00:14', '2019-10-02 00:00:14', 1),
(268, '9970393889', '', '7bb9bcf094316646e7478c5378f9e342', 'fO4VBh1p7Lc:APA91bGDOIgfYRFZXPawcnkeyJhZkvxHwg0GRm7TFSFXvcQn75IvgrZUT4UwgF77oQd5R7o7NU4nnMV-iaq0kGp9nVrnxwKRZ9ftjTqZT5mtRbmZYyFFlD4T-G2WgK_9vvokdkYkc8aA', 2926, '2019-10-02 00:22:58', '2019-10-02 00:22:58', 1),
(269, '8153004388', '', 'da995d8e862d76c94ba5d7bb2200d1fe', 'eNLAIwCaK_g:APA91bE4Mc8FIyoi1SFjrbBCUHIWc6Fqv1MXuk0AT4nvEdGe_BIYvED-ljTyxOup04FrFuAfBlKgpA31F_MczHCxSGaF9dTVxZjoziP4x5q5lQ94LfMfaUwC3DVA0iuRZ_SUc0pxBvqs', 2667, '2019-10-12 18:12:41', '2019-10-12 18:12:41', 1),
(270, '8153004388', '', 'e7294d9d5e866b906722daa6138954ad', 'cXlvmo4ujIY:APA91bGQZVjbNmgUBscbykvhz3Q4NCA7e4nst_6oUyT1browXOML7_n26ZxgxwJ5mp54vLwrKXolLLHppy9xdtokxNulMgtNUi5gwUlBHySVDDMjxRtimg6zBHLYxNau7uS2u-riWJRW', 3057, '2019-11-04 14:23:28', '2019-11-04 14:23:28', 1),
(271, '8983462134', '', '45f0d27e00e9db63800e78bbb98177e3', 'cXlvmo4ujIY:APA91bGQZVjbNmgUBscbykvhz3Q4NCA7e4nst_6oUyT1browXOML7_n26ZxgxwJ5mp54vLwrKXolLLHppy9xdtokxNulMgtNUi5gwUlBHySVDDMjxRtimg6zBHLYxNau7uS2u-riWJRW', 3341, '2019-11-11 20:40:15', '2019-11-11 20:40:15', 1),
(272, '8153004388', '', 'afaaa11e7828944e33c956817b76fdaa', 'd6xL0VHFCCo:APA91bF8T65-MHnr7HRD1ZHzRGGQepR5sJ-UrUagBU1k7YmQC6d22HXpB8c1TCqn9vHI_BLbeDM9vnR80xfX-a07pn-qHYgRgNJw5uFK4TQrhHp56ZnDkvJzlF4cryembUqMjTd5ijXo', 2260, '2019-11-11 20:47:07', '2019-11-11 20:47:07', 1),
(273, '8983462134', '', '69a1536a62d547853544c98bbd0c27e3', 'fho_NA1niOo:APA91bHDoMSGVXfDFPRXJrfvsuBjVqagKyvIIsOeji5YwLqQpDiiosFHpjI4pfLELsa4feITOQhWRmLg9sdy9AL7QjrrGfYCmluF94MUT5huZ4LJC4_tgX-RLn-RomAM-8j0ZGULkGmQ', 7431, '2019-11-17 10:46:50', '2019-11-17 10:46:50', 1),
(274, '8983462134', '', 'd601003a7c68c854bd7390415978975c', 'dCOIF4RpPb0:APA91bGTtJ6s-LfbtE6XYI4BtOB2BhWZmY6vR5hRZrKHuFtoSCl9Ew1kw6Lt5CbNDHI4KYTSISVfVd7zfeA6GiZFY9ATfD1kNWvAngljNGPuEnbSb75CqD0_J5WIPupO7_50jJ0WHvc9', 6040, '2019-11-17 11:27:03', '2019-11-17 11:27:03', 0),
(275, '8983462134', '', '98d2206b4df3ca7e360119a9fc8c0c5d', 'dCOIF4RpPb0:APA91bGTtJ6s-LfbtE6XYI4BtOB2BhWZmY6vR5hRZrKHuFtoSCl9Ew1kw6Lt5CbNDHI4KYTSISVfVd7zfeA6GiZFY9ATfD1kNWvAngljNGPuEnbSb75CqD0_J5WIPupO7_50jJ0WHvc9', 3922, '2019-11-17 11:32:21', '2019-11-17 11:32:21', 0),
(276, '8153004388', '', 'dc68c4db5f343afe21d22d58aba939d4', 'cXlvmo4ujIY:APA91bGQZVjbNmgUBscbykvhz3Q4NCA7e4nst_6oUyT1browXOML7_n26ZxgxwJ5mp54vLwrKXolLLHppy9xdtokxNulMgtNUi5gwUlBHySVDDMjxRtimg6zBHLYxNau7uS2u-riWJRW', 2279, '2019-11-20 13:49:45', '2019-11-20 13:49:45', 1),
(277, '8983462134', '', 'b57f0d7551934746f2f83512ead9eb91', 'cXlvmo4ujIY:APA91bGQZVjbNmgUBscbykvhz3Q4NCA7e4nst_6oUyT1browXOML7_n26ZxgxwJ5mp54vLwrKXolLLHppy9xdtokxNulMgtNUi5gwUlBHySVDDMjxRtimg6zBHLYxNau7uS2u-riWJRW', 6839, '2019-11-20 14:00:13', '2019-11-20 14:00:13', 1),
(278, '8153997112', '', '82a58c53010b51b4e5a50763591f5c7e', 'coXvXvO2hpQ:APA91bHGetf3dCb3fZzG3c0KlLlWwRX2ZbrtmqCPsoOAbKFa6AowKUboeWeAEVkkRGqMzV3jy4RzV1vQ4kW0qyo3WU2EDFrUTlKLWuU60lmmX-8vr6zJvLgLtLKEf3SF88oQKY66GQ8R', 5244, '2019-11-20 14:04:36', '2019-11-20 14:04:36', 1),
(279, '8983462134', '', 'bc368974c0ed634c351bac5123f006c2', 'fho_NA1niOo:APA91bHDoMSGVXfDFPRXJrfvsuBjVqagKyvIIsOeji5YwLqQpDiiosFHpjI4pfLELsa4feITOQhWRmLg9sdy9AL7QjrrGfYCmluF94MUT5huZ4LJC4_tgX-RLn-RomAM-8j0ZGULkGmQ', 5595, '2019-11-20 14:18:44', '2019-11-20 14:18:44', 1),
(280, '8983462134', '', '4df58fa08e297debce8774c303fa6310', 'dCOIF4RpPb0:APA91bGTtJ6s-LfbtE6XYI4BtOB2BhWZmY6vR5hRZrKHuFtoSCl9Ew1kw6Lt5CbNDHI4KYTSISVfVd7zfeA6GiZFY9ATfD1kNWvAngljNGPuEnbSb75CqD0_J5WIPupO7_50jJ0WHvc9', 3378, '2019-11-20 20:23:25', '2019-11-20 20:23:25', 1),
(281, '8983462134', '', '6e9fa0ba1fa8bef101d5b23f5ddfcd82', 'fho_NA1niOo:APA91bHDoMSGVXfDFPRXJrfvsuBjVqagKyvIIsOeji5YwLqQpDiiosFHpjI4pfLELsa4feITOQhWRmLg9sdy9AL7QjrrGfYCmluF94MUT5huZ4LJC4_tgX-RLn-RomAM-8j0ZGULkGmQ', 3589, '2019-11-21 12:46:49', '2019-11-21 12:46:49', 1),
(282, '8153004388', '', '26d52283bcb1cbf9aa664ed802af57c4', 'token', 9759, '2020-02-03 20:39:48', '2020-02-03 20:39:48', 0),
(283, '8153004388', '', '473e5844b843e537030c25a53d0d80ad', 'token', 8332, '2020-02-03 20:58:58', '2020-02-03 20:58:58', 0),
(284, '8153004388', '', '37c30d8347272f33f92c284c12bd21b1', 'token', 2730, '2020-02-03 20:59:54', '2020-02-03 20:59:54', 0),
(285, '8153004388', '', '4f891c4d7395b40b60376e9295572ab8', 'token', 7599, '2020-02-03 21:01:52', '2020-02-03 21:01:52', 0),
(286, '1234567890', '', '3bce86ad99d07d852bb8116bae18c39d', 'token', 1286, '2020-02-03 22:23:08', '2020-02-03 22:23:08', 0),
(287, '1234567890', '', 'ad2723e10923d5ae8ba45f0533465d7b', 'token', 7147, '2020-02-03 22:24:12', '2020-02-03 22:24:12', 0),
(288, '9876543210', '', 'c291dc785bc309aa79c1a1137b126cbc', 'token', 2705, '2020-02-03 22:33:34', '2020-02-03 22:33:34', 0),
(289, '8153004388', '', 'a0feabf7241aa36cdbe1581de8446c3b', 'token', 6747, '2020-02-03 22:40:08', '2020-02-03 22:40:08', 0),
(290, '8153004388', '', 'd5d4d96fd572fa1be04be7c1556bafce', 'token', 4523, '2020-02-03 22:47:07', '2020-02-03 22:47:07', 0),
(291, '8153004388', '', 'b1e2290c11ceadfe5e11342e52f06e8a', 'token', 7388, '2020-02-03 22:48:44', '2020-02-03 22:48:44', 0),
(292, '8153004388', '', '4c0a8d7ed573c73f7a347e67d5b3f430', 'token', 7244, '2020-02-03 22:51:10', '2020-02-03 22:51:10', 0),
(293, '9857634234', '', 'bdde048b6241908439fbdb3d4d5c91d6', 'token', 6813, '2020-02-03 22:52:49', '2020-02-03 22:52:49', 0),
(294, '9856743267', '', '6c0d7b5af81543932803409521ae88c6', 'token', 7231, '2020-02-03 22:55:12', '2020-02-03 22:55:12', 0),
(295, '8153004388', '', '96af7deb1ce6b8cc409ab9dbff43265a', 'token', 7382, '2020-02-06 20:58:47', '2020-02-06 20:58:47', 0),
(296, '8153004388', '', '4386728c8927c8f5c98aa40aa19fb3fa', 'd4h96rmaZ7A:APA91bFiUXf4dYw98bMDsaPdrcp8Cz2Oe3-DfleybRfz8MXl_WyKRWJvkWVa9S8_sIGvZL4XAszGlppNkuBMhE1uphjoLgvvhpwlhsynO2H7ODSKB-RLPBWwumNIERc9oZcQ81MDLzQp', 5647, '2020-02-07 15:34:27', '2020-02-07 15:34:27', 0),
(297, '8153004388', '', '01f3866f86d9a266162a47bbdc961ffa', 'd4h96rmaZ7A:APA91bFiUXf4dYw98bMDsaPdrcp8Cz2Oe3-DfleybRfz8MXl_WyKRWJvkWVa9S8_sIGvZL4XAszGlppNkuBMhE1uphjoLgvvhpwlhsynO2H7ODSKB-RLPBWwumNIERc9oZcQ81MDLzQp', 3233, '2020-02-07 15:35:25', '2020-02-07 15:35:25', 0),
(298, '8153004388', '', '5135c3f816029849703e2a2bf33f40ac', 'd4h96rmaZ7A:APA91bFiUXf4dYw98bMDsaPdrcp8Cz2Oe3-DfleybRfz8MXl_WyKRWJvkWVa9S8_sIGvZL4XAszGlppNkuBMhE1uphjoLgvvhpwlhsynO2H7ODSKB-RLPBWwumNIERc9oZcQ81MDLzQp', 6236, '2020-02-07 15:36:36', '2020-02-07 15:36:36', 0),
(299, '8153004388', '', '0ac0867d68f755091ffde565b2edbab2', 'd4h96rmaZ7A:APA91bFiUXf4dYw98bMDsaPdrcp8Cz2Oe3-DfleybRfz8MXl_WyKRWJvkWVa9S8_sIGvZL4XAszGlppNkuBMhE1uphjoLgvvhpwlhsynO2H7ODSKB-RLPBWwumNIERc9oZcQ81MDLzQp', 1679, '2020-02-07 15:37:58', '2020-02-07 15:37:58', 0),
(300, '8153004388', '', '578e1fb5e5631361163628be189b648b', 'd4h96rmaZ7A:APA91bFiUXf4dYw98bMDsaPdrcp8Cz2Oe3-DfleybRfz8MXl_WyKRWJvkWVa9S8_sIGvZL4XAszGlppNkuBMhE1uphjoLgvvhpwlhsynO2H7ODSKB-RLPBWwumNIERc9oZcQ81MDLzQp', 3373, '2020-02-07 15:40:27', '2020-02-07 15:40:27', 1),
(301, '8153004388', '', '8c49c7d274a532392731127b37b7d380', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 3206, '2020-02-09 09:55:59', '2020-02-09 09:55:59', 0),
(302, '8153004388', '', 'd8b811eeaa3fb39b5fde4871fe46a9a1', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 7611, '2020-02-09 09:56:10', '2020-02-09 09:56:10', 0),
(303, '8153004388', '', '62bc2d8dc0c2ef1f2c2cc3e78cd1646e', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 9263, '2020-02-09 10:00:50', '2020-02-09 10:00:50', 0),
(304, '8153004388', '', '6cf0f660f30d0747b314a0779753be88', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 5995, '2020-02-09 10:03:02', '2020-02-09 10:03:02', 0),
(305, '8153004388', '', 'b22a2797563c823e28f99deeb0567a9e', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 7292, '2020-02-09 10:03:43', '2020-02-09 10:03:43', 0),
(306, '8153004388', '', '8028874e687d9814553e64d5d69e20d0', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 9817, '2020-02-09 10:04:20', '2020-02-09 10:04:20', 0),
(307, '8153004388', '', '511ac07fb02471d832331600f7b095c8', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 6028, '2020-02-09 10:05:03', '2020-02-09 10:05:03', 0),
(308, '8153004388', '', '42e452cfd07dee23c84d3b7758dc7bdd', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 6017, '2020-02-09 10:07:40', '2020-02-09 10:07:40', 1),
(309, '9979264387', '', 'a8df946d0baacb8a5e684d26949ce68c', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 2906, '2020-02-09 10:23:13', '2020-02-09 10:23:13', 1),
(310, '8153997112', '', '47c44f02292083a1f4918d7dbb43ad28', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', 1452, '2020-02-09 11:55:24', '2020-02-09 11:55:24', 1),
(311, '8153997112', '', '5724a8b355c9fbdf205bf9c2a6778f1a', 'cGShRQa6vV4:APA91bHDqeT0AY6f_eZcuy-LwTVTmF1PwkKRPjxu7fRkCnoAtWunEx2WgiFVT7KmIvy2kP4MAgN2OGj3vS8z-PRP7M3zsIRRpT0TCMtj2BOeiDzKSdtuayE7spZbOHBXnRNhoog7pvVP', 4755, '2020-02-09 15:43:06', '2020-02-09 15:43:06', 1),
(312, '1242436047', '', '8652dfc8a78d178fb9d3184684c98521', 'fsjB1mjaRBU:APA91bFCogAQiFE34vFnd6hV2D8yYqF7RW9Rv8Nhvde5MZ18viMPsg1SmFajuDYnG97_9hDwh8xdOgeEjnbzxRMXZPn-0nhKV7_0gJhDuXmA4RPjn_16A_KuaeJwP_RUeR-ghZH0pRNC', 9431, '2020-02-09 19:43:46', '2020-02-09 19:43:46', 1),
(313, '1242448244', '', 'a4caacdb0d59a7c6c47397d447fad8b4', 'fFQVA_pRK_0:APA91bGybhvfHQ3ee1Urk8V0QKcTwWRKJloOASWaH9lkWmyQ-utE-Bp3moAUOYPKfhtgl3RyiCz5oepFCbL8TnhdPIPwM_1iL94wV8R4-PZ1ZuBs6XLS2Tp-xLXoP6SO01Mg20rXopsC', 6539, '2020-02-09 19:43:49', '2020-02-09 19:43:49', 0),
(314, '2424482448', '', '954632ba6233ae3015b2e1a65c92c629', 'fFQVA_pRK_0:APA91bGybhvfHQ3ee1Urk8V0QKcTwWRKJloOASWaH9lkWmyQ-utE-Bp3moAUOYPKfhtgl3RyiCz5oepFCbL8TnhdPIPwM_1iL94wV8R4-PZ1ZuBs6XLS2Tp-xLXoP6SO01Mg20rXopsC', 4761, '2020-02-09 19:44:24', '2020-02-09 19:44:24', 0),
(315, '2424482448', '', 'e00760c09366abde979dfecad461460a', 'fFQVA_pRK_0:APA91bGybhvfHQ3ee1Urk8V0QKcTwWRKJloOASWaH9lkWmyQ-utE-Bp3moAUOYPKfhtgl3RyiCz5oepFCbL8TnhdPIPwM_1iL94wV8R4-PZ1ZuBs6XLS2Tp-xLXoP6SO01Mg20rXopsC', 7478, '2020-02-09 19:45:07', '2020-02-09 19:45:07', 1),
(316, '8280505', '', '5106c7ceaced9cf279fe3ece8aeff20a', 'cc7nQxSQCoQ:APA91bGuGnvHI-RoTSUpeO-3GUmGW4CxCQmrZJorVGl2LPNtuAaR0Uy-E2Fi3YSn_ofWuejYJNWXmdhqzba4-T-b8L5gSpyZSQ9Zx3RPjmeUw9R4Ac_o9hQ9xIv3z8h2oK-fOpq39GTR', 9013, '2020-02-09 19:49:37', '2020-02-09 19:49:37', 0),
(317, '8280505', '', '1e4a9621a981aa24a202835cc5d29e2c', 'cc7nQxSQCoQ:APA91bGuGnvHI-RoTSUpeO-3GUmGW4CxCQmrZJorVGl2LPNtuAaR0Uy-E2Fi3YSn_ofWuejYJNWXmdhqzba4-T-b8L5gSpyZSQ9Zx3RPjmeUw9R4Ac_o9hQ9xIv3z8h2oK-fOpq39GTR', 8279, '2020-02-09 19:51:10', '2020-02-09 19:51:10', 0),
(318, '2424360479', '', '1e4a9621a981aa24a202835cc5d29e2c', 'c3kgVMEUGuA:APA91bEfW7p0F1T_-zcjRDCboDAVwFfQtQI3CXo8iKNtAv4_uJAvF77iV3XMLB13Q9_JoYV4jbzftrhr0-IEJ0Vd9yylwKbK81aSCicF3VeBW_H3tHcaxw-tUESpXr2wJmJZH3PrndgQ', 5274, '2020-02-09 19:51:10', '2020-02-09 19:51:10', 0),
(319, '2428280505', '', '067fa0a0e98ea3234621b79cbef740b2', 'cc7nQxSQCoQ:APA91bGuGnvHI-RoTSUpeO-3GUmGW4CxCQmrZJorVGl2LPNtuAaR0Uy-E2Fi3YSn_ofWuejYJNWXmdhqzba4-T-b8L5gSpyZSQ9Zx3RPjmeUw9R4Ac_o9hQ9xIv3z8h2oK-fOpq39GTR', 7182, '2020-02-09 20:00:22', '2020-02-09 20:00:22', 1),
(320, '8153004388', '', '8b76a34b7df8ac6ad2d3457e56c67eb8', 'ff7a4yKbj1w:APA91bEn7SwiKmjqQKUiOjN8Z3nxE8d9vd2zhbWWTUPPgZwARoHwvRFlmYMf_29DICeGHTbpVvQA1smwQKv8M2vlFYVNJHssRVR5ehQIjSiQ39GNLjVQSJiAHd_tJLdi3e-q0Paulv98', 6689, '2020-02-12 10:00:46', '2020-02-12 10:00:46', 1),
(321, '7037260700', '', 'b6a74ec60f911c98c7453693d7d956ee', 'dEV1LQ23iLc:APA91bGw-Vqo3AsP0B5KEbdL-z6ui1jLdHTNBZaRTwTJOQdGc2kMwiMknOPnBIHExAdQV8R5eMxNasfyS4boKf31RDL09I99wVAKOYHCf9sceyGbDOHQcnRzNGsiiAqCeqlDS2-aCbKC', 7531, '2020-02-12 12:48:01', '2020-02-12 12:48:01', 0),
(322, '2424360479', '', '341521092c2b273a85c132aefd13e678', 'eOcdxHUiE1s:APA91bHl9ZzqICumwJ-HSB9F9np6gk7ExLUvSR_A2vYyISyBVASNdYicxmWEYnrmt9OM80tELYT6YmT8JMlxkAv3RmgCQrQEtsI0J9YEIkzmA419_QsIdhFy9cJVdYaoJ-cCb0Oa6raL', 3531, '2020-02-15 07:56:38', '2020-02-15 07:56:38', 1),
(323, '8153004388', '', '51832426fbe4b03dee5560910d01ce4e', 'token', 6982, '2020-02-15 10:50:05', '2020-02-15 10:50:05', 0),
(324, '8153004388', '', 'ee4e5c565dd510a8c55e151786d24068', 'er9TixjmhR8:APA91bHSPUk_Tt_goUpsTWvNknX8O3xdItkZthvIaXFZV3atVJ1NXBBHr_CVp9FXG-h_F5wtiO3DF7ITrYlNxzqC4esjCIYpKteZfa_2MVS5GvBiAfgACmXAF6iVyTHNdFqLMYrvXSsO', 3513, '2020-02-15 10:50:37', '2020-02-15 10:50:37', 1),
(325, '1345328640', '', '177a73e5745d2f315988632e71b4c0a3', 'dqG4vHVojnQ:APA91bEvfMe_l6f0yHsJe1pDXHrwbUsR7WYL_whhc5t0SUKkfp8IbHrwouXKt1DgQFE6ly6xoeUOIwBPMcdVy94prqJijOV20sYz3wg9F5tQzMK93Oih3wkB67c9RjiH6sYNw2v2DAbw', 6699, '2020-02-18 08:28:50', '2020-02-18 08:28:50', 0),
(326, '3453286408', '', 'bc6df0515f85198b91b3441eaede8e1a', 'dqG4vHVojnQ:APA91bEvfMe_l6f0yHsJe1pDXHrwbUsR7WYL_whhc5t0SUKkfp8IbHrwouXKt1DgQFE6ly6xoeUOIwBPMcdVy94prqJijOV20sYz3wg9F5tQzMK93Oih3wkB67c9RjiH6sYNw2v2DAbw', 3736, '2020-02-18 08:30:06', '2020-02-18 08:30:06', 0),
(327, '3453286408', '', 'aaa3d20ba26453605964de5924763b86', 'dqG4vHVojnQ:APA91bEvfMe_l6f0yHsJe1pDXHrwbUsR7WYL_whhc5t0SUKkfp8IbHrwouXKt1DgQFE6ly6xoeUOIwBPMcdVy94prqJijOV20sYz3wg9F5tQzMK93Oih3wkB67c9RjiH6sYNw2v2DAbw', 8640, '2020-02-18 08:32:58', '2020-02-18 08:32:58', 1),
(328, '2424338740', '', 'e4e856d21e7cb48c7b07b0353c36ec13', 'etOsTl-MMxA:APA91bFEZ9MmIug7EnwbTwQER1sub8qsqZavcH4W0aycuslhhFARxMYNko4Vs6HVO9GVmOHNHxNlUSSyt6vDt7YzmBW9gBM2IXboKTe7htCUbjQWvUWh_l09eIP6N66Bh-rQA0r2VYm4', 9959, '2020-02-19 02:18:53', '2020-02-19 02:18:53', 1),
(329, '2424655711', '', '5e88857414943c48d8675929f5070873', 'fZAw6GeSTXs:APA91bEGNTrabyGI_bdr40beUn1T8l6AJ24YZTrs-oY3Hf4pb7lgtnJAgSc4Q86ya1p9A--iQFbKM3Tp6zKfrbz7D5lmB5b9BQ-BRzR2CX-TOct3wHL_oinnFHEJgkzqvxn5ITqvNu35', 6561, '2020-02-19 02:21:36', '2020-02-19 02:21:36', 1),
(330, '8153004388', '', 'df426da95ed5178324095fd6f7beabbd', 'ff7a4yKbj1w:APA91bEn7SwiKmjqQKUiOjN8Z3nxE8d9vd2zhbWWTUPPgZwARoHwvRFlmYMf_29DICeGHTbpVvQA1smwQKv8M2vlFYVNJHssRVR5ehQIjSiQ39GNLjVQSJiAHd_tJLdi3e-q0Paulv98', 8461, '2020-02-20 09:37:54', '2020-02-20 09:37:54', 1),
(331, '1112223334', '91', 'a7f989a42313d889a22d392143a6121a', 'coXvXvO2hpQ:APA91bHGetf3dCb3fZzG3c0KlLlWwRX2ZbrtmqCPsoOAbKFa6AowKUboeWeAEVkkRGqMzV3jy4RzV1vQ4kW0qyo3WU2EDFrUTlKLWuU60lmmX-8vr6zJvLgLtLKEf3SF88oQKY66GQ8R', 4961, '2020-02-23 22:06:21', '2020-02-23 22:06:21', 0),
(332, '1112223334', '91', 'c0c1912f7757d9833d394dfe28d9e39c', 'coXvXvO2hpQ:APA91bHGetf3dCb3fZzG3c0KlLlWwRX2ZbrtmqCPsoOAbKFa6AowKUboeWeAEVkkRGqMzV3jy4RzV1vQ4kW0qyo3WU2EDFrUTlKLWuU60lmmX-8vr6zJvLgLtLKEf3SF88oQKY66GQ8R', 4638, '2020-02-23 22:16:54', '2020-02-23 22:16:54', 0),
(333, '8153004388', '91', '8c325129067c33f90c6a5d6478b5f728', 'ff7a4yKbj1w:APA91bEn7SwiKmjqQKUiOjN8Z3nxE8d9vd2zhbWWTUPPgZwARoHwvRFlmYMf_29DICeGHTbpVvQA1smwQKv8M2vlFYVNJHssRVR5ehQIjSiQ39GNLjVQSJiAHd_tJLdi3e-q0Paulv98', 1332, '2020-02-24 13:47:44', '2020-02-24 13:47:44', 1),
(334, '8153997112', '91', 'a0c6c58f52abbbc3c4686764bf3d0d11', 'dE6DeBW43Oo:APA91bHaGsid7QN6riQ2qCqiojl6M1sP8_Pvkj1EPYdmqmLLJs7-wBnIgaktHRYJqfsmviWzuvdjhMlAIfq2HHvn_O4J_RC_-vjOw3ClSM7CzhgH92BgBnovu6d0NNAgKvsU2bm0eAlO', 7067, '2020-02-24 21:49:45', '2020-02-24 21:49:45', 1),
(335, '5416424646', '1', 'bf1e54d27d99156714fb4fb819080ea8', 'dZ0XASreeJk:APA91bEqR_xloIMR5TPviagtHzoUF8HM76NPIt64v6DUrlprgRaos2_2_zWy6iPmuBPI2SsyQ4fz-QjFsIbR0VfN7wlXKF-YOSFkDfMfruphTUn65l3g3hbW1P44vA5j8VNBJL4hvfhV', 4665, '2020-02-25 17:04:30', '2020-02-25 17:04:30', 0),
(336, '8983462134', '91', 'dcdec3e84a32ad51e1ba2a69c6c4f682', 'dZ0XASreeJk:APA91bEqR_xloIMR5TPviagtHzoUF8HM76NPIt64v6DUrlprgRaos2_2_zWy6iPmuBPI2SsyQ4fz-QjFsIbR0VfN7wlXKF-YOSFkDfMfruphTUn65l3g3hbW1P44vA5j8VNBJL4hvfhV', 6795, '2020-02-25 17:06:56', '2020-02-25 17:06:56', 1),
(337, '8153004388', '91', '40ebf6949b61e09618f3a50a0bf0a166', 'eF0YIf9okmY:APA91bHrnlGHpgdWyI8Ff4nvKQA0-Rnsd8k6mcs8zTK-CGGyI-leqqj56nl9MgIql9d0YmUy_TylT6BwX5H9q3oDZTZ77ew60U5FI1_-IW6Tj2EmoOz6NhT-QGnk6aPhc7xmSeJ3sn0I', 7461, '2020-02-25 20:14:53', '2020-02-25 20:14:53', 1),
(338, '8983462134', '1', 'fb5fcb08369c1ed60e901fe4ac5e58e7', 'dZ0XASreeJk:APA91bEqR_xloIMR5TPviagtHzoUF8HM76NPIt64v6DUrlprgRaos2_2_zWy6iPmuBPI2SsyQ4fz-QjFsIbR0VfN7wlXKF-YOSFkDfMfruphTUn65l3g3hbW1P44vA5j8VNBJL4hvfhV', 7773, '2020-02-25 20:50:09', '2020-02-25 20:50:09', 0),
(339, '8153004388', '', '5af7d9661da7f11e6d352a953c5d7737', 'token', 1329, '2020-02-25 20:57:11', '2020-02-25 20:57:11', 0),
(340, '2424360479', '1', '8718c7dfb0e5a4293894c48cf9d282d4', 'cM1HWszRR9k:APA91bGj649tEdL6oENxDHwWQM8XdZlOLfC-NPscehVZ1Zg_FgpY9T0xD6c7e4GaZWmebbBSvqeLjb4W0srZLzgSTt_1Yp0p-qbFoQRRBVLfejlBlJhq4ZOqhWPBvaV5W7Uiiixa_U_5', 4684, '2020-02-25 21:00:06', '2020-02-25 21:00:06', 1),
(341, '2424482448', '1', '41f43eaedc452b2b8afcad133493aa03', 'fxZ7b12NyG8:APA91bGlTl9iEK6reRxRUMkQDv9RA5I5auDGH0r5AVB-tyyyhMezdkATkx9l1Gx-kHa0aTkU3Wb1PRABvD_HP3YpdHJFSm4FdWaVVJQL6pasYdo2OCZeNcu0MmcyPLtdG2UuMt9E7wGB', 5072, '2020-02-25 22:36:33', '2020-02-25 22:36:33', 1),
(342, '8280505', '1', 'cbf2c2afed2a4b3b7edee7538c8e8462', 'eTWp1cgQcvQ:APA91bFFwAluBQ_HZz0x4NvjYu41oHf1oaxZhZwWmLmF7-wJSjacyImXiqvZ09jA1iCUlWTKCUywI2Acmsj7pgyr-xexAub3OO9ukdFSVPtO7kX_Mc-WGvrWV372SSfH9tH-SdlKrOpb', 8192, '2020-02-25 23:20:05', '2020-02-25 23:20:05', 0),
(343, '2428280505', '1', '865c576a07f213647d55048ce44beb6f', 'eTWp1cgQcvQ:APA91bFFwAluBQ_HZz0x4NvjYu41oHf1oaxZhZwWmLmF7-wJSjacyImXiqvZ09jA1iCUlWTKCUywI2Acmsj7pgyr-xexAub3OO9ukdFSVPtO7kX_Mc-WGvrWV372SSfH9tH-SdlKrOpb', 7129, '2020-02-25 23:21:25', '2020-02-25 23:21:25', 1),
(344, '8153004388', '91', '8a47370db1f8f9d86120fa5fb6da0c70', 'ff7a4yKbj1w:APA91bEn7SwiKmjqQKUiOjN8Z3nxE8d9vd2zhbWWTUPPgZwARoHwvRFlmYMf_29DICeGHTbpVvQA1smwQKv8M2vlFYVNJHssRVR5ehQIjSiQ39GNLjVQSJiAHd_tJLdi3e-q0Paulv98', 1846, '2020-02-26 10:53:55', '2020-02-26 10:53:55', 0),
(345, '8153004388', '91', '27b10570a13bf6aa280a674cfe8ef382', 'ff7a4yKbj1w:APA91bEn7SwiKmjqQKUiOjN8Z3nxE8d9vd2zhbWWTUPPgZwARoHwvRFlmYMf_29DICeGHTbpVvQA1smwQKv8M2vlFYVNJHssRVR5ehQIjSiQ39GNLjVQSJiAHd_tJLdi3e-q0Paulv98', 1250, '2020-02-26 10:54:44', '2020-02-26 10:54:44', 1),
(346, '9970393889', '91', '01b24b92997d9cb736bf8a325e5c2127', 'duZ6VS-waMI:APA91bHXVziVUtqAqdOrJ5zrS0chtUsFaNR07xLo5kWbHPxtmzaX7gZEAz3Za2RsGGh1n6S--D-Gwi9AZbcgDACf3mi4wxd2sw3koTGfbEN7KIhSBXmXsqm0wvdjkqjNSjNHW5EC1XxP', 5370, '2020-02-28 21:15:00', '2020-02-28 21:15:00', 1),
(347, '8153004388', '', '20ed62b9386b62b661076a37c8a90623', 'token', 6720, '2020-03-04 21:46:49', '2020-03-04 21:46:49', 0),
(348, '8153004388', '91', 'b3f2595650f28ca19f8be4bb431dcc3a', 'fORwyYqWU8A:APA91bFFJG1QRW4jFlZhgeEWBpsReyx9_C0dPSdUvIIpeDeBLoHRQ-hDhNSpcb6i9yw4VmvtXK27Z2lZREl_yBFR14K16oDg80AjbLaSLgCLacXyrBJ5ZMQOja4ngNRUrZJ9yfTkQT4I', 8462, '2020-03-04 22:15:49', '2020-03-04 22:15:49', 1),
(349, '8153004388', '', 'e01481a63d9eaae4036c9d0b4a426d21', 'token', 1584, '2020-03-04 22:33:01', '2020-03-04 22:33:01', 0),
(350, '8153004388', '', 'db77b08c46b11264091dd2883f54fb9b', 'token', 5949, '2020-03-04 22:37:10', '2020-03-04 22:37:10', 0),
(351, '8153004388', '', '08dee041294a3ff940e29fc70afe4392', 'token', 4446, '2020-03-04 22:37:54', '2020-03-04 22:37:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `T_Payment`
--

CREATE TABLE `T_Payment` (
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_name` text,
  `payment_date` date DEFAULT NULL,
  `payment_time` time NOT NULL,
  `payment_status` int(20) NOT NULL DEFAULT '2',
  `points` varchar(50) DEFAULT NULL,
  `credits` varchar(50) DEFAULT NULL,
  `payment_id` int(20) NOT NULL,
  `store_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Payment`
--

INSERT INTO `T_Payment` (`created_date`, `last_updated_date`, `payment_name`, `payment_date`, `payment_time`, `payment_status`, `points`, `credits`, `payment_id`, `store_id`) VALUES
('2018-09-26 06:31:23', '2018-09-26 06:31:35', '', '2018-09-26', '12:01:23', 10, '12', '3', 1, 8),
('2018-10-31 09:12:30', '2018-10-31 09:12:51', '', '2018-10-31', '14:42:30', 10, '20', '5', 2, 7),
('2018-11-22 06:36:08', '2018-11-22 06:36:08', '', '2018-11-22', '12:06:08', 2, '12', '3', 3, 9),
('2019-05-24 10:54:39', '2019-05-24 10:55:10', '', '2019-05-24', '16:24:39', 10, '2000', '500', 4, 8),
('2019-05-24 10:56:14', '2019-05-24 10:56:14', '', '2019-05-24', '16:26:14', 2, '100', '25', 5, 7),
('2019-09-09 11:39:36', '2019-09-09 11:39:36', '', '2019-09-09', '17:09:36', 2, '1000', '250', 6, 8),
('2019-10-03 07:01:00', '2019-10-03 07:01:00', '', '2019-10-03', '12:31:00', 2, '20000', '5000', 7, 55);

-- --------------------------------------------------------

--
-- Table structure for table `T_PaytmRedeemRequests`
--

CREATE TABLE `T_PaytmRedeemRequests` (
  `id` int(30) NOT NULL,
  `user_id` int(40) NOT NULL,
  `no_of_rubs` int(40) DEFAULT NULL,
  `request_status` int(5) NOT NULL DEFAULT '2',
  `request_date` date NOT NULL,
  `request_time` time NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_PaytmRedeemRequests`
--

INSERT INTO `T_PaytmRedeemRequests` (`id`, `user_id`, `no_of_rubs`, `request_status`, `request_date`, `request_time`, `created_date`, `last_updated_date`) VALUES
(1, 2, 20, 10, '2018-09-24', '00:00:00', '2018-09-24 06:29:38', '2018-09-24 06:29:52'),
(2, 2, 16, 10, '2018-09-24', '00:00:00', '2018-09-24 10:10:38', '2018-09-24 10:11:11'),
(3, 3, 20, 10, '2018-09-24', '00:00:00', '2018-09-24 11:21:03', '2018-09-24 11:24:20'),
(4, 10, 4, 10, '2018-09-25', '00:00:00', '2018-09-25 11:05:48', '2018-09-25 11:06:03'),
(5, 4, 100, 10, '2018-09-26', '00:00:00', '2018-09-25 18:42:45', '2018-09-26 11:57:24'),
(6, 7, 46, 10, '2018-09-26', '00:00:00', '2018-09-26 11:04:31', '2018-09-26 11:57:39'),
(7, 6, 4, 2, '2018-09-27', '00:00:00', '2018-09-27 10:33:21', '2018-09-27 10:33:21'),
(8, 4, 40, 2, '2018-09-29', '00:00:00', '2018-09-29 16:39:20', '2018-09-29 16:39:20'),
(9, 2, 8, 10, '2018-10-04', '00:00:00', '2018-10-04 10:26:23', '2018-10-04 10:26:36'),
(10, 6, 222, 2, '2018-10-23', '00:00:00', '2018-10-23 09:56:03', '2018-10-23 09:56:03'),
(11, 19, 100, 2, '2018-12-19', '00:00:00', '2018-12-19 06:34:06', '2018-12-19 06:34:06'),
(12, 4, 500, 2, '2019-02-01', '00:00:00', '2019-02-01 09:01:29', '2019-02-01 09:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `T_RewardPoints`
--

CREATE TABLE `T_RewardPoints` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `reward_points` int(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_Rub`
--

CREATE TABLE `T_Rub` (
  `rub_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `amount` double NOT NULL,
  `rubs` int(30) NOT NULL,
  `staus` int(20) NOT NULL DEFAULT '0',
  `purchase_date` date NOT NULL,
  `purchase_time` time NOT NULL,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_SocialSharePoint`
--

CREATE TABLE `T_SocialSharePoint` (
  `social_share_point_id` int(2) NOT NULL,
  `user_id` int(20) NOT NULL,
  `store_id` int(30) DEFAULT NULL,
  `store_offer_id` int(20) NOT NULL,
  `facebook_points` int(30) DEFAULT NULL,
  `twitter_points` int(30) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `share_type` varchar(40) NOT NULL,
  `points` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_SocialSharePoint`
--

INSERT INTO `T_SocialSharePoint` (`social_share_point_id`, `user_id`, `store_id`, `store_offer_id`, `facebook_points`, `twitter_points`, `created_date`, `last_updated_date`, `share_type`, `points`) VALUES
(1, 3, 8, 1, 20, NULL, '2018-09-20 17:53:53', '2018-09-20 17:53:53', 'facebook_points', 20),
(2, 3, 9, 2, 12, NULL, '2018-09-20 18:05:26', '2018-09-20 18:05:26', 'facebook_points', 12),
(3, 2, 8, 1, 20, NULL, '2018-09-20 18:26:54', '2018-09-20 18:26:54', 'facebook_points', 20),
(4, 6, 8, 4, NULL, 20, '2018-09-21 15:50:37', '2018-09-21 15:50:37', 'twitter_points', 20),
(5, 2, 8, 7, NULL, 20, '2018-09-21 15:56:49', '2018-09-21 15:56:49', 'twitter_points', 20),
(6, 3, 8, 6, NULL, 24, '2018-09-21 16:22:01', '2018-09-21 16:22:01', 'twitter_points', 24),
(7, 2, 8, 1, NULL, 20, '2018-09-24 12:21:58', '2018-09-24 12:21:58', 'twitter_points', 20),
(8, 2, 8, 6, NULL, 24, '2018-09-24 14:37:15', '2018-09-24 14:37:15', 'twitter_points', 24),
(9, 2, 8, 6, 12, NULL, '2018-09-24 14:40:33', '2018-09-24 14:40:33', 'facebook_points', 12),
(10, 6, 7, 5, 30, NULL, '2018-09-24 14:47:40', '2018-09-24 14:47:40', 'facebook_points', 30),
(11, 2, 8, 4, NULL, 20, '2018-09-24 15:38:54', '2018-09-24 15:38:54', 'twitter_points', 20),
(12, 7, 7, 5, NULL, 24, '2018-09-24 20:10:03', '2018-09-24 20:10:03', 'twitter_points', 24),
(13, 6, 8, 1, 20, NULL, '2018-09-25 15:24:57', '2018-09-25 15:24:57', 'facebook_points', 20),
(14, 2, 19, 12, 20, NULL, '2018-09-25 15:38:52', '2018-09-25 15:38:52', 'facebook_points', 20),
(15, 6, 8, 4, 12, NULL, '2018-09-25 15:39:20', '2018-09-25 15:39:20', 'facebook_points', 12),
(16, 6, 8, 6, 12, NULL, '2018-09-25 15:39:58', '2018-09-25 15:39:58', 'facebook_points', 12),
(17, 2, 19, 12, NULL, 20, '2018-09-25 15:41:17', '2018-09-25 15:41:17', 'twitter_points', 20),
(18, 6, 8, 1, NULL, 20, '2018-09-25 15:41:25', '2018-09-25 15:41:25', 'twitter_points', 20),
(19, 3, 7, 5, 30, NULL, '2018-09-25 16:01:09', '2018-09-25 16:01:09', 'facebook_points', 30),
(20, 3, 7, 5, NULL, 24, '2018-09-25 16:01:35', '2018-09-25 16:01:35', 'twitter_points', 24),
(21, 3, 8, 7, NULL, 20, '2018-09-25 16:02:17', '2018-09-25 16:02:17', 'twitter_points', 20),
(22, 3, 8, 4, NULL, 20, '2018-09-25 16:02:54', '2018-09-25 16:02:54', 'twitter_points', 20),
(23, 3, 8, 1, NULL, 20, '2018-09-25 16:03:24', '2018-09-25 16:03:24', 'twitter_points', 20),
(24, 3, 19, 12, NULL, 20, '2018-09-25 16:04:26', '2018-09-25 16:04:26', 'twitter_points', 20),
(25, 3, 14, 13, 20, NULL, '2018-09-25 16:09:56', '2018-09-25 16:09:56', 'facebook_points', 20),
(26, 2, 7, 5, 30, NULL, '2018-09-25 16:13:11', '2018-09-25 16:13:11', 'facebook_points', 30),
(27, 6, 7, 5, NULL, 24, '2018-09-25 16:15:02', '2018-09-25 16:15:02', 'twitter_points', 24),
(28, 6, 9, 3, 12, NULL, '2018-09-25 16:17:40', '2018-09-25 16:17:40', 'facebook_points', 12),
(29, 10, 8, 7, 12, NULL, '2018-09-25 16:22:56', '2018-09-25 16:22:56', 'facebook_points', 12),
(30, 6, 9, 2, NULL, 12, '2018-09-25 16:30:51', '2018-09-25 16:30:51', 'twitter_points', 12),
(31, 3, 12, 9, 12, NULL, '2018-09-25 16:30:53', '2018-09-25 16:30:53', 'facebook_points', 12),
(32, 4, 7, 5, NULL, 24, '2018-09-26 00:05:30', '2018-09-26 00:05:30', 'twitter_points', 24),
(33, 4, 7, 5, 30, NULL, '2018-09-26 00:08:21', '2018-09-26 00:08:21', 'facebook_points', 30),
(34, 4, 9, 2, 12, NULL, '2018-09-26 12:04:42', '2018-09-26 12:04:42', 'facebook_points', 12),
(35, 7, 8, 1, NULL, 20, '2018-09-26 16:50:56', '2018-09-26 16:50:56', 'twitter_points', 20),
(36, 4, 10, 14, NULL, 4, '2018-09-26 20:30:58', '2018-09-26 20:30:58', 'twitter_points', 4),
(37, 4, 10, 14, 8, NULL, '2018-09-29 21:45:12', '2018-09-29 21:45:12', 'facebook_points', 8),
(38, 2, 8, 4, 12, NULL, '2018-10-01 12:26:33', '2018-10-01 12:26:33', 'facebook_points', 12),
(39, 2, 8, 17, 16, NULL, '2018-10-02 17:54:25', '2018-10-02 17:54:25', 'facebook_points', 16),
(40, 2, 8, 17, NULL, 8, '2018-10-02 17:54:58', '2018-10-02 17:54:58', 'twitter_points', 8),
(41, 4, 8, 17, 16, NULL, '2018-10-02 17:57:01', '2018-10-02 17:57:01', 'facebook_points', 16),
(42, 4, 8, 17, NULL, 8, '2018-10-02 17:58:13', '2018-10-02 17:58:13', 'twitter_points', 8),
(43, 3, 8, 17, 16, NULL, '2018-10-02 17:58:17', '2018-10-02 17:58:17', 'facebook_points', 16),
(44, 3, 8, 17, NULL, 8, '2018-10-02 17:58:32', '2018-10-02 17:58:32', 'twitter_points', 8),
(45, 6, 8, 17, NULL, 8, '2018-10-02 18:00:29', '2018-10-02 18:00:29', 'twitter_points', 8),
(46, 10, 8, 17, NULL, 8, '2018-10-02 18:04:21', '2018-10-02 18:04:21', 'twitter_points', 8),
(47, 8, 8, 17, NULL, 8, '2018-10-02 18:08:41', '2018-10-02 18:08:41', 'twitter_points', 8),
(48, 2, 14, 13, 20, NULL, '2018-10-04 15:22:01', '2018-10-04 15:22:01', 'facebook_points', 20),
(49, 4, 8, 7, 12, NULL, '2018-10-06 22:07:22', '2018-10-06 22:07:22', 'facebook_points', 12),
(50, 4, 8, 7, NULL, 20, '2018-10-06 22:07:42', '2018-10-06 22:07:42', 'twitter_points', 20),
(51, 4, 7, 19, 12, NULL, '2018-10-06 22:09:39', '2018-10-06 22:09:39', 'facebook_points', 12),
(52, 4, 7, 19, NULL, 4, '2018-10-06 22:09:56', '2018-10-06 22:09:56', 'twitter_points', 4),
(53, 17, 20, 16, 10, NULL, '2018-10-07 12:32:50', '2018-10-07 12:32:50', 'facebook_points', 10),
(54, 4, 14, 13, 20, NULL, '2018-10-07 12:42:38', '2018-10-07 12:42:38', 'facebook_points', 20),
(55, 4, 14, 13, NULL, 20, '2018-10-07 12:43:39', '2018-10-07 12:43:39', 'twitter_points', 20),
(56, 2, 7, 5, NULL, 24, '2018-10-08 14:50:02', '2018-10-08 14:50:02', 'twitter_points', 24),
(57, 2, 7, 19, 12, NULL, '2018-10-09 11:34:43', '2018-10-09 11:34:43', 'facebook_points', 12),
(58, 2, 7, 19, NULL, 4, '2018-10-09 11:35:02', '2018-10-09 11:35:02', 'twitter_points', 4),
(59, 2, 7, 20, 40, NULL, '2018-10-09 11:35:12', '2018-10-09 11:35:12', 'facebook_points', 40),
(60, 2, 7, 20, NULL, 40, '2018-10-09 11:35:22', '2018-10-09 11:35:22', 'twitter_points', 40),
(61, 2, 7, 21, 40, NULL, '2018-10-09 11:35:31', '2018-10-09 11:35:31', 'facebook_points', 40),
(62, 2, 7, 21, NULL, 40, '2018-10-09 11:35:44', '2018-10-09 11:35:44', 'twitter_points', 40),
(63, 2, 7, 22, 40, NULL, '2018-10-09 11:35:57', '2018-10-09 11:35:57', 'facebook_points', 40),
(64, 2, 7, 22, NULL, 40, '2018-10-09 11:36:08', '2018-10-09 11:36:08', 'twitter_points', 40),
(65, 2, 7, 23, 40, NULL, '2018-10-09 11:36:27', '2018-10-09 11:36:27', 'facebook_points', 40),
(66, 2, 7, 23, NULL, 36, '2018-10-09 11:36:37', '2018-10-09 11:36:37', 'twitter_points', 36),
(67, 3, 7, 23, 40, NULL, '2018-10-09 11:50:52', '2018-10-09 11:50:52', 'facebook_points', 40),
(68, 3, 7, 22, 40, NULL, '2018-10-09 11:51:05', '2018-10-09 11:51:05', 'facebook_points', 40),
(69, 3, 7, 20, 40, NULL, '2018-10-09 11:51:21', '2018-10-09 11:51:21', 'facebook_points', 40),
(70, 3, 7, 23, NULL, 36, '2018-10-09 11:53:23', '2018-10-09 11:53:23', 'twitter_points', 36),
(71, 3, 7, 22, NULL, 40, '2018-10-09 11:53:36', '2018-10-09 11:53:36', 'twitter_points', 40),
(72, 3, 7, 20, NULL, 40, '2018-10-09 11:53:56', '2018-10-09 11:53:56', 'twitter_points', 40),
(73, 3, 7, 19, NULL, 4, '2018-10-09 11:54:25', '2018-10-09 11:54:25', 'twitter_points', 4),
(74, 3, 7, 19, 12, NULL, '2018-10-09 11:54:35', '2018-10-09 11:54:35', 'facebook_points', 12),
(75, 3, 7, 21, NULL, 40, '2018-10-09 12:17:08', '2018-10-09 12:17:08', 'twitter_points', 40),
(76, 3, 7, 21, 40, NULL, '2018-10-09 12:17:18', '2018-10-09 12:17:18', 'facebook_points', 40),
(77, 4, 7, 23, 40, NULL, '2018-10-09 12:27:41', '2018-10-09 12:27:41', 'facebook_points', 40),
(78, 4, 7, 23, NULL, 36, '2018-10-09 12:29:37', '2018-10-09 12:29:37', 'twitter_points', 36),
(79, 6, 7, 23, NULL, 36, '2018-10-09 12:29:39', '2018-10-09 12:29:39', 'twitter_points', 36),
(80, 6, 7, 23, 40, NULL, '2018-10-09 12:30:05', '2018-10-09 12:30:05', 'facebook_points', 40),
(81, 6, 7, 22, 40, NULL, '2018-10-09 12:30:50', '2018-10-09 12:30:50', 'facebook_points', 40),
(82, 4, 7, 22, 40, NULL, '2018-10-09 12:31:06', '2018-10-09 12:31:06', 'facebook_points', 40),
(83, 6, 7, 22, NULL, 40, '2018-10-09 12:31:09', '2018-10-09 12:31:09', 'twitter_points', 40),
(84, 4, 7, 22, NULL, 40, '2018-10-09 12:31:19', '2018-10-09 12:31:19', 'twitter_points', 40),
(85, 6, 7, 20, 40, NULL, '2018-10-09 12:32:05', '2018-10-09 12:32:05', 'facebook_points', 40),
(86, 6, 7, 20, NULL, 40, '2018-10-09 12:32:32', '2018-10-09 12:32:32', 'twitter_points', 40),
(87, 6, 7, 19, 12, NULL, '2018-10-09 12:32:49', '2018-10-09 12:32:49', 'facebook_points', 12),
(88, 6, 7, 19, NULL, 4, '2018-10-09 12:33:27', '2018-10-09 12:33:27', 'twitter_points', 4),
(89, 4, 7, 20, 40, NULL, '2018-10-09 12:35:24', '2018-10-09 12:35:24', 'facebook_points', 40),
(90, 4, 7, 20, NULL, 40, '2018-10-09 12:35:39', '2018-10-09 12:35:39', 'twitter_points', 40),
(91, 6, 7, 21, 40, NULL, '2018-10-09 12:35:58', '2018-10-09 12:35:58', 'facebook_points', 40),
(92, 6, 7, 21, NULL, 40, '2018-10-09 12:36:22', '2018-10-09 12:36:22', 'twitter_points', 40),
(93, 8, 7, 23, NULL, 36, '2018-10-09 15:27:48', '2018-10-09 15:27:48', 'twitter_points', 36),
(94, 8, 7, 22, NULL, 40, '2018-10-09 15:28:23', '2018-10-09 15:28:23', 'twitter_points', 40),
(95, 8, 7, 20, NULL, 40, '2018-10-09 15:28:49', '2018-10-09 15:28:49', 'twitter_points', 40),
(96, 10, 7, 23, NULL, 36, '2018-10-09 15:28:52', '2018-10-09 15:28:52', 'twitter_points', 36),
(97, 8, 7, 19, NULL, 4, '2018-10-09 15:29:04', '2018-10-09 15:29:04', 'twitter_points', 4),
(98, 10, 7, 22, NULL, 40, '2018-10-09 15:29:09', '2018-10-09 15:29:09', 'twitter_points', 40),
(99, 8, 7, 5, NULL, 24, '2018-10-09 15:29:22', '2018-10-09 15:29:22', 'twitter_points', 24),
(100, 10, 7, 20, NULL, 40, '2018-10-09 15:32:03', '2018-10-09 15:32:03', 'twitter_points', 40),
(101, 10, 7, 19, NULL, 4, '2018-10-09 15:32:35', '2018-10-09 15:32:35', 'twitter_points', 4),
(102, 10, 7, 5, NULL, 24, '2018-10-09 15:32:53', '2018-10-09 15:32:53', 'twitter_points', 24),
(103, 10, 7, 5, 30, NULL, '2018-10-09 15:33:15', '2018-10-09 15:33:15', 'facebook_points', 30),
(104, 10, 7, 19, 12, NULL, '2018-10-09 15:33:40', '2018-10-09 15:33:40', 'facebook_points', 12),
(105, 10, 7, 21, NULL, 40, '2018-10-09 15:39:09', '2018-10-09 15:39:09', 'twitter_points', 40),
(106, 10, 7, 21, 40, NULL, '2018-10-09 15:39:22', '2018-10-09 15:39:22', 'facebook_points', 40),
(107, 4, 9, 2, NULL, 12, '2018-10-13 15:15:23', '2018-10-13 15:15:23', 'twitter_points', 12),
(108, 6, 9, 2, 12, NULL, '2018-10-15 16:29:14', '2018-10-15 16:29:14', 'facebook_points', 12),
(109, 6, 19, 12, 20, NULL, '2018-10-17 14:47:34', '2018-10-17 14:47:34', 'facebook_points', 20),
(110, 6, 10, 14, 8, NULL, '2018-10-17 14:54:42', '2018-10-17 14:54:42', 'facebook_points', 8),
(111, 6, 14, 13, 20, NULL, '2018-10-17 14:55:11', '2018-10-17 14:55:11', 'facebook_points', 20),
(112, 6, 20, 16, 10, NULL, '2018-10-17 17:35:00', '2018-10-17 17:35:00', 'facebook_points', 10),
(113, 6, 8, 17, 16, NULL, '2018-10-22 14:47:35', '2018-10-22 14:47:35', 'facebook_points', 16),
(114, 6, 8, 7, 12, NULL, '2018-10-22 14:48:13', '2018-10-22 14:48:13', 'facebook_points', 12),
(115, 6, 9, 3, NULL, 12, '2018-10-23 15:17:04', '2018-10-23 15:17:04', 'twitter_points', 12),
(116, 6, 14, 13, NULL, 20, '2018-10-25 16:29:27', '2018-10-25 16:29:27', 'twitter_points', 20),
(117, 1, 8, 17, 16, NULL, '2018-10-25 17:25:17', '2018-10-25 17:25:17', 'facebook_points', 16),
(118, 1, 14, 13, 20, NULL, '2018-10-25 17:42:56', '2018-10-25 17:42:56', 'facebook_points', 20),
(119, 1, 10, 14, 8, NULL, '2018-10-25 17:50:31', '2018-10-25 17:50:31', 'facebook_points', 8),
(120, 1, 19, 12, 20, NULL, '2018-10-25 18:05:29', '2018-10-25 18:05:29', 'facebook_points', 20),
(121, 19, 7, 21, 40, NULL, '2018-10-26 12:10:09', '2018-10-26 12:10:09', 'facebook_points', 40),
(122, 1, 7, 21, 40, NULL, '2018-10-26 12:16:56', '2018-10-26 12:16:56', 'facebook_points', 40),
(123, 19, 8, 17, 16, NULL, '2018-10-26 12:31:14', '2018-10-26 12:31:14', 'facebook_points', 16),
(124, 16, 13, 10, 12, NULL, '2018-11-01 12:40:03', '2018-11-01 12:40:03', 'facebook_points', 12),
(125, 16, 13, 10, NULL, 12, '2018-11-01 12:41:00', '2018-11-01 12:41:00', 'twitter_points', 12),
(126, 16, 13, 8, NULL, 24, '2018-11-01 12:42:18', '2018-11-01 12:42:18', 'twitter_points', 24),
(127, 16, 13, 8, 12, NULL, '2018-11-01 12:42:25', '2018-11-01 12:42:25', 'facebook_points', 12),
(128, 2, 9, 3, 12, NULL, '2018-11-01 15:04:33', '2018-11-01 15:04:33', 'facebook_points', 12),
(129, 2, 8, 26, 12, NULL, '2018-11-14 15:05:51', '2018-11-14 15:05:51', 'facebook_points', 12),
(130, 4, 13, 8, 12, NULL, '2018-11-28 21:24:47', '2018-11-28 21:24:47', 'facebook_points', 12),
(131, 4, 13, 8, NULL, 24, '2018-11-28 21:25:16', '2018-11-28 21:25:16', 'twitter_points', 24),
(132, 4, 19, 12, NULL, 20, '2019-01-19 15:26:11', '2019-01-19 15:26:11', 'twitter_points', 20),
(133, 4, 27, 28, NULL, 4, '2019-01-26 15:33:50', '2019-01-26 15:33:50', 'twitter_points', 4),
(134, 4, 9, 3, NULL, 12, '2019-01-26 15:36:01', '2019-01-26 15:36:01', 'twitter_points', 12),
(135, 4, 13, 10, NULL, 12, '2019-01-26 15:39:33', '2019-01-26 15:39:33', 'twitter_points', 12),
(136, 25, 19, 12, NULL, 20, '2019-01-26 22:12:21', '2019-01-26 22:12:21', 'twitter_points', 20),
(137, 3, 8, 29, 20, NULL, '2019-01-28 15:03:07', '2019-01-28 15:03:07', 'facebook_points', 20),
(138, 3, 8, 29, NULL, 20, '2019-01-28 15:04:18', '2019-01-28 15:04:18', 'twitter_points', 20),
(139, 10, 8, 29, 20, NULL, '2019-01-28 15:06:31', '2019-01-28 15:06:31', 'facebook_points', 20),
(140, 7, 8, 29, NULL, 20, '2019-01-28 15:07:55', '2019-01-28 15:07:55', 'twitter_points', 20),
(141, 4, 8, 29, NULL, 20, '2019-01-28 15:18:41', '2019-01-28 15:18:41', 'twitter_points', 20),
(142, 9, 8, 29, NULL, 20, '2019-01-28 15:24:40', '2019-01-28 15:24:40', 'twitter_points', 20),
(143, 7, 8, 29, 20, NULL, '2019-01-28 15:49:12', '2019-01-28 15:49:12', 'facebook_points', 20),
(144, 9, 8, 29, 20, NULL, '2019-01-28 16:08:18', '2019-01-28 16:08:18', 'facebook_points', 20),
(145, 25, 8, 6, 12, NULL, '2019-01-29 11:58:00', '2019-01-29 11:58:00', 'facebook_points', 12),
(146, 4, 28, 31, NULL, 6, '2019-02-01 14:30:03', '2019-02-01 14:30:03', 'twitter_points', 6),
(147, 25, 13, 10, 12, NULL, '2019-02-07 16:42:25', '2019-02-07 16:42:25', 'facebook_points', 12),
(148, 25, 13, 10, NULL, 12, '2019-02-07 16:54:00', '2019-02-07 16:54:00', 'twitter_points', 12),
(149, 4, 29, 33, NULL, 4, '2019-02-18 20:58:41', '2019-02-18 20:58:41', 'twitter_points', 4),
(150, 3, 27, 34, 20, NULL, '2019-03-28 12:56:49', '2019-03-28 12:56:49', 'facebook_points', 20),
(151, 4, 32, 36, NULL, 4, '2019-05-15 20:58:29', '2019-05-15 20:58:29', 'twitter_points', 4),
(152, 4, 27, 34, NULL, 20, '2019-06-18 15:12:26', '2019-06-18 15:12:26', 'twitter_points', 20),
(153, 21, 30, 39, NULL, 4, '2019-06-28 02:19:10', '2019-06-28 02:19:10', 'twitter_points', 4),
(154, 21, 50, 53, NULL, 4, '2019-09-02 11:57:53', '2019-09-02 11:57:53', 'twitter_points', 4),
(155, 7, 7, 58, NULL, 4, '2019-09-11 09:11:39', '2019-09-11 09:11:39', 'twitter_points', 4),
(156, 8, 51, 56, NULL, 4, '2019-09-13 15:49:38', '2019-09-13 15:49:38', 'twitter_points', 4),
(157, 4, 52, 61, NULL, 4, '2019-09-19 22:30:51', '2019-09-19 22:30:51', 'twitter_points', 4),
(158, 4, 51, 56, NULL, 4, '2019-09-20 15:21:51', '2019-09-20 15:21:51', 'twitter_points', 4),
(159, 4, 7, 58, NULL, 4, '2019-09-20 15:22:42', '2019-09-20 15:22:42', 'twitter_points', 4),
(160, 7, 52, 61, NULL, 4, '2019-09-26 15:21:48', '2019-09-26 15:21:48', 'twitter_points', 4),
(161, 4, 53, 59, NULL, 8, '2019-09-26 16:27:06', '2019-09-26 16:27:06', 'twitter_points', 8),
(162, 7, 52, 61, 40, NULL, '2019-09-26 16:44:26', '2019-09-26 16:44:26', 'facebook_points', 40),
(163, 4, 27, 50, NULL, 4, '2020-02-10 17:57:56', '2020-02-10 17:57:56', 'twitter_points', 4);

-- --------------------------------------------------------

--
-- Table structure for table `T_SocialType`
--

CREATE TABLE `T_SocialType` (
  `social_type_id` int(30) NOT NULL,
  `social_name` varchar(30) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_Space`
--

CREATE TABLE `T_Space` (
  `space_id` int(11) NOT NULL,
  `space_name` varchar(255) DEFAULT NULL,
  `store_id` int(50) DEFAULT NULL,
  `space_image` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `grid_pixel` float NOT NULL DEFAULT '30.33',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Space`
--

INSERT INTO `T_Space` (`space_id`, `space_name`, `store_id`, `space_image`, `width`, `height`, `grid_pixel`, `created_date`, `last_update`) VALUES
(1, NULL, 8, 'wPaint-5ba391bf8ee50.png', 1000, 600, 30.33, '2018-09-20 12:25:35', '2018-09-20 12:25:35'),
(2, NULL, 10, 'wPaint-5ba39ce6c3dd1.png', 1000, 600, 30.33, '2018-09-20 13:13:10', '2018-09-20 13:13:10'),
(3, NULL, 7, 'wPaint-5ba48ebd51306.png', 1000, 600, 30.33, '2018-09-21 06:25:01', '2018-09-21 06:25:01'),
(4, NULL, 9, 'wPaint-5baa1ca69b5df.png', 1000, 600, 30.33, '2018-09-25 11:31:50', '2018-09-25 11:31:50'),
(5, NULL, 20, 'wPaint-5bacdf7eeef59.png', 1000, 600, 30.33, '2018-09-27 13:47:43', '2018-09-27 13:47:43'),
(6, NULL, 24, 'wPaint-5bceb5e8bbda6.png', 1000, 600, 30.33, '2018-10-23 05:47:20', '2018-10-23 05:47:20'),
(7, NULL, 13, 'wPaint-5bd9939aa36af.png', 1000, 600, 30.33, '2018-10-31 11:35:54', '2018-10-31 11:35:54'),
(8, NULL, 27, 'wPaint-5c4af120ca0f4.png', 1000, 600, 30.33, '2019-01-25 11:21:04', '2019-01-25 11:21:04'),
(9, NULL, 28, 'wPaint-5c534ef214268.png', 1000, 600, 30.33, '2019-01-31 19:39:30', '2019-01-31 19:39:30'),
(10, NULL, 29, 'wPaint-5c6abfbd1773a.png', 1000, 600, 30.33, '2019-02-18 14:22:53', '2019-02-18 14:22:53'),
(11, NULL, 30, 'wPaint-5c6c598e3177c.png', 1000, 600, 30.33, '2019-02-19 19:31:26', '2019-02-19 19:31:26'),
(12, NULL, 32, 'wPaint-5c7ce856025a9.png', 1000, 600, 30.33, '2019-03-04 08:56:54', '2019-03-04 08:56:54'),
(13, NULL, 49, 'wPaint-5d52701fa41f9.png', 1000, 600, 30.33, '2019-08-13 08:09:03', '2019-08-13 08:09:03'),
(14, NULL, 50, 'wPaint-5d6cb2f2782f4.png', 1000, 600, 30.33, '2019-09-02 06:13:06', '2019-09-02 06:13:06'),
(15, NULL, 51, 'wPaint-5d6e3df385a1a.png', 1000, 600, 30.33, '2019-09-03 10:18:27', '2019-09-03 10:18:27'),
(16, NULL, 53, 'wPaint-5d83c55abaa97.png', 1000, 600, 30.33, '2019-09-19 18:13:46', '2019-09-19 18:13:46'),
(17, NULL, 57, 'wPaint-5e4141ea67716.png', 1000, 600, 30.33, '2020-02-10 11:43:38', '2020-02-10 11:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `T_SpacePoint`
--

CREATE TABLE `T_SpacePoint` (
  `point_id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `point_name` varchar(255) NOT NULL,
  `point_x` int(11) NOT NULL,
  `point_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_SpendTimeValue`
--

CREATE TABLE `T_SpendTimeValue` (
  `spend_time_id` int(30) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `T_Status`
--

CREATE TABLE `T_Status` (
  `status_id` int(30) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Status`
--

INSERT INTO `T_Status` (`status_id`, `status_name`, `created_date`, `last_updated_date`) VALUES
(1, 'Active', '2017-04-06 07:34:48', '2017-04-06 07:34:48'),
(2, 'Pending', '2017-04-06 07:35:11', '2017-04-06 07:35:11'),
(3, 'Paid', '2017-04-06 07:35:24', '2017-04-06 07:35:24'),
(4, 'On Hold', '2017-04-06 07:35:36', '2017-04-06 07:35:36'),
(5, 'cancelled', '2017-04-06 07:36:10', '2017-04-06 07:36:10'),
(6, 'inActive', '2017-05-18 05:49:37', '2017-05-18 05:49:37'),
(7, 'suspend', '2017-07-14 07:53:04', '2017-07-14 07:53:04'),
(8, 'reject', '2017-07-14 07:53:04', '2017-07-14 07:53:04'),
(9, 'expired', '2017-07-14 07:53:04', '2017-07-14 07:53:04'),
(10, 'accept', '2017-07-14 07:53:04', '2017-07-14 07:53:04'),
(11, 'removed', '2017-07-14 07:53:04', '2017-07-14 07:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `T_Store`
--

CREATE TABLE `T_Store` (
  `store_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `store_first_name` varchar(70) DEFAULT NULL,
  `store_last_name` varchar(30) DEFAULT NULL,
  `store_email` varchar(50) DEFAULT NULL,
  `store_password` varchar(500) DEFAULT NULL,
  `store_mobile_no` varchar(30) DEFAULT NULL,
  `store_alternet_contact_no` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `store_address1` text,
  `store_address2` text,
  `area_location` varchar(500) DEFAULT NULL,
  `store_description` text,
  `store_open_hours` varchar(50) DEFAULT NULL,
  `store_close_hours` varchar(50) DEFAULT NULL,
  `store_latitude` varchar(50) NOT NULL DEFAULT '0',
  `store_longitude` varchar(50) NOT NULL DEFAULT '0',
  `otp_code` varchar(30) DEFAULT NULL,
  `is_email_verify` int(20) NOT NULL DEFAULT '0',
  `is_mobile_verify` int(20) NOT NULL DEFAULT '0',
  `is_admin_approved` int(20) NOT NULL DEFAULT '0',
  `status_id` int(20) NOT NULL,
  `store_logo` text,
  `temp_logo` text,
  `store_point` int(30) DEFAULT NULL,
  `walking_point` int(10) DEFAULT '0',
  `remark` text,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `reset_link_expire_time` varchar(50) DEFAULT NULL,
  `link_expire` int(2) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zipcode` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Store`
--

INSERT INTO `T_Store` (`store_id`, `user_id`, `store_first_name`, `store_last_name`, `store_email`, `store_password`, `store_mobile_no`, `store_alternet_contact_no`, `category`, `state`, `store_address1`, `store_address2`, `area_location`, `store_description`, `store_open_hours`, `store_close_hours`, `store_latitude`, `store_longitude`, `otp_code`, `is_email_verify`, `is_mobile_verify`, `is_admin_approved`, `status_id`, `store_logo`, `temp_logo`, `store_point`, `walking_point`, `remark`, `reg_date`, `reg_time`, `reset_link_expire_time`, `link_expire`, `created_date`, `last_updated_date`, `zipcode`) VALUES
(6, 0, 'ABC', NULL, 'ashishjagtap008@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2323232312', NULL, '6', '15', 'Unnamed Road, Khadki, Pune, Maharashtra 411003, India', NULL, 'Khadki, Pune', 'ABC', '12:00 AM', '10:00 AM', '18.578916503140853', '73.86633038520813', '9272', 1, 1, 0, 7, 'architecture-blue-sky-cliff-248771310.jpg', 'architecture-blue-sky-cliff-248771310.jpg', 4500, 20, NULL, '2018-09-20', '17:40:30', NULL, 0, '2018-09-20 12:10:30', '2019-08-30 07:34:41', '411003'),
(7, 0, 'Easy Reach', NULL, 'tejunangare@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9657067822', '8319837942', '3', '15', '401, Plot No.6, Vasant Bahawa, Near La Valle Casa,, Chandani Chowk, NDA- Pashan Road, Pune, Maharashtra 411021, India', NULL, ', ', 'McDonald’s  is a fast food, limited service restaurant with more than 35,000 restaurants in over 100 countries. It employs more than four million people. McDonald’s offers a uniform menu that includes fries, the Big Mac, chicken sandwiches, chicken nuggets, hamburgers, the quarter pounder with cheese, salads, wraps, desserts, soft drinks, and other beverages. However, to ensure that it connects with the international markets, McDonald’s offers locally relevant food menus as well.', '12:00 AM', '12:30 AM', '18.5097606', '73.78160989999992', '4755', 1, 1, 1, 1, 'easyreach_retina.png', 'easyreach_retina.png', 864, 10, NULL, '2018-09-20', '17:43:19', '2018-11-01 10:15:01', 2, '2018-09-20 12:13:19', '2019-09-20 09:52:42', '411021'),
(8, 0, 'Magazine', NULL, 'nidhitiwari2208@Outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '7218712448', NULL, '4', '15', 'waman ganesh heights, bavdhan khurd', NULL, ', ', 'All type of magazines are avalible', '10:30 AM', '11:00 PM', '18.509714648079715', '73.7816102539673', '1167', 1, 1, 1, 1, 'images2.png', 'images2.png', 11502, 20, NULL, '2018-09-20', '17:46:14', NULL, 0, '2018-09-20 12:16:14', '2020-02-21 07:21:08', 'heights'),
(9, 0, 'pantaloons', NULL, 'tejaswini@cashrub.com', 'e10adc3949ba59abbe56e057f20f883e', '8668567907', NULL, '2', '15', '', NULL, 'Bavdhan, Pune', 'pantaloons', '12:00 AM', '12:30 AM', '18.50926733842479', '73.78140793121338', '3980', 1, 1, 0, 7, 'images4.jpg', 'images4.jpg', 2640, 30, NULL, '2018-09-20', '17:48:31', '2018-11-22 11:19:38', 2, '2018-09-20 12:18:31', '2019-08-30 07:32:56', '411021'),
(10, 0, 'Niks', NULL, 'nikhilgunjal@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '8788474240', NULL, '4', '15', 'DSK Raanwaara Rd, Patil Nagar, Bavdhan, Pune, Maharashtra 411021, India', NULL, 'Bavdhan, Pune', 'Entertainment Hub', '10:30 AM', '7:00 PM', '18.519755391546667', '73.77365453875632', '2099', 1, 1, 1, 1, 'Koala1.jpg', 'Koala1.jpg', 2204, 22, NULL, '2018-09-20', '18:24:26', '2019-09-10 16:21:19', 2, '2018-09-20 12:54:26', '2019-10-16 19:54:20', '411021'),
(13, 0, 'Nike', NULL, 'nnike0937@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9405573645', NULL, '2', '15', 'Plot No.6, Vasant Bahawa, Near La Valle Casa,, Chandani Chowk, NDA- Pashan Road, Bavdhan Khurd, Pune, Maharashtra 411021, India', NULL, ', ', 'nike', '12:00 AM', '2:00 AM', '18.50980762814195', '73.78180738308106', '7488', 1, 1, 0, 7, '6926d567e9cea887d32710e2745b7712.jpg', '6926d567e9cea887d32710e2745b7712.jpg', 2868, 10, NULL, '2018-09-21', '14:55:50', NULL, 0, '2018-09-21 09:25:50', '2019-08-30 07:32:22', '411021'),
(15, 0, 'shoppers stop', NULL, 'shopper774@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8484837453', NULL, '2', '15', 'Harsh Bunglow ,Plot no.5,Sr.no 3/1-2 Krishnamai society Taljai Pathar near swaraj college, Dhankawadi, Pune, Maharashtra 411043, India', NULL, 'Dhankawadi, Pune', 'shoppers stop', '12:00 AM', '2:00 AM', '18.469814013698926', '73.84525526389314', '8641', 1, 1, 0, 7, 'download8.jpg', 'download8.jpg', 3000, 10, NULL, '2018-09-21', '15:12:02', NULL, 0, '2018-09-21 09:42:02', '2019-08-30 07:34:32', '411043'),
(16, 0, 'Apple', NULL, 'snehalbhole4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9860012437', NULL, '3', '15', '61/1/1, Senapati Bapat Rd, Baner, Pune, Maharashtra 411045, India', NULL, 'Baner, Pune', 'all the gadgets are available...', '10:00 AM', '9:00 PM', '18.5555377', '73.79423450000002', '7223', 1, 1, 0, 7, 'Apple_Logo_2015_02.jpg', 'Apple_Logo_2015_02.jpg', 3000, 10, NULL, '2018-09-21', '15:18:05', NULL, 0, '2018-09-21 09:48:05', '2019-08-30 07:34:02', '411045'),
(17, 0, 'Globaldesi', NULL, 'shruteewairagade21@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8626009959', NULL, '2', '15', 'Medi point ,Near Dominise Pizza, Aundh., Aundh, Pune, Maharashtra 411007, India', NULL, 'Aundh, ', 'We at Anitadongre.com give maximum priority, not only to your shopping experience but also to your safe and secure shopping. Keeping the same in mind, we have put various levels of protections in place to ensure that our transaction process is extremely safe and that our customers\' information is highly secure and non leak able. For higher security Anitadongre.com does not accept any financial information on its servers. All such information entered by you is directly received by our Banks servers and are then transmitted to your banks servers. All this is done through industry standard encryption protocol known as Secure Socket Layer (SSL). Majority of online transactions are completed without incident. However, please keep in mind that customer protection is always a two-way process. When buying on any online portal, caution must always be practiced by the user. Following are some guidelines that would help you ensure a safe and secure online shopping experience.', '12:00 PM', '8:00 PM', '18.558007', '73.80752009999992', '5149', 1, 1, 0, 7, 'dc4ad4fa58bc9d17237772421149c95f_w837_h836.jpg', 'dc4ad4fa58bc9d17237772421149c95f_w837_h836.jpg', 3000, 10, NULL, '2018-09-21', '15:34:08', NULL, 0, '2018-09-21 10:04:08', '2019-08-30 07:34:21', '411007'),
(19, 0, 'BMW', NULL, 'econolytics.seo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9130323667', NULL, '9', '15', 'Sus Rd, Sus, Pune, Maharashtra 411021, India', NULL, 'Sus, Pune', 'The company was founded in 1916 and has its headquarters in Munich, Bavaria. BMW produces motor vehicles in Germany, Brazil, China, India, South Africa, the United Kingdom, and the United States. In 2015, BMW was the world\'s twelfth largest producer of motor vehicles, with 2,279,503 vehicles produced.[2] The Quandt family are long-term shareholders of the company, with the remaining shares owned by public float.\r\n\r\nAutomobiles are marketed under the brands BMW (with sub-brands BMW M for performance models and BMW i for plug-in electric cars), Mini and Rolls-Royce. Motorcycles are marketed under the brand BMW Motorrad. ', '12:00 PM', '9:00 PM', '18.552671313606986', '73.75505838042602', '6575', 1, 1, 0, 7, 'BMW-Logo-Photos1.jpg', 'BMW-Logo-Photos1.jpg', 2860, 10, NULL, '2018-09-21', '16:18:51', NULL, 0, '2018-09-21 10:48:51', '2019-08-30 07:34:11', '411021'),
(20, 0, 'Sanjana Creations', NULL, 'sanwar39@gmail.com', '54a8c7aa7fa0088b2a0acb6d4a951165', '9158992196', NULL, '2', '15', '32, Pashan Rd, Sagar Co-Operative Housing Society, Bavdhan, Pune, Maharashtra 411021, India', NULL, 'Bavdhan, Pune', 'Designer  Apparel ', '11:00 AM', '7:30 PM', '18.5143778868021', '73.78124392137192', '8800', 1, 1, 0, 7, '41QyiM9TqTL.jpg', '41QyiM9TqTL.jpg', 2890, 10, NULL, '2018-09-27', '18:48:36', NULL, 0, '2018-09-27 13:18:36', '2019-08-30 07:33:32', '411021'),
(21, 0, 'Amol Classic', NULL, 'amolpomane@gmail.com', '7ea3e2ffa1a24d23d4ebb2f2f42a1f20', '8983462134', NULL, '12', '15', 'E. Mercado Corner F. Calderon Street, Kalayaan Avenue, Makati, 1210 Metro Manila, Philippines', NULL, ', ', 'We offer Classic Suitings & Readymades', '10:00 AM', '9:00 PM', '14.5646096', '121.03047330000004', '7598', 1, 1, 0, 7, 'download_3.jpg', 'download_3.jpg', 3000, 10, NULL, '2018-10-18', '13:27:09', NULL, 0, '2018-10-18 07:57:09', '2019-09-09 10:11:29', '001210'),
(22, 0, 'Del Sol', NULL, 'vertexmobisoft@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9970393889', NULL, '2', '15', '10 Frederick St, Nassau, The Bahamas', NULL, ', ', 'World\'s Largest Retailer of Color-Changing Clothing', '9:00 AM', '6:00 PM', '25.078648', '-77.34258499999999', '3252', 1, 1, 1, 1, 'del_sol.jpg', 'del_sol.jpg', 3000, 10, NULL, '2018-10-19', '17:16:28', NULL, 0, '2018-10-19 11:46:28', '2019-10-01 08:49:50', '411021'),
(24, 0, 'Cariloha Bamboo', NULL, 'nikhil@vertexindia.co.in', 'e10adc3949ba59abbe56e057f20f883e', '8407904157', NULL, '2', '15', 'Bay St Location - Klonaris Building, Bay St, Nassau, The Bahamas', NULL, ', ', 'Where Everything is Made of Luxuriously Soft Bamboo', '9:00 AM', '6:00 PM', '25.0781359', '-77.33805089999998', '7088', 1, 1, 1, 1, 'cariloha.jpg', 'cariloha.jpg', 4000, 10, NULL, '2018-10-23', '10:56:00', '2019-08-28 17:47:52', 1, '2018-10-23 05:26:00', '2019-10-01 08:51:02', '411021'),
(25, 0, 'ADIDAS', NULL, 'sn416100@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9168738167', NULL, '2', '0', 'Jl. Gerbang Pemuda No.3, RT.1/RW.3, Gelora, Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270, Indonesia', NULL, '3, Kota Jakarta Pusat', 'ADIDAS', '10:00 AM', '8:30 PM', '-6.21345', '106.79844300000002', '1519', 1, 1, 0, 7, 'download7.png', 'download7.png', 3000, 10, NULL, '2018-10-23', '16:32:42', NULL, 0, '2018-10-23 11:02:42', '2019-09-09 10:11:18', '010270'),
(27, 0, 'Colombian Emeralds International', NULL, 'pritampbora@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9011192083', NULL, '2', '15', 'Market St, Nassau, The Bahamas', NULL, ', ', 'Emerald & Gemstone Specialists', '9:00 AM', '5:30 PM', '25.0684745', '-77.3445064', '6180', 1, 1, 1, 1, 'colombian_1.png', 'colombian_1.png', 2862, 30, NULL, '2019-01-25', '16:34:48', NULL, 0, '2019-01-25 11:04:48', '2020-02-10 12:27:56', '411030'),
(28, 0, 'Alex And Ani Boutique', NULL, 'nikhil@vsppl.com', 'e10adc3949ba59abbe56e057f20f883e', '7650958215', NULL, '2', '15', '2 W Bay St, Nassau, The Bahamas', NULL, ', ', 'Made in America with Love \r\nEco-conscious provider of unique jewelry', '9:30 AM', '6:00 PM', '25.0783888', '-77.34456539999996', '5596', 1, 1, 1, 1, 'alex_Ani.png', 'alex_Ani.png', 2954, 20, NULL, '2019-02-01', '00:20:40', '2019-08-28 17:13:16', 1, '2019-01-31 18:50:40', '2019-09-14 14:27:38', '400076'),
(29, 0, 'Kay\'s Fine Jewelry', NULL, 'vishalgunjal9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9890199009', NULL, '2', '15', 'Bay St Location - Klonaris Building, Bay St, Nassau, The Bahamas', NULL, ', ', 'Luxury with a Family Touch', '9:00 AM', '6:00 PM', '25.0781359', '-77.33805089999998', '2545', 1, 1, 1, 1, 'keys.png', 'keys.png', 2976, 20, NULL, '2019-02-18', '19:10:47', NULL, 0, '2019-02-18 13:40:47', '2019-09-14 14:25:57', '411030'),
(30, 0, 'Parklane Luxe', NULL, 'gunjal.rohan@ymail.com', 'e10adc3949ba59abbe56e057f20f883e', '7387301083', NULL, '2', '15', '10 Frederick St, Nassau, The Bahamas', NULL, ', ', 'Transforming Shopping into an Experience', '9:00 AM', '6:00 PM', '25.078648', '-77.34258499999999', '5013', 1, 1, 1, 1, 'parklane_luxe.jpg', 'parklane_luxe.jpg', 2536, 10, NULL, '2019-02-20', '00:48:37', NULL, 0, '2019-02-19 19:18:37', '2020-03-04 14:48:24', 'Nassau'),
(34, 0, 'Milano Diamond Gallery', NULL, 'devika@vmobify.com', 'e10adc3949ba59abbe56e057f20f883e', '8983243404', NULL, '2', '15', 'Bay St Location - Klonaris Building, Bay St, Nassau, The Bahamas', NULL, ', ', 'Manufacturer of Fine Diamonds & Gemstone Jewelry', '9:00 AM', '5:00 PM', '25.0781359', '-77.33805089999998', NULL, 1, 1, 1, 1, 'milano.jpg', 'milano.jpg', 3000, 10, NULL, '2019-03-28', '12:22:09', NULL, 0, '2019-03-28 06:52:09', '2019-09-14 14:23:17', '411030'),
(37, 0, 'Effy Jewelry', NULL, 'vmobify@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9359627676', NULL, '2', '15', '2 W Bay St, Nassau, The Bahamas', NULL, ', ', 'Colored Diamond & Gemstone Specialist', '9:30 AM', '5:30 PM', '25.0783888', '-77.34456539999996', '1487', 1, 1, 1, 1, 'effy.jpg', 'effy.jpg', 5000, 10, NULL, '2019-08-05', '20:12:10', '2019-08-28 16:22:15', 1, '2019-08-05 14:42:10', '2019-10-01 08:50:26', '10036'),
(40, 0, 'TestAshish', NULL, 'ashishjagtap28@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9766672053', NULL, '6', '15', 'Chandani Chowk, Bavdhan Lane#1 Behind Hotel Viva Inn, Pune, Maharashtra 411021, India', NULL, ', ', 'cvfbvc', '12:00 AM', '2:30 AM', '18.5087875', '73.78188', '7529', 1, 1, 0, 7, 'Artistic-Landscape-4K-Wallpaper-3840x21605.jpg', 'Artistic-Landscape-4K-Wallpaper-3840x21605.jpg', 3000, 10, NULL, '2019-08-05', '20:24:39', '2019-08-05 21:43:18', 2, '2019-08-05 14:54:39', '2019-08-30 07:33:06', '411021'),
(42, 0, 'Longines Boutique', NULL, 'cashrub@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '7415623932', NULL, '2', '15', 'Bay St Location - Klonaris Building, Bay St, Nassau, The Bahamas', NULL, ', ', 'Tradition, Elegance & Performance Since 1832', '9:00 AM', '5:00 PM', '25.0781359', '-77.33805089999998', '6370', 1, 1, 1, 1, 'longines.jpg', 'longines.jpg', 3000, 10, NULL, '2019-08-06', '17:16:31', NULL, 0, '2019-08-06 11:46:31', '2019-09-14 14:20:02', '411021'),
(46, 0, 'Tag Heuer Boutique', NULL, 'sweetybhagwat00@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '9096774102', NULL, '2', '15', '308 E Bay St, Nassau, The Bahamas', NULL, ', ', 'Tag Heuer has Pioneered Swiss Watch Making Since 1860', '9:00 AM', '5:30 PM', '25.0739411', '-77.31530140000001', '6663', 1, 1, 1, 1, 'tag_heuer.jpg', 'tag_heuer.jpg', 3000, 10, NULL, '2019-08-08', '16:31:52', NULL, 0, '2019-08-08 11:01:52', '2019-09-14 14:16:41', '74114'),
(47, 0, 'Tanzanite International', NULL, 'vmobify.seo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9359627676', NULL, '2', '15', '10 Frederick St, Nassau, The Bahamas', NULL, ', ', 'Exclusive Home to Safi Kilima Tanzanite', '9:00 AM', '5:30 PM', '25.078648', '-77.34258499999999', '5171', 1, 1, 1, 7, 'tanzanite2.jpg', 'tanzanite2.jpg', 3000, 10, NULL, '2019-08-08', '17:22:49', NULL, 0, '2019-08-08 11:52:49', '2019-09-30 11:57:09', '411021'),
(49, 0, 'Diamonds International', NULL, 'shankarnaruni@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '9822074133', NULL, '2', '15', 'Hilton Location 1 - Van Breugals, Charlotte St, Nassau, The Bahamas', NULL, ', ', '# 1 Recommendation for Diamonds for 30 Years', '9:00 AM', '5:00 PM', '25.0773851', '-77.34175240000002', '8953', 1, 1, 1, 1, 'dI.png', 'dI.png', 3990, 10, NULL, '2019-08-13', '13:28:57', NULL, 0, '2019-08-13 07:58:57', '2019-10-02 07:03:29', '411026'),
(50, 0, 'TenniStation', NULL, 'aboro163@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9365568068', NULL, '2', '15', '30, Western Express Hwy, Ismail College Camps, Gandhi Nagar Society, Natwar Nagar, Jogeshwari East, Mumbai, Maharashtra 400060, India', NULL, 'Jogeshwari East, Mumbai Suburban', 'Designer Fashion', '11:00 AM', '8:00 PM', '19.135875', '72.85403819999999', '8654', 1, 1, 1, 1, '11.png', '11.png', 2996, 10, NULL, '2019-09-02', '11:17:16', NULL, 0, '2019-09-02 05:47:16', '2019-09-14 13:58:10', '400060'),
(51, 0, 'VMPL', NULL, 'admin@vertexmobisoft.in', 'e10adc3949ba59abbe56e057f20f883e', '9511747397', NULL, '3', '15', '303, NDA Pashan Rd, Bavdhan, Pune, Maharashtra 411021, India', NULL, 'Bavdhan, Pune', 'Engineering Designs', '10:00 AM', '6:00 PM', '18.510466183087207', '73.78170297420502', '3973', 1, 1, 1, 1, 'IMG-20190903-WA0014.jpg', 'IMG-20190903-WA0014.jpg', 2942, 10, NULL, '2019-09-03', '13:56:29', NULL, 0, '2019-09-03 08:26:29', '2020-02-21 07:26:13', '411021'),
(52, 0, 'Pallavi Nail Art', NULL, 'pallavimind145@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8796482153', NULL, '2', '15', 'Pavan Apartment, Sai Chowk, Sus-Pashan, Pune, Maharashtra 411021, India', NULL, 'pashan, pune ', 'The nail art store', '9:30 AM', '7:30 PM', '18.543168452319083', '73.78518695277864', NULL, 1, 1, 1, 1, 'deep-jade-fall-nail-art.png', 'deep-jade-fall-nail-art.png', 2952, 10, NULL, '2019-09-05', '09:12:03', NULL, 0, '2019-09-05 03:42:03', '2019-09-26 11:14:26', '411021'),
(53, 0, 'Rijesh Toys', NULL, 'pprchandra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9765563055', NULL, '12', '15', 'A ,B, C & D buildings, India, DSK Raanwaara Rd, Patil Nagar, Bavdhan, Pune, Maharashtra 411021, India', NULL, 'Bavdhan, ', 'Toys Store', '10:00 AM', '8:00 PM', '18.5196528', '73.7736453', '2733', 1, 1, 1, 1, 'IMG-20190908-WA00011.jpg', 'IMG-20190908-WA00011.jpg', 2972, 10, NULL, '2019-09-10', '23:50:24', NULL, 0, '2019-09-10 18:20:24', '2019-09-26 10:57:06', '411021'),
(54, 0, 'Carrefour', NULL, 'pawntailpune@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7517935394', NULL, '12', '15', 'Nassau, The Bahamas', NULL, ', ', 'Hypermarket', '6:00 AM', '11:30 PM', '25.0089637', '-77.3586353', '6889', 1, 1, 1, 1, 'carrefour.jpg', 'carrefour.jpg', 3000, 10, NULL, '2019-09-30', '18:34:04', NULL, 0, '2019-09-30 13:04:04', '2019-09-30 14:05:07', ''),
(55, 0, 'Diamond Centre', NULL, 'chaudharivinod15@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9623970824', NULL, '12', '15', 'International Bazaar, Bay St, Nassau, The Bahamas', NULL, ', ', 'Diamonds ', '9:00 AM', '5:00 PM', '25.078093420066654', '-77.34152264584236', NULL, 1, 1, 1, 1, 'diamond-store-nassau-bahamas-CFH2YA.jpg', 'diamond-store-nassau-bahamas-CFH2YA.jpg', 2820, 20, NULL, '2019-10-01', '14:37:20', NULL, 0, '2019-10-01 09:07:20', '2020-03-04 21:53:50', '411021'),
(57, 0, 'Amit\'s Residence', NULL, 'tushar.ladke@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9860899988', NULL, '4', '15', 'Casino Drive, The Bahamas', NULL, ', ', 'Amit\'s Place', '9:00 AM', '6:00 PM', '25.083046788509325', '-77.31371565782545', '8702', 1, 1, 1, 1, 'amits_plc.jpg', 'amits_plc.jpg', 2880, 10, NULL, '2020-02-10', '15:49:13', NULL, 0, '2020-02-10 10:19:13', '2020-03-05 02:18:42', '411021');

-- --------------------------------------------------------

--
-- Table structure for table `T_StoreOffer`
--

CREATE TABLE `T_StoreOffer` (
  `store_offer_id` int(30) NOT NULL,
  `store_id` int(30) NOT NULL,
  `title` text,
  `description` text,
  `category_id` int(30) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `publish_time` time DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `expiry_time` time DEFAULT NULL,
  `offer_image` text,
  `offer_term_condition_id` int(30) DEFAULT NULL,
  `offer_status` int(30) DEFAULT '2',
  `no_of_shares` int(20) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `maximum_point` int(20) DEFAULT NULL,
  `offer_visibility` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_StoreOffer`
--

INSERT INTO `T_StoreOffer` (`store_offer_id`, `store_id`, `title`, `description`, `category_id`, `publish_date`, `publish_time`, `expiry_date`, `expiry_time`, `offer_image`, `offer_term_condition_id`, `offer_status`, `no_of_shares`, `created_date`, `last_updated_date`, `maximum_point`, `offer_visibility`) VALUES
(1, 8, 'monthly magazine', '10% off', 4, '2018-09-20', '17:52:54', '2019-02-24', NULL, 'new5.jpg', 1, 9, 7, '2018-09-20 12:22:54', '2019-02-24 14:32:59', 400, 10),
(2, 9, '50 % off on clothing', '50 % off on clothing', 2, '2018-11-22', '11:05:49', '2019-03-31', NULL, 'images_(2).jpg', 2, 9, 5, '2018-09-20 12:25:00', '2019-03-31 06:26:29', 400, 10),
(3, 9, 'Buy 2 get 1 free offer ', 'Buy 2 get 1 free offer ', 2, '2018-10-25', '14:30:47', '2019-04-06', NULL, 'pantaloonweekend.jpg', 3, 9, 4, '2018-09-21 06:54:37', '2019-04-06 12:08:52', 400, 10),
(4, 8, '50% OFF on femina magazine', '50% OFF on femina magazine', 4, '2018-09-21', '14:09:22', '2019-04-28', NULL, 'download_(1)6.jpg', 4, 9, 5, '2018-09-21 08:39:22', '2019-04-28 00:59:14', 200, 5),
(5, 7, '20% OFF on meal ', '20% OFF on meal ', 1, '2018-09-21', '14:11:42', '2019-04-20', NULL, 'mcd1.jpg', 5, 9, 12, '2018-09-21 08:41:42', '2019-04-20 00:09:58', 400, 5),
(6, 8, '10% OFF on FILMFARE magazine', '10% OFF on FILMFARE magazine', 4, '2018-09-21', '14:13:56', '2019-07-28', NULL, 'images_(3).jpg', 6, 9, 5, '2018-09-21 08:43:56', '2019-07-28 06:39:35', 400, 15),
(7, 8, '30% OFF on OUTLOOK magazine', '30% OFF on OUTLOOK magazine', 4, '2018-09-21', '14:16:00', '2019-04-28', NULL, 'images_(2)1.jpg', 7, 9, 6, '2018-09-21 08:46:00', '2019-04-28 00:59:14', 400, 20),
(8, 13, '50% OFF on Nike bags', '50% OFF on Nike bags', 13, '2018-09-21', '15:01:36', '2019-05-31', NULL, 'nike111.jpg', 8, 9, 4, '2018-09-21 09:31:36', '2019-05-31 04:41:24', 400, 5),
(9, 12, '20% OFF on Adidas shoes', '20% OFF on Adidas shoes', 2, '2018-09-21', '15:05:03', '2019-04-30', NULL, 'adidas.jpg', 9, 9, 1, '2018-09-21 09:35:03', '2019-04-30 02:20:16', 400, 5),
(10, 13, 'upto 60 % OFF on Nike footwear & apparel', 'upto 60 % OFF on Nike footwear & apparel', 2, '2018-10-26', '15:24:24', '2019-04-30', NULL, '2.jpg', 10, 9, 5, '2018-09-21 10:13:34', '2019-04-30 02:20:16', 400, 5),
(11, 15, '50 % OFF on watches', '50 % OFF on watches', 2, '2018-10-05', '15:55:05', '2019-05-26', NULL, 'fe-Shoppers-stop.jpg', 11, 9, 0, '2018-09-24 11:45:48', '2019-05-26 00:46:55', 400, 5),
(12, 19, '10% off on Bmw Cars', 'The company was founded in 1916 and has its headquarters in Munich, Bavaria. BMW produces motor ', 9, '2018-09-24', '17:26:10', '2019-08-17', NULL, 'bmw-right_600x300.jpg', 12, 9, 7, '2018-09-24 11:56:10', '2019-08-17 02:38:06', 200, 10),
(13, 14, '20% off on latest watches', 'FastTrack was the most popular file sharing network in 2003, and used mainly for the exchange of mus', 3, '2018-09-24', '17:36:18', '2019-03-15', NULL, 'th2.jpg', 13, 9, 7, '2018-09-24 12:06:18', '2019-03-15 02:24:42', 200, 10),
(14, 10, 'La La Land', 'Learn dance with  free music classes', 4, '2018-09-26', '17:17:13', '2018-11-22', NULL, 'Dance_n_music.png', 14, 9, 4, '2018-09-26 11:47:13', '2018-11-22 04:38:52', 400, 20),
(15, 20, 'Free trendy shoe with a Party Dress', 'Buy any Party dress of any value and get a trendy party shoe free', 2, '2018-09-27', '19:28:02', '2018-09-27', NULL, 'download_(8).jpg', 15, 9, 0, '2018-09-27 13:58:02', '2018-09-27 13:58:02', 400, 15),
(16, 20, 'Buy Party dress get free trendy shoe', 'Buy any party dress and get a trendy shoe  free', 2, '2018-09-27', '19:41:50', '2018-10-27', NULL, 'download_(8)1.jpg', 16, 9, 2, '2018-09-27 14:11:50', '2018-10-29 05:04:54', 300, 15),
(17, 8, '90% OFF on filmfare magazine', '90% OFF on filmfare magazine', 4, '2018-10-19', '17:05:50', '2019-01-06', NULL, 'images (3).jpg', 17, 9, 12, '2018-10-02 12:00:16', '2019-01-05 19:29:25', 200, 10),
(18, 8, 'Vogue', '10% off on the magazine', 4, '2018-10-04', '16:03:23', '2020-06-07', NULL, 'vogue-india.jpg', 18, 11, 0, '2018-10-04 10:33:23', '2018-10-05 12:35:07', 400, 10),
(19, 7, 'best deal on every meal ', 'best deal on every meal ', 1, '2018-10-04', '16:16:02', '2019-08-31', NULL, 'whitney-wright-286729-unsplash.jpg', 19, 9, 11, '2018-10-04 10:46:02', '2019-09-01 05:06:33', 400, 5),
(20, 7, 'buy one get one burger', 'buy one get one burger', 1, '2018-10-08', '17:44:33', '2019-07-28', NULL, '15324_SjJmvQFw7kXLJ4kd_.png', 20, 9, 10, '2018-10-08 12:14:33', '2019-07-28 06:39:35', 400, 10),
(21, 7, '60 %  OFF on fries', '60 %  OFF on fries', 1, '2018-10-08', '17:45:58', '2019-06-30', NULL, 'images_(6).jpg', 21, 9, 10, '2018-10-08 12:15:58', '2019-06-29 18:57:59', 400, 10),
(22, 7, 'buy large meal & get a soft drink free ', 'buy large meal & get a soft drink free ', 1, '2018-10-08', '17:50:13', '2019-07-31', NULL, 'm.jpg', 22, 9, 10, '2018-10-08 12:20:13', '2019-07-30 19:05:17', 400, 5),
(23, 7, '30 % OFF on value meal ', '30 % OFF on value meal ', 1, '2018-10-09', '11:03:21', '2019-07-28', NULL, 'images7.jpg', 23, 9, 10, '2018-10-09 05:33:21', '2019-07-28 06:39:35', 400, 5),
(24, 9, 'ttt', 'tt', 1, '2018-10-11', '14:57:56', '2019-01-06', NULL, '41QyiM9TqTL1.jpg', 24, 9, 0, '2018-10-11 09:27:56', '2019-01-05 19:29:25', 400, 5),
(25, 9, 'pantaloon offer', 'pantaloon offer', 2, '2018-10-11', '15:25:34', '2019-01-26', NULL, 'images_(3)1.jpg', 25, 9, 0, '2018-10-11 09:55:34', '2019-01-26 06:37:26', 400, 5),
(26, 8, '25 to 35 % discount on INDIA TODAY', '25 to 35 % discount on INDIA TODAY', 4, '2019-09-16', '13:37:43', '2019-09-29', NULL, '4458-India-Today-English1.jpg', 26, 9, 1, '2018-11-14 09:35:05', '2019-09-29 12:18:46', 400, 20),
(27, 9, ']kj', 'hpioiiguugi\r\n', 5, '2018-11-22', '11:10:26', '2019-01-13', NULL, '41QyiM9TqTL2.jpg', 27, 9, 0, '2018-11-22 05:40:26', '2019-01-12 23:06:41', 200, 10),
(28, 27, 'Free Gold Coin on a Diamond', 'Buy a real Diamond and get a free Gold coin', 12, '2019-01-26', '12:28:04', '2019-02-15', NULL, 'download.jfif', 28, 9, 1, '2019-01-26 06:58:04', '2019-02-16 15:27:59', 400, 20),
(29, 8, 'Filmfare', '20% off on filmfare magazine', 4, '2019-09-16', '13:37:54', '2019-11-15', NULL, 'Filmfare_Magazine_Cover_(1).jpg', 29, 9, 8, '2019-01-28 09:30:39', '2019-11-14 20:31:16', 200, 20),
(30, 28, 'Buy Two Coffees and 3rd one is on Us', 'Buy any two coffees and get a Starbucks  Feb Frappe free', 1, '2019-02-01', '00:45:51', '2019-02-28', NULL, 'images.jfif', 30, 9, 0, '2019-01-31 19:15:51', '2019-02-28 09:53:15', 200, 5),
(31, 28, 'Spend 3000 and get a Starbuck Tshirt', 'spend rs. 3000  and get a Tshirt free', 1, '2019-02-01', '01:03:56', '2019-03-31', NULL, 'download_(4).jfif', 31, 9, 1, '2019-01-31 19:33:56', '2019-03-31 06:26:29', 300, 10),
(32, 29, 'Blazer with a Free Tie', 'Buy a Blazer and get a Tie Free', 2, '2019-02-18', '19:35:49', '2019-03-22', NULL, 'images_(1).jfif', 32, 9, 0, '2019-02-18 14:05:49', '2019-03-23 12:16:02', 200, 10),
(33, 29, 'Free Tie on Blazer', 'Buy a Blazer and get a Tie for free', 2, '2019-02-18', '19:50:50', '2019-03-07', NULL, 'images_(1)1.jfif', 33, 9, 1, '2019-02-18 14:20:50', '2019-03-07 14:54:57', 200, 10),
(35, 32, 'Drool Cool', 'All on Menu for 30% off', 1, '2019-05-15', '18:51:28', '2019-05-15', NULL, 'index9.jpg', 35, 9, 0, '2019-05-15 13:21:28', '2019-05-15 13:29:09', 200, 10),
(36, 32, 'Get Rewarded for every Walk-in', 'Earn Rewards for Walk-in', 12, '2019-05-23', '09:25:09', '2019-05-31', NULL, 'download (3).jpg', 38, 9, 1, '2019-05-15 13:33:29', '2019-05-31 04:41:24', 400, 20),
(38, 8, 'cannes', 'nds fbwred fdcdsaxfdes tgrfdsgfredsww', 2, '2019-05-27', '15:02:39', '2019-05-27', NULL, 'Chrysanthemum.jpg', 40, 9, 0, '2019-05-27 09:32:39', '2019-05-27 09:32:39', 200, 10),
(39, 30, 'Fragrance with Diamond ', 'A Perfume of your choice on a purchase of a Diamond', 2, '2019-06-28', '01:46:29', '2019-07-31', NULL, 'images_(1)3.jpg', 42, 9, 1, '2019-06-27 20:16:29', '2019-07-30 19:05:17', 200, 10),
(41, 30, 'Diamond & Fragrance', 'Buy Diamond and get a Perfume for Free', 2, '2019-08-29', '13:17:22', '2020-02-28', NULL, 'pl1.jpg', 45, 9, 0, '2019-08-29 07:47:22', '2020-02-28 04:50:47', 200, 10),
(42, 49, 'Free Lagoon ride for 2 ', 'Buy a Diamond and get a Free Lagoon Ride for 2', 2, '2019-08-29', '13:49:14', '2020-02-28', NULL, 'di_21.jpg', 47, 9, 0, '2019-08-29 08:19:14', '2020-02-28 04:50:47', 200, 10),
(43, 42, 'Offers for Cruise Travelers', 'Exciting In-shop offers for cruise ship travelers', 2, '2019-08-29', '15:38:46', '2020-02-28', NULL, 'longines_2.jpg', 48, 9, 0, '2019-08-29 10:08:46', '2020-02-28 04:50:47', 200, 10),
(44, 47, 'Finest Jewelry ', 'Tanzanite brings you the Finest Jewelry', 2, '2019-08-29', '15:58:26', '2020-02-28', NULL, 'tanzanite11.jpg', 49, 9, 0, '2019-08-29 10:28:26', '2020-02-28 04:50:47', 200, 10),
(45, 46, 'Extreme Sport Watches', 'Extensive range of wrist watches', 2, '2019-08-29', '16:34:57', '2020-02-28', NULL, 'tg2.jpg', 50, 9, 0, '2019-08-29 11:04:57', '2020-02-28 04:50:47', 200, 10),
(46, 37, 'Mesmerising Gifts', 'Stylist Effy jewelry for gifting', 2, '2019-08-29', '17:08:51', '2020-02-28', NULL, 'effy3.jpg', 51, 9, 0, '2019-08-29 11:38:51', '2020-02-28 04:50:47', 200, 10),
(47, 34, 'Swiss Watch Free on a Diamond', 'Buy Diamond and get a Swiss make Watch Free', 2, '2019-08-29', '17:20:42', '2020-02-28', NULL, 'milano_2.jpg', 52, 9, 0, '2019-08-29 11:50:42', '2020-02-28 04:50:47', 200, 10),
(48, 29, 'Island Blues Sale', '15% off ', 2, '2019-08-29', '17:32:35', '2020-02-28', NULL, 'kays2.jpg', 53, 9, 0, '2019-08-29 12:02:35', '2020-02-28 04:50:47', 200, 10),
(49, 28, 'Island Treasure', 'Deals for Cruise line Tourists ', 2, '2019-08-29', '17:40:45', '2020-02-28', NULL, 'alex_n_ani_1.jpg', 54, 9, 0, '2019-08-29 12:10:45', '2020-02-28 04:50:47', 200, 10),
(50, 27, 'dream IN GREEN', '$ 200 Off on Purchase of $ 1999 or more', 2, '2019-08-29', '17:54:38', '2020-02-28', NULL, 'dream_in_green.jpg', 55, 9, 1, '2019-08-29 12:24:38', '2020-02-28 04:50:47', 200, 10),
(51, 24, 'SALE upto 50 % Off', 'On all product range', 2, '2019-08-29', '18:10:56', '2020-02-28', '07:00:00', 'Sale_Header.jpg', 56, 9, 0, '2019-08-29 12:40:56', '2020-02-28 04:50:47', 2000, 8),
(53, 50, 'Finetune your Looks', 'Fashion for every day', 2, '2019-09-02', '11:50:27', '2019-09-30', NULL, '41.jpg', 58, 9, 1, '2019-09-02 06:20:27', '2019-09-30 10:34:17', 200, 5),
(55, 51, 'GetAmazon Voucher Free', 'You will get an amazon voucher free', 10, '2019-09-16', '13:22:30', '2019-09-30', NULL, 'amazon_gift.jpeg', 60, 9, 0, '2019-09-05 04:05:45', '2019-09-30 10:34:17', 200, 20),
(56, 51, 'VMPL', 'vmpl', 3, '2019-09-16', '13:25:45', '2020-02-28', NULL, 'pavdik3gl_1680x10501.jpg', 61, 9, 2, '2019-09-09 11:13:46', '2020-02-28 04:50:47', 200, 20),
(57, 10, 'Rest in Twist', 'Dance with Resistance Training', 6, '2019-09-10', '16:27:41', '2019-10-31', NULL, 'twist.jpg', 62, 9, 0, '2019-09-10 10:57:41', '2019-10-30 19:18:43', 300, 20),
(58, 7, 'Yummy Tummy', 'Get Rewards n more for walk-ins', 1, '2019-09-10', '16:50:32', '2019-10-31', NULL, 'mcd2.jpg', 63, 9, 2, '2019-09-10 11:20:32', '2019-10-30 19:18:43', 200, 20),
(59, 53, 'Exchange old Toy with New', 'Old Toys Exchange with New Toys', 12, '2019-09-11', '13:20:55', '2019-10-31', NULL, 'toys.jpg', 64, 9, 1, '2019-09-11 07:50:55', '2019-10-30 19:18:43', 400, 20),
(61, 52, '50 % off on Nail Art', 'get 50% off on 1st session', 11, '2019-09-19', '17:50:35', '2019-10-31', NULL, 'nail_art1.jpg', 66, 9, 3, '2019-09-19 12:20:35', '2019-10-30 19:18:43', 400, 10),
(62, 50, '40% off on party wears', '40% off', 2, '2019-09-19', '18:00:22', '2019-10-31', NULL, 'party_wear.jpg', 67, 9, 0, '2019-09-19 12:30:22', '2019-10-30 19:18:43', 400, 10),
(63, 24, 'SALE upto 50 % Off on Women Tops', '50 % Off on Select Women Tops', 2, '2019-09-19', '18:06:44', '2020-02-28', NULL, 'cariloha_offer.jpg', 68, 9, 0, '2019-09-19 12:36:44', '2020-02-28 04:50:47', 300, 10),
(65, 54, '50 % off Sale', 'Discount up to 50%', 12, '2019-09-30', '19:24:20', '2020-02-28', NULL, 'carrefour2.jpg', 70, 9, 0, '2019-09-30 13:54:20', '2020-02-28 04:50:47', 200, 10),
(66, 55, '20% Clothing', 'Get amazing discounts on every item', 12, '2019-10-01', '17:03:51', '2020-02-28', NULL, 'tree_house2.jpg', 71, 9, 0, '2019-10-01 11:33:51', '2020-02-28 04:50:47', 400, 10),
(68, 51, 'VMPL', 'vmpl', 3, '2019-09-16', '13:25:45', '2019-10-15', NULL, 'pavdik3gl_1680x10501.jpg', 61, 9, 2, '2019-09-09 11:13:46', '2019-10-14 21:18:32', 200, 20),
(69, 55, '30 % off on all items', '30% off on all items', 12, '2020-01-16', '16:21:13', '2020-02-29', NULL, 'alex_n_ani_11.jpg', 72, 9, 0, '2020-01-16 10:51:13', '2020-02-28 19:59:52', 200, 10);

-- --------------------------------------------------------

--
-- Table structure for table `T_StoreOfferSocialPoint`
--

CREATE TABLE `T_StoreOfferSocialPoint` (
  `so_social_point_id` int(30) NOT NULL,
  `store_id` int(30) DEFAULT NULL,
  `store_offer_id` int(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `facebook_points` int(20) NOT NULL DEFAULT '0',
  `twitter_points` int(20) NOT NULL DEFAULT '0',
  `walking_points` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_StoreOfferSocialPoint`
--

INSERT INTO `T_StoreOfferSocialPoint` (`so_social_point_id`, `store_id`, `store_offer_id`, `created_date`, `last_updated_date`, `facebook_points`, `twitter_points`, `walking_points`) VALUES
(1, 8, 1, '2018-09-20 12:22:54', '2018-09-20 12:22:54', 20, 20, NULL),
(2, 9, 2, '2018-09-20 12:25:00', '2018-09-20 12:25:00', 12, 12, NULL),
(3, 9, 3, '2018-09-21 06:54:37', '2018-09-21 06:54:37', 12, 12, NULL),
(4, 8, 4, '2018-09-21 08:39:22', '2018-09-21 08:39:22', 12, 20, NULL),
(5, 7, 5, '2018-09-21 08:41:42', '2018-09-21 08:41:42', 30, 24, NULL),
(6, 8, 6, '2018-09-21 08:43:56', '2018-09-21 08:43:56', 12, 24, NULL),
(7, 8, 7, '2018-09-21 08:46:00', '2018-09-21 08:46:00', 12, 20, NULL),
(8, 13, 8, '2018-09-21 09:31:36', '2018-09-21 09:31:36', 12, 24, NULL),
(9, 12, 9, '2018-09-21 09:35:03', '2018-09-21 09:35:03', 12, 12, NULL),
(10, 13, 10, '2018-09-21 10:13:34', '2018-09-21 10:13:34', 12, 12, NULL),
(11, 15, 11, '2018-09-24 11:45:48', '2018-09-24 11:45:48', 12, 12, NULL),
(12, 19, 12, '2018-09-24 11:56:10', '2018-09-24 11:56:10', 20, 20, NULL),
(13, 14, 13, '2018-09-24 12:06:18', '2018-09-24 12:06:18', 20, 20, NULL),
(14, 10, 14, '2018-09-26 11:47:13', '2018-09-26 11:47:13', 8, 4, NULL),
(15, 20, 15, '2018-09-27 13:58:02', '2018-09-27 13:58:02', 10, 6, NULL),
(16, 20, 16, '2018-09-27 14:11:50', '2018-09-27 14:11:50', 10, 6, NULL),
(17, 8, 17, '2018-10-02 12:00:16', '2018-10-02 12:17:49', 16, 8, NULL),
(18, 8, 18, '2018-10-04 10:33:23', '2018-10-04 10:33:23', 20, 10, NULL),
(19, 7, 19, '2018-10-04 10:46:02', '2018-10-04 10:46:02', 12, 4, NULL),
(20, 7, 20, '2018-10-08 12:14:33', '2018-10-08 12:14:33', 40, 40, NULL),
(21, 7, 21, '2018-10-08 12:15:58', '2018-10-08 12:15:58', 40, 40, NULL),
(22, 7, 22, '2018-10-08 12:20:13', '2018-10-08 12:20:13', 40, 40, NULL),
(23, 7, 23, '2018-10-09 05:33:21', '2018-10-09 05:33:21', 40, 36, NULL),
(24, 9, 24, '2018-10-11 09:27:56', '2018-10-11 09:27:56', 40, 40, NULL),
(25, 9, 25, '2018-10-11 09:55:34', '2018-10-11 09:55:34', 40, 40, NULL),
(26, 8, 26, '2018-11-14 09:35:05', '2018-11-14 09:35:05', 12, 12, NULL),
(27, 9, 27, '2018-11-22 05:40:26', '2018-11-22 05:40:26', 12, 12, NULL),
(28, 27, 28, '2019-01-26 06:58:04', '2019-01-26 06:58:04', 6, 4, NULL),
(29, 8, 29, '2019-01-28 09:30:39', '2019-01-28 09:30:39', 20, 20, NULL),
(30, 28, 30, '2019-01-31 19:15:51', '2019-01-31 19:15:51', 6, 4, NULL),
(31, 28, 31, '2019-01-31 19:33:56', '2019-01-31 19:33:56', 10, 6, NULL),
(32, 29, 32, '2019-02-18 14:05:49', '2019-02-18 14:05:49', 10, 4, NULL),
(33, 29, 33, '2019-02-18 14:20:50', '2019-02-18 14:20:50', 10, 4, NULL),
(34, 27, 34, '2019-03-28 07:24:04', '2019-03-28 07:24:04', 20, 20, NULL),
(35, 32, 35, '2019-05-15 13:21:28', '2019-05-15 13:21:28', 10, 4, NULL),
(36, 32, 36, '2019-05-15 13:33:29', '2019-05-15 13:33:29', 10, 4, NULL),
(37, 30, 37, '2019-05-18 11:02:12', '2019-05-18 11:02:12', 4, 4, NULL),
(38, 8, 38, '2019-05-27 09:32:39', '2019-05-27 09:32:39', 10, 10, NULL),
(39, 30, 39, '2019-06-27 20:16:29', '2019-06-27 20:16:29', 10, 4, NULL),
(40, 42, 40, '2019-08-06 12:21:39', '2019-08-06 12:21:39', 12, 4, NULL),
(41, 30, 41, '2019-08-29 07:47:22', '2019-08-29 07:47:22', 10, 4, NULL),
(42, 49, 42, '2019-08-29 08:19:14', '2019-08-29 08:19:14', 4, 4, NULL),
(43, 42, 43, '2019-08-29 10:08:46', '2019-08-29 10:08:46', 4, 4, NULL),
(44, 47, 44, '2019-08-29 10:28:26', '2019-08-29 10:28:26', 4, 4, NULL),
(45, 46, 45, '2019-08-29 11:04:57', '2019-08-29 11:04:57', 14, 10, NULL),
(46, 37, 46, '2019-08-29 11:38:51', '2019-08-29 11:38:51', 6, 6, NULL),
(47, 34, 47, '2019-08-29 11:50:42', '2019-08-29 11:50:42', 8, 4, NULL),
(48, 29, 48, '2019-08-29 12:02:35', '2019-08-29 12:02:35', 4, 4, NULL),
(49, 28, 49, '2019-08-29 12:10:45', '2019-08-29 12:10:45', 6, 6, NULL),
(50, 27, 50, '2019-08-29 12:24:38', '2019-08-29 12:24:38', 4, 4, NULL),
(51, 24, 51, '2019-08-29 12:40:56', '2019-08-29 12:40:56', 20, 4, NULL),
(52, 22, 52, '2019-08-29 12:50:18', '2019-08-29 12:50:18', 12, 12, NULL),
(53, 50, 53, '2019-09-02 06:20:27', '2019-09-02 06:20:27', 10, 4, NULL),
(54, 51, 54, '2019-09-03 10:20:29', '2019-09-03 10:20:29', 4, 4, NULL),
(55, 51, 55, '2019-09-05 04:05:45', '2019-09-05 04:05:45', 12, 12, NULL),
(56, 51, 56, '2019-09-09 11:13:46', '2019-09-09 11:13:46', 4, 4, NULL),
(57, 10, 57, '2019-09-10 10:57:41', '2019-09-10 10:57:41', 6, 4, NULL),
(58, 7, 58, '2019-09-10 11:20:32', '2019-09-10 11:20:32', 4, 4, NULL),
(59, 53, 59, '2019-09-11 07:50:55', '2019-09-11 07:50:55', 20, 8, NULL),
(60, 52, 60, '2019-09-19 12:16:34', '2019-09-19 12:16:34', 40, 4, NULL),
(61, 52, 61, '2019-09-19 12:20:35', '2019-09-19 12:20:35', 40, 4, NULL),
(62, 50, 62, '2019-09-19 12:30:22', '2019-09-19 12:30:22', 16, 4, NULL),
(63, 24, 63, '2019-09-19 12:36:44', '2019-09-19 12:36:44', 4, 4, NULL),
(64, 54, 64, '2019-09-30 13:48:27', '2019-09-30 13:48:27', 4, 4, NULL),
(65, 54, 65, '2019-09-30 13:54:20', '2019-09-30 13:54:20', 4, 4, NULL),
(66, 55, 66, '2019-10-01 11:33:51', '2019-10-01 11:33:51', 10, 10, NULL),
(67, 51, 68, '2019-09-09 11:13:46', '2019-10-01 13:43:57', 4, 4, NULL),
(68, 55, 69, '2020-01-16 10:51:13', '2020-01-16 10:51:13', 10, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `T_StoreOfferTermCondition`
--

CREATE TABLE `T_StoreOfferTermCondition` (
  `offer_term_condition_id` int(30) NOT NULL,
  `text` text NOT NULL,
  `remark` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_StoreOfferTermCondition`
--

INSERT INTO `T_StoreOfferTermCondition` (`offer_term_condition_id`, `text`, `remark`, `created_date`, `last_updated_date`) VALUES
(1, 'Check the latest offers every month.', NULL, '2018-09-20 12:22:54', '2018-09-20 12:22:54'),
(2, '50 % off on clothing', NULL, '2018-09-20 12:25:00', '2018-09-20 12:25:00'),
(3, 'Buy 2 get 1 free offer ', NULL, '2018-09-21 06:54:37', '2018-10-25 09:00:47'),
(4, '50% OFF on femina magazine', NULL, '2018-09-21 08:39:22', '2018-09-21 08:39:22'),
(5, '20% OFF on meal ', NULL, '2018-09-21 08:41:42', '2018-09-21 08:41:42'),
(6, '10% OFF on FILMFARE magazine', NULL, '2018-09-21 08:43:56', '2018-09-21 08:43:56'),
(7, '30% OFF on OUTLOOK magazine', NULL, '2018-09-21 08:46:00', '2018-09-21 08:46:00'),
(8, '50% OFF on Nike bags', NULL, '2018-09-21 09:31:36', '2018-09-21 09:31:36'),
(9, '20% OFF on Adidas shoes', NULL, '2018-09-21 09:35:03', '2018-09-21 09:35:03'),
(10, 'upto 60 % OFF on Nike footwear & apparel', NULL, '2018-09-21 10:13:34', '2018-10-26 09:53:44'),
(11, '50 % OFF on watches', NULL, '2018-09-24 11:45:48', '2018-09-24 11:45:48'),
(12, 'Following are the terms and conditions.', NULL, '2018-09-24 11:56:10', '2018-09-24 11:56:10'),
(13, 'following are the terms and conditions.', NULL, '2018-09-24 12:06:18', '2018-09-24 12:06:18'),
(14, 'Studio reserves right to Admissions .\r\nExtension of two days will be given for missed classes\r\nIts an performing art, skill  acquisition depends on  candidates ability ', NULL, '2018-09-26 11:47:13', '2018-09-26 11:47:13'),
(15, 'Bogo Offer', NULL, '2018-09-27 13:58:02', '2018-09-27 13:58:02'),
(16, 'Bogo offer\r\nfree Shoe  from sale section only', NULL, '2018-09-27 14:11:50', '2018-09-27 14:11:50'),
(17, '90% OFF on filmfare magazine', NULL, '2018-10-02 12:00:16', '2018-10-02 12:17:01'),
(18, 'Following are the terms and conditions', NULL, '2018-10-04 10:33:23', '2018-10-04 10:33:23'),
(19, 'best deal on every meal ', NULL, '2018-10-04 10:46:02', '2018-10-04 10:46:02'),
(20, 'buy one get one burger', NULL, '2018-10-08 12:14:33', '2018-10-08 12:14:33'),
(21, '60 %  OFF on fries', NULL, '2018-10-08 12:15:58', '2018-10-08 12:15:58'),
(22, 'buy large meal & get a soft drink free ', NULL, '2018-10-08 12:20:13', '2018-10-08 12:20:13'),
(23, '30 % OFF on value meal ', NULL, '2018-10-09 05:33:21', '2018-10-09 05:33:21'),
(24, 'tt', NULL, '2018-10-11 09:27:56', '2018-10-11 09:27:56'),
(25, 'pantaloon offer', NULL, '2018-10-11 09:55:34', '2018-10-11 09:55:34'),
(26, '25 to 35 % discount on INDIA TODAY', NULL, '2018-11-14 09:35:05', '2018-11-14 09:35:05'),
(27, 'rgdfg', NULL, '2018-11-22 05:40:26', '2018-11-22 05:40:26'),
(28, '* Offer is valid only on the purchase of Diamond\r\n* The purchase value should be minimum Rs. 200,000\r\n* Offer is applicable only once during offer period\r\n* Free Gold coin is 1 gm 24k \r\n ', NULL, '2019-01-26 06:58:04', '2019-01-26 06:58:04'),
(29, 'Following are the terms and conditions', NULL, '2019-01-28 09:30:39', '2019-01-28 09:30:39'),
(30, '* Offer valid  only for Starbucks Powai Outlet\r\n* Minimum Order Value Rs. 300\r\n* Offer is Valid only on Weekdays', NULL, '2019-01-31 19:15:51', '2019-01-31 19:15:51'),
(31, '* Minimum bill amount rs 3000\r\n* Offer is valid only for Single bill of rs 3000 and above\r\n\r\n* ', NULL, '2019-01-31 19:33:56', '2019-01-31 19:33:56'),
(32, '* Neck Tie is free on purchase of a Blazer only\r\n* Minimum price of Blazer above rs. 4000\r\n* Free Tie from a select range only', NULL, '2019-02-18 14:05:49', '2019-02-18 14:05:49'),
(33, 'Free Tie on a Purchase of a Blazer\r\nmin price of balzer 4000', NULL, '2019-02-18 14:20:50', '2019-02-18 14:20:50'),
(34, 'Offer – Shop for Rs.1499 and get Rs.250 off\r\n    Validity- Offer is valid till 31st December 2019.\r\n    Offer is valid on all the categories.\r\n    If the order is cancelled, only the money paid would be reimbursed and not the cart value.\r\n    Coupon can be used only once by the same customer\r\n    This offer cannot be clubbed with any other offer.\r\n\r\n', NULL, '2019-03-28 07:24:04', '2019-03-28 07:24:04'),
(35, 'For Friends meeting after long time\r\nshow your old photo to avail offer\r\ndiscount limited to  Rs 500.00', NULL, '2019-05-15 13:21:28', '2019-05-15 13:21:28'),
(36, 'For Friends meeting after long\r\nshow your old photo & avail\r\ndiscount limited to rs 500.00', NULL, '2019-05-15 13:25:09', '2019-05-15 13:25:09'),
(37, 'For Buddies meeting after long\r\nshow old photo & Avail\r\nDis. limited to rs 500.00', NULL, '2019-05-15 13:27:56', '2019-05-15 13:27:56'),
(38, 'Points for Walk -in', NULL, '2019-05-15 13:33:29', '2019-05-23 03:55:09'),
(39, 'Min. inv amount $ 5000\r\nFree Perfume up to MRP $100', NULL, '2019-05-18 11:02:12', '2019-05-18 11:02:12'),
(40, 'rttrhytgvfdsfrggvdcxsza ewgetgfvdxs', NULL, '2019-05-27 09:32:39', '2019-05-27 09:32:39'),
(41, 'Minimum Purchase value $2000\r\nFree Perfume MRP $ 50', NULL, '2019-06-27 20:08:38', '2019-06-27 20:08:38'),
(42, 'Min inv value of $2000\r\nFree Perfume MRP $50', NULL, '2019-06-27 20:16:29', '2019-06-27 20:16:29'),
(43, 'Offer applicable for a min purchase of Rs. 5000', NULL, '2019-08-06 12:21:39', '2019-08-06 12:21:39'),
(44, 'Offer can be availed on a min. purchase of $3000\r\n', NULL, '2019-08-29 07:40:31', '2019-08-29 07:40:31'),
(45, 'Offer can be availed on a min. purchase value of $2000', NULL, '2019-08-29 07:47:22', '2019-08-29 07:47:22'),
(46, 'dfsdffd', NULL, '2019-08-29 08:13:07', '2019-08-29 08:13:07'),
(47, 'Offer can be availed on a min. purchase value of $10000 \r\nFor details contact store reception ', NULL, '2019-08-29 08:19:14', '2019-08-29 08:19:14'),
(48, 'Valid only for cruise ship tourists', NULL, '2019-08-29 10:08:46', '2019-08-29 10:08:46'),
(49, 'Tanzanite\'s Merchandise Policy', NULL, '2019-08-29 10:28:26', '2019-08-29 10:28:26'),
(50, 'Tag Heuer Global Warranty', NULL, '2019-08-29 11:04:57', '2019-08-29 11:04:57'),
(51, 'Effy Product Policy', NULL, '2019-08-29 11:38:51', '2019-08-29 11:38:51'),
(52, 'Offer valid on a purchase of $5k and above', NULL, '2019-08-29 11:50:42', '2019-08-29 11:50:42'),
(53, 'Kay\'s merchandise policy', NULL, '2019-08-29 12:02:35', '2019-08-29 12:02:35'),
(54, 'Deals exclusive for cruise line tourists', NULL, '2019-08-29 12:10:45', '2019-08-29 12:10:45'),
(55, 'CMI sale policy', NULL, '2019-08-29 12:24:38', '2019-08-29 12:24:38'),
(56, 'Cariloha sale policy', NULL, '2019-08-29 12:40:56', '2019-08-29 12:40:56'),
(57, 'Dol Sol offer policy', NULL, '2019-08-29 12:50:18', '2019-08-29 12:50:18'),
(58, 'Store Policy', NULL, '2019-09-02 06:20:27', '2019-09-02 06:20:27'),
(59, 'sample', NULL, '2019-09-03 10:20:29', '2019-09-03 10:20:29'),
(60, 'You need be inside of the shop ', NULL, '2019-09-05 04:05:45', '2019-09-05 04:05:45'),
(61, 'vmpl', NULL, '2019-09-09 11:13:46', '2019-09-09 11:13:46'),
(62, 'Customer Service Policy', NULL, '2019-09-10 10:57:41', '2019-09-10 10:57:41'),
(63, 'store policy', NULL, '2019-09-10 11:20:32', '2019-09-10 11:20:32'),
(64, 'Store Exchange Policy', NULL, '2019-09-11 07:50:55', '2019-09-11 07:50:55'),
(65, 'store policy', NULL, '2019-09-19 12:16:34', '2019-09-19 12:16:34'),
(66, 'store policy', NULL, '2019-09-19 12:20:35', '2019-09-19 12:20:35'),
(67, 'store policy', NULL, '2019-09-19 12:30:22', '2019-09-19 12:30:22'),
(68, 'store policy', NULL, '2019-09-19 12:36:44', '2019-09-19 12:36:44'),
(69, 'store sale policies', NULL, '2019-09-30 13:48:27', '2019-09-30 13:48:27'),
(70, 'store sale policies', NULL, '2019-09-30 13:54:20', '2019-09-30 13:54:20'),
(71, 'not transferrBLE', NULL, '2019-10-01 11:33:51', '2019-10-01 11:33:51'),
(72, 'shop policies', NULL, '2020-01-16 10:51:13', '2020-01-16 10:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `T_Superadmin`
--

CREATE TABLE `T_Superadmin` (
  `id` int(30) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Superadmin`
--

INSERT INTO `T_Superadmin` (`id`, `email`, `password`) VALUES
(1, 'supercashrub@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `T_User`
--

CREATE TABLE `T_User` (
  `user_id` int(30) NOT NULL,
  `user_type_id` int(30) NOT NULL,
  `is_social` int(20) NOT NULL DEFAULT '0',
  `fb_userid` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_send_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activity` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `otp` int(20) NOT NULL DEFAULT '0',
  `otp_verify` int(20) NOT NULL DEFAULT '0',
  `country_code` varchar(10) NOT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `profile_image` text,
  `gender` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status_id` int(50) NOT NULL,
  `reminder_switch` enum('0','1') NOT NULL,
  `sound_switch` enum('0','1') NOT NULL,
  `redeem_switch` enum('0','1') NOT NULL,
  `walkin_switch` enum('0','1') NOT NULL,
  `sharing_offer_switch` enum('0','1') NOT NULL,
  `sharing_app_switch` enum('0','1') NOT NULL,
  `device_token` text,
  `access_token` varchar(100) DEFAULT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `otp_auth_id` int(11) NOT NULL,
  `device_id` varchar(250) NOT NULL,
  `email_token` text,
  `email_verified` int(11) NOT NULL DEFAULT '0',
  `ref_port_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_User`
--

INSERT INTO `T_User` (`user_id`, `user_type_id`, `is_social`, `fb_userid`, `name`, `email`, `email_send_time`, `activity`, `password`, `otp`, `otp_verify`, `country_code`, `phone_number`, `profile_image`, `gender`, `city`, `state`, `address`, `status_id`, `reminder_switch`, `sound_switch`, `redeem_switch`, `walkin_switch`, `sharing_offer_switch`, `sharing_app_switch`, `device_token`, `access_token`, `reg_date`, `reg_time`, `created_date`, `last_updated_date`, `otp_auth_id`, `device_id`, `email_token`, `email_verified`, `ref_port_id`) VALUES
(2, 0, 0, NULL, 'teju', 'tejunangare@gmail.com', '2020-02-19 15:06:35', NULL, 'bcc720f2981d1a68dbd66ffd67560c37', 2703, 1, '', '9657067822', '5bb1e8a09f293.jpg', 'female', 'Pune,  Maharashtra', NULL, 'Pune', 1, '0', '0', '0', '0', '0', '0', 'cc7nQxSQCoQ:APA91bGuGnvHI-RoTSUpeO-3GUmGW4CxCQmrZJorVGl2LPNtuAaR0Uy-E2Fi3YSn_ofWuejYJNWXmdhqzba4-T-b8L5gSpyZSQ9Zx3RPjmeUw9R4Ac_o9hQ9xIv3z8h2oK-fOpq39GTR', '030682d908c2e17cfb250e67983880d0', '2018-09-20', '17:31:06', '2018-09-20 12:01:06', '2020-02-19 15:06:35', 2, '1eb3d1d517e75edd', '', 1, 0),
(3, 0, 0, NULL, 'Nidhi Tiwari', 'nidhitiwari2208@gmail.com', '2020-02-24 16:20:36', NULL, 'e10adc3949ba59abbe56e057f20f883e', 9725, 1, '', '8319837942', '5bc07de9a7a67.jpg', 'female', 'Pune,  Maharashtra', NULL, 'alcove society', 1, '0', '0', '0', '0', '0', '0', 'dE6DeBW43Oo:APA91bHaGsid7QN6riQ2qCqiojl6M1sP8_Pvkj1EPYdmqmLLJs7-wBnIgaktHRYJqfsmviWzuvdjhMlAIfq2HHvn_O4J_RC_-vjOw3ClSM7CzhgH92BgBnovu6d0NNAgKvsU2bm0eAlO', 'a8920b408f359556dfe690c8bc5c13e7', '2018-09-20', '17:32:32', '2018-09-20 12:02:32', '2020-02-24 16:20:36', 3, '764815dead3ddac5', '', 1, 0),
(4, 0, 0, NULL, 'Nikhil Gunjal', 'nikhilgunjal@gmail.com', '2020-02-28 15:45:22', NULL, 'c2e0accd8def3cca4ab6ad66b4c0cf20', 6234, 1, '91', '9970393889', '5ce5383d80fd1.jpg', 'male', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'duZ6VS-waMI:APA91bHXVziVUtqAqdOrJ5zrS0chtUsFaNR07xLo5kWbHPxtmzaX7gZEAz3Za2RsGGh1n6S--D-Gwi9AZbcgDACf3mi4wxd2sw3koTGfbEN7KIhSBXmXsqm0wvdjkqjNSjNHW5EC1XxP', 'b7dec8dd62f98cc7e2bfb4fe434d654b', '2018-09-20', '17:37:54', '2018-09-20 12:07:54', '2020-02-28 15:45:22', 4, 'b1607e8ba1c681d5', '', 1, 1),
(7, 0, 0, NULL, 'Amol Pomane', 'amolpomane@gmail.com', '2020-02-26 16:02:22', NULL, '8ef6a2653802c273cb7c333e3fff00fd', 6390, 1, '91', '8983462134', '5ba8f5587290f.jpg', 'male', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'eNbDAKhYKaw:APA91bGwZ1fw-gmMQ8_eW0ISFIWaGz_NBdxvRnvtTOZwxnurSdfV2kKjQ2fu1S3iQ-IcFp83LJMwEylSDibWAL-6mHFITdiyhXg5gwcWdtBTbGyWdFWif87nzrqW04Kh7_Cu3LZEx4X1', '7aeee145ecb870d1a9ca8fc3c60258f2', '2018-09-24', '19:59:13', '2018-09-24 14:29:13', '2020-02-26 16:02:22', 7, '85cd5b7a2553834a', '7141b36d511e18371e8aebc0e3b657b4', 0, 1),
(8, 0, 0, NULL, 'Devika Deshmukh', 'devika09.deshmukh@gmail.com', '2019-09-13 10:12:25', NULL, 'cda3948b3c102457b07b3320ce7a2eb1', 1699, 1, '', '8983243404', '5bc07e2ad1190.jpg', 'female', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'fo34Zz0XR1A:APA91bH2Gb6ouVOkvOFKb7jgSQyiWPveVc9JkSVkopLwo8PeF643BkuzVWgeBwkRtCyWilUsM_Ypkz3dnQpYiqU_sUPBu7J-EJRpV9rVz839fhh8f9cfcl5CVvwrAD6pkb-MIcdqAFxg', 'b88f3605da64d6d2fa7da9ef1d73ad93', '2018-09-25', '11:30:58', '2018-09-25 06:00:58', '2019-09-13 10:12:25', 12, '6cd51ce9cf85b17b', '1f9c5f7c3d768b92684b006ddc1f7432', 0, 0),
(9, 0, 0, NULL, 'sweety bhagwat', 'sweety.bhagwat123@gmail.com', '2019-02-24 10:24:49', NULL, '96a6d90dbe7b6c80e2ec72faea8e7f00', 5611, 1, '', '9096774102', '5bc07f6158440.jpg', 'female', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'cdsY4rdGF5Y:APA91bG2CT8UWP27NCSSqDTHR9EjoFyHsKLdtQcWqmkK5Q_mNRRlAlD661pjJFZ5fFRl5UHlNI82ye4Fb0nX8KmNiEfrwGhc4wJXob2GK9oTQ4RzNaTldMcfxY8r70m0G1UuV9XvbpZS', '928fc3c28dd7c31f5d8981f24ee29b83', '2018-09-25', '11:56:15', '2018-09-25 06:26:15', '2019-02-24 10:24:49', 13, '68da7d577443ca60', 'a59e0bf7fa6da1195e28c6efdd55221a', 0, 0),
(10, 0, 0, NULL, 'Prapti', 'praptigadoya123@gmail.com', '2018-10-12 11:00:12', NULL, '2b43d91fe07d107165f90cf8b69d159d', 5300, 1, '', '9067509769', '5bc07ebc90775.jpg', 'female', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'cdsY4rdGF5Y:APA91bG2CT8UWP27NCSSqDTHR9EjoFyHsKLdtQcWqmkK5Q_mNRRlAlD661pjJFZ5fFRl5UHlNI82ye4Fb0nX8KmNiEfrwGhc4wJXob2GK9oTQ4RzNaTldMcfxY8r70m0G1UuV9XvbpZS', '31f2192fd335978c35687da175ab9062', '2018-09-25', '14:33:32', '2018-09-25 09:03:32', '2018-10-12 11:00:12', 26, '9be8aa2a51b8616e', '515d4d91897d42253e75f2dcab3a876c', 0, 0),
(11, 0, 0, NULL, 'Pritam Bora', 'pritambora05@gmail.com', '2018-09-25 09:05:12', NULL, '8a805d6234d1707924f282a6c081c560', 5403, 1, '', '9011192083', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'dlGt4PpOCOk:APA91bEMdXUib5tk8ulx-g2OAYfYnrDwpHqg9uvcMVey7uu7D-llNxEJQoila1Kmimi6LVdHmw8y1zrPn4n_dkN-DaL_4NyrNO_r1nAVXArA6kdnb86pvVUjfgy5kmIxjWtB06CfTNcU', '5ffbab1c1539a020de3e742abbcaccda', '2018-09-25', '14:34:36', '2018-09-25 09:04:36', '2018-09-25 09:05:12', 27, '85afdd36990c2f13', '0c6469a790fe9753954a9212575a3621', 0, 0),
(12, 0, 0, NULL, 'Snehal Bhole', 'snehalbhole4@gmail.com', '2018-09-25 10:55:35', NULL, 'e10adc3949ba59abbe56e057f20f883e', 5007, 1, '', '9860012437', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'dF248spyIrU:APA91bH33QtG2xGB1eeQ-yE4M-DIKAmco5e45WzIKAXDZPWk7F62oJl7Y2gAtLd0Oq6STRswjVI7Sz6ZsVI8_F4N_t3g38ESDCKY4hwitzNj3_jwdU5eqnnGCsq-9kRih357xC8LNnEf', 'fa33deee9382fc948c712478093e9872', '2018-09-25', '16:25:35', '2018-09-25 10:55:35', '2018-09-25 10:55:35', 28, '', 'f2d089622960ec5ee97041649891c2be', 0, 0),
(13, 0, 0, NULL, 'Snehal Bhole', 'snehalbhole2015@gmail.com', '2018-10-09 10:41:49', NULL, 'bcc720f2981d1a68dbd66ffd67560c37', 8184, 1, '', '8484837453', NULL, 'female', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'cLenLTVgl70:APA91bEY6TxXJeKz9btaiIils4gdyky00GjGo-z_3Aft99jwmBY-trujosYm7c1TOuFwl3B605kNkuIB_Zrvi4-zoOB9AsAveLvWBifCmau7qMs0uwwpNe2EtCCDnxaFtAKi12EIoHQe', '3030f062902455382d2e1817a8e1be14', '2018-09-26', '12:54:50', '2018-09-26 07:24:50', '2018-10-09 10:41:49', 29, 'e6f8350c9450a6cd', '35a0d62d909b3e0ffd8ca9534eae9659', 0, 0),
(14, 0, 0, NULL, 'Hira Gunjal', 'hirasgunjl@gmail.com', '2019-09-26 18:34:12', NULL, 'c2e0accd8def3cca4ab6ad66b4c0cf20', 6598, 1, '', '8407904157', '5c4ab0cbc7ad0.jpg', 'female', 'pune', NULL, 'Bavdhan', 1, '0', '0', '0', '0', '0', '0', 'ckrG2bJH_HQ:APA91bG8dQGBfpn5aGv1rHbZzL3E6N4l6Ughhrb1mB47qa1BNSorF8QVZ2mniU2EyH-ZwQk8q2SxKuMA7rXJpX-QEYXIEVOOBr3cKOnDOD3g_F0kyFp6BDYBfCZBHpZRbVXpfpUMsP0e', '8aea63c5c791ee67b1e568d45de887d5', '2018-09-28', '13:37:06', '2018-09-28 08:07:06', '2019-09-26 18:34:12', 36, 'a21abe17f6c34f09', '540ccb2591a96deb8d076a0849bc6ff5', 0, 0),
(16, 0, 0, NULL, 'Ttt', 'cashrub94@gmil.com', '2020-02-12 04:30:55', NULL, '50906479ea774bbe35b1dca979409997', 8082, 1, '', '9168738167', NULL, 'female', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'ff7a4yKbj1w:APA91bEn7SwiKmjqQKUiOjN8Z3nxE8d9vd2zhbWWTUPPgZwARoHwvRFlmYMf_29DICeGHTbpVvQA1smwQKv8M2vlFYVNJHssRVR5ehQIjSiQ39GNLjVQSJiAHd_tJLdi3e-q0Paulv98', '30153d4242652bba43b8b8b9ac178bee', '2018-09-28', '17:46:43', '2018-09-28 12:16:43', '2020-02-12 04:30:55', 39, '23e24b597dc3e283', '', 1, 0),
(17, 0, 0, NULL, 'SANJAY WARAT', 'sanwar39@gmail.com', '2018-09-29 02:03:34', NULL, '54a8c7aa7fa0088b2a0acb6d4a951165', 7980, 1, '', '9158992196', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'daPDGtjk2TQ:APA91bFSuwL5pAxJB2qZAicA8_fUIAyKjR4lfUjtggoodwBa4tMsnsnYz1z3F4FoMUNrOCVVr8rlGlZbqyd966B1DSZmtI1Rhke8y9QH0hm2wSgMhwdtlD9sGawEENn0M1xkln2sgS6p', '2a0fbed9edd890b61fa20450d639fbaf', '2018-09-28', '22:46:55', '2018-09-28 17:16:55', '2018-09-29 02:03:34', 40, '1be460a656ffd46a', '', 1, 0),
(18, 0, 0, NULL, 'Mrunal Warat', 'mruwar36@gmail.com', '2018-10-05 17:27:22', NULL, '3b7f08ec56c4ad0dcaf1ebaaf56dba7d', 8636, 1, '', '9158992197', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'cEn124pSOKw:APA91bG-qR0QV_SfRgbGa1jqhCr5Op4s8_ITzRgmnQigskfCzHxynMkayJBv-SmoNmAPXiFAACmxxCInl7KZo703doKX5RLS1n2-wvDNCDCpbaXHXwLYQbQwGYLnrbyE-RGegTXaehIX', 'a6d48c60109f796b3c06ba2761bd57c2', '2018-10-05', '22:56:54', '2018-10-05 17:26:54', '2018-10-05 17:27:22', 41, '6f7aa186dabb50c9', 'ab89fa9fa35e3297b1bc54d3d4ff94a0', 0, 0),
(20, 0, 2, NULL, 'John', 'ashishjagtap94@gmail.com', '2019-08-05 14:53:09', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1234, 1, '', '12233234232', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'cUqie2xSvek:APA91bEhejUAbPyeW33lEo_8CQQkA-hGvurcaQCLzwsJnQdcAiiHLjRfUIZH3mzuxFoYo3jUAft9YuaRtWSsZ0UG5XdIXApDF5rOSkjwqe5k-EGThtqX2QXgRVlLnxZoDfbL2-sH1226', 'dff7787eec7f118cde56b0411375e33e', '2019-01-24', '12:25:11', '2019-01-24 06:55:11', '2019-08-05 14:53:09', 0, 'b4e541c351344edc', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 0),
(21, 0, 0, NULL, 'Parikshit Patil', 'pptl1991@gmail.com', '2019-09-09 12:47:02', NULL, '9d90aa0ac2d4c38dfd621aa2fdd22362', 2950, 1, '', '9323630004', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'f10anIisSyQ:APA91bGxsYA3anzdPmroHAS69mj46F3M2eVqvjoSUPZ_Ft6uIk-3gf1uDsk6ROFZ4D-FRUUZbVg3XV_av79AWXEjzoSZ1CGHJwX9P8q9x8AXOfgEZPQvFtlV7gUk260xzgByyI0H-7jk', 'e613915580cc5c730bb907b51f8fe294', '2019-01-25', '16:44:49', '2019-01-25 11:14:49', '2019-09-09 12:47:02', 116, '71b6c0e7c97da45d', '85d45cf4a75c64266235027e6144b476', 0, 0),
(22, 0, 0, NULL, 'Janhavi Sawant', 'janhavi.sawant111@gmail.com', '2019-01-25 13:14:55', NULL, '9d90aa0ac2d4c38dfd621aa2fdd22362', 3243, 1, '', '9975912492', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fW8bWpUCQlc:APA91bGhnpncTBXqTFOWi0wt7S7apblZMASrQ2JIl5bunZujLbvsQ1dQqwE5otz0kHBJIlWe58bWuI8luHSRaDny--ATlbAPT0fdz2wVMS1yBXsKbF_W7Ks5JYf-j_8DwKrbfmPfcb-1', '8f96557bb80d8eec83dc2750d30d03c1', '2019-01-25', '16:52:32', '2019-01-25 11:22:32', '2019-01-25 13:14:55', 117, 'af3b60e620b1dd05', '8e6f2bd7c442734e2bdccb2a46706c7c', 0, 0),
(23, 0, 0, NULL, 'Prasad', 'prasad1790@gmail.com', '2019-01-25 12:12:23', NULL, '9d90aa0ac2d4c38dfd621aa2fdd22362', 5569, 1, '', '8888758611', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fkvybpQH4_s:APA91bEcE1TPKeWncCjS1aPH-crHy9xAzLyXpV8P3hQvthX29YlJBBW0UpUtclA3rtwGYXBj-NXvIB7rseRyEVnsIBNxLQ72ph3pbzCOFPF_uk9GTKazwQ9uaD0sVypqsuJz7ae8wj8e', 'a8ab5969a4216bb6a7fb5765f5dfd4eb', '2019-01-25', '17:42:23', '2019-01-25 12:12:23', '2019-01-25 12:12:23', 124, '', '34c750387e22f5e2d942845c5a973845', 0, 0),
(24, 0, 0, NULL, 'Bhim', 'bhojrajdevkota36@gmail.com', '2019-01-25 14:03:14', NULL, '11cb1c1a69debaa2bddddf74e649670a', 2888, 1, '', '8624942991', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'cSME6PPg4Qo:APA91bHWfrNJn-3BvG7gAhwUPa0bLAY82owuzQqM6Wbrwc4cRRZXXCaPdCSeKMut8-8u_6u0tqB5FXWUFM50yM-mydiUfzjTf4iQGTV9VnxBUlgIe2K_LNKqehC5bH-bnfFfveM-aika', 'f74a4cff87867c1cc0667a6735b1909e', '2019-01-25', '19:32:45', '2019-01-25 14:02:45', '2019-01-25 14:03:14', 137, 'c31e45304d5c5767', '9bfa10ea0ba4934cd000c69274876c71', 0, 0),
(25, 0, 0, NULL, 'Trupti', 'truptikate94@gmail.com', '2019-02-05 12:32:51', NULL, '3148692a22faa702f42d488c349903dc', 7235, 1, '', '9405573645', NULL, 'female', NULL, NULL, ' ', 1, '0', '0', '0', '0', '0', '0', 'dq51iacUZuI:APA91bFE2aa7m9O6Ng_Y1GjXEaiPLIKzrdbCNsgKNZIswmS_L9_hmiXYKQcdhFt-n5uPK42mBvFto_IRdvyOfVtMpk-LS-u3_N8H87Kq6XZQwkNr2tYwRdrNU2mbY_W8lYoHhNAXEeUp', 'afdf1fda116bcdc4978fd772f78e0408', '2019-01-26', '22:10:54', '2019-01-26 16:40:54', '2019-02-05 12:32:51', 142, 'e33611cba485e993', '8414b0013a8361dad0faa4be676c6530', 0, 0),
(26, 0, 0, NULL, 'vertexmobisoft', 'vertexmobisoft@gmail.com', '2019-02-05 11:46:47', NULL, 'c2e0accd8def3cca4ab6ad66b4c0cf20', 8370, 1, '', '7650958215', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'eNFNYbI1Ndk:APA91bGEOAAHdNdNyb5MZ4XA6eAVp5msr6rBPwKjdsBrlX5X5-mDg307ru1XPSNVSyd-VJO8QydWy7_3eU9R4DzAnJ-tcg7ywXFOcDBZdZKCw0xdVnqsvESaUkq26GBn3FtzJ9WYv13I', 'c5fdf6d7218363a8fd4609d0d0c03843', '2019-02-05', '17:15:48', '2019-02-05 11:45:48', '2019-02-05 11:46:47', 182, 'd9679936036af921', '8807ee3274c27a414f22c49c88dc2604', 0, 0),
(28, 0, 0, NULL, 'Yuvraj Zende', 'xyz@gmail.com', '2019-02-19 12:50:23', NULL, '3e5da6526ffac7b54b6e87afa0f4a9f8', 9196, 1, '', '8308995666', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'dDnpbHURe20:APA91bHagZe0VJhCn05NnQSL3-VGCoetC06lke99H9Zae8OZyMVR0Jn9COMd8WSOrzkFJYId85iatmkWr8xVMijbUHskBbJRo_AQMSpT12VvPeiDC3Fj9Qs5uKWers9ReAAfGBl4Y7tk', 'bb86f505e44d1df1bc82f45dac444abe', '2019-02-19', '18:20:23', '2019-02-19 12:50:23', '2019-02-19 12:50:23', 192, '', '97f0f82d0db41891fd09f0c3cbaa1042', 0, 0),
(29, 0, 0, NULL, 'Vishal', 'vishalgunjal9@gmail.com', '2019-02-21 14:16:26', NULL, 'd05f5a5b1dd61e8307d3c74ba8483e75', 3084, 1, '', '9890199009', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fiuAcP3D8-I:APA91bHBszGATBB-5XovP0E53QfPFeBqh4ek5TtvWHUWNBUdtG2i1VApeeUFpVvTXMF85jq8SFIpcKfkmwviT91QmO9bxhLu_4q0oEbCCWmDLzAmV4stKizmzVrNmcNYluTqoyF3JGuI', 'ca71343a528f96fb2ddeee459f68e29b', '2019-02-21', '19:45:57', '2019-02-21 14:15:57', '2019-02-21 14:16:26', 193, 'cbc07da9a0c64f1b', 'be02f9c40e31bc1c035ddfa09d005294', 0, 0),
(30, 0, 0, NULL, 'Vishnu Kumar Mirotha', 'vishalmirotha205@gmail.com', '2019-03-07 09:00:49', NULL, '1a3ec8cb798da1eb4272419eaf8d3f51', 2358, 1, '', '9983505478', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'c5EDYNujZ6A:APA91bG44lnydGOdnOM-V8otrjva2wCEOHgL_f6zmMCdRz4vOErmcC_7lA1tO6opHYMebKVuVcmjNPSxawngnU9Awe5zRG-QJSz3R8qrg6rR5gm3f2FqK6ONWltb5zwN73rUE4OPUKed', '2835b4612718053ae0d8a313d437a83e', '2019-03-07', '14:30:33', '2019-03-07 09:00:33', '2019-03-07 09:00:49', 194, '173faadbb2dc78a4', '0791f842683d939801477d61eba0015f', 0, 0),
(31, 0, 0, NULL, 'Abdul Samad Irfan Shaik', 'balirfan92@gmail.com', '2019-03-11 15:32:29', NULL, 'ea4f4339e0d27dbb0e7b4525ad3bdc2f', 5103, 1, '', '9700563665', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'f6A8evhaDXk:APA91bESF2yYMcXxawvaMlRl01eU3P0zhRr47XRq_s7-SaxjMcpDY_9jPwMKfakVb6L8-Vcs_b-imAg5kNaLDzHTYrCTH4SqokxlbmLoLIVHZsAtY5Vh7s29lDHYJL8F-pyMX_hy9QsP', 'd174d5c3018402ad177d03ca2faf0efe', '2019-03-11', '21:01:07', '2019-03-11 15:31:07', '2019-03-11 15:32:29', 195, '', '', 1, 0),
(32, 0, 0, NULL, 'Irfan', 'sahasworld92@gmail.com', '2019-03-11 15:37:15', NULL, '297646c9b8c1be6907089b53e3c83955', 3475, 1, '', '7207741534', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'f6A8evhaDXk:APA91bESF2yYMcXxawvaMlRl01eU3P0zhRr47XRq_s7-SaxjMcpDY_9jPwMKfakVb6L8-Vcs_b-imAg5kNaLDzHTYrCTH4SqokxlbmLoLIVHZsAtY5Vh7s29lDHYJL8F-pyMX_hy9QsP', 'd99a63e8577c79d04fa0dce4bea48255', '2019-03-11', '21:06:26', '2019-03-11 15:36:26', '2019-03-11 15:37:15', 196, '', '', 1, 0),
(33, 0, 0, NULL, 'Gauravkumar Kate', 'gauravkumar.kate@gmail.com', '2019-03-13 23:21:19', NULL, 'f3f20990f12679c126993c10a44a2a63', 6338, 1, '', '9920515559', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'd12fzBuUy3g:APA91bFx7DkWRCgnKTt_2xny6LBviCN-ihCTsc8W7neohNnzsRuI6bpjeSwxUk6pwbsMbtT2-5j_n07F15EDuQuUBBTFHG_bFAmTKRSaS-WnFy9-D3zc9slZrkLVDnKSrpLHEHzfASA_', 'c24f0792328ad9a85d3bbd8960de6e54', '2019-03-14', '04:51:01', '2019-03-13 23:21:01', '2019-03-13 23:21:19', 197, 'bee6adb4eb02d27e', 'f9763ea3a0264e4768555341e8e2a29e', 0, 0),
(34, 0, 0, NULL, 'Shubham Doshi', 'shubhamdoshi77@gmail.com', '2019-03-17 15:57:57', NULL, '0ce6c5d181b6282573fdd8ad024256b6', 7665, 1, '', '9422814907', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'dhhkMfURiH8:APA91bFQN2uTed3O_Gj3cdTZqzhLPc2DGZ8jrJUhjd2ydeU7qxr5PlqOTY72Sx7VlM-VEMkmUz2GtHy4lYtE6BBVGDpecvz-niP8dPP_E5mmVtlZWSMi1wHiwYOigenBB-f9uZCj_whR', '07984037255a03c51e783a437c80cbbc', '2019-03-17', '21:27:17', '2019-03-17 15:57:17', '2019-03-17 15:57:57', 198, '22113189f9637d88', '', 1, 0),
(35, 0, 0, NULL, 'John Doe', 'rxplus2018rxplus2018@gmail.com', '2019-05-27 05:04:52', NULL, '25f9e794323b453885f5181f1b624d0b', 6111, 1, '', '6364908547', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'cZPcPkQJiog:APA91bFWVYp2jqt-Hr2mSd-dFqhc8Eaz1FWbJ2FwZvbwfjPbrjPNFAuJMw4BkspKJEJPDae6FyLdIIIt6-tuJydYX4I7ay_mNMlLiY2TwUPu6u0z-fNNyW5q-Fdq_GZNNo_TdYniTk0O', 'ff4f9fe898d76bd3aaa46f990ccd0b45', '2019-05-27', '10:34:52', '2019-05-27 05:04:52', '2019-05-27 05:04:52', 202, '', '63a6968b61e3b40d5f153c8ca6d54bc6', 0, 0),
(36, 0, 0, NULL, 'John Doe', 'rxplus2018rxplus2018@gmail.com', '2019-05-27 05:04:52', NULL, '25f9e794323b453885f5181f1b624d0b', 6111, 1, '', '6364908547', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'cZPcPkQJiog:APA91bFWVYp2jqt-Hr2mSd-dFqhc8Eaz1FWbJ2FwZvbwfjPbrjPNFAuJMw4BkspKJEJPDae6FyLdIIIt6-tuJydYX4I7ay_mNMlLiY2TwUPu6u0z-fNNyW5q-Fdq_GZNNo_TdYniTk0O', 'ff4f9fe898d76bd3aaa46f990ccd0b45', '2019-05-27', '10:34:52', '2019-05-27 05:04:52', '2019-05-27 05:04:52', 202, '', '63a6968b61e3b40d5f153c8ca6d54bc6', 0, 0),
(38, 0, 0, NULL, 'Hiren Gabani', 'hirengabani72@gmail.com', '2020-03-04 16:45:54', NULL, 'e10adc3949ba59abbe56e057f20f883e', 1492, 1, '91', '8153004388', NULL, 'male', 'Surat,  Gujarat', NULL, 'surat', 1, '0', '0', '0', '0', '0', '0', 'fORwyYqWU8A:APA91bFFJG1QRW4jFlZhgeEWBpsReyx9_C0dPSdUvIIpeDeBLoHRQ-hDhNSpcb6i9yw4VmvtXK27Z2lZREl_yBFR14K16oDg80AjbLaSLgCLacXyrBJ5ZMQOja4ngNRUrZJ9yfTkQT4I', '01b6f8506a0fe0574320c446404bc563', '2019-09-24', '21:41:13', '2019-09-24 16:11:13', '2020-03-04 16:45:54', 246, '5873d99b0f979506', '63ef1c7d54040d593b24c6bf0d7e226c', 0, 2),
(39, 0, 0, NULL, 'Cccc', 'chintan@gmail.com', '2020-02-23 16:46:54', NULL, 'e10adc3949ba59abbe56e057f20f883e', 8888, 1, '91', '1112223334', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'eFrBL4LYf88:APA91bEVNUuOu0qT_PfilQxRkKlve8hZOBwOPYJcnQXPU3GqF_2CSR38Tvmbn3Ihs0fDOmCL870XzOhPVc3I9p3LiGKbAn0E7PoEfzi17uTgw09vzMPQY6Oylw8JEMGXh_kx9Da_hS5G', 'c2e5b96b494e2292c47c0d03797f1012', '2019-09-26', '11:52:05', '2019-09-26 06:22:05', '2020-02-23 16:46:54', 249, 'd9d41abe30973d69', '94b89373f9a190c326eb7db746fbe8b0', 0, 0),
(40, 0, 0, NULL, 'Swapnil G', 'swapnilgawai@vertexmobisoft.com', '2019-09-26 10:40:01', NULL, 'e10adc3949ba59abbe56e057f20f883e', 8888, 1, '', '9511747397', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'c0bUfYxl9vM:APA91bFnqQ1iMUQPuz2gRgLgL2K8vbCdL4kdzOMSmOgkAvHcY8wm-dqZoqRmMh8LdJJ6lnT-u3JLSt8l72KRfBltsY_PE5KTr1BDS2c4t8i3pccwxUauHZjQWqc5U0IVGlm1MPLGVZxl', '43be61a9d9d7d6169fcc3356d7c7f788', '2019-09-26', '16:09:41', '2019-09-26 10:39:41', '2019-09-26 10:40:01', 258, '28694c87c1db5175', '91c61eba893a66e65a7e25e4db0a51fe', 0, 0),
(42, 0, 0, NULL, 'Hiren Gabani', 'jsninfo72@gmail.com', '2020-02-09 04:53:49', NULL, 'e10adc3949ba59abbe56e057f20f883e', 8888, 1, '', '9979264387', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'djtuFYouSks:APA91bHuklxmPEmWHf1YJ9hL45_PuYuXA9sqDyUihnIVF9IOxbTy42z02j42uYGcm345oZh8xBpsGldQeGagFZc2qke1k_Xkb1QSaAOfkV9C5CfkDRs0KzR7TAVuMN0wzv-dB9OVzlpy', '03501b19ed584ec213536c8691ab79c2', '2020-02-09', '10:23:23', '2020-02-09 04:53:23', '2020-02-09 04:53:49', 309, 'bbc09bff51c4223b', 'f7d081a684bf6c172f3b93b34e2c5622', 0, 0),
(43, 0, 0, NULL, 'Amit', 'malkanipokna@yahoo.com', '2020-02-09 14:14:34', NULL, '1e17c20ee20d0a2c86421a23699bf77d', 8888, 1, '', '1242436047', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fsjB1mjaRBU:APA91bFCogAQiFE34vFnd6hV2D8yYqF7RW9Rv8Nhvde5MZ18viMPsg1SmFajuDYnG97_9hDwh8xdOgeEjnbzxRMXZPn-0nhKV7_0gJhDuXmA4RPjn_16A_KuaeJwP_RUeR-ghZH0pRNC', '8652dfc8a78d178fb9d3184684c98521', '2020-02-09', '19:44:34', '2020-02-09 14:14:34', '2020-02-09 14:14:34', 312, '', '3197f16fe1cdc91f6d4adb915dcd7695', 0, 0),
(46, 0, 0, NULL, 'Ashok keswani', 'ashokgkeswani@gmail.com', '2020-02-18 03:06:04', NULL, '35a8ae72adfef0db1501572845d9222c', 8888, 1, '', '3453286408', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'dqG4vHVojnQ:APA91bEvfMe_l6f0yHsJe1pDXHrwbUsR7WYL_whhc5t0SUKkfp8IbHrwouXKt1DgQFE6ly6xoeUOIwBPMcdVy94prqJijOV20sYz3wg9F5tQzMK93Oih3wkB67c9RjiH6sYNw2v2DAbw', 'e0e4e29be68c25781b13cb8630a3ed9c', '2020-02-18', '08:33:02', '2020-02-18 03:03:02', '2020-02-18 03:06:04', 327, '02448b2a9e184647', 'b45a7f56cadc7ff415ac50f2b45b7246', 0, 2),
(47, 0, 0, NULL, 'Ajay Murjani', 'djaj5000@yahoo.com', '2020-02-18 20:50:50', NULL, 'b032e9270fa7b66d175471ba41155435', 8888, 1, '', '2424338740', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'etOsTl-MMxA:APA91bFEZ9MmIug7EnwbTwQER1sub8qsqZavcH4W0aycuslhhFARxMYNko4Vs6HVO9GVmOHNHxNlUSSyt6vDt7YzmBW9gBM2IXboKTe7htCUbjQWvUWh_l09eIP6N66Bh-rQA0r2VYm4', 'ec08307a35f774b5cc1b1b157703bea1', '2020-02-19', '02:20:08', '2020-02-18 20:50:08', '2020-02-18 20:50:50', 328, '2a9ebfb3dc7ace22', '61fdafd365b8f96a5471a9f3f0dd441c', 0, 2),
(48, 0, 0, NULL, 'Pradeep', 'sonunagdev@yahoo.com', '2020-02-18 20:52:37', NULL, '68b996df274db9c4c76efc9d9a0c0dd7', 8888, 1, '', '2424655711', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fZAw6GeSTXs:APA91bEGNTrabyGI_bdr40beUn1T8l6AJ24YZTrs-oY3Hf4pb7lgtnJAgSc4Q86ya1p9A--iQFbKM3Tp6zKfrbz7D5lmB5b9BQ-BRzR2CX-TOct3wHL_oinnFHEJgkzqvxn5ITqvNu35', 'be9b17d4e6d2921280fc9e6ccfea0e5b', '2020-02-19', '02:22:01', '2020-02-18 20:52:01', '2020-02-18 20:52:37', 329, '1aa8be25a43aeb47', '4b27aff0face08e933c00b367a80cdaa', 0, 2),
(49, 0, 0, NULL, 'Chintan', 'chintandhameliya777@gmail.com', '2020-02-25 17:07:19', NULL, 'e10adc3949ba59abbe56e057f20f883e', 7067, 1, '91', '8153997112', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fxZ7b12NyG8:APA91bGlTl9iEK6reRxRUMkQDv9RA5I5auDGH0r5AVB-tyyyhMezdkATkx9l1Gx-kHa0aTkU3Wb1PRABvD_HP3YpdHJFSm4FdWaVVJQL6pasYdo2OCZeNcu0MmcyPLtdG2UuMt9E7wGB', '6c927a46870437e8d43c36747f0f3674', '2020-02-24', '21:50:02', '2020-02-24 16:20:02', '2020-02-25 17:07:19', 334, '3fca3f4f97108821', 'b20eb601306867f7ad6f85e96508d513', 0, 1),
(50, 0, 0, NULL, 'Amit Malkani', 'amitmalkani38@icloud.com', '2020-03-02 21:06:54', NULL, 'e10adc3949ba59abbe56e057f20f883e', 4684, 1, '1', '2424360479', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'cM1HWszRR9k:APA91bGj649tEdL6oENxDHwWQM8XdZlOLfC-NPscehVZ1Zg_FgpY9T0xD6c7e4GaZWmebbBSvqeLjb4W0srZLzgSTt_1Yp0p-qbFoQRRBVLfejlBlJhq4ZOqhWPBvaV5W7Uiiixa_U_5', '50abf1bdc318b439c631b348061ccd42', '2020-02-25', '21:00:19', '2020-02-25 15:30:19', '2020-03-02 21:06:54', 340, 'df55a59aeceb7c42', '7e8d8c934e8156deb26f7ad5d1bb0752', 0, 2),
(51, 0, 0, NULL, 'Dilip', 'dulipcm@gmail.com', '2020-02-25 17:07:17', NULL, 'd3367164b422bd8fd536dfdb8867a1c2', 5072, 1, '1', '2424482448', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'fxZ7b12NyG8:APA91bGlTl9iEK6reRxRUMkQDv9RA5I5auDGH0r5AVB-tyyyhMezdkATkx9l1Gx-kHa0aTkU3Wb1PRABvD_HP3YpdHJFSm4FdWaVVJQL6pasYdo2OCZeNcu0MmcyPLtdG2UuMt9E7wGB', '546d227b1daa2aaa76801c164b44e264', '2020-02-25', '22:36:48', '2020-02-25 17:06:48', '2020-02-25 17:07:17', 341, '49d06891f2686cb1', 'aacab5fe2f5468cd0a98e2aa57fa57f3', 0, 1),
(52, 0, 0, NULL, 'Tejas Valani', 'tejasvalani@yahoo.in', '2020-02-25 18:43:37', NULL, 'c2081239d5da6a3f2e171c13f30b1d01', 7129, 1, '1', '2428280505', NULL, NULL, NULL, NULL, NULL, 1, '0', '0', '0', '0', '0', '0', 'eTWp1cgQcvQ:APA91bFFwAluBQ_HZz0x4NvjYu41oHf1oaxZhZwWmLmF7-wJSjacyImXiqvZ09jA1iCUlWTKCUywI2Acmsj7pgyr-xexAub3OO9ukdFSVPtO7kX_Mc-WGvrWV372SSfH9tH-SdlKrOpb', '84aea450c27847b558f71bd3fe1975c7', '2020-02-25', '23:21:35', '2020-02-25 17:51:35', '2020-02-25 18:43:37', 343, '76c5ae2b140300ec', '37bac3fc6d018114ec6742a5ecf76756', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `T_UserFavorites`
--

CREATE TABLE `T_UserFavorites` (
  `favorite_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `favorite_type` varchar(50) NOT NULL,
  `type_id` int(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_UserFavorites`
--

INSERT INTO `T_UserFavorites` (`favorite_id`, `user_id`, `favorite_type`, `type_id`, `created_date`, `last_updated_date`) VALUES
(1, 4, 'store', 10, '2018-09-20 13:01:17', '2018-09-20 13:01:17'),
(3, 1, 'store', 12, '2018-09-23 09:01:01', '2018-09-23 09:01:01'),
(8, 2, 'offer', 5, '2018-09-24 05:24:06', '2018-09-24 05:24:06'),
(13, 1, 'offer', 9, '2018-09-24 06:21:09', '2018-09-24 06:21:09'),
(14, 1, 'offer', 5, '2018-09-24 06:21:17', '2018-09-24 06:21:17'),
(16, 2, 'offer', 7, '2018-09-24 06:28:08', '2018-09-24 06:28:08'),
(22, 3, 'store', 12, '2018-09-24 09:11:55', '2018-09-24 09:11:55'),
(23, 3, 'store', 7, '2018-09-24 09:12:00', '2018-09-24 09:12:00'),
(24, 3, 'store', 8, '2018-09-24 09:12:15', '2018-09-24 09:12:15'),
(26, 6, 'store', 12, '2018-09-24 11:12:40', '2018-09-24 11:12:40'),
(27, 6, 'store', 17, '2018-09-25 07:02:58', '2018-09-25 07:02:58'),
(29, 3, 'store', 14, '2018-09-26 06:11:46', '2018-09-26 06:11:46'),
(30, 7, 'offer', 1, '2018-09-26 11:19:23', '2018-09-26 11:19:23'),
(31, 7, 'store', 7, '2018-09-26 11:25:04', '2018-09-26 11:25:04'),
(35, 2, 'store', 8, '2018-09-28 06:24:36', '2018-09-28 06:24:36'),
(36, 2, 'offer', 4, '2018-09-28 06:27:31', '2018-09-28 06:27:31'),
(40, 6, 'offer', 5, '2018-09-28 06:42:00', '2018-09-28 06:42:00'),
(44, 6, 'offer', 4, '2018-09-28 06:47:38', '2018-09-28 06:47:38'),
(45, 6, 'offer', 1, '2018-09-28 06:47:42', '2018-09-28 06:47:42'),
(46, 6, 'offer', 3, '2018-09-28 06:47:54', '2018-09-28 06:47:54'),
(47, 6, 'offer', 2, '2018-09-28 06:47:59', '2018-09-28 06:47:59'),
(49, 6, 'offer', 14, '2018-09-28 06:48:16', '2018-09-28 06:48:16'),
(50, 6, 'offer', 9, '2018-09-28 06:48:21', '2018-09-28 06:48:21'),
(51, 6, 'offer', 12, '2018-09-28 06:48:26', '2018-09-28 06:48:26'),
(52, 6, 'offer', 13, '2018-09-28 06:48:32', '2018-09-28 06:48:32'),
(56, 6, 'store', 13, '2018-10-03 18:10:03', '2018-10-03 18:10:03'),
(57, 2, 'offer', 13, '2018-10-04 09:49:03', '2018-10-04 09:49:03'),
(58, 2, 'offer', 1, '2018-10-05 09:53:41', '2018-10-05 09:53:41'),
(59, 4, 'store', 6, '2018-10-06 12:52:50', '2018-10-06 12:52:50'),
(60, 3, 'store', 20, '2018-10-11 09:58:34', '2018-10-11 09:58:34'),
(61, 3, 'offer', 6, '2018-10-11 09:59:16', '2018-10-11 09:59:16'),
(63, 4, 'offer', 2, '2018-10-15 11:12:29', '2018-10-15 11:12:29'),
(64, 4, 'offer', 14, '2018-10-15 11:12:42', '2018-10-15 11:12:42'),
(71, 4, 'offer', 4, '2018-10-15 11:17:50', '2018-10-15 11:17:50'),
(72, 4, 'offer', 4, '2018-10-15 11:17:54', '2018-10-15 11:17:54'),
(73, 2, 'offer', 23, '2018-10-15 11:18:55', '2018-10-15 11:18:55'),
(76, 6, 'offer', 7, '2018-10-17 09:26:13', '2018-10-17 09:26:13'),
(77, 6, 'store', 19, '2018-10-17 12:07:03', '2018-10-17 12:07:03'),
(78, 1, 'offer', 8, '2018-10-30 05:47:37', '2018-10-30 05:47:37'),
(79, 1, 'offer', 23, '2018-10-30 05:48:10', '2018-10-30 05:48:10'),
(80, 1, 'offer', 10, '2018-10-30 05:48:39', '2018-10-30 05:48:39'),
(81, 1, 'offer', 17, '2018-10-30 05:49:38', '2018-10-30 05:49:38'),
(82, 19, 'offer', 23, '2018-10-30 06:06:37', '2018-10-30 06:06:37'),
(83, 19, 'offer', 6, '2018-10-30 06:06:45', '2018-10-30 06:06:45'),
(84, 19, 'store', 13, '2018-10-30 06:08:08', '2018-10-30 06:08:08'),
(85, 19, 'store', 8, '2018-10-30 06:08:18', '2018-10-30 06:08:18'),
(87, 2, 'offer', 2, '2018-11-01 09:35:10', '2018-11-01 09:35:10'),
(88, 2, 'offer', 3, '2018-11-01 09:35:27', '2018-11-01 09:35:27'),
(89, 2, 'store', 9, '2018-11-01 09:35:54', '2018-11-01 09:35:54'),
(90, 16, 'offer', 17, '2018-11-01 09:52:21', '2018-11-01 09:52:21'),
(91, 16, 'offer', 17, '2018-11-01 09:52:26', '2018-11-01 09:52:26'),
(92, 16, 'offer', 17, '2018-11-01 09:54:25', '2018-11-01 09:54:25'),
(93, 16, 'offer', 17, '2018-11-01 09:54:30', '2018-11-01 09:54:30'),
(94, 16, 'offer', 17, '2018-11-01 09:54:34', '2018-11-01 09:54:34'),
(95, 2, 'offer', 6, '2018-11-14 09:32:15', '2018-11-14 09:32:15'),
(97, 19, 'offer', 26, '2018-11-15 05:15:25', '2018-11-15 05:15:25'),
(98, 19, 'offer', 17, '2018-11-15 05:15:30', '2018-11-15 05:15:30'),
(99, 19, 'offer', 17, '2018-11-15 05:15:38', '2018-11-15 05:15:38'),
(100, 19, 'offer', 4, '2018-11-15 05:15:43', '2018-11-15 05:15:43'),
(101, 2, 'offer', 26, '2018-11-20 11:16:15', '2018-11-20 11:16:15'),
(102, 4, 'offer', 28, '2019-01-28 14:28:29', '2019-01-28 14:28:29'),
(104, 4, 'offer', 10, '2019-01-28 14:28:55', '2019-01-28 14:28:55'),
(105, 4, 'offer', 12, '2019-01-28 14:29:27', '2019-01-28 14:29:27'),
(106, 4, 'offer', 12, '2019-01-28 14:29:29', '2019-01-28 14:29:29'),
(107, 4, 'store', 27, '2019-01-28 14:29:50', '2019-01-28 14:29:50'),
(108, 4, 'store', 8, '2019-01-28 14:29:57', '2019-01-28 14:29:57'),
(109, 4, 'offer', 3, '2019-01-28 14:31:08', '2019-01-28 14:31:08'),
(110, 4, 'offer', 3, '2019-01-28 14:31:09', '2019-01-28 14:31:09'),
(111, 4, 'offer', 3, '2019-01-28 14:31:10', '2019-01-28 14:31:10'),
(112, 7, 'store', 8, '2019-05-01 09:19:51', '2019-05-01 09:19:51'),
(113, 4, 'offer', 36, '2019-05-22 10:54:44', '2019-05-22 10:54:44'),
(114, 4, 'offer', 23, '2019-05-22 10:55:03', '2019-05-22 10:55:03'),
(115, 3, 'offer', 29, '2019-05-22 11:00:29', '2019-05-22 11:00:29'),
(116, 3, 'offer', 23, '2019-05-22 11:00:45', '2019-05-22 11:00:45'),
(117, 4, 'offer', 26, '2019-05-22 11:01:05', '2019-05-22 11:01:05'),
(118, 3, 'store', 22, '2019-05-22 11:01:29', '2019-05-22 11:01:29'),
(119, 3, 'store', 16, '2019-05-22 11:01:40', '2019-05-22 11:01:40'),
(120, 3, 'offer', 34, '2019-05-22 11:01:58', '2019-05-22 11:01:58'),
(121, 7, 'offer', 58, '2019-09-11 03:42:19', '2019-09-11 03:42:19'),
(122, 37, 'offer', 57, '2019-09-16 13:56:59', '2019-09-16 13:56:59'),
(123, 37, 'store', 8, '2019-09-20 11:25:16', '2019-09-20 11:25:16'),
(127, 44, 'offer', 41, '2020-02-09 14:42:09', '2020-02-09 14:42:09'),
(128, 44, 'offer', 41, '2020-02-09 14:42:09', '2020-02-09 14:42:09'),
(129, 41, 'offer', 49, '2020-02-09 15:29:09', '2020-02-09 15:29:09'),
(130, 41, 'store', 27, '2020-02-09 22:30:34', '2020-02-09 22:30:34'),
(131, 4, 'offer', 65, '2020-02-10 10:50:09', '2020-02-10 10:50:09'),
(132, 4, 'store', 57, '2020-02-10 10:50:33', '2020-02-10 10:50:33'),
(133, 4, 'offer', 49, '2020-02-10 10:52:39', '2020-02-10 10:52:39'),
(134, 7, 'offer', 66, '2020-02-10 10:53:26', '2020-02-10 10:53:26'),
(135, 7, 'offer', 50, '2020-02-10 10:53:31', '2020-02-10 10:53:31'),
(136, 7, 'store', 27, '2020-02-10 10:54:35', '2020-02-10 10:54:35'),
(137, 7, 'store', 49, '2020-02-10 10:54:39', '2020-02-10 10:54:39'),
(139, 44, 'store', 37, '2020-02-12 16:19:16', '2020-02-12 16:19:16'),
(140, 44, 'store', 30, '2020-02-12 16:19:24', '2020-02-12 16:19:24'),
(142, 4, 'store', 28, '2020-02-18 19:04:16', '2020-02-18 19:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `T_UserPoint`
--

CREATE TABLE `T_UserPoint` (
  `user_point_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `facebook_points` int(10) DEFAULT '0',
  `twitter_points` int(10) DEFAULT '0',
  `walking_points` int(10) DEFAULT '0',
  `reward_points` int(50) NOT NULL DEFAULT '0',
  `paytm_redeem_rubs` int(20) NOT NULL DEFAULT '0',
  `coupon_redeem_rubs` int(20) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_UserPoint`
--

INSERT INTO `T_UserPoint` (`user_point_id`, `user_id`, `facebook_points`, `twitter_points`, `walking_points`, `reward_points`, `paytm_redeem_rubs`, `coupon_redeem_rubs`, `created_date`, `last_updated_date`) VALUES
(1, 3, 322, 316, 578, 0, 20, 32, '2018-09-20 12:23:53', '2019-05-22 10:40:06'),
(2, 5, 0, 0, 10, 0, 0, 0, '2018-09-20 12:31:02', '2018-09-20 12:31:02'),
(3, 4, 242, 358, 2018, 0, 100, 544, '2018-09-20 12:35:50', '2020-02-21 07:26:14'),
(4, 1, 104, 0, 40, 0, 0, 0, '2018-09-20 12:36:12', '2018-10-26 06:46:56'),
(5, 2, 326, 296, 424, 30, 60, 86, '2018-09-20 12:37:35', '2018-11-30 10:03:59'),
(6, 6, 356, 276, 180, 0, 0, 12, '2018-09-21 05:24:19', '2018-10-26 05:20:16'),
(7, 7, 60, 72, 392, 0, 46, 190, '2018-09-24 14:40:03', '2019-11-22 06:03:23'),
(8, 8, 0, 156, 94, 10, 0, 0, '2018-09-25 11:31:23', '2019-09-13 10:19:38'),
(9, 9, 20, 20, 40, 10, 0, 0, '2018-09-25 11:56:33', '2019-01-28 10:38:18'),
(10, 10, 114, 192, 236, 10, 4, 32, '2018-09-25 14:33:58', '2019-01-28 09:36:31'),
(11, 11, 0, 0, 10, 0, 0, 0, '2018-09-25 09:10:35', '2018-09-25 09:10:35'),
(12, 13, 0, 0, 54, 0, 0, 0, '2018-09-26 07:42:04', '2018-10-09 11:25:47'),
(13, 14, 0, 0, 384, 0, 0, 294, '2018-09-28 08:16:30', '2019-09-26 18:46:58'),
(14, 15, 0, 0, 200, 0, 0, 0, '2018-09-28 11:31:20', '2018-11-01 10:10:22'),
(15, 17, 10, 0, 60, 0, 0, 0, '2018-09-29 13:28:30', '2018-10-10 16:10:18'),
(16, 18, 0, 0, 10, 0, 0, 0, '2018-10-07 16:30:00', '2018-10-07 16:30:00'),
(17, 19, 56, 0, 120, 0, 0, 0, '2018-10-26 06:36:42', '2019-01-03 07:00:57'),
(18, 16, 24, 36, 50, 0, 0, 0, '2018-10-31 11:21:22', '2018-11-13 09:16:26'),
(19, 24, 0, 0, 20, 0, 0, 0, '2019-01-25 14:09:39', '2019-02-04 11:40:35'),
(20, 25, 24, 32, 80, 0, 0, 0, '2019-01-26 16:42:21', '2019-03-06 05:23:24'),
(21, 26, 0, 0, 10, 0, 0, 0, '2019-02-05 11:52:03', '2019-02-05 11:52:03'),
(22, 27, 0, 0, 10, 0, 0, 0, '2019-02-05 12:02:27', '2019-02-05 12:02:27'),
(23, 21, 0, 8, 90, 0, 0, 0, '2019-06-03 09:43:12', '2019-09-02 06:27:53'),
(24, 40, 0, 0, 10, 0, 0, 0, '2019-09-26 10:47:27', '2019-09-26 10:47:27'),
(25, 41, 0, 0, 390, 0, 0, 0, '2019-09-28 14:50:02', '2020-02-25 00:46:41'),
(26, 44, 0, 0, 40, 0, 0, 0, '2020-02-18 19:54:38', '2020-02-24 21:19:31'),
(27, 45, 0, 0, 10, 0, 0, 0, '2020-02-22 14:46:21', '2020-02-22 14:46:21'),
(28, 51, 0, 0, 20, 0, 0, 0, '2020-02-25 17:12:24', '2020-03-03 14:46:05'),
(29, 52, 0, 0, 50, 0, 0, 0, '2020-02-25 18:45:19', '2020-03-04 14:48:24'),
(30, 50, 0, 0, 160, 0, 0, 0, '2020-02-25 20:32:43', '2020-03-05 02:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `T_UserReviews`
--

CREATE TABLE `T_UserReviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `user_image` text,
  `store_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_UserReviews`
--

INSERT INTO `T_UserReviews` (`review_id`, `user_id`, `user_name`, `user_image`, `store_id`, `comment`, `rating`, `created_date`, `last_updated_date`) VALUES
(1, 3, 'Nidhi Tiwari', NULL, 8, 'Excellent', 5, '2018-09-21 10:52:50', '2018-09-21 10:52:50'),
(2, 2, 'teju', NULL, 8, 'Good', 4, '2018-09-24 06:52:04', '2018-09-24 06:52:04'),
(3, 3, 'Nidhi Tiwari', NULL, 7, 'Good', 4, '2018-09-25 10:31:16', '2018-09-25 10:31:16'),
(4, 3, 'Nidhi Tiwari', NULL, 19, 'Excellent', 5, '2018-09-25 10:34:45', '2018-09-25 10:34:45'),
(5, 3, 'Nidhi Tiwari', NULL, 14, 'Excellent', 5, '2018-09-25 10:40:00', '2018-09-25 10:40:00'),
(6, 3, 'Nidhi Tiwari', NULL, 12, 'Good', 4, '2018-09-25 11:01:00', '2018-09-25 11:01:00'),
(7, 4, 'Nikhil Gunjal', NULL, 7, 'Good', 4, '2018-09-25 18:35:49', '2018-09-25 18:35:49'),
(8, 7, 'Amol Pomane', '5ba8f5587290f.jpg', 8, 'Excellent', 5, '2018-09-26 11:22:44', '2018-09-26 11:22:44'),
(9, 4, 'Nikhil Gunjal', '5bab7fc7b9c34.jpg', 10, 'Excellent', 5, '2018-09-26 15:01:10', '2018-09-26 15:01:10'),
(10, 4, 'Nikhil Gunjal', '5bab7fc7b9c34.jpg', 8, 'Good', 4, '2018-10-02 12:27:42', '2018-10-02 12:27:42'),
(11, 17, 'SANJAY WARAT', NULL, 20, 'Good', 4, '2018-10-07 07:03:01', '2018-10-07 07:03:01'),
(12, 4, 'Nikhil Gunjal', '5bab7fc7b9c34.jpg', 15, 'Good', 4, '2018-10-07 07:12:44', '2018-10-07 07:12:44'),
(13, 4, 'Nikhil Gunjal', '5bab7fc7b9c34.jpg', 15, 'Good', 4, '2018-10-07 07:13:45', '2018-10-07 07:13:45'),
(14, 2, 'teju', '5bb1e8a09f293.jpg', 7, 'Poor', 2, '2018-10-08 09:20:07', '2018-10-08 09:20:07'),
(15, 6, 'Truptikate', NULL, 7, 'Good', 4, '2018-10-09 07:02:36', '2018-10-09 07:02:36'),
(16, 6, 'Truptikate', NULL, 7, 'Good', 4, '2018-10-09 07:03:03', '2018-10-09 07:03:03'),
(17, 8, 'Devika Deshmukh', NULL, 7, 'Excellent', 5, '2018-10-09 09:58:04', '2018-10-09 09:58:04'),
(18, 8, 'Devika Deshmukh', NULL, 7, 'Excellent', 5, '2018-10-09 09:58:29', '2018-10-09 09:58:29'),
(19, 8, 'Devika Deshmukh', NULL, 7, 'Excellent', 5, '2018-10-09 09:58:52', '2018-10-09 09:58:52'),
(20, 8, 'Devika Deshmukh', NULL, 7, 'Excellent', 5, '2018-10-09 09:59:25', '2018-10-09 09:59:25'),
(21, 4, 'Nikhil Gunjal', '5bbf42f8191b5.jpg', 9, 'Good', 4, '2018-10-13 09:45:30', '2018-10-13 09:45:30'),
(22, 4, 'Nikhil Gunjal', '5bca09b027c30.jpg', 27, 'Good', 4, '2019-01-26 10:03:58', '2019-01-26 10:03:58'),
(23, 10, 'Prapti', '5bc07ebc90775.jpg', 8, 'Excellent', 5, '2019-01-28 09:37:47', '2019-01-28 09:37:47'),
(24, 9, 'sweety bhagwat', '5bc07f6158440.jpg', 8, 'Excellent', 5, '2019-01-28 09:54:49', '2019-01-28 09:54:49'),
(25, 4, 'Nikhil Gunjal', '5bca09b027c30.jpg', 28, 'Good', 4, '2019-02-01 09:00:20', '2019-02-01 09:00:20'),
(26, 3, 'Nidhi Tiwari', '5bc07de9a7a67.jpg', 27, 'Excellent', 5, '2019-03-28 07:26:55', '2019-03-28 07:26:55'),
(27, 21, 'Parikshit Patil', NULL, 30, 'Excellent', 5, '2019-06-27 20:49:34', '2019-06-27 20:49:34'),
(28, 7, 'Amol Pomane', '5ba8f5587290f.jpg', 7, 'Excellent', 5, '2019-09-11 03:41:49', '2019-09-11 03:41:49'),
(29, 7, 'Amol Pomane', '5ba8f5587290f.jpg', 52, 'Excellent', 5, '2019-09-26 09:52:11', '2019-09-26 09:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `T_Userstorewalkinpoint`
--

CREATE TABLE `T_Userstorewalkinpoint` (
  `user_store_walkin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `walkin_points` int(11) NOT NULL,
  `beacon_activity_id` int(11) DEFAULT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `T_Userstorewalkinpoint`
--

INSERT INTO `T_Userstorewalkinpoint` (`user_store_walkin_id`, `user_id`, `store_id`, `walkin_points`, `beacon_activity_id`, `latitude`, `longitude`, `created_date`) VALUES
(1, 5, 8, 10, 1, '18.5097399', '73.7816897', '2018-09-20 18:01:01'),
(2, 4, 8, 10, 2, '18.5097399', '73.7816897', '2018-09-20 18:05:49'),
(3, 1, 8, 10, 3, '18.5097422', '73.7816829', '2018-09-20 18:06:14'),
(4, 2, 8, 10, 4, '18.5097395', '73.7816933', '2018-09-20 18:07:34'),
(5, 6, 8, 10, 5, '18.5096', '73.7814737', '2018-09-21 10:54:17'),
(6, 3, 8, 10, 6, '18.5097395', '73.7816933', '2018-09-21 15:14:15'),
(7, 3, 8, 10, 7, '18.5098508', '73.7816606', '2018-09-24 10:01:33'),
(8, 2, 8, 10, 8, '18.5097399', '73.7816897', '2018-09-24 10:59:07'),
(9, 1, 8, 10, 9, '18.509762', '73.7816746', '2018-09-24 14:53:38'),
(10, 4, 8, 10, 10, '18.5097482', '73.7816728', '2018-09-24 16:51:50'),
(11, 4, 10, 22, 11, '18.5139645', '73.7718715', '2018-09-24 23:43:21'),
(12, 2, 8, 10, 12, '18.5097382', '73.781679', '2018-09-25 11:12:10'),
(13, 9, 8, 10, 13, '18.5097256', '73.7816619', '2018-09-25 12:08:23'),
(14, 11, 8, 10, 14, '18.5097535', '73.781671', '2018-09-25 14:40:35'),
(15, 10, 8, 10, 15, '18.5097503', '73.7816614', '2018-09-25 16:25:19'),
(16, 3, 8, 10, 16, '18.5097574', '73.7816733', '2018-09-25 16:39:42'),
(17, 6, 8, 10, 17, '18.509758743457496', '73.78168841823936', '2018-09-25 16:43:56'),
(18, 4, 8, 10, 18, '18.5095701', '73.781486', '2018-09-25 18:05:43'),
(19, 4, 10, 22, 19, '18.5193896', '73.7736602', '2018-09-26 00:04:01'),
(20, 2, 8, 10, 20, '18.5097382', '73.781679', '2018-09-26 11:50:27'),
(21, 3, 9, 12, 21, '18.5097382', '73.781679', '2018-09-26 13:09:23'),
(22, 8, 9, 12, 22, '18.5097382', '73.781679', '2018-09-26 13:11:20'),
(23, 13, 9, 12, 23, '18.5097613', '73.7817066', '2018-09-26 13:11:57'),
(24, 7, 9, 12, 24, '18.5093332', '73.7847407', '2018-09-26 13:16:18'),
(25, 2, 9, 12, 25, '18.5095444', '73.7815771', '2018-09-26 13:27:09'),
(26, 8, 8, 10, 26, '18.5097382', '73.781679', '2018-09-26 13:56:21'),
(27, 4, 9, 12, 27, '18.5098921', '73.7829023', '2018-09-26 15:47:36'),
(28, 10, 9, 12, 28, '18.5097205', '73.781661', '2018-09-26 16:15:52'),
(29, 7, 8, 10, 29, '18.5097382', '73.781679', '2018-09-26 16:32:52'),
(30, 10, 8, 10, 30, '18.5098281', '73.7816953', '2018-09-26 17:06:16'),
(31, 6, 8, 10, 31, '18.5097413', '73.7816851', '2018-09-26 18:01:59'),
(32, 4, 8, 10, 32, '18.5099242', '73.7832699', '2018-09-26 18:40:45'),
(33, 4, 10, 22, 33, '18.5193896', '73.7736602', '2018-09-27 00:11:36'),
(34, 3, 8, 10, 34, '18.5071823', '73.7811617', '2018-09-27 11:49:20'),
(35, 2, 8, 10, 35, '18.5097394', '73.7816752', '2018-09-27 12:13:16'),
(36, 13, 8, 10, 36, '18.5097386', '73.781684', '2018-09-27 15:25:29'),
(37, 8, 9, 12, 37, '18.5097507', '73.7816445', '2018-09-27 15:33:05'),
(38, 13, 9, 12, 38, '18.5097382', '73.781679', '2018-09-27 16:03:07'),
(39, 9, 8, 10, 39, '18.509749', '73.7816618', '2018-09-27 16:27:37'),
(40, 4, 9, 12, 40, '18.5097283', '73.7816837', '2018-09-27 16:43:12'),
(41, 10, 9, 12, 41, '18.5096754', '73.781707', '2018-09-27 17:10:05'),
(42, 10, 8, 10, 42, '18.5097329', '73.7816818', '2018-09-27 18:08:26'),
(43, 4, 8, 10, 43, '18.5096988', '73.7816153', '2018-09-27 19:01:09'),
(44, 4, 20, 10, 44, '18.5106441', '73.7832699', '2018-09-27 19:53:55'),
(45, 6, 8, 10, 45, '18.509766', '73.7816861', '2018-09-28 11:12:58'),
(46, 2, 8, 10, 46, '18.5097507', '73.7816445', '2018-09-28 12:46:04'),
(47, 2, 9, 12, 47, '18.5097507', '73.7816445', '2018-09-28 12:51:59'),
(48, 7, 8, 10, 48, '18.5097398', '73.7816835', '2018-09-28 13:02:22'),
(49, 3, 9, 12, 49, '18.5097624', '73.7816918', '2018-09-28 13:04:17'),
(50, 3, 8, 10, 50, '18.509688', '73.7816862', '2018-09-28 13:14:58'),
(51, 14, 8, 10, 51, '18.5097444', '73.7816607', '2018-09-28 13:46:28'),
(52, 15, 8, 10, 52, '18.5097507', '73.7816445', '2018-09-28 17:01:19'),
(53, 4, 9, 12, 53, '18.5094245', '73.7830073', '2018-09-28 17:28:09'),
(54, 4, 8, 10, 54, '18.5098207', '73.7817063', '2018-09-28 19:28:45'),
(55, 14, 9, 12, 55, '18.5094709', '73.7814278', '2018-09-29 15:48:18'),
(56, 15, 9, 12, 56, '18.5096188', '73.7816292', '2018-09-29 15:52:34'),
(57, 17, 20, 10, 57, '18.5143745', '73.7810793', '2018-09-29 18:58:29'),
(58, 17, 20, 10, 58, '18.5089525', '73.7762839', '2018-09-30 23:34:30'),
(59, 2, 8, 10, 59, '18.5097507', '73.7816445', '2018-10-01 11:10:58'),
(60, 3, 8, 10, 60, '18.5097498', '73.7816618', '2018-10-01 12:23:46'),
(61, 6, 8, 10, 61, '18.5097572', '73.7816527', '2018-10-01 12:24:39'),
(62, 13, 8, 10, 62, '18.5097382', '73.781679', '2018-10-01 17:16:33'),
(63, 10, 8, 10, 63, '18.5097205', '73.781661', '2018-10-01 18:07:58'),
(64, 14, 8, 10, 64, '18.5097586', '73.781594', '2018-10-01 18:10:44'),
(65, 4, 8, 10, 65, '18.5097382', '73.781679', '2018-10-01 18:46:30'),
(66, 15, 10, 22, 66, '18.5195131', '73.7736448', '2018-10-02 01:06:14'),
(67, 2, 8, 10, 67, '18.5097254', '73.781661', '2018-10-02 11:26:25'),
(68, 3, 8, 10, 68, '18.5097393', '73.7816756', '2018-10-02 12:39:25'),
(69, 3, 9, 12, 69, '18.5096973', '73.7816129', '2018-10-02 13:33:33'),
(70, 6, 8, 10, 70, '18.5101805', '73.7848318', '2018-10-02 14:18:12'),
(71, 10, 8, 10, 71, '18.5097432', '73.7816955', '2018-10-02 18:21:56'),
(72, 4, 9, 12, 72, '18.511004', '73.7832699', '2018-10-02 18:30:55'),
(73, 4, 8, 10, 73, '18.5097254', '73.781661', '2018-10-02 21:20:31'),
(74, 17, 20, 10, 74, '18.5138512', '73.7829023', '2018-10-02 22:38:49'),
(75, 14, 10, 22, 75, '18.519538', '73.7736286', '2018-10-03 09:49:38'),
(76, 2, 8, 10, 76, '18.5097421', '73.7816826', '2018-10-03 11:32:34'),
(77, 6, 8, 10, 77, '18.5097388', '73.7816753', '2018-10-03 15:12:04'),
(78, 3, 8, 10, 78, '18.509748', '73.7816763', '2018-10-03 16:33:06'),
(79, 9, 8, 10, 79, '18.5096911', '73.7836351', '2018-10-03 16:45:55'),
(80, 7, 8, 10, 80, '18.5098163', '73.7816771', '2018-10-04 11:27:35'),
(81, 10, 8, 10, 81, '18.5098921', '73.7829023', '2018-10-04 12:33:42'),
(82, 3, 9, 12, 82, '18.5097587', '73.7816702', '2018-10-04 14:43:27'),
(83, 2, 8, 10, 83, '18.5097469', '73.781669', '2018-10-04 14:54:35'),
(84, 6, 8, 10, 84, '18.509753', '73.7816834', '2018-10-04 16:11:23'),
(85, 3, 8, 10, 85, '18.5097475', '73.7816719', '2018-10-04 17:03:27'),
(86, 8, 8, 10, 86, '18.5097448', '73.7816574', '2018-10-04 17:20:29'),
(87, 4, 8, 10, 87, '18.5098809', '73.7830191', '2018-10-04 18:50:07'),
(88, 17, 20, 10, 88, '18.5144117', '73.7810391', '2018-10-04 22:33:08'),
(89, 10, 8, 10, 89, '18.5096663', '73.7815659', '2018-10-05 14:19:09'),
(90, 2, 8, 10, 90, '18.5089089', '73.7840053', '2018-10-05 15:34:14'),
(91, 6, 8, 10, 91, '18.5097305', '73.781654', '2018-10-07 16:52:43'),
(92, 3, 8, 10, 92, '18.5098921', '73.7829023', '2018-10-05 17:23:52'),
(93, 4, 10, 22, 93, '18.519538', '73.7736286', '2018-10-05 20:52:13'),
(94, 14, 10, 22, 94, '18.5197752', '73.7736889', '2018-10-06 03:48:26'),
(95, 4, 10, 22, 95, '18.5199195', '73.7740516', '2018-10-07 01:24:56'),
(96, 17, 20, 10, 96, '18.5144117', '73.7810391', '2018-10-07 10:42:16'),
(97, 18, 20, 10, 97, '18.5145388', '73.7825346', '2018-10-07 21:59:59'),
(98, 4, 20, 10, 98, '18.5134268', '73.7821669', '2018-10-07 22:07:50'),
(99, 14, 10, 22, 99, '18.519657', '73.7736402', '2018-10-08 00:39:27'),
(100, 15, 10, 22, 100, '18.5196865', '73.7737616', '2018-10-08 01:00:59'),
(101, 4, 10, 22, 101, '18.5136368', '73.7722392', '2018-10-08 10:38:50'),
(102, 3, 8, 10, 102, '18.5097309', '73.781655', '2018-10-08 10:49:14'),
(103, 2, 8, 10, 103, '18.5097301', '73.7816541', '2018-10-08 11:07:15'),
(104, 10, 8, 10, 104, '18.5097534', '73.7816399', '2018-10-08 13:04:11'),
(105, 4, 8, 10, 105, '18.5098791', '73.7816985', '2018-10-08 13:07:05'),
(106, 3, 8, 10, 106, '18.5098129', '73.7817125', '2018-10-09 11:30:55'),
(107, 2, 8, 10, 107, '18.5097278', '73.7816962', '2018-10-09 11:49:59'),
(108, 10, 8, 10, 108, '18.5097585', '73.7817002', '2018-10-09 13:16:54'),
(109, 10, 9, 12, 109, '18.5097163', '73.7816444', '2018-10-09 13:48:44'),
(110, 8, 8, 10, 110, '18.5096823', '73.7817551', '2018-10-09 15:54:57'),
(111, 13, 8, 10, 111, '18.5097289', '73.7817013', '2018-10-09 16:55:46'),
(112, 3, 8, 10, 112, '18.5097417', '73.7816997', '2018-10-10 12:23:05'),
(113, 10, 8, 10, 113, '18.5088431', '73.7806003', '2018-10-10 13:58:41'),
(114, 2, 8, 10, 114, '18.5097317', '73.7816965', '2018-10-10 15:03:52'),
(115, 4, 8, 10, 115, '18.5097354', '73.7816456', '2018-10-10 17:20:52'),
(116, 4, 9, 12, 116, '18.5102198', '73.7825346', '2018-10-10 18:06:13'),
(117, 4, 10, 22, 117, '18.5194446', '73.7736379', '2018-10-10 20:22:53'),
(118, 17, 20, 10, 118, '18.5144582', '73.7813364', '2018-10-10 21:40:17'),
(119, 3, 8, 10, 119, '18.5097278', '73.7816962', '2018-10-11 15:31:24'),
(120, 2, 8, 10, 120, '18.5097278', '73.7816962', '2018-10-11 16:06:28'),
(121, 6, 8, 10, 121, '18.5097445', '73.781688', '2018-10-11 17:04:07'),
(122, 4, 8, 10, 122, '18.5092044', '73.7832699', '2018-10-11 18:03:15'),
(123, 10, 8, 10, 123, '18.5097311', '73.7814627', '2018-10-12 13:57:27'),
(124, 3, 8, 10, 124, '18.5097278', '73.7816962', '2018-10-12 16:07:28'),
(125, 2, 8, 10, 125, '18.5097278', '73.7816962', '2018-10-12 16:23:01'),
(126, 8, 8, 10, 126, '18.5097348', '73.781712', '2018-10-12 16:30:15'),
(127, 15, 8, 10, 127, '18.5097278', '73.7816962', '2018-10-12 16:52:29'),
(128, 6, 8, 10, 128, '18.5097328', '73.7816989', '2018-10-12 17:31:10'),
(129, 4, 8, 10, 129, '18.5097278', '73.7816962', '2018-10-13 15:12:32'),
(130, 4, 9, 20, 130, '18.5097443', '73.7817163', '2018-10-13 15:21:48'),
(131, 4, 10, 22, 131, '18.5098759', '73.7816696', '2018-10-14 01:28:35'),
(132, 2, 8, 10, 132, '18.5097353', '73.7816813', '2018-10-15 11:47:07'),
(133, 3, 8, 10, 133, '18.5110708', '73.7807171', '2018-10-15 15:26:29'),
(134, 6, 8, 10, 134, '18.5097427', '73.7816799', '2018-10-15 15:57:24'),
(135, 4, 8, 10, 135, '18.5098126', '73.7816639', '2018-10-15 16:05:43'),
(136, 15, 8, 10, 136, '18.5097545', '73.7816841', '2018-10-15 16:34:21'),
(137, 2, 8, 10, 137, '18.5097509', '73.7816876', '2018-10-16 12:47:40'),
(138, 3, 8, 10, 138, '18.5096815', '73.7811884', '2018-10-16 15:48:27'),
(139, 6, 8, 10, 139, '18.5097413', '73.7816844', '2018-10-16 16:49:04'),
(140, 4, 8, 10, 140, '18.509781', '73.7816819', '2018-10-16 16:55:37'),
(141, 15, 8, 10, 141, '18.5097634', '73.7816779', '2018-10-16 17:08:14'),
(142, 15, 9, 20, 142, '18.5097634', '73.7816779', '2018-10-16 19:57:26'),
(143, 4, 9, 20, 143, '18.5099214', '73.7813663', '2018-10-16 20:01:48'),
(144, 1, 8, 10, 144, '18.5098769', '73.7817102', '2018-10-17 14:45:18'),
(145, 2, 8, 10, 145, '18.5097952', '73.7816894', '2018-10-17 15:23:44'),
(146, 7, 8, 10, 146, '18.5097739', '73.7816904', '2018-10-17 16:30:56'),
(147, 6, 8, 10, 147, '18.5097413', '73.7816844', '2018-10-17 16:58:21'),
(148, 4, 10, 22, 148, '18.5194221', '73.7735661', '2018-10-17 21:14:29'),
(149, 15, 10, 22, 149, '18.5194521', '73.7736357', '2018-10-18 00:09:37'),
(150, 14, 10, 22, 150, '18.5194521', '73.7736357', '2018-10-18 00:25:57'),
(151, 3, 8, 10, 151, '18.5098343', '73.7817154', '2018-10-18 15:03:23'),
(152, 4, 8, 10, 152, '18.5097901', '73.7816915', '2018-10-18 15:14:06'),
(153, 2, 8, 10, 153, '18.5097509', '73.7816876', '2018-10-19 11:59:03'),
(154, 6, 8, 10, 154, '18.5097413', '73.7816844', '2018-10-22 12:55:16'),
(155, 14, 8, 10, 155, '18.509762', '73.7816939', '2018-10-22 17:54:52'),
(156, 14, 9, 20, 156, '18.509762', '73.7816939', '2018-10-22 18:05:07'),
(157, 4, 8, 10, 157, '18.5097488', '73.7816907', '2018-10-22 18:14:49'),
(158, 15, 8, 10, 158, '18.509766', '73.7816945', '2018-10-22 18:55:51'),
(159, 2, 8, 10, 159, '18.5097614', '73.781679', '2018-10-23 11:39:39'),
(160, 3, 8, 10, 160, '18.5097619', '73.7816957', '2018-10-23 12:59:56'),
(161, 10, 9, 20, 161, '18.5097673', '73.7817216', '2018-10-23 13:25:59'),
(162, 10, 8, 10, 162, '18.5097673', '73.7817216', '2018-10-23 14:09:15'),
(163, 6, 8, 10, 163, '18.5097413', '73.7816844', '2018-10-23 15:18:35'),
(164, 7, 24, 10, 164, '-6.214209', '106.8066531', '2018-10-24 11:51:12'),
(165, 2, 8, 10, 165, '18.5097614', '73.781679', '2018-10-24 12:35:57'),
(166, 4, 8, 10, 166, '18.5097896', '73.781694', '2018-10-24 12:50:31'),
(167, 10, 8, 10, 167, '18.509772', '73.7817168', '2018-10-24 14:46:07'),
(168, 3, 8, 10, 168, '18.5097614', '73.781679', '2018-10-24 15:05:04'),
(169, 6, 8, 10, 169, '18.5097717', '73.7816907', '2018-10-24 16:46:17'),
(170, 7, 24, 10, 170, '14.5646004', '121.0304394', '2018-10-25 16:00:13'),
(171, 2, 8, 10, 171, '18.509793', '73.7816931', '2018-10-25 14:31:34'),
(172, 8, 8, 10, 172, '18.5097839', '73.7816903', '2018-10-25 16:30:17'),
(173, 6, 8, 10, 173, '18.509783', '73.7816707', '2018-10-26 10:50:14'),
(174, 1, 8, 10, 174, '18.5123181', '73.7821325', '2018-10-26 11:22:15'),
(175, 19, 8, 10, 175, '18.5097558', '73.7816881', '2018-10-26 12:06:40'),
(176, 2, 8, 10, 176, '18.5097644', '73.7816792', '2018-10-26 15:39:36'),
(177, 4, 8, 10, 177, '18.5097724', '73.781689', '2018-10-26 17:19:18'),
(178, 15, 8, 10, 178, '18.5097576', '73.7816863', '2018-10-26 17:31:53'),
(179, 14, 10, 22, 179, '18.5196789', '73.7737423', '2018-10-29 11:15:00'),
(180, 15, 10, 22, 180, '18.5196811', '73.7734484', '2018-10-29 11:19:30'),
(181, 2, 8, 10, 181, '18.5097614', '73.781679', '2018-10-29 12:48:41'),
(182, 3, 8, 10, 182, '18.5098414', '73.7817072', '2018-10-29 12:51:12'),
(183, 15, 8, 10, 183, '18.509808', '73.781659', '2018-10-29 12:55:26'),
(184, 19, 8, 10, 184, '18.5097615', '73.781677', '2018-10-29 12:56:03'),
(185, 14, 8, 10, 185, '18.509985', '73.7816472', '2018-10-29 13:09:48'),
(186, 19, 8, 10, 186, '18.5097734', '73.7816929', '2018-10-30 15:08:47'),
(187, 3, 8, 10, 187, '18.5097665', '73.7816815', '2018-10-30 15:16:06'),
(188, 4, 8, 10, 188, '18.5097614', '73.781679', '2018-10-30 16:14:43'),
(189, 2, 8, 10, 189, '18.5097614', '73.781679', '2018-10-31 11:41:12'),
(190, 3, 8, 10, 190, '18.509763', '73.7816794', '2018-10-31 16:10:12'),
(191, 16, 8, 10, 191, '18.5097889', '73.7816691', '2018-10-31 16:51:22'),
(192, 4, 8, 10, 192, '18.5097614', '73.781679', '2018-10-31 18:03:08'),
(193, 4, 10, 22, 193, '18.5195461', '73.7735295', '2018-10-31 22:04:40'),
(194, 14, 8, 10, 194, '18.5097683', '73.7816844', '2018-11-01 15:34:53'),
(195, 15, 8, 10, 195, '18.5097918', '73.7817094', '2018-11-01 15:40:21'),
(196, 10, 8, 10, 196, '18.5097541', '73.7817077', '2018-11-02 14:12:21'),
(197, 2, 8, 10, 197, '18.5097615', '73.7816773', '2018-11-02 14:16:55'),
(198, 4, 8, 10, 198, '18.5097614', '73.781679', '2018-11-02 16:51:02'),
(199, 16, 8, 10, 199, '18.5097614', '73.781679', '2018-11-02 16:51:05'),
(200, 16, 9, 20, 200, '18.5096929', '73.7816885', '2018-11-02 17:17:03'),
(201, 2, 9, 20, 201, '18.5097626', '73.7816768', '2018-11-02 17:18:32'),
(202, 4, 9, 20, 202, '18.5096609', '73.784373', '2018-11-02 17:19:00'),
(203, 14, 8, 10, 203, '18.509732', '73.7815959', '2018-11-02 17:59:05'),
(204, 10, 8, 10, 204, '18.5097648', '73.7816923', '2018-11-12 12:53:24'),
(205, 3, 8, 10, 205, '18.5097709', '73.7816809', '2018-11-12 15:55:58'),
(206, 4, 10, 22, 206, '18.5194293', '73.7736314', '2018-11-12 19:03:19'),
(207, 7, 8, 10, 207, '18.5097377', '73.7816811', '2018-11-13 12:55:18'),
(208, 16, 8, 10, 208, '18.5097548', '73.78168789999998', '2018-11-13 14:46:25'),
(209, 2, 8, 10, 209, '18.5097444', '73.7816875', '2018-11-13 16:33:25'),
(210, 4, 10, 22, 210, '18.5194412', '73.7736479', '2018-11-13 23:12:00'),
(211, 10, 8, 10, 211, '18.5097276', '73.7816714', '2018-11-14 14:02:59'),
(212, 2, 8, 10, 212, '18.5097377', '73.7816811', '2018-11-15 10:48:17'),
(213, 3, 8, 10, 213, '18.509736', '73.7817095', '2018-11-15 12:18:01'),
(214, 4, 8, 10, 214, '18.5097436', '73.7816883', '2018-11-15 16:04:21'),
(215, 19, 8, 10, 215, '18.5097377', '73.7816811', '2018-11-15 16:52:42'),
(216, 2, 8, 10, 216, '18.5097377', '73.7816811', '2018-11-16 15:35:31'),
(217, 2, 8, 10, 217, '18.5100172', '73.7817256', '2018-11-19 11:27:43'),
(218, 4, 10, 22, 218, '18.5195058', '73.7736465', '2018-11-20 10:50:28'),
(219, 2, 8, 10, 219, '18.509747', '73.7816714', '2018-11-20 12:21:43'),
(220, 2, 8, 10, 220, '18.5097423', '73.7816689', '2018-11-21 14:56:02'),
(221, 4, 8, 10, 221, '18.5097638', '73.7816786', '2018-11-21 17:23:51'),
(222, 19, 8, 10, 222, '18.509747763937398', '73.78168416933687', '2018-11-21 17:38:24'),
(223, 4, 10, 22, 223, '18.5195058', '73.7736465', '2018-11-21 19:57:32'),
(224, 14, 10, 22, 224, '18.5097706', '73.7816242', '2018-11-21 21:14:59'),
(225, 2, 8, 10, 225, '18.5097423', '73.7816689', '2018-11-22 16:00:48'),
(226, 3, 8, 10, 226, '18.5097365', '73.7816716', '2018-11-23 12:47:16'),
(227, 4, 8, 10, 227, '18.5097512', '73.7816666', '2018-11-23 16:43:23'),
(228, 7, 24, 10, 228, '18.5430292', '73.7853744', '2018-11-26 08:05:35'),
(229, 2, 8, 10, 229, '18.5097423', '73.7816689', '2018-11-26 12:46:27'),
(230, 19, 8, 10, 230, '18.5097667', '73.7814749', '2018-11-28 12:19:31'),
(231, 2, 8, 10, 231, '18.5097499', '73.7815481', '2018-11-28 12:30:46'),
(232, 4, 10, 22, 232, '18.5194694', '73.7736408', '2018-11-28 21:27:16'),
(233, 4, 8, 10, 233, '18.5097794', '73.7816897', '2018-11-29 13:00:00'),
(234, 2, 8, 10, 234, '18.5097491', '73.7816737', '2018-11-29 15:08:47'),
(235, 2, 8, 10, 235, '18.5097324', '73.7816583', '2018-11-30 15:33:58'),
(236, 3, 8, 10, 236, '18.50975', '73.781676', '2018-11-30 16:02:56'),
(237, 19, 8, 10, 237, '18.5097316', '73.7816596', '2018-11-30 16:45:01'),
(238, 3, 8, 10, 238, '18.5097315', '73.7816593', '2018-12-03 14:26:54'),
(239, 7, 8, 10, 239, '18.5098829', '73.7815583', '2018-12-03 15:31:34'),
(240, 19, 8, 10, 240, '18.5097316', '73.7816596', '2018-12-03 15:41:28'),
(241, 4, 8, 10, 241, '18.5097292', '73.7816541', '2018-12-03 18:21:47'),
(242, 3, 8, 10, 242, '18.5099434', '73.7816613', '2018-12-04 15:42:09'),
(243, 3, 8, 10, 243, '18.5098318', '73.7817047', '2018-12-05 16:27:33'),
(244, 4, 8, 10, 244, '18.5097241', '73.7816701', '2018-12-05 17:24:28'),
(245, 4, 10, 22, 245, '18.5194485', '73.7736422', '2018-12-05 21:54:26'),
(246, 3, 8, 10, 246, '18.5097365', '73.7816777', '2018-12-07 14:11:02'),
(247, 19, 8, 10, 247, '18.5097528', '73.7816488', '2018-12-07 16:24:07'),
(248, 7, 24, 10, 248, '18.5429799', '73.7852834', '2018-12-09 17:46:43'),
(249, 3, 8, 10, 249, '18.5097932', '73.7817035', '2018-12-10 12:19:05'),
(250, 3, 8, 10, 250, '18.5097527', '73.7816774', '2018-12-12 11:33:13'),
(251, 4, 10, 22, 251, '18.5194981', '73.7736314', '2018-12-14 00:42:45'),
(252, 19, 8, 10, 252, '18.5097641', '73.7815557', '2018-12-17 17:38:33'),
(253, 3, 8, 10, 253, '18.5097517', '73.7816699', '2018-12-17 17:38:47'),
(254, 4, 8, 10, 254, '18.5097624', '73.7816712', '2018-12-17 18:08:06'),
(255, 4, 10, 22, 255, '18.5143567', '73.7722392', '2018-12-17 23:15:36'),
(256, 3, 8, 10, 256, '18.5097228', '73.7816711', '2018-12-19 11:21:43'),
(257, 19, 8, 10, 257, '18.5097173', '73.7816746', '2018-12-19 13:04:39'),
(258, 3, 8, 10, 258, '18.5097887', '73.7817285', '2019-01-02 15:50:36'),
(259, 19, 8, 10, 259, '18.509759', '73.7817294', '2019-01-03 12:30:57'),
(260, 4, 8, 10, 260, '18.5097379', '73.7817149', '2019-01-03 12:34:56'),
(261, 3, 8, 10, 261, '18.5097469', '73.7816811', '2019-01-18 17:16:37'),
(262, 4, 8, 10, 262, '18.5097365', '73.7817077', '2019-01-19 15:16:50'),
(263, 4, 10, 22, 263, '18.5195095', '73.7736731', '2019-01-23 22:40:10'),
(264, 3, 8, 10, 264, '18.5097267', '73.7817015', '2019-01-24 12:15:57'),
(265, 7, 8, 10, 265, '18.5096921', '73.7816131', '2019-01-24 12:22:56'),
(266, 8, 8, 10, 266, '18.5097231', '73.781725', '2019-01-24 12:54:58'),
(267, 10, 8, 10, 267, '18.5097838', '73.7817256', '2019-01-24 13:15:09'),
(268, 4, 8, 10, 268, '18.5097205', '73.7816958', '2019-01-24 16:48:03'),
(269, 4, 9, 30, 269, '18.5097603', '73.781795', '2019-01-24 17:04:59'),
(270, 3, 8, 10, 270, '18.5097432', '73.7817202', '2019-01-25 15:16:41'),
(271, 24, 8, 10, 271, '18.5099103', '73.7815179', '2019-01-25 19:39:38'),
(272, 4, 8, 10, 272, '18.5098144', '73.7817086', '2019-01-25 21:28:39'),
(273, 10, 8, 10, 273, '18.509786', '73.7817026', '2019-01-28 12:49:22'),
(274, 3, 8, 10, 274, '18.5097153', '73.7816984', '2019-01-28 13:06:41'),
(275, 4, 8, 10, 275, '18.5097167', '73.7817023', '2019-01-28 15:20:36'),
(276, 9, 8, 10, 276, '18.509724', '73.7816928', '2019-01-28 15:21:48'),
(277, 4, 27, 30, 277, '18.5103413', '73.8192787', '2019-01-28 16:30:15'),
(278, 7, 27, 30, 278, '18.5106276', '73.8192079', '2019-01-28 16:30:34'),
(279, 25, 8, 10, 279, '18.5097626', '73.7817678', '2019-01-29 11:56:31'),
(280, 3, 8, 10, 280, '18.5097153', '73.7816984', '2019-01-30 11:29:59'),
(281, 25, 8, 10, 281, '18.5095377', '73.7817817', '2019-01-31 15:13:57'),
(282, 4, 8, 10, 282, '18.5097355', '73.7816759', '2019-01-31 15:27:50'),
(283, 3, 8, 10, 283, '18.5097298', '73.7817314', '2019-01-31 15:34:19'),
(284, 7, 28, 20, 284, '19.1163307', '72.9096973', '2019-02-01 11:36:56'),
(285, 4, 28, 20, 285, '19.1162145', '72.9097646', '2019-02-01 11:38:37'),
(286, 3, 8, 10, 286, '18.5097341', '73.7817231', '2019-02-01 16:57:44'),
(287, 3, 8, 10, 287, '18.3803174', '73.7406196', '2019-02-04 11:04:42'),
(288, 4, 8, 10, 288, '18.5097285', '73.7817206', '2019-02-04 14:24:37'),
(289, 25, 8, 10, 289, '18.509766', '73.7817348', '2019-02-04 16:53:24'),
(290, 24, 8, 10, 290, '18.5097246', '73.7817405', '2019-02-04 17:10:34'),
(291, 26, 8, 10, 291, '18.5097642', '73.7817233', '2019-02-05 17:22:01'),
(292, 25, 8, 10, 292, '18.5097285', '73.7817206', '2019-02-05 17:27:04'),
(293, 4, 8, 10, 293, '18.5097414', '73.7817157', '2019-02-05 17:27:17'),
(294, 27, 8, 10, 294, '18.509814', '73.7815089', '2019-02-05 17:32:24'),
(295, 3, 8, 10, 295, '18.5097311', '73.7817289', '2019-02-07 11:29:56'),
(296, 25, 8, 10, 296, '18.5097728', '73.7817291', '2019-02-07 16:34:05'),
(297, 4, 8, 10, 297, '18.5097401', '73.7817244', '2019-02-08 14:55:04'),
(298, 3, 8, 10, 298, '18.509719', '73.7817182', '2019-02-08 15:00:42'),
(299, 25, 8, 10, 299, '18.5097437', '73.7817307', '2019-02-12 15:13:43'),
(300, 3, 8, 10, 300, '18.5097518', '73.7817111', '2019-02-14 11:37:29'),
(301, 25, 8, 10, 301, '18.5097924', '73.781723', '2019-02-15 15:04:52'),
(302, 4, 29, 20, 302, '18.4955197', '73.8375726', '2019-02-18 20:53:27'),
(303, 7, 30, 10, 303, '18.5729704', '74.0308786', '2019-02-20 11:58:32'),
(304, 4, 30, 10, 304, '18.5729704', '74.0308786', '2019-02-20 11:59:55'),
(305, 7, 32, 10, 305, '18.5174323', '73.8380451', '2019-03-04 15:28:57'),
(306, 4, 32, 10, 306, '18.517425', '73.8380429', '2019-03-04 15:55:48'),
(307, 25, 8, 10, 307, '18.5098352', '73.7817272', '2019-03-06 10:53:24'),
(308, 7, 32, 10, 308, '18.5134469', '73.8317978', '2019-03-11 11:52:58'),
(309, 4, 32, 10, 309, '18.5088533', '73.8309211', '2019-03-11 12:07:16'),
(310, 3, 8, 10, 310, '18.5097319', '73.7816759', '2019-03-11 16:06:30'),
(311, 7, 8, 10, 311, '18.509712', '73.7816926', '2019-03-19 16:20:06'),
(312, 3, 8, 10, 312, '18.5097185', '73.7816933', '2019-03-19 16:26:48'),
(313, 4, 8, 10, 313, '18.5097216', '73.7816717', '2019-03-26 16:16:33'),
(314, 3, 9, 30, 314, '18.5097078', '73.7817', '2019-03-28 13:00:01'),
(315, 4, 9, 30, 315, '18.5123471', '73.7821669', '2019-03-28 13:08:01'),
(316, 4, 27, 30, 316, '18.5141282', '73.8501466', '2019-03-28 14:24:58'),
(317, 7, 7, 10, 317, '18.5489813', '73.7906912', '2019-04-02 16:48:13'),
(318, 4, 7, 10, 318, '18.5489049', '73.7909489', '2019-04-02 16:52:44'),
(319, 4, 7, 10, 319, '18.5087479', '73.7821669', '2019-04-12 18:11:25'),
(320, 4, 8, 10, 320, '18.502579', '73.7939806', '2019-04-13 11:17:08'),
(321, 7, 7, 10, 321, '18.5097293', '73.7816818', '2019-04-13 11:25:49'),
(322, 4, 7, 10, 322, '18.5114283', '73.7840053', '2019-04-15 13:58:26'),
(323, 4, 9, 30, 323, '18.5097431', '73.7816877', '2019-04-15 15:27:45'),
(324, 4, 7, 10, 324, '18.5097264', '73.7816842', '2019-04-16 17:59:42'),
(325, 4, 8, 10, 325, '18.5097255', '73.7816931', '2019-04-16 18:13:50'),
(326, 7, 7, 10, 326, '18.5097158', '73.7817034', '2019-04-17 13:18:26'),
(327, 4, 7, 10, 327, '18.5097158', '73.7817034', '2019-04-17 18:10:09'),
(328, 4, 9, 30, 328, '18.5096953', '73.7817505', '2019-04-17 18:28:24'),
(329, 4, 7, 10, 329, '18.5097261', '73.7816603', '2019-04-30 17:24:27'),
(330, 4, 7, 10, 330, '18.5097244', '73.7816811', '2019-05-02 17:20:55'),
(331, 4, 7, 10, 331, '18.5097294', '73.7816984', '2019-05-08 17:05:40'),
(332, 4, 8, 10, 332, '18.5097735', '73.7817116', '2019-05-08 17:12:21'),
(333, 4, 9, 30, 333, '18.5096746', '73.7817508', '2019-05-13 18:27:23'),
(334, 4, 7, 10, 334, '18.5097332', '73.7816913', '2019-05-13 18:32:46'),
(335, 4, 8, 10, 335, '18.5097032', '73.7817101', '2019-05-14 12:58:45'),
(336, 7, 7, 10, 336, '18.5096607', '73.7817423', '2019-05-15 12:05:23'),
(337, 7, 9, 30, 337, '18.5096885', '73.7816547', '2019-05-15 12:19:22'),
(338, 4, 9, 30, 338, '18.5096658', '73.7816671', '2019-05-15 13:02:50'),
(339, 4, 7, 10, 339, '18.5096759', '73.7816944', '2019-05-15 13:23:03'),
(340, 4, 32, 10, 340, '18.5712584', '73.7749729', '2019-05-15 21:00:14'),
(341, 4, 7, 10, 341, '18.5097192', '73.7816854', '2019-05-16 17:30:30'),
(342, 4, 7, 10, 342, '18.5097186', '73.7817131', '2019-05-18 12:28:17'),
(343, 4, 7, 10, 343, '18.5097178', '73.7816941', '2019-05-20 15:59:49'),
(344, 3, 8, 10, 344, '18.5097216', '73.7816933', '2019-05-22 16:10:06'),
(345, 4, 8, 10, 345, '18.50974', '73.781684', '2019-05-22 16:17:32'),
(346, 14, 32, 10, 346, '18.5191915', '73.9312794', '2019-05-23 12:49:33'),
(347, 4, 32, 10, 347, '18.5196051', '73.931337', '2019-05-23 12:41:18'),
(348, 7, 32, 10, 348, '18.519187', '73.9312885', '2019-05-23 12:44:12'),
(349, 4, 8, 10, 349, '18.5097246', '73.7816963', '2019-05-27 14:48:35'),
(350, 21, 8, 10, 350, '18.5097204', '73.7817005', '2019-06-03 15:13:11'),
(351, 4, 8, 10, 351, '18.5097225', '73.7816946', '2019-06-04 16:07:16'),
(352, 4, 8, 10, 352, '18.5098121', '73.7816621', '2019-06-08 13:59:40'),
(353, 4, 8, 10, 353, '18.5130991', '73.7825346', '2019-06-18 16:37:10'),
(354, 21, 30, 10, 354, '25.0779938', '-77.3429427', '2019-06-28 08:47:15'),
(355, 21, 30, 10, 355, '25.0779641', '-77.3428343', '2019-06-29 09:33:18'),
(356, 21, 30, 10, 356, '25.0779489', '-77.3428431', '2019-06-30 13:59:08'),
(357, 21, 30, 10, 357, '25.0779734', '-77.3428301', '2019-07-02 10:02:10'),
(358, 21, 30, 10, 358, '25.0779681', '-77.3428148', '2019-07-03 10:16:46'),
(359, 21, 30, 10, 359, '25.0779715', '-77.3428189', '2019-07-05 10:54:39'),
(360, 21, 30, 10, 360, '25.0778656', '-77.3426728', '2019-07-06 17:06:30'),
(361, 4, 8, 10, 361, '18.5097488', '73.7816823', '2019-07-22 16:48:15'),
(362, 4, 8, 10, 362, '18.5097798', '73.7817299', '2019-07-26 15:40:55'),
(363, 4, 8, 10, 363, '18.5162418', '73.7814315', '2019-08-06 18:09:40'),
(364, 4, 49, 10, 364, '18.6261371', '73.8358413', '2019-08-13 13:55:42'),
(365, 21, 8, 10, 365, '18.5104875', '73.7817077', '2019-08-21 17:34:38'),
(366, 4, 10, 22, 366, '18.5194344', '73.7735697', '2019-09-10 19:27:44'),
(367, 4, 8, 10, 367, '18.5097955', '73.7817992', '2019-09-11 15:48:28'),
(368, 14, 10, 22, 368, '18.5194361', '73.7735719', '2019-09-13 01:16:15'),
(369, 4, 10, 22, 369, '18.5161562', '73.7722392', '2019-09-13 01:03:12'),
(370, 4, 8, 10, 370, '18.5104831', '73.7816399', '2019-09-13 14:20:37'),
(371, 8, 8, 10, 371, '18.5104638', '73.7816804', '2019-09-13 15:47:57'),
(372, 14, 10, 22, 372, '18.5134807', '73.7787329', '2019-09-14 17:53:03'),
(373, 4, 10, 22, 373, '18.5124228', '73.7748131', '2019-09-14 19:32:14'),
(374, 7, 51, 10, 374, '18.5105778', '73.7817554', '2019-09-16 13:31:51'),
(375, 4, 10, 22, 375, '18.5194387', '73.7735623', '2019-09-18 01:00:54'),
(376, 4, 10, 22, 376, '18.5105408', '73.7815016', '2019-09-19 15:25:45'),
(377, 4, 53, 10, 377, '18.5150765', '73.7722392', '2019-09-19 23:52:09'),
(378, 14, 8, 10, 378, '18.5105035', '73.7817363', '2019-09-23 13:04:56'),
(379, 14, 51, 10, 379, '18.5104554', '73.7815145', '2019-09-23 13:37:10'),
(380, 14, 53, 10, 380, '18.5194349', '73.7735675', '2019-09-24 00:42:47'),
(381, 14, 10, 22, 381, '18.5194349', '73.7735675', '2019-09-24 00:56:26'),
(382, 4, 8, 10, 382, '18.5103853', '73.7817913', '2019-09-24 12:30:34'),
(383, 14, 8, 10, 383, '18.5104563', '73.7817149', '2019-09-24 15:14:16'),
(384, 4, 10, 22, 384, '18.5163091', '73.7721838', '2019-09-25 12:06:30'),
(385, 14, 10, 22, 385, '18.5194347', '73.7735723', '2019-09-25 12:15:11'),
(386, 4, 8, 10, 386, '18.5101554', '73.7817992', '2019-09-25 13:15:40'),
(387, 7, 8, 10, 387, '18.5104645', '73.7816893', '2019-09-26 15:27:04'),
(388, 40, 8, 10, 388, '18.5105204', '73.7817328', '2019-09-26 16:17:26'),
(389, 4, 8, 10, 389, '18.5108145', '73.7817165', '2019-09-26 16:24:18'),
(390, 4, 10, 22, 390, '18.5196586', '73.7711361', '2019-09-26 23:19:58'),
(391, 14, 10, 22, 391, '18.5194442', '73.7735736', '2019-09-27 00:17:21'),
(392, 41, 30, 10, 392, '25.077966', '-77.3427878', '2019-09-28 10:50:03'),
(393, 41, 30, 10, 393, '25.0779858', '-77.3427989', '2019-09-29 15:51:40'),
(394, 7, 8, 10, 394, '18.5105627', '73.7817039', '2019-09-30 16:12:29'),
(395, 41, 30, 10, 395, '25.0779796', '-77.3428066', '2019-10-01 10:28:44'),
(396, 4, 10, 22, 396, '18.5192987', '73.7711361', '2019-10-02 00:02:26'),
(397, 7, 49, 10, 397, '25.077352967263323', '-77.34517592936756', '2019-10-02 12:33:27'),
(398, 4, 8, 10, 398, '18.5105084', '73.7816646', '2019-10-02 17:25:30'),
(399, 41, 30, 10, 399, '25.0780416', '-77.3429117', '2019-10-02 11:47:01'),
(400, 4, 10, 22, 400, '18.519701', '73.7736278', '2019-10-03 09:38:43'),
(401, 41, 30, 10, 401, '25.077731', '-77.3427925', '2019-10-03 13:19:33'),
(402, 41, 30, 10, 402, '25.0779379', '-77.34296', '2019-10-04 16:48:08'),
(403, 41, 30, 10, 403, '25.0779718', '-77.342746', '2019-10-06 09:43:53'),
(404, 41, 30, 10, 404, '25.077957', '-77.3427863', '2019-10-07 13:47:35'),
(405, 4, 8, 20, 405, '18.5155542', '73.7817992', '2019-10-10 17:35:48'),
(406, 41, 30, 10, 406, '25.0779675', '-77.3427883', '2019-10-11 14:49:41'),
(407, 7, 8, 20, 407, '18.5104883', '73.7816626', '2019-10-14 16:57:45'),
(408, 41, 30, 10, 408, '25.0779349', '-77.3428321', '2019-10-15 09:11:41'),
(409, 4, 10, 22, 409, '18.5195228', '73.7735618', '2019-10-17 01:24:17'),
(410, 4, 8, 20, 410, '18.5105459', '73.7816467', '2019-10-17 16:16:33'),
(411, 41, 30, 10, 411, '25.0780036', '-77.3428575', '2019-10-31 14:00:36'),
(412, 41, 30, 10, 412, '25.0779774', '-77.3428204', '2019-11-02 09:22:36'),
(413, 4, 8, 20, 413, '18.5105077', '73.7816359', '2019-11-15 12:13:30'),
(414, 41, 30, 10, 414, '25.0779983', '-77.3428284', '2019-11-19 11:20:52'),
(415, 7, 8, 20, 415, '18.5105493', '73.7816294', '2019-11-20 13:19:09'),
(416, 7, 8, 20, 416, '18.510971', '73.7817791', '2019-11-22 11:33:22'),
(417, 41, 30, 10, 417, '25.0779121', '-77.3428377', '2019-11-27 15:22:07'),
(418, 4, 8, 20, 418, '18.5107066', '73.7817087', '2019-12-10 15:07:57'),
(419, 4, 8, 20, 419, '18.5117539', '73.7824444', '2020-01-16 16:55:16'),
(420, 41, 30, 10, 420, '25.077661', '-77.3430471', '2020-01-20 09:53:22'),
(421, 41, 30, 10, 421, '25.078155', '-77.3427285', '2020-01-23 13:18:00'),
(422, 41, 30, 10, 422, '25.0779259', '-77.3426055', '2020-01-24 13:21:15'),
(423, 41, 30, 10, 423, '25.0781402', '-77.3428418', '2020-01-25 15:15:18'),
(424, 41, 30, 10, 424, '25.0779141', '-77.3428398', '2020-02-09 09:55:59'),
(425, 41, 57, 10, 425, '25.0828833', '-77.3136513', '2020-02-10 07:25:19'),
(426, 4, 8, 20, 426, '18.5098634', '73.7825337', '2020-02-10 18:28:21'),
(427, 4, 8, 20, 427, '18.512236', '73.782319', '2020-02-14 19:01:43'),
(428, 4, 51, 10, 428, '18.5123608', '73.7817746', '2020-02-14 19:56:35'),
(429, 41, 57, 10, 429, '25.0829753', '-77.3136752', '2020-02-14 23:00:55'),
(430, 41, 57, 10, 430, '25.0829556', '-77.3136452', '2020-02-16 09:35:33'),
(431, 4, 51, 10, 431, '18.5105258', '73.7817946', '2020-02-17 15:54:54'),
(432, 41, 57, 10, 432, '25.0829837', '-77.3136856', '2020-02-17 18:55:07'),
(433, 44, 30, 10, 433, '25.077983', '-77.3428393', '2020-02-18 14:54:36'),
(434, 41, 57, 10, 434, '25.0829782', '-77.3136986', '2020-02-18 19:36:46'),
(435, 41, 30, 10, 435, '25.0779773', '-77.3428411', '2020-02-19 10:05:56'),
(436, 41, 57, 10, 436, '25.0829743', '-77.313673', '2020-02-19 21:28:25'),
(437, 41, 55, 20, 437, '25.0780532', '-77.3415801', '2020-02-20 16:02:54'),
(438, 4, 8, 20, 438, '18.5104664', '73.7817513', '2020-02-21 12:51:07'),
(439, 4, 51, 10, 439, '18.5104706', '73.7817659', '2020-02-21 12:56:12'),
(440, 41, 30, 10, 440, '25.0779683', '-77.342832', '2020-02-21 09:26:53'),
(441, 44, 30, 10, 441, '25.07798', '-77.3428634', '2020-02-21 09:27:48'),
(442, 41, 55, 20, 442, '25.0780627', '-77.341594', '2020-02-21 17:18:45'),
(443, 41, 57, 10, 443, '25.0829845', '-77.3137044', '2020-02-21 19:22:24'),
(444, 41, 30, 10, 444, '25.0779848', '-77.3428309', '2020-02-22 09:35:49'),
(445, 45, 30, 10, 445, '25.0779777', '-77.3428404', '2020-02-22 09:46:23'),
(446, 41, 55, 20, 446, '25.0780531', '-77.3415868', '2020-02-22 17:36:40'),
(447, 41, 30, 10, 447, '25.077969', '-77.3428302', '2020-02-23 09:59:03'),
(448, 44, 30, 10, 448, '25.0779703', '-77.3428514', '2020-02-23 10:10:06'),
(449, 44, 30, 10, 449, '25.078004', '-77.3428202', '2020-02-24 16:19:30'),
(450, 41, 55, 20, 450, '25.0780524', '-77.3415827', '2020-02-24 16:33:08'),
(451, 41, 57, 10, 451, '25.0829787', '-77.3136771', '2020-02-24 19:46:41'),
(452, 51, 30, 10, 452, '25.0779877', '-77.3428511', '2020-02-25 12:12:22'),
(453, 52, 30, 10, 453, '25.0779963', '-77.3428352', '2020-02-25 13:45:22'),
(454, 50, 55, 20, 454, '25.0780713', '-77.3415825', '2020-02-25 15:32:44'),
(455, 50, 30, 10, 455, '25.07799', '-77.3428429', '2020-02-26 09:27:29'),
(456, 50, 57, 10, 456, '25.0829798', '-77.3136813', '2020-02-26 18:48:59'),
(457, 50, 30, 10, 457, '25.0779617', '-77.3428428', '2020-02-27 09:56:41'),
(458, 50, 57, 10, 458, '25.0829825', '-77.3136927', '2020-03-01 07:49:34'),
(459, 50, 30, 10, 459, '25.0779578', '-77.3428406', '2020-03-01 09:12:26'),
(460, 52, 30, 10, 460, '25.0779393', '-77.3428651', '2020-03-01 09:13:42'),
(461, 50, 55, 20, 461, '25.0780358', '-77.3415803', '2020-03-02 09:55:31'),
(462, 52, 55, 20, 462, '25.0780525', '-77.3415801', '2020-03-02 10:21:37'),
(463, 51, 30, 10, 463, '25.0779781', '-77.3428386', '2020-03-03 09:46:03'),
(464, 50, 55, 20, 464, '25.0780537', '-77.3415844', '2020-03-03 10:46:26'),
(465, 50, 57, 10, 465, '25.0829741', '-77.3136734', '2020-03-03 20:49:12'),
(466, 50, 30, 10, 466, '25.0779933', '-77.3428303', '2020-03-04 09:34:12'),
(467, 52, 30, 10, 467, '25.0779529', '-77.3428355', '2020-03-04 09:48:24'),
(468, 50, 55, 20, 468, '25.0780511', '-77.341586', '2020-03-04 16:53:49'),
(469, 50, 57, 10, 469, '25.0829784', '-77.3136864', '2020-03-04 21:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `t_usertype`
--

CREATE TABLE `t_usertype` (
  `user_type_id` int(30) NOT NULL,
  `remark` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_walkinstoreoffer`
--

CREATE TABLE `t_walkinstoreoffer` (
  `walkin_store_offer_id` int(30) NOT NULL,
  `store_id` int(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `spend_time_id` int(30) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publish_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_slider`
--
ALTER TABLE `app_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `referral_app`
--
ALTER TABLE `referral_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_aaa`
--
ALTER TABLE `t_aaa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `c_date` (`c_date`);

--
-- Indexes for table `T_Activity`
--
ALTER TABLE `T_Activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `activity_name` (`activity_name`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_ActivityLog`
--
ALTER TABLE `T_ActivityLog`
  ADD PRIMARY KEY (`activity_log_id`),
  ADD KEY `activity_name` (`activity_name`),
  ADD KEY `activity_type` (`activity_type`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `store_offer_id` (`store_offer_id`),
  ADD KEY `store` (`store`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activity_date` (`activity_date`),
  ADD KEY `activity_time` (`activity_time`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_AppShare`
--
ALTER TABLE `T_AppShare`
  ADD PRIMARY KEY (`app_share_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `share_type` (`share_type`),
  ADD KEY `key_1` (`key_1`),
  ADD KEY `key_2` (`key_2`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_AssignBeacon`
--
ALTER TABLE `T_AssignBeacon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `space_id` (`space_id`),
  ADD KEY `beacon_name` (`beacon_name`),
  ADD KEY `point_x` (`point_x`),
  ADD KEY `point_y` (`point_y`);

--
-- Indexes for table `T_Beacon`
--
ALTER TABLE `T_Beacon`
  ADD PRIMARY KEY (`beacon_id`),
  ADD UNIQUE KEY `beacon_key_4` (`beacon_key`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `beacon_key` (`beacon_key`),
  ADD KEY `name` (`name`),
  ADD KEY `uuid` (`uuid`),
  ADD KEY `beacon_status` (`beacon_status`),
  ADD KEY `assigned_to_store` (`assigned_to_store`),
  ADD KEY `already_assigned` (`already_assigned`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`),
  ADD KEY `store_id_2` (`store_id`),
  ADD KEY `beacon_key_2` (`beacon_key`),
  ADD KEY `name_2` (`name`),
  ADD KEY `uuid_2` (`uuid`),
  ADD KEY `beacon_status_2` (`beacon_status`),
  ADD KEY `assigned_to_store_2` (`assigned_to_store`),
  ADD KEY `already_assigned_2` (`already_assigned`),
  ADD KEY `created_date_2` (`created_date`),
  ADD KEY `last_updated_date_2` (`last_updated_date`),
  ADD KEY `store_id_3` (`store_id`),
  ADD KEY `beacon_key_3` (`beacon_key`),
  ADD KEY `name_3` (`name`),
  ADD KEY `uuid_3` (`uuid`),
  ADD KEY `beacon_status_3` (`beacon_status`),
  ADD KEY `assigned_to_store_3` (`assigned_to_store`),
  ADD KEY `already_assigned_3` (`already_assigned`),
  ADD KEY `created_date_3` (`created_date`),
  ADD KEY `last_updated_date_3` (`last_updated_date`);

--
-- Indexes for table `T_BeaconActivity`
--
ALTER TABLE `T_BeaconActivity`
  ADD PRIMARY KEY (`beacon_activity_id`),
  ADD KEY `beacon_id` (`beacon_id`),
  ADD KEY `beacon_key` (`beacon_key`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `detected_date` (`detected_date`),
  ADD KEY `active` (`active`),
  ADD KEY `total_spent_time` (`total_spent_time`,`active`),
  ADD KEY `active_2` (`active`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`),
  ADD KEY `beacon_id_2` (`beacon_id`),
  ADD KEY `beacon_key_2` (`beacon_key`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `store_id_2` (`store_id`),
  ADD KEY `detected_date_2` (`detected_date`),
  ADD KEY `active_3` (`active`),
  ADD KEY `total_spent_time_2` (`total_spent_time`,`active`),
  ADD KEY `active_4` (`active`),
  ADD KEY `created_date_2` (`created_date`),
  ADD KEY `last_updated_date_2` (`last_updated_date`),
  ADD KEY `beacon_id_3` (`beacon_id`),
  ADD KEY `beacon_key_3` (`beacon_key`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `store_id_3` (`store_id`),
  ADD KEY `detected_date_3` (`detected_date`),
  ADD KEY `active_5` (`active`),
  ADD KEY `total_spent_time_3` (`total_spent_time`,`active`),
  ADD KEY `active_6` (`active`),
  ADD KEY `created_date_3` (`created_date`),
  ADD KEY `last_updated_date_3` (`last_updated_date`);

--
-- Indexes for table `T_Beacons`
--
ALTER TABLE `T_Beacons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beacon_key_4` (`beacon_key`),
  ADD KEY `space_id` (`space_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `is_entrance_beacon` (`is_entrance_beacon`),
  ADD KEY `beacon_key` (`beacon_key`),
  ADD KEY `beacon_name` (`beacon_name`),
  ADD KEY `beacon_place` (`beacon_place`),
  ADD KEY `beacon_uuid` (`beacon_uuid`),
  ADD KEY `beacon_major` (`beacon_major`),
  ADD KEY `beacon_minor` (`beacon_minor`),
  ADD KEY `beacon_type` (`beacon_type`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`),
  ADD KEY `space_id_2` (`space_id`),
  ADD KEY `store_id_2` (`store_id`),
  ADD KEY `is_entrance_beacon_2` (`is_entrance_beacon`),
  ADD KEY `beacon_key_2` (`beacon_key`),
  ADD KEY `beacon_name_2` (`beacon_name`),
  ADD KEY `beacon_place_2` (`beacon_place`),
  ADD KEY `beacon_uuid_2` (`beacon_uuid`),
  ADD KEY `beacon_major_2` (`beacon_major`),
  ADD KEY `beacon_minor_2` (`beacon_minor`),
  ADD KEY `beacon_type_2` (`beacon_type`),
  ADD KEY `created_date_2` (`created_date`),
  ADD KEY `last_updated_date_2` (`last_updated_date`),
  ADD KEY `space_id_3` (`space_id`),
  ADD KEY `store_id_3` (`store_id`),
  ADD KEY `is_entrance_beacon_3` (`is_entrance_beacon`),
  ADD KEY `beacon_key_3` (`beacon_key`),
  ADD KEY `beacon_name_3` (`beacon_name`),
  ADD KEY `beacon_place_3` (`beacon_place`),
  ADD KEY `beacon_uuid_3` (`beacon_uuid`),
  ADD KEY `beacon_major_3` (`beacon_major`),
  ADD KEY `beacon_minor_3` (`beacon_minor`),
  ADD KEY `beacon_type_3` (`beacon_type`),
  ADD KEY `created_date_3` (`created_date`),
  ADD KEY `last_updated_date_3` (`last_updated_date`);

--
-- Indexes for table `T_Category`
--
ALTER TABLE `T_Category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `T_Categorys`
--
ALTER TABLE `T_Categorys`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `name` (`name`),
  ADD KEY `category_image` (`category_image`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_Coupon`
--
ALTER TABLE `T_Coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `store_offer_id` (`store_offer_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `coupon_expiry_date` (`coupon_expiry_date`),
  ADD KEY `claims` (`claims`),
  ADD KEY `coupon_points` (`coupon_points`),
  ADD KEY `status` (`status`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_CouponClaims`
--
ALTER TABLE `T_CouponClaims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `claim_code` (`claim_code`),
  ADD KEY `claim_date` (`claim_date`),
  ADD KEY `claim_status` (`claim_status`),
  ADD KEY `request_status` (`request_status`),
  ADD KEY `claim_for_rubs` (`claim_for_rubs`),
  ADD KEY `coupon_visibility_for_user` (`coupon_visibility_for_user`),
  ADD KEY `created_date` (`created_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_Feedback`
--
ALTER TABLE `T_Feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_otp_auth`
--
ALTER TABLE `t_otp_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_number` (`phone_number`),
  ADD KEY `access_token` (`access_token`),
  ADD KEY `otp` (`otp`),
  ADD KEY `generate_time` (`generate_time`),
  ADD KEY `validate_time` (`validate_time`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `T_Payment`
--
ALTER TABLE `T_Payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `credits` (`credits`),
  ADD KEY `points` (`points`),
  ADD KEY `payment_status` (`payment_status`),
  ADD KEY `payment_time` (`payment_time`),
  ADD KEY `payment_date` (`payment_date`),
  ADD KEY `last_updated_date` (`last_updated_date`);

--
-- Indexes for table `T_PaytmRedeemRequests`
--
ALTER TABLE `T_PaytmRedeemRequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `no_of_rubs` (`no_of_rubs`),
  ADD KEY `request_status` (`request_status`),
  ADD KEY `request_date` (`request_date`);

--
-- Indexes for table `T_RewardPoints`
--
ALTER TABLE `T_RewardPoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reward_points` (`reward_points`);

--
-- Indexes for table `T_Rub`
--
ALTER TABLE `T_Rub`
  ADD PRIMARY KEY (`rub_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `purchase_date` (`purchase_date`),
  ADD KEY `amount` (`amount`),
  ADD KEY `rubs` (`rubs`),
  ADD KEY `staus` (`staus`),
  ADD KEY `purchase_time` (`purchase_time`);

--
-- Indexes for table `T_SocialSharePoint`
--
ALTER TABLE `T_SocialSharePoint`
  ADD PRIMARY KEY (`social_share_point_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `store_offer_id` (`store_offer_id`),
  ADD KEY `facebook_points` (`facebook_points`),
  ADD KEY `twitter_points` (`twitter_points`),
  ADD KEY `share_type` (`share_type`),
  ADD KEY `points` (`points`);

--
-- Indexes for table `T_SocialType`
--
ALTER TABLE `T_SocialType`
  ADD PRIMARY KEY (`social_type_id`),
  ADD KEY `social_name` (`social_name`),
  ADD KEY `social_name_2` (`social_name`);

--
-- Indexes for table `T_Space`
--
ALTER TABLE `T_Space`
  ADD PRIMARY KEY (`space_id`),
  ADD KEY `space_name` (`space_name`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `width` (`width`),
  ADD KEY `height` (`height`),
  ADD KEY `grid_pixel` (`grid_pixel`);

--
-- Indexes for table `T_SpacePoint`
--
ALTER TABLE `T_SpacePoint`
  ADD PRIMARY KEY (`point_id`),
  ADD KEY `space_id` (`space_id`),
  ADD KEY `point_name` (`point_name`),
  ADD KEY `point_x` (`point_x`),
  ADD KEY `point_y` (`point_y`);

--
-- Indexes for table `T_SpendTimeValue`
--
ALTER TABLE `T_SpendTimeValue`
  ADD PRIMARY KEY (`spend_time_id`),
  ADD KEY `value` (`value`);

--
-- Indexes for table `T_Status`
--
ALTER TABLE `T_Status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `status_name` (`status_name`),
  ADD KEY `status_name_2` (`status_name`);

--
-- Indexes for table `T_Store`
--
ALTER TABLE `T_Store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_first_name` (`store_first_name`),
  ADD KEY `store_last_name` (`store_last_name`),
  ADD KEY `store_email` (`store_email`),
  ADD KEY `store_mobile_no` (`store_mobile_no`),
  ADD KEY `store_alternet_contact_no` (`store_alternet_contact_no`),
  ADD KEY `category` (`category`),
  ADD KEY `state` (`state`),
  ADD KEY `store_open_hours` (`store_open_hours`),
  ADD KEY `store_close_hours` (`store_close_hours`),
  ADD KEY `store_latitude` (`store_latitude`),
  ADD KEY `store_longitude` (`store_longitude`),
  ADD KEY `otp_code` (`otp_code`),
  ADD KEY `is_email_verify` (`is_email_verify`),
  ADD KEY `is_mobile_verify` (`is_mobile_verify`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `store_point` (`store_point`),
  ADD KEY `walking_point` (`walking_point`),
  ADD KEY `reg_date` (`reg_date`),
  ADD KEY `reg_time` (`reg_time`),
  ADD KEY `reset_link_expire_time` (`reset_link_expire_time`),
  ADD KEY `link_expire` (`link_expire`),
  ADD KEY `zipcode` (`zipcode`);

--
-- Indexes for table `T_StoreOffer`
--
ALTER TABLE `T_StoreOffer`
  ADD PRIMARY KEY (`store_offer_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `publish_date` (`publish_date`),
  ADD KEY `publish_time` (`publish_time`),
  ADD KEY `expiry_date` (`expiry_date`),
  ADD KEY `expiry_time` (`expiry_time`),
  ADD KEY `offer_term_condition_id` (`offer_term_condition_id`),
  ADD KEY `offer_status` (`offer_status`),
  ADD KEY `no_of_shares` (`no_of_shares`),
  ADD KEY `maximum_point` (`maximum_point`),
  ADD KEY `offer_visibility` (`offer_visibility`);

--
-- Indexes for table `T_StoreOfferSocialPoint`
--
ALTER TABLE `T_StoreOfferSocialPoint`
  ADD PRIMARY KEY (`so_social_point_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `store_offer_id` (`store_offer_id`),
  ADD KEY `facebook_points` (`facebook_points`),
  ADD KEY `twitter_points` (`twitter_points`),
  ADD KEY `walking_points` (`walking_points`);

--
-- Indexes for table `T_StoreOfferTermCondition`
--
ALTER TABLE `T_StoreOfferTermCondition`
  ADD PRIMARY KEY (`offer_term_condition_id`);

--
-- Indexes for table `T_Superadmin`
--
ALTER TABLE `T_Superadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `T_User`
--
ALTER TABLE `T_User`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type_id` (`user_type_id`),
  ADD KEY `is_social` (`is_social`),
  ADD KEY `fb_userid` (`fb_userid`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `email_send_time` (`email_send_time`),
  ADD KEY `activity` (`activity`),
  ADD KEY `phone_number` (`phone_number`),
  ADD KEY `gender` (`gender`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `reminder_switch` (`reminder_switch`),
  ADD KEY `redeem_switch` (`redeem_switch`),
  ADD KEY `walkin_switch` (`walkin_switch`),
  ADD KEY `sharing_offer_switch` (`sharing_offer_switch`),
  ADD KEY `sharing_app_switch` (`sharing_app_switch`),
  ADD KEY `access_token` (`access_token`),
  ADD KEY `otp_auth_id` (`otp_auth_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `T_UserFavorites`
--
ALTER TABLE `T_UserFavorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `favorite_id` (`favorite_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `T_UserPoint`
--
ALTER TABLE `T_UserPoint`
  ADD PRIMARY KEY (`user_point_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `facebook_points` (`facebook_points`),
  ADD KEY `twitter_points` (`twitter_points`),
  ADD KEY `walking_points` (`walking_points`),
  ADD KEY `reward_points` (`reward_points`),
  ADD KEY `paytm_redeem_rubs` (`paytm_redeem_rubs`),
  ADD KEY `coupon_redeem_rubs` (`coupon_redeem_rubs`);

--
-- Indexes for table `T_UserReviews`
--
ALTER TABLE `T_UserReviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `rating` (`rating`);

--
-- Indexes for table `T_Userstorewalkinpoint`
--
ALTER TABLE `T_Userstorewalkinpoint`
  ADD PRIMARY KEY (`user_store_walkin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `walkin_points` (`walkin_points`),
  ADD KEY `latitude` (`latitude`),
  ADD KEY `longitude` (`longitude`),
  ADD KEY `created_date` (`created_date`);

--
-- Indexes for table `t_usertype`
--
ALTER TABLE `t_usertype`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `t_walkinstoreoffer`
--
ALTER TABLE `t_walkinstoreoffer`
  ADD PRIMARY KEY (`walkin_store_offer_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `title` (`title`),
  ADD KEY `spend_time_id` (`spend_time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_slider`
--
ALTER TABLE `app_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `referral_app`
--
ALTER TABLE `referral_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_aaa`
--
ALTER TABLE `t_aaa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `T_Activity`
--
ALTER TABLE `T_Activity`
  MODIFY `activity_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_ActivityLog`
--
ALTER TABLE `T_ActivityLog`
  MODIFY `activity_log_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=873;
--
-- AUTO_INCREMENT for table `T_AppShare`
--
ALTER TABLE `T_AppShare`
  MODIFY `app_share_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_AssignBeacon`
--
ALTER TABLE `T_AssignBeacon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `T_Beacon`
--
ALTER TABLE `T_Beacon`
  MODIFY `beacon_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `T_BeaconActivity`
--
ALTER TABLE `T_BeaconActivity`
  MODIFY `beacon_activity_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;
--
-- AUTO_INCREMENT for table `T_Beacons`
--
ALTER TABLE `T_Beacons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `T_Coupon`
--
ALTER TABLE `T_Coupon`
  MODIFY `coupon_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `T_CouponClaims`
--
ALTER TABLE `T_CouponClaims`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `T_Feedback`
--
ALTER TABLE `T_Feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_otp_auth`
--
ALTER TABLE `t_otp_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT for table `T_Payment`
--
ALTER TABLE `T_Payment`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `T_PaytmRedeemRequests`
--
ALTER TABLE `T_PaytmRedeemRequests`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `T_RewardPoints`
--
ALTER TABLE `T_RewardPoints`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Rub`
--
ALTER TABLE `T_Rub`
  MODIFY `rub_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_SocialSharePoint`
--
ALTER TABLE `T_SocialSharePoint`
  MODIFY `social_share_point_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `T_SocialType`
--
ALTER TABLE `T_SocialType`
  MODIFY `social_type_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Space`
--
ALTER TABLE `T_Space`
  MODIFY `space_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `T_SpacePoint`
--
ALTER TABLE `T_SpacePoint`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_SpendTimeValue`
--
ALTER TABLE `T_SpendTimeValue`
  MODIFY `spend_time_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `T_Status`
--
ALTER TABLE `T_Status`
  MODIFY `status_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `T_Store`
--
ALTER TABLE `T_Store`
  MODIFY `store_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `T_StoreOffer`
--
ALTER TABLE `T_StoreOffer`
  MODIFY `store_offer_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `T_StoreOfferSocialPoint`
--
ALTER TABLE `T_StoreOfferSocialPoint`
  MODIFY `so_social_point_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `T_StoreOfferTermCondition`
--
ALTER TABLE `T_StoreOfferTermCondition`
  MODIFY `offer_term_condition_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `T_Superadmin`
--
ALTER TABLE `T_Superadmin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `T_User`
--
ALTER TABLE `T_User`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `T_UserFavorites`
--
ALTER TABLE `T_UserFavorites`
  MODIFY `favorite_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `T_UserPoint`
--
ALTER TABLE `T_UserPoint`
  MODIFY `user_point_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `T_UserReviews`
--
ALTER TABLE `T_UserReviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `T_Userstorewalkinpoint`
--
ALTER TABLE `T_Userstorewalkinpoint`
  MODIFY `user_store_walkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;
--
-- AUTO_INCREMENT for table `t_usertype`
--
ALTER TABLE `t_usertype`
  MODIFY `user_type_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_walkinstoreoffer`
--
ALTER TABLE `t_walkinstoreoffer`
  MODIFY `walkin_store_offer_id` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
