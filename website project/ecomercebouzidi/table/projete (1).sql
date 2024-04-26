-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 22 juin 2023 à 12:57
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projete`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'oussama', 'oussama@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int NOT NULL,
  `user_phone` int NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(4, '60.00', 'not paid', 1, 648237042, 'fghfd gfgfhd', 'nfhnhnfhfnhf', '2023-06-11 13:14:08'),
(5, '600.00', 'not paid', 1, 2147483647, 'temara', 'jk j  dja kk dhj ajkl', '2023-06-11 13:19:42'),
(6, '100.00', 'not paid', 1, 2147483647, 'temara', 'jk j  dja kk dhj ajkl', '2023-06-11 14:53:42'),
(7, '750.00', 'not paid', 1, 2147483647, 'temara', 'jk j  dja kk dhj ajkl', '2023-06-18 00:31:28'),
(8, '360.00', 'not paid', 1, 0, 'mbn,bmn', 'mnmnbmn', '2023-06-22 12:55:36');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `products_id` int NOT NULL,
  `products_name` varchar(100) NOT NULL,
  `products_image` varchar(255) NOT NULL,
  `products_price` decimal(6,2) NOT NULL,
  `products_quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `products_id`, `products_name`, `products_image`, `products_price`, `products_quantity`, `user_id`, `order_date`) VALUES
