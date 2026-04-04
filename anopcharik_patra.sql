-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: anopcharik_patra
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'पिता/माता को पत्र','father-mother','Letters to Father and Mother','2026-03-17 08:20:55'),(2,'मित्र को पत्र','friends','Letters to Friends','2026-03-17 08:20:55'),(3,'भाई/बहन को पत्र','siblings','Letters to Brothers and Sisters','2026-03-17 08:20:55'),(4,'बधाई/शोक पत्र','congratulatory','Congratulatory and Condolence Letters','2026-03-17 08:20:55');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `category` varchar(100) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_slug` (`slug`),
  KEY `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo_pages`
--

DROP TABLE IF EXISTS `seo_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seo_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_filename` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_filename` (`page_filename`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo_pages`
--

LOCK TABLES `seo_pages` WRITE;
/*!40000 ALTER TABLE `seo_pages` DISABLE KEYS */;
INSERT INTO `seo_pages` VALUES (1,'anopcharik-patra.php','Anopcharik Patra - Complete Meaning and Format','Learn everything about an anopcharik patra. Understand its exact meaning, definition, and how to write a highly effective anopcharik patra for your Hindi exams.','anopcharik patra'),(2,'anopcharik-patra-format.php','Anopcharik Patra Format - Left-Aligned Block Layout','Master the strict anopcharik patra format required for board exams. Learn the 7 pillars of the left-aligned structural layout to secure full marks in Hindi.','anopcharik patra format'),(3,'anopcharik-patra-in-hindi.php','Anopcharik Patra in Hindi - Writing Guide','Access the best examples of an anopcharik patra in hindi. Learn emotional tone, correct grammar, and formatting for top marks in your Hindi exam.','anopcharik patra in hindi'),(4,'what-is-the-format-of-anopcharik-patra-in-hindi.php','what is the format of anopcharik patra in hindi - Solved','If you are wondering what is the format of anopcharik patra in hindi, read this guide. It breaks down all 7 structural rules for CBSE and State boards.','what is the format of anopcharik patra in hindi'),(5,'anopcharik-patra-lekhan.php','anopcharik patra lekhan - Core Techniques','Master the art of anopcharik patra lekhan. Discover the best compositional techniques and vocabulary to write highly emotional personal letters.','anopcharik patra lekhan'),(6,'anopcharik-patra-example.php','anopcharik patra example - Solved Models','Find a comprehensive anopcharik patra example here. Review perfectly structured letters to friends and family for exam preparation.','anopcharik patra example'),(7,'aupcharik-aur-anopcharik-patra.php','aupcharik aur anopcharik patra - Key Differences','Understand the difference between an aupcharik aur anopcharik patra. Learn exactly when to use formal versus informal tones in Hindi grammar.','aupcharik aur anopcharik patra'),(8,'anopcharik-patra-class-10th.php','anopcharik patra class 10th - Board Guide','Write a perfect anopcharik patra class 10th level. Get the exact vocabulary, strict format rules, and structural guides recommended by board examiners.','anopcharik patra class 10th'),(9,'anopcharik-patra-class-9.php','anopcharik patra class 9 - Study Material','Prepare for your exams by mastering the anopcharik patra class 9 topics. Everything you need to score maximum marks in Hindi letter writing.','anopcharik patra class 9'),(10,'anopcharik-patra-ka-prarup.php','anopcharik patra ka prarup - Visual Layout','Memorize the anopcharik patra ka prarup. This visual footprint shows exactly where every component of the informal letter must be placed.','anopcharik patra ka prarup'),(11,'short-anopcharik-patra.php','short anopcharik patra - Quick Examples','Learn how to write a short anopcharik patra efficiently. Perfect examples for time-constrained board exams.','short anopcharik patra'),(12,'5-anopcharik-patra-in-hindi.php','5 anopcharik patra in hindi - Top Examples','Get exactly 5 anopcharik patra in hindi for practice. Highly curated for maximum exam scoring.','5 anopcharik patra in hindi'),(13,'3-anopcharik-patra-in-hindi.php','3 anopcharik patra in hindi - Essential Models','Read the essential 3 anopcharik patra in hindi to prepare for your composition assignments.','3 anopcharik patra in hindi'),(14,'2-anopcharik-patra-in-hindi.php','2 anopcharik patra in hindi - Core Examples','Review these 2 anopcharik patra in hindi to understand the structural differences rapidly.','2 anopcharik patra in hindi'),(15,'anopcharik-patra-to-friend.php','anopcharik patra to friend - Emotional Formats','Drafting an anopcharik patra to friend requires special emotional vocabulary. Learn the exact words here.','anopcharik patra to friend'),(16,'apne-mummy-ko-anopcharik-patra.php','apne mummy ko anopcharik patra - Respectful Tone','Learn how to write apne mummy ko anopcharik patra using highly respectful Hindi vocabulary.','apne mummy ko anopcharik patra'),(17,'anopcharik-patra-topics-in-hindi.php','anopcharik patra topics in hindi - Full List','Browse the largest library of anopcharik patra topics in hindi to practice for your next test.','anopcharik patra topics in hindi'),(18,'anopcharik-patra-bank-manager-ko.php','anopcharik patra bank manager ko kaise likhen - Guide','Confused if this is possible? Read anopcharik patra bank manager ko kaise likhen to learn the rules.','anopcharik patra bank manager ko kaise likhen'),(19,'anopcharik-patra-bus-conductor.php','anopcharik patra topics in hindi for bus conductor','Dealing with official scenarios locally? Check out anopcharik patra topics in hindi for bus conductor.','anopcharik patra topics in hindi for bus conductor'),(20,'kachra-prabandhan-par-anopcharik-patra.php','kachra pravandhan par anopcharik patra - civic issues','Write a powerful kachra pravandhan par anopcharik patra with our step by step Hindi guide.','kachra pravandhan par anopcharik patra'),(21,'anopcharik-patra-madhur-smrutiya.php','anopcharik patra madhur smrutiya - Beautiful Memories','Share sweet memories with an anopcharik patra madhur smrutiya. Emotional vocabulary guide included.','anopcharik patra madhur smrutiya'),(22,'class-5-hindi-anopcharik-patra-topic.php','class 5 hindi anopcharik patra topic - Junior Guide','Ideal practice material focusing strictly on class 5 hindi anopcharik patra topic structures.','class 5 hindi anopcharik patra topic'),(23,'anopcharik-patra-wikipedia.php','anopcharik patra wikipedia - Core Information','The ultimate anopcharik patra wikipedia resource containing historical context and grammatical roots.','anopcharik patra wikipedia'),(24,'do-anopcharik-patra.php','do anopcharik patra - Twin Examples','View exactly do anopcharik patra side-by-side to understand shifting relationship tones.','do anopcharik patra'),(25,'hindi-me-anopcharik-patra.php','hindi me anopcharik patra - Detailed Resource','Everything you need to write a perfect hindi me anopcharik patra, fully explained.','hindi me anopcharik patra'),(26,'anopcharik-patra-hindi.php','anopcharik patra hindi - Core Grammar','Master the foundation of anopcharik patra hindi vocabulary with our detailed examples.','anopcharik patra hindi'),(27,'anopcharik-patra-questions.php','anopcharik patra questions - Practice List','A massive bank of anopcharik patra questions to test your board exam writing skills.','anopcharik patra questions'),(28,'anopcharik-patra-format-class-9.php','anopcharik patra format class 9 - Detailed Structure','Learn the exacting anopcharik patra format class 9 standard required by CBSE teachers.','anopcharik patra format class 9'),(29,'anopcharik-patra-in-sanskrit.php','anopcharik patra in sanskrit - Translation Guide','Learn how to accurately write an anopcharik patra in sanskrit using proper greeting vocabulary.','anopcharik patra in sanskrit'),(30,'anopcharik-patra-in-marathi.php','anopcharik patra in marathi - Maharashtra Format','A complete guide to drafting an anopcharik patra in marathi for local state board exams.','anopcharik patra in marathi'),(31,'best-anopcharik-patra-in-hindi.php','best anopcharik patra in hindi - Premium Model','Read the absolute best anopcharik patra in hindi ever scored by CBSE toppers.','best anopcharik patra in hindi'),(32,'10-anopcharik-patra-in-hindi-for-class-9.php','10 anopcharik patra in hindi for class 9 - Collection','Access exactly 10 anopcharik patra in hindi for class 9 preparation and study.','10 anopcharik patra in hindi for class 9'),(33,'anopcharik-patra-lekhan-kise-kahate-hain.php','anopcharik patra lekhan kise kahate hain - Definition','Exactly anopcharik patra lekhan kise kahate hain? We define the academic rule perfectly.','anopcharik patra lekhan kise kahate hain'),(34,'anopcharik-patra-class-12.php','anopcharik patra class 12 - Senior Format','Highly advanced guide for anopcharik patra class 12 board examinations and vocabulary.','anopcharik patra class 12'),(35,'index.php','Anopcharik Patra Topics - Master Informal Letter Writing','The ultimate destination for informal letter writing. Get 34+ master guides, 1000+ word examples, and board-compliant formats for CBSE, ICSE, and State Boards.','anopcharik patra topics, informal letter hindi, patra lekhan, hindi grammar letter'),(51,'all-pages.php','Directory of All Anopcharik Patra Topics - A to Z Archive','The master archive of our 34 deep-research guides. Browse every possible variation of the Hindi informal letter on one page.','all patra topics, hindi letter directory, informal letter archive');
/*!40000 ALTER TABLE `seo_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_letters`
--

DROP TABLE IF EXISTS `user_letters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_identifier` varchar(255) DEFAULT NULL,
  `relation` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `generated_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_letters`
--

LOCK TABLES `user_letters` WRITE;
/*!40000 ALTER TABLE `user_letters` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_letters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-04 14:35:11
