-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 07:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healthie`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(18, 'Minuman'),
(19, 'Sarapan'),
(21, 'Cemilan'),
(22, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `kalori` varchar(10) DEFAULT NULL,
  `resep` text NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `kategori_id`, `nama`, `foto`, `kalori`, `resep`, `detail`) VALUES
(18, 22, 'Nasi Merah dan Dada Ayam Panggang', 'rcfxnob2vUTL75EnXY91.jpg', '393 Kal', '                                    - 50gr Dada ayam filet <br>\r\n- 50gr Buncis<br>\r\n- 1/4 cup Nasi merah<br>\r\n- 1/2sdt Lada bubuk<br>\r\n- 1/2sdt Garam<br>\r\n- Minyak secukupnya<br>                              ', '                              - Berikan 2 jumput garam dan lada pada dada ayam<br>\r\n- Tuang minyak kedalam teflon<br>\r\n- Panggang ayam hingga matang<br>\r\n- Rebus buncis selama 1-2 menit<br>\r\n- Sajikan nasi merah, dada ayam panggang dan buncis pada suatu piring<br>\r\n- Makanan siap disajikan                              '),
(19, 21, 'Pisang dan selai kacang', 'PwP6rg61Vw3aH5wvvFep.jpg', '200 Kal', '            - 1Sdm Peanut Butter <br>\r\n- 1 Buah pisang <br>          ', '          - Kupas pisang dan potong kecil kecil<br>\r\n- Oleskan peanut butter di atas pisang<br>\r\n- Makanan siap disajikan\r\n          '),
(20, 22, 'Ubi Dadu Telur', 'QiSBhNIawOxDkpaN7Y0y.jpg', '412 Kal', '- 100gr Ubi<br>\r\n- 1Ikat Bayam<br>\r\n- Sejumput lada hitam<br>\r\n- 2 Telur rebus', '- Potong ubi sampai berbentuk dadu<br>\r\n- Rebus air hingga mendidih<br>\r\n- Masukkan ubi ke dalam air mendidih, tunggu selama 10-15 menit<br>\r\n- Angkat Ubi lalu sisihkan<br>\r\n- Ganti air rebusan dengan yang baru kemudian panaskan kembali<br>\r\n-masukkan bayam, lalu tunggu selama 1 menit<br>\r\n- Angkat bayam dan sisihkan<br>\r\n- Letakkan dan tata bayam, ubi, dan telur rebus pada satu piring<br>\r\n- Makanan siap disajikan<br>'),
(21, 18, 'Strawberry Boba', 'volupSDTBAUwWP6RqUeA.jpg', '300 Kal', '            - 40gr Strawberry<br>\r\n- 40gr Tepung tapioka<br>\r\n- 30gr Gula jagung<br>\r\n- 250ml Susu Low fat<br>\r\n-Es batu secukupnya <br>         ', '          - Blender strawberry dan Gula menggunakan kecepatan tinggi, blender hingga benar-benar halus<br>\r\n- Pindahkan selai strawberry yang sudah di blender hingga halus ke sebuah mangkuk besar<br>\r\n- Sisihkan 1 sdm selai strawberry ke gelas untuk penyajian<br>\r\n- Tambahkan tepung tapioka kedalam mangkuk yang berisi selai strawberry<br>\r\n- Aduk selai strawberry dan tepung tapioka hingga merata, kemudian bentuk menjadi bola-bola kecil hingga menjadi boba.<br>\r\n- Taburi boba dengan tepung tapioka, buang sisa tepung tapioka menggunakan saringan.<br>\r\n- Panaskan air menggunakan panci besar hingga mendidih.<br>\r\n- Masukkan strawberry boba dan biarkan selama 1 menit atau hingga boba mengapung<br>\r\n- Angkat dan Tiriskan boba<br>\r\n- Masukkan es batu dan tuang susu kedalam gelas yang berisi selai strawberry.<br>\r\n- Langkah terakhir tambahkan boba yang sudah dibuat kedalam minuman.<br>\r\n- Minuman siap disajikan<br>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_recipes` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `kategori_recipes` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
