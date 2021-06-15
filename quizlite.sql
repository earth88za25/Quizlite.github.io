-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 09:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizlite`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `options` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `qid`, `eid`, `oid`, `options`) VALUES
(1, 1, 1, 1, '1.1 Awnser'),
(2, 1, 1, 2, '1.2 Awnser'),
(3, 1, 1, 3, '1.3 Awnser'),
(4, 1, 1, 4, '1.4 Awnser'),
(5, 1, 2, 1, '2.1 Awnser'),
(6, 1, 2, 2, '2.2 Awnser'),
(7, 1, 2, 3, '2.3 Awnser'),
(8, 1, 2, 4, '2.4 Awnser'),
(9, 1, 3, 1, '3.1Awnser'),
(10, 1, 3, 2, '3.2Awnser'),
(11, 1, 3, 3, '3.3Awnser'),
(12, 1, 3, 4, '3.4Awnser'),
(13, 1, 6, 1, 'กดสหาเ่'),
(14, 1, 6, 2, 'ดหาเ่หก'),
(15, 1, 6, 3, 'สดกหเ'),
(16, 1, 6, 4, 'กดหเกดเ'),
(17, 2, 2, 1, 'ไม่รู็เว้ยย'),
(18, 2, 2, 2, 'อย่าเลือกข้'),
(19, 2, 2, 3, 'ไม่เอาาาาาา'),
(20, 2, 2, 4, 'ปล่อยฉันนนน');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `qid` int(255) NOT NULL,
  `eid` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qid`, `eid`, `question`, `ans`) VALUES
(1, 1, 1, '1.คำถามทดสอบ', 1),
(2, 1, 2, '2.คำถามทดสอบ', 1),
(3, 1, 3, '3.คำถามทดสอบ', 1),
(4, 2, 1, '1.ทดสอบ2', 0),
(5, 1, 4, '', 0),
(6, 1, 5, '  ทดสอบ', 1),
(7, 1, 6, '  ทดสอบกฟกด', 3),
(8, 2, 2, 'อย่าถามฉันนนนนนนนนนนนน', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `qid` int(255) NOT NULL,
  `quizname` varchar(100) NOT NULL,
  `qtype` int(11) NOT NULL,
  `qenable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `qid`, `quizname`, `qtype`, `qenable`) VALUES
(1, 1, 'quiztest', 1, 1),
(2, 2, 'ทดสอบ2', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiztype`
--

CREATE TABLE `quiztype` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiztype`
--

INSERT INTO `quiztype` (`typeid`, `typename`) VALUES
(1, 'คอมพิวเตอร์'),
(2, 'วิทยาศาสตร์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiztype`
--
ALTER TABLE `quiztype`
  ADD PRIMARY KEY (`typeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiztype`
--
ALTER TABLE `quiztype`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
