-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2019 lúc 06:05 PM
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
  `id_cus` int(11) NOT NULL,
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
(1, 'Vũ Trường', 'Giang', 'abcdef', '123456', 'vua@grm.com', '0903774503', '172 Lê Thiết', 0),
(2, 'Đỗ Trung', 'Hiếu', 'hieu5', '123abc', 'abc@gmail.com', '0901312605', 'An Dương Vương', 0),
(3, 'Châu Quốc', 'Việt', '5anhem', '123456', 'chauviet@gmail.com', '0123456789', '123 An Dương Vương', 0),
(4, 'Le Vi', 'Hi', 'qwerty', '123456', 'fedhlfk@fgmi.com', '', '', 0),
(5, 'Võ Minh', 'Thuận', 'vothuan123', '123456', 'vothuan@gmail.com', '0905646784', '123 Đường Đề Thám', 0);

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
(3, 21, 2, '59000');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_bill`
--

CREATE TABLE `order_bill` (
  `id_bill` int(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
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
(1, 1, '2019-04-29 11:34:18', '39000', 1, 'Thanh toán khi giao hàng', '', 'Vũ', '0903774503', '172 Le Thiet'),
(2, 1, '2019-04-29 18:49:13', '113000', 1, 'Thanh toán khi giao hàng', '', 'Vũ Trường Giang', '0903774503', '172 Le Thiet'),
(3, 2, '2019-05-01 23:26:03', '354000', 1, 'Thanh toán khi giao hàng', 'Thêm 2 cái ông hút nha bồ', 'Đỗ Trung Hiếu', '0901312605', 'An Dương Vương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `info` text CHARACTER SET utf8,
  `price` decimal(6,0) NOT NULL,
  `image` text CHARACTER SET utf8,
  `id_status` int(4) NOT NULL,
  `id_type` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_pro`, `name`, `info`, `price`, `image`, `id_status`, `id_type`) VALUES
