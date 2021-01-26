-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2020 lúc 01:53 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lacviet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matl` varchar(20) NOT NULL,
  `tentl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matl`, `tentl`) VALUES
('thanthoai', 'Thần thoại'),
('tieuthuyet', 'Tiểu thuyết'),
('truyentranh', 'Truyện tranh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieudai`
--

CREATE TABLE `trieudai` (
  `matd` varchar(10) NOT NULL,
  `tentd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trieudai`
--

INSERT INTO `trieudai` (`matd`, `tentd`) VALUES
('dinh', 'Đinh'),
('doho', 'Đô hộ phương bắc'),
('haule', 'Hậu Lê'),
('ho', 'Hồ'),
('hungvuong', 'Hùng Vương'),
('ly', 'Lý'),
('nguyen', 'Nguyễn'),
('nhiutd', 'Nhiều triều đại'),
('tran', 'Trần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `matruyen` varchar(50) NOT NULL,
  `tentruyen` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `matl` varchar(20) NOT NULL,
  `matd` varchar(10) NOT NULL,
  `hinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`matruyen`, `tentruyen`, `noidung`, `matl`, `matd`, `hinh`) VALUES
('cqxlpb_tbd', 'Chống xâm lươc phương bắc - Trần Bạch Đằng', 'chuong_quan_xam_luoc_phuong_bac_tran_bach_dang.pdf', 'truyentranh', 'doho', 'chong_quan_xam_luoc_phuong_bac_tran_bach_dang.jpg'),
('knls_tbd', 'Khởi nghĩa Lam Sơn - Trần Bạch Đằng', 'khoi_nghia_lam_son_tran_bach_dang.pdf', 'truyentranh', 'haule', 'khoi_nghia_lam_son_tran_bach_dang.jpg'),
('nndtl_tbd', 'Thời nhà Ngô | Đinh | Tiền Lê - Trần Bạch Đằng', 'thoi_ngon_dinh_tienle_tran_bach_dang.pdf', 'truyentranh', 'nhiutd', 'thoi_ngo_dinh_tienle_tran_bach_dang.jpg'),
('thv_tbd', 'Thời Hùng Vương - Trần Bạch Đằng', 'thoi_hung_vuong_trang_bach_dang.pdf', 'truyentranh', 'hungvuong', 'thoi_hung_vuong_tran_bach_dang.jpg'),
('tnh_tbd', 'Thời nhà Hồ - Trần Bạch Đằng', 'thoi_nha_ho_tran_bach_dang.pdf', 'truyentranh', 'ho', 'thoi_nha_ho_tran_bach_dang.jpg'),
('tnl_tbd', 'Thời nhà Lý - Trần Bạch Đằng', 'thoi_nha_ly_tran_bach_dang.pdf', 'truyentranh', 'ly', 'thoi_nha_ly_tran_bach_dang.jpg'),
('tnt_tbd', 'Nhà trần đánh Nguyên Mông - Trần Bạch Đằng', 'nha_tran_tran_bach_dang.pdf', 'truyentranh', 'tran', 'nha_tran_tran_bach_dang.jpg'),
('vnsl_ttk', 'Việt Nam sử lược - Trần Trọng Kim', 'viet_nam_su_luoc_tran_trong_kim.pdf', 'tieuthuyet', 'nhiutd', 'viet_nam_su_luoc_tran_trong_kim.jpg'),
('vstt_pvs', 'Việt sử toàn thư - Phạm Văn Sơn', 'viet_su_toan_thu_pham_van_son.pdf', 'tieuthuyet', 'nhiutd', 'viet_su_toan_thu_pham_van_son.jpg'),
('vt_vnk', 'Vua Trẻ - Vũ Ngọc Khánh', 'vua_tre_vu_ngoc_khanh.pdf', 'tieuthuyet', 'nhiutd', 'vua_tre_vu_ngoc_khanh.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` varchar(255) NOT NULL,
  `ngaySinh` date NOT NULL,
  `anh` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `ho_ten`, `gioi_tinh`, `ngaySinh`, `anh`, `level`) VALUES
('admin@gmail.com', '12345678', 'Nguyễn Văn Tiến', 'Nam', '1999-08-22', 'nvt.jpg', 1),
('tien2@gmail.com', '123', 'test', 'Nam', '0000-00-00', 's_abbott_ganiq.jpg', 3),
('tot@gmail.com', '123', 'Mai Thị Tốt', 'Nữ', '0000-00-00', 'nu.PNG', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `mavd` varchar(50) NOT NULL,
  `tenvd` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `matd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`mavd`, `tenvd`, `link`, `matd`) VALUES
('dabang1', 'Tử chiến thành Đa Bang - Hồi 1: Giấy', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_8IJ9bvnitY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ho'),
('dabang2', 'Tử chiến thành Đa Bang – Hồi 2: SẮT ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JVYFlYU2RIQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ho'),
('ltknhunguyet3', 'Lý Thường Kiệt đại chiến Như Nguyệt giang - phần 3 ', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/c1aKcDx2FI4\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ly'),
('ltkungchau1', 'Lý Thường Kiệt đại chiến Ung Châu Thành - Phần 1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AbRg5rH6fxo\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ly'),
('ltkungchau2', 'Lý Thường Kiệt đại chiến Ung Châu Thành – Phần 2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TQehUlbyp3o\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ly'),
('votanh', 'Võ Tánh', '<iframe  width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ne-pwS4MvXU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'nguyen');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matl`);

--
-- Chỉ mục cho bảng `trieudai`
--
ALTER TABLE `trieudai`
  ADD PRIMARY KEY (`matd`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`matruyen`),
  ADD KEY `matl` (`matl`),
  ADD KEY `matd` (`matd`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`mavd`),
  ADD KEY `matd` (`matd`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD CONSTRAINT `truyen_ibfk_1` FOREIGN KEY (`matd`) REFERENCES `trieudai` (`matd`),
  ADD CONSTRAINT `truyen_ibfk_2` FOREIGN KEY (`matl`) REFERENCES `theloai` (`matl`);

--
-- Các ràng buộc cho bảng `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`matd`) REFERENCES `trieudai` (`matd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
