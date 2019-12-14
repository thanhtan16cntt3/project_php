-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 03, 2019 lúc 09:18 AM
-- Phiên bản máy phục vụ: 5.7.24-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_status`) VALUES
(45, 'Iphone', 1),
(46, 'Samsung', 1),
(47, 'Dell', 1),
(48, 'acer', 1),
(49, 'macbook', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_status`) VALUES
(38, 'cell phone', 1),
(39, 'Laptop', 1),
(40, 'PC', 1),
(41, 'Ipad', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `client_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `client_contact` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `images_product` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `quantity`, `total`, `status`, `product_id`, `brand_id`, `images_product`, `categories_id`) VALUES
(1, '2019-01-02 00:00:00', 'Khuong', 123456789, 2, 2888888, 1, 61, 48, 'custom/images/product/acer-gallery5.jpg', 39),
(2, '2019-01-11 00:00:00', 'Hoang', 234567891, 2, 50000000, 1, 71, 49, 'custom/images/product/mbp13rd-tb-2016-pf-open-spgry_1.jpg', 38),
(3, '2019-01-11 00:00:00', 'Hoang', 234567891, 3, 69000000, 1, 67, 47, 'custom/images/product/dell-inspiron-3576-p63f002n76f-450-600x600.png', 39),
(4, '2019-01-11 00:00:00', 'Tuan', 234567891, 2, 50000000, 1, 69, 46, 'custom/images/product/samsung-galaxy-a8-2018-purple-600x600.jpg', 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `status`) VALUES
(61, 'Acer lap', 'custom/images/product/acer-gallery5.jpg', 48, 39, '2', '1444444', 2),
(62, 'Acer Aspire ', 'custom/images/product/26240_laptop_acer_aspire_7_a715_72g_50na_nh_gxbsv_001_1.png', 48, 39, '2', '21000000', 2),
(63, 'Macbook PC', 'custom/images/product/surface-book-detached.jpg', 49, 40, '2', '45000000', 1),
(64, 'Macbook pro', 'custom/images/product/macbook-pro-2017-review-hero.jpg', 49, 39, '1', '30000000', 1),
(65, 'Iphone XS Max ', 'custom/images/product/iphone-xs-max-64gb-cu-didongviet_1.jpg', 45, 38, '2', '35000000', 1),
(66, 'Iphone8 Gold', 'custom/images/product/iphone8-gold-select-2018.jpeg', 45, 38, '2', '25000000', 1),
(67, 'Dell Inspiron', 'custom/images/product/dell-inspiron-3576-p63f002n76f-450-600x600.png', 47, 39, '2', '23000000', 1),
(68, 'Ipad Pro', 'custom/images/product/ipad-pro-12-11-select-201810_FMT_WHH.jpeg', 45, 41, '2', '35000000', 1),
(69, 'Samsung galaxy A8', 'custom/images/product/samsung-galaxy-a8-2018-purple-600x600.jpg', 46, 38, '12', '25000000', 1),
(70, 'Dell Vostro', 'custom/images/product/dell-vostro-5568-077m52-vangdong-450x300-450x300-600x600.png', 47, 39, '2', '20000000', 1),
(71, 'Macbook Pro 13.3 inch', 'custom/images/product/mbp13rd-tb-2016-pf-open-spgry_1.jpg', 49, 39, '2', '25000000', 1),
(72, 'Laptop', 'custom/images/product/26240_laptop_acer_aspire_7_a715_72g_50na_nh_gxbsv_001_1.png', 49, 39, '200000', '2100000', 1),
(73, 'Acer Predator', 'custom/images/product/413583-acer-predator-15.jpg', 48, 39, '5', '32000000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `images`, `fullname`) VALUES
(1, 'username', 'admin', 'admin@ued.udn.vn', 'custom/images/default.png', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
