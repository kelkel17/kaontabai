-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 11:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_name`) VALUES
(1, 'admin', 'admin', 'Godwin');

-- --------------------------------------------------------

--
-- Table structure for table `combo_meals`
--

CREATE TABLE `combo_meals` (
  `cm_id` int(11) NOT NULL,
  `menu_id` varchar(255) DEFAULT NULL,
  `menu_temp` varchar(255) DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(8,2) NOT NULL,
  `price_temp` varchar(255) DEFAULT NULL,
  `cm_desc` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cm_name` varchar(255) NOT NULL,
  `cm_number` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo_meals`
--

INSERT INTO `combo_meals` (`cm_id`, `menu_id`, `menu_temp`, `restaurant_id`, `created`, `price`, `price_temp`, `cm_desc`, `image`, `cm_name`, `cm_number`, `status`) VALUES
(1, '1,2,3', '95.00,245.00,180.00', 1, '2018-03-04 12:38:38', '1528.00', '520', '                                                    SAVE: 81 Pesos                                                ', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(2, '19', NULL, 1, '2018-02-17 08:45:07', '1528.00', '', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(3, '20', NULL, 1, '2018-02-17 08:45:07', '1528.00', '', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(4, '21', NULL, 1, '2018-02-17 08:45:07', '1528.00', '', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(5, '22', NULL, 1, '2018-02-17 08:45:07', '1528.00', '', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(6, '23', NULL, 1, '2018-02-17 08:45:07', '1528.00', '', 'SAVE: 81 Pesos', '1518857107salo-salo-1-2.jpg', 'Salo-Salo 1', 552, 'Available'),
(7, '4,5,6', '105.00,225.00,180.00', 1, '2018-03-04 12:47:04', '1435.00', '510', '                                                    Save: 74 Pesos                                                ', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(8, '13', NULL, 1, '2018-02-17 08:46:16', '1435.00', '', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(9, '21', NULL, 1, '2018-02-17 08:46:16', '1435.00', '', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(10, '22', NULL, 1, '2018-02-17 08:46:16', '1435.00', '', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(11, '23', NULL, 1, '2018-02-17 08:46:16', '1435.00', '', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(12, '24', NULL, 1, '2018-02-17 08:46:16', '1435.00', '', 'Save: 74 Pesos', '1518857176salo-salo-1-2.jpg', 'Salo-Salo 2', 149, 'Available'),
(19, '1,2,3', '95.00,245.00,180.00,105.00,225.00,180.00', 1, '2018-03-04 13:03:48', '1380.00', '1030', '                                                    Save: 75 Pesos                                                ', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(20, '9', NULL, 1, '2018-02-17 08:48:20', '1380.00', '', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(21, '18', NULL, 1, '2018-02-17 08:48:20', '1380.00', '', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(22, '22', NULL, 1, '2018-02-17 08:48:20', '1380.00', '', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(23, '23', NULL, 1, '2018-02-17 08:48:20', '1380.00', '', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(24, '27', NULL, 1, '2018-02-17 08:48:20', '1380.00', '', 'Save: 75 Pesos', '1518857300salo-salo-3-4.jpg', 'Salo-Salo 4', 678, 'Available'),
(29, '31,32,33', NULL, 3, '2018-02-20 22:24:51', '800.00', '', 'Casa Verde\'s Combo Meal 1', '1519165491img_4508.jpg', 'Combo Meal 1', 865, 'Available'),
(30, '32', NULL, 3, '2018-02-20 18:17:14', '800.00', '', 'Casa Verde\'s Combo Meal 1', '151915063414700186347_bdab564c00_b.jpg', 'Combo Meal 1', 865, 'Available'),
(31, '33', NULL, 3, '2018-02-20 18:17:14', '800.00', '', 'Casa Verde\'s Combo Meal 1', '151915063414700186347_bdab564c00_b.jpg', 'Combo Meal 1', 865, 'Available'),
(32, '79', NULL, 13, '2018-02-25 07:15:16', '100.00', '', 'Here', '1519542916clock-symbol-icon-63652.png', 'Sample', 7052, 'Available'),
(33, '79', NULL, 13, '2018-02-25 07:28:10', '300.00', '', 'Consist of 5 meals', '1519543690restaurant-512.png', 'Sample 2', 333, 'Available'),
(34, '93,95,99', NULL, 15, '2018-02-25 12:38:26', '400.00', '', 'Tinulang Manok, Baked Scallops and Calamares', NULL, 'Combo Meal 1', 4007, 'Available'),
(35, '98,100,101', NULL, 15, '2018-02-25 12:39:10', '400.00', '', 'Kinilaw, Spicy Scallops and Cordova Express', NULL, 'Combo Meal 2', 4497, 'Available'),
(36, '102,104,111', NULL, 16, '2018-02-25 13:31:13', '800.00', '', 'Flat iron steak, Chorizo Squid with Banana Flambee', NULL, 'Combo Meal 1', 6889, 'Available'),
(37, '103,106,108', NULL, 16, '2018-02-25 13:31:53', '400.00', '', 'Chicken Tartufo and Scallops with Cremebule', NULL, 'Combo Meal 2', 1732, 'Available'),
(38, '66,67,68,77,78', NULL, 12, '2018-02-28 16:57:08', '235.00', '', 'TEst', NULL, 'Test1', 8508, 'Available'),
(39, '38', NULL, 12, '2018-02-28 16:56:14', '235.00', '', 'Test2                                       ', NULL, 'Test1', 66, 'Available');

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
(2, 'Francis Godwin', 'Margaja', 'Montealto', 'Balamban', '09234567', 'godwin@gmail.com', 'Male', '1997-02-13', 'Active', '12345', '151954335717842315_1267121283342741_1334223570_n.jpg', '2018-02-12 17:15:46'),
(3, 'Mickale', 'Lapasanda', 'Saturre', 'Saint Bernard Southern Leyte2', '09165970601', 'saturre.mic2@gmail.com', 'Male', '2018-03-21', 'Active', '$2y$10$RsWXxdnk55yudr3C5PCIyeAYb2abLrx2aOvT7QL1NXPbY99eigR42', '1519846316Koala.jpg', '2018-02-28 18:10:26'),
(4, 'Godwin', 'Margaja', 'Montealto', 'Aliwanay Balamban Cebu', '099674777532', 'godwinmontealto@gmail.com', 'Male', '2121-12-11', 'Active', '$2y$10$Z.EEPgeoGvfx.nm8qmBNNuWUjUt08dOTe104hLdAhSogarOKRo3cm', '', '2018-03-03 03:10:50');

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
(1, 1, 624, 'Mickale', 'Lapasanda', 'Saturre', 'Saint Bernard', '09165970601', 'Male', '12356421', 'mickale1234', '12345', 'Active', NULL),
(2, 13, 1720, 'Francis', 'CisGod', 'Godwin', 'Aliwanay Balamban Cebu', '092827272', 'Male', '2030', 'staff1', 'staff1', 'Deactivate', NULL);

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
(1, 1, 'Event 1', 'February 18, 2018', 'Cebu City', '2:30 PM', 'Event 1', 'Open', '2018-02-18 07:28:39', 946),
(4, 3, 'Rules of Survival', 'February 27, 2018', 'Voyager Internet Cafe', '8:00 AM', 'Duwa ta after defend', 'Open', '2018-02-20 15:53:42', 1783),
(5, 13, 'Sample Event', '2/28/2018', 'Cebu Colosium', '11:30 AM', 'Gathering', 'Open', '2018-02-25 07:14:32', 1250);

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
  `menu_number` int(255) NOT NULL,
  `pieces` varchar(255) DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `mc_id`, `restaurant_id`, `m_name`, `m_desc`, `m_category`, `m_image`, `m_status`, `m_price`, `created`, `menu_number`, `pieces`, `volume`) VALUES
(1, 2, 1, 'KUYA J FRUIT SHAKE SPECIAL', '', 'Shake', '1518853428Kuya-J-Fruit-Shake-Special-SM-Megamall-Mandaluyong.jpg', 'Available', '95.00', '2018-02-20 16:05:58', 788, NULL, NULL),
(2, 1, 1, 'KUYA J GRILLED SCALLOPS', 'Ang all-time favorite grilled scallops na puno ng cheese, garlic, butter topping.', 'Appetizer', '1518853532Grilled-Scallops-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '245.00', '2018-02-17 07:45:32', 593, NULL, NULL),
(3, 1, 1, 'Mangga Tuna Salad', 'A plate of crisp lettuce leaves, ripe mango slices, and tuna flakes. It\'s definitely buffer in between eating Crispy Pata and Kare-Kare!', 'Soup/Vegetables', '1518855042Mangga-Tuna-Salad-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '180.00', '2018-02-17 08:10:42', 253, NULL, NULL),
(4, 1, 1, 'KUYA J LUMPIA PRESKO', 'SautÃ©ed crabmeat and bamboo shoots filling rolled in malunggay-infused wrapper with sweet garlic sauce.', 'Soup/Vegetables', '1518855149Lumpia-Presko-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '105.00', '2018-02-17 08:12:29', 294, NULL, NULL),
(5, 1, 1, 'CHORIZO DINAMITAS', 'Deep-fried pastry wrapped jalapeÃ±os with Cebu chorizo and cheddar cheese.', 'Appetizer', '1518855202Chorizo-Dinamitas-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '225.00', '2018-02-17 08:13:22', 258, NULL, NULL),
(6, 1, 1, 'PANCIT CANTON', 'Generous amounts of tender pork meat, shrimp, squid and squid balls na hinalo sa stir-fried egg noodles.', 'Noodles/and/Rice', '1518855239Pancit-Canton-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '180.00', '2018-02-17 08:13:59', 932, NULL, NULL),
(7, 1, 1, 'DANGGIT RICE', 'Sinangag na dinagdagan ng danggit bits, oil, chives at fried danggit.', 'Noodles/and/Rice', '1518855267Danggit-Rice-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '195.00', '2018-02-17 08:14:27', 484, NULL, NULL),
(8, 1, 1, 'HUMBINAGOONGAN RICE PLATTER', 'Sinangag with bagoong na topped with pork humba meat, green mangoes, bell peppers and red onions.', 'Appetizer', '1518854309Humba-Binagoongan-Rice-Platter-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '225.00', '2018-02-17 07:58:29', 688, NULL, NULL),
(9, 1, 1, 'PINAKBET', 'Kuya J version of the Filipino favorite gulay dish na carefully cooked para yummy and healthy.', 'Soup/Vegetables', '1518854349Pinakbet-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '180.00', '2018-02-17 07:59:09', 294, NULL, NULL),
(10, 1, 1, 'GRILLED TUNA BELLY', 'Classic inihaw na tuna belly marinated Filipino-style with soy sauce and calamansi.', 'Sizzlers/Grilled', '1518854388Grilled-Tuna-Belly-in-Chili-Sauce-from-Kuya-J-Restaurant-in-SM-Megamall-Mandaluyong.jpg', 'Available', '350.00', '2018-02-17 07:59:48', 404, NULL, NULL),
(11, 1, 1, 'POCHERO BULALO TAGALOG', 'Slow-cooked beef shanks in rich savory broth with mais, saging na saba, kamote, pechay, at Baguio beans.', 'Soup/Vegetables', '1518854512Pochero-Bulalo-Tagalog-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '395.00', '2018-02-17 08:01:52', 374, NULL, NULL),
(12, 1, 1, 'SIZZLING SISIG WITH EGG', 'The all-time Filipino favorite sizzling food! Crispy and crumbly chopped pork belly na hot na hot sa sarap.', 'Sizzlers/Grilled', '1518854557Sizzling-Sisig-with-Egg-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '235.00', '2018-02-17 08:02:37', 103, NULL, NULL),
(13, 1, 1, 'KUYA J CRISPY PATA', 'Ang specialty ni Kuya J! Deep-fried crispy pork skin with tender juicy pata meat. - Regular', 'Pork', '1518854913Crispy-Pata-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '549.00', '2018-02-17 08:08:33', 753, NULL, NULL),
(14, 3, 1, 'KUYA J TABLEA COFFEE FLAN', 'Batangas tablea flavored flan with coffee caramel topped with dried coconut sprinkles and cream.', 'Special', '1518854963Tablea-Coffee-Flan-Dessert-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '85.00', '2018-02-17 08:09:23', 881, NULL, NULL),
(15, 3, 1, 'KUYA J MANGO PANDAN', 'Ang classic panghimagas na favotire ni Kuya J! Creamy mango at pandan topped with pulled sugar.', 'Special', '1518855095Mango-Pandan-and-Cebuan-Mangga-Cheesecake-Desserts-from-Kuya-J-Restaurant-SM-Megamall-Mandaluyong.jpg', 'Available', '85.00', '2018-02-17 08:11:35', 562, NULL, NULL),
(16, 3, 1, 'KUYA J UBE HALO-HALO ESPESYAL', 'Milky-smooth, ube-flavored ice na may katakam-takam na sangkap, topped with homemade leche flan, sprinkled with crunchy cornflakes, and drizzled with sweet ube cream.', 'Halo-Halo', '1518855200maxresdefault.jpg', 'Available', '109.00', '2018-02-17 08:13:20', 493, NULL, NULL),
(17, 1, 1, 'CRISPY BEEF TADYANG', 'Deep-fried tender beef na crispy on the outside and moist on the inside at pinasarap ng chili tuba sauce.', 'Beef', '1518855301ee2b9e7177b85ad75bde53530209a712.jpg', 'Available', '325.00', '2018-02-17 08:15:01', 772, NULL, NULL),
(18, 1, 1, 'KUYA J ROAST CHICKEN', 'Roasted chicken na may sweet & smoky barbecue flavor na surefire hit sa handaan.', 'Chicken', '1518855537Roasted_Chix20171211-25618-1pygkfn.jpg', 'Available', '455.00', '2018-02-17 08:18:57', 960, NULL, NULL),
(19, 1, 1, 'Chicken Halang-Halang', 'Chicken cooked tinola-style na may added creaminess of coconut milk and extra kick of spiciness ng green chili peppers.', 'Chicken', '1518857030HalangHalang640.jpg', 'Available', '285.00', '2018-02-17 08:43:50', 186, NULL, NULL),
(20, 1, 1, 'CHOPSUEY', 'Ang all-time favorite Filipino vegetable dish! Stir-fried vegetables with pork meat and chicken atay.', 'Soup/Vegetables', '1518857115img_5139.jpg', 'Available', '205.00', '2018-02-17 08:45:15', 916, NULL, NULL),
(21, 1, 1, 'Sinigang na Bangus', 'Home-cooked sinigang na bangus served with green vegetables.', 'Soup/Vegetables', '1518857175IMG_5949.JPG', 'Available', '265.00', '2018-02-17 08:46:15', 180, NULL, NULL),
(22, 2, 1, 'ICED TEA PITCHER', '', 'Tea', '1518857242kuya-j.jpg', 'Available', '125.00', '2018-02-17 08:47:22', 617, NULL, NULL),
(23, 1, 1, 'Plain Rice', 'PLAIN RICE', 'Noodles/and/Rice', '1518857324parboiled-rice-for-polow-1.jpg', 'Available', '45.00', '2018-02-17 08:48:44', 856, NULL, NULL),
(24, 1, 1, 'AMPALAYA CON CARNE', 'Stir-fried ampalaya and tender beef strips seasoned in thick, brown tasty sauce.', 'Soup/Vegetables', '1518857425IMG_3888.jpg', 'Available', '210.00', '2018-02-17 08:50:25', 131, NULL, NULL),
(25, 1, 1, 'BICOL EXPRESS', 'Ang sikat na Bicol dish ala Kuya J! Ginisang karneng baboy with chillies, spices, and rich coconut cream.', 'Pork', '1518857504Bicol-Express.png', 'Available', '280.00', '2018-02-17 08:51:44', 116, NULL, NULL),
(26, 1, 1, 'LUMPIA PRITO', 'Fried seasoned pork-filled spring rolls na pinasarap ng Kuya J dipping sauce.', 'Appetizer', '1518857629Filipino-Lumpia-Style-Pork-and-Shrimp-Spring-Rolls.jpg', 'Available', '175.00', '2018-02-17 08:53:49', 570, NULL, NULL),
(27, 1, 1, 'SINIGANG NA BABOY', 'Classic pork sinigang na sakto sa asim at sobra sa sarap.', 'Soup/Vegetables', '15188569660124 015.JPG', 'Available', '270.00', '2018-02-17 08:42:46', 465, NULL, NULL),
(28, 2, 1, 'CUCUMBER SHAKE', '', 'Shake', '1518857479KUYA J RESTAURANT 14.jpg', 'Available', '95.00', '2018-02-17 08:51:19', 397, NULL, NULL),
(29, 2, 1, 'WATERMELON SHAKE', '', 'Shake', '151885751520150322_115256.jpg', 'Available', '95.00', '2018-02-17 08:51:55', 969, NULL, NULL),
(30, 3, 1, 'KUYA J MANGO PANDAN', 'Ang classic panghimagas na favotire ni Kuya J! Creamy mango at pandan topped with pulled sugar.', 'Special', '1518857625Untitled.png', 'Available', '85.00', '2018-02-17 08:53:45', 856, NULL, NULL),
(31, 1, 3, 'BrianÊ¼s Ribs', 'Once you taste me, youâ€™ll never forget meâ€ Our best seller! Baked pork ribs with a sweet, tangy piquet sauce served with rice, corn and carrots.', 'Pork', '1518888293Brians-Back.jpg', 'Available', '228.00', '2018-02-17 17:24:53', 211, NULL, NULL),
(32, 1, 3, 'Peter\'s Pork Steak', 'Grilled pork steak, lightly seasoned and served with vegetable medley and harvest rice', 'Sizzlers/Grilled', '1518888830P1020631+copy.jpg', 'Available', '228.00', '2018-02-17 17:33:50', 602, NULL, NULL),
(33, 1, 3, 'Roasted Seasoned Chicken', 'Chicken quarter spiced with our secret spices, roasted and served with mashed potato and vegetable medley', 'Chicken', '1518889306Brians-Back.jpg', 'Available', '188.00', '2018-02-17 17:41:46', 504, NULL, NULL),
(34, 1, 3, 'Chicken Fried Chicken', 'Battered chicken breast fillet, lightly fried and topped with cream gravy and served with mashed potatoes and Vegetable medley.', 'Chicken', '1518889442thumb_600.jpg', 'Not Available', '188.00', '2018-02-20 21:46:14', 730, NULL, NULL),
(35, 1, 3, 'David Dean\'s Tenderloin', 'Some like me rare. Others like me medium but itâ€™s up to you if you like me done well. Single USDA steak on top of a mound of mashed potatoes and topped with cheese. Served with brown sauce and garnished with fried onions and roasted almonds', 'Beef', '1518889531Casa-Verde_Ayala-Terraces_Cebu_3.JPG', 'Available', '235.00', '2018-02-17 17:45:31', 481, NULL, NULL),
(36, 1, 3, 'Jon Jay\'s Steak and Pasta', 'Youâ€™ll need a fork and knife to finish us both. Marinated USDA steak served with brown sauce and a side of spaghetti noodles sautÃ©ed in olive oil and garlic.', 'Pork', '1518889636casaverdejonjayssteaknpasta.jpg', 'Available', '235.00', '2018-02-17 17:47:16', 551, NULL, NULL),
(37, 1, 3, 'Tricia ala Pobre', 'Grilled fish fillet topped with garlic bits together with rice and vegetable medley.', 'Fish', '15188907449215746753_d405783493_b.jpg', 'Available', '178.00', '2018-02-17 18:05:44', 795, NULL, NULL),
(38, 1, 3, 'Ting-Tingâ€™s Tavern Shrimp', 'Item\r\nTing-Tingâ€™s Tavern Shrimp\r\nEight would be great if you ate â€¦..Delicious butterflied and lightly crusted in breadcrumbs and fried â€˜til golden. Served with our own tartar sauce paired with harvest rice and seasoned vegetables.', 'Fish', '1518890793thumb_600 (1).jpg', 'Available', '198.00', '2018-02-17 18:06:33', 648, NULL, NULL),
(39, 1, 3, 'Rice', '', 'Noodles/and/Rice', '1518890892KERALA-MEALS-PLAIN-RICE-WHITE.jpg', 'Available', '35.00', '2018-02-17 18:08:12', 996, NULL, NULL),
(40, 3, 3, 'Death by Chocolate', 'This dessert is to die for- chocolate and nutty rocky road ice cream mixed with chocolate bits on a bed of chocolate cookie crust. Drizzled with chocolate syrup.', 'Ice Cream', '1518890985b4ea47c84ed4489ec4033bae476c0777.jpg', 'Available', '158.00', '2018-02-17 18:09:45', 873, NULL, NULL),
(41, 3, 3, 'Bliss O\' Berry', 'A one of a kind cheesecake that literally melts in your mouth. Home-made ice cream based cheesecake paired with strawberry compote.', 'Special', '1518891049download (1).jpg', 'Available', '218.00', '2018-02-17 18:10:49', 118, NULL, NULL),
(42, 3, 3, 'Victorâ€™s Peak', 'Height does matter , finishing me will be harder. Peanut butter cookie bits, chopped nuts, chocolate fudge and peanut butter layered in chocolate and vanilla ice cream on top of a chocolate cookie crust. ', 'Special', '1518891094casa5.jpg', 'Available', '240.00', '2018-02-17 18:11:34', 727, NULL, NULL),
(43, 3, 3, 'Lauren\'s Lava', 'Some say Iâ€™m cold, but handle me with care coz Iâ€™m hot to holdâ€¦ Chocolate cake filled with oozing chocolate lava. Topped with vanilla ice cream and covered in a crunchy chocolate shell. ', 'Special', '1518891174download (2).jpg', 'Available', '155.00', '2018-02-17 18:12:54', 389, NULL, NULL),
(44, 2, 3, 'Iced Tea', 'Serving\r\nGlass 40.00 Pitcher 125.00 Bottomless 65.00', 'Tea', '1518891254download (3).jpg', 'Available', '125.00', '2018-02-17 18:14:14', 965, NULL, NULL),
(45, 2, 3, 'Juice', 'Mango Pineapple Watermelon Pineapple-Orange Four Seasons Calamansi\r\n', 'Juice', '1518891419Fruit-Juices.jpg', 'Available', '80.00', '2018-02-17 18:16:59', 414, NULL, NULL),
(46, 2, 3, 'John\'s Mix', 'Orange and pineapple juice mixed with Sprite and grenadine', 'Juice', '1518891465thumb_600 (3).jpg', 'Available', '75.00', '2018-02-17 18:17:45', 498, NULL, NULL),
(47, 3, 3, 'Milky Way', 'The biggest milkshake in town! Imagine a large chocolaty shake good for you and your partner. Best served with Big Bang Burger. Limited! Please ask your server for its availability.', 'Special', '1518891537casa verde milkyway.jpg', 'Available', '298.00', '2018-02-17 18:18:57', 853, NULL, NULL),
(48, 1, 3, 'The Big Bang Burger', '9-inch burger topped with onions, tomatoes, lettuce, mayo, American cheese on a sesame-seed bun. Sharing recommended.', 'Appetizer', '1518891589photo-1.jpg', 'Available', '408.00', '2018-02-17 18:19:49', 456, NULL, NULL),
(49, 1, 3, 'Bacon Cheese & Mushroom', 'Juicy beef patty topped with white cheese, bacon & mushroom', 'Appetizer', '151889165913315257_10154167014738774_879608071545030221_n20171211-25618-aew776.jpg', 'Available', '198.00', '2018-02-17 18:20:59', 548, NULL, NULL),
(50, 1, 3, 'Seafood Carbonara', 'A must try dish! Treasure from the sea- shrimps and squid in rich creamy white sauce.', 'Soup/Vegetables', '15188917253580712221_c66036cc95_z.jpg', 'Available', '188.00', '2018-02-17 18:22:06', 989, NULL, NULL),
(51, 1, 3, 'Victoria\'s Secret Spaghetti', 'Do you want to know my secret? Home-made meat sauce topped with oozing cheese. A treat for the young and old.', 'Noodles/and/Rice', '1518891813tumblr_inline_n2sbxj45z51riyq8k.jpg', 'Available', '160.00', '2018-02-17 18:23:33', 751, NULL, NULL),
(52, 1, 11, 'Baked Scallops (seasonal)', '', 'Appetizer', '1519116890Baked Scallops copy.jpg', 'Available', '275.00', '2018-02-20 08:54:50', 580, NULL, NULL),
(53, 1, 11, 'Calamares', '', 'Appetizer', '1519116921calamares.jpg', 'Available', '199.00', '2018-02-20 08:55:21', 406, NULL, NULL),
(54, 1, 11, 'Chichabits', '', 'Appetizer', '1519117006chichabits.jpg', 'Available', '255.00', '2018-02-20 08:56:46', 217, NULL, NULL),
(55, 1, 11, 'Chicken Lollipop', '', 'Appetizer', '1519117047chicken-lollipop.jpg', 'Available', '195.00', '2018-02-20 08:57:27', 473, NULL, NULL),
(56, 1, 11, 'Lechon Kawali', '', 'Pork', '1519117189lechon kawai.jpg', 'Available', '275.00', '2018-02-20 08:59:49', 553, NULL, NULL),
(57, 1, 11, 'Sizzling Gambas', '', 'Sizzlers/Grilled', '1519117268sizzling gambas.jpg', 'Available', '283.00', '2018-02-20 09:01:08', 368, NULL, NULL),
(58, 1, 11, 'Inihaw na Liempo', '', 'Pork', '1519117416pork liempo.jpg', 'Available', '203.00', '2018-02-20 09:03:36', 294, NULL, NULL),
(59, 1, 11, 'Inihaw na Pusit', '', 'Sizzlers/Grilled', '1519117441inihaw na pusit.jpg', 'Available', '355.00', '2018-02-20 09:04:01', 143, NULL, NULL),
(60, 1, 11, 'Inihaw na Manok', '', 'Sizzlers/Grilled', '1519117522inihaw na manok.jpg', 'Available', '255.00', '2018-02-20 09:05:22', 964, NULL, NULL),
(61, 1, 11, 'Chicken Chicharon Skin', '', 'Chicken', '1519117568chicken chicharon skin.jpg', 'Available', '155.00', '2018-02-20 09:06:08', 129, NULL, NULL),
(62, 1, 11, 'Beef Kare-kare', '', 'Beef', '1519117622kare kare.jpg', 'Available', '355.00', '2018-02-20 09:07:02', 940, NULL, NULL),
(63, 1, 11, 'Sinigang na Baboy', '', 'Pork', '1519117648sinangag na baboy.jpg', 'Available', '280.00', '2018-02-20 09:07:28', 156, NULL, NULL),
(64, 3, 11, 'Banana Caramel', '', 'Special', '1519117819the-banana-caramel-dessert.jpg', 'Available', '135.00', '2018-02-20 09:10:19', 327, NULL, NULL),
(65, 2, 3, 'test', 'asdasdsa', 'Beer', NULL, 'Available', '23.00', '2018-02-20 17:00:03', 780, NULL, NULL),
(66, 1, 12, 'SOPA DE AJO', 'bone broth, slow cooked egg', 'Appetizer', NULL, 'Available', '150.00', '2018-02-20 20:29:53', 157, NULL, NULL),
(67, 1, 12, 'TURKISH EGGS', 'garlic, yogurt, harissa, sourdough', 'Appetizer', NULL, 'Available', '150.00', '2018-02-20 20:31:56', 424, NULL, NULL),
(68, 1, 12, 'EGGPLANT', '& honey chips', 'Soup/Vegetables', NULL, 'Available', '150.00', '2018-02-20 20:33:57', 582, NULL, NULL),
(69, 1, 12, 'CHORIZO', 'with sourdough', 'Appetizer', NULL, 'Available', '270.00', '2018-02-20 20:34:17', 508, NULL, NULL),
(70, 1, 12, 'CALAMARES', 'fried squid, aioli, pickled charred espada', 'Appetizer', NULL, 'Available', '340.00', '2018-02-20 20:34:31', 848, NULL, NULL),
(71, 1, 12, 'PULPO', 'potato, adobo', 'Appetizer', NULL, 'Available', '220.00', '2018-02-20 20:34:49', 649, NULL, NULL),
(72, 1, 12, 'RUSA', 'ensaladilla, scallops', 'Appetizer', NULL, 'Available', '160.00', '2018-02-20 20:36:37', 296, NULL, NULL),
(73, 1, 12, 'MORCILLA', 'qual eggs, red pepper', 'Appetizer', NULL, 'Available', '210.00', '2018-02-20 20:36:52', 116, NULL, NULL),
(74, 1, 12, 'LAMB', 'harissa spices, eggplant puree', 'Appetizer', NULL, 'Available', '200.00', '2018-02-20 20:37:09', 621, NULL, NULL),
(75, 3, 12, 'CREMA CATALANA CON MANGO', 'custard, burnt sugar, mango', 'Special', NULL, 'Available', '200.00', '2018-02-20 20:37:44', 973, NULL, NULL),
(76, 3, 12, 'TARTA DE QUESO', 'cheesecake', 'Cake', NULL, 'Available', '240.00', '2018-02-20 20:38:00', 302, NULL, NULL),
(77, 2, 12, 'NO. 9', 'our signature drink. Light rum, calamansi', 'Wine', NULL, 'Available', '150.00', '2018-02-20 20:39:10', 333, NULL, NULL),
(78, 2, 12, 'EL MEXICANO', 'espresso, milk, coffee liquor, tequila', 'Wine', NULL, 'Available', '200.00', '2018-02-20 20:39:39', 905, NULL, NULL),
(80, 1, 14, 'Beetroot salad', 'goatâ€™s milk ricotta, tzatziki, guava gel, orange garam masala vinaigrette', 'Appetizer', '1519552402DSCF8610-768x512.jpg', 'Available', '270.00', '2018-02-25 09:53:22', 988, NULL, NULL),
(81, 1, 14, 'Tomato Sriracha Soup', 'Spiced Bleack Beans, Chorizo [included in lunch set]', 'Soup/Vegetables', '1519552464DSCF8619.jpg', 'Available', '200.00', '2018-02-25 09:54:24', 263, NULL, NULL),
(82, 1, 14, 'Scallion', 'USDA ribeye, house pickled slaw,  chili bean aiolo, honey glazed peanuts', 'Appetizer', '1519552493DSCF8617-768x467.jpg', 'Available', '380.00', '2018-02-25 09:54:53', 727, NULL, NULL),
(83, 1, 14, 'Fish Taco', 'crispy fish skin, spicy glazed tuna, pear, sesame\r\n', 'Fish', '1519552516DSCF8608-665x435.jpg', 'Available', '320.00', '2018-02-25 09:55:16', 738, NULL, NULL),
(84, 1, 14, 'Belly Chips', 'Pork Belly, Nuoc Cham', 'Pork', '1519552548DSCF8603-768x512.jpg', 'Available', '190.00', '2018-02-25 09:55:48', 779, NULL, NULL),
(85, 1, 14, 'Glazed Salmon', 'Sushi rice cake, bokchoy, teriyaki', 'Fish', '1519552572DSCF8630-768x458.jpg', 'Available', '590.00', '2018-02-25 09:56:12', 972, NULL, NULL),
(86, 1, 14, 'Duck Confit', 'soy bean cassoulet, strawberry glazed cabbage, cilantro', 'Appetizer', '1519552612DSCF8628-768x512.jpg', 'Available', '490.00', '2018-02-25 09:56:52', 859, NULL, NULL),
(87, 1, 14, 'Braised Shortrib', 'cornbread puree, braised shallot, beech mushroom, demi glaze', 'Beef', '1519552636DSCF8653-768x512.jpg', 'Available', '950.00', '2018-02-25 09:57:16', 848, NULL, NULL),
(88, 1, 14, 'Poached Red Snapper', 'Coconut rice, banana puree, gochujang foam', 'Noodles/and/Rice', '1519552731DSCF8652-768x512.jpg', 'Available', '450.00', '2018-02-25 09:58:51', 922, NULL, NULL),
(89, 1, 14, 'Charred Octopus', 'Squash risotto, grilled grapefruit, romesco', 'Fish', '1519552777DSCF8644-768x512.jpg', 'Available', '450.00', '2018-02-25 09:59:37', 786, NULL, NULL),
(90, 1, 14, 'Pork Pork Pork', 'grilled apple puree, sauce chasseur, braised cabbage, shiitake risotto', 'Pork', '1519552802DSCF8665-768x512.jpg', 'Available', '650.00', '2018-02-25 10:00:02', 667, NULL, NULL),
(91, 3, 14, 'â€œPottedâ€ Chocolate Tiramisu', 'sabayon, crunchy hazelnut meringue, coffee sponge, chocolate sand, strawberry gelee, vanilla sauce', 'Ice Cream', '1519552834DSCF8679-768x512.jpg', 'Available', '240.00', '2018-02-25 10:00:35', 612, NULL, NULL),
(92, 3, 14, 'Sizzling Caramel & Banana plate', '', 'Special', '1519552892DSCF8683-768x512.jpg', 'Available', '250.00', '2018-02-25 10:01:32', 218, NULL, NULL),
(93, 1, 15, 'Tinulang Manok', '', 'Soup/Vegetables', '1519561992IMG_0122.jpg', 'Available', '290.00', '2018-02-25 12:33:12', 213, NULL, NULL),
(94, 1, 15, 'Talaba', '', 'Appetizer', '1519562032wpid-dsc_04301.jpg', 'Available', '145.00', '2018-02-25 12:33:52', 909, NULL, NULL),
(95, 1, 15, 'Baked Scallops', '', 'Appetizer', '1519562053lantawduma-21.jpg', 'Available', '150.00', '2018-02-25 12:34:13', 433, NULL, NULL),
(96, 1, 15, 'Sisig', '', 'Pork', '1519562076111.jpg', 'Available', '140.00', '2018-02-25 12:34:36', 589, NULL, NULL),
(97, 1, 15, 'Sinuglaw', '', 'Appetizer', '1519562115img_1175.jpg', 'Available', '180.00', '2018-02-25 12:35:15', 370, NULL, NULL),
(98, 1, 15, 'Kinilaw', '', 'Appetizer', '1519562141lantaw-restaurant.jpg', 'Available', '175.00', '2018-02-25 12:35:41', 511, NULL, NULL),
(99, 1, 15, 'Calamares', '', 'Appetizer', '1519562159calamari at Lantaw sa SRP Restaurant in Cebu City, Philippines.jpg', 'Available', '240.00', '2018-02-25 12:35:59', 826, NULL, NULL),
(100, 1, 15, 'Spicy Scallops', '', 'Appetizer', '1519562206Spicy-scallops-Lantaw-Floating-Native-Restaurant.jpg', 'Available', '160.00', '2018-02-25 12:36:46', 697, NULL, NULL),
(101, 1, 15, 'Cordova Express', '', 'Appetizer', '1519562231lantaw-2-native-restaurant.jpg', 'Available', '160.00', '2018-02-25 12:37:11', 409, NULL, NULL),
(102, 3, 16, 'Banana Flambee', '', 'Ice Cream', '1519565170flambee.jpg', 'Available', '120.00', '2018-02-25 13:26:10', 382, NULL, NULL),
(103, 3, 16, 'Cremebule', '', 'Special', '1519565194cremebrule.jpg', 'Available', '120.00', '2018-02-25 13:26:34', 756, NULL, NULL),
(104, 1, 16, 'Flat Iron Steak', '', 'Beef', '1519565217steak flat.jpg', 'Available', '495.00', '2018-02-25 13:26:57', 908, NULL, NULL),
(105, 1, 16, 'Butcher\'s Steak', '', 'Beef', '1519565238steak butch.jpg', 'Available', '360.00', '2018-02-25 13:27:18', 413, NULL, NULL),
(106, 1, 16, 'Chicken Tartufo', '', 'Chicken', '1519565264chicken.jpg', 'Available', '265.00', '2018-02-25 13:27:44', 490, NULL, NULL),
(107, 1, 16, 'Steamed Chilean Mussels', '', 'Appetizer', '1519565305mussels.jpg', 'Available', '320.00', '2018-02-25 13:28:25', 154, NULL, NULL),
(108, 1, 16, 'Scallops with Mornay Sauce', '', 'Appetizer', '1519565328scallops.jpg', 'Available', '265.00', '2018-02-25 13:28:48', 833, NULL, NULL),
(109, 1, 16, 'Prawn Gambas', '', 'Appetizer', '1519565345prawn.jpg', 'Available', '265.00', '2018-02-25 13:29:05', 237, NULL, NULL),
(110, 1, 16, 'Black Pepper Steak', '', 'Beef', '1519565368balck pepper.jpg', 'Available', '395.00', '2018-02-25 13:29:28', 724, NULL, NULL),
(111, 1, 16, 'Chorizo Squid', '', 'Appetizer', '1519565421squidcho.jpg', 'Available', '275.00', '2018-02-25 13:30:21', 312, NULL, NULL),
(112, 2, 1, 'Test', '                                                                                    ', 'Beer', NULL, 'Available', '200.00', '2018-03-03 04:06:41', 102, '3', '200mL'),
(113, 1, 1, 'Sample', '', 'Beef', NULL, 'Available', '200.00', '2018-03-03 03:51:23', 161, '3', ''),
(114, 3, 1, 'Last', '', 'Ice Cream', NULL, 'Available', '200.00', '2018-03-03 03:55:16', 882, '3', '100mL'),
(115, 3, 1, 'Last Sample', '', 'Halo-Halo', '152005004714907137_1249224755133963_7707735390257428027_n.jpg', 'Available', '300.00', '2018-03-03 04:07:27', 441, '3', '200mL');

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `customer_id`, `restaurant_id`, `date_time_sent`, `date_time_receive`, `message`, `status`, `mes_status`) VALUES
(2, 1, 3, 'February 19, 2018 03:43:41 PM', '2018-02-19 07:43:41', 'asdasdasdas', 0, 'Unread'),
(3, 1, 3, 'February 19, 2018 03:43:41 PM', '2018-02-19 07:43:41', 'asdasdasdas', 0, 'Unread'),
(4, 1, 3, 'February 19, 2018 03:43:42 PM', '2018-02-19 07:43:42', 'asdasdasdas', 0, 'Unread'),
(5, 1, 3, 'February 19, 2018 03:43:42 PM', '2018-02-19 07:43:42', 'asdasdasdas', 0, 'Unread'),
(6, 1, 1, 'February 19, 2018 06:02:05 PM', '2018-02-19 10:02:05', 'Yohooo', 0, 'Unread');

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
(4, 2, 1, 4, NULL, NULL, '2018-02-18 08:50:33', 1),
(5, 2, 3, 5, NULL, NULL, '2018-02-18 09:45:42', 1),
(6, 2, 1, 6, NULL, NULL, '2018-02-19 06:18:59', 1),
(7, 1, 3, NULL, NULL, 2, '2018-02-19 07:43:41', 1),
(8, 1, 3, NULL, NULL, 3, '2018-02-19 07:43:42', 1),
(9, 1, 3, NULL, NULL, 4, '2018-02-19 07:43:42', 1),
(10, 1, 3, NULL, NULL, 5, '2018-02-19 07:43:42', 1),
(11, 1, 1, NULL, NULL, 6, '2018-02-19 10:02:06', 1),
(12, 1, 1, 7, NULL, NULL, '2018-02-19 10:21:08', 1),
(13, 1, 1, 8, NULL, NULL, '2018-02-19 11:50:50', 1),
(14, 2, 1, 9, NULL, NULL, '2018-02-25 07:19:34', 0),
(15, 3, 1, 10, NULL, NULL, '2018-02-28 18:11:02', 0),
(16, 3, 1, 11, NULL, NULL, '2018-02-28 18:32:25', 0),
(17, 1, 1, 12, NULL, NULL, '2018-02-28 18:55:41', 0),
(18, 11, 1, 13, NULL, NULL, '2018-03-03 03:09:53', 0),
(19, 4, 1, 14, NULL, NULL, '2018-03-03 03:11:36', 0),
(20, 4, 12, 15, NULL, NULL, '2018-03-03 04:08:56', 0),
(21, 4, 1, 16, NULL, NULL, '2018-03-03 04:57:20', 0),
(22, 4, 1, 17, NULL, NULL, '2018-03-03 05:44:03', 0),
(23, 4, 1, 18, NULL, NULL, '2018-03-03 05:44:56', 0),
(24, 4, 1, 19, NULL, NULL, '2018-03-03 15:00:42', 0),
(25, 4, 1, 20, NULL, NULL, '2018-03-03 16:53:45', 0),
(26, 4, 1, 21, NULL, NULL, '2018-03-03 17:08:12', 0),
(27, 4, 1, 22, NULL, NULL, '2018-03-04 12:23:34', 0),
(28, 4, 1, 23, NULL, NULL, '2018-03-04 12:25:46', 0),
(29, 4, 1, 24, NULL, NULL, '2018-03-04 12:27:51', 0),
(30, 4, 1, 25, NULL, NULL, '2018-03-04 12:29:30', 0),
(31, 4, 1, 26, NULL, NULL, '2018-03-04 12:35:36', 0),
(32, 4, 1, 27, NULL, NULL, '2018-03-04 12:37:36', 0),
(33, 4, 1, 28, NULL, NULL, '2018-03-04 12:49:10', 0),
(34, 4, 1, 29, NULL, NULL, '2018-03-04 12:59:23', 0),
(35, 4, 1, 30, NULL, NULL, '2018-03-04 13:03:31', 0);

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
(1, 40572, 4, 1, '2018-03-04 12:24:04', '1', '1020.00', '14800', 'PAY-3B266260UX592800MLKN6K4I', '87c6561cbfdba916abace73da89cc6ef', 'Queueing'),
(2, 36818, 4, 1, '2018-03-05 12:26:13', '1', '1820.00', '16469', 'PAY-6N435182DU284602GLKN6L4I', '86fe776a97d5371171277cfc7ae64568', 'Queueing'),
(3, 11004, 4, 1, '2018-03-06 12:28:39', '1', '1030.00', '12970', 'PAY-9SN89870BL799224YLKN6NAY', '1abfa95b879fc0fbba09d660b2a9ee8e', 'Queueing'),
(6, 29514, 4, 1, '2018-03-07 12:36:10', '1', '1495.00', '1409', 'PAY-7W019243M6256961ULKN6QRY', '99b2b0a4761bcfcafef858bff243f1f6', 'Queueing'),
(7, 12022, 4, 1, '2018-03-08 12:47:58', '1', '690.00', '14744', 'PAY-6BD46287AM6024138LKN6WCQ', '63c7dcf5b2dde084afca3297ceaaeaca', 'Queueing'),
(8, 19536, 4, 1, '2018-03-09 12:57:25', '1', '615.00', '11669', 'PAY-665114005J679640PLKN62QQ', '07dddd1fa498de8d1f45312f99774aa9', 'Queueing'),
(9, 34920, 4, 1, '2018-03-10 13:02:33', '1', '1390.00', '16204', 'PAY-5E379356115015330LKN645I', 'de24cb0f1aa5240d0f26fbd56cf90c0d', 'Queueing'),
(10, 13311, 4, 1, '2018-03-11 13:03:56', '1', '1579.00', '2205', 'PAY-9S797746A9253224HLKN65SA', '481906faa1fa6041e06ec90c70d86a2a', 'Queueing');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `menu_id`, `order_id`, `order_qty`) VALUES
(1, 1, 1, 4),
(2, 2, 1, 1),
(3, 4, 1, 1),
(4, 11, 1, 1),
(5, 1, 2, 3),
(6, 19, 2, 1),
(7, 2, 2, 1),
(8, 5, 2, 1),
(9, 7, 3, 3),
(10, 2, 3, 2),
(11, 10, 3, 1),
(12, 12, 3, 2),
(13, 20, 3, 1),
(14, 28, 3, 1),
(15, 19, 4, 1),
(16, 1, 4, 8),
(17, 2, 4, 1),
(18, 19, 5, 1),
(19, 1, 5, 1),
(20, 2, 5, 1),
(21, 1, 6, 13),
(22, 2, 6, 2),
(23, 7, 7, 1),
(24, 9, 7, 1),
(25, 1, 8, 7),
(26, 7, 9, 1),
(27, 1, 9, 1),
(28, 3, 9, 1),
(29, 19, 10, 1),
(30, 13, 10, 1);

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
(3, 'The more the merrier', 'Free 1 meal for those customers who\'ll be bringing more than 12 people with them'),
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
(12, '5', 3, 'Avail'),
(13, '1', 8, 'Avail'),
(14, '1', 12, 'Avail'),
(15, '3', 13, 'Avail'),
(16, '4', 13, 'Avail'),
(17, '5', 13, 'Avail'),
(18, '3', 14, 'Avail'),
(19, '4', 14, 'Avail'),
(20, '5', 14, 'Avail'),
(21, '3', 15, 'Avail'),
(22, '5', 15, 'Avail'),
(23, '1', 16, 'Avail'),
(24, '5', 16, 'Avail');

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

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `customer_id`, `restaurant_id`, `rate`) VALUES
(1, 2, 1, 4);

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
(2, '18589', 'February 19, 2018', '2:30 PM', '2018-02-17 10:02:51', 'Done', 'Tets 2', '100', 1, 1, 0),
(4, '13648', 'February 20, 2018', '12:30 PM', '2018-02-18 08:50:32', 'Done', 'asdada', '100', 1, 2, 0),
(5, '15910', 'February 18, 2018', '10:00 AM', '2018-02-18 09:45:41', 'Reserved', 'qweqwe', '25', 3, 2, 0),
(6, '22002', '02/28/2018', '10:30 PM', '2018-02-19 06:18:59', 'Expired', '', '1', 1, 2, 0),
(22, '40572', 'March 05, 2018', '11:00 AM', '2018-03-04 12:23:34', 'Pending', '', '3', 1, 4, 0),
(23, '36818', 'March 06, 2018', '11:00 AM', '2018-03-04 12:25:46', 'Pending', '', '3', 1, 4, 0),
(24, '11004', 'March 07, 2018', '11:00 AM', '2018-03-04 12:27:51', 'Pending', '', '2', 1, 4, 0),
(26, '29514', 'March 08, 2018', '11:00 PM', '2018-03-04 12:35:36', 'Pending', '', '3', 1, 4, 0),
(27, '12022', 'March 09, 2018', '4:30 PM', '2018-03-04 12:37:35', 'Pending', '', '2', 1, 4, 0),
(28, '19536', 'March 10, 2018', '2:30 PM', '2018-03-04 12:49:10', 'Pending', '', '3', 1, 4, 0),
(29, '34920', 'March 11, 2018', '7:00 PM', '2018-03-04 12:59:23', 'Pending', '', '2', 1, 4, 0),
(30, '13311', 'March 12, 2018', '11:00 AM', '2018-03-04 13:03:31', 'Pending', '', '3', 1, 4, 0);

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
  `maxdate` varchar(255) NOT NULL,
  `temp` varchar(255) NOT NULL,
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

INSERT INTO `restaurants` (`restaurant_id`, `sub_id`, `restaurant_name`, `restaurant_desc`, `restaurant_addr`, `restaurant_contact`, `max_capacity`, `maxdate`, `temp`, `hour_open`, `hour_close`, `rate_comm`, `lat`, `lng`, `username`, `password`, `owner_fname`, `owner_mname`, `owner_lname`, `owner_contact`, `owner_email`, `owner_address`, `restaurant_logo`, `restaurant_status`, `sub_date`, `sub_exp`) VALUES
(1, 3, 'Kuya J', 'KATAKAM-TAKAM NA KUWENTO NI KUYA J\r\n\r\n\r\n\r\n\r\nKuya J Restaurant, formerly known as â€œAng Kan-anan ni Kuya J,â€ started as a humble eatery along the streets of Cebu. But with Kuya Jâ€™s undeniably delicious dishes, mouthwatering words of recommendation quickly spread into every Cebuanosâ€™ palate. With that, Kuya J instantly became one of the well-loved restaurants in Cebu. \r\n\r\nToday, Kuya J continues to satisfy every Filipinoâ€™s appetite nationwide. Using only the freshest ingredients available, Kuya J cooks up a storm of delicious Pinoy food in every corner of the Philippines.\r\n\r\nTHE BLOCKBUSTER BIDA\r\n\r\nJericho Rosales is one of the award-winning drama actors in the country and the best Kuya to his family. \r\n\r\nWhatâ€™s very inspiring about him is his trait of always putting his heart into everything that he does, especially when touching peopleâ€™s lives.\r\n\r\nThis is why Echo is the perfect endorser for Kuya J.', 'Corner Tojong Street, 15 N Escario St, Lungsod ng Cebu, 6000 ', '09989624269', '100', '21', '32', '09:00', '4:11', NULL, 10.3188, 123.902, 'admin', 'admin', 'Mickale', 'Lapasanda', 'Saturre', '09165970601', 'kuyajtest@gmail.com', 'Saint Bernard Southern Leyte', '151825301515174728091517414973151733665615166037981512156053kuyaj.png', 1, '2018-01-31 2:21:52', '2019-01-31 2:21:52'),
(3, 2, 'Casa Verde', 'Established in August 2002, CASA VERDE is a chain of family-owned restaurants in Cebu City. Spanish for \"green house\", CASA VERDE\'s name was influenced by the owners\' Spanish roots and the color of the Ramos Branch, which used to be one of the family\'s ancestral homes. \r\n\r\nOriginally, the Ramos Branch was supposed to be just a small canteen that catered to the residents of the 2nd floor dormitory and some students from nearby colleges. Through word-of-mouth and recommendations by family and friends, the humble canteen soon became a full-scale restaurant. After almost a decade and three branches later, CASA VERDE has grown into one of Cebu\'s most popular dining destinations. \r\n\r\n\"Value for Money\" has always been the restaurant\'s philosophy. CASA VERDE believes that everyone deserves to enjoy great food and quality service at reasonable prices in a comfortable atmosphere. It\'s casual dining at its best. \r\n\r\nCASA VERDE is the perfect place to let your hair down and enjoy a steak or two with family and friends. The ambiance is simple and casual, with knickknacks and collectibles from the personal collections of the owners. It\'s also interesting to note that all of the restaurant\'s signature dishes are named after some members of the family. We bring homestyle comfort food to the next level. \r\n\r\nThe next time you\'re in the mood for some good food, head on down to the CASA VERDE branch nearest you and try our best-selling ribs, mouth-watering steaks, sumptuous pasta, and sinful desserts. It\'s a dining experience that truly exceeds expectation. ', 'Lim Tian Teng Street, Ramos, Cebu City, Philippines, 6000', '+63 32 253.6472', '350', '19', '', '10:00', '22:00', NULL, 10.3072, 123.896, 'admin2', 'admin2', 'Gian Carlo', 'S', 'Cataraja', '09265976739', 'casaverdetest@gmail.com', 'Cebu City', '15189781501518886223casa-verde-logo-679x410.jpg', 1, '2018-02-18 12:00:15', '2018-08-18 12:00:15'),
(11, 4, 'Gerry\'s Grill', 'Here at Gerry\'s, we aim to give everyone a pleasurable dining experience, serving only the freshest food ranging from Filipino favorites â€“ Sisig, Inihaw na Pusit, Crispy Pata, Beef Kare-kare, Adobo Shreds to exotic cuisines.\r\n\r\nI have always dreamt of putting up a place where everyone could hang out and enjoy good food. With my passion for cooking and love for grilled dishes came Gerry\'s.\r\n\r\nAlthough the original concept of my business was one where people could unwind with a drink or two, Gerryâ€™s has become a family restaurant, too.\r\n\r\nFrom opening its first store in Tomas Morato, Quezon City, Gerryâ€™s has come a long way. With its continuous expansion nationwide, Gerryâ€™s has also opened branches in the United States, Singapore and Qatar.\r\n\r\nUp until now, we strive to continue to evolve, responding to the ever growing needs of our customers. We believe in offering our customers the best value for their money. We also take pride in taking care of our people â€“ one of our most valuable assets.\r\n\r\nThese are the reasons why Gerry\'s remains to be the favorite among Filipinos. For as long as we can, we guarantee nothing but great food and loads of fun.', 'Robinson Galleria Cebu, Gen. Maxilom Ext, Cebu City, 6000 Cebu', '(032) 231 4738', '300', '14', '', '10:00', '21:00', NULL, 10.304, 123.912, 'admin6', '123', 'Godwin', 'Margaja', 'Montealto', '098272626', 'gerrygrilltest@gmail.com', 'Aliwanay Balamban Cebu', '1519115864logo.png', 1, '2018-02-20 4:15:49', '2018-02-27 4:15:49'),
(12, 2, 'No.9', 'Our passion for good food started at the kitchen and dining table at home. Having grown up at No. 9, it seemed only fitting for us that we turn our ancestral home into a place where we could share our love of food with you.\r\n\r\nLocated at our old neighborhood of E. Benedicto Street, No. 9 gave us the opportunity to bring together the past and the future, melding elements of the old world with modern day. It features a newly renovated interior that coexists with the original exterior faÃ§ade of the 50 year old house. A new lighting system illuminates the main dining hall while guests have a floor-to-ceiling view of the old garden and trees.\r\n\r\nOur cuisine imbibes the same principles as the restaurantâ€™s design, using both traditional and modern techniques in its preparation. In its essence, our menu can be described as a homage to the food we fell in love with. The dishes may look deceptively simple, but a lot of work and love has gone into its preparation.\r\n\r\nNothing would make us happier than to have our guests feel that love in every bite.', 'E. Benedicto Street, Cebu City', '+63 32 253 9518', '350', '28', '3', '17:00', '00:00', NULL, 10.3102, 123.901, 'admin7', '123', 'Gian Carlo', 'S', 'Cataraja', '123456789', 'number9test@gmail.com', 'Cebu City', '1519158245download.jpg', 1, '2018-02-21 4:12:57', '2018-08-21 4:12:57'),
(14, 3, 'KAYU: Kitchen + Bar', 'Taking inspiration from the world, KAYUâ€™s modern-fusion cuisine uses only the freshest and finest ingredients cooked with our chefâ€™s imagination and passion. \r\nThe passion for creating sparked within Chef â€œIzzyâ€ Francis Sy at a young age.\r\n\r\nWith a culinary degree in ICAAC, CIA Greystone, Napa, CA and his work experience with Morimoto & Kitchen Door, Chef Izzy is ready to share his love for cooking to his beloved hometown - Cebu City.', 'Sanson Road, Lahug, Cebu City', '(032) 406 3095', '100', '30', '', '07:30', '22:30', NULL, 10.333, 123.895, 'admin8', '123', 'Fran', 'Margaja', 'Montealto', '(032) 406 3095', 'kayutest@gmail.com', 'Aliwanay Balamban Cebu', '1519551538kayu-cover2.jpg', 1, '2018-02-25 5:31:52', '2019-02-25 5:31:52'),
(15, 3, 'Lantaw Floating Native Restaurant', 'Lantaw promises to be a great addition to the â€˜nativeâ€™ category of restaurantsâ€¦. a category where quality has not always been easy to find, surprisingly.\r\n\r\nWell, youâ€™ll find quality here. Lantaw is the Cebuano term for â€œcan be seen from a distanceâ€ and aside from the fact that the restaurant is actually floating, diners can also enjoy a spectacular view of the hills and city of Cebu in the distance. It is of course open so natural sea breezes will keep you cool while the salt water â€˜scentâ€™ acts as a natural prop to this wonderful stage. The menu boasts a number of mouthwatering native dishes but clearly fresh fish is the order of the day.', 'Sa Baybayon, Cordova, Cebu', '(032) 514 2959', '100', '25', '', '10:00', '23:00', NULL, 10.256, 123.933, 'admin10', '123', 'Lan', 'Taw', 'Monteatlo', '098272626', 'lantawtest@gmail.com', 'Aliwanay Balamban Cebu', '1519561849lantaw.jpg', 1, '2018-02-25 8:26:12', '2019-02-25 8:26:12'),
(16, 3, 'Acacia Steakhouse', 'If you fancy steak so much, there\'s a place for you in the city. It just opened! You might wanna check it out! You would not regret going to this Steakhouse. Had a very sumptuous dinner with my friends. Medium Rare cooked and very efficient even if the order was in bulk. Lots of varieties of them steaks! ', '1st Acacia St. Green Valley Subdivision, Lahug, Cebu City, 6000 Cebu', '(032) 514 4113', '100', '15', '', '11:30', '22:00', NULL, 10.3234, 123.892, 'admin11', '123', 'James', 'Christ', 'Jainar', '0982726268', 'acaciatest@gmail.com', 'Cebu City', '1519565125logo.jpg', 1, '2018-02-25 9:17:25', '2019-02-25 9:17:25');

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
(60, 3, 'February 2, 2018', '10:30 AM', 'February 3, 2018', '10:30 AM', '0', '2018-02-20 15:43:23', 1279),
(61, 3, '3/2/2018', '11:30 AM', '3/5/2018', '4:00 PM', '1', '2018-02-25 07:13:28', 154),
(62, 1, 'March 1, 2018', '1:30 PM', 'March 1, 2018', '2:30 PM', '0', '2018-02-28 20:34:50', 1895);

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
(4, '6', '12', '6', 'Center Table', 1, '1518858523JustMom-kuya-j-restaurant-stuff.JPG', 0),
(5, '5', '8', '6', 'Center table', 3, '1519147361casa-verde-sm-seaside-fancy-seats.jpg', 0),
(6, '1', '5', '4', 'Side table', 3, '1519147422casa-verde-sm-seaside-tables.jpg', 0),
(7, '2', '4', '4', 'Next to table 1', 3, '1519149129casa-verde-sm-seaside-tables.jpg', 0),
(8, '11', '6', '5', 'Near the window', 3, '1519149385img_4508.jpg', 0),
(9, '15', '4', '4', 'Near the entrance', 3, '1519149430img_4512.jpg', 0),
(10, '2', '10', '5', 'Near the door', 13, '1519542592Php-512.png', 1);

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
(2, 3, 'PAY-3SU342947X986640ULKEFDEQ', '1000.00', '1ac6562cc74f9b4416739d45c8849508', 1),
(3, 6, 'PAY-55B4586211243774PLKFKO3I', '500.00', '15e01c506ec914c805814ee917a2e20f', 0),
(4, 7, 'PAY-3EX27423UW996412YLKFKP4Y', '1500.00', 'fe1ae5d87b57bc6088af78f6972fce8a', 0),
(5, 8, 'PAY-1WD25542SY765615ELKFKQVY', '500.00', 'a7985a293aa06d9a74041448325f9dd4', 1),
(6, 11, 'PAY-09T91565JT4183642LKF5SOQ', '1', 'fde6350040cc896df2de1bda94e3601a', 1),
(7, 12, 'PAY-322188151E045972ULKGICTI', '1000.00', '9426669bb27d9c0d0eef349da7d9a7b7', 0),
(8, 12, 'PAY-47N411415C857283JLKGIDRQ', '1000.00', '563f463a25b4429230b8b3b24406d59e', 1),
(9, 13, 'PAY-0RY17550598780604LKJF6JA', '1000.00', 'bfd7bf8f08c014e6e7c84bfa8c1bee2f', 1),
(10, 14, 'PAY-06D63143N93635813LKJIFEY', '1500.00', 'e742dcf8399788a423b95f6a023a2b1c', 1),
(11, 15, 'PAY-83H64546T0120284KLKJKW3Y', '1500.00', '5f03b0a818146e573f13f836b24d657d', 1),
(12, 16, 'PAY-4AG687403J297042ULKJLO3Y', '1500.00', '3058abe968d8a890ba84cf571ac4c702', 1);

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
(4, 1, 2, 21, '2018-02-25 07:19:05'),
(7, 3, 2, 6, '2018-02-21 11:28:33'),
(8, 3, 1, 20, '2018-02-20 17:01:13'),
(9, 1, 1, 125, '2018-02-28 20:17:03'),
(10, 14, 2, 2, '2018-02-25 10:04:42'),
(11, 1, 3, 40, '2018-02-28 19:51:47'),
(12, 12, 3, 1, '2018-02-28 19:52:03'),
(13, 15, 11, 1, '2018-03-03 03:08:16'),
(14, 1, 4, 19, '2018-03-04 13:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `combo_meals`
--
ALTER TABLE `combo_meals`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
