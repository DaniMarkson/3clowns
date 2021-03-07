-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 07 2021 г., 19:32
-- Версия сервера: 8.0.19
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gymnasts`
--

CREATE TABLE `gymnasts` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gymnasts`
--

INSERT INTO `gymnasts` (`id`, `name`, `description`) VALUES
(1, 'Вероника Лавийская', 'Первая гимнастка нашего цирка. Является чемпионом мира по прыжкам с изюмом'),
(2, 'Сильвана Ветрокрылая', 'Старая гимнастка. Немного мёртвая. Любит также гипнотизировать зрителей.');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `new_view`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `new_view` (
`age` tinyint(1)
,`id` int
,`name` varchar(30)
,`quests` int
,`user_id` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` tinyint(1) NOT NULL,
  `quests` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `name`, `age`, `quests`) VALUES
(1, 1, 'Администратор', 1, 1),
(2, 1, 'Администратор', 1, 2),
(3, 1, 'Администратор', 1, 2),
(4, 1, 'Администратор', 1, 4),
(5, 1, 'Администратор', 0, 12),
(10, 3, 'Кристина', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `username`
--

CREATE TABLE `username` (
  `id` int NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `username`
--

INSERT INTO `username` (`id`, `login`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'Администратор'),
(2, 'log', 'pass', 'Логин'),
(3, 'kris', '12345', 'Кристина');

-- --------------------------------------------------------

--
-- Структура для представления `new_view`
--
DROP TABLE IF EXISTS `new_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mysql`@`127.0.0.1` SQL SECURITY DEFINER VIEW `new_view`  AS SELECT `tickets`.`id` AS `id`, `tickets`.`user_id` AS `user_id`, `tickets`.`name` AS `name`, `tickets`.`age` AS `age`, `tickets`.`quests` AS `quests` FROM `tickets` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gymnasts`
--
ALTER TABLE `gymnasts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gymnasts`
--
ALTER TABLE `gymnasts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `username`
--
ALTER TABLE `username`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
