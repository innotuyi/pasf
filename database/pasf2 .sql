-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 10:11 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasf2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `tbl_adminId` int(11) NOT NULL,
  `tbl_adminName` varchar(60) NOT NULL,
  `tbl_adminEmail` varchar(60) NOT NULL,
  `tbl_adminTel` varchar(12) NOT NULL,
  `tbl_adminAddress` text NOT NULL,
  `tbl_adminUserName` varchar(60) NOT NULL,
  `tbl_adminPass` varchar(120) NOT NULL,
  `tbl_adminStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`tbl_adminId`, `tbl_adminName`, `tbl_adminEmail`, `tbl_adminTel`, `tbl_adminAddress`, `tbl_adminUserName`, `tbl_adminPass`, `tbl_adminStatus`) VALUES
(3, 'jacky', 'jacky@gmail.com', '250783974524', 'Huye', 'jacky', '4cc9892bcfcde56e7410487b3e6cf5a3', 1),
(4, 'grace', 'grace@gmail.com', '250723152538', 'Huye', 'grace', 'c69e6682c3e5bc9054f3dc5368780ff4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `tbl_categoryId` int(11) NOT NULL,
  `tbl_categoryName` varchar(40) NOT NULL,
  `tbl_categoryPhoto` varchar(120) NOT NULL,
  `tbl_categoryStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`tbl_categoryId`, `tbl_categoryName`, `tbl_categoryPhoto`, `tbl_categoryStatus`) VALUES
