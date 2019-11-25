-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2019 at 04:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martdevelopers_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `ams_admin`
--

CREATE TABLE `ams_admin` (
  `a_id` int(20) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL,
  `a_dpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_admin`
--

INSERT INTO `ams_admin` (`a_id`, `a_name`, `a_email`, `a_pwd`, `a_dpic`) VALUES
(1, 'System Admin', 'sysadmin@ams.com', 'admin', 'Class Management.png');

-- --------------------------------------------------------

--
-- Table structure for table `ams_client`
--

CREATE TABLE `ams_client` (
  `c_id` int(20) NOT NULL,
  `c_fname` varchar(200) NOT NULL,
  `c_mname` varchar(200) NOT NULL,
  `c_lname` varchar(200) NOT NULL,
  `c_phoneno` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_sex` varchar(200) NOT NULL,
  `c_addr` varchar(200) NOT NULL,
  `c_preff_date` varchar(200) NOT NULL,
  `c_speciality` varchar(200) NOT NULL,
  `c_pwd` varchar(20) NOT NULL,
  `c_dpic` varchar(20) NOT NULL,
  `c_appoint_stats` varchar(200) NOT NULL,
  `c_app_speciality` varchar(200) NOT NULL,
  `c_notification` text NOT NULL,
  `c_reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_client`
--

INSERT INTO `ams_client` (`c_id`, `c_fname`, `c_mname`, `c_lname`, `c_phoneno`, `c_email`, `c_sex`, `c_addr`, `c_preff_date`, `c_speciality`, `c_pwd`, `c_dpic`, `c_appoint_stats`, `c_app_speciality`, `c_notification`, `c_reply`) VALUES
(1, 'Demo', 'H', 'Client', '072734567', 'democlient@tms.com', 'Male', '127001 Localhost', '2019-12-04', 'Tom Hastings ', 'DemoClient', 'Ajira Digital-2.jpg', 'Approved', 'Organ Transplant', 'Hi there ', 'Hey Thanks for conducting us');

-- --------------------------------------------------------

--
-- Table structure for table `ams_doc`
--

CREATE TABLE `ams_doc` (
  `doc_id` int(20) NOT NULL,
  `doc_fname` varchar(200) NOT NULL,
  `doc_lname` varchar(200) NOT NULL,
  `doc_phone` varchar(200) NOT NULL,
  `doc_addr` varchar(200) NOT NULL,
  `doc_dept` varchar(200) NOT NULL,
  `doc_status` varchar(200) NOT NULL,
  `doc_email` varchar(200) NOT NULL,
  `doc_pwd` varchar(200) NOT NULL,
  `doc_dpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_doc`
--

INSERT INTO `ams_doc` (`doc_id`, `doc_fname`, `doc_lname`, `doc_phone`, `doc_addr`, `doc_dept`, `doc_status`, `doc_email`, `doc_pwd`, `doc_dpic`) VALUES
(2, 'Tom', 'Hastings', '0704031263', '127001 Localhost', 'Organ Transplant', 'Available', 'demodoc@tms.com', 'demodoc', '');

-- --------------------------------------------------------

--
-- Table structure for table `ams_secretary`
--

CREATE TABLE `ams_secretary` (
  `s_id` int(20) NOT NULL,
  `s_fname` varchar(200) NOT NULL,
  `s_lname` varchar(200) NOT NULL,
  `s_phone` varchar(200) NOT NULL,
  `s_addr` varchar(200) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_pwd` varchar(200) NOT NULL,
  `s_dpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_secretary`
--

INSERT INTO `ams_secretary` (`s_id`, `s_fname`, `s_lname`, `s_phone`, `s_addr`, `s_email`, `s_pwd`, `s_dpic`) VALUES
(1, 'Tom', 'Hasting', '1234567890', '127001 Localhost', 'demosec@tms.com', 'demosec', 'IMG-20190925-WA0020.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ams_speciality`
--

CREATE TABLE `ams_speciality` (
  `s_id` int(200) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_doc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_speciality`
--

INSERT INTO `ams_speciality` (`s_id`, `s_name`, `s_doc`) VALUES
(1, 'Allergic Clinic', ''),
(2, 'Cardiac Clinic', ''),
(3, 'Dental Clinic', ''),
(4, 'Surgical Clinic', ''),
(5, 'Organ Transplant', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ams_admin`
--
ALTER TABLE `ams_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `ams_client`
--
ALTER TABLE `ams_client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ams_doc`
--
ALTER TABLE `ams_doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `ams_secretary`
--
ALTER TABLE `ams_secretary`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `ams_speciality`
--
ALTER TABLE `ams_speciality`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ams_admin`
--
ALTER TABLE `ams_admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ams_client`
--
ALTER TABLE `ams_client`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ams_doc`
--
ALTER TABLE `ams_doc`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ams_secretary`
--
ALTER TABLE `ams_secretary`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ams_speciality`
--
ALTER TABLE `ams_speciality`
  MODIFY `s_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
