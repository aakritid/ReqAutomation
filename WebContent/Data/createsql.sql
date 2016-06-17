/*LOAD DATA INFILE 'C:\job_codes.csv' 
INTO TABLE jobcode 
FIELDS TERMINATED BY ',' 
LINES TERMINATED BY '\r\n'
(JobCode, Descr, @ignore);

LOAD DATA INFILE 'C:\vendors.csv' 
INTO TABLE vendors 
FIELDS TERMINATED BY ';' 
LINES TERMINATED BY ',,,,,\r\n'
(VendorName, VendorAddress);
*/

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2016 at 09:10 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchasereq`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `ReqId` int(11) NOT NULL,
  `AppDen` tinyint(1) NOT NULL,
  `Reason` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Approver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`ReqId`, `AppDen`, `Reason`, `Date`, `Approver`) VALUES
(13, 1, 'Extra', '2016-06-10 13:17:22', 1),
(5, 0, '', '2016-06-10 13:17:22', 1),
(8, 0, '', '2016-06-10 13:17:22', 1),
(21, 0, '', '2016-06-10 13:17:22', 1),
(14, 1, 'Denied', '2016-06-10 13:17:22', 1),
(10, 0, '', '2016-06-10 13:17:22', 1),
(15, 0, '', '2016-06-10 13:17:22', 1),
(28, 0, '', '2016-06-10 13:17:22', 1),
(25, 0, '', '2016-06-10 13:17:22', 1),
(24, 1, '', '2016-06-10 13:17:22', 1),
(23, 0, '', '2016-06-10 13:17:22', 1),
(18, 0, '', '2016-06-10 13:17:22', 1),
(20, 0, '', '2016-06-10 13:17:22', 1),
(29, 0, '', '2016-06-10 13:17:22', 1),
(30, 0, '', '2016-06-10 13:56:40', 1),
(27, 0, '', '2016-06-10 14:13:51', 1),
(31, 0, '', '2016-06-10 14:15:46', 1),
(16, 0, '', '2016-06-10 14:17:03', 7),
(2, 0, '', '2016-06-10 14:51:15', 1),
(36, 0, '', '2016-06-13 11:57:12', 1),
(39, 0, '', '2016-06-14 15:56:10', 1),
(7, 0, '', '2016-06-16 15:20:50', 1),
(40, 0, '', '2016-06-17 10:45:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemdescr`
--

