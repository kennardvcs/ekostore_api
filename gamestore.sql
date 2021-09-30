-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 02:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_type`, `stock`) VALUES
(1, 'Gigabyte GeForce GTX1080Ti (Founder\'s Edition)', 11000000, 'img/gtx1080ti.png', 'GPU', 15),
(2, 'Intel i7-9700K 3.6 GHz Eight-Core LGA 1151 Processor', 4500000, 'img/i7-9700k.jpg', 'Processor', 6),
(3, 'MSI GeForce GTX 1050 Ti GAMING X 4G Graphics Card', 4500000, 'img/msigtx1050.jpg', 'GPU', 3),
(4, 'Gigabyte GeForce GTX 1650 D6 WINDFORCE OC (Rev. 2.0) Graphics Card', 2700000, 'img/gigagtx1650.jpg', 'GPU', 7),
(5, 'Apple Mac Mini M1 Chip (Late 2020)', 11500000, 'img/macminim1.jpg', 'PC', 9),
(6, 'AMD Ryzen 7 5800X 3.8 GHz Eight-Core AM4 Processor', 5800000, 'img/ryzen7-5800x.jpg\r\n', 'Processor', 2),
(7, 'MSI GeForce RTX 3090 GAMING X TRIO 24G Graphics Card', 33500000, 'img/msirtx3090.jpg\r\n', 'GPU', 1),
(8, 'AMD Ryzen 5 5600X 3.7 GHz Six-Core AM4 Processor', 4000000, 'img/ryzen5-5600x.jpg\r\n', 'Processor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `user_password` text NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_address`, `user_phone`) VALUES
(1, 'kennard@sentosa.id', '1234', 'Kennard', 'Sentosa', '', ''),
(3, 'kennard@sentosa.id', '1234', 'Kennard', 'Sentosa', '', ''),
(4, 'abc@gmail.com', '123', 'a', 'b', '', ''),
(5, 'bcd@gmail.com', '1234', 'a', 'b', '', ''),
(6, 'cde@gmail.com', '1234', 'c', 'e', '', ''),
(9, 'efg@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Kennard', 'Sentosa', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
