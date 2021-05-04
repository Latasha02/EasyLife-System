-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 08:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productName` varchar(60) NOT NULL,
  `productPrice` float NOT NULL,
  `productQuantity` int(20) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(20) NOT NULL,
  `customerName` varchar(60) CHARACTER SET latin1 NOT NULL,
  `customerGender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `customerEmail` varchar(60) CHARACTER SET latin1 NOT NULL,
  `customerTelNumber` int(15) NOT NULL,
  `customerAddress` varchar(160) CHARACTER SET latin1 NOT NULL,
  `customerPassword` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custorder`
--

CREATE TABLE `custorder` (
  `orderID` int(20) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `phoneNo` int(200) NOT NULL,
  `address` varchar(200) CHARACTER SET latin1 NOT NULL,
  `orderStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custorder`
--

INSERT INTO `custorder` (`orderID`, `name`, `phoneNo`, `address`, `orderStatus`) VALUES
(212, 'Yoonhong', 183781998, 'Taman mewah 2', 2),
(213, 'Leyming', 186664941, '17-11-15, Lintang Paya Terubong 1', 2),
(214, 'Ivy ', 174896406, 'Taman Segar', 2),
(215, 'LATASHA A/P JAYAGANESAN', 189744128, 'MAILING', 2),
(216, 'grfeacsx', 189744128, 'MAILING', 1),
(220, 'acdvwbtenyui', 189744128, 'MAILING', 2),
(221, 'LATASHA ', 189744128, 'Air Panas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(20) NOT NULL,
  `foodName` varchar(60) NOT NULL,
  `foodPrice` float NOT NULL,
  `foodType` varchar(60) NOT NULL,
  `foodDetail` varchar(100) NOT NULL,
  `foodQuantity` int(20) NOT NULL,
  `foodPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodPrice`, `foodType`, `foodDetail`, `foodQuantity`, `foodPic`) VALUES
(27, 'Koko Krunch', 8.9, 'Clothes', 'NESTLÉ KOKO KRUNCH is a delicious cereal with a rich chocolate taste that kids love. Made with the g', 41, 'kokocrunch.png'),
(32, 'Marie Biscuit', 6.3, 'Dry food', 'Delicious marie Bisvuit', 45, 'biscuit.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phoneNo` int(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `orderStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `name`, `phoneNo`, `address`, `orderStatus`) VALUES
(212, 'yoonhong', 183781998, 'Taman mewah 2', 2),
(219, 'LATASHA A/P JAYAGANESAN', 189744128, 'MAILING', 0),
(220, 'LATASHA A/P JAYAGANESAN', 189744128, 'MAILING', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `orderID` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petproduct`
--

CREATE TABLE `petproduct` (
  `petproductID` int(20) NOT NULL,
  `petproductName` varchar(250) NOT NULL,
  `petproductPrice` float NOT NULL,
  `petproductType` varchar(60) NOT NULL,
  `petproductDetail` varchar(250) NOT NULL,
  `petproductQuantity` int(20) NOT NULL,
  `petproductPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petproduct`
--

INSERT INTO `petproduct` (`petproductID`, `petproductName`, `petproductPrice`, `petproductType`, `petproductDetail`, `petproductQuantity`, `petproductPic`) VALUES
(5, 'Dog Food', 12, 'Food', 'Healthy food for Dog(Dry Food)', 70, 'download (2).jfif'),
(7, 'Dog toys rope', 7, 'Wet petproduct', 'Great toy to play with', 70, 'download (4).jfif'),
(10, 'Bird cage', 12, 'Wet petproduct', '12x13x14', 20, 'bird cage.jfif'),
(11, 'Bird Food', 12, 'Dry petproduct', 'Feed bird', 80, 'bird food.jfif'),
(12, 'Dog ball ', 3, 'Wet petproduct', 'Happy ball to play', 42, 'bals.jfif'),
(13, 'Dog cage', 46, 'Cage', 'Cage for Dog(large)', 15, 'dog cage.jfif'),
(14, 'Cat shampoo', 12, 'Wet petproduct', 'Good for dry skin cat', 12, 'cat shampoo.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `PharmacyID` varchar(10) NOT NULL,
  `PharmacyName` varchar(100) NOT NULL,
  `PharmacyAddress` varchar(50) NOT NULL,
  `PharmacyProductID` varchar(5) NOT NULL,
  `ServicesID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`PharmacyID`, `PharmacyName`, `PharmacyAddress`, `PharmacyProductID`, `ServicesID`) VALUES
('P1000', 'Pharmacy Caring', 'Kuala Selangor', 'PP100', 'S100'),
('P1001', 'Pharmacy PMG', 'Kota Bharu', 'PP101', 'S100'),
('P1002', 'Pharmacy Big', 'Kota Bharu', 'PP102', 'S100'),
('P1004', 'Pharmacy Ting', 'Kuala Krai', 'PP103', 'S100');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacyproduct`
--

CREATE TABLE `pharmacyproduct` (
  `PharmacyProductID` varchar(50) NOT NULL,
  `PharmacyProductName` varchar(50) NOT NULL,
  `PharmacyProductQuantity` int(11) NOT NULL,
  `PharmacyProductDetails` varchar(50) NOT NULL,
  `PharmacyID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacyproduct`
--

INSERT INTO `pharmacyproduct` (`PharmacyProductID`, `PharmacyProductName`, `PharmacyProductQuantity`, `PharmacyProductDetails`, `PharmacyID`) VALUES
('PP100', 'BANDAGE', 10, 'This elastic bandage is a strong self-adherent tap', 'P100'),
('PP101', 'STERILE', 10, 'Sterile Water for Irrigation contains water that i', 'P1001'),
('PP102', 'IODIN', 5, 'Disinfects and is an antiseptic for wounds.', '20'),
('PP104', 'SCAR REMOVER', 10, 'Mederma helps to visibly reduce scarring. Mederma ', '10'),
('PP102', 'IODIN', 10, 'Disinfects and is an antiseptic for wounds.', 'P1002'),
('PP104', 'SCAR REMOVER', 5, 'Mederma helps to visibly reduce scarring. Mederma ', 'P1004');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacyservice`
--

CREATE TABLE `pharmacyservice` (
  `PharmacyOrderID` varchar(5) NOT NULL,
  `PharmacyID` varchar(30) NOT NULL,
  `PharmacyProductID` varchar(5) NOT NULL,
  `ServicesID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacyservice`
--

INSERT INTO `pharmacyservice` (`PharmacyOrderID`, `PharmacyID`, `PharmacyProductID`, `ServicesID`) VALUES
('O1111', 'P1000', 'PP100', 'S100'),
('O1112', 'P1001', 'PP101', 'S100'),
('O1113', 'P1002', 'PP102', 'S100'),
('01114', 'P1004', 'PP103', 'S100');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(20) NOT NULL,
  `prodName` varchar(60) NOT NULL,
  `prodType` varchar(60) NOT NULL,
  `prodPrice` float NOT NULL,
  `prodDetail` varchar(100) NOT NULL,
  `prodQuantity` int(20) NOT NULL,
  `fileIn2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `prodName`, `prodType`, `prodPrice`, `prodDetail`, `prodQuantity`, `fileIn2`) VALUES
(21, 'Bottle', 'Household', 22, 'Sweet Mint Insulated Stainless Steel Water Bottle', 6, 'bottle.jpg'),
(22, 'Umbrella ', 'Household', 8, 'Green Umbrella with UV light protection', 50, '5a2c1481-8bc0-48d4-8867-603bb5817be0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runnerID` int(20) NOT NULL,
  `runnerName` varchar(60) NOT NULL,
  `runnerGender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `runnerEmail` varchar(60) NOT NULL,
  `runnerTelNumber` int(15) NOT NULL,
  `runnerAddress` varchar(160) CHARACTER SET latin1 NOT NULL,
  `runnerPassword` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `serProID` int(20) NOT NULL,
  `serProName` varchar(60) CHARACTER SET latin1 NOT NULL,
  `serProGender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `serProEmail` varchar(60) CHARACTER SET latin1 NOT NULL,
  `serProTelNumber` int(15) NOT NULL,
  `serProAddress` varchar(160) CHARACTER SET latin1 NOT NULL,
  `serProPassword` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackingID` int(20) NOT NULL,
  `date` date NOT NULL,
  `trackStatus` varchar(50) CHARACTER SET latin1 NOT NULL,
  `trackRemarks` varchar(200) CHARACTER SET latin1 NOT NULL,
  `customerID` int(20) NOT NULL,
  `runnerID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`trackingID`, `date`, `trackStatus`, `trackRemarks`, `customerID`, `runnerID`) VALUES
(1, '2020-07-13', 'PROCESSING', 'Please waiting', 1, 1),
(2, '2020-07-12', 'DELIVERING', 'ON THE WAY.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(20) NOT NULL,
  `userType` varchar(60) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userName` varchar(60) NOT NULL,
  `userPassword` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userType`, `userEmail`, `userName`, `userPassword`) VALUES
(1, 'customer', 'yoonhong35@gmail.com', 'yoonhong', '$2y$10$oaqDduWlJ4dcWDp.lQ56dOTbcYZwlpWJz84EbCZjFtLR8SR71Dm4y'),
(2, 'customer', 'yoonhong1@gmail.com', 'yoonhong1', '$2y$10$5Vqrg/PYej4joguEu6KdwOVqKmGvDlrrtbydEJLlmFIVytCC6CbDe'),
(3, 'customer', 'yoo12@gmail.com', 'yoonhong123', '$2y$10$clHwSw9aXieMR/aij63u0.q3hw4.BhVBZ2DobggddjuVisd6eE3Ja'),
(4, 'serPro', 'yoonhong1@gmail.com', 'yoon', '$2y$10$jOm0xrvvRFkIDj9ohaVwcegz7XzYFZMHDU.CuNGYfUR2mysaQL546'),
(5, 'runner', 'yoonhong3@gmail.com', '1111', '$2y$10$ZP5WFNVq1vl2DEGAb7fO6uuwA6kqh5TEbQC9UHV.PfngnfIPLlqSK'),
(6, 'customer', '123@gmail.com', '123', '$2y$10$rvHE4GyM26cemDmafr/hG.OIOH/2aq3A2Bvk1ebn1ohxlA8c0N4tm'),
(7, 'customer', '1234@gmail.com', '1234', '$2y$10$2Vb3eN1KAWVp184s6mzQreFAoz.GawKuG6Ej/83g0ys3AZRSlh34m'),
(8, 'serPro', 'yoonhong2@gmail.com', 'yoonhong2', '$2y$10$uKTF.tr1.ZwtkzyOkCLfNejkmATAyzhsz2S6T8D0ouWPJCz35iy1q'),
(9, 'customer', '123123123@g.vom', '123123123', '$2y$10$AqksKef/WYMSm3zFaqbXBOmC0bRscL.TLSRiEzYKFb.pcHeY8D18e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `custorder`
--
ALTER TABLE `custorder`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `petproduct`
--
ALTER TABLE `petproduct`
  ADD PRIMARY KEY (`petproductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runnerID`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`serProID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `custorder`
--
ALTER TABLE `custorder`
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `petproduct`
--
ALTER TABLE `petproduct`
  MODIFY `petproductID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runnerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `serProID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `trackingID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