(1, 4, 21, 'tishert one pice', 'imag/tishert one pice1.png', '20.00', 3, 1, '2023-06-11 13:14:08'),
(2, 5, 53, 'cosplay eren', 'imag/cosplay eren1.png', '150.00', 4, 1, '2023-06-11 13:19:42'),
(3, 6, 10, 'tishert bleach', 'imag/tishert bleach1.png', '50.00', 2, 1, '2023-06-11 14:53:42'),
(4, 7, 47, 'cosplay naruto', 'imag/cosplay naruto1.png', '150.00', 5, 1, '2023-06-18 00:31:28'),
(5, 8, 32, 'shose nike pistage', 'imag/shose nike1.png', '90.00', 4, 1, '2023-06-22 12:55:36');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int NOT NULL AUTO_INCREMENT,
  `products_name` varchar(100) NOT NULL,
  `products_category` varchar(100) NOT NULL,
  `products_description` varchar(255) NOT NULL,
  `products_tags` varchar(255) NOT NULL,
  `products_image` varchar(255) NOT NULL,
  `products_image2` varchar(255) NOT NULL,
  `products_image3` varchar(255) NOT NULL,
  `products_image4` varchar(255) NOT NULL,
  `products_price` decimal(6,2) NOT NULL,
  `products_special_offer` int NOT NULL,
  `products_color` varchar(100) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_category`, `products_description`, `products_tags`, `products_image`, `products_image2`, `products_image3`, `products_image4`, `products_price`, `products_special_offer`, `products_color`) VALUES
(8, 'kapitco naruto black', 'hoodie', 'dv vdv d bfg fg hgj g jf  hg gf', '', 'imag/kapitco naruto black1.png', 'imag/kapitco naruto black2.png', 'imag/kapitco naruto black3.png', 'imag/kapitco naruto black4.png', '50.00', 39, 'black'),
(9, 'Parfum Nike', 'parfum', '/ksdkl hsj dhj hdfkjg sdjfhgdssldfg hdgsk sdgfhkg sdgf', '', 'imag/Parfum Nike1.png', 'imag/Parfum Nike2.png', 'imag/Parfum Nike3.png', 'imag/Parfum Nike4.png', '30.00', 40, 'bleu'),
(10, 'tishert bleach', 'tishirt', 'skj alk ljh fkjs jsldh fkjhdslfkhs fhjs', '', 'imag/tishert bleach1.png', 'imag/tishert bleach2.png', 'imag/tishert bleach3.png', 'imag/tishert bleach4.png', '50.00', 60, 'black'),
(11, 'watch relix', 'watches', 'akhd h jkgsdkh fakf jk kjagfksd afdk lshfks', '', 'imag/watch relix1.png', 'imag/watch relix2.png', 'imag/watch relix3.png', 'imag/watch relix4.png', '1000.00', 10, 'gold'),
(13, 'Parfum adidas', 'parfum', 'jjg h  gjhfgd d hd fg', '', 'imag/Parfum adidas1.png', 'imag/Parfum adidas2.png', 'imag/Parfum adidas3.png', 'imag/Parfum adidas4.png', '25.00', 65, 'black'),
(14, 'kapitcho bleach', 'hoodie', 'h hj ghfhgh t cfgdgf g', '', 'imag/kapitcho bleach1.png', 'imag/kapitcho bleach2.png', 'imag/kapitcho bleach3.png', 'imag/kapitcho bleach4.png', '150.00', 40, 'black'),
(16, 'shose nike black', 'shoes', 'o odfdk sdjfjsd khgds h sdhgdhjg hjgf jhdsg', '', 'imag/shose nike black1.png', 'imag/shose nike black2.png', 'imag/shose nike black3.png', 'imag/shose nike black4.png', '100.00', 30, 'black'),
(17, 'watches appele', 'watches', 'c,sksdg kg ksg kls jsh ish ufka;fjlskf js ', '', 'imag/watches appele1.png', 'imag/watches appele2.png', 'imag/watches appele3.png', 'imag/watches appele4.png', '200.00', 30, 'black'),
(18, 'Parfum black', 'parfum', 'pak dj hdjk hjsdk fkjsgf ksdgfhjdsgfjdsg sdfjsdgf', '', 'imag/Parfum black1.png', 'imag/Parfum black2.png', 'imag/Parfum black3.png', 'imag/Parfum black4.png', '50.00', 60, 'black'),
(19, 'shose adidas', 'shoes', 'jksf dshhj jgsdhns ks hsj hs', '', 'imag/shose adidas1.png', 'imag/shose adidas2.png', 'imag/shose adidas3.png', 'imag/shose adidas4.png', '100.00', 50, 'black'),
(20, 'kapitcho one pice', 'hoodie', 'jhksdf gkgdsgjfsdgsgdhfg', '', 'imag/kapitcho one pice1.png', 'imag/kapitcho one pice2.png', 'imag/kapitcho one pice3.png', 'imag/kapitcho one pice4.png', '50.00', 40, 'black'),
(21, 'tishert one pice', 'tishirt', 'oivudyug ugus ssghdhskjh fsdfgis uishduifaoffhl hklshdfihds hldhfg', '', 'imag/tishert one pice1.png', 'imag/tishert one pice2.png', 'imag/tishert one pice3.png', 'imag/tishert one pice4.png', '20.00', 30, 'black'),
(22, 'kapitcho ', 'hoodie_pants', 'akhd h jkgsdkh fakf jk kjagfksd afdk lshfks', '', 'imag/kapitcho 1.png', 'imag/kapitcho 2.png', 'imag/kapitcho 3.png', 'imag/kapitcho 4.png', '100.00', 30, 'rose'),
(23, 'watch adidas', 'watches', 'o odfdk sdjfjsd khgds h sdhgdhjg hjgf jhdsg', '', 'imag/watch adidas1.png', 'imag/watch adidas2.png', 'imag/watch adidas3.png', 'imag/watch adidas4.png', '100.00', 30, 'black'),
(24, 'kapitcho zaraki', 'hoodie', 'oivudyug ugus ssghdhskjh fsdfgis uishduifaoffhl hklshdfihds hldhfg', '', 'imag/kapitcho zaraki1.png', 'imag/kapitcho zaraki2.png', 'imag/kapitcho zaraki3.png', 'imag/kapitcho zaraki4.png', '50.00', 30, 'white'),
(26, 'tishert naruto', 'tishirt', 'o odfdk sdjfjsd khgds h sdhgdhjg hjgf jhdsg', '', 'imag/tishert naruto1.png', 'imag/tishert naruto2.png', 'imag/tishert naruto3.png', 'imag/tishert naruto4.png', '30.00', 50, 'black'),
(27, 'shose nike jordan', 'shoes', 'oivudyug ugus ssghdhskjh fsdfgis uishduifaoffhl hklshdfihds hldhfg', '', 'imag/shose nike jordan1.png', 'imag/shose nike jordan2.png', 'imag/shose nike jordan3.png', 'imag/shose nike jordan4.png', '100.00', 15, 'black'),
(28, 'tishert akatski', 'tishirt', 'mdj ksdh gsjhjkg hsdf', '', 'imag/tishert akatski1.png', 'imag/tishert akatski2.png', 'imag/tishert akatski3.png', 'imag/tishert akatski4.png', '25.00', 20, 'black'),
(29, 'Parfum nike rose', 'parfum', 'csddg fgf df', '', 'imag/Parfum nike rose1.png', 'imag/Parfum nike rose2.png', 'imag/Parfum nike rose3.png', 'imag/Parfum nike rose4.png', '20.00', 23, 'rose'),
(30, 'watches appele red', 'watches', 'kl ks khdfjg hk gkd', '', 'imag/watches appele red1.png', 'imag/watches appele red2.png', 'imag/watches appele red3.png', 'imag/watches appele red4.png', '60.00', 21, 'red'),
(31, 'kapitcho naruto white', 'hoodie', 'k jhjsdhj jks  shghjsgfhjs', '', 'imag/kapitcho naruto white1.png', 'imag/kapitcho naruto white2.png', 'imag/kapitcho naruto white3.png', 'imag/kapitcho naruto white4.png', '50.00', 29, 'white'),
(32, 'shose nike pistage', 'shoes', 'njzkv jcv nkjxck jvbkcbx', '', 'imag/shose nike1.png', 'imag/shose nike2.png', 'imag/shose nike3.png', 'imag/shose nike4.png', '90.00', 30, 'pistage'),
(33, 'kapitcho jujitso no kaisine', 'hoodie_pants', 'df  fh fg fhfhfhf f', '', 'imag/kapitcho jujitso no kaisine1.png', 'imag/kapitcho jujitso no kaisine2.png', 'imag/kapitcho jujitso no kaisine3.png', 'imag/kapitcho jujitso no kaisine4.png', '60.00', 32, 'black'),
(34, 'kapitcho black naruto', 'hoodie_pants', 'dsv ksjsdjhjhsd fgjd', '', 'imag/kapitcho black naruto1.png', 'imag/kapitcho black naruto2.png', 'imag/kapitcho black naruto3.png', 'imag/kapitcho black naruto4.png', '100.00', 30, 'black'),
(35, 'kapitcho itachi rose', 'hoodie_pants', 'sd d jhjfhgjdkls h jsh;sjdlhglhds l ', '', 'imag/kapitcho itachi rose1.png', 'imag/kapitcho itachi rose2.png', 'imag/kapitcho itachi rose3.png', 'imag/kapitcho itachi rose4.png', '90.00', 18, 'rose'),
(36, 'watch gold rolex', 'watches', 'ksd kj h kj hfdkjhdkj', '', 'imag/watch gold rolex1.png', 'imag/watch gold rolex2.png', 'imag/watch gold rolex3.png', 'imag/watch gold rolex4.png', '1000.00', 30, 'gold'),
(37, 'kapitcho itchego', 'hoodie', 'xjkkjhkj kj vkhghjg vkhgvhjxgkgdfsgvk', '', 'imag/kapitcho itchego1.png', 'imag/kapitcho itchego2.png', 'imag/kapitcho itchego3.png', 'imag/kapitcho itchego4.png', '50.00', 30, 'black'),
(38, 'kapitcho naruto', 'hoodie_pants', 'opfk hhf klfhmnlfklfklmlfm ', '', 'imag/kapitcho naruto1.png', 'imag/kapitcho naruto2.png', 'imag/kapitcho naruto3.png', 'imag/kapitcho naruto4.png', '90.00', 30, 'black white'),
(39, 'kapitcho naruto oronge', 'hoodie_pants', 'sdlk lksj lksdj hldsh jhs iouirowhs  hshslahphiaoh ', '', 'imag/kapitcho naruto oronge1.png', 'imag/kapitcho naruto oronge2.png', 'imag/kapitcho naruto oronge3.png', 'imag/kapitcho naruto oronge4.png', '100.00', 20, 'oronge'),
(40, 'Parfum adidas bleu', 'parfum', 'lsa; jklsj ghkj hjksh kpoa pospijfdfdskl', '', 'imag/Parfum adidas bleu1.png', 'imag/Parfum adidas bleu2.png', 'imag/Parfum adidas bleu3.png', 'imag/Parfum adidas bleu4.png', '30.00', 40, 'bleu'),
(41, 'tishert naruto black', 'tishirt', 'skjdk llskhk j sousio o gyudyk;ljslkskldf', '', 'imag/tishert naruto black1.png', 'imag/tishert naruto black2.png', 'imag/tishert naruto black3.png', 'imag/tishert naruto black4.png', '25.00', 30, 'black'),
(42, 'tishert bleach black', 'tishirt', 'jf hjkg sjkhgoiauioapo iouaopifjdklg khkjghs uhgihgkjdsg kj', '', 'imag/tishert bleach black1.png', 'imag/tishert bleach black2.png', 'imag/tishert bleach black3.png', 'imag/tishert bleach black4.png', '30.00', 30, 'black'),
(43, 'shose adidas black', 'shoes', 'as h jkhsk jkjsh khsg jsglhsgglhsuhg', '', 'imag/shose adidas black1.png', 'imag/shose adidas black2.png', 'imag/shose adidas black3.png', 'imag/shose adidas black4.png', '100.00', 20, 'black'),
(44, 'cosplay akatsoki', 'cosplay', 'asdfks uibsiu iusu ishiughs g ish iusdiug', '', 'imag/cosplay akatsoki1.png', 'imag/cosplay akatsoki2.png', 'imag/cosplay akatsoki3.png', 'imag/cosplay akatsoki4.png', '140.00', 30, 'black'),
(45, 'cosplay luffy', 'cosplay', 'iohiuiu iusd iuhsdh;HAL HASLKHF ', '', 'imag/cosplay luffy1.png', 'imag/cosplay luffy2.png', 'imag/cosplay luffy3.png', 'imag/cosplay luffy4.png', '160.00', 20, 'red'),
(46, 'cosplay ichgo', 'cosplay', 'dfsdh sj sjkgkj', '', 'imag/cosplay ichgo1.png', 'imag/cosplay ichgo2.png', 'imag/cosplay ichgo3.png', 'imag/cosplay ichgo4.png', '160.00', 20, 'black'),
(47, 'cosplay naruto', 'cosplay', 'ojsdj flhkjhskg;aiuaioias f', '', 'imag/cosplay naruto1.png', 'imag/cosplay naruto2.png', 'imag/cosplay naruto3.png', 'imag/cosplay naruto4.png', '150.00', 23, 'oronge'),
(48, 'cosplay goku', 'cosplay', 'kjg ghgshjgilsoiuyeuir uieyilsifgshjsd', '', 'imag/cosplay goku1.png', 'imag/cosplay goku2.png', 'imag/cosplay goku3.png', 'imag/cosplay goku4.png', '160.00', 21, 'oronge'),
(49, 'cosplay ringoku', 'cosplay', 'askj gsj gfjsgfkuaklakga hjgjhkgf', '', 'imag/cosplay ringoku1.png', 'imag/cosplay ringoku2.png', 'imag/cosplay ringoku3.png', 'imag/cosplay ringoku4.png', '140.00', 30, 'red'),
(50, 'tishert barchalona', 'football_tishirts', 'jkhjghf ghfghf hgfhgfytfy', '', 'imag/tishert barchalona1.png', 'imag/tishert barchalona2.png', 'imag/tishert barchalona3.png', 'imag/tishert barchalona4.png', '50.00', 40, 'bleu and red'),
(51, 'cosplay shinbo', 'cosplay', 'utyutyutuyitiut tuitu tuit ir7 r 7 ytffg', '', 'imag/cosplay shinbo1.png', 'imag/cosplay shinbo2.png', 'imag/cosplay shinbo3.png', 'imag/cosplay shinbo4.png', '170.00', 20, 'rose'),
(52, 'cosplay ichgo black', 'cosplay', 'jkghj fhgfhjd  fjhf f dfgd h', '', 'imag/cosplay ichgo black1.png', 'imag/cosplay ichgo black2.png', 'imag/cosplay ichgo black3.png', 'imag/cosplay ichgo black4.png', '150.00', 30, 'black'),
(53, 'cosplay eren', 'cosplay', 'yrtyrvtyr ytrterd ftyfytfttrdrttdrtdst', '', 'imag/cosplay eren1.png', 'imag/cosplay eren2.png', 'imag/cosplay eren3.png', 'imag/cosplay eren4.png', '150.00', 30, 'black white'),
(54, 'mayami tishirt ', 'tishirt', 'sdvds dfhdf hf hfgh fd', '', 'imag/mayami tishirt 1.png', 'imag/mayami tishirt 2.png', 'imag/mayami tishirt 3.png', 'imag/mayami tishirt 4.png', '40.00', 40, 'bleu'),
(55, 'pants naruto black', 'pants', 'fs ugiuh kjsh jkgsdjkbgjs', '', 'imag/pants naruto black1.png', 'imag/pants naruto black2.png', 'imag/pants naruto black3.png', 'imag/pants naruto black4.png', '50.00', 30, 'black'),
(56, 'pants naruto', 'pants', 'nnvnfjgj jghjhgjk jgh ', '', 'imag/pants naruto1.png', 'imag/pants naruto2.png', 'imag/pants naruto3.png', 'imag/pants naruto4.png', '54.00', 23, 'white'),
(57, 'tichirts man city', 'football_tishirts', 'df df hgf gfjfgh ', '', 'imag/tichirts man city1.png', 'imag/tichirts man city2.png', 'imag/tichirts man city3.png', 'imag/tichirts man city4.png', '60.00', 20, 'bleu'),
(58, 'tishirts Real Madrid', 'football_tishirts', 'ioi iugfhi hd shgkfshfgisug hjs', '', 'imag/tishirts Real Madrid1.png', 'imag/tishirts Real Madrid2.png', 'imag/tishirts Real Madrid3.png', 'imag/tishirts Real Madrid4.png', '60.00', 21, 'white'),
(59, 'tichirts Morocco', 'football_tishirts', 'gerrere r nnfgf gdfhd  df df', '', 'imag/tichirts Morocco1.png', 'imag/tichirts Morocco2.png', 'imag/tichirts Morocco3.png', 'imag/tichirts Morocco4.png', '50.00', 40, 'red'),
(60, 'tichirts napoli', 'football_tishirts', 'evrtyb trhfg f fj gh hfg', '', 'imag/tichirts napoli1.png', 'imag/tichirts napoli2.png', 'imag/tichirts napoli3.png', 'imag/tichirts napoli4.png', '50.00', 32, 'bleu'),
(61, 'tichirts arsonal', 'football_tishirts', 'ghjfg jfjf jfgjfg idfjklgjd dshg; oas pijaios jga pa', '', 'imag/tichirts arsonal1.png', 'imag/tichirts arsonal2.png', 'imag/tichirts arsonal3.png', 'imag/tichirts arsonal4.png', '55.00', 30, 'red'),
(62, 'pants ichigo', 'pants', 'snkjds kfgsdkhfgshgf jsg j', '', 'imag/pants ichigo1.png', 'imag/pants ichigo2.png', 'imag/pants ichigo3.png', 'imag/pants ichigo4.png', '55.00', 20, 'black'),
(63, 'pants Nike', 'pants', 'dsfhsdj kjhkgjsk ks kj ghjg hj', '', 'imag/pants Nike1.png', 'imag/pants Nike2.png', 'imag/pants Nike3.png', 'imag/pants Nike4.png', '52.20', 23, 'black'),
(65, 'pants one pice', 'pants', 'j hsdkhfskjg gsjhfghsgfjs', '', 'imag/pants one pice1.png', 'imag/pants one pice2.png', 'imag/pants one pice3.png', 'imag/pants one pice4.png', '50.50', 26, 'black');

-- --------------------------------------------------------

--
-- Structure de la table `review_table`
--

DROP TABLE IF EXISTS `review_table`;
CREATE TABLE IF NOT EXISTS `review_table` (
  `review_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `review_table`
