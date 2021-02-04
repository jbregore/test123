-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 03:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hghmnds`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`) VALUES
('hghmnds69', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `prod_id` varchar(100) NOT NULL,
  `prod_brand` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_category` varchar(100) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_id`, `user_username`, `prod_id`, `prod_brand`, `prod_name`, `prod_category`, `prod_price`, `prod_qty`, `prod_photo`) VALUES
(160, '60100e06440625.06887089', 'hakhakhak', '6005769ee4f953.47940559', 'hghmnds', 'HGHMNDS WPLK1', 't-shirt', 720, 1, 'http://localhost/test_hghmnds/backend/uploads/6005769ee38736.47959425.jpg'),
(161, '60100e06440625.06887089', 'hakhakhak', '600f068393b2c2.73295257', 'kalmado', 'KALMADO SNDCSTL EDITION', 'hoodie', 750, 2, 'http://localhost/test_hghmnds/backend/uploads/6010006136c3e8.40074877.jpg'),
(162, '60100e06440625.06887089', 'hakhakhak', '600eff30ed97f0.34434071', 'hghmnds', 'HGHMNDS BLTBAG GREEN', 'other', 400, 1, 'http://localhost/test_hghmnds/backend/uploads/600eff30e99543.54655326.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `star` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `user_username`, `star`, `message`) VALUES
(1, 'jbkalamuga', '4', 'gago'),
(8, 'jbkalamuga', '5', 'kupal'),
(9, 'jbkalamuga', '1', 'TARANTADO'),
(11, 'hartpatpat', '5', 'chingchong kwayla');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` varchar(100) NOT NULL,
  `prod_brand` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_category` varchar(100) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_datein` date NOT NULL,
  `prod_status` varchar(100) NOT NULL,
  `prod_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_brand`, `prod_name`, `prod_category`, `prod_price`, `prod_qty`, `prod_datein`, `prod_status`, `prod_photo`) VALUES
('600575df3f0066.56404610', 'hghmnds', 'HGHMNDS BPLN2', 't-shirt', 720, 3, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/600575df1d7900.68973741.jpg'),
('60057601c63dc6.06992698', 'hghmnds', 'HGHMNDS WPLN1', 't-shirt', 720, 8, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/60057601beff65.79637547.jpg'),
('6005764cbab554.24072831', 'hghmnds', 'HGHMNDS BPLK2', 't-shirt', 720, 8, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/6005764cb70240.24739430.jpg'),
('6005769ee4f953.47940559', 'hghmnds', 'HGHMNDS WPLK1', 't-shirt', 720, 6, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/6005769ee38736.47959425.jpg'),
('600576b7338a69.91251850', 'kalmado', 'KALMADO BLPKN5', 't-shirt', 700, 8, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/600576b72fae45.50244761.jpg'),
('600576e1500125.22256485', 'kalmado', 'KALMADO BPLW2', 't-shirt', 700, 10, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/600576e140d4c3.09663092.jpg'),
('600576f71df3a6.46685799', 'kalmado', 'KALMADO RPLN4', 't-shirt', 700, 9, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/600576f71a0a31.30683764.jpg'),
('6005770673a215.04138756', 'kalmado', 'KALMADO NPLK3', 't-shirt', 700, 10, '2021-01-18', 'available', 'http://localhost/test_hghmnds/backend/uploads/600577066fcbc9.70548252.jpg'),
('600efb22b96e41.37535413', 'kalmado', 'KALMADO BNT v2.0', 'other', 300, 7, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600efb228b2f38.11104209.jpg'),
('600efe3ab5dd48.61297918', 'kalmado', 'KALMADO WWY CAP 2.0', 'other', 250, 8, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600efe3ab1a3e8.72981858.jpg'),
('600eff30ed97f0.34434071', 'hghmnds', 'HGHMNDS BLTBAG GREEN', 'other', 400, 9, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600eff30e99543.54655326.jpg'),
('600f0002bcae12.13094066', 'hghmnds', 'HGHMNDS BLTBAG MCHA', 'other', 400, 7, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f0002b8e534.73611694.jpg'),
('600f00dcb6f9a6.49286232', 'hghmnds', 'HGHMNDS BLCKCAP ', 'other', 350, 8, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f00dcafe4f4.63077215.jpg'),
('600f01e2057dd1.74259998', 'hghmnds', 'HGHMNDS VMPRREDCAP', 'other', 350, 9, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f01e2015140.13489768.jpg'),
('600f030849d731.69571315', 'hghmnds', 'HGHMNDS CRVECAP', 'other', 450, 9, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f0308459f18.01816225.jpg'),
('600f0372cdbba2.57856878', 'hghmnds', 'HGHMNDS LIMITEDBCKPCK ', 'other', 750, 9, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f0372c9db06.44394302.jpg'),
('600f050e7b0df0.57641016', 'hghmnds', 'KALMADO WLD RED HOODIE', 'hoodie', 800, 4, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f050e772c30.57159845.jpg'),
('600f05aa20ba77.30981265', 'kalmado', 'KALMADO WTR BLUE HOODIE', 'hoodie', 750, 9, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f05aa1c8df0.08017407.jpg'),
('600f05efb25164.94841367', 'kalmado', 'KALMADO FLWR EDITION', 'hoodie', 750, 7, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/600f05efae4d19.88476526.jpg'),
('600f068393b2c2.73295257', 'kalmado', 'KALMADO SNDCSTL EDITION', 'hoodie', 750, 9, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/6010006136c3e8.40074877.jpg'),
('6010057d0fb1f2.58126176', 'hghmnds', 'HGHMNDS HEADBAND', 'other', 150, 8, '2021-01-26', 'available', 'http://localhost/test_hghmnds/backend/uploads/6010057d08a0e2.54323672.jpg'),
('6018be34eb4a18.05906227', 'hghmnds', 'tarahutil', 't-shirt', 750, 9, '2021-02-02', 'available', 'http://localhost/test_hghmnds/backend/uploads/6018be3496b203.19416391.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `trans_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `paypal_name` varchar(100) NOT NULL,
  `paypal_address` varchar(100) NOT NULL,
  `total_prod` text NOT NULL,
  `total_item` int(11) NOT NULL,
  `trans_date` varchar(100) NOT NULL,
  `trans_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`trans_id`, `user_id`, `paypal_name`, `paypal_address`, `total_prod`, `total_item`, `trans_date`, `trans_total`) VALUES
(1, '6002f6518b9f36.85514449', 'John Doe', 'US', 'KALMADO BLPKN5,HGHMNDS BPLK2,KALMADO RPLN4,', 4, '2021-01-22T04:06:05Z', 2840),
(39, '6002f6518b9f36.85514449', 'John Patrick Martinez', 'C2', 'KALMADO WTR BLUE HOODIE,', 1, '2021-01-26T12:10:11Z', 750),
(41, '6002f6518b9f36.85514449', 'John Patrick Martinez', 'C2', 'HGHMNDS BLCKCAP ,HGHMNDS BLTBAG MCHA,tarahutil,HGHMNDS BPLK2,HGHMNDS BPLN2,HGHMNDS WPLK1,KALMADO BLPKN5,', 7, '2021-02-04T13:55:47Z', 4360);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_username`, `user_password`, `user_status`) VALUES
('6002f6518b9f36.85514449', 'jbkalamuga', '11111111', 'Active'),
('6003d90f24bfd7.27788962', 'kosa9641', '11111111', 'Active'),
('600c52bf60f7e3.35867096', 'patpatss', 'martinez', 'Active'),
('600efcef404447.97462222', 'hartpatpat', '123456789', 'Active'),
('600efd481d6bc3.41626395', 'asdasdasd', '1234567890', 'Active'),
('60100e06440625.06887089', 'hakhakhak', '12345678', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
