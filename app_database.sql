-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2023 at 08:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(200) NOT NULL,
  `post_unique_id` int(200) NOT NULL,
  `commenter_id` int(200) NOT NULL,
  `comment_msg` varchar(1000) NOT NULL,
  `comment_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_unique_id`, `commenter_id`, `comment_msg`, `comment_time`) VALUES
(1, 1514759746, 531905367, 'Wow', '24 October 2023 04:13:17'),
(8, 1514759746, 531905367, 'Stay strong!', '24 October 2023 04:20:49'),
(9, 1239493884, 531905367, 'Wow! really beautiful!', '24 October 2023 04:21:25'),
(10, 619504086, 531905367, 'inspiring Music', '24 October 2023 04:21:47'),
(11, 952739993, 531905367, 'Hi, cute', '24 October 2023 04:22:21'),
(12, 1239493884, 782070734, 'The beauty of Canadian woman ', '24 October 2023 04:23:37'),
(13, 619504086, 782070734, 'Music ka thata!', '24 October 2023 04:24:04'),
(14, 1514759746, 782070734, 'Ho tla loka bro!!', '24 October 2023 04:24:28'),
(15, 1514759746, 782070734, 'Tsoara joalo Abuti', '24 October 2023 05:40:36'),
(16, 1514759746, 1431183570, 'Abuti keng joale?', '24 October 2023 05:41:31'),
(17, 1239493884, 1431183570, 'wooooow ❤❤❤', '24 October 2023 05:52:11'),
(18, 831534415, 1431183570, 'Nice pic!!', '24 October 2023 05:52:49'),
(19, 952739993, 1431183570, '😂😂😂😂😂', '24 October 2023 05:53:20'),
(20, 91606174, 1431183570, 'The power of AI', '24 October 2023 05:53:39'),
(21, 429727420, 1431183570, 'mmmm Green Love', '24 October 2023 05:54:04'),
(22, 619504086, 220476398, 'Wooow!', '24 October 2023 05:58:28'),
(23, 619504086, 220476398, 'This is a hit bro when are you dropping!', '24 October 2023 05:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(200) NOT NULL,
  `outgoing_msg_id` int(200) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(37, 1431183570, 100116056, 'Abuti'),
(38, 100116056, 1431183570, 'Hojoang'),
(39, 1431183570, 100116056, 'Ho xap Abuti hojoang'),
(40, 100116056, 1431183570, 'Ho xap 😁'),
(41, 100116056, 1431183570, 'Ke ukoa hothoe class ea 7 hosane e tla kena ka 8 na u ne u se u bone taba tseo kapa che ha u so bone email. Ke joetse ke Ntoi'),
(42, 1431183570, 100116056, 'Okay'),
(43, 1431183570, 100116056, 'Ke hona ke bonang email hana joale'),
(44, 531905367, 100116056, 'hi'),
(45, 531905367, 1431183570, 'Abuti'),
(46, 1431183570, 100116056, 'Hy'),
(47, 100116056, 1431183570, 'Ho xap 😁'),
(48, 1431183570, 100116056, 'Abuti Le bile joang la kajeno'),
(49, 100116056, 1431183570, 'Ache le ne le khotsofatsa Ntt'),
(50, 100116056, 1431183570, 'hey'),
(51, 100116056, 1431183570, 'okay'),
(52, 100116056, 1431183570, 'hi'),
(53, 1431183570, 100116056, 'yoh'),
(54, 1431183570, 100116056, 'Ke sfeng?'),
(55, 100116056, 1431183570, '😂😂haona tse ngata'),
(56, 1431183570, 100116056, 'hi'),
(57, 1431183570, 100116056, 'Abuti'),
(58, 100116056, 220476398, 'hi'),
(59, 531905367, 220476398, 'Hy'),
(60, 531905367, 220476398, 'How are you doing'),
(61, 1431183570, 220476398, 'Hi'),
(62, 1431183570, 220476398, 'I am knew here... can we chat'),
(63, 220476398, 1431183570, 'Yeah sure We can Chat'),
(64, 782070734, 100116056, 'Hi'),
(65, 782070734, 100116056, 'Hey'),
(66, 782070734, 100116056, 'Hojoang dah'),
(67, 220476398, 100116056, 'Abuti Ntoi'),
(68, 220476398, 100116056, 'U ntsoea jaong fela Abuti, '),
(69, 1431183570, 220476398, 'My Man'),
(70, 1431183570, 220476398, 'How are you today?'),
(71, 1431183570, 220476398, 'jsfhwiefw wofjwfhw fwifjwjfw fwijf0wofwfhwfn w h0f8wfmiw08fwfijw0f hw00fjw0fjnw fi0wfuwfw f0hwfjw0jfw fw0hfwnfij0wfw fnw0fh0wmfi0wuf wf0wfnwf j8fhwjef 8efhuef f9efjenijf efienf ehfne fiefief eijf'),
(72, 100116056, 220476398, 'fij308f2 jr802hjr 2jr2 r2pijd2 3dnp2jh3d nj9d23d p3ijd2p dpi2jdp wnifpinjwd'),
(73, 782070734, 220476398, 'youiu'),
(74, 782070734, 220476398, 'ascuhi owuejd\\dwwseifwf'),
(75, 782070734, 220476398, 'ewgeg'),
(76, 782070734, 220476398, 'wegweg'),
(77, 782070734, 220476398, 'rgfeg'),
(78, 782070734, 220476398, 'w'),
(79, 782070734, 220476398, 'ffwgegegb drbgerg egegegegbe egegegb egreg'),
(80, 531905367, 220476398, 'sefwfwf \\ewf'),
(81, 531905367, 220476398, 'efwe'),
(82, 531905367, 220476398, 'weg'),
(83, 531905367, 220476398, 'ergeg'),
(84, 531905367, 220476398, 've'),
(85, 531905367, 220476398, ' '),
(86, 531905367, 220476398, 'e'),
(87, 531905367, 220476398, 'b'),
(88, 531905367, 220476398, 'vebegeg'),
(89, 531905367, 220476398, 'eg5'),
(90, 531905367, 220476398, 'erf'),
(91, 531905367, 220476398, 'ef'),
(92, 531905367, 220476398, '.'),
(93, 531905367, 220476398, 'yoh'),
(94, 531905367, 220476398, 'hai'),
(95, 220476398, 531905367, 'Yoh ehlile ho ntso ho le buima.'),
(96, 100116056, 531905367, 'Hii'),
(97, 220476398, 531905367, '😪😪😪😪😪Kao chaee'),
(98, 220476398, 531905367, 'A ko nzame');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(200) NOT NULL,
  `post_unique_id` int(200) NOT NULL,
  `post_owner_id` int(200) NOT NULL,
  `post_msg` varchar(1000) DEFAULT NULL,
  `post_media` varchar(200) DEFAULT NULL,
  `post_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_unique_id`, `post_owner_id`, `post_msg`, `post_media`, `post_time`) VALUES
