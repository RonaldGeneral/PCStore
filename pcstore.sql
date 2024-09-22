-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 02:50 PM
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
-- Database: `pcstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varbinary(64) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `position_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `birthdate`, `phone`, `email`, `gender`, `username`, `password`, `status`, `created_on`, `position_id`) VALUES
(1, 'admin123', '1994-09-07 18:27:04', '011-43248220', 'admin123@gmail.com', 'm', 'admin123', 0x2432792431322472526f50342e61434b57694570486c5664423558514f5a4f685a4864352f386a3452334944736e6773614178544c5250484558712e, 1, '2024-09-19 17:54:09', 1),
(2, 'staffonly', '2003-07-03 00:00:00', '012836281937', 'staffonly@gmail.com', 'm', 'staffonly', 0x243279243132244e6d75544f39666764426d2f58655557317a6c2f614f56754944346c7078507677482e6e67486d394e345732786355645451446371, 1, '2024-09-18 17:54:17', 6),
(3, 'warehouse', '2006-06-07 00:00:00', '012384739274', 'warehouse@gmail.com', 'f', 'warehouse', 0x243279243132246475624647574a6558466b492f6130506448643430654e4a34544f67503332645a352e646f743363645361364235496e4665685832, 1, '2024-09-22 08:00:27', 2),
(4, 'logistics', '1991-05-26 00:00:00', '012734972800', 'logistics@gmail.com', 'm', 'logistics', 0x24327924313224306c334e7751635a4677692f4e66634170396b65454f69364443477946515a423042334974627638704c557672565173416b453543, 1, '2024-09-22 08:01:28', 3),
(5, 'salesadmin', '2024-08-22 00:00:00', '014000000098', 'salesadmin@gmail.com', 'm', 'salesadmin', 0x243279243132246557704347784a4b46424b364f2f7a6b46777a6f66654e382f705a694b7348422e386e57494f7862695370737a584437574a415532, 1, '2024-09-22 08:02:15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_attribute`
--

CREATE TABLE `category_attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_attribute`
--

INSERT INTO `category_attribute` (`id`, `name`, `category`, `sort`) VALUES
(1, 'Processor', 'laptop', 1),
(2, 'Graphics', 'laptop', 2),
(3, 'Memory', 'laptop', 3),
(4, 'Storage', 'laptop', 4),
(5, 'Operating System', 'laptop', 5),
(6, 'Processor', 'prebuilt', 1),
(7, 'Graphics', 'prebuilt', 2),
(8, 'Memory', 'prebuilt', 3),
(9, 'Storage', 'prebuilt', 4),
(10, 'Operating System', 'prebuilt', 5),
(11, 'Power Supply', 'prebuilt', 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varbinary(64) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `birthdate`, `phone`, `email`, `gender`, `address`, `postcode`, `city`, `state`, `username`, `password`, `status`, `created_on`) VALUES
(3, 'customer one', '2024-09-23 00:00:00', '011-23242111', 'customer1@gmail.com', 'F', '12, Jalan Query', '39100', 'QueryCity', 'Kuala Lumpur', 'customer1', 0x24327924313224446a3949614331442e2f6b32584879782f44584543756349366148644c64793049684d716136536a6e6e494a45436644746d435247, 1, '2023-09-08 12:39:13'),
(4, 'John Fourier', '2024-01-09 00:00:00', '011-51280342', 'john1234@gmail.com', 'M', '4, Jalan Kanga 9, Taman Kanga', '13900', 'Bukit Mertajam', 'Penang', 'john1234', 0x243279243132245857794479676f6f4b38474c507138536573625a384f676b45383954774942515538634842314e4639793952694d49627a4f723875, 1, '2024-09-22 12:14:27'),
(5, 'Janelle Ong', '1996-01-02 00:00:00', '012-9839201', 'janelle400@gmail.com', 'f', '9, Jalan Street', '57100', 'Baker', 'Kuala Lumpur', 'janelle400', 0x24327924313224615658374b75526b79634164634d676a4d656a456b4f716a4c4b7253546831414b2e39446c4b482f4c34772f6f6575723645514f4f, 1, '2024-09-22 12:16:34');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `admin_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `title`, `description`, `page`, `created_on`, `admin_id`) VALUES
(1, 'Add product', 'Product Product 91 #12 added', 'product_page', '2024-09-21 18:03:47', 1),
(2, 'Edit product', 'Product refd #2 edited', 'product_details', '2024-09-22 06:36:44', 1),
(3, 'Add product', 'Product Lenovo ThinkPad 5000 #13 added', 'product_page', '2024-09-22 07:42:26', 1),
(4, 'Edit product', 'Product Lenovo ThinkPad 5000 #13 edited', 'product_details', '2024-09-22 07:42:45', 1),
(5, 'Edit product attribute', 'Product Lenovo ThinkPad 5000 #13 added', 'product_details', '2024-09-22 07:43:26', 1),
(6, 'Edit product attribute', 'Product Lenovo ThinkPad 5000 #13 added', 'product_details', '2024-09-22 07:43:35', 1),
(7, 'Edit product attribute', 'Product Lenovo ThinkPad 5000 #13 added', 'product_details', '2024-09-22 07:43:41', 1),
(8, 'Edit product attribute', 'Product Lenovo ThinkPad 5000 #13 added', 'product_details', '2024-09-22 07:43:46', 1),
(9, 'Edit product attribute', 'Product Lenovo ThinkPad 5000 #13 added', 'product_details', '2024-09-22 07:43:52', 1),
(10, 'Add product', 'Product Acer Me6 #14 added', 'product_page', '2024-09-22 07:45:05', 1),
(11, 'Edit product', 'Product Acer Me6 #14 edited', 'product_details', '2024-09-22 07:45:21', 1),
(12, 'Edit product attribute', 'Product Acer Me6 #14 added', 'product_details', '2024-09-22 07:45:31', 1),
(13, 'Edit product attribute', 'Product Acer Me6 #14 added', 'product_details', '2024-09-22 07:45:42', 1),
(14, 'Edit product attribute', 'Product Acer Me6 #14 added', 'product_details', '2024-09-22 07:45:48', 1),
(15, 'Edit product attribute', 'Product Acer Me6 #14 added', 'product_details', '2024-09-22 07:46:01', 1),
(16, 'Edit product attribute', 'Product Acer Me6 #14 added', 'product_details', '2024-09-22 07:46:11', 1),
(17, 'Edit product', 'Product Lenovo ThinkPad 5000 #13 edited', 'product_details', '2024-09-22 07:46:23', 1),
(18, 'Add product', 'Product MSI IdeaTooMuch #15 added', 'product_page', '2024-09-22 07:47:49', 1),
(19, 'Edit product', 'Product MSI IdeaTooMuch #15 edited', 'product_details', '2024-09-22 07:48:06', 1),
(20, 'Edit product attribute', 'Product MSI IdeaTooMuch #15 added', 'product_details', '2024-09-22 07:48:28', 1),
(21, 'Edit product attribute', 'Product MSI IdeaTooMuch #15 added', 'product_details', '2024-09-22 07:48:51', 1),
(22, 'Edit product attribute', 'Product MSI IdeaTooMuch #15 added', 'product_details', '2024-09-22 07:49:04', 1),
(23, 'Edit product attribute', 'Product MSI IdeaTooMuch #15 added', 'product_details', '2024-09-22 07:49:18', 1),
(24, 'Edit product attribute', 'Product MSI IdeaTooMuch #15 added', 'product_details', '2024-09-22 07:49:30', 1),
(25, 'Add product', 'Product ABC Prebuilt #16 added', 'product_page', '2024-09-22 07:50:54', 1),
(26, 'Edit product', 'Product ABC Prebuilt #16 edited', 'product_details', '2024-09-22 07:51:05', 1),
(27, 'Edit product attribute', 'Product ABC Prebuilt #16 added', 'product_details', '2024-09-22 07:51:16', 1),
(28, 'Edit product attribute', 'Product ABC Prebuilt #16 added', 'product_details', '2024-09-22 07:51:20', 1),
(29, 'Edit product attribute', 'Product ABC Prebuilt #16 added', 'product_details', '2024-09-22 07:51:25', 1),
(30, 'Edit product attribute', 'Product ABC Prebuilt #16 added', 'product_details', '2024-09-22 07:51:34', 1),
(31, 'Edit product attribute', 'Product ABC Prebuilt #16 added', 'product_details', '2024-09-22 07:51:39', 1),
(32, 'Add product', 'Product Acer Lenovo #17 added', 'product_page', '2024-09-22 07:52:25', 1),
(33, 'Edit product', 'Product Acer Lenovo #17 edited', 'product_details', '2024-09-22 07:52:40', 1),
(34, 'Edit product attribute', 'Product Acer Lenovo #17 added', 'product_details', '2024-09-22 07:52:49', 1),
(35, 'Edit product attribute', 'Product Acer Lenovo #17 added', 'product_details', '2024-09-22 07:52:57', 1),
(36, 'Edit product attribute', 'Product Acer Lenovo #17 added', 'product_details', '2024-09-22 07:53:05', 1),
(37, 'Edit product attribute', 'Product Acer Lenovo #17 added', 'product_details', '2024-09-22 07:53:13', 1),
(38, 'Edit product attribute', 'Product Acer Lenovo #17 added', 'product_details', '2024-09-22 07:53:19', 1),
(39, 'Add product', 'Product Great build #18 added', 'product_page', '2024-09-22 07:54:09', 1),
(40, 'Edit product', 'Product Great build #18 edited', 'product_details', '2024-09-22 07:54:24', 1),
(41, 'Edit product attribute', 'Product Great build #18 added', 'product_details', '2024-09-22 07:54:45', 1),
(42, 'Edit product attribute', 'Product Great build #18 added', 'product_details', '2024-09-22 07:54:53', 1),
(43, 'Edit product attribute', 'Product Great build #18 added', 'product_details', '2024-09-22 07:55:07', 1),
(44, 'Edit product attribute', 'Product Great build #18 added', 'product_details', '2024-09-22 07:55:15', 1),
(45, 'Edit product attribute', 'Product Great build #18 added', 'product_details', '2024-09-22 07:55:20', 1),
(46, 'Add product', 'Product Accee92 #19 added', 'product_page', '2024-09-22 07:55:53', 1),
(47, 'Edit product', 'Product G5000 #19 edited', 'product_details', '2024-09-22 07:56:11', 1),
(48, 'Edit product', 'Product G5000 #19 edited', 'product_details', '2024-09-22 07:56:18', 1),
(49, 'Edit product', 'Product G5000 #19 edited', 'product_details', '2024-09-22 07:56:29', 1),
(50, 'Edit product', 'Product G5000 #19 edited', 'product_details', '2024-09-22 07:57:38', 1),
(51, 'Add product', 'Product G888 #20 added', 'product_page', '2024-09-22 07:58:10', 1),
(52, 'Edit product', 'Product G5000 #19 edited', 'product_details', '2024-09-22 07:58:19', 1),
(53, 'Edit product', 'Product G888 #20 edited', 'product_details', '2024-09-22 07:58:29', 1),
(54, 'Edit product', 'Product G888 #20 edited', 'product_details', '2024-09-22 07:58:38', 1),
(55, 'Add customer', 'Customer John Fourier #4 added', 'customer_page', '2024-09-22 12:14:27', 1),
(56, 'Add customer', 'Customer Janelle Ong #5 added', 'customer_page', '2024-09-22 12:16:34', 1);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_08_31_111459_create_setup_table', 2),
(3, '2024_09_01_141558_create_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `delivery_fee` decimal(4,2) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'Status: \r\n            -1 = Deleted\r\n            1 = Order created\r\n            2 = Driver assigned\r\n            3 = Ongoing\r\n            4 = Completed',
  `created_on` timestamp NULL DEFAULT current_timestamp(),
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `subtotal`, `total`, `delivery_fee`, `delivery_id`, `status`, `created_on`, `customer_id`, `payment_id`) VALUES
(37, 2913.50, 2916.50, 3.00, 1, 1, '2024-09-22 08:05:36', 3, 49),
(38, 3833.80, 3836.80, 3.00, 2, 1, '2024-09-22 08:06:47', 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `product_id`, `quantity`, `price`, `subtotal`, `rating`) VALUES
(37, 13, 1, 2913.50, 2913.50, NULL),
(38, 18, 1, 731.30, 731.30, NULL),
(38, 19, 5, 620.50, 3102.50, NULL);

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `fpx_bank_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `tng_number` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_method`, `fpx_bank_name`, `card_number`, `tng_number`, `token`, `status`, `created_on`) VALUES
(49, 'tng', NULL, NULL, NULL, 'c9ab0d52-a8ea-44d3-b7ee-b03aeb9f75bb', 1, NULL),
(50, 'card', NULL, NULL, NULL, 'ba5d551d-c614-4c38-8f71-6f5a68bd4177', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`role`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `role`) VALUES
(1, 'CEO', '[\"audit\",\"cust\",\"order\",\"prod\",\"report\",\"staff\"]'),
(2, 'Warehouse admin', '[\"prod\"]'),
(3, 'Logistics Manager', '[\"cust\",\"order\"]'),
(4, 'Sales admin', '[\"cust\", \"order\", \"prod\", \"report\"]'),
(5, 'Sales executive', '[\"cust\", \"order\", \"prod\", \"report\"]'),
(6, 'HR Manager', '[\"audit\",\"staff\"]');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `total_rating` decimal(2,1) NOT NULL DEFAULT 0.0,
  `img_src1` varchar(255) DEFAULT NULL,
  `img_src2` varchar(255) DEFAULT NULL,
  `img_src3` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `description`, `status`, `total_rating`, `img_src1`, `img_src2`, `img_src3`, `category`) VALUES
(13, 'Lenovo ThinkPad 5000', 2913.50, 'Lenovo ThinkPad 5000 is a laptop that has never lap on the top with laptop design of the laptop design', 1, 0.0, '13_1.jpg', '13_2.jpg', NULL, 'laptop'),
(14, 'Acer Me6', 4020.30, 'As a old man once said, i am Acer Me6, look at me. The old man buy a laptop and then buy another laptop. It is in fact the laptop that ever laptoped.', 1, 0.0, '14_1.webp', '14_2.jpg', '14_3.jpg', 'laptop'),
(15, 'MSI IdeaTooMuch', 7291.20, 'Sun Tzu once said, knowing your enemy\'s laptop spec, you can win 1000 Valorant games. But to teach a man how to fish, you have to teach a man how to restart their laptop.', 1, 0.0, '15_1.jpg', '15_2.jpg', '15_3.jpg', 'laptop'),
(16, 'ABC Prebuilt', 900.00, 'This prebuilt is the most prebuilt in the industry with a standard prebuilt design and addon of more prebuilt with the consideration that is designed for prebuilt inside the whole prebuilt sector in the land of prebuilt.', 1, 0.0, '16_1.jpg', NULL, NULL, 'laptop'),
(17, 'Acer Lenovo', 10282.10, 'As acer once said, However, the current website still requires enhancements that are not just graphical improvements to meet the growing demands of students accessing the website and adapt to the rapid advancement in technology. These improvements will focus on enhancing functionality, data accessibility and decision-making tools that will benefit both the new potential students and current students.', 1, 0.0, '17_1.jpg', '17_2.webp', NULL, 'laptop'),
(18, 'Great build', 731.30, 'This may be caused you are in a route which does not represent the base URL. You should generate the URL for your assets relative to the public/ folder. Use URL::asset(\'path/to/asset\') to generate the URL.', 1, 0.0, '18_1.jpg', '18_2.jpg', NULL, 'laptop'),
(19, 'G5000', 620.50, '$query = DB::table(\'users\')->orderBy(\'name\'); $unorderedUsers = $query->reorder()->get();You may pass a column and direction when calling the reorder method in order to remove all existing \"order by\" clauses and apply an entirely new order to the query:$query = DB::table(\'users\')->orderBy(\'name\'); $usersOrderedByEmail = $query->reorder(\'email\', \'desc\')->get();GroupingThe groupBy and having Methods', 1, 0.0, '19_1.jpg', '19_2.jpg', '19_3.webp', 'accessories'),
(20, 'G888', 120.80, 'Sometimes you may want certain query clauses to apply to a query based on another condition. For instance, you may only want to apply a where statement if a given input value is present on the incoming HTTP request. You may accomplish this using the when method:', 1, 0.0, '20_1.jpg', '20_2.jpg', '20_3.jpg', 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`product_id`, `attribute_id`, `value`) VALUES
(13, 1, 'AMD Ryzen 5'),
(13, 2, 'RTX Fake Graphics'),
(13, 3, '8GB'),
(13, 4, '1TB'),
(13, 5, 'Doors10'),
(14, 1, 'AMD Ryzen 56565'),
(14, 2, 'iGPU'),
(14, 3, 'Goldfish'),
(14, 4, 'Bigger than my toilet'),
(14, 5, 'Windows is locked'),
(15, 1, 'I tel You i7'),
(15, 2, 'NVideo -2000'),
(15, 3, '64GB'),
(15, 4, '999TB'),
(15, 5, 'N/A'),
(16, 1, 'AMD Ryzen 5'),
(16, 2, 'gpu'),
(16, 3, 'rammm'),
(16, 4, '1gb'),
(16, 5, 'wat'),
(17, 1, 'AMD Intel'),
(17, 2, 'NVRTS'),
(17, 3, '932GB'),
(17, 4, 'Mom Garage'),
(17, 5, 'Open Windows'),
(18, 1, 'The orderBy method allows you to sort the results'),
(18, 2, 'able(\'users\')                 ->orderBy(\'name\', \'desc\')                 ->orderBy(\'email\', \'asc\')'),
(18, 3, 'This is just save my life :D'),
(18, 4, 'The latest and oldest methods'),
(18, 5, 'os');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hVmwbAQ7tjyeUEBzvpzXOD3xJYyGIb2xl8xFXAh1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiajdSNmNsTE9BWEFSYlJabmEwamtEVmtGalhEeVhyMXFXSG5UQzU5MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mcm9udCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjU1OiJsb2dpbl9jdXN0b21lcl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1727008916);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_position_id_foreign` (`position_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `cart_item_product_id_foreign` (`product_id`);

--
-- Indexes for table `category_attribute`
--
ALTER TABLE `category_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_activity_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`),
  ADD KEY `order_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_item_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`product_id`,`attribute_id`),
  ADD KEY `product_attribute_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_attribute`
--
ALTER TABLE `category_attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `cart_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD CONSTRAINT `log_activity_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `category_attribute` (`id`),
  ADD CONSTRAINT `product_attribute_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
