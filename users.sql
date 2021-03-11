-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 12 2021 г., 00:13
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
-- Структура таблицы `artist`
--

CREATE TABLE `artist` (
  `id` int NOT NULL,
  `place_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `artist`
--

INSERT INTO `artist` (`id`, `place_id`, `name`, `photo`, `description`, `category`) VALUES
(1, 1, 'Вероника Лавийская', '/image/actors/gym0.jpg', 'Первая гимнастка нашего цирка. Является чемпионом мира по прыжкам с изюмом', 'Гимнастки'),
(2, 2, 'Сильвана Ветрокрылая', '/image/actors/gym1.jpg', 'Старая гимнастка. Немного мёртвая. Любит также гипнотизировать зрителей.', 'Гимнастки'),
(3, 1, 'Лизавета Степановна', '/image/actors/gym2.jpg', 'Акробатка и молодец', 'Гимнастки'),
(4, 2, 'Верка Сердючка', '/image/actors/gym3.jpg', 'Выступает в юбке, во время прыжков дополнительно показывает фокусы', 'Гимнастки'),
(5, 1, 'Гадя Петрович', '/image/actors/gym4.jpg', 'Фокусы всё суровей', 'Гимнастки'),
(6, 2, 'Александра Александровна', '/image/actors/gym5.jpg', 'Разбавляет всю эту бешеную программу стандартными номерами', 'Гимнастки'),
(7, 1, 'Mrs Smith', '/image/actors/gym6.jpg', 'Приходит на концерты с мужем', 'Гимнастки'),
(8, 2, 'No name', '/image/actors/gym7.jpg', 'Настолько таинственная, что забыла собственное имя', 'Гимнастки'),
(9, 1, 'Пеннивайз Мудрый', '/image/actors/penny1.jpg', 'Старейший из клоунов-основателей. Является повествователем в сценах, описывающих древние легенды', 'Клоуны'),
(10, 1, 'Пеннивайз Дикий', '/image/actors/penny2.jpg', 'Клоун, проживший всю жизнь в диких условиях. Его сцены описывают животный мир', 'Клоуны'),
(11, 1, 'Амаяк Акопян', '/image/actors/akop.jpg', 'Глава цирка, не совсем клоун', 'Клоуны'),
(12, 3, 'Эрхард Гнилозубый', '/image/actors/erhard.jpg', 'Единственный в цирке клоун кроме основателей', 'Клоуны'),
(13, 2, 'Призрак оперы', '/image/actors/oper.jpg', 'Фокусник всея цирка', 'Фокусники'),
(14, 3, 'Фокусник с кроликом', '/image/actors/rabbit.jpg', 'Постиг мастерство создавания кроликов из ничего', 'Фокусники'),
(15, 2, 'Мудрая Макака', '/image/actors/monkey.jpg', 'Единственная в своём роде по-настоящему разумная обезьяна. Обучила всему, что знала, основателей цирка', 'Мудрая макака');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Волгоград'),
(2, 'Москва');

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
(2, 'Сильвана Ветрокрылая', 'Старая гимнастка. Немного мёртвая. Любит также гипнотизировать зрителей.'),
(3, 'Лизавета Степановна', 'Акробатка и молодец'),
(4, 'Верка Сердючка', 'Выступает в юбке, во время прыжков дополнительно показывает фокусы'),
(5, 'Гадя Петрович', 'Фокусы всё суровей'),
(6, 'Александра Александровна', 'Разбавляет всю эту бешеную программу стандартными номерами'),
(7, 'Mrs Smith', 'Приходит на концерты с мужем'),
(8, 'No name', 'Настолько таинственная, что забыла собственное имя');

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `log`
--

INSERT INTO `log` (`id`, `time`, `text`) VALUES
(1, '2021-03-10 17:54:59', 'Тестовый запуск'),
(2, '2021-03-10 18:00:58', 'Пользователь  посетил страницу '),
(3, '2021-03-10 18:01:21', 'Пользователь  посетил страницу /place/'),
(4, '2021-03-10 18:01:39', 'Пользователь  посетил страницу /category/'),
(5, '2021-03-10 18:01:44', 'Пользователь  посетил страницу /category/artists/?category=%D0%93%D0%B8%D0%BC%D0%BD%D0%B0%D1%81%D1%82%D0%BA%D0%B8'),
(6, '2021-03-10 18:01:46', 'Пользователь  посетил страницу /auth/weather.php'),
(7, '2021-03-10 18:02:42', 'Пользователь  посетил страницу /category/'),
(8, '2021-03-10 18:02:43', 'Пользователь  посетил страницу /category/artists/?category=%D0%93%D0%B8%D0%BC%D0%BD%D0%B0%D1%81%D1%82%D0%BA%D0%B8'),
(9, '2021-03-10 18:04:02', 'Пользователь kris посетил страницу /category/artists/?category=%D0%93%D0%B8%D0%BC%D0%BD%D0%B0%D1%81%D1%82%D0%BA%D0%B8'),
(10, '2021-03-10 18:06:16', 'Пользователь kris посетил страницу /'),
(11, '2021-03-10 18:06:33', 'Пользователь  посетил страницу /'),
(12, '2021-03-10 18:10:43', 'Новая регистрация: пользователь '),
(13, '2021-03-10 18:17:25', 'Новая регистрация: пользователь qaz'),
(14, '2021-03-10 18:17:59', 'Новая регистрация: пользователь qaz'),
(15, '2021-03-10 18:27:56', 'Новая регистрация: пользователь qaz'),
(16, '2021-03-10 18:28:54', 'Новая регистрация: пользователь testtest'),
(17, '2021-03-10 18:28:54', 'Пользователь testtest посетил страницу /'),
(18, '2021-03-10 18:32:03', 'Пользователь testtest посетил страницу /user.php'),
(19, '2021-03-10 18:33:56', 'Пользователь testtest оформил новый билет на 13 человек'),
(20, '2021-03-10 18:35:43', 'Пользователь testtest посетил страницу /user.php'),
(21, '2021-03-10 18:35:50', 'Удален билет №21'),
(22, '2021-03-10 18:35:50', 'Пользователь testtest посетил страницу /user.php'),
(23, '2021-03-10 18:37:02', 'Пользователь testtest посетил страницу /edit-tickets.php'),
(24, '2021-03-10 18:37:21', 'Пользователь testtest посетил страницу /user.php'),
(25, '2021-03-10 18:37:33', 'Пользователь testtest посетил страницу /edit-tickets.php'),
(26, '2021-03-10 18:37:35', 'Изменен билет №20'),
(27, '2021-03-10 18:37:35', 'Пользователь testtest посетил страницу /user.php'),
(28, '2021-03-10 18:46:40', 'Пользователь kris посетил страницу /'),
(29, '2021-03-10 18:46:44', 'Пользователь kris посетил страницу /category/'),
(30, '2021-03-10 18:46:46', 'Пользователь kris посетил страницу /category/artists/?category=%D0%93%D0%B8%D0%BC%D0%BD%D0%B0%D1%81%D1%82%D0%BA%D0%B8'),
(31, '2021-03-10 18:46:52', 'Пользователь kris посетил страницу /category/artists/?category=%D0%9C%D1%83%D0%B4%D1%80%D0%B0%D1%8F%20%D0%BC%D0%B0%D0%BA%D0%B0%D0%BA%D0%B0'),
(32, '2021-03-10 18:46:54', 'Пользователь kris посетил страницу /category/artists/?category=%D0%A4%D0%BE%D0%BA%D1%83%D1%81%D0%BD%D0%B8%D0%BA%D0%B8'),
(33, '2021-03-10 18:47:07', 'Пользователь log посетил страницу /category/artists/'),
(34, '2021-03-10 18:47:10', 'Пользователь log посетил страницу /category/artists/?category=%D0%A4%D0%BE%D0%BA%D1%83%D1%81%D0%BD%D0%B8%D0%BA%D0%B8'),
(35, '2021-03-10 18:47:11', 'Пользователь log посетил страницу /category/artists/?category=%D0%9A%D0%BB%D0%BE%D1%83%D0%BD%D1%8B'),
(36, '2021-03-10 18:47:14', 'Пользователь log посетил страницу /category/artists/?category=%D0%A4%D0%BE%D0%BA%D1%83%D1%81%D0%BD%D0%B8%D0%BA%D0%B8'),
(37, '2021-03-10 18:47:18', 'Пользователь log посетил страницу /place/'),
(38, '2021-03-10 18:47:26', 'Пользователь kris посетил страницу /place/'),
(39, '2021-03-10 18:47:33', 'Пользователь kris посетил страницу /auth/weather.php'),
(40, '2021-03-10 18:47:47', 'Новая регистрация: пользователь tes'),
(41, '2021-03-10 18:47:47', 'Пользователь tes посетил страницу /auth/weather.php'),
(42, '2021-03-10 18:47:53', 'Пользователь tes посетил страницу /auth/weather.php'),
(43, '2021-03-10 18:47:54', 'Пользователь tes посетил страницу /category/'),
(44, '2021-03-10 18:47:55', 'Пользователь tes посетил страницу /category/artists/?category=%D0%9A%D0%BB%D0%BE%D1%83%D0%BD%D1%8B'),
(45, '2021-03-10 18:47:56', 'Пользователь tes посетил страницу /category/artists/?category=%D0%A4%D0%BE%D0%BA%D1%83%D1%81%D0%BD%D0%B8%D0%BA%D0%B8'),
(46, '2021-03-10 18:47:57', 'Пользователь tes посетил страницу /place/'),
(47, '2021-03-11 20:14:51', 'Пользователь kris посетил страницу /place/'),
(48, '2021-03-11 20:14:52', 'Пользователь kris посетил страницу /user.php'),
(49, '2021-03-11 20:14:57', 'Пользователь Кристина оформил новый билет на 2 человек'),
(50, '2021-03-11 20:15:02', 'Пользователь kris посетил страницу /user.php'),
(51, '2021-03-11 20:15:39', 'Пользователь kris посетил страницу /user.php'),
(52, '2021-03-11 20:44:54', 'Пользователь kris посетил страницу /auth/profile.php'),
(53, '2021-03-11 20:44:59', 'Пользователь kris посетил страницу /auth/profile.php'),
(54, '2021-03-11 20:45:14', 'Пользователь kris посетил страницу /'),
(55, '2021-03-11 20:45:15', 'Пользователь kris посетил страницу /'),
(56, '2021-03-11 20:45:20', 'Пользователь kris посетил страницу /auth/profile.php'),
(57, '2021-03-11 20:45:56', 'Пользователь kris посетил страницу /auth/profile.php'),
(58, '2021-03-11 20:46:01', 'Пользователь kris посетил страницу /auth/profile.php'),
(59, '2021-03-11 20:46:07', 'Изменен билет №22'),
(60, '2021-03-11 20:46:07', 'Пользователь kris посетил страницу /auth/profile.php'),
(61, '2021-03-11 20:46:07', 'Пользователь kris посетил страницу /auth/profile.php'),
(62, '2021-03-11 20:46:10', 'Удален билет №22'),
(63, '2021-03-11 20:46:10', 'Пользователь kris посетил страницу /auth/profile.php'),
(64, '2021-03-11 20:46:10', 'Пользователь kris посетил страницу /auth/profile.php'),
(65, '2021-03-11 20:46:13', 'Пользователь kris посетил страницу /auth/profile.php'),
(66, '2021-03-11 20:46:47', 'Пользователь kris посетил страницу /auth/profile.php'),
(67, '2021-03-11 20:48:04', 'Пользователь kris посетил страницу /auth/profile.php'),
(68, '2021-03-11 20:48:07', 'Пользователь kris посетил страницу /auth/profile.php'),
(69, '2021-03-11 20:48:36', 'Пользователь kris посетил страницу /auth/profile.php'),
(70, '2021-03-11 20:49:35', 'Пользователь kris посетил страницу /auth/profile.php'),
(71, '2021-03-11 20:50:04', 'Пользователь kris посетил страницу /auth/profile.php'),
(72, '2021-03-11 20:51:25', 'Пользователь kris посетил страницу /auth/profile.php'),
(73, '2021-03-11 20:54:12', 'Пользователь kris посетил страницу /place/'),
(74, '2021-03-11 20:54:39', 'Пользователь kris посетил страницу /place/'),
(75, '2021-03-11 20:54:40', 'Пользователь kris посетил страницу /auth/profile.php'),
(76, '2021-03-11 20:54:47', 'Пользователь admin посетил страницу /auth/profile.php'),
(77, '2021-03-11 20:55:05', 'Пользователь admin посетил страницу /auth/profile.php'),
(78, '2021-03-11 20:55:20', 'Пользователь admin посетил страницу /'),
(79, '2021-03-11 20:55:21', 'Пользователь admin посетил страницу /'),
(80, '2021-03-11 20:55:27', 'Пользователь admin посетил страницу /user.php'),
(81, '2021-03-11 20:55:30', 'Пользователь admin посетил страницу /user.php'),
(82, '2021-03-11 20:55:34', 'Пользователь admin посетил страницу /user.php'),
(83, '2021-03-11 20:55:37', 'Пользователь admin посетил страницу /user.php'),
(84, '2021-03-11 20:56:11', 'Пользователь admin посетил страницу /auth/profile.php'),
(85, '2021-03-11 20:56:14', 'Пользователь admin посетил страницу /auth/profile.php'),
(86, '2021-03-11 20:56:18', 'Пользователь admin посетил страницу /user.php'),
(87, '2021-03-11 20:56:21', 'Пользователь admin посетил страницу /auth/profile.php'),
(88, '2021-03-11 20:56:33', 'Пользователь kris посетил страницу /auth/profile.php'),
(89, '2021-03-11 20:56:43', 'Пользователь kris посетил страницу /auth/profile.php'),
(90, '2021-03-11 20:57:17', 'Пользователь kris посетил страницу /auth/profile.php'),
(91, '2021-03-11 20:57:20', 'Пользователь Кристина оформил новый билет на 1 человек'),
(92, '2021-03-11 20:57:22', 'Пользователь kris посетил страницу /auth/profile.php'),
(93, '2021-03-11 20:57:40', 'Пользователь kris посетил страницу /auth/profile.php'),
(94, '2021-03-11 20:58:13', 'Пользователь kris посетил страницу /auth/profile.php'),
(95, '2021-03-11 20:58:16', 'Пользователь kris посетил страницу /auth/profile.php'),
(96, '2021-03-11 21:06:23', 'Пользователь kris посетил страницу /'),
(97, '2021-03-11 21:06:24', 'Пользователь kris посетил страницу /'),
(98, '2021-03-11 21:06:25', 'Пользователь kris посетил страницу /auth/profile.php'),
(99, '2021-03-11 21:06:26', 'Пользователь kris посетил страницу /auth/profile.php'),
(100, '2021-03-11 21:06:40', 'Пользователь kris посетил страницу /'),
(101, '2021-03-11 21:06:42', 'Пользователь kris посетил страницу /auth/profile.php'),
(102, '2021-03-11 21:06:51', 'Пользователь kris посетил страницу /auth/profile.php'),
(103, '2021-03-11 21:06:52', 'Пользователь kris посетил страницу /auth/profile.php'),
(104, '2021-03-11 21:06:56', 'Пользователь kris посетил страницу /auth/profile.php'),
(105, '2021-03-11 21:06:59', 'Пользователь kris посетил страницу /auth/profile.php'),
(106, '2021-03-11 21:07:08', 'Пользователь kris посетил страницу /auth/profile.php'),
(107, '2021-03-11 21:07:09', 'Пользователь kris посетил страницу /auth/profile.php'),
(108, '2021-03-11 21:07:10', 'Пользователь kris посетил страницу /auth/profile.php'),
(109, '2021-03-11 21:07:31', 'Пользователь kris посетил страницу /auth/profile.php'),
(110, '2021-03-11 21:07:51', 'Пользователь kris посетил страницу /auth/profile.php'),
(111, '2021-03-11 21:07:52', 'Пользователь kris посетил страницу /auth/profile.php'),
(112, '2021-03-11 21:07:53', 'Пользователь kris посетил страницу /auth/profile.php'),
(113, '2021-03-11 21:09:16', 'Пользователь kris посетил страницу /auth/profile.php'),
(114, '2021-03-11 21:10:34', 'Пользователь kris посетил страницу /auth/profile.php'),
(115, '2021-03-11 21:10:53', 'Пользователь kris посетил страницу /auth/profile.php'),
(116, '2021-03-11 21:10:55', 'Пользователь kris посетил страницу /auth/profile.php'),
(117, '2021-03-11 21:10:58', 'Пользователь kris посетил страницу /auth/profile.php'),
(118, '2021-03-11 21:10:59', 'Пользователь kris посетил страницу /auth/profile.php'),
(119, '2021-03-11 21:11:05', 'Пользователь kris посетил страницу /auth/profile.php'),
(120, '2021-03-11 21:11:07', 'Пользователь kris посетил страницу /auth/profile.php'),
(121, '2021-03-11 21:11:11', 'Пользователь kris посетил страницу /auth/profile.php'),
(122, '2021-03-11 21:11:14', 'Удален билет №23'),
(123, '2021-03-11 21:11:14', 'Пользователь kris посетил страницу /auth/profile.php'),
(124, '2021-03-11 21:11:14', 'Пользователь kris посетил страницу /auth/profile.php'),
(125, '2021-03-11 21:11:28', 'Пользователь kris посетил страницу /auth/profile.php'),
(126, '2021-03-11 21:11:30', 'Пользователь kris посетил страницу /auth/profile.php');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `place_id` int NOT NULL,
  `main_dish` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `place_id`, `main_dish`) VALUES
(1, 1, 'Мясо по-въетнамски, рагу из полярной совы'),
(2, 2, 'Сырая тигрятина, банановые десерты'),
(3, 3, 'Девы в собственном соку, кровь молодых деревьев (березовый сок)');

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
-- Структура таблицы `place`
--

CREATE TABLE `place` (
  `id` int NOT NULL,
  `city_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contacts` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `city_id`, `name`, `address`, `contacts`, `description`, `photo`) VALUES
(1, 1, 'Цыганский цирк', 'Улица Пушкина, дом Колотушкина', '8-800-555-35-35', 'Здесь конь ворует сам себя', '/image/places/romans.jpg'),
(2, 1, 'Приют у Макаки', 'Площадь Ленина 1', '42-42', 'Наша первая площадка, стилизована под лес', '/image/places/wood.jpg'),
(3, 2, 'Столичный удел скоморохов', 'Улица Первая Сатанинская 666', '666-666', 'Открыто совместно с религиозным сообществом \"Дети Сотоны\"', '/image/places/satan.jpeg');

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
(18, 3, 'Кристина', 1, 4),
(19, 10, 'testtest', 1, 12),
(20, 10, 'testtest', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `username`
--

CREATE TABLE `username` (
  `id` int NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `username`
--

INSERT INTO `username` (`id`, `login`, `password`, `name`, `city`) VALUES
(1, 'admin', 'admin', 'Администратор', '1'),
(2, 'log', 'pass', 'Логин', '2'),
(3, 'kris', '12345', 'Кристина', '1'),
(8, 'test1', 'test', 'Тест', '2'),
(9, 'qaz', 'zaqzaq', 'Орк', 'default'),
(10, 'testtest', 'testtest', 'testtest', 'default'),
(11, 'tes', 'tes', 'tes', '2');

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
-- Индексы таблицы `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gymnasts`
--
ALTER TABLE `gymnasts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
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
-- AUTO_INCREMENT для таблицы `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `gymnasts`
--
ALTER TABLE `gymnasts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `username`
--
ALTER TABLE `username`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
