-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 11:28 AM
-- Server version: 10.4.6-MariaDB
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
-- Database: `employee_training_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `_course_name` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `wikipage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `_course_name`, `name`, `wikipage`) VALUES
(1, 'Introduction to Machine Learning', 'Overview of Machine Learning', 'https://www.expertsystem.com/machine-learning-definition/'),
(2, 'Introduction to Machine Learning', 'KNN algorithm', 'https://towardsdatascience.com/machine-learning-basics-with-the-k-nearest-neighbors-algorithm-6a6e71d01761'),
(3, 'Introduction to Machine Learning', 'Support Vector Machine.', 'https://en.wikipedia.org/wiki/Support-vector_machine'),
(4, 'Install the Apache Web Server on Ubuntu 16.04', 'Connect with SSH', 'https://www.digitalocean.com/docs/droplets/how-to/connect-with-ssh/'),
(5, 'Install the Apache Web Server on Ubuntu 16.04', 'Initial Server Setup with Ubuntu 16.04.', 'https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04'),
(6, 'Install the Apache Web Server on Ubuntu 16.04', 'Install the Apache Web server', 'https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-16-04'),
(7, 'Operating System', 'Introduction', 'https://www.studytonight.com/operating-system/introduction-operating-systems '),
(8, 'Operating System', 'Process Management', 'https://en.wikipedia.org/wiki/Process_management_(computing)');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'Introduction to Machine Learning'),
(2, 'Install the Apache Web Server on Ubuntu 16.04'),
(9, 'Operating System');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `chapter_name` varchar(256) NOT NULL,
  `corrects` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `course_name`, `chapter_name`, `corrects`, `total`) VALUES
(1, 25, 'Algorithm and Data Structures', 'Time complexity of Algorithm', 1, 5),
(2, 25, 'Algorithm and Data Structures', 'Sorting Algorithm', 0, 3),
(3, 25, 'Introduction to Machine Learning', 'Overview of Machine Learning', 0, 2),
(4, 25, 'Introduction to Machine Learning', 'KNN algorithm', 3, 4),
(5, 25, 'Introduction to Machine Learning', 'Support Vector Machine', 2, 5),
(12, 28, 'Install the Apache Web Server on Ubuntu 16.04', 'Connect with SSH', 1, 2),
(13, 28, 'Install the Apache Web Server on Ubuntu 16.04', 'Initial Server Setup with Ubuntu 16.04', 3, 3),
(14, 28, 'Install the Apache Web Server on Ubuntu 16.04', 'Install the Apache Web server', 1, 2),
(15, 28, 'Operating System', 'Introduction', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `_chapter_name` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `option_1` text DEFAULT NULL,
  `option_2` text DEFAULT NULL,
  `option_3` text DEFAULT NULL,
  `option_4` text DEFAULT NULL,
  `correct` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `_chapter_name`, `title`, `option_1`, `option_2`, `option_3`, `option_4`, `correct`) VALUES
