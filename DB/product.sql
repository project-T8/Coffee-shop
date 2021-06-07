-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2019 lúc 06:57 PM
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `product_ibfk_1` (`id_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
