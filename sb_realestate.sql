-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 11:03 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sb_realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `cus_fa_id` int(11) NOT NULL,
  `cus_fa_name` varchar(50) NOT NULL,
  `home_id` int(11) NOT NULL,
  `fa_id` int(11) NOT NULL,
  `cus_fa_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`cus_fa_id`, `cus_fa_name`, `home_id`, `fa_id`, `cus_fa_status`) VALUES
(345, '1', 63, 0, 'N'),
(346, '2', 63, 0, 'N'),
(347, '3', 63, 0, 'N'),
(348, '7', 63, 0, 'N'),
(349, '8', 63, 0, 'N'),
(350, '9', 63, 0, 'N'),
(351, '10', 63, 0, 'N'),
(352, '14', 63, 0, 'N'),
(353, '1', 64, 0, 'N'),
(354, '2', 64, 0, 'N'),
(355, '3', 64, 0, 'N'),
(356, '7', 64, 0, 'N'),
(357, '14', 64, 0, 'N'),
(358, '1', 65, 0, 'N'),
(359, '2', 65, 0, 'N'),
(360, '3', 65, 0, 'N'),
(361, '4', 65, 0, 'N'),
(362, '6', 65, 0, 'N'),
(363, '7', 65, 0, 'N'),
(364, '9', 65, 0, 'N'),
(365, '10', 65, 0, 'N'),
(366, '11', 65, 0, 'N'),
(367, '12', 65, 0, 'N'),
(368, '13', 65, 0, 'N'),
(369, '14', 65, 0, 'N'),
(370, '15', 65, 0, 'N'),
(371, '2', 66, 0, 'N'),
(372, '3', 66, 0, 'N'),
(373, '4', 66, 0, 'N'),
(374, '7', 66, 0, 'N'),
(375, '13', 66, 0, 'N'),
(376, '14', 66, 0, 'N'),
(377, '1', 67, 0, 'N'),
(378, '2', 67, 0, 'N'),
(379, '7', 67, 0, 'N'),
(380, '13', 67, 0, 'N'),
(381, '14', 67, 0, 'N'),
(382, '1', 68, 0, 'N'),
(383, '2', 68, 0, 'N'),
(384, '6', 68, 0, 'N'),
(385, '7', 68, 0, 'N'),
(386, '9', 68, 0, 'N'),
(387, '13', 68, 0, 'N'),
(388, '1', 69, 0, 'N'),
(389, '2', 69, 0, 'N'),
(390, '6', 69, 0, 'N'),
(391, '7', 69, 0, 'N'),
(392, '9', 69, 0, 'N'),
(398, '1', 71, 0, 'N'),
(399, '2', 71, 0, 'N'),
(400, '3', 71, 0, 'N'),
(401, '6', 71, 0, 'N'),
(402, '7', 71, 0, 'N'),
(403, '8', 71, 0, 'N'),
(404, '9', 71, 0, 'N'),
(405, '10', 71, 0, 'N'),
(406, '14', 71, 0, 'N'),
(407, '15', 71, 0, 'N'),
(408, '1', 72, 0, 'N'),
(409, '2', 72, 0, 'N'),
(410, '3', 72, 0, 'N'),
(411, '6', 72, 0, 'N'),
(412, '7', 72, 0, 'N'),
(413, '9', 72, 0, 'N'),
(414, '10', 72, 0, 'N'),
(415, '13', 72, 0, 'N'),
(416, '14', 72, 0, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `home_name` varchar(50) NOT NULL,
  `home_detail` text NOT NULL,
  `home_bedroom` int(3) NOT NULL,
  `home_toilet` int(3) NOT NULL,
  `home_bed` int(3) NOT NULL,
  `home_price` int(11) NOT NULL,
  `home_video_link` varchar(250) NOT NULL,
  `home_create` datetime NOT NULL,
  `member_id` int(11) NOT NULL,
  `home_status` char(1) NOT NULL,
  `approve` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `home_name`, `home_detail`, `home_bedroom`, `home_toilet`, `home_bed`, `home_price`, `home_video_link`, `home_create`, `member_id`, `home_status`, `approve`) VALUES
(63, 'โรงแรมพูลแมน หลวงพระบาง', '“พูลแมน หลวงพระบาง” (Pullman Luang Prabang Hotel) โรงแรมหรูระดับ 5 ดาว คอลเลกชั่นล่าสุดของ “แบรนด์พูลแมน” อันโด่งดังของเครือ Accor ผู้นำโรงแรมและรีสอร์ทระดับโลก ได้เปิดตัวอย่างเป็นทางการใจกลางหลวงพระบาง เมืองมรดกโลกเมื่อเร็ว ๆ นี้ โดยได้สร้าง“เสน่ห์”บทใหม่ของการท่องเที่ยวให้กับหลวงพระบางแบบครบวงจร ภายใต้คอนเซ็ปต์การผสานความร่วมสมัยกับวิถีชีวิตเรียบง่ายของลาวทั้งในอดีตและปัจจุบัน สู่รีสอร์ทแห่งการพักผ่อนที่ใกล้ชิดแก่นแท้ทางวัฒนธรรมและท้องถิ่นชุมชนหลวงพระบางมากที่สุดในศตวรรษ ดึงดูดนักท่องเที่ยวรุ่นใหม่ที่มองหาความแตกต่าง และกลุ่มลูกค้าองค์กรด้วยพื้นที่จัดประชุมที่ใหญ่ที่สุดในหลวงพระบาง', 7, 6, 5, 19003, 'https://www.youtube.com/watch?v=XKsQitTyhwY', '2019-06-12 11:36:19', 6, 'N', 1),
(64, 'The Paz Khao Yai', 'ด้วยทำเลที่ตั้งที่คุณต้องร้องว้าว เพราะต้องอยู่ยอดเขา ท่ามกลางบรรยากาศที่เป็นส่วนตัวแบบสุด ๆ โดดเด่นสวยงามด้วยการออกแบบอาคารในสไตล์โมเดิร์นทันสมัย แถมยังมองเห็นวิวธรรมชาติล้อมรอบแบบ 360 องศา รับรองเลยว่าคุณจะได้สูดอากาศดี ๆ ที่เขาใหญ่แบบเต็มปอด ให้บริการห้องพักทั้งหมด 4 แบบ ได้แก่ Scenery Villa, Spacious Deluxe, Horizon Villa, และ Pool Villa ที่เพียบพร้อมด้วยสิ่งอำนวยความสะดวกอย่างครบครัน และรองรับผู้เข้าพักได้ทุกเพศทุกวัย ไม่ว่าจะมาเป็นกลุ่มเพื่อน ครอบครัว หรือคู่รัก คุณก็จะได้สัมผัสกับความสุขและความสะดวกสบายที่นี่อย่างแน่นอน', 3, 3, 3, 2900, '', '2019-06-12 11:46:16', 44, 'N', 1),
(65, 'X2 Pattaya Oceanphere', 'เหนื่อยจากการทำงานมาทั้งปีหากใครอยากจะหนีความเครียดหรือความเหนื่อยล้าไปพักผ่อนแบบชิลๆ Sanook! Travel มีที่พักเปิดใหม่ในพัทยามานำเสนอให้ทุกคนได้ไปตามรอยกัน กับ X2 Pattaya Oceanphere พูลวิลล่าที่เพิ่งจะเปิดให้บริการมาได้เพียงไม่กี่เดือนเท่านั้น ที่นี่คือศูนย์รวมแห่งความสะดวกสบาย ภายใต้การดีไซน์ที่ดูหรูหราและแปลกตา ด้วยธีมการตกแต่งสไตล์ลอฟต์ปูนเปลือย ผสมผสานกับธรรมชาติของต้นไม้ใบหญ้าที่ถูกจัดแต่งเอาไว้ได้อย่างกลมกลืนกับสถาปัตยกรรม ', 4, 2, 3, 1580, '', '2019-06-12 11:50:02', 44, 'N', 1),
(66, 'บ้านนมแมว รีทรีท', 'เป็นอีกหนึ่งที่พักและสถานที่ ที่น่าสนใจ และมีความแตกต่างไปจากที่พักทั่วไป  “คุณต้น” เจ้าของบ้านนมแมว  ได้บอกว่าที่นี่เป็น รีทรีท ไม่ใช่ รีสอร์ท เพราะ รีทรีทนั้นจะเน้นไปทางสุขภาพ และมีการแทรกสอดธรรมะเข้าไปด้วย\r\nพิกัด ตั้งอยู่ที่ : 188 หมู่6 ซอย2 ตำบลหนองหญ้า อำเภอเมืองกาญจนบุรี กาญจนบุรี 71000 การเดินทาง : บ้านนมแมวรีทรีตกาญจนบุรี : จากถนนบรมราชชนนีมุ่งตรงผ่านนครปฐม บ้านโป่ง ท่ามะกา แล้วก็เลี้ยวซ้ายไปตามทาง ถนนสาย  3209 ผ่านวัดถ้ำเขาแหลม ผ่านโรงเรียนบ้านวังปลาหมู จากนั้นจะมีป้ายบอกตลอดทางครับ (ข้อมูลจาก edtguide.com ครับ) ติดต่อสอบถามเพิ่มเติมได้ที่ https://www.facebook.com/baannommaew เลยครับ', 2, 2, 3, 3200, 'https://www.youtube.com/watch?v=MMq1WoQFsnc', '2019-06-12 12:02:25', 44, 'N', 1),
(67, 'วาลาตา เขาใหญ่ รีสอร์ท ', 'วาลาตา เขาใหญ่ รีสอร์ท ตั้งอยู่ท่ามกลางธรรมชาติที่สวยงาม ร่มรื่น ของผืนป่าเขาใหญ่ เป็นอีกหนึ่งที่พักทางเลือกสำหรับผู้ที่กำลังวางแผนท่องเที่ยวเพื่อเบรกจากความเหนื่อยล้า ของวิถีชีวิตในเมืองที่วุ่นวาย มาอยู่ใกล้ชิดกับธรรมชาติ ด้วยการต้อนรับที่อบอุ่น เป็นมิตร คุณจึงมั่นใจได้ว่าจะได้รับประสบการณ์การพักผ่อนสุดพิเศษจากรีสอร์ทแห่งนี้ ด้วยทำเลที่ตั้งที่เดินทางสะดวกสบายในเขตอำเภอปากช่อง ใกล้ๆ กับรีสอร์ทยังมีร้านอาหาร ร้านกาแฟ และสถานที่ท่องเที่ยวที่น่าสนใจ ให้คุณได้ไปเยือนอีกด้วย สำหรับผู้ที่ต้องการไปผจญภัยกับการเดินป่าในอุทยานแห่งชาติเขาใหญ่ สามารถขับรถไปได้โดยใช้เวลาไม่นาน ', 2, 2, 2, 7500, 'https://www.youtube.com/watch?v=bH66d_0-n-g', '2019-06-12 13:22:31', 22, 'N', 1),
(68, 'วิสาหกิจชุมชนท่องเที่ยว บ้านน้ำเชี่ยว', 'เที่ยวตราดที่แรก ที่นี่ค่ะ “วิสาหกิจชุมชนท่องเที่ยว บ้านน้ำเชี่ยว” เริ่มต้นที่สะพานวัดใจ ซึ่งเป็นสัญลักษณ์ของที่นี่เลย มองดูกว้าง ๆ ด้วยเงาของสะพานที่สะท้อนไปกับพื้นน้ำ เลยทำให้เรามองเป็นเหมือนลูกตาดวงใหญ่นั่นเอง และที่ทำให้สะพานดูสูงและชันแบบนี้ ก็เพราะเรือต่าง ๆ จะได้สัญจรไปมาได้สะดวกไงล่ะคะ ที่นี่เป็นแหล่งของชุมชน 3 วัฒนธรรม และ 2 ศาสนา เป็นอีกหนึ่งชุมชนที่บริสุทธิ์มาก ๆ เลยค่ะ มาที่นี่มี 3 สิ่งที่ห้ามพลาด นั่นก็คือ โฮมสเตย์ ถ้าใครอยากจะสัมผัสวิถีชีวิตของที่นี่ก็แวะเวียนมาพักกันได้ เขามีให้บริการด้วยนะ ส่วนเรื่องของงอบ เรียกว่างอบน้ำเชี่ยว ที่นี่เป็นหนึ่งใน original ที่แรก ถ้าพูดถึงงอบต้องนึกถึงที่นี่เลยจ้า และขนมของชาวมุสลิม ข้าวเกรียบยาหน้า เป็นสูตรขนมที่ทำเฉพาะในชุมชนบ้านน้ำเชี่ยวแห่งนี้เท่านั้น ได้รับรางวัลมากมาย และโด่งดังไปต่างประเทศด้วยน้า แต่บอกเลยว่า คนไทยอย่างเราไม่ค่อยได้ทานกันเลย มาเที่ยวที่นี่ 3 สิ่งนี้ห้ามพลาดเลยนะคะ ', 2, 4, 3, 2900, 'https://www.youtube.com/watch?v=pwvnAu9oOcU', '2019-06-12 13:31:36', 22, 'N', 1),
(69, 'ป่าสนวัดจันทร์', 'ป่าสนวัดจันทร์ ตั้งอยู่ในอำเภอกัลยาณิวัฒนา  มีทิวทัศน์ ธรรมชาติ สวยงามของป่าสนที่ใหญ่ที่สุดในประเทศไทย ในช่วงฤดูหนาวดินแดนกลางหุบเขาแห่งนี้จะถูกปกคลุมไปด้วยม่านหมอกและสายลมอันหนาวเย็น ภาพสายหมอกลอยพริ้วปกคลุมทิวสนและอ่างเก็บน้ำ รวมทั้งสีสันสดสวยของใบเมเปิ้ลที่พร้อมใจกันผลัดเปลี่ยนสีในช่วงฤดูหนาวตั้งแต่ปลายเดือนธ.ค.- ก.พ. ทั้งหมดนี้จะยังคงตราตรึงอยู่ในความประทับใจของผู้ที่ได้ไปเยือนตราบนานเท่านาน นอกจากฤดูหนาวแล้วหากมาเที่ยวในฤดูฝนจะได้พบกับอีกหนึ่งบรรยากาศที่เขียวขจีและสดชื่นตามแบบฉบับของการท่องเที่ยวช่วงกรีนซีซั่นซึ่งสวยงามไม่แพ้กัน', 4, 2, 8, 1990, 'https://www.youtube.com/watch?v=DXpqzkR5jdA', '2019-06-12 13:43:42', 24, 'N', 1),
(71, 'Myth Koh Larn Resort Bar and Bistro ', 'Koh Larn Resort Bar and Bistro เป็นที่พักแนวโมเดิร์นที่มีการตกแต่งได้อย่างสวยงาม ด้วยสไตล์ลอฟต์ปูนเปลือย ท่ามกลางบรรยากาศของเกาะล้านที่แสนจะคึกคัก และเต็มเปี่ยมไปด้วยธรรมชาติอันบริสุทธิ์\r\nห้องพักที่นี่จะมีทั้งหมด 3 ห้องซึ่งทั้ง 3 ห้องนี้จะมีสิ่งอำนวยความสะดวกรวมทั้งวิวจากห้องนอนเหมือนกันทั้งหมด มีเตียงใหญ่ควีนไซส์ ห้องอาบน้ำที่กว้างขวาง และเฟอร์นิเจอร์สิ่งอำนวยความสะดวกที่ครบครัน', 2, 3, 3, 2500, 'https://www.youtube.com/watch?v=HINr3Ba-Eoc', '2019-06-12 13:50:06', 24, 'N', 1),
(72, 'ปารีฮัท | เกาะสีชัง', '       เกาะสีชัง 2 วัน 1 คืน เป็นที่เที่ยวชลบุรี และที่เที่ยวทะเลใกล้กรุงเทพฯ ที่ไปเที่ยวได้ง่าย ๆ ไม่มีรถส่วนตัวก็สามารถไปเที่ยวได้ มีธรรมชาติทางท้องทะเลที่สวยงาม พร้อมทั้งที่พักสวย ๆ และร้านอาหารสุดอร่อยมากมายให้ได้ไปสัมผัส\r\n          วันหยุดเสาร์-อาทิตย์ ถ้าไม่รู้จะไปเที่ยวพักผ่อนหัวสมองที่ไหนดี ลองมาดูตัวเลือกดี ๆ ทางนี้ไหม...เราจะชวนไปเที่ยวเกาะสีชัง อำเภอศรีราชา จังหวัดชลบุรี ในแบบฉบับ 2 วัน 1 คืน เพราะที่นี่สามารถเดินทางง่ายดาย ไม่มีรถส่วนตัวก็สามารถไปเที่ยวได้ง่าย ๆ อีกทั้งบรรยากาศยังเงียบสงบ มีกิจกรรมและแหล่งท่องเที่ยวที่น่าสนใจมากมาย เหมาะสำหรับการไปเยือนแบบ 2 วัน 1 คืน ที่นี่จะมีที่เที่ยว ร้านอาหาร หรือที่พักอะไรที่น่าสนใจบ้าง ไปดูกัน', 3, 2, 3, 2990, 'https://www.youtube.com/watch?v=hxjdApdkeWc', '0000-00-00 00:00:00', 7, 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_facilities`
--

