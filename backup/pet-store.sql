-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2024 lúc 10:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pet-store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pet_id` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucpets`
--

CREATE TABLE `danhmucpets` (
  `idLoai` varchar(30) NOT NULL,
  `tenLoai` varchar(30) NOT NULL,
  `soTT` int(11) NOT NULL,
  `anHien` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucpets`
--

INSERT INTO `danhmucpets` (`idLoai`, `tenLoai`, `soTT`, `anHien`) VALUES
('cat', 'Mèo', 1, 1),
('dog', 'Chó', 2, 1),
('parrot', 'Vẹt', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pets`
--

CREATE TABLE `pets` (
  `id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `priceSale` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `urlImg` varchar(255) NOT NULL,
  `idLoai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pets`
--

INSERT INTO `pets` (`id`, `name`, `price`, `priceSale`, `quantity`, `urlImg`, `idLoai`) VALUES
('2-cat', 'Mèo Anh lông ngắn', 3300000.00, 2800000.00, 4, '../asset/uploads/1.jpg', 'cat'),
('3-cat', 'Mèo Maine Coon', 3300000.00, 2800000.00, 4, '../asset/uploads/3.jpg', 'cat'),
('4-cat', 'Mèo Tuxedo', 3300000.00, 2800000.00, 4, '../asset/uploads/4.jpg', 'cat'),
('5-cat', 'Mèo Munchkin', 3300000.00, 3000000.00, 4, '../asset/uploads/5.jpg', 'cat'),
('6-cat', 'Mèo Mướp', 2000000.00, 1800000.00, 6, '../asset/uploads/6.jpg', 'cat'),
('7-cat', 'Mèo Mỹ Lông Ngắn', 2000000.00, 1800000.00, 6, '../asset/uploads/7.jpg', 'cat'),
('8-cat', 'Mèo Mỹ Tai Xoắn', 2000000.00, 1800000.00, 5, '../asset/uploads/8.jpg', 'cat'),
('9-cat', 'Mèo Không Lông', 2000000.00, 1800000.00, 4, '../asset/uploads/9.jpg', 'cat'),
('blue-parrot', 'Vẹt Nước Ngoài', 220000.00, 200000.00, 2, '../asset/uploads/blue-parrot.jpg', 'parrot'),
('cockatoo-parrot', 'Vẹt Nước Ngoài', 220000.00, 200000.00, 2, '../asset/uploads/cockatoo-parrot.jpg', 'parrot'),
('endland-cat', 'Mèo Anh lông dài', 1000000.00, 900000.00, 10, '../asset/uploads/meo.jpg', 'cat'),
('golden-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Golden.jpg', 'dog'),
('green-parrot', 'Vẹt Xanh', 1000000.00, 900000.00, 10, '../asset/uploads/green-parrot.jpg', 'parrot'),
('macaw-parrot', 'Vẹt Nước Ngoài', 220000.00, 200000.00, 2, '../asset/uploads/macaw-parrot.jpg', 'parrot'),
('malta-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Malta.jpg', 'dog'),
('phoc-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Phoc.jpg', 'dog'),
('pitbull-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Pitbull.jpg', 'dog'),
('poodle-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Poodle.jpg', 'dog'),
('pug-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Pug.jpg', 'dog'),
('retr-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Retriever.jpg', 'dog'),
('rott-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Rottweiler.jpg', 'dog'),
('schnauzer-dog', 'Chó Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/Schnauzer.jpg', 'dog'),
('yellow-parrot', 'Vẹt Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/yellow-parrot.jpg', 'parrot'),
('yellow2-parrot', 'Vẹt Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/yellow-parrot.jpg', 'parrot'),
('yellow3-parrot', 'Vẹt Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/yellow-parrot.jpg', 'parrot'),
('yellow4-parrot', 'Vẹt Cực đẹp', 220000.00, 200000.00, 2, '../asset/uploads/yellow-parrot.jpg', 'parrot');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Chỉ mục cho bảng `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoai` (`idLoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
