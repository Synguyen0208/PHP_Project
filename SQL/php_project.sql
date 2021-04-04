-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 03, 2021 lúc 11:43 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `phone` char(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `code` char(6) DEFAULT NULL CHECK (octet_length(`code`) = 6),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `phone`, `email`, `user`, `password`, `code`, `status`) VALUES
(8, NULL, 'sy.nguyen22@student.passerellesnumeriques.org', 'jjjyj', '55', NULL, 'Not Accept'),
(9, NULL, 'syn282002@gmail.com', 'Vansy', 'synguyen282001', NULL, 'Not Accept');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_admin`
--

CREATE TABLE `account_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_admin`
--

INSERT INTO `account_admin` (`id`, `email`, `password`, `status`) VALUES
(1, 'sy.nguyen22@student.passerellesnumeriques.org', 'synguyen282001', 'accept'),
(2, 'syn282002@gmail.com', 'synguyen282001', 'accept');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_cus` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `manager` varchar(30) DEFAULT NULL,
  `license_number` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `manager`, `license_number`, `phone`, `email`) VALUES
(1111, 'L’Oréal', 'Paris-Phap', 'Max Factor', 'NG53458JG', '0919610716', 'LOreal@gmail.com'),
(1112, 'Unilever', 'London-Anh', 'Katy Perry', 'RTW3T5D5', '01234567891', 'Unilever@gmail.com'),
(1113, 'Estée Lauder Companies', 'New York-USA', 'Clairol', 'YHY75Y54H', '43523665666', 'ELC@gmail.com'),
(1114, 'Proctor and Gamble P&G', 'New York-USA', 'Hugo Boss', 'RTER3465HTY', '23413253466', 'PAGPG@gmail.com'),
(1116, 'Shiseido ', 'Tokyo-Nhat Ban', 'Shiseido', '98IT5RE76', '743643756756', 'shiseido@gmail.com');

--
-- Bẫy `company`
--
DELIMITER $$
CREATE TRIGGER `company_after_delete` BEFORE DELETE ON `company` FOR EACH ROW delete from product where id_com=old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager_stock`
--

CREATE TABLE `manager_stock` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_cus` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `EDD` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_ship` int(11) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `ED` date DEFAULT NULL,
  `MFG` date DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `mass` int(11) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `id_com` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `discount`, `title`, `ED`, `MFG`, `image`, `mass`, `industry_id`, `id_com`, `quantity`) VALUES
(25, 'Áo mùa đôngsycute', '5455.00', 55, 'fgg', '2021-03-13', '2021-04-02', '/Image/star.png', 55, 1, 1111, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_industry`
--

CREATE TABLE `product_industry` (
  `id` int(11) NOT NULL,
  `industry` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_industry`
--

INSERT INTO `product_industry` (`id`, `industry`) VALUES
(1, 'Sửa rữa mặt'),
(2, 'Kem dưỡng da'),
(3, 'Tẩy trang'),
(4, 'Son môi'),
(5, 'Nước hoa'),
(6, 'Làm đẹp da'),
(8, 'Làm đẹp da'),
(14, 'Sáng da'),
(15, 'Sáng da');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_company`
--

CREATE TABLE `shipping_company` (
  `code` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statistical`
--

CREATE TABLE `statistical` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `quantity_add` int(11) DEFAULT NULL,
  `quantity_sell` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gendder` char(5) DEFAULT NULL,
  `id_account` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `birthday`, `gendder`, `id_account`, `address`) VALUES
(1, 'Nguyễn Văn Sỷ', '2021-04-21', 'Male', 8, NULL),
(2, 'Nguyễn Văn Sỷ', '2021-04-09', 'Male', 9, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `emai` (`email`);

--
-- Chỉ mục cho bảng `manager_stock`
--
ALTER TABLE `manager_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cus` (`id_cus`),
  ADD KEY `id_ship` (`id_ship`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_com` (`id_com`),
  ADD KEY `industry_id` (`industry_id`);

--
-- Chỉ mục cho bảng `product_industry`
--
ALTER TABLE `product_industry`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_company`
--
ALTER TABLE `shipping_company`
  ADD PRIMARY KEY (`code`);

--
-- Chỉ mục cho bảng `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_account` (`id_account`);

--
-- Chỉ mục cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique` (`id_user`,`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1194;

--
-- AUTO_INCREMENT cho bảng `manager_stock`
--
ALTER TABLE `manager_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `product_industry`
--
ALTER TABLE `product_industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `manager_stock`
--
ALTER TABLE `manager_stock`
  ADD CONSTRAINT `manager_stock_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_ship`) REFERENCES `shipping_company` (`code`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_ship`) REFERENCES `shipping_company` (`code`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_com`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`industry_id`) REFERENCES `product_industry` (`id`);

--
-- Các ràng buộc cho bảng `statistical`
--
ALTER TABLE `statistical`
  ADD CONSTRAINT `statistical_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
