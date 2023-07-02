-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 10:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fk-edusearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `post_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`post_id`, `username`, `comment`) VALUES
(1, 'max', 'What are the resources or websites I can refer to in order to get more info on cryptojacking ?'),
(2, 'marissa', 'Thanks for the help. Can I also know how to apply CRUD (create, retrieve, update and delete) the user inputted data into the database ?'),
(3, 'alex', 'What is the use of session and why it session needed in any website or system?');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` text NOT NULL,
  `category` enum('Research','Course') NOT NULL,
  `status` enum('In progress','Revised','Completed','Accepted') NOT NULL,
  `date` varchar(15) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `category`, `status`, `date`, `likes`) VALUES
(1, 'How to cryptojack ?', 'Cryptojacking is a form of cyber attack where an attacker secretly utilizes someone else\'s computer or device resources, such as CPU and electricity, to mine cryptocurrencies without their consent. The attacker gains profits by exploiting the processing power of the victim\'s device to mine cryptocurrencies like Bitcoin, Monero, or others. Here are the steps typically involved in cryptojacking:\r\n\r\n1. Identify the Target: The attacker selects a target, usually a vulnerable website, web application, or a large number of devices connected to a network.\r\n\r\n2. Inject Malicious Code: The attacker injects malicious code into the target system or website. This can be done through methods like exploiting software vulnerabilities, using malicious email attachments, or employing phishing techniques.\r\n\r\n3. Execute Cryptojacking Script: The injected code contains a cryptojacking script or malware that runs in the background without the victim\'s knowledge. It utilizes the victim\'s device resources to mine cryptocurrencies.\r\n\r\n4. Resource Consumption: The cryptojacking script consumes the victim\'s CPU power, electricity, and network bandwidth to perform the resource-intensive computations required for cryptocurrency mining.\r\n\r\n5. Mining Rewards: The attacker\'s mining pool or wallet receives the mining rewards, which are earned by solving complex mathematical problems and validating cryptocurrency transactions using the victim\'s computing power.\r\n\r\n6. Concealment: To avoid detection, the cryptojacking script may employ various techniques to conceal its presence, such as using obfuscated code, dynamically changing mining algorithms, or periodically adjusting the CPU usage to avoid suspicion.\r\n\r\n7. Continuous Exploitation: Once successful, the attacker can continue exploiting the victim\'s resources for as long as possible, maximizing their illicit mining activities and potential profits.', 'Research', 'In progress', '13-05-2023', 0),
(2, 'How to create a database connection ?', '<?php\r\n$servername = \"localhost\"; // Change to your MySQL server name if necessary\r\n$username = \"root\"; // Change to your MySQL username\r\n$password = \"\"; // Change to your MySQL password\r\n$dbname = \"your_database_name\"; // Change to your database name\r\n\r\n// Create a new MySQLi object\r\n$conn = new mysqli($servername, $username, $password, $dbname);\r\n\r\n// Check the connection\r\nif ($conn->connect_error) {\r\n    die(\"Connection failed: \" . $conn->connect_error);\r\n}\r\n\r\n// Set the character set (optional)\r\n$conn->set_charset(\"utf8\");\r\n\r\n// If the connection is successful, you can perform database operations using $conn object\r\n\r\n// Query the database\r\n$sql = \"SELECT * FROM users\";\r\n$result = $conn->query($sql);\r\n\r\n// Process the query result\r\nif ($result->num_rows > 0) {\r\n    while ($row = $result->fetch_assoc()) {\r\n        echo \"Name: \" . $row[\"name\"] . \"<br>\";\r\n        echo \"Email: \" . $row[\"email\"] . \"<br>\";\r\n        // ... Additional data retrieval or processing\r\n    }\r\n} else {\r\n    echo \"No results found.\";\r\n}\r\n\r\n// Close the database connection\r\n$conn->close();\r\n\r\n?>\r\n', 'Course', 'In progress', '01-06-2023', 2),
(3, 'how to create and destroy a session ?', 'Creating a session example: \r\n<?php\r\nsession_start();\r\n\r\n// Access session variables\r\n$username = $_SESSION[\'username\'];\r\n$email = $_SESSION[\'email\'];\r\n\r\n// Use the session variables as needed\r\necho \"Welcome, $username. Your email is $email.\";\r\n?>\r\n\r\nDestroying a session example: \r\n<?php\r\nsession_start();\r\n\r\n// Unset session variables\r\n$_SESSION = array();\r\n\r\n// Destroy the session\r\nsession_destroy();\r\n?>\r\n', 'Course', 'In progress', '15-06-2023', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_ID`, `rating`) VALUES
(1, 5),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `course` enum('Diploma in Computer Science','Bachelor of Computer Science (Software Engineering) with Honours','Bachelor of Computer Science (Computer Systems & Networking) with                   Honours','achelor of Computer Science (Graphics & Multimedia Technology) with                   Honours','Bachelor of Computer Science (Cyber Security) with Honours','Master of Science (Information & Communication Technology)','Master of Science (Software Engineering)','Master of Science (Computer Networking)','Research Programmes (PhD & MSc in Computer Science)') NOT NULL,
  `research` varchar(110) NOT NULL,
  `academic_status` enum('Undergraduate','Postgraduate','On hold','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`username`, `email`, `phone`, `course`, `research`, `academic_status`) VALUES
('yoong', 'yoong@gmail.com', '60118472525', 'Bachelor of Computer Science (Computer Systems & Networking) with Honours', 'Cryptojacking', 'Undergraduate'),
('ashley', 'ash123@hotmail.com', '60185473956', 'Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours', 'Copyright in digital art', 'Undergraduate'),
('mark', 'mark@gmail.com', '60194832985', 'Bachelor of Computer Science (Software Engineering) with Honours', 'AI', 'Undergraduate'),
('mark8', 'mark81@gmail.com', '60194832985', 'Bachelor of Computer Science (Software Engineering) with Honours', 'AI', 'Undergraduate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rating_ID`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
