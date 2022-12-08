-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 01:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fotocopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_kategori`, `nama_barang`, `id_kategori`, `merk`, `gambar_barang`, `harga_barang`, `deskripsi`, `satuan`, `stok`) VALUES
(43, 'ATK', 'Pulpen', 0, 'Snowman', 'pulpen.jpg', '3000', '', 'pcs', '99'),
(44, 'ATK', 'Penggaris', 12, 'Buttrefly', 'penggaris.jpg', '3000', '', 'pcs', '30'),
(45, 'ATK', 'Pensil', 0, 'Castel', 'thumb_450_450_cover_contain_w700_h700_117102pr_jpg.png', '2500', '', 'pcs', '828'),
(74, 'ATK', 'Jangka', 0, 'Joyko', 'apa-itu-jangka-berikut-pengertiannya-dalam-matematika.jpg', '7000', '', 'pcs', '12'),
(75, 'ATK', 'Gunting', 0, 'joyko', '49b2b22e6a49b81464cff3e587e7739e.jpg', '12000', '', 'pcs', '45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cetakfoto`
--

CREATE TABLE `tb_cetakfoto` (
  `id` int(11) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `lembar` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cetakfoto`
--

INSERT INTO `tb_cetakfoto` (`id`, `paket`, `lembar`, `harga`, `gambar`) VALUES
(4, '3x4 = 6 Lembar', 6, '5000', '3x48.JPG'),
(5, '4x6 = 4 Lembar', 4, '5000', '4x62.JPG'),
(8, '3R = 2 Lembar', 2, '5000', '3R3.JPG'),
(14, '4R = 2 Lembar', 2, '6000', '4R1.JPG'),
(15, '2R = 3 Lembar', 3, '5000', '2R.JPG'),
(16, 'A4 Full', 1, '10000', 'A4.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_filepesanan`
--

CREATE TABLE `tb_filepesanan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(111) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_filepesanan`
--

INSERT INTO `tb_filepesanan` (`id`, `nama_pelanggan`, `nama`, `jumlah`, `ukuran`, `harga`, `tanggal`, `id_user`, `status`) VALUES
(47, '', '31.jpeg', 4, '4x6', 5000, '2022-09-13 21:48:10', 27, 1),
(54, '', '551fff636303fb8a696c213736ddc09e.jpg', 2, 'Full Kertas Foto A4', 20000, '2022-09-15 17:21:07', 27, 1),
(55, 'Yudha', '1616bc4c2440c2bddc605bfe02da0f9aaf4bab7a.jpg', 3, 'Full Kertas Foto A4', 30000, '2022-09-15 17:25:07', 27, 1),
(66, 'Eka', '58415.jpg', 4, 'Full Kertas Foto A4', 40000, '2022-10-09 23:02:05', 44, 1),
(71, 'Eka', '15782e2ed006960a8dbc66a948c767d7c715f816.jpg', 5, 'A4 ', 50000, '2022-10-10 00:18:43', 44, 1),
(72, 'Yudha', '33.jpeg', 6, '3x4', 5000, '2022-10-20 09:34:15', 47, 1),
(74, '', '', 4, '4x6', 5000, '2022-11-12 18:24:46', 0, 0),
(78, 'Yudha', 'BKPM-BJI-2018_-_Bilingual.pdf', 2, 'A4', 1000, '2022-11-25 07:02:17', 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(12, 'ATK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_print`
--

CREATE TABLE `tb_print` (
  `id_print` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '9835-0333-3435-3523', 'Fotocopy SEP'),
(2, 'BNI', '343-2141-893-2222', 'Fotocopy SEP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rinci_transaksi`
--

CREATE TABLE `tb_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rinci_transaksi`
--

INSERT INTO `tb_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(274, '20220927LUCDA321', 43, 1),
(275, '20220927LUCDA321', 45, 2),
(276, '20221008V9LXQWJO', 45, 1),
(277, '20221015LUDTDZLF', 43, 1),
(278, '20221015LUDTDZLF', 44, 2),
(279, '20221015LUDTDZLF', 45, 1),
(280, '20221020YPFCEMUK', 44, 6),
(281, '20221102WZSBYPKA', 43, 1),
(282, '20221102WZSBYPKA', 44, 1),
(283, '20221125FEBCGAXI', 43, 1),
(284, '20221125FEBCGAXI', 44, NULL),
(285, '20221125MZQT8RXM', 43, 1),
(286, '20221125MZQT8RXM', 44, NULL),
(287, '202211257TOGQ6S0', 43, 2),
(288, '202211257TOGQ6S0', 44, NULL),
(289, '20221125ACBST8D7', 44, 1),
(290, '20221125ACBST8D7', 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `phone`, `keterangan`) VALUES
(1, 'Bagus', 'Jember', '081972836478', 'FURNITURE'),
(5, 'Joko', 'Alas', '08764572913', 'Rokok'),
(6, 'Mamank', 'Tegal', '086048584758', 'FURNITURE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `telp_penerima` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `status_order` int(11) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `no_resi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `no_order`, `tanggal`, `nama_penerima`, `telp_penerima`, `alamat`, `total_bayar`, `bukti_bayar`, `status_bayar`, `status_order`, `atas_nama`, `nama_bank`, `no_rek`, `no_resi`) VALUES
(52, 25, '20220805GA3PCXUH', '2022-08-05', 'Fani', '0853653', 'Jalan suryan III', 114343, 'assassins_creed_altair_ezio_connor_edward-HD.jpg', 1, 1, 'fani', 'BRI', '1234-452-74778', NULL),
(53, 27, '202208074ISGUOTV', '2022-08-07', 'Yudha', '08563642223', 'Jalan Sudirman no4', 126343, 'Untitled.png', 1, 1, 'Andi', 'BNI', '029301', NULL),
(81, 27, '202208086J9EIJD8', '2022-08-08', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 39343, '481545_Anime_15.jpg', 1, 1, 'Yudha', 'Bank Jatim', '093-4752-25245', NULL),
(89, 27, '20220812BCV7HRYW', '2022-08-12', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 6000, 'wave_(3).png', 1, 1, 'tes', 'tes', '8475848756', NULL),
(91, 27, '202209077AU90MRA', '2022-09-07', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 3000, '', 1, 1, '', '', '', NULL),
(124, 27, '20220909PSY4TPQN', '2022-09-09', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 5000, '', 2, 1, '', '', '', 'NHGAS675423'),
(127, 27, '20220913QEJVMGYD', '2022-09-13', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 10000, '2.jpeg', 1, 1, 'dad', 'weda', '421124', NULL),
(128, 27, '20220914RKCQUUGN', '2022-09-14', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 1000, '', 2, 1, '', '', '', NULL),
(134, 27, '20220926CVIZHGBJ', '2022-09-26', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 15000, '2576100.jpg', 1, 1, 'alvin', 'BRI', '0980-0809-3812', NULL),
(140, 44, '20221009PKWB0U8L', '2022-10-09', 'Eka', '083764233', 'jalan jambu no 5', 10000, '', 2, 1, '', '', '', NULL),
(144, 44, '20221015LUDTDZLF', '2022-10-15', 'Eka', '083764233', 'jalan jambu no 5', 11500, '', 0, 0, '', '', '', NULL),
(145, 47, '20221020YPFCEMUK', '2022-10-20', 'Yudha', '08736445', 'jln jawa 10', 5000, '3.jpeg', 1, 1, 'yudha', 'BNI', '0207397904', NULL),
(146, 47, '20221102WZSBYPKA', '2022-11-02', 'Yudha', '08736445', 'jln jambu', 6000, '', 0, 0, '', '', '', NULL),
(150, 47, '202211257TOGQ6S0', '2022-11-25', 'Yudha', '087364456', 'Jalan Sudirman', 1000, '', 0, 0, '', '', '', NULL),
(151, 49, '20221125ACBST8D7', '2022-11-25', 'yudha eka', '085727521', 'jalan kalimantan', 5500, '', 0, 0, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `kelamin` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_actived` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `email`, `image`, `password`, `telepon`, `alamat`, `ttl`, `kelamin`, `role_id`, `is_actived`, `date_created`) VALUES
(22, 'Alvin Yudha', 'vinska@gmail.com', '551fff636303fb8a696c213736ddc09e1.jpg', '$2y$10$S2YcFnl0AaprZpnpFj/jye0/AYPVRltL/WGf9aiVUxsgbQJJu.iKi', '085723764', '', '2000-11-17', 'Pria', 1, 1, 1653397234),
(25, 'Fani', 'fani@gmail.com', '86327595_p0.jpg', '$2y$10$PCUHon1h81XmSneXx23rwOWjDfZcAtpMRYmnCwvRj1e0r/hBF7Fdm', '0853653', 'Jalan suryan III', '1999-07-25', 'wanita', 2, 1, 1658900953),
(27, 'Yudha', 'yudha@gmail.com', 'adventure_time___finn-wallpaper-800x480.jpg', '$2y$10$lUY/dqCqr5PVTf2ez.w/J.MiM6BM6E9Zk7ZTdgmVNsQVvFtCyD8aC', '08563642223', 'Jalan Sudirman no 4', '2000-11-17', 'Pria', 2, 1, 1659497892),
(28, 'Roger', 'roger@gmail.com', 'giga.jpg', '$2y$10$66w40ooFb90rzIsF2AzhzOiWEFjphJ95rLKjKOYaDwedqVMUKdTD6', '08534523', 'Jalan Jambu No 1\r\n', '1999-12-14', 'Pria', 2, 1, 1659873804),
(40, 'roy', 'Chilijueyun@gmail.com', 'default.jpg', '$2y$10$NoW8MfA/oP6nDOOK8dcK8eWF4bBqVlpZZUYlRpwzSCcOXPtR3UsiC', '', '', '0000-00-00', '', 2, 0, 1660068429),
(45, 'Jovins', 'omen@gmail.com', 'default.jpg', '$2y$10$0N/KtWJs0KkN9JeiSzLbVuMWjs46t4dFscYbsavvg.KkdGwxYS3a.', '', '', '0000-00-00', '', 2, 0, 1664479715),
(48, 'pramudhita shinta', 'pramuditha@polije.ac.id', 'default.jpg', '$2y$10$0EPWwvZr91MZnT6gGYtzeewDRutgQnJ5l75xXKzDoG205uDEgipGS', '', '', '0000-00-00', '', 2, 1, 1669342601),
(49, 'yudha eka', 'pradistya171100@gmail.com', 'default.jpg', '$2y$10$LYmrHkPfzYTLrwzidzKQQe6Vr0iFn64D2xsFqKpuwOlNQNA/YKMxC', '085727521', 'jalan kalimantan', '0000-00-00', '', 2, 1, 1669342811);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_accessmenu`
--

CREATE TABLE `tb_user_accessmenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_accessmenu`
--

INSERT INTO `tb_user_accessmenu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 2, 4),
(32, 1, 5),
(42, 1, 4),
(45, 2, 5),
(46, 2, 7),
(47, 2, 2),
(51, 1, 7),
(56, 1, 9),
(57, 1, 8),
(59, 1, 10),
(61, 1, 2),
(62, 1, 6),
(63, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_menu`
--

CREATE TABLE `tb_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_menu`
--

INSERT INTO `tb_user_menu` (`id`, `menu`) VALUES
(0, 'Menu'),
(1, 'Admin'),
(2, 'Profile'),
(4, 'Data'),
(5, 'Pesanan'),
(6, 'Transaksi'),
(7, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_submenu`
--

CREATE TABLE `tb_user_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tittle` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_submenu`
--

INSERT INTO `tb_user_submenu` (`id`, `menu_id`, `tittle`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'My Profile', 'profile', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'profile/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-bars', 0),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 0),
(14, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-cog', 0),
(16, 4, 'Data Management', 'data', 'fas fa-fw fa-database', 1),
(17, 2, 'Change Password', 'profile/changepassword', 'fas fa-fw fa-key', 1),
(18, 6, 'Transaksi', 'transaksi', 'fas fa-fw fa-file', 1),
(19, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(22, 5, 'Pesanan Masuk', 'pesananmasuk', 'fas fa-fw fa-inbox', 1),
(23, 7, 'Laporan Penjualan', 'laporan', 'fas fa-file', 1),
(24, 7, 'Laporan Bulanan', 'laporan/laporan_bulanan', 'fas fa-file', 1),
(25, 7, 'Laporan Harian', 'laporan/laporan_harian', 'fas fa-file', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_token`
--

CREATE TABLE `tb_user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_token`
--

INSERT INTO `tb_user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'pramuditha@polije.ac.id', 'Bl6WFRSBy9zxij/E/a1DvmfX8uu7xPV1upHHJUBkUZU=', 1669342601);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_cetakfoto`
--
ALTER TABLE `tb_cetakfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_filepesanan`
--
ALTER TABLE `tb_filepesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_print`
--
ALTER TABLE `tb_print`
  ADD PRIMARY KEY (`id_print`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tb_rinci_transaksi`
--
ALTER TABLE `tb_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_accessmenu`
--
ALTER TABLE `tb_user_accessmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_submenu`
--
ALTER TABLE `tb_user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_filepesanan`
--
ALTER TABLE `tb_filepesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_print`
--
ALTER TABLE `tb_print`
  MODIFY `id_print` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rinci_transaksi`
--
ALTER TABLE `tb_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_user_accessmenu`
--
ALTER TABLE `tb_user_accessmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_submenu`
--
ALTER TABLE `tb_user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
