-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 11:44 PM
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
-- Database: `lilygaleri1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `kategori`, `gambar`, `isi`) VALUES
(16, '5 Langkah Mendesain Aksesori Custom yang Sempurna', 'Wire Weaving Jewelry', 'contoh blog.jpg', '<div style=\"box-sizing: border-box; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: \'Times New Roman\', serif; font-size: 12pt;\">Aksesori custom menjadi pilihan favorit bagi mereka yang ingin memiliki barang unik yang tidak dimiliki oleh orang lain. Proses mendesain aksesori ini memberikan ruang untuk mengekspresikan kreativitas, menciptakan barang yang sesuai dengan selera, kebutuhan, bahkan cerita pribadi Anda. Namun, proses ini tidak hanya sekadar memilih bahan atau bentuk; ada langkah-langkah yang perlu diperhatikan agar aksesori custom benar-benar sempurna dan memuaskan. Artikel ini akan memandu Anda melalui lima langkah penting dalam menciptakan aksesori custom yang tidak hanya indah tetapi juga bermakna.</span></div>\r\n<div style=\"box-sizing: border-box; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: Times New Roman, serif;\"><span style=\"box-sizing: border-box; font-size: 16px;\">&nbsp;</span></span></div>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">1. Tentukan Konsep dan Tujuan Desain</span></span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Langkah pertama dalam mendesain aksesori custom adalah menentukan konsep dan tujuan. Pikirkan aksesori seperti apa yang ingin Anda buat dan untuk keperluan apa. Apakah untuk acara formal seperti pernikahan atau sebagai hadiah spesial? Tentukan tema desain, seperti minimalis, vintage, atau etnik, yang dapat mewakili gaya Anda atau penerima aksesori tersebut.</span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">2. Pilih Material yang Tepat</span></span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Material adalah kunci untuk menciptakan aksesori yang berkualitas dan tahan lama. Pilih bahan yang sesuai dengan konsep Anda, seperti logam mulia (emas atau perak) untuk desain elegan atau bahan alami seperti kerang atau batu pantai untuk tampilan yang lebih unik. Jangan lupa untuk mempertimbangkan kenyamanan dan alergi kulit saat memilih material.</span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">3. Buat Sketsa Desain</span></span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Setelah konsep dan material dipilih, saatnya menuangkan ide ke dalam bentuk sketsa. Sketsa ini akan menjadi dasar dari proses produksi aksesori Anda. Jika Anda merasa kesulitan, Anda bisa bekerja sama dengan desainer profesional untuk memastikan desain Anda realistis dan sesuai dengan ekspektasi. Gunakan sketsa ini untuk melihat bagaimana elemen-elemen seperti bentuk, warna, dan ukuran bekerja bersama.</span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">4. Diskusikan dengan Ahli atau Pembuat Aksesori</span></span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Langkah ini sangat penting, terutama jika Anda bekerja dengan pengrajin atau pembuat aksesori custom. Diskusikan desain Anda secara detail, termasuk jenis material, ukuran, dan elemen dekoratif yang ingin ditambahkan. Ahli atau pengrajin dapat memberikan saran tambahan untuk menyempurnakan desain, memastikan hasil akhirnya sesuai dengan harapan Anda.</span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\">&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">5. Review dan Finalisasi Desain</span></span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Sebelum produksi dimulai, pastikan Anda melakukan review terhadap desain akhir. Periksa ulang detail seperti proporsi, kepraktisan, dan kesesuaian dengan konsep awal. Ini adalah kesempatan terakhir untuk melakukan revisi sebelum aksesori dibuat.&nbsp;</span><span style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Setelah Anda puas dengan desainnya, barulah proses pembuatan dimulai.</span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\">&nbsp;</p>\r\n<div class=\"MsoNormal\" style=\"box-sizing: border-box; font-family: sans-serif; font-size: 14px; background-color: #ffffff; line-height: 21px;\"><hr style=\"box-sizing: content-box; height: 0px; overflow: visible; margin-top: 1rem; margin-bottom: 1rem; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; text-align: justify; border-color: rgba(0, 0, 0, 0.1) initial initial initial;\" align=\"left\" noshade=\"noshade\" size=\"0\" width=\"100%\" /></div>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Kesimpulan</span></span></p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">Mendesain aksesori custom adalah perjalanan yang melibatkan kreativitas, perencanaan, dan komunikasi. Dengan mengikuti lima langkah ini, Anda dapat memastikan bahwa hasil akhirnya sesuai dengan visi dan harapan Anda. Aksesori custom bukan hanya tentang tampil beda, tetapi juga tentang menciptakan sesuatu yang benar-benar bermakna dan personal. Dengan langkah yang tepat, aksesori yang Anda ciptakan akan menjadi karya yang spesial dan tak terlupakan.</span></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: sans-serif; font-size: 14px; background-color: #ffffff; text-align: justify; line-height: 21px;\"><span lang=\"SV\" style=\"box-sizing: border-box; font-size: 12pt; line-height: 24px; font-family: \'Times New Roman\', serif;\">&nbsp;</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `customorder`
--

CREATE TABLE `customorder` (
  `CustomOrderID` int(11) NOT NULL,
  `NamaPemesan` varchar(100) NOT NULL,
  `Desain` text NOT NULL,
  `MaterialTambahan` text DEFAULT NULL,
  `FotoReferensi` varchar(255) DEFAULT NULL,
  `AlamatPengiriman` text DEFAULT NULL,
  `NoWhatsApp` varchar(15) DEFAULT NULL,
  `StatusCustom` enum('Pending','Proses','Selesai') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `DetailID` int(11) NOT NULL,
  `TransaksiID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `SubHarga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`DetailID`, `TransaksiID`, `ProdukID`, `NamaProduk`, `JumlahProduk`, `SubHarga`) VALUES
(1, 11, 18, 'Kalung wire', 2, 140000.00),
(2, 12, 16, 'Bros wire meoww', 1, 35000.00),
(3, 12, 15, 'Bros embroidery', 1, 60000.00),
(5, 13, 17, 'Bros wire', 6, 240000.00),
(6, 14, 17, 'Bros wire', 7, 280000.00),
(7, 15, 17, 'Bros wire', 6, 240000.00),
(8, 16, 17, 'Bros wire', 1, 40000.00),
(9, 17, 17, 'Bros wire', 1, 40000.00),
(10, 17, 16, 'Bros wire meoww', 1, 35000.00),
(11, 18, 17, 'Bros wire', 1, 40000.00),
(12, 18, 16, 'Bros wire meoww', 1, 35000.00),
(13, 18, 18, 'Kalung wire', 1, 70000.00),
(14, 19, 18, 'Kalung wire', 1, 70000.00),
(15, 20, 18, 'Kalung wire', 1, 70000.00),
(16, 21, 18, 'Kalung wire', 1, 70000.00),
(17, 21, 17, 'Bros wire', 1, 40000.00),
(18, 22, 10, 'Bross Batu Payet Jepang', 1, 50000.00),
(20, 24, 17, 'Bros wire', 1, 40000.00),
(21, 25, 18, 'Kalung wire', 3, 210000.00),
(23, 27, 16, 'Bros wire meoww', 2, 70000.00),
(24, 28, 17, 'Bros wire', 4, 160000.00),
(25, 29, 17, 'Bros wire', 1, 40000.00),
(26, 30, 18, 'Kalung wire', 2, 140000.00),
(28, 32, 17, 'Bros wire', 2, 80000.00),
(29, 33, 18, 'Kalung wire', 2, 140000.00),
(30, 34, 17, 'Bros wire', 3, 120000.00),
(31, 35, 17, 'Bros wire', 1, 40000.00),
(32, 36, 15, 'Bros embroidery', 1, 60000.00),
(33, 37, 16, 'Bros wire meoww', 3, 105000.00),
(34, 38, 17, 'Bros wire', 1, 40000.00),
(35, 38, 14, 'Bros embroidery', 1, 50000.00),
(36, 39, 16, 'Bros wire meoww', 2, 70000.00),
(37, 40, 16, 'Bros wire meoww', 1, 35000.00);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `SessionID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `MaterialID` int(11) NOT NULL,
  `NamaMaterial` varchar(100) NOT NULL,
  `DeskripsiMaterial` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `OrderItemID` int(11) NOT NULL,
  `TransaksiID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SubtotalHarga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `PaymentID` int(11) NOT NULL,
  `TransaksiID` int(11) NOT NULL,
  `MetodePembayaran` enum('Midtrans','Transfer Bank','Lainnya') NOT NULL,
  `StatusPembayaran` enum('Pending','Sukses','Gagal') DEFAULT 'Pending',
  `PaymentDate` datetime DEFAULT current_timestamp(),
  `JumlahBayar` decimal(10,2) NOT NULL,
  `BuktiBayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ProductID` int(11) NOT NULL,
  `NamaProduk` varchar(100) NOT NULL,
  `DeskripsiProduk` text DEFAULT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `GambarProduk` varchar(255) DEFAULT NULL,
  `Stok` int(11) NOT NULL DEFAULT 0,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ProductID`, `NamaProduk`, `DeskripsiProduk`, `Harga`, `GambarProduk`, `Stok`, `kategori`) VALUES
