-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 01:39 PM
-- Server version: 8.0.35
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `CourseDescription` text,
  `units` decimal(3,1) DEFAULT NULL,
  `TF` decimal(3,1) DEFAULT NULL,
  `Laboratory` decimal(3,1) DEFAULT NULL,
  `ProgramID` int DEFAULT NULL,
  `SubjectCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `CourseDescription`, `units`, `TF`, `Laboratory`, `ProgramID`, `SubjectCode`) VALUES
(1, 'Data Stucture & Algorithm', 'DSA', '3.0', '3.0', '1.0', 1, 'CCIT 104'),
(2, 'Information Management 1', 'IM1', '3.0', '3.0', '1.0', 1, 'CCIT 105');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int NOT NULL,
  `DepartmentName` varchar(255) NOT NULL,
  `Dean` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`, `Dean`) VALUES
(1, 'CCS', 'Dr. Alice Johnson');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` int NOT NULL,
  `ProgramName` varchar(255) NOT NULL,
  `DepartmentID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `ProgramName`, `DepartmentID`) VALUES
(1, 'BSIT', 1),
(2, 'BSIS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentinformation`
--

CREATE TABLE `studentinformation` (
  `StudentID` int NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `Nationality` varchar(50) NOT NULL,
  `ContactNumber` int NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `StreetAddress` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `Baranggay` varchar(50) NOT NULL,
  `PostalCode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentinformation`
--

INSERT INTO `studentinformation` (`StudentID`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `Nationality`, `ContactNumber`, `EmailAddress`, `StreetAddress`, `City`, `Province`, `Baranggay`, `PostalCode`) VALUES
(1, 'John', 'Doe', 'Smith', 'Male', 'American', 1234567890, 'john.smith@example.com', '123 Elm St', 'Springfield', 'IL', 'Downtown', 62701),
(2, 'Jane', 'A.', 'Doe', 'Female', 'Canadian', 987654321, 'jane.doe@example.com', '456 Maple Ave', 'Toronto', 'ON', 'Central', 23);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `yearlevel` int DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `status` enum('pass','fail','enrolled','registered') DEFAULT NULL,
  `formerschoolname` varchar(100) NOT NULL,
  `formerschooladdress` varchar(255) NOT NULL,
  `graduationyear` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `studID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `dateofbirth`, `email`, `address`, `phone`, `yearlevel`, `section`, `status`, `formerschoolname`, `formerschooladdress`, `graduationyear`, `department`, `program`, `studID`) VALUES
(30, 'Mark Ely', 'Lomeda', 'Calipjo', 'male', '2024-11-20', 'jusptin.perez@gmail.com', 'La Pursima, Nabua, Camarines Sur', '09302727548', NULL, NULL, 'registered', 'ACLC', 'IRIGA', '2024-11-20', 'CCS', 'BSIT', 2024001),
(31, 'Mark', 'Lomeda', 'Calipjo', 'male', '2024-11-20', 'jusptin.perez@gmail.com', 'La Pursima, Nabua, Camarines Sur', '6019521325', NULL, NULL, 'registered', 'ACLC', 'IRIGA', '2024-11-20', 'CCS', 'BSIT', 2024031),
(32, 'Mark', 'Lomeda', 'Calipjo', 'male', '2024-11-20', 'jusptin.perez@gmail.com', 'La Pursima, Nabua, Camarines Sur', '6019521325', NULL, NULL, 'registered', 'ACLC', 'IRIGA', '2024-11-20', 'CCS', 'BSIT', 2024032),
(33, 'Mark Ely', 'Lomeda', 'Calipjo', 'male', '2024-11-21', 'jusptin.perez@gmail.com', 'La Pursima, Nabua, Camarines Sur', '09302727548', NULL, NULL, 'registered', 'ACLC', 'IRIGA', '2024-11-19', 'CCS', 'BSIT', 2024033);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$3mvkEnyyYTZ5ytxDAZMgHOa.0Rb1dgZFqSg6EdokCJeenqprgTfKS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `ProgramID` (`ProgramID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `studentinformation`
--
ALTER TABLE `studentinformation`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentinformation`
--
ALTER TABLE `studentinformation`
  MODIFY `StudentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
