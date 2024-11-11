-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 03:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `komentarID` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`komentarID`, `image_id`, `admin_id`, `admin_name`, `isi_komentar`, `tanggal_komentar`) VALUES
(2, 44, 6, 'Rizky Fadhilah', 'kerenn', '2024-11-06 10:54:05'),
(3, 47, 6, 'Rizky Fadhilah', 'wooo', '2024-11-06 10:56:09'),
(4, 53, 9, 'Bayu Firdaus', 'Mantab', '2024-11-06 11:17:50'),
(5, 43, 6, 'Rizky Fadhilah', '123', '2024-11-07 01:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(5, 'Yoga Raditya', 'yoga', '202cb962ac59075b964b07152d234b70', '', 'yogaraditya@gmail.com', 'Manglayang'),
(6, 'Rizky Fadhilah', 'rizky', '202cb962ac59075b964b07152d234b70', '', 'rizkyfahilahagung@gmail.com', 'Moch Toha'),
(7, 'Adhitya Danuwar', 'adhit', '202cb962ac59075b964b07152d234b70', '', 'adhitdanu@gmail.com', 'Cikandang'),
(8, 'Erik Setiawan', 'erik', '202cb962ac59075b964b07152d234b70', '', 'eriksen@gmail.com', 'Cihaliwung Rt.01/14'),
(9, 'Bayu Firdaus', 'bayu', '202cb962ac59075b964b07152d234b70', '', 'mbayuf@gmail.com', 'Cileunyi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Otomotif'),
(15, 'Bawah Air'),
(16, 'Hewan Peliharaan'),
(17, 'Satwa Liar'),
(18, 'Makanan'),
(19, 'Olahraga'),
(20, 'Game'),
(21, 'Karya Seni'),
(22, 'Alam'),
(23, 'Tokoh Musik'),
(24, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(43, 15, 'Bawah Air', 5, 'Yoga Raditya', 'Ikan Gupi', 'Gupi, ikan seribu, ikan cere, ikan celdung, atau suwadakar, adalah salah satu spesies ikan hias air tawar yang paling populer di dunia. Karena mudahnya menyesuaikan diri dan beranak-pinak, di banyak tempat di Indonesia ikan ini telah menjadi ikan liar yang memenuhi parit-parit dan selokan.', 'foto1730889941.jpg', 1, '2024-11-06 10:45:41'),
(44, 15, 'Bawah Air', 5, 'Yoga Raditya', 'IKan Cupang', 'Cupang, ikan laga, atau ikan adu siam adalah ikan air tawar yang habitat asalnya adalah beberapa negara di Asia Tenggara, antara lain Thailand, Malaysia, Brunei Darussalam, Singapura, Vietnam, dan Indonesia. Ikan ini mempunyai bentuk dan karakter yang unik dan cenderung agresif dalam mempertahankan wilayahnya.', 'foto_1730889895_ikan-cupang.jpg', 1, '2024-11-06 10:44:55'),
(45, 15, 'Bawah Air', 5, 'Yoga Raditya', 'Ikan Lohan', 'Ikan Lou Han ikan Lou han merupakan salah satu ikan hias termahal di dunia yang dipelihara di dalam akuarium karena warna sisik mereka yang hidup serta benjolan kepala mereka yang berbentuk khas berjuluk \"benjol kelam\". ', 'foto_1730890002_how-to-know-a-female-flowerhorn-fish-1-1_11zon.jpg', 1, '2024-11-06 10:46:42'),
(46, 14, 'Otomotif', 6, 'Rizky Fadhilah', 'Nisan Grand Turismo', 'Nissan GT-R adalah sebuah mobil sport yang dibuat oleh Nissan, dikeluarkan di Jepang pada tanggal 6 Desember 2007, Amerika Serikat pada tanggal 7 Juli 2008, dan seluruh dunia pada bulan Maret 2009.[1][2][3] Mobil ini merupakan penerus dari jajaran Skyline GT-R.', 'foto_1730890426_Nissan-GT-R-2025.jpg', 1, '2024-11-06 10:53:46'),
(47, 14, 'Otomotif', 6, 'Rizky Fadhilah', 'Toyota Supra ', 'Toyota Supra adalah mobil sport berperforma tinggi yang diproduksi oleh Toyota Motor Corporation, Jepang dari tahun 1978 sampai 2002. Pada mulanya, Supra adalah versi mewah bermesin 6 silinder dari Toyota Celica. Mulai tahun 1986, Supra menjadi mobil sport tersendiri yang tidak ada hubungannya dengan Celica.', 'foto_1730890543_Toyota_Supra_Monrepos_2019_IMG_1898.jpeg', 1, '2024-11-06 10:55:43'),
(48, 18, 'Makanan', 7, 'Adhitya Danuwar', 'Mie Aceh', 'Mi aceh adalah masakan mi pedas khas Aceh di Indonesia.[1] Mi kuning tebal dengan irisan daging sapi, daging kambing atau makanan laut (udang dan cumi) disajikan dalam sup sejenis kari yang gurih dan pedas. Mi aceh biasanya ditaburi dengan bawang goreng dan disajikan bersama emping, potongan bawang merah, mentimun, dan jeruk nipis.[2] Mi aceh biasanya disajikan dalam tiga bentuk yaitu mi kuah, mi goreng basah, dan mi goreng kering.[1] Di Aceh, karena ekslusivitas makanan di setiap daerah, mi Aceh hanya merujuk pada mi goreng, sedangkan istilah mi Aceh hanya digunakan di luar provinsi Aceh. Keunikan cita rasa mie Aceh terletak pada racikan bumbu yang kaya akan rempah-rempah, sehingga menghasilkan rasa yang kuat di lidah. Mienya pun cukup unik karena berwarna kuning dan bentuknya tebal pipih. Mie Aceh memiliki beberapa varian, ada yang kering, nyemek, dan basah. Toppingnya pun beragam, ada telur, daging, udang, dan lainnya sesuai selera.', 'foto_1730890926_ed34312ca4ff22d5af808014d6b0b963.jpg', 1, '2024-11-06 11:02:06'),
(49, 18, 'Makanan', 7, 'Adhitya Danuwar', 'Lepet', 'Lontong adalah makanan yang dibuat dari beras, dibungkus dengan daun pisang, kemudian direbus sampai matang.[1]\r\n\r\nLontong berkembang melalui masyarakat Jawa. Tapi ada satu teori lain yang mengatakan lontong versi isian sayuran dan ayam (arem-arem) adaptasi lokal dari bakcang Tionghoa tapi dimodifikasi halal dan berbentuk silindris panjang pasca masuknya Islam ke tanah Jawa. Makanan ini biasanya disajikan dengan sate, rendang, opor ayam, tahu masak dan gulai kambing, dan biasanya dibuat ketika menjelang 1 Syawal atau Hari Raya Idul Fitri sebagai hidangan lebaran.', 'foto_1730891067_download (6).jpeg', 1, '2024-11-06 11:04:27'),
(50, 24, 'Minuman', 7, 'Adhitya Danuwar', 'Fresh Milk', 'Cimory Fresh Milk dibuat dari susu sapi segar yang berasal dari pegunungan Puncak, Jawa Barat yang menggunakan teknologi sterilisasi (pasteurisasi). Susu Cimory memiliki rasa yang creamy, ciri khas susu sapi segar dan mengandung nutrisi berkualitas tinggi seperti protein, vitamin dan mineral. Memenuhi kebutuhan kalsium harian keluarga.\r\n\r\n', 'foto_1730891161_download (7).jpeg', 1, '2024-11-06 11:06:01'),
(51, 18, 'Makanan', 8, 'Erik Setiawan', 'Bala-Bala', 'Bala-bala adalah makanan gorengan yang terbuat dari sayuran dan tepung terigu yang lazim ditemukan di Indonesia. Bakwan biasanya merujuk kepada kudapan gorengan sayur-sayuran yang biasa dijual oleh penjaja keliling. ', 'foto_1730891331_download (8).jpeg', 1, '2024-11-06 11:08:51'),
(52, 18, 'Makanan', 8, 'Erik Setiawan', 'Gehu', 'Gehu adalah camilan khas Sunda yang terbuat dari tahu yang diisi dengan tauge dan kadang dicampur racikan bumbu pedas kemudian digoreng dengan pelapis yang terbuat dari adonan tepung terigu, tepung beras dan tepung kanji. Oleh masyarakat Sunda, gehu ', 'foto_1730891420_download (9).jpeg', 1, '2024-11-06 11:10:20'),
(53, 24, 'Minuman', 8, 'Erik Setiawan', 'Teh Sisri', 'Teh Sisri merupakan minuman teh instan yang langsung larut dalam air, sangat nikmat disajikan dingin apalagi karena rasa tehnya yang nikmat, manis dan segar. Teh Sisri cocok untuk segala usia.', 'foto_1730891578_download (10).jpeg', 1, '2024-11-06 11:13:48'),
(54, 20, 'Game', 9, 'Bayu Firdaus', 'Minecraft', 'Minecraft adalah sebuah permainan bak pasir yang dikembangkan oleh pengembang permainan Swedia Mojang Studios. Permainan ini dibuat oleh Markus \"Notch\" Persson dalam bahasa pemrograman Java.', 'foto_1730891840_download (11).jpeg', 1, '2024-11-06 11:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_like`
--

CREATE TABLE `tb_like` (
  `id_like` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `suka` int(11) NOT NULL,
  `tanggal_like` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_like`
--

INSERT INTO `tb_like` (`id_like`, `image_id`, `admin_name`, `suka`, `tanggal_like`) VALUES
(2, 43, 'Yoga Raditya', 1, '2024-11-06 10:43:11'),
(3, 44, 'Rizky Fadhilah', 1, '2024-11-06 10:53:55'),
(4, 47, 'Rizky Fadhilah', 1, '2024-11-06 10:56:04'),
(5, 53, 'Bayu Firdaus', 1, '2024-11-06 11:17:40'),
(6, 43, 'Rizky Fadhilah', 1, '2024-11-07 01:26:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`komentarID`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD PRIMARY KEY (`id_like`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `komentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_like`
--
ALTER TABLE `tb_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
