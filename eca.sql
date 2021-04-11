-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 01:24 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eca`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `about`) VALUES
(1, 'Shoes clean merupakan jasa pencucian khusus sepatu,kami melakukan pencucian secara khusus untuk mencuci sepatu anda menggunakan jenis sabun yang khusus  untuk sepatu yang tidak merusak bagian dari sepatu setiap sepatu memiliki kriterianya masing-masing tergantung dari bahan apa yang ada di sepatu tersebut dan kami akan selalu mentreatment sepatu anda dengan sebaik mungkin.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `katalog` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `katalog`, `deskripsi`, `harga`) VALUES
(1, 'Fast Clean', 'Fast Clean merupakan jenis treatment hanya mencuci bagian luar dari sepatu. Waktu yang dibutuhkan 15 menit sampai 30 menit. ', 30000),
(3, 'Deepclean', 'Deep Clean merupakan jenis treatment yang mencuci secara keseluruhan sepatu baik bagian luar maupun bagian dalam sepatu. Waktu pengerjaan 3 hari sampai 5 hari ', 50000),
(4, 'Premium Treatment ', 'Premium Treatment merupakan treatment kami yang memcuci secara keseluruhan dan mendapatkan garansi, jika terjadi hal- hal yang tidak di inginkan kami akan bertanggung jawab sepenuhnya. Pegerjaan 3-5 hari ', 100000),
(5, 'Repaint', 'Repaing treatment kami di mana sepatu anda dapat kami cat ulang atau ingin menganti warna sepatu anda kami dapat membantu anda. Bahan yang dapat kami repaint adalah canvas dan sued. Pengerjaan 3-6 hari sudah termasuk cuci deep cleaning. Bergaransi selama 1 bulan jika kurang dari 1 bulan warna cet tersebut sudah pudar dapat kami garansikan. ', 150000),
(6, 'Unyellowing Midsole', 'Unyellowing Midsole treatmen kami dimana jika sepatu anda menguning dibagian midsole dapat kami hilangkan. Pengerjaan sekita 3-5 hari ', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(50) NOT NULL,
  `whatsapp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `instagram`, `line`, `email`, `number`, `whatsapp`) VALUES
(1, '@shoes&clean  ', '@shoesclean', 'shoesclean@gmail.com', '081118862555', '081219443515');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `daerah` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `daerah`, `lokasi`, `foto`) VALUES
(4, 'Bogor', 'Jl. Taman Cimanggu Raya No.20, RT.02/RW.03, Kedung Waringin, Kec. Tanah Sereal, Kota Bogor. ', 'loc1.JPG'),
(5, 'Bogor', 'Jalan Raya Pandawa No.11, Bantarjati, Bogor Utara, RT.04/RW.01, Bantarjati, Kota Bogor ', 'loc2.JPG'),
(7, 'Bogor', 'Jl. Pahlawan No.103, RT.01/RW.07, Bondongan, Kec. Bogor Sel., Kota Bogor.', 'loc11.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `metode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id_metode`, `metode`) VALUES
(1, 'bayar di tempat'),
(2, 'transfer');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_orderan` int(11) NOT NULL,
  `pelanggan` varchar(50) NOT NULL,
  `tanggal_order` date NOT NULL,
  `merk_sepatu` varchar(50) NOT NULL,
  `ukuran_sepatu` int(11) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_orderan`, `pelanggan`, `tanggal_order`, `merk_sepatu`, `ukuran_sepatu`, `treatment`, `note`, `alamat`, `harga`, `status`) VALUES
(61, 'coba1', '2020-07-14', 'adidas', 34, 'Deepclean', '', 'jakatra timur', 50000, 'pending'),
(62, 'coba1', '2020-07-16', 'converse', 40, 'Deepclean', '', 'cipayung jakarta timur', 50000, 'Barang Sedang Dijemput'),
(63, 'arif', '2020-08-15', 'convers', 0, 'Premium Treatment ', '', 'jl dahli blok aa no7 ', 100000, 'Barang Sedang Dijemput'),
(64, 'arif', '2020-08-15', 'convers', 43, 'Cap cleaning', '', 'jl dahli blok aa no7 ', 30000, 'Barang Di Kirim');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_orderan` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_orderan`, `metode`, `jumlah`, `tanggal`, `foto`) VALUES
(23, 62, 'transfer', 50000, '2020-07-16', '202007161733253ka17_muhamad abdul wahid_tugas05_4.jpg'),
(24, 63, 'bayar di tempat', 100000, '2020-08-15', '20200815152953'),
(25, 64, 'bayar di tempat', 30000, '2020-08-15', '20200815153255');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `password`, `alamat`, `provinsi`, `kota`, `kode_pos`) VALUES
(1, 'coba1', '23', 'coba@gmail.com', 'coba123', 'jakarta', '', '', 0),
(2, 'coba2', '34', 'coba2@gmail.com', 'coba123', '', '', '', 0),
(3, 'arif', 'furqan', 'ariffurqan000@gmail.com', 'dahlia22', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_orderan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_orderan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
