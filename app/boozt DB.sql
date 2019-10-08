-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: oct. 08, 2019 la 01:17 PM
-- Versiune server: 10.1.37-MariaDB
-- Versiune PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `boozt`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `email`) VALUES
(1, 'Al', 'Pacino', 'test@gmail.com'),
(2, 'Robert', 'De Niro', 'test1@gmail.com'),
(3, 'Joe', 'Pesci', 'test2@gmail.com'),
(4, 'Matt', 'Damon', 'test3@gmail.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orderItems`
--

CREATE TABLE `orderItems` (
  `orderItemsId` int(11) NOT NULL,
  `ean` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `orderItems`
--

INSERT INTO `orderItems` (`orderItemsId`, `ean`, `quantity`, `price`, `orderId`) VALUES
(1, 321321, 3, 5000, 3),
(2, 13212312, 5, 8000, 2),
(3, 3213, 5, 800, 3),
(4, 2312, 1, 1000, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `country` varchar(20) NOT NULL,
  `device` varchar(20) NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `orders`
--

INSERT INTO `orders` (`orderId`, `purchaseDate`, `country`, `device`, `customerId`) VALUES
(1, '2019-09-21 20:00:00', 'Denmark', 'mobile', 3),
(2, '2019-10-08 14:00:00', 'Sweden', 'laptop', 3),
(3, '2019-08-13 15:00:00', 'Denmark', 'phone', 1),
(4, '2019-10-01 12:00:00', 'Norway', 'tablet', 3),
(6, '2019-10-01 10:00:00', 'Sweden', 'laptop', 3),
(7, '2019-08-01 00:00:00', 'Denmark', 'laptop', 3),
(8, '2019-08-02 00:00:00', 'Norway', 'tablet', 4),
(9, '2019-08-03 00:00:00', 'Denmark', 'mobile', 1),
(10, '2019-08-04 00:00:00', 'Sweden', 'mobile', 3);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexuri pentru tabele `orderItems`
--
ALTER TABLE `orderItems`
  ADD PRIMARY KEY (`orderItemsId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `orderItems`
--
ALTER TABLE `orderItems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constrângeri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
