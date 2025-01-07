-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 08:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(6) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(15) NOT NULL,
  `date` date NOT NULL,
  `state` varchar(30) NOT NULL,
  `quantity` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `product_id`, `user_id`, `name`, `email`, `phone`, `age`, `date`, `state`, `quantity`) VALUES
(33, 3, 39, 'naveen', 'negi@133gmail.com', '43543543', 33, '2023-02-24', 'up', '3'),
(36, 1, 39, 'naveen', 'negi@133gmail.com', '43543543', 33, '2023-02-17', 'uttaRAKHAND', '2'),
(37, 3, 39, 'naveen', 'negi@133gmail.com', '43543543', 33, '2023-02-11', 'HP', '5'),
(41, 1, 39, 'naveen ', 'negi@133gmail.com', '43543543', 33, '2023-02-08', 'HP', '2'),
(42, 1, 39, 'naveen ', 'negi@133gmail.com', '43543543', 33, '2023-02-08', 'HP', '1'),
(67, 1, 47, 'nena', 'nena@gmail.com', '111111', 12, '2023-02-16', 'UP', '11'),
(77, 6, 123, 'ashok', 'negiashok132@gmail.c', '46546546', 22, '2023-03-31', 'pabo', '3'),
(78, 2, 123, 'ashok', 'negiashok132@gmail.c', '46546546', 22, '2023-03-30', 'peeda', '4'),
(81, 3, 123, 'ashok', 'negiashok132@gmail.c', '46546546', 22, '2023-03-09', 'pabo', '5'),
(83, 1, 123, 'ashok', 'negiashok132@gmail.c', '46546546', 22, '2023-03-02', 'delhi', '3'),
(85, 1, 123, 'ashok', 'negiashok132@gmail.c', '46546546', 22, '2023-03-01', 'uttaRAKHAND', '2'),
(86, 1, 29, 'saurabh ', 'negianki@55gmail.com', '4465644', 61, '2023-03-01', 'uttaRAKHAND', '2'),
(87, 1, 119, 'vinay     ', 'vinay123@gmail.com', '56745', 36, '2023-03-10', 'HP', '4'),
(88, 1, 119, 'vinay     ', 'vinay123@gmail.com', ' 00001111', 36, '2023-03-10', 'HP', '4'),
(89, 1, 29, 'saurabh ', 'negianki@55gmail.com', '4465644', 61, '2023-03-25', 'delhi', '2'),
(90, 6, 123, 'ashok', 'negiashok132@gmail.c', '46546546', 22, '2023-03-03', 'HP', '2'),
(91, 1, 122, 'soni', 'soni@gmail.com', '46573483', 55, '2023-03-15', 'delhi', '3'),
(93, 6, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 4, '2023-03-01', 'uttaRAKHAND', '1'),
(94, 6, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 4, '2023-03-01', 'uttaRAKHAND', '2'),
(95, 2, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 50, '2023-03-01', 'uttaRAKHAND', '2'),
(96, 1, 29, 'saurabh ', 'negianki@55gmail.com', '4465644', 61, '2023-03-02', 'uttaRAKHAND', '3'),
(98, 6, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 21, '2023-03-02', 'HP', '1'),
(99, 4, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 21, '2023-03-30', 'uttaRAKHAND', '21'),
(100, 4, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 21, '2023-02-28', 'HP', '3'),
(101, 4, 123, 'ashok                                   ', 'negiashok132@gmail.c', '999983', 21, '2023-03-30', 'HP', '8'),
(103, 4, 29, 'saurabh ', 'negianki@55gmail.com', '4465644', 61, '2023-03-09', 'HP', '2'),
(159, 3, 29, 'saurabh ', 'negianki@55gmail.com', '4465644', 61, '2024-11-19', 'peeda', '2'),
(160, 3, 29, 'saurabh ', 'negianki@55gmail.com', '4465644', 61, '2024-11-19', 'peeda', '2'),
(167, 3, 140, 'ayush ', 'ayush@gmail.com', '904532', 22, '2024-12-10', 'Nepal', '1'),
(172, 3, 147, 'dinesh', 'dinesh@gmail.com', '36535637', 21, '2024-12-21', 'Rajeshthan', '1'),
(173, 1, 148, 'monu ', 'monu@gmail.com', '9634545808', 22, '2024-12-25', 'srinager', '2'),
(176, 1, 125, 'ashok  ', 'negiashok132@gmail.com', '9999999999', 22, '2025-01-06', 'Uttarakhand', '1'),
(177, 1, 125, 'ashok  ', 'negiashok132@gmail.com', '9999999999', 22, '2025-01-06', 'Uttarakhand', '1'),
(178, 2, 125, 'ashok    ', 'negiashok132@gmail.com', '9999999999', 21, '2025-01-07', 'Uttarakhand', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `Total_prise` int(50) DEFAULT NULL,
  `quentity` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `user_id`, `product_id`, `course_name`, `Total_prise`, `quentity`) VALUES
