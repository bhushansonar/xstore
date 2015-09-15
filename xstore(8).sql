-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2012 at 02:28 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `AdminRole` varchar(255) NOT NULL,
  `LastLogin` date NOT NULL,
  `Status` tinyint(4) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserName`, `Password`, `FirstName`, `LastName`, `Email`, `AdminRole`, `LastLogin`, `Status`) VALUES
(1, 'admin', 'V1ZkU2RHRlhOSGhOYWswOQ==', 'Kiran', 'Nayi', 'Kiran_n_nayi@yahoo.co.in', 'Super Admin', '2012-04-24', 1),
(6, 'kiran89', '', 'mehul', 'nayi', 'kirannayi@gmail.com', 'Admin', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `Category`) VALUES
(1, 'Gents Wear'),
(2, 'Ladies Wear');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `CountryId` int(5) NOT NULL AUTO_INCREMENT,
  `Country` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`CountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `Country`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Cook Islands'),
(52, 'Costa Rica'),
(53, 'Cote d''ivoire'),
(54, 'Croatia'),
(55, 'Cuba'),
(56, 'Cyprus'),
(57, 'Czech Republic'),
(58, 'Democratic Republic of the Congo'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadaloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard Island and McDonald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Indonesia'),
(101, 'Iran'),
(102, 'Iraq'),
(103, 'Ireland'),
(104, 'Isle of Man'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Jamaica'),
(108, 'Japan'),
(109, 'Jersey'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Kuwait'),
(115, 'Kyrgyzstan'),
(116, 'Laos'),
(117, 'Latvia'),
(118, 'Lebanon'),
(119, 'Lesotho'),
(120, 'Liberia'),
(121, 'Libya'),
(122, 'Liechtenstein'),
(123, 'Lithuania'),
(124, 'Luxembourg'),
(125, 'Macao'),
(126, 'Macedonia'),
(127, 'Madagascar'),
(128, 'Malawi'),
(129, 'Malaysia'),
(130, 'Maldives'),
(131, 'Mali'),
(132, 'Malta'),
(133, 'Marshall Islands'),
(134, 'Martinique'),
(135, 'Mauritania'),
(136, 'Mauritius'),
(137, 'Mayotte'),
(138, 'Mexico'),
(139, 'Micronesia'),
(140, 'Moldava'),
(141, 'Monaco'),
(142, 'Mongolia'),
(143, 'Montenegro'),
(144, 'Montserrat'),
(145, 'Morocco'),
(146, 'Mozambique'),
(147, 'Myanmar'),
(148, 'Namibia'),
(149, 'Nauru'),
(150, 'Nepal'),
(151, 'Netherlands Antilles'),
(152, 'Netherlands'),
(153, 'New Caledonia'),
(154, 'New Zealand'),
(155, 'Nicaragua'),
(156, 'Niger'),
(157, 'Nigeria'),
(158, 'Niue'),
(159, 'Norfolk Island'),
(160, 'North Korea'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territory'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Phillipines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Reunion'),
(178, 'Romania'),
(179, 'Russia'),
(180, 'Rwanda'),
(181, 'Saint Barthelemy'),
(182, 'Saint Helena'),
(183, 'Saint Kitts and Nevis'),
(184, 'Saint Lucia'),
(185, 'Saint Martin'),
(186, 'Saint Pierre and Miquelon'),
(187, 'Saint Vincent and the Grenadines'),
(188, 'Samoa'),
(189, 'San Marino'),
(190, 'Sao Tome and Principe'),
(191, 'Saudi Arabia'),
(192, 'Senegal'),
(193, 'Serbia'),
(194, 'Seychelles'),
(195, 'Sierra Leone'),
(196, 'Singapore'),
(197, 'Slovakia'),
(198, 'Slovenia'),
(199, 'Solomon Islands'),
(200, 'Somalia'),
(201, 'South Africa'),
(202, 'South Georgia and the South Sandwich Islands'),
(203, 'South Korea'),
(204, 'Spain'),
(205, 'Sri Lanka'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syria'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania'),
(216, 'Thailand'),
(217, 'Timor-Leste'),
(218, 'Togo'),
(219, 'Tokelau'),
(220, 'Tonga'),
(221, 'Trinidad and Tobago'),
(222, 'Tunisia'),
(223, 'Turkey'),
(224, 'Turkmenistan'),
(225, 'Turks and Caicos Islands'),
(226, 'Tuvalu'),
(227, 'Uganda'),
(228, 'Ukraine'),
(229, 'United Arab Emirates'),
(230, 'United Kingdom'),
(231, 'United States Minor Outlying Islands'),
(232, 'United States'),
(233, 'Uruguay'),
(234, 'Uzbekistan'),
(235, 'Vanuatu'),
(236, 'Vatican City'),
(237, 'Venezuela'),
(238, 'Vietnam'),
(239, 'Virgin Islands, British'),
(240, 'Virgin Islands, US'),
(241, 'Wallis and Futuna'),
(242, 'Western Sahara'),
(243, 'Yemen'),
(244, 'Zambia'),
(245, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `TransactionId` varchar(255) NOT NULL,
  `TransactionType` varchar(255) NOT NULL,
  `PaymentType` varchar(255) NOT NULL,
  `CurrencyCode` varchar(255) NOT NULL,
  `PaymentStatus` varchar(255) NOT NULL,
  `OrderTime` varchar(255) NOT NULL,
  `ACK` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductSize` int(11) NOT NULL,
  `Product_Qty` int(11) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ShipToAddress` varchar(255) NOT NULL,
  `ShipToCity` varchar(255) NOT NULL,
  `ShipToState` varchar(255) NOT NULL,
  `ShipToCountry` varchar(255) NOT NULL,
  `ShipToZip` int(6) NOT NULL,
  `TotalAmount` int(6) NOT NULL,
  PRIMARY KEY (`PaymentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentId`, `TransactionId`, `TransactionType`, `PaymentType`, `CurrencyCode`, `PaymentStatus`, `OrderTime`, `ACK`, `Email`, `UserId`, `FirstName`, `LastName`, `ProductId`, `ProductSize`, `Product_Qty`, `ProductPrice`, `ShipToAddress`, `ShipToCity`, `ShipToState`, `ShipToCountry`, `ShipToZip`, `TotalAmount`) VALUES
(1, '8Y759384DB4747334', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-17T05:52:02Z', 'Success', 'jp@mail.com', 32, 'jaypal<br>', 'patel<br>', 68, 2, 2, 750, 'swaminarayan mandir ni same<br>', 'havalad<br>', 'GUJRAT<br>', 'India<br>', 321456, 2907),
(2, '8Y759384DB4747334', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-17T05:52:02Z', 'Success', 'jp@mail.com', 32, 'jaypal<br>', 'patel<br>', 71, 3, 1, 1500, 'swaminarayan mandir ni same<br>', 'havalad<br>', 'GUJRAT<br>', 'India<br>', 321456, 2907),
(5, '2EY66808WD790804V', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-17T09:08:22Z', 'Success', 'binal@mail.com', 38, 'binal', 'patel', 68, 3, 1, 713, '15,navjivan society ', 'patan', 'GUJRAT', 'India', 384265, 714),
(6, '94U36697MU662715S', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-17T09:28:48Z', 'Success', 'binal@mail.com', 38, 'binal', 'patel', 68, 3, 1, 713, '15,navjivan society ', 'patan', 'GUJRAT', 'India', 384265, 1938),
(7, '94U36697MU662715S', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-17T09:28:48Z', 'Success', 'binal@mail.com', 38, 'binal', 'patel', 73, 2, 1, 1200, '15,navjivan society ', 'patan', 'GUJRAT', 'India', 384265, 1938),
(8, '8A717758SG2441025', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-17T09:34:09Z', 'Success', 'ankit@mail.com', 39, 'ankit', 'pancholi', 69, 3, 1, 600, 'rajpipla road', 'rajpipla', 'GUJRAT', 'India', 123698, 612),
(9, '02140356BP425264Y', 'expresscheckout', 'instant', 'USD', 'Pending', '2012-04-18T09:26:43Z', 'Success', 'c@mail.com', 42, 'chirag', 'patel', 69, 2, 1, 600, 'madhav park soc', 'ahmedabae', 'GUJRAT', 'India', 456856, 612);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(255) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  `BrandId` int(11) NOT NULL,
  `MaterialId` int(11) NOT NULL,
  `DesignId` int(11) NOT NULL,
  `CollarId` int(11) NOT NULL,
  `ProductImage` text NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `CategoryId`, `SubCategoryId`, `BrandId`, `MaterialId`, `DesignId`, `CollarId`, `ProductImage`, `ProductPrice`, `offer`) VALUES
(50, 'levis man jacket O 36', 1, 1, 8, 2, 4, 5, 'product_50.jpg', 1500, 10),
(51, 'Adidas man jacket O 3686', 1, 1, 1, 4, 8, 9, 'product_51.jpg', 1999, 0),
(52, 'nike man jacket N 1520', 1, 1, 11, 7, 10, 10, 'product_52.jpg', 2199, 0),
(53, 'puma man jacket P 1010', 1, 1, 10, 10, 13, 9, 'product_53.jpg', 2000, 15),
(54, 'Rebbok Jackets 1303', 1, 1, 9, 5, 5, 0, 'product_54.jpg', 899, 10),
(55, 'Diesel man jacket', 1, 1, 4, 10, 9, 9, 'product_55.jpg', 2500, 25),
(56, 'Lee man Jeans 1202', 1, 2, 7, 2, 5, 0, 'product_56.jpg', 1000, 0),
(57, 'Puma Jeans 1505', 1, 2, 10, 2, 5, 0, 'product_57.jpg', 1111, 0),
(58, 'Tommy Hillfigher Jeans', 1, 2, 12, 2, 5, 0, 'product_58.jpg', 3500, 0),
(59, 'Lavnya Saree Red 18', 2, 12, 15, 7, 4, 0, 'product_59.jpg', 1799, 0),
(60, 'Myra Saree Pink sweet', 2, 12, 16, 9, 4, 0, 'product_60.jpg', 1500, 5),
(61, 'Chabra 555 Saree', 2, 12, 14, 8, 4, 0, 'product_61.jpg', 1299, 0),
(64, 'S Oliver Women Tops', 2, 13, 13, 4, 13, 7, 'product_64.jpg', 2999, 25),
(65, 'Rebbok Ladies Top', 2, 13, 9, 3, 2, 2, 'product_65.jpg', 799, 0),
(66, 'Puma Women Tops', 2, 13, 10, 5, 4, 5, 'product_66.jpg', 1555, 0),
(67, 'Levis Women Tops', 2, 13, 8, 3, 5, 6, 'product_67.jpg', 2799, 0),
(68, 'csk TSHIRT', 1, 9, 9, 1, 6, 9, 'product_68.JPG', 750, 5),
(69, 'dd TSHIRT', 1, 9, 9, 1, 6, 5, 'product_69.jpg', 600, 0),
(70, 'RCB TSHIRT', 1, 9, 9, 1, 6, 9, 'product_70.jpg', 800, 5),
(71, 'KKR TSHIRT', 1, 9, 9, 1, 6, 0, 'product_71.jpg', 1500, 0),
(72, 'DC TSHIRT', 1, 9, 9, 1, 6, 5, 'product_72.jpg', 600, 10),
(73, 'MI TSHIRT', 1, 9, 9, 1, 6, 9, 'product_73.jpg', 1200, 0),
(74, 'PW TSHIRT', 1, 9, 9, 1, 6, 9, 'product_74.jpg', 900, 0),
(75, 'KIXP TSHIRT', 1, 9, 9, 1, 6, 9, 'product_75.jpg', 799, 0),
(76, 'RR TSHIRT', 1, 9, 9, 1, 6, 0, 'product_76.jpg', 500, 0),
(77, 'S Oliver Women Kurtis', 2, 18, 13, 4, 3, 3, 'product_77.jpg', 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE IF NOT EXISTS `product_brand` (
  `BrandId` int(11) NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAddress` varchar(255) NOT NULL,
  `ContactNo` bigint(20) NOT NULL,
  `BrandImage` text NOT NULL,
  PRIMARY KEY (`BrandId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`BrandId`, `BrandName`, `CompanyName`, `CompanyAddress`, `ContactNo`, `BrandImage`) VALUES
(1, 'Adidas', 'Adidas', 'adidas India Marketing Pvt. Ltd. Unitech Commercial Tower-II 5th Floor, Sector-45, Block-B Greenwood City, Gurgaon Haryana India', 51236, 'brand_1.gif'),
(2, 'calvin klein', 'calvin klein', '205 West 39th Street new york, new york, 10018', 0, 'brand_2.gif'),
(3, 'Duke', 'Duke', 'bombay', 0, 'brand_3.gif'),
(4, 'Diesel', 'Diesel', 'ahmedabad', 0, 'brand_4.gif'),
(5, 'John Player', 'John Player', 'bombay', 0, 'brand_5.gif'),
(6, 'Peter-England', 'Peter-England', 'ahmedabad', 0, 'brand_6.gif'),
(7, 'Lee', 'Lee', 'bombay', 0, 'brand_7.gif'),
(8, 'Levi''s', 'Levi''s', 'ahmedabad', 0, 'brand_8.gif'),
(9, 'Reebok', 'Reebok', 'bombay', 0, 'brand_9.gif'),
(10, 'Puma', 'Puma', 'bombay', 0, 'brand_10.gif'),
(11, 'Nike', 'Nike', 'bombay', 0, 'brand_11.gif'),
(12, 'Tommy-Hilfigher', 'Tommy-Hilfigher', 'bombay', 0, 'brand_12.gif'),
(13, 'S.oliver', 'S.oliver', 'bombay', 0, 'brand_13.gif'),
(14, 'Chabra 555', 'Chabra 555', 'ahmedabad', 0, 'brand_14.gif'),
(15, 'Lavanya', 'Lavanya', 'bombay', 0, 'brand_15.gif'),
(16, 'Myra', 'Myra', 'bombay', 0, 'brand_16.gif'),
(52, 'Arrow', 'Arrow', 'Baroda', 0, 'brand_52.gif'),
(53, 'BELMONT', 'BELMONT', 'Surat', 0, 'brand_53.gif'),
(54, 'Provouge', 'Provouge', 'Baroda', 0, 'brand_54.gif'),
(55, 'DKNY', 'DKNY', 'Pune', 0, 'brand_55.gif'),
(56, 'Carlton', 'Carlton', 'Pune', 0, 'brand_56.gif'),
(57, 'Dolce Gabbana', 'Dolce Gabbana', 'Baroda', 0, 'brand_57.gif');

-- --------------------------------------------------------

--
-- Table structure for table `product_collar`
--

CREATE TABLE IF NOT EXISTS `product_collar` (
  `CollarId` int(11) NOT NULL AUTO_INCREMENT,
  `CollarName` varchar(255) NOT NULL,
  PRIMARY KEY (`CollarId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product_collar`
--

INSERT INTO `product_collar` (`CollarId`, `CollarName`) VALUES
(1, 'Bottel-Neck'),
(2, 'Cowl-Neck'),
(3, 'Hi-Neck'),
(4, 'One Shoulder-Neck'),
(5, 'Round-Neck'),
(6, 'U-Neck'),
(7, 'V-Neck'),
(8, 'Square-Neck'),
(9, 'Collars'),
(10, 'Sweetheart-Neck'),
(11, 'Boat-Neck'),
(12, 'Bow-Neck'),
(13, 'Hood');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE IF NOT EXISTS `product_color` (
  `ColorId` int(11) NOT NULL AUTO_INCREMENT,
  `ColorName` varchar(255) NOT NULL,
  PRIMARY KEY (`ColorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`ColorId`, `ColorName`) VALUES
(1, 'Beidge'),
(2, 'Black'),
(3, 'Blue'),
(4, 'Brown'),
(5, 'Green'),
(6, 'Grey'),
(7, 'Orange'),
(8, 'Pink'),
(9, 'Purple'),
(11, 'White'),
(12, 'Yellow'),
(13, 'Multicolor'),
(14, 'Mustered'),
(15, 'Gold'),
(16, 'English'),
(17, 'Silver'),
(18, 'Rainbow'),
(19, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `product_design`
--

CREATE TABLE IF NOT EXISTS `product_design` (
  `DesignId` int(11) NOT NULL AUTO_INCREMENT,
  `DesignName` varchar(255) NOT NULL,
  PRIMARY KEY (`DesignId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product_design`
--

INSERT INTO `product_design` (`DesignId`, `DesignName`) VALUES
(1, 'Bold Stripes'),
(2, 'Checks'),
(3, 'Embroidery'),
(4, 'Printed'),
(5, 'Solid'),
(6, 'T20'),
(7, 'World Cup'),
(8, 'Acid Wash'),
(9, 'Enzyme Wash'),
(10, 'Raw Wash'),
(11, 'Stone Wash'),
(12, 'Pin Stripes'),
(13, 'Self Design'),
(14, 'Soldier');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE IF NOT EXISTS `product_material` (
  `MaterialId` int(11) NOT NULL AUTO_INCREMENT,
  `MaterialName` varchar(255) NOT NULL,
  PRIMARY KEY (`MaterialId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`MaterialId`, `MaterialName`) VALUES
(1, 'Cotton'),
(2, 'Denim'),
(3, 'Nylon'),
(4, 'Silk'),
(5, 'Viscose'),
(6, 'Polyster'),
(7, 'Georgette'),
(8, 'Jacquard'),
(9, 'Net'),
(10, 'Woolen');

-- --------------------------------------------------------

--
-- Table structure for table `product_qty`
--

CREATE TABLE IF NOT EXISTS `product_qty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(10) NOT NULL,
  `SizeId` int(3) NOT NULL,
  `ColorId` int(3) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `product_qty`
--

INSERT INTO `product_qty` (`id`, `ProductId`, `SizeId`, `ColorId`, `Quantity`, `SubCategoryId`) VALUES
(12, 48, 11, 16, 100, 1),
(13, 48, 8, 9, 150, 1),
(14, 49, 1, 7, 12, 1),
(15, 49, 12, 16, 32, 1),
(16, 50, 1, 2, 100, 1),
(17, 50, 4, 6, 150, 1),
(18, 50, 3, 9, 50, 1),
(19, 51, 1, 4, 200, 1),
(20, 51, 2, 3, 100, 1),
(21, 51, 3, 14, 20, 1),
(22, 51, 4, 19, 70, 1),
(23, 52, 4, 2, 150, 1),
(24, 52, 5, 4, 50, 1),
(25, 52, 3, 17, 20, 1),
(26, 53, 2, 11, 150, 1),
(27, 53, 4, 16, 100, 1),
(28, 53, 5, 8, 30, 1),
(29, 53, 1, 14, 80, 1),
(30, 54, 1, 1, 150, 1),
(31, 54, 2, 3, 50, 1),
(32, 54, 3, 14, 20, 1),
(33, 54, 4, 17, 55, 1),
(34, 54, 5, 18, 30, 1),
(35, 55, 3, 4, 500, 1),
(36, 55, 4, 6, 100, 1),
(37, 55, 5, 4, 150, 1),
(38, 56, 7, 3, 200, 2),
(39, 56, 9, 3, 300, 2),
(40, 56, 10, 6, 400, 2),
(41, 56, 11, 11, 50, 2),
(42, 57, 8, 3, 150, 2),
(43, 57, 9, 2, 100, 2),
(44, 57, 10, 4, 100, 2),
(45, 57, 11, 1, 32, 2),
(46, 57, 12, 11, 12, 2),
(47, 58, 8, 2, 100, 2),
(48, 58, 9, 2, 32, 2),
(49, 58, 10, 6, 400, 2),
(50, 58, 12, 4, 50, 2),
(51, 59, 14, 2, 500, 12),
(52, 60, 14, 3, 551, 12),
(53, 61, 14, 8, 300, 12),
(54, 62, 1, 6, 200, 13),
(55, 62, 2, 4, 300, 13),
(56, 62, 3, 19, 100, 13),
(57, 63, 1, 6, 200, 13),
(58, 63, 2, 4, 300, 13),
(59, 63, 3, 19, 100, 13),
(60, 64, 1, 11, 100, 13),
(61, 64, 2, 4, 50, 13),
(62, 64, 3, 3, 32, 13),
(63, 65, 2, 4, 50, 13),
(64, 65, 4, 11, 300, 13),
(65, 65, 3, 9, 32, 13),
(66, 66, 2, 4, 400, 13),
(67, 66, 3, 3, 100, 13),
(68, 66, 4, 14, 150, 13),
(69, 67, 2, 8, 50, 13),
(70, 67, 4, 9, 300, 13),
(71, 68, 2, 12, 97, 9),
(72, 68, 3, 12, 149, 9),
(73, 68, 4, 12, 50, 9),
(74, 69, 2, 3, 49, 9),
(75, 69, 3, 3, 48, 9),
(76, 69, 4, 3, 50, 9),
(77, 70, 1, 19, 32, 9),
(78, 70, 2, 19, 12, 9),
(79, 70, 3, 19, 32, 9),
(80, 70, 4, 19, 32, 9),
(81, 71, 2, 9, 50, 9),
(82, 71, 3, 9, 49, 9),
(83, 71, 4, 9, 50, 9),
(84, 71, 5, 9, 50, 9),
(85, 72, 3, 1, 70, 9),
(86, 72, 4, 1, 70, 9),
(87, 73, 2, 14, 31, 9),
(88, 73, 3, 14, 50, 9),
(89, 73, 4, 14, 32, 9),
(90, 74, 3, 2, 50, 9),
(91, 74, 2, 2, 150, 9),
(92, 74, 4, 2, 100, 9),
(93, 75, 2, 19, 150, 9),
(94, 75, 3, 19, 100, 9),
(95, 75, 4, 19, 300, 9),
(96, 76, 2, 3, 150, 9),
(97, 76, 4, 3, 50, 9),
(98, 77, 2, 13, 150, 13),
(99, 77, 4, 13, 32, 13);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `SizeId` int(11) NOT NULL AUTO_INCREMENT,
  `Size` varchar(15) NOT NULL,
  PRIMARY KEY (`SizeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`SizeId`, `Size`) VALUES
(1, 'L'),
(2, 'M'),
(3, ' S'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXXL'),
(7, '28'),
(8, '30'),
(9, '32'),
(10, '34'),
(11, '36'),
(12, '38'),
(13, '40'),
(14, 'FreeSize');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` varchar(255) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `StateID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(50) NOT NULL,
  PRIMARY KEY (`StateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateID`, `StateName`) VALUES
(1, 'ANDHRA PRADESH'),
(2, 'ASSAM'),
(3, 'ARUNACHAL PRADESH'),
(4, 'GUJRAT'),
(5, 'BIHAR'),
(6, 'HARYANA'),
(7, 'HIMACHAL PRADESH'),
(8, 'JAMMU & KASHMIR'),
(9, 'KARNATAKA'),
(10, 'KERALA'),
(11, 'MADHYA PRADESH'),
(12, 'MAHARASHTRA'),
(13, 'MANIPUR'),
(14, 'MEGHALAYA'),
(15, 'MIZORAM'),
(16, 'NAGALAND'),
(17, 'ORISSA'),
(18, 'PUNJAB'),
(19, 'RAJASTHAN'),
(20, 'SIKKIM'),
(21, 'TAMIL NADU'),
(22, 'TRIPURA'),
(23, 'UTTAR PRADESH'),
(24, 'WEST BENGAL'),
(25, 'DELHI'),
(26, 'GOA'),
(27, 'PONDICHERY'),
(28, 'LAKSHDWEEP'),
(29, 'DAMAN & DIU'),
(30, 'DADRA & NAGAR'),
(31, 'CHANDIGARH'),
(32, 'ANDAMAN & NICOBAR'),
(33, 'UTTARANCHAL'),
(34, 'JHARKHAND'),
(35, 'CHATTISGARH');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `SubCategory` varchar(255) NOT NULL,
  PRIMARY KEY (`SubCategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SubCategoryId`, `CategoryId`, `SubCategory`) VALUES
(1, 1, 'Jackets/Sweater'),
(2, 1, 'Jeans'),
(3, 1, 'Trousers'),
(4, 1, 'Track Pants'),
(5, 1, 'Track Suits'),
(6, 1, 'Kurtas'),
(7, 1, 'Shervani'),
(8, 1, 'Shirts'),
(9, 1, 'T-Shirts(Collar)'),
(11, 2, 'Jackets/Sweater'),
(12, 2, 'Sarees'),
(13, 2, 'Tops'),
(14, 2, 'Jeans'),
(15, 2, 'Scarves'),
(16, 2, 'Capris'),
(17, 2, 'Dresses'),
(18, 2, 'Kurtas/Kurtis'),
(19, 2, 'T-Shirts'),
(20, 2, 'Shirts'),
(21, 2, 'Shorts'),
(22, 2, 'Skirts'),
(23, 2, 'Cholis'),
(24, 2, 'Track-Pants');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` bigint(7) NOT NULL,
  `pics` text NOT NULL,
  `LastLogin` date NOT NULL,
  `Status` int(10) NOT NULL,
  `Ship_Address` varchar(255) NOT NULL,
  `Ship_City` varchar(255) NOT NULL,
  `Ship_State` varchar(255) NOT NULL,
  `Ship_Country` varchar(255) NOT NULL,
  `Ship_Zip` int(11) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `firstname`, `lastname`, `gender`, `email`, `password`, `bdate`, `mobile`, `address`, `country`, `state`, `city`, `pincode`, `pics`, `LastLogin`, `Status`, `Ship_Address`, `Ship_City`, `Ship_State`, `Ship_Country`, `Ship_Zip`) VALUES
(30, 'kiran', 'nayi', 'Male', 'kirannayi@gmail.com', '1234567', '1989-08-24', 9898747693, '29,maheshwari soc', 'India', 'GUJRAT', 'mehsana', 384210, '22820friend (14).jpg', '0000-00-00', 1, '', '', '', '', 0),
(31, 'mehul', 'patel', 'Male', 'mehul@mail.com', 'palanpur', '1990-08-15', 9725368456, 'mandir road', 'India', 'GUJRAT', 'baroda', 384265, '', '0000-00-00', 1, '', '', '', '', 0),
(32, 'jaypal', 'patel', 'Male', 'jp@mail.com', 'havalad', '1989-01-01', 9779977997, 'swaminarayan mandir ni same', 'India', 'GUJRAT', 'havalad', 321456, '32629brand (2).gif', '0000-00-00', 1, 'swaminarayan mandir ni same', 'havalad', 'GUJRAT', 'India', 321456),
(38, 'binal', 'patel', 'Male', 'binal@mail.com', '1234567', '1988-02-18', 9898375631, '15,navjivan society ', 'India', 'GUJRAT', 'patan', 384265, '1189011c18faa04bc14c6df84183a5a38f229_images_180_240.jpg', '0000-00-00', 1, '15,navjivan society ', 'patan', 'GUJRAT', 'India', 384265),
(39, 'ankit', 'pancholi', 'Male', 'ankit@mail.com', '1234567', '1989-08-02', 1236985478, 'rajpipla road', 'India', 'GUJRAT', 'rajpipla', 123698, '', '0000-00-00', 1, 'rajpipla road', 'rajpipla', 'GUJRAT', 'India', 123698),
(40, 'dhamo', 'patel', 'Male', 'dhamo@mail.com', '1234567', '0000-00-00', 0, '203/b hargovind apprt', 'india', 'gujarat', 'ahmedabad', 384265, '', '0000-00-00', 1, '203/b hargovind apprt', 'ahmedabad', 'gujarat', 'india', 384265),
(42, 'chirag', 'patel', 'Male', 'c@mail.com', '1234567', '1990-01-05', 9998135059, 'madhav park soc', 'India', 'GUJRAT', 'ahmedabae', 456856, '', '0000-00-00', 1, 'madhav park soc', 'ahmedabae', 'GUJRAT', 'India', 456856);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `WishlistId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductImage` text NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  PRIMARY KEY (`WishlistId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishlistId`, `UserId`, `ProductId`, `ProductPrice`, `ProductImage`, `ProductName`) VALUES
(1, 10, 2, 1500, 'product_2.jpg', 'Adidas man jacket O 3686'),
(3, 31, 50, 1500, 'product_50.jpg', 'levis man jacket O 36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
