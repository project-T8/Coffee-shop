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
-- Cấu trúc bảng cho bảng `order_bill`
--

CREATE TABLE `order_bill` (
  `id_bill` int(255) NOT NULL,
  `cus_id` varchar(10) CHARACTER SET utf8 NOT NULL,
  `now` datetime NOT NULL DEFAULT '1970-01-02 00:00:00',
  `total_price` decimal(12,0) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `payment` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_bill`
--

INSERT INTO `order_bill` (`id_bill`, `cus_id`, `now`, `total_price`, `status`, `payment`, `note`, `user_name`, `user_phone`, `user_address`) VALUES
(1, 'KH0001', '2019-04-29 11:34:18', '39000', 1, 'Thanh toán khi giao hàng', '', 'Vũ', '0903774503', '172 Le Thiet'),
(2, 'KH0001', '2019-04-29 18:49:13', '113000', 1, 'Thanh toán khi giao hàng', '', 'Vũ Trường Giang', '0903774503', '172 Le Thiet'),
(3, 'KH0002', '2019-05-01 23:26:03', '354000', 1, 'Thanh toán khi giao hàng', 'Thêm 2 cái ông hút nha bồ', 'Đỗ Trung Hiếu', '0901312605', 'An Dương Vương'),
(4, 'KH0002', '2019-05-06 15:26:01', '116000', 1, 'Thanh toán khi giao hàng', '', 'Đỗ Trung Hiếu', '0901312605', 'An Dương Vương'),
(5, 'KH0002', '2019-05-06 16:18:29', '609000', 0, 'Thanh toán khi giao hàng', '', 'Đỗ Trung Hiếu', '0901312605', 'An Dương Vương');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `order_bill`
--
ALTER TABLE `order_bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `order_bill`
--
ALTER TABLE `order_bill`
  MODIFY `id_bill` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_bill`
--
ALTER TABLE `order_bill`
  ADD CONSTRAINT `order_bill_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`id_cus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
