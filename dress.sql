-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 14 2020 г., 16:48
-- Версия сервера: 5.5.25
-- Версия PHP: 5.6.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `intertkani`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dress`
--

CREATE TABLE IF NOT EXISTS `dress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8_bin NOT NULL,
  `model` text COLLATE utf8_bin NOT NULL,
  `season` text COLLATE utf8_bin NOT NULL,
  `gender` text COLLATE utf8_bin NOT NULL,
  `color` text COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `size_40` text COLLATE utf8_bin NOT NULL,
  `size_42` text COLLATE utf8_bin NOT NULL,
  `size_44` text COLLATE utf8_bin NOT NULL,
  `size_46` text COLLATE utf8_bin NOT NULL,
  `size_48` text COLLATE utf8_bin NOT NULL,
  `size_50` text COLLATE utf8_bin NOT NULL,
  `size_52` text COLLATE utf8_bin NOT NULL,
  `size_54` text COLLATE utf8_bin NOT NULL,
  `size_56` text COLLATE utf8_bin NOT NULL,
  `size_58` text COLLATE utf8_bin NOT NULL,
  `size_60` text COLLATE utf8_bin NOT NULL,
  `size_62` text COLLATE utf8_bin NOT NULL,
  `size_64` text COLLATE utf8_bin NOT NULL,
  `size_66` text COLLATE utf8_bin NOT NULL,
  `size_68` text COLLATE utf8_bin NOT NULL,
  `size_70` text COLLATE utf8_bin NOT NULL,
  `img_1` text COLLATE utf8_bin NOT NULL,
  `img_2` text COLLATE utf8_bin NOT NULL,
  `img_3` text COLLATE utf8_bin NOT NULL,
  `img_4` text COLLATE utf8_bin NOT NULL,
  `img_5` text COLLATE utf8_bin NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5073 ;

--
-- Дамп данных таблицы `dress`
--

