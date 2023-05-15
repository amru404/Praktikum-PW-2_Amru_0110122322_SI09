-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 12:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`) VALUES
(1, 'Kecantikan'),
(2, 'Sepatu'),
(3, 'Pakaian'),
(4, 'Makanan'),
(5, 'Elektronik'),
(6, 'olahraga'),
(16, 'otomotif');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `alamat_pemesan` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `qty` int(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `produk_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `nama_pemesan`, `alamat_pemesan`, `no_hp`, `email`, `qty`, `deskripsi`, `produk_id`) VALUES
(13, '2023-04-08', 'Amru', 'Depok', '34324324', 'amru.azzam3@gmail.com', 4, 'No 58', 4),
(14, '2023-04-08', 'Ajam', 'Depok', '34324325', 'admin@gmail.com', 36, 'No 58', 3),
(15, '2023-04-30', 'Agerager', 'Tanggerang', '0854927372', 'batam@gmail.com', 3, 'gg php', 7),
(16, '2023-04-30', 'Ager', 'Tanggerang', '034043995', 'ada@ada.com', 2, '-', 3),
(17, '2023-04-30', 'Ager', 'depok', '12312312', 'amru.azzam3@gmail.com', 6, '-', 4),
(18, '2023-04-30', 'Ajam', 'Depok', '0340484', 'admin@admin.com', 4, '-', 1);

--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_jual` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `stok` int(255) NOT NULL,
  `min_stok` int(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `kategori_produk_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_jual`, `harga_beli`, `stok`, `min_stok`, `deskripsi`, `gambar_produk`, `kategori_produk_id`) VALUES
(1, 'A02', 'Yezzy 350', 3000000, 1500000, 4, 2, 'Yeezy adalah sepatu yang dirancang khusus oleh rapper Kanye West bersama brand sepatu populer', 'yezzy.jpg', 1),
(3, 'A02', 'Nike Blazer', 1800000, 900000, 12, 1, 'Nike Blazer X Off White', 'blazerxoff.jpg', 1),
(4, 'A03', 'Kebab', 20000, 15000, 60, 30, 'Kebab adalah hidangan daging yang dimasak, dengan asal-usul masakan Timur Tengah. Banyak varian yang populer di seluruh dunia', 'kebab.jpg', 4),
(7, 'K01', 'Kulkas Polytron', 3500000, 2500000, 37, 5, 'Kulkas Polytron adalah salah satu produk elektronik yang paling banyak dicari di Bhinneka', '438-YW50aWtvZGVfXzE2MDY3Mjk5NjNfcHJzNDgweC1qcGc1-1024x9101-1.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