(8, 'Bros embroidery lace ', '- batu cabochon\r\n- payet jepang miyuki /MGB\r\n- kristal\r\nUkuran bros : 4 cm x 5 cm', 30000.00, 'IMG_20241110_133102.jpg', 30, 'Embroidery jewelry'),
(9, 'Bross Batu Payet Jepang Motif Turki', '- grassdome motif turki\r\n- payet jepang miyuki /MGB\r\n- kristal\r\nUkuran bros : 14 cm x 7 cm', 50000.00, 'IMG_20241110_133610.jpg', 25, 'Embroidery jewelry'),
(10, 'Bross Batu Payet Jepang', '- batu cabochon\r\n- payet jepang miyuki /MGB\r\n- kristal\r\nUkuran bros : 14 cm x 7 cm', 50000.00, 'IMG_20241110_132813 (1).jpg', 30, 'Embroidery jewelry'),
(12, 'Bros embroidery lace ', '- batu cabochon\r\n- payet jepang miyuki /MGB\r\n- kristal\r\nUkuran bros : 4 cm x 4 cm\r\n', 45000.00, 'IMG_20241110_132219.jpg', 40, 'Embroidery jewelry'),
(13, 'Bros embroidery lace ', 'Material : \r\n- batu cabochon\r\n- payet jepang miyuki /MGB\r\n- kristal\r\nUkuran bros : 5 cm x 6 cm\r\n', 45000.00, 'IMG_20241110_133353.jpg', 40, 'Embroidery jewelry'),
(14, 'Bros embroidery', 'Material : \r\n- batu cabochon\r\n- payet jepang miyuki\r\n- batu agate\r\nUkuran bros : 5 cm x 6 cm\r\n', 50000.00, 'IMG_20241110_132924.jpg', 19, 'Embroidery jewelry'),
(15, 'Bros embroidery', 'Material : \r\n- kristal\r\n- kerang laut\r\n- batu kerikil\r\n- mutiara sintetis\r\n- payet jepang miyuki\r\n- ornamen/charm\r\nUkuran bros : 5 cm x 6 cm', 60000.00, 'IMG_20240916_140125.jpg', 14, 'Embroidery jewelry'),
(16, 'Bros wire meoww', 'Material : \r\n- kawat tembaga\r\n- batu cabochon\r\n- kristal\r\nUkuran bros : 4 cm x 6,5cm', 35000.00, 'IMG_20241110_132308.jpg', 10, 'Wire Weaving jewelry'),
(17, 'Bros wire', 'Material : \r\n- kawat tembaga\r\n- batu cabochon\r\n- kristal\r\nUkuran bros : 4 cm x 6,5cm', 40000.00, 'IMG_20241110_133147.jpg', 3, 'Wire Weaving jewelry'),
(18, 'Kalung wire', 'Material : \r\n- kawat tembaga\r\n- batu cabochon\r\n- kristal\r\nUkuran bros : 4 cm x 6,5cm\r\n', 70000.00, 'IMG_20241110_131358.jpg', 0, 'Wire Weaving jewelry');

