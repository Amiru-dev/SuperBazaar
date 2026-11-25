-- =====================================================
-- SuperBazaar - Full Database Setup (Self-Contained)
-- Usage: mysql -u root -p < superbazaar_full_setup.sql
-- =====================================================

-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: superbazaar
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `superbazaar`
--

/*!40000 DROP DATABASE IF EXISTS `superbazaar`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `superbazaar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `superbazaar`;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(20) NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `uk_brand_name` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (7,'Addlink'),(2,'AMD'),(12,'Anker'),(19,'Apple'),(8,'Arctic'),(3,'ASUS'),(17,'Cooler Master'),(5,'Corsair'),(18,'Gigabyte'),(1,'Intel'),(9,'Kingston'),(14,'Lexar'),(13,'Meetion'),(4,'MSI'),(15,'NVIDIA'),(16,'NZXT'),(10,'Samsung'),(11,'SteelSeries'),(6,'Team');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `cart_qty` int NOT NULL DEFAULT '1',
  `user_id` int NOT NULL,
  `stock_stock_id` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_user` (`user_id`),
  KEY `fk_cart_stock` (`stock_stock_id`),
  CONSTRAINT `fk_cart_stock` FOREIGN KEY (`stock_stock_id`) REFERENCES `stock` (`stock_id`),
  CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,1,2,1);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `uk_cat_name` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,'APPLE PRODUCTS'),(2,'ASUS ROG'),(7,'BUDGET DESKTOP COMPUTERS'),(15,'CASINGS'),(4,'CONSOLE GAMING'),(13,'COOLING AND LIGHTING'),(5,'DESKTOP WORKSTATIONS'),(19,'GAMING CHAIRS'),(6,'GAMING DESKTOPS'),(11,'GRAPHIC CARDS'),(18,'KEYBOARDS, MICE & GAMEPADS'),(1,'LAPTOP'),(10,'MEMORY (RAM)'),(16,'MONITORS'),(9,'MOTHERBOARDS'),(12,'POWER SUPPLY'),(8,'PROCESSORS'),(17,'SPEAKERS & HEADPHONES'),(14,'STORAGE');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(20) NOT NULL,
  PRIMARY KEY (`color_id`),
  UNIQUE KEY `uk_color_name` (`color_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Black'),(5,'Blue'),(10,'Dark Gray'),(8,'Gold'),(7,'Gray'),(6,'Green'),(4,'Red'),(9,'RGB'),(3,'Silver'),(2,'White');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_history`
--

DROP TABLE IF EXISTS `order_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_history` (
  `ohid` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ohid`),
  KEY `fk_order_user` (`user_id`),
  CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_history`
--

LOCK TABLES `order_history` WRITE;
/*!40000 ALTER TABLE `order_history` DISABLE KEYS */;
INSERT INTO `order_history` VALUES (1,'ORD-20241101-001','2024-11-01 10-30-00',1326.00,2),(2,'ORD-20241105-002','2024-11-05 14-15-00',2138.00,3),(3,'ORD-20241110-003','2024-11-10 09-45-00',1286.00,4);
/*!40000 ALTER TABLE `order_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_item` (
  `oi_id` int NOT NULL AUTO_INCREMENT,
  `oi_qty` int NOT NULL,
  `order_history_ohid` int NOT NULL,
  `stock_stock_id` int NOT NULL,
  PRIMARY KEY (`oi_id`),
  KEY `fk_oi_order` (`order_history_ohid`),
  KEY `fk_oi_stock` (`stock_stock_id`),
  CONSTRAINT `fk_oi_order` FOREIGN KEY (`order_history_ohid`) REFERENCES `order_history` (`ohid`),
  CONSTRAINT `fk_oi_stock` FOREIGN KEY (`stock_stock_id`) REFERENCES `stock` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` VALUES (1,1,1,1),(2,1,1,8),(3,1,2,9),(4,1,2,8),(5,1,3,1),(6,1,3,14);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `path` varchar(500) NOT NULL,
  `brand_brand_id` int NOT NULL,
  `category_cat_id` int NOT NULL,
  `color_color_id` int NOT NULL,
  `series_series_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_product_name` (`name`),
  KEY `fk_product_brand` (`brand_brand_id`),
  KEY `fk_product_category` (`category_cat_id`),
  KEY `fk_product_color` (`color_color_id`),
  KEY `fk_product_series` (`series_series_id`),
  CONSTRAINT `fk_product_brand` FOREIGN KEY (`brand_brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_cat_id`) REFERENCES `category` (`cat_id`),
  CONSTRAINT `fk_product_color` FOREIGN KEY (`color_color_id`) REFERENCES `color` (`color_id`),
  CONSTRAINT `fk_product_series` FOREIGN KEY (`series_series_id`) REFERENCES `series` (`series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Intel Core i5-12400F','18M Cache, up to 4.40 GHz, 6 Cores 12 Threads. Great value mid-range processor for gaming and productivity.','assets/img/productImg/processor_i5_12400f.png',1,8,7,1),(2,'Intel Core i5-14400F','20M Cache, up to 4.70 GHz, 10 Cores 16 Threads. Latest gen Intel performance for enthusiast builds.','assets/img/productImg/processor_i5_14400f.png',1,8,7,1),(3,'Intel Core Ultra 9 285K','36M Cache, up to 5.70 GHz. Flagship processor with cutting-edge hybrid architecture.','assets/img/productImg/processor_ultra9_285k.png',1,8,7,6),(4,'ASUS TUF B860M-PLUS WiFi','Intel B860 LGA1851 Micro-ATX motherboard with DDR5, PCIe 5.0 and WiFi 7 support.','assets/img/productImg/mobo_tuf_b860m.png',3,9,1,9),(5,'MSI MAG X870E Tomahawk WiFi','AMD X870E AM5 ATX motherboard with DDR5, PCIe 5.0 M.2 and 2.5G LAN.','assets/img/productImg/mobo_msi_x870e.png',4,9,1,2),(6,'ASUS ROG Strix X870-A Gaming WiFi','AMD X870 AM5 ATX motherboard with DDR5, PCIe 5.0, WiFi 7 and ROG aesthetics.','assets/img/productImg/mobo_rog_strix_x870.png',3,9,2,8),(7,'Team T-Create Expert 48GB DDR5','48GB (24x2) 6000MHz DDR5 desktop memory kit for content creation and gaming.','assets/img/productImg/ram_team_48gb.png',6,10,1,3),(8,'Corsair Vengeance LPX 16GB DDR4','16GB (1x16GB) 3200MHz DDR4 desktop memory. Reliable and high-performance RAM.','assets/img/productImg/ram_corsair_16gb.png',5,10,1,1),(9,'ASUS Dual GeForce RTX 5060 Ti','16GB GDDR7 dual-fan graphics card with DLSS 4 and ray tracing.','assets/img/productImg/gpu_rtx5060ti.png',3,11,1,1),(10,'ASUS Dual GeForce RTX 5060 OC','8GB GDDR7 OC Edition dual-fan GPU for 1080p/1440p gaming.','assets/img/productImg/gpu_rtx5060.png',3,11,1,1),(11,'ASUS Dual GeForce RTX 5050 OC','8GB GDDR6 OC Edition. Budget-friendly next-gen GPU for entry gaming.','assets/img/productImg/gpu_rtx5050.png',3,11,1,4),(12,'Corsair CX750 80+ Bronze','750W 80 PLUS Bronze ATX power supply. Reliable and efficient for mid-range builds.','assets/img/productImg/psu_corsair_cx750.png',5,12,1,1),(13,'Arctic Freezer 36 CPU Cooler','High performance single tower CPU air cooler with push-pull fan configuration.','assets/img/productImg/cooler_arctic_freezer36.png',8,13,1,1),(14,'Arctic M.2 Pro SSD Cooler','Passive M.2 NVMe SSD heatsink for optimal thermal management.','assets/img/productImg/cooler_arctic_m2.png',8,13,3,3),(15,'Kingston NV3 NVMe 2TB','PCIe Gen 4.0 M.2 NVMe SSD, 2TB capacity with up to 6000MB/s read speeds.','assets/img/productImg/ssd_kingston_nv3.png',9,14,1,1),(16,'Samsung 9100 Pro 1TB NVMe','Gen 5 M.2 NVMe SSD with heatsink. Ultra-fast sequential reads up to 14500MB/s.','assets/img/productImg/ssd_samsung_9100.png',10,14,1,5),(17,'MSI MEG Maestro 900R','Full tower premium gaming case with tempered glass and excellent airflow.','assets/img/productImg/case_msi_maestro.png',4,15,1,5),(18,'ASUS ROG Hyperion GR701','Full tower gaming case with 420mm radiator support and tool-free panels.','assets/img/productImg/case_rog_hyperion.png',3,15,1,8),(19,'ASUS ProArt PA401 Wood Edition','Tempered glass panel mid-tower case with elegant wood accents for creators.','assets/img/productImg/case_proart_pa401.png',3,15,2,10),(20,'Samsung 27\" S30GD FHD IPS 100Hz','Samsung Essential S3 27-inch Full HD IPS monitor with 100Hz refresh rate.','assets/img/productImg/monitor_samsung_27.png',10,16,1,1),(21,'SteelSeries Arctis Nova 3 Wireless','Wireless gaming headset with high fidelity audio drivers and noise cancellation.','assets/img/productImg/headset_steelseries_nova3.png',11,17,1,2),(22,'Anker Soundcore Boom Go 3i','Portable Bluetooth speaker with deep bass and waterproof IPX7 rating.','assets/img/productImg/speaker_anker_boom.png',12,17,1,1),(23,'SteelSeries Apex 3 TKL Amethyst','Tenkeyless gaming keyboard with whisper quiet switches and RGB illumination.','assets/img/productImg/kb_steelseries_apex3.png',11,18,5,2),(24,'ASUS ROG Impact III Gaming Mouse','Lightweight wireless gaming mouse with 42000 DPI optical sensor.','assets/img/productImg/mouse_rog_impact3.png',3,18,1,8),(25,'ASUS ROG Chariot X Core','Premium ergonomic gaming chair with 4D adjustable armrests and lumbar support.','assets/img/productImg/chair_rog_chariot.png',3,19,1,8),(26,'Meetion CHR05 Gaming Chair','Professional gaming chair with reclining backrest and footrest. Affordable ergonomics.','assets/img/productImg/chair_meetion_chr05.png',13,19,1,4),(27,'ASUS ProArt P16 H7607BA','NVIDIA RTX Spark N1X with 6144 CUDA cores and 20-core CPU. Ultimate creator laptop.','assets/img/productImg/laptop_proart_p16.png',3,1,1,10),(28,'ASUS ROG Zephyrus Duo 16','Ultra 9 + RTX 5090 dual-screen gaming laptop. Extreme portable gaming power.','assets/img/productImg/laptop_rog_zephyrus.png',3,1,1,8);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series` (
  `series_id` int NOT NULL AUTO_INCREMENT,
  `series_name` varchar(20) NOT NULL,
  PRIMARY KEY (`series_id`),
  UNIQUE KEY `uk_series_name` (`series_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES (4,'Budget'),(7,'Elite'),(2,'Gaming'),(5,'Premium'),(3,'Pro'),(10,'ProArt'),(8,'ROG'),(1,'Standard'),(9,'TUF'),(6,'Ultra');
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `fk_stock_product` (`product_id`),
  CONSTRAINT `fk_stock_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,263.00,15,1),(2,280.00,12,2),(3,945.00,5,3),(4,298.00,8,4),(5,625.00,6,5),(6,695.00,4,6),(7,195.00,20,7),(8,63.00,25,8),(9,1075.00,7,9),(10,745.00,10,10),(11,625.00,12,11),(12,163.00,15,12),(13,60.00,20,13),(14,23.00,30,14),(15,210.00,18,15),(16,325.00,10,16),(17,625.00,5,17),(18,825.00,3,18),(19,275.00,8,19),(20,295.00,12,20),(21,160.00,15,21),(22,93.00,20,22),(23,110.00,18,23),(24,175.00,10,24),(25,945.00,4,25),(26,225.00,10,26),(27,4475.00,3,27),(28,7250.00,2,28);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_type_id` int NOT NULL,
  `no` varchar(10) DEFAULT NULL,
  `line_1` varchar(50) DEFAULT NULL,
  `line_2` varchar(50) DEFAULT NULL,
  `img_path` varchar(500) DEFAULT NULL,
  `v_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_email` (`email`),
  UNIQUE KEY `uk_mobile` (`mobile`),
  UNIQUE KEY `uk_username` (`username`),
  KEY `fk_user_type` (`user_type_id`),
  CONSTRAINT `fk_user_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','SuperBazaar','admin@superbazaar.lk','0712345678','admin','admin123',1,1,'12','Main Street','Colombo 03',NULL,NULL),(2,'Kasun','Perera','kasun.perera@gmail.com','0771234567','kasun','kasun123',1,2,'45','Galle Road','Dehiwala',NULL,NULL),(3,'Nimali','Fernando','nimali.f@gmail.com','0781234567','nimali','nimali123',1,2,'78','Kandy Road','Kadawatha',NULL,NULL),(4,'Ruwan','Silva','ruwan.silva@gmail.com','0761234567','ruwan','ruwan123',1,2,'23','High Level Road','Nugegoda',NULL,NULL),(5,'Sachini','Jayawardena','sachini.j@gmail.com','0751234567','sachini','sachini12',1,2,'56','Dutugemunu St','Kohuwala',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type` (
  `utype_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Admin'),(2,'Customer');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `wishlist_id` int NOT NULL AUTO_INCREMENT,
  `wishlist_qty` int NOT NULL DEFAULT '1',
  `user_id` int NOT NULL,
  `stock_stock_id` int NOT NULL,
  PRIMARY KEY (`wishlist_id`),
  KEY `fk_wishlist_user` (`user_id`),
  KEY `fk_wishlist_stock` (`stock_stock_id`),
  CONSTRAINT `fk_wishlist_stock` FOREIGN KEY (`stock_stock_id`) REFERENCES `stock` (`stock_id`),
  CONSTRAINT `fk_wishlist_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (1,1,2,1);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'superbazaar'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-25  9:42:41
