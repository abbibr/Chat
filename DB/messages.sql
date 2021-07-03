-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 02 2021 г., 22:18
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(96, 587314589, 567392361, 'salom'),
(97, 567392361, 587314589, 'salom'),
(98, 587314589, 567392361, 'nima gap'),
(99, 567392361, 587314589, 'zor'),
(100, 587314589, 567392361, 'ok'),
(101, 468733119, 1500923475, 'hello'),
(102, 1500923475, 468733119, 'hi'),
(103, 468733119, 1500923475, 'what are you doing?'),
(104, 1500923475, 468733119, 'chatting with you!'),
(105, 1500923475, 488215396, 'hello'),
(106, 488215396, 1500923475, 'hi'),
(107, 1500923475, 488215396, 'what are you doing?'),
(108, 488215396, 1500923475, 'chatting with you'),
(109, 1500923475, 488215396, 'ok bye'),
(110, 488215396, 1500923475, 'see you later'),
(111, 468733119, 1500923475, 'hello'),
(112, 1500923475, 468733119, 'hi'),
(113, 468733119, 1500923475, 'ok'),
(114, 587314589, 1500923475, 'ok'),
(115, 488215396, 1500923475, 'ok'),
(116, 488215396, 1500923475, 'ok'),
(117, 567392361, 1500923475, 'ok'),
(118, 468733119, 567392361, 'gcty'),
(119, 468733119, 567392361, 'au'),
(120, 567392361, 1500923475, 'a'),
(121, 1500923475, 567392361, 'nma'),
(122, 1500923475, 567392361, 'qalesan'),
(123, 567392361, 1500923475, 'qalesan');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
