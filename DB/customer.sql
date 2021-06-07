-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2019 lúc 07:19 PM
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
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_cus` varchar(10) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `clocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id_cus`, `lastname`, `firstname`, `username`, `password`, `email`, `phone`, `address`, `clocked`) VALUES
('KH0001', 'Vũ Trường', 'Giang', 'abcdef', '123456', 'vua@grm.com', '0903774503', '172 Lê Thiết', 0),
('KH0002', 'Đỗ Trung', 'Hiếu', 'hieu5', '123abc', 'abc@gmail.com', '0901312605', 'An Dương Vương', 0),
('KH0003', 'Châu Quốc', 'Việt', '5anhem', '123456', 'chauviet@gmail.com', '0123456789', '123 An Dương Vương', 0),
('KH0004', 'Le Vi', 'Hi', 'qwerty', '123456', 'fedhlfk@fgmi.com', '', '', 0),
('KH0005', 'Võ Minh', 'Thuận', 'vothuan123', '123456', 'vothuan@gmail.com', '0905646784', '123 Đường Đề Thám', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
