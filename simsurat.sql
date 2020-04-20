-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 03:17 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_keluar`
--

CREATE TABLE `arsip_keluar` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_masuk`
--

CREATE TABLE `arsip_masuk` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_PENGGUNA` int(11) NOT NULL,
  `NIP_TUJUAN` varchar(20) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `STATUS_BACA` tinyint(1) NOT NULL,
  `KETERANGAN_DISPOSISI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`ID`, `ID_SURAT`, `ID_PENGGUNA`, `NIP_TUJUAN`, `TANGGAL`, `STATUS`, `STATUS_BACA`, `KETERANGAN_DISPOSISI`) VALUES
(1, 12, 3, '197112061997032004', '2020-04-19', 1, 1, 'mohon kiranya ditindaklanjuti'),
(2, 14, 3, '197112061997032004', '2020-04-19', 1, 1, 'Segera ditindaklanjuti bu'),
(3, 15, 3, '197612102010012008', '2020-04-19', 1, 1, 'untuk bu yusi');

-- --------------------------------------------------------

--
-- Table structure for table `inaktif`
--

CREATE TABLE `inaktif` (
  `ID_INAKTIF` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `MASA_AKTIF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ID_KEPALA` int(11) DEFAULT NULL,
  `STATUS_DISPOSISI` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA`, `ID_KEPALA`, `STATUS_DISPOSISI`) VALUES
(1, 'Administrator', NULL, 0),
(2, 'Camat', NULL, 1),
(3, 'Sekretaris Kecamatan', NULL, 1),
(4, 'Kepala Sub Bagian Umum, Kepegawaian, Data dan Informasi', NULL, 0),
(5, 'Kepala Sub Bagian Program dan Keuangan', NULL, 0),
(6, 'Kepala Seksi Kesejahteraan Sosial', NULL, 0),
(7, 'Kepala Seksi Ekonomi dan Pembangunan', NULL, 0),
(8, 'Kepala Seksi Ketentraman dan Ketertiban', NULL, 0),
(9, 'Kepala Seksi Pemerintahan', NULL, 0),
(10, 'Kepala Seksi Pemberdayaan Masyarakat', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_retensi`
--

CREATE TABLE `jadwal_retensi` (
  `ID_JADWAL` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `MASA_RETENSI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `ID_JENIS` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`ID_JENIS`, `NAMA`) VALUES
(1, 'Penting'),
(3, 'Rahasia'),
(4, 'Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `ID_LOKASI` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`ID_LOKASI`, `NAMA`) VALUES
(1, 'Resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `ID_MEDIA` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ID_MEDIA`, `NAMA`) VALUES
(1, 'Hardcopy'),
(2, 'Flashdisk');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `ID_UNIT` int(11) DEFAULT NULL,
  `ID_JABATAN` int(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` char(1) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `TANGGAL_PENGANGKATAN` date DEFAULT NULL,
  `NO_WA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `ID_UNIT`, `ID_JABATAN`, `NAMA`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `ALAMAT`, `TANGGAL_PENGANGKATAN`, `NO_WA`) VALUES
('12345678910', 1, 1, 'Moh Ramdan', '1993-02-24', 'L', 'Jalan Gedebage Selatan No 292 Bandung', '2020-04-12', '089631743745'),
('197112061997032004', 4, 6, 'Ida Rosida, S.Pt,. MM', '1971-12-06', 'P', 'Jalan Gedebage Selatan No.292', '1998-07-01', ''),
('197404051998031012', 8, 2, 'Dodit Ardian Pancapana, ST, M.Sc', '1974-04-05', 'L', 'Jalan Gedebage Selatan No.292 Bandung', '2019-07-12', ''),
('197404291994031004', 9, 3, 'Jaenudin, AP, M.Si', '1974-04-29', 'L', 'Jalan Gedebage Selatan No.292', '2018-02-14', ''),
('197612102010012008', 1, 4, 'Yusi Susilawati, S.Sos.,MM', '1976-12-10', 'P', 'Jalan Gedebage Selatan No.292', '2012-01-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `KEPERLUAN` varchar(255) DEFAULT NULL,
  `TANGGAL_PINJAM` date DEFAULT NULL,
  `LAMA_PINJAM` int(11) DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `STATUS_PINJAM` enum('telat','kembali','menunggu','pinjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penggandaan`
--

CREATE TABLE `penggandaan` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TUJUAN` varchar(255) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `PREVILAGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NIP`, `EMAIL`, `PASSWORD`, `PREVILAGE`) VALUES
(1, '12345678910', 'muhammad.ramdhan68@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, '197404051998031012', 'kecamatan.gedebage07@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, '197404291994031004', 'kecamatan.gedebage07@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(4, '197612102010012008', 'kecamatan.gedebage07@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(5, '197112061997032004', 'kecamatan.gedebage07@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_inaktif`
--

CREATE TABLE `riwayat_inaktif` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_INAKTIF` int(11) DEFAULT NULL,
  `TANGGAL_INAKTIF` date DEFAULT NULL,
  `TANGGAL_AKTIF_KEMBALI` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_retensi`
--

CREATE TABLE `riwayat_retensi` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_JADWAL` int(11) DEFAULT NULL,
  `TANGGAL_RETENSI` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `ID_SURAT` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `NOMOR` varchar(50) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `PERIHAL` varchar(255) DEFAULT NULL,
  `DARI` varchar(100) DEFAULT NULL,
  `KEPADA` varchar(100) DEFAULT NULL,
  `ASAL_INSTANSI` varchar(100) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL,
  `KETERANGAN` text NOT NULL,
  `KATEGORI_SURAT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`ID_SURAT`, `ID_JENIS`, `NOMOR`, `TANGGAL`, `PERIHAL`, `DARI`, `KEPADA`, `ASAL_INSTANSI`, `TANGGAL_MASUK`, `KETERANGAN`, `KATEGORI_SURAT`) VALUES
(12, 1, 'KP.01.01/029/2020/bappelitbang', '2020-04-18', 'Laporan anggaran', 'Bappelitbang', 'Kecamatan Gedebage', 'Bappelitbang', '2020-04-18', '1', 'masuk'),
(13, 4, 'KP.01.01/029/2020/bappelitbang', '2020-04-18', 'Laporan anggaran', 'Bappelitbang', 'Kecamatan Gedebage', 'Bappelitbang', '2020-04-18', 'keluar', 'keluar'),
(14, 4, 'KP.01.01/029/2020/bappelitbang', '2020-04-19', 'Kebutuhan data', 'Pemerintahan Umum', 'Kecamatan Gedebage', 'Pemerintahan Umum', '2020-04-19', 'harus segera ditindak lanjuti', 'masuk'),
(15, 4, 'KP.01.01/029/2020/dlhk', '2020-04-19', 'Permintaan data', 'DLHK', 'Kecamatan Gedebage', 'DLHK', '2020-04-19', 'ditindaklanjuti', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `ID_UNIT` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`ID_UNIT`, `NAMA`) VALUES
(1, 'Umum dan Kepegawaian Data Informasi'),
(2, 'Program dan Keuangan'),
(3, 'Pemerintahan'),
(4, 'Kesejahteraan Sosial'),
(5, 'Pemberdayaan Masyarakat'),
(6, 'Ekonomi dan Pembangunan, Lingkungan Hidup'),
(7, 'Ketentraman dan Ketertiban'),
(8, 'Camat Gedebage'),
(9, 'Sekcam Gedebage');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `ID_UPLOAD` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `PATH` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`ID_UPLOAD`, `ID_SURAT`, `PATH`) VALUES
(8, 12, 'http://localhost/simsurat/uploads/surat/kecamatan_6.pdf'),
(9, 13, 'http://localhost/simsurat/uploads/surat/kecamatan_3.pdf'),
(10, 14, 'http://localhost/simsurat/uploads/surat/kecamatan_4.pdf'),
(11, 15, 'http://localhost/simsurat/uploads/surat/kecamatan_5.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_13` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_26` (`NIP`);

--
-- Indexes for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_11` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_25` (`NIP`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_15` (`ID_SURAT`);

--
-- Indexes for table `inaktif`
--
ALTER TABLE `inaktif`
  ADD PRIMARY KEY (`ID_INAKTIF`),
  ADD KEY `FK_REFERENCE_8` (`ID_JENIS`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`),
  ADD KEY `FK_JABATAN1` (`ID_KEPALA`);

--
-- Indexes for table `jadwal_retensi`
--
ALTER TABLE `jadwal_retensi`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_REFERENCE_9` (`ID_JENIS`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`ID_LOKASI`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ID_MEDIA`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_REFERENCE_3` (`ID_JABATAN`),
  ADD KEY `FK_REFERENCE_2` (`ID_UNIT`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_17` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_28` (`NIP`);

--
-- Indexes for table `penggandaan`
--
ALTER TABLE `penggandaan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_22` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_24` (`NIP`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`),
  ADD KEY `FK_REFERENCE_23` (`NIP`);

--
-- Indexes for table `riwayat_inaktif`
--
ALTER TABLE `riwayat_inaktif`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_18` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_19` (`ID_INAKTIF`);

--
-- Indexes for table `riwayat_retensi`
--
ALTER TABLE `riwayat_retensi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_20` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_21` (`ID_JADWAL`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_7` (`ID_JENIS`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`ID_UNIT`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`ID_UPLOAD`),
  ADD KEY `FK_REFERENCE_4` (`ID_SURAT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `ID_JABATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `ID_SURAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `ID_UNIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `ID_UPLOAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  ADD CONSTRAINT `FK_REFERENCE_26` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD CONSTRAINT `FK_REFERENCE_25` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `inaktif`
--
ALTER TABLE `inaktif`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `jadwal_retensi`
--
ALTER TABLE `jadwal_retensi`
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `penggandaan`
--
ALTER TABLE `penggandaan`
  ADD CONSTRAINT `FK_REFERENCE_24` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_REFERENCE_23` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_inaktif`
--
ALTER TABLE `riwayat_inaktif`
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_INAKTIF`) REFERENCES `inaktif` (`ID_INAKTIF`);

--
-- Constraints for table `riwayat_retensi`
--
ALTER TABLE `riwayat_retensi`
  ADD CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal_retensi` (`ID_JADWAL`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
