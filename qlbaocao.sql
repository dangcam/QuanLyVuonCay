-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2023 lúc 11:17 AM
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
-- Cơ sở dữ liệu: `qlbaocao`
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
('report_group', 'report_group_manager', 1),
('user', 'user_manager', 1);

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
('vpddbd', 'Chi nhánh Bù Đăng', 'vpddt', 1),
('vpddbdp', 'Chi nhánh Bù Đốp', 'vpddt', 1),
('vpddbgm', 'Chi nhánh Bù Gia Mập', 'vpddt', 1),
('vpddbl', 'Chi nhán Bình Long', 'vpddt', 1),
('vpddct', 'Chi nhánh Chơn Thành', 'vpddt', 1),
('vpdddp', 'Chi nhánh Đồng Phú', 'vpddt', 1),
('vpdddx', 'Chi nhánh Đồng Xoài', 'vpddt', 1),
('vpddhq', 'Chi nhánh Hớn Quảng', 'vpddt', 1),
('vpddln', 'Chi nhánh Lộc Ninh', 'vpddt', 1),
('vpddpl', 'Chi nhánh Phước Long', 'vpddt', 1),
('vpddpr', 'Chi nhánh Phú Riềng', 'vpddt', 1),
('vpddt', 'Văn phòng ĐK ĐĐ Tỉnh', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report_group`
--

CREATE TABLE `report_group` (
  `report_month` int(11) NOT NULL,
  `report_year` int(11) NOT NULL,
  `group_id` varchar(20) NOT NULL,
  `row_id` varchar(50) NOT NULL,
  `value1_1` int(11) NOT NULL,
  `value1_2` int(11) NOT NULL,
  `value1_3` int(11) NOT NULL,
  `value1_total` int(11) NOT NULL,
  `value2_total` int(11) NOT NULL,
  `value2_1` int(11) NOT NULL,
  `value2_2` int(11) NOT NULL,
  `value2_per` float NOT NULL,
  `value3_total` int(11) NOT NULL,
  `value3_1` int(11) NOT NULL,
  `value3_2` int(11) NOT NULL,
  `value3_per` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `report_group`
--

INSERT INTO `report_group` (`report_month`, `report_year`, `group_id`, `row_id`, `value1_1`, `value1_2`, `value1_3`, `value1_total`, `value2_total`, `value2_1`, `value2_2`, `value2_per`, `value3_total`, `value3_1`, `value3_2`, `value3_per`) VALUES
(4, 2023, 'vpdddx', 'I', 0, 0, 15, 15, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.5', 0, 0, 15, 15, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'I.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II', 101, 16, 0, 117, 65, 65, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.23', 101, 0, 0, 101, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.25', 0, 16, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.7', 0, 0, 0, 0, 65, 65, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'II.9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III', 0, 0, 0, 0, 0, 0, 0, 0, 8, 8, 0, 0),
(4, 2023, 'vpdddx', 'III.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.28', 0, 0, 0, 0, 0, 0, 0, 0, 8, 8, 0, 0),
(4, 2023, 'vpdddx', 'III.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2023, 'vpdddx', 'III.9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'I', 0, 0, 0, 0, 102, 102, 0, 0, 15, 14, 1, 7.14),
(5, 2023, 'vpdddx', 'I.1', 0, 0, 0, 0, 0, 0, 0, 0, 12, 11, 1, 9.09),
(5, 2023, 'vpdddx', 'I.2', 0, 0, 0, 0, 102, 102, 0, 0, 3, 3, 0, 0),
(5, 2023, 'vpdddx', 'I.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'I.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'I.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'I.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'I.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'I.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II', 0, 0, 0, 0, 10, 0, 10, 0, 30, 27, 3, 11.11),
(5, 2023, 'vpdddx', 'II.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.14', 0, 0, 0, 0, 10, 0, 10, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.20', 0, 0, 0, 0, 0, 0, 0, 0, 16, 15, 1, 6.67),
(5, 2023, 'vpdddx', 'II.21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'II.8', 0, 0, 0, 0, 0, 0, 0, 0, 14, 12, 2, 16.67),
(5, 2023, 'vpdddx', 'II.9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III', 3, 4, 0, 7, 1, 1, 0, 0, 46, 43, 3, 6.98),
(5, 2023, 'vpdddx', 'III.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.14', 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 0, 0),
(5, 2023, 'vpdddx', 'III.15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.20', 0, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.21', 2, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.22', 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.27', 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.28', 0, 0, 0, 0, 0, 0, 0, 0, 26, 23, 3, 13.04),
(5, 2023, 'vpdddx', 'III.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpdddx', 'III.9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I', 11, 0, 0, 11, 22, 22, 0, 0, 9, 9, 0, 0),
(5, 2023, 'vpddpr', 'I.1', 11, 0, 0, 11, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I.2', 0, 0, 0, 0, 22, 22, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I.3', 0, 0, 0, 0, 0, 0, 0, 0, 9, 9, 0, 0),
(5, 2023, 'vpddpr', 'I.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'I.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II', 0, 10, 0, 10, 0, 0, 0, 0, 20, 20, 0, 0),
(5, 2023, 'vpddpr', 'II.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.25', 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 0, 0),
(5, 2023, 'vpddpr', 'II.26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.8', 0, 10, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'II.9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.15', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.18', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.21', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.28', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 2023, 'vpddpr', 'III.9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report_name`
--

CREATE TABLE `report_name` (
  `row_id` varchar(50) NOT NULL,
  `row_name` varchar(100) NOT NULL,
  `row_parent` varchar(50) NOT NULL,
  `row_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `report_name`
--

INSERT INTO `report_name` (`row_id`, `row_name`, `row_parent`, `row_number`) VALUES
('I', 'Thuộc thẩm quyền của UBND cấp huyện', '', 1),
('I.1', 'Giao đất', 'I', 2),
('I.2', 'Cho thuê đất ', 'I', 3),
('I.3', 'Bán tài sản gắn liền với QSDĐ', 'I', 4),
('I.4', 'Công nhận QSDĐ lần đầu', 'I', 5),
('I.5', 'Chuyển mục đích phải xin phép', 'I', 6),
('I.6', 'Đính chính GCN', 'I', 7),
('I.7', 'Thu hồi GCN', 'I', 8),
('I.8', 'Hồ sơ khác', 'I', 9),
('II', 'Thuộc thẩm quyền của Chi nhánh', '', 10),
('II.1', 'Cho thuê, cho thuê lại QSD đất', 'II', 11),
('II.10', 'Xóa đăng ký góp vốn bằng QSDĐ', 'II', 20),
('II.11', 'Chuyển QSD đất (theo kết quả giải quyết tranh chấp)', 'II', 21),
('II.12', 'Chuyển QSD đất (theo quyết định giải quyết khiếu nại, tố cáo về đất đai)', 'II', 22),
('II.13', 'Chuyển QSD đất (theo bản án, quyết định của tòa án, quyết định của cơ quan thi hành án)', 'II', 23),
('II.14', 'Chuyển QSD đất (theo kết quả đấu giá đất)', 'II', 24),
('II.15', 'Hợp nhất hoặc phân chia QSD đất', 'II', 25),
('II.16', 'Thay đổi thông tin người sử dụng đất, chủ sở hữu tài sản gắn liền với đất (tên, giấy tờ pháp nhân, n', 'II', 26),
('II.17', 'Xác lập hoặc thay đổi, chấm dứt quyền sử dụng hạn chế thửa đất liền kề', 'II', 27),
('II.18', 'Thay đổi diện tích do sạt lở tự nhiên một phần thửa đất', 'II', 28),
('II.19', 'Chuyển mục đích không', 'II', 29),
('II.2', 'Xóa đăng ký cho thuê, cho thuê lại', 'II', 12),
('II.20', 'Gia hạn sử dụng đất', 'II', 30),
('II.21', 'Chuyển hình thức giao đất, thuê đất', 'II', 31),
('II.22', 'Thay đổi thông tin về tài sản gắn liền với đất', 'II', 32),
('II.23', 'Có thay đổi đối với những hạn chế về QSD đất, tài sản gắn liền với đất', 'II', 33),
('II.24', 'Phát hiện sai sót, nhầm lẫn về nội dung thông tin trong hồ sơ địa chính và GCN QSD đất ', 'II', 34),
('II.25', 'Thay đổi, điều chỉnh tên đơn vị, địa giới hành chính theo QĐ của cơ quan có thẩm quyền', 'II', 35),
('II.26', 'Hồ sơ khác', 'II', 36),
('II.3', 'Thế chấp hoặc thay đổi nội dung thế chấp', 'II', 13),
('II.4', 'Xóa đăng ký thế chấp', 'II', 14),
('II.5', 'Chuyển đổi QSD đất', 'II', 15),
('II.6', 'Chuyển nhượng', 'II', 16),
('II.7', 'Thừa kế', 'II', 17),
('II.8', 'Tặng cho', 'II', 18),
('II.9', 'Góp vốn bằng QSDĐ', 'II', 19),
('III', 'Thuộc thẩm quyền của Sở Tài nguyên và Môi trường', '', 37),
('III.1', 'Cho thuê, cho thuê lại QSD đất', 'III', 38),
('III.10', 'Chuyển QSD đất (theo quyết định giải quyết khiếu nại, tố cáo về đất đai)', 'III', 47),
('III.11', 'Chuyển QSD đất (theo bản án, quyết định của tòa án, quyết định của cơ quan thi hành án)', 'III', 48),
('III.12', 'Chuyển QSD đất (theo kết quả đấu giá đất)', 'III', 49),
('III.13', 'Hợp nhất hoặc phân chia QSD đất', 'III', 50),
('III.14', 'Thay đổi thông tin người sử dụng đất, chủ sở hữu tài sản gắn liền với đất (tên, giấy tờ pháp nhân, n', 'III', 51),
('III.15', 'Xác lập hoặc thay đổi, chấm dứt quyền sử dụng hạn chế thửa đất liền kề', 'III', 52),
('III.16', 'Thay đổi diện tích do sạt lở tự nhiên một phần thửa đất', 'III', 53),
('III.17', 'Chuyển mục đích không phải xin phép', 'III', 54),
('III.18', 'Gia hạn sử dụng đất', 'III', 55),
('III.19', 'Chuyển hình thức giao đất, thuê đất', 'III', 56),
('III.2', 'Chuyển đổi QSD đất', 'III', 39),
('III.20', 'Thay đổi thông tin về tài sản gắn liền với đất', 'III', 57),
('III.21', 'Có thay đổi đối với những hạn chế về QSD đất, tài sản gắn liền với đất', 'III', 58),
('III.22', 'Phát hiện sai sót, nhầm lẫn về nội dung thông tin trong hồ sơ địa chính và GCN QSD đất ', 'III', 59),
('III.23', 'Tách thửa hoăc hợp thửa đất ', 'III', 60),
('III.24', 'Cấp đổi hoặc cấp lại GCN bị mất', 'III', 61),
('III.25', 'Đo đạc thay đổi diện tích, thửa đất, tờ bản đồ', 'III', 62),
('III.26', 'Thay đổi, điều chỉnh tên đơn vị, địa giới hành chính', 'III', 63),
('III.27', 'Đăng ký bổ sung tài sản gắn liền với đất', 'III', 64),
('III.28', 'Hồ sơ khác', 'III', 65),
('III.3', 'Chuyển nhượng', 'III', 40),
('III.4', 'Thừa kế', 'III', 41),
('III.5', 'Tặng cho', 'III', 42),
('III.6', 'Góp vốn bằng QSDĐ', 'III', 43),
('III.7', 'Xóa đăng ký góp vốn bằng QSDĐ', 'III', 44),
('III.8', 'Chuyển QSD đất (theo thỏa thuận xử lý nợ thế chấp)', 'III', 45),
('III.9', 'Chuyển quyền theo kết quả giải quyết tranh chấp', 'III', 46);

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
('admin', 'Nguyễn Đăng Cẩm', 'b16f278e79dade5ef8e2207cf852d2e653e6c084', 1, 'dangcam.pr@outlook.com', '0979371093', 'vpddt', 1),
('admin1', 'Admin 1', '8b2a31ad260da1ddd9e026d88d72dbfe42276f72', 1, 'admin1@gmail.com', '0979371093', 'vpddpr', 1),
('admin2', 'Admin 2', '2e7c8260125e7cdc02300c9ee56be000fad6ab52', 2, 'dangcam.pr@gmail.com', '0979371093', 'vpdddx', 1);

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
('admin', 'user', 1, 1, 1, 1),
('admin1', 'function', 0, 0, 0, 0),
('admin1', 'group', 0, 0, 0, 0),
('admin1', 'report_group', 1, 1, 1, 1),
('admin1', 'user', 0, 0, 0, 0),
('admin2', 'function', 0, 0, 0, 0),
('admin2', 'group', 0, 0, 0, 0),
('admin2', 'report_group', 1, 1, 1, 1),
('admin2', 'user', 0, 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`function_id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Chỉ mục cho bảng `report_group`
--
ALTER TABLE `report_group`
  ADD PRIMARY KEY (`report_month`,`report_year`,`group_id`,`row_id`);

--
-- Chỉ mục cho bảng `report_name`
--
ALTER TABLE `report_name`
  ADD PRIMARY KEY (`row_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Chỉ mục cho bảng `user_function`
--
ALTER TABLE `user_function`
  ADD PRIMARY KEY (`user_id`,`function_id`),
  ADD KEY `user_function_ibfk_2` (`function_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `functions`
--
ALTER TABLE `functions`
  ADD CONSTRAINT `function_user_function` FOREIGN KEY (`function_id`) REFERENCES `user_function` (`function_id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_user_function` FOREIGN KEY (`user_id`) REFERENCES `user_function` (`user_id`),
  ADD CONSTRAINT `users_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);

--
-- Các ràng buộc cho bảng `user_function`
--
ALTER TABLE `user_function`
  ADD CONSTRAINT `user_function_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_function_ibfk_2` FOREIGN KEY (`function_id`) REFERENCES `functions` (`function_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
