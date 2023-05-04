-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 07:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CID` int(11) NOT NULL,
  `From_UID` varchar(10) NOT NULL,
  `From_PID` int(11) NOT NULL,
  `From_CID` int(11) DEFAULT NULL,
  `Text` varchar(50) NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CID`, `From_UID`, `From_PID`, `From_CID`, `Text`, `Likes`) VALUES
(1, 'shafin', 1, NULL, 'You an xmen?', 2),
(2, 'xavier', 1, NULL, 'I do use axe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `FID` int(11) NOT NULL,
  `From_UID` varchar(10) NOT NULL,
  `To_UID` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`FID`, `From_UID`, `To_UID`, `Status`) VALUES
(1, 'shafin', 'shafin', 'Accepted'),
(2, 'xavier', 'xavier', 'Accepted'),
(3, 'xavier', 'shafin', 'Accepted'),
(4, 'shafin', 'xavier', 'Accepted'),
(5, 'robindbank', 'robindbank', 'Accepted'),
(6, 'aryastark', 'aryastark', 'Accepted'),
(7, 'natasha', 'natasha', 'Accepted'),
(8, 'ishti', 'ishti', 'Accepted'),
(9, 'tauhid', 'tauhid', 'Accepted'),
(10, 'tamanna', 'tamanna', 'Accepted'),
(11, 'prateeti', 'prateeti', 'Accepted'),
(12, 'prateeti', 'shafin', 'Accepted'),
(13, 'shafin', 'prateeti', 'Accepted'),
(14, 'prateeti', 'tauhid', 'Accepted'),
(15, 'tauhid', 'prateeti', 'Accepted'),
(16, 'prateeti', 'ishti', 'Accepted'),
(17, 'ishti', 'prateeti', 'Accepted'),
(18, 'prateeti', 'tamanna', 'Accepted'),
(19, 'tamanna', 'prateeti', 'Accepted'),
(20, 'prateeti', 'xavier', 'Accepted'),
(21, 'xavier', 'prateeti', 'Accepted'),
(22, 'tauhid', 'shafin', 'Accepted'),
(23, 'shafin', 'tauhid', 'Accepted'),
(24, 'tauhid', 'tamanna', 'Accepted'),
(25, 'tamanna', 'tauhid', 'Accepted'),
(26, 'tauhid', 'ishti', 'Accepted'),
(27, 'ishti', 'tauhid', 'Accepted'),
(28, 'ishti', 'shafin', 'Accepted'),
(29, 'shafin', 'ishti', 'Accepted'),
(30, 'ishti', 'tamanna', 'Accepted'),
(31, 'tamanna', 'ishti', 'Accepted'),
(32, 'tamanna', 'shafin', 'Accepted'),
(33, 'shafin', 'tamanna', 'Accepted'),
(34, 'tamanna', 'xavier', 'Sent'),
(35, 'xavier', 'tamanna', 'Received'),
(36, 'shafin', 'robindbanc', 'Sent'),
(37, 'robindbanc', 'shafin', 'Received'),
(38, 'shafin', 'natasha', 'Rejected'),
(39, 'natasha', 'shafin', 'Rejected'),
(40, 'natasha', 'xavier', 'Accepted'),
(41, 'xavier', 'natasha', 'Accepted'),
(42, 'natasha', 'aryastark', 'Accepted'),
(43, 'aryastark', 'natasha', 'Accepted'),
(44, 'natasha', 'robindbanc', 'Sent'),
(45, 'robindbanc', 'natasha', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MID` int(11) NOT NULL,
  `From_UID` varchar(10) NOT NULL,
  `To_UID` varchar(10) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Text` varchar(100) NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MID`, `From_UID`, `To_UID`, `Subject`, `Text`, `Likes`) VALUES
(1, 'xavier', 'shafin', 'I am Human too', 'It hurts', 0),
(2, 'shafin', 'xavier', 'Sorry', 'Thought you were just a fictional character', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NID` int(11) NOT NULL,
  `From_UID` varchar(10) NOT NULL,
  `To_UID` varchar(10) NOT NULL,
  `About` varchar(50) NOT NULL,
  `Transpired` datetime NOT NULL,
  `Seen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`NID`, `From_UID`, `To_UID`, `About`, `Transpired`, `Seen`) VALUES
(1, 'xavier', 'shafin', ' sent you a Friend Request', '2020-12-20 17:02:31', 'Old'),
(2, 'prateeti', 'shafin', ' sent you a Friend Request', '2020-12-20 18:27:47', 'Old'),
(3, 'prateeti', 'tauhid', ' sent you a Friend Request', '2020-12-20 18:28:10', 'New'),
(4, 'prateeti', 'ishti', ' sent you a Friend Request', '2020-12-20 18:28:14', 'New'),
(5, 'prateeti', 'tamanna', ' sent you a Friend Request', '2020-12-20 18:28:33', 'New'),
(6, 'prateeti', 'xavier', ' sent you a Friend Request', '2020-12-20 18:29:17', 'Old'),
(7, 'xavier', 'prateeti', ' accepted your Friend Request', '2020-12-20 18:30:12', 'New'),
(8, 'shafin', 'xavier', ' accepted your Friend Request', '2020-12-20 19:25:28', 'Old'),
(9, 'shafin', 'xavier', ' commented on your PostID: 1', '2020-12-21 05:19:06', 'Old'),
(10, 'xavier', 'xavier', ' commented on your PostID: 1', '2020-12-21 05:20:06', 'Old'),
(11, 'xavier', 'xavier', ' liked your PostID: 1', '2020-12-21 05:21:17', 'Old'),
(12, 'xavier', 'shafin', ' liked your CommentID: 1', '2020-12-21 05:24:15', 'New'),
(13, 'tauhid', 'prateeti', ' accepted your Friend Request', '2020-12-21 05:24:45', 'New'),
(14, 'tauhid', 'shafin', ' sent you a Friend Request', '2020-12-21 05:24:50', 'New'),
(15, 'tauhid', 'tamanna', ' sent you a Friend Request', '2020-12-21 05:24:56', 'New'),
(16, 'tauhid', 'ishti', ' sent you a Friend Request', '2020-12-21 05:25:23', 'New'),
(17, 'ishti', 'prateeti', ' accepted your Friend Request', '2020-12-21 05:26:48', 'New'),
(18, 'ishti', 'shafin', ' sent you a Friend Request', '2020-12-21 05:26:53', 'New'),
(19, 'ishti', 'tamanna', ' sent you a Friend Request', '2020-12-21 05:26:58', 'New'),
(20, 'ishti', 'tauhid', ' accepted your Friend Request', '2020-12-21 05:27:09', 'New'),
(21, 'tamanna', 'shafin', ' sent you a Friend Request', '2020-12-21 05:28:40', 'New'),
(22, 'tamanna', 'xavier', ' sent you a Friend Request', '2020-12-21 05:28:49', 'Old'),
(23, 'tamanna', 'tauhid', ' accepted your Friend Request', '2020-12-21 05:29:00', 'New'),
(24, 'tamanna', 'prateeti', ' accepted your Friend Request', '2020-12-21 05:29:15', 'New'),
(25, 'tamanna', 'ishti', ' accepted your Friend Request', '2020-12-21 05:29:20', 'New'),
(26, 'shafin', 'tauhid', ' accepted your Friend Request', '2020-12-21 05:29:47', 'New'),
(27, 'shafin', 'ishti', ' accepted your Friend Request', '2020-12-21 05:29:51', 'New'),
(28, 'shafin', 'prateeti', ' accepted your Friend Request', '2020-12-21 05:29:55', 'New'),
(29, 'shafin', 'tamanna', ' accepted your Friend Request', '2020-12-21 05:30:00', 'New'),
(30, 'shafin', 'robindbanc', ' sent you a Friend Request', '2020-12-21 05:30:23', 'New'),
(31, 'shafin', 'natasha', ' sent you a Friend Request', '2020-12-21 05:30:47', 'New'),
(32, 'natasha', 'xavier', ' sent you a Friend Request', '2020-12-21 05:31:29', 'Old'),
(33, 'natasha', 'shafin', ' rejected your Friend Request', '2020-12-21 05:31:34', 'New'),
(34, 'natasha', 'aryastark', ' sent you a Friend Request', '2020-12-21 05:31:52', 'New'),
(35, 'aryastark', 'natasha', ' accepted your Friend Request', '2020-12-21 05:46:28', 'New'),
(36, 'aryastark', 'natasha', ' liked your PostID: 2', '2020-12-21 05:46:39', 'New'),
(37, 'natasha', 'robindbanc', ' sent you a Friend Request', '2020-12-21 05:47:38', 'New'),
(38, 'xavier', 'natasha', ' accepted your Friend Request', '2020-12-21 05:48:12', 'New'),
(39, 'shafin', 'xavier', ' liked your PostID: 1', '2020-12-21 07:21:11', 'Old'),
(40, 'shafin', 'shafin', ' liked your CommentID: 1', '2020-12-21 07:21:56', 'New'),
(41, 'xavier', 'shafin', ' messaged you', '2020-12-21 07:42:14', 'New'),
(42, 'shafin', 'xavier', ' messaged you', '2020-12-21 07:43:25', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PID` int(11) NOT NULL,
  `From_UID` varchar(10) NOT NULL,
  `Shared_UID` varchar(10) DEFAULT NULL,
  `Privacy_Level` int(11) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Text` varchar(300) NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0,
  `Shares` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PID`, `From_UID`, `Shared_UID`, `Privacy_Level`, `Subject`, `Text`, `Likes`, `Shares`) VALUES