INSERT INTO `dress` (`id`, `type`, `model`, `season`, `gender`, `color`, `cost`, `size_40`, `size_42`, `size_44`, `size_46`, `size_48`, `size_50`, `size_52`, `size_54`, `size_56`, `size_58`, `size_60`, `size_62`, `size_64`, `size_66`, `size_68`, `size_70`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`) VALUES
(5000, 'Куртки', 'Бомбер', 'Осень', 'Женская', 'Красный', '1900', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/bomber_red_1.jpg', 'img/dress/bomber_red_2.jpg', 'img/dress/bomber_red_3.jpg', '', ''),
(5001, 'Куртки', 'LD', 'Осень', 'Женская', 'Голубой', '1940', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', 'img/dress/ld_blue_1.jpg', 'img/dress/ld_blue_2.jpg', 'img/dress/ld_blue_3.jpg', 'img/dress/ld_blue_4.jpg', ''),
(5002, 'Куртки', 'LD', 'Осень', 'Женская', 'Серый', '1940', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', 'img/dress/ld_grey_1.jpg', 'mg/dress/ld_grey_2.jpg', 'mg/dress/ld_grey_3.jpg', '', ''),
(5003, 'Куртки', 'LD', 'Осень', 'Женская', 'Фиолетовый', '1940', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', 'img/dress/ld_violet_1.jpg', 'img/dress/ld_violet_2.jpg', 'img/dress/ld_violet_3.jpg', 'img/dress/ld_violet_4.jpg', ''),
(4999, 'Куртки', 'Бомбер', 'Осень', 'Женская', 'Желтый', '1900', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/bomber_yelow_1.jpg', 'img/dress/bomber_yelow_2.jpg', 'img/dress/bomber_yelow_3.jpg', '', ''),
(4998, 'Куртки', 'Бомбер', 'Осень', 'Женская', 'Бирюзовый', '1900', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/bomber_bluegr_1.jpg', 'img/dress/bomber_bluegr_2.jpg', 'img/dress/bomber_bluegr_3.jpg', 'img/dress/bomber_bluegr_4.jpg', ''),
(4997, 'Куртки', 'Бомбер', 'Осень', 'Женская', 'Голубой', '1900', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/bomber_blue_1.jpg', 'img/dress/bomber_blue_2.jpg', 'img/dress/bomber_blue_3.jpg', 'img/dress/bomber_blue_4.jpg', ''),
(5004, 'Куртки', 'PL', 'Осень', 'Женская', 'Желтый', '2000', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', 'img/dress/pl_yelow_1.jpg', 'img/dress/pl_yelow_2.jpg', 'img/dress/pl_yelow_3.jpg', 'img/dress/pl_yelow_4.jpg', ''),
(5005, 'Куртки', 'PL', 'Осень', 'Женская', 'Голубой', '2000', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', 'img/dress/pl_blue_1.jpg', 'img/dress/pl_blue_2.jpg', 'img/dress/pl_blue_3.jpg', 'img/dress/pl_blue_4.jpg', ''),
(5006, 'Куртки', 'PL', 'Осень', 'Женская', 'Серый', '2000', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', 'img/dress/pl_grey_1.jpg', 'img/dress/pl_grey_2.jpg', 'img/dress/pl_grey_3.jpg', 'img/dress/pl_grey_4.jpg', ''),
(5007, 'Куртки', 'KV', 'Осень', 'Женская', 'Белый', '1580', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/kv_white_1.jpg', 'img/dress/kv_white_2.jpg', 'img/dress/kv_white_3.jpg', '', ''),
(5008, 'Куртки', 'KV', 'Осень', 'Женская', 'Желтый', '1580', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/kv_yelow_1.jpg', 'img/dress/kv_yelow_2.jpg', 'img/dress/kv_yelow_3.jpg', '', ''),
(5009, 'Куртки', 'MI-1', 'Зима', 'Женская', 'Бирюза', '2440', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi1_biruza_1.jpg', 'img/dress/mi1_biruza_2.jpg', '', '', ''),
(5010, 'Куртки', 'MI-1', 'Зима', 'Женская', 'Серый', '2440', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi1_grey_1.jpg', 'img/dress/mi1_grey_2.jpg', '', '', ''),
(5011, 'Куртки', 'MI-1', 'Зима', 'Женская', 'Синий', '2440', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi1_blue_1.jpg', 'img/dress/mi1_blue_2.jpg', '', '', ''),
(5012, 'Куртки', 'MI-1', 'Зима', 'Женская', 'Морская волна', '2440', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi1_mv_1.jpg', 'img/dress/mi1_mv_2.jpg', 'img/dress/mi1_mv_3.jpg', '', ''),
(5013, 'Куртки', 'MI-1', 'Зима', 'Женская', 'Фиолетовый', '2440', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi1_violet_1.jpg', 'img/dress/mi1_violet_2.jpg', 'img/dress/mi1_violet_3.jpg', 'img/dress/mi1_violet_4.jpg', ''),
(5014, 'Куртки', 'MI-2', 'Зима', 'Женская', 'Серый', '2300', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi2_grey_1.jpg', 'img/dress/mi2_grey_2.jpg', 'img/dress/mi2_grey_3.jpg', '', ''),
(5015, 'Куртки', 'MI-2', 'Зима', 'Женская', 'Синий', '2300', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi2_blue_1.jpg', 'img/dress/mi2_blue_2.jpg', 'img/dress/mi2_blue_3.jpg', 'img/dress/mi2_blue_4.jpg', ''),
(5016, 'Куртки', 'MI-2', 'Зима', 'Женская', 'Фиолетовый', '2300', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi2_violet_1.jpg', 'img/dress/mi2_violet_2.jpg', 'img/dress/mi2_violet_3.jpg', '', ''),
(5017, 'Куртки', 'MI-2', 'Зима', 'Женская', 'Бирюза', '2300', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi2_biruza_1.jpg', 'img/dress/mi2_biruza_2.jpg', 'img/dress/mi2_biruza_3.jpg', 'img/dress/mi2_biruza_4.jpg', ''),
(5018, 'Куртки', 'MI-2', 'Зима', 'Женская', 'Морская волна', '2300', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/mi2_mv_1.jpg', 'img/dress/mi2_mv_2.jpg', 'img/dress/mi2_mv_3.jpg', '', ''),
(5020, 'Куртки', 'UG-35', 'Осень', 'Мужская', 'Черный', '1540', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', '', 'img/dress/ug35_black_3.jpg', 'img/dress/ug35_black_2.jpg', 'img/dress/ug35_black_1.jpg', '', ''),
(5019, 'Куртки', 'UG-44', 'Осень', 'Мужская', 'Синий', '1540', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug44_blue_1.jpg', 'img/dress/ug44_blue_2.jpg', 'img/dress/ug44_blue_3.jpg', '', ''),
(5021, 'Куртки', 'UG-44', 'Осень', 'Мужская', 'Беж', '1540', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug44_beg_1.jpg', 'img/dress/ug44_beg_2.jpg', '', '', ''),
(5022, 'Куртки', 'UG-45', 'Осень', 'Мужская', 'Серо-черный', '1840', '', '', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', 'img/dress/ug45_gb_1.jpg', 'img/dress/ug45_gb_2.jpg', 'img/dress/ug45_gb_3.jpg', 'img/dress/ug45_gb_4.jpg', 'img/dress/ug45_gb_5.jpg'),
(5023, 'Куртки', 'UG-50', 'Осень', 'Мужская', 'Черный', '1650', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug50_black_1.jpg', 'img/dress/ug50_black_2.jpg', 'img/dress/ug50_black_3.jpg', 'img/dress/ug50_black_4.jpg', ''),
(5024, 'Куртки', 'UG-50', 'Осень', 'Мужская', 'Синий', '1650', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug50_blue_1.jpg', 'img/dress/ug50_blue_2.jpg', 'img/dress/ug50_blue_3.jpg', 'img/dress/ug50_blue_4.jpg', ''),
(5025, 'Куртки', 'UG-51', 'Осень', 'Мужская', 'Синий', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug51_blue_1.jpg', 'img/dress/ug51_blue_2.jpg', 'img/dress/ug51_blue_3.jpg', 'img/dress/ug51_blue_4.jpg', ''),
(5026, 'Куртки', 'UG-51', 'Осень', 'Мужская', 'Графит', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug51_grafit_1.jpg', 'img/dress/ug51_grafit_2.jpg', 'img/dress/ug51_grafit_3.jpg', 'img/dress/ug51_grafit_4.jpg', ''),
(5027, 'Куртки', 'UG-51', 'Осень', 'Мужская', 'Хаки', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug51_xaki_1.jpg', 'img/dress/ug51_xaki_2.jpg', 'img/dress/ug51_xaki_3.jpg', 'img/dress/ug51_xaki_4.jpg', ''),
(5028, 'Куртки', 'UG-55', 'Осень', 'Мужская', 'Синий', '1540', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug55_blue_1.jpg', 'img/dress/ug55_blue_2.jpg', 'img/dress/ug55_blue_3.jpg', 'img/dress/ug55_blue_4.jpg', 'img/dress/ug55_blue_5.jpg'),
(5029, 'Куртки', 'UG-55', 'Осень', 'Мужская', 'Черный', '1540', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/ug55_black_1.jpg', 'img/dress/ug55_black_2.jpg', '', '', ''),
(5030, 'Куртки', 'UG-56', 'Осень', 'Мужская', 'Черный', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/ug56_black_1.jpg', 'img/dress/ug56_black_2.jpg', 'img/dress/ug56_black_3.jpg', '', ''),
(5031, 'Куртки', 'UG-56', 'Осень', 'Мужская', 'Синий', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/ug56_blue_1.jpg', 'img/dress/ug56_blue_2.jpg', 'img/dress/ug56_blue_3.jpg', '', ''),
(5032, 'Куртки', 'UG-57', 'Осень', 'Мужская', 'Синий', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/ug57_blue_1.jpg', 'img/dress/ug57_blue_2.jpg', '', '', ''),
(5033, 'Куртки', 'UG-57', 'Осень', 'Мужская', 'Черный', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/ug57_black_1.jpg', 'img/dress/ug57_black_2.jpg', 'img/dress/ug57_black_3.jpg', '', ''),
(5034, 'Куртки', 'UG-57', 'Осень', 'Мужская', 'Серый', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/ug57_grey_1.jpg', 'img/dress/ug57_grey_2.jpg', 'img/dress/ug57_grey_3.jpg', 'img/dress/ug57_grey_4.jpg', ''),
(5035, 'Куртки', 'UG-57', 'Осень', 'Мужская', 'Хаки', '1540', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '', '', 'img/dress/ug57_xaki_1.jpg', 'img/dress/ug57_xaki_2.jpg', 'img/dress/ug57_xaki_3.jpg', '', ''),
(5036, 'Куртки', 'UW-53', 'Зима', 'Мужская', 'Черный', '2060', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw53_black_1.jpg', 'img/dress/uw53_black_2.jpg', 'img/dress/uw53_black_3.jpg', 'img/dress/uw53_black_4.jpg', 'img/dress/uw53_black_5.jpg'),
(5037, 'Куртки', 'UW-49', 'Зима', 'Мужская', 'Черный', '2180', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw49_black_1.jpg', 'img/dress/uw49_black_2.jpg', 'img/dress/uw49_black_3.jpg', 'img/dress/uw49_black_4.jpg', 'img/dress/uw49_black_5.jpg'),
(5037, 'Куртки', 'UW-49', 'Зима', 'Мужская', 'Синий', '2180', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw49_blue_1.jpg', 'img/dress/uw49_blue_2.jpg', 'img/dress/uw49_blue_3.jpg', 'img/dress/uw49_blue_4.jpg', 'img/dress/uw49_blue_5.jpg'),
(5038, 'Куртки', 'UW-49', 'Зима', 'Мужская', 'Серый', '2180', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw49_grey_1.jpg', 'img/dress/uw49_grey_2.jpg', 'img/dress/uw49_grey_3.jpg', 'img/dress/uw49_grey_4.jpg', 'img/dress/uw49_grey_5.jpg'),
(5039, 'Куртки', 'UW-49', 'Зима', 'Мужская', 'Хаки', '2180', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw49_xaki_1.jpg', 'img/dress/uw49_xaki_2.jpg', 'img/dress/uw49_xaki_3.jpg', 'img/dress/uw49_xaki_4.jpg', 'img/dress/uw49_xaki_5.jpg'),
(5040, 'Куртки', 'UW-47', 'Зима', 'Мужская', 'Синий', '2260', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw47_blue_1.jpg', 'img/dress/uw47_blue_2.jpg', 'img/dress/uw47_blue_3.jpg', '', ''),
(5041, 'Куртки', 'UW-47', 'Зима', 'Мужская', 'Черный', '2260', '', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw47_black_1.jpg', 'img/dress/uw47_black_2.jpg', 'img/dress/uw47_black_3.jpg', '', ''),
(5042, 'Куртки', 'UW-52', 'Зима', 'Мужская', 'Черный', '2060', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw52_black_1.jpg', 'img/dress/uw52_black_2.jpg', 'img/dress/uw52_black_3.jpg', 'img/dress/uw52_black_4.jpg', 'img/dress/uw52_black_5.jpg'),
(5044, 'Куртки', 'UW-48', 'Зима', 'Мужская', 'Синий', '2060', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw48_blue_1.jpg', 'img/dress/uw48_blue_2.jpg', 'img/dress/uw48_blue_3.jpg', 'img/dress/uw48_blue_4.jpg', 'img/dress/uw48_blue_5.jpg'),
(5045, 'Куртки', 'UW-48', 'Зима', 'Мужская', 'Черный', '2060', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw48_black_1.jpg', 'img/dress/uw48_black_2.jpg', 'img/dress/uw48_black_3.jpg', 'img/dress/uw48_black_4.jpg', 'img/dress/uw48_black_5.jpg'),
(5046, 'Куртки', 'UW-51', 'Зима', 'Мужская', 'Черный', '2060', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw51_blue_1.jpg', 'img/dress/uw51_blue_2.jpg', 'img/dress/uw51_blue_3.jpg', 'img/dress/uw51_blue_4.jpg', 'img/dress/uw51_blue_5.jpg'),
(5047, 'Куртки', 'UW-37', 'Зима', 'Мужская', 'Синий', '1900', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw37_blue_1.jpg', 'img/dress/uw37_blue_2.jpg', 'img/dress/uw37_blue_3.jpg', '', ''),
(5048, 'Куртки', 'UW-37', 'Зима', 'Мужская', 'Черный', '1900', '', '', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw37_black_1.jpg', 'img/dress/uw37_black_2.jpg', '', '', ''),
(5049, 'Куртки', 'UW-P9', 'Зима', 'Мужская', 'Синий', '1640', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uwp9_blue_1.jpg', 'img/dress/uwp9_blue_2.jpg', '', '', ''),
(5050, 'Куртки', 'UW-P9', 'Зима', 'Мужская', 'Джинс', '1640', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uwp9_dzins_1.jpg', 'img/dress/uwp9_dzins_2.jpg', 'img/dress/uwp9_dzins_3.jpg', '', ''),
(5051, 'Куртки', 'UW-39', 'Зима', 'Мужская', 'Джинс', '1640', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw39_dzins_1.jpg', 'img/dress/uw39_dzins_2.jpg', 'img/dress/uw39_dzins_3.jpg', '', ''),
(5052, 'Куртки', 'UW-39', 'Зима', 'Мужская', 'Черный', '1640', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw39_black_1.jpg', 'img/dress/uw39_black_2.jpg', 'img/dress/uw39_black_3.jpg', 'img/dress/uw39_black_3.jpg', ''),
(5053, 'Куртки', 'UW-39', 'Зима', 'Мужская', 'Синий', '1640', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw39_blue_1.jpg', 'img/dress/uw39_blue_2.jpg', '', '', ''),
(5054, 'Куртки', 'UW-35', 'Зима', 'Мужская', 'Синий', '1900', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '', 'img/dress/uw35_blue_1.jpg', 'img/dress/uw35_blue_2.jpg', 'img/dress/uw35_blue_3.jpg', '', ''),
(5055, 'Спортивные костюмы', 'K1', 'Осень', 'Женская', 'Синий', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1_velur_blue.jpg', '', '', '', ''),
(5056, 'Спортивные костюмы', 'K1', 'Осень', 'Женская', 'Черный', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1_velur_black.jpg', '', '', '', ''),
(5057, 'Спортивные костюмы', 'K1', 'Осень', 'Женская', 'Бордовый', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1_velur_bordo.jpg', '', '', '', ''),
(5058, 'Спортивные костюмы', 'K1', 'Осень', 'Женская', 'Розовый', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1_velur_pink.jpg', '', '', '', ''),
(5059, 'Спортивные костюмы', 'K1', 'Осень', 'Женская', 'Шоколад', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1_velur_shokolad.jpg', '', '', '', ''),
(5060, 'Спортивные костюмы', 'F1-9A', 'Осень', 'Женская', 'Черный', '750', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/f19a_black_1.jpg', 'img/dress/f19a_black_2.jpg', '', '', ''),
(5061, 'Спортивные костюмы', 'F1-9A', 'Осень', 'Женская', 'Синий', '750', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/f19a_blue_1.jpg', 'img/dress/f19a_blue_2.jpg', '', '', ''),
(5062, 'Спортивные костюмы', 'F1-9A', 'Осень', 'Женская', 'Красный', '750', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/f19a_red_1.jpg', 'img/dress/f19a_red_2.jpg', '', '', ''),
(5063, 'Спортивные костюмы', 'FS-5', 'Осень', 'Женская', 'Красный', '750', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/fs5_red_1.jpg', 'img/dress/fs5_red_2.jpg', '', '', ''),
(5064, 'Спортивные костюмы', 'FS-5', 'Осень', 'Женская', 'Серый', '750', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/fs5_grey.jpg', '', '', '', ''),
(5065, 'Спортивные костюмы', 'FS-5', 'Осень', 'Женская', 'Синий', '750', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/fs5_blue.jpg', '', '', '', ''),
(5066, 'Спортивные костюмы', 'DS-5', 'Зима', 'Женская', 'Серый', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/ds5_grey.jpg', '', '', '', ''),
(5067, 'Спортивные костюмы', 'DS-5', 'Зима', 'Женская', 'Красный', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/ds5_red_1.jpg', 'img/dress/ds5_red_2.jpg', '', '', ''),
(5068, 'Спортивные костюмы', 'F1-9U', 'Зима', 'Женская', 'Серый', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/f19u_grey_1.jpg', 'img/dress/f19u_grey_2.jpg', 'img/dress/f19u_grey_3.jpg', '', ''),
(5069, 'Спортивные костюмы', 'K1-U', 'Зима', 'Женская', 'Бордовый', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1u_bordo.jpg', '', '', '', ''),
(5070, 'Спортивные костюмы', 'K1-U', 'Зима', 'Женская', 'Капучино', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1u_kapuchino.jpg', '', '', '', ''),
(5071, 'Спортивные костюмы', 'K1-U', 'Зима', 'Женская', 'Сирень', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1u_siren.jpg', '', '', '', ''),
(5072, 'Спортивные костюмы', 'K1-U', 'Зима', 'Женская', 'Слива', '850', '', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'img/dress/k1u_sliva.jpg', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
