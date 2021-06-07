-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2019 lúc 04:29 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `id_bill` int(255) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `price` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_order`
--

INSERT INTO `detail_order` (`id_bill`, `pro_id`, `qty`, `price`) VALUES
(1, 1, 1, '10000'),
(1, 2, 1, '29000'),
(2, 2, 1, '29000'),
(2, 3, 1, '29000'),
(2, 6, 1, '55000'),
(3, 19, 2, '59000'),
(3, 20, 2, '59000'),
(3, 21, 2, '59000'),
(4, 3, 1, '29000'),
(4, 11, 1, '45000'),
(4, 12, 1, '42000'),
(5, 11, 7, '45000'),
(5, 12, 7, '42000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_bill`,`pro_id`),
  ADD KEY `pro_id_fk` (`pro_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `id_bill_fk` FOREIGN KEY (`id_bill`) REFERENCES `order_bill` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_id_fk` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
