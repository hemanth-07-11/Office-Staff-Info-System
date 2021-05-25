-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 02:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `date_of_signing` varchar(20) DEFAULT NULL,
  `type_of_partnership` varchar(10) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `revenue` varchar(20) DEFAULT NULL,
  `staff_id` varchar(20) DEFAULT NULL,
  `date_of_expiry` varchar(20) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `date_of_signing`, `type_of_partnership`, `mobileno`, `revenue`, `staff_id`, `date_of_expiry`, `amount`) VALUES
('M1', 'DST', '18/08/2001', 'RESEARCH', '9805558795', 'RandD', 'T1', '18/08/2021 ', 55120),
('M2', 'MHRD', '01/06/2001', 'RESEARCH', '9382114521', 'RandD', 'T1', '06/12/2022', 100500),
('M3', 'UGC', '07/11/2001', 'RESEARCH', '7845632369', 'RandD', 'T3', '01/01/2022', 100100),
('M4', 'TNEB', '05/12/2006', 'RESEARCH', '9863214585', 'Consultancy', 'T4', '18/03/2021', 99500),
('M5', 'BHEL', '24/06/2009', 'RESEARCH', '9585126000', 'Consultancy', 'T5', '18/09/2024', 84520),
('M6', 'MHRD', '23/01/2011', 'RESEARCH', '9792463158', 'Patent', 'T3', '23/11/2022', 74520),
('M7', 'UGC', '22/07/2016', 'RESEARCH', '9890472146', 'Patent', 'T4', '08/10/2022', 90100),
('M8', 'DAST', '20/11/2019', 'RESEARCH', '6383759256', 'Patent', 'T5', '07/09/2021', 64520);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `revenue` varchar(20) NOT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `section_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`revenue`, `amount`, `section_id`) VALUES
('Consultancy', '178800', 'SEC8'),
('Patent', '152400', 'SEC8'),
('RandD', '255100', 'SEC1');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` varchar(20) NOT NULL,
  `section_name` varchar(30) NOT NULL,
  `intercom_no` varchar(150) NOT NULL,
  `type_of_section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `intercom_no`, `type_of_section`) VALUES
('SEC1', 'PR10', '7049', 'ESTABLISHMENT'),
('SEC10', 'ADM', '8051', 'ADMISSION'),
('SEC2', 'PR20', '7051', 'ESTABLISHMENT'),
('SEC3', 'FA10', '7085', 'SALARY'),
('SEC4', 'FA20', '7087', 'SALARY'),
('SEC5', 'PP', '7065', 'PURCHASE'),
('SEC6', 'FA70', '789', 'PENSION'),
('SEC7', 'FA30', '7035', 'FINANCE'),
('SEC8', 'CFR', '7368', 'RESEARCH'),
('SEC9', 'CAI', '7099', 'AFFILIATION');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(20) NOT NULL,
  `staff_name` varchar(20) DEFAULT NULL,
  `designation` varchar(10) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `revenue` varchar(20) DEFAULT NULL,
  `section_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `designation`, `mobileno`, `revenue`, `section_name`) VALUES
('T1', 'Hemanth', 'Director', '9080556241', 'RandD', 'CFR'),
('T10', 'MOR', 'Assistant', '9585126001', 'RandD', 'ADM'),
('T2', 'NandaKumar', 'Supdt', '9790465874', 'Consultancy', 'FA30'),
('T3', 'Balaji', 'Assistant', '9441565423', 'Patent', 'CAI'),
('T4', 'Saravanan', 'Assistant', '9550063789', 'Patent', 'ADM'),
('T5', 'Shankar', 'Jnr_Asst', '6389259654', 'Consultancy', 'PR10'),
('T6', 'Ramasamy', 'Typist', '7845632147', 'RandD', 'FA70'),
('T7', 'Sekar', 'Assistant', '9070856478', 'Patent', 'FA30'),
('T8', 'ABC', 'Jnr_Asst', '9952536145', 'Consultancy', 'FA30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `pay_id` (`revenue`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`revenue`),
  ADD KEY `gym_id` (`section_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `pay_id` (`revenue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`revenue`) REFERENCES `payment` (`revenue`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`revenue`) REFERENCES `payment` (`revenue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
