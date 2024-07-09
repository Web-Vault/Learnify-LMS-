-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 11:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `userID` varchar(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `username` char(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`userID`, `admin_email`, `username`, `password`) VALUES
('Admin0103', 'aryan@admin.com', 'Aryan', 'Aryan01516');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(2) NOT NULL,
  `course_img` text NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_img`, `course_name`, `course_desc`) VALUES
(1, 'php-course.jpg', 'Web Programming With PHP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(6, '', 'Programming in C', 'Learn C language');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `content_id` int(2) NOT NULL,
  `content_text` text NOT NULL,
  `heading_id` int(2) NOT NULL,
  `index_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`content_id`, `content_text`, `heading_id`, `index_id`, `course_id`) VALUES
(1, 'PHP is an acronym for PHP: Hypertext Preprocessor.', 1, 1, 1),
(3, 'PHP is a widely-used, open source scripting language', 1, 1, 1),
(4, 'PHP scripts are executed on the server', 1, 1, 1),
(5, 'PHP is free to download and user', 1, 1, 1),
(7, 'PHP can generate dynamic page content', 2, 1, 1),
(8, 'PHP can create, open, read, write, delete, and close files on the server', 2, 1, 1),
(9, 'PHP can collect form data', 2, 1, 1),
(10, 'PHP can send and receive cookies', 2, 1, 1),
(11, 'PHP can add, delete, modify data in your database', 2, 1, 1),
(12, 'PHP can be used to control user-access', 2, 1, 1),
(13, 'PHP can encrypt data', 2, 1, 1),
(14, 'A PHP script can be placed anywhere in the document.', 3, 1, 1),
(15, 'A PHP script starts with ‘< ?php’  and ends with  ‘? >’ :', 3, 1, 1),
(17, 'The default file extension for PHP files is \".php\".>', 3, 1, 1),
(18, 'A PHP file normally contains HTML tags, and some PHP scripting code.', 3, 1, 1),
(20, 'In PHP, keywords (e.g. if,  else, while,  echo, etc.), classes, functions,  and user-defined functions are not case-sensitive.', 3, 1, 1),
(21, 'Note: However; all variable names are case-sensitive!', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_headings`
--

CREATE TABLE `course_headings` (
  `heading_id` int(2) NOT NULL,
  `heading_name` text NOT NULL,
  `index_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_headings`
--

INSERT INTO `course_headings` (`heading_id`, `heading_name`, `index_id`, `course_id`) VALUES
(1, 'What is PHP ?', 1, 1),
(2, 'What Can PHP Do?', 1, 1),
(3, 'Basic PHP Syntax', 1, 1),
(5, 'History of C language', 21, 6);

-- --------------------------------------------------------

--
-- Table structure for table `course_index`
--

CREATE TABLE `course_index` (
  `index_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL,
  `index_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_index`
--

INSERT INTO `course_index` (`index_id`, `course_id`, `index_name`) VALUES
(1, 1, 'Introduction To PHP'),
(2, 1, 'Variables In PHP'),
(3, 1, 'Control Statements In PHP'),
(4, 1, 'Form-handling In PHP'),
(5, 1, 'PHP Super-globals($_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIE)'),
(7, 1, 'Database Integration With PHP'),
(21, 6, 'Introduction to C  language');

-- --------------------------------------------------------

--
-- Table structure for table `fav_courses`
--

CREATE TABLE `fav_courses` (
  `enrollment_id` int(2) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `course_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fav_courses`
--

INSERT INTO `fav_courses` (`enrollment_id`, `user_id`, `course_id`) VALUES
(82, 'User101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `userID` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `time` varchar(100) NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_content` text NOT NULL,
  `division` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_content`, `division`) VALUES
(1, 'Hello students, This is your Admin of KnowiFy! I hope You learn something which you find intersting and make your future bright!.', ''),
(9, 'this notification is for only division A students', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` text NOT NULL,
  `task_desc` text NOT NULL,
  `task_due` date NOT NULL,
  `task_date` date NOT NULL DEFAULT current_timestamp(),
  `division` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_desc`, `task_due`, `task_date`, `division`) VALUES
(1, 'task demo', 'This is demo task description', '2024-05-07', '2024-05-07', ''),
(2, 'new demo task', 'this is admin added', '2024-05-08', '2024-05-08', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `task_uploaders`
--

CREATE TABLE `task_uploaders` (
  `task_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `file` text NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `uploader_id` int(11) NOT NULL,
  `upload_feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_uploaders`
--

INSERT INTO `task_uploaders` (`task_id`, `user_id`, `file`, `time`, `uploader_id`, `upload_feedback`) VALUES
(2, 'User101', 'uploads/default-profile-account-unknown-icon-black-silhouette-free-vector.jpg', '2024-05-08', 5, 'finally');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `userID` varchar(10) NOT NULL,
  `profile_picture` text NOT NULL,
  `first_name` char(255) NOT NULL,
  `last_name` char(255) NOT NULL,
  `username` char(255) NOT NULL,
  `passowrd` varchar(20) NOT NULL,
  `mobile_number` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `division` char(1) NOT NULL,
  `enrollment_number` varchar(15) NOT NULL,
  `bio` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`userID`, `profile_picture`, `first_name`, `last_name`, `username`, `passowrd`, `mobile_number`, `email`, `division`, `enrollment_number`, `bio`, `date_of_birth`, `address`) VALUES
('User100', 'WhatsApp Image 2024-03-13 at 15.19.47_55fb7b47.jpg', 'Jeet', 'Chudasama', 'CJ', 'jeetnew', 9974717832, 'jeetluahr@gmail.com', 'A', '22SDSCE01032', 'This is CJ !', '2006-12-23', 'Savarkundla'),
('User101', '', 'Aryan', 'Lathigara', 'Aryan', 'Aryan00516', 8758499499, 'aryanlathigara@gmail.com', 'A', '22SDSCE01058', 'This is Aryan!', '2007-02-21', 'Rajkot'),
('User102', '', 'Tirth', 'Bhanderi', 'Tirth', 'Tirth00516', 8758499499, 'tbhanderi07@rku.ac.in', 'B', '22SDSCE01017', 'This is Tirth!', '2006-01-01', 'Mavdi, Rajkot'),
('User103', '', 'Kishan', 'Bakori', 'Kishan', 'Kishan1234', 1111155555, 'd76220043@gmail.com', 'B', '22SDSCE01008', 'This is Kishan', '2006-01-01', 'Rajkot');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `Heading_To_Content` (`heading_id`),
  ADD KEY `Index_To_Content` (`index_id`),
  ADD KEY `Course_To_Content` (`course_id`);

--
-- Indexes for table `course_headings`
--
ALTER TABLE `course_headings`
  ADD PRIMARY KEY (`heading_id`),
  ADD KEY `Index_To_Heading` (`index_id`),
  ADD KEY `Course_To_Heading` (`course_id`);

--
-- Indexes for table `course_index`
--
ALTER TABLE `course_index`
  ADD PRIMARY KEY (`index_id`),
  ADD KEY `course_To_Topic` (`course_id`);

--
-- Indexes for table `fav_courses`
--
ALTER TABLE `fav_courses`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_uploaders`
--
ALTER TABLE `task_uploaders`
  ADD PRIMARY KEY (`uploader_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `content_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `course_headings`
--
ALTER TABLE `course_headings`
  MODIFY `heading_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_index`
--
ALTER TABLE `course_index`
  MODIFY `index_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fav_courses`
--
ALTER TABLE `fav_courses`
  MODIFY `enrollment_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_uploaders`
--
ALTER TABLE `task_uploaders`
  MODIFY `uploader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `Course_To_Content` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Heading_To_Content` FOREIGN KEY (`heading_id`) REFERENCES `course_headings` (`heading_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Index_To_Content` FOREIGN KEY (`index_id`) REFERENCES `course_index` (`index_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_headings`
--
ALTER TABLE `course_headings`
  ADD CONSTRAINT `Course_To_Heading` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Index_To_Heading` FOREIGN KEY (`index_id`) REFERENCES `course_index` (`index_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_index`
--
ALTER TABLE `course_index`
  ADD CONSTRAINT `course_To_Topic` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fav_courses`
--
ALTER TABLE `fav_courses`
  ADD CONSTRAINT `fav_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fav_courses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users_data` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_uploaders`
--
ALTER TABLE `task_uploaders`
  ADD CONSTRAINT `task_uploaders_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_uploaders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_data` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