(1, 'AMERICANO', 'Americano được pha chế bằng cách thêm nước vào một hoặc hai shot Espresso để pha loãng độ đặc của cà phê, từ đó mang lại hương vị nhẹ nhàng, không gắt mạnh và vẫn thơm nồng nàn.\r\n\r\n', '10000', 'americano_large.jpg', 0, 'CF'),
(2, 'BẠC SỈU', 'Theo chân những người gốc Hoa đến định cư tại Sài Gòn, Bạc sỉu là cách gọi tắt của \"Bạc tẩy sỉu phé\" trong tiếng Quảng Đông, chính là: Ly sữa trắng kèm một chút cà phê.', '29000', 'white_vnese_coffee_large.jpg', 0, 'CF'),
(3, 'CÀ PHÊ ĐEN', 'Một tách cà phê đen thơm ngào ngạt, phảng phất mùi cacao là món quà tự thưởng tuyệt vời nhất cho những ai mê đắm tinh chất nguyên bản nhất của cà phê. Một tách cà phê trầm lắng, thi vị giữa dòng đời vồn vã.', '29000', 'vnese_coffee_large.jpg', 1, 'CF'),
(4, 'CÀ PHÊ SỮA', 'Cà phê phin kết hợp cũng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam', '29000', 'cfs_large.jpg', 0, 'CF'),
(5, 'CAPPUCINNO', 'Cappuccino được gọi vui là thức uống \"một-phần-ba\" - 1/3 Espresso, 1/3 Sữa nóng, 1/3 Foam.', '45000', 'cappuccino_large.jpg', 0, 'CF'),
(6, 'CARAMEL MACCHIATO', 'Vị thơm béo của bọt sữa và sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng, và vị ngọt đậm của sốt caramel.', '55000', 'caramel_macchiato_large.jpg', 2, 'CF'),
(7, 'ESPRESSO', 'Một cốc Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc. Để đạt được sự kết hợp này, chúng tôi xay tươi hạt cà phê cho mỗi lần pha.', '35000', 'espresso_large.jpg', 0, 'CF'),
(8, 'LATTE', 'Khi chuẩn bị Latte, cà phê Espresso và sữa nóng được trộn lẫn vào nhau, bên trên vẫn là lớp foam nhưng mỏng và nhẹ hơn Cappucinno.', '45000', 'latte_large.jpg', 0, 'CF'),
(9, 'MOCHA', 'Cà phê Mocha được ví von đơn giản là Sốt Sô cô la được pha cùng một tách Espresso.', '49000', 'mocha_large.jpg', 0, 'CF'),
(10, 'SÔ-CÔ-LA ĐÁ', 'Cacao nguyên chất hoà cùng sữa tươi béo ngậy. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.', '55000', 'iced_chocolate_large.jpg', 0, 'IC'),
(11, 'TRÀ ĐÀO CAM SẢ', 'Vị thanh ngọt của đào Hy Lạp, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này. Sản phẩm hiện có 2 phiên bản Nóng và Lạnh phù hợp cho mọi thời gian trong năm.', '45000', 'tra_dao_cam_sa_on_bg_large.jpg', 1, 'TM'),
(12, 'TRÀ ĐEN MACCHIATO', 'Trà đen được ủ mới mỗi ngày, giữ nguyên được vị chát mạnh mẽ đặc trưng của lá trà, phủ bên trên là lớp Macchiato \"homemade\" bồng bềnh quyến rũ vị phô mai mặn mặn mà béo béo.', '42000', 'blacktea_macchiat_large.jpg', 1, 'TM'),
(13, 'TRÀ GẠO RANG MACCHIATO', 'Trà gạo rang, hay còn gọi là Genmaicha, hay Trà xanh gạo lứt có nguồn gốc từ Nhật Bản. Tại The Coffee House, chúng tôi nhấn nhá cho Genmaicha thêm lớp Macchiato để tăng thêm mùi vị cũng như trải nghiệm của chính bạn.', '48000', 'genmaicha_macchiatov_large.jpg', 0, 'TM'),
(14, 'TRÀ MATCHA LATTE', 'Với màu xanh mát mắt của bột trà Matcha, vị ngọt nhẹ nhàng, pha trộn cùng sữa tươi và lớp foam mềm mịn, Matcha Latte là thức uống yêu thích của tất cả mọi người khi ghé The Coffee House.', '55000', 'matcha_latte_large.jpg', 0, 'TM'),
(15, 'TRÀ MATCHA MACCHIATO', 'Bột trà xanh Matcha thơm lừng hảo hạng cùng lớp Macchiato béo ngậy là một sự kết hợp tuyệt vời.', '45000', 'matcha_macchiato_large.jpg', 0, 'TM'),
(16, 'TRÀ ỔI THANH LONG MACCHIATO', 'Vị ổi thơm lừng kết hợp cùng thanh long ngọt dịu, quyện vào lớp kem beo béo nữa thì đây đích thị là món giải nhiệt thân thiện nhất trong dòng thức uống Macchiato tại The Coffee House rồi.', '48000', 'dragonfruit_macchiato_large.jpg', 0, 'TM'),
(17, 'TRÀ OOLONG SEN AN NHIÊN', 'Sự kết hợp của Trà Oolong hương thơm nhẹ, vị nồng hậu cùng Hạt sen tươi mềm có vị ngọt, sáp, vừa ngon miệng vừa có tác dụng an thần, tốt cho cơ thể.', '45000', 'trasen_large.jpg', 2, 'TM'),
(18, 'TRÀ OOLONG VẢI NHƯ Ý', 'Là thức uống \"bắt vị\" được lấy cảm hứng từ trái Vải - thức quả tròn đầy, quen thuộc trong cuộc sống người Việt - kết hợp cùng Trà Oolong làm từ những lá trà tươi hảo hạng.', '45000', 'travai_large.jpg', 2, 'TM'),
(19, 'CARAMEL ĐÁ XAY', 'Dư vị nồng nàn của cà phê sánh đôi hoàn hảo với caramel ngọt ngào như vòng tay âu yếm, đệm thêm một chút béo ngậy của sữa và kem tươi, tạo nên vi ngọt đậm mà hòa nhã.', '59000', 'caramel_ice_blended_large.jpg', 0, 'IC'),
(20, 'MOCHA ĐÁ XAY', 'Sự hoà quyện mịn màng giữa vị đắng thanh của cà phê và vị đắng ngọt của chocolate, cùng vị béo của kem tươi và sữa tươi hòa quyện.', '59000', 'mocha_ice_blended_large.jpg', 0, 'IC'),
(21, 'SÔ-CÔ-LA ĐÁ XAY', 'Vị đắng của cà phê kết hợp cùng vị cacao ngọt ngàocủa sô-cô-la, vị sữa tươi ngọt béo, đem đến trải nghiệm vị giác cực kỳ thú vị', '59000', 'chocolate_ice_blended_large.jpg', 0, 'IC'),
(22, 'SINH TỐ CAM XOÀI', 'Vị mứt cam xoài hòa trộn độc đáo với sữa chua, cho cảm giác chua ngọt rất sướng. Điểm nhấn là những mẩu bánh cookie giòn tan giúp sự thưởng thức thêm thú vị.', '59000', 'mango_smoothie_large.jpg', 0, 'FF'),
(23, 'SINH TỐ VIỆT QUẤT', 'Mứt Việt Quất chua thanh, ngòn ngọt, phối hợp nhịp nhàng với dòng sữa chua bổ dưỡng. Là món sinh tố thơm ngon mà cả đầu lưỡi và làn da đều thích.', '59000', 'blueberry_smoothie_large.jpg', 0, 'FF');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'quanly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id_status` int(4) NOT NULL,
  `name` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id_status`, `name`) VALUES
(0, 'Bình thường'),
(1, 'Bán chạy'),
(2, 'Mới');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id_type` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id_type`, `name`) VALUES
('CF', 'Cà phê'),
('FF', 'Trái cây'),
('IC', 'Đá xay'),
('TM', 'Trà vs macchiato');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_bill`,`pro_id`),
  ADD KEY `pro_id_fk` (`pro_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_em`),
  ADD KEY `id_role` (`id_role`);

--
-- Chỉ mục cho bảng `order_bill`
--
ALTER TABLE `order_bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `product_ibfk_1` (`id_type`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id_em` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_bill`
--
ALTER TABLE `order_bill`
  MODIFY `id_bill` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `id_bill_fk` FOREIGN KEY (`id_bill`) REFERENCES `order_bill` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_id_fk` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Các ràng buộc cho bảng `order_bill`
--
ALTER TABLE `order_bill`
  ADD CONSTRAINT `order_bill_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`id_cus`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
