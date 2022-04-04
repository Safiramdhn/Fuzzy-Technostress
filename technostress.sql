-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:2513
-- Generation Time: Apr 04, 2022 at 10:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempakar2513`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(8) NOT NULL,
  `pass` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'admin', 'admin27'),
(2, 'pila', 'my1227');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `kode_hasil` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_kriteria` varchar(8) NOT NULL,
  `tingkat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`kode_hasil`, `id_pengguna`, `kode_kriteria`, `tingkat`) VALUES
(1, 4, 'T02', 'Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `kode_keputusan` int(11) NOT NULL,
  `kode_kriteria` varchar(8) NOT NULL,
  `kode_pernyataan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`kode_keputusan`, `kode_kriteria`, `kode_pernyataan`) VALUES
(1, 'T01', 'P01'),
(2, 'T01', 'P04'),
(3, 'T01', 'P09'),
(4, 'T01', 'P16'),
(5, 'T01', 'P20'),
(6, 'T01', 'P32'),
(7, 'T01', 'P34'),
(8, 'T02', 'P02'),
(9, 'T02', 'P03'),
(10, 'T02', 'P12'),
(11, 'T02', 'P13'),
(12, 'T02', 'P14'),
(13, 'T02', 'P23'),
(14, 'T03', 'P05'),
(15, 'T03', 'P07'),
(16, 'T03', 'P19'),
(17, 'T03', 'P22'),
(18, 'T03', 'P24'),
(19, 'T03', 'P29'),
(20, 'T03', 'P30'),
(21, 'T04', 'P08'),
(22, 'T04', 'P10'),
(23, 'T04', 'P15'),
(24, 'T04', 'P17'),
(25, 'T04', 'P21'),
(26, 'T04', 'P28'),
(27, 'T04', 'P33'),
(28, 'T05', 'P06'),
(29, 'T05', 'P11'),
(30, 'T05', 'P18'),
(31, 'T05', 'P25'),
(32, 'T05', 'P26'),
(33, 'T05', 'P27'),
(34, 'T05', 'P31');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(8) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `keterangan`) VALUES
('T01', 'Overload', 'Situasi dimana pengguna dituntut harus bekerja lebih lama atau lebih cepat terhadap teknologi'),
('T02', 'Invasion', 'Situasi dimana tidak ada pembatas yang menyebabkan kehidupan pengguna terganggu dengan adanya teknologi'),
('T03', 'Complexity', 'Situasi dimana pengguna merasa kesulitan mempelajari dan menggunakan teknologi'),
('T04', 'Uncertainty', 'Kondisi dimana pengguna merasa gelisah dengan perkembangan teknologi yang mengharuskan dirinya mempelajari hal tersebut'),
('T05', 'Insecurity', 'Kondisi dimana pengguna merasa ketakutan jika dirinya akan tergantikan oleh teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tingkat_sekolah` char(3) DEFAULT NULL,
  `lama_mengajar` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `email`, `pass`, `nama`, `tgl_lahir`, `tingkat_sekolah`, `lama_mengajar`) VALUES
