-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 03, 2023 lúc 03:45 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'lannguyen12@gmail.com', '12345', 'Nguyễn Thị Lan'),
(2, 'minhanhnguyen@gmail.com', '12345', 'Nguyễn Minh Anh'),
(3, 'tuyetnguyen030202@gmail.com', '12345', 'NTTuyet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Mũ'),
(2, 'Trang sức');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL,
  `huydon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`) VALUES
(5, 1, 2, '3268', 1005, '2023-01-02 03:30:52', 0, 0),
(6, 1, 1, '2', 1006, '2023-01-02 03:33:45', 0, 0),
(7, 1, 1, '2856', 1007, '2023-01-02 03:45:39', 0, 0),
(8, 1, 1, '3523', 1008, '2023-01-02 03:46:03', 0, 0),
(9, 1, 1, '1969', 1009, '2023-01-02 03:48:46', 0, 0),
(10, 1, 2, '9797', 1010, '2023-01-02 08:31:59', 0, 0),
(11, 1, 2, '3320', 1011, '2023-01-02 08:32:19', 0, 0),
(12, 1, 2, '3092', 1012, '2023-01-02 08:34:54', 0, 0),
(13, 1, 1, '9176', 1013, '2023-01-03 02:23:48', 0, 0),
(14, 1, 1, '5145', 1014, '2023-01-03 02:27:27', 0, 0),
(15, 1, 3, '9825', 1015, '2023-01-03 02:30:53', 0, 0),
(16, 1, 3, '3074', 1016, '2023-01-03 02:30:54', 0, 0),
(17, 1, 3, '7924', 1017, '2023-01-03 02:33:00', 0, 0),
(18, 1, 3, '563', 1018, '2023-01-03 02:35:26', 0, 0),
(19, 1, 3, '6763', 1019, '2023-01-03 02:40:20', 0, 0),
(20, 1, 3, '3832', 1020, '2023-01-03 02:42:57', 0, 0),
(21, 1, 3, '4557', 1021, '2023-01-03 02:44:09', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL,
  `huydon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`) VALUES
(1, 1, 1, '9978', '2023-01-01 17:43:25', 1001, 0, 0),
(2, 1, 1, '5691', '2023-01-01 17:51:34', 1002, 0, 0),
(3, 1, 1, '3447', '2023-01-01 17:51:51', 1003, 0, 0),
(4, 1, 1, '5552', '2023-01-01 17:54:21', 1004, 0, 0),
(5, 1, 2, '3268', '2023-01-02 03:30:52', 1005, 0, 0),
(6, 1, 1, '2', '2023-01-02 03:33:45', 1006, 0, 0),
(7, 1, 1, '2856', '2023-01-02 03:45:39', 1007, 0, 0),
(8, 1, 1, '3523', '2023-01-02 03:46:03', 1008, 0, 0),
(9, 1, 1, '1969', '2023-01-02 03:48:46', 1009, 0, 0),
(10, 1, 2, '9797', '2023-01-02 08:31:59', 1010, 0, 0),
(11, 1, 2, '3320', '2023-01-02 08:32:19', 1011, 0, 0),
(12, 1, 2, '3092', '2023-01-02 08:34:54', 1012, 0, 0),
(13, 1, 1, '9176', '2023-01-03 02:23:48', 1013, 0, 0),
(14, 1, 1, '5145', '2023-01-03 02:27:27', 1014, 0, 0),
(15, 1, 3, '9825', '2023-01-03 02:30:53', 1015, 0, 0),
(16, 1, 3, '3074', '2023-01-03 02:30:54', 1016, 0, 0),
(17, 1, 3, '7924', '2023-01-03 02:33:00', 1017, 0, 0),
(18, 1, 3, '563', '2023-01-03 02:35:26', 1018, 0, 0),
(19, 1, 3, '6763', '2023-01-03 02:40:20', 1019, 0, 0),
(20, 1, 3, '3832', '2023-01-03 02:42:57', 1020, 0, 0),
(21, 1, 3, '4557', '2023-01-03 02:44:09', 1021, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `note`, `email`, `password`, `giaohang`) VALUES
(1005, 'Nguyễn Văn An', '0919658520', 'Đống Đa, Hà Nội', 'Mua hang', '23A4040153@bav.edu.vn', '123456', 1),
(1006, 'Nguyễn Thị Tuyết', '0919658520', 'ha noi', 'sd', '23a4040153@bav.edu.vn', '12345', 0),
(1007, 'Nguyễn Thị Tuyết', '0919658520', 'ha noi', 'sd', '23a4040153@bav.edu.vn', '12345', 0),
(1008, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'xcvf', 'tuyetnguyen030202@gmail.com', '12345', 1),
(1009, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'xcvf', 'tuyetnguyen030202@gmail.com', '12345', 1),
(1010, 'Lan Nguyen', '0984969451', 'Hà Nội', 'mua hang', 'tuyetnguyen030202@gmail.com', '030202', 1),
(1011, 'Lan Nguyen', '0984969451', 'Hà Nội', 'mua hang', 'tuyetnguyen030202@gmail.com', '030202', 1),
(1012, 'Lan Nguyen', '0984969451', 'Hà Nội', 'mua hang', 'tuyetnguyen030202@gmail.com', '030202', 1),
(1013, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'sà', '23a4040153@bav.edu.vn', '123456', 1),
(1014, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'h', '23A4040153@bav.edu.vn', '12345', 1),
(1015, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'aa', '23a4040153@bav.edu.vn', '123456', 1),
(1016, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'aa', '23a4040153@bav.edu.vn', '123456', 1),
(1017, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'aa', '23a4040153@bav.edu.vn', '123456', 1),
(1018, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'aa', '23a4040153@bav.edu.vn', '123456', 1),
(1019, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'aa', '23a4040153@bav.edu.vn', '123456', 1),
(1020, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', 'aa', '23a4040153@bav.edu.vn', '123456', 1),
(1021, 'Nguyễn Thị Tuyết', '0919658520', 'Đống Đa, Hà Nội', '11111', '23a4040153@bav.edu.vn', '123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `malienhe` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giakhuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_hot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(1, 1, 'Mũ', 'Mũ len', 'Mũ len màu đỏ', '120000', '100000', 3, 3, 5, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`malienhe`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `malienhe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
