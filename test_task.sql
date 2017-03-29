-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 29 2017 г., 14:36
-- Версия сервера: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- Версия PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test.task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `letter`
--

CREATE TABLE `letter` (
  `idLetter` int(11) NOT NULL,
  `email` text NOT NULL,
  `senderName` text NOT NULL,
  `senderEmail` text NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `listId` text NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sendDate` datetime DEFAULT NULL,
  `sendReport` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `letter`
--

INSERT INTO `letter` (`idLetter`, `email`, `senderName`, `senderEmail`, `subject`, `body`, `listId`, `createDate`, `sendDate`, `sendReport`) VALUES
(5, 'elenaanele244@gmail.com', 'Rom', 'romcrazy13@gmail.com', 'test', 'Test MailSend', '9142679', '2017-03-28 16:52:02', NULL, NULL),
(6, '123', '123', '123', '123', '123', '9142679', '2017-03-28 18:10:04', NULL, NULL),
(7, 'elenaanele244@gmail.com', 'Rom', 'romcrazy13@gmail.com', 'Второе письмо', 'Тест 2', '9142679', '2017-03-29 14:14:29', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`idLetter`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `letter`
--
ALTER TABLE `letter`
  MODIFY `idLetter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