(1, 'sherryara9@gmail.com', 'fd15839a', 'pila', NULL, NULL, NULL),
(2, 'safiramadhani9@gmail.com', 'password', 'uji', NULL, NULL, NULL),
(4, 'tiamayasari01@gmail.com', 'punyatia', 'Tia Mayasari', '2000-03-01', 'sma', '1 tahun'),
(5, 'dewi.27@students.amikom.ac.id', 'ujipass', 'safira', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pernyataan`
--

CREATE TABLE `pernyataan` (
  `kode_pernyataan` varchar(8) NOT NULL,
  `pernyataan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pernyataan`
--

INSERT INTO `pernyataan` (`kode_pernyataan`, `pernyataan`) VALUES
('P01', 'Dalam internet saya harus mengingat informasi penting seperti password dan ini membuat saya stress'),
('P02', 'Dengan menggunakan teknologi membuat batasan antara kerjaan kantor dan kerjaan rumah menghilang'),
('P03', 'Kehidupan pribadi saya terganggu akibat teknologi'),
('P04', 'Menggunakan hal baru tentang teknologi untuk aspek mengajar sangat membuang waktu'),
('P05', 'Menggunakan komputer membuat proses mengajar menjadi sulit'),
('P06', 'Nilai profesi di bidang pendidikan menurun akibat teknologi'),
('P07', 'Perkembangan teknologi yang pesat menjadi beban untuk saya'),
('P08', 'Saya cemas terhadap teknologi dapat memungkinkan kecerdasan siswa menurun'),
('P09', 'Saya dalam tekanan untuk memperbarui kemampuan teknik untuk menahan pekerjaan saya'),
('P10', 'Saya gelisah tentang kesehatan saya karena terlalu bergantung dengan komputer'),
('P11', 'Saya kehilangan kepercayaan diri saya dalam mengajar karena rekan saya dapat menggunakan teknologi dengan baik dibanding saya'),
('P12', 'Saya khawatir dengan keamanan dari data saya di internet'),
('P13', 'Saya khawatir dengan privasi pada data pribadi yang ada di institusi'),
('P14', 'Saya memiliki ketakutan tentang kehidupan pribadi saya di internet'),
('P15', 'Saya merasa jika saya menggunakan internet, privasi saya dapat diketahui dengan mudah'),
('P16', 'Saya merasa pusing saat jam kerja berakhir karena menggunakan komputer'),
('P17', 'Saya merasa ragu dengan kemudahan dalam mengawasi pekerjaan dengan teknologi'),
('P18', 'Saya merasa sangat cemas jika komputer tidak bekerja dengan baik'),
('P19', 'Saya merasa sebal jika berkerja setiap hari menggunakan komputer'),
('P20', 'Saya merasa stres karena terlalu banyak sumber di internet membuat saya kebingungan'),
('P21', 'Saya merasa tidak nyaman untuk memanfaatkan teknologi dalam kegiatan belajar dan mengajar'),
('P22', 'Saya merasa tidak senang saat mengajar menggunakan teknologi'),
('P23', 'Saya sangat takut jika ada virus menyerang komputer pribadi saya'),
('P24', 'Saya sering merasa teknologi terlalu sulit untuk digunakan'),
('P25', 'Saya takut jika alat digital merupakan hal yang sangat biasa dalam proses belajar dan mengajar'),
('P26', 'Saya takut menggunakan komputer karena tidak percaya diri'),
('P27', 'Saya takut suatu saat saya menjadi pengangguran karena tergantikan oleh teknologi'),
('P28', 'Saya takut tiap saat saya memikirkan keamanan komputer di sekolah'),
('P29', 'Saya tidak nyaman jika mengambil kelas dengan menggunakan teknologi'),
('P30', 'Saya tidak paham tentang efektivitas dalam penggunaan teknologi'),
('P31', 'Saya tidak percaya diri tentang kompetensi teknologi saya'),
('P32', 'Teknologi membuat saya sibuk dalam kehidupan kerja saya'),
('P33', 'Teknologi mungkin alasan dari berkurangnya interaksi sosial dalam pendidikan'),
('P34', 'Terlalu sering menggunakan alat digital membuat saya malas untuk melakukan pekerjaan'),
('P35', 'uji ubah data');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode_hasil`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`kode_keputusan`),
  ADD KEY `kode_kriteria` (`kode_kriteria`),
  ADD KEY `kode_pernyataan` (`kode_pernyataan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pernyataan`
--
ALTER TABLE `pernyataan`
  ADD PRIMARY KEY (`kode_pernyataan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `kode_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`);

--
-- Constraints for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`),
  ADD CONSTRAINT `keputusan_ibfk_2` FOREIGN KEY (`kode_pernyataan`) REFERENCES `pernyataan` (`kode_pernyataan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
