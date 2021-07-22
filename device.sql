-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 22, 2021 lúc 08:58 PM
-- Phiên bản máy phục vụ: 10.3.29-MariaDB-0+deb10u1
-- Phiên bản PHP: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `home`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device`
--

CREATE TABLE `device` (
  `id` int(32) UNSIGNED NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'obj-slider',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `flavor` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amplitude` int(6) DEFAULT 0,
  `icon` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'fa-wrench'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `device`
--

INSERT INTO `device` (`id`, `type`, `name`, `state`, `flavor`, `amplitude`, `icon`) VALUES
(74, 'obj-button', ' Phong Ngu', 0, 'flavor-violet', 10, ' fa-lightbulb-o'),
(2, 'obj-button', 'Phong Khach', 0, 'flavor-green', 10, ' fa-lightbulb-o'),
(3, 'obj-button', 'Font Door', 0, 'flavor-violet', 34, ' fa-lightbulb-o');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `device`
--
ALTER TABLE `device`
  MODIFY `id` int(32) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
