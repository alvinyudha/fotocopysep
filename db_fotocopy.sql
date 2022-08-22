-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2022 pada 19.03
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `tb_barang`
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
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_kategori`, `nama_barang`, `id_kategori`, `merk`, `gambar_barang`, `harga_barang`, `deskripsi`, `satuan`, `stok`) VALUES
(43, 'ATK', 'Pulpen', 0, 'BIG', 'pulpen.jpg', '3000', '', 'pcs', '99'),
(44, 'ATK', 'Penggaris', 12, 'Butrefly', 'penggaris.jpg', '3000', '', 'pcs', '30'),
(45, 'ATK', 'Pensil', 0, 'Castel', 'thumb_450_450_cover_contain_w700_h700_117102pr_jpg.png', '2500', '', 'pcs', '828'),
(74, 'ATK', 'Jangka', 0, 'Joyko', 'apa-itu-jangka-berikut-pengertiannya-dalam-matematika.jpg', '12000', '', 'pcs', '12'),
(75, 'ATK', 'Gunting', 0, 'joyko', '49b2b22e6a49b81464cff3e587e7739e.jpg', '12000', '', 'pcs', '45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cetakfoto`
--

CREATE TABLE `tb_cetakfoto` (
  `id` int(11) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cetakfoto`
--

INSERT INTO `tb_cetakfoto` (`id`, `paket`, `harga`, `gambar`) VALUES
(4, '3x4 = 6 Lembar', '5000', '3x48.JPG'),
(5, '4x6 = 4 Lembar', '5000', '4x62.JPG'),
(8, '3R = 2 Lembar', '5000', '3R3.JPG'),
(14, '4R = 2 Lembar', '6000', '4R1.JPG'),
(15, '2R = 3 Lembar', '5000', '2R.JPG'),
(16, 'A4 Full', '10000', 'A4.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_filepesanan`
--

CREATE TABLE `tb_filepesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(111) NOT NULL,
  `ukuran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `phone` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `username`, `password`, `nama_karyawan`, `alamat`, `phone`) VALUES
(15, 'Karyawan 1', '$2y$10$xP8VZ0CAAzkZEq0L4a/2JODRHBQ0JXAOgwet6BlvW9UN0nbHrBAkq', 'Kurnia', 'Jember', 81946587351),
(17, 'Karyawan 2', '$2y$10$vPmnOjXcY6d7dvejjlJyV.RQbCAssLL3.ZOd/VL1VOpXLThTEuloi', 'Sdhat', 'Patrang', 6281946646654);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(8, 'Print'),
(10, 'Banner'),
(12, 'ATK'),
(13, 'Fotocopy'),
(14, 'Jilid Softcover'),
(15, 'Cetak Foto'),
(16, 'Jilid Hardcover'),
(17, 'Jilid Spiral');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nota`
--

CREATE TABLE `tb_nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_actived` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `sub_total` int(255) NOT NULL,
  `id_user` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `tanggal_jual`, `sub_total`, `id_user`) VALUES
(4, '2021-07-17', 1313, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_print`
--

CREATE TABLE `tb_print` (
  `id_print` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '9835-0333-3435-3523', 'Alvin'),
