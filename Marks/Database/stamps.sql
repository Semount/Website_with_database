-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 05:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stamps`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Mark1_id` int(10) UNSIGNED NOT NULL,
  `Mark2_id` int(10) UNSIGNED NOT NULL,
  `Mark3_id` int(10) UNSIGNED NOT NULL,
  `Collection_value` int(11) NOT NULL,
  `Collection_year` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`ID`, `Mark1_id`, `Mark2_id`, `Mark3_id`, `Collection_value`, `Collection_year`) VALUES
(1, 1, 8, 10, 26365000, 2005),
(2, 2, 7, 9, 11900000, 1999),
(3, 3, 4, 5, 138650, 1988),
(4, 1, 2, 11, 36720000, 1993),
(5, 12, 13, 14, 4220000, 2000),
(6, 3, 8, 15, 1921250, 2003),
(7, 2, 6, 14, 10187375, 2015),
(8, 12, 5, 13, 3230000, 1988),
(9, 6, 10, 3, 516125, 1976),
(10, 3, 4, 6, 96025, 1966);

-- --------------------------------------------------------

--
-- Stand-in structure for view `collection_to_mark`
-- (See below for the actual view)
--
CREATE TABLE `collection_to_mark` (
`ID` int(10) unsigned
,`Mark1` varchar(30)
,`Mark2` varchar(30)
,`Mark3` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Mark_name` varchar(30) NOT NULL,
  `Mark_price` int(11) NOT NULL,
  `Mark_year` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`ID`, `Mark_name`, `Mark_price`, `Mark_year`) VALUES
(1, 'Святой Грааль', 25000000, 1896),
(2, 'Британская Гвиана', 9000000, 1856),
(3, 'Рейс Мира и Дружбы', 28750, 1964),
(4, 'Закарпатская Украина', 29900, 1939),
(5, 'Авиапочта с толстой пятеркой', 80000, 1923),
(6, 'Второй международный полярный ', 37375, 1932),
(7, 'Желтый трехскиллинговик', 2100000, 1855),
(8, 'Розовый Маврикий', 915000, 1847),
(9, 'Тифлисская Уника', 800000, 1857),
(10, 'Леваневский с надпечаткой', 450000, 1935),
(11, 'Сицилийская ошибка цвета', 2720000, 1859),
(12, 'Баденская ошибка цвета', 2000000, 1851),
(13, 'Синий Маврикий', 1150000, 1847),
(14, 'Вся страна - красная', 1150000, 1968),
(15, 'Перевернутая Дженни', 977500, 1918);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mark_sort`
-- (See below for the actual view)
--
CREATE TABLE `mark_sort` (
`mark_name` varchar(30)
,`mark_price` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `museum`
--

CREATE TABLE `museum` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Adress` varchar(40) NOT NULL,
  `Collection_id` int(10) UNSIGNED NOT NULL,
  `Session` date NOT NULL,
  `Session_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `museum`
--

INSERT INTO `museum` (`ID`, `Name`, `Adress`, `Collection_id`, `Session`, `Session_id`) VALUES
(1, 'Центральный музей связи имени А. С. Попова', 'Почтамтский переулок 4', 4, '2022-08-17', 2),
(2, 'Центральный музей связи имени А. С. Попова', 'Почтамтский переулок 4', 1, '2022-07-21', 6),
(3, 'Центральный музей связи имени А. С. Попова', 'Почтамтский переулок 4', 2, '2022-10-01', 6),
(4, 'Музей истории Русской почты и Моспочтамта', 'Чистопрудный бульвар 2', 7, '2022-05-18', 1),
(5, 'Музей истории Русской почты и Моспочтамта', 'Чистопрудный бульвар 2', 8, '2022-05-28', 9),
(6, 'Музей связи Тверской области', 'Советская улица 5', 3, '2022-09-02', 5),
(7, 'Музей связи Тверской области', 'Советская улица 5', 5, '2022-07-22', 11),
(8, 'Музей связи Тверской области', 'Советская улица 5', 5, '2022-07-22', 7),
(9, 'Музей ямщика', 'Советская улица', 6, '2022-06-23', 4),
(10, 'Музей ямщика', 'Советская улица', 6, '2022-06-23', 3),
(11, 'Дом стационарного смотрителя', 'Большой проспект 32А', 9, '2022-06-06', 8),
(12, 'Дом стационарного смотрителя', 'Большой проспект 32А', 10, '2022-06-06', 12);

-- --------------------------------------------------------

--
-- Stand-in structure for view `museum_to_session`
-- (See below for the actual view)
--
CREATE TABLE `museum_to_session` (
`Название` varchar(60)
,`Дата` date
,`Время` time
,`Цена` smallint(6)
,`ID` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Price` smallint(6) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ID`, `Price`, `Time`) VALUES
(1, 75, '10:00:00'),
(2, 100, '14:00:00'),
(3, 50, '19:30:00'),
(4, 50, '09:30:00'),
(5, 75, '11:30:00'),
(6, 100, '12:00:00'),
(7, 75, '12:00:00'),
(8, 60, '09:00:00'),
(9, 80, '15:00:00'),
(10, 80, '10:00:00'),
(11, 75, '18:00:00'),
(12, 60, '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Session_ID` int(10) UNSIGNED NOT NULL,
  `username` varchar(18) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Session_ID`, `username`, `email`) VALUES
(1, 10, 'Semount', 'semount228@yandex.ru'),
(2, 6, 'Semount', 'semount228@yandex.ru'),
(3, 1, 'Mark_lover', 'mark_lover66@gmail.com'),
(4, 4, 'Mark_lover', 'mark_lover66@gmail.com'),
(5, 7, 'Mark_lover', 'mark_lover66@gmail.com'),
(6, 2, 'David2501', 'David_Ramzanov2005@mail.ru'),
(7, 3, 'David2501', 'David_Ramzanov2005@mail.ru'),
(8, 11, 'IsaRama', 'IsabelAramovna@mail.ru'),
(9, 5, 'IsaRama', 'IsabelAramovna@mail.ru'),
(10, 10, 'David2501', 'David_Ramzanov2005@mail.ru'),
(11, 6, 'IsaRama', 'IsabelAramovna@mail.ru'),
(12, 3, 'Semount', 'semount228@yandex.ru'),
(13, 12, 'Mark_lover', 'mark_lover66@gmail.com'),
(14, 8, 'IsaRama', 'IsabelAramovna@mail.ru'),
(15, 9, 'Mark_lover', 'mark_lover66@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `collection_to_mark`
--
DROP TABLE IF EXISTS `collection_to_mark`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `collection_to_mark`  AS SELECT `collection`.`ID` AS `ID`, `m1`.`Mark_name` AS `Mark1`, `m2`.`Mark_name` AS `Mark2`, `m3`.`Mark_name` AS `Mark3` FROM (((`collection` left join `mark` `m1` on(`m1`.`ID` = `collection`.`Mark1_id`)) left join `mark` `m2` on(`m2`.`ID` = `collection`.`Mark2_id`)) left join `mark` `m3` on(`m3`.`ID` = `collection`.`Mark3_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `mark_sort`
--
DROP TABLE IF EXISTS `mark_sort`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mark_sort`  AS SELECT `mark`.`Mark_name` AS `mark_name`, `mark`.`Mark_price` AS `mark_price` FROM `mark` ORDER BY `mark`.`Mark_price` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `museum_to_session`
--
DROP TABLE IF EXISTS `museum_to_session`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `museum_to_session`  AS SELECT `museum`.`Name` AS `Название`, `museum`.`Session` AS `Дата`, `session`.`Time` AS `Время`, `session`.`Price` AS `Цена`, `session`.`ID` AS `ID` FROM (`museum` join `session` on(`museum`.`Session_id` = `session`.`ID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_mark1_id` (`Mark1_id`),
  ADD KEY `fk_mark2_id` (`Mark2_id`),
  ADD KEY `fk_mark3_id` (`Mark3_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `museum`
--
ALTER TABLE `museum`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_collection_id` (`Collection_id`),
  ADD KEY `fk_sessionid` (`Session_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Session_ID` (`Session_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `museum`
--
ALTER TABLE `museum`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `fk_mark1_id` FOREIGN KEY (`Mark1_id`) REFERENCES `mark` (`ID`),
  ADD CONSTRAINT `fk_mark2_id` FOREIGN KEY (`Mark2_id`) REFERENCES `mark` (`ID`),
  ADD CONSTRAINT `fk_mark3_id` FOREIGN KEY (`Mark3_id`) REFERENCES `mark` (`ID`);

--
-- Constraints for table `museum`
--
ALTER TABLE `museum`
  ADD CONSTRAINT `fk_collection_id` FOREIGN KEY (`Collection_id`) REFERENCES `collection` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sessionid` FOREIGN KEY (`Session_id`) REFERENCES `session` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Session_ID`) REFERENCES `session` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
