-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2022 г., 08:34
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tushkanchik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `newsText` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `imgLink` varchar(100) NOT NULL,
  `imgLink2` varchar(255) NOT NULL,
  `newsText2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `newsText`, `date`, `imgLink`, `imgLink2`, `newsText2`) VALUES
(157, 'Well', ' ', '2022-05-25', 'anime-tokyo-ghoul-re-ken-kaneki-wallpaper-preview.jpg', '', ' '),
(158, 'Ghul', ' ', '2022-05-25', '2560x1600_1005781_[www.ArtFile.ru].jpg', '', ' ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'leo', '$2y$10$XKU7OGDGI9JCGQfDIYd84OCUSN2N3rwtkdHgxdxZMPj/mGZEX7LBe'),
(5, 'leonid112', '$2y$10$Mbj3IYsVXZLbjtkC8QUKi.elZrtAnctPjB.uLbp74ZzuG/dr9/B2u'),
(7, 'coffecuthe', '$2y$10$61MlykGdpBhI.keGLRMHwuutQpt7ZtQUVIdddlnMh/C9d2WQpeEla'),
(8, '123', '$2y$10$lW1G0XAfQAoneeny5g84mewnEzYcY7qXpWHU8SBeYxSf8IEcEaARe'),
(9, 'coffe1', '$2y$10$jdQYQvCzTUXDVE5KZ9dlwO.Qlc2tcrrULNZEZHMnFXRXsitXv1T8W'),
(10, 'Coffe', '$2y$10$P3/lmERoomg8pU.QEova5.yilczp0Ne5bcsFq856xS7qLvRSefRH2'),
(11, '134552@mail.ru', '$2y$10$OwVWwE7afaclhS6OaF7Bn.7Js9UYZtNif5X3RzrscdF0zQxwyzPl6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
