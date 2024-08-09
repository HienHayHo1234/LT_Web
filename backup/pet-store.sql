-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2024 lúc 09:13 AM
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
('endland-cat', 'Mèo ', 1000000.00, 900000.00, 10, '../asset/uploads/meo.jpg', 'cat'),
('green-parrot', 'Vẹt Xanh', 1000000.00, 900000.00, 10, '../asset/uploads/green-parrot.jpg', 'parrot');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucpets`
--
ALTER TABLE `danhmucpets`
  ADD PRIMARY KEY (`idLoai`);

--
-- Chỉ mục cho bảng `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoai` (`idLoai`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`idLoai`) REFERENCES `danhmucpets` (`idLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
