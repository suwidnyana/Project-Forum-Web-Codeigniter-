-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2019 at 02:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projectweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 3, 'Makanan', '2019-02-16 21:56:44'),
(2, 3, 'Tech', '2019-02-16 21:57:24'),
(4, 3, 'Framework', '2019-02-22 09:08:26'),
(5, 4, 'Meme', '2019-02-22 09:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 31, 'John Doe', 'jdoe@gmail.com', 'Great', '2019-02-21 16:52:29'),
(2, 31, 'A', 'jdoe@gmail.com', 'A', '2019-02-21 16:56:05'),
(3, 31, 'Apotek', 'grayfullbuster522@gmail.com', 'y', '2019-02-21 16:58:55'),
(4, 30, 'User', 'ptsuwidnyana@gmail.com', 'Thats Great !', '2019-02-21 16:59:25'),
(5, 31, 'grayfullbuster522', 'jdoe@gmail.com', 'A', '2019-02-21 17:25:08'),
(6, 31, 'Suwidnyana', 'jdoe@gmail.com', 'Mepet jaraknya!', '2019-02-21 17:49:01'),
(7, 30, 'Suwidnyana', 'jdoe@gmail.com', 'Wahh', '2019-02-21 17:50:41'),
(8, 33, 'Saya', 'akukeren@nama.com', 'Mantap Cukk!', '2019-02-23 16:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(30, 4, 3, 'Codeigniter', 'Codeigniter', '<p>CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.</p>\r\n', 'download.png', '2019-02-21 11:36:35'),
(31, 5, 3, 'ShitPost', 'ShitPost', '<p>Commonly known as unconstructive or unnecessary posts.<br />\r\n<br />\r\nRecently known as #dotnet_discord-net in the Discord&nbsp;<a href=\"https://www.urbandictionary.com/define.php?term=API\" onclick=\"ga(\'send\', \'event\', \'Autolink\', \'Click\', \">API</a>&nbsp;guild. A channel that once was a learning and knowledge foundation for the unofficial (dot)net&nbsp;<a href=\"https://www.urbandictionary.com/define.php?term=wrapper\" onclick=\"ga(\'send\', \'event\', \'Autolink\', \'Click\', \">wrapper</a>for Discord API. Now has become the home of shitty memes, and&nbsp;<a href=\"https://www.urbandictionary.com/define.php?term=overcompensating\" onclick=\"ga(\'send\', \'event\', \'Autolink\', \'Click\', \">overcompensating</a>&nbsp;star posts.</p>\r\n\r\n<p>Example:&nbsp;<br />\r\nsarcasmloading:&nbsp;<a href=\"https://www.urbandictionary.com/define.php?term=async\" onclick=\"ga(\'send\', \'event\', \'Autolink\', \'Click\', \">async</a>&nbsp;voids, == true,&nbsp;<a href=\"https://www.urbandictionary.com/define.php?term=Still%27s\" onclick=\"ga(\'send\', \'event\', \'Autolink\', \'Click\', \">Still&#39;s</a>&nbsp;&quot;voluntary&quot; doc work, visual basic, ect...&nbsp;<br />\r\nCasino Boyale:&nbsp;<a href=\"https://www.urbandictionary.com/define.php?term=Great%20shit\" onclick=\"ga(\'send\', \'event\', \'Autolink\', \'Click\', \">Great shit</a>&nbsp;posting mate, that is ABSOLUTELY hilarious, star post that!&nbsp;<br />\r\n`$&quot;{nameof(AntiTcb)}&quot;`: *facepalm*</p>\r\n', '13177737_10208346867163626_2416549523696876006_n.jpg', '2019-02-21 11:37:21'),
(33, 4, 3, 'Laravel', 'Laravel', '<p>Laravel adalah kerangka kerja aplikasi web berbasis PHP yang open source, menggunakan konsep model&ndash;view&ndash;controller. Laravel berada dibawah lisensi MIT, dengan menggunakan GitHub sebagai tempat berbagi kode.</p>\r\n', 'laravel.png', '2019-02-22 09:08:11'),
(34, 1, 3, 'God Of War', 'God-Of-War', '<p><em><strong>God of War</strong></em> is a <a href=\"https://en.wikipedia.org/wiki/Mythology\">mythology</a>-based <a href=\"https://en.wikipedia.org/wiki/Action-adventure_game\">action-adventure</a> video game <a href=\"https://en.wikipedia.org/wiki/Media_franchise\">franchise</a>. Created by <a href=\"https://en.wikipedia.org/wiki/David_Jaffe\">David Jaffe</a> at <a href=\"https://en.wikipedia.org/wiki/SIE_Santa_Monica_Studio\">Sony&#39;s Santa Monica Studio</a>, the series debuted in 2005 on the <a href=\"https://en.wikipedia.org/wiki/PlayStation_2\">PlayStation 2</a> (PS2) <a href=\"https://en.wikipedia.org/wiki/Video_game_console\">video game console</a>, and has become a flagship title for the <a href=\"https://en.wikipedia.org/wiki/PlayStation\">PlayStation</a> brand, consisting of eight games across multiple platforms. The story is about <a href=\"https://en.wikipedia.org/wiki/Kratos_(God_of_War)\">Kratos</a>, a <a href=\"https://en.wikipedia.org/wiki/Sparta\">Spartan</a> warrior tricked into killing his wife and daughter by his former master, the Greek God of War <a href=\"https://en.wikipedia.org/wiki/Ares\">Ares</a>. Kratos seeks to rid himself of the nightmares by serving the other <a href=\"https://en.wikipedia.org/wiki/Twelve_Olympians\">Olympian gods</a>, but soon finds himself in confrontation with them due to their machinations. Years after the destruction of <a href=\"https://en.wikipedia.org/wiki/Ancient_Greece\">ancient Greece</a>, Kratos ends up in ancient <a href=\"https://en.wikipedia.org/wiki/Norway\">Norway</a> with a young son named Atreus. The two journey throughout several <a href=\"https://en.wikipedia.org/wiki/Norse_cosmology\">realms</a> to fulfill a promise to the boy&#39;s recently deceased mother, inadvertently making enemies of the <a href=\"https://en.wikipedia.org/wiki/List_of_Germanic_deities\">Norse gods</a>.</p>\r\n', '246x0w.jpg', '2019-02-23 18:55:39'),
(35, 5, 3, 'SBMPTN', 'SBMPTN', '<p>asa</p>\r\n', '53362478_575830732931691_53499551453020160_n.jpg', '2019-03-10 15:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(2, 'Andi', '932013', 'nama@gmail.com', 'Andi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-02-23 13:13:06'),
(3, 'Suwidnyana', '1321', 'jdoe@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2019-02-23 14:20:18'),
(4, 'saya', '31231', 'nama@nama.com', '1', '356a192b7913b04c54574d18c28d46e6395428ab', '2019-02-23 16:25:20'),
(5, 'Suwidnyana', '12313', 'grayfullbuster522@gmail.com', 'admin1', '356a192b7913b04c54574d18c28d46e6395428ab', '2019-03-17 14:18:14'),
(6, 'John Doe', '3123123', 'ptsuwidnyana@gmail.com', '1615323053', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-03-21 08:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
