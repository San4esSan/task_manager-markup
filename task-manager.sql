-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 25 2019 г., 20:34
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task-manager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `image` varchar(256) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `image`, `user_id`) VALUES
(5, '13', 'ÐŸÑ€Ð¸Ð²ÐµÑ‚! Ð²Ñ‹Ð»Ð°Ð¾Ñ‚Ñ„Ð±Ñ‹Ð²Ð°Ð¸Ð±ÑŒÑ‡ÑÐ¼ ÑŒÐ±Ð°Ð¸Ð±ÑŒÑ‹Ñ‚Ñ Ð¼', 'Ð‘ÐµÐ·Ñ‹Ð¼ÑÐ½Ð½Ñ‹Ð¹.jpg', 11),
(18, NULL, 'sas', NULL, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registered_date`) VALUES
(1, 'dfgj', 'ass@mail.ru', '25f9e794323b453885f5181f1b624d0b', '0000-00-00'),
(2, 'erer', 'boss@mail.ru', '24179ed8ad38462c96ad530a28fd7d96', '0000-00-00'),
(3, 'erer', 'boss@mail.ru', 'ddcf4466a7ee29215b8595e30b8bfbe4', '0000-00-00'),
(4, 'web', 'web@list.ru', 'ddcf4466a7ee29215b8595e30b8bfbe4', '0000-00-00'),
(5, 'qqq', 'qqq@mail.ru', 'b2ca678b4c936f905fb82f2733f5297f', '0000-00-00'),
(6, 'das is', 'was@das.ru', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(7, 'fgfhg', 'dfg@list.ru', '250cf8b51c773f3f8dc8b4be867a9a02', '0000-00-00'),
(8, 'dfgj', 'sss@list.ru', '202cb962ac59075b964b07152d234b70', '0000-00-00'),
(9, 'aaa', 'aaa@aaa.ru', '47bce5c74f589f4867dbd57e9ca9f808', '0000-00-00'),
(10, 'Sanya', 'san@list.ru', '9f5a44a734ac9e43b5968d0f3b71d69b', '0000-00-00'),
(11, 'zzz', 'zzz@zzz.ru', 'f3abb86bd34cf4d52698f14c0da1dc60', '0000-00-00'),
(12, 'ddd', 'ddd@ddd.ru', '77963b7a931377ad4ab5ad6a9cd718aa', '0000-00-00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