(1, 'xavier', NULL, 1, 'My Status Update', 'First Name: Charles Francis; Last Name: Xavier; Birth Date: 1963-09-10; Email: xavierX@gmail.com; Gender: Male; Phone: 9999999999', 2, 0),
(2, 'natasha', NULL, 1, 'Black Widow', 'So excited about the upcoming Black Widow Movie. Saw Robert Downey Jr in the cast. Btw I am still waiting for Sherlock Holmes 3.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `About_Me` varchar(150) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Phone` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Password`, `First_Name`, `Last_Name`, `About_Me`, `Address`, `Birth_Date`, `Email`, `Gender`, `Phone`) VALUES
('aryastark', '1234', 'Arya', 'Stark', 'Many a face but a fake ', 'Belfast, Ireland', '1989-04-17', 'aryassin@gmail.com', 'Female', 404),
('ishti', '1234', 'Iftekhar', 'Ishti', 'Student', 'Baridhara, Dhaka', '0006-03-31', 'iftekharul@gmail.com', 'Male', 880848489495),
('natasha', '1234', 'Natalia Alianovna', 'Romanova', 'KGB Operative', 'Moscow, Russia', '1984-08-04', 'blackwidow@gmail.com', 'Female', 89495548585),
('prateeti', '1234', 'Prateeti Saha', 'Roy', 'Student', 'Bashundhara, Dhaka', '2000-04-21', 'prateetiroy@gmail.com', 'Female', 8806546474545),
('robindbanc', '1234', 'Robin', 'DeBanc', 'Shady Individual', 'Washington, USA', '1982-03-15', 'bancrubd@gmail.com', 'Male', 955484845),
('shafin', '1234', 'Wasique', 'Shafin', 'A Student, nothing more, nothing less', 'Uttara, Dhaka', '2000-02-21', 'wasique@gmail.com', 'Male', 8801775640996),
('tamanna', '1234', 'Tamanna', 'Hossain', 'BRAC Student', 'Tongi, Dhaka', '1999-12-04', 'tamanna@gmail.com', 'Female', 88056878797),
('tauhid', '1234', 'MD. Tauhidul', 'Islam', 'University Student', 'Moakhali, Dhaka', '1998-04-13', 'tauhidul@gmail.com', 'Male', 88054894984),
('xavier', '1234', 'Charles Francis', 'Xavier', 'Onslaught, Doctor X', 'New York, USA', '1963-09-10', 'xavierX@gmail.com', 'Male', 9999999999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
