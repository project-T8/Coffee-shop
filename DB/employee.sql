-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2019 lúc 06:22 AM
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
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id_em` int(11) NOT NULL,
  `lastname` varchar(25) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id_em`, `lastname`, `firstname`, `username`, `password`, `email`, `phone`, `id_role`, `img`) VALUES
(1, 'Đỗ Trung', 'Hiếu', 'admin1', '123456', 'abcdeg@gmail.com', '0123456789', 1, 'hieu.jpg'),
(2, 'Vũ Trường ', 'Giang', 'admin2', '123456', 'vuapha008@gmail.com', '0903774503', 1, 'giang.jpg'),
(3, 'Triệu Nguyễn Quốc', 'Việt', 'manager1', '123456', 'defghi@gmail.com', '0987654321', 2, 'tviet.jpg'),
(4, 'Châu Quốc', 'Việt', 'manager2', '123456', 'zxcv@gmail.com', '011111111', 2, 'cviet.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_em`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id_em` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
