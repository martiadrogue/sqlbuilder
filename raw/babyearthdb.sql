-- MySQL dump 10.13  Distrib 5.6.28, for Linux (x86_64)
--
-- Host: localhost    Database: babyearthdb
-- ------------------------------------------------------
-- Server version	5.6.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `babyearthdb`;

USE babyearthdb

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` binary(16) NOT NULL,
  `image` varchar(512) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES ('Lo��,N���.m�xD�','http://s2.babyearth.com/images/Under_the_nile.jpg','Under the Nile Organics','under-the-nile-organics'),('08����A��aȡ%','http://s2.babyearth.com/images/brand_inglesina_2.jpg','Inglesina','inglesina'),('D���W�J⹕��x,','http://s2.babyearth.com/images/nunalogo_black140x60.jpg','Nuna','nuna'),('�w�l�ID$��I�(�,�','http://s2.babyearth.com/images/britax.jpg','Britax','britax'),('�� rA7J�Z��r���','http://s2.babyearth.com/images/Bob.jpg','BOB Gear Strollers','bob-gear-strollers'),('�?�y^@��N0�!h��','http://s2.babyearth.com/images/chicco.jpg','Chicco','chicco'),('ɺ����KR��{�f˩�','http://s2.babyearth.com/images/BabySoy.jpg','BabySoy','babysoy'),('�f�%�^CQ��hя�y ','http://s2.babyearth.com/images/little-tikes-home.jpg','Little Tikes','little-tikes');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` binary(16) NOT NULL,
  `image` varchar(512) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `parent` binary(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('\0�~��B��GZX�^��','http://s2.babyearth.com/interface/cat_icons/monitors.jpg','Baby Monitors','baby-monitors','\0�~��B��GZX�^��'),('̺W�H���k���C','http://s2.babyearth.com/interface/cat_icons/Eco-Apparel.jpg','Organic baby clothes','organic-baby-clothes','̺W�H���k���C'),('���^N��&��L��','http://s2.babyearth.com/interface/cat_icons/Storage.jpg','Storage &amp; Organization Furniture','storage-amp-organization-furniture','�Vܞ��M����kv�'),(':h���L���h\"�M�','http://s2.babyearth.com/interface/cat_icons/Diapering.jpg','Cloth Diapers','cloth-diapers',':h���L���h\"�M�'),(' xYI\"aO��-��N3�','http://s2.babyearth.com/interface/cat_icons/Eco-Bath.jpg','Bath Products','bath-products','� R#�K�PV�1'),('\'P�d=sGغ����b�#','http://s2.babyearth.com/interface/cat_icons/Eco-Teethers-Rattles.jpg','Teethers &amp; Rattles','teethers-amp-rattles','� R#�K�PV�1'),('-ٺ�e�A���N����','http://s2.babyearth.com/interface/cat_icons/wooden_bassinets.jpg','Wooden Bassinets &amp; Cradles','wooden-bassinets-amp-cradles','�Vܞ��M����kv�'),('. $g\ZNH���7�>M','http://s2.babyearth.com/interface/cat_icons/seealldiaperbags.jpg','All Diaper Bags &amp; Accessories','all-diaper-bags-amp-accessories','�9��I��ƹV�@�C'),('0��YzxMЎp����','http://s2.babyearth.com/interface/cat_icons/Eco-Health.jpg','Health &amp; Hygiene','health-amp-hygiene','� R#�K�PV�1'),('=�r�qHʗ�ʅ��]�','http://s2.babyearth.com/interface/cat_icons/toddler_beds.jpg','Toddler Beds','toddler-beds','�Vܞ��M����kv�'),('=�Gx�\\O��:5s��|�','http://s2.babyearth.com/interface/cat_icons/inglesina_net_stroller_black_140.jpg','Lightweight Strollers','lightweight-strollers','{�|P;L���f����'),('Aѥ1ҲDj�͐���','http://s2.babyearth.com/interface/cat_icons/fullbeds.jpg','Full Size Beds','full-size-beds','�Vܞ��M����kv�'),('GK�ljK׆���;��m','http://s2.babyearth.com/interface/cat_icons/conversion_rails.jpg','Conversion Rails','conversion-rails','�Vܞ��M����kv�'),('H�@�?�L��ޖ�\r�y','http://s2.babyearth.com/interface/cat_icons/Eco-Toys.jpg','Toys','toys','� R#�K�PV�1'),('K��V��Ak�7�\0����','http://s2.babyearth.com/interface/cat_icons/Eco-Baby-Sleep.jpg','Sleep','sleep','� R#�K�PV�1'),('P�KH_ZC���aD��','http://s2.babyearth.com/interface/cat_icons/car_seat_accessories.jpg','Car Seat Accessories','car-seat-accessories','���ɦJ��uv�f'),('P�^�xJJ΄ʖ:w�-T','http://s2.babyearth.com/interface/cat_icons/changing_table.jpg','Changing Tables &amp; Hutches','changing-tables-amp-hutches','�Vܞ��M����kv�'),('QzVl�IA��xc��Y','http://s2.babyearth.com/interface/cat_icons/twinbeds.jpg','Twin Size Beds','twin-size-beds','�Vܞ��M����kv�'),('SY��F�5���$�N','http://s2.babyearth.com/interface/cat_icons/car_seat_toddler.jpg','Toddler Car Seats','toddler-car-seats','���ɦJ��uv�f'),('k���x,@��g�+����','http://s2.babyearth.com/interface/cat_icons/adult_chairs.jpg','Adult Chairs &amp; Rockers','adult-chairs-amp-rockers','�Vܞ��M����kv�'),('r�?,y@g���q�*^�','http://s2.babyearth.com/interface/cat_icons/dresser.jpg','Dressers &amp; Nightstands','dressers-amp-nightstands','�Vܞ��M����kv�'),('wx�o�N���~�k{','http://s2.babyearth.com/interface/cat_icons/Eco-Diapering.jpg','Diapering','diapering','� R#�K�PV�1'),('{�|P;L���f����','http://s2.babyearth.com/interface/cat_icons/inglesina_net_stroller_black_140.jpg','Strollers','strollers','{�|P;L���f����'),('}��\"��J?��u4���`','http://s2.babyearth.com/interface/cat_icons/car_seat_booster.jpg','Booster Car Seats','booster-car-seats','���ɦJ��uv�f'),('}�����NU�|�a����','http://s2.babyearth.com/interface/cat_icons/car_seat_infant.jpg','Infant Car Seats','infant-car-seats','���ɦJ��uv�f'),('�[y�MH��!h��k','http://s2.babyearth.com/interface/cat_icons/totes.jpg','Tote Diaper Bags','tote-diaper-bags','�9��I��ƹV�@�C'),('���ɦJ��uv�f','http://s2.babyearth.com/interface/cat_icons/car_seat.jpg','Car Seats','car-seats','���ɦJ��uv�f'),('����=8MO�v�In��','http://s2.babyearth.com/interface/cat_icons/car_seat_covers.jpg','Car Seat Covers','car-seat-covers','���ɦJ��uv�f'),('�:u��F���!c��s�','http://s2.babyearth.com/interface/cat_icons/Eco-Skin Care.jpg','Skin Care','skin-care','� R#�K�PV�1'),('����C��W§&�ڱ','http://s2.babyearth.com/interface/cat_icons/stroller_acc.jpg','Stroller Accessories','stroller-accessories','{�|P;L���f����'),('�}+o}QLB��@�+~�R','http://s2.babyearth.com/interface/cat_icons/crib-bedding-category.jpg','Crib Bedding','crib-bedding','�}+o}QLB��@�+~�R'),('��zT>L��ې��&_','http://s2.babyearth.com/interface/cat_icons/gift_cards.jpg','Gift Certificates','gift-certificates','��zT>L��ې��&_'),('�~��~�L��I_p��^%','http://s2.babyearth.com/interface/cat_icons/Eco-Maternity.jpg','Moms &amp; Maternity','moms-amp-maternity','� R#�K�PV�1'),('��~�G�����A��','http://s2.babyearth.com/interface/cat_icons/Eco-Home.jpg','Home','home','� R#�K�PV�1'),('���}\nSJ�]�\"��,','http://s2.babyearth.com/interface/cat_icons/table_chair_sets.jpg','Children\'s Table &amp; Chair Sets','children-s-table-amp-chair-sets','�Vܞ��M����kv�'),('�WM]\"uIv�2�P�8�','http://s2.babyearth.com/interface/cat_icons/Eco-Apparel.jpg','Baby Clothes &amp; Accessories','baby-clothes-amp-accessories','� R#�K�PV�1'),('�����\ZHn��&1��','http://s2.babyearth.com/interface/cat_icons/childrens_chairs.jpg','Children\'s Chairs &amp; Rockers','children-s-chairs-amp-rockers','�Vܞ��M����kv�'),('�����B��h����-','http://s2.babyearth.com/interface/cat_icons/stroller_single.jpg','Single Strollers','single-strollers','{�|P;L���f����'),('�D��G�IW�wy���]#','http://s2.babyearth.com/interface/cat_icons/toy_chests.jpg','Toy Chests &amp; Boxes','toy-chests-amp-boxes','�Vܞ��M����kv�'),('�~��՟F����2��Q','http://s2.babyearth.com/interface/cat_icons/car_seat_convertible.jpg','Convertible Car Seats','convertible-car-seats','���ɦJ��uv�f'),('� R#�K�PV�1','http://s2.babyearth.com/interface/cat_icons/Organic.jpg','Eco-Friendly','eco-friendly','� R#�K�PV�1'),('�)qJ$�(�t��k','http://s2.babyearth.com/interface/cat_icons/dadbags.jpg','Diaper Bags for Dad','diaper-bags-for-dad','�9��I��ƹV�@�C'),('�9��I��ƹV�@�C','http://s2.babyearth.com/interface/cat_icons/diaper_bags.jpg','Diaper Bags','diaper-bags','�9��I��ƹV�@�C'),('��x9��HK�oQ,��$','http://s2.babyearth.com/interface/cat_icons/messengerstotes.jpg','Slings &amp; Messenger Diaper Bags','slings-amp-messenger-diaper-bags','�9��I��ƹV�@�C'),('ϋ,��gI��,w�����','http://s2.babyearth.com/interface/cat_icons/backpacks.jpg','Backpack Diaper Bags','backpack-diaper-bags','�9��I��ƹV�@�C'),('я̳|�N�GZ�n�2','http://s2.babyearth.com/interface/cat_icons/Eco-Bedding.jpg','Nursery Bedding &amp; Accessories','nursery-bedding-amp-accessories','� R#�K�PV�1'),('ғ���Z@���`�Zl3','http://s2.babyearth.com/interface/cat_icons/Eco-Gifts.jpg','Gifts','gifts','� R#�K�PV�1'),('���^/�A���]64ϓ�','http://s2.babyearth.com/interface/cat_icons/mattresses.jpg','Mattresses &amp; Mattress Pads','mattresses-amp-mattress-pads','�Vܞ��M����kv�'),('�Vܞ��M����kv�','http://s2.babyearth.com/interface/cat_icons/furniture.jpg','Furniture','furniture','�Vܞ��M����kv�'),('�23��M9�S��\Z��','http://s2.babyearth.com/interface/cat_icons/crib.jpg','Cribs &amp; Mini Cribs','cribs-amp-mini-cribs','�Vܞ��M����kv�'),('�\rvS��N��:\nls�;�','http://s2.babyearth.com/interface/cat_icons/Eco-Feeding.jpg','Feeding','feeding','� R#�K�PV�1'),('��ƫIb@o���<Ϣt,','http://s2.babyearth.com/interface/cat_icons/Eco-Furniture.jpg','Nursery Furniture','nursery-furniture','� R#�K�PV�1'),('ﷹ�s�D��g�k���','http://s2.babyearth.com/interface/cat_icons/diaperaccessories.jpg','Changing Pads &amp; Accessories','changing-pads-amp-accessories','�9��I��ƹV�@�C'),('�c2�\'�H)����z���','http://s2.babyearth.com/interface/cat_icons/stroller_travelsystems.jpg','Travel Systems','travel-systems','{�|P;L���f����'),('���K�@��+��5���','http://s2.babyearth.com/interface/cat_icons/stroller_jogging.jpg','Jogging Strollers','jogging-strollers','{�|P;L���f����'),('�0ňB��U�ИT','http://s2.babyearth.com/interface/cat_icons/Eco-Gear.jpg','Gear','gear','� R#�K�PV�1'),('��i�dcB�(�|ia�j','http://s2.babyearth.com/interface/cat_icons/stroller_double.jpg','Double Strollers','double-strollers','{�|P;L���f����');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-07  9:13:59
