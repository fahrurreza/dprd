-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 03:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dprd`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `partai_id` int(11) NOT NULL,
  `komisi_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `jabatan_id`, `partai_id`, `komisi_id`, `nama`, `nip`, `pendidikan_id`, `tempat_lahir`, `tgl_lahir`, `alamat`, `awal`, `akhir`) VALUES
(2, 2, 1, 2, 'Rizki Billar', '12120009586644', 2, 'Selesai', '1997-01-09', 'Jl. Fatahillah Pasar Rodi', '2023-01-01', '2028-01-01'),
(3, 11, 3, 2, 'H. Noor Sri Alamsyah Putra, S.T', '00000000000000000001', 5, 'Binjai', '1981-01-01', 'Binjai', '2019-09-01', '2024-09-01'),
(4, 12, 5, 3, 'Ahmad Azrai Azis, S.Pd., M.M', '2', 6, 'Binjai', '1984-01-01', 'Binjai', '2019-09-01', '2024-09-01'),
(5, 13, 6, 4, 'Ir. Muhammad Syarif Sitepu', '3', 2, 'Binjai', '1985-01-01', 'Binjai', '2019-09-01', '2024-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `disposisi` varchar(32) NOT NULL,
  `perihal` varchar(191) NOT NULL,
  `pesan` text NOT NULL,
  `hasil` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `user_id`, `disposisi`, `perihal`, `pesan`, `hasil`, `created_at`) VALUES
