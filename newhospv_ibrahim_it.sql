-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2023 at 11:46 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newhospv_ibrahim_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` text NOT NULL,
  `city` varchar(55) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `user_id`, `image`, `website`, `phone`, `age`, `degree`, `city`, `status`) VALUES
(1, 'A short story about me , my mission, thinking and craft', 'I’m a web designer who aware of the tiny moments in a persons life that reveal greater truths. Aliquam erat volutpat. Nullam imperdiet sapien felis, non lobortis odio mattis in. Quisque dapibus aliquet dictum. Integer dapibus ullamcorper est, ac .', 1, 'image/956162686.jpg', 'https://fkgouripur.com/rakibsoft', '1234567890', 30, 'Master', 'New York, USA', 1),
(2, 'this is title', 'this is description ', 2, 'image/151600634.jpg', 'https://fkgouripur.com/rakibsoft', '01757967432', 32, 'Master', 'New York, USA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text,
  `image` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `image`, `user_id`, `create_date`, `status`) VALUES
(1, 'Stay informed about the latest cameras and money of that', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'image/581253956.jpg', 1, '2023-08-09', 1),
(2, 'What Resources help you with your photography', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'image/205084475.jpg', 1, '2023-09-18', 1),
(3, 'A short story about me , my mission, thinking and craft.', 't is a long established fact that a ', 'image/1263098996.jpg', 1, '2023-09-24', 1),
(4, 'Get Inspiration from photo stories, interviews, and resource', 't is a long established fact that a ', 'image/86852131.jpg', 1, 'NULL', 1),
(6, 'টেস্ট করা ব্লগ', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'image/660275003.jpg', 1, NULL, 1),
(8, 'What is in a blog?', 'blog, in full Web log or Weblog, online journal where an individual, group, or corporation presents a record of activities, thoughts, or beliefs. Some blogs operate mainly as news filters, collecting various online sources and adding short comments and Internet links.Sep', 'image/711449892.jpg', 2, NULL, 1),
(9, '22 of the best blog examples in 2023 that\'ll inspire your blogging journey', 'A blog is your creative space. It’s where you can share your brand’s story or impart your wisdom using  your own words, with your own visual language to match. Fortunately, you don’t need to be a professional writer to create a successful blog either. All you need is a genuine passion for your field, lots to say and a stylish canvas on which to say it. To learn how to create a blog of your own, check out this list of 22 of the best blogs below. Further down, we’ve included tips for how to start a blog that your audience will love.\r\n\r\n', 'image/1438233489.png', 2, '2023-10-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `user_id`, `create_date`, `status`) VALUES
(1, 'Web Design & Development', 1, '2023-09-24', 1),
(2, 'ERP Software Solution', 1, '2023-09-24', 1),
(3, 'Mobile Apps Design & Development', 1, '2023-09-24', 1),
(4, 'Home & Office Automation IoT Device Development', 1, '2023-09-24', 1),
(6, 'IT Support Engineer', 1, NULL, 1),
(7, 'Network Architecture Design', 1, NULL, 1),
(8, 'CCTV Security System Architecture Design', 1, NULL, 1),
(12, 'test', 2, '2023-10-02', 1),
(13, 'another category', 2, '2023-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `email_address` varchar(55) NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `location` text NOT NULL,
  `map_link` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `email_address`, `phone_number`, `location`, `map_link`, `user_id`, `create_date`, `status`) VALUES
(1, 'rakibas375@gmail.com', '01234567899', 'cumilla,bangladesh ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36697.17874648754!2d90.7359488111107!3d23.52222339347026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754518ff07e2f55%3A0xc293e52f5a577511!2z4Kam4Ka-4KaJ4Kam4KaV4Ka-4Kao4KeN4Kam4Ka_IOCmrOCmsuCmpuCmvuCmluCmvuCmsg!5e1!3m2!1sen!2sbd!4v1695550779133!5m2!1sen!2sbd\" ', 1, '2023-09-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `design_skill`
--

CREATE TABLE `design_skill` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `design_skill`
--

INSERT INTO `design_skill` (`id`, `item`, `percentage`, `user_id`) VALUES
(1, 'Logo Design', '100', 1),
(2, 'Web Design', '90', 1),
(3, 'Illustration', '85', 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `status`, `create_date`) VALUES
(1, 'Art University - New Yorkssss', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', 1, '2012-09-24', '2023-09-24', 1, '2023-09-24'),
(2, 'Photographer Course - Canada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', 1, '2015-09-24', '2017-09-25', 1, '2023-09-24'),
(3, 'Writing Course - New York', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n\r\n', 1, '2017-09-24', '2019-09-26', 1, '2023-09-24'),
(4, 'Advetising Course - Canada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', 1, '2019-09-12', '2021-09-19', 1, '2023-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `title`, `description`, `start_date`, `end_date`, `user_id`, `status`, `create_date`) VALUES
(1, 'Team Leader', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2017-09-19', '2018-09-19', 1, 1, '2023-09-27'),
(2, 'Business Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2019-09-18', '2021-09-24', 1, 1, '2023-09-27'),
(3, 'Marketing Managment', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2019-09-24', '2021-09-25', 0, 1, '2023-09-27'),
(4, 'Advetising', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2021-09-18', '2021-09-24', 1, 1, '2023-09-27'),
(5, 'software developer ', 'test description ', '2023-09-14', '2023-09-29', 1, 1, NULL),
(6, 'Team Leader', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2017-09-19', '2018-09-19', 2, 1, '2023-09-27'),
(7, 'Business Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2019-09-18', '2021-09-24', 2, 1, '2023-09-27'),
(8, 'Marketing Managment', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2019-09-24', '2021-09-25', 2, 1, '2023-09-27'),
(9, 'Advetising', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare.\r\n\r\n', '2021-09-18', '2021-09-24', 2, 1, '2023-09-27'),
(10, 'software developer ', 'test description ', '2023-09-14', '2023-09-29', 2, 1, '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `description`, `banner`, `user_id`, `create_date`, `status`) VALUES
(2, 'Leader of developers like - PHP, Dart, IoT, Network, Security', 'Md. Ibrahim Khalil', 'image/2036631583.jpg', 1, '2023-09-16', 1),
(5, 'PHP Laravel Backend Developer', 'Hello , I’m Md. Rakib Mahmud Welcome to my \"IT World\"', 'image/774906790.jpg', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `item`, `percentage`, `user_id`) VALUES
(2, 'Engliash', '100%', 1),
(3, 'Bangla', '100%', 1),
(4, 'Franch', '90%', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `message` text NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `message`, `create_date`, `status`, `user_id`) VALUES
(2, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'this is message ', '2023-09-24', 1, 0),
(3, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'saddfd', '2023-09-24', 1, 0),
(4, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'saddfd', '2023-09-24', 1, 0),
(5, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'saddfd', '2023-09-24', 1, 0),
(6, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'this is message\r\n', '2023-09-24', 1, 0),
(7, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'this is message\r\n', '2023-09-24', 1, 0),
(8, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'ddd', '2023-09-24', 1, 0),
(9, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'asdfasdf', '2023-09-24', 1, 0),
(10, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'cccc', '2023-09-26', 1, 0),
(12, 'Rakib Mahmud', 'rakibas375@gmail.com', '01757967432', 'asdfasd', '2023-10-07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `create_date` date DEFAULT NULL,
  `email_address` varchar(55) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`id`, `message`, `post_id`, `first_name`, `create_date`, `email_address`, `status`, `user_id`) VALUES
(1, 'In a professional context it often happens that private or corporate clients corder a publication to be made.In a professional context it often happens that private.', 1, 'Rakib Mahmud', '2023-09-18', 'rakibas375@gmail.com', 0, 0),
(2, 'In a professional context it often happens that private or corporate clients corder a publication to be made.In a professional context it often happens that private.', 1, 'Rakib Mahmud', '2023-09-18', 'rakibas375@gmail.com', 0, 0),
(3, 'message for comment', 1, 'Rakib Mahmud', '2023-09-26', 'rakibas375@gmail.com', 0, 0),
(4, 'hey bro how are you ', 2, 'shakib mia', '2023-09-26', 'shakib@gmail.com', 0, 0),
(5, 'asdfasd', 2, 'new template', '2023-09-26', 'rakibas375@gmail.com', 1, 0),
(6, 'heyy ,,,', 3, 'Rakib Mahmud', '2023-09-26', 'rakibas375@gmail.com', 0, 0),
(7, 'dfasdfas', 6, 'Rakib Mahmud', '2023-10-06', 'rakibas375@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `resume_upload` text,
  `site_title` text,
  `site_logo` text,
  `create_date` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `name`, `image`, `resume_upload`, `site_title`, `site_logo`, `create_date`, `status`) VALUES
(1, 1, 'Md. Ibrahim Khalil', 'image/1863464541.jpg', 'image/759890333.pdf', 'welcome to my portfollio', 'image/1508420140.png', '2023-09-18', 1),
(2, 2, 'Rakib Mahmud', 'image/557649868.png', 'image/759890333.pdf', 'welcome to my portfollio', 'image/483532195.png', '2023-09-18', 1),
(3, 15, 'Shakib  Hossain', '', '', '', '', '2023-10-03', 1),
(4, 16, 'sajjad ahmed', '', '', '', '', '2023-10-07', 1),
(5, 17, 'Rayhan khan', '', '', '', '', '2023-10-10', 1),
(6, 18, 'Rakib Mahmud', '', '', '', '', '2023-10-10', 1),
(7, 19, 'Rakib Mahmud', '', '', '', '', '2023-10-10', 1),
(8, 20, 'arif hasan', '', '', '', '', '2023-10-10', 1),
(9, 21, 'rakib  Mahmud', '', '', '', '', '2023-10-10', 1),
(10, 22, 'jahid hasan', '', '', '', '', '2023-10-11', 1),
(11, 23, 'rakib  Mahmud', '', '', '', '', '2023-10-11', 1),
(12, 24, 'shamim ahmed', '', '', '', '', '2023-10-11', 1),
(13, 25, 'rakib  Mahmud', '', '', '', '', '2023-10-11', 1),
(14, 26, 'rakib  Mahmud', '', '', '', '', '2023-10-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`, `user_id`, `create_date`, `status`) VALUES
(1, 'image/400781989.png', 'Web Design & Development', 'In a professional context it often happens that private or corporate clients order a publication to be made.', 1, '2023-09-24', 1),
(2, 'image/1001114011.png', 'ERP Software Solution', 'n a professional context it often happens that private or corporate clients corder a publication to be made.', 1, '2023-09-24', 1),
(3, 'image/1702200412.png', 'Home & Office Automation IoT Device Development', 'In a professional context it often happens that private or corporate clients corder a publication to be made.\r\n\r\n', 1, '2023-09-24', 1),
(4, 'image/615291315.png', 'Mobile Apps Design & Development', 'In a professional context it often happens that private or corporate clients corder a publication to be made.\r\n\r\n', 1, '2023-09-24', 1),
(5, 'image/125268966.png', 'IT Support Engineer', 'In a professional context it often happens that private or corporate clients corder a publication to be made.\r\n\r\n', 1, '2023-09-24', 1),
(6, 'image/1616906787.png', 'Network Architecture Design', 'In a professional context it often happens that private or corporate clients corder a publication to be made.\r\n\r\n', 1, '2023-09-24', 1),
(7, 'image/549064413.png', 'CCTV Security System Architecture Design', 'CCTV Security System Architecture Design', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_icon`
--

CREATE TABLE `social_icon` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `link` text,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_icon`
--

INSERT INTO `social_icon` (`id`, `name`, `link`, `user_id`) VALUES
(1, 'bi bi-whatsapp t-green', 'https://api.whatsapp.com/send/?phone=8801719372034&text&type=phone_number&app_absent=0', 1),
(2, 'bi bi-instagram t-purple', 'https://youtube.com', 1),
(3, 'bi bi-dribbble t-red', 'https://youtube.com', 1),
(5, 'asdfas', 'https://facebook.com', 2),
(7, 'dddd', 'dddd', 2),
(8, 'bi bi-whatsapp t-green', 'https://api.whatsapp.com/send/?phone=8801719372034&text&type=phone_number&app_absent=0', 2),
(9, 'bi bi-instagram t-purple', 'https://youtube.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `icon` text NOT NULL,
  `complete_count` int(55) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `title`, `icon`, `complete_count`, `user_id`) VALUES
(1, 'Logo Design', 'bi bi-whatsapp', 286, 1),
(2, 'Web Design', 'bi bi-palette', 6549, 1),
(3, 'Illustration', 'bi bi-whatsapp', 793, 1),
(4, 'Project Done', 'bi bi-palette', 287, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table2`
--

INSERT INTO `table2` (`id`, `title`, `description`, `user_id`) VALUES
(1, 'I have been able to experience & developing this type of skill.', 'I was doing everything in my power to provide me with all the experiences to provide cost-effective and high quality products to satisfy my customers all over the world\r\n\r\n', 1),
(2, 'default Title', 'Default Description', 15),
(3, 'default Title', 'Default Description', 16),
(4, 'default Title', 'Default Description', 17),
(5, 'default Title', 'Default Description', 18),
(6, 'default Title', 'Default Description', 19),
(7, 'default Title', 'Default Description', 20),
(8, 'default Title', 'Default Description', 21),
(9, 'default Title', 'Default Description', 22),
(10, 'default Title', 'Default Description', 23),
(11, 'default Title', 'Default Description', 24),
(12, 'default Title', 'Default Description', 25),
(13, 'default Title', 'Default Description', 26);

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table3`
--

INSERT INTO `table3` (`id`, `item`, `user_id`) VALUES
(1, 'Graphics and animations', 1),
(2, 'Video Formality', 1),
(4, 'Short Animationsg', 1),
(5, 'Teaching Web Design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_image` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `template_id`, `user_id`, `template_name`, `template_image`, `status`, `date`) VALUES
(1, 1, 1, 'Dark Template', 'image/dark.jpg', 1, '2023-09-14'),
(2, 2, 1, 'Colorfull Template', 'image/colorfull.jpg', 0, '2023-09-14'),
(3, 3, 1, 'Light Template', 'image/light.png', 0, '2023-09-15'),
(5, 1, 2, 'Dark Template', 'image/dark.jpg', 1, '2023-09-14'),
(6, 2, 2, 'Colorfull Template', 'image/colorfull.jpg', 0, '2023-09-14'),
(7, 3, 2, 'Light Template', 'image/light.png', 0, '2023-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `mouth_word` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `user_id`, `name`, `mouth_word`, `designation`, `image`, `create_date`, `status`) VALUES
(1, 1, 'Rahat fathe ali khan', '\"My motivation is customer satisfaction. Trust me and trust your growth asset management to my expertise gained over the years. My goal is continuous achievement.!\"', 'software developer', 'image/1648485840.jpg', '2023-09-30', 1),
(2, 1, 'Rakib Mahmud', '\"My motivation is customer satisfaction. Trust me and trust your growth asset management to my expertise gained over the years. My goal is continuous achievement.!\"', 'software developer', 'image/311558135.jpg', '2023-09-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `username` varchar(244) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` text NOT NULL,
  `phone_number` varchar(55) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1=Male\r\n2=Female',
  `last_login` text,
  `create_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=Active \r\n0=Deactive',
  `user_type` int(11) DEFAULT NULL COMMENT '1=''Admin'' 0=''Normal User'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `phone_number`, `gender`, `last_login`, `create_date`, `expire_date`, `status`, `user_type`) VALUES
(1, NULL, NULL, 'ibrahim1212', 'ibrahim1212@gmail.com', 'ibrahim1212', NULL, NULL, '1696684310', '2023-10-18', '2023-11-01', 1, 1),
(2, NULL, NULL, 'rakibas375', '', 'iloverakib', NULL, NULL, '1696999281', '2023-10-01', '2023-11-02', 1, 0),
(3, NULL, NULL, 'rakibas3s75', '', 'iloverakib', NULL, NULL, '1696322267', '2023-10-01', '2023-11-02', 1, 0),
(4, NULL, NULL, 'rakibas37s5', '', 'iloverakib', NULL, NULL, '1696152545', '2023-10-01', '2023-11-02', 1, 0),
(9, NULL, NULL, 'mahim', '', 'mahim', NULL, NULL, NULL, '2023-10-01', '2023-11-01', 1, 0),
(10, NULL, NULL, 'jihad1212', '', 'jihad1212', NULL, NULL, '1696164690', '2023-10-01', '2023-10-02', 0, 0),
(12, 'rakib ', 'Mahmud', 'ssssssssssss', 'rakibas375@gmail.com', 'ddd', '01757967432', 1, '1696314021', '2023-10-03', '2023-12-07', 1, 0),
(15, 'Shakib ', 'Hossain', 'shakib', 'shakib@gmail.com', '123', '01757967432', 1, '1696316671', '2023-10-03', '2023-10-25', 1, 0),
(16, 'sajjad', 'ahmed', 'sajjad', 'sajjad@gmail.com', 'sajjad', '01757967432', 1, NULL, '2023-10-07', '0000-00-00', 0, 0),
(17, 'Rayhan', 'khan', 'rayhan', 'rayhan@gmail.com', 'rayhan', '01757967432', 1, NULL, '2023-10-10', '0000-00-00', 0, 0),
(19, 'Rakib', 'Mahmud', 'rakiba111s375', 'rakibas375@gmail.com', '1111', '01757967432', 1, NULL, '2023-10-10', '0000-00-00', 0, 0),
(20, 'arif', 'hasan', 'arif', 'arif@gmail.com', '1234', '01757967432', 1, NULL, '2023-10-10', '0000-00-00', 0, 0),
(21, 'rakib ', 'Mahmud', 'rakibas3ddd75', 'rakibas375@gmail.com', 'dddd', '01757967432', 1, NULL, '2023-10-10', '0000-00-00', 0, 0),
(22, 'jahid', 'hasan', 'jahid', 'jahid@gmail.com', 'jahid', '01990890978', 1, NULL, '2023-10-11', '0000-00-00', 0, 0),
(23, 'rakib ', 'Mahmud', 'rakddibas375', 'rakibass375@gmail.com', 'dddd', '01757967432', 1, NULL, '2023-10-11', '0000-00-00', 0, 0),
(24, 'shamim', 'ahmed', 'shamim', 'shamim@gmail.com', 'shamim', '01757967432', 1, NULL, '2023-10-11', '0000-00-00', 0, 0),
(25, 'rakib ', 'Mahmud', 'rakibasdsds375', 'rakibass375@gmail.com', 'dddd', '01757967432', 1, NULL, '2023-10-11', '0000-00-00', 0, 0),
(26, 'rakib ', 'Mahmud', 'rakibdddas375', 'rakibas375@gmail.com', 'dddd', '01757967432', 1, NULL, '2023-10-11', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `link` text,
  `link_type` int(11) DEFAULT NULL COMMENT '	1=audio, 2=video, 3=docs	',
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `category_id`, `title`, `image`, `link`, `link_type`, `user_id`, `status`) VALUES
(1, 1, 'Web Design & Development', 'image/1305066693.jpg', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/221650664&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true', 1, 1, 1),
(2, 2, 'ERP Software Solution', 'image/1872834770.jpg', 'https://player.vimeo.com/video/158284739', 2, 1, 1),
(3, 4, 'Home & Office Automation IoT Device Development', 'image/1734391898.jpg', '', 3, 1, 1),
(6, 3, 'Mobile Apps Design & Development', 'image/1991685108.jpg', 'https://www.youtube.com/watch?v=u2NAuswnTKs', 2, 1, 1),
(7, 12, 'this is test title', 'image/488594302.jpg', 'https://www.youtube.com/watch?v=u2NAuswnTKs', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

CREATE TABLE `work_details` (
  `id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_details` text NOT NULL,
  `project_overview` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `project_value` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `designer` varchar(55) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_details`
--

INSERT INTO `work_details` (`id`, `work_id`, `user_id`, `project_details`, `project_overview`, `client_name`, `project_value`, `location`, `designer`, `image1`, `image2`, `image3`, `date`, `status`) VALUES
(6, 3, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'Rakib Mahmud', 18000, 'cumilla', 'Shakib Khan', 'image/1844500069.jpg', 'image/21644487038.jpg', 'image/32023446586.jpg', '2023-10-02', 1),
(7, 7, 2, 'A blog is your creative space. It’s where you can share your brand’s story or impart your wisdom using  your own words, with your own visual language to match. Fortunately, you don’t need to be a professional writer to create a successful blog either. All you need is a genuine passion for your field, lots to say and a stylish canvas on which to say it. To learn how to create a blog of your own, check out this list of 22 of the best blogs ', 'A blog is your creative space. It’s where you can share your brand’s story or impart your wisdom using  your own words, with your own visual language to match. Fortunately, you don’t need to be a professional writer to create a successful blog either. All you need is a genuine passion for your field, lots to say and a stylish canvas on which to say it. To learn how to create a blog of your own, check out this list of 22 of the best blogs ', 'Rakib Mahmud', 18000, 'cumilla', 'Shakib Khan', 'image/11414433238.jpg', 'image/21956491841.jpg', 'image/31080181354.jpg', '2023-10-02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_skill`
--
ALTER TABLE `design_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icon`
--
ALTER TABLE `social_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_details`
--
ALTER TABLE `work_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `design_skill`
--
ALTER TABLE `design_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_icon`
--
ALTER TABLE `social_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_details`
--
ALTER TABLE `work_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
