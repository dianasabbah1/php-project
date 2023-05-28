-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 03:09 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bNo` int(11) NOT NULL,
  `titel` varchar(20) NOT NULL,
  `autherName` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `copies` int(11) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'book.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bNo`, `titel`, `autherName`, `category`, `copies`, `img`) VALUES
(5, 'PHP', 'Ana', 'Programming', 1, 'php.jpg'),
(777, 'Java Programming', 'Khaled', 'Programming', 7, 'java.jpeg'),
(2210, 'Network Lan', 'Khaled', 'Networks', 18, 'book.jpg'),
(2231, 'MySql', 'Me', 'Programming', 19, 'book.jpg'),
(3321, 'Requerment', 'KHaled', 'Software Engineering', 9, 'book.jpg'),
(32221, 'Graphics 2D', 'Nasser', 'Graphics', 3, 'graphics.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `bNo` int(11) NOT NULL,
  `date` date NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `bNo`, `date`, `accepted`) VALUES
(2, 2231, '2017-04-24', 0),
(12, 5, '2017-04-24', 1),
(12, 777, '2017-04-24', 1),
(1, 2231, '2017-04-24', 1),
(1, 3321, '2017-04-25', 1),
(1, 5, '2017-04-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(20) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `dob`) VALUES
(1, 'Khaled', 'khaled2017@gmail.com', '111222333', '1966-10-28' ),
(2, 'Awni', 'awni@gmail.com', '222111', '2017-04-12' ),
(11, 'Abu Majed', 'abumajed@hotmail.com', '102030', '2017-05-18'),
(12, 'khaled', 'kha@gmail.com', '1-2-3-4', '0000-00-00'),
(13, 'Abu Majed', 'mhmd@gmail.com', '10203040', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bNo`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `id` (`id`,`bNo`),
  ADD KEY `borrow_ibfk_1` (`bNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`bNo`) REFERENCES `book` (`bNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
