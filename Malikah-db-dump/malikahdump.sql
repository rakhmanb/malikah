-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: malikah
-- ------------------------------------------------------
-- Server version	5.7.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog`
--
USE `malikah`;

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` text NOT NULL,
  `Post` longtext NOT NULL,
  `UserId` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `FK_User_Blog` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (16,'Welcome to Malikah!','<p>Assalamualaikum,</p>\r\n<p>On behalf of my husband and I, we both welcome you to Malikah! Please stay tuned for updates to our 2017 collection!</p>\r\n<p><img style=\"width: 100%;\" src=\"http://eskipaper.com/images/springtime-wallpaper-14.jpg\" alt=\"\" /></p>',7,'2017-02-02');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `ShopId` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ShopId` (`ShopId`),
  CONSTRAINT `FK_Category_Shop` FOREIGN KEY (`ShopId`) REFERENCES `shop` (`Id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'Dresses',3,'2017-01-29'),(4,'Basic',3,'2017-01-29'),(5,'Scarfs',3,'2017-01-29');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorycollection`
--

DROP TABLE IF EXISTS `categorycollection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorycollection` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `CollectionId` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `CategoryId` (`CategoryId`),
  KEY `CollectionId` (`CollectionId`),
  CONSTRAINT `FK_Category_Collection` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Collection_Category` FOREIGN KEY (`CollectionId`) REFERENCES `collection` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorycollection`
--

LOCK TABLES `categorycollection` WRITE;
/*!40000 ALTER TABLE `categorycollection` DISABLE KEYS */;
INSERT INTO `categorycollection` VALUES (4,2,14,'2017-02-11'),(6,2,1,'2017-06-19');
/*!40000 ALTER TABLE `categorycollection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collection` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `DisplayName` text NOT NULL,
  `ShopId` int(11) NOT NULL,
  `Year` text NOT NULL,
  `SeasonId` int(11) NOT NULL,
  `Indefinite` tinyint(1) NOT NULL,
  `Date` date NOT NULL,
  `Description` longtext NOT NULL,
  `Image` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ShopId` (`ShopId`),
  CONSTRAINT `FK_Collection_Shop` FOREIGN KEY (`ShopId`) REFERENCES `shop` (`Id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection`
--

LOCK TABLES `collection` WRITE;
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
INSERT INTO `collection` VALUES (1,'Feast of Blossom','Feast of Blossom',3,'2017',1,0,'2017-01-29','<p>The Feast of Blossom Collection is inspired by the beauty of flowers that begin to bloom in the Spring time and reach its peak of beauty in the Summer. Brought to you in the selection of colors that are included in the Pantone 2017 Top 10 Colors list.</p>','resources/uploads/CollectionImage_1.png'),(2,'Basic','Basic',3,'',5,1,'2017-01-29','',''),(3,'Scarfs','Scarfs',3,'',5,1,'0000-00-00','',''),(14,'Test Collection','Test Collection',3,'2017',2,0,'2017-02-11','<p>sdfasdfsdf</p>','resources/uploads/CollectionImage_14.png');
/*!40000 ALTER TABLE `collection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Comment` longtext NOT NULL,
  `UserId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `BlogId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `BlogId` (`BlogId`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `FK_Blog_Comment` FOREIGN KEY (`BlogId`) REFERENCES `blog` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_User_Comment` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Description` longtext NOT NULL,
  `Price` int(11) NOT NULL,
  `Sku` text NOT NULL,
  `CollectionId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `AvailableInventory` int(11) NOT NULL,
  `CoverPhotoId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `CollectionId` (`CollectionId`),
  KEY `CategoryId` (`CategoryId`),
  KEY `CoverPhotoId` (`CoverPhotoId`),
  CONSTRAINT `FK_Collection_Item` FOREIGN KEY (`CollectionId`) REFERENCES `collection` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemitemtype`
--

DROP TABLE IF EXISTS `itemitemtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemitemtype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(11) DEFAULT NULL,
  `ItemTypeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemitemtype`
--

LOCK TABLES `itemitemtype` WRITE;
/*!40000 ALTER TABLE `itemitemtype` DISABLE KEYS */;
INSERT INTO `itemitemtype` VALUES (1,11,1);
/*!40000 ALTER TABLE `itemitemtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemitemtypequantity`
--

DROP TABLE IF EXISTS `itemitemtypequantity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemitemtypequantity` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(11) DEFAULT NULL,
  `ItemTypeID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `AvailableQuantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemitemtypequantity`
--

LOCK TABLES `itemitemtypequantity` WRITE;
/*!40000 ALTER TABLE `itemitemtypequantity` DISABLE KEYS */;
INSERT INTO `itemitemtypequantity` VALUES (1,11,1,5,5);
/*!40000 ALTER TABLE `itemitemtypequantity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemtype`
--

DROP TABLE IF EXISTS `itemtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemtype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(100) DEFAULT NULL,
  `ItemTypeGroup` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemtype`
--

LOCK TABLES `itemtype` WRITE;
/*!40000 ALTER TABLE `itemtype` DISABLE KEYS */;
INSERT INTO `itemtype` VALUES (1,'Small','Size');
/*!40000 ALTER TABLE `itemtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemvariation`
--

DROP TABLE IF EXISTS `itemvariation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemvariation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemId` int(11) DEFAULT NULL,
  `Size` varchar(45) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `ItemVariation_Item_idx` (`ItemId`),
  CONSTRAINT `ItemVariation_Item` FOREIGN KEY (`ItemId`) REFERENCES `item` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemvariation`
--

LOCK TABLES `itemvariation` WRITE;
/*!40000 ALTER TABLE `itemvariation` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemvariation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Content` longtext NOT NULL,
  `PageCategoryId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `DisplayName` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `PageCategoryId` (`PageCategoryId`),
  CONSTRAINT `FK_PageCategory_Page` FOREIGN KEY (`PageCategoryId`) REFERENCES `pagecategory` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'buyingguide','<h1>How to best choose clothes that fit your style!</h1>\r\n<script type=\"text/javascript\">// <![CDATA[\r\n$(document).ready(function()\r\n	{\r\n		selectDropDown(\"customerservice\");\r\n	});\r\n// ]]></script>',1,'2017-02-05','Buying Guide'),(2,'howtomeasure','<h1 id=\"mcetoc_1b86tgb8e0\">Measuring Guide</h1>\r\n<p><img style=\"width: 100%;\" src=\"../../resources/images/measuringguide.png\" /></p>\r\n<script type=\"text/javascript\">// <![CDATA[\r\n	$(document).ready(function()\r\n	{\r\n		selectDropDown(\"customerservice\");\r\n	});\r\n// ]]></script>',1,'2017-02-05','How to Measure'),(4,'returnspolicy','<h1>Please visit for updated return/exchange policy</h1>\r\n<script type=\"text/javascript\">// <![CDATA[\r\n	$(document).ready(function()\r\n	{\r\n		selectDropDown(\"customerservice\");\r\n	});\r\n// ]]></script>',1,'2017-02-05','Returns & Exchange Policy'),(5,'washingcare','<h1>Taking the best care of your Malikah Clothing</h1>\r\n<script type=\"text/javascript\">// <![CDATA[\r\n	$(document).ready(function()\r\n	{\r\n		selectDropDown(\"customerservice\");\r\n	});\r\n// ]]></script>',1,'2017-02-05','Washing Care');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagecategory`
--

DROP TABLE IF EXISTS `pagecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagecategory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  `DisplayName` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagecategory`
--

LOCK TABLES `pagecategory` WRITE;
/*!40000 ALTER TABLE `pagecategory` DISABLE KEYS */;
INSERT INTO `pagecategory` VALUES (1,'CustomerCare','2017-02-05','Customer Care');
/*!40000 ALTER TABLE `pagecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemId` int(11) NOT NULL,
  `Data` text NOT NULL,
  `Date` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ItemId` (`ItemId`),
  CONSTRAINT `FK_Item_Picture` FOREIGN KEY (`ItemId`) REFERENCES `item` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Review` longtext NOT NULL,
  `Date` date NOT NULL,
  `Rating` int(11) NOT NULL,
  `Helpful` int(11) NOT NULL,
  `Unhelpful` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ItemId` (`ItemId`),
  KEY `UserId` (`UserId`),
  KEY `ItemId_2` (`ItemId`),
  KEY `UserId_2` (`UserId`),
  CONSTRAINT `FK_Item_Review` FOREIGN KEY (`ItemId`) REFERENCES `item` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_User_Review` FOREIGN KEY (`UserId`) REFERENCES `user` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (1,'Spring'),(2,'Summer'),(3,'Autumn'),(4,'Winter'),(5,'All');
/*!40000 ALTER TABLE `season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (3,'Malikah','2017-01-29');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Address` text NOT NULL,
  `ExtraInfo` text NOT NULL,
  `Administrator` tinyint(1) NOT NULL,
  `Date` date NOT NULL,
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'rakhmanb','bima@malikahatelier.com','$2y$10$jZpEeHZto.c5nPSs/F7jruTT3MaSl0IEXsHVi/YGJK65/jeASHWhq','','',1,'2017-02-01','Bima','Rakhman'),(7,'ayu.rahmany','ayu@malikahatelier.com','$2y$10$as/RtR2iSHTxrVxN5z0kWuYftMOwu4CTgm3rBbQTNGer9WeHcXv8.','','',1,'2017-02-01','Ayu','Rahmany'),(8,'test4','d@d.com','$2y$10$BckBEU7zzuLmsxjCJrYxN.phiOOLfcC5BULEJgfWrp0sN96E94Cqq',' ',' ',0,'2018-04-15','d','d'),(9,'test','test@test.com','$2y$10$f2ew1BYABWntY/KmH4m8au.uXUNElv2yxCyz7TS6Co/BNc0D80gQC',' ',' ',0,'2018-04-15','test','test');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-08 19:18:19
