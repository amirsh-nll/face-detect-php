-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 07:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face_detect`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_face`
--

CREATE TABLE `tbl_face` (
  `id` bigint(20) NOT NULL,
  `face_id` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `timespan` bigint(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_face`
--

INSERT INTO `tbl_face` (`id`, `face_id`, `file`, `gender`, `age`, `timespan`, `description`) VALUES
(1, '4af838e5-ef9c-452e-a369-9c0d71f3d824', '82af432920f9bd7f0ffb93cfbbc15bba.jpg', 'male', 52, 1525016203, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36'),
(2, 'cb866316-a539-4e70-a579-e871416abca1', 'dee7ac22ec373b031f0ce04c95b0191d.jpg', 'female', 23, 1525016225, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36'),
(3, '337e20be-ef92-4030-a30f-89fb52ae0c08', 'bc0556572e188746d35490834e91fe2d.jpg', 'female', 28, 1525016247, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36'),
(4, '656c2f98-7fee-47a0-a748-cc6942aa9a9a', 'b9c3753e37063ae9d0f0786d320c9ba7.png', 'female', 22, 1525016280, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36'),
(5, 'e7f6de2a-e95b-4530-9ee1-dc8d1389a483', 'd8c03d28f06ace0502e8ca1e75df757d.png', 'male', 29, 1525016307, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36'),
(6, '9d5ebd0d-1428-47fc-ace0-6049365c32a8', 'edb978f59122168f807a7bc3b082290e.png', 'female', 31, 1525016335, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_face`
--
ALTER TABLE `tbl_face`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_face`
--
ALTER TABLE `tbl_face`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
