-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2022 lúc 10:33 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacs2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `admin_name`, `password`, `admin_status`) VALUES
(3, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangki` int(11) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangki`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(6, 'Nguyễn Thị Diệu Ly', 'dieuly17012005@gmail.com', '1/16 Trương Hán Siêu', '5b6ba13f79129a74a3e819b78e36b922', '0867946227'),
(30, 'Nguyễn Viết Huy', 'huynv.21it@vku.udn.vn', 'Quảng Nam', 'e10adc3949ba59abbe56e057f20f883e', '0935193055');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(34, 'Tai Nghe', 2),
(35, 'Loa', 3),
(36, 'Điện thoại', 4),
(37, 'Chuột', 5),
(38, 'Bàn Phím', 6),
(39, 'Laptop', 7),
(40, 'Máy Tính Bảng', 1),
(41, 'Màn Hình', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_marque`
--

CREATE TABLE `tbl_marque` (
  `id_hang` int(11) NOT NULL,
  `tenhang` varchar(50) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_marque`
--

INSERT INTO `tbl_marque` (`id_hang`, `tenhang`, `thutu`) VALUES
(1, 'MSI', 1),
(2, 'HP', 2),
(4, 'Gigabyte', 3),
(5, 'Asus', 5),
(6, 'Acer', 6),
(7, 'Apple', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` float NOT NULL,
  `soluongsp` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `chitiet` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluongsp`, `hinhanh`, `tomtat`, `chitiet`, `tinhtrang`, `id_danhmuc`) VALUES
(20, 'MSI', 'fass', 2500000, 1, '1669968522_theory.jpg', '12313', '123123123', 1, 39),
(21, 'HP', '1812', 19998000, 3, '1669580840_robot-hello.gif', '123123', 'gádaw', 1, 39),
(22, 'Lenovo', 'soss', 9999000, 1, '1669580866_robot dance.gif', '13123123', '123123123', 1, 39),
(26, 'Sony', '1755', 2000000, 3, '1669580926_favicon.png', '123123', '123123123', 1, 34),
(27, 'Samsung', 'fass', 8999000, 4, '1669580942_fiM1tc.jpg', '12312123', '123123123', 1, 36),
(28, 'Dell', '123132', 21000000, 1, '1669580959_robot dance.gif', '123123', '1123123', 1, 39),
(29, 'Lenovo', 'soss', 23000000, 3, '1669580991_owl-minimal-dark-4k-wd.jpg', '123123', '123123', 1, 39),
(30, 'Acer', '12312333', 25000000, 1, '1669581047_cute hello.gif', '123123', '123123', 1, 39),
(31, 'Asus', '2005', 19998000, 3, '1669581072_welcome.gif', '123123', '123123123', 1, 39),
(33, 'JBL', '1101', 2099000, 3, '1669736277_reindeer-justin-maller-4k-zu.jpg', '13123123', '123123123', 1, 35),
(34, 'Zadez', '2211', 450000, 2, '1669736328_xe k nguoi.jpg', '123123', '123123asdasd', 1, 37),
(35, 'Cosair KeyBoard', '1701', 500000, 6, '1669805484_830607.jpg', 'ádaf', 'Âs`231212', 1, 38),
(36, 'LG Screen', '2213', 1099000, 5, '1669860780_professor-money-heist-4kdxwld.jpg', '123123', '123123123', 1, 41);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangki`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_marque`
--
ALTER TABLE `tbl_marque`
  ADD PRIMARY KEY (`id_hang`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_marque`
--
ALTER TABLE `tbl_marque`
  MODIFY `id_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
