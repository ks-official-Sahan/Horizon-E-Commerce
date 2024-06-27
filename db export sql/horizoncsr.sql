-- Dumping database structure for horizoncsr
CREATE DATABASE IF NOT EXISTS `horizoncsr` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `horizoncsr`;

-- Dumping structure for table horizoncsr.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `mobile` varchar(13) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.admin: ~3 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`, `mobile`, `password`) VALUES
	('ks.official.sahan@gmail.com', 'Sahan', 'Sachintha', '63723c7b8163f', '0768701148', NULL),
	('prabashchathura2021@gmail.com', 'Chamindu', 'Chathura', NULL, '0701229005', NULL),
	('wjshashini@gmail.com', 'Shashini', 'Nethmini', NULL, '0740743815', NULL);

-- Dumping structure for table horizoncsr.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.category: ~9 rows (approximately)
INSERT INTO `category` (`id`, `name`) VALUES
	(15, 'Films & Tv Series'),
	(16, 'Courses'),
	(17, 'Electronics'),
	(18, 'Health & Beauty'),
	(19, 'Fashion'),
	(20, 'Entertainment'),
	(21, 'Business & Industrial'),
	(22, 'Motors'),
	(23, 'Sport Accessories');

-- Dumping structure for table horizoncsr.colour
CREATE TABLE IF NOT EXISTS `colour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.colour: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.condition: ~4 rows (approximately)
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'New'),
	(2, 'Used'),
	(3, 'Free'),
	(8, 'Paid');

-- Dumping structure for table horizoncsr.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.country: ~7 rows (approximately)
INSERT INTO `country` (`id`, `name`, `code`) VALUES
	(1, 'Sri Lanka', '+94'),
	(2, 'United State', '+1'),
	(3, 'United Kingdom', '+44'),
	(4, 'UAE', '+971'),
	(5, 'South Korea', '+82'),
	(6, 'Japan', '+81'),
	(7, 'India', '+91');

-- Dumping structure for table horizoncsr.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.gender: ~3 rows (approximately)
INSERT INTO `gender` (`id`, `gender`) VALUES
	(1, 'Male'),
	(2, 'Female'),
	(3, 'Rather not to Say');

-- Dumping structure for table horizoncsr.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.model: ~15 rows (approximately)
INSERT INTO `model` (`id`, `name`) VALUES
	(34, 'Action'),
	(35, 'Animation'),
	(36, 'Adventure'),
	(37, 'Action & Adventure'),
	(38, 'Comedy'),
	(39, 'Crime'),
	(40, 'Family'),
	(41, 'Fantasy'),
	(42, 'Horror'),
	(43, 'Kids'),
	(44, 'Mystery'),
	(45, 'Romance'),
	(46, 'Sci-Fi'),
	(47, 'Thriller'),
	(48, 'War');

-- Dumping structure for table horizoncsr.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mobile` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `joined_date` datetime NOT NULL,
  `status` int NOT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `gender_id` int NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_country1_idx` (`country_id`),
  KEY `fk_user_gender1_idx` (`gender_id`) USING BTREE,
  CONSTRAINT `fk_user_country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `fk_user_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.user: ~4 rows (approximately)
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `joined_date`, `status`, `verification_code`, `gender_id`, `country_id`) VALUES
	('kingsahan380@gmail.com', 'Sahan', 'Sachintha', 'Fdda7f2d', '768701149', '2022-11-13 21:00:29', 1, NULL, 1, 1),
	('ks.official.sahan@gmail.com', 'Sahan', 'Sachintha', 'King7f2d', '768701148', '2022-11-13 15:25:59', 1, '6373288d787bf', 1, 1),
	('prabashchathura2021@gmail.com', 'Chamindu', 'Chathura', 'LeaveMe@666', '0701229005', '2022-11-13 20:55:19', 1, NULL, 1, 1),
	('wjshashini@gmail.com', 'Shashini', 'Nethmini', 'Fdda7f2d', '740743815', '2022-11-13 15:36:48', 1, NULL, 2, 1);



-- Dumping structure for table horizoncsr.sub_category
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__category` (`category_id`),
  CONSTRAINT `FK__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.sub_category: ~22 rows (approximately)
INSERT INTO `sub_category` (`id`, `name`, `category_id`) VALUES
	(1, 'Movies', 15),
	(2, 'TV Series', 15),
	(3, 'Free Courses', 16),
	(4, 'Paid Courses', 16),
	(5, 'Computers, Tablets & Accessories', 17),
	(6, 'Phones & Accessories', 17),
	(7, 'Cameras & Accessories', 17),
	(8, 'Audio Accessories', 17),
	(9, 'Drones & VR Headsets', 17),
	(10, 'Smart Home Accessories', 17),
	(11, 'Security Accessories', 17),
	(12, 'Light Electronics & Accessories', 17),
	(13, 'Home Electronics', 17),
	(14, 'Musical Instruments', 20),
	(15, 'Books & Magazines', 20),
	(16, 'Music', 20),
	(17, 'Movies & TV Series', 20),
	(18, 'Games', 20),
	(19, 'Men', 19),
	(20, 'Women', 19),
	(21, 'Kids', 19),
	(22, 'Babies', 19);




