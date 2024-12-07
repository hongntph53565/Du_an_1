-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2024 at 08:46 AM
-- Server version: 8.2.0
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birthday` date DEFAULT NULL,
  `cre_date` date DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `username`, `password`, `fullname`, `image`, `email`, `phone`, `address`, `birthday`, `cre_date`, `role`) VALUES
(1, 'admin', '1', 'Nguyễn Thị Hồng', 'admin.jpg', 'hongt@gmail.com', '0951666738', 'Hà Nội', '2024-11-07', '2024-11-17', 1),
(2, 'hungduypham', '12345678', 'Phạm Duy Hưng', 'images/me.jpg', 'hungpdph53540@gmail.com', '0378450452', 'Hà Nội', '2005-12-10', NULL, 0),
(3, 'root', 'Hung1810', 'Phạm Duy Hưng', '', 'hungpdph53540@gmail.com', '0378450452', 'Hà Nội', '2005-10-18', NULL, 0),
(4, 'Giahungluxury', 'Hung1810', 'Phạm Duy Hưng', 'images/5f1882c88c8565db3c94.jpg', 'hungpdph53540@gmail.com', '0378450452', 'Hưng Yên', '2005-10-18', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `acc_id` int NOT NULL,
  `pro_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `acc_id`, `pro_id`, `quantity`, `created_at`) VALUES