CREATE TABLE `main_facilities` (
  `fa_id` int(11) NOT NULL,
  `fa_name` varchar(50) NOT NULL,
  `fa_pic` text NOT NULL,
  `fa_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_facilities`
--

INSERT INTO `main_facilities` (`fa_id`, `fa_name`, `fa_pic`, `fa_status`) VALUES
(1, 'เช็คอินด้วยตัวเอง', 'self-check-in.png', 'N'),
(2, 'มีที่จอดรถฟรีบริเวณที่พัก', 'parking.png', 'N'),
(3, 'สระว่ายน้ำ', 'pool.png', 'N'),
(4, 'ยิม', 'gym.png', 'N'),
(6, 'ห้องครัว', 'kitchen.png', 'N'),
(7, 'WiFi', 'wireless-internet.png', 'N'),
(8, 'ทีวี', 'tv.png', 'N'),
(9, 'ของใช้จำเป็นภายในห้องน้ำ', 'essentials.png', 'N'),
(10, 'ของใช้ในห้องนอน', 'extra-pillows-blankets.png', 'N'),
(11, 'เครื่องชงกาแฟ', 'coffee-maker.png', 'N'),
(12, 'เตารีด', 'iron.png', 'N'),
(13, 'สวนหรือสนามหลังบ้าน', 'garden-backyard.png', 'N'),
(14, 'เครื่องปรับอากาศ', 'air-conditioning.png', 'N'),
(15, 'เครื่องตรวจจับควัน', 'smoke-detector.png', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_lastname` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL,
  `member_birthday` date NOT NULL,
  `member_images` varchar(200) NOT NULL,
  `member_tel` varchar(10) NOT NULL,
  `member_facebook` varchar(70) NOT NULL,
  `member_ig` varchar(50) NOT NULL,
  `member_line` varchar(50) NOT NULL,
  `member_about_me` varchar(255) NOT NULL,
  `member_permission` varchar(10) NOT NULL,
  `member_status` char(1) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `approve` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_email`, `member_name`, `member_lastname`, `member_password`, `member_birthday`, `member_images`, `member_tel`, `member_facebook`, `member_ig`, `member_line`, `member_about_me`, `member_permission`, `member_status`, `approve`) VALUES
(1, 'tor@storyboard.co.th', 'Sarayuth', 'Kongsomboon', 'Sa1546Min', '1991-08-04', 'CPLF4946.JPEG', '', '', '', '', '', '0', 'N', 0),
(3, 'mil2cle@gmail.com', 'ศรายุทธ', 'คงสมบูรณ์', 'Sa1546Min', '1991-11-21', '', '', '', '', '', '', '1', 'N', 0),
(4, 'mil3clea@gmail.com', 'Sarayuth', 'Kongsomboon', 'Sa1546Ra', '0000-00-00', 'IMG_0076.JPG', '', '', '', '', '', '2', 'N', 1),
(5, 'mil3cle@gmail.com', 'Sarayuth', 'Kongsomboon', 'Sa1546Ra', '0000-00-00', '', '', '', '', '', '', '2', 'N', 0),
(6, 'petch@test.com', 'ทยานชล', 'กลั่นเทศ', '22t18287', '1994-08-28', '20190610043155932845749.JPG', '0917370076', 'Tayanchon Petch', 'Rymthmist.p', 'Petchkielg', 'Historically, 255 characters has often been the maximum length of a VARCHAR in some DBMSes, and it sometimes still winds up being the effective maximum if you want to use UTF-8 and have the column indexed (because of index length limitations).', '1', 'N', 1),
(7, 'admin@test.com', 'ทยานชล', 'กลั่นเทศ', '22t18287', '0000-00-00', 'CPLF4946.JPEG', '', '', '', '', '', '0', 'N', 1),
(8, 'agency@test.com', 'จิรภา', 'ประกอบผล', '22t18287', '0000-00-00', '', '', '', '', '', '', '1', 'N', 1),
(10, 'adb@test.com', 'adb', 'adb', '22t18287', '0000-00-00', '', '', '', '', '', '', '1', 'N', 0),
(14, 'type@test.com', 'type', 'type', '22t18287', '0000-00-00', '', '', '', '', '', '', '1', 'N', 0),
(15, 'type2@test.com', 'type', 'type', '22t18287', '0000-00-00', '', '', '', '', '', '', '2', 'N', 0),
(17, 'petch2@test.com', 'เพชร', 'จ้า', '22t18287', '0000-00-00', '', '', '', '', '', '', '1', 'N', 0),
(21, 'petcha@test.com', 'อิอิ', 'เพชรจ้าาาาาาา', '22t18287', '1994-08-28', 'IMG_0076.JPG', '', '', '', '', '', '2', 'N', 1),
(22, 'tuck@test.com', 'จิรภา', 'ประกอบผล', '22t18287', '0000-00-00', 'IMG_0047.JPG', '', '', '', '', '', '1', 'N', 1),
(24, 'testb@test.com', 'John', 'Fergorty', '22t18287', '1962-10-18', '20190612013938436319812.jpg', '0873541183', 'John Forgerty', 'J.forgety', '@j.fgt1939', 'You go to a John Fogerty concert for a) that voice; b) his guitar playing; c) those incredibly descriptive song lyrics; d) the experience of hearing him perform all those hits. The answer is, of course, e) all of the above.', '1', 'N', 1),
(41, 'Huawei@test.com', 'Huawei', 'Y9', '22t18287', '1994-08-28', '201906070433401675460531.jpg', '', '', '', '', '', '2', 'N', 0),
(42, 'admindxxxx@test.com', 'xxx', 'xxx', '22t18287', '2019-06-19', '201906070528102036875154.JPG', '', '', '', '', '', '1', 'N', 0),
(43, 'addfdfdfmin@test.com', 'ddd', 'ddddd', '22t18287', '2019-06-18', '20190607052858371427641.JPEG', '', '', '', '', '', '2', 'N', 0),
(44, 'tayanchon.k@gmail.com', 'จักรพันธ์', 'ภูมิพงศ์ไทย', '22t18287A', '1995-10-18', '201906100104431654415530.png', '0917370076', 'Tayanchon Klanted', 'R.pure532', 'Petchkiel', 'Historically, 255 characters has often been the maximum length of a VARCHAR in some DBMSes, and it sometimes still winds up being the effective maximum if you want to use UTF-8 and have the column indexed (because of index length limitations).', '1', 'N', 1),
(45, 'admin@test.coms', 'jirapha', 'prakobphol', '22t18287A', '2019-06-28', '201906191010111631014846.jpg', '', '', '', '', '', '2', 'N', 0),
(46, 'ultimate@test.com', 'jirapha', 'prakobphol', '22t18287A', '2019-05-29', '20190619101201587656976.jpg', '', '', '', '', '', '1', 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `picture_home`
--

CREATE TABLE `picture_home` (
  `pic_no` int(11) NOT NULL,
  `pic_name` text NOT NULL,
  `home_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `pic_status` char(1) NOT NULL,
  `order_picture` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture_home`
--

INSERT INTO `picture_home` (`pic_no`, `pic_name`, `home_id`, `member_id`, `pic_status`, `order_picture`) VALUES
(319, '20190612113619343309359_9112-Pho-1024x683.jpg', 63, 6, 'D', 8),
(320, '20190612113619343309359_Pullman-Luang-Prabang-Hotel-1-1024x683.jpg', 63, 6, 'D', 1),
(321, '20190612113619343309359_Pullman-Luang-Prabang-Hotel6-1024x677.jpg', 63, 6, 'N', 1),
(322, '20190612113619343309359_Pullman-Luang-Prabang-Hotel7-1024x683.jpg', 63, 6, 'N', 3),
(323, '20190612113619343309359_Pullman-Luang-Prabang-Hotel9-1024x683.jpg', 63, 6, 'N', 4),
(324, '20190612113619343309359_Pullman-Luang-Prabang-Hotel11-1024x683.jpg', 63, 6, 'N', 5),
(325, '20190612113619343309359_Pullman-Luang-Prabang-Hotel15-1024x683.jpg', 63, 6, 'N', 6),
(326, '20190612113619343309359_Pullman-Luang-Prabang-Hotel19-1024x684.jpg', 63, 6, 'N', 7),
(327, '20190612113619343309359_Pullman-Luang-Prabang-Hotel21-1024x575.jpg', 63, 6, 'N', 0),
(328, '20190612114616500511517_resortkhoyai1.jpg', 64, 44, 'N', 0),
(329, '20190612114616500511517_resortkhoyai2.jpg', 64, 44, 'N', 0),
(330, '20190612114616500511517_resortkhoyai3.jpg', 64, 44, 'N', 2),
(331, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMDkuanBn.jpg', 65, 44, 'N', 9),
(332, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMDYuanBn.jpg', 65, 44, 'N', 9),
(333, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMDIuanBn.jpg', 65, 44, 'N', 9),
(334, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMDcuanBn.jpg', 65, 44, 'N', 9),
(335, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMTYuanBn.jpg', 65, 44, 'N', 9),
(336, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwNDMuanBn.jpg', 65, 44, 'N', 9),
(337, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwNDEuanBn.jpg', 65, 44, 'N', 9),
(338, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMDEuanBn.jpg', 65, 44, 'N', 9),
(339, '201906121150021625208553_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU3OTcvMTA2NjJfMTkwNjEwXzAwMjguanBn.jpg', 65, 44, 'N', 9),
(340, '2019061212022569579817_9.jpg', 66, 44, 'N', 0),
(341, '2019061212022569579817_7.jpg', 66, 44, 'N', 1),
(342, '2019061212022569579817_6.jpg', 66, 44, 'N', 2),
(343, '2019061212022569579817_4.jpg', 66, 44, 'N', 3),
(344, '2019061212022569579817_3.jpg', 66, 44, 'N', 4),
(345, '2019061212022569579817_2.jpg', 66, 44, 'D', 5),
(346, '20190612012231212773020_8.jpg', 67, 22, 'N', 0),
(347, '20190612012231212773020_54.jpg', 67, 22, 'N', 1),
(348, '20190612012231212773020_1.jpg', 67, 22, 'N', 2),
(349, '20190612012231212773020_32.jpg', 67, 22, 'D', 3),
(350, '20190612013136445536325_e4713ad83e53d8151055c5fd1a49e2ea_1560241098.jpg', 68, 22, 'D', 0),
(351, '20190612013136445536325_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MjEvMTU2MDI0MDgxMjQxMS5qcGc=.jpg', 68, 22, 'N', 1),
(352, '20190612013136445536325_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MjEvMTU2MDI0MDc5ODA3NC5qcGc=.jpg', 68, 22, 'N', 2),
(353, '20190612013136445536325_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MjEvNzA2NjQ4LmpwZw==.jpg', 68, 22, 'N', 3),
(354, '20190612013136445536325_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MjEvMjE2MjEwLmpwZw==.jpg', 68, 22, 'N', 4),
(355, '20190612013136445536325_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MjEvOTg0NjUwLmpwZw==.jpg', 68, 22, 'N', 5),
(356, '20190612013136445536325_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MjEvcmhqeWouanBn.jpg', 68, 22, 'N', 6),
(357, '20190612014342681520143_27-DEW_1362.jpg', 69, 24, 'N', 0),
(358, '20190612014342681520143_21-DEW_1367.jpg', 69, 24, 'N', 1),
(359, '20190612014342681520143_watchan22.jpg', 69, 24, 'N', 2),
(360, '20190612014342681520143_watchan12.jpg', 69, 24, 'N', 3),
(365, '201906120150061083688194_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MTMvNTY0MDg1MjNfMjE2OTU5NTkwMzE1NTg5M18yNjkuanBn.jpg', 71, 24, 'N', 0),
(366, '201906120150061083688194_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MTMvNTY5MjI3MTJfMjE2OTU5NjM3MzE1NTg0Nl81NzkuanBn.jpg', 71, 24, 'N', 1),
(367, '201906120150061083688194_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MTMvNTYzODQxMjVfMjE2OTU5NjY0OTgyMjQ4NV81NzkuanBn.jpg', 71, 24, 'N', 2),
(368, '201906120150061083688194_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MTMvNTY5MzgxNzVfMjE2OTU5NzIwNjQ4OTA5Nl8xNzUuanBn.jpg', 71, 24, 'N', 3),
(369, '201906120150061083688194_aHR0cHM6Ly9zLmlzYW5vb2suY29tL3RyLzAvdWQvMjgzLzE0MTU4MTMvNTY0MTQxMzdfMjE2OTU5NzQ1OTgyMjQwNF8zMzAuanBn.jpg', 71, 24, 'N', 4),
(1858, '20190613053458138740545_John-Fogerty-2018-via-Melissa-Dragich-683x1024.jpg', 63, 6, 'D', 0),
(1859, '20190613053458138740545_61183359_2379828892230519_327344261064294400_n.jpg', 63, 6, 'D', 1),
(1860, '20190613053458138740545_60704864_811906252522066_3772946293555462144_n.jpg', 63, 6, 'D', 2),
(1861, '201906140136312040762853_2017-ktm-390-duke-14.jpg', 64, 44, 'D', 0),
(1862, '201906140206301880380608_2017-ktm-390-duke-14.jpg', 64, 44, 'D', 0),
(1863, '20190614025208373851365_2017-ktm-390-duke-14.jpg', 68, 22, 'N', 0),
(1864, '20190614025243702576882_John-Fogerty-2018-via-Melissa-Dragich-683x1024.jpg', 68, 22, 'N', 0),
(1885, '20190614060938620484428_279546.jpg', 67, 22, 'D', 0),
(1886, '20190614061051853407238_93b5a86a0836ef7f1a078d48ab3bc32f.jpg', 67, 22, 'D', 0),
(1887, '20190614061309610341602_93b5a86a0836ef7f1a078d48ab3bc32f.jpg', 67, 22, 'D', 0),
(1888, '20190614073351967151175_93b5a86a0836ef7f1a078d48ab3bc32f.jpg', 67, 22, 'D', 0),
(1889, '20190614073703943294917_279546.jpg', 67, 22, 'N', 0),
(1890, '20190614081314850068637_279546.jpg', 63, 7, 'D', 0),
(1891, '2019061709520052245704_279546.jpg', 64, 7, 'D', 0),
(1892, '20190617095500541454702_93b5a86a0836ef7f1a078d48ab3bc32f.jpg', 64, 7, 'D', 0),
(1893, 'k2.jpg', 72, 7, 'N', 0),
(1894, 'k6.jpg', 72, 7, 'N', 1),
(1895, 'k8.jpg', 72, 7, 'N', 2),
(1896, 'k3.jpg', 72, 7, 'N', 3),
(1897, 'k1.jpg', 72, 7, 'N', 4),
(1898, 'k4.jpg', 72, 7, 'N', 5),
(1899, 'k7.jpg', 72, 7, 'N', 6);

-- --------------------------------------------------------

--
-- Table structure for table `report_home`
--

CREATE TABLE `report_home` (
  `report_home_id` int(4) NOT NULL,
  `member_report_id` int(4) NOT NULL,
  `home_victim_id` int(4) NOT NULL,
  `detail_report` text NOT NULL,
  `date_report` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_home`
--

INSERT INTO `report_home` (`report_home_id`, `member_report_id`, `home_victim_id`, `detail_report`, `date_report`) VALUES
(5, 24, 63, 'รูปภาพไม่ตรงกับสถานที่จริง', '2019-06-12 13:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `report_member`
--

CREATE TABLE `report_member` (
  `report_id` int(3) NOT NULL,
  `member_report_id` int(11) NOT NULL,
  `member_victim_id` int(11) NOT NULL,
  `detail_report` text NOT NULL,
  `date_report` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_member`
--

INSERT INTO `report_member` (`report_id`, `member_report_id`, `member_victim_id`, `detail_report`, `date_report`) VALUES
(26, 6, 4, 'dsfdsfdsfdsfd', '2019-06-04 11:55:52'),
(27, 21, 6, 'ทดสอบ', '2019-06-05 14:44:06');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_facilities`
--
CREATE TABLE `vw_facilities` (
`cus_fa_id` int(11)
,`cus_fa_name` varchar(50)
,`home_id` int(11)
,`fa_id` int(11)
,`cus_fa_status` char(1)
,`fa_name` varchar(50)
,`fa_pic` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_home`
--
CREATE TABLE `vw_home` (
`home_id` int(11)
,`member_id` int(11)
,`home_name` varchar(50)
,`pic_name` text
,`home_detail` text
,`order_picture` int(3)
,`pic_status` char(1)
,`approve` int(1)
,`home_status` char(1)
,`home_price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_search_home`
--
CREATE TABLE `vw_search_home` (
`member_id` int(11)
,`home_id` int(11)
,`home_name` varchar(50)
,`home_detail` text
,`home_price` int(11)
,`home_status` char(1)
,`approve` int(1)
,`member_email` varchar(50)
,`member_name` varchar(50)
,`member_lastname` varchar(50)
,`member_tel` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_facilities`
--
DROP TABLE IF EXISTS `vw_facilities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_facilities`  AS  select `facilities`.`cus_fa_id` AS `cus_fa_id`,`facilities`.`cus_fa_name` AS `cus_fa_name`,`facilities`.`home_id` AS `home_id`,`facilities`.`fa_id` AS `fa_id`,`facilities`.`cus_fa_status` AS `cus_fa_status`,`main_facilities`.`fa_name` AS `fa_name`,`main_facilities`.`fa_pic` AS `fa_pic` from (`facilities` left join `main_facilities` on((`main_facilities`.`fa_id` = `facilities`.`cus_fa_name`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_home`
--
DROP TABLE IF EXISTS `vw_home`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_home`  AS  select `home`.`home_id` AS `home_id`,`home`.`member_id` AS `member_id`,`home`.`home_name` AS `home_name`,`picture_home`.`pic_name` AS `pic_name`,`home`.`home_detail` AS `home_detail`,`picture_home`.`order_picture` AS `order_picture`,`picture_home`.`pic_status` AS `pic_status`,`home`.`approve` AS `approve`,`home`.`home_status` AS `home_status`,`home`.`home_price` AS `home_price` from (`home` left join `picture_home` on((`picture_home`.`home_id` = `home`.`home_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_search_home`
--
DROP TABLE IF EXISTS `vw_search_home`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_search_home`  AS  select `member`.`member_id` AS `member_id`,`home`.`home_id` AS `home_id`,`home`.`home_name` AS `home_name`,`home`.`home_detail` AS `home_detail`,`home`.`home_price` AS `home_price`,`home`.`home_status` AS `home_status`,`home`.`approve` AS `approve`,`member`.`member_email` AS `member_email`,`member`.`member_name` AS `member_name`,`member`.`member_lastname` AS `member_lastname`,`member`.`member_tel` AS `member_tel` from (`home` left join `member` on((`member`.`member_id` = `home`.`member_id`))) where ((`home`.`home_status` = 'N') and (`home`.`approve` = 1)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`cus_fa_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `main_facilities`
--
ALTER TABLE `main_facilities`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `picture_home`
--
ALTER TABLE `picture_home`
  ADD PRIMARY KEY (`pic_no`);

--
-- Indexes for table `report_home`
--
ALTER TABLE `report_home`
  ADD PRIMARY KEY (`report_home_id`);

--
-- Indexes for table `report_member`
--
ALTER TABLE `report_member`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `cus_fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `main_facilities`
--
ALTER TABLE `main_facilities`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `picture_home`
--
ALTER TABLE `picture_home`
  MODIFY `pic_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1900;
--
-- AUTO_INCREMENT for table `report_home`
--
ALTER TABLE `report_home`
  MODIFY `report_home_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `report_member`
--
ALTER TABLE `report_member`
  MODIFY `report_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
