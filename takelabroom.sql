-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2022 pada 11.19
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takelabroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `full_name`, `password`) VALUES
(1, 'bojes', 'Rafik Bojes', '$2y$10$CPF4Sjja1zIqYgiszMUID.qJvgrOcGYsc4Jf7HJSYRNtWXW2D0FwK'),
(2, 'admin1', 'Admin Satu', '$2y$10$mG10yq509cTsIZQP9YgRvuRavVrfSvNxoQ5kEblIqrZHoVBtlIW.O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `thumb_category` text DEFAULT NULL,
  `desc_category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `slug`, `thumb_category`, `desc_category`) VALUES
(1, 'Software Engineering', 'software-engineering', 'software-eng1.jpg', 'Lab Software Engineering sering dipakai untuk keperluan tools-tools perangkat lunak.'),
(2, 'Multimedia Studio', 'multimedia-studio', 'mulmed1.jpg', 'Lab Multimedia Studio  sering dipakai untuk keperluan meminjam alat-alat multimedia.'),
(3, 'Computer Network and Instrumentation', 'computer-network-instrument', 'comp-network.jpg', 'Lab Computer Network and Instrumentation sering dipakai untuk keperluan alat-alat Jaringan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `code_facilities`
--

CREATE TABLE `code_facilities` (
  `id_codefac` int(11) UNSIGNED NOT NULL,
  `code_facility` varchar(20) NOT NULL,
  `facility_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `code_facilities`
--

INSERT INTO `code_facilities` (`id_codefac`, `code_facility`, `facility_id`) VALUES
(1, 'LABR1-HEYU78', 1),
(2, 'LABR1-HEYU78', 2),
(3, 'LABR1-HEYU78', 3),
(4, 'LABR2-QEIU09', 4),
(5, 'LABR2-QEIU09', 5),
(6, 'LABR2-QEIU09', 6),
(7, 'LABR3-DSYL31', 7),
(8, 'LABR3-DSYL31', 8),
(9, 'LABR3-DSYL31', 9),
(10, 'LABR2-62BC674F9FB55', 3),
(11, 'LABR1-62BCE8203EDF0', 1),
(12, 'LABR1-62BCE8203EDF0', 2),
(13, 'LABR1-62BCE8203EDF0', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id_facility` int(11) UNSIGNED NOT NULL,
  `name_facility` varchar(50) NOT NULL,
  `qty_facility` int(5) UNSIGNED NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `thumb_facility` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id_facility`, `name_facility`, `qty_facility`, `price`, `thumb_facility`) VALUES
(1, 'Komputer Windows 7', 10, 2500, 'komputer-windows7.jpg'),
(2, 'Laptop Windows 10', 10, 2500, 'laptop-windows10.jpg'),
(3, 'VGA Card', 5, 1000, 'vga-card.jpg'),
(4, 'Tripod', 8, 100, 'tripod.png'),
(5, 'Kamera DSLR', 20, 2000, 'kamera-dslr.jpg'),
(6, 'Proyektor', 5, 1000, 'proyektor.jpg'),
(7, 'Mikrotik Router AP', 15, 1500, 'mikrotik-routerap.jpg'),
(8, 'Switch', 12, 1000, 'switch.jpg'),
(9, 'CD Instalasi Debian', 20, 100, 'cd-debian.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `labrooms`
--

CREATE TABLE `labrooms` (
  `id_lab` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `name_lab` varchar(100) NOT NULL,
  `code_facility` varchar(20) NOT NULL,
  `capacity` int(3) NOT NULL,
  `desc_lab` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `labrooms`
--

INSERT INTO `labrooms` (`id_lab`, `category_id`, `name_lab`, `code_facility`, `capacity`, `desc_lab`) VALUES
(1, 1, 'Software Engineering a', 'LABR1-HEYU78', 50, 'Lab Software Engineering untuk kelas a'),
(2, 2, 'Multimedia Studio a', 'LABR2-QEIU09', 60, 'Lab multimedia Studio untuk kelas a'),
(3, 3, 'Computer Network and Instrument a', 'LABR3-DSYL31', 70, 'Lab CompNetwork & Instrument untuk kelas a'),
(4, 1, 'Software Engineering b', 'LABR1-62BCE8203EDF0', 60, 'Lab Software Engineering untuk kelas b'),
(5, 2, 'Mulmed B', 'LABR2-62BC674F9FB55', 20, 'untuk multimedia b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(48, '2022-06-05-145817', 'App\\Database\\Migrations\\Users', 'default', 'App', 1656346073, 1),
(49, '2022-06-05-152133', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1656346073, 1),
(50, '2022-06-05-152444', 'App\\Database\\Migrations\\Labrooms', 'default', 'App', 1656346073, 1),
(51, '2022-06-05-153849', 'App\\Database\\Migrations\\Facilities', 'default', 'App', 1656346073, 1),
(52, '2022-06-05-162051', 'App\\Database\\Migrations\\Reservations', 'default', 'App', 1656346073, 1),
(53, '2022-06-05-163706', 'App\\Database\\Migrations\\CodeFacilities', 'default', 'App', 1656346073, 1),
(54, '2022-06-05-164046', 'App\\Database\\Migrations\\Orders', 'default', 'App', 1656346073, 1),
(55, '2022-06-06-095758', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1656346073, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) UNSIGNED NOT NULL,
  `code_reserv` varchar(20) NOT NULL,
  `status_order` enum('cancelled','pending','paided','confirmed') NOT NULL DEFAULT 'pending',
  `total_payment` bigint(20) UNSIGNED NOT NULL,
  `thumb_order` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `code_reserv`, `status_order`, `total_payment`, `thumb_order`) VALUES
(1, 'RESV.20221905', 'pending', 372000, ''),
(2, 'RESV.20229830', 'paided', 360000, 'konfirm-bukti1.jpg'),
(3, 'RESV3.BD4711AEC7', 'pending', 156000, ''),
(4, 'RESV2.BD7D038305', 'confirmed', 720000, 'img_order_1656477660_6f8e92cd24462392eaa9.jpg'),
(5, 'RESV2.BF04DD2B05', 'confirmed', 870000, 'img_order_1656483989_6a97ea761272bd204086.jpg'),
(6, 'RESV2.BF2AF030D1', 'pending', 186000, ''),
(7, 'RESV3.C3C3079114', 'pending', 93000, ''),
(8, 'RESV3.C3CC2E49A4', 'pending', 124000, ''),
(9, 'RESV3.C3CED11328', 'pending', 124000, ''),
(10, 'RESV3.C3D852BF58', 'pending', 93000, ''),
(11, 'RESV3.C3E6157B2A', 'pending', 124000, ''),
(12, 'RESV3.C3EB9729E6', 'pending', 180000, ''),
(13, 'RESV3.C3F73C14C3', 'pending', 240000, ''),
(14, 'RESV3.C3FB870BE7', 'pending', 93000, ''),
(15, 'RESV3.C40C6CDB29', 'pending', 806000, ''),
(16, 'RESV7.C6D4C7B5EC', 'pending', 30000, ''),
(22, 'RESV7.CBA57CC940', 'confirmed', 78000, 'img_order_1656535726_ad45b73ea883b39ad936.png'),
(23, 'RESV2.CBBAD16873', 'cancelled', 78000, ''),
(24, 'RESV2.CE1ED717E2', 'pending', 93000, ''),
(25, 'RESV2.CEB7F4440A', 'pending', 240000, ''),
(26, 'RESV8.E28876EC4B', 'pending', 360000, ''),
(27, 'RESV7.E684C804B9', 'confirmed', 390000, 'img_order_1656645726_cfddec1127e93562d827.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservations`
--

CREATE TABLE `reservations` (
  `id_reserv` int(11) UNSIGNED NOT NULL,
  `lab_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `code_reserv` varchar(20) NOT NULL,
  `time_start` datetime DEFAULT current_timestamp(),
  `time_end` datetime DEFAULT current_timestamp(),
  `status_reserv` enum('cancelled','pending','verified','finished') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `reservations`
--

INSERT INTO `reservations` (`id_reserv`, `lab_id`, `user_id`, `code_reserv`, `time_start`, `time_end`, `status_reserv`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'RESV.20229830', '2022-06-06 07:00:00', '2022-06-06 08:00:00', 'verified', '2022-06-27 23:08:12', '2022-06-27 23:08:12'),
(2, 2, 2, 'RESV.20221905', '2022-06-07 08:15:00', '2022-06-07 10:15:00', 'pending', '2022-06-27 23:08:12', '2022-06-27 23:08:12'),
(4, 2, 1, 'RESV1.BD3C72820E', '2022-07-01 07:00:00', '2022-07-01 07:30:00', 'finished', '2022-06-29 11:23:35', '2022-06-29 11:36:55'),
(5, 3, 3, 'RESV3.BD4711AEC7', '2022-07-01 07:30:00', '2022-07-01 08:30:00', 'pending', '2022-06-29 11:26:25', '2022-06-29 11:46:35'),
(6, 4, 2, 'RESV2.BD7D038305', '2022-07-01 10:00:00', '2022-07-01 12:00:00', 'verified', '2022-06-29 11:40:48', '2022-06-29 12:13:27'),
(7, 4, 2, 'RESV2.BF04DD2B05', '2022-07-04 07:00:00', '2022-07-04 09:25:00', 'verified', '2022-06-29 13:25:17', '2022-06-29 13:26:52'),
(8, 2, 2, 'RESV2.BF2AF030D1', '2022-07-01 15:00:00', '2022-07-01 16:00:00', 'cancelled', '2022-06-29 13:35:27', '2022-06-29 17:34:10'),
(9, 2, 3, 'RESV3.C3C3079114', '2022-07-02 07:00:00', '2022-07-02 07:30:00', 'pending', '2022-06-29 18:49:04', '2022-06-29 18:49:04'),
(10, 2, 3, 'RESV3.C3CC2E49A4', '2022-07-06 07:10:00', '2022-07-06 07:50:00', 'pending', '2022-06-29 18:51:30', '2022-06-29 18:51:30'),
(11, 2, 3, 'RESV3.C3CED11328', '2022-07-11 07:10:00', '2022-07-11 07:50:00', 'pending', '2022-06-29 18:52:13', '2022-06-29 18:52:13'),
(12, 2, 3, 'RESV3.C3D852BF58', '2022-07-05 07:20:00', '2022-07-05 07:50:00', 'pending', '2022-06-29 18:54:45', '2022-06-29 18:54:45'),
(13, 2, 3, 'RESV3.C3E6157B2A', '2022-07-08 07:10:00', '2022-07-08 07:50:00', 'pending', '2022-06-29 18:58:25', '2022-06-29 18:58:25'),
(14, 4, 3, 'RESV3.C3EB9729E6', '2022-06-20 07:10:00', '2022-06-20 07:40:00', 'pending', '2022-06-29 18:59:53', '2022-06-29 18:59:53'),
(15, 1, 3, 'RESV3.C3F73C14C3', '2022-07-03 07:30:00', '2022-07-03 08:10:00', 'pending', '2022-06-29 19:02:59', '2022-06-29 19:02:59'),
(16, 2, 3, 'RESV3.C3FB870BE7', '2022-07-09 14:00:00', '2022-07-09 14:30:00', 'pending', '2022-06-29 19:04:08', '2022-06-29 19:04:08'),
(17, 2, 3, 'RESV3.C40C6CDB29', '2022-07-01 15:30:00', '2022-07-01 19:50:00', 'pending', '2022-06-29 19:08:38', '2022-06-29 19:08:38'),
(18, 1, 1, 'RESV1.C41C9585ED', '2022-07-06 12:20:00', '2022-07-06 15:30:00', 'pending', '2022-06-29 19:12:57', '2022-06-29 19:12:57'),
(19, 2, 1, 'RESV1.C43BBAD1B4', '2022-07-10 07:40:00', '2022-07-10 08:50:00', 'pending', '2022-06-29 19:21:15', '2022-06-29 19:21:15'),
(20, 2, 1, 'RESV1.C447A7A003', '2022-07-04 15:00:00', '2022-07-04 16:00:00', 'pending', '2022-06-29 19:24:26', '2022-06-29 19:24:26'),
(21, 2, 1, 'RESV1.C44FD044CF', '2022-07-04 18:00:00', '2022-07-04 19:30:00', 'pending', '2022-06-29 19:26:37', '2022-06-29 19:26:37'),
(22, 4, 1, 'RESV1.C5AD3EAF74', '2022-07-07 16:40:00', '2022-07-07 20:40:00', 'pending', '2022-06-29 20:59:47', '2022-06-29 20:59:47'),
(23, 2, 1, 'RESV1.C5B481DF22', '2022-07-09 16:10:00', '2022-07-09 20:40:00', 'pending', '2022-06-29 21:01:44', '2022-06-29 21:01:44'),
(24, 2, 1, 'RESV1.C5C60A0D2F', '2022-07-11 17:10:00', '2022-07-11 20:10:00', 'pending', '2022-06-29 21:06:24', '2022-06-29 21:06:24'),
(25, 2, 1, 'RESV1.C5ECFEFDDC', '2022-07-06 19:20:00', '2022-07-06 20:20:00', 'pending', '2022-06-29 21:16:47', '2022-06-29 21:16:47'),
(26, 2, 1, 'RESV1.C5F38D5118', '2022-07-03 16:00:00', '2022-07-03 18:00:00', 'pending', '2022-06-29 21:18:32', '2022-06-29 21:18:32'),
(27, 2, 1, 'RESV1.C5FD2297AF', '2022-07-05 07:10:00', '2022-07-05 10:50:00', 'pending', '2022-06-29 21:21:06', '2022-06-29 21:21:06'),
(28, 4, 1, 'RESV1.C60E9D9328', '2022-07-10 18:00:00', '2022-07-10 18:50:00', 'pending', '2022-06-29 21:25:45', '2022-06-29 21:25:45'),
(29, 2, 1, 'RESV1.C62C3AEEBE', '2022-07-01 20:30:00', '2022-07-01 21:00:00', 'pending', '2022-06-29 21:33:39', '2022-06-29 21:33:39'),
(31, 1, 1, 'RESV1.C649F15E17', '2022-07-01 13:00:00', '2022-07-01 13:30:00', 'pending', '2022-06-29 21:41:35', '2022-06-29 21:41:35'),
(32, 4, 1, 'RESV1.C6646354D0', '2022-07-07 07:00:00', '2022-07-07 07:30:00', 'verified', '2022-06-29 21:48:38', '2022-06-29 21:51:56'),
(33, 5, 1, 'RESV1.C676831098', '2022-07-06 07:10:00', '2022-07-06 07:40:00', 'pending', '2022-06-29 21:53:28', '2022-06-29 21:53:28'),
(34, 4, 1, 'RESV1.C67B7504F7', '2022-07-06 07:30:00', '2022-07-06 08:20:00', 'pending', '2022-06-29 21:54:47', '2022-06-29 21:54:47'),
(35, 5, 1, 'RESV1.C697EA3D59', '2022-07-01 07:20:00', '2022-07-01 07:50:00', 'pending', '2022-06-29 22:02:22', '2022-06-29 22:02:22'),
(36, 5, 1, 'RESV1.C6A79BB170', '2022-07-02 07:40:00', '2022-07-02 08:10:00', 'pending', '2022-06-29 22:06:33', '2022-06-29 22:06:33'),
(37, 5, 1, 'RESV1.C6B1FC5F9D', '2022-07-05 07:30:00', '2022-07-05 08:00:00', 'pending', '2022-06-29 22:09:19', '2022-06-29 22:09:19'),
(38, 5, 7, 'RESV7.C6D4C7B5EC', '2022-07-03 07:20:00', '2022-07-03 07:50:00', 'cancelled', '2022-06-29 22:18:36', '2022-06-30 04:15:44'),
(39, 4, 1, 'RESV1.CB54AE43B4', '2022-07-08 07:00:00', '2022-07-08 07:30:00', 'pending', '2022-06-30 03:25:46', '2022-06-30 03:25:46'),
(40, 4, 1, 'RESV1.CB606197F6', '2022-07-05 07:31:00', '2022-07-05 08:01:00', 'pending', '2022-06-30 03:28:54', '2022-06-30 03:28:54'),
(41, 4, 1, 'RESV1.CB82B138B5', '2022-07-07 08:40:00', '2022-07-07 09:20:00', 'pending', '2022-06-30 03:38:03', '2022-06-30 03:38:03'),
(42, 3, 1, 'RESV1.CB85A3FAB8', '2022-07-04 10:00:00', '2022-07-04 10:30:00', 'pending', '2022-06-30 03:38:50', '2022-06-30 03:38:50'),
(43, 3, 1, 'RESV1.CB8C267E17', '2022-07-08 07:20:00', '2022-07-08 07:50:00', 'pending', '2022-06-30 03:40:34', '2022-06-30 03:40:34'),
(44, 3, 1, 'RESV1.CB93DD8164', '2022-07-12 07:20:00', '2022-07-12 07:50:00', 'pending', '2022-06-30 03:42:37', '2022-06-30 03:42:37'),
(45, 4, 1, 'RESV1.CB979A15F9', '2022-07-04 15:00:00', '2022-07-04 16:00:00', 'pending', '2022-06-30 03:43:37', '2022-06-30 03:43:37'),
(46, 3, 7, 'RESV7.CBA57CC940', '2022-07-05 07:30:00', '2022-07-05 08:00:00', 'verified', '2022-06-30 03:47:19', '2022-06-30 03:49:39'),
(47, 3, 1, 'RESV1.CBB45E89C1', '2022-07-05 08:01:00', '2022-07-05 08:31:00', 'finished', '2022-06-30 03:51:17', '2022-06-30 03:51:41'),
(48, 3, 2, 'RESV2.CBBAD16873', '2022-07-05 08:01:00', '2022-07-05 08:31:00', 'cancelled', '2022-06-30 03:53:01', '2022-06-30 04:08:13'),
(49, 2, 2, 'RESV2.CE1ED717E2', '2022-07-09 07:20:00', '2022-07-09 07:50:00', 'pending', '2022-06-30 06:36:13', '2022-06-30 06:36:13'),
(50, 4, 2, 'RESV2.CEB7F4440A', '2022-07-01 07:40:00', '2022-07-01 08:20:00', 'pending', '2022-06-30 07:17:03', '2022-06-30 07:17:03'),
(51, 1, 8, 'RESV8.E28876EC4B', '2022-07-12 07:51:00', '2022-07-12 08:51:00', 'pending', '2022-07-01 05:49:43', '2022-07-01 05:49:43'),
(52, 3, 7, 'RESV7.E684C804B9', '2022-07-15 10:00:00', '2022-07-15 12:30:00', 'verified', '2022-07-01 10:21:48', '2022-07-01 10:22:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_user` enum('civitas','non-civitas') NOT NULL DEFAULT 'civitas',
  `gender` enum('laki-laki','perempuan') NOT NULL DEFAULT 'perempuan',
  `notelp` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `thumb_user` text DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `full_name`, `password`, `email`, `type_user`, `gender`, `notelp`, `nim`, `thumb_user`, `is_activated`, `created_at`, `updated_at`) VALUES
(1, 'rafiknurf', 'Arafik Nur Fadliansah', '$2y$10$apGAEOba/7DsnZIdYfino.8MA/bvT2Bz.ELuRK13rmsBu3iaYwV2S', 'rbojjes@student.uns.ac.id', 'civitas', 'laki-laki', '085714284782', 'K3519015', 'ava_1656487464_0131039c821f5e176207.jpg', 1, '2022-06-27 23:08:12', '2022-06-29 14:24:24'),
(2, 'adityanurs', 'Aditya Nur S', '$2y$10$3/WtdasdRiTIFHbPKj6vxeszQ/heVA7JdkSLp5SxVfb/Y6t1SyA.O', 'aditbojes@gmail.com', 'non-civitas', 'laki-laki', '08773239782', 'K1519020', 'adit1.jpg', 1, '2022-06-27 23:08:12', '2022-06-30 07:16:36'),
(3, 'lukmans', 'Lukman Nur H', '$2y$10$2A2YJ.tGxzS0MAxRQI2kp.h5/l8T0excbJrNY/BLzDCJ3U9li.j32', 'lukmannurh@gmail.com', 'non-civitas', 'laki-laki', '08128639782', 'M3518017', 'lukman1.jpg', 1, '2022-06-27 23:08:12', '2022-07-01 05:45:40'),
(6, 'jamaludin', 'Jamaludin Alfaruk', '$2y$10$wXbh3yKSVa3ER58Q9hue7u/nZ1jtc6uoVmVxwvzyLqGeoxzY3zS6q', 'jamaludin@gmail.com', 'non-civitas', 'laki-laki', '03843249', 'B34150', '', 0, '2022-06-28 23:51:08', '2022-07-01 05:57:31'),
(7, 'krsinam', 'krisna murti', '$2y$10$gg1FHIsTW8J8I33f66kRXePParThj2TdtNEKutBm9fcto/lzZuTFy', 'krisna123@gmail.com', 'non-civitas', 'laki-laki', '08575783', 'K3519021', 'ava_1656629467_e5b222efd446b2b40adf.png', 1, '2022-06-29 22:16:06', '2022-07-01 10:20:09'),
(8, 'kucing7676', 'Ali Faizal', '$2y$10$prj4/EWaw1RHicUb9y/gAu4NiIgRSubj7faqPsYKp.qXs.GsMO2aa', 'kucing7676@gmail.com', 'non-civitas', 'laki-laki', '0847329032', 'K3519009', 'ava_1656629305_df8f415452492a60269e.jpg', 0, '2022-07-01 00:04:54', '2022-07-01 05:56:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `code_facilities`
--
ALTER TABLE `code_facilities`
  ADD PRIMARY KEY (`id_codefac`),
  ADD KEY `code_facilities_facility_id_foreign` (`facility_id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id_facility`);

--
-- Indeks untuk tabel `labrooms`
--
ALTER TABLE `labrooms`
  ADD PRIMARY KEY (`id_lab`),
  ADD KEY `labrooms_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `orders_code_reserv_foreign` (`code_reserv`);

--
-- Indeks untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reserv`),
  ADD UNIQUE KEY `code_reserv` (`code_reserv`),
  ADD KEY `reservations_lab_id_foreign` (`lab_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `code_facilities`
--
ALTER TABLE `code_facilities`
  MODIFY `id_codefac` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id_facility` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `labrooms`
--
ALTER TABLE `labrooms`
  MODIFY `id_lab` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reserv` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `code_facilities`
--
ALTER TABLE `code_facilities`
  ADD CONSTRAINT `code_facilities_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id_facility`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `labrooms`
--
ALTER TABLE `labrooms`
  ADD CONSTRAINT `labrooms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_code_reserv_foreign` FOREIGN KEY (`code_reserv`) REFERENCES `reservations` (`code_reserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_lab_id_foreign` FOREIGN KEY (`lab_id`) REFERENCES `labrooms` (`id_lab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
