-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 06:00 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `account_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `account_added`) VALUES
(1, 'admin', '123456', 'John', 'Doe', '2018-02-21 10:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `costumer_tbl`
--

CREATE TABLE `costumer_tbl` (
  `cos_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `costumer_img` text NOT NULL,
  `account_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer_tbl`
--

INSERT INTO `costumer_tbl` (`cos_id`, `email`, `password`, `firstname`, `lastname`, `gender`, `address`, `costumer_img`, `account_created`) VALUES
(1, 'bendoe@email.com', '123456', 'Ben', 'Doe', 'Male', 'California, USA', 'uploads/niall.png', '2018-02-20 11:15:33'),
(2, 'juandelacruz@email.com', '123456', 'Juan', 'Dela Cruz', 'Male', 'Tondo, Manila', 'uploads/default.png', '2018-02-24 23:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `res_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `cos_id` int(11) NOT NULL,
  `check_in` varchar(100) NOT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_payment` varchar(100) NOT NULL,
  `res_remarks` text NOT NULL,
  `res_status` varchar(100) NOT NULL,
  `res_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`res_id`, `room_id`, `cos_id`, `check_in`, `check_out`, `total_payment`, `res_remarks`, `res_status`, `res_added`) VALUES
(1, 1, 5, '2018-08-25', '2018-08-27', '7000', 'Kwaon ko ni bwas.', 'On Use', '2018-08-25 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `room_tbl`
--

CREATE TABLE `room_tbl` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_description` text NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `room_capacity` varchar(100) NOT NULL,
  `room_price` varchar(100) NOT NULL,
  `room_status` varchar(100) NOT NULL,
  `room_photo` text NOT NULL,
  `room_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_tbl`
--

INSERT INTO `room_tbl` (`room_id`, `room_name`, `room_description`, `room_type`, `room_capacity`, `room_price`, `room_status`, `room_photo`, `room_added`) VALUES
(1, 'Room 100', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n ', 'Classic', '2 Persons', '3500', 'On Use', '../uploads/1.jpeg', '2018-02-21 11:54:35'),
(2, 'Room 101', 'A horizontal form means that the labels are aligned next to the input field.', 'Classic', '2 Persons', '3500', 'Available', '../uploads/andrey-andreyev-331255.jpg', '2018-02-21 12:49:48'),
(3, 'Room 102', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 'Classic', '2 Persons', '3500', 'Available', '../uploads/anonymous-wallpaper-images-8.jpg', '2018-02-22 01:27:12'),
(5, 'Room 103', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 'Classic', '2 Persons', '3500', 'Available', '../uploads/delicate-arch-night-stars-landscape.jpg', '2018-02-22 02:36:21'),
(6, 'Room 104', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', 'Classic', '2 Persons', '3500', 'Available', '../uploads/domenico-loia-272251.jpg', '2018-02-22 02:36:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `costumer_tbl`
--
ALTER TABLE `costumer_tbl`
  ADD PRIMARY KEY (`cos_id`);

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `room_tbl`
--
ALTER TABLE `room_tbl`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `costumer_tbl`
--
ALTER TABLE `costumer_tbl`
  MODIFY `cos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `room_tbl`
--
ALTER TABLE `room_tbl`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
