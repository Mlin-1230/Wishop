-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2024 at 03:33 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_id` int(12) NOT NULL,
  `Agent_id` int(12) NOT NULL,
  `Buyer_id` int(12) NOT NULL,
  `Product_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Score` float NOT NULL,
  `Comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_id`, `Agent_id`, `Buyer_id`, `Product_Name`, `Score`, `Comment`, `Date`) VALUES
(40, 5, 6, '星光咖啡館與死神之蝶設定集', 4, '四季夏目超棒，栞娜好完美，青梅又能養我', '2024-05-29'),
(41, 5, 6, '魔女的夜宴', 5, '好快，0d00是神，Ciallo~，滿滿的伏筆，0d00超好看，還要重新開始遊戲輪迴', '2024-05-29'),
(42, 5, 9, '常軌脫離creative 遊戲片', 3, '柚子廚太噁心，扣分，到處都是柚子廚', '2024-05-29'),
(43, 5, 9, '9-nine 全套', 4, '這一分是扣給分開購買才能玩全套的', '2024-05-29'),
(44, 5, 9, 'RIDDLE JOKER 原畫集', 5, '質疑柚子廚，理解柚子廚，成為柚子廚', '2024-05-29'),
(45, 5, 9, '近月少女的禮儀遊戲', 5, '論露娜為什麼連三年第一名', '2024-05-29'),
(46, 5, 11, '命運石之門遊戲片', 5, '石頭門太神啦，不愧是聞名已久的作品', '2024-05-29'),
(47, 8, 6, 'Mygo專輯', 5, '春日影啟動!，Mygo的偉大毋需多言', '2024-05-29'),
(48, 8, 6, 'TOGENASHI TOGEARI專輯', 5, '新時代要來力(喜 ，空之箱超好聽', '2024-05-29'),
(49, 10, 6, 'Girls Band Cry 專輯', 2, '貨出的那麼慢，你就繼續玩你的原神好了', '2024-05-29'),
(50, 5, 9, 'ATRI', 5, 'ATRI好可愛，期待動畫!', '2024-05-29'),
(51, 5, 9, '魔女的夜宴', 4, '學姊線普通，但是小紬的接吻CG堪稱教科書集別', '2024-05-29'),
(52, 5, 9, 'eden', 5, '出貨好快，論minori社為什麼是神，還有新海誠導的片頭，超神', '2024-05-29'),
(53, 8, 11, 'Onkyo X Girls Band Cry 合作耳機', 4, '好貴，但是音質好，因為價錢扣1分', '2024-05-29'),
(54, 5, 11, '常軌脫離creative 遊戲片', 4, 'OMGDS，養我，拜託，我想躺平', '2024-05-29'),
(55, 8, 11, '安和昴衣服', 5, '噓つき！！噓つき！！噓つき！！噓つき！！', '2024-05-29'),
(56, 5, 9, '白色相簿2遊戲', 5, '你為什麼那麼熟練呀，明明是我先來的', '2024-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `place_order`
--

CREATE TABLE `place_order` (
  `Place_Order_id` int(12) NOT NULL,
  `Product_id` int(12) NOT NULL,
  `Buyer_id` int(12) NOT NULL,
  `Number` int(4) NOT NULL,
  `Price` int(8) NOT NULL,
  `Date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Pay` bigint(12) NOT NULL,
  `Finished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place_order`
--

INSERT INTO `place_order` (`Place_Order_id`, `Product_id`, `Buyer_id`, `Number`, `Price`, `Date`, `Address`, `Pay`, `Finished`) VALUES
(36, 44, 6, 1, 1200, '2024-05-29', '新莊高中', 419419122691, 3),
(37, 41, 6, 1, 900, '2024-05-29', '新莊高中', 896060842299, 0),
(38, 29, 6, 1, 1000, '2024-05-29', '新莊高中', 251316667776, 3),
(39, 34, 6, 1, 400, '2024-05-29', '輔仁大學', 133990147088, 3),
(40, 20, 6, 1, 900, '2024-05-29', '新莊高中', 230831571334, 3),
(41, 19, 6, 1, 1000, '2024-05-29', '輔仁大學', 50784739908, 4),
(42, 45, 9, 1, 6500, '2024-05-29', '泰山國中', 418312410169, 4),
(43, 36, 9, 1, 800, '2024-05-29', '泰山國中', 511111590710, 0),
(44, 33, 9, 1, 500, '2024-05-29', '泰山國中', 538117954677, 3),
(45, 34, 9, 1, 400, '2024-05-29', '泰山國中', 171427411901, 3),
(46, 17, 9, 1, 900, '2024-05-29', '泰山國中', 99119649136, 3),
(47, 25, 9, 1, 1500, '2024-05-29', '泰山國中', 181001273668, 3),
(48, 24, 9, 1, 400, '2024-05-29', '泰山國中', 448963361292, 3),
(49, 30, 9, 1, 500, '2024-05-29', '泰山國中', 654580401004, 3),
(50, 26, 11, 1, 700, '2024-05-29', '新莊高中', 989245924851, 3),
(51, 33, 11, 1, 500, '2024-05-29', '新莊高中', 168598018274, 3),
(52, 42, 11, 1, 900, '2024-05-29', '新莊高中', 814486373199, 3),
(53, 43, 11, 1, 6000, '2024-05-29', '新莊高中', 495799719765, 3),
(54, 35, 11, 1, 800, '2024-05-29', '新莊高中', 152777069724, 2),
(55, 32, 11, 1, 400, '2024-05-29', '新莊高中', 350222526940, 2),
(56, 44, 5, 1, 1200, '2024-05-29', '新莊高中', 76677308155, 0),
(57, 36, 5, 1, 800, '2024-05-29', '泰山國中', 214120183875, 0),
(58, 18, 9, 1, 1200, '2024-05-29', '輔仁大學', 112951878661, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(12) NOT NULL,
  `Agent_id` int(12) NOT NULL,
  `Product_Name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Product_Price` int(8) NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UDate` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Agent_id`, `Product_Name`, `Product_Price`, `Description`, `Date`, `UDate`, `Image`, `Deleted`) VALUES
(16, 5, '天使騷騷原畫集', 1000, '日本正版原畫集，柚子廚集結', '2024-06-14', '2024-05-14', '../../assets/img/1715216198_product1.jpg', 0),
(17, 5, 'RIDDLE JOKER 原畫集', 900, '三司綾瀨其實有墊', '2024-06-14', '2024-05-14', '../../assets/img/1715216243_product2.jpg', 0),
(18, 5, '白色相簿2遊戲', 1200, '你為什麼那麼熟練阿', '2024-05-30', '2024-05-15', '../../assets/img/1715216273_product3.jpg', 0),
(19, 8, 'Mygo Bluray', 1000, '我從不覺得玩樂團開心過', '2024-07-16', '2024-05-10', '../../assets/img/1715216396_product4.jpg', 0),
(20, 8, 'Mygo專輯', 900, 'Mygo讚', '2024-06-20', '2024-05-04', '../../assets/img/1715216531_product5.jpg', 0),
(21, 10, '甘雨公仔', 8000, '王小美', '2024-07-18', '2024-05-01', '../../assets/img/1715216638_product6.jpg', 0),
(22, 10, '胡桃幽靈小夜燈', 2500, '小夜燈!', '2024-06-20', '2024-05-17', '../../assets/img/1715956453_119aed9a690242ac110004.jpg', 0),
(23, 5, 'CLANNAD Switch遊戲片', 1600, 'key設3部曲之中，感動無數人的經典作，請一定來體驗，何謂親情', '2024-05-24', '2024-05-19', '../../assets/img/1716091412_22248773253285_258.jpg', 0),
(24, 5, 'ATRI', 400, '在遇到ATRI的瞬間，主人公的生活改變了，快來體驗故事吧', '2024-05-30', '2024-05-19', '../../assets/img/1716091548_FdZQP0MVQAANY2v.jpg', 0),
(25, 5, '9-nine 全套', 1500, '隨著每一個篇章慢慢推進劇情，伏筆環環相扣，雖然貴但很值得，結局一定讓你大吃一驚', '2024-05-19', '2024-05-19', '../../assets/img/1716091745_ptag6zs_imgur.jpg', 0),
(26, 5, '命運石之門遊戲片', 700, '伏筆完美解開，無法用言語形容劇情之好，在沒劇透下，保證你能覺得物超所值。', '2024-05-26', '2024-05-19', '../../assets/img/1716091876_capsule_616x353_tchinese.jpg', 0),
(27, 5, '千戀萬花遊戲片', 400, '男主角有地將臣在穗織與美少女們邂逅與除魔的故事。', '2024-05-27', '2024-05-19', '../../assets/img/1716093559_senren.jpg', 0),
(28, 5, '蒼之彼方的四重奏遊戲片', 500, '勵志的感人故事', '2024-05-21', '2024-05-19', '../../assets/img/0000073865.jpg', 0),
(29, 5, '星光咖啡館與死神之蝶設定集', 1000, '通過設定及讓你更了解這個故事世界觀與設計背景', '2024-06-22', '2024-05-29', '../../assets/img/1716980867_22137175903112_806.jpg', 0),
(30, 5, '近月少女的禮儀遊戲', 500, '兄弟你好香', '2024-06-20', '2024-05-29', '../../assets/img/1716980965_Tsurioto.jpg', 0),
(31, 5, '少女理論以及周邊', 550, '兄弟你第二集了還是好香', '2024-06-29', '2024-05-29', '../../assets/img/1716981031_001.jpg', 0),
(32, 5, '星空列車與白的旅行遊戲片', 400, '放鬆的視覺小說，貓貓可愛', '2024-07-12', '2024-05-29', '../../assets/img/1716981098_Hoshizora_Tetsudou_to_Shiro_no_Tabi_game_cover.png', 0),
(33, 5, '常軌脫離creative 遊戲片', 500, '妹妹養我，拜託', '2024-06-10', '2024-05-29', '../../assets/img/1716981151_capsule_616x353.jpg', 0),
(34, 5, '魔女的夜宴', 400, 'Ciallo~', '2024-06-05', '2024-05-29', '../../assets/img/1716981226_capsule_616x353 (1).jpg', 0),
(35, 8, '千早愛音娃娃', 800, 'Mygo娃娃可愛', '2024-08-21', '2024-05-29', '../../assets/img/1716981300_638500127402997146.jpg', 0),
(36, 8, '長崎爽世娃娃', 800, '想在他面前唱春日影', '2024-08-11', '2024-05-29', '../../assets/img/1716981371_638500127719186714.jpg', 0),
(37, 8, '高松燈娃娃', 800, '她唱歌好拼命', '2024-08-11', '2024-05-29', '../../assets/img/1716981408_638500127014424715.jpg', 0),
(38, 8, '椎名立希娃娃', 800, '她可能會罵你，也可能愛上你的燈', '2024-08-11', '2024-05-29', '../../assets/img/1716981471_274254438ad21c3fccebecfe116269ac.jpg', 0),
(39, 8, '要樂奈娃娃', 800, '貓貓可愛，可以給她吃抹茶冰沙', '2024-08-11', '2024-05-29', '../../assets/img/1716981534_GSCBD0100017_1.jpg', 0),
(40, 8, ' 河原木桃香衣服', 900, '為什麼要演奏空之箱', '2024-08-15', '2024-05-29', '../../assets/img/1716981650_i010002_1715758452.jpg', 0),
(41, 8, 'NINA衣服', 900, '一起豎起小拇指吧', '2024-08-15', '2024-05-29', '../../assets/img/1716981688__cospa_girls_band_crytshirt__g_1715427147_c01fae3d_progressive.jpg', 0),
(42, 8, '安和昴衣服', 900, '她好完美', '2024-08-15', '2024-05-29', '../../assets/img/1716981747_000001_1715682633.jpg', 0),
(43, 8, 'Onkyo X Girls Band Cry 合作耳機', 6000, '連動藍芽耳機，讚讚', '2024-09-02', '2024-05-29', '../../assets/img/1716981804_njMzJd6.png', 0),
(44, 8, 'TOGENASHI TOGEARI專輯', 1200, '新時代的搖滾女團', '2024-07-05', '2024-05-29', '../../assets/img/1716981882_22412068176313_105.jpg', 0),
(45, 10, '星光戰士阿璃公仔', 6500, '超精緻公仔', '2024-06-28', '2024-05-29', '../../assets/img/1716981971_499c844d0c2db7ed72655aa0189b9ac7.jpg', 0),
(46, 10, '芙莉蓮X寶箱怪鑰匙圈', 300, '又被騙了', '2024-06-21', '2024-05-29', '../../assets/img/1716982046_22342935537533_764_Q50.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `take_order`
--

CREATE TABLE `take_order` (
  `Take_Order_id` int(12) NOT NULL,
  `Wish_id` int(12) NOT NULL,
  `Agent_id` int(12) NOT NULL,
  `Price` int(8) NOT NULL,
  `Date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Pay` bigint(12) NOT NULL,
  `Finished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `take_order`
