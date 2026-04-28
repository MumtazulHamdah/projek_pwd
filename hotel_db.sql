-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 10:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kamar_id` int(11) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `jumlah_tamu` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `nama`, `kamar_id`, `checkin`, `checkout`, `jumlah_tamu`, `created_at`, `status`) VALUES
(1, 'zul', 2, '2026-04-28', '2026-04-29', 3, '2026-04-27 12:50:43', 'paid'),
(0, 'Mumtazul Hamdah', 2, '2026-04-29', '2026-04-30', 2, '2026-04-28 14:22:31', 'pending'),
(0, 'zul', 2, '2026-04-30', '2026-05-04', 2, '2026-04-28 17:48:41', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `deskripsi`, `icon`, `gambar`) VALUES
(1, 'Restaurant', 'Restoran dengan menu lokal & internasional.', 'bi-cup-hot', 'restaurant.jpg'),
(2, 'Hall', 'Cocok untuk meeting & event.', 'bi-building', 'hall.jpg'),
(3, 'Swimming Pool', 'Kolam renang dengan view laut.', 'bi-water', 'swimming-pool.jpg'),
(4, 'Gym Center', 'Fasilitas olahraga lengkap.', 'bi-heart-pulse', 'gym.jpg'),
(5, 'Spa & Massage', 'Relaksasi profesional & nyaman.', 'bi-flower1', 'spa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `fitur` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `badge` varchar(50) DEFAULT NULL,
  `jumlah_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `nama`, `deskripsi`, `harga`, `fitur`, `gambar`, `badge`, `jumlah_unit`) VALUES
(1, 'Standard Room', 'Nyaman untuk 2 orang', 350000, '👤 2 Tamu • 📶 WiFi • ❄️ AC • 📺 TV', 'img/standard-room.jpg', 'Best Value', 10),
(2, 'Deluxe Room', 'Lebih luas & elegan', 650000, '👤 3 Tamu • 📶 WiFi • ❄️ AC • ☕ Breakfast', 'img/deluxe-room.jpg', 'Populer', 10),
(3, 'Suite Room', 'Fasilitas terbaik & mewah', 1200000, '👤 4 Tamu • 🛁 Bathtub • 🌊 View Laut', 'img/suite-room.jpg', 'Premium', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `metode` varchar(50) DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `booking_id`, `metode`, `bukti_transfer`) VALUES
(1, 1, 'Transfer Bank', 'LOGO PROJEK PWD.png'),
(0, 0, 'Bayar di Tempat', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
