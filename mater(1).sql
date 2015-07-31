-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2015 г., 20:07
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mater`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment_movie`
--

CREATE TABLE IF NOT EXISTS `comment_movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `comment_movie`
--

INSERT INTO `comment_movie` (`id`, `id_user`, `id_movie`, `text`, `time`) VALUES
(1, 1, 1, 'sasaas', '2015-06-20 15:34:18'),
(2, 0, 1, '121213', '2015-06-20 16:23:56'),
(3, 0, 1, '2112121', '2015-06-20 16:28:08'),
(4, 0, 1, '12312345', '2015-06-20 19:38:37'),
(5, 0, 2, '123455', '2015-06-20 20:04:23'),
(6, 0, 1, '12345', '2015-06-20 20:04:34'),
(7, 0, 1, '', '2015-06-21 00:43:32'),
(8, 0, 2, '12345', '2015-06-21 00:43:38'),
(9, 2, 1, '', '2015-06-21 00:44:13'),
(10, 0, 2, '12345', '2015-06-21 00:44:17'),
(11, 0, 1, '12345', '2015-06-21 00:45:36'),
(12, 2, 1, '', '2015-06-21 00:45:41'),
(13, 0, 2, '12345', '2015-06-21 00:45:46'),
(14, 1, 1, '12345', '2015-06-21 00:47:12'),
(15, 1, 1, '123455', '2015-06-21 00:47:18'),
(16, 1, 1, '1234556', '2015-06-21 00:47:23'),
(17, 3, 1, '', '2015-06-21 00:47:27'),
(18, 3, 3, '12345', '2015-06-21 00:47:31'),
(19, 3, 3, '12345', '2015-06-21 00:47:35'),
(20, 3, 3, '12345', '2015-06-21 00:47:39'),
(21, 3, 3, '12345', '2015-06-21 00:47:42'),
(22, 1, 1, '1234566', '2015-06-21 07:26:13'),
(23, 1, 1, '', '2015-06-21 08:47:52'),
(24, 1, 1, '', '2015-06-21 09:11:10'),
(25, 6, 1, '', '2015-06-21 09:11:16'),
(26, 1, 6, '', '2015-06-21 09:11:29'),
(27, 1, 3, '12345', '2015-06-21 09:55:54'),
(28, 1, 3, '1234567', '2015-06-21 09:56:00'),
(29, 1, 3, '', '2015-06-21 09:56:04'),
(30, 1, 1, '', '2015-06-21 09:56:27'),
(31, 1, 1, '123454', '2015-06-21 09:56:30'),
(32, 1, 4, '1234', '2015-06-21 09:59:25'),
(33, 1, 4, '12244', '2015-06-21 09:59:28'),
(34, 1, 4, '12344', '2015-06-21 09:59:33'),
(35, 1, 4, '11111111111', '2015-06-21 09:59:37'),
(36, 1, 4, '11111111111', '2015-06-21 09:59:40'),
(37, 1, 4, '1234', '2015-06-21 12:14:02'),
(38, 1, 4, '12345', '2015-06-21 12:14:06'),
(39, 1, 4, '123455', '2015-06-21 12:14:09'),
(40, 1, 4, '2134', '2015-06-21 12:14:12'),
(41, 1, 5, '1234', '2015-06-21 12:14:20'),
(42, 1, 5, '121212', '2015-06-21 12:14:21'),
(43, 1, 5, '12234', '2015-06-21 12:16:28'),
(44, 1, 5, '2134', '2015-06-21 12:16:32');

-- --------------------------------------------------------

--
-- Структура таблицы `comment_text_post`
--

CREATE TABLE IF NOT EXISTS `comment_text_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `comment_text_post`
--

