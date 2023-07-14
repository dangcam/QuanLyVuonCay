-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2023 lúc 11:37 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyvuoncay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions`
--

CREATE TABLE `functions` (
  `function_id` varchar(20) NOT NULL,
  `function_name` varchar(100) NOT NULL,
  `function_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `functions`
--

INSERT INTO `functions` (`function_id`, `function_name`, `function_status`) VALUES
('function', 'function_manager', 1),
('group', 'group_manager', 1),
('type_tree', 'type_of_tree', 1),
('user', 'user_manager', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `garden`
--

CREATE TABLE `garden` (
  `garden_id` varchar(20) NOT NULL,
  `garden_year` int(4) NOT NULL,
  `garden_name` varchar(100) NOT NULL,
  `acreage` double NOT NULL,
  `year_planting` int(11) NOT NULL,
  `year_down` int(11) NOT NULL,
  `year_up` int(11) NOT NULL,
  `year_full` int(11) NOT NULL,
  `type_tree` varchar(20) NOT NULL,
  `type_garden` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `group_id` varchar(20) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_parent` varchar(20) NOT NULL,
  `group_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_parent`, `group_status`) VALUES
('csdh', 'CƠ SỞ CAI NGHIỆN MA TÚY ĐỨC HẠNH', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_tree`
--

CREATE TABLE `type_tree` (
  `tree_id` varchar(20) NOT NULL,
  `tree_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_tree`
--

INSERT INTO `type_tree` (`tree_id`, `tree_name`, `note`) VALUES
('RRIV103', 'RRIV 103', ''),
('RRIV104', 'RRIV 104', ''),
('RRIV105', 'RRIV 105', ''),
('RRIV106', 'RRIV 106', ''),
('RRIV2009', 'RRIV 2009', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `group_id` varchar(10) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `gender`, `email`, `phonenumber`, `group_id`, `user_status`) VALUES
('admin', 'Nguyễn Đăng Cẩm', 'b16f278e79dade5ef8e2207cf852d2e653e6c084', 1, 'dangcam.pr@outlook.com', '0979371093', 'csdh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_function`
--

CREATE TABLE `user_function` (
  `user_id` varchar(20) NOT NULL,
  `function_id` varchar(20) NOT NULL,
  `function_view` tinyint(4) NOT NULL,
  `function_add` tinyint(4) NOT NULL,
  `function_edit` tinyint(4) NOT NULL,
  `function_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_function`
--

INSERT INTO `user_function` (`user_id`, `function_id`, `function_view`, `function_add`, `function_edit`, `function_delete`) VALUES
('admin', 'function', 1, 1, 1, 1),
('admin', 'group', 1, 1, 1, 1),
('admin', 'report_group', 1, 1, 1, 1),
('admin', 'type_tree', 1, 1, 1, 1),
('admin', 'user', 1, 1, 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`function_id`);

--
-- Chỉ mục cho bảng `garden`
--
ALTER TABLE `garden`
  ADD PRIMARY KEY (`garden_id`,`garden_year`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Chỉ mục cho bảng `type_tree`
--
ALTER TABLE `type_tree`
  ADD PRIMARY KEY (`tree_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_function`
--
ALTER TABLE `user_function`
  ADD PRIMARY KEY (`user_id`,`function_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
