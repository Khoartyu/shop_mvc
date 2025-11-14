-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2025 lúc 04:37 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) DEFAULT NULL COMMENT 'Tiêu đề banner (để Admin dễ nhớ)',
  `hinh_anh` varchar(255) NOT NULL COMMENT 'Đường dẫn ảnh (vd: images/banner/1.jpg)',
  `lien_ket` varchar(255) DEFAULT NULL COMMENT 'Link khi click vào banner',
  `vi_tri` enum('slider_chinh','banner_phu','quang_cao') DEFAULT 'slider_chinh' COMMENT 'Vị trí xuất hiện',
  `hien_thi` tinyint(1) DEFAULT 1 COMMENT '1: Hiện, 0: Ẩn',
  `thu_tu` int(11) DEFAULT 0 COMMENT 'Số thứ tự hiển thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `tieu_de`, `hinh_anh`, `lien_ket`, `vi_tri`, `hien_thi`, `thu_tu`) VALUES
(1, 'Banner Chào Hè', 'images/Assets/banner-carousel/thoi_trang_gia_that_tot.jpg', NULL, 'slider_chinh', 1, 1),
(2, 'Banner Khuyến Mãi VIP', 'images/Assets/banner-carousel/dac_quyen_vang_vip.jpg', NULL, 'slider_chinh', 1, 2),
(3, 'Banner Sale Sốc', 'images/Assets/banner-carousel/sale_dac_quyen.jpg', NULL, 'slider_chinh', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienthe_sanpham`
--

CREATE TABLE `bienthe_sanpham` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL COMMENT 'Liên kết với sản phẩm cha (bảng sanpham)',
  `mau_sac_id` int(11) DEFAULT NULL,
  `kich_thuoc_id` int(11) DEFAULT NULL,
  `gia` decimal(10,2) NOT NULL COMMENT 'Giá của riêng biến thể này',
  `so_luong_ton` int(11) NOT NULL DEFAULT 0 COMMENT 'Tồn kho của riêng biến thể này'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bienthe_sanpham`
--

INSERT INTO `bienthe_sanpham` (`id`, `sanpham_id`, `mau_sac_id`, `kich_thuoc_id`, `gia`, `so_luong_ton`) VALUES
(101, 1, 1, 1, 250000.00, 10),
(102, 1, 1, 2, 250000.00, 15),
(103, 1, 2, 2, 250000.00, 5),
(104, 2, 2, 1, 154200.00, 20),
(105, 2, 2, 2, 154200.00, 20),
(106, 2, 2, 3, 154200.00, 15),
(107, 2, 2, 4, 160000.00, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `bienthe_id` int(11) NOT NULL COMMENT 'Liên kết với biến thể sản phẩm (bảng bienthe_sanpham)',
  `so_luong` int(11) NOT NULL,
  `don_gia` decimal(10,2) NOT NULL COMMENT 'Giá tại thời điểm mua',
  `thanh_tien` decimal(10,2) GENERATED ALWAYS AS (`so_luong` * `don_gia`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `donhang_id`, `bienthe_id`, `so_luong`, `don_gia`) VALUES
(1, 1, 101, 1, 250000.00),
(2, 1, 105, 2, 154200.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL COMMENT 'Liên kết với sản phẩm cha (bảng sanpham)',
  `duong_dan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`id`, `sanpham_id`, `duong_dan`) VALUES
(1, 1, 'images/sanpham/ao_somi_trang.jpg'),
(2, 1, 'images/sanpham/ao_somi_trang_2.jpg'),
(3, 1, 'images/sanpham/ao_somi_den.jpg'),
(4, 2, 'images/chitietsp/16.jpg'),
(5, 2, 'images/chitietsp/2.jpg'),
(6, 2, 'images/chitietsp/1.jpg'),
(7, 2, 'images/chitietsp/18.jpg'),
(8, 2, 'images/chitietsp/3.jpg'),
(9, 2, 'images/chitietsp/4.jpg'),
(10, 2, 'images/chitietsp/5.jpg'),
(11, 2, 'images/chitietsp/6.jpg'),
(12, 2, 'images/chitietsp/7.jpg'),
(13, 2, 'images/chitietsp/9.jpg'),
(14, 2, 'images/chitietsp/10.jpg'),
(15, 2, 'images/chitietsp/11.jpg'),
(16, 2, 'images/chitietsp/12.jpg'),
(17, 2, 'images/chitietsp/13.jpg'),
(18, 2, 'images/chitietsp/8.jpg'),
(19, 2, 'images/chitietsp/14.jpg'),
(20, 2, 'images/chitietsp/15.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `ten_danhmuc` varchar(100) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL COMMENT 'Ảnh icon cho danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danhmuc`, `hinh_anh`) VALUES
(1, 'Áo Sơ Mi', 'images/Assets/danhmuc/danhmuc1.jpg'),
(2, 'Quần Short', 'images/Assets/danhmuc/danhmuc2.jpg'),
(3, 'Balo', 'images/Assets/danhmuc/danhmuc-3.jpg'),
(4, 'Túi Xách', 'images/Assets/danhmuc/dm4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_kichthuoc`
--

CREATE TABLE `danhmuc_kichthuoc` (
  `id` int(11) NOT NULL,
  `ten_kich_thuoc` varchar(50) NOT NULL COMMENT 'Ví dụ: S, M, L, XL, 39, 40'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_kichthuoc`
--

INSERT INTO `danhmuc_kichthuoc` (`id`, `ten_kich_thuoc`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_mausac`
--

CREATE TABLE `danhmuc_mausac` (
  `id` int(11) NOT NULL,
  `ten_mau` varchar(100) NOT NULL,
  `ma_hex` varchar(7) DEFAULT NULL COMMENT 'Mã màu (ví dụ: #FFFFFF)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_mausac`
--

INSERT INTO `danhmuc_mausac` (`id`, `ten_mau`, `ma_hex`) VALUES
(1, 'Trắng', '#FFFFFF'),
(2, 'Đen', '#000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngay_dat` datetime DEFAULT current_timestamp(),
  `tong_tien` decimal(10,2) DEFAULT 0.00,
  `trang_thai` enum('Chờ xử lý','Đang giao','Đã giao','Đã hủy') DEFAULT 'Chờ xử lý',
  `nhanvien_xuly_id` int(11) DEFAULT NULL COMMENT 'ID nhân viên (bảng users) xử lý đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `khachhang_id`, `ngay_dat`, `tong_tien`, `trang_thai`, `nhanvien_xuly_id`) VALUES
(1, 1, '2025-11-05 10:30:00', 558400.00, 'Đã giao', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `ngay_dang_ky` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ho_ten`, `email`, `mat_khau`, `dia_chi`, `so_dien_thoai`, `ngay_dang_ky`) VALUES
(1, 'Trần Thị A', 'khachhang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123 Đường ABC, Cần Thơ', '0909123456', '2025-11-06 17:05:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `danhmuc_id` int(11) DEFAULT NULL COMMENT 'Liên kết với bảng danhmuc',
  `ten_san_pham` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL COMMENT 'Ảnh đại diện hiển thị ở danh sách',
  `ngay_tao` datetime DEFAULT current_timestamp(),
  `ngay_cap_nhat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `danhmuc_id`, `ten_san_pham`, `mo_ta`, `anh_dai_dien`, `ngay_tao`, `ngay_cap_nhat`) VALUES
(1, 1, 'Áo Sơ Mi Trắng Form Rộng', 'Áo sơ mi vải lụa mát, form rộng unisex.\r\nThích hợp cho cả nam và nữ.\r\nChất liệu thoáng mát, không nhăn.', 'images/sanpham/ao_somi_trang.jpg', '2025-11-06 17:00:00', '2025-11-07 09:17:18'),
(2, 2, 'Quần Short No Style M158', '1. Kiểu sản phẩm: Quần short lưng thun dáng rộng.\r\n2. Ưu điểm:\r\n• Dáng rộng tạo cảm giác thoải mái, phóng khoáng.\r\n• Vải Mesh giúp thoát ẩm nhanh, mang lại cảm giác mát mẻ.\r\n3. Chất liệu: Mesh Fabric 100% Polyester.', 'images/chitietsp/16.jpg,images/chitietsp/18.jpg', '2025-11-06 17:01:00', '2025-11-07 09:17:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(100) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `quyen` enum('Quản trị viên','Nhân viên') DEFAULT 'Quản trị viên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `quyen`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Quản trị viên chính', 'Quản trị viên'),
(2, 'nhanvien', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn B (Nhân viên)', 'Nhân viên');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bienthe_sanpham`
--
ALTER TABLE `bienthe_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `mau_sac_id` (`mau_sac_id`),
  ADD KEY `kich_thuoc_id` (`kich_thuoc_id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `bienthe_id` (`bienthe_id`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc_kichthuoc`
--
ALTER TABLE `danhmuc_kichthuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc_mausac`
--
ALTER TABLE `danhmuc_mausac`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `nhanvien_xuly_id` (`nhanvien_xuly_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten_dang_nhap` (`ten_dang_nhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bienthe_sanpham`
--
ALTER TABLE `bienthe_sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuc_kichthuoc`
--
ALTER TABLE `danhmuc_kichthuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuc_mausac`
--
ALTER TABLE `danhmuc_mausac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienthe_sanpham`
--
ALTER TABLE `bienthe_sanpham`
  ADD CONSTRAINT `fk_bienthe_kichthuoc` FOREIGN KEY (`kich_thuoc_id`) REFERENCES `danhmuc_kichthuoc` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bienthe_mausac` FOREIGN KEY (`mau_sac_id`) REFERENCES `danhmuc_mausac` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bienthe_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiet_bienthe` FOREIGN KEY (`bienthe_id`) REFERENCES `bienthe_sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `fk_chitietsanpham_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_donhang_users` FOREIGN KEY (`nhanvien_xuly_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
