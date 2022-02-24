-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 09:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_booking` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `banyak_orang` int(2) DEFAULT NULL,
  `status_booking` int(2) DEFAULT NULL,
  `tgl_booking` date DEFAULT NULL,
  `lokasi` varchar(25) DEFAULT NULL,
  `no_meja` varchar(10) DEFAULT NULL,
  `status_bayar` int(2) DEFAULT NULL,
  `dp_booking` varchar(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama_bayar` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `check_meja` varchar(50) DEFAULT NULL,
  `jam` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id_booking`, `id_pelanggan`, `atas_nama`, `no_hp`, `banyak_orang`, `status_booking`, `tgl_booking`, `lokasi`, `no_meja`, `status_bayar`, `dp_booking`, `bukti_bayar`, `atas_nama_bayar`, `nama_bank`, `no_rek`, `check_meja`, `jam`) VALUES
(1, 1, 'luki', '082122720253', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'faf', '082122720253', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'hendra', '543456345645', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'luki', '082122720253', 5, 1, '2021-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 'hendra', '543456345645', 5, 1, '2021-10-02', 'C', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 'faf', '082122720253', 6, 1, '2021-09-25', 'A', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 'luki', '082122720253', 5, 1, '2021-09-23', 'matoa', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 'faf', '265665456734', 5, 1, '2021-09-23', 'A', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 'hendra', '082122720253', 5, 1, '2021-10-13', 'lokasi_matoa', '1,2,3', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 'hendra', '265665456734', 7, 1, '2021-10-12', 'lokasi_matoa', '1,2,3', 1, NULL, 'CARD_TOKEN_RING1.png', 'luki', 'bri', '1233-4322-3132-3214', NULL, NULL),
(14, 1, 'hendra', '543456345645', 6, 2, '2021-10-29', 'lokasi_matoa', '1,2', 1, '120000', 'CARD_TOKEN_RING2.png', 'luki', 'bri', '1233-4322-3132-3214', NULL, NULL),
(15, 1, 'luki', '082122720253', 5, 1, '2021-10-12', 'lokasi_matoa', '1,2', 0, '50000', NULL, NULL, NULL, NULL, '2021-10-12T21:581,2', NULL),
(16, 1, 'luki', '082122720253', 6, 1, '2021-10-13', 'lokasi_c', '1,2', 0, '60000', NULL, NULL, NULL, NULL, '2021-10-13T14:001,2lokasi_c', NULL),
(17, 1, 'hendra', '082122720253', 6, 0, '2021-10-15', 'lokasi_matoa', '1', 0, '60000', NULL, NULL, NULL, NULL, '2021-10-151lokasi_matoa', NULL),
(18, 1, 'ljui', '082122720253', 7, 0, '2021-10-12', 'lokasi_a', NULL, 0, '70000', NULL, NULL, NULL, NULL, '2021-10-12lokasi_a', NULL),
(19, 1, 'hendra', '082122720253', 5, 0, '2021-10-14', 'lokasi_a', '1', 0, '50000', NULL, NULL, NULL, NULL, '2021-10-141lokasi_a', NULL),
(20, 1, 'hendra', '082122720253', 5, 0, '2021-10-14', 'lokasi_matoa', '1,2', 0, '50000', NULL, NULL, NULL, NULL, '2021-10-141,2lokasi_matoa', NULL),
(21, 1, 'hendra', '082122720253', 5, 1, '2021-10-14', 'lokasi_matoa', '1,2', 0, '50000', NULL, NULL, NULL, NULL, '2021-10-141,2lokasi_matoa', NULL),
(22, 1, 'hendra', '082122720253', 6, 1, '2021-10-14', 'lokasi_matoa', '1,2', 0, '60000', NULL, NULL, NULL, NULL, '2021-10-141,2lokasi_matoa', '18:31'),
(23, 1, 'hendri', '0823866447268', 6, 2, '2021-10-16', 'lokasi_matoa', NULL, 1, '60000', 'DSC02682.JPG', 'luki', 'bri', '1800-9878-9878-0989', NULL, '19:24'),
(24, 3, 'luki', '082386447268', 7, 1, '2022-01-26', 'lokasi_a', '1,2,3', 0, '70000', NULL, NULL, NULL, NULL, NULL, '16:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(5, 'snack'),
(6, 'dessert');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meja`
--

