-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: db5000064663.hosting-data.io
-- Generation Time: Jul 25, 2019 at 09:04 AM
-- Server version: 5.7.25-log
-- PHP Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs59373`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `user_id`) VALUES
(1, 'Bootstrap', 0),
(2, 'Javascript', 0),
(3, 'CSS', 0),
(8, 'PHP', 0),
(9, 'HTML', 0),
(10, 'Python', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(15, 85, 'ME', 'me@me.com', 'This is a comment', 'Approved', '2019-05-02'),
(16, 127, 'Jay', 'me@meme.com', 'This is a comment', 'Approved', '2019-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(11, 39, 85);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status_id` int(3) NOT NULL,
  `post_views_count` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status_id`, `post_views_count`, `likes`, `user_id`) VALUES
(85, 1, 'Test', '', 'rickyot', '2019-04-29', 'image_3.jpg', '<p>blah blah blah</p>', 'Bootstrap', 0, 2, 759, 7, 0),
(86, 2, 'Another One', '', 'Timbo', '2019-04-29', 'image_5.jpg', '<p>yawn</p>', 'Java', 0, 2, 353, 0, 0),
(87, 3, 'Testies', '', 'Jacko', '2019-04-29', 'image_1.jpg', '<p>gdfagfad</p>', 'CSS', 0, 2, 337, 0, 0),
(88, 8, 'Getting bored of this now', '', 'meyou', '2019-04-29', 'logo.png', '<p>rtrtrettrew</p>', 'rteqerwertre', 0, 2, 332, 0, 0),
(89, 9, 'errewrew', '', 'Axmax', '2019-04-29', 'image_2.jpg', '<p>ewrwqrerwerqr</p>', 'rewqrq', 0, 2, 367, 0, 0),
(106, 1, 'ghmjh', '', 'demo', '2019-04-29', 'image_1.jpg', '<p>mjhfmm</p>', 'mjhmjhmh', 0, 2, 1, 0, 0),
(107, 1, 'ghmjh', '', 'demo', '2019-04-29', 'image_1.jpg', '<p>mjhfmm</p>', 'mjhmjhmh', 0, 2, 0, 0, 0),
(108, 1, 'ghmjh', '', 'demo', '2019-04-29', 'image_1.jpg', '<p>mjhfmm</p>', 'mjhmjhmh', 0, 2, 0, 0, 0),
(109, 1, 'ghmjh', '', 'demo', '2019-04-29', 'image_1.jpg', '<p>mjhfmm</p>', 'mjhmjhmh', 0, 2, 0, 0, 0),
(110, 9, 'errewrew', '', 'Axmax', '2019-04-29', 'image_2.jpg', '<p>ewrwqrerwerqr</p>', 'rewqrq', 0, 2, 0, 0, 0),
(111, 8, 'Getting bored of this now', '', 'meyou', '2019-04-29', 'logo.png', '<p>rtrtrettrew</p>', 'rteqerwertre', 0, 2, 0, 0, 0),
(112, 3, 'Testies', '', 'Jacko', '2019-04-29', 'image_1.jpg', '<p>gdfagfad</p>', 'CSS', 0, 2, 0, 0, 0),
(113, 2, 'Another One', '', 'Timbo', '2019-04-29', 'image_5.jpg', '<p>yawn</p>', 'Java', 0, 2, 0, 0, 0),
(114, 1, 'Test', '', 'rickyot', '2019-04-29', 'image_3.jpg', '<p>blah blah blah</p>', 'Bootstrap', 0, 2, 0, 0, 0),
(115, 1, 'Test', '', 'rickyot', '2019-04-29', 'image_3.jpg', '<p>blah blah blah</p>', 'Bootstrap', 0, 2, 0, 0, 0),
(116, 2, 'Another One', '', 'Timbo', '2019-04-29', 'image_5.jpg', '<p>yawn</p>', 'Java', 0, 2, 0, 0, 0),
(117, 3, 'Testies', '', 'Jacko', '2019-04-29', 'image_1.jpg', '<p>gdfagfad</p>', 'CSS', 0, 2, 0, 0, 0),
(118, 8, 'Getting bored of this now', '', 'meyou', '2019-04-29', 'logo.png', '<p>rtrtrettrew</p>', 'rteqerwertre', 0, 2, 0, 0, 0),
(119, 9, 'errewrew', '', 'Axmax', '2019-04-29', 'image_2.jpg', '<p>ewrwqrerwerqr</p>', 'rewqrq', 0, 2, 0, 0, 0),
(120, 1, 'ghmjh', '', 'demo', '2019-04-29', 'image_1.jpg', '<p>mjhfmm</p>', 'mjhmjhmh', 0, 2, 0, 0, 0),
(121, 1, 'ghmjh', '', 'demo', '2019-04-29', 'image_1.jpg', '<p>mjhfmm</p>', 'mjhmjhmh', 0, 2, 0, 0, 0),
(124, 9, 'errewrew', '', 'Axmax', '2019-04-29', 'image_2.jpg', '<p>ewrwqrerwerqr</p>', 'rewqrq', 0, 2, 0, 0, 0),
(125, 1, 'Getting bored of this now', '', 'meyou', '2019-05-15', 'logo.png', '<p>rtrtrettrew</p>', 'rteqerwertre', 0, 2, 0, 0, 0),
(126, 1, 'tetetetet', '', 'Jay1', '2019-06-10', 'logo1-1-e1505658873389.png', '<p>etttetetett</p>', 'teetttt', 0, 1, 5, 0, 39),
(127, 1, 'rqwerewrqwrrq', '', 'Jay', '2019-05-20', 'image_5.jpg', 'ewqrwewrewrwwqwwwrqewreeqwrewqrwrwe', 'rewqrrew', 0, 1, 3, 0, 39);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL,
  `stat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`stat_id`, `stat_title`) VALUES
