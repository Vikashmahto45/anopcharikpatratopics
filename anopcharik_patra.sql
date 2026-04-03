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
INSERT INTO `seo_pages` VALUES (1,'anopcharik-patra.php','Anopcharik Patra: Meaning, Definition & Deep Analysis','What is Anopcharik Patra? Explore the comprehensive definition, historical context, and cultural importance of informal letters in the Hindi language.','what is anopcharik patra, anopcharik patra kise kahate hain, definition of informal letter hindi'),(2,'anopcharik-patra-format.php','Anopcharik Patra Format - New CBSE/State Board Block Layout','Master the modern left-aligned (Block Layout) for informal letters. Learn the 7 pillars of formatting to secure full marks in board examinations.','anopcharik patra format, informal letter layout hindi, block format letter hindi'),(3,'anopcharik-patra-in-hindi.php','Anopcharik Patra in Hindi - Best Examples & Writing Guide','Comprehensive collection of informal letters in Hindi. Includes high-scoring vocabulary, emotional tones, and detailed structural blueprints for students.','anopcharik patra in hindi, hindi informal letter examples, best patra lekhan hindi'),(4,'what-is-the-format-of-anopcharik-patra-in-hindi.php','What is the Format of Anopcharik Patra in Hindi? (Solved)','A detailed breakdown of the internal anatomy of a Hindi informal letter. From Poojniya to Bhavdiye, learn exactly where to place every word.','format of anopcharik patra in hindi, hindi letter structure, anopcharik patra format guide'),(5,'anopcharik-patra-lekhan.php','Anopcharik Patra Lekhan - Advanced Composition Techniques','Master the art of informal letter composition. Learn how to modulate your tone for parents, friends, and siblings to achieve linguistic perfection.','anopcharik patra lekhan, how to write informal letter hindi, hindi composition letters'),(6,'anopcharik-patra-example.php','Anopcharik Patra Example - Solved Models for All Classes','Looking for an informal letter model? Explore our library of solved examples covering hostel life, invitations, and academic success.','anopcharik patra example, informal letter sample hindi, patra lekhan udaharan'),(7,'aupcharik-aur-anopcharik-patra.php','Aupcharik aur Anopcharik Patra - Major Differences Explained','Formal vs Informal Letter: A side-by-side comparison. Learn the 5 key differences in subject lines, greetings, and subscriptions in Hindi grammar.','aupcharik aur anopcharik patra, difference between formal and informal letter hindi'),(8,'anopcharik-patra-class-10th.php','Anopcharik Patra Class 10th - CBSE/ICSE Board Revision','The definitive guide for Class 10 students. Master 100-word informal letters with advanced vocabulary to secure 5/5 in your Hindi board paper.','anopcharik patra class 10th, class 10 hindi letter writing, board exam patra lekhan'),(9,'anopcharik-patra-class-9.php','Anopcharik Patra Class 9 - Comprehensive Writing Practice','Class 9 Hindi grammar guide for informal letters. Learn the foundational rules, formatting marks, and emotional vocabulary required for perfection.','anopcharik patra class 9, class 9 hindi grammar letters, informal letter class 9 hindi'),(10,'anopcharik-patra-ka-prarup.php','Anopcharik Patra Ka Prarup - Solved Examples & Format','Master anopcharik patra ka prarup with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra ka prarup, anopcharik, patra, ka, prarup, patra lekhan'),(11,'short-anopcharik-patra.php','Short Anopcharik Patra - Concise 60-Word Examples','Learn how to write effective, short informal letters. Perfect for quick exam prompts and time-constrained writing sections in Hindi.','short anopcharik patra, chota anopcharik patra, quick informal letter hindi'),(12,'5-anopcharik-patra-in-hindi.php','5 Anopcharik Patra In Hindi - Solved Examples & Format','Master 5 anopcharik patra in hindi with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','5 anopcharik patra in hindi, 5, anopcharik, patra, in, hindi, patra lekhan'),(13,'3-anopcharik-patra-in-hindi.php','3 Anopcharik Patra In Hindi - Solved Examples & Format','Master 3 anopcharik patra in hindi with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','3 anopcharik patra in hindi, 3, anopcharik, patra, in, hindi, patra lekhan'),(14,'2-anopcharik-patra-in-hindi.php','2 Anopcharik Patra In Hindi - Solved Examples & Format','Master 2 anopcharik patra in hindi with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','2 anopcharik patra in hindi, 2, anopcharik, patra, in, hindi, patra lekhan'),(15,'anopcharik-patra-to-friend.php','Anopcharik Patra to Friend - Emotional & Relatable Models','How to write a letter to a friend in Hindi. Explore examples of birthday invitations, congratulation letters, and advice sharing between friends.','anopcharik patra to friend, mitr ko patra hindi, informal letter to friend hindi'),(16,'apne-mummy-ko-anopcharik-patra.php','Apne Mummy Ko Anopcharik Patra - Respectful Maternal Letters','Master the tone of supreme reverence when writing to your mother. Solved examples of the hostel experience and exam performance updates.','apne mummy ko anopcharik patra, mataji ko patra, mother letter hindi'),(17,'anopcharik-patra-topics-in-hindi.php','Anopcharik Patra Topics in Hindi - Categorized List 2026','Need a topic for your letter? Browse our curated list categorized by relationship: Parents, Friends, Siblings, and Relatives.','anopcharik patra topics in hindi, letter writing themes hindi'),(18,'anopcharik-patra-bank-manager-ko.php','Anopcharik Patra Bank Manager Ko - Solved Examples & Format','Master anopcharik patra bank manager ko with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra bank manager ko, anopcharik, patra, bank, manager, ko, patra lekhan'),(19,'anopcharik-patra-bus-conductor.php','Anopcharik Patra Bus Conductor - Solved Examples & Format','Master anopcharik patra bus conductor with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra bus conductor, anopcharik, patra, bus, conductor, patra lekhan'),(20,'kachra-prabandhan-par-anopcharik-patra.php','Kachra Prabandhan Par Anopcharik Patra - Solved Examples & Format','Master kachra prabandhan par anopcharik patra with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','kachra prabandhan par anopcharik patra, kachra, prabandhan, par, anopcharik, patra, patra lekhan'),(21,'anopcharik-patra-madhur-smrutiya.php','Anopcharik Patra Madhur Smrutiya - Solved Examples & Format','Master anopcharik patra madhur smrutiya with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra madhur smrutiya, anopcharik, patra, madhur, smrutiya, patra lekhan'),(22,'class-5-hindi-anopcharik-patra-topic.php','Class 5 Hindi Anopcharik Patra Topic - Solved Examples & Format','Master class 5 hindi anopcharik patra topic with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','class 5 hindi anopcharik patra topic, class, 5, hindi, anopcharik, patra, topic, patra lekhan'),(23,'anopcharik-patra-wikipedia.php','Anopcharik Patra Wikipedia - Solved Examples & Format','Master anopcharik patra wikipedia with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra wikipedia, anopcharik, patra, wikipedia, patra lekhan'),(24,'do-anopcharik-patra.php','Do Anopcharik Patra - Solved Examples & Format','Master do anopcharik patra with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','do anopcharik patra, do, anopcharik, patra, patra lekhan'),(25,'hindi-me-anopcharik-patra.php','Hindi Me Anopcharik Patra - Solved Examples & Format','Master hindi me anopcharik patra with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','hindi me anopcharik patra, hindi, me, anopcharik, patra, patra lekhan'),(26,'anopcharik-patra-hindi.php','Anopcharik Patra Hindi - Solved Examples & Format','Master anopcharik patra hindi with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra hindi, anopcharik, patra, hindi, patra lekhan'),(27,'anopcharik-patra-questions.php','Anopcharik Patra Questions - Practice Prompts for All Classes','A massive question bank of informal letter prompts. From inviting relatives to sharing news of success, practice your writing skills today.','anopcharik patra questions, patra lekhan prompts, informal letter exercises hindi'),(28,'anopcharik-patra-format-class-9.php','Anopcharik Patra Format Class 9 - Solved Examples & Format','Master anopcharik patra format class 9 with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','anopcharik patra format class 9, anopcharik, patra, format, class, 9, patra lekhan'),(29,'anopcharik-patra-in-sanskrit.php','Anopcharik Patra in Sanskrit - Format & Solved Examples','First of its kind guide for Sanskrit informal letters. Learn the translations of greetings and subscriptions from Hindi to elite Sanskrit syntax.','anopcharik patra in sanskrit, sanskrit informal letter format, sanskrit patra'),(30,'anopcharik-patra-in-marathi.php','Anopcharik Patra in Marathi - Maharashtra Board Standards','Complete guide for Marathi informal letter writing. Map Hindi concepts to Marathi vocabulary like Tirtharoop and Sashtang Namaskar.','anopcharik patra in marathi, marathi patra lekhan, maharashtra board letters'),(31,'best-anopcharik-patra-in-hindi.php','Best Anopcharik Patra In Hindi - Solved Examples & Format','Master best anopcharik patra in hindi with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','best anopcharik patra in hindi, best, anopcharik, patra, in, hindi, patra lekhan'),(32,'10-anopcharik-patra-in-hindi-for-class-9.php','10 Anopcharik Patra In Hindi For Class 9 - Solved Examples & Format','Master 10 anopcharik patra in hindi for class 9 with our 1,000+ word execution guide. Includes board-compliant format, high-scoring vocabulary, and solved models.','10 anopcharik patra in hindi for class 9, 10, anopcharik, patra, in, hindi, for, class, 9, patra lekhan'),(33,'anopcharik-patra-lekhan-kise-kahate-hain.php','Anopcharik Patra Lekhan Kise Kahate Hain? - Hindi Definition','Deep dive into the grammatical and cultural definition of informal letters. Learn why this specific category is called Anopcharik in Hindi literature.','anopcharik patra lekhan kise kahate hain, definition of informal letter in hindi'),(34,'anopcharik-patra-class-12.php','Anopcharik Patra Class 12 - Senior Secondary Mastery','Elite writing guide for Class 12 students. Learn philosophical and complex vocabulary structures required for senior-level Hindi papers.','anopcharik patra class 12, class 12 hindi letters, senior secondary patra lekhan'),(35,'index.php','Anopcharik Patra Topics - Master Informal Letter Writing','The ultimate destination for informal letter writing. Get 34+ master guides, 1000+ word examples, and board-compliant formats for CBSE, ICSE, and State Boards.','anopcharik patra topics, informal letter hindi, patra lekhan, hindi grammar letter'),(51,'all-pages.php','Directory of All Anopcharik Patra Topics - A to Z Archive','The master archive of our 34 deep-research guides. Browse every possible variation of the Hindi informal letter on one page.','all patra topics, hindi letter directory, informal letter archive');
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

-- Dump completed on 2026-04-03 17:55:14