CREATE TABLE `tbl_meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` int(11) DEFAULT NULL,
  `status_meja` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_meja`
--

INSERT INTO `tbl_meja` (`id_meja`, `no_meja`, `status_meja`) VALUES
(1, 1, 0),
(2, 2, 0),
(7, 3, 0),
(8, 4, 0),
(9, 5, 0),
(10, 6, 0),
(11, 7, 0),
(12, 8, 0),
(13, 9, 0),
(14, 10, 0),
(15, 11, 0),
(16, 12, 0),
(17, 13, 0),
(18, 14, 0),
(19, 15, 0),
(20, 16, 0),
(21, 17, 0),
(22, 18, 0),
(23, 19, 0),
(24, 20, 0),
(25, 21, 0),
(26, 22, 0),
(27, 23, 1),
(28, 24, 0),
(29, 25, 0),
(30, 26, 0),
(31, 27, 0),
(32, 28, 0),
(33, 29, 0),
(34, 30, 0),
(35, 31, 0),
(36, 32, 0),
(37, 33, 0),
(38, 34, 0),
(39, 35, 0),
(40, 36, 0),
(41, 37, 0),
(42, 38, 0),
(43, 39, 0),
(44, 40, 0),
(45, 41, 0),
(46, 42, 0),
(47, 43, 0),
(48, 44, 0),
(49, 45, 0),
(50, 46, 0),
(51, 47, 0),
(52, 49, 0),
(53, 50, 1),
(54, 51, 0),
(55, 52, 0),
(56, 53, 0),
(57, 54, 0),
(58, 55, 0),
(59, 56, 0),
(60, 57, 0),
(61, 58, 0),
(62, 59, 1),
(63, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `id_kategori`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'Milkshake Taro', 2, 15000, 'taro, susu, ice cream, dan boba', 'taro-min.JPG'),
(2, 'Milkshake Vanilla', 2, 15000, ' vanilla, susu, ice cream, dan boba', 'vanilla-min.JPG'),
(7, 'mie rebus', 1, 15000, 'mie rebus, sosis, bakso dan telur', 'mie-rebus.JPG'),
(8, 'nasi goreng', 1, 20000, 'nasi goreng, sosis, bakso, dan telur', 'NASGOR_SPESSIA-min.JPG'),
(9, 'mie goreng', 1, 15000, 'mie goreng, sosis, bakso, dan telur', 'miegoreng.jpg'),
(10, 'spagheti', 1, 20000, 'spagheti dengan sauce bolognese', 'spagetti-min1.JPG'),
(11, 'roti bakar boba', 6, 18000, 'roti, pisang, susu kental, dengan topping ice cream dan boba', 'rotbar_boba-min.JPG'),
(12, 'waffle lava', 6, 20000, 'waffle, pisang, keju, dengan topping ice cream', 'WAFLE_CHOCO_LAVA-min.JPG'),
(13, 'cappucino', 2, 15000, 'cappucino, susu, ice cream, dan boba', 'cappucino-min.jpg'),
(14, 'cadburry', 2, 15000, 'cadburry, susu, ice cream dan boba', 'CADBURRY-min1.JPG'),
(15, 'choco oreo', 2, 15000, 'choco oreo, susu, ice cream, dan boba', 'choco_oreo-min.JPG'),
(16, 'creamy chocolate', 2, 15000, 'coklat, susu, ice cream dan boba', 'creamy_coklat-min.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`) VALUES
(1, 'luki34', 'pluki9920@gmail.com', '1234'),
(3, 'luki', 'perdana@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '1233-6346-2345-4564', 'Dama Cafe'),
(2, 'BNI', '4321-6435-5345-6456', 'Dama Cafe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci_transaksi` int(11) NOT NULL,
  `no_order` varchar(25) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci_transaksi`, `no_order`, `id_menu`, `qty`) VALUES
(3, '20210929LTY0ZSQL', 4, 3),
(4, '20210929LTY0ZSQL', 5, 3),
(5, '20210929FRFZWULC', 4, 3),
(6, '20210929FRFZWULC', 5, 3),
(7, '20210929FRFZWULC', 1, 1),
(8, '20210929GFZBL5RA', 4, 1),
(9, '20210929GFZBL5RA', 5, 1),
(10, '20210929GFZBL5RA', 3, 1),
(11, '20210929WCDTRQRB', 4, 1),
(12, '20211001Q2J3S4VP', 3, 1),
(13, '20211001Q2J3S4VP', 4, 1),
(14, '20211001R2JXU0DN', 3, 1),
(15, '20211001R2JXU0DN', 4, 1),
(16, '20211001M4ZLMJ6N', 3, 1),
(17, '20211001M4ZLMJ6N', 4, 1),
(18, '20211001M4ZLMJ6N', 5, 1),
(19, '20211005FXK5E7LP', 1, 1),
(20, '20211006XN9DBJBW', 3, 1),
(21, '20211006XN9DBJBW', 4, 1),
(22, '20211006N2PLLUKA', 3, 1),
(23, '20211006N2PLLUKA', 4, 1),
(24, '20211006ZNONMAU3', 3, 1),
(25, '20211006ZWCPDZIY', 3, 1),
(26, '20211006ZWCPDZIY', 5, 1),
(27, '20211006ZWCPDZIY', 1, 1),
(28, '20211006PDFGQYHN', 3, 1),
(29, '20211006CNORBIC0', 3, 1),
(30, '20211006ADWH2RVQ', 3, 1),
(31, '20211006PYRSOEOW', 4, 1),
(32, '20211006PYRSOEOW', 3, 1),
(33, '20211006WEHJNUWV', 3, 1),
(34, '20211006GSJXBX2M', 3, 1),
(35, '20211007HIYSMBVQ', 3, 1),
(36, '20211008VCRCB7I0', 3, 1),
(37, '20211009SRGUYMVJ', 3, 1),
(38, '20211009CFTIHSWO', 3, 1),
(39, '20211009JZELW37N', 3, 1),
(40, '2021100984LUOMNK', 5, 1),
(41, '20211009TMVTJSZJ', 3, 1),
(42, '20211009TMVTJSZJ', 4, 1),
(43, '20211009X8UHP0RS', 3, 1),
(44, '20211009CRS5FNXG', 3, 1),
(45, '20211009KMEW6RJN', 3, 1),
(46, '202109233GXALJYR', 3, 2),
(47, '20211010XDWVU4GJ', 5, 1),
(48, '20211011ERLCV529', 5, 1),
(49, '20211015G91DWSXL', 7, 1),
(50, '202201131DAYRQSL', 14, 1),
(51, '20220114VM6W10P8', 14, 1),
(52, '20220125C94AIWZH', 14, 1),
(53, '20220125C94AIWZH', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_pelanggan` varchar(25) DEFAULT NULL,
  `id_meja` int(11) DEFAULT NULL,
  `metode_bayar` varchar(50) DEFAULT NULL,
  `catatan_pesanan` varchar(50) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_pelanggan`, `id_meja`, `metode_bayar`, `catatan_pesanan`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`) VALUES
(24, 1, '20211008VCRCB7I0', '2021-10-08', 'sadfasfd', NULL, 'transfer_bank', 'agfgafcac', 15000, 0, NULL, NULL, NULL, NULL, 0),
(25, 1, '20211008VCRCB7I0', '2021-10-08', 'sadfasfd', NULL, 'transfer_bank', 'agfgafcac', 15000, 0, NULL, NULL, NULL, NULL, 0),
(26, 1, '20211008VCRCB7I0', '2021-10-08', 'sadfasfd', NULL, 'transfer_bank', 'agfgafcac', 15000, 0, NULL, NULL, NULL, NULL, 0),
(27, 1, '20211009SRGUYMVJ', '2021-10-09', 'luki', 1, 'transfer_bank', 'dafasdg', 15000, 0, NULL, NULL, NULL, NULL, 0),
(29, 1, '20211009CFTIHSWO', '2021-10-09', 'fad', 2, 'cash', 'asgfdg', 15000, 1, NULL, NULL, NULL, NULL, 2),
(30, 1, '20211009JZELW37N', '2021-10-09', 'luki', 21, 'transfer_bank', 'agfdgaa', 15000, 0, NULL, NULL, NULL, NULL, 0),
(31, 1, '2021100984LUOMNK', '2021-10-09', 'dsg', 21, 'transfer_bank', 'afdds', 20000, 1, 'CARD_TOKEN_RING.png', 'luki', 'bri', '1233-4322-3132-3214', 0),
(32, 1, '20211009TMVTJSZJ', '2021-10-09', 'luki', 24, 'cash', 'asdhfahskjfd', 30000, 0, NULL, NULL, NULL, NULL, 0),
(33, 1, '20211009X8UHP0RS', '2021-10-09', 'luki', 20, 'cash', 'agfdgsdfgd', 15000, 1, NULL, NULL, NULL, NULL, 0),
(34, 1, '20211009CRS5FNXG', '2021-10-09', 'fad', 19, 'cash', 'fagsfdhg', 15000, 1, NULL, NULL, NULL, NULL, 0),
(35, 1, '20211009KMEW6RJN', '2021-10-09', 'lui', 18, 'transfer_bank', 'afagfd', 15000, 1, NULL, NULL, NULL, NULL, 0),
(36, 1, '202109233GXALJYR', '2021-09-23', 'luki', 23, 'transfer_bank', 'banyain sausnya bang', 30000, 0, NULL, NULL, NULL, NULL, 0),
(37, 1, '20211010XDWVU4GJ', '2021-10-10', 'jono', 12, 'transfer_bank', 'pedass', 20000, 0, NULL, NULL, NULL, NULL, 0),
(38, 1, '20211011ERLCV529', '2021-10-11', 'lui', 8, 'transfer_bank', 'fhfgjg', 20000, 1, 'localtalk_card.png', 'eha', 'bri', '1233-4322-3132-3214', 2),
(39, 1, '20211015G91DWSXL', '2021-10-15', 'luki', 27, 'cash', 'makanan pedas', 15000, 1, NULL, NULL, NULL, NULL, 2),
(40, 3, '202201131DAYRQSL', '2022-01-13', 'luki', 63, 'transfer_bank', '', 15000, 0, NULL, NULL, NULL, NULL, 0),
(41, 3, '20220114VM6W10P8', '2022-01-14', 'luki', 62, 'cash', '', 15000, 0, NULL, NULL, NULL, NULL, 0),
(42, 3, '20220125C94AIWZH', '2022-01-25', 'luki', 53, 'cash', '', 30000, 0, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'luki', 'admin', 'admin', 1),
(2, 'luki', 'luke3', '12345678', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_meja`
--
ALTER TABLE `tbl_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci_transaksi`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_meja`
--
ALTER TABLE `tbl_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