(21, 119, 1, 'Web development', 13500, 3),
(35, 123, 4, 'c language', 6000, 1),
(47, 123, 4, 'c language', 30000, 5),
(62, 123, 2, 'backend development', 80000, 10),
(63, 123, 4, 'c language', 30000, 5),
(67, 123, 2, 'backend development', 40000, 5),
(69, 119, 1, 'Web development', 4500, 1),
(74, 129, 1, 'Web development', 4500, 1),
(75, 129, 3, 'HTML ', 12000, 1),
(76, 129, 5, 'Jquery', 6000, 1),
(80, 129, 5, 'Jquery', 6000, 1),
(82, 131, 4, 'c language', 6000, 1),
(93, 29, 1, 'Web development', 13500, 3),
(98, 132, 1, 'Web development', 9000, 2),
(101, 149, 1, 'Web development', 13500, 3),
(105, 125, 2, 'backend development', 16000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_discription` varchar(500) NOT NULL,
  `level` varchar(50) NOT NULL,
  `prerequisites` varchar(8000) NOT NULL,
  `course_content` varchar(1000) NOT NULL,
  `duration` varchar(70) NOT NULL,
  `prise` varchar(50) NOT NULL,
  `course_meterials` varchar(200) NOT NULL,
  `certification` varchar(20) NOT NULL,
  `p_image` varchar(100) DEFAULT NULL,
  `pdf` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `course_title`, `course_discription`, `level`, `prerequisites`, `course_content`, `duration`, `prise`, `course_meterials`, `certification`, `p_image`, `pdf`) VALUES
(1, 1, 'Web development', 'This course is designed to provide a comprehensive understanding of web development, empowering learners to create modern, responsive, and fully functional websites. Participants will gain hands-on experience with both front-end and back-end technologies, enabling them to develop complete web applications. From understanding the basics of HTML and CSS to mastering JavaScript frameworks and server-side programming, this course covers all the essentials for aspiring web developers.', 'Biggner', 'Basic computer literacy.  Familiarity with using a text editor or IDE. Fundament understanding of programming concepts (optional but helpful). Curiosity and a willingness to learn!', ' What is Web Development?   How the Internet Works .    Front-End Development Basics .  HTML (HyperText Markup Language), CSS , Java Script .  JavaScript Frameworks and Libraries , Responsive Design with Frameworks,  Version Control with Git , Web Hosting and Deployment , Textbooks and E-Books , Tools and Software , Building a personal portfolio website. Creating a blog with user authentication. .', '8 Month', '4500 ', 'We giving hand written notes , build projects , and weekely text are avilable', 'No', '6.jpg', NULL),
(2, 2, 'backend development', 'hii', 'bignner', 'hiii', 'We leran how to connect a web page with database', '2 Month', '200', 'We giving hand written notes , build projects , and weekely text are avilable', 'yes', 'Tulips.jpg', NULL),
(6, 3, 'Java', ' java is best', 'Intermideate', ' Basic of OOPs Concepts', ' 1 - Introduction of Java.', '6 Month', '12000 ', 'fdgfg', 'Yes', '5.jpg', NULL),
(14, 4, 'c language', 'mother of all language', 'Advanced', 'nothing', 'syntex', '6 Month', '6000', 'Hand written Notes, Project', 'No', 'Penguins.jpg', NULL),
(16, 6, 'Python language', 'mother of all language', 'Biggner', 'nothing', 'syntex', '4 Month', '6000', 'Hand written Notes, Project', 'No', 'Chrysanthemum.jpg', NULL),
(17, 7, 'PHP Development', ' A PHP Developer is a web programmer specializing in server-side scripting using php to build , maintain and enhance dynamic website and web application . They are skilled in intergation databse(Like MySQL), handling back-end logic, and ensuring seamless functionality of website. Proficient in HTML, CSS and JavaScript .PHP Developer collaborate with front-end teams to deliver user-friendly and efficient web solution', 'Biggner', '1. Basic Understanding of HTML and CSS.2. BAsic Programming concept like(variabl', '1 - Introduction to PHP.2 - Control Structures.3 - Functions .4 - Working with Forms.5 - Handling Database .6 - Session Management .7 - Error Handling.8 - Working with AJAX and APIs.9 - OOPS in PHP.10 - PHP Frameworks(Optional).11 - Project Development. ', '4 Month', '5000', '1 - Handwritten Notes.2 - Online resourse', 'Yes', 'Tulips.jpg', ' https://drive.google.com/file/d/1G2qnyxkhhW6rEJkE6ArQRgO37V-oVOnT/view');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `usertype` varchar(11) DEFAULT NULL,
  `file` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `password`, `email`, `phone`, `age`, `gender`, `usertype`, `file`) VALUES
(29, 'saurabh ', '333', 'negianki@55gmail.com', '1111111110', 61, 'Male', 'user', 'Koala.jpg'),
(125, 'ashok    ', '123', 'negiashok132@gmail.com', '9999999999', 21, 'Male', 'admin', 'lord-krishna-black-7680x4320-16893.jpg'),
(140, 'ayush ', '434', 'ayush@gmail.com', '3333333333', 22, 'Male', 'user', '5.jpg'),
(148, 'monu ', 'monu12', 'monu@gmail.com', '5555555555', 22, 'female', 'normal', 'lord-krishna-black-7680x4320-16893.jpg'),
(149, 'salman ', 'sal2', 'sal@gmail.com', '6666666666', 55, 'female', 'user', '1000_F_794811163_6zqVFNg8AeXb7XbimA5CwpTgqSEpXdJw.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