(9, 429727420, 100116056, 'Love Green', '1698034748crops.jpeg', '23 October 2023 06:19:08'),
(11, 1049075412, 100116056, 'One Love', NULL, '23 October 2023 06:20:32'),
(12, 1068476863, 100116056, '', '1698034865Android UI.jpg', '23 October 2023 06:21:05'),
(13, 1341443850, 100116056, 'Bonjour\'', NULL, '23 October 2023 06:24:41'),
(18, 1039085353, 220476398, 'I love mercedes', NULL, '23 October 2023 08:15:10'),
(19, 69832701, 220476398, 'Tonight is the night!😂😂😂', NULL, '23 October 2023 08:18:09'),
(20, 158330194, 220476398, 'My last post for the day', NULL, '23 October 2023 08:22:40'),
(21, 91606174, 220476398, '', '1698042833AI app.jpg', '23 October 2023 08:33:53'),
(22, 808773629, 220476398, 'Life is good.', '1698089296commercial.mp4', '23 October 2023 21:28:16'),
(23, 952739993, 220476398, '', '169808990959.png', '23 October 2023 21:38:29'),
(24, 831534415, 220476398, '', '1698090235beauty.jpg', '23 October 2023 21:43:55'),
(26, 619504086, 220476398, 'My first Song dropping soon!!!', '1698091384Music.mp4', '23 October 2023 22:03:04'),
(27, 1239493884, 220476398, 'The beauty!', '1698101178beauty.jpg', '24 October 2023 00:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(400) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `first_name`, `last_name`, `email`, `password`, `img`, `status`) VALUES
(1, 531905367, 'mofosi', 'mafusu', 'mfo@gmail.com', '1234', '1695886386cow.jpg', 'Offline now'),
(3, 100116056, 'Lekoetje', 'Linkoana', 'lekoetje@gmail.com', '1234', '1695933898profile.jpg', 'Offline now'),
(4, 1431183570, 'Steven', 'monku', 'steven@gmail.com', '1234', '1696318320profile2.jpg', 'Offline now'),
(5, 220476398, 'Ntoi', 'Maselaca', 'ntoi@gmail.com', '1234', '1698015687responsible.jpeg', 'Active now'),
(6, 782070734, 'Lekolulotshoana', 'Mofokeng', 'Loli@gmail.com', '1234', '1697524141farmer.jpeg', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