(1, 'Ameza', 'table1.jpg', 1),
(2, 'Intebe', 'table4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `tbl_customerId` int(11) NOT NULL,
  `tbl_customerFname` varchar(60) NOT NULL,
  `tbl_customerLname` varchar(60) NOT NULL,
  `tbl_customerEmail` varchar(60) NOT NULL,
  `tbl_customerTel` varchar(12) NOT NULL,
  `tbl_customerAddress` text NOT NULL,
  `tbl_customerUserName` varchar(40) NOT NULL,
  `tbl_customerPass` varchar(120) NOT NULL,
  `tbl_customerStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`tbl_customerId`, `tbl_customerFname`, `tbl_customerLname`, `tbl_customerEmail`, `tbl_customerTel`, `tbl_customerAddress`, `tbl_customerUserName`, `tbl_customerPass`, `tbl_customerStatus`) VALUES
(2, 'maniraho', 'Fulgence', 'manirahofulgence25@gmail.com', '250726173909', 'Burera', 'maniraho', '0e3a1f951bb6cd1d874a95943c352796', 1),
(3, 'innocent', 'mutuyimana', 'mutuyimana@gmail.com', '250726173909', 'Burera', 'mutuyimana', '032bafbe25a698ebb9713948dc22dc7c', 1),
(4, 'm', 'f', 'f@gmail.com', '250789873533', 'Burera', 'fulgence218005772', '89fb0cca46cc44ccfaaddd50f327e238', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finance`
--

CREATE TABLE `tbl_finance` (
  `tbl_financeId` int(11) NOT NULL,
  `tbl_financeName` varchar(100) NOT NULL,
  `tbl_financeEmail` varchar(100) NOT NULL,
  `tbl_financeTel` varchar(12) NOT NULL,
  `tbl_financeAddress` text NOT NULL,
  `tbl_financeUserName` varchar(60) NOT NULL,
  `tbl_financePass` varchar(120) NOT NULL,
  `tbl_financeStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_finance`
--

INSERT INTO `tbl_finance` (`tbl_financeId`, `tbl_financeName`, `tbl_financeEmail`, `tbl_financeTel`, `tbl_financeAddress`, `tbl_financeUserName`, `tbl_financePass`, `tbl_financeStatus`) VALUES
(1, 'jacky', 'jacky@gmail.com', '250726173909', 'Burera', 'jacky', 'a32e3b03bc8dccc0d78d502b765c490f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hod`
--

CREATE TABLE `tbl_hod` (
  `tbl_hodId` int(11) NOT NULL,
  `tbl_hodName` varchar(100) NOT NULL,
  `tbl_hodEmail` varchar(100) NOT NULL,
  `tbl_hodTel` varchar(12) NOT NULL,
  `tbl_hodAddress` text NOT NULL,
  `tbl_hodUserName` varchar(60) NOT NULL,
  `tbl_hodPass` varchar(120) NOT NULL,
  `tbl_hodStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hod`
--

INSERT INTO `tbl_hod` (`tbl_hodId`, `tbl_hodName`, `tbl_hodEmail`, `tbl_hodTel`, `tbl_hodAddress`, `tbl_hodUserName`, `tbl_hodPass`, `tbl_hodStatus`) VALUES
(1, 'jacky', 'jacky@gmail.com', '250726173909', 'Burera', 'jacky', 'a32e3b03bc8dccc0d78d502b765c490f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `tbl_modelId` int(11) NOT NULL,
  `tbl_modelName` varchar(60) NOT NULL,
  `tbl_modelStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`tbl_modelId`, `tbl_modelName`, `tbl_modelStatus`) VALUES
(1, 'Ibyuma', 1),
(2, 'Wooden', 1),
(3, 'wood', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `tbl_orderId` int(11) NOT NULL,
  `tbl_customerId` int(11) NOT NULL,
  `tbl_productId` int(11) NOT NULL,
  `tbl_orderDate` date NOT NULL,
  `tbl_orderQty` float NOT NULL,
  `tbl_orderAmt` float NOT NULL,
  `tbl_orderStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`tbl_orderId`, `tbl_customerId`, `tbl_productId`, `tbl_orderDate`, `tbl_orderQty`, `tbl_orderAmt`, `tbl_orderStatus`) VALUES
(1, 2, 5, '2021-02-23', 1, 4000, 1),
(2, 3, 2, '2021-02-24', 1, 10000, 1),
(3, 2, 2, '2021-03-07', 2, 10000, 1),
(4, 2, 2, '2021-03-09', 1, 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_order`
--

CREATE TABLE `tbl_paid_order` (
  `tbl_paid_orderId` int(11) NOT NULL,
  `tbl_paymentId` int(11) NOT NULL,
  `tbl_orderId` int(11) NOT NULL,
  `tbl_paid_orderSlip` varchar(120) NOT NULL,
  `tbl_paid_orderStatus` tinyint(1) NOT NULL,
  `tbl_paid_orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paid_order`
--

INSERT INTO `tbl_paid_order` (`tbl_paid_orderId`, `tbl_paymentId`, `tbl_orderId`, `tbl_paid_orderSlip`, `tbl_paid_orderStatus`, `tbl_paid_orderDate`) VALUES
(1, 1, 4, '21558746_692061294325999_8667952727811354881_n.jpg', 1, '2021-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `tbl_paymentId` int(11) NOT NULL,
  `tbl_paymentMethod` varchar(60) NOT NULL,
  `tbl_paymentStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`tbl_paymentId`, `tbl_paymentMethod`, `tbl_paymentStatus`) VALUES
(1, 'Banking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `tbl_productId` int(11) NOT NULL,
  `tbl_productName` varchar(40) NOT NULL,
  `tbl_productPicture` varchar(120) NOT NULL,
  `tbl_productPrice` float NOT NULL,
  `tbl_categoryId` int(11) NOT NULL,
  `tbl_modelId` int(11) NOT NULL,
  `tbl_productQty` float NOT NULL,
  `tbl_productStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`tbl_productId`, `tbl_productName`, `tbl_productPicture`, `tbl_productPrice`, `tbl_categoryId`, `tbl_modelId`, `tbl_productQty`, `tbl_productStatus`) VALUES
(1, 'Chair', 'arm chari.jpg', 10000, 1, 1, 0, 1),
(2, 'Home chair', 'arm3.jpg', 10000, 1, 1, 46, 1),
(3, 'Wooden Chair', 'arm chari.jpg', 10000, 1, 1, 0, 1),
(4, 'Home chair', 'arm3.jpg', 10000, 1, 2, 0, 1),
(5, 'single desk', 'desk.jpg', 4000, 2, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`tbl_adminId`),
  ADD UNIQUE KEY `tbl_adminUserName` (`tbl_adminUserName`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`tbl_categoryId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`tbl_customerId`),
  ADD UNIQUE KEY `tbl_customerUserName` (`tbl_customerUserName`);

--
-- Indexes for table `tbl_finance`
--
ALTER TABLE `tbl_finance`
  ADD PRIMARY KEY (`tbl_financeId`),
  ADD UNIQUE KEY `tbl_financeUserName` (`tbl_financeUserName`);

--
-- Indexes for table `tbl_hod`
--
ALTER TABLE `tbl_hod`
  ADD PRIMARY KEY (`tbl_hodId`),
  ADD UNIQUE KEY `tbl_hodUserName` (`tbl_hodUserName`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`tbl_modelId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`tbl_orderId`),
  ADD KEY `tbl_customerId` (`tbl_customerId`),
  ADD KEY `tbl_productId` (`tbl_productId`);

--
-- Indexes for table `tbl_paid_order`
--
ALTER TABLE `tbl_paid_order`
  ADD PRIMARY KEY (`tbl_paid_orderId`),
  ADD KEY `tbl_paymentId` (`tbl_paymentId`),
  ADD KEY `tbl_orderId` (`tbl_orderId`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`tbl_paymentId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`tbl_productId`),
  ADD KEY `tbl_categoryId` (`tbl_categoryId`),
  ADD KEY `tbl_modelId` (`tbl_modelId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `tbl_adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `tbl_categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `tbl_customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_finance`
--
ALTER TABLE `tbl_finance`
  MODIFY `tbl_financeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hod`
--
ALTER TABLE `tbl_hod`
  MODIFY `tbl_hodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `tbl_modelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `tbl_orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_paid_order`
--
ALTER TABLE `tbl_paid_order`
  MODIFY `tbl_paid_orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `tbl_paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `tbl_productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`tbl_productId`) REFERENCES `tbl_product` (`tbl_productId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`tbl_customerId`) REFERENCES `tbl_customer` (`tbl_customerId`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paid_order`
--
ALTER TABLE `tbl_paid_order`
  ADD CONSTRAINT `tbl_paid_order_ibfk_1` FOREIGN KEY (`tbl_orderId`) REFERENCES `tbl_order` (`tbl_orderId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_paid_order_ibfk_2` FOREIGN KEY (`tbl_paymentId`) REFERENCES `tbl_payment` (`tbl_paymentId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`tbl_modelId`) REFERENCES `tbl_model` (`tbl_modelId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`tbl_categoryId`) REFERENCES `tbl_category` (`tbl_categoryId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