--

INSERT INTO `review_table` (`review_id`, `product_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(0, 26, 'oussama bouzidi', 5, 'is good very good', 1686253048),
(0, 0, 'gyjghf', 5, 'fghfgjhnfdhn', 1686439471),
(0, 0, 'ymiiuy', 5, 'myumkiyu', 1686439487),
(0, 0, 'uyikuy', 5, 'kyukykoi', 1686439560),
(0, 10, 'vrtyr', 4, 'rburtun', 1686440548),
(0, 10, 'oussama bouzidi', 5, 'fdhfgdfghfdhdg', 1686440569),
(0, 48, 'wreterw', 5, 'grteyegry', 1686442323),
(0, 57, 'sdfs', 5, 'fsdfsdf', 1686442399),
(0, 57, 'hgfjmkjgh', 4, 'mgfhjmgkmgh', 1686442527),
(0, 26, 'bouzidi oussama', 4, 'dngnhdnhdh', 1686478249),
(0, 26, 'tge', 5, 'gtegteryg', 1686478497),
(0, 21, 'oussama', 5, 'kfldj klj lkfg', 1686741809),
(0, 38, 'kjks', 4, 'fsfkns', 1686753270),
(0, 28, 'oussama', 4, 'ma 3jabnich', 1687019058),
(0, 42, 'oussama', 3, 'hiiskg n sdjg sndfk', 1687345366),
(0, 42, 'ouss', 4, 'lks.dn ,n jsdhkhk hal', 1687345408),
(0, 28, 'oussama mhmmde', 3, 'jkjg hgjhfg ', 1687360995);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `usser_image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_Constraint` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `usser_image`) VALUES
(1, 'oussama', 'oussamabouzidi58@gmail.com', '8038ba277ad5c9c86e19cdc6d31eea28', 'imag/oussama1.png'),
(2, 'oussam', 'oussa@gamil.com', 'fcea920f7412b5da7be0cf42b8c93759', 'imag/kapitcho 3.png'),
(3, 'oussama', 'oussama@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'imag/oussama1.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
