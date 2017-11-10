-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 10 2017 г., 17:44
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shafa`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id_Category` int(2) NOT NULL,
  `Name_category` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`id_Category`, `Name_category`) VALUES
(1, 'Колготки'),
(2, 'Носки');

-- --------------------------------------------------------

--
-- Структура таблицы `Color`
--

CREATE TABLE IF NOT EXISTS `Color` (
  `id_Color` int(2) NOT NULL,
  `Name_Color` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Color`
--

INSERT INTO `Color` (`id_Color`, `Name_Color`) VALUES
(1, 'Белый'),
(2, 'Черный');

-- --------------------------------------------------------

--
-- Структура таблицы `Size`
--

CREATE TABLE IF NOT EXISTS `Size` (
  `id_size` int(2) NOT NULL,
  `Name_suze` text NOT NULL,
  `id_Category` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Size`
--

INSERT INTO `Size` (`id_size`, `Name_suze`, `id_Category`) VALUES
(1, 'S', 2),
(2, 'M', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Sklad`
--

CREATE TABLE IF NOT EXISTS `Sklad` (
  `id_Sklad` int(10) NOT NULL,
  `id_Size` int(2) NOT NULL,
  `id_Color` int(2) NOT NULL,
  `count` int(2) NOT NULL,
  `id_Tovar` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Sklad`
--

INSERT INTO `Sklad` (`id_Sklad`, `id_Size`, `id_Color`, `count`, `id_Tovar`) VALUES
(1, 1, 1, 9, 6),
(2, 2, 2, 8, 6),
(3, 1, 1, 2, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `Tovar`
--

CREATE TABLE IF NOT EXISTS `Tovar` (
  `id` int(11) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` varchar(5) NOT NULL,
  `Img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Tovar`
--

INSERT INTO `Tovar` (`id`, `URL`, `Name`, `Description`, `Price`, `Img`) VALUES
(6, 'https://shafa.ua/women/drugoe/7648583-matovye-kolgotki-ca-50den', 'Матовые колготки c&amp;a 50den', 'размер С', '70', '<a href="https://images.shafastatic.net/27852656" class="js-gallery-magnific-item" target="_blank">                            <img class="b-product-gallery__additional-image" src="https://image-thumbs.shafastatic.net/27852656_310_430" alt="Матовые колготки c&amp;a 50den1" title="Матовые колготки c&amp;a 50den1" onerror="this.src=''https://assets.shafastatic.net/static/item-clothing-310x430-loading.png'';"></a><a href="https://images.shafastatic.net/27852655" class="js-gallery-magnific-item" target="_blank">                            <img class="b-product-gallery__additional-image" src="https://image-thumbs.shafastatic.net/27852655_310_430" alt="Матовые колготки c&amp;a 50den2" title="Матовые колготки c&amp;a 50den2" onerror="this.src=''https://assets.shafastatic.net/static/item-clothing-310x430-loading.png'';"></a>'),
(7, 'https://shafa.ua/women/drugoe/7760404-naturlnye-volosy-dlya-kapsulnogo-narashivaniya', 'Натуральные волосы для капсульного наращивания', 'Девочки, очень хорошие волосы, натуральные, славянские для капсульного горячего наращивания, щадящая процедура для быстрого отращивания своих волос, в использовании были один раз на 2 месяца. Состояние очень хорошее! Волос ровный, мягкий и легкий, в уходе не прихотливый. <br>Вес 2 хвостиков 150 грамм, длина 50-55 см. <br>Цвет натуральный черный. <br>Также в хвостике отдельно есть пару блонд прядей, наращивались отдельно, вес ~~ 20 грамм не окрашены. Тщательно обработанный волос. <br>Продаю ниже чем покупала =)<br>За доп. фото и вопросами пишите лс =)', '2999', '<a href="https://images.shafastatic.net/28283544" class="js-gallery-magnific-item" target="_blank">                            <img class="b-product-gallery__additional-image" src="https://image-thumbs.shafastatic.net/28283544_310_430" alt="Натуральные волосы для капсульного наращивания1" title="Натуральные волосы для капсульного наращивания1" onerror="this.src=''https://assets.shafastatic.net/static/item-clothing-310x430-loading.png'';"></a><a href="https://images.shafastatic.net/28283573" class="js-gallery-magnific-item" target="_blank">                            <img class="b-product-gallery__additional-image" src="https://image-thumbs.shafastatic.net/28283573_310_430" alt="Натуральные волосы для капсульного наращивания2" title="Натуральные волосы для капсульного наращивания2" onerror="this.src=''https://assets.shafastatic.net/static/item-clothing-310x430-loading.png'';"></a><a href="https://images.shafastatic.net/28283592" class="js-gallery-magnific-item" target="_blank">                            <img class="b-product-gallery__additional-image" src="https://image-thumbs.shafastatic.net/28283592_310_430" alt="Натуральные волосы для капсульного наращивания3" title="Натуральные волосы для капсульного наращивания3" onerror="this.src=''https://assets.shafastatic.net/static/item-clothing-310x430-loading.png'';"></a><a href="https://images.shafastatic.net/28283545" class="js-gallery-magnific-item" target="_blank">                            <img class="b-product-gallery__additional-image" src="https://image-thumbs.shafastatic.net/28283545_310_430" alt="Натуральные волосы для капсульного наращивания4" title="Натуральные волосы для капсульного наращивания4" onerror="this.src=''https://assets.shafastatic.net/static/item-clothing-310x430-loading.png'';"></a>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id_Category`);

--
-- Индексы таблицы `Color`
--
ALTER TABLE `Color`
  ADD PRIMARY KEY (`id_Color`);

--
-- Индексы таблицы `Size`
--
ALTER TABLE `Size`
  ADD PRIMARY KEY (`id_size`),
  ADD KEY `id_Category` (`id_Category`);

--
-- Индексы таблицы `Sklad`
--
ALTER TABLE `Sklad`
  ADD PRIMARY KEY (`id_Sklad`),
  ADD KEY `id_Size` (`id_Size`),
  ADD KEY `id_Color` (`id_Color`),
  ADD KEY `id_Tovar` (`id_Tovar`);

--
-- Индексы таблицы `Tovar`
--
ALTER TABLE `Tovar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `URL` (`URL`),
  ADD FULLTEXT KEY `Description` (`Description`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id_Category` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `Color`
--
ALTER TABLE `Color`
  MODIFY `id_Color` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Size`
--
ALTER TABLE `Size`
  MODIFY `id_size` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `Sklad`
--
ALTER TABLE `Sklad`
  MODIFY `id_Sklad` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Tovar`
--
ALTER TABLE `Tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Size`
--
ALTER TABLE `Size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`id_Category`) REFERENCES `Category` (`id_Category`);

--
-- Ограничения внешнего ключа таблицы `Sklad`
--
ALTER TABLE `Sklad`
  ADD CONSTRAINT `sklad_ibfk_1` FOREIGN KEY (`id_Size`) REFERENCES `Size` (`id_size`),
  ADD CONSTRAINT `sklad_ibfk_2` FOREIGN KEY (`id_Color`) REFERENCES `Color` (`id_Color`),
  ADD CONSTRAINT `sklad_ibfk_3` FOREIGN KEY (`id_Tovar`) REFERENCES `Tovar` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
