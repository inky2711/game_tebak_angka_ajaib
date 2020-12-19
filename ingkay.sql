-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 03:15 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ingkay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'inky', '$2y$10$QWPz68pH8pC.4B.x7dRwEu58BeUZ.GWAJwwrylqvl9wpNh8sbVocW');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `isi`, `tanggal`, `time`) VALUES
(1, 'haii, selamat datang di INGKAY.. saya harap semua teman teman dapat terhibur dan menghilangkan kegabutan di rumah bersama INGKAY', '31-Maret-2020', 1585668536);

-- --------------------------------------------------------

--
-- Stand-in structure for view `posting`
--
CREATE TABLE `posting` (
`id_user` int(11)
,`nama` varchar(100)
,`image` varchar(500)
,`id_postingan` int(11)
,`isi` varchar(1000)
,`judul` varchar(100)
,`tanggal` varchar(100)
,`gambar` varchar(500)
);

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_postingan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_postingan`, `judul`, `isi`, `gambar`, `tanggal`, `id_user`) VALUES
(21, 'POSTINGAN 1', 'halooo minna-san', 'images/5e8e002b78530.jpg', '08-April-2020', 25),
(22, 'No OMDO NO POSTING', 'Matamuuuu jancokkkk', 'images/5e8e7a84ad99c.jpg', '09-April-2020', 25),
(23, 'ã©ã†ã‚‚ã‚ã‚ŠãŒã¨ã†', 'ç§é”ã¯å­¦ç”Ÿã§ã™ã‚ˆ\r\nç§ã®ã‚«ãƒãƒ³ã¯ã‚ãŠã§ã™', 'images/5e8e7d1f4cdc7.jpg', '09-April-2020', 26),
(24, 'kasja', 'kjkajkjdasad', 'images/5fa7f86c21aba.jpg', '08-November-2020', 0),
(25, 'asd', 'asd', 'images/5fa7f98989950.jpg', '08-November-2020', 29);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `image`, `status`, `number`) VALUES
(25, 'inky', '$2y$10$/auJ14w31EHfc7pRxEIvb.L2HeuRnflSCAurfyaCdaKyvDxue9YUe', 'inky pramud', 'images/5e835ce781422.jpg', 'Berjuanglah sampai lelah!!', '27'),
(26, 'alzena', '$2y$10$gvKAEWI6vninazTEoICZxeI4VXHWJa92SAlKVS.AlrsYxJYCXqlke', 'Zena sofcan', 'images/5e8dbcbf53538.jpg', 'saya suka permen', '11'),
(27, 'rasya', '$2y$10$Sd0iORIo2yF1h/8MRI7hJeO.LhJVB2gosiX92e169.25aQmaUkxSi', 'rasya sinat', 'images/default.png', 'pacaran sama kunti', '12'),
(28, 'warung', '$2y$10$fk2QMj7aQD/g9MEqkDCXxOMAjW4BUpgTctKQTweeXv9UW6P05IWnK', 'siti', 'images/default.png', 'Belum Ada Status', '99'),
(29, 'admin', '$2y$10$NFey7VOl1NNNvTmd8K6/6u0ru8WkkAObg/D00uFKA0IaQ/lEY8TsO', 'admin', 'images/5fa7f9c591950.jpg', 'asd', '99');

-- --------------------------------------------------------

--
-- Structure for view `posting`
--
DROP TABLE IF EXISTS `posting`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `posting`  AS  select `u`.`id_user` AS `id_user`,`u`.`nama` AS `nama`,`u`.`image` AS `image`,`p`.`id_postingan` AS `id_postingan`,`p`.`isi` AS `isi`,`p`.`judul` AS `judul`,`p`.`tanggal` AS `tanggal`,`p`.`gambar` AS `gambar` from (`user` `u` join `postingan` `p`) where (`p`.`id_user` = `u`.`id_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_postingan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_postingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