(2, 'BNI', '343-2141-893-2222', 'Alvin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rinci_transaksi`
--

CREATE TABLE `tb_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rinci_transaksi`
--

INSERT INTO `tb_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(207, '20220807C9GBAGF3', 81, 3),
(208, '20220807C9GBAGF3', 80, 1),
(209, '20220807C9GBAGF3', 79, 1),
(210, '20220807C9GBAGF3', 75, 1),
(211, '20220807QFRAVTY9', 81, 3),
(212, '20220807QFRAVTY9', 80, 1),
(213, '20220807QFRAVTY9', 79, 1),
(214, '20220807QFRAVTY9', 75, 1),
(215, '202208076ETIH0PK', 81, 3),
(216, '202208076ETIH0PK', 80, 1),
(217, '202208076ETIH0PK', 79, 1),
(218, '202208076ETIH0PK', 75, 1),
(219, '202208086J9EIJD8', 74, 1),
(220, '202208086J9EIJD8', 44, 1),
(221, '202208086J9EIJD8', 75, 1),
(222, '202208086J9EIJD8', 79, 1),
(223, '202208080HNLCGDF', 74, 1),
(224, '202208080HNLCGDF', 44, 1),
(225, '202208080HNLCGDF', 75, 1),
(226, '202208080HNLCGDF', 79, 1),
(227, '20220808QODXMQFY', 74, 1),
(228, '20220808QODXMQFY', 44, 1),
(229, '20220808QODXMQFY', 75, 1),
(230, '20220808QODXMQFY', 79, 1),
(231, '20220808ANFMB7IS', 74, 3),
(232, '20220808ANFMB7IS', 44, 1),
(233, '20220808ANFMB7IS', 75, 1),
(234, '20220808ANFMB7IS', 79, 1),
(235, '20220808MCFJFHOR', 74, 3),
(236, '20220808MCFJFHOR', 44, 1),
(237, '20220808MCFJFHOR', 75, 1),
(238, '20220808MCFJFHOR', 79, 1),
(239, '20220808RKG7PQDP', 74, 3),
(240, '20220808RKG7PQDP', 44, 1),
(241, '20220808RKG7PQDP', 75, 1),
(242, '20220808RKG7PQDP', 79, 1),
(243, '20220808ZJEASWMN', 74, 3),
(244, '20220808ZJEASWMN', 44, 1),
(245, '20220808ZJEASWMN', 75, 1),
(246, '20220808ZJEASWMN', 79, 1),
(247, '20220808ZJEASWMN', 81, 1),
(248, '20220809J5W01FL3', 43, 1),
(249, '20220809J5W01FL3', 44, 1),
(250, '20220812BCV7HRYW', 44, 1),
(251, '20220812BCV7HRYW', 43, 1),
(252, 'Pensil', 44, 3),
(253, 'Pensil', 43, 1),
(254, 'Pensil', 45, 1),
(255, '20220822QZVO9SEJ', 44, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `phone`, `keterangan`) VALUES
(1, 'Bagus', 'Jember', '081972836478', 'FURNITURE'),
(5, 'Joko', 'Alas', '08764572913', 'Rokok'),
(6, 'Mamank', 'Tegal', '086048584758', 'FURNITURE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
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
  `no_resi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `no_order`, `tanggal`, `nama_penerima`, `telp_penerima`, `alamat`, `total_bayar`, `bukti_bayar`, `status_bayar`, `status_order`, `atas_nama`, `nama_bank`, `no_rek`, `no_resi`) VALUES
