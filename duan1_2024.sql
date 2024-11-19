-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 19, 2024 lúc 02:10 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_2024`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int NOT NULL,
  `ma_tk` int NOT NULL,
  `ma_sp` int NOT NULL,
  `noi_dung` varchar(200) NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_dm` int NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`ma_dm`, `ten_dm`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Bé Gái'),
(4, 'Bé Trai'),
(8, 'Áo Phông'),
(9, 'Áo Khoác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int NOT NULL,
  `ma_tk` int NOT NULL,
  `trang_thai` int NOT NULL,
  `dia_chi_khac` varchar(100) NOT NULL,
  `phuong_thuc_thanh_toan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `ma_dhct` int NOT NULL,
  `ma_dh` int NOT NULL,
  `ma_sp` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_tk` int NOT NULL,
  `ma_dh` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int NOT NULL,
  `ma_dm` int NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `gia` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia_giam` int NOT NULL,
  `anh` varchar(200) NOT NULL,
  `mo_ta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tk` int NOT NULL,
  `ten_tk` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `mat_khau` varchar(20) NOT NULL,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`);

--
-- Chỉ mục cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`ma_dhct`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ma_dm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  MODIFY `ma_dhct` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ma_tk` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
