-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2018 at 11:38 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `combo_meals`
--

CREATE TABLE `combo_meals` (
  `cm_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(8,2) NOT NULL,
  `cm_desc` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cm_name` varchar(255) NOT NULL,
  `cm_number` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo_meals`
--

INSERT INTO `combo_meals` (`cm_id`, `menu_id`, `restaurant_id`, `created`, `price`, `cm_desc`, `image`, `cm_name`, `cm_number`, `status`) VALUES
(1, 13, 1, '2018-02-17 08:45:07', '1528.00', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(2, 19, 1, '2018-02-17 08:45:07', '1528.00', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(3, 20, 1, '2018-02-17 08:45:07', '1528.00', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(4, 21, 1, '2018-02-17 08:45:07', '1528.00', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(5, 22, 1, '2018-02-17 08:45:07', '1528.00', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(6, 23, 1, '2018-02-17 08:45:07', '1528.00', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(7, 6, 1, '2018-02-17 08:46:16', '1435.00', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(8, 13, 1, '2018-02-17 08:46:16', '1435.00', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(9, 21, 1, '2018-02-17 08:46:16', '1435.00', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(10, 22, 1, '2018-02-17 08:46:16', '1435.00', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(11, 23, 1, '2018-02-17 08:46:16', '1435.00', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(12, 24, 1, '2018-02-17 08:46:16', '1435.00', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(13, 18, 1, '2018-02-17 08:47:36', '1410.00', 'Save: 75 Pesos', '1518857256salo-salo-3-4.jpg', 'Salo-Salo 3', 607, 'Available'),
(14, 22, 1, '2018-02-17 08:47:36', '1410.00', 'Save: 75 Pesos', '1518857256salo-salo-3-4.jpg', 'Salo-Salo 3', 607, 'Available'),
(15, 23, 1, '2018-02-17 08:47:36', '1410.00', 'Save: 75 Pesos', '1518857256salo-salo-3-4.jpg', 'Salo-Salo 3', 607, 'Available'),
(16, 25, 1, '2018-02-17 08:47:36', '1410.00', 'Save: 75 Pesos', '1518857256salo-salo-3-4.jpg', 'Salo-Salo 3', 607, 'Available'),
(17, 26, 1, '2018-02-17 08:47:36', '1410.00', 'Save: 75 Pesos', '1518857256salo-salo-3-4.jpg', 'Salo-Salo 3', 607, 'Available'),
(18, 27, 1, '2018-02-17 08:47:36', '1410.00', 'Save: 75 Pesos', '1518857256salo-salo-3-4.jpg', 'Salo-Salo 3', 607, 'Available'),
(19, 2, 1, '2018-02-17 08:48:20', '1380.00', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(20, 9, 1, '2018-02-17 08:48:20', '1380.00', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(21, 18, 1, '2018-02-17 08:48:20', '1380.00', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(22, 22, 1, '2018-02-17 08:48:20', '1380.00', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(23, 23, 1, '2018-02-17 08:48:20', '1380.00', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(24, 27, 1, '2018-02-17 08:48:20', '1380.00', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_mname` varchar(255) DEFAULT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_addr` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_gender` varchar(255) NOT NULL,
  `customer_birthdate` date NOT NULL,
  `customer_status` varchar(30) DEFAULT 'Active',
  `customer_password` varchar(255) NOT NULL,
  `customer_pic` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fname`, `customer_mname`, `customer_lname`, `customer_addr`, `customer_phone`, `customer_email`, `customer_gender`, `customer_birthdate`, `customer_status`, `customer_password`, `customer_pic`, `date_created`) VALUES
(1, 'Desiree', 'Petilla', 'Omapoy', 'Saint Bernard Southern Leyte', '09266942645', 'desiree@gmail.com', 'Female', '1997-09-21', 'Active', '12345', '', '2018-01-30 19:13:54'),
(2, 'Francis Godwin', 'Margaja', 'Montealto', 'Balamban', '09234567', 'godwin@gmail.com', 'Male', '1997-02-13', 'Active', '12345', '', '2018-02-12 17:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `staff_number` int(255) NOT NULL,
  `employee_fname` varchar(255) NOT NULL,
  `employee_mname` varchar(255) NOT NULL,
  `employee_lname` varchar(255) NOT NULL,
  `employee_addr` varchar(255) NOT NULL,
  `employee_phone` varchar(255) NOT NULL,
  `employee_gender` varchar(255) NOT NULL,
  `employee_ssn` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee_status` varchar(255) NOT NULL DEFAULT 'Active',
  `rate_comm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `restaurant_id`, `staff_number`, `employee_fname`, `employee_mname`, `employee_lname`, `employee_addr`, `employee_phone`, `employee_gender`, `employee_ssn`, `username`, `password`, `employee_status`, `rate_comm`) VALUES
(1, 1, 624, 'Mickale', 'Lapasanda', 'Saturre', 'Saint Bernard', '09165970601', 'Male', '12356421', 'mickale1234', '12345', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `event_status` varchar(255) NOT NULL DEFAULT 'Open',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `restaurant_id`, `event_name`, `event_date`, `event_venue`, `event_time`, `event_desc`, `event_status`, `created`, `event_number`) VALUES
(1, 1, 'Event 1', 'February 18, 2018', 'Cebu City', '2:30 PM', 'Event 1', 'Open', '2018-02-18 07:28:39', 946);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `mc_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_desc` varchar(255) DEFAULT NULL,
  `m_category` varchar(255) DEFAULT NULL,
  `m_image` varchar(255) DEFAULT NULL,
  `m_status` varchar(255) NOT NULL DEFAULT 'Available',
  `m_price` decimal(8,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `menu_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `mc_id`, `restaurant_id`, `m_name`, `m_desc`, `m_category`, `m_image`, `m_status`, `m_price`, `created`, `menu_number`) VALUES