(1, 4, 'selesai', 'tes', 'tes', 'FyzIhL67.pdf', '2023-02-11 05:26:22'),
(2, 1, 'diterima', 'Tes 2', 'Tes 2', NULL, '2023-02-11 08:23:42'),
(3, 6, 'selesai', 'tes', 'tes', '8ylJO7QF.pdf', '2023-02-20 04:35:29'),
(4, 6, 'terkirim', 'tes lg', 'tes lg', NULL, '2023-02-20 08:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `image_post`
--

CREATE TABLE `image_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `files` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_post`
--

INSERT INTO `image_post` (`id`, `post_id`, `files`) VALUES
(2, 2, 'diG3iJV4.jpeg'),
(3, 3, 'BGpYEyH5.jpg'),
(5, 5, 'jdKpFgur.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `jabatan`) VALUES
(2, 'Ketua Komisi C'),
(4, 'Ketua Umum'),
(5, 'Wakil Ketua'),
(6, 'Ketua Komisi A'),
(7, 'Ketua Komisi B'),
(8, 'Anggota Komisi A'),
(9, 'Anggota Komisi B'),
(10, 'Anggota Komisi C'),
(11, 'Ketua DPRD'),
(12, 'Wakil Ketua I DPRD'),
(13, 'Wakil Ketua II DPRD');

-- --------------------------------------------------------

--
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisi`
--

INSERT INTO `komisi` (`id`, `komisi`) VALUES
(2, 'Komisi A'),
(3, 'Komisi B'),
(4, 'Komisi C');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `icon`, `route`) VALUES
(1, 'Dashboard', 'mdi mdi-view-dashboard', 'admin'),
(2, 'Setup', 'icon-cog menu-icon', 'setup'),
(19, 'Rapat', 'mdi mdi-book', 'rapat'),
(20, 'Publikasi', 'mdi mdi-newspaper', 'admin-publikasi'),
(22, 'Aspirasi', 'mdi mdi-voice', 'admin-aspirasi'),
(24, 'Profile', 'mdi mdi-account-box', 'admin-profile'),
(27, 'Master Data', 'mdi mdi-database', 'admin-master-data'),
(28, 'Register', 'mdi mdi-voice', 'admin-register');

--
-- Triggers `menus`
--
DELIMITER $$
CREATE TRIGGER `del_menurole` BEFORE DELETE ON `menus` FOR EACH ROW DELETE FROM menu_role
    WHERE menu_role.menu_id = old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_submenu` BEFORE DELETE ON `menus` FOR EACH ROW DELETE FROM submenus
    WHERE submenus.menu_id = old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `menu_system` AFTER INSERT ON `menus` FOR EACH ROW INSERT INTO menu_role(menu_id, role_id)
        VALUES(NEW.id, 1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `menu_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(17, 1, 7),
(18, 2, 7),
(28, 1, 8),
(31, 19, 1),
(32, 20, 1),
(34, 22, 1),
(36, 24, 1),
(39, 27, 1),
(40, 28, 1),
(41, 1, 2),
(42, 19, 2),
(43, 20, 2),
(44, 22, 2),
(45, 24, 2),
(46, 27, 2),
(47, 28, 2),
(48, 1, 3),
(49, 22, 3),
(50, 19, 3),
(52, 19, 5),
(53, 1, 5),
(54, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2022_09_20_101705_create_roles_table', 2),
(3, '2022_09_20_101949_create_menus_table', 3),
(4, '2022_09_20_102014_create_submenus_table', 3),
(5, '2022_09_26_135520_create_posts_table', 4),
(6, '2022_10_28_095520_create_visimisi_table', 5),
(7, '2022_10_31_103536_create_jabatans_table', 6),
(8, '2022_10_31_103613_create_partai_table', 6),
(9, '2022_10_31_103632_create_komisi_table', 6),
(10, '2022_10_31_103657_create_anggota_table', 6),
(11, '2022_11_02_091052_create_pendidikans_table', 7),
(15, '2022_11_07_092538_create_rapats_table', 8),
(16, '2022_11_09_095746_create_organisasi_table', 9),
(17, '2022_11_09_095857_create_tugas_pokok_table', 9),
(18, '2022_11_09_095918_create_tugas_fungsi_table', 9),
(19, '2022_11_09_100303_create_struktur_organisasi_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `unit`) VALUES
(2, 'Sekretaris DPRD'),
(3, 'Bagian Umum'),
(4, 'Bagian Umum - Sub Bagian Umum'),
(5, 'Bagian Umum - Sub Bagian Humas dan Protokoler'),
(6, 'Bagian Umum - Sub Bagian Kepegawaian'),
(7, 'Bagian Perencanaan dan Keuangan'),
(8, 'Bagian Perencanaan dan Keuangan - Sub Bagian Program dan Anggaran'),
(9, 'Bagian Perencanaan dan Keuangan - Sub Bagian Pembukuan dan Pelaporan'),
(10, 'Bagian Perencanaan dan Keuangan - Sub Bagian Verifikasi'),
(11, 'Bagian Persidangan dan Perundang-undangan'),
(12, 'Bagian Persidangan dan Perundang-undangan - Sub Bagian Persidangan'),
(13, 'Bagian Persidangan dan Perundang-undangan - Sub Bagian Risalah'),
(14, 'Bagian Persidangan dan Perundang-undangan - Sub Bagian Perundang-undangan');

-- --------------------------------------------------------

--
-- Table structure for table `partai`
--

CREATE TABLE `partai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partai`
--

INSERT INTO `partai` (`id`, `partai`, `logo`) VALUES
(1, 'PDIP', ''),
(3, 'Golkar', ''),
(4, 'PKS', ''),
(5, 'Gerindra', ''),
(6, 'Demokrat', ''),
(7, 'Hanura', ''),
(8, 'Nasdem', ''),
(9, 'PAN', ''),
(10, 'PPP', '');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id`, `pendidikan`) VALUES
(2, 'S1 - Komputer'),
(3, 'S1 - Hukum'),
(4, 'S1 - Pendidikan'),
(5, 'S1 - Teknik'),
(6, 'S2 - Magister Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Jokowi Wanti-wanti Lukas Enembe: Hormati Panggilan KPK', 'jokowi-wanti-wanti-lukas-enembe-hormati-panggilan-kpk', '<div>\"Dan saya sudah sampaikan juga agar semuanya menghormati panggilan dari KPK dan hormati proses hukum yang ada di KPK. Semuanya,\" kata Jokowi saat ditemui di Pangkalan TNI AU Halim Perdanakusuma, Jakarta Timur, Senin (26/9).<br><br>Jokowi menegaskan bahwa semua warga negara sama di mata hukum. Karena itu, semua pihak harus menghormati proses hukum yang tengah berjalan di KPK.<br><br>\"Sama. Saya kira proses hukum di KPK semua harus hormati. Semua sama di mata hukum,\" ucapnya.<br><br>Lukas Enembe telah ditetapkan tersangka oleh KPK. Meski tidak menyampaikan secara detail perihal kasusnya, KPK menyinggung penyalahgunaan dana otonomi khusus (otsus).<br><br>Sampai saat ini, KPK belum berhasil memeriksa secara langsung Lukas Enembe. Namun hari ini KPK menjadwalkan pemeriksaan Enembe. KPK berharap Enembe kooperatif dengan memenuhi panggilan pemeriksaan.<br><br>Menko Polhukam Mahfud MD mengklaim penetapan status tersangka Enembe soal kasus suap dan gratifikasi tak bernuansa politis jelang Pemilu 2024.<br><br>Baca artikel CNN Indonesia \"Jokowi Wanti-wanti Lukas Enembe: Hormati Panggilan KPK\" selengkapnya di sini: <a href=\"https://www.cnnindonesia.com/nasional/20220926120231-12-852687/jokowi-wanti-wanti-lukas-enembe-hormati-panggilan-kpk\">https://www.cnnindonesia.com/nasional/20220926120231-12-852687/jokowi-wanti-wanti-lukas-enembe-hormati-panggilan-kpk</a>.<br><br>Download Apps CNN Indonesia sekarang https://app.cnnindonesia.com/</div>', 'Warta', 2, '2022-09-26 08:26:45', NULL),
(3, 'Kapolri Mutasi 30 Perwira, Kombes Ade Ary Syam Jabat Kapolres Metro Jaksel', 'kapolri-mutasi-30-perwira-kombes-ade-ary-syam-jabat-kapolres-metro-jaksel', '<div><strong>Kapolri</strong></a> Jenderal Listyo Sigit Prabowo menerbitkan surat telegram mutasi 30 perwira Polri ke sejumlah jabatan, salah satunya Kapolres Metro Jakarta Selatan yang bakal dijabat oleh Kombes Ade Ary Syam Idradi.<br><br></div><div>Kepala Divisi Humas Polri Irjen Pol Dedi Prasetyo dikonfirmasi di Jakarta, Senin, membenarkan terbitnya surat telegram Kapolri yang ditandatangani oleh Asisten Kapolri Bidang SDM atas nama Kapolri pada 24 September kemarin.<br><br></div><div>“Iya betul (terbit surat telegram),” kata Dedi Senin 26 September 2022.<br><br></div><div>Dalam surat telegram Nomor: ST/2046/IX/KEP/2022 itu, terdapat 30 personel terdiri atas perwira tinggi (pati) dan perwira menegah (pamen) Polri yang dimutasi, baik dalam rangka promosi, pensiun maupun bersifat demosi. Mereka terdiri 11 pati (7 bintang satu, sisanya bintang dua), 19 pamen (17 kombes pol, dua AKBP).<br><br></div><div>Sejumlah jabatan yang terisi dalam mutasi ini adalah <a href=\"https://www.tempo.co/tag/kapolres-metro-jakarta-selatan\"><strong>Kapolres Metro Jakarta Selatan</strong></a> yang sebelumnya diampu oleh Kombes Pol Budhi Herdi Susianto dinonaktifkan, karena terseret dalam kasus Ferdi Sambo.<br><br></div><div>Posisi itu diisi oleh Kombes Pol Ade Ary Syam Indradi yang sebelumnya menjabat sebagai Kabaganev Robinopsnam Bareskrim Polri. Kemudian, jabatan Wakapolda Kepulauan Riau (Kepri) bakal dipimpin oleh Brigjen Pol Agus Suharnoko, yang sebelumnya menjabat sebagai penyidik tindak pidana utama TK II Bareskrim Polri.<br><br></div><div>Jabatan Wakapolda Kepri sebelumnya dijabat oleh Brigjen Pol Rudi Pranoto yang diangkat dalam jabatan sebagai Widyaiswara Utama Sespim Lemdiklat Polri.<br><br></div><div><strong>Mujiyono jabat Wakapolda Kalimantan Timur</strong>&nbsp;<br><br></div>', 'Warta', 2, '2022-09-26 08:40:07', NULL),
(5, 'Lukas Enembe Ajak Lihat Tambang Emas, Begini Kata KPK', 'lukas-enembe-ajak-lihat-tambang-emas-begini-kata-kpk', '<div>Jakarta - KPK merespons pernyataan salah satu kuasa hukum Gubernur Papua Lukas Enembe soal ajakan ke Papua untuk membuktikan kepemilikan tambang emas milik Lukas. KPK meminta hal tersebut disampaikan langsung ke penyidik KPK saat pemeriksaan.<br>\"Saya ingin sampaikan kepada saudara penasehat hukum, ini yang kami sayangkan, kenapa? Seharusnya sampaikan lah langsung di hadapan tim penyidik KPK,\" kata Kabag Pemberitaan KPK Ali Fikri kepada wartawan di gedung Merah Putih KPK, Jalan Kuningan Persada, Jakarta Selatan, Senin (26/9/2022).<br><br>Ali mengungkapkan, sejatinya proses pembuktian terbalik yang disinggung oleh pihak Lukas Enembe itu hanya bisa disampaikan kepada penegak hukum. Dia menyayangkan pihak Lukas menyampaikan hal itu di ruang publik.<br><br>Baca artikel detiknews, \"Lukas Enembe Ajak Lihat Tambang Emas, Begini Kata KPK\" Ali menegaskan bahwa pembangunan narasi di publik itu bukanlah sebuah pembuktian perkara hukum. Menurutnya, pembuktian itu harus disampaikan di tempat dan waktu yang sesuai dengan koridor hukum.<br><br>\"Bagi kami itu bukan sebuah pembuktian, karena pembuktian perkara itu harus disampaikan pada tempat dan waktu yang tepat,\" ujarnya.<br><br>Terakhir, Ali juga menegaskan bahwa KPK tidak akan ke Papua untuk melakukan pemeriksaan Lukas Enembe.<br><br>\"Ya ini kan kami memanggil tersangka, bukan kami yang disuruh ke sana,\" imbuhnya.<br><br>Baca artikel detiknews, \"Lukas Enembe Ajak Lihat Tambang Emas, Begini Kata KPK\" selengkapnya <a href=\"https://news.detik.com/berita/d-6313695/lukas-enembe-ajak-lihat-tambang-emas-begini-kata-kpk\">https://news.detik.com/berita/d-6313695/lukas-enembe-ajak-lihat-tambang-emas-begini-kata-kpk</a>.<br><br>Download Apps Detikcom Sekarang https://apps.detik.com/detik/.<br><br><br></div>', 'Warta', 2, '2022-09-26 12:55:35', NULL);

--
-- Triggers `posts`
--
DELIMITER $$
CREATE TRIGGER `delete_image` AFTER DELETE ON `posts` FOR EACH ROW DELETE FROM image_post
    WHERE image_post.post_id = old.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rapats`
--

CREATE TABLE `rapats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rapat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acara_rapat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_rapat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat_rapat` int(11) NOT NULL,
  `is_selesai` tinyint(1) NOT NULL DEFAULT 0,
  `waktu` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rapats`
--

INSERT INTO `rapats` (`id`, `nama_rapat`, `acara_rapat`, `peserta_rapat`, `sifat_rapat`, `is_selesai`, `waktu`, `created_at`, `updated_at`, `keterangan`, `hasil`) VALUES
(6, 'Tes Sifat Rapat 1', 'Tes Sifat Rapat 1', 'Seluruh Anggota', 2, 0, '2023-02-13 07:00:00', '2023-02-12 03:02:58', NULL, NULL, NULL),
(8, 'Tes Sifat Rapat 3', 'Tes Sifat Rapat 3', 'TES', 1, 1, '2023-03-06 03:16:21', '2023-02-12 03:07:30', '2023-03-06 03:16:21', 'tes', 'zolcExUR.pdf'),
(9, 'Tes Sifat Rapat 4', 'Tes Sifat Rapat 4', 'tes', 1, 0, '2023-02-22 11:27:14', '2023-02-12 03:42:46', '2023-02-22 11:27:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'system', NULL, NULL),
(2, 'admin', NULL, NULL),
(3, 'sekretariat', NULL, NULL),
(4, 'user', NULL, NULL),
(5, 'Kepala Bagian', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `anggota_id`, `jabatan`) VALUES
(1, 3, 'Ketua DPRD'),
(2, 4, 'Wakil I Ketua DPRD'),
(3, 5, 'Wakil II Ketua DPRD');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `submenu`, `route`) VALUES
(1, 2, 'Menu', 'menu'),
(9, 2, 'Role Menu', 'role-menu'),
(19, 2, 'User', 'users'),
(23, 24, 'Struktur Organisasi', 'admin-struktur'),
(24, 19, 'Agenda Rapat', 'admin-agenda-rapat'),
(25, 19, 'Hasil Rapat', 'admin-hasil-rapat'),
(26, 24, 'Visi - Misi', 'admin-visimisi'),
(27, 27, 'Jabatan', 'admin-jabatan'),
(28, 27, 'Anggota', 'admin-anggota'),
(29, 27, 'Partai', 'admin-partai'),
(30, 27, 'Komisi', 'admin-komisi'),
(31, 20, 'Warta', 'admin-warta'),
(32, 20, 'Galeri', 'admin-galeri'),
(34, 27, 'Pendidikan', 'admin-pendidikan'),
(36, 24, 'Susunan Organisasi', 'admin-susunan-organisasi'),
(37, 24, 'Tugas Pokok', 'admin-tugas-pokok'),
(38, 24, 'Tugas Fungsi', 'admin-tugas-fungsi'),
(39, 19, 'Arsip Hasil Rapat', 'admin-arsip-rapat');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_fungsi`
--

CREATE TABLE `tugas_fungsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisasi_id` int(11) NOT NULL,
  `fungsi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_fungsi`
--

INSERT INTO `tugas_fungsi` (`id`, `organisasi_id`, `fungsi`) VALUES
(1, 2, '<div>- Penyelenggaraan administrasi kesekretariatan DPRD</div><div>- Penyelenggaraan administrasi keuangan DPRD</div><div>- Penyelenggaraan rapat-rapat anggota DPRD</div><div>- Penyediaan dan Pengkordinasian tenaga ahli yang diperlukan oleh DPRD.&nbsp;</div>'),
(2, 3, '<div>- Menyusun program dan rencana kerja;</div><div>- Mengkoordinir pelaksanaan pengelolaan administrasi DPRD dan Sekretariat DPRD;</div><div>- Mendistribusikan dan pengendalian bahan perlengkapan rumah tangga secretariat;</div><div>- Menyusun petunjuk teknis lingkup umum, kepegawaian, serta humas dan protocol;</div><div>- Merencanakan pemeliharaan alat-alat perlengkapan rumah tangga secretariat;</div><div>- Melaksanakan pengadaan kebutuhan rumah tangga secretariat DPRD;</div><div>- Merencanakan tata administrasi kegiatan dan kunjungan kerja DPRD;</div><div>- Melaksanakan pembinaan kepegawaian;</div><div>- Mengkoordinir pelaksanaan kegiatan umum, rumah tangga, kepegawaian serta humas dan protokol; dan</div><div>- Melaksanakan pembinaan, monitoring, evaluasi, dan pelaporan kegiatan.</div>');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_pokok`
--

CREATE TABLE `tugas_pokok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisasi_id` int(11) NOT NULL,
  `tugas` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_pokok`
--

INSERT INTO `tugas_pokok` (`id`, `organisasi_id`, `tugas`) VALUES
(1, 2, '<div>Sekretaris Dewan Perwakilan Daerah mempunyai tugas menyelenggarakan administrasi kesekretariatan, administrasi keuangan, mendukung pelaksanaan tugas dan fungsi Dewan Perwakilan Rakyat Daerah, dan menyediakan serta mengkoordinasikan tenaga ahli bila diperlukan oleh Dewan Perwakilan Rakyat Daerah sesuai kebutuhan&nbsp;</div>'),
(2, 3, '<div>Bagian Umum mempunyai tugas melaksanakan Sebagian tugas Sekretariat DPRD, meliputi pengelolaan administrasi umum, humas dan protokoler, dan kepegawaian&nbsp;</div>'),
(3, 4, '<div>Sub Bagian Umum mempunyai tugas melaksanakan pelayanan administrasi umum&nbsp;</div>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `nik`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'System', 'system', 'sys@gmail.com', '', '$2y$10$tO7SQieZN3Pfzd50ig7WUeL1xqfXg2ssi9wqxdiEMRkKAEA35BDWe', 1, 0, '2022-09-20 02:49:36', '2023-02-12 02:59:51'),
(2, 'Rizky', 'rizki', 'rizki@gmail.com', '', '$2y$10$tO7SQieZN3Pfzd50ig7WUeL1xqfXg2ssi9wqxdiEMRkKAEA35BDWe', 2, 0, NULL, NULL),
(3, 'sekretariat', 'Sekretariat', 'sekretariat@gmail.com', '', '$2y$10$tO7SQieZN3Pfzd50ig7WUeL1xqfXg2ssi9wqxdiEMRkKAEA35BDWe', 3, 0, NULL, NULL),
(6, 'tes registrasi', 'userdprd', 'user@dprd.com', '1218035304910002', '$2y$10$tO7SQieZN3Pfzd50ig7WUeL1xqfXg2ssi9wqxdiEMRkKAEA35BDWe', 4, 1, '2023-02-11 13:57:40', '2023-02-11 14:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visimisi`
--

INSERT INTO `visimisi` (`id`, `deskripsi`, `jenis`) VALUES
(3, 'Terwujudnya pelayanan Kesekretariatan maksudnya adalah Sekretariat DPRD menjadi sarana pendukung bagi tercapainya kelancaran tugas DPRD secara optimal sehingga', 'visi'),
(4, 'Meningkatkan penyelenggaraan administrasi ketatalaksanaan DPRD', 'misi'),
(5, 'Prima adalah memberikan pelayanan yang terbaik dalam mendukung tugas DPRD', 'visi'),
(6, 'Transparan adalah memberikan pelayanan yang terbuka dan jujur', 'visi'),
(7, 'Akuntabel adalah memberikan pelayanan yang dapat dipertanggungjawabkan', 'visi'),
(8, 'Meningkatkan kualitas aparatur Sekretariat DPRD yang Transparan dan Akuntabel', 'misi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_post`
--
ALTER TABLE `image_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rapats`
--
ALTER TABLE `rapats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_fungsi`
--
ALTER TABLE `tugas_fungsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_pokok`
--
ALTER TABLE `tugas_pokok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image_post`
--
ALTER TABLE `image_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `partai`
--
ALTER TABLE `partai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rapats`
--
ALTER TABLE `rapats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tugas_fungsi`
--
ALTER TABLE `tugas_fungsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_pokok`
--
ALTER TABLE `tugas_pokok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
