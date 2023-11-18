-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 06:22 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alla_cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Kukus'),
(2, 'Bakar'),
(3, 'Gulung');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `nomor_telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat_supplier`, `nomor_telepon`) VALUES
(1, 'Bolu Susu Lembang', 'Lembang, Bandung Barat', '081987678453'),
(2, 'Ibu Otang', 'Cihampelas, Bandung Barat', '082347895762'),
(3, 'Amanda', 'Cimahi, Kota Cimahi', '082347123953');

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `nama_varian` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `varian`
--

INSERT INTO `varian` (`id`, `kategori_id`, `supplier_id`, `nama_varian`, `gambar`, `harga`, `stok`) VALUES
(4, 1, 1, 'Brownies Amanda Strawberi', 'image/amanda-str.jfif', '40000.00', 50),
(14, 3, 2, 'Bolu Gulung Selai Berry', 'image/bl-gulung.jpeg', '40000.00', 30),
(15, 2, 2, 'Bolu Ulang Tahun Coklat', 'image/bl-ultah.jfif', '80000.00', 15),
(17, 1, 1, 'Bolu Susu Lembang Keju', 'image/bsl-kj.jfif', '40000.00', 27),
(18, 1, 2, 'Bolu Gulung Berry', 'image/bl-gulung-2.jfif', '35000.00', 15),
(19, 1, 3, 'Bolu Pandan', 'image/b-kukus-pandan.jpeg', '40000.00', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `varian`
--
ALTER TABLE `varian`
  ADD CONSTRAINT `varian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `varian_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