(1, 'Draft'),
(2, 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(19, 'Jay1', '$2y$12$rNVvZpkhqFS9lXGeq24AGuDYaaeQVdTDS3723l1eofVvVWEwYRiIu', 'Jamie', 'Sanderson', 'jay1@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', 'f4712f76e5b12c953835c3654071cd9a5df27ad5c2c165d857fbd58506e3dfaccbdefb7bd296c1fcc4ec6fb4c8e06dd5b3d5'),
(39, 'Jay', '$2y$12$HrbMDeYOCoUb3fsPYXhVV.yVXZNtEwgix5ezy9PfXnbXUXpK9/kNO', 'Jay', 'Sandypants', 'jay@jayjay.com', '', 'Administrator', '$2y$10$iusesomecrazystrings22', 'c8d7a3d36542f3c94ff815b279ceea66f5045dbbf19e90f65e381687cdcf34a63e57aa999eb9c65d92dbd3d6c1223b0b5936'),
(40, 'timbo', '$2y$12$.VPPgn8JPb67D/VI.6RGxOYkROtjuKbu4ZLcJRzmmbNMgSkTsAnW6', 'tim', 'carter', 'tim@tmcweb.co.uk', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(51, 'gdsggds', '$2y$12$7MewQBW9/kzSeT7QleNIKe2fkowENbNG6gsjFMc1dyMl9ZmbW5iB6', 'hgsfgdf', 'dfgsf', 'fdsgdg@dsfad.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(52, 'gfdsfg', '$2y$12$WZYvxk5ywZer4BmyJ92gWOHLP0tFDcrokjjGMn9jQE84IUTQGR0RK', 'fg', 'fdgs', 'gfdsfdd@ghddg.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(53, 'jgjhfhg', '$2y$12$VYzVs7pgT.LViHDjRPV1RuUPz6OmNqjXCGjlvs.lkXPigYE.dF/Q.', 'jhhghj', 'jhgf', 'jgj@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(54, 'trert', '$2y$12$A9eMsu/7O8jxs8AOjfR0IeeIJuwemNUVFiwmkNaDHmiYJlpgQW.J6', 'tretrt', 'tret', 'treteter@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(55, 'jujju', '$2y$12$rMTlL6RmP7qUJqRDConUN.dQqEmZJhVYyUo01gdue89Bt8LU/HQxS', 'juj', 'juj', 'juj@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(56, 'lolo', '$2y$12$rs5ZmaZDHX6XdEhv4YG/VOwO0BWros5U5XhMUry11hXRXbdduyXHO', 'lolo', 'lolo', 'lolo@lol.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(57, 'cvcv', '$2y$12$2YekEHiKo1X0V/3/p7YNB.Dlag5K6n5Lx88tAlPJbCcJTOK7y3mPC', 'vcvcvc', 'cvcvc', 'cvcvcv@htr.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(58, 'eqwe', '$2y$12$LNi5Fh.fEqo/mzc1Y7PDtunkSG1fRWeRhiy9HQzPSG/Yk83Oz3rs6', 'ewqqwew', 'eqwewe', 'qwewqe@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(59, 'vcxzv', '$2y$12$mhZutOsF.13D2MFNuLFLje8CYH9ap1/IMY7H.zJiLwtZfgU3txf/.', 'vcxzv', 'vcxzvz', 'vcxzvc@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(60, 'cdsdcs', '$2y$12$O/qCiMWS0OKTGk2IDLLH0uydgypFOjVy0LyMtAzsxvUiP6Opj0PeC', 'cdscdsc', 'cdscdc', 'cdssdc@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(61, 'cdsdcsrfd', '$2y$12$SeGS3czzuCRege3158USzeuK5bOzO8Wq0yz0wJkyNR1g1YPk2Hjxm', 'cdscdsc', 'cdscdc', 'cdssdcfd@me.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(62, 'dsfads', '$2y$12$SdEWSKomAHcYOi/1TatUreI6MquAA3tp6o0htmWutluHcf.B2JtAG', 'fdadffds', 'dfsfaf', 'dsfa@gsh.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', ''),
(63, 'Dannyg', '$2y$12$pFdt.huLI6cpnXQsj2Ppge9RvVziNzjP9cl.GXfjeusrNxXcwewHq', 'Danny', 'Guy', 'danny@stratospherec.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'rerj67fr3anis1g0ljoolo7941', 1556802080),
(2, 'f088c3a9p915edme886fo3uar2', 1558004063),
(3, 'jn733qqudi6ls2tvfca77gv9ne', 1556863453),
(4, 'do7klqnja9lesln5c8movah9l9', 1558419449),
(5, 'tbmq0dn52umsbi803a0cmiic9f', 1558088751),
(6, 'fee641b02b9c32144fe647e5255bbb47', 1560155601),
(7, 'e4febee007fd444e585797c0e100f092', 1560160332),
(8, 'a20a2e9350aeaeaba9341882cf7db04f', 1560171719),
(9, 'f4cff03525c55bae790682d54f1b2e19', 1560167110),
(10, '5b45be9c609c75e8191d04b366116870', 1560167891),
(11, 'e6b64a127aeaaec958d58a9693e3cc40', 1560169798),
(12, '739481ead600971eab6548d1a21e8a93', 1560170801);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
