-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: artemex
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrators` (
  `id` int NOT NULL,
  `work_schedule_start` time NOT NULL,
  `work_schedule_end` time NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `administrators_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (19,'08:00:00','16:00:00'),(20,'09:00:00','17:00:00');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `added_by` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `added_by` (`added_by`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `administrators` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Vestimenta','2023-10-14',NULL,NULL,19),(2,'Calzado','2023-10-14',NULL,NULL,19),(3,'Bebida','2023-10-14',NULL,NULL,20),(4,'Alimento','2023-10-14',NULL,NULL,19),(5,'Accesorios','2023-10-14',NULL,NULL,20);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (18,'alejandro99'),(5,'ana95'),(14,'arturo94'),(3,'carlos98'),(13,'carmen86'),(12,'daniel91'),(16,'guillermo84'),(10,'javier93'),(1,'juanito90'),(15,'lorena81'),(9,'lucia83'),(4,'luisa80'),(2,'maria85'),(17,'mariana97'),(8,'miguel96'),(6,'pedro92'),(11,'rosa82'),(7,'sofia87');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `detalles_orders`
--

DROP TABLE IF EXISTS `detalles_orders`;
/*!50001 DROP VIEW IF EXISTS `detalles_orders`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `detalles_orders` AS SELECT 
 1 AS `id`,
 1 AS `usuario`,
 1 AS `producto`,
 1 AS `fecha`,
 1 AS `unit_price`,
 1 AS `state`,
 1 AS `town`,
 1 AS `postal_code`,
 1 AS `street`,
 1 AS `reference`,
 1 AS `confirmed`,
 1 AS `delivery`,
 1 AS `canceled_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `info_admins`
--

DROP TABLE IF EXISTS `info_admins`;
/*!50001 DROP VIEW IF EXISTS `info_admins`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `info_admins` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `lastname`,
 1 AS `second_lastname`,
 1 AS `birthday`,
 1 AS `phone`,
 1 AS `email`,
 1 AS `password`,
 1 AS `postal_code`,
 1 AS `state`,
 1 AS `town`,
 1 AS `street`,
 1 AS `house_number`,
 1 AS `reference`,
 1 AS `work_schedule_start`,
 1 AS `work_schedule_end`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `info_product`
--

DROP TABLE IF EXISTS `info_product`;
/*!50001 DROP VIEW IF EXISTS `info_product`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `info_product` AS SELECT 
 1 AS `id`,
 1 AS `image`,
 1 AS `name`,
 1 AS `weight`,
 1 AS `expiration_date`,
 1 AS `category`,
 1 AS `cost`,
 1 AS `price_sale`,
 1 AS `utilidad`,
 1 AS `description`,
 1 AS `stock`,
 1 AS `status`,
 1 AS `added_by`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `info_users`
--

DROP TABLE IF EXISTS `info_users`;
/*!50001 DROP VIEW IF EXISTS `info_users`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `info_users` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `lastname`,
 1 AS `second_lastname`,
 1 AS `birthday`,
 1 AS `phone`,
 1 AS `email`,
 1 AS `password`,
 1 AS `postal_code`,
 1 AS `state`,
 1 AS `town`,
 1 AS `street`,
 1 AS `house_number`,
 1 AS `reference`,
 1 AS `username`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `canceled_at` datetime DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `user` int NOT NULL,
  `confirmed_by` int NOT NULL,
  `unit_price` decimal(6,2) NOT NULL,
  `delivery` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `confirmed_by` (`confirmed_by`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `clients` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`confirmed_by`) REFERENCES `administrators` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'2023-10-14 00:00:00',NULL,0,1,19,99.00,0),(2,'2023-10-14 00:00:00',NULL,1,2,20,45.00,1),(3,'2023-10-14 00:00:00',NULL,1,3,19,176.00,0),(4,'2023-10-14 00:00:00',NULL,1,4,20,50.00,0),(5,'2023-10-14 00:00:00','2023-11-30 17:54:05',0,5,19,16.00,0),(6,'2023-10-14 00:00:00',NULL,0,6,20,75.00,0),(7,'2023-10-14 00:00:00',NULL,0,7,19,6.00,0),(8,'2023-11-15 00:00:00','2023-11-30 08:02:08',1,2,20,297.00,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `weight` float NOT NULL,
  `expiration_date` date NOT NULL,
  `cost` float DEFAULT NULL,
  `price_sale` float NOT NULL,
  `stock` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `added_by` int NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `category` (`category`),
  KEY `added_by` (`added_by`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `administrators` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Artesanía de cerámica',2,'2024-10-14',15,25,50,1,5,'uploads/ceramica.jpg','2023-10-14',NULL,NULL,19,'Artesania de michoacán'),(2,'Collar de cuentas de madera',0,'2024-10-14',5,12,100,1,5,'uploads/collar.jpg','2023-10-14',NULL,NULL,19,'Collar de madera de chiapas'),(3,'Sombrero tejido a mano',0,'2024-10-14',10,18,30,1,5,'uploads/sombrero.jpg','2023-10-14',NULL,NULL,19,'Sombrero de paja'),(4,'Jabón artesanal de lavanda',1,'2024-10-14',5,8,75,1,5,'uploads/jabon.jpg','2023-10-14',NULL,NULL,19,'Jabón de alta cálidad con aroma lavanda'),(5,'Pintura al óleo sobre lienzo',1,'2024-10-14',25,45,20,1,5,'uploads/pintura.jpg','2023-10-14',NULL,NULL,19,'Pintura bonita\r\n'),(6,'Taza de cerámica esmaltada',0.4,'2024-10-14',7,15,40,1,5,'uploads/taza.jpg','2023-10-14',NULL,NULL,19,''),(7,'Vestido bordado a mano',0.7,'2024-10-14',20,35,15,1,1,'uploads/vestido.jpg','2023-10-14',NULL,NULL,19,''),(8,'Collar de cuentas de vidrio',0.1,'2024-10-14',8,14,60,1,5,'uploads/collar_vidrio.jpg','2023-10-14',NULL,NULL,19,''),(9,'Pan de maíz casero',0.5,'2024-10-14',3,15,80,1,4,'uploads/pan.jpg','2023-10-14',NULL,NULL,19,''),(10,'Caja de madera tallada',0.3,'2024-10-14',80,389,25,1,5,'uploads/caja_madera.jpg','2023-10-14',NULL,NULL,19,''),(11,'Sandalias de cueroo',2,'2024-10-14',15,60,35,1,2,'uploads/sandalias.jpg','2023-10-14',NULL,NULL,19,'Sandalias de cuero, ideales para primavera'),(12,'Pulsera de cuero trenzado',0.1,'2024-10-14',6,12,70,1,5,'uploads/pulsera.jpg','2023-10-14',NULL,NULL,19,''),(13,'Dulces típicos regionales',0.3,'2024-10-14',5,10,90,1,4,'uploads/dulces.jpg','2023-10-14',NULL,NULL,19,''),(14,'Vino de frutas casero',0.75,'2024-10-14',250,548,12,1,3,'uploads/vino.jpg','2023-10-14',NULL,NULL,19,''),(15,'Bufanda tejida a mano',1,'2024-10-14',87,279,50,1,5,'uploads/bufanda.jpg','2023-10-14',NULL,NULL,19,'Bufanda de seda'),(16,'Cinturón de cuero grabado',0.2,'2024-10-14',369,570,40,1,5,'uploads/cinturon.jpg','2023-10-14',NULL,NULL,19,''),(17,'Cerveza artesanal de frutas',0.5,'2024-10-14',18,31,55,1,3,'uploads/cerveza.jpg','2023-10-14',NULL,NULL,19,''),(18,'Máscara de madera tallada',0.4,'2024-10-14',93,182,28,1,5,'uploads/mascara.jpg','2023-10-14',NULL,NULL,19,''),(19,'Pendientes de plata y piedras',0.1,'2024-10-14',20,132,18,1,5,'uploads/pendientes.jpg','2023-10-14',NULL,NULL,19,''),(28,'Set de mezcaleros',1,'2030-12-31',289,716,10,1,5,'uploads/1699803730_c435f97cd29c4d434f06.jpg',NULL,NULL,NULL,19,'Mezcalero de barro fino'),(38,'Botas vaqueras',2,'2023-12-09',300,3000,20,1,2,'uploads/1700100188_abbe92215ef100674076.webp',NULL,NULL,NULL,20,'Botas de piel vacuno, corte vaquero'),(39,'Muñeca',1,'2023-12-04',70,179,4,1,5,'uploads/1701746288_f7d25d76ad22ec407b9e.jpg',NULL,NULL,NULL,19,'Muñeca mexicana de trapo');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_orders`
--

DROP TABLE IF EXISTS `products_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `amount` tinyint NOT NULL,
  PRIMARY KEY (`id`,`id_order`,`id_product`),
  KEY `id_order` (`id_order`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `products_orders_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  CONSTRAINT `products_orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_orders`
--

LOCK TABLES `products_orders` WRITE;
/*!40000 ALTER TABLE `products_orders` DISABLE KEYS */;
INSERT INTO `products_orders` VALUES (16,1,1,3),(17,1,2,2),(18,2,5,1),(19,3,7,4),(20,3,3,2),(21,4,8,1),(22,4,12,3),(23,5,4,2),(24,6,6,5),(25,7,9,1),(26,8,3,4),(27,8,5,5);
/*!40000 ALTER TABLE `products_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `second_lastname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `state` varchar(30) NOT NULL,
  `town` varchar(30) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juan','Gonzalez','Perez','1990-05-15','555-123-4567','juan@example.com','hashedpassword1','12345','Jalisco','Guadalajara','Calle Alegre','123A',NULL),(2,'Maria','Lopez','Garcia','1985-08-21','555-987-6543','maria@example.com','hashedpassword2','54321','Nuevo León','Monterrey','Calle Principal','456B',NULL),(3,'Carlos','Martinez','Sanchez','1998-03-07','555-789-1234','carlos@example.com','hashedpassword3','67890','Yucatán','Merida','Avenida Central','789C',NULL),(4,'Luisa','Fernandez','Vargas','1980-12-03','555-456-7890','luisa@example.com','hashedpassword4','54321','Nuevo León','Monterrey','Calle del Sol','567D',NULL),(5,'Ana','Ramirez','Torres','1995-02-18','555-234-5678','ana@example.com','hashedpassword5','12345','Jalisco','Guadalajara','Calle Principal','678E',NULL),(6,'Pedro','Gutierrez','Lopez','1992-07-11','555-876-5432','pedro@example.com','hashedpassword6','23456','Ciudad de México','CDMX','Avenida Central','345F',NULL),(7,'Sofia','Perez','Fernandez','1987-09-29','555-567-8765','sofia@example.com','hashedpassword7','89012','Baja California','Tijuana','Calle del Mar','456G',NULL),(8,'Miguel','Hernandez','Gomez','1996-11-25','555-234-5678','miguel@example.com','hashedpassword8','34567','Puebla','Puebla','Avenida Principal','567H',NULL),(9,'Lucia','Torres','Gutierrez','1983-04-14','555-987-6543','lucia@example.com','hashedpassword9','45678','Guanajuato','León','Calle de las Flores','678I',NULL),(10,'Javier','Sanchez','Velasco','1993-06-05','555-876-5432','javier@example.com','hashedpassword10','23456','Ciudad de México','CDMX','Calle de los Pájaros','789J',NULL),(11,'Rosa','Garcia','Fernandez','1982-10-30','555-123-4567','rosa@example.com','hashedpassword11','67890','Yucatán','Merida','Avenida de las Palmeras','890K',NULL),(12,'Daniel','Lopez','Hernandez','1991-08-15','555-234-5678','daniel@example.com','hashedpassword12','12345','Jalisco','Guadalajara','Calle de los Cactus','234L',NULL),(13,'Carmen','Vargas','Ramirez','1986-01-24','555-456-7890','carmen@example.com','hashedpassword13','54321','Nuevo León','Monterrey','Avenida de las Rosas','345M',NULL),(14,'Arturo','Perez','Gutierrez','1994-04-09','555-789-1234','arturo@example.com','hashedpassword14','67890','Yucatán','Merida','Calle de los Abrazos','456N',NULL),(15,'Lorena','Gomez','Martinez','1981-03-12','555-567-8765','lorena@example.com','hashedpassword15','12345','Jalisco','Guadalajara','Avenida de los Sueños','567O',NULL),(16,'Guillermo','Ramirez','Garcia','1984-07-23','555-987-6543','guillermo@example.com','hashedpassword16','54321','Nuevo León','Monterrey','Calle de las Estrellas','678P',NULL),(17,'Mariana','Fernandez','Hernandez','1997-12-19','555-876-5432','mariana@example.com','hashedpassword17','23456','Ciudad de México','CDMX','Avenida de los Deseos','789Q',NULL),(18,'Alejandro','Sanchez','Gutierrez','1999-09-10','555-234-5678','alejandro@example.com','hashedpassword18','34567','Puebla','Puebla','Calle de los Recuerdos','890R',NULL),(19,'Isabel','Torres','Ramirez','1988-05-08','555-567-8765','isabel@example.com','hashedpassword19','45678','Guanajuato','León','Avenida de los Secretos','234S',NULL),(20,'Fernando','Lopez','Gomez','1990-02-27','555-987-6543','fernando@example.com','hashedpassword20','67890','Yucatán','Merida','Calle de los Sueños','345T',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'artemex'
--
/*!50003 DROP PROCEDURE IF EXISTS `art_AddProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_AddProduct`(nam varchar(50), wei float, expDate date, cos float, price float, sto int, stat boolean, cat int, img varchar(255), idAdmin int, descr varchar(255))
BEGIN
insert into products (name, weight, expiration_date, cost, price_sale, stock, status, category, image, created_at, added_by, description)
values (nam, wei, expDate, cos, price, sto, stat, cat, img, NOW() ,idAdmin, descr) ;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_CategoryFilter` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_CategoryFilter`(cate varchar(20))
BEGIN
    select * from info_product where category like concat('%', cate, '%');
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_DeleteProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_DeleteProduct`(idP int)
BEGIN
        DELETE FROM products where id = idP;
    end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_filterOrders` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_filterOrders`(filtro int)
BEGIN
    select * from detalles_orders where
                                      CASE filtro
                                          WHEN  0 THEN delivery = 1 and canceled_at is null
                                          WHEN  1 THEN delivery = 0 and canceled_at is null and confirmed = 1
                                          WHEN  2 THEN canceled_at is not null
                                          WHEN  3 THEN confirmed = 0 and canceled_at is null
                                    END;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_LoginAdmin` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_LoginAdmin`(em varchar(50), pass varchar(100) )
BEGIN
    select * from info_admins where email = em and password = pass;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_ProductosVendidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_ProductosVendidos`(inicio datetime, fin datetime, mas boolean)
BEGIN
            select p.name, sum(po.amount) as cantidad_vendidos
                from products p join  products_orders po
                        on p.id = po.id_product join orders o on po.id_order = o.id
                    where o.created_at between inicio and fin and  o.confirmed = 1
                group by p.name
                order by
                    CASE WHEN mas THEN cantidad_vendidos END DESC ,
                    CASE WHEN NOT mas THEN cantidad_vendidos END ASC
                limit 10;
        END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_SearchProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_SearchProduct`(nom varchar(50))
BEGIN
    select * from info_product where name like concat('%', nom, '%');
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_SearchProductStatus` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_SearchProductStatus`(stat boolean)
BEGIN
    select * from info_product where status = stat;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `art_Utilidades` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`beto`@`%` PROCEDURE `art_Utilidades`(inicio datetime, fin datetime)
BEGIN

select c.name, sum((p.price_sale - p.cost) * po.amount )as utilidadTotal from categories c join products p
    on c.id = p.category join products_orders po on p.id = po.id_product
    join orders o on po.id_order = o.id where o.confirmed = 1 and o.created_at between inicio and fin group by c.name;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `detalles_orders`
--

/*!50001 DROP VIEW IF EXISTS `detalles_orders`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`beto`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `detalles_orders` AS select `o`.`id` AS `id`,concat(`u`.`name`,' (',`c`.`username`,')') AS `usuario`,json_arrayagg(json_object('producto',`p`.`name`,'cantidad',`po`.`amount`)) AS `producto`,`o`.`created_at` AS `fecha`,`o`.`unit_price` AS `unit_price`,`u`.`state` AS `state`,`u`.`town` AS `town`,`u`.`postal_code` AS `postal_code`,`u`.`street` AS `street`,`u`.`reference` AS `reference`,`o`.`confirmed` AS `confirmed`,`o`.`delivery` AS `delivery`,`o`.`canceled_at` AS `canceled_at` from ((((`users` `u` join `clients` `c` on((`u`.`id` = `c`.`id`))) join `orders` `o` on((`c`.`id` = `o`.`user`))) join `products_orders` `po` on((`o`.`id` = `po`.`id_order`))) join `products` `p` on((`po`.`id_product` = `p`.`id`))) group by `o`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `info_admins`
--

/*!50001 DROP VIEW IF EXISTS `info_admins`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`beto`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `info_admins` AS select `adm`.`id` AS `id`,`u`.`name` AS `name`,`u`.`lastname` AS `lastname`,`u`.`second_lastname` AS `second_lastname`,`u`.`birthday` AS `birthday`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`postal_code` AS `postal_code`,`u`.`state` AS `state`,`u`.`town` AS `town`,`u`.`street` AS `street`,`u`.`house_number` AS `house_number`,`u`.`reference` AS `reference`,`adm`.`work_schedule_start` AS `work_schedule_start`,`adm`.`work_schedule_end` AS `work_schedule_end` from (`users` `u` join `administrators` `adm` on((`u`.`id` = `adm`.`id`))) order by `adm`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `info_product`
--

/*!50001 DROP VIEW IF EXISTS `info_product`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`beto`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `info_product` AS select `p`.`id` AS `id`,`p`.`image` AS `image`,`p`.`name` AS `name`,`p`.`weight` AS `weight`,`p`.`expiration_date` AS `expiration_date`,`c`.`name` AS `category`,`p`.`cost` AS `cost`,`p`.`price_sale` AS `price_sale`,(`p`.`price_sale` - `p`.`cost`) AS `utilidad`,`p`.`description` AS `description`,`p`.`stock` AS `stock`,`p`.`status` AS `status`,`u`.`name` AS `added_by` from (((`categories` `c` join `products` `p` on((`c`.`id` = `p`.`category`))) join `administrators` `adm` on((`p`.`added_by` = `adm`.`id`))) join `users` `u` on((`adm`.`id` = `u`.`id`))) order by `p`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `info_users`
--

/*!50001 DROP VIEW IF EXISTS `info_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`beto`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `info_users` AS select `cli`.`id` AS `id`,`u`.`name` AS `name`,`u`.`lastname` AS `lastname`,`u`.`second_lastname` AS `second_lastname`,`u`.`birthday` AS `birthday`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`postal_code` AS `postal_code`,`u`.`state` AS `state`,`u`.`town` AS `town`,`u`.`street` AS `street`,`u`.`house_number` AS `house_number`,`u`.`reference` AS `reference`,`cli`.`username` AS `username` from (`users` `u` join `clients` `cli` on((`u`.`id` = `cli`.`id`))) order by `cli`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07 22:53:32