(52, 25, '20220805GA3PCXUH', '2022-08-05', 'Fani', '0853653', 'Jalan suryan III', 114343, 'assassins_creed_altair_ezio_connor_edward-HD.jpg', 1, 0, 'fani', 'BRI', '1234-452-74778', ''),
(53, 27, '202208074ISGUOTV', '2022-08-07', 'Yudha', '08563642223', 'Jalan Sudirman no4', 126343, 'Untitled.png', 1, 0, 'Andi', 'BNI', '029301', ''),
(80, 27, '202208076ETIH0PK', '2022-08-07', 'Yudha', '08563642223', 'Jalan Sudirman no4', 306343, 'dddsdf.JPG', 1, 1, 'Samosir', 'BRI', '56364-656363-4747', ''),
(81, 27, '202208086J9EIJD8', '2022-08-08', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 39343, '481545_Anime_15.jpg', 1, 1, 'Yudha', 'Bank Jatim', '093-4752-25245', ''),
(85, 28, '20220808MCFJFHOR', '2022-08-08', 'Roger', '08534523', 'Jalan Jambu No 1', 63343, '510px-Skull_and_crossbones_svg.png', 1, 1, 'Roger', 'BNI', '2315-7477-76467', ''),
(89, 27, '20220812BCV7HRYW', '2022-08-12', 'Yudha', '08563642223', 'Jalan Sudirman no 4', 6000, '', 0, 0, '', '', '', ''),
(90, 44, '20220822QZVO9SEJ', '2022-08-22', 'Eka', '083764233', 'kwokf', 3000, '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `email`, `image`, `password`, `telepon`, `alamat`, `ttl`, `kelamin`, `role_id`, `is_actived`, `date_created`) VALUES
(22, 'Alvin Yudha', 'vinska@gmail.com', 'vent.JPG', '$2y$10$S2YcFnl0AaprZpnpFj/jye0/AYPVRltL/WGf9aiVUxsgbQJJu.iKi', '085723764', '', '2000-11-17', 'Pria', 1, 1, 1653397234),
(25, 'Fani', 'fani@gmail.com', '86327595_p0.jpg', '$2y$10$PCUHon1h81XmSneXx23rwOWjDfZcAtpMRYmnCwvRj1e0r/hBF7Fdm', '0853653', 'Jalan suryan III', '1999-07-25', 'wanita', 2, 1, 1658900953),
(27, 'Yudha', 'yudha@gmail.com', 'adventure_time___finn-wallpaper-800x480.jpg', '$2y$10$lUY/dqCqr5PVTf2ez.w/J.MiM6BM6E9Zk7ZTdgmVNsQVvFtCyD8aC', '08563642223', 'Jalan Sudirman no 4', '2000-11-17', 'Wanita', 2, 1, 1659497892),
(28, 'Roger', 'roger@gmail.com', 'giga.jpg', '$2y$10$66w40ooFb90rzIsF2AzhzOiWEFjphJ95rLKjKOYaDwedqVMUKdTD6', '08534523', 'Jalan Jambu No 1\r\n', '1999-12-14', 'Pria', 2, 1, 1659873804),
(40, 'roy', 'Chilijueyun@gmail.com', 'default.jpg', '$2y$10$NoW8MfA/oP6nDOOK8dcK8eWF4bBqVlpZZUYlRpwzSCcOXPtR3UsiC', '', '', '0000-00-00', '', 2, 0, 1660068429),
(44, 'Eka', 'pradistya171100@gmail.com', 'default.jpg', '$2y$10$NfCQzYF/3vLzPRZFXtVcs.bInhP/HTooVGMgPl8ZCQp2CFMl/T81K', '083764233', '', '2000-11-12', 'Wanita', 2, 1, 1660139643);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_accessmenu`
--

CREATE TABLE `tb_user_accessmenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_accessmenu`
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
-- Struktur dari tabel `tb_user_menu`
--

CREATE TABLE `tb_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_menu`
--

INSERT INTO `tb_user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Profile'),
(3, 'Menu'),
(4, 'Data'),
(5, 'Pesanan'),
(6, 'Transaksi'),
(7, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`) VALUES
(1, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_submenu`
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
-- Dumping data untuk tabel `tb_user_submenu`
--

INSERT INTO `tb_user_submenu` (`id`, `menu_id`, `tittle`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'My Profile', 'profile', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'profile/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-bars', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(14, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-cog', 1),
(16, 4, 'Data Management', 'data', 'fas fa-fw fa-database', 1),
(17, 2, 'Change Password', 'profile/changepassword', 'fas fa-fw fa-key', 1),
(18, 6, 'Transaksi', 'transaksi', 'fas fa-fw fa-file', 1),
(19, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(21, 9, 'Submenu', 'menu/submenu', 'fas fa-fw fa-file-minus', 1),
(22, 5, 'Pesanan Masuk', 'pesananmasuk', 'fas fa-fw fa-inbox', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_token`
--

CREATE TABLE `tb_user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_token`
--

INSERT INTO `tb_user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'pradistya171100@gmail.com', 'DtXfMYmuW8ZQxXg57m9EfgYHu2wpvWspZwDGf/u9How=', 1660494990);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_cetakfoto`
--
ALTER TABLE `tb_cetakfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_filepesanan`
--
ALTER TABLE `tb_filepesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_print`
--
ALTER TABLE `tb_print`
  ADD PRIMARY KEY (`id_print`);

--
-- Indeks untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tb_rinci_transaksi`
--
ALTER TABLE `tb_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `UNIQUE` (`email`);

--
-- Indeks untuk tabel `tb_user_accessmenu`
--
ALTER TABLE `tb_user_accessmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_submenu`
--
ALTER TABLE `tb_user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_token`
--
ALTER TABLE `tb_user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_cetakfoto`
--
ALTER TABLE `tb_cetakfoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_filepesanan`
--
ALTER TABLE `tb_filepesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_print`
--
ALTER TABLE `tb_print`
  MODIFY `id_print` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rinci_transaksi`
--
ALTER TABLE `tb_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tb_user_accessmenu`
--
ALTER TABLE `tb_user_accessmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_user_menu`
--
ALTER TABLE `tb_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user_submenu`
--
ALTER TABLE `tb_user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_user_token`
--
ALTER TABLE `tb_user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