(5, 2, 38, 1, '2024-12-01 11:33:19'),
(6, 2, 34, 1, '2024-12-01 11:37:08'),
(7, 2, 39, 1, '2024-12-01 11:43:07'),
(11, 2, 33, 2, '2024-12-01 11:58:38'),
(13, 2, 6, 2, '2024-12-01 12:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int NOT NULL,
  `cate_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `parent_id`) VALUES
(1, 'Nam', NULL),
(2, 'Nữ', NULL),
(3, 'Bé Trai', NULL),
(4, 'Bé Gái', NULL),
(5, 'Áo phông', 1),
(6, 'Áo khoác gió', 1),
(7, 'Áo nỉ', 1),
(8, 'Áo len', 1),
(10, 'Quần jean', 1),
(11, 'Áo polo', 1),
(12, 'Áo phông', 2),
(13, 'Áo khoác gió', 2),
(14, 'Áo nỉ', 2),
(15, 'Áo len', 2),
(16, 'Bộ ngủ', 2),
(17, 'Quần jean', 2),
(18, 'Áo polo', 2),
(19, 'Váy', 2),
(20, 'Áo phông', 3),
(21, 'Áo khoác gió', 3),
(22, 'Áo nỉ', 3),
(23, 'Áo len', 3),
(24, 'Bộ ngủ', 3),
(25, 'Quần jean', 3),
(26, 'Áo polo', 3),
(27, 'Váy', 4),
(28, 'Áo phông', 4),
(29, 'Áo khoác gió', 4),
(30, 'Áo nỉ', 4),
(31, 'Áo len', 4),
(32, 'Bộ ngủ', 4),
(33, 'Quần jean', 4),
(34, 'Áo polo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int NOT NULL,
  `acc_id` int NOT NULL,
  `pro_id` int NOT NULL,
  `content` varchar(200) NOT NULL,
  `cmt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `detail_order_id` int NOT NULL,
  `order_id` int NOT NULL,
  `pro_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int NOT NULL,
  `acc_id` int NOT NULL,
  `status` tinyint NOT NULL,
  `other_addr` varchar(100) NOT NULL,
  `pay` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int NOT NULL,
  `cate_id` int NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `sale` int NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `view` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `cate_id`, `ten_sp`, `price`, `quantity`, `sale`, `image`, `description`, `view`) VALUES
(6, 1, 'Áo nỉ có mũ ', 489000, 1000, 399000, 'uploads/Nam1.webp', 'qưeqwqwe', NULL),
(7, 5, 'Áo Phoong Nam', 489000, 1000, 399000, 'uploads/8ts24s019-se026-l-1-u.webp', 'sajdasjlldasdlasdasd', NULL),
(8, 8, 'Áo Len Nam', 489000, 1000, 399000, 'uploads/6te24w010-cr147-l-1-u.webp', 'asljdljasdasa', NULL),
(9, 8, 'Áo Len Cổ Nam', 349000, 1000, 399000, 'uploads/6te24w013-sw010-l-1-u.webp', 'Áo Len Cổ Nam', NULL),
(10, 8, 'Áo Len Nam', 349000, 1000, 419000, 'uploads/8te24w002-sa800-thumb.webp', 'Áo Len Nam', NULL),
(11, 8, 'Áo Len Nam', 349000, 1000, 419000, 'uploads/8te23w022-sl146-xl-1-u.webp', 'Áo Len Nam', NULL),
(12, 8, 'Áo len lông cừu cao cấp nam cổ tròn dáng suông', 799000, 1000, 659000, 'uploads/8te23w011-se424-1-thumb.webp', 'Áo len nam dài tay, cổ tròn, dáng regular không quá ôm cũng không quá rộng tạo cho người mặc thấy thoải mái, vừa vặn', NULL),
(13, 8, 'Áo len nam cổ tròn dáng suông', 799000, 1000, 659000, 'uploads/8te23w002-sb166-5-a.webp', 'Áo len nam cổ tròn dáng suông', NULL),
(14, 5, 'Áo Phông Nam', 479000, 1000, 419000, 'uploads/8ts24c001-sb001-xl-1-u.webp', 'Áo Phông Nam', NULL),
(15, 5, 'Áo Phông Nam', 479000, 1000, 419000, 'uploads/8ts24c001-sw012-thumb.webp', 'Áo Phông Nam', NULL),
(16, 5, 'Áo Phông Nam Họa Tiết USA', 479000, 1000, 419000, 'uploads/8ts24c005-sb001-xl-1-u.webp', 'Áo Phông Nam', NULL),
(17, 5, 'Áo Phông Nam ', 479000, 1000, 419000, 'uploads/8ts24w003-fk111-xl-1-u.webp', 'Áo Phông Nam', NULL),
(18, 5, 'Áo Phông Nam Họa Tiết Cổ', 479000, 1000, 419000, 'uploads/8ts24w004-sb001-xl-1-u.webp', 'Áo Phông Nam', NULL),
(19, 6, 'Áo Khoác Gió Nam', 599000, 1000, 489000, 'uploads/8ot24w001-sb757-thumb.webp', 'Áo Khoác Gió Nam', NULL),
(20, 6, 'Áo Khoác Gió Nam', 599000, 1000, 489000, 'uploads/8ot24w003-sk010-thumb.webp', 'Áo Khoác Gió Nam', NULL),
(21, 6, 'Áo Khoác Gió Nam', 599000, 1000, 489000, 'uploads/8ot24w034-sl291-xl-1-u.webp', 'Áo Khoác Gió Nam', NULL),
(22, 7, 'Áo Nỉ Nam', 689000, 1000, 569000, 'uploads/5tw24w003-se528-xl-1-u.webp', 'Áo Nỉ Nam', NULL),
(23, 7, 'Áo Nỉ Nam', 689000, 1000, 569000, 'uploads/8te23w022-sl146-xl-1-u.webp', 'Áo Nỉ Nam', NULL),
(24, 7, 'Áo nỉ nam in hình Avenger', 699000, 1000, 589000, 'uploads/8tw24c002-sw011-thumb.webp', 'Áo nỉ nam in hình Avenger', NULL),
(25, 10, 'Quần jeans nam phom relaxed', 699000, 1000, 639000, 'uploads/8bj24w004-sj891-31-1-u.webp', 'Quần jeans nam phom relaxed', NULL),
(26, 10, 'Quần jeans nam phom straight', 699000, 1000, 639000, 'uploads/Jean1.webp', 'Quần jeans nam phom straight', NULL),
(27, 10, 'Quần jeans nam cotton dáng suông', 699000, 1000, 639000, 'uploads/8bj24a003-sj870-thumb.webp', 'Quần jeans nam cotton dáng suông', NULL),
(28, 11, 'Áo polo active nam hình in phản quang', 399000, 1000, 329000, 'uploads/8tp24s012-sa903-l-1-u.webp', 'Áo polo active nam hình in phản quang', NULL),
(29, 11, 'Áo polo nam cotton USA dáng rộng', 399000, 1000, 329000, 'uploads/8tp24w001-sb001-l-1-u.webp', 'Áo polo nam cotton USA dáng rộng', NULL),
(30, 11, 'Áo len polo nam cộc tay', 479000, 1000, 419000, 'uploads/8te24w012-se413-thumb.webp', 'Áo len polo nam cộc tay', NULL),
(31, 1, 'Áo Hoodie Unisex (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w001-sb335-m-1-u.webp', 'Áo Hoodie Unisex (Nam & Nữ)', NULL),
(32, 1, 'Áo Hoodie Unisex (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w001-sg646-m-1-u.webp', 'Áo Hoodie Unisex (Nam & Nữ)', NULL),
(33, 1, 'Áo Hoodie Unisex (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w001-sk010-m-1-u.webp', 'Áo Hoodie Unisex (Nam & Nữ)', NULL),
(34, 1, 'Áo Len (Nam & Nữ)', 690000, 1000, 590000, 'uploads/6te24w010-cr147-l-1-u.webp', 'Áo Len (Nam & Nữ)', NULL),
(35, 1, 'Áo Nỉ (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w003-se528-xl-1-u.webp', 'Áo Nỉ (Nam & Nữ)', NULL),
(36, 1, 'Áo Nỉ Cổ Tròn (Nam & Nữ)', 690000, 1000, 590000, 'uploads/8te23w022-sl146-xl-1-u.webp', 'Áo Nỉ Cổ Tròn (Nam & Nữ)', NULL),
(37, 1, 'Áo Nỉ Cổ Tròn (Nam & Nữ)', 690000, 1000, 590000, 'uploads/6te24w013-sw010-l-1-u.webp', 'Áo Nỉ Cổ Tròn (Nam & Nữ)', NULL),
(38, 2, 'Áo Nỉ Cổ Tròn (Nam & Nữ)', 690000, 1000, 590000, 'uploads/6te24w013-sw010-l-1-u.webp', 'Áo Nỉ Cổ Tròn (Nam & Nữ)', NULL),
(39, 2, 'Áo Nỉ Cổ Tròn (Nam & Nữ)', 690000, 1000, 590000, 'uploads/8te23w022-sl146-xl-1-u.webp', 'Áo Nỉ Cổ Tròn (Nam & Nữ)', NULL),
(40, 2, 'Áo Nỉ Cổ Tròn (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w003-se528-xl-1-u.webp', 'Áo Nỉ Cổ Tròn (Nam & Nữ)', NULL),
(41, 2, 'Áo Hoodie Unisex (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w001-sg646-m-1-u.webp', 'Áo Hoodie Unisex (Nam & Nữ)', NULL),
(42, 2, 'Áo Hoodie Unisex (Nam & Nữ)', 690000, 1000, 590000, 'uploads/5tw24w001-sb335-m-1-u.webp', 'Áo Hoodie Unisex (Nam & Nữ)', NULL),
(43, 2, 'Áo Hoodie Nữ ', 690000, 1000, 590000, 'uploads/5tw24w001-sm176-m-1-u.webp', 'Áo Hoodie Nữ ', NULL),
(44, 2, 'Áo Nỉ Nữ Cổ Tròn ', 690000, 1000, 590000, 'uploads/5tw24w003-se528-2a.webp', 'Áo Nỉ Nữ Cổ Tròn ', NULL),
(45, 14, 'Áo Nỉ Nữ Cổ Tròn ', 690000, 1000, 590000, 'uploads/5tw24w003-se528-2a.webp', 'Áo Nỉ Nữ Cổ Tròn ', NULL),
(46, 2, 'Áo Nỉ Nữ Cổ Tròn ', 690000, 1000, 590000, 'uploads/5tw24w003-sk389-2a.webp', 'Áo Nỉ Nữ Cổ Tròn ', NULL),
(47, 14, 'Áo Nỉ Nữ Cổ Tròn ', 690000, 1000, 590000, 'uploads/5tw24w003-sk389-2a.webp', 'Áo Nỉ Nữ Cổ Tròn ', NULL),
(48, 13, 'Áo Khoác Gió Nữ', 290000, 1000, 240000, 'uploads/6ot24w021-sb010-l-1-u.webp', 'Áo Khoác Gió Nữ', NULL),
(49, 15, 'Áo Len Nữ', 490000, 1000, 440000, 'uploads/6te24w010-cr147-l-1-u.webp', 'Áo Len Nữ', NULL),
(50, 2, 'Áo Len Nữ', 490000, 1000, 440000, 'uploads/6te24w010-cr147-l-1-u.webp', 'Áo Len Nữ', NULL),
(51, 13, 'Áo khoác gió nữ hai lớp có mũ, kéo khóa', 799000, 1000, 689000, 'uploads/6ot24w002-sr021-l-1-u.webp', 'Áo khoác gió nữ hai lớp có mũ, kéo khóa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `product_id` (`pro_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`detail_order_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `lk_sanpham_danhmuc` (`cate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `detail_order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`cate_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