-- Dumping structure for table horizoncsr.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `brand_has_model_id` int NOT NULL,
  `colour_id` int NOT NULL,
  `price` double NOT NULL,
  `qty` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `datetime_added` datetime NOT NULL,
  `delivery_fee_colombo` double NOT NULL,
  `delivery_fee_other` double NOT NULL,
  `sub_category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_brand_has_model1_idx` (`brand_has_model_id`),
  KEY `fk_product_colour1_idx` (`colour_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  KEY `FK` (`sub_category_id`),
  CONSTRAINT `FK` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`),
  CONSTRAINT `FK_product_brand_has_model` FOREIGN KEY (`brand_has_model_id`) REFERENCES `brand_has_model` (`id`),
  CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_product_colour` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`),
  CONSTRAINT `FK_product_condition` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `FK_product_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `FK_product_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.product: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_province_country1_idx` (`country_id`),
  CONSTRAINT `fk_province_country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.province: ~0 rows (approximately)


-- Dumping structure for table horizoncsr.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.brand: ~16 rows (approximately)
INSERT INTO `brand` (`id`, `name`, `sub_category_id`) VALUES
	(30, 'Business', 3),
	(31, 'Design', 3),
	(32, 'Development', 3),
	(33, 'Marketing', 3),
	(34, 'IT & Software', 3),
	(35, 'Photography & Video', 3),
	(36, 'Health & Fitness', 3),
	(59, 'Business', 4),
	(60, 'Design', 4),
	(61, 'Development', 4),
	(62, 'Marketing', 4),
	(63, 'IT & Software', 4),
	(64, 'Photography & Video', 4),
	(65, 'Health & Fitness', 4),
	(94, 'Movie Genre', 1),
	(95, 'Tv Series Genre', 2);

-- Dumping structure for table horizoncsr.brand_has_model
CREATE TABLE IF NOT EXISTS `brand_has_model` (
  `brand_id` int NOT NULL,
  `model_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_brand_has_model_model1_idx` (`model_id`),
  KEY `fk_brand_has_model_brand1_idx` (`brand_id`),
  CONSTRAINT `FK_brand_has_model_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `FK_brand_has_model_model` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.brand_has_model: ~30 rows (approximately)
INSERT INTO `brand_has_model` (`brand_id`, `model_id`, `id`) VALUES
	(94, 34, 14),
	(94, 35, 15),
	(94, 36, 16),
	(94, 37, 17),
	(94, 38, 18),
	(94, 39, 19),
	(94, 40, 20),
	(94, 41, 21),
	(94, 42, 22),
	(94, 43, 23),
	(94, 44, 24),
	(94, 45, 25),
	(94, 46, 26),
	(94, 47, 27),
	(94, 48, 28),
	(95, 34, 29),
	(95, 35, 30),
	(95, 36, 31),
	(95, 37, 32),
	(95, 38, 33),
	(95, 39, 34),
	(95, 40, 35),
	(95, 41, 36),
	(95, 42, 37),
	(95, 43, 38),
	(95, 44, 39),
	(95, 45, 40),
	(95, 46, 41),
	(95, 47, 42),
	(95, 48, 43);

-- Dumping structure for table horizoncsr.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product3` (`product_id`),
  KEY `FK__user3` (`user_email`),
  CONSTRAINT `FK__product3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK__user3` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.cart: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__user_5` (`from`),
  KEY `FK__user_5.5` (`to`),
  CONSTRAINT `FK__user_5` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `FK__user_5.5` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.chat: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `FK_district_province` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.district: ~0 rows (approximately)


-- Dumping structure for table horizoncsr.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `FK_city_district` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.city: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `feedback` text NOT NULL,
  `datetime` datetime NOT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product6` (`product_id`),
  KEY `FK__user7` (`user_email`),
  CONSTRAINT `FK__product6` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK__user7` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.feedback: ~0 rows (approximately)
-- Dumping structure for table horizoncsr.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(100) NOT NULL,
  `product_id1` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id1`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id1`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.images: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `total` double NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product5` (`product_id`),
  KEY `FK__user6` (`user_email`),
  CONSTRAINT `FK__product5` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK__user6` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.invoice: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product2` (`product_id`),
  KEY `FK__user2` (`user_email`),
  CONSTRAINT `FK__product2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK__user2` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.recent: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.status: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.support
CREATE TABLE IF NOT EXISTS `support` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `to` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_support_admin1_idx` (`to`),
  CONSTRAINT `fk_support_admin1` FOREIGN KEY (`to`) REFERENCES `admin` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.support: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `user_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `city_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `line2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `postal_code` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_city_city1_idx` (`city_id`),
  KEY `fk_user_has_city_user1_idx` (`user_email`),
  CONSTRAINT `fk_user_has_city_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_city_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.user_has_address: ~0 rows (approximately)

-- Dumping structure for table horizoncsr.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product` (`product_id`),
  KEY `FK__user` (`user_email`),
  CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table horizoncsr.watchlist: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