(1, 'Overview of Machine Learning', 'What is the primary aim of machine learning?', 'Extract useful information from huge data', 'Make better decisions than humans', 'Allow computers to learn automatically', 'To be allow machines to work independently', 'Allow computers to learn automatically'),
(2, 'Overview of Machine Learning', 'Which is NOT a machine learning algorithm?', 'Supervised', 'Unsupervised', 'Reinforcement', 'Cognitive', 'Cognitive'),
(3, 'KNN algorithm', 'k-NN algorithm does more computation on test time rather than train time. True or False?', 'True', 'False', NULL, NULL, 'True'),
(4, 'KNN algorithm', 'Which of the following option is true about k-NN algorithm', 'It can be used for classification', 'It can be used for regression', 'It can be used in both classification and regression', 'None of the above', 'It can be used in both classification and regression'),
(5, 'KNN algorithm', 'Which of the following is true about Manhattan distance?', 'It can be used for continuous variables', 'It can be used for categorical variables', 'It can be used for categorical as well as continuous', 'None of these', 'It can be used for continuous variables'),
(6, 'KNN algorithm', 'Which of the following will be Euclidean Distance between the two data point A(1,3) and B(2,3)?', '1', '2', '4', '8', '1'),
(7, 'Support Vector Machine.', 'SVM can be used to solve which problems?', 'Classification', 'Regression', 'Clustering', 'Both Classification and Regression', 'Both Classification and Regression'),
(8, 'Support Vector Machine.', 'Which are the training examples closest to the separating hyperplane?', 'Training vectors', 'Test vectors', 'Support vectors', 'All of the above', 'Support vectors'),
(9, 'Support Vector Machine.', 'Which of the following is a type of SVM?', 'All of the below', 'Soft margin classifier', 'Support vector regression', 'Maximum margin classifier', 'All of the below'),
(10, 'Support Vector Machine.', 'When the C parameter is set to infinite, which of the following holds true?', 'The optimal hyperplane if exists, will be the one that completely separates the data', 'The soft-margin classifier will separate the data', 'All of the above', 'None of the above', 'The optimal hyperplane if exists, will be the one that completely separates the data'),
(11, 'Support Vector Machine.', 'The effectiveness of an SVM depends upon:', 'Selection of Kernel', 'Kernel Parameters', 'Soft Margin Parameter C', 'All of the above', 'All of the above'),
(12, 'Connect with SSH', 'What piece of information you don’t need to login to Droplet with SSH?', 'Droplet’s IP address', 'SSH Key Pair', 'The default username on the server', 'The default password for that username, if you aren’t using SSH keys', 'SSH Key Pair'),
(13, 'Connect with SSH', 'What is default Username in Ubuntu?', 'root', 'core', NULL, NULL, 'root'),
(14, 'Initial Server Setup with Ubuntu 16.04.', 'Why is it advised to create an alternate user account apart from root?', 'to broaden the privileges', 'to reduce scope of influence', NULL, NULL, 'to reduce scope of influence'),
(15, 'Initial Server Setup with Ubuntu 16.04.', 'Which is not a necessary step to setup server with Ubuntu 16.04?', 'Root Login', '2626', 'Adding root privileges', 'New User Login', 'New User Login'),
(16, 'Initial Server Setup with Ubuntu 16.04.', 'If your key pair is passphrase-less, you should be logged in to your server without a password.True or False?', 'True', 'False', NULL, NULL, 'True'),
(17, 'Install the Apache Web server', 'What is the command that will install Apache after confirmation of installation?', 'apt-go', 'apt-install', 'apt-get install apache 2', 'apt-get', 'apt-get install apache 2'),
(18, 'Install the Apache Web server', 'Apache: This profile opens both port 80 (normal, unencrypted web traffic) and port 443 (TLS/SSL encrypted traffic). True or False?', 'True', 'False', NULL, NULL, 'False'),
(19, 'Introduction', 'Dual mode of operating system has', '1 mode', '2 modes', '3 modes', '4 modes', '2 modes'),
(20, 'Introduction', 'Multi-processor system gives a', 'Small system', 'Tightly coupled system', 'loosely coupled system', 'Macro system', 'Tightly coupled system'),
(21, 'Introduction', 'Scheduling of threads are done by', 'Single program environment', 'Dual program environment', 'Core environment', 'Multi program environment', 'Multi program environment'),
(23, 'Process Management', 'A single threaded process of operating system programs has', 'One program counter', 'Two program counters', 'three program counters', 'Four program counters', 'Four program counters');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_number` varchar(256) NOT NULL,
  `position` varchar(256) NOT NULL,
  `required_courses` varchar(256) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `age`, `sex`, `email`, `phone_number`, `position`, `required_courses`, `group_id`) VALUES
(25, 'Nancy', '123', 24, 'Female', 'nancy@gmail.com', '65786976', 'Employee', NULL, NULL),
(27, 'Adele', '123', 23, 'Female', 'adele@123.com', '981273894', 'Instructor', NULL, NULL),
(28, 'Jacob', '123', 34, 'Male', 'jacob@123.com', '123456', 'Employee', NULL, NULL),
(29, 'Jack', '12345', 11, 'Male', 'jack@qq.com', '11198', 'Employee', NULL, NULL),
(30, 'Thea', '123456', 11, 'Female', 'thea@qq.com', '1234567', 'Admin', NULL, NULL),
(31, 'David', '1234', 111, 'Male', 'david@qq.com', '2353567986897', 'Instructor', NULL, NULL),
(32, 'Eva', 'haha', 12, 'Female', 'eva@qq.com', '2414151', 'Employee', NULL, NULL),
(33, 'Rose', 'aaaaa', 12, 'Female', 'rose@163.com', '2351231', 'Employee', NULL, NULL),
(34, 'Rachel', '123', 25, 'Female', 'rachel@qq.com', '133434', 'Employee', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