--

INSERT INTO `take_order` (`Take_Order_id`, `Wish_id`, `Agent_id`, `Price`, `Date`, `Address`, `Pay`, `Finished`) VALUES
(26, 29, 5, 7000, '2024-05-29', '新莊高中', 196944145551, -1),
(27, 24, 5, 1000, '2024-05-29', '泰山國中', 102411173122, 4),
(28, 23, 5, 900, '2024-05-29', '輔仁大學', 279824622655, -1),
(29, 25, 5, 500, '2024-05-29', '泰山國中', 187874374956, 3),
(30, 29, 8, 5500, '2024-05-29', '新莊高中', 34966507505, -1),
(31, 23, 8, 800, '2024-05-29', '輔仁大學', 723310896749, -1),
(32, 24, 8, 1100, '2024-05-29', '泰山國中', 769901119746, 4),
(33, 25, 8, 400, '2024-05-29', '泰山國中', 751393552223, -1),
(34, 19, 8, 400, '2024-05-29', '輔仁大學', 983831194614, 4),
(35, 21, 8, 1000, '2024-05-29', '輔仁大學', 320122435092, -1),
(36, 17, 8, 1100, '2024-05-29', '泰山國中', 834061337733, 0),
(37, 29, 10, 4000, '2024-05-29', '新莊高中', 626253953284, -1),
(38, 19, 10, 350, '2024-05-29', '輔仁大學', 963151063216, -1),
(39, 27, 10, 500, '2024-05-29', '泰山國中', 72409636002, -1),
(40, 20, 10, 850, '2024-05-29', '輔仁大學', 65485457193, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(12) NOT NULL,
  `Account` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `User_Name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Account`, `Password`, `User_Name`, `Avatar`, `Email`, `Phone`) VALUES
