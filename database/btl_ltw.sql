-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 30, 2024 at 07:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl_ltw`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `userName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `pass`, `phone`, `userName`) VALUES
(1, 'unieat@gmail.com', 'unieat', '0765710073', 'unieat'),
(2, 'test1', 'test1', '0123456789', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `idSeller` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogimages`
--

CREATE TABLE `blogimages` (
  `id` int(11) NOT NULL,
  `blogId` int(11) DEFAULT NULL,
  `imagelink` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `typeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `typeName`) VALUES
(1, 'Best Seller'),
(2, 'Trà Sữa'),
(3, 'Trà trái cây'),
(4, 'Sữa tươi'),
(5, 'Nước giải khát'),
(6, 'Sinh tố'),
(7, 'Đá bào'),
(8, 'Milk Shake'),
(9, 'Nước ngọt'),
(10, 'Ăn vặt');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idAccount` int(11) DEFAULT NULL,
  `idBlog` int(11) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `parentCommentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `usedAmount` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT 0,
  `isHidden` tinyint(1) DEFAULT 0,
  `cash` decimal(10,2) DEFAULT NULL,
  `valueCoupon` decimal(10,2) DEFAULT NULL,
  `maximum` decimal(10,2) DEFAULT NULL,
  `condValue` decimal(10,2) DEFAULT NULL,
  `condPayment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_in_use`
--

CREATE TABLE `coupon_in_use` (
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCoupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `timeNoti` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `timeNoti`, `title`) VALUES
(1, 'Đơn hàng ABCDXYZ nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2023-09-28 07:14:25', 'Bạn có đơn hàng mới!'),
(2, 'Đơn hàng NAMANH nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2023-09-28 21:02:16', 'Bạn có đơn hàng mới!');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `idAccount` int(11) NOT NULL,
  `idNotifications` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`idAccount`, `idNotifications`, `isRead`, `isDeleted`) VALUES
(1, 1, 0, 0),
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `statusOrder` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `isRepay` tinyint(1) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `isCanceled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT 0,
  `isHidden` tinyint(1) DEFAULT 0,
  `isReported` tinyint(1) DEFAULT 0,
  `price` decimal(10,2) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `deliveryType` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rate` decimal(3,1) DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `description`, `isDeleted`, `isHidden`, `isReported`, `price`, `idCategory`, `deliveryType`, `image`, `rate`) VALUES
(1, 'Trà sữa ba anh em', 100, 'Có 3 loại topping', 0, 1, 1, 45000.00, 1, '0', 'https://product.hstatic.net/1000360860/product/tra_sua_toco_517ae6b8d48942a3b0ff7f40fbe2fcc2_master.jpg', 0.0),
(2, 'Trà sữa trân châu đường đen', 50, 'Đã có sẵn trân châu', 0, 0, 1, 40000.00, 2, '0', 'https://feelingteaonline.com/wp-content/uploads/2020/08/s%C6%B0a-tuoi-tc-%C4%91%C6%B0%E1%BB%9Dng-%C4%91en.jpg', 0.0),
(3, 'Trà trái cây nhiệt đới', 50, 'Trái cây bao gồm: dâu, cam, dưa lưới, xoài', 0, 0, 0, 40000.00, 3, '0', 'https://abar.vn/wp-content/uploads/2021/08/I0615bu8D0OY_tra-trai-cay-nhiet-doi.jpg', 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `product_in_cart`
--

CREATE TABLE `product_in_cart` (
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_in_order`
--

CREATE TABLE `product_in_order` (
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ID` int(11) NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT 0,
  `idOrder` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `respone` mediumtext DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `timeRating` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `idAccount` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `timeReport` datetime DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`idAccount`, `idProduct`, `timeReport`, `content`) VALUES
(1, 1, '2024-05-22 00:09:43', 'Sản phẩm được báo cáo chứa quá nhiều trân châu có nghi ngờ xuất xứ không rõ ràng, cần được kiểm tra trước khi kinh doanh trở lại.'),
(2, 2, '2024-05-13 00:21:02', 'Hong có ngon :>');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `idAccount` int(11) NOT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `nameStore` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `isClose` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`idAccount`, `money`, `nameStore`, `address`, `tiktok`, `instagram`, `facebook`, `isClose`) VALUES
(1, 50000000.00, 'UniEat', 'Làng Đại học', 'unieat.tiktok.comm', 'unieat.insta.com', 'unieat.fb.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idAccount` int(11) NOT NULL,
  `isReported` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idAccount`, `isReported`) VALUES
(2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSeller` (`idSeller`);

--
-- Indexes for table `blogimages`
--
ALTER TABLE `blogimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogId` (`blogId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAccount` (`idAccount`),
  ADD KEY `idBlog` (`idBlog`),
  ADD KEY `parentCommentId` (`parentCommentId`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_in_use`
--
ALTER TABLE `coupon_in_use`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCoupon` (`idCoupon`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`idAccount`,`idNotifications`),
  ADD KEY `idNotifications` (`idNotifications`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD PRIMARY KEY (`idUser`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD PRIMARY KEY (`idProduct`,`idOrder`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idAccount`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`idAccount`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idAccount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogimages`
--
ALTER TABLE `blogimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`idSeller`) REFERENCES `sellers` (`idAccount`);

--
-- Constraints for table `blogimages`
--
ALTER TABLE `blogimages`
  ADD CONSTRAINT `blogimages_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blog` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`idAccount`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`parentCommentId`) REFERENCES `comments` (`id`);

--
-- Constraints for table `coupon_in_use`
--
ALTER TABLE `coupon_in_use`
  ADD CONSTRAINT `coupon_in_use_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `coupon_in_use_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `coupon_in_use_ibfk_3` FOREIGN KEY (`idCoupon`) REFERENCES `coupon` (`id`);

--
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `notify_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `notify_ibfk_2` FOREIGN KEY (`idNotifications`) REFERENCES `notifications` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD CONSTRAINT `product_in_cart_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `cart` (`userId`),
  ADD CONSTRAINT `product_in_cart_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD CONSTRAINT `product_in_order_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_in_order_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
