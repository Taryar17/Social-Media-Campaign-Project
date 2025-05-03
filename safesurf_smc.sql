-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 06:24 PM
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
-- Database: `safesurf_smc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `email` varchar(300) NOT NULL,
  `sentdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `message`, `email`, `sentdate`) VALUES
(7, 'Hi, I recently came across your website, and I find the content very helpful. I have a few questions regarding online safety for teenagers. Can you provide more resources or direct me to where I can find detailed information?', 'susu@gmail.com', '2024-08-01 06:25:20'),
(8, 'Hello, I think it would be great if you could add more content on the mental health impact of social media use. Many parents and teenagers would benefit from this information.', 'kyaw@gmail.com', '2024-08-01 06:26:02'),
(10, 'Can you provide more details about the \'Advanced Security Measures\' workshop scheduled for next month? I\'m particularly interested in the topics covered and the registration process.', 'thiri@gmail.com', '2024-08-01 06:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `howparenthelp`
--

CREATE TABLE `howparenthelp` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `howparenthelp`
--

INSERT INTO `howparenthelp` (`id`, `title`, `description`, `image1`, `image2`) VALUES
(7, 'Stay involved and communicate openly with your teenager', 'It\'s crucial to maintain open communication with your teenager regarding their online activities. By staying involved, you can better understand their interests, challenges, and interactions in the digital world. This involvement allows you to offer guidance, support, and help navigate any issues that may arise online. Regular conversations about their favorite websites, apps, and social media platforms can build trust and make them feel comfortable discussing their online experiences. Encourage them to share both positive and negative encounters, and use these discussions as opportunities to teach them about safe online practices. Being proactive rather than reactive can help you address potential issues before they escalate.', 'Communication.jpg', 'Communication1.jpg'),
(8, 'Set boundaries and establish clear rules for social media use', 'Setting boundaries and establishing clear rules for social media use helps create a framework for responsible online behavior. Discussing these rules together ensures mutual understanding and agreement on expectations regarding content consumption, posting frequency, privacy settings, and interactions with others online. Establish guidelines that balance the need for online engagement with the importance of maintaining privacy and security. For example, set rules about the types of information that should not be shared publicly, such as personal details and location. Also, agree on consequences for violating these rules to ensure accountability. Make sure the rules are adaptable as your teenager grows and their digital needs change, and review them periodically to keep them relevant.', 'Limit.jpg', 'Limit1.jpg'),
(9, 'Encourage a healthy balance between online and offline activities', 'Encouraging a healthy balance between online and offline activities promotes overall well-being. Encourage your teenager to engage in diverse offline activities such as hobbies, sports, and social interactions. Setting aside designated screen-free times and spaces helps reduce screen time and fosters a balanced lifestyle. Plan family activities that do not involve screens, such as outdoor adventures, game nights, or creative projects. Support their interests in extracurricular activities that build skills and social connections. By promoting a variety of interests and experiences, you help your teenager develop a well-rounded lifestyle that values both digital and real-world interactions.', 'Encourage.jpg', 'Encourage1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(8) NOT NULL,
  `city` varchar(200) NOT NULL,
  `subscription` int(11) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `password`, `city`, `subscription`, `usertype`) VALUES
(1, 'susu', 'susu@gmail.com', '12345', 'Yangon', 1, 0),
(2, 'Admin', 'admin@smc.com', '12345', 'Yangon', 1, 1),
(3, 'Kyaw', 'kyaw@gmail.com', '12345', 'Yangon', 1, 0),
(4, 'Thiri', 'thiri@gmail.com', '12345', 'Yangon', 1, 0),
(5, 'aung aung', 'aungaung@gmail.com', '12345', 'Mandalay', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `publishdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `content`, `image`, `publishdate`) VALUES
(1, 'About Capcut: A Popular Editing App', 'This month our newsletter looks at a new app called Capcut.  It is owned by the same owners as TikTok and is a video editing app. CapCut state that their services are intended for those over the age of 13 and those under the age of 18 must have consent from their parent/legal guardian. It is rated as 12+ on the App store.', 'capcut.jpg', '2024-06-28 04:18:59'),
(7, 'Spotlight on Discord: Safety and Usage', 'In this edition, we explore Discord, a popular app for voice, video, and text communication among gamers and communities. Discord has implemented numerous safety features, including two-factor authentication and privacy settings, to ensure a safe user experience. The app is recommended for users aged 13 and above, with parental guidance advised for younger teens.', 'Discord.jpg', '2024-07-25 09:50:30'),
(8, 'Navigating TikTok\'s Family Pairing Mode', 'This month, we examine Family Pairing mode in TikTok, which allows parents to link their account with the accounts of their teenager to set restrictions and monitor activity. TikTok aims to create a safer environment for users aged 13 and up, with features like screen time management and restricted mode.', 'Tiktok-family-pairing.jpg', '2024-07-25 10:01:30'),
(9, 'YouTube Kids: A Safe Space for Children', 'This edition focuses on YouTube Kids, a child-friendly version of YouTube that provides a safer environment for kids to explore videos. YouTube Kids offers parental controls to customize the content and screen time limits. The app is designed for children under 13, with parents advised to guide their usage.', 'youtube kids.jpg', '2024-07-25 10:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `info`, `createdat`) VALUES
(7, 'Digital Citizenship and Ethics', 'Explore the principles of digital citizenship and learn how to navigate the online world ethically and responsibly.', 'Date: October 21, 2024\r\nLocation: Virtual Event', '2024-07-24 17:45:51'),
(8, 'Advanced Social Media Security', 'Deep dive into advanced techniques for securing your social media accounts and managing privacy settings effectively.', 'Date: September 15, 2024\r\nLocation: Virtual Event', '2024-07-24 17:46:27'),
(9, 'Online Safety Basics', 'Join our foundational workshop to learn the basics of online safety and best practices for protecting personal information.', 'Date: August 10, 2024\r\nLocation: Virtual Event', '2024-07-24 17:51:59'),
(10, 'Internet of Things (IoT) Security', 'Discover how to secure your IoT devices and protect your smart home from cyber-attacks.', 'Date: December 15, 2024\r\nLocation: Virtual Event', '2024-07-25 09:32:27'),
(11, 'Safe Online Shopping', 'Understand the best practices for safe online shopping, including identifying secure websites and avoiding scams.', 'Date: November 5, 2024\r\nLocation: Virtual Event', '2024-07-25 09:32:42'),
(12, 'Digital Footprint Awareness', 'Join our interactive session to learn about the impact of your digital footprint and how to manage your online presence effectively.', 'Date: August 20, 2024\r\nLocation: Virtual Event', '2024-07-25 09:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `socialmediaapps`
--

CREATE TABLE `socialmediaapps` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `privacylink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `socialmediaapps`
--

INSERT INTO `socialmediaapps` (`id`, `name`, `logo`, `link`, `privacylink`) VALUES
(4, 'Facebook', 'facebook_2504903.png', 'https://www.facebook.com/login', 'https://www.facebook.com/policy.php'),
(7, 'Twitter', 'twitter_2504947.png', 'https://twitter.com/login', 'https://twitter.com/en/privacy'),
(8, 'Instagram', 'instagram_2504918.png', 'https://www.instagram.com/accounts/login/', 'https://help.instagram.com/519522125107875'),
(9, 'LinkedIn', 'linkedin_2504923.png', 'https://www.linkedin.com/login', 'https://www.linkedin.com/legal/privacy-policy'),
(10, 'Whatsapp', 'whatsapp_2504957.png', 'https://web.whatsapp.com/', 'https://www.whatsapp.com/legal/#privacy-policy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howparenthelp`
--
ALTER TABLE `howparenthelp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmediaapps`
--
ALTER TABLE `socialmediaapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `howparenthelp`
--
ALTER TABLE `howparenthelp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `socialmediaapps`
--
ALTER TABLE `socialmediaapps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