CREATE TABLE `itemdescr` (
  `itemid` int(11) NOT NULL,
  `ItemNo` varchar(40) NOT NULL,
  `Descr` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitDesc` varchar(30) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `Total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemdescr`
--

INSERT INTO `itemdescr` (`itemid`, `ItemNo`, `Descr`, `Quantity`, `UnitDesc`, `UnitPrice`, `Total`) VALUES
(2, '54345', 'fgfdgdfg', 3, 'gsdfd', '40.00', '$120.00'),
(6, '54325', 'fgdgf', 453, 'ggdfg', '4.00', '$1812.00'),
(8, '5543', 'gerfe', 342, 'ggr', '2.00', '$684.00'),
(9, '4543', 'gfsdfad', 32, 'fvgdfg', '33.00', '$1056.00'),
(11, '32423', 'gfdgd', 34, 'fdgfd', '12.00', '$408.00'),
(12, '34323', 'fdsfs', 2, '12 pack', '65.00', '$130.00'),
(13, '342', 'fdgfd', 43, 'ffdgs', '23.00', '$989.00'),
(14, '34233', 'fsfds', 3, 'fdfd', '123.00', '$369.00'),
(15, '5435', 'hhdufgsu', 2, 'sdfsd', '12.00', '$24.00'),
(16, '4535', 'sfsdbvbd', 12, 'fsdfs', '30.00', '$360.00'),
(17, '453', 'sdfsdf', 12, 'ewrew', '230.00', '$2760.00'),
(18, '5435', 'fvsdfds', 7, '1 pack', '123.00', '$861.00'),
(19, '5653', 'AI BOLTS', 4, '12 pack', '35.00', '$140.00'),
(20, '65422', 'DDFDE Tapes', 10, '3 pack', '40.00', '$400.00'),
(21, '2323221', 'adasdaksjj', 4, '3 pack', '240.00', '$960.00'),
(22, '22324', 'fdsdsgs', 3, '44 pack', '123.00', '$369.00'),
(23, '6547', 'rertryre', 1, '12 pack', '58.00', '$57.50'),
(24, '34234', 'rterte', 1, 'rtre', '126.00', '$125.50'),
(27, '543', 'bgbf', 3, 'fdgfd', '36.00', '$106.50'),
(28, '765', 'gfhgf', 5, 'gfhf', '85.00', '$425.00'),
(29, '543', 'dfdsf', 35, 'sdfds', '250.00', '$8750.00'),
(30, '3423', 'fgdsdfd', 2, 'dfsd', '300.00', '$600.00'),
(31, '452334', 'fsd', 3, 'ffds', '120.00', '$360.00'),
(32, '432fd', 'dwerwe', 4, '1 pack', '120.00', '$480.00'),
(33, '543543', 'fdfsdfdssgf', 30, 'fdgfgd', '37.00', '$1095.00'),
(34, '654345', 'dfdbbgbdfg', 4, 'fdgfd', '76.00', '$302.00'),
(35, '83424', 'ytrerer', 1, 'bght', '450.00', '$450.00'),
(36, '543d', 'abcd', 6, 'hgfhg', '120.00', '$720.00'),
(37, '654gfd', 'fdsfdsf', 4, 'fdsfsd', '55.00', '$220.00'),
(39, '432', 'gdf', 5, 'rter', '450.00', '$2250.00'),
(40, '5435', 'gerg', 45, 'dfgfd', '343.00', '$15423.75'),
(41, '342342', 'frgerg', 50, 'gdf', '30.00', '$1500.00'),
(42, '65422', 'DDFDE Tapes', 10, '3 pack', '40.00', '$400.00'),
(43, '2323221', 'adasdaksjj', 4, '3 pack', '240.00', '$960.00'),
(44, '76544', 'trvfdgdf', 5, '1 pack', '120.00', '$600.00'),
(45, '6534', 'ffewtrrwert', 20, 'trete', '55.00', '$1100.00'),
(46, '4323', 'dfwrerfwe', 50, 'ereewrw', '45.00', '$2250.00'),
(55, 'S-5996P', '3/16" UPSable Bubble wrap strong 24" x 300'' Roll-perforated every 12" each', 10, 'each', '74.00', '$740.00'),
(56, 's-1712', ' 6x9 4mm reclosable bag', 1, 'each', '67.00', '$67.00'),
(57, 's-1306', '12x15 4mm reclosable bag', 1, 'each', '80.00', '$80.00'),
(58, 's-1021', '8" cable ties', 1, 'each', '28.00', '$28.00'),
(59, 's-6706', 'natural cable tie kit 1M', 1, 'each', '38.00', '$38.00'),
(60, 'Op520ug machine joining tray', 'Lot of (7) underguarding joining rays for rework and paint for op520', 1, 'each', '665.00', '$665.00'),
(61, 'Tax', 'Tax @ 13%', 1, 'each', '86.45', '$86.45'),
(62, 'PAZ29B105025', 'Coolant tray # PAZ29B105025- modified as directed and rev 01 print received Friday afternoon 4-29-16 at 1:56pm, dated 5-1-16, including leak test & repainting.', 1, 'each', '650.00', '$650.00'),
(63, 'BT#165890000209', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(64, 'BT#165890000210', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(65, 'BT#165890000211', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(66, 'BT#165890000212', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(67, 'BT#165890000213', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(68, 'BT#165890000217', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(69, 'BT#165890000218', 'Oil board stencil with 3" tall lettering', 1, 'each', '26.91', '$26.91'),
(70, 'PAZ29B016105', 'Resting Pad - PAZ29B016105', 8, 'each', '75.00', '$600.00'),
(71, 'PAZ29B105018', 'Nylon Block 2 - PAZ29B105018', 4, 'each', '135.00', '$540.00'),
(72, 'WK4.4T-*RS4.4T/S1587', 'Cables type: sensor required cable length: 10', 3, 'ea', '12.74', '$38.22'),
(73, 'WK4.4T-*RS4.4T/S1587', 'Cables type: sensor required cable length: 10', 2, 'ea', '12.74', '$25.48');

-- --------------------------------------------------------

--
-- Table structure for table `itemmap`
--

CREATE TABLE `itemmap` (
  `ReqId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemmap`
--

INSERT INTO `itemmap` (`ReqId`, `ItemId`) VALUES
(2, 2),
(4, 6),
(5, 8),
(6, 9),
(7, 11),
(8, 12),
(9, 13),
(10, 14),
(11, 15),
(11, 16),
(12, 17),
(12, 18),
(13, 19),
(13, 20),
(14, 21),
(15, 22),
(15, 23),
(16, 24),
(18, 27),
(18, 28),
(19, 29),
(20, 30),
(20, 31),
(21, 32),
(22, 33),
(23, 34),
(23, 35),
(24, 36),
(25, 37),
(27, 39),
(28, 40),
(29, 41),
(30, 42),
(31, 43),
(31, 44),
(32, 45),
(33, 46),
(36, 55),
(36, 56),
(36, 57),
(36, 58),
(36, 59),
(37, 60),
(37, 61),
(38, 62),
(39, 63),
(39, 64),
(39, 65),
(39, 66),
(39, 67),
(39, 68),
(39, 69),
(40, 70),
(40, 71),
(41, 72),
(41, 73);

-- --------------------------------------------------------

--
-- Table structure for table `jobcode`
--

CREATE TABLE `jobcode` (
  `JCId` int(11) NOT NULL,
  `JobCode` varchar(40) NOT NULL,
  `Descr` text NOT NULL,
  `Budget` decimal(15,2) UNSIGNED NOT NULL,
  `Spent` decimal(15,2) UNSIGNED NOT NULL,
  `PM` int(11) NOT NULL,
  `TotalAlloc` decimal(15,2) UNSIGNED NOT NULL,
  `Original` decimal(15,2) UNSIGNED NOT NULL,
  `Rev1` decimal(15,2) NOT NULL,
  `Rev2` decimal(15,2) NOT NULL,
  `Rev3` decimal(15,2) NOT NULL,
  `RevNo` int(11) NOT NULL DEFAULT '6',
  `SelfApp` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobcode`
--

INSERT INTO `jobcode` (`JCId`, `JobCode`, `Descr`, `Budget`, `Spent`, `PM`, `TotalAlloc`, `Original`, `Rev1`, `Rev2`, `Rev3`, `RevNo`, `SelfApp`) VALUES
(1, 'US13003 - Tigershark Rework', 'INDIA Rework related to manufacturing issues (100/0)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(2, 'US13004 - Tigershark MECR''s', 'INC  all new changes should have own job code', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(3, 'US14005 - Tigershark Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '131.00', '369.00', 0, '10500.00', '500.00', '0.00', '0.00', '0.00', 6, 0),
(4, 'US14006 - Tigershark Spares', 'INC', '1334.00', '1196.00', 4, '2400.00', '2400.00', '0.00', '0.00', '0.00', 6, 0),
(5, 'US14044AA - TS OP97 India Procurement', 'INDIA  Additional Material or Personnel Support Required', '5000.00', '0.00', 7, '51000.00', '5000.00', '6500.00', '6000.00', '5000.00', 10, 0),
(6, 'US14044AB - TS OP97 India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '10689.00', '1812.00', 7, '12501.00', '12501.00', '0.00', '0.00', '0.00', 6, 0),
(7, 'US14044AC - TS OP97 India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '26052.25', '23947.75', 0, '50000.00', '50000.00', '0.00', '0.00', '0.00', 6, 0),
(8, 'US14044BA - TS OP97 Sales Commission', 'INC  Code for Commissions', '4200.00', '5080.00', 7, '9500.00', '5000.00', '0.00', '0.00', '0.00', 6, 0),
(9, 'US14044BB - TS OP97 Inc Project Mgmt', 'INC  Code for Project Mgmt Hours', '7000.00', '0.00', 0, '7000.00', '7000.00', '0.00', '0.00', '0.00', 6, 0),
(10, 'US14044BC - TS OP97 Inc Warranty', 'INC  Warranty (support labor  application software help)', '2633.00', '6014.00', 0, '14000.00', '8000.00', '0.00', '0.00', '0.00', 6, 0),
(11, 'US14044BD - TS OP97 Inc Install', 'INC  Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(12, 'US14044BE - TS OP97 Inc Prod Support', 'INC  Portion of production support on CPO', '6405.00', '1095.00', 0, '7500.00', '7500.00', '0.00', '0.00', '0.00', 6, 0),
(13, 'US14052 - Tigershark Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(14, 'US15006AA - TS PSU Retool India Procurem', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(15, 'US15006AB - TS PSU India Rework', 'INDIA Rework related to manufacturing (Material & Labor)', '2500.00', '0.00', 0, '2500.00', '2500.00', '0.00', '0.00', '0.00', 6, 0),
(16, 'US15006AC - TS PSU India Warranty', 'INDIA Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(17, 'US15006BA - TS PSU Sales Commission', 'INC Code for Commissions', '6560.00', '2940.00', 0, '9500.00', '9500.00', '0.00', '0.00', '0.00', 6, 0),
(18, 'US15006BB - TS PSU Retool Project Mgmt', 'INC  Code for Project Mgmt Hours', '2300.00', '0.00', 0, '2300.00', '2300.00', '0.00', '0.00', '0.00', 6, 0),
(19, 'US15006BC - TS PSU Inc Warranty', 'INC Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(20, 'US15006BD - TS PSU Inc Install', 'INC Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(21, 'US15006BE - TS PSU Inc Prod Support', 'INC Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(22, 'US15006BF - TS PSU Drip Pan RMC Transfer', 'INC  Cost of Drip Pan MATERIAL only; Budget very limited', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(23, 'US15015AA - OP107/117 India Procurement', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(24, 'US15015AB - OP107/117 India Rework', 'INDIA Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(25, 'US15015AC - OP107/117 India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(26, 'US15015BA - OP107/117 Sales Commissions', 'INC Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(27, 'US15015BB - OP107/117 INC Project Managm', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(28, 'US15015BC - OP107/117 INC Warranty', 'INC Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(29, 'US15015BD - OP107/117 INC Integration', 'INC  Integration & Run Off at PARI US (INACTIVE / NA)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(30, 'US15015BE - OP107/117 Inc Install at Sit', 'INC  Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(31, 'US15015BF - OP107/117 INC Production Sup', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(32, 'US15015BG - OP107/117 RMC INC material', 'INC  Cost of scheduled MATERIAL only; Budget very limited', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(33, 'SP14006 - Tipton Spare Parts', 'INC Tipton Spare Part Orders for INC (0/100)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(34, 'US13012 - Tipton India Procurement', 'Known purchases on behalf of India (100/0) w Purchase Req', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(35, 'US13013 - Tipton Change Order MECR', 'General Time Only  all CPO''s will be assigned own new code', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(36, 'US13033 - Tipton Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(37, 'US13035 - India Personnel Support Tipton', 'INDIA - Bill back for supporting their staff (100/0)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(38, 'US14030 - Tipton Install General (Inc)', 'INC Costs ONLY for Install unable to split by system', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(39, 'US14036A - S5-P3 Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(40, 'US14036B - S5-P3 Inc Project Management', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(41, 'US14036E - S5-P3 Install at Tipton-Inc', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(42, 'US14036N - S5-P3 India Procurement', 'INDIA unplanned additional material required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(43, 'US14036P - S5-P3 Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(44, 'US14036Q - S5-P3 Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(45, 'US14036S - S5-P3 India Personnel-Tipton', 'INDIA costs related their personnel here for Install', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(46, 'US14037A - S1-P3 Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(47, 'US14037B - S1-P3 Inc Project Management', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(48, 'US14037E - S1-P3 Install at Tipton-Inc', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(49, 'US14037K - S1-P3 India Procure Unplanned', 'INDIA unplanned additional material required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(50, 'US14037L - S1-P3 Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(51, 'US14037M - S1-P3 Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(52, 'US14037P - S1-P3 India Personnel-Tipton', 'INDIA costs related their personnel here for Install', '20000.00', '0.00', 0, '20000.00', '20000.00', '0.00', '0.00', '0.00', 6, 0),
(53, 'US14038A - S3-P2 Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(54, 'US14038B - S3-P2 Inc Project Management', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(55, 'US14038F - S3-P2 Install at Tipton-Inc', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(56, 'US14038G - S3-P2 Project Engineering RH', 'INC Project Engineering at Rochester Hills (*)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(57, 'US14038H - S3-P2 Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(58, 'US14038J - S3-P2 Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(59, 'US14038K - S3-P2 India Personnel-Tipton', 'INDIA costs related their personnel here for Install', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(60, 'US14039A - S3-P3 Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(61, 'US14039B - S3-P3 Inc Project Management', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(62, 'US14039F - S3-P3 Install at Tipton-Inc', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(63, 'US14039G - S3-P3 Project Engineering RH', 'INC Project Engineering at Rochester Hills (*)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(64, 'US14039H - S3-P3 Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(65, 'US14039J - S3-P3 Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(66, 'US14039K - S3-P3 India Personnel-Tipton', 'INDIA costs related their personnel here for Install', '6000.00', '0.00', 0, '6000.00', '6000.00', '0.00', '0.00', '0.00', 6, 0),
(67, 'US14053 - Tipton Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(68, 'SRV15004 - Trenton Flex Service 2015-16', 'INC Service Calls Billable to Customer', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(69, 'US12009 - Flex Manufacturing Rework', 'INDIA Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(70, 'US12010 - Trenton Flex Line MECR''s', 'General only  all CPO''s will be assigned own new code', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(71, 'US13005 - Trenton Flex Install', 'INC scope only - for setup at Customer site (0/100) Does not include material  material = India', '25000.00', '0.00', 0, '25000.00', '25000.00', '0.00', '0.00', '0.00', 6, 0),
(72, 'US13009 - Trenton Flex Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(73, 'US14019 - Trenton Production Support', '*INC', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(74, 'US14024 - Trenton Vacuum Station', '**INDIA scope Material  Rework  all / **INC only I & C', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(75, 'US14025 - Trenton GME India', 'INDIA Scope: Engineering & Build  Shipping  Docs', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(76, 'US14026 - Trenton GME Inc', 'INC Scope: Install & Comm  Project Mgmt', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(77, 'US14027 - Trenton GME Rework', 'INDIA For damaged  missing or not fitting material', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(78, 'US14043 - Trenton Oil Hole Check Station', 'INC related to PO 80524003 Only', '5500.00', '0.00', 0, '5500.00', '5500.00', '0.00', '0.00', '0.00', 6, 0),
(79, 'US14055 - Trenton Flex Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(80, 'SP15001 - Crystal Sugar Spares 2015-16', 'INC Spare Parts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(81, 'SP14001 - Fanuc Spares 2014-15', 'INC Spare Parts (thru India)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(82, 'SP15002 - Fanuc Spares 2015-16', 'INC Spare Parts (thru India)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(83, 'US15007AA - Ferrari Block India Procurem', 'INDIA  Additional Material or Personnel Support Required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(84, 'US15007AB - Ferrari India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '2718.63', '2281.37', 0, '5000.00', '5000.00', '0.00', '0.00', '0.00', 6, 0),
(85, 'US15007AC - Ferrari India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(86, 'US15007BA - Ferrari Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(87, 'US15007BB - Ferrari Inc Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(88, 'US15007BC - Ferrari Inc Warranty', 'INC Warranty (support labor  application software help)', '65400.00', '0.00', 0, '65400.00', '65400.00', '0.00', '0.00', '0.00', 6, 0),
(89, 'US15007BD - Ferrari Inc Install', 'INC  Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(90, 'US15007BE - Ferrari Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(91, 'US15007BF - Ferrari Telesis RMC Transfer', 'INC  Cost of Telesis Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(92, 'US15007BG - Ferrari ASI RMC Transfer', 'INC  Cost of ASI Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(93, 'US15007BH - Ferrari Inc Integration Cost', 'INC  Portion of costs to Integrate prior to Customer Site', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(94, 'US15008AA - GMET Head India Procurement', 'INDIA  Additional Material or Personnel Support Required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(95, 'US15008AB - GMET Head India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(96, 'US15008AC - GMET Head India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(97, 'US15008BA - GMET Head Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(98, 'US15008BB - GMET Head Inc Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(99, 'US15008BC - GMET Head Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(100, 'US15008BD - GMET Head Inc Install', 'INC  Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(101, 'US15008BE - GMET Head Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(102, 'US15008BF - GMET Head Telesis RMC Transf', 'INC  Cost of Telesis Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(103, 'US15008BG - GMET Head ASI RMC Transfe', 'INC  Cost of ASI Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(104, 'US15008BH - GMET Head Inc Integration', 'INC  Portion of costs to Integrate prior to Customer Site', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(105, 'US15009AA - GMET Block India Procurement', 'INDIA  Additional Material or Personnel Support Required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(106, 'US15009AB - GMET Block India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(107, 'US15009AC - GMET Block India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(108, 'US15009BA - GMET Block Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(109, 'US15009BB - GMET Block Inc Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(110, 'US15009BC - GMET Block Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(111, 'US15009BD - GMET Block Inc Install', 'INC  Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(112, 'US15009BE - GMET Block Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(113, 'US15009BF - GMET Block Telesis RMC Trans', 'INC  Cost of Telesis Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(114, 'US15009BG - GMET Block ASI RMC Transfer', 'INC  Cost of ASI Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(115, 'US15009BH - GMET Block Inc Integration', 'INC  Portion of costs to Integrate prior to Customer Site', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(116, 'US15010AA - GMET Crank India Procurement', 'INDIA  Additional Material or Personnel Support Required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(117, 'US15010AB - GMET Crank India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(118, 'US15010AC - GMET Crank India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(119, 'US15010BA - GMET Crank Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(120, 'US15010BB - GMET Crank Inc Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(121, 'US15010BC - GMET Crank Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(122, 'US15010BD - GMET Crank Inc Install', 'INC  Portion of LABOR at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(123, 'US15010BE - GMET Crank Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(124, 'US15010BF - GMET Crank Telesis RMC Trans', 'INC  Cost of Telesis Order ONLY MATERIAL', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(125, 'US15010BG - GMET Crank INC Integration', 'INC  Portion of costs to Integrate prior to Customer Site', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(126, 'SRV15001 - Essex Service Calls 2015-16', 'INC Service Calls Billable to Customer', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(127, 'US110028 - Warranty - Support Coyote', 'INDIA warranty related to original system', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(128, 'US12005 - Spare Parts Ford Essex', 'INC Spare Parts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(129, 'US14050AA - Expansion India Procurement', 'INDIA additional material/labor required (US14050G) & their personnel (US14050K)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(130, 'US14050AB - Expansion Rework Material', 'INDIA Rework related to manufacturing Material / Labor (US14050H / US14050J)', '3000.00', '0.00', 4, '3000.00', '3000.00', '0.00', '0.00', '0.00', 6, 0),
(131, 'US14050AC - Expansion Warranty - India', 'INDIA Warranty (Material or design defects  software bugs) (US14050W)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(132, 'US14050BA - Expansion Sales Commissions', 'INC code for Commissions (US14050A)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(133, 'US14050BB - Expansion Inc Project Mgmt', 'INC code for Project Mgmt Hours (US14050B)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(134, 'US14050BC - Expansion Warranty - Inc', 'INC Warranty (Support labor  Application software help) (US14050X)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(135, 'US14050BD - Expansion Inc Install & Comi', 'INC portion of labor  at customer site (see budget) (US14050C)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(136, 'US14050BE - Expansion Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(137, 'US14051AA - Essex Retool India Procuremn', 'INDIA additional material/labor required (US14051G) & their personnel (US14051K)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(138, 'US14051AB - Essex Retool Rework Material', 'INDIA Rework related to manufacturing Material / Labor (US14051H / US14051J)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(139, 'US14051AC - Essex Retool Warranty - Indi', 'INDIA Warranty (Material or design defects  software bugs) (US14051W)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(140, 'US14051BA - Essex Retool Sales Commissio', 'INC code for Commissions (US14051A)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(141, 'US14051BB - Essex Retool Inc Project Mgm', 'INC code for Project Mgmt Hours (US14051B)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(142, 'US14051BC - Essex Retool Warranty - Inc', 'INC Warranty (Support labor  Application software help) (US14051X)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(143, 'US14051BD - Essex Retool Inc Install &Co', 'INC portion of labor only  at customer site (see budget) (US14051C)', '5000.00', '0.00', 0, '5000.00', '5000.00', '0.00', '0.00', '0.00', 6, 0),
(144, 'US14051BE - Essex Retool Inc Prod Suppor', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(145, 'US14002 - FORD India - Dragon Crank', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(146, 'US14018 - Ford Dragon Key Press Machine', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(147, 'US14020 - FORD India - Dragon Crank - In', 'INC', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(148, 'US14041 - Ford Dragon India Proj Support', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(149, 'SRV15002 - Ford Lima Service 2015-16', 'INC Service Calls Billable to Customer', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(150, 'US12002 - Install Nano Crank', 'INC Install Billable to Customer.  Material goes to different code', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(151, 'US12004 - Repair Manufacturing Quality', 'INDIA Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(152, 'US12011 - Ford Lima Nano OCR''s', 'INC General Time Only  all CPO''s will be assigned own new code', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(153, 'US13014 - Ford Lima Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(154, 'US13034 - Ford Lima Spare Parts', 'INC Spare Parts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(155, 'US14056 - Ford Lima Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(156, 'US15014AA - OP130 Retool India Procuremn', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(157, 'US15014AB - OP130 Retool India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(158, 'US15014AC - OP130 Retool India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(159, 'US15014BA - OP130 Retool Sales Commissio', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(160, 'US15014BB - OP130 Retool Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(161, 'US15014BC - OP130 Retool Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(162, 'US15014BD - OP130 Retool Inc Install', 'INC  Portion of LABOR  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(163, 'US15014BE - OP130 Retool Inc Prod Suppor', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(164, 'US14040AA - Dragon Crank India Procuremn', 'INDIA additional material/labor required (US14040G) & their personnel (US14040K)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(165, 'US14040AB - Dragon Crank Rework Material', 'INDIA Rework related to manufacturing Material / Labor (US14040H / US14040J)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(166, 'US14040AC - Dragon Crank Warranty - Indi', 'INDIA Warranty (Material or design defects  software bugs) (US14040W)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(167, 'US14040BA - Dragon Crank Sales Commissio', 'INC code for Commissions (US14040A)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(168, 'US14040BB - Dragon Crank Inc Project Mgm', 'INC code for Project Mgmt Hours (US14040B)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(169, 'US14040BC - Dragon Crank Warranty - Inc', 'INC Warranty (Support labor  Application software help) (US14040X)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(170, 'US14040BD - Dragon Crank Inc Install &Co', 'INC portion of labor only  at customer site (see budget) (US14040C)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(171, 'US14049AA - Dragon KP1 India Procurement', 'INDIA additional material/labor required (US14049G) & their personnel (US14049K)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(172, 'US14049AB - Dragon KP1 Rework Material', 'INDIA Rework related to manufacturing Material / Labor (US14049H / US14049J)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(173, 'US14049AC - Dragon KP1 Warranty - India', 'INDIA Warranty (Material or design defects  software bugs) (US14049W)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(174, 'US14049BA - Dragon KP1 Sales Commission', 'INC code for Commissions (US14049A)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(175, 'US14049BB - Dragon KP1 Inc Project Mgmt', 'INC code for Project Mgmt Hours (US14049B)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(176, 'US14049BC - Dragon KP1 Warranty - Inc', 'INC Warranty (Support labor  Application software help) (US14049X)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(177, 'US14049BD - Dragon KP1 Inc Install & Com', 'INC portion of labor only  at customer site (see budget) (US14049C)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(178, 'SP15008 - FMCSA Spares 2015-16', 'INC  Spare Parts Orders for Fiscal Year 2015-16', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(179, 'US15005AA - Sterling P1 India Procuremen', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(180, 'US15005AB - Sterling P1 India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(181, 'US15005AC - Sterling P1 India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(182, 'US15005BA - Sterling P1 Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(183, 'US15005BB - Sterling P1 Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(184, 'US15005BC - Sterling P1 Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(185, 'US15005BD - Sterling P1 Inc Install', 'INC  Portion of LABOR only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(186, 'US15005BE - Sterling P1 Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(187, 'US15005BF - Sterling P1 Integration @ RH', 'INC  Integration & Run Off at PARI Rochester Hills', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(188, 'US15005CA - Sterling P1 Adder Camera OCR', 'INDIA   Adder for Camera Upgrade Material & Engineering', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(189, 'US15005CB - Sterling P1 + INC Trial Part', 'INC  Adder for Trial Parts Cleaning Shores & Ship to India Budget', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(190, 'US15011AA - Sterling P2 India Procuremen', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(191, 'US15011AB - Sterling P2 India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(192, 'US15011AC - Sterling P2 India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(193, 'US15011BA - Sterling P2 Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(194, 'US15011BB - Sterling P2 Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(195, 'US15011BC - Sterling P2 Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(196, 'US15011BD - Sterling P2 Inc Install', 'INC  Portion of LABOR only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(197, 'US15011BE - Sterling P2 Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(198, 'US15011BF - Sterling P2 Inc Integration', 'INC  Portion of costs to Integrate prior to Customer Site', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(199, 'SP15003 - GKN Land Spares 2015-16', 'INC Spare Parts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(200, 'SP14005 - Ford GPM Spares 2014-15', 'INC Spare Parts for Ford (may be thru India)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(201, 'SP15004 - Ford GPM Spares 2015-16', 'INC Spare Parts for Ford (may be thru India)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(202, 'US14045A - Test Cell Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(203, 'US14045B - Test Cell Inc Project Mgmt', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(204, 'US14045C - Test Cell Inc Install & Commi', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(205, 'US14045G - Test Cell India Procurement', 'INDIA additional material required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(206, 'US14045H - Test Cell Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(207, 'US14045J - Test Cell Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(208, 'US14045K - Test Cell India Personnel Sup', 'INDIA costs related their personnel here in US', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(209, 'US14045L - Heller Test Cell Trial Parts', '', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(210, 'US14045W - Test Cell Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(211, 'US14045X - Test Cell Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(212, 'US15012AA - MVB Cell India Procurement', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(213, 'US15012AB - MVB Cell India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(214, 'US15012AC - MVB Cell India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(215, 'US15012BA - MVB Cell Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(216, 'US15012BB - MVB Cell Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(217, 'US15012BC - MVB Cell Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(218, 'US15012BD - MVB Cell Inc Install', 'INC  Portion of LABOR  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(219, 'US15012BE - MVB Cell Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(220, 'US15012CA - MVB Cell Shipping Robots', 'TBD', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(221, 'US14046A - 6F Case Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(222, 'US14046B - 6F Case Inc Project Mgmt', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(223, 'US14046C - 6F Case Inc Install & Commis', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(224, 'US14046G - 6F Case India Procurement', 'INDIA additional material required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(225, 'US14046H - 6F Case Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(226, 'US14046J - 6F Case Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(227, 'US14046K - 6F Case India Personnel Suppo', 'INDIA costs related their personnel here in US', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(228, 'US14046W - 6F Case Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(229, 'US14046X - 6F Case Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(230, 'US14047A - 6F Converter Sales Commission', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(231, 'US14047B - 6F Converter Inc Project Mgmt', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(232, 'US14047C - 6F Converter Inc Install & Co', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(233, 'US14047G - 6F Converter India Procuremen', 'INDIA additional material required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(234, 'US14047H - 6F Converter Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(235, 'US14047J - 6F Converter Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(236, 'US14047K - 6F Converter India Personnel ', 'INDIA costs related their personnel here in US', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(237, 'US14047W - 6F Converter Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(238, 'US14047X - 6F Converter Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(239, 'US14048A - 6F MVB Sales Commissions', 'INC code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(240, 'US14048B - 6F MVB Inc Project Mgmt', 'INC code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(241, 'US14048C - 6F MVB Inc Install & Commis', 'INC portion of labor only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(242, 'US14048G - 6F MVB India Procurement', 'INDIA additional material required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(243, 'US14048H - 6F MVB Rework Material', 'INDIA Rework MATERIAL ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(244, 'US14048J - 6F MVB Rework Labor', 'INDIA Rework LABOR ONLY related to manufacturing', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(245, 'US14048K - 6F MVB India Personnel Suppor', 'INDIA costs related their personnel here in US', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(246, 'US14048W - 6F MVB Warranty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(247, 'US14048X - 6F MVB Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(248, 'SP15005 - IMS Spares 2015-16', 'INC Spare Parts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(249, 'US09054*INC*ABA Grinder Automation', 'INC scope of Caterpillar ABA Grinder Project', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(250, 'US09054*INDIA*ABA Grinder', 'INDIA scope of Caterpillar ABA Grinder Project', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(251, 'US15001 - IMS Caterpillar Warrty - India', 'INDIA Warranty (Material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(252, 'US15002 - IMS Caterpillar Warranty - Inc', 'INC Warranty (Support labor  Application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(253, 'US11019 - Mag-Ford- IEP#2 Block Line', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(254, 'US11020 - Mag/Ford IEP#2 Cylinder Head', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(255, 'US13015 - MAG India - Dragon Head', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(256, 'US13016 - MAG India - Dragon Block', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(257, 'US14003 - MAG India - Dragon OCRs', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(258, 'US14021 - MAG India - Dragon Head - Inc', 'INC', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(259, 'US14022 - MAG India - Dragon Block - Inc', 'INC', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(260, 'US14042 - MAG Dragon India Proj Support', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(261, 'US15003AA - MAG Block India Procurement', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(262, 'US15003AB - MAG Block India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(263, 'US15003AC - MAG Block India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(264, 'US15003BA - MAG Block Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(265, 'US15003BB - MAG Block Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(266, 'US15003BC - MAG Block Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(267, 'US15003BD - MAG Block Inc Install', 'INC  Portion of LABOR only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(268, 'US15003BE - MAG Block Inc Prod Support', 'INC  Portion of production support on CPO', '3500.00', '0.00', 7, '6000.00', '3500.00', '0.00', '0.00', '0.00', 6, 0),
(269, 'US15003BF - MAG Block Inc Training', 'INC  Portion of training on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(270, 'US15004AA - MAG Head India Procurement', 'INDIA  Additional Material or Personnel Support required', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(271, 'US15004AB - MAG Head India Rework', 'INDIA  Rework related to manufacturing (Material & Labor)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(272, 'US15004AC - MAG Head India Warranty', 'INDIA  Warranty (material or design defects  software bugs)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(273, 'US15004BA - MAG Head Sales Commission', 'INC  Code for Commissions', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(274, 'US15004BB - MAG Head Project Mgmt', 'INC  Code for Project Mgmt Hours', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(275, 'US15004BC - MAG Head Inc Warranty', 'INC  Warranty (support labor  application software help)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(276, 'US15004BD - MAG Head Inc Install', 'INC  Portion of LABOR only  at customer site (see budget)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(277, 'US15004BE - MAG Head Inc Prod Support', 'INC  Portion of production support on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(278, 'US15004BF - MAG Block Inc Training', 'INC  Portion of training on CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(279, 'SP15006 - Mahar Tool Spares 2015-16', 'INC Spare Parts (for Chrysler Projects)', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(280, 'MA10001 - Medical Automation', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(281, 'US70014 - PARI India Support', 'INDIA - I94/I539 extensions ', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(282, 'US70022 - India Sales Support', 'INDIA', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(283, 'US70023 - India PIP Support', 'INDIA CA related activities  RFQs  shipping  etc', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(284, 'US70024 - India Project Staff Support', 'INDIA bill back for supporting their staff  not project related (100/0) Verizon', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(285, 'US70001 - Operations', 'INC FIXED - Utilities  Office Supplies ', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(286, 'US70002 - General Mangment', 'INC FIXED - Management related', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(287, 'US70003 - Accounting', 'INC FIXED - Taxes  Banking  QB', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(288, 'US70004 - Administration', 'INC FIXED - Luncheons  Birthdays  Pantry', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(289, 'US70005 - Unassigned', 'INC FIXED - Undefined  Holiday', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(290, 'US70006 - Training', 'INC FIXED - Classes  Books', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(291, 'US70007 - Proposal Engineering', 'INC FIXED - Bid related', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(292, 'US70008 - Sales', 'INC FIXED - Sales related', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(293, 'US70009 - Sales Support', 'INC FIXED - Costs for supporting existing customers', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(294, 'US70010 - Build & Integration', 'INC FIXED - Related to Build in US', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(295, 'US70011 - Shipping & Receiving', 'INC FIXED - Time  Packing Supplies ', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(296, 'US70012 - Travel Unassisgned', 'INC FIXED - Return to India', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(297, 'US70013 - Lost Time', 'INC FIXED - Delays', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(298, 'US70015 - Spare - Sales', 'INC FIXED - Spare Sales related', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0);
INSERT INTO `jobcode` (`JCId`, `JobCode`, `Descr`, `Budget`, `Spent`, `PM`, `TotalAlloc`, `Original`, `Rev1`, `Rev2`, `Rev3`, `RevNo`, `SelfApp`) VALUES
(299, 'US70016 - Business Developement', 'INC FIXED - Business Improvements', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(300, 'US70018 - Sales - New Business Devlpmt', 'INC FIXED - To generate new sales leads', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(301, 'US70019 - Storage', 'INC FIXED - Storage Rent', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(302, 'US70020 - Facility Maintenance', 'INC FIXED - Repairs  Service Contracts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(303, 'US70021 - IT Support', 'INC FIXED - IT expenses  not software', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(304, 'US70025 - Human Resources', 'INC FIXED - EE Related  Health Ins  ADP', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(305, 'US70026 - HR Process & System Developmen', 'INC FIXED - Process Development related', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(306, 'US70027 - HR Immigration', 'INC FIXED - Our guys Visas & related', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(307, 'US70028 - Software', 'INC FIXED - Software Licenses', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(308, 'US70029 - Project Coordination Proposals', 'INC FIXED - Coordinator Time on Proposals', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(309, 'US70030 - Project Coordination/Managemen', 'INC FIXED - Coordinator Time on Project Mgmt', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(310, 'US70031 - Engineering Software Tool Devm', 'INC FIXED - Development of new Software Tool', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(311, 'SP15009 - PASCO Spares 2015-16', '', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(312, 'SP15007 - ZF Spares 2015-16', 'INC Spare Parts', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(313, 'SRV14002 - ZF Support for Mule Build', 'INC - PO 470000330 Test Run Expenses', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(314, 'SRV15003 - ZF Service 2015-16', 'INC Service Calls Billable to Customer', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(315, 'US11018 - Warranty - Support ZF', 'INDIA - No longer in service?', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(316, 'US15013 - ZF Pallet Rework 2015', 'INC scope related to the pallet rework CPO', '1000.00', '0.00', 0, '1000.00', '1000.00', '0.00', '0.00', '0.00', 6, 0),
(322, 'US1324322', 'INC', '6000.00', '0.00', 4, '18500.00', '6000.00', '0.00', '0.00', '0.00', 6, 0),
(323, 'US5646788', 'Ferrari work.', '7000.00', '0.00', 0, '7000.00', '6750.00', '7000.00', '0.00', '0.00', 8, 0),
(324, 'US67873', 'jhjkdfhsd', '3500.00', '0.00', 0, '0.00', '3500.00', '0.00', '0.00', '0.00', 7, 0),
(325, 'US7784392', 'New', '5000.00', '0.00', 0, '0.00', '5000.00', '0.00', '0.00', '0.00', 7, 0),
(326, 'US673842', 'Sample', '2500.00', '0.00', 0, '0.00', '2500.00', '0.00', '0.00', '0.00', 7, 0),
(327, 'US678439', 'Sample2', '4500.00', '0.00', 0, '0.00', '4500.00', '0.00', '0.00', '0.00', 7, 0),
(328, 'US789453', 'Sample3', '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', 7, 0),
(329, 'US99321', 'Sample4', '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', 6, 0),
(330, 'US454332', 'Sample5', '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', 6, 0),
(331, 'US6782232', 'Sample', '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purdets`
--

CREATE TABLE `purdets` (
  `id` int(11) NOT NULL,
  `ReqsId` int(11) NOT NULL,
  `JobCode` int(11) NOT NULL,
  `VendorId` int(11) NOT NULL,
  `ShipId` int(11) NOT NULL,
  `Budgeted` tinyint(1) NOT NULL,
  `BCS` varchar(20) NOT NULL,
  `Expl` varchar(40) NOT NULL,
  `Scope` int(11) NOT NULL,
  `Other` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purdets`
--

INSERT INTO `purdets` (`id`, `ReqsId`, `JobCode`, `VendorId`, `ShipId`, `Budgeted`, `BCS`, `Expl`, `Scope`, `Other`) VALUES
(2, 2, 4, 6, 2, 0, '765543', '', 1, ''),
(4, 6, 3, 119, 6, 1, '0', 'Extra', 0, ''),
(5, 8, 17, 180, 8, 0, '554322', '', 1, ''),
(6, 9, 17, 241, 9, 1, '0', 'LKJHGH', 0, ''),
(7, 11, 4, 7, 11, 0, '34324', '', 0, ''),
(8, 12, 4, 260, 12, 0, '3432322', '', 0, ''),
(9, 13, 3, 402, 13, 0, '12345', '', 1, ''),
(10, 14, 3, 12, 14, 0, '554322', '', 1, ''),
(11, 15, 3, 33, 15, 1, '0', 'Extra', 1, ''),
(12, 16, 7, 437, 16, 0, '665453', '', 0, ''),
(13, 17, 8, 31, 17, 0, '65477432', '', 1, ''),
(14, 18, 6, 406, 18, 1, '0', 'Extra', 1, ''),
(15, 19, 10, 5, 19, 1, '0', 'Extra', 1, ''),
(16, 20, 6, 157, 20, 0, '12345', '', 1, ''),
(18, 22, 7, 118, 22, 0, '74324', '', 1, ''),
(19, 23, 7, 55, 23, 0, '464353', '', 1, ''),
(20, 24, 7, 12, 24, 0, '34523', '', 1, ''),
(21, 25, 7, 8, 25, 0, '5543223', '', 1, ''),
(22, 26, 12, 131, 26, 0, '987576', '', 1, ''),
(23, 27, 17, 5, 27, 0, '7643423', '', 1, ''),
(24, 28, 8, 5, 28, 0, '8567540', '', 1, ''),
(25, 29, 10, 4, 29, 1, '0', 'Extra', 1, ''),
(27, 31, 10, 12, 30, 0, '34234', '', 0, ''),
(28, 32, 7, 5, 31, 0, '4543', '', 1, ''),
(29, 33, 8, 9, 32, 0, '754643', '', 1, ''),
(30, 34, 8, 31, 33, 0, '65477432', '', 1, ''),
(31, 35, 6, 406, 34, 1, '0', 'Extra', 1, ''),
(32, 36, 15, 41, 35, 0, '8764645', '', 1, ''),
(33, 37, 8, 5, 36, 0, '554322', '', 0, ''),
(36, 40, 84, 474, 39, 0, '553', '', 0, ''),
(37, 41, 130, 490, 40, 0, '678', '', 0, ''),
(38, 42, 84, 172, 41, 0, '654', '', 0, ''),
(39, 43, 84, 363, 42, 0, '987', '', 0, ''),
(40, 44, 84, 172, 43, 0, '6554', '', 0, ''),
(41, 45, 116, 472, 44, 0, '553', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `requester`
--

CREATE TABLE `requester` (
  `id` int(11) NOT NULL,
  `ReqsId` varchar(30) NOT NULL,
  `Name` text NOT NULL,
  `Phno` varchar(20) NOT NULL,
  `Fno` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requester`
--

INSERT INTO `requester` (`id`, `ReqsId`, `Name`, `Phno`, `Fno`, `Email`, `UserId`) VALUES
(2, 'aakritid', 'Aakriti Dubey', '3234415068', '3216544321', 'aakritid@usc.edu', 2),
(6, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritidubey@outlook.com', 2),
(8, 'aakritid', 'Aakriti Dubey', '3234415068', '', 'aakritid@pariusa.com', 2),
(9, 'aakritid', 'Aakriti Dubey', '3234415068', '', 'aakritid@pariusa.com', 2),
(11, 'aakritid', 'Aakriti Dubey', '3234415068', '', 'abcd@1234.com', 2),
(12, 'aakritid', 'Aakriti Dubey', '3234415068', '', 'aakritid@pariusa.com', 2),
(13, 'aakritid', 'Aakriti Dubey', '3234415068', '', 'aakritid@pariusa.com', 2),
(14, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(15, 'aakritid', 'Aakriti Dubey', '3234415067', '3216544342', 'aakritid@pariusa.com', 2),
(16, 'aakritid', 'Aakriti Dubey', '3234415068', '3216544321', 'aakritid@pariusa.com', 2),
(17, 'aakritid', 'Aakriti Dubey', '3234415067', '3216544321', 'aakritid@pariusa.com', 2),
(18, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(19, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(20, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(22, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(23, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(24, 'aakritid', 'Aakriti Dubey', '', '', 'aakritid@pariusa.com', 2),
(25, 'aakritid', 'Aakriti Dubey', '', '', 'aakritid@pariusa.com', 2),
(26, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(27, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(28, 'aakritid', 'Aakriti Dubey', '', '', 'aakritid@pariusa.com', 2),
(29, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(31, 'aakritid', 'Aakriti Dubey', '', '', 'aakritid@usc.edu', 2),
(32, 'aakritid', 'Aakriti Dubey', '', '', 'aakritid@pariusa.com', 2),
(33, 'aakritid', 'Aakriti Dubey', '', '', 'aakritid@usc.edu', 2),
(34, 'aakritid', 'Aakriti Dubey', '3234415067', '3216544321', 'aakritid@pariusa.com', 2),
(35, 'aakritid', 'Aakriti Dubey', '3234415067', '', 'aakritid@pariusa.com', 2),
(36, '', 'ABC PQR', '3234415067', '', 'aakritid@pariusa.com', 7),
(37, '', 'Admin User', '', '', 'aakritid@pariusa.com', 1),
(40, '', 'General User', '', '', 'dsada@dfsd.com', 2),
(41, '', 'Admin User', '5197376091', '', 'victor@victormachine.ca', 1),
(42, '', 'General User', '', '', 'fa@fab.com', 2),
(43, '', 'General User', '', '', 'abc@pt.com', 2),
(44, '', 'General User', '', '', 'fc@fc.com', 2),
(45, '', 'General User', '', '', 'turck@tc.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `requistion`
--

CREATE TABLE `requistion` (
  `Id` int(11) NOT NULL,
  `ReqNo` varchar(8) NOT NULL,
  `RefQuote` varchar(20) NOT NULL,
  `TotalCost` decimal(10,2) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requistion`
--

INSERT INTO `requistion` (`Id`, `ReqNo`, `RefQuote`, `TotalCost`, `Date`) VALUES
(2, 'P0000002', '3432432', '120.00', '2016-05-16 15:32:32'),
(4, 'P0000004', '4234', '1812.00', '2016-05-16 16:11:11'),
(5, 'P0000005', '5432', '684.00', '2016-05-16 16:31:22'),
(6, 'P0000006', '452342', '1056.00', '2016-05-16 16:32:11'),
(7, 'P0000007', '4234', '408.00', '2016-05-16 16:47:00'),
(8, 'P0000008', '5654332', '130.00', '2016-05-16 17:03:03'),
(9, 'P0000009', '432432', '989.00', '2016-05-16 17:06:11'),
(10, 'P0000010', '452342', '369.00', '2016-05-16 17:11:11'),
(11, 'P0000011', '45432231', '384.00', '2016-05-16 17:17:17'),
(12, 'P0000012', '4434521', '3621.00', '2016-05-16 17:42:36'),
(13, 'P0000013', '54364232', '540.00', '2016-05-17 13:45:15'),
(14, 'P0000014', '42345521', '960.00', '2016-05-17 17:00:01'),
(15, 'P0000015', '765768', '427.00', '2016-05-23 13:42:30'),
(16, 'P0000016', '54366343', '126.00', '2016-05-23 13:47:18'),
(18, 'P0000018', '776554', '531.50', '2016-05-23 16:02:02'),
(19, 'P0000019', '35324121', '8750.00', '2016-05-24 15:17:03'),
(20, 'P0000020', '6534343', '960.00', '2016-05-24 15:21:05'),
(21, 'P0000021', '65332345', '480.00', '2016-05-24 15:32:00'),
(22, 'P0000022', '764543211', '1095.00', '2016-05-31 18:57:37'),
(23, 'P0000023', '76434235', '752.00', '2016-06-02 13:18:43'),
(24, 'P0000024', '87754343', '720.00', '2016-06-02 18:24:19'),
(25, 'P0000025', '6353', '220.00', '2016-06-06 18:30:20'),
(27, 'P0000027', '54353245', '2250.00', '2016-06-07 18:28:21'),
(28, 'P0000028', '5435', '15423.75', '2016-06-07 18:55:52'),
(29, 'P0000029', '5635543', '1500.00', '2016-06-07 19:02:11'),
(30, 'P0000030', '54364232', '400.00', '2016-06-08 16:17:16'),
(31, 'P0000031', '42345521', '1560.00', '2016-06-08 17:19:33'),
(32, 'P0000032', '6654332', '1100.00', '2016-06-10 17:44:05'),
(33, 'P0000033', '654322', '2250.00', '2016-06-10 18:36:10'),
(36, 'P0000036', '5432', '953.00', '2016-06-13 15:16:42'),
(37, 'P0000037', '4325', '751.45', '2016-06-13 17:26:38'),
(38, 'P0000038', '247', '650.00', '2016-06-14 19:42:26'),
(39, 'P0000039', '554', '188.37', '2016-06-14 19:51:34'),
(40, 'P0000040', '629', '1140.00', '2016-06-14 19:55:15'),
(41, 'P0000041', '437', '63.70', '2016-06-14 20:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `shipdets`
--

CREATE TABLE `shipdets` (
  `shipid` int(11) NOT NULL,
  `Attn` varchar(30) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Method` varchar(20) NOT NULL,
  `AddrId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipdets`
--

INSERT INTO `shipdets` (`shipid`, `Attn`, `Date`, `Method`, `AddrId`) VALUES
(2, 'Mr XYZ', '05/26/2016', 'FedEx', 1),
(6, 'Mr ABC', '06/08/2016', 'USPS', 1),
(8, 'Mr ABC', '05/27/2016', 'UTI', 1),
(9, 'Mr ABC', '05/31/2016', 'UTI', 1),
(11, 'Mr XYZ', '05/25/2016', 'UPS', 1),
(12, 'Mr PQR', '06/16/2016', 'UTI', 1),
(13, 'Mr ABC', '05/25/2016', 'FedEx', 1),
(14, 'Mr XYZ', '05/30/2016', 'Freight', 1),
(15, 'Mr XYZA', '05/30/2016', 'USPS', 1),
(16, 'Mr XYZ', '05/27/2016', 'UPS', 1),
(17, 'Mr ABC', '05/26/2016', 'UPS', 1),
(18, 'Mr XYZA', '05/31/2016', 'UPS', 1),
(19, 'Mr XYZA', '05/25/2016', 'Freight', 1),
(20, 'Mr XYZ', '05/27/2016', 'FedEx', 1),
(22, 'Mr XYZA', '05/28/2016', 'FedEx', 1),
(23, 'Mr ABC ', '05/27/2016', 'UPS', 1),
(24, 'Mr XYZ', '05/31/2016', 'USPS', 1),
(25, 'Mr XYZ', '06/15/2016', 'Freight', 1),
(26, 'Mr XYZA', '06/08/2016', 'Freight', 1),
(27, 'Mr LMN', '06/16/2016', 'Freight', 1),
(28, 'Mr XYZ', '06/10/2016', 'Freight', 1),
(29, 'Mr ABC', '06/17/2016', 'UTI', 5),
(30, 'Mr dkfjd', '06/28/2016', 'UPS', 1),
(31, 'cvsdvds', '06/23/2016', 'UPS', 1),
(32, 'Mr XYZA', '06/28/2016', 'Freight', 5),
(33, 'Mr ABC', '05/26/2016', 'UPS', 1),
(34, 'Mr XYZA', '05/31/2016', 'UPS', 1),
(35, 'Mr PQR', '06/18/2016', 'UPS', 1),
(36, 'LMN PQR', '06/29/2016', 'UPS', 1),
(39, 'Accounts Receivable', '06/22/2016', 'Your Truck', 7),
(40, 'Victor Jovanovic', '06/16/2016', 'FedEx', 8),
(41, 'PARI', '06/23/2016', 'Your Truck', 7),
(42, 'PARI', '06/21/2016', 'Your Truck', 1),
(43, 'PARI', '06/16/2016', 'Your Truck', 1),
(44, 'PARI', '06/17/2016', 'Your Truck', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddr`
--

CREATE TABLE `shippingaddr` (
  `AddrId` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `ZipCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingaddr`
--

INSERT INTO `shippingaddr` (`AddrId`, `Name`, `Address`, `City`, `State`, `Country`, `ZipCode`) VALUES
(1, 'PARI Robotics Inc, Rochester Hills', '2930 Technology Drive', 'Rochester Hills', 'MI', 'USA', '48309'),
(5, 'PARI Inc', '1984 ABC Dr', 'Madison Heigths', 'MI', 'USA', '48072'),
(6, 'Residence', '1910 Golfview Dr', 'Troy', 'MI', 'USA', '48084'),
(7, 'PARI Robotics inc', '1001 W 13 Mile Road', 'Madison Heights', 'MI', 'USA', '48071'),
(8, 'Ford Essex Engine Plant', '1 Quality Way', 'Windsor', 'ON', 'Canada', 'N9A 6X3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `First Name` varchar(20) NOT NULL,
  `Last Name` varchar(20) NOT NULL,
  `LoginId` varchar(10) NOT NULL,
  `LoginPwd` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Type` int(11) NOT NULL DEFAULT '1',
  `Active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `First Name`, `Last Name`, `LoginId`, `LoginPwd`, `Email`, `Type`, `Active`) VALUES
(1, 'Admin', 'User', 'admin', 'abcd', 'aakritid@pariusa.com', 6, 1),
(2, 'General', 'User', 'general', 'abcd123', 'aakritid@pariusa.com', 1, 1),
(3, 'Project', 'Engg', 'projeng', 'abcd123', 'aakritid@pariusa.com', 2, 1),
(4, 'Project', 'Manager', 'projman', 'abcd123', 'aakritid@pariusa.com', 3, 1),
(5, 'Buyer', '', 'buyer', 'abcd123', 'aakritid@pariusa.com', 4, 1),
(6, 'Management', 'User', 'manage', 'abcd123', 'aakritid@pariusa.com', 5, 1),
(7, 'ABC', 'PQR', 'abcdid', 'abcd123', 'aakritid@pariusa.com', 3, 1),
(8, 'Gen', 'user', 'general1', 'genpwd', 'abcd@pariusa.com', 1, 1),
(11, 'Aakriti', 'Dubey', 'aakritid', 'ad9833#', 'aakritid@pariusa.com', 1, 1),
(14, 'ABC', 'LMN', 'abcdlmn', 'abcd123', 'abcdlmn@pariusa.com', 1, 1),
(15, 'fgfd', 'kjjkh', 'bhjbj', 'abc4', 'jhewjkrhw@jfr.com', 1, 1),
(16, 'dsff', 'kjk', 'jkknjk', 'abcd', 'jdkskj@fkljd.com', 1, 1),
(17, 'XYZ', 'LMN', 'xyzlmn', 'abcd', 'xyzlmn@pariusa.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `JCCreate` tinyint(1) NOT NULL,
  `Approval` tinyint(1) NOT NULL,
  `BudgAlloc` tinyint(1) NOT NULL,
  `Report` tinyint(1) NOT NULL,
  `Setup` tinyint(1) NOT NULL,
  `CVReqs` tinyint(1) NOT NULL,
  `CostLevel` decimal(15,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `Type`, `JCCreate`, `Approval`, `BudgAlloc`, `Report`, `Setup`, `CVReqs`, `CostLevel`) VALUES
(1, 'General User', 0, 0, 0, 0, 0, 1, '0.00'),
(2, 'Project Engineer', 0, 1, 0, 0, 0, 1, '5500.00'),
(3, 'Project Manager', 0, 1, 0, 1, 0, 1, '10000.00'),
(4, 'Buyer', 0, 0, 0, 0, 0, 1, '0.00'),
(5, 'Management', 1, 1, 1, 1, 0, 1, '5500.00'),
(6, 'Administrator', 1, 1, 1, 1, 1, 1, '500000.00'),
(7, 'HR', 0, 0, 0, 0, 0, 1, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `VendorCode` int(11) NOT NULL,
  `VendorName` varchar(40) NOT NULL,
  `VendorAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VendorCode`, `VendorName`, `VendorAddress`) VALUES
(1, 'A-1 Engraving & Signs', 'A-1 Engraving & Signs, Inc. 397 A. Washington St. Brighton, MI  48116 '),
(2, 'A & G True Value', 'A & G True Value '),
(3, 'AAA Auto Insurance', 'AAA Auto Insurance P.O. Box 740860 Cincinnati, Ohio 45274-0860 '),
(4, 'ABB Inc (ACH)', 'ABB Inc. 440 Field Services Auburn Hills P.O. Box 88868 Chicago, Il 60695-1868 '),
(5, 'Accident Fund Insurance', 'Accident Fund PO Box 77000 Dept 77125 Detroit, MI  48277-0125 '),
(6, 'Accountemps', 'Accountemps 12400 Collections Center Dr Chicago, IL  60693 '),
(7, 'Ace Hardware', 'Ace Hardware '),
(8, 'Action Wood', 'Action Wood 44500 Reynolds Drive Clinton Township, MI  48036 '),
(9, 'ADESSO INC', 'ADESSO INC 160 Commerce Way Walnut , CA 91789 , USA '),
(10, 'ADP Payroll Processing', 'ADP Payroll Processing '),
(11, 'Advanced Machine & Engineering (ACH)', 'Advanced Machine & Engineering Co 35109 Eagle Way Chicago, IL  60678-1351 '),
(12, 'Advanced Safety Graphics (ACH)', 'Advanced Safety Graphics 33229 Kirby Street Farmington, MI  48336 '),
(13, 'AE Tools', 'AE Tools 5501 21st St. Racine, WI  53406 '),
(14, 'AG Towing', 'AG Towing 5100 Auburn Road Shelby Twp, MI  48317 '),
(15, 'Air Technologies', 'Ohio Transmission Corporation Air Technologies PO Box 73278 Cleveland, OH  44193 '),
(16, 'Airpower America', 'Airpower America 2050 Stanley Ave, Portage,  MI 49002 '),
(17, 'Albion Devices, Inc.', 'Albion Devices, Inc. 531 Stevens Ave., West Solana Beach, CA  92075 '),
(18, 'Alro Steel Corporation', 'Alro Steel Corporation 3000 Tripark Drive Grand Blanc, MI  48439 Tel: 810-695-7300 '),
(19, 'Altorfer Rents', 'Altorfer Rents P.O. Box 1347 Cedar Rapids, IA 52406-1347 '),
(20, 'Amazon', 'Amazon.com '),
(21, 'Amenda Gjelaj', 'Amenda Gjelaj 11669 Squires Blvd Utica, MI  48315 '),
(22, 'Amenda Gjelaj CC', ' ,'),
(23, 'American Airlines', 'American Airlines '),
(24, 'American Express Delta CC', 'American Express P.O. Box 0001 Los Angeles, CA 90096-8000 '),
(25, 'American Express Mangesh', ' ,'),
(26, 'American Flag & Banner Co', 'American Flag & Banner Co. 28 S Main Street Clawson, MI  48017 '),
(27, 'Andantex USA', 'Andantex USA Inc 1705 Valley Road Wanamassa, NJ  97712 '),
(28, 'Andiamo,Andiamo,', ''),
(29, 'Anixter', 'Anixter, Inc. PO Box 847428 Dallas, TX  75284-7428 '),
(30, 'Apex Automation Inc.', 'Apex Automation Inc. 7067 S. Etna Rd. -35 La Fontaine, IN 46940 '),
(31, 'Applied Industrial Technologies', 'Applied Industrial Technologies 23937 Freeway Park Dr. Farmington Hills, MI 48335 '),
(32, 'Arvind Jadhav,Arvind Jadhav,', ''),
(33, 'Assoc for Advancing Automation', 'Association for Advancing Automation 900 Victors Way, Suite 140 Ann Arbor, MI  48108 '),
(34, 'AT & T,AT & T,', ''),
(35, 'Atlanta Drive System, Inc.', 'Atlanta Drive System, Inc. 1775 New Jersey 34, #10 Farmingdale, NJ 07727 '),
(36, 'Atlas Copco', 'Atlas Copco Tools Assembly Systems 2998 Dutton Road Auburn Hills, MI 48326 '),
(37, 'ATLASRFIDSTORE.COM,ATLASRFIDSTORE.COM,', ''),
(38, 'ATS-Advanced Technology Services', 'ATS-Advanced Technology Services 12400 Belden Ct. Livonia, MI 48150 '),
(39, 'Auto-Plas - Persico', 'Persico (Auto-Plas) 1820 Prodution Drive Rochester Hills, MI  48309 '),
(40, 'Automated Systems Inc.', 'Automated Systems Inc. 2400 Commerical Drive  Auburn Hills, MI, 48326 '),
(41, 'Automation Alley', 'Automation Alley 2675 Bellingham Troy, MI  48083 '),
(42, 'Automation Guarding Systems (ACH)', 'Automation Guarding Systems, LLC 6624 Burroughs Ave Sterling Heights, MI  48314 '),
(43, 'AutoZone,AutoZone,', ''),
(44, 'AVI Systems, Inc.', 'AVI Systems, Inc. NW8393 PO Box 1450 Minneapolis, MN  55485-8393 '),
(45, 'Avis Renta A Car,Avis Renta A Car,', ''),
(46, 'Axis Systems (ACH)', 'Axis Systems 1555 Atlantic Blvd. Auburn Hills, MI  48326 '),
(47, 'B&R Sales and Service', 'B&R Sales and Service 5656 Newburgh Road Westland, MI  48185 '),
(48, 'Balian & Busse, PLLC', 'Balian & Busse, PLLC 40950 Woodward, Avenue Suite 350 Bloomfield Hills,, MI 48304-5129 '),
(49, 'Bancorpsv - HRPro Claims,Bancorpsv,', ''),
(50, 'Banner Life Insurance Co.', 'Banner Life Insurance Co. P.O. Box 740526 Atlanta, GA 30374-0526 '),
(51, 'Barry Rileys Welding', 'Riley''s Welding Barry Riley 306 Holmes Road Allenton, MI  48002 '),
(52, 'Barton Malow Company', 'Barton Malow Company 26500 American Drive Southfield, MI 48034 '),
(53, 'BC Automation,BC Automation 167 Haupt St', ''),
(54, 'Bearing Service (ACH)', 'Bearing Service 2219 E. 9 Mile Rd Warren, MI 48091 '),
(55, 'Behco-MRM, Inc', 'Behco-MRM, Inc div of H & P Technologies, Inc. 21251 Ryan Road Warren, MI  48091 '),
(56, 'Bigrentz.com,Bigrentz.com,', ''),
(57, 'Bill Janseen, CLSO', 'Bill Janseen, CLSO 14726 Dominica Court Apple Valley, MN 55124 '),
(58, 'Blue Corp Automation (Wire)*', 'Blue Corp Automation Solutions Victor Castillo 27 Norte 1604 Solares Chicos Atlixco, Puebla C.P. 74230 Mexico '),
(59, 'Blue Cross Blue Shield', 'Blue Cross Blue Shield of Michigan PO Box 674416 Detroit, MI  48267-4416 '),
(60, 'BO SIX Robotics (ACH)', 'B. O. Six Robotics, Inc. PO Box 5935 Drawer #1596 Troy, MI  48007 '),
(61, 'Bouch Enterprises (SA $),Bouch Enterpris', ''),
(62, 'Browz (ACH)', 'Browz LLC 13997 South Minuteman Drive Ste 350 Draper, UT 84020 '),
(63, 'BYERS WRECKER', 'BYERS WRECKER 399 SOUTH STREET ROCHESTER, MI 48307 '),
(64, 'C & C Rent All', 'C &C Rent All 2287 W. Auburn Rd Rochester Hills, MI 48309 '),
(65, 'C&E Sales', 'C&E Sales P.O. Box 750128 Dayton, OH  45475-0128 '),
(66, 'CA & Associates, LLC', 'CA & Associates LLC 3771 Sleepy Fox Drive Rochester Hills, MI  48309 '),
(67, 'Calvert Smith,Calvert Smith,', ''),
(68, 'Caniff Electric Supply', 'Caniff Electric Supply 2001 Caniff Street Hamtamick, MI 48212 '),
(69, 'Carl Stahl Sava Industries (ACH)', 'Carl Stahl Sava Industries, Inc. PO Box 30 4 North Corporate Drive Riverdale, NJ  07457-0030 '),
(70, 'Cash,Cash,', ''),
(71, 'Centimeter Industrial Supply', 'Centimeter Industrial Supply, Inc. 1842 Star-Batt Drive Rochester Hills, MI  48309 '),
(72, 'Central Alarm Signal, Inc.', 'Central Alarm Signal, Inc. 13400 West 7 Mile Rd. Detroit, MI  48235 '),
(73, 'Chalfant Manufacturing (ACH)', 'Chalfant Manufacturing Co. 50 Pearl Rd. Ste. 212 Brunswick, OH  44212-5704 '),
(74, 'Charter Township of Orion', 'Charter Township of Orion 2525 Joslyn Rd Lake Orion, Mi 48360-1951 '),
(75, 'Chase Autopaybus 82573,,', ''),
(76, 'Chris Cox', 'Chris Cox 933 Pinecone Drive Howell, MI  48843 '),
(77, 'Chris Cox - CC,,', ''),
(78, 'Chromalox', 'Chromalox Dave Ray & Associates 4949 Delemre Avenue Royal Oak, MI  48073 '),
(79, 'CIGNA International (ACH)', 'CIGNA International 13680 Collection Center Drive Chicago, Il 60693 '),
(80, 'Cincinnati Fan', 'Cincinnati Fan & Ventilator Company, INC 7697 Snider Road Mason, OH 45040 '),
(81, 'Cinetic Automation (ACH)', 'Fives Cinetic Corp 23400 Halsted Rd Farmington Hills, MI  48335 '),
(82, 'Citizens Insurance Company', 'Citizens Insurance Dept 77360 P.O. Box 77000 Detroit, MI 48277-0360 '),
(83, 'City of Rochester Hills - Permits', 'City of Rochester Hills Attn: Bldg Dept 1000 Rochester Hills Dr Rochester, MI  48309 '),
(84, 'City of Rochester Hills - Tax', 'City of Rochester Hills 16748 Collection Center Drive Chicago, IL  60693-0167 '),
(85, 'City Of Rochester Hills - Water', 'City Of Rochester Hills - Water 16632 Collection Center Drive Chicago, IL  60693-0166 '),
(86, 'Columbia Marking Tools', 'Columbia Marking Tools 27430 Luckino Drive Chesterfield, MI  48047 '),
(87, 'Comcast (Bill Pay),Comcast PO Box 3005 S', ''),
(88, 'COMDATA', 'COMDATA P.O. Box 500544 St. Louis, Mo 63150-0544 '),
(89, 'Comdata Fees,Comdata Fees,', ''),
(90, 'Con-Syst-Int (ACH)*', 'Con-Syst-Int Controls Group Inc 5135 Hennin Dr. Oldcastle, ON  N0R 1L0 Canada '),
(91, 'Concorde Manufacturing, Inc.', 'Concorde Manufacturing, Inc. 275 Rex Blvd. Auburn Hills, MI 48326 '),
(92, 'Conductix Wampfler', 'Conductix Wampfler PO Box 809090 Chicago, IL 60680 '),
(93, 'Consumers Energy (Bill Pay)', 'Consumers Energy Lansing, MI  48937-0001 '),
(94, 'Corrigan Air & Sea (ACH)', 'Corrigan Air & Sea Cargo 6170 Middlebelt Rd. Romulus, MI  48174 '),
(95, 'Costco,Costco,', ''),
(96, 'Cougar Cutting Tool', 'Cougar Cutting Tools, Inc. 23529 Reynolds Court Clinton TWP, MI 48036 '),
(97, 'Country Inn & Suites Lima', 'Country Inn & Suites Lima 804 S Leonard Ave Lima, OH  45804 '),
(98, 'Crescent Electric Supply Co.', '26499 Southpoint Rd Ste 100 Perrysburg, OH 435511696 '),
(99, 'Crown Industrial Services Inc.', 'Crown Industrial Services Inc. P.O. Box 970197 Ypsilanti, MI  48197 '),
(100, 'Culligan (Bill Pay)', 'Culligan of Ann Arbor/Detroit Lockbox Processing PO Box 2932 Wichita, KS  67201-2932 '),
(101, 'Dalton Bearing Service, Inc.', 'Dalton Bearing Service, Inc. 601 South Glenwood Ave. Dalton, GA 30721 '),
(102, 'Davey Tree Expert Co', 'The Davey Tree Expert Company PO Box 94532 Cleveland, OH  44101-4532 '),
(103, 'Days Inn Kokomo', 'Days Inn & Suites Kokomo 264 South 00 EW Kokomo, IN  46902 '),
(104, 'Days Inn Port Huron,Days Inn Port Huron,', ''),
(105, 'Dayton Freight Lines Inc.', 'Dayton Freight Lines Inc. P.O. Box 340 Vandalia, Ohio 45377 937-264-4060 '),
(106, 'Dean Askounis (ACH) *', 'Dean Askounis 150 N. Cranbrook Road Bloomfield Hills, MI 48301 '),
(107, 'Dell Computers', 'Dell Computers P.O. Box 643561 Pittsburgh, PA 15264-3561 '),
(108, 'Delta,Delta,', ''),
(109, 'Detroit Regional Chamber', 'Detroit Regional Chamber Account Receivable P.O. Box 77359 Detroit, MI  48277-0359 '),
(110, 'DF Burnham', 'DF Burnham Mike Faro 40750 Enterprise Dr. Sterling Heights, MI 48314 '),
(111, 'DHL Express', 'DHL Express - USA 16592 Collections Center Drive Chicago, IL 60693 '),
(112, 'DHL Global Forwarding', 'DHL Global Forwarding 14076 Collection Center Drive Chicago, IL  60693 '),
(113, 'DiBellas Subs,Dibellas Subs,', ''),
(114, 'DiFACTO Robotics (Wire)', 'DiFACTO Robotics & Automation Pvt. Ltd #18/1A 23rd Main, Marenahalli JP Nagar 2nd Phase Bangalore, 560 078 India '),
(115, 'DigiKey', 'DigiKey P.O. Box 250 Thief River Falls, MN 56701-0250 '),
(116, 'Discount Office Equipment', 'Discount Office Equipment 1991 Coolidge, Berkley, MI 48072 '),
(117, 'Discount Ramps', 'discount Ramps 760 S. Indiana Ave. West Bend, WI 53095 '),
(118, 'DLS WORLDWIDE', 'RR Donnelley Logistics Services Worldwide dba DLS WORLDWIDE PO BOX 932721 Cleveland, OH 44193 '),
(119, 'Domonique Call', 'Domonique Call 638 Mallard Way Oxford, MI  48371 '),
(120, 'Dongan Electric Mfg. Co.', 'Donagan Electric Mfg. Co. 34760 Garfield Rd. Fraser, MI  48026 '),
(121, 'DOPAG US Ltd (ACH)', 'DOPAG (US) Ltd 1445 Jamike Dr, Suite 100 Erlanger, KY  41018 '),
(122, 'Douglas Jones Trading Ltd', 'Douglas Jones Trading (Pty) Ltd PO Box 669 Constantia, Western Cape 7848 South Africa '),
(123, 'Draka Elevator / Prysmian', 'Draka Elevator Products, Inc. 2151 N. Church Street Roucky Mount, NC 27804 '),
(124, 'DTE Energy (Bill Pay)', 'DTE Energy PO Box 740786 Cincinnati, OH  45274-0786 '),
(125, 'Du-All  Drafting & Art', 'Du-All Drafting & Art Supply, Inc. 31431 John R Madison Heights, MI  48071 '),
(126, 'Dultmeier Sales (ACH)', 'Dultmeier Sales, LLC PO Box 45565 Omaha, NE 68145-0565 '),
(127, 'Dun and Bradstreet - CC,,', ''),
(128, 'Dwyer Instruments (ACH)', 'Dwyer Instruments, Inc. PO Box 373 Michigan City, IN 46361-0373 USA '),
(129, 'E & R Industrial Sales (ACH)', 'E & R Industrial Sales, Inc. 16294 Collection Center Chicago, IL  60693 '),
(130, 'E3 Industries', 'E3 Industries LLC 145 S. Livernois Rd. STE 248 Rochester, MI  48307 '),
(131, 'Eagle Office Solutions, Inc', 'Eagle Office Solutions, Inc 1280 E Big Beaver, STE A-2 Troy, MI  48083 '),
(132, 'Eastern Oil Company', 'Eastern Oil Company 590 S. Paddock Pontiac, MI  48341 '),
(133, 'Eastman Fire Protection', 'Eastman Fire Protection 1450 Souter Troy, MI  48083-2871 '),
(134, 'EBAY,EBAY,', ''),
(135, 'ebm-papst Inc.', 'EbmPapst 100 Hyde Road Farmington, CT 06034 '),
(136, 'Echo Electric - CC,,', ''),
(137, 'Efficient Logistics', 'Efficient Logistics 27480 Wick Rd. Romulus, MI 48174 '),
(138, 'ElecDirect.com', 'Elecdirect.com LLC 9-6311 Inducon Corporate Drive Sanborn, NY  14132 '),
(139, 'Elect-Air', 'Elect-Air 11897 Cabernet Dr. Suite C Fontana, CA 92337 '),
(140, 'Electra-Tech Manufacturing Inc.', 'Electra-Tech Manufacturing Inc. 5130 Hennin Drive Oldcastle, (Windsor) Ontario N0R 1L0 Tel: 519-737-6911 '),
(141, 'Electra Supply Inc.', 'Electra Supply Inc. 29 Cherry Blossom Rd. Cambridge, Ont N3H 4R7 '),
(142, 'Electriduct Cable Management', 'Electriduct Cable Management 6250 NW 27th Way Fort Lauderdale, FL 33309 '),
(143, 'Electro Matic Products (ACH)', 'Electro-Matic Products, Inc. 23409 Industrial Park Ct Farmington Hills, MI  48335 '),
(144, 'Empire Wire & Supplies (ACH)', 'Empire Wire & Supply, LLC 2119 Austin Avenue Rochester Hills, MI  48309 '),
(145, 'Enterprise Rent A Car', 'Enterprise Rent A Car 1080 N. Opdyke Rd. Auburn Hills, MI  48326 '),
(146, 'Essentra (ACH) was Reid', 'Essentra Components 62919 Collection Center Drive Chicago,IL 60693-0629 '),
(147, 'Etxe-Tar USA Corp.', 'Etxe-Tar USA 1270 Rankin Drive, Suite E Troy, MI  48083 '),
(148, 'Euchner-USA Inc.', 'Euchner-USA Inc. 6723 Lyons St. East Syracuse, NY 13057 '),
(149, 'EXAIR Corporation (ACH)', 'EXAIR Corporation Location 00766 Cincinnati, OH  45264-0766 '),
(150, 'Excell Transport LLC', 'Excell Transport LLC 1471 Hertford Ct. Oxford, MI  48371 '),
(151, 'Exclusive GP Limited,Exclusive GP Limite', ''),
(152, 'Exilite 298 cc (SA$),Exilite 298 cc 16 T', ''),
(153, 'Exotic Automation & Supply', 'Exotic Automation & Supply Department # 233601 P.O. Box 67000 Detroit, Mi 48267-2336 '),
(154, 'Experienced Concepts Inc', 'Experienced Concepts, Inc. P.O. Box 556 Romeo, MI  48065 '),
(155, 'Extended Stay America', 'Extended Stay America 260 Town Center Drive Dearborn, MI  48126 '),
(156, 'Fanuc Robotics', 'Fanuc Robotics America Corporation 16272 Collection Center Drive Chicago, IL  60693 '),
(157, 'Fanuc Robotics Mexico (Wire)', 'FANUC Robotics Mexico S.A. de C.V. Circuito Aguascalientes Norte 136 Parque Industrial del Valle de Aguascalientes C.P. 20355, Aguascalientes, Ags. Mexico '),
(158, 'Fastenal', 'Fastenal Company PO Box 978 Winona, MN  55987-0978 '),
(159, 'Fastenal - Taylor', 'Fastenal P.O. Box 978 Winona, MN 55987-0978 '),
(160, 'Fastenal - Windsor', 'Fastenal Canada LTD 860 Trillium Drive - Ste 117 Kitchener, ON  N2R 1K4 '),
(161, 'Fedex (Bill Pay)', 'FedEx PO Box 371461 Pittsburgh, PA  15250-7461 '),
(162, 'FedEx Trade Networks', 'FedEx Trade Networks T10007C/U P.O. Box 10007 Postas Station A Toronto, ON M5W 2B1 '),
(163, 'Festo Corporation', 'Festo Corporation 395 Moreland Road Hauppauge, NY 11788 '),
(164, 'Fife-Pearce Electric Co.', 'Fife-Pearce Electric Co. 20201 Sherwood Detroit, MI  48234 '),
(165, 'First Industrial (ACH)', 'First Industrial, L.P. P.O. Box 932761 Cleveland, OH 44193 '),
(166, 'Fischer Body Refinishing Inc', 'Fischer Body Refinishing Inc 1759 Maplelawn Drive Troy, MI  48084 '),
(167, 'Fischer Fixing Systems', 'Fischer Fixings LLC 62 Orange Avenue Suffern, NY  10901 '),
(168, 'Flotronics', 'Flotronics, Inc. Dan Tennant 10435 Ortonville Rd #A Clarkston, MI 48348 '),
(169, 'Fluid Systems Engineering', 'Fluid Systems Engineering 18855 E. 14 Mile Clinton Twp., MI  48035 Tel:586-790-8880 '),
(170, 'Foley & Mansfield', 'Foley & Mansfield 130 East Nine Mile Road Ferndale, MI  48220 '),
(171, 'Foremost Industrial Technologies', 'Foremost Electric & Transmission, Inc. 6518 W. Plank Road Peoria, IL  61604 '),
(172, 'Fraser Fab & Machine (ACH)', 'Fraser Fab & Machine, Inc. 1696 Star Batt Drive Rochester Hills, MI  48309 '),
(173, 'FRAZA FORKLIFTS', 'FRAZA FORKLIFTS 6570 19 Mile Rd, Sterling Heights, MI 48314 '),
(174, 'Freightquote.com', 'Freightquote.com 1495 Paysphere Circle Chicago, IL  60674 '),
(175, 'FUEL,FUEL,', ''),
(176, 'Future Tool & Machine', 'Future Tool & Machine 28900 Goddard Rd Romulus, MI 48174 '),
(177, 'Gable Manufacturing, Inc.', 'Gable Manufacturing, Inc. Mike Herd 667 Elmwood Troy, MI  48038 '),
(178, 'Galco Industrial Electronics', 'Galco Industrial Electronics 26010 Pinehurst Madison Heights, MI 48071 '),
(179, 'Garys Airport Transportation', 'Gary''s Airport Transportation c/o Michelle Kliczinski 7956 Alton Street Canton, MI 48187 '),
(180, 'Gary A. Staup', 'Gary A. Staup 2393 Tandy Drive Flint, Mi 48532 '),
(181, 'Gasdorf', 'Gasdorf Tool & Machine Co., Inc. 445 N. McDonel St. Lima, OH 45801 '),
(182, 'GE Capital (Bill Pay)', 'General Electric Capital Corporation PO Box 642111 Pittsburgh, PA 15264-2111 '),
(183, 'Geisler CO.', 'Geisler CO. 30295 Schoolcraft Road. Livonia, MI 48150 '),
(184, 'GlobalIndustrial.com', 'GlobalIndustrial.com Karen Spates 2505 Mill Center Parkway Suite 100 Buford, GA 30518 '),
(185, 'GNEPaint', '674 S Lapeer Rd. Lake Orion, MI 48362 '),
(186, 'Google Voice - CC,,', ''),
(187, 'GORDON BRUSH', 'GORDON BRUSH 6247 Randolph Street, Commerce, CA 90040 '),
(188, 'Grainger', 'W.W. Grainger, Inc. Dept 875323875 Palatine, IL  60038-0001 '),
(189, 'Great Lakes Export', 'Great Lakes Export 623 Lycaste Detroit, MI  48214 '),
(190, 'Great Lakes Fastenars', 'Great Lakes Fastenars 5075 Clay Ave. SW Ste. A Grand Rapids, MI 49548 '),
(191, 'Grid4 Communications (Bill Pay)', 'Grid4 Communications, Inc. PO Box 77000 Dept 77224 Detroit, MI  48277-0224 '),
(192, 'Guadalupe Lara Chavez/Javier Robles', 'Ma. Guadalupe Lara Chavez Calle Rhin No 1426, Colonia Santa Julia Irapuato, Guanajuato 36668 MEXICO '),
(193, 'Guardian', 'Guardian PO Box 824404 Philadelphia, PA  19182-4404 '),
(194, 'Guardian Alarm', 'Guardian Alarm Company of Michigan PO Box 5003 Southfield, MI  48086-5003 '),
(195, 'Guelgonza, SA DE CV (Wire)', 'Guelgonza, S.A. DE C.V. R.F.C. GUE100714383 Emilio Portes Gil 468 Col. Buenos Aires C.P. 25076 Saltillo, Coahuila     MEXICO '),
(196, 'H & CS LLC (ACH)', 'H & CS Material Handling Systems E7383 Nietzke Road Clintonville, WI  54929 '),
(197, 'H & P Technologies (ACH)', 'H & P Technologies, Inc. 21251 Ryan Road Warren, MI 48091 '),
(198, 'H E Lennon', 'H.E. Lennon 23920 Freeway Park Dr. Farmington Hills, MI 48335 '),
(199, 'H H Barnum Company', 'H.H. Barnum Company 7915 Lochlin Drive Brighton, MI 48116 '),
(200, 'Hagopian', 'Hagopian Cleaning Services 14000 W. Eight Mile Road Oak Park, MI  48237 '),
(201, 'Harborfreight.com,Harborfreight.com,', ''),
(202, 'Harmonic Drive LLC (ACH)', 'Harmonic Drive LLC 247 Lynnfield Street Peabody, MA  01960 '),
(203, 'Hartford (Bill Pay)', 'The Hartford PO Box 660916 Dallas, TX  75266-0916 '),
(204, 'Heartland (fka ICI LLC) (ACH)', 'Heartland Automation LLC 2420 Wills Street Marysville, MI  48040 '),
(205, 'High Tech Signs (Wire)', 'High Tech Signs BLVD Jesus Valdes Sanchez 1230 Col. Topochico C.P. Saltillo, Coahuila 25284 Mexico '),
(206, 'Hilo Guy (Need TIN!)', 'Hilo Guy 38194 Groesbeck Hwy Clinton Twp, MI  48036 '),
(207, 'Hilti North America', 'Hilti North America Attn: Nick Martin 5400 S. 122nd E. Ave Tulsa, Ok 74146 '),
(208, 'Holiday Inn - Woodhaven', 'Holiday Inn Express & Suites Woodhaven 21500 West Road Woodhaven, MI  48183 '),
(209, 'Home Depot,Home Depot,', ''),
(210, 'Hotham Building Materials (Canada)', 'Hotham Building Materials (Canada) 680 N Service Rd, Windsor, ON N8X 3J3, CA N8X 3J3 CA '),
(211, 'HRPro', 'HRPro 1423 E Eleven Mile Road Royal Oak, MI  48067 '),
(212, 'I.I. Enterprises (ACH)', 'I.I. Enterprises Industrial Innovations PO Box 526 Wyandotte, MI  48192 '),
(213, 'IBI Group.', 'IBI Group. 30 International Boulevard Toronto, ON, M9W 5P3, Canada '),
(214, 'ID Technology', 'ID Technology, LLC 2051 Franklin Drive Fort Worth, TX 76106 '),
(215, 'IFM Efector', 'IFM Efector, Inc PO Box 8538-307 Philadelphia, PA 19171-0307 '),
(216, 'IFM Mexico (ACH),IFM Efector S. de R.L. ', ''),
(217, 'Igus, Inc (ACH)', 'Igus, Inc. PO Box 14349 East Providence, RI  02914 '),
(218, 'Illinois Pulley & Gear', 'Illinois Pulley & Gear 611 Lunt Ave, Unit C Schaumburg, IL  60193 '),
(219, 'Integrated Machinery Systems', 'Integrated Machinery Systems, Inc. 101 North Prospect Ave Itasca, IL 60143 '),
(220, 'Intelligent Machine Solutions (wire)', 'Intelligent Machine Solutions, Inc. 1269 E Mt Garfield, Suite D Norton Shores, MI  49441 '),
(221, 'Interactive Training Systems', 'Interactive Training Systems 118 S. Leroy St. Fenton, MI  48430 '),
(222, 'International Express Services LLC', 'International Express 755 W. Big Beaver Rd. Suite 112 Troy, Mi 48084 '),
(223, 'International Robot Support, Inc', 'International Robot Support, Inc 44990 Heydenreich, Suite D Clinton Twp, MI  48038 '),
(224, 'International Wire & Cable', 'International Wire & Cable, Inc. 44035 Phoenx Dr. Sterling Heights, MI  48314 '),
(225, 'Intuit - QB,Intuit - QB,', ''),
(226, 'IRS,IRS,', ''),
(227, 'IVS Imaging', 'IVS Imaging 101 Wrangler Suite 201 Coppell, TX 75019 '),
(228, 'J & J Locksmith', 'J & J Locksmith 55 E. Long Lake Rd. #414 Troy, MI  48085 '),
(229, 'Jack Rutledge', 'Jack Rutledge 5230 N Lapeer Road Columbiaville, MI  48421 '),
(230, 'James Kennedy', 'James Kennedy 222 Briarwood Dr Lapeer, MI  48446 '),
(231, 'James Kennedy - CC,,', ''),
(232, 'Janna Dustin', 'Janna Dustin 2541 N. Lapeer Rd. Lapeer, MI 48446 '),
(233, 'Jets Pizza,,', ''),
(234, 'JGS Machining Co', 'JGS Machining 4455 Davis Road St. Clair, MI  48079 Tel:810-329-4210 '),
(235, 'Jimmy Johns,Jimmy Johns,', ''),
(236, 'John Sherry', 'John Sherry 1335 W Fairview Lane Rochester HIlls, MI  48306 '),
(237, 'K & S Tree Service, Inc.', 'K & S Tree Service, Inc. 560 Walker Road Leonard, MI  48367 '),
(238, 'Ka-Wood Gear & Machine Co', 'Ka-Wood Gear & Machine Company 32500 Industrial Drive Madison Heights, MI  48071 '),
(239, 'Kargilis Solutions', 'Kargilis Business Solutions, LLC 212 Shagbark Drive Rochester Hills, MI  48309 '),
(240, 'Kentek', 'Kentek 1 Elm Street Pittsfield, NH  03263 '),
(241, 'Kevin Kuhn', 'Kevin Kuhn 3565 Wakefield Berkley, MI  48072 '),
(242, 'Kevin Kuhn CC,Kevin Kuhn CC,', ''),
(243, 'Kevin Linehan', 'Kevin Linehan 1641 Evergreen Trenton, MI  48183 '),
(244, 'Kinecor', 'Kinecor 2187 Huron Church Rd. Bldg 300, Until 310 Windsor, ON  N9C 2L8 Tel:519-948-7487 '),
(245, 'KING PUMPS INC', 'KING PUMPS INC. 253 NW 54th Street, Miami, Florida 33127- '),
(246, 'KLASSEN Custom Fab, Inc.', 'KLASSEN Custom Fab, Inc. 5140 Ure Street OldCastle, ON   N0R 1L0 Canada '),
(247, 'Knight Global', 'Knight Global 2705 Commerce Parkway Auburn Hills, MI  48326 '),
(248, 'Korotkin Insurance Group', 'Korotkin Insurance Group 26877 Northwestern Hwy #400 Southfield, MI  48033-8418 '),
(249, 'Lamination Creation LLC', 'Lamination Creation LLC Gerald B Babjack 36761 Harwick Court Clinton Township, MI  48035 '),
(250, 'LaSalle Electric Supply Co', 'LaSalle Electric Supply Co. 34073 Schoolcraft Livonia, MI  48151 '),
(251, 'Lauderdale Corp (ACH)', 'Lauderdale Development Corporation 5750 New King Drive, Suite 200 Troy, MI  48098 '),
(252, 'Lenz', 'Lenz PO Box 1044 Dayton, OH 45401 '),
(253, 'Lima Memorial Health System', 'Lima Memorial Health System PO Box 713240 Columbus, OH 43271-3240 '),
(254, 'Load One (ACH)', 'Load One Transportation & Logistics 13221 Inkster Road Taylor, MI 48180 '),
(255, 'LOGOMAT (ACH)', 'LOGOMAT Automation Systems, Inc 2595 Arbor Tech Drive Hebron, KY  41048 '),
(256, 'Lowes,Lowes,', ''),
(257, 'Lowry Solutions', 'Lowry Solutions 9420 Maltby Rd. Brighton, MI 48116 '),
(258, 'Macomb Community College', 'Macomb Community College Cashier CC-G122 44575 Garfield Rd. Clinton Twp., Mi 48038 '),
(259, 'Madison Electric (ACH)', 'Madison Electric Company 31855 Van Dyke Ave Warren, MI  48093-1047 '),
(260, 'MAG Automotive', 'MAG IAS LLC 75 Remittance Drive Suite 3277 Chicago, IL 60675-3277 '),
(261, 'MAHEJA', 'MAHEJA Prol. Aldama No. 1004, CO 38160 MEXICO '),
(262, 'Majors McGuire', 'Majors McGuire 3235 Electricity Dr, Unit B Windsor, ON N8W 5J1 Canada '),
(263, 'Maquinados Industriales Limat', 'Maquinados Industriales Limat Rio Hondo, No. 225 Fracc. Fundadores Saltillo, Coahuila 25019 '),
(264, 'Marathon Industrial,Marathon Industrial,', ''),
(265, 'Marc Dutton Irrigation, Inc.', 'Marc Dutton Irrigation, Inc. 4720 Hatchery Road Waterford, MI 48329 '),
(266, 'Marshall E. Campbell', 'Marshall E. Campbell 2975 Lapeer Rd. Port Huron, MI 48060 '),
(267, 'Marshall Sales, Inc.', 'Marshall Sales, Inc. 14359 Meyers Road Detroit, MI  48227 '),
(268, 'Masterfile.com,Masterfile.com,', ''),
(269, 'Matuk Automation Services', 'Matuk Automation Services Margain 575 Parque Corp. Sta. Engrade, Sa '),
(270, 'Matzka Inc.', 'Matzka Inc. 25255 Mound Rd. Warren, MI  48091 '),
(271, 'McCarver Mechanical', 'McCarver Mechanical Heating & Cooling 32486 Dequindre Warren, MI 48092 '),
(272, 'McKernan, Inc.', 'McKernan, Inc. 30596 Groesbeck Highway Roseville, MI 48066 '),
(273, 'McMasters Carr', 'McMaster-Carr PO Box 7690 Chicago, IL  60680-7690 '),
(274, 'McNaughton - McKay (ACH)', 'McNaughton-McKay Electric Co Dept 14801 PO Box 67000 Detroit, MI 48267-0148 '),
(275, 'Meijer Inc,Meijer Inc,', ''),
(276, 'Metalmite Corporation', 'Metalmite Corporation 194 S. Elizabeth St Rochester, MI  48307 '),
(277, 'Meteor (fix address)', 'Quantum Digital Ventures, LLC Meteor 1099 Chicago Road Troy, MI  48083 '),
(278, 'MetLife', 'MetLife Dental TM 05 995185 0001, Vision 97377737 PO Box 803323 Kansas City, MO  64180-3323 '),
(279, 'Metzler Locricchio Serra Co CPA', 'Metzler Locricchio Serra & Company, P.C. 1800 W Big Beaver Rd, Suite 100 Troy, MI  48084-3531 '),
(280, 'MICCO', 'MICCO 25831 Commerce Dr. Madison Heights, MI  48071 '),
(281, 'Michigan Computer Solutions', 'Michigan Computer Solutions 37257 Mound Rd. Suite B Sterling Heights, MI  48310 '),
(282, 'Michigan Mechanical Services Inc.', 'Michigan Mechanical Services Inc. 25445 Brest Road Taylor, MI  48180 '),
(283, 'Micro Center', 'Micro Center 32800Concord Drive Madison Heights, MI 43071 '),
(284, 'MicroDAQ.com', 'MicroDAQ.com P.O. Box 439 879 Maple St. Contoocook, NH  03229 '),
(285, 'Mid-State Material Handling (ACH)', 'Mid-State Material Handling, Inc. 8226 S. Saginaw Street, Suite B Grand Blanc, MI  48439 '),
(286, 'Midbrook, Inc.', 'Midbrook Industrial Washers, Inc. 2070 Brooklyn Road Jackson, MI  49203 '),
(287, 'Mike Gresham Snowplowing', 'Gresham''s Snowplowing, Inc. PO Box 81456 Rochester, MI  48308 '),
(288, 'Mike Silbereis', 'Mike Silbereis 4816 Aviemore Drive Sterling Heights, MI 48314 '),
(289, 'Mister Safety Shoes Inc.', 'Mister Safety Shoes Inc. 2300 Finch Ave W, Suite 6 Toronto, ON  M9M 2Y3 Canada '),
(290, 'MiSUMI USA Inc.', 'Misumi USA, Inc. 26797 Network Place Chicago, IL  60673-1267 '),
(291, 'Modular Aluminum Technology', 'Flotronics, Inc. Modular Aluminum Technology 7214 Gateway Park Drive Clarkston, MI  48346 '),
(292, 'Morrell, Inc. (ACH)', 'Morrell, Inc. Dept 20301 PO Box 67000 Detroit, MI  48267-0203 '),
(293, 'Motion Industries', 'Motion Industries, Inc. PO Box 98412 Chicago, IL  60693-8412 '),
(294, 'Mr. Pauls Chophouse,Mr. Pauls Chophous', ''),
(295, 'MSI-Viking Gage, LLC', 'MSI-Viking Gage, LLC PO Box 537 Duncan, SC  29334 '),
(296, 'MTE Controls', 'MTE Controls 5135 Hennin Drive Oldcastle, ON  N0R 1LO CANADA '),
(297, 'Murthy Law Firm', 'The Law Office of Sheela Murthy, P.C. Murthy Law Firm 10451 Mill Run Circle, Suite 100 Owings Mills, MD  21117 '),
(298, 'MyWhiteBoards.com,MyWhiteBoards.com,', ''),
(299, 'National Notary Association', 'National Notary Association 9350 Desoto Ave Chatsworth, CA 91311-4926 '),
(300, 'National Safety,National Safety - Online', ''),
(301, 'Newark,Newark,', ''),
(302, 'Nicholas Leggieri', 'Nicholas Leggieri 772 Kimberly Apt 302 Lake Orion, MI 48362 '),
(303, 'Nikhil C.V. - CC,,', ''),
(304, 'Nikhil CV Amex CC,Nikhil CV Amex CC,', ''),
(305, 'Nikhil Vadakanmareveettil', 'Nikhil Vadakanmareveettil Kamalalayam, Keloth, Payyanur Kerala - 670307, India '),
(306, 'North Electric Supply Company', 'North Electric Supply Company 1290 North Opdyke Road Auburn Hills, MI  48326 '),
(307, 'North Pointe Insurance Company', 'North Pointe Insurance Company PO Box 78567 Milwaukee, WI  53278-0567 '),
(308, 'Northern Tool', 'Northern Tool 2800 Southcross Drive West Burnsville, MN 55337 '),
(309, 'NRAI, Inc', 'NRAI, Inc. PO Box 4349 Carol Stream, IL  60197-4349 '),
(310, 'NWA Air,NWA Air,', ''),
(311, 'Office Max,Office Max,', ''),
(312, 'Office Team', 'Office Team 12400 Colletions Center Drive Chicago, IL 60693 '),
(313, 'Oldi', 'Oldi 7209 Chapman Highway Knoxville, TN 37920 '),
(314, 'Olive Garden,Olive Garden,', ''),
(315, 'omega technologies', 'omega technologies 31125 Via Colinas #905 Westlake Village, CA 91362 '),
(316, 'Omkar Rege', 'Omkar A Rege 606 E Stoughton, Apt 204 Champaign, IL  61820 '),
(317, 'Omni Metalcraft (ACH)', 'Omni Metalcraft Corp PO Box 352 Alpena, MI  49707 '),
(318, 'Omni Tool', 'Omni Tool Ltd 5495 Outer Drive Windsor, ON  N9A 6J3 CANADA '),
(319, 'Orange Coast Pneumatics', 'Orange Coast Pneumatics. 3810 Prospect Ave. Unit A Yorba Linda, Unit A Yorba Linda, CA 92286 '),
(320, 'Pahoa Express, Inc.', 'Pahoa Express, Inc. 38151 Groesbeck Hwy Clinton Townhip, MI  48036 '),
(321, 'Palazzo Di Bocce', 'Palazzo di Bocce 4291 S Lapeer Road Orion, MI  48359 '),
(322, 'Panera Bread,Panera Bread,', ''),
(323, 'Pari - India (V)', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Project) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(324, 'PARI India - CAT IMS 3578', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (CAT IMS) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(325, 'PARI India - Chrysler Mexico', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Ch-Tigershark) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(326, 'PARI India - Chrysler Tipton', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Tipton Project) Village Dhangarwadi, Off Pune Satara Hwy, Dist. Satara, Taluka - Khandala, Satara - 412801 (Maharashtra) India '),
(327, 'PARI India - Chrysler Trenton', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Trenton Project) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(328, 'PARI India - Fanuc', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Fanuc Program) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(329, 'PARI India - FMCSA', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (FMCSA Project) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(330, 'PARI India - Ford Essex', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Essex Coyote) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(331, 'PARI India - Ford Lima', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Ford Lima) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(332, 'PARI India - Ford Mexico', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Ford Mexico) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(333, 'PARI India - Ford Sterling', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Ford Sterling) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(334, 'PARI India - Global Parts', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Global Parts) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(335, 'PARI India - Heller (Euro)', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Heller Program) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(336, 'PARI India - Heller (USD)', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (HellerUSProgram) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(337, 'PARI India - MAG IAS', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (MAG IAS Project) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(338, 'PARI India - MAG Mexico', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (MAG Mex Project) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(339, 'PARI India - PARI Inc', 'Precision Automation & Robotics India Ltd Narhe Factory: S. No. 38/2, Narhe, Tal. Haveli, Pune  411041, India '),
(340, 'PARI India - Spares Misc', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Spares Program) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(341, 'PARI India - ZF Group', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (ZF Group) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(342, 'PARI India Misc Payble', 'Precision Automation & Robotics India Ltd Gat No. 463A, 463B, 464 (Misc Project) Village Dhangarwadi, Taluka Khandala, District Satara - 412801, Maharashtra India '),
(343, 'Parker Steel International', 'Parker Steel International 1819 Starr Ave. Toledo, OH 43605 '),
(344, 'Patlite Corp.', 'Patlite Corp. 20130 S. Western Ave. Torrance, CA 90501 '),
(345, 'Patrick Gleason', 'Patrick Gleason 34335 Heartsworth Lane Sterling Heights, MI  48313 '),
(346, 'Peerless Steel (ACH)', 'Peerless Steel Richard Leitch 2450 Austin Troy, MI 48083 '),
(347, 'Pei Wei,Pei Wei,', ''),
(348, 'Pepperl+Fuchs', 'Pepperl + Fuchs, Inc. P.O. Box 1041 New York, NY 10268-1041 '),
(349, 'Pfannenberg', 'Pfannenberg Inc. Attn: Chris Lauderback 68 Ward Road Lancaster, NY  14086 '),
(350, 'Phonenix Machinery Movers', 'Phonenix Machinery Movers 50555 Corporate Drive Shelby Twp, MI  48315-3103 '),
(351, 'PIAB USA Inc (ACH)', 'PIAB USA ,Inc. PO Box 644491 Pittsburgh, PA  15264-4491 '),
(352, 'Pilz Automation Safety, LP', 'Pilz Automation Safety, LP 7021 Solutions Center Chicago, IL  60677-7000 '),
(353, 'PIP1501108827,PIP1501108827,', ''),
(354, 'Pitt Ohio LTL', 'Pitt Ohio LTL PO Box 643271 Pittsburgh, PA  15264-3271 '),
(355, 'PLC-Mall.com', 'Automation Suppliers, Inc. dba: plc-mall.com 221 W Nolana, Ste C McAllen, TX  78504 '),
(356, 'Plotterpaper.com,Plotterpaper.com,', ''),
(357, 'PMR Industries, Inc.', 'PMR Industries, Inc. 2311 - 16TH Street Port Huron, MI  48060 '),
(358, 'Pontiac Steel Co.,Inc.', 'Pontiac Steel Co.,Inc. P.O. Box 81665 Rochester, MI 48308 '),
(359, 'Port Huron Building Supply', 'Port Huron Building Supply 3555 Electric Ave. Port Huron, MI 48060 '),
(360, 'Preferred Data Imaging, Inc.', 'Preferred Data Imaging, Inc. PO Box 10597 Canoga Park, CA  91309 '),
(361, 'Preferred Shipping (ACH)', 'Preferred Shipping Inc. 12714 Settemont Rd. Missouri City, TX  77489 '),
(362, 'Pro-Graphics, Inc.', 'Pro-Graphics, Inc. 1092 Centre Rd. Auburn Hills, MI 48326 '),
(363, 'Pro-Tech Graphics', 'Pro-Tech Graphics 34851 Groesbeck Hwy Clinton Twp, MI  48035 '),
(364, 'Pro Ultra Clean', 'Pro Ultra Clean P.O. Box 33244 Bloomfield Hills, MI  48303 '),
(365, 'Production Tool Supply', 'Production Tool Supply Co, LLC PO Box 670587 Detroit, MI  48267-0587 '),
(366, 'Professional Freight Solutions', 'Professional Freight Solutions 6303 26 Mile Road, Ste 201 Washington Twp, MI  48094 '),
(367, 'Promotional Solutions', 'Promotional Solutions, LLC 48530 Van Dyke Ave Shelby Twp, MI  48317 '),
(368, 'QC Lubricants', 'QC Lubricants CAGE CODE 9Y364 7360 Milnor St. Philadelphia, PA 19136 '),
(369, 'QPS', 'QPS 81 Kelfield Street, Units 7-9 Toronto, ON  M9W 5A3 CANADA '),
(370, 'Quality Welding & Fabrication', 'Quality Welding & Fabrication Ashley Miller 4330 East Road Elida, OH   45807 '),
(371, 'Quill Inc.', 'Quill Inc. P.O. 37600 Philidelphia, PA 37600 '),
(372, 'R & A Heating And Cooling, Inc.', 'R & A Heating And Cooling, Inc. 275 Biltmore Dr Troy, MI  48084 '),
(373, 'Radix (wire)', 'Radix Inc. 5140 Concession Road 8 Maidstone, ON  N0R 1K0 Canada '),
(374, 'Rahul D. Bhosale,Rahul D. Bhosale,', ''),
(375, 'Rahul D. Bhosale CC,,', ''),
(376, 'Rahul Keskar', 'Rahul Keskar 55 North Plaza Blvd Apartment 412 Rochester Hills, MI 48307 '),
(377, 'Rahul Keskar - CC,,', ''),
(378, 'Ramco Innovations (ACH)', 'Ramco Innovations, Inc. PO Box 65310 West Des Moines, IA  50265 '),
(379, 'Rangoli Event Management', 'Rangoli Event Management 3055 E Walton Blvd Auburn Hills, MI  48326 '),
(380, 'Rangoli Indian,Rangoli Indian,', ''),
(381, 'Rapid Machine (ACH)', 'Rapid Machine, Inc. 43738 Merrill Rd Sterling Heights, MI  48314 '),
(382, 'Ray Sagan & Sons, Inc.', 'Ray Sagan & Sons, Inc. 401 Bonnie Lane Elk Grove Village, IL  60007 '),
(383, 'Red Cross,Red Cross,', ''),
(384, 'Red Roof Inn,Red Roof Inn,', ''),
(385, 'Reliance Communication,Reliance Communic', ''),
(386, 'Renee Compeau', 'Renee Compeau 23210 Pinetree Circle Macomb, MI 48042 '),
(387, 'Republic Svc(fka Allied Waste) (Bill Pay', 'Republic Services #253 PO Box 9001099 Louisville, KY  40290-1099 '),
(388, 'Rhonda Hughes', 'Rhonda Hughes 639 Leyland Court Lake Orion, MI  48362 '),
(389, 'Rhonda Hughes Amex CC,Rhonda Hughes Amex', ''),
(390, 'Ritter Technology LLC', 'Ritter Technology LLC 100 Williams Drive Zelienople, PA  16063 '),
(391, 'River Urgent Care', 'The River Urgent Care 18930 West Road Woodhaven, MI 48183-3317 '),
(392, 'Rizzo (fka All Waste) (Bill Pay)', 'Rizzo Environmental Services dba Rizzo Services 6200 Elmridge Dr Sterling Heights, MI 48313 '),
(393, 'Roboteq', 'Roboteq 7898 E. Acoma Dr. #102 Scottsdale, AZ 85260 '),
(394, 'Rochester Hills Exec Park Owner Assn', 'Rochester Hills Executive Park Owners Association 2 Town Square Suite 850 Southfield, MI 48076 '),
(395, 'Rochester Mini Storage, Inc', 'Rochester Mini-Storage, Inc 1790 S Livernois Rd Rochester Hills, MI  48307 '),
(396, 'Rocket Software (fka Trubiquity) (ACH)', 'Rocket Software Systems, Inc. PO Box 842469 Boston, MA  02284-2469 '),
(397, 'Romanos Macaroni Grill,Romanos Macaron', ''),
(398, 'Rophin Paul', 'Rophin Paul 3771 Sleepy Fox Dr Rochester Hills, MI  48309 '),
(399, 'Rophin Paul - CC,,', ''),
(400, 'Rophin Paul Amex CC,Rophin Paul Amex CC,', ''),
(401, 'Rose and Boplar Enclosures', 'Phoenix Mecano, Inc. 7330 Executive Way Frederick, MD  21704 '),
(402, 'Roy Smith Company', 'Roy Smith Company 14650 Dequindre Detroit, Mi 48212 '),
(403, 'Royal Alliance Industries', 'Royal Alliance Industries, Inc. 1701 W. Hamlin Rd. Rochester Hills, MI  48309 '),
(404, 'RTI Laboratories', 'RTI Laboratories 33080 Industrial Rd. Livonia, MI 48150 '),
(405, 'Sabic Polymers - CC,,', ''),
(406, 'Safety Label Solutions', 'Safety Label Solutions 112 Highview Road Milford, PA  48337 '),
(407, 'Safetybee', 'Safetybee 2201 N. Lakewood Blvd, Suite D# 222 Long Beach, CA 90815 '),
(408, 'Saket Hardikar', 'Saket Hardikar 288, Woodside Ct. Apt # 175 Rochester Hills, MI - 48307 '),
(409, 'Saket Hardikar - CC,,', ''),
(410, 'Sams Club,Sams Club,', ''),
(411, 'Sameer Umrani', 'Sameer Umrani 60 Village Circle Dr, #12 Rochester Hills, MI  48307 '),
(412, 'Sameer Umrani - CC,,', ''),
(413, 'Sentec Automation', 'Sentec Automation Components, Inc 5600C Williams Lake Road Waterford, MI 48329 '),
(414, 'Sentry Insurance', 'Sentry Insurance 1800 North Point Drive Stevens Point, WI 54481 '),
(415, 'Service Master Cleaning Service', 'ServiceMaster Commercial Cleaning Service P.O. Box 171 Metamora, MI 48455 '),
(416, 'Seyburn, Kahn, Ginn, Bess, Serlin(Lawye', 'Seyburn, Kahn, Ginn, Bess & Serlin, P.C. 2000 Town Center, Suite 1500 Southfield, MI  48075-1195 '),
(417, 'Shaltz Automation, Inc.', 'Shaltz Automation, Inc. Division of Shaltz Fluid Power 5190 Exchange Drive Flint, MI  48507 '),
(418, 'Shawnee Rentals', 'Shawnee Rentals 742 W. North Street Lima, OH  45801 '),
(419, 'Shell Oil,Shell Oil,', ''),
(420, 'Sherwin Williams', 'Sherwin-Williams Co (#1172) 50495 Corp Dr Ste 101 Shelby Twp, MI  48315-3132 '),
(421, 'Shores Technologies (ACH) *', 'Shores Technologies, Inc. 22904 Industrial Drive West St. Clair Shores, MI  48080-1311 '),
(422, 'Siemens Industry (ACH)', 'Siemens Industry, Inc. P.O. Box 371034 Pittsburgh, PA 15251 '),
(423, 'Sigrid & Associates (ACH)', 'Sigrid & Associates, Inc. Thurland Johnston 2224 Juniper Ct Shelby Twp, MI  48316 '),
(424, 'Sir Speedy', 'Sir Speedy John Gregorich 1942 Star Batt Dr. Rochester Hills, MI 48309 '),
(425, 'SJC Controls *(ACH)', 'SJC Controls, Inc. ATTN: Accounts Receivable 51410 Milano Drive, Ste #114 Macomb, MI  48042 '),
(426, 'Sleep Inns  - CC,,', ''),
(427, 'Snap on Tool Online', 'IDSC Holdings LLC, dba Snap-on Industrial a division of IDSC Holdings LLC 2801 80th St Kenosha, WI  53143 '),
(428, 'Society of Manufacturing Engineers', 'Society of Manufacturing Engineers PO Box 6028 Dearborn, MI  48121 '),
(429, 'Solutions for Industry (ACH)*', 'Solutions for Industry, Inc. 13171 Day Rd Hudson, MI 49247 '),
(430, 'Southwest AirLines,Southwest AirLines,', ''),
(431, 'Staples Advantage', 'Staples Advantage Dept DET PO Box 83689 Chicago, IL  60696-3689 '),
(432, 'Star Hydraulics', 'Star Hydraulics Mike Lenisa 2727 N. Clinton St. River Grove, IL 60171 '),
(433, 'State Of Michigan - Collection Division', 'State Of Michigan - Collection Division Michigan Department of Treasury P.O. Box 30199 Lansing, Mi 48909-7699 '),
(434, 'State of Michigan - Licence Plate', 'Michigan Department of State 7064 Crowner Drive Lansing, MI 48980-0001 '),
(435, 'State of Michigan - Licensing', 'Department of Licensing & Regulatory Affairs - Burerau of Commercial Services Corporation Division P.O. Box 30702 Lansing, Mi 48909 '),
(436, 'State of Michigan - Treasury', 'State of Michigan Michigan Department of Treasury P.O. Box 30774 Lansing, MI  48909-8274 '),
(437, 'Stephen Drouillard', 'Steve Drouillard 3790 Rolling Hills Road Orion, MI 48359 '),
(438, 'Sterling Backcheck (ABSO)', 'Sterling Backcheck (ABSO) Neewark Post Office P. O. Box 36482 Newark, NJ 07193-6482 '),
(439, 'Suburban Bolt (ACH)', 'Suburban Bolt & Supply Co. 27670 Grosebeck Highway Roseville, MI 48066 '),
(440, 'Sukho Thai of Rochester,Sukho Thai of Ro', ''),
(441, 'Sumita Austen', 'Sumita Austen 1528 Oakridge Drive Rochester Hills, MI  48307 '),
(442, 'Sumitha Paul,Sumitha Paul,', ''),
(443, 'SUNTEL SERVICES', 'SUNTEL SERVICES 1005 Crooks Rd, STE.100 Troy, MI 48084 '),
(444, 'SupplyDen', 'SupplyDen 1837 Enterprise Dr. Rochester Hills, MI 48309 '),
(445, 'Survey Monkey,Survey Monkey,', ''),
(446, 'Syndevco', 'Syndevco, Inc. 24205 Telegraph Road Southfield, MI  48033 '),
(447, 'SYSTEMATIC MANUFACTURING INC', 'SYSTEMATIC MANUFACTURING INC 6522 DIPLOMAT DR. STERLING HEIGHTS, MI 48314 '),
(448, 'Taste of Thailand,Taste of Thailand,', ''),
(449, 'Teal Electric', 'Teal Electric 1200 Naughton Avenue P.O. Box 1189 Troy, MI  48099 '),
(450, 'Technical Training Inc. (TTi) (ACH)', 'Technical Training Inc. 3903 W Hamlin Road Rochester Hills, MI 48309 '),
(451, 'Techno Montajes (ACH)', 'Techno Montajes Roberto Martinez BLVD. Gustavo Diaz no. 201, Col. Loma Lin Ramos Arizpe, Coahuila 25900 Mexico '),
(452, 'Telecom Data (Formerly MCM)', 'Telecom Data Solutions LLC PO Box 618 Lake Orion, MI  48361 '),
(453, 'Telesis Technologies Inc', 'Telesis Technologies Inc. 16023 Collection Center Drive Chicago, Il 60693 '),
(454, 'Tennant Sales and Service Co.', 'Tennant Sales and Service Company P.O. Box 71414 Chicago, IL 60694-1414 '),
(455, 'Terry Wells', 'Terry Wells 20007 Towner Dr Clinton Twp, MI  48038-4931 '),
(456, 'Terry Wells - CC,,', ''),
(457, 'TestAmerica Labs (ACH)', 'TestAmerica Laboratories, Inc. 10448 Citation Dr. Ste. 200 Brighton, MI  48116 '),
(458, 'Theorem Solutions Inc.', 'Theorem Solutions Inc. 6279 Tri-Ridge Blvd, Ste 240 Loveland, OH 45140-8396 '),
(459, 'Thomson Linear Motion', 'Thomson Linear Motion 3606 Collections Center Dr Chicago, IL  60693 '),
(460, 'Thumb Rigging (ACH)', 'Thumb Rigging & Erectors, Inc. 14850 Downey Road PO Box 189 Capac, MI  48014 '),
(461, 'Tina Sirls,Tina M Sirls,', ''),
(462, 'Titan Metallurgy', 'Titan Metallurgy 10221 Capital Ave. Oak Park, MI 48237 '),
(463, 'Titan Tool', 'Titan Tool Company, Inc. 7410 W Ridge Road PO Box 220 Fairview, PA  16415 '),
(464, 'TNT Express', 'TNT USA INC PO Box 182592 Columbus, OH  43218-2592 '),
(465, 'Towne Place & Suites,Towne Place & Suite', ''),
(466, 'Travel Booth(Sky Bird)', 'Travel Booth 5358 Matthew Terrace Fremont, CA  94555 '),
(467, 'Travelers Insurance', 'Travelers Insurance CL Remittance Center PO Box 660317 Dallas, TX  75266-0317 '),
(468, 'Travelocity.com,,', ''),
(469, 'Tri-Arc Mfg (ACH)', 'Tri-Arc Manufacturing Company 390 Fountain Street Pittsburgh, PA  15238 '),
(470, 'Tri-State Fastener', 'Tri-State Fastener, Inc. 65 Vineyard Road Seekank, MA  02771 '),
(471, 'Triumph Commercial Finance', 'Triumph Commercial Finance 3 Park Central, Suite 1700 12700 Park Central Drive Dallas, TX  75251 '),
(472, 'Turck Inc', 'TURCK INC. MI 67, PO Box 9201 Minneapolis, MN 55480-9201 '),
(473, 'Turner Kimball Rental LLC', 'Turner Kimball Rental LLC 1485 South Shore Drive Holland, MI  49423 '),
(474, 'Uline', 'ULINE ATTN: Accounts Receivable PO Box 88741 Chicago, IL  60680-1741 '),
(475, 'Uncle Squeegees Inc.', 'Uncle Squeegee''s Window Cleaning PO Box 380225 Clinton Twp, MI  48038 '),
(476, 'United Airlines,,', ''),
(477, 'United Healthcare', 'United Healthcare Dept CH-10151 Palatine, IL 60055-0151 '),
(478, 'Upland Investments LLC', 'Upland Investments LLC P.O. Box 408 Lake Orion, Mi 48361 '),
(479, 'UPS Supply Chain Solutions Inc.', 'UPS - Supply Chain Solutions Inc. 28013 Network Place Chicago, IL  60673-1280 '),
(480, 'UPS United Parcel Service (Bill Pay)', 'United Parcel Service Lockbox 577 Carol Stream, IL  60132-0577 '),
(481, 'US Dept of Homeland Security,US Departme', ''),
(482, 'USCIS,USCIS,', ''),
(483, 'USPS (Post Office),United States Postal ', ''),
(484, 'UTi, United States, Inc. (ACH)', 'UTI UNITED STATES INC 26838  NETWORK PLACE CHICAGO, IL 60673-1268 '),
(485, 'Valentine & Associates', 'Valentine & Associates 5767 West Maple Rd. Ste 400 West Bloomfield, Mi 48327 '),
(486, 'Vanguard Cleaning (ACH)', 'Vanguard Cleaning Systems 2386 Franklin Rd Bloomfield Hills, MI  48302 '),
(487, 'Verizon,Verizon,', ''),
(488, 'Versa Handling', 'Versa Handling Company 12995 Hillview Detroit, MI  48227 '),
(489, 'Vibromatic (ACH)', 'Vibromatic Company, Inc. PO Box 1358 Noblesville, IN 46061-1358 '),
(490, 'Victor Machine & Mfg. Ltd.', 'Victor Machine & Mfg. Ltd. 100-3215 Jefferson Blvd. Windsor, Ontario N8T 2W7 '),
(491, 'Vijay Pinto,Vijay Pinto,', ''),
(492, 'Vijay Pinto CC,Vijay Pinto,', ''),
(493, 'Visual Components NA (ACH)', 'Visual Components North America Corp. 2633 S. Lapeer Rd, Suite G Lake Orion, MI  48360 '),
(494, 'Vivek Systems (ACH)', 'Vivek Systems Drawer #1449 PO Box 5935 Troy, MI  48007-5935 '),
(495, 'Vollmer', 'Vollmer 3822 Sandwhich Street Windsor, On N9C 1C1 Canada '),
(496, 'Vonage - CC,,', ''),
(497, 'W & L Investment Company, LLC', 'W & L Investment Company 1790 S Livernois Road Rochester Hills, MI  48307 '),
(498, 'WalMart,WalMart,', ''),
(499, 'Walther Pilot North America', 'Walther Pilot North America 46890 Continental Dr. Chesterfield, MI  48047 '),
(500, 'Waste Management (Bill Pay)', 'Waste Management P.O. Box 4648 Carol Stream, IL 60197-4648 '),
(501, 'Wayfair Supply', 'Wayfair Supply 986 W 2nd, ST., Ogden, Utah 84404 '),
(502, 'WD Hearn Machine Tools (SA$)', 'WD Hearn Machine Tools PO Box 1090 Eppindust 7475 Cape Town, South Africa '),
(503, 'Webex', 'Webex 3979 Freedom Circle Santa Clara, CA 95054 '),
(504, 'Wes-Tech Automation', 'Wes-Tech Automation Solutions, LLC '),
(505, 'Wilkie Brothers (ACH)', 'Wilkie Brothers Conveyors, Inc. PO Box 219 Marysville, MI  48040 '),
(506, 'Workshop Media (ACH)', 'Workshop Media Group 590 Hemingway Rd Lake Orion, MI  48362 '),
(507, 'XRI TESTING (ACH)', 'X-Ray Industries, Inc. 1961 Thunderbird Troy, MI 48084 '),
(508, 'YourBigSign.com', 'YourBigSign.com 3440 Fenton Rd, Hartland, Hartland, MI 48353 '),
(509, 'Zorotools.com', 'Zoro Tools, Inc. 1000 Ashbury Drive, Suite 1 Buffalo Grove, IL  60089 '),
(511, 'ABC', '1234 PQR DrTroy, MI'),
(512, 'JKL', '1 JKL Dr Chicago, IL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD KEY `ReqId` (`ReqId`),
  ADD KEY `Approver` (`Approver`);

--
-- Indexes for table `itemdescr`
--
ALTER TABLE `itemdescr`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `itemmap`
--
ALTER TABLE `itemmap`
  ADD KEY `itemmap_ibfk_1` (`ItemId`);

--
-- Indexes for table `jobcode`
--
ALTER TABLE `jobcode`
  ADD PRIMARY KEY (`JCId`);

--
-- Indexes for table `purdets`
--
ALTER TABLE `purdets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purdets` (`VendorId`),
  ADD KEY `ReqsId` (`ReqsId`),
  ADD KEY `JobCode` (`JobCode`),
  ADD KEY `ShipId` (`ShipId`);

--
-- Indexes for table `requester`
--
ALTER TABLE `requester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `requistion`
--
ALTER TABLE `requistion`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `shipdets`
--
ALTER TABLE `shipdets`
  ADD PRIMARY KEY (`shipid`),
  ADD KEY `AddrId` (`AddrId`);

--
-- Indexes for table `shippingaddr`
--
ALTER TABLE `shippingaddr`
  ADD PRIMARY KEY (`AddrId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Type` (`Type`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`VendorCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemdescr`
--
ALTER TABLE `itemdescr`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `jobcode`
--
ALTER TABLE `jobcode`
  MODIFY `JCId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;
--
-- AUTO_INCREMENT for table `purdets`
--
ALTER TABLE `purdets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `requester`
--
ALTER TABLE `requester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `shipdets`
--
ALTER TABLE `shipdets`
  MODIFY `shipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `shippingaddr`
--
ALTER TABLE `shippingaddr`
  MODIFY `AddrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `VendorCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `approval_ibfk_1` FOREIGN KEY (`ReqId`) REFERENCES `purdets` (`id`),
  ADD CONSTRAINT `approval_ibfk_2` FOREIGN KEY (`Approver`) REFERENCES `users` (`id`);

--
-- Constraints for table `itemmap`
--
ALTER TABLE `itemmap`
  ADD CONSTRAINT `itemmap_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `itemdescr` (`itemid`);

--
-- Constraints for table `purdets`
--
ALTER TABLE `purdets`
  ADD CONSTRAINT `purdets` FOREIGN KEY (`VendorId`) REFERENCES `vendor` (`VendorCode`) ON DELETE CASCADE,
  ADD CONSTRAINT `purdets_ibfk_1` FOREIGN KEY (`ReqsId`) REFERENCES `requester` (`id`),
  ADD CONSTRAINT `purdets_ibfk_2` FOREIGN KEY (`JobCode`) REFERENCES `jobcode` (`JCId`),
  ADD CONSTRAINT `purdets_ibfk_3` FOREIGN KEY (`ShipId`) REFERENCES `shipdets` (`shipid`);

--
-- Constraints for table `requester`
--
ALTER TABLE `requester`
  ADD CONSTRAINT `requester_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `requistion`
--
ALTER TABLE `requistion`
  ADD CONSTRAINT `requistion_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `purdets` (`id`);

--
-- Constraints for table `shipdets`
--
ALTER TABLE `shipdets`
  ADD CONSTRAINT `shipdets_ibfk_1` FOREIGN KEY (`AddrId`) REFERENCES `shippingaddr` (`AddrId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `usertypes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
