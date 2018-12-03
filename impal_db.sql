-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 05:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE `bendahara` (
  `idemployee` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `idemployee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `id_data`
--

CREATE TABLE `id_data` (
  `emp_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(5) NOT NULL,
  `disp_pic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_data`
--

INSERT INTO `id_data` (`emp_id`, `username`, `name`, `email`, `password`, `level`, `disp_pic`) VALUES
(352, 'sujanto', 'Suherman', 'sumenep@gmail.com', 'jaja', 6, ''),
(50000, 'mamak12', 'Mamak', 'haimamak@gmail.com', 'hahaha', 3, ''),
(531532, 'ngasal', 'ngasal aja', 'ngasal@haha.com', 'qwerty', 7, ''),
(123123123, 'bambanggg', 'bambang naruto', 'bambanggg@gmail.com', 'bambangwibu', 2, ''),
(1010101010, 'manager_one', 'Manager One', 'manager@showroom.com', 'manager', 1, ''),
(1111111111, 'admin', 'Administrator', 'admin@admin.com', 'admin', 0, ''),
(1301111111, 'sayahaha', 'saya haha', 'haha@email.com', 'hhh', 1, ''),
(1301162314, 'paymukh', 'Naufal Mukhbit', 'nmukhbit@gmail.com', 'hahaha', 5, ''),
(2147483647, 'jajang23', 'Jajang Warkop', 'jajang23@gmail.com', 'jajangsayang', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `idemployee` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manajer`
--

CREATE TABLE `manajer` (
  `idemployee` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `idemployee` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opgudang`
--

CREATE TABLE `opgudang` (
  `idemployee` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_order` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `custname` varchar(50) NOT NULL,
  `custid` int(10) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `idpurchase` varchar(10) NOT NULL,
  `typepurchase` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `customername` varchar(30) NOT NULL,
  `ktp` varchar(10) NOT NULL,
  `unit_type` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `price` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`idpurchase`, `typepurchase`, `date`, `customername`, `ktp`, `unit_type`, `color`, `price`) VALUES
('11', '1', '1111-11-11', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `date` date NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `unit` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `idemployee` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `idservice` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`idservice`, `type`, `customer`, `tanggal`, `price`) VALUES
('aku', 'sayang', 'kamu', '2018-12-05', 21);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idstock` varchar(10) NOT NULL,
  `unit_type` varchar(20) NOT NULL,
  `idcar` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idstock`, `unit_type`, `idcar`, `color`, `quantity`, `price`) VALUES
('2', '3', '3', '3', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `idtransaction` varchar(10) NOT NULL,
  `typetransaction` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `customername` varchar(30) NOT NULL,
  `ktp` varchar(10) NOT NULL,
  `unit_type` varchar(30) NOT NULL,
  `idcar` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`idtransaction`, `typetransaction`, `date`, `customername`, `ktp`, `unit_type`, `idcar`, `color`) VALUES
('001', 'Purchase', '2018-12-01', 'Gery', '1301164000', 'Toyota Avanza', '0035', 'Red');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `id_data`
--
ALTER TABLE `id_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `opgudang`
--
ALTER TABLE `opgudang`
  ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`idpurchase`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idservice`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idstock`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`idtransaction`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