INSERT INTO `comment_text_post` (`id`, `id_post`, `id_user`, `text`, `time`) VALUES
(1, 3, 1, 'gfdhgf hg h ghff ', '2015-05-31 10:35:37'),
(2, 6, 1, 'ghgfmjghj  gf jgh ghf gh ', '2015-05-31 10:36:00'),
(3, 2, 1, 'Heeeeey, dude!\r\n', '2015-05-31 12:17:26'),
(4, 2, 1, 'Heeeeey, dude!\r\n', '2015-05-31 12:17:51'),
(5, 7, 1, '1', '2015-05-31 12:56:57'),
(6, 7, 1, '1', '2015-05-31 12:57:00'),
(7, 7, 1, '2', '2015-05-31 12:57:06'),
(8, 7, 1, '3', '2015-05-31 12:57:11'),
(9, 11, 1, 'nmbnmbn', '2015-06-04 09:56:08'),
(10, 13, 6, 'its my comment', '2015-06-15 10:20:06'),
(11, 14, 1, 'hgfhgfhgfhgf', '2015-06-15 16:18:12'),
(12, 14, 6, 'Lalalalal!', '2015-06-15 20:13:49'),
(13, 14, 1, '12345678!', '2015-06-15 20:16:24'),
(14, 14, 6, '123456!', '2015-06-15 20:18:52'),
(15, 14, 6, '123456!', '2015-06-15 20:19:39'),
(16, 9, 0, 'asasasas!', '2015-06-15 20:36:29'),
(17, 2, 6, 'asadas!', '2015-06-15 20:37:36'),
(18, 14, 1, '1234', '2015-06-15 22:14:21'),
(19, 15, 1, 'ddgfdgfd', '2015-06-16 07:37:52'),
(20, 13, 1, '12345', '2015-06-20 19:42:11');

-- --------------------------------------------------------

--
-- Структура таблицы `dialogs`
--

CREATE TABLE IF NOT EXISTS `dialogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_one` int(11) NOT NULL,
  `id_two` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `follows`
--

