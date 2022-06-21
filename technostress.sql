-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:2513
-- Generation Time: Jun 21, 2022 at 06:34 PM
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
  `id_pengguna` int(11) DEFAULT NULL,
  `tingkat` varchar(10) DEFAULT NULL,
  `angka` float DEFAULT NULL,
  `overload` int(11) DEFAULT NULL,
  `invasion` int(11) DEFAULT NULL,
  `complexity` int(11) DEFAULT NULL,
  `uncertainty` int(11) DEFAULT NULL,
  `insecurity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`kode_hasil`, `id_pengguna`, `tingkat`, `angka`, `overload`, `invasion`, `complexity`, `uncertainty`, `insecurity`) VALUES
(1, 1, 'Rendah', 10.5446, 11, 19, 14, 14, 16),
(2, 2, 'Rendah', 11.3271, 16, 15, 12, 26, 18),
(3, 5, 'Rendah', 8.66327, 14, 12, 14, 14, 15),
(4, 6, 'Tinggi', 13.9935, 20, 22, 22, 25, 23),
(5, 9, 'Rendah', 10.0089, 16, 12, 12, 17, 14),
(6, 21, 'Rendah', 9.78571, 14, 14, 13, 17, 15),
(7, 7, 'Rendah', 12.0542, 20, 17, 18, 17, 17);

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
('T05', 'Insecurity', 'Kondisi dimana pengguna merasa ketakutan jika dirinya akan tergantikan oleh teknologi'),
('T06', 'Tidak Ada', 'Anda Tidak Mengalami Gangguan Technostress');

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
(1, 'user@gmail.com', 'user0001', 'user1', '2000-03-01', 'SMA', '1 tahun'),
(2, 'user2@gmail.com', 'user0002', 'user2', '1972-10-23', 'SMA', '10 tahun'),
(3, 'user3@gmail.com', 'user0003', 'user3', '1979-06-08', 'SMA', '10 tahun'),
(4, 'user4@gmail.com', 'user0004', 'user4', '1977-01-23', 'SMA', '5 tahun'),
(5, 'user5@gmail.com', 'user0005', 'user5', '1978-04-10', 'SMA', '10 tahun'),
(6, 'user6@gmail.com', 'user0006', 'user6', '1966-01-06', 'SMA', '10 tahun'),
(7, 'user7@gmail.com', 'user0007', 'user7', '1963-05-18', 'SMA', '10 tahun'),
(8, 'user8@gmail.com', 'user0008', 'user8', '1968-08-31', 'SMK', '10 tahun'),
(9, 'user9@gmail.com', 'user0009', 'user9', '1968-05-18', 'SMK', '10 tahun'),
(10, 'user10@gmail.com', 'user0010', 'user10', '1970-05-02', 'SMK', '10 tahun'),
(11, 'user11@gmail.com', 'user0011', 'user11', '1973-02-01', 'SMA', '10 tahun'),
(12, 'user12@gmail.com', 'user0012', 'user12', '1971-06-05', 'SMK', '10 tahun'),
(13, 'user13@gmail.com', 'user0013', 'user13', '1996-12-01', 'SD', '5 tahun'),
(14, 'user14@gmail.com', 'user0014', 'user14', '1974-04-24', 'SD', '10 tahun'),
(15, 'user15@gmail.com', 'user0015', 'user15', '1991-11-20', 'SD', '5 tahun'),
(16, 'user16@gmail.com', 'user0016', 'user16', '1972-08-27', 'SD', '10 tahun'),
(17, 'user17@gmail.com', 'uer0017', 'user17', '1966-10-26', 'SD', '10 tahun'),
(18, 'user18@gmail.com', 'user0018', 'user18', '1993-08-13', 'SD', '5 tahun'),
(19, 'user19@gmail.com', 'user0019', 'user19', '1975-12-13', 'SD', '10 tahun'),
(20, 'user20@gmail.com', 'user0020', 'user20', '1972-02-10', 'SD', '10 tahun'),
(21, 'user21@gmail.com', 'user0021', 'user21', '1988-04-06', 'SD', '5 tahun'),
(22, 'user22@gmail.com', 'user0022', 'user22', '1997-01-01', 'SMA', '5 tahun'),
(23, 'user23@gmail.com', 'user0023', 'user23', '1993-04-18', 'SMA', '5 tahun'),
(24, 'user24@gmail.com', 'user0024', 'user24', '1999-03-01', 'SMA', '5 tahun'),
(25, 'user25@gmail.com', 'user0025', 'user25', '2000-02-29', 'SMA', '5 tahun');

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
('P34', 'Terlalu sering menggunakan alat digital membuat saya malas untuk melakukan pekerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `rule_base`
--

CREATE TABLE `rule_base` (
  `kode_rule` int(11) NOT NULL,
  `t01` varchar(20) NOT NULL,
  `t02` varchar(20) NOT NULL,
  `t03` varchar(20) NOT NULL,
  `t04` varchar(20) NOT NULL,
  `t05` varchar(20) NOT NULL,
  `hasil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rule_base`
--

INSERT INTO `rule_base` (`kode_rule`, `t01`, `t02`, `t03`, `t04`, `t05`, `hasil`) VALUES
(1, 'NORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'RENDAH'),
(2, 'ABNORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'RENDAH'),
(3, 'NORMAL', 'ABNORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'RENDAH'),
(4, 'NORMAL', 'NORMAL', 'ABNORMAL', 'NORMAL', 'NORMAL', 'RENDAH'),
(5, 'NORMAL', 'NORMAL', 'NORMAL', 'ABNORMAL', 'NORMAL', 'RENDAH'),
(6, 'NORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'ABNORMAL', 'RENDAH'),
(7, 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'SEDANG'),
(8, 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'NORMAL', 'SEEDANG'),
(9, 'NORMAL', 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'SEDANG'),
(10, 'NORMAL', 'NORMAL', 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'SEDANG'),
(11, 'ABNORMAL', 'NORMAL', 'NORMAL', 'NORMAL', 'ABNORMAL', 'SEDANG'),
(12, 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'NORMAL', 'SEDANG'),
(13, 'NOMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'SEDANG'),
(14, 'NORMAL', 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'SEDANG'),
(15, 'ABNORMAL', 'NORMAL', 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'SEDANG'),
(16, 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'NORMAL', 'ABNORMAL', 'SEDANG'),
(17, 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'TINGGI'),
(18, 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'TINGGI'),
(19, 'ABNORMAL', 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'TINGGI'),
(20, 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'ABNORMAL', 'ABNORMAL', 'TINGGI'),
(21, 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'NORMAL', 'ABNORMAL', 'TINGGI'),
(22, 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'ABNORMAL', 'TINGGI');

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
  ADD KEY `id_pengguna` (`id_pengguna`);

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
-- Indexes for table `rule_base`
--
ALTER TABLE `rule_base`
  ADD PRIMARY KEY (`kode_rule`);

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
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rule_base`
--
ALTER TABLE `rule_base`
  MODIFY `kode_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