(1, 2, 1, 'KUYA J FRUIT SHAKE SPECIAL', '', 'Shake', '1518853428Kuya-J-Fruit-Shake-Special-SM-Megamall-Mandaluyong.jpg', 'Available', '95.00', '2018-02-17 07:43:48', 788),
(2, 1, 1, 'KUYA J GRILLED SCALLOPS', 'Ang all-time favorite grilled scallops na puno ng cheese, garlic, butter topping.', 'Appetizer', '1518853532Grilled-Scallops-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '245.00', '2018-02-17 07:45:32', 593),
(3, 1, 1, 'Mangga Tuna Salad', 'A plate of crisp lettuce leaves, ripe mango slices, and tuna flakes. It''s definitely buffer in between eating Crispy Pata and Kare-Kare!', 'Soup/Vegetables', '1518855042Mangga-Tuna-Salad-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '180.00', '2018-02-17 08:10:42', 253),
(4, 1, 1, 'KUYA J LUMPIA PRESKO', 'SautÃ©ed crabmeat and bamboo shoots filling rolled in malunggay-infused wrapper with sweet garlic sauce.', 'Soup/Vegetables', '1518855149Lumpia-Presko-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '105.00', '2018-02-17 08:12:29', 294),
(5, 1, 1, 'CHORIZO DINAMITAS', 'Deep-fried pastry wrapped jalapeÃ±os with Cebu chorizo and cheddar cheese.', 'Appetizer', '1518855202Chorizo-Dinamitas-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '225.00', '2018-02-17 08:13:22', 258),
(6, 1, 1, 'PANCIT CANTON', 'Generous amounts of tender pork meat, shrimp, squid and squid balls na hinalo sa stir-fried egg noodles.', 'Noodles/and/Rice', '1518855239Pancit-Canton-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '180.00', '2018-02-17 08:13:59', 932),
(7, 1, 1, 'DANGGIT RICE', 'Sinangag na dinagdagan ng danggit bits, oil, chives at fried danggit.', 'Noodles/and/Rice', '1518855267Danggit-Rice-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '195.00', '2018-02-17 08:14:27', 484),
(8, 1, 1, 'HUMBINAGOONGAN RICE PLATTER', 'Sinangag with bagoong na topped with pork humba meat, green mangoes, bell peppers and red onions.', 'Appetizer', '1518854309Humba-Binagoongan-Rice-Platter-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '225.00', '2018-02-17 07:58:29', 688),
(9, 1, 1, 'PINAKBET', 'Kuya J version of the Filipino favorite gulay dish na carefully cooked para yummy and healthy.', 'Soup/Vegetables', '1518854349Pinakbet-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '180.00', '2018-02-17 07:59:09', 294),
(10, 1, 1, 'GRILLED TUNA BELLY', 'Classic inihaw na tuna belly marinated Filipino-style with soy sauce and calamansi.', 'Sizzlers/Grilled', '1518854388Grilled-Tuna-Belly-in-Chili-Sauce-from-Kuya-J-Restaurant-in-SM-Megamall-Mandaluyong.jpg', 'Available', '350.00', '2018-02-17 07:59:48', 404),
(11, 1, 1, 'POCHERO BULALO TAGALOG', 'Slow-cooked beef shanks in rich savory broth with mais, saging na saba, kamote, pechay, at Baguio beans.', 'Soup/Vegetables', '1518854512Pochero-Bulalo-Tagalog-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '395.00', '2018-02-17 08:01:52', 374),
(12, 1, 1, 'SIZZLING SISIG WITH EGG', 'The all-time Filipino favorite sizzling food! Crispy and crumbly chopped pork belly na hot na hot sa sarap.', 'Sizzlers/Grilled', '1518854557Sizzling-Sisig-with-Egg-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '235.00', '2018-02-17 08:02:37', 103),
(13, 1, 1, 'KUYA J CRISPY PATA', 'Ang specialty ni Kuya J! Deep-fried crispy pork skin with tender juicy pata meat. - Regular', 'Pork', '1518854913Crispy-Pata-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '549.00', '2018-02-17 08:08:33', 753),
(14, 3, 1, 'KUYA J TABLEA COFFEE FLAN', 'Batangas tablea flavored flan with coffee caramel topped with dried coconut sprinkles and cream.', 'Special', '1518854963Tablea-Coffee-Flan-Dessert-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '85.00', '2018-02-17 08:09:23', 881),
(15, 3, 1, 'KUYA J MANGO PANDAN', 'Ang classic panghimagas na favotire ni Kuya J! Creamy mango at pandan topped with pulled sugar.', 'Special', '1518855095Mango-Pandan-and-Cebuan-Mangga-Cheesecake-Desserts-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '85.00', '2018-02-17 08:11:35', 562),
(16, 3, 1, 'KUYA J UBE HALO-HALO ESPESYAL', 'Milky-smooth, ube-flavored ice na may katakam-takam na sangkap, topped with homemade leche flan, sprinkled with crunchy cornflakes, and drizzled with sweet ube cream.', 'Halo-Halo', '1518855200maxresdefault.jpg', 'Available', '109.00', '2018-02-17 08:13:20', 493),
(17, 1, 1, 'CRISPY BEEF TADYANG', 'Deep-fried tender beef na crispy on the outside and moist on the inside at pinasarap ng chili tuba sauce.', 'Beef', '1518855301ee2b9e7177b85ad75bde53530209a712.jpg', 'Available', '325.00', '2018-02-17 08:15:01', 772),
(18, 1, 1, 'KUYA J ROAST CHICKEN', 'Roasted chicken na may sweet & smoky barbecue flavor na surefire hit sa handaan.', 'Chicken', '1518855537Roasted_Chix20171211-25618-1pygkfn.jpg', 'Available', '455.00', '2018-02-17 08:18:57', 960),
(19, 1, 1, 'Chicken Halang-Halang', 'Chicken cooked tinola-style na may added creaminess of coconut milk and extra kick of spiciness ng green chili peppers.', 'Chicken', '1518857030HalangHalang640.jpg', 'Available', '285.00', '2018-02-17 08:43:50', 186),
(20, 1, 1, 'CHOPSUEY', 'Ang all-time favorite Filipino vegetable dish! Stir-fried vegetables with pork meat and chicken atay.', 'Soup/Vegetables', '1518857115img_5139.jpg', 'Available', '205.00', '2018-02-17 08:45:15', 916),
(21, 1, 1, 'Sinigang na Bangus', 'Home-cooked sinigang na bangus served with green vegetables.', 'Soup/Vegetables', '1518857175IMG_5949.JPG', 'Available', '265.00', '2018-02-17 08:46:15', 180),
(22, 2, 1, 'ICED TEA PITCHER', '', 'Tea', '1518857242kuya-j.jpg', 'Available', '125.00', '2018-02-17 08:47:22', 617),
(23, 1, 1, 'Plain Rice', 'PLAIN RICE', 'Noodles/and/Rice', '1518857324parboiled-rice-for-polow-1.jpg', 'Available', '45.00', '2018-02-17 08:48:44', 856),
(24, 1, 1, 'AMPALAYA CON CARNE', 'Stir-fried ampalaya and tender beef strips seasoned in thick, brown tasty sauce.', 'Soup/Vegetables', '1518857425IMG_3888.jpg', 'Available', '210.00', '2018-02-17 08:50:25', 131),
(25, 1, 1, 'BICOL EXPRESS', 'Ang sikat na Bicol dish ala Kuya J! Ginisang karneng baboy with chillies, spices, and rich coconut cream.', 'Pork', '1518857504Bicol-Express.png', 'Available', '280.00', '2018-02-17 08:51:44', 116),
(26, 1, 1, 'LUMPIA PRITO', 'Fried seasoned pork-filled spring rolls na pinasarap ng Kuya J dipping sauce.', 'Appetizer', '1518857629Filipino-Lumpia-Style-Pork-and-Shrimp-Spring-Rolls.jpg', 'Available', '175.00', '2018-02-17 08:53:49', 570),
(27, 1, 1, 'SINIGANG NA BABOY', 'Classic pork sinigang na sakto sa asim at sobra sa sarap.', 'Soup/Vegetables', '15188569660124 015.JPG', 'Available', '270.00', '2018-02-17 08:42:46', 465),
(28, 2, 1, 'CUCUMBER SHAKE', '', 'Shake', '1518857479KUYA J RESTAURANT 14.jpg', 'Available', '95.00', '2018-02-17 08:51:19', 397),
(29, 2, 1, 'WATERMELON SHAKE', '', 'Shake', '151885751520150322_115256.jpg', 'Available', '95.00', '2018-02-17 08:51:55', 969),
(30, 3, 1, 'KUYA J MANGO PANDAN', 'Ang classic panghimagas na favotire ni Kuya J! Creamy mango at pandan topped with pulled sugar.', 'Special', '1518857625Untitled.png', 'Available', '85.00', '2018-02-17 08:53:45', 856),
(31, 1, 3, 'BrianÊ¼s Ribs', 'Once you taste me, youâ€™ll never forget meâ€ Our best seller! Baked pork ribs with a sweet, tangy piquet sauce served with rice, corn and carrots.', 'Pork', '1518888293Brians-Back.jpg', 'Available', '228.00', '2018-02-17 17:24:53', 211),
(32, 1, 3, 'Peter''s Pork Steak', 'Grilled pork steak, lightly seasoned and served with vegetable medley and harvest rice', 'Sizzlers/Grilled', '1518888830P1020631+copy.jpg', 'Available', '228.00', '2018-02-17 17:33:50', 602),
(33, 1, 3, 'Roasted Seasoned Chicken', 'Chicken quarter spiced with our secret spices, roasted and served with mashed potato and vegetable medley', 'Chicken', '1518889306Brians-Back.jpg', 'Available', '188.00', '2018-02-17 17:41:46', 504),
(34, 1, 3, 'Chicken Fried Chicken', 'Battered chicken breast fillet, lightly fried and topped with cream gravy and served with mashed potatoes and Vegetable medley.', 'Chicken', '1518889442thumb_600.jpg', 'Available', '188.00', '2018-02-17 17:44:02', 730),
(35, 1, 3, 'David Dean''s Tenderloin', 'Some like me rare. Others like me medium but itâ€™s up to you if you like me done well. Single USDA steak on top of a mound of mashed potatoes and topped with cheese. Served with brown sauce and garnished with fried onions and roasted almonds', 'Beef', '1518889531Casa-Verde_Ayala-Terraces_Cebu_3.JPG', 'Available', '235.00', '2018-02-17 17:45:31', 481),
(36, 1, 3, 'Jon Jay''s Steak and Pasta', 'Youâ€™ll need a fork and knife to finish us both. Marinated USDA steak served with brown sauce and a side of spaghetti noodles sautÃ©ed in olive oil and garlic.', 'Pork', '1518889636casaverdejonjayssteaknpasta.jpg', 'Available', '235.00', '2018-02-17 17:47:16', 551),
(37, 1, 3, 'Tricia ala Pobre', 'Grilled fish fillet topped with garlic bits together with rice and vegetable medley.', 'Fish', '15188907449215746753_d405783493_b.jpg', 'Available', '178.00', '2018-02-17 18:05:44', 795),
(38, 1, 3, 'Ting-Tingâ€™s Tavern Shrimp', 'Item\r\nTing-Tingâ€™s Tavern Shrimp\r\nEight would be great if you ate â€¦..Delicious butterflied and lightly crusted in breadcrumbs and fried â€˜til golden. Served with our own tartar sauce paired with harvest rice and seasoned vegetables.', 'Fish', '1518890793thumb_600 (1).jpg', 'Available', '198.00', '2018-02-17 18:06:33', 648),
(39, 1, 3, 'Rice', '', 'Noodles/and/Rice', '1518890892KERALA-MEALS-PLAIN-RICE-WHITE.jpg', 'Available', '35.00', '2018-02-17 18:08:12', 996),
(40, 3, 3, 'Death by Chocolate', 'This dessert is to die for- chocolate and nutty rocky road ice cream mixed with chocolate bits on a bed of chocolate cookie crust. Drizzled with chocolate syrup.', 'Ice Cream', '1518890985b4ea47c84ed4489ec4033bae476c0777.jpg', 'Available', '158.00', '2018-02-17 18:09:45', 873),
(41, 3, 3, 'Bliss O'' Berry', 'A one of a kind cheesecake that literally melts in your mouth. Home-made ice cream based cheesecake paired with strawberry compote.', 'Special', '1518891049download (1).jpg', 'Available', '218.00', '2018-02-17 18:10:49', 118),
(42, 3, 3, 'Victorâ€™s Peak', 'Height does matter , finishing me will be harder. Peanut butter cookie bits, chopped nuts, chocolate fudge and peanut butter layered in chocolate and vanilla ice cream on top of a chocolate cookie crust. ', 'Special', '1518891094casa5.jpg', 'Available', '240.00', '2018-02-17 18:11:34', 727),
(43, 3, 3, 'Lauren''s Lava', 'Some say Iâ€™m cold, but handle me with care coz Iâ€™m hot to holdâ€¦ Chocolate cake filled with oozing chocolate lava. Topped with vanilla ice cream and covered in a crunchy chocolate shell. ', 'Special', '1518891174download (2).jpg', 'Available', '155.00', '2018-02-17 18:12:54', 389),
(44, 2, 3, 'Iced Tea', 'Serving\r\nGlass 40.00 Pitcher 125.00 Bottomless 65.00', 'Tea', '1518891254download (3).jpg', 'Available', '125.00', '2018-02-17 18:14:14', 965),
(45, 2, 3, 'Juice', 'Mango Pineapple Watermelon Pineapple-Orange Four Seasons Calamansi\r\n', 'Juice', '1518891419Fruit-Juices.jpg', 'Available', '80.00', '2018-02-17 18:16:59', 414),
(46, 2, 3, 'John''s Mix', 'Orange and pineapple juice mixed with Sprite and grenadine', 'Juice', '1518891465thumb_600 (3).jpg', 'Available', '75.00', '2018-02-17 18:17:45', 498),
(47, 3, 3, 'Milky Way', 'The biggest milkshake in town! Imagine a large chocolaty shake good for you and your partner. Best served with Big Bang Burger. Limited! Please ask your server for its availability.', 'Special', '1518891537casa verde milkyway.jpg', 'Available', '298.00', '2018-02-17 18:18:57', 853),
(48, 1, 3, 'The Big Bang Burger', '9-inch burger topped with onions, tomatoes, lettuce, mayo, American cheese on a sesame-seed bun. Sharing recommended.', 'Appetizer', '1518891589photo-1.jpg', 'Available', '408.00', '2018-02-17 18:19:49', 456),
(49, 1, 3, 'Bacon Cheese & Mushroom', 'Juicy beef patty topped with white cheese, bacon & mushroom', 'Appetizer', '151889165913315257_10154167014738774_879608071545030221_n20171211-25618-aew776.jpg', 'Available', '198.00', '2018-02-17 18:20:59', 548),
(50, 1, 3, 'Seafood Carbonara', 'A must try dish! Treasure from the sea- shrimps and squid in rich creamy white sauce.', 'Soup/Vegetables', '15188917253580712221_c66036cc95_z.jpg', 'Available', '188.00', '2018-02-17 18:22:06', 989),
(51, 1, 3, 'Victoria''s Secret Spaghetti', 'Do you want to know my secret? Home-made meat sauce topped with oozing cheese. A treat for the young and old.', 'Noodles/and/Rice', '1518891813tumblr_inline_n2sbxj45z51riyq8k.jpg', 'Available', '160.00', '2018-02-17 18:23:33', 751);

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

CREATE TABLE `menu_category` (
  `mc_id` int(11) NOT NULL,
  `mc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`mc_id`, `mc_name`) VALUES
(1, 'Main Course'),
(2, 'Beverages'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `date_time_sent` varchar(255) NOT NULL,
  `date_time_receive` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `mes_status` varchar(255) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `time_receive` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `customer_id`, `restaurant_id`, `reservation_id`, `order_id`, `message_id`, `time_receive`, `status`) VALUES
(1, 1, 1, 1, NULL, NULL, '2018-02-17 09:40:34', 1),
(2, 1, 1, 2, NULL, NULL, '2018-02-17 10:02:51', 1),
(3, 2, 1, 3, NULL, NULL, '2018-02-17 15:49:49', 1),
(4, 2, 1, 4, NULL, NULL, '2018-02-18 08:50:33', 0),
(5, 2, 3, 5, NULL, NULL, '2018-02-18 09:45:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `order_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` varchar(255) DEFAULT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Queueing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `reservation_id`, `customer_id`, `restaurant_id`, `order_time`, `order_status`, `total_price`, `order_number`, `payment_id`, `hash`, `status`) VALUES
(1, 31456, 1, 1, '2018-02-17 09:44:25', '1', '5121.00', '15399', 'PAY-6H903408CF900690VLKD73DQ', 'd6ee14f2b1fd12a5359b5aeba3d9e9d6', 'Served'),
(2, 18589, 1, 1, '2018-02-17 10:23:34', '1', '11771.00', '16761', 'PAY-2PM85741CV089511KLKEAFKI', '8584f3425df337e4de9d377caf2c073d', 'Served');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `menu_id`, `order_id`, `order_qty`) VALUES
(1, 2, 1, 2),
(2, 3, 1, 5),
(3, 5, 1, 6),
(4, 16, 1, 9),
(5, 25, 1, 5),
(6, 14, 2, 3),
(7, 13, 2, 9),
(8, 21, 2, 5),
(9, 22, 2, 3),
(10, 17, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `point_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `total_points` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `promo_id` int(11) NOT NULL,
  `promo_name` varchar(255) NOT NULL,
  `promo_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promo_id`, `promo_name`, `promo_desc`) VALUES
(1, 'Birthday Freebies', 'Your customer(s) can have a free meal/free dessert on their birthday.'),
(2, 'Promo Points', 'For every meal your customer(s) order they will earn 1 point, and for every 100 points they earned, they can exchange it for a 20% discount for 1 meal.'),
(3, 'The more the merrier', 'Free 1 meal for those customers who''ll be bringing more than 12 people with them'),
(4, 'TGIF Freebies', '10% discount every Friday night for every meal ordered.'),
(5, 'Sharing is loving', 'As a restaurant owner, you can give a free meals for the homeless people.');

-- --------------------------------------------------------

--
-- Table structure for table `promo_restaurant`
--

CREATE TABLE `promo_restaurant` (
  `pr_id` int(11) NOT NULL,
  `promo_id` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Avail'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo_restaurant`
--

INSERT INTO `promo_restaurant` (`pr_id`, `promo_id`, `restaurant_id`, `status`) VALUES
(1, '4', 1, 'Avail'),
(2, '5', 1, 'Avail'),
(3, '1', 1, 'Avail'),
(4, '3', 1, 'Avail'),
(5, '2', 1, 'Avail');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_number` varchar(200) NOT NULL,
  `reservation_date` varchar(255) NOT NULL,
  `reservation_time` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `res_status` varchar(255) DEFAULT 'Pending',
  `spec_reqs` varchar(255) DEFAULT NULL,
  `no_of_guests` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_number`, `reservation_date`, `reservation_time`, `created`, `res_status`, `spec_reqs`, `no_of_guests`, `restaurant_id`, `customer_id`, `table_id`) VALUES
(2, '18589', 'February 18, 2018', '2:30 PM', '2018-02-17 10:02:51', 'Reserved', 'Tets 2', '100', 1, 1, 0),
(4, '13648', 'February 19, 2018', '12:30 PM', '2018-02-18 08:50:32', 'Pending', 'asdada', '17', 1, 2, 0),
(5, '15910', 'February 18, 2018', '10:00 AM', '2018-02-18 09:45:41', 'Reserved', 'qweqwe', '25', 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `restaurant_desc` text,
  `restaurant_addr` varchar(255) DEFAULT NULL,
  `restaurant_contact` varchar(255) DEFAULT NULL,
  `max_capacity` varchar(255) NOT NULL,
  `hour_open` varchar(255) DEFAULT NULL,
  `hour_close` varchar(255) DEFAULT NULL,
  `rate_comm` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `owner_fname` varchar(255) DEFAULT NULL,
  `owner_mname` varchar(255) DEFAULT NULL,
  `owner_lname` varchar(255) DEFAULT NULL,
  `owner_contact` varchar(255) DEFAULT NULL,
  `owner_email` varchar(255) DEFAULT NULL,
  `owner_address` varchar(255) DEFAULT NULL,
  `restaurant_logo` varchar(255) DEFAULT NULL,
  `restaurant_status` tinyint(4) DEFAULT '0',
  `sub_date` varchar(255) NOT NULL,
  `sub_exp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `sub_id`, `restaurant_name`, `restaurant_desc`, `restaurant_addr`, `restaurant_contact`, `max_capacity`, `hour_open`, `hour_close`, `rate_comm`, `lat`, `lng`, `username`, `password`, `owner_fname`, `owner_mname`, `owner_lname`, `owner_contact`, `owner_email`, `owner_address`, `restaurant_logo`, `restaurant_status`, `sub_date`, `sub_exp`) VALUES
(1, 3, 'Kuya J', 'KATAKAM-TAKAM NA KUWENTO NI KUYA J\r\n\r\n\r\n\r\n\r\nKuya J Restaurant, formerly known as â€œAng Kan-anan ni Kuya J,â€ started as a humble eatery along the streets of Cebu. But with Kuya Jâ€™s undeniably delicious dishes, mouthwatering words of recommendation quickly spread into every Cebuanosâ€™ palate. With that, Kuya J instantly became one of the well-loved restaurants in Cebu. \r\n\r\nToday, Kuya J continues to satisfy every Filipinoâ€™s appetite nationwide. Using only the freshest ingredients available, Kuya J cooks up a storm of delicious Pinoy food in every corner of the Philippines.\r\n\r\nTHE BLOCKBUSTER BIDA\r\n\r\nJericho Rosales is one of the award-winning drama actors in the country and the best Kuya to his family. \r\n\r\nWhatâ€™s very inspiring about him is his trait of always putting his heart into everything that he does, especially when touching peopleâ€™s lives.\r\n\r\nThis is why Echo is the perfect endorser for Kuya J.', 'Corner Tojong Street, 15 N Escario St, Lungsod ng Cebu, 6000 ', '09989624269', '100', '09:00', '21:00', NULL, 10.3188, 123.902, 'admin', 'admin', 'Mickale', 'Lapasanda', 'Saturre', '09165970601', 'saturre.mic2@gmail.com', 'Saint Bernard Southern Leyte', '151825301515174728091517414973151733665615166037981512156053kuyaj.png', 1, '2018-01-31 2:21:52', '2019-01-31 2:21:52'),
(3, 2, 'Casa Verde', 'Established in August 2002, CASA VERDE is a chain of family-owned restaurants in Cebu City. Spanish for "green house", CASA VERDE''s name was influenced by the owners'' Spanish roots and the color of the Ramos Branch, which used to be one of the family''s ancestral homes. \r\n\r\nOriginally, the Ramos Branch was supposed to be just a small canteen that catered to the residents of the 2nd floor dormitory and some students from nearby colleges. Through word-of-mouth and recommendations by family and friends, the humble canteen soon became a full-scale restaurant. After almost a decade and three branches later, CASA VERDE has grown into one of Cebu''s most popular dining destinations. \r\n\r\n"Value for Money" has always been the restaurant''s philosophy. CASA VERDE believes that everyone deserves to enjoy great food and quality service at reasonable prices in a comfortable atmosphere. It''s casual dining at its best. \r\n\r\nCASA VERDE is the perfect place to let your hair down and enjoy a steak or two with family and friends. The ambiance is simple and casual, with knickknacks and collectibles from the personal collections of the owners. It''s also interesting to note that all of the restaurant''s signature dishes are named after some members of the family. We bring homestyle comfort food to the next level. \r\n\r\nThe next time you''re in the mood for some good food, head on down to the CASA VERDE branch nearest you and try our best-selling ribs, mouth-watering steaks, sumptuous pasta, and sinful desserts. It''s a dining experience that truly exceeds expectations. ', '#69 Lim Tian Teng Street, Ramos, Cebu City, Philippines, 6000', '+63 32 253.6472', '300', '10:00', '22:00', NULL, 37.2266, -95.7052, 'admin2', 'admin2', 'Gian Carlo', 'S', 'Cataraja', '09265976739', 'casaverdetest@gmail.com', 'Cebu City', '1518886223casa-verde-logo-679x410.jpg', 1, '2018-02-18 12:00:15', '2018-08-18 12:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `sched_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `sched_sdate` varchar(255) NOT NULL,
  `sched_stime` varchar(255) NOT NULL,
  `sched_edate` varchar(255) NOT NULL,
  `sched_etime` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `schedule_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `restaurant_id`, `sched_sdate`, `sched_stime`, `sched_edate`, `sched_etime`, `status`, `created`, `schedule_number`) VALUES
(19, 1, 'February 19, 2018', '10:30 AM', 'February 19, 2018', '11:30 AM', '0', '2018-02-18 08:16:32', 1727),
(20, 3, 'February 18, 2018', '10:30 AM', 'February 18, 2018', '12:30 PM', '0', '2018-02-18 09:45:03', 753);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_price` decimal(8,2) NOT NULL,
  `sub_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`sub_id`, `sub_name`, `sub_price`, `sub_status`) VALUES
(1, 'Monthly', '500.00', 0),
(2, 'Quarterly', '1000.00', 0),
(3, 'Yearly', '1500.00', 0),
(4, 'Free Subscription', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `table_num` varchar(255) NOT NULL,
  `maxcapacity` varchar(255) NOT NULL,
  `mincapacity` varchar(255) NOT NULL,
  `area_desc` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_num`, `maxcapacity`, `mincapacity`, `area_desc`, `restaurant_id`, `image`, `status`) VALUES
(1, '5', '5', '4', 'Near the somewhere', 1, '15188579841a.jpg', 0),
(2, '1', '5', '4', 'Behind table 2', 1, '15188580683.jpg', 0),
(3, '8', '10', '8', 'Center table beside table 9', 1, '15188581028f54d6ed35b2bdfc5a0e0aad7916d3ea_1464795678.jpg', 0),
(4, '6', '12', '6', 'Center Table', 1, '1518858523JustMom-kuya-j-restaurant-stuff.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `checkbox` varchar(255) DEFAULT NULL,
  `datet` varchar(255) DEFAULT NULL,
  `timet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `checkbox`, `datet`, `timet`) VALUES
(8, 'Promo1,', NULL, NULL),
(9, 'Promo1,Promo2,', NULL, NULL),
(10, 'Promo1,Promo2,Promo3,', NULL, NULL),
(11, 'Promo1,Promo2,Promo3,Promo4,', NULL, NULL),
(12, 'Promo1,', NULL, NULL),
(13, 'Promo1,Promo2,', NULL, NULL),
(14, 'Promo1,Promo2,Promo3,', NULL, NULL),
(15, 'Promo1,', NULL, NULL),
(16, 'Promo1,Promo2,', NULL, NULL),
(17, 'Promo1,Promo2,', NULL, NULL),
(18, 'Promo3,Promo4,', NULL, NULL),
(19, 'Promo2,Promo3,', NULL, NULL),
(20, NULL, '2018-01-30', 'Send'),
(21, NULL, '2018-02-01', '22:30'),
(22, NULL, '2018-02-01', '22:30'),
(23, NULL, '2018-02-01', '22:30'),
(24, NULL, '2018-02-01', '22:30'),
(25, NULL, '2018-02-01', '22:30'),
(26, NULL, '2018-02-01', '22:30'),
(27, NULL, '2018-02-01', '22:30'),
(28, NULL, '2018-02-01', '22:30'),
(29, NULL, '2018-02-01', '22:30'),
(30, NULL, '2018-02-01', '22:30'),
(31, NULL, '2018-02-01', '22:30'),
(32, NULL, '01/31/2018', '2:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `restaurant_id`, `payment_id`, `total_price`, `hash`, `complete`) VALUES
(1, 2, 'PAY-4MN88044E6987531PLKEFCSA', '1000.00', 'f6dcfd1efa7ecda10fe8f704022828da', 0),
(2, 3, 'PAY-3SU342947X986640ULKEFDEQ', '1000.00', '1ac6562cc74f9b4416739d45c8849508', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visit_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `visit_count` int(255) NOT NULL DEFAULT '0',
  `last_visited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visit_id`, `restaurant_id`, `customer_id`, `visit_count`, `last_visited`) VALUES
(4, 1, 2, 8, '2018-02-18 08:50:14'),
(7, 3, 2, 5, '2018-02-18 09:45:19'),
(8, 3, 1, 2, '2018-02-17 19:26:54'),
(9, 1, 1, 1, '2018-02-17 19:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combo_meals`
--
ALTER TABLE `combo_meals`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `staff_number` (`staff_number`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_number` (`event_number`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_number` (`order_number`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`point_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `promo_restaurant`
--
ALTER TABLE `promo_restaurant`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `reservation_number` (`reservation_number`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`sched_id`),
  ADD UNIQUE KEY `schedule_number` (`schedule_number`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `restaurant_id_2` (`restaurant_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `combo_meals`
--
ALTER TABLE `combo_meals`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `promo_restaurant`
--
ALTER TABLE `promo_restaurant`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;