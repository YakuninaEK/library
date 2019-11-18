-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 23 2019 г., 12:20
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dt_lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tb_books`
--

CREATE TABLE `tb_books` (
  `id` int(11) NOT NULL,
  `id_ganre` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `b_name` varchar(200) NOT NULL,
  `sheets` int(11) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_books`
--

INSERT INTO `tb_books` (`id`, `id_ganre`, `autor`, `b_name`, `sheets`, `publisher`, `year`) VALUES
(1, 2, 'Донцова Д.В.', 'Муха в самолете', 340, '«Астрель»', 2015),
(2, 3, 'Корнеев С.В.', 'Наши любимые сказки', 145, 'АСТ Москва', 2018),
(3, 5, 'Пушкин А.С.', 'Стихи', 125, '«Астрель»', 2017),
(4, 4, 'Сергеева Т.А.', 'Базы данных', 507, '«Астрель»', 2015),
(5, 1, 'Сапковский А.', 'Ведьмак', 345, 'АСТ Москва', 2009);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_genre`
--

CREATE TABLE `tb_genre` (
  `id` int(11) NOT NULL,
  `g_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_genre`
--

INSERT INTO `tb_genre` (`id`, `g_name`) VALUES
(1, 'Фантастика'),
(2, 'Детектив'),
(3, 'Сказки'),
(4, 'Учебное пособие'),
(5, 'Лирика');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tb_books`
--
ALTER TABLE `tb_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ganre` (`id_ganre`);

--
-- Индексы таблицы `tb_genre`
--
ALTER TABLE `tb_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tb_books`
--
ALTER TABLE `tb_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tb_genre`
--
ALTER TABLE `tb_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tb_books`
--
ALTER TABLE `tb_books`
  ADD CONSTRAINT `tb_books_ibfk_1` FOREIGN KEY (`id_ganre`) REFERENCES `tb_genre` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
