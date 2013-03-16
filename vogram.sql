-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 16, 2013 at 05:13 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `vogram`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `gallery`
-- 

CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `parent_id` int(11) unsigned NOT NULL,
  `parent_type` varchar(200) NOT NULL default '',
  `name` varchar(200) NOT NULL default '',
  `src` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `gallery`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `projects`
-- 

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `type` varchar(100) NOT NULL default '',
  `text` text,
  `video_link` varchar(100) default NULL,
  `links` text,
  `sinopsis` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `projects`
-- 

INSERT INTO `projects` (`id`, `type`, `text`, `video_link`, `links`, `sinopsis`, `name`) VALUES 
(1, 'Akcija', 'Vogram, volonterska organizacija mladih koji zauzimaju aktivan stav prema lokalnoj zajednici želeći da je unaprede, donirao je Spensu, ali i svim Novosađanima, novi mural koji osim estetske vrednosti ima i socijalni značaj jer problematizuje odnos prema ženama.\n\nU središte je postavljena žena kojoj su pridodate božanske i mitske karakteristike. Tako mistifikovana, iako veoma moćna, nema ostvarena bazična prava jednakosti koja simbolizuje Međunarodni dan žena. Njena moć ogleda se najčešće u lepoti i sposobnosti da pomoću lepote manipuliše, što je u suprotnosti sa idejom istorijske borbe žena za ekonomsku, političku i socijalnu ravnopravnost i slobodu. Mural, koji će ubuduće krasiti bazene na Spensu, podseća da još uvek postoji mitologizacija žena, kao i ostaci patrija-rhata koji ponovo jačaju, naročito u ruralnim sredinama, te da žene i danas jesu u margi-nalizovanom položaju, a njihova uloga je svedena na biološku. Cilj ove angažovane akcije koja, pored darivanja, podrazumeva i konkretnu, neposrednu intervenciju u zajedničkom javnom prostoru, jeste povezivanje kulture i umetnosti sa sportom i zdravim načinom života, kao i svojevrsna podrška ženama kroz trajno ukazivanje na potrebu za daljim jačanjem i emancipacijom jednog društva kako bi postalo zrelo i savremeno.\n', 'http://www.youtube.com/watch?v=djU2OpQUNBA', NULL, 'Vogram u saradnji sa Sportsko poslovnim centrom Vojvodina (Spens), 8. marta na zatvorenim bazenima organizuje akciju „Svaki dan – dan žena“.', 'Svaki dan - dan zena'),
(2, 'Akcija', 'Vogramska druga akcija\n', NULL, NULL, 'Ovo je druga akcija', 'Druga akcija');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) character set utf8 collate utf8_bin NOT NULL,
  `isadmin` tinyint(4) default '0',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`user_id`, `username`, `password`, `isadmin`) VALUES 
(1, 'vadmin', 0x766f6772616d2c3133, 2);
