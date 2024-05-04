-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th5 04, 2024 lúc 05:28 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_ltw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `userName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `pass`, `phone`, `userName`) VALUES
(1, 'unieat@gmail.com', 'unieat', '0765710073', 'unieat'),
(2, 'test1', 'test1', '0123456789', 'test1'),
(3, 'test2', 'test2', '0123456789', 'test2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `idSeller` int(11) DEFAULT NULL,
  `header` mediumtext NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogimages`
--

CREATE TABLE `blogimages` (
  `id` int(11) NOT NULL,
  `blogId` int(11) DEFAULT NULL,
  `imagelink` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `typeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `typeName`) VALUES
(1, 'Best Seller'),
(2, 'Trà Sữa'),
(3, 'Trà trái cây'),
(4, 'Sữa tươi'),
(5, 'Sinh tố'),
(6, 'Nước ngọt'),
(7, 'Ăn vặt'),
(8, 'Cơm-Mì-Bún'),
(9, 'Đồ ăn Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
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
-- Cấu trúc bảng cho bảng `coupon`
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
-- Cấu trúc bảng cho bảng `coupon_in_use`
--

CREATE TABLE `coupon_in_use` (
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCoupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `timeNoti` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `timeNoti`, `title`) VALUES
(1, 'Đơn hàng ABCDXYZ nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2023-09-28 07:14:25', 'Bạn có đơn hàng mới!'),
(2, 'Đơn hàng NAMANH nóng hổi vừa mới đến. Hãy xác nhận đơn và thực hiện đơn hàng cho khách yêu của bạn nào!', '2023-09-28 21:02:16', 'Bạn có đơn hàng mới!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notify`
--

CREATE TABLE `notify` (
  `idAccount` int(11) NOT NULL,
  `idNotifications` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `notify`
--

INSERT INTO `notify` (`idAccount`, `idNotifications`, `isRead`, `isDeleted`) VALUES
(1, 1, 0, 0),
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
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
  `isCanceled` tinyint(1) DEFAULT NULL,
  `isPaid` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `payment`, `statusOrder`, `note`, `dateCreated`, `total`, `isRepay`, `address`, `isCanceled`, `isPaid`) VALUES
(1, 2, 'Ship COD', 'Đã hoàn thành', 'Giao rào A9 giúp em', '2024-04-08 10:30:32', 109000.00, NULL, 'Kí túc xá khu A làng đại học quốc gia TPHCM', 1, 0),
(2, 2, 'Ship COD', 'Đã hoàn thành', 'Giao rào A9 giúp em', '2024-03-04 10:31:56', 200000.00, NULL, 'Kí túc xá khu A làng đại học quốc gia TPHCM', NULL, 0),
(3, 3, 'MOMO', 'Đã hoàn thành', 'Giao cổng KTX ạ', NULL, 68000.00, NULL, 'Kí túc xá khu A làng đại học quốc gia TPHCM', NULL, 0),
(4, 3, 'MOMO', 'Đã hoàn thành', NULL, '2024-03-11 17:39:18', 240000.00, NULL, 'Kí túc xá khu B làng đại học quốc gia TPHCM', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `description`, `isDeleted`, `isHidden`, `isReported`, `price`, `idCategory`, `deliveryType`, `image`, `rate`) VALUES
(1, 'Trà sữa ba anh em', 100, 'Có 3 loại topping: thạch, trân châu, bánh flan', 0, 0, 1, 45000.00, 1, 'Cửa hàng tự vận chuyển', 'https://product.hstatic.net/1000360860/product/tra_sua_toco_517ae6b8d48942a3b0ff7f40fbe2fcc2_master.jpg', 0.0),
(2, 'Sữa tươi trân châu đường đen', 90, 'Cửa hàng tự vận chuyển', 0, 0, 1, 40000.00, 4, 'Cửa hàng tự vận chuyển', 'https://feelingteaonline.com/wp-content/uploads/2020/08/s%C6%B0a-tuoi-tc-%C4%91%C6%B0%E1%BB%9Dng-%C4%91en.jpg', 0.0),
(3, 'Trà trái cây nhiệt đới', 200, 'Trái cây bao gồm: dâu, cam, dưa lưới, xoài, ổi', 0, 0, 1, 1000.00, 3, 'Cửa hàng tự vận chuyển', 'https://congthucphache.com/wp-content/uploads/2022/11/tra-trai-cay-nhiet-doi.jpg', 0.0),
(4, 'Trà bí đao hạt chia', 50, 'Trà bí đao hạt chia giải nhiệt, thích hợp cho mùa hè nóng bức!!! <3', 0, 0, 1, 20000.00, 3, 'Cửa hàng tự vận chuyển', 'https://images.foody.vn/res/g79/781003/s800/foody-tra-bi-dao-hat-chia-ba-trieu-252-636746014125974092.jpg', 0.0),
(5, 'Trà sữa ô long', 85, 'Trà ô long tự nhiên, thanh nhiệt!', 0, 0, 0, 48000.00, 2, 'Cửa hàng tự vận chuyển', 'https://feelingteaonline.com/wp-content/uploads/2020/08/Tr%C3%A0-Olong-s%E1%BB%AFa.jpg', 0.0),
(6, 'Sinh tố dâu', 43, 'Dâu tây từ Đà Lạt. Mùa này dâu hơi mắc, quý khách cân nhắc khi mua', 0, 0, 0, 50000.00, 5, 'Cửa hàng tự vận chuyển', 'https://www.hoidaubepaau.com/wp-content/uploads/2015/12/sinh-to-dau.jpg', 0.0),
(7, 'Coca-Pepsi-7up', 100, 'Quý khách chọn 1 trong 3', 0, 0, 0, 15000.00, 6, 'Cửa hàng tự vận chuyển', 'https://cdn.tgdd.vn/Files/2017/04/12/971458/cach-lua-chon-va-su-dung-nuoc-ngot-khong-gay-hai-suc-khoe-2_760x506.jpg', 0.0),
(8, 'Trà sữa truyền thống', 190, 'Trà sữa thương hiệu của quán <3', 0, 0, 0, 35000.00, 1, 'Cửa hàng tự vận chuyển', 'https://kiwixanh.com/wp-content/uploads/2021/12/tra-sua-truyen-thong-1.jpg', 0.0),
(9, 'Cơm chiên dương châu', 40, 'Cơm chiên dương châu luôn là sự lựa chọn của bạn ^^', 0, 0, 0, 30000.00, 8, 'Cửa hàng tự vận chuyển', 'https://4.bp.blogspot.com/-F5b2m7upMiw/WkSt1qhi7_I/AAAAAAAAADY/doli22ApRcU6IJIKo35JjH8LHhjgDSRmACLcBGAs/s1600/com-chien-duong-chau-2018.jpg', 0.0),
(10, 'Mì ý sốt thịt bò bằm', 40, '89% là thịt :>', 0, 0, 0, 30000.00, 8, 'Cửa hàng tự vận chuyển', 'https://forza.com.vn/wp-content/uploads/2021/07/cach-lam-mi-y-thom-ngon-chuan-vi-tai-nha-6.jpeg', 0.0),
(11, 'Tokbokki phô mai', 40, 'Có kèm 1 trứng lòng đào ^^', 0, 0, 0, 35000.00, 9, 'Cừa hàng tự vận chuyển', 'https://cdn.shopify.com/s/files/1/0617/2497/files/cach-lam-tokbokki_a2179426-f894-4dda-a709-52fe9f07d6ab.jpg', 0.0),
(12, 'Bánh tráng trộn', 40, 'Bánh tráng trộn tại gia :))', 0, 0, 0, 20000.00, 7, 'Cừa hàng tự vận chuyển', 'https://media.cooky.vn/recipe/g1/1615/s800x500/recipe-cover-r1615.jpg', 0.0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_in_cart`
--

CREATE TABLE `product_in_cart` (
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_in_order`
--

CREATE TABLE `product_in_order` (
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_in_order`
--

INSERT INTO `product_in_order` (`idProduct`, `idOrder`, `price`, `quantity`, `note`) VALUES
(1, 3, 48000.00, 1, 'Ít đá'),
(6, 1, 50000.00, 1, NULL),
(7, 4, 35000.00, 4, NULL),
(8, 3, 35000.00, 1, 'Ít đá\r\n'),
(9, 1, 30000.00, 1, NULL),
(9, 3, 60000.00, 2, NULL),
(10, 2, 30000.00, 2, NULL),
(11, 2, 30000.00, 2, 'Có thể làm ít cay không ạ'),
(12, 1, 20000.00, 1, 'Không cay ạ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
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

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`ID`, `isHidden`, `idOrder`, `idUser`, `respone`, `content`, `stars`, `timeRating`) VALUES
(1, 0, 1, 2, 'Cảm ơn em nhé! Lần sau ủng hộ quán tiếp nhé', 'Mới ăn lần đầu nhưng ngon lắm mn ạ ^^ ', 4, '2024-04-09 10:37:29'),
(2, 0, 2, 2, NULL, 'Em quay lại rồi đây và đồ ăn vẫn ngon như ngày nàoooo', 2, '2024-04-16 10:38:30'),
(3, 0, 3, 3, 'Cảm ơn em nhá <3', 'Ăn biết bao lần ròi, lần nào cũng hợp khẩu vị', 3, '2024-05-01 10:39:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `idAccount` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `timeReport` datetime DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`idAccount`, `idProduct`, `timeReport`, `content`) VALUES
(2, 2, '2024-05-13 00:21:02', 'Hong có ngon :>'),
(2, 3, '2024-04-02 10:23:30', 'Test thử'),
(2, 4, '2024-03-11 10:24:01', 'Test thử\r\n'),
(3, 1, '2024-05-22 00:09:43', 'Sản phẩm được báo cáo chứa quá nhiều trân châu có nghi ngờ xuất xứ không rõ ràng, cần được kiểm tra trước khi kinh doanh trở lại.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sellers`
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
-- Đang đổ dữ liệu cho bảng `sellers`
--

INSERT INTO `sellers` (`idAccount`, `money`, `nameStore`, `address`, `tiktok`, `instagram`, `facebook`, `isClose`) VALUES
(1, 50000000.00, 'UniEat', 'Làng Đại Học', 'https://www.tiktok.com/@t1', 'https://www.instagram.com/t1lol/?igsh=aWFudmQ0Y2kzemVk', 'https://www.facebook.com/T1LoL', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `idAccount` int(11) NOT NULL,
  `isReported` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`idAccount`, `isReported`) VALUES
(2, 1),
(3, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSeller` (`idSeller`);

--
-- Chỉ mục cho bảng `blogimages`
--
ALTER TABLE `blogimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogId` (`blogId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`userId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAccount` (`idAccount`),
  ADD KEY `idBlog` (`idBlog`),
  ADD KEY `parentCommentId` (`parentCommentId`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon_in_use`
--
ALTER TABLE `coupon_in_use`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCoupon` (`idCoupon`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`idAccount`,`idNotifications`),
  ADD KEY `idNotifications` (`idNotifications`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Chỉ mục cho bảng `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD PRIMARY KEY (`idUser`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Chỉ mục cho bảng `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD PRIMARY KEY (`idProduct`,`idOrder`),
  ADD KEY `idOrder` (`idOrder`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idAccount`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Chỉ mục cho bảng `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`idAccount`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idAccount`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `blogimages`
--
ALTER TABLE `blogimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`idSeller`) REFERENCES `sellers` (`idAccount`);

--
-- Các ràng buộc cho bảng `blogimages`
--
ALTER TABLE `blogimages`
  ADD CONSTRAINT `blogimages_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blog` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`idAccount`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idBlog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`parentCommentId`) REFERENCES `comments` (`id`);

--
-- Các ràng buộc cho bảng `coupon_in_use`
--
ALTER TABLE `coupon_in_use`
  ADD CONSTRAINT `coupon_in_use_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `coupon_in_use_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `coupon_in_use_ibfk_3` FOREIGN KEY (`idCoupon`) REFERENCES `coupon` (`id`);

--
-- Các ràng buộc cho bảng `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `notify_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `notify_ibfk_2` FOREIGN KEY (`idNotifications`) REFERENCES `notifications` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD CONSTRAINT `product_in_cart_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `cart` (`userId`),
  ADD CONSTRAINT `product_in_cart_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD CONSTRAINT `product_in_order_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_in_order_ibfk_2` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idAccount`);

--
-- Các ràng buộc cho bảng `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
