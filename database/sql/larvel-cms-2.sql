DROP TABLE IF EXISTS `banners`;
DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `category_relation`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `order_detail`;
DROP TABLE IF EXISTS `product`;
DROP TABLE IF EXISTS `product_image`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `role_user`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `alt`, `link`, `descriptions`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banner 1', 'anh 1', 'images/banner/slider_1.jpg', NULL, 0, 1, '2019-03-05 03:02:23', '2019-03-05 03:02:23'),
(2, 'banner2', 'anh2', 'images/banner/slider_2.jpg', NULL, 0, 1, '2019-03-05 03:02:36', '2019-03-05 03:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(189) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(189) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8_unicode_ci,
  `parent` int(9) DEFAULT '0',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'product',
  `ordering` smallint(6) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `user_id`, `name`, `slug`, `image`, `descriptions`, `parent`, `type`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Bàn ghế phòng khách', 'ban-ghe-phong-khach', NULL, NULL, 0, 'product', 0, 1, NULL, NULL),
(2, NULL, 'Tủ quần áo', 'tu-quan-ao', NULL, NULL, 0, 'product', 0, 1, NULL, NULL),
(3, NULL, 'Giá tủ giày', 'gia-tu-giay', NULL, NULL, 0, 'product', 0, 1, NULL, NULL),
(4, NULL, 'Giường ngủ', 'giuong-ngu', NULL, NULL, 0, 'product', 0, 1, NULL, NULL),
(5, NULL, 'Bàn trang điểm', 'ban-trang-diem', NULL, NULL, 0, 'product', 0, 1, NULL, NULL),
(6, NULL, 'Bàn ăn', 'ban-an', NULL, NULL, 0, 'product', 0, 1, NULL, NULL),
(7, NULL, 'Bàn ghế phòng khách gỗ hương', 'ban-ghe-phong-khach-go-huong', NULL, NULL, 1, 'product', 0, 1, NULL, NULL),
(8, NULL, 'tủ quần áo gỗ xồi', 'tu-quan-ao-go-xoi', NULL, NULL, 2, 'product', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_relation`
--

CREATE TABLE `category_relation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'product',
  `object_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_relation`
--

INSERT INTO `category_relation` (`id`, `cat_id`, `name`, `slug`, `type`, `object_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'ban ghế phòng khách gỗ tự nhiên', 'ban-ghe-phong-khach-go-tu-nhien', 'product', NULL, NULL, NULL),
(3, 1, 'Bàn ghế phòng khách gỗ hương', 'ban-ghe-phong-khach-go-huong', 'product', NULL, NULL, NULL),
(4, 1, 'Bàn ghế phòng khách gỗ gụ', 'ban-ghe-phong-khach-go-gu', 'product', NULL, NULL, NULL),
(5, 1, 'Bàn ghế phòng khách gỗ xồi', 'ban-ghe-phong-khach-go-xoi', 'product', NULL, NULL, NULL),
(6, 2, 'Tủ quần áo gỗ xoan', 'tu-quan-ao-go-xoan', 'product', NULL, NULL, NULL),
(7, 2, 'Tủ quần áo gỗ xồi', 'tu-quan-ao-go-xoi', 'product', NULL, NULL, NULL),
(8, 3, 'Giá tủ giày gỗ xồi', 'gia-tu-giay-go-xoi', 'product', NULL, NULL, NULL),
(9, 3, 'Giá tủ giày gỗ xoan', 'gia-tu-giay-go-xoan', 'product', NULL, NULL, NULL),
(10, 4, 'giường ngủ gỗ xoan', 'giuong-ngu-go-xoan', 'product', NULL, NULL, NULL),
(11, 4, 'giường ngủ gỗ xồi', 'giuong-ngu-go-xoi', 'product', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(8, 13, 'nguyễn thị phương thúy', 'phuongthuy101@gmail.com', '0987654326', 'Hà nội', 1, '2019-03-08 06:06:48', '2019-03-08 06:06:48'),
(9, 13, 'nguyễn thị phương thúy', 'phuongthuy101@gmail.com', '0987654326', 'Hà nội', 1, '2019-03-08 19:22:02', '2019-03-08 19:22:02'),
(10, 1, 'lê vĩnh trường', 'vinhtruong@example.com', '0165998400', 'ha noi', 1, '2019-03-08 19:22:41', '2019-03-08 19:22:41'),
(11, 6, 'iuytre ytre ýtrrhyhr', 'phuongthuy5@gmail.com', '0987654321', 'Ha noi', 1, '2019-03-08 19:24:37', '2019-03-08 19:24:37'),
(12, 6, 'iuytre ytre ýtrrhyhr', 'phuongthuy5@gmail.com', '0987654321', 'Ha noi', 1, '2019-03-08 19:25:02', '2019-03-08 19:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(8, 2, 1, 8000000),
(8, 7, 2, 10000000),
(9, 1, 1, 9000000),
(10, 6, 1, 7000000),
(11, 1, 1, 9000000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_input` float NOT NULL,
  `price_ouput` float NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `cat_id`, `name`, `slug`, `desc`, `content`, `image`, `price_input`, `price_ouput`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'bàn ghế phòng khách gỗ xoan đào', 'ban-ghe-phong-khach-go-xoan-dao', 'Bàn trang điểm  gỗ sồi  tại nội thất Quang Hà với kiểu dáng thiết kế hiện đại, cổ điển và bán cổ điển mang lại sự ấm áp cho không gian nhà bạn', 'Bàn trang điểm gỗ sồi tại nội thất quang hà đã được xử lý qua công nghệ tẩm sấy hiện đại nên tuổi thọ của bàn trang điểm đóng bằng gỗ sồi tại nội thất quang hà lên đến 20 năm, có thể khắc phục được tình trạng cong vênh,co ngót và tình trạng mối mọt', 'images/product/sanpham_1.jpg', 9000000, 10000000, 0, '2019-03-04 13:37:38', '2019-03-04 13:37:38'),
(2, NULL, 1, 'bàn ghế phòng khách gỗ xồi', 'ban-ghe-phong-khach-go-xoi', 'Bàn trang điểm  gỗ sồi  tại nội thất Quang Hà với kiểu dáng thiết kế hiện đại, cổ điển và bán cổ điển mang lại sự ấm áp cho không gian nhà bạn', 'Bàn trang điểm gỗ sồi tại nội thất quang hà đã được xử lý qua công nghệ tẩm sấy hiện đại nên tuổi thọ của bàn trang điểm đóng bằng gỗ sồi tại nội thất quang hà lên đến 20 năm, có thể khắc phục được tình trạng cong vênh,co ngót và tình trạng mối mọt', 'images/product/sanpham_1.jpg', 8000000, 9000000, 0, '2019-03-04 13:38:43', '2019-03-04 13:38:43'),
(6, NULL, 1, 'Tủ quần áo gỗ xoan', 'tu-quan-ao-go-xoan', 'Bàn trang điểm  gỗ sồi  tại nội thất Quang Hà với kiểu dáng thiết kế hiện đại, cổ điển và bán cổ điển mang lại sự ấm áp cho không gian nhà bạn', 'Bàn trang điểm gỗ sồi tại nội thất quang hà đã được xử lý qua công nghệ tẩm sấy hiện đại nên tuổi thọ của bàn trang điểm đóng bằng gỗ sồi tại nội thất quang hà lên đến 20 năm, có thể khắc phục được tình trạng cong vênh,co ngót và tình trạng mối mọt', 'images/product/sanpham_1.jpg', 7000000, 90000000, 0, '2019-03-05 03:45:11', '2019-03-05 03:45:11'),
(7, NULL, 1, 'Bàn ăn gỗ xồi', 'ban-an-go-xoi', 'Bàn trang điểm  gỗ sồi  tại nội thất Quang Hà với kiểu dáng thiết kế hiện đại, cổ điển và bán cổ điển mang lại sự ấm áp cho không gian nhà bạn', 'Bàn trang điểm gỗ sồi tại nội thất quang hà đã được xử lý qua công nghệ tẩm sấy hiện đại nên tuổi thọ của bàn trang điểm đóng bằng gỗ sồi tại nội thất quang hà lên đến 20 năm, có thể khắc phục được tình trạng cong vênh,co ngót và tình trạng mối mọt', 'images/product/sanpham_1.jpg', 5000000, 6000000, 0, '2019-03-05 03:45:51', '2019-03-05 03:45:51'),
(8, NULL, 1, 'Bàn ghế phòng khách gỗ lim', 'ban-ghe-phong-khach-go-xoan', 'Bàn trang điểm  gỗ sồi  tại nội thất Quang Hà với kiểu dáng thiết kế hiện đại, cổ điển và bán cổ điển mang lại sự ấm áp cho không gian nhà bạn', 'Bàn trang điểm gỗ sồi tại nội thất quang hà đã được xử lý qua công nghệ tẩm sấy hiện đại nên tuổi thọ của bàn trang điểm đóng bằng gỗ sồi tại nội thất quang hà lên đến 20 năm, có thể khắc phục được tình trạng cong vênh,co ngót và tình trạng mối mọt', 'images/product/sanpham_1.jpg', 2000000, 4000000, 1, '2019-03-05 06:17:51', '2019-03-05 06:17:51'),
(9, NULL, 7, 'Bàn ăn phòng bếp đẹp', 'ban-an-phong-bep-dep', 'Bàn trang điểm  gỗ sồi  tại nội thất Quang Hà với kiểu dáng thiết kế hiện đại, cổ điển và bán cổ điển mang lại sự ấm áp cho không gian nhà bạn', 'Bàn trang điểm gỗ sồi tại nội thất quang hà đã được xử lý qua công nghệ tẩm sấy hiện đại nên tuổi thọ của bàn trang điểm đóng bằng gỗ sồi tại nội thất quang hà lên đến 20 năm, có thể khắc phục được tình trạng cong vênh,co ngót và tình trạng mối mọt', 'images/product/sanpham_1.jpg', 5000000, 6000000, 1, '2019-03-05 06:19:13', '2019-03-05 06:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `img_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'A User', '2019-03-06 02:22:25', '2019-03-06 02:22:25'),
(2, 'admin', 'A Admin', '2019-03-06 02:22:25', '2019-03-06 02:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, NULL, NULL),
(2, 2, 8, NULL, NULL),
(3, 1, 10, NULL, NULL),
(4, 1, 11, NULL, NULL),
(5, 1, 12, NULL, NULL),
(6, 1, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `images`, `phone`, `adress`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lê vĩnh trường', 'vinhtruong@example.com', '$2y$10$K680pDR5hjDsyTwcmgkOfejqQGRXRd9Cn49ogLPAm1YN4XbtKYZOK', NULL, '0165998400', 'ha noi', 'user', 'mbzgD7iEtpNX3esjezwVqljEMhVH2syTapxsWGgO41L8KE7ozEHaPwdahwrR', '2019-03-06 02:22:05', '2019-03-06 02:22:05'),
(2, 'Admin Name', 'admin@gmail.com', '$2y$10$aNud6C1VsLlM4dHzvkSNHeYXaMUYGJvrepQ3.bE0Vy4AXi2.xP9Wi', NULL, NULL, NULL, 'user', NULL, '2019-03-06 02:22:05', '2019-03-06 02:22:05'),
(3, 'Lê vĩnh Bảo', 'vinhbao@gmail.com', '$2y$10$DrSvJtIuv65nGWNIL7owP.KPcGrUH8BiMKAqhmxXg5mTSS7htIqOa', NULL, NULL, NULL, 'user', NULL, '2019-03-06 21:01:07', '2019-03-06 21:01:07'),
(4, 'nguyễn thị phương thúy', 'phuongthuy@gmail.com', '$2y$10$EISPbOX7IaaDaxRfHySrqOJx4E.iZRhyUyIeEpc1AITcszmM9CYvC', NULL, '0987654321', 'Ha noi', 'user', 'He2OvTM2E2eDcYAbseOtC5T2yZThDXogMwz08KpJP4MVyTA96GNKHmhj3jit', '2019-03-06 21:07:01', '2019-03-06 21:07:01'),
(5, 'Lê vĩnh Bảo', 'phuongthuy2@gmail.com', '$2y$10$mKS0KKBLFucmkh2sol9h3Ojoowt/QMSAQLlgDcZXmikeD8JntGy2q', NULL, NULL, NULL, 'user', 'Zb74ggIm93QtMem0t5SwahEK5NsGMEWRnOCxrGAXidi7GDvmCVQ6pAlFPPY3', '2019-03-06 21:14:13', '2019-03-06 21:14:13'),
(6, 'iuytre ytre ýtrrhyhr', 'phuongthuy5@gmail.com', '$2y$10$aTeNgr3kM.2sV12QH7wSaOIf25Pf8ZORmR29Sr0MDqCX7aznLUqI6', NULL, '0987654321', 'Ha noi', 'user', '1EN3dfJ7MmuMJyAyXSGyNWHrptjzrGlRBXe8ClPf36FFPf86wc5eoFLCoVQs', '2019-03-06 21:28:39', '2019-03-06 21:28:39'),
(7, 'lê vĩnh trường', 'vinhtruong12@gmail.com', '$2y$10$xWrsBq09S1SyUPNoXHD2qOrtFroWO0SlhmFGYwENSnIHU4FGy3.i6', NULL, NULL, NULL, 'user', NULL, '2019-03-06 21:38:01', '2019-03-06 21:38:01'),
(8, 'Admin Name', 'admin12@gmail.com', '$2y$10$QKRJQg74IOZrjV3rkhSqyO0kQ1nouBQKYxB5vv0ki6.V8y/cJYG3y', NULL, NULL, NULL, 'user', NULL, '2019-03-06 21:38:01', '2019-03-06 21:38:01'),
(9, 'Lê vĩnh Bảo', 'phuongthuy7@gmail.com', '$2y$10$ofPLrwuQAscI.LxSJ9p7..O91pTZUtTT.L7UW/W8KXQqhmHlN23Ua', NULL, '098765432', 'Phú kim thachj that ha noi', 'user', '9eY2slhCDL4W61t2bU1aeQetjIsF3kmc1jn1cPogB2rZUeUuFWJnSidZvsnR', '2019-03-06 21:41:19', '2019-03-06 21:41:19'),
(10, 'Lê vĩnh Bảo', 'phuongthuy8@gmail.com', 'xalo244a', NULL, '09876532112', 'nvjsni niu i', 'user', NULL, '2019-03-06 21:48:22', '2019-03-06 21:48:22'),
(11, 'Lê vĩnh Bảo', 'phuongthuy9@gmail.com', 'xalo244a', NULL, '09876542345', 'mfvisn ui uniuhs', 'user', NULL, '2019-03-06 21:49:39', '2019-03-06 21:49:39'),
(12, 'Lê vĩnh Bảo', 'phuongthuy100@gmail.com', 'xalo244a', NULL, '0987654', 'n jnsuegnius iunis', 'user', NULL, '2019-03-06 21:53:07', '2019-03-06 21:53:07'),
(13, 'nguyễn thị phương thúy', 'phuongthuy101@gmail.com', '$2y$10$qGd2zw1u6MhE7ddPCT0rpuIlnsNc3NZtku0slTCRi5iREVNJr4YqW', NULL, '0987654326', 'Hà nội', 'user', 'mTkVowFNhCpsw0xLOxozdTUd33J6eGP8wmFUYGokgMrFSdtLbyPqQ9ZXew9K', '2019-03-06 21:57:19', '2019-03-06 21:57:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_relation`
--
ALTER TABLE `category_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fr_cat` (`cat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fr_cat22` (`cat_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_relation`
--
ALTER TABLE `category_relation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_relation`
--
ALTER TABLE `category_relation`
  ADD CONSTRAINT `fr_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