(5, 'agent', '123456', '柚子廚', '../../assets/img/1716433031_avatar1.png', 'agent@gmail.com', '0912345678'),
(6, 'buyer', '123456', '拜託讓我看下集mygo', '../../assets/img/1715217155_0831c6e8a1cd74c3c0d0e6d45e26984d.jpg', 'buyer@gmail.com', '0987654321'),
(8, 'agent2', '123456', '為什麼要演奏春日影', '../../assets/img/1715216457_avatar4.png', 'agent2@gmail.com', '0987654321'),
(9, 'buyer2', '123456', '好愛熊哥哥', '../../assets/img/1715216865_avatar5.jpg', 'buyer2@gmail.com', '0987654321'),
(10, 'agent3', '123456', '原神啟動', '../../assets/img/1715217015_images.png', 'agent3@gmail.com', '0909090090'),
(11, 'buyer3', '123456', '可莉玩家', '../../assets/img/1715217497_demo avatar.png', 'buyer3@gmail.com', '0970114514');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `Wish_id` int(12) NOT NULL,
  `Buyer_id` int(12) NOT NULL,
  `Wish_Name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`Wish_id`, `Buyer_id`, `Wish_Name`, `Description`, `Date`, `Image`, `Address`, `Deleted`) VALUES
(14, 9, '熊哥哥抱枕', '好有感覺', '2024-05-11', '../../assets/img/NLNL.jpg', '輔仁大學', 0),
(15, 6, '高松燈聯名衣服', 'Mygo最新聯動衣服，幫我買吧，我願意穿一輩子', '2024-05-15', '../../assets/img/1715754191_XZ9JxFTl.jpg', '泰山國中', 0),
(16, 6, '千早愛音聯名衣服', '幫我買吧，我什麼都願意做的', '2024-05-15', '../../assets/img/1715754273_1S1qNaql.jpg', '泰山國中', 0),
(17, 6, '長崎素世聯名帽T', '我想穿這件衣服唱春日影', '2024-05-15', '../../assets/img/1715754358_KPAfwCBl.jpg', '泰山國中', 0),
(18, 11, '胡桃搖搖樂周邊', '他會一直搖，好可愛，求幫代購', '2024-05-17', '../../assets/img/1715957523_tw-11134207-7qukz-lhz726xsel7268.jpg', '輔仁大學', 0),
(19, 5, 'Dracu-Riot遊戲片', 'Steam沒有，我好想要', '2024-05-19', '../../assets/img/1716097048_fe815a2ab54621e49979593d448e5436.jpg', '輔仁大學', 0),
(20, 6, 'Girls Band Cry 專輯', '這部真的好看，而且歌又好聽', '2024-05-19', '../../assets/img/1716104220_S6GjMqr.jpg', '輔仁大學', 1),
(21, 6, 'Ave mujica專輯', '重組樂隊', '2024-05-22', '../../assets/img/1716354522_500x500.jpg', '輔仁大學', 0),
(22, 6, '芙莉蓮公仔', '她好帥我好愛', '2024-05-29', '../../assets/img/1716982368_638394627833330000.jpg', '輔仁大學', 0),
(23, 6, '有咲娃娃', '好想要阿媽媽的娃娃', '2024-05-29', '../../assets/img/1716982430_638500826887364472.jpg', '輔仁大學', 0),
(24, 6, '丸山彩娃娃', '丸山彩好可愛，想要他娃娃', '2024-05-29', '../../assets/img/1716982500_bangdream_1625483552_3ed4c809.jpg', '泰山國中', 0),
(25, 9, 'eden', '聽說這部很神很感動，拜託好心人幫我代購', '2024-05-29', '../../assets/img/1716982579_Eden_package.jpg', '泰山國中', 1),
(26, 9, 'NL歌手T', '好想要穿哥哥的衣服到外面炫耀喔', '2024-05-29', '../../assets/img/1716982710_170729344494_n.png', '泰山國中', 0),
(27, 9, 'NL班長T', '口袋上有個小哥哥，好可愛喔', '2024-05-29', '../../assets/img/1716982784_images.jpg', '泰山國中', 0),
(28, 11, '甘羽鑰匙圈', '甘羽可愛', '2024-05-29', '../../assets/img/1716982894_P0450503670038_4_37186676.jpg', '新莊高中', 0),
(29, 11, '時崎狂三聯名手錶', '時崎狂三第四季第五季好婆，正宮了吧，手錶超好看，還有刻刻帝', '2024-05-29', '../../assets/img/1716983041_21938870361109_438.jpg', '新莊高中', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `comment_ibfk_1` (`Agent_id`),
  ADD KEY `comment_ibfk_2` (`Buyer_id`);

--
-- Indexes for table `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`Place_Order_id`),
  ADD KEY `place_order_ibfk_2` (`Buyer_id`),
  ADD KEY `place_order_ibfk_3` (`Product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `product_ibfk_1` (`Agent_id`);

--
-- Indexes for table `take_order`
--
ALTER TABLE `take_order`
  ADD PRIMARY KEY (`Take_Order_id`),
  ADD KEY `take_order_ibfk_1` (`Wish_id`),
  ADD KEY `take_order_ibfk_3` (`Agent_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`Wish_id`),
  ADD KEY `wish_ibfk_1` (`Buyer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `place_order`
--
ALTER TABLE `place_order`
  MODIFY `Place_Order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `take_order`
--
ALTER TABLE `take_order`
  MODIFY `Take_Order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `Wish_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Agent_id`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Buyer_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `place_order`
--
ALTER TABLE `place_order`
  ADD CONSTRAINT `place_order_ibfk_2` FOREIGN KEY (`Buyer_id`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `place_order_ibfk_3` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Agent_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `take_order`
--
ALTER TABLE `take_order`
  ADD CONSTRAINT `take_order_ibfk_1` FOREIGN KEY (`Wish_id`) REFERENCES `wish` (`Wish_id`),
  ADD CONSTRAINT `take_order_ibfk_3` FOREIGN KEY (`Agent_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_1` FOREIGN KEY (`Buyer_id`) REFERENCES `user` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
