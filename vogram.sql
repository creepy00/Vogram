# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.21)
# Database: vogram
# Generation Time: 2013-03-10 16:21:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL,
  `parent_type` varchar(200) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL DEFAULT '',
  `src` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL DEFAULT '',
  `text` text,
  `video_link` varchar(100) DEFAULT NULL,
  `links` text,
  `sinopsis` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `type`, `text`, `video_link`, `links`, `sinopsis`, `name`)
VALUES
	(1,'Akcija','Vogram, volonterska organizacija mladih koji zauzimaju aktivan stav prema lokalnoj zajednici želeći da je unaprede, donirao je Spensu, ali i svim Novosađanima, novi mural koji osim estetske vrednosti ima i socijalni značaj jer problematizuje odnos prema ženama.\n\nU središte je postavljena žena kojoj su pridodate božanske i mitske karakteristike. Tako mistifikovana, iako veoma moćna, nema ostvarena bazična prava jednakosti koja simbolizuje Međunarodni dan žena. Njena moć ogleda se najčešće u lepoti i sposobnosti da pomoću lepote manipuliše, što je u suprotnosti sa idejom istorijske borbe žena za ekonomsku, političku i socijalnu ravnopravnost i slobodu. Mural, koji će ubuduće krasiti bazene na Spensu, podseća da još uvek postoji mitologizacija žena, kao i ostaci patrija-rhata koji ponovo jačaju, naročito u ruralnim sredinama, te da žene i danas jesu u margi-nalizovanom položaju, a njihova uloga je svedena na biološku. Cilj ove angažovane akcije koja, pored darivanja, podrazumeva i konkretnu, neposrednu intervenciju u zajedničkom javnom prostoru, jeste povezivanje kulture i umetnosti sa sportom i zdravim načinom života, kao i svojevrsna podrška ženama kroz trajno ukazivanje na potrebu za daljim jačanjem i emancipacijom jednog društva kako bi postalo zrelo i savremeno.\n','http://www.youtube.com/watch?v=djU2OpQUNBA',NULL,'Vogram u saradnji sa Sportsko poslovnim centrom Vojvodina (Spens), 8. marta na zatvorenim bazenima organizuje akciju „Svaki dan – dan žena“.','Svaki dan - dan zena'),
	(2,'Akcija','Vogramska druga akcija\n',NULL,NULL,'Ovo je druga akcija','Druga akcija');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