INSERT INTO `follows` (`id`, `to_id`, `from_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `path` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `user_id`, `user_name`, `path`, `time`) VALUES
(1, 'aa2161bf0749b367e9f7ded04ae05c91', 1, 'aa2161bf0749b367e9f7ded04ae05c91', 'images/aa2161bf0749b367e9f7ded04ae05c91', '2015-06-08 18:24:14'),
(2, 'afca697239aaecc06a59a5bbfb5be3b8', 1, 'afca697239aaecc06a59a5bbfb5be3b8', 'images/afca697239aaecc06a59a5bbfb5be3b8', '2015-06-08 18:24:14'),
(3, '52494ad999d32c2d5f9b400eb7043de9', 1, '52494ad999d32c2d5f9b400eb7043de9', 'images/52494ad999d32c2d5f9b400eb7043de9', '2015-06-08 18:24:14'),
(4, '8ecf8b7c32f4051a249a13ffe5dd530c', 1, '8ecf8b7c32f4051a249a13ffe5dd530c', 'images/8ecf8b7c32f4051a249a13ffe5dd530c', '2015-06-08 18:24:14'),
(5, '0b28e284735f1c963f0b7f6b96b0b269', 1, '0b28e284735f1c963f0b7f6b96b0b269', 'images/0b28e284735f1c963f0b7f6b96b0b269', '2015-06-08 18:24:14'),
(6, 'f04ed8f0b6f80a75ff60f3fcafde7532', 1, 'f04ed8f0b6f80a75ff60f3fcafde7532', 'images/f04ed8f0b6f80a75ff60f3fcafde7532', '2015-06-08 18:24:14'),
(7, '662934c95206f90284e69ae5f016fa3e', 1, '662934c95206f90284e69ae5f016fa3e', 'images/662934c95206f90284e69ae5f016fa3e', '2015-06-08 18:24:14'),
(8, 'cd43926f0f61512a99f9914c9f6b6f19', 1, 'cd43926f0f61512a99f9914c9f6b6f19', 'images/cd43926f0f61512a99f9914c9f6b6f19', '2015-06-10 13:10:13'),
(9, 'd7c8c2323bbf38246d9fd1763f6cf990', 1, 'd7c8c2323bbf38246d9fd1763f6cf990', 'images/d7c8c2323bbf38246d9fd1763f6cf990', '2015-06-14 11:29:22'),
(10, '5cd3c5af13938afa1825b558239977dd', 1, '5cd3c5af13938afa1825b558239977dd', 'images/5cd3c5af13938afa1825b558239977dd', '2015-06-14 11:29:23'),
(11, 'd50487142675b4c9fb8762bebbaa9c7f', 1, 'd50487142675b4c9fb8762bebbaa9c7f', 'images/d50487142675b4c9fb8762bebbaa9c7f', '2015-06-14 11:29:23'),
(12, '00df0cdfe25a745729c0c97dcbdd00b6', 1, '00df0cdfe25a745729c0c97dcbdd00b6', 'images/00df0cdfe25a745729c0c97dcbdd00b6', '2015-06-14 11:29:23'),
(13, 'af19be5a5fda135573737d90952c88a0', 1, 'af19be5a5fda135573737d90952c88a0', 'images/af19be5a5fda135573737d90952c88a0', '2015-06-14 11:29:23'),
(14, '0f21c65dcf6b1bd47da9ad9e21999900', 1, '0f21c65dcf6b1bd47da9ad9e21999900', 'images/0f21c65dcf6b1bd47da9ad9e21999900', '2015-06-14 11:29:23'),
(15, '5256a7d0f1530991137dcf8cbe74ee16', 6, '5256a7d0f1530991137dcf8cbe74ee16', 'images/5256a7d0f1530991137dcf8cbe74ee16', '2015-06-15 10:15:45'),
(16, 'b7f7b0c9b935e47b79e56573c0e50ee2', 6, 'b7f7b0c9b935e47b79e56573c0e50ee2', 'images/b7f7b0c9b935e47b79e56573c0e50ee2', '2015-06-15 10:15:46'),
(17, '0e2486f3ba3088a091a1c53f31a148da', 6, '0e2486f3ba3088a091a1c53f31a148da', 'images/0e2486f3ba3088a091a1c53f31a148da', '2015-06-15 10:15:46'),
(18, 'cd43926f0f61512a99f9914c9f6b6f19', 6, 'cd43926f0f61512a99f9914c9f6b6f19', 'images/cd43926f0f61512a99f9914c9f6b6f19', '2015-06-15 10:15:46'),
(19, '922614e0d4954410bfe3867a237b19e3', 6, '922614e0d4954410bfe3867a237b19e3', 'images/922614e0d4954410bfe3867a237b19e3', '2015-06-15 10:15:46');

-- --------------------------------------------------------

--
-- Структура таблицы `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` text NOT NULL,
  `path` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `movie`
--

INSERT INTO `movie` (`id`, `id_user`, `title`, `path`, `time`, `Description`) VALUES
(1, 1, 'Shurik i Pugovkin 1', 'music/6fb0a93586a1f3a20a3035a54332ac35.mp4', '2015-06-20 13:47:14', 'Description  Description o llalal ol ala lo df a  bi bi biiibi bibi '),
(3, 1, 'Shurik i Pugovkin 3', 'music/6fb0a93586a1f3a20a3035a54332ac35.mp4', '2015-06-20 13:47:14', 'Description  Description o llalal ol ala lo df a  bi bi biiibi bibi  r435t43 5345 45643 '),
(4, 1, 'Shurik i Pugovkin 4', 'movies/a67e5a4ae888be7c4345f5b84f0d5ba5.mp4', '2015-06-20 13:45:51', ''),
(5, 1, 'Shurik i Pugovkin 5', 'movies/6fb0a93586a1f3a20a3035a54332ac35.mp4', '2015-06-20 13:47:35', 'Description  Description o llalal ol ala lo df a  bi bi biiibi bibi  r435t43 5345 45643 '),
(6, 1, 'Shurik i Pugovkin 6', 'movies/6fb0a93586a1f3a20a3035a54332ac35.mp4', '2015-06-20 13:47:35', 'Description  Description o llalal ol ala lo df a  bi bi biiibi bibi  r435t43 5345 45643 '),
(7, 6, 'Alala', 'movies/86a44626130f44556f80423ae13d1664.mp4', '2015-06-20 13:47:36', 'Description  Description o llalal ol ala lo df a  bi bi biiibi bibi  r435t43 5345 45643 ');

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` text NOT NULL,
  `artist` text NOT NULL,
  `path` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id`, `id_user`, `title`, `artist`, `path`, `time`) VALUES
(1, 1, 'adsasad', 'dadada', 'music/57d7038ef690073864afc14fedacb754', '2015-06-13 10:30:02'),
(2, 1, 'fdfddf', 'dffdfd', 'music/57d7038ef690073864afc14fedacb754mp3', '2015-06-13 10:31:20'),
(3, 1, 'gfg', 'gfgfgf', 'music/57d7038ef690073864afc14fedacb754mp3', '2015-06-13 10:32:29'),
(4, 6, 'Alalal', 'asasas', 'music/62dabb97fc6c63ab260bcb437e402a56mp3', '2015-06-15 10:18:05'),
(5, 6, 'gfghhdf', 'gfdgdfg', 'music/62dabb97fc6c63ab260bcb437e402a56mp3', '2015-06-15 10:18:37');

-- --------------------------------------------------------

--
-- Структура таблицы `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `opened` enum('0','1') NOT NULL,
  `recipientDelete` enum('0','1') NOT NULL,
  `senderDelete` enum('0','1') NOT NULL,
  `id_dialog` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `pm`
--

INSERT INTO `pm` (`id`, `to_id`, `from_id`, `time_sent`, `subject`, `message`, `opened`, `recipientDelete`, `senderDelete`, `id_dialog`) VALUES
(1, 4, 1, '2015-06-04 08:57:50', 'Talking', 'Hello!', '0', '0', '0', 0),
(2, 4, 1, '2015-06-10 21:17:19', '', 'dfd', '0', '0', '0', 1),
(3, 4, 1, '2015-06-11 12:17:55', '', '123456', '0', '0', '0', 1),
(4, 4, 1, '2015-06-11 12:18:04', '', '1234567', '0', '0', '0', 1),
(5, 4, 1, '2015-06-11 12:22:14', '', '123456', '0', '0', '0', 1),
(6, 4, 1, '2015-06-11 14:49:59', '', '123456', '0', '0', '0', 1),
(7, 4, 1, '2015-06-11 14:50:15', '', '123456', '0', '0', '0', 1),
(8, 1, 4, '2015-06-11 14:51:01', '', '123456', '0', '0', '0', 1),
(9, 1, 4, '2015-06-11 14:51:08', '', '12234556', '0', '0', '0', 1),
(10, 4, 1, '2015-06-11 15:03:22', '', '1223455', '0', '0', '0', 1),
(11, 4, 1, '2015-06-11 15:29:49', '', '123456', '0', '0', '0', 1),
(20, 4, 1, '2015-06-11 19:04:53', 'Its a new post.', 'Ð¿Ð°Ð²Ñ€Ð¿Ð°Ð²Ð¿Ñ€Ð¿Ð°', '0', '0', '0', 1),
(21, 4, 1, '2015-06-11 19:05:52', '', 'Ñ€Ð¿Ð°Ð¾Ð¿Ñ€', '0', '0', '0', 1),
(22, 4, 1, '2015-06-11 19:06:25', 'Ð°Ð²Ñ‹Ð°Ð²Ñ‹', 'Ð°Ð²Ñ‹Ð°Ð²Ñ‹', '0', '0', '0', 1),
(23, 4, 1, '2015-06-11 19:06:38', '', 'Ñ€Ð¿Ð°Ð¾Ð¿Ñ€', '0', '0', '0', 1),
(24, 4, 1, '2015-06-13 08:45:36', '', 'jghkjhjkjh', '0', '0', '0', 1),
(25, 6, 1, '2015-06-15 16:19:48', 'gfdgdf', 'dgfdfgdf', '0', '0', '0', 0),
(26, 6, 1, '2015-06-15 16:19:54', '', 'gfdgdf', '0', '0', '0', 25),
(27, 6, 1, '2015-06-15 16:19:56', '', 'gdfgdfgdf', '0', '0', '0', 25),
(28, 4, 1, '2015-06-15 22:10:51', '', 'hgfhgf', '0', '0', '0', 1),
(29, 4, 1, '2015-06-15 22:11:00', '', 'gfhgf', '0', '0', '0', 1),
(30, 4, 1, '2015-06-15 22:11:05', '', 'gfhgf', '0', '0', '0', 1),
(31, 4, 1, '2015-06-16 06:58:36', '', 'dgfgdfgfd', '0', '0', '0', 1),
(32, 4, 1, '2015-06-16 07:39:38', '', 'ggdg', '0', '0', '0', 1),
(33, 5, 1, '2015-06-17 21:26:02', '', 'Hi! How are u?', '0', '0', '0', 0),
(34, 4, 1, '2015-06-21 07:05:42', '', '12345', '0', '0', '0', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `private`
--

CREATE TABLE IF NOT EXISTS `private` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `profile` int(11) NOT NULL DEFAULT '0',
  `video` int(11) NOT NULL DEFAULT '0',
  `music` int(11) NOT NULL DEFAULT '0',
  `post` int(11) NOT NULL DEFAULT '0',
  `photo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `private`
--

INSERT INTO `private` (`id`, `id_user`, `profile`, `video`, `music`, `post`, `photo`) VALUES
(1, 1, 0, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `text_post`
--

CREATE TABLE IF NOT EXISTS `text_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `text_post`
--

INSERT INTO `text_post` (`id`, `user_id`, `name`, `content`, `time`) VALUES
(1, 0, 'Its a new post!', 'And its content!', '2015-05-29 17:10:54'),
(2, 1, 'Its a new post!', 'and its content', '2015-05-29 17:11:59'),
(3, 1, 'Second post.', 'Send content!', '2015-05-29 17:34:58'),
(4, 1, 'Second post.', 'Send content!', '2015-05-29 17:35:02'),
(5, 1, 'rghtrh', 'hgfjgh', '2015-05-29 17:35:23'),
(6, 1, 'Bla bla bla', 'Blaaaaaaaaaaaaaaaaaaaaaaaaaaaa bla la ', '2015-05-31 08:57:56'),
(7, 1, 'Bla blus', 'pass pass', '2015-05-31 12:56:53'),
(8, 1, 'Post', 'POST POST POST', '2015-05-31 12:58:07'),
(9, 1, 'POST POST POST', 'POST POST POSTPOST POST POSTPOST POST POSTPOST POST POST', '2015-05-31 12:58:13'),
(10, 1, 'POST POST POSTPOST POST POST', 'POST POST POSTPOST POST POSTPOST POST POSTPOST POST POST', '2015-05-31 12:58:19'),
(11, 1, 'POST POST POST', 'POST POST POSTPOST POST POSTPOST POST POSTPOST POST POST', '2015-05-31 12:58:23'),
(12, 1, 'slexalex', '12234354345435', '2015-06-11 18:43:11'),
(13, 6, 'Alalalalal', 'i lala', '2015-06-15 10:19:56'),
(14, 1, 'dsf', 'gdfgdfsgdfs', '2015-06-15 16:18:05'),
(15, 1, 'dsadas', 'sadas', '2015-06-15 22:14:29'),
(16, 1, 'xfdxgd', 'gfdgdfgfd', '2015-06-16 07:38:01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `born_date` text NOT NULL,
  `biography` text NOT NULL,
  `country` text NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `gender` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ava` text NOT NULL,
  `admin` int(11) NOT NULL,
  `blocked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `born_date`, `biography`, `country`, `question`, `answer`, `gender`, `reg_date`, `ava`, `admin`, `blocked`) VALUES
(1, 'Alex', 'Shkapenko', 'email@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '13 August, 1996', 'I am a man!', '1', 'Who am I?', 'Im a man, as i said.', 'male', '2015-06-21 11:06:48', 'avatar/8b31a2ab9a99f04d82843e78e289f2c9.jpg', 1, 0),
(4, 'Petya', 'Vasyn', 'email@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8 May, 1996', 'Im the second man on this website.', '1', 'My mom''s name.', 'Helen.', 'female', '2015-06-21 11:26:51', 'image/profile.png', 0, 0),
(5, 'Aloola', 'Avava', 'alex9613@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '15 June, 2015', 'im lalalalalalalalal', '1', '12345?', '12345.', '', '2015-06-14 17:21:34', 'image/profile.png', 0, 0),
(6, 'Vlad', 'Smorod', 'vlad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9 October, 1995', 'Bla blaaaa lbaaa vlaaad', '1', 'Lala?', 'Lala.', '', '2015-06-15 10:19:34', 'avatar/3e4d12e7e71bfefc859fda2c42d6a483.jpg', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
