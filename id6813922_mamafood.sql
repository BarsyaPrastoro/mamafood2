-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2018 at 10:43 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamafood`
--
CREATE DATABASE IF NOT EXISTS `mamafood` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mamafood`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_pedagang`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `data_pedagang`;
CREATE TABLE `data_pedagang` (
`idPedagang` int(9)
,`umurAkun` int(11)
,`fotoProfil` longblob
,`FotoKtp` longblob
,`statusAkun` tinyint(1)
,`waktuSignUp` date
,`jumlahMenu` int(11)
,`idUser` int(9)
,`namaUser` varchar(20)
,`password` varchar(11)
,`emailUser` varchar(30)
,`noTelpon` varchar(14)
,`Alamat` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_pemesan`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `data_pemesan`;
CREATE TABLE `data_pemesan` (
`idPemesan` int(9)
,`nama` varchar(20)
,`Email` varchar(30)
,`noTelepon` varchar(14)
);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `idMenu` int(9) NOT NULL,
  `idPedagang` int(9) NOT NULL,
  `namaMenu` varchar(50) NOT NULL,
  `hargaMenu` int(6) NOT NULL,
  `deskripsiMenu` varchar(100) NOT NULL,
  `fotoMenu` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `idPedagang`, `namaMenu`, `hargaMenu`, `deskripsiMenu`, `fotoMenu`) VALUES