-- --------------------------------------------------------

--
-- Table structure for table `produkmaterial`
--

CREATE TABLE `produkmaterial` (
  `ProdukID` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `TestimoniID` int(11) NOT NULL,
  `NamaPelanggan` varchar(100) DEFAULT NULL,
  `Ulasan` text DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` between 1 and 5),
  `TanggalUlasan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `TransaksiID` int(11) NOT NULL,
  `OrderDate` datetime DEFAULT current_timestamp(),
  `TotalHarga` decimal(10,2) NOT NULL,
  `MetodePembayaran` enum('Midtrans','WhatsApp') NOT NULL,
  `StatusPembayaran` enum('Belum Dibayar','Berhasil','Gagal','Dibayar') DEFAULT 'Belum Dibayar',
  `NamaPembeli` varchar(100) DEFAULT NULL,
  `AlamatPengiriman` text DEFAULT NULL,
  `NoWhatsApp` varchar(15) DEFAULT NULL,
  `EmailPembeli` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `BuktiPembayaran` varchar(255) DEFAULT NULL,
  `StatusVerifikasi` enum('Belum Diverifikasi','Diverifikasi','Ditolak') DEFAULT 'Belum Diverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`TransaksiID`, `OrderDate`, `TotalHarga`, `MetodePembayaran`, `StatusPembayaran`, `NamaPembeli`, `AlamatPengiriman`, `NoWhatsApp`, `EmailPembeli`, `username`, `BuktiPembayaran`, `StatusVerifikasi`) VALUES
(1, '2025-01-03 23:58:14', 230000.00, '', '', 'alif solihin', 'jdshas', '32243', '', '', NULL, 'Belum Diverifikasi'),
(2, '2025-01-03 23:58:25', 230000.00, '', '', 'alif solihin', 'jdshas', '32243', '', '', NULL, 'Belum Diverifikasi'),
(3, '2025-01-07 08:52:07', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(4, '2025-01-07 08:54:03', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(5, '2025-01-07 08:56:58', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(6, '2025-01-07 08:57:02', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(7, '2025-01-07 08:57:36', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(8, '2025-01-07 08:57:41', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(9, '2025-01-07 09:04:15', 140000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(10, '2025-01-07 09:18:17', 140000.00, '', '', 'Admin Tes', '', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(11, '2025-01-07 09:26:10', 140000.00, '', '', 'Admin Tes', '', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(12, '2025-01-07 09:28:36', 95000.00, '', '', 'Admin Tes', '', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(13, '2025-01-07 09:34:45', 240000.00, '', '', 'Admin Tes', '', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(14, '2025-01-07 09:38:19', 280000.00, '', '', 'Admin Tes', NULL, '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(15, '2025-01-07 09:42:44', 240000.00, '', '', 'Admin Tes', '', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(16, '2025-01-07 09:44:43', 40000.00, '', '', 'Admin Tes', '', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(17, '2025-01-07 09:53:52', 75000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(18, '2025-01-07 10:01:09', 145000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(19, '2025-01-07 10:11:31', 70000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(20, '2025-01-07 10:15:35', 70000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(21, '2025-01-07 10:22:00', 110000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(22, '2025-01-07 10:26:11', 50000.00, '', '', 'Admin Tes', 'sudiang', '76162712', 'hagj@hjqsbjkq', '', NULL, 'Belum Diverifikasi'),
(24, '2025-01-07 11:41:09', 40000.00, '', 'Belum Dibayar', 'rafli', 'gvhskabkm', '086278290', 'andiraflisyam@gmail.com', 'andirafli', NULL, 'Belum Diverifikasi'),
(25, '2025-01-07 12:01:37', 210000.00, '', 'Berhasil', 'rafli', 'gvhskabkm', '086278290', 'andiraflisyam@gmail.com', 'andirafli', NULL, 'Belum Diverifikasi'),
(27, '2025-01-07 12:19:03', 70000.00, '', 'Belum Dibayar', 'rafli', 'gvhskabkm', '086278290', 'andiraflisyam@gmail.com', 'andirafli', NULL, 'Belum Diverifikasi'),
(28, '2025-01-07 12:22:54', 160000.00, '', 'Belum Dibayar', 'rafli', 'gvhskabkm', '086278290', 'andiraflisyam@gmail.com', 'andirafli', NULL, 'Belum Diverifikasi'),
(29, '2025-01-07 12:29:34', 40000.00, '', 'Berhasil', 'rafli', 'gvhskabkm', '086278290', 'andiraflisyam@gmail.com', 'andirafli', NULL, 'Belum Diverifikasi'),
(30, '2025-01-07 12:38:29', 140000.00, '', 'Berhasil', 'evitasari', 'PK 7, Belakang Kampus 1', '085287639276', 'evitasari68@gmail.com', 'Evi', NULL, 'Belum Diverifikasi'),
(31, '2025-01-07 13:02:47', 70000.00, '', 'Belum Dibayar', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', 'admin', '1736253183-logo2.jpeg', 'Diverifikasi'),
(32, '2025-01-07 13:55:53', 80000.00, '', '', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', 'admin', NULL, 'Belum Diverifikasi'),
(33, '2025-01-07 15:06:32', 140000.00, '', 'Belum Dibayar', 'Admin Tes', 'sudiang', '76162712', 'hagj@hjqsbjkq', 'admin', NULL, 'Belum Diverifikasi'),
(34, '2025-01-07 15:15:03', 120000.00, '', 'Belum Dibayar', 'Admin Tes', 'sudiang', '76162712', 'hagj@hjqsbjkq', 'admin', NULL, 'Belum Diverifikasi'),
(35, '2025-01-07 15:17:28', 40000.00, '', 'Belum Dibayar', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', 'admin', NULL, 'Belum Diverifikasi'),
(36, '2025-01-07 15:20:02', 60000.00, '', 'Belum Dibayar', 'Admin Tes', '1', '76162712', 'hagj@hjqsbjkq', 'admin', NULL, 'Belum Diverifikasi'),
(37, '2025-01-07 15:23:09', 105000.00, '', 'Berhasil', 'Admin Tes', 'jkkdjsjdw', '76162712', 'hagj@hjqsbjkq', 'admin', NULL, 'Belum Diverifikasi'),
(38, '2025-01-07 17:05:15', 90000.00, '', 'Berhasil', 'alif solihin', 'jdshas', '32243', 'alslh2404@gmail.com', 'alifs', 'uploads/DIS_03120220159.png', 'Belum Diverifikasi'),
(39, '2025-01-07 23:05:44', 70000.00, '', 'Gagal', 'alif solihin', 'jdshas', '32243', 'alslh2404@gmail.com', 'alifs', 'uploads/WhatsApp Image 2024-12-27 at 20.48.42.jpeg', 'Belum Diverifikasi'),
(40, '2025-01-07 23:14:16', 35000.00, '', 'Berhasil', 'alif solihin', 'jdshas', '32243', 'alslh2404@gmail.com', 'alifs', 'uploads/DIS_03120220159.png', 'Belum Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Nomor_Telpon` varchar(15) NOT NULL,
  `Alamat` text NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Peran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Nama`, `username`, `password`, `Nomor_Telpon`, `Alamat`, `Email`, `Peran`) VALUES
(1, 'Ade Egar Tri Ramadhan', 'admin1', '21232f297a57a5a743894a0e4a801fc3', '087 871 908 023', 'Jln . Sahabat ', 'adeegar1710@gmail.com', ''),
(2, 'Eliyarti', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '081 144 5052', 'NTI , Jln.Manggis 4 Blok J N0.3', 'lily.mihoradjab@gmail.com', ''),
(3, 'Evitasari', 'admin3', 'admin', '085 800 653 067', 'Pondok Nur Ikhsan, Asal Mula', 'sevi9124@gmail.com', ''),
(4, 'Andi Rafli', 'admin4', 'admin', '085 298 977 998', 'Sudiang', 'rafliandi318@gmail.com\r\n', ''),
(5, 'alif solihin', 'alifs', '$2y$10$VQYskvtsB.mlTjnT3Ecqm.zpLdxGe1A7BnGU2LKIE8/J37fWzIkii', '32243', 'jdshas', 'alslh2404@gmail.com', 'user'),
(6, 'Admin Tes', 'admin', '$2y$10$TLU.6onV8Ez7PYpfz3QdAeC8ACMRESzE.PaKNmoR.HuH4j4fzexb6', '76162712', 'jkkdjsjdw', 'hagj@hjqsbjkq', 'admin'),
(7, 'rafli', 'andirafli', '$2y$10$wEu9a0c9yNaFkGz96gLgCulW3wGYqmTPCznM/b/jZsznErfpJp10i', '086278290', 'gvhskabkm', 'andiraflisyam@gmail.com', 'user'),
(8, 'evitasari', 'Evi', '$2y$10$1DIDsFuB/v5Lbad4QLlI.O8cyEw/MkdZGy42n4viiOmxUVlnk0r66', '085287639276', 'PK 7, Belakang Kampus 1', 'evitasari68@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customorder`
--
ALTER TABLE `customorder`
  ADD PRIMARY KEY (`CustomOrderID`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`DetailID`),
  ADD KEY `TransaksiID` (`TransaksiID`),
  ADD KEY `ProdukID` (`ProdukID`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`MaterialID`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`OrderItemID`),
  ADD KEY `TransaksiID` (`TransaksiID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `TransaksiID` (`TransaksiID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `produkmaterial`
--
ALTER TABLE `produkmaterial`
  ADD PRIMARY KEY (`ProdukID`,`MaterialID`),
  ADD KEY `MaterialID` (`MaterialID`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`TestimoniID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`TransaksiID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customorder`
--
ALTER TABLE `customorder`
  MODIFY `CustomOrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `TestimoniID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `TransaksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`TransaksiID`) REFERENCES `transaksi` (`TransaksiID`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`ProdukID`) REFERENCES `produk` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `produk` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`TransaksiID`) REFERENCES `transaksi` (`TransaksiID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `produk` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`TransaksiID`) REFERENCES `transaksi` (`TransaksiID`) ON DELETE CASCADE;

--
-- Constraints for table `produkmaterial`
--
ALTER TABLE `produkmaterial`
  ADD CONSTRAINT `produkmaterial_ibfk_1` FOREIGN KEY (`ProdukID`) REFERENCES `produk` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `produkmaterial_ibfk_2` FOREIGN KEY (`MaterialID`) REFERENCES `material` (`MaterialID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
