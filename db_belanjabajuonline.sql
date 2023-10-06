-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 01:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_belanjabajuonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `id_baju` int(11) NOT NULL,
  `id_kategori_baju` int(11) DEFAULT NULL,
  `id_ukuran_baju` int(11) DEFAULT NULL,
  `id_jenis_baju` int(11) DEFAULT NULL,
  `id_merek_baju` int(11) DEFAULT NULL,
  `deskripsi_baju` varchar(255) NOT NULL,
  `harga_baju` int(11) DEFAULT NULL,
  `gambar_baju` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`id_baju`, `id_kategori_baju`, `id_ukuran_baju`, `id_jenis_baju`, `id_merek_baju`, `deskripsi_baju`, `harga_baju`, `gambar_baju`) VALUES
(1, 1, 1, 1, 17, 'kemeja, jenis kain : Denim', 120000, 'casual 1.jpg'),
(2, 2, 3, 1, 9, 'jenis kain : lycra', 100000, 'casual 11.jpg'),
(3, 1, 2, 3, 13, 'jenis kain : jersey', 90000, 'sport 6.jpg'),
(4, 2, 2, 4, 15, 'jenis kain : polyester, pink', 110000, 'fancy 9.jpg'),
(5, 3, 1, 4, 5, 'jenis kain : cutton', 60000, 'kids 2.jpg'),
(6, 3, 1, 2, 16, 'kain tidak mudah lungset', 70000, 'kids 4.jpg'),
(7, 1, 4, 4, 10, 'limited edition', 325000, '60d9cf30c0463.jpg'),
(8, 1, 2, 3, 13, 'kain tidak mudah menyerap keringat', 90000, 'sport 9.jpg'),
(9, 2, 3, 3, 14, 'kain ringan dan tidak mudah meyerap keringat', 110000, 'sport 5.jpg'),
(10, 2, 2, 1, 9, 'kain lembut dan lemas', 87000, 'casual 18.jpg'),
(11, 2, 3, 3, 12, 'kain dingan dan tidak kaku, kaos', 67000, 'sport 2.jpg'),
(12, 3, 5, 4, 1, 'kain tidak membuat gatal dan dingin', 45000, 'kids 7.jpg'),
(14, 2, 3, 2, 10, 'bahan tidak mudah lungset', 75000, '60d9bb5ec3cbf.jpg'),
(15, 1, 4, 1, 16, 'bahan lembut', 125000, '60d9d5f1de7ca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) DEFAULT NULL,
  `id_baju` int(11) DEFAULT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_baju`, `jumlah_pembelian`) VALUES
(3, 11, 2),
(4, 1, 2),
(4, 9, 2),
(4, 6, 1),
(5, 2, 2),
(6, 1, 1),
(6, 9, 2),
(7, 12, 3),
(2, 2, 2),
(2, 7, 1),
(9, 11, 2),
(8, 10, 1),
(9, 3, 1),
(12, 2, 1),
(13, 8, 1),
(16, 2, 1),
(13, 1, 1),
(19, 2, 1),
(20, 2, 2),
(21, 1, 1),
(23, 6, 1),
(23, 1, 1),
(27, 1, 1),
(12, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_baju`
--

CREATE TABLE `jenis_baju` (
  `id_jenis_baju` int(11) NOT NULL,
  `nama_jenis_baju` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_baju`
--

INSERT INTO `jenis_baju` (`id_jenis_baju`, `nama_jenis_baju`) VALUES
(1, 'Casual'),
(2, 'Formal'),
(3, 'Sport'),
(4, 'Fancy'),
(5, 'Kemeja'),
(6, 'Bohemian');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_baju`
--

CREATE TABLE `kategori_baju` (
  `id_kategori_baju` int(11) NOT NULL,
  `nama_kategori_baju` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_baju`
--

INSERT INTO `kategori_baju` (`id_kategori_baju`, `nama_kategori_baju`) VALUES
(1, 'Pria'),
(2, 'Wanita'),
(3, 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Gresik'),
(2, 'Surabaya'),
(3, 'Malang'),
(4, 'Madiun'),
(5, 'Jakarta'),
(6, 'Bandung'),
(7, 'Blitar');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `jasa_kurir` varchar(30) NOT NULL,
  `biaya_jasa_kurir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `jasa_kurir`, `biaya_jasa_kurir`) VALUES
(1, 'JNE', 3000),
(2, 'JNT', 2500),
(3, 'POS INDONESIA', 2000),
(4, 'SiCepat', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `merek_baju`
--

CREATE TABLE `merek_baju` (
  `id_merek_baju` int(11) NOT NULL,
  `nama_merek_baju` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek_baju`
--

INSERT INTO `merek_baju` (`id_merek_baju`, `nama_merek_baju`) VALUES
(1, 'Lea'),
(2, 'The Executive'),
(3, 'Greenlight'),
(4, 'Hammer'),
(5, 'Minimal'),
(6, '3SECOND'),
(7, 'Erigo'),
(9, 'Gucci'),
(10, 'Louis Vuitton'),
(11, 'Cartier'),
(12, 'Chanel'),
(13, 'Nike'),
(14, 'Adidas'),
(15, 'Burberry'),
(16, 'Dior'),
(17, 'Hermes'),
(18, 'Hula');

-- --------------------------------------------------------

--
-- Table structure for table `owner_user`
--

CREATE TABLE `owner_user` (
  `id_owner_user` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_user`
--

INSERT INTO `owner_user` (`id_owner_user`, `id_user`, `id_kota`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`) VALUES
(1, 1, 3, 'agus handani', 'L', '1991-06-12', 'jl. apel'),
(2, 2, 6, 'budi eko prayitno', 'L', '1998-09-25', 'jl. nanas'),
(3, 3, 1, 'fira saraswati', 'P', '2000-03-07', 'jl. nanas'),
(4, 4, 2, 'nita anjani', 'P', '1999-07-17', 'jl. pepaya'),
(12, 11, 5, 'tini prastika', 'P', '1999-04-12', 'jl. manisa');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembelian`
--

CREATE TABLE `status_pembelian` (
  `id_status_pembelian` int(11) NOT NULL,
  `nama_status_pembelian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembelian`
--

INSERT INTO `status_pembelian` (`id_status_pembelian`, `nama_status_pembelian`) VALUES
(1, 'Keranjang'),
(2, 'Diproses'),
(3, 'Dikirim'),
(4, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `stok_baju`
--

CREATE TABLE `stok_baju` (
  `id_baju` int(11) DEFAULT NULL,
  `jumlah_baju` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_baju`
--

INSERT INTO `stok_baju` (`id_baju`, `jumlah_baju`) VALUES
(1, 15),
(2, 30),
(3, 45),
(4, 40),
(5, 55),
(6, 51),
(7, 80),
(8, 7),
(9, 2),
(10, 0),
(11, 72),
(12, 47),
(14, 14),
(15, 10),
(15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_status_pembelian` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kurir` int(11) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `jarak_pengiriman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_status_pembelian`, `id_user`, `id_kurir`, `tanggal_transaksi`, `jarak_pengiriman`) VALUES
(2, 3, 1, 3, '2021-04-07 21:06:17', 3),
(3, 4, 3, 2, '2021-05-11 10:23:18', 2),
(4, 4, 2, 1, '2021-05-11 00:08:47', 3),
(5, 3, 3, 3, '2021-10-08 09:40:38', 4),
(6, 4, 3, 3, '2021-06-01 21:33:36', 1),
(7, 2, 2, 1, '2021-01-11 14:23:19', 3),
(8, 4, 1, 2, '2021-06-11 23:12:24', 2),
(9, 3, 4, 2, '2021-06-27 10:44:27', 4),
(12, 3, 4, 2, '2021-07-14 19:03:25', 2),
(13, 4, 1, 4, '2021-06-30 02:11:14', 2),
(16, 1, 2, NULL, NULL, NULL),
(19, 1, 3, NULL, NULL, NULL),
(20, 3, 11, 3, '2021-06-29 18:20:17', 2),
(21, 4, 1, 2, '2021-06-30 12:55:24', 2),
(23, 3, 1, 1, '2021-07-01 15:44:02', 2),
(27, 1, 1, NULL, NULL, NULL),
(28, 1, 1, NULL, NULL, NULL),
(29, 1, 1, NULL, NULL, NULL),
(30, 1, 1, NULL, NULL, NULL),
(31, 1, 1, NULL, NULL, NULL),
(32, 1, 1, NULL, NULL, NULL),
(33, 1, 1, NULL, NULL, NULL),
(34, 1, 1, NULL, NULL, NULL),
(35, 1, 1, NULL, NULL, NULL),
(36, 1, 1, NULL, NULL, NULL),
(37, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_baju`
--

CREATE TABLE `ukuran_baju` (
  `id_ukuran_baju` int(11) NOT NULL,
  `satuan_ukuran_baju` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran_baju`
--

INSERT INTO `ukuran_baju` (`id_ukuran_baju`, `satuan_ukuran_baju`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `no_telp`, `username`, `password`) VALUES
(1, 'agus@gmail.com', '0856738561364', 'agus', 'agus'),
(2, 'budi@gmail.com', '0876542846385', 'budi', 'budi'),
(3, 'fira@gmail.com', '0856409872643', 'fira', 'fira'),
(4, 'ninin@gmail.com', '0815374987634', 'ninin', 'ninin'),
(11, 'tini@gmail.com', '08765463746', 'tini ', 'tini');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_baju` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_baju`, `id_user`) VALUES
(1, 12, 2),
(2, 2, 3),
(4, 6, 4),
(6, 7, 2),
(8, 9, 3),
(9, 12, 4),
(17, 12, 1),
(21, 14, 11),
(22, 4, 11),
(23, 7, 1),
(24, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id_baju`),
  ADD KEY `id_kategori_baju` (`id_kategori_baju`),
  ADD KEY `id_ukuran_baju` (`id_ukuran_baju`),
  ADD KEY `id_jenis_baju` (`id_jenis_baju`),
  ADD KEY `id_merek_baju` (`id_merek_baju`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_baju` (`id_baju`);

--
-- Indexes for table `jenis_baju`
--
ALTER TABLE `jenis_baju`
  ADD PRIMARY KEY (`id_jenis_baju`);

--
-- Indexes for table `kategori_baju`
--
ALTER TABLE `kategori_baju`
  ADD PRIMARY KEY (`id_kategori_baju`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `merek_baju`
--
ALTER TABLE `merek_baju`
  ADD PRIMARY KEY (`id_merek_baju`);

--
-- Indexes for table `owner_user`
--
ALTER TABLE `owner_user`
  ADD PRIMARY KEY (`id_owner_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `status_pembelian`
--
ALTER TABLE `status_pembelian`
  ADD PRIMARY KEY (`id_status_pembelian`);

--
-- Indexes for table `stok_baju`
--
ALTER TABLE `stok_baju`
  ADD KEY `id_baju` (`id_baju`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_status_pembelian` (`id_status_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kurir` (`id_kurir`);

--
-- Indexes for table `ukuran_baju`
--
ALTER TABLE `ukuran_baju`
  ADD PRIMARY KEY (`id_ukuran_baju`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_baju` (`id_baju`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baju`
--
ALTER TABLE `baju`
  MODIFY `id_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_baju`
--
ALTER TABLE `jenis_baju`
  MODIFY `id_jenis_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_baju`
--
ALTER TABLE `kategori_baju`
  MODIFY `id_kategori_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merek_baju`
--
ALTER TABLE `merek_baju`
  MODIFY `id_merek_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `owner_user`
--
ALTER TABLE `owner_user`
  MODIFY `id_owner_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status_pembelian`
--
ALTER TABLE `status_pembelian`
  MODIFY `id_status_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ukuran_baju`
--
ALTER TABLE `ukuran_baju`
  MODIFY `id_ukuran_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baju`
--
ALTER TABLE `baju`
  ADD CONSTRAINT `baju_ibfk_1` FOREIGN KEY (`id_kategori_baju`) REFERENCES `kategori_baju` (`id_kategori_baju`),
  ADD CONSTRAINT `baju_ibfk_2` FOREIGN KEY (`id_ukuran_baju`) REFERENCES `ukuran_baju` (`id_ukuran_baju`),
  ADD CONSTRAINT `baju_ibfk_3` FOREIGN KEY (`id_jenis_baju`) REFERENCES `jenis_baju` (`id_jenis_baju`),
  ADD CONSTRAINT `baju_ibfk_4` FOREIGN KEY (`id_merek_baju`) REFERENCES `merek_baju` (`id_merek_baju`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_baju`) REFERENCES `baju` (`id_baju`);

--
-- Constraints for table `owner_user`
--
ALTER TABLE `owner_user`
  ADD CONSTRAINT `owner_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `owner_user_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Constraints for table `stok_baju`
--
ALTER TABLE `stok_baju`
  ADD CONSTRAINT `stok_baju_ibfk_1` FOREIGN KEY (`id_baju`) REFERENCES `baju` (`id_baju`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_status_pembelian`) REFERENCES `status_pembelian` (`id_status_pembelian`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_baju`) REFERENCES `baju` (`id_baju`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