(1, 1, 'nasi bakar', 5000, 'nasi yang dibakar menggunakan arang second', ''),
(2, 1, 'nasi goreng', 12000, 'nasi goreng putih, dengan rempah dari aceh', ''),
(3, 2, 'iga bakar', 30000, 'iga bakar dengan rempah khas kota aceh ', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `menu_pedagang`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `menu_pedagang`;
CREATE TABLE `menu_pedagang` (
`idMenu` int(9)
,`idPedagang` int(9)
,`namaMenu` varchar(50)
,`hargaMenu` int(6)
,`deskripsiMenu` varchar(100)
,`fotoMenu` longblob
);

-- --------------------------------------------------------

--
-- Table structure for table `pedagang`
--

DROP TABLE IF EXISTS `pedagang`;
CREATE TABLE `pedagang` (
  `idPedagang` int(9) NOT NULL,
  `umurAkun` int(11) DEFAULT NULL,
  `FotoProfil` longblob NOT NULL,
  `FotoKtp` longblob,
  `statusAkun` tinyint(1) DEFAULT NULL,
  `waktuSignUp` date DEFAULT NULL,
  `jumlahMenu` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagang`
--

INSERT INTO `pedagang` (`idPedagang`, `umurAkun`, `FotoProfil`, `FotoKtp`, `statusAkun`, `waktuSignUp`, `jumlahMenu`) VALUES
(1, 2, '', NULL, 1, '2018-03-05', 2),
(2, 2, '', NULL, 1, '2018-01-01', 2),
(3, 2, '', NULL, 1, '2018-02-02', 2),
(4, 2, '', NULL, 0, '2018-08-17', 2),
(5, 2, '', NULL, 0, '2018-04-01', 2),
(7, 2, '', NULL, 1, '2018-04-04', 2),
(9, 0, '', NULL, 1, '2018-04-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

DROP TABLE IF EXISTS `pemesan`;
CREATE TABLE `pemesan` (
  `idPemesan` int(9) NOT NULL,
  `namaUser` varchar(20) NOT NULL,
  `emailUser` varchar(30) NOT NULL,
  `noTelpon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`idPemesan`, `namaUser`, `emailUser`, `noTelpon`) VALUES
(8, 'kancil', 'kancil@gmail.com', '567890');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

DROP TABLE IF EXISTS `saldo`;
CREATE TABLE `saldo` (
  `idSaldo` int(9) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`idSaldo`, `jumlah`) VALUES
(1, 50000),
(2, 300000),
(3, 1000000),
(4, 20000),
(5, 32000),
(7, 200000),
(8, 67890),
(9, 80000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `saldo_user`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `saldo_user`;
CREATE TABLE `saldo_user` (
`idUser` int(9)
,`namaUser` varchar(20)
,`jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `idUser` int(9) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `namaUser` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `emailUser` varchar(30) NOT NULL,
  `noTelpon` varchar(14) NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `role`, `namaUser`, `password`, `emailUser`, `noTelpon`, `Alamat`) VALUES
(1, 1, 'barsya', '123456', 'barsya96@gmail.com', '983402934', 'jl. banteng'),
(2, 1, 'nadhila', '123456', 'nadhila5@gmail.com', '983402934', 'jl. banteng'),
(3, 1, 'tobi', '11232546', 'tobiazdut@gmail.com', '3719823094', 'jl.wira'),
(4, 1, 'juan', '1232765', 'juan@gmail.com', '983434', 'jl. jawa'),
(5, 1, 'christo', '123456', 'christo@gmail.com', '983402934', 'jl. sumatra'),
(7, 1, 'jelema', '123456', 'jelema@gmail.com', '983402934', 'jl. sulawesi'),
(8, 0, 'kancil', 'kancil123', 'kancil@gmail.com', '567890', 'bawah tanah'),
(9, 1, 'nensi', 'nensi24', 'nensi@yahoo.com', '09849', 'simponi');

-- --------------------------------------------------------

--
-- Table structure for table `userperusahaan`
--

DROP TABLE IF EXISTS `userperusahaan`;
CREATE TABLE `userperusahaan` (
  `idUser` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `namaPegawai` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userperusahaan`
--

INSERT INTO `userperusahaan` (`idUser`, `status`, `namaPegawai`, `password`) VALUES
(1, 1, 'JuanPutranto', 'juan123'),
(2, 2, 'nadhilalarasati', 'nadhila5'),
(3, 4, 'Fadhlan', 'fad123');

-- --------------------------------------------------------

--
-- Structure for view `data_pedagang`
--
DROP TABLE IF EXISTS `data_pedagang`;

CREATE VIEW `data_pedagang`  AS  select `pedagang`.`idPedagang` AS `idPedagang`,`pedagang`.`umurAkun` AS `umurAkun`,`pedagang`.`FotoProfil` AS `fotoProfil`,`pedagang`.`FotoKtp` AS `FotoKtp`,`pedagang`.`statusAkun` AS `statusAkun`,`pedagang`.`waktuSignUp` AS `waktuSignUp`,`pedagang`.`jumlahMenu` AS `jumlahMenu`,`user`.`idUser` AS `idUser`,`user`.`namaUser` AS `namaUser`,`user`.`password` AS `password`,`user`.`emailUser` AS `emailUser`,`user`.`noTelpon` AS `noTelpon`,`user`.`Alamat` AS `Alamat` from (`pedagang` join `user` on((`pedagang`.`idPedagang` = `user`.`idUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `data_pemesan`
--
DROP TABLE IF EXISTS `data_pemesan`;

CREATE VIEW `data_pemesan`  AS  select `pemesan`.`idPemesan` AS `idPemesan`,`pemesan`.`namaUser` AS `nama`,`pemesan`.`emailUser` AS `Email`,`pemesan`.`noTelpon` AS `noTelepon` from (`pemesan` join `user` on((`pemesan`.`idPemesan` = `user`.`idUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `menu_pedagang`
--
DROP TABLE IF EXISTS `menu_pedagang`;

CREATE VIEW `menu_pedagang`  AS  select `menu`.`idMenu` AS `idMenu`,`pedagang`.`idPedagang` AS `idPedagang`,`menu`.`namaMenu` AS `namaMenu`,`menu`.`hargaMenu` AS `hargaMenu`,`menu`.`deskripsiMenu` AS `deskripsiMenu`,`menu`.`fotoMenu` AS `fotoMenu` from (`menu` join `pedagang` on((`menu`.`idPedagang` = `pedagang`.`idPedagang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `saldo_user`
--
DROP TABLE IF EXISTS `saldo_user`;

CREATE VIEW `saldo_user`  AS  select `user`.`idUser` AS `idUser`,`user`.`namaUser` AS `namaUser`,`saldo`.`jumlah` AS `jumlah` from (`saldo` left join `user` on((`saldo`.`idSaldo` = `user`.`idUser`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `idPedagang` (`idPedagang`);

--
-- Indexes for table `pedagang`
--
ALTER TABLE `pedagang`
  ADD PRIMARY KEY (`idPedagang`),
  ADD UNIQUE KEY `idUser` (`idPedagang`) USING BTREE;

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`idPemesan`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`idSaldo`),
  ADD UNIQUE KEY `idSaldo` (`idSaldo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `emailUser_2` (`emailUser`),
  ADD UNIQUE KEY `idUser_2` (`idUser`),
  ADD KEY `namaUser` (`namaUser`),
  ADD KEY `emailUser` (`emailUser`),
  ADD KEY `noTelpon` (`noTelpon`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `userperusahaan`
--
ALTER TABLE `userperusahaan`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
