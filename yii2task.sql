-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 28 2021 г., 17:53
-- Версия сервера: 10.5.8-MariaDB-1:10.5.8+maria~bionic
-- Версия PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `phone`
--

INSERT INTO `phone` (`id`, `id_user`, `phone`) VALUES
(1, 1, '+79876543211'),
(2, 1, '+79996662211'),
(3, 2, '+79114447722'),
(4, 3, '+78123235463'),
(5, 3, '+79287345632'),
(6, 2, '+79183734876');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `lastname` text DEFAULT NULL,
  `firstname` text DEFAULT NULL,
  `secondname` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `lastname`, `firstname`, `secondname`, `updated_at`) VALUES
(1, 'Сергеев', 'Владимир', 'Григорьевич', NULL),
(2, 'Ворошилов', 'Антон', 'Александрович', NULL),
(3, 'Гриценко', 'Валерия', 'Антиповна', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
