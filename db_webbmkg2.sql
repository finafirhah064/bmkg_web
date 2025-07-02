-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2025 at 02:54 PM
-- Server version: 8.0.35
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webbmkg2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'ytta', '1234567', 'ijaaa'),
(2, 'fin', '34', 'fii');

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id_mahasiswa` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `jenis_kegiatan` enum('PKL','Skripsi','Kunjungan') NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pembimbing` varchar(100) DEFAULT NULL,
  `stasiun_divisi` varchar(100) DEFAULT NULL,
  `file_laporan` text,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id_mahasiswa`, `nim`, `nama`, `universitas`, `jenis_kegiatan`, `judul`, `pembimbing`, `stasiun_divisi`, `file_laporan`, `tanggal_mulai`, `tanggal_selesai`, `created_at`) VALUES
(1, '220605110160', 'Arum Puspita', 'UIN MALANG', 'PKL', 'Pembuatan Website', 'Pak Sodiq', 'IT', '1748952522_feda0c2556605ca08b57.pdf', '2025-05-03', '2025-06-12', '2025-06-03 12:08:42'),
(3, '220605110150', 'Dina Sandrina', 'Universitas Brawijaya', 'Kunjungan', 'Mengolah Data Gempa', 'Bu Sri', 'Gempa', '1748952950_a35241c5906ffdb1297d.pdf', '2025-05-03', '2025-06-03', '2025-06-03 12:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `berita_kegiatan`
--

CREATE TABLE `berita_kegiatan` (
  `id_berita` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `judul` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isi` text,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita_kegiatan`
--

INSERT INTO `berita_kegiatan` (`id_berita`, `tanggal`, `gambar`, `judul`, `isi`, `kategori`) VALUES
(14, '2025-06-25', '1748507380_d0de43c62b645b41059b.webp', 'BMKG Perkuat Layanan Iklim Energi Terbarukan Lewat Seminar WETSA', '<div>Jakarta, 21 Mei 2025 – Badan Meteorologi, Klimatologi, dan Geofisika (BMKG) bersama Bureau of Meteorology (BoM) Australia menggelar Knowledge Seminar yang bertajuk <strong><em>“Weather for Energy Transition in Southeast Asia (WETSA)”.</em></strong> Selain memperkuat kerja sama yang telah terjalin sebelumnya, seminar ini diharapkan dapat menjadi sarana berbagi pengetahuan, sebagai bagian dari upaya pengembangan Produk Layanan Iklim di sektor Energi Terbarukan <em>(renewable energy)</em>.<br><br></div><div><br>Deputi Bidang Klimatologi, Ardhasena Sopaheluwakan, turut memberikan sambutan pada acara seminar tersebut, Ardhasena menyampaikan terdapat dua topik utama yang akan menjadi pembahasan pada seminar yang menjadi hal penting untuk dibahas.<br><br></div><div><br>“Seminar ini menyoroti dua hal penting, pertama, bagaimana menyampaikan informasi prediksi musim untuk mendukung pengambilan keputusan di berbagai sektor; kedua, yaitu terkait ancaman iklim terhadap sektor energi, termasuk kerjasama BMKG dan BoM Australia dalam pengembangan informasi energi terbarukan atau <em>(renewable energy)</em>” paparnya.<br><br></div><div><br>Seminar dimulai dengan pemberian materi oleh Dr. Clair Spillman sebagai <em>Team Leader – Seasonal and Marine Applications WP2 BoM </em>yang membahas seputar <strong><em>“Seasonal prediction to support end user decision-making”.</em></strong> Dr. Claire Spillman memaparkan pentingnya prakiraan iklim musiman <em>(subseasonal to seasonal)</em> untuk mendukung pengambilan keputusan di berbagai sektor, seperti energi, pertanian, dan perikanan.<br><br></div><div><br>Lebih lanjut Dr. Claire turut membahas terkait program <em>forewarned </em>yang menjadi contoh nyata penerapan informasi iklim “<em>Program Forewarned is Forearmed</em>” menjadi contoh nyata penerapan informasi iklim, dengan melibatkan petani dan pelaku industri dalam memahami dan merespons risiko iklim melalui pelatihan yang sesuai kebutuhan lokal.” tuturnya<br><br></div><div><br>Seminar dilanjutkan dengan pemaparan materi oleh Jessica Bhardwaj sebagai <em>Hazard &amp; Climate Risk Scientist WP3 BoM</em> yang mengangkat topik mengenai <strong><em>“Climate hazard and risk information for the energy sector”.</em></strong> Dalam pemaparannya, Jessica membahas mengenai proyek Energy Sector Climate Information (ESCI) yang bertujuan menyediakan data iklim dan cuaca ekstrem bagi sektor energi. Proyek ini mengidentifikasi risiko terhadap infrastruktur dan pasokan listrik akibat perubahan iklim, serta menyediakan proyeksi iklim resolusi tinggi melalui metode <em>downscaling</em>.<br><br></div><div><br>Melalui pemaparannya, Jessica menekankan bahwa perubahan iklim dapat berdampak besar terhadap infrastruktur energi—baik dari sisi pembangkitan, transmisi, maupun permintaan energi, dan karena itu sektor energi memerlukan informasi iklim yang spesifik, akurat, dan terperinci untuk melakukan perencanaan adaptif, “ESCI digunakan untuk merencanakan investasi dan menguji ketahanan sistem terhadap skenario ekstrem, seperti gelombang panas atau kebakaran besar, sehingga sektor energi dapat lebih tangguh dan adaptif di masa depan” jelasnya.<br><br></div><div><br>Dengan adanya Seminar <em>Weather for Energy Transition in Southeast Asia (WETSA), </em>BMKG diharapkan dapat menerapkan informasi proyeksi iklim dan bahaya yang dikembangkan dalam proyek-proyek seperti ESCI <em>(Energy Sector Climate Information)</em>. Dengan pendekatan ini, sektor energi dan lembaga seperti BMKG dapat memperkuat ketahanan terhadap kejadian berdampak besar yang jarang terjadi <em>(low-probability, high-impact events)</em>, dan mengembangkan skenario perencanaan yang lebih tangguh dalam menghadapi perubahan iklim yang terus berkembang.<br><br></div>', 'Pengumuman'),
(15, '2025-06-01', '1748507411_7f1184faa867575d724a.webp', 'Prakiraan Cuaca BMKG Hari ini Kamis, 29 Mei 2025: ', '<div>BADAN Meteorologi, Klimatologi, dan Geofisika (<a href=\"https://mediaindonesia.com/tag/bmkg\">BMKG</a>) merilis informasi <a href=\"https://mediaindonesia.com/tag/prakiraan-cuaca\">prakiraan cuaca</a> untuk hari ini Kamis, 29 Mei 2025.<br><br></div><div>Untuk 38 kota besar di Indonesia akan mengalami potensi cuaca cerah berawan, berawan, berawan tebal, hujan ringan, hujan sedang, dan hujan disertai petir di wilayah: <br><br><strong>Pulau Sumatera&nbsp;</strong></div><ul><li>Berawan: Palembang.</li><li>Berawan Tebal: Banda Aceh, Padang, Pekanbaru, Bengkulu, dan Jambi.</li><li>Hujan Ringan: Medan, Tanjung Pinang, Pangkal Pinang, dan Bandar Lampung.</li></ul><div><strong>Pulau Jawa&nbsp;</strong></div><ul><li>Berawan: Yogyakarta.</li><li>Berawan Tebal: Serang, Jakarta, Bandung, dan Surabaya.</li><li>Hujan Ringan: Semarang.</li></ul><div><strong>Pulau Bali dan Nusa Tenggara&nbsp;</strong></div><ul><li>Cerah Berawan: Denpasar.</li><li>Berawan Tebal: Mataram.</li><li>Hujan Ringan: Kupang.</li></ul>', 'Berita Kegiatan'),
(16, '2025-06-01', '1 bmkg fix.webp', 'Perubahan Iklim Bukan Lagi Isu Global, BMKG Tegaskan Dampaknya Nyata', '<div><strong>Jakarta, 30 April 2025</strong> – Plt. Kepala Badan Meteorologi, Klimatologi, dan Geofisika (BMKG), Dwikorita Karnawati, menegaskan bahwa perubahan iklim adalah kenyataan ilmiah yang harus dihadapi bersama. Hal ini ia sampaikan dalam Webinar Nasional bertajuk <em>“Perubahan Iklim dan Mitigasi Bencana Global dan Lokal”</em> yang diselenggarakan oleh Universitas Lampung pada Rabu (30/4).<br><br></div><div><br>Dalam paparannya, Dwikorita menjelaskan bahwa perubahan iklim bukan lagi ancaman masa depan, melainkan telah terjadi saat ini dan semakin nyata dirasakan di berbagai belahan dunia. “Perubahan iklim adalah perubahan signifikan pola cuaca global dan regional dalam jangka panjang. Saat ini, kita menyaksikan perubahan yang dulunya memakan waktu jutaan tahun, kini terjadi hanya dalam beberapa dekade akibat aktivitas manusia, terutama sejak Revolusi Industri,” ujarnya.<br><br></div><div><br>BMKG mencatat bahwa tahun 2024 menjadi tahun terpanas dalam sejarah pencatatan suhu global. Suhu rata-rata global tercatat telah melampaui ambang batas 1,5°C dibandingkan masa pra-industri (tahun 1850). Ambang batas ini adalah angka krusial yang ditetapkan dalam Kesepakatan Paris untuk menghindari dampak paling buruk dari perubahan iklim.<br><br></div><div><br>“Target pembatasan suhu global semestinya baru tercapai pada tahun 2100, namun kini sudah dilampaui jauh lebih awal. Ini menjadi alarm keras bagi seluruh dunia,” tegasnya.<br><br></div><div><br>Di Indonesia, anomali suhu rata-rata nasional mencapai +0,8°C dibandingkan periode normal 1991- 2020. Dampaknya bukan hanya suhu yang lebih panas, tetapi juga peningkatan intensitas dan frekuensi bencana hidrometeorologi seperti banjir, kekeringan, gelombang panas, dan kebakaran hutan.<br><br></div><div><br>Khusus di Provinsi Lampung, BMKG mencatat adanya tren peningkatan suhu rata-rata sebesar 0,27°C per dekade. Wilayah utara dan timur Lampung, seperti Kabupaten Mesuji, Tulang Bawang, dan sebagian Way Kanan, menjadi daerah dengan laju pemanasan tertinggi. Fenomena ini dikaitkan dengan perubahan tutupan lahan, alih fungsi kawasan hijau, dan efek <em>urban heat island</em> di wilayah perkotaan.<br><br></div><div><br>“Jika tidak ada intervensi, tren pemanasan ini akan terus berlanjut dan berkontribusi pada peningkatan risiko bencana di masa depan,” ungkapnya.<br><br></div><div><br>Berdasarkan proyeksi iklim hingga tahun 2050, suhu di Lampung diprediksi bisa meningkat hingga 1,3°C dalam skenario tanpa mitigasi (SSP-370). Namun, jika upaya pengendalian emisi karbon dilakukan secara maksimal, peningkatan suhu bisa ditekan hingga kisaran 0,6–0,9°C.<br><br></div><div><br>Dalam kesempatan tersebut, BMKG juga menekankan pentingnya kolaborasi lintas sektor, baik dari pemerintah, akademisi, dunia usaha, maupun masyarakat sipil, untuk menghadapi tantangan perubahan iklim.<br><br></div><div><br>“Mitigasi dan adaptasi harus dilakukan secara simultan. Pengendalian emisi karbon, reforestasi, pemanfaatan energi terbarukan, serta pembangunan berbasis tata ruang berkelanjutan menjadi kunci utama,” tambahnya.<br><br></div><div><br>Universitas Lampung sebagai tuan rumah webinar juga menyatakan komitmennya untuk turut berperan dalam pendidikan, penelitian, dan pengabdian masyarakat dalam bidang perubahan iklim. Perguruan tinggi memiliki peran strategis dalam menghasilkan inovasi dan membangun kesadaran publik terhadap isu lingkungan dan keberlanjutan.<br><br></div><div><br>Webinar yang dihadiri oleh ratusan peserta dari berbagai kalangan ini diakhiri dengan seruan untuk memperkuat aksi iklim secara kolektif. BMKG mendorong agar data dan informasi iklim yang telah tersedia digunakan sebagai dasar dalam perencanaan pembangunan, kebijakan publik, dan tindakan mitigasi risiko bencana di tingkat global maupun lokal.<br><br></div>', 'Berita Kegiatan'),
(17, '2025-06-25', '2 bmkg fix.webp', 'BMKG-Kementerian Keuangan Perkuat Sinergi untuk Ketahanan Iklim dan Bencana dalam Mendukung Asta Cita', '<div>Jakarta – Badan Meteorologi, Klimatologi, dan Geofisika (BMKG) melakukan audiensi dengan Wakil Menteri Keuangan Suahasil Nazara di Kantor Kementerian Keuangan, Jakarta, Rabu (28/5/2025). Pertemuan ini dipimpin langsung oleh Kepala BMKG Dwikorita Karnawati beserta jajaran dan membahas penguatan operasional di bidang Meteorologi, Klimatologi, dan Geofisika untuk mendukung ketahanan iklim dan kebencanaan nasional, sekaligus mempererat sinergi antar lembaga guna mendukung visi Asta Cita Kabinet Presiden Prabowo Subianto dan Wakil Presiden Gibran Rakabuming Raka.<br><br></div><div><br>Dalam paparannya, Kepala BMKG menekankan pentingnya modernisasi dan penguatan sistem operasional BMKG guna menjawab tantangan iklim ekstrem dan potensi bencana geofisika yang semakin meningkat.<br>“Penguatan sistem observasi, pemodelan prediktif, dan penyebaran informasi dini yang cepat dan akurat adalah kunci untuk melindungi masyarakat serta mendukung ketahanan ekonomi nasional,” ungkap Dwikorita. Beliau juga menyoroti perlunya investasi berkelanjutan dalam infrastruktur dan sumber daya manusia untuk memastikan layanan informasi iklim dan kebencanaan yang andal dan adaptif di tengah perubahan iklim global.<br><br></div><div><br>Menanggapi hal tersebut, Wakil Menteri Keuangan menyampaikan apresiasi terhadap peran strategis BMKG dalam mendukung ketahanan nasional. Ia menekankan pentingnya tetap menjaga efektivitas penguatan operasional meskipun dalam kondisi efisiensi saat ini.<br><br></div><div><br>“Kami memahami urgensi penguatan sistem BMKG dalam menghadapi dinamika iklim dan geofisika. Namun kita juga harus cermat dalam merancang langkah-langkah strategis yang tetap efisien secara anggaran. BMKG diharapkan dapat tetap menjalankan fungsi vitalnya secara optimal,” ujar Suahasil.<br><br></div><div><br>Audiensi ini juga menegaskan komitmen kedua lembaga untuk membangun sinergi dalam mendukung arah pembangunan nasional, termasuk memperkuat ketangguhan sektor keuangan terhadap risiko bencana serta meningkatkan integrasi data dan informasi iklim dalam perencanaan pembangunan.<br><br></div>', 'Pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_buku_tamu` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `waktu_kunjungan` time NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `kesan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `nama`, `email`, `instansi`, `kegiatan`, `tanggal_kunjungan`, `waktu_kunjungan`, `created_at`, `kesan`) VALUES
(1, 'Zauda Abel', '0928991278973', 'UIN MALANG', 'Kunjungan PKL', '0000-00-00', '00:00:00', '2025-06-03 12:06:05', ''),
(2, 'Al Humayroh', '06473673248', 'UIN MALANG', 'kunjungan', '0000-00-00', '00:00:00', '2025-06-03 12:27:21', ''),
(3, 'zauda abeliaa', '218749917247', 'Universitas Brawijaya', 'Kunjungan', '0000-00-00', '00:00:00', '2025-06-03 12:28:47', ''),
(4, 'Kiki Huda', '27482110347', 'Universitas Negeri Malang', 'Kunjungan ', '0000-00-00', '00:00:00', '2025-06-04 10:44:56', ''),
(5, 'Kumala Sari', '73878277', 'UIN MALANG', 'ashhaja', '0000-00-00', '00:00:00', '2025-06-04 16:21:20', ''),
(6, 'Julian Saputra', '2739719023', 'UMM', 'ashadsk', '0000-00-00', '00:00:00', '2025-06-04 16:23:51', ''),
(7, 'Adinda Fania', 'husnaa@gmail.com', 'Uin Malang', 'PKL', '2025-06-22', '14:16:00', '2025-06-22 07:16:15', 'Seru Oke'),
(8, 'Test', 'arifppga@gmail.com', 'Universitas Brawijaya', 'KKK', '2025-06-26', '18:23:00', '2025-06-22 07:18:31', 'ajhsjha'),
(9, 'Watanabe Haruto', 'haruto@gmail.com', 'YG', 'kunjungan', '2025-06-25', '09:42:00', '2025-06-25 00:43:06', 'baguss');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_hilal`
--

CREATE TABLE `gambar_hilal` (
  `id_gambar_hilal` int NOT NULL,
  `tahun_hijri` int NOT NULL,
  `bulan_hijri` int NOT NULL,
  `path_gambar` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `adalah_gambar_utama` tinyint(1) DEFAULT '0',
  `dibuat_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `diperbarui_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gambar_hilal`
--

INSERT INTO `gambar_hilal` (`id_gambar_hilal`, `tahun_hijri`, `bulan_hijri`, `path_gambar`, `keterangan`, `adalah_gambar_utama`, `dibuat_pada`, `diperbarui_pada`) VALUES
(1, 1441, 1, '1748057064_230789b561bfa0ea558c.jpg', ' KEGIATAN RUKYATUL HILAL AWAL BULAN MUHARRAM 1441 H  DI PUNCAK BENDUNGAN SUTAMI KARANGKATES  KABUPATEN MALANG PADA TANGGAL 31 AGUSTUS 2019', 1, '2025-05-24 03:24:24', '2025-05-24 03:28:18'),
(2, 1446, 6, '1748057258_59ec58d3bc6d2bcdb07c.png', 'PENGAMATAN HILAL AWAL BULAN JUMADIL AKHIR 1446 H DI KANTOR BUPATI MALANG - MALANG', 1, '2025-05-24 03:27:38', '2025-05-24 03:28:22'),
(3, 1441, 2, '1748057785_df265825a034e4edb95b.jpg', ' KEGIATAN RUKYATUL HILAL AWAL BULAN SAFFAR 1441 H  DI PUNCAK BENDUNGAN SUTAMI KARANGKATES  KABUPATEN MALANG PADA TANGGAL 29 SEPTEMBER 2019', 1, '2025-05-24 03:36:25', '2025-05-24 03:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `hiposenter`
--

CREATE TABLE `hiposenter` (
  `id_gempa` int NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` time NOT NULL,
  `Lintang` double DEFAULT NULL,
  `Bujur` double DEFAULT NULL,
  `Depth` int DEFAULT NULL,
  `Magnitudo` double DEFAULT NULL,
  `Keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Dirasakan` enum('Tidak Dirasakan','Dirasakan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hiposenter`
--

INSERT INTO `hiposenter` (`id_gempa`, `Tanggal`, `Jam`, `Lintang`, `Bujur`, `Depth`, `Magnitudo`, `Keterangan`, `Dirasakan`) VALUES
(1, '2025-06-01', '14:25:00', -8.125, 112.675, 10, 5.2, 'Guncangan terasa di wilayah kota', 'Dirasakan'),
(2, '2025-06-03', '03:25:06', 10.9, 129.4, 0, 1.3, 'Dirasakan', 'Tidak Dirasakan');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  `jenis_kegiatan` enum('PKL','Skripsi','Kunjungan') NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pembimbing` varchar(100) DEFAULT NULL,
  `stasiun_divisi` varchar(100) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id_pengajuan_surat` int NOT NULL,
  `nama_pengaju` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `keperluan` text,
  `status` enum('Diajukan','Disetujui','Ditolak','Pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pending',
  `file_surat` text,
  `tanggal_pengajuan` date DEFAULT (curdate()),
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id_pengajuan_surat`, `nama_pengaju`, `no_hp`, `jenis_surat`, `keperluan`, `status`, `file_surat`, `tanggal_pengajuan`, `updated_at`) VALUES
(1, 'Nani Nona', '0928991278973', 'Surat Permohonan', 'Ingin Mengajukan surat magang', 'Ditolak', '1748953479_TUGAS 4_220605110043_Zauda Salma Salsabila.pdf', '2025-06-03', '2025-06-04 14:12:42'),
(2, 'Zauda Salsabila', '09876656781', 'Surat Keterangan', 'Surat keterangan mengikuti pkl', 'Ditolak', '1748954051_Khotbah 23 mei.pdf', '2025-06-03', '2025-06-03 13:00:18'),
(3, 'Zulzian Tri ', '0932983018893', 'Surat Tugas', 'Pengajuan Tugas', 'Disetujui', '1749033839_cara modul 9.pdf', '2025-06-04', '2025-06-04 14:12:48'),
(4, 'Sandrina Gunawan', '8127379173', 'Surat Keterangan', 'Ingin mengajukan surat keterangan kerja', 'Ditolak', '1749047973_8.pdf', '2025-06-04', '2025-06-25 00:51:40'),
(5, 'Herry Navendra', '871872936871', 'Surat Keterangan', 'Tugas', 'Disetujui', '1749052298_AWS - Create IAM User.pdf', '2025-06-04', '2025-06-25 00:51:35'),
(6, 'Kino Sandrio', '27371978937', 'Surat Permohonan', 'PKL', 'Pending', '1749052323_Khotbah 23 mei.pdf', '2025-06-04', '2025-06-25 00:51:24'),
(7, 'Nabila Sarina', '029898138', 'Surat Keterangan', 'sbjbjab', 'Diajukan', '1749052348_Khutbah 09 Mei 2025 - ptr41.pdf', '2025-06-04', '2025-06-04 15:52:28'),
(8, 'Siarna Juka', '328738429', 'Surat Permohonan', 'Maaf', 'Disetujui', '1749054577_AWS - Create IAM User.pdf', '2025-06-04', '2025-06-04 17:03:23'),
(9, 'Watanabe Haruto', '09893781', 'Surat Permohonan Magang', 'Magang', 'Diajukan', '1750812362_5877-20458-1-PB.pdf', '2025-06-25', '2025-06-25 00:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `pengamatan_hilal`
--

CREATE TABLE `pengamatan_hilal` (
  `id_pengamatan_hilal` int NOT NULL,
  `tahun_hijri` int NOT NULL,
  `bulan_hijri` int NOT NULL,
  `nama_bulan` varchar(20) DEFAULT NULL COMMENT 'Contoh: Muharram, Safar',
  `tanggal_observasi` date NOT NULL,
  `waktu_observasi` time NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `latitude` varchar(20) DEFAULT NULL COMMENT 'Contoh: 8°09''48.6" LS',
  `longitude` varchar(20) DEFAULT NULL COMMENT 'Contoh: 112°26''46.2" BT',
  `ketinggian` decimal(10,2) DEFAULT NULL COMMENT 'Dalam meter',
  `status_visibilitas` enum('teramati','tidak teramati','tidak dilakukan') NOT NULL,
  `deskripsi` text COMMENT 'Keterangan tambahan',
  `kondisi_cuaca` text COMMENT 'Contoh: Berawan, suhu 23.9°C',
  `waktu_terbenam_matahari` time DEFAULT NULL,
  `waktu_terbenam_bulan` time DEFAULT NULL,
  `azimuth_matahari` varchar(20) DEFAULT NULL,
  `azimuth_bulan` varchar(20) DEFAULT NULL,
  `tinggi_bulan` varchar(20) DEFAULT NULL,
  `elongasi` varchar(20) DEFAULT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `isi_laporan` longtext COMMENT 'Konten blog yang dilihat user',
  `path_dokumen` varchar(255) DEFAULT NULL COMMENT 'File PDF/DOC laporan',
  `dipublikasikan` tinyint(1) DEFAULT '0' COMMENT 'Jika TRUE, tampilkan ke user',
  `dibuat_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `diperbarui_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengamatan_hilal`
--

INSERT INTO `pengamatan_hilal` (`id_pengamatan_hilal`, `tahun_hijri`, `bulan_hijri`, `nama_bulan`, `tanggal_observasi`, `waktu_observasi`, `lokasi`, `latitude`, `longitude`, `ketinggian`, `status_visibilitas`, `deskripsi`, `kondisi_cuaca`, `waktu_terbenam_matahari`, `waktu_terbenam_bulan`, `azimuth_matahari`, `azimuth_bulan`, `tinggi_bulan`, `elongasi`, `judul_laporan`, `isi_laporan`, `path_dokumen`, `dipublikasikan`, `dibuat_pada`, `diperbarui_pada`) VALUES
(1, 1441, 1, 'Muharram', '2019-08-31', '16:00:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6', '112°26\'46.2', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan', 'Berawan, suhu 23.9°C, kelembapan 75%, tekanan 980.1 milibars', '17:29:02', '18:28:14', '278°38\'02', '279°51\'03', '13°08\'03', '9°14.13\'', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN MUHARRAM 1441 H', NULL, '1. MUHARRAM 1441 H.doc', 1, '2025-05-16 05:43:58', '2025-05-21 11:32:15'),
(2, 1441, 2, 'Saffar', '2019-09-29', '16:00:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan', 'Berawan, suhu 24.8°C, kelembapan 79%, tekanan 979.6 milibars', '17:25:22', '18:05:00', '267°28\'40\"', '269°53\'23\"', '8°41\'23\"', '9°43.28\'', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SAFFAR 1441 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 29 September 2019 di Puncak Bendungan Sutami Karangkates Kabupaten Malang. Pengamatan dilakukan dari pukul 16.00 WIB hingga 19.30 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO. Hilal tidak teramati karena kondisi cuaca berawan.', '2. SAFFAR 1441 H.doc', 1, '2025-05-16 05:47:47', '2025-05-16 05:47:47'),
(3, 1441, 3, 'Rabiulawal', '2019-10-28', '16:00:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan', 'Berawan, suhu 26.7°C, kelembapan 72%, tekanan 978.2 milibars', '17:25:07', '18:40:47', '256°39\'13\"', '260°17\'44\"', '3°03\'34\"', '5°09\'45\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RABIULAWAL 1441 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 28 Oktober 2019 di Puncak Bendungan Sutami Karangkates Kabupaten Malang. Pengamatan dilakukan dari pukul 16.00 WIB hingga 19.30 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO. Hilal tidak teramati karena kondisi cuaca berawan.', '3. RABIULAWAL 1441 H.doc', 1, '2025-05-16 05:49:25', '2025-05-16 05:49:25'),
(4, 1441, 4, 'Rabiulakhir', '2019-11-27', '16:00:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan', 'Berawan, suhu 28.0°C, kelembapan 71%, tekanan 978.5 milibars', '17:34:00', '18:16:37', '248°32\'15\"', '250°22\'51\"', '8°48\'09\"', '9°42\'47\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RABIULAKHIR 1441 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 27 November 2019 di Puncak Bendungan Sutami Karangkates Kabupaten Malang. Pengamatan dilakukan dari pukul 16.00 WIB hingga 18.30 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan.', '4. RABIULAKHIR_1441_H.doc', 1, '2025-05-16 06:01:50', '2025-05-16 06:04:44'),
(5, 1441, 5, 'Jumadal Ula', '2019-12-26', '16:30:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan dan hujan', 'Berawan dan hujan, suhu 25.2°C, kelembapan 89%, tekanan 978.1 milibars', '17:48:00', '17:56:00', '246°15.02\'', '246°54.06\'', '1°20.39\'', '1°55.09\'', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN JUMADAL ULA 1441 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 26 Desember 2019 di Puncak Bendungan Sutami Karangkates Kabupaten Malang. Pengamatan dilakukan dari pukul 16.30 WIB hingga 18.00 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan dan hujan.', '5. JUMADAL_ULA_1441_H.doc', 1, '2025-05-16 06:02:21', '2025-05-16 06:04:49'),
(6, 1441, 6, 'Jumadit Tsaniyah', '2020-01-25', '16:30:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan tebal', 'Berawan tebal, suhu 29.4°C, kelembapan 69%, tekanan 980.0 milibars', '17:57:19', '18:23:52', '250°38\'91\"', '250°27\'32\"', '5°19\'17\"', '6°00\'11\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN JUMADIT TSANIYAH 1441 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 25 Januari 2020 di Puncak Bendungan Sutami Karangkates Kabupaten Malang. Pengamatan dilakukan dari pukul 16.30 WIB hingga 19.00 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan tebal.', '6. JUMADIT_TSANIYAH_1441_H.doc', 1, '2025-05-16 06:11:39', '2025-05-16 06:11:54'),
(7, 1441, 7, 'Rajab', '2020-02-24', '16:30:00', 'Puncak Bendungan Sutami Karangkates Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak teramati disebabkan berawan tebal dan hujan', 'Berawan tebal dan hujan, suhu 26.4°C, kelembapan 87%, tekanan 978.5 milibars', '17:52:27', '18:30:49', '260°12\'28\"', '260°33\'05\"', '8°23\'04\"', '19°20\'32\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RAJAB 1441 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 24 Februari 2020 di Puncak Bendungan Sutami Karangkates Kabupaten Malang. Pengamatan dilakukan dari pukul 16.30 WIB hingga 19.00 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan tebal dan hujan.', '7. RAJAB_1441_H.doc', 1, '2025-05-16 06:13:27', '2025-05-16 06:13:42'),
(8, 1441, 8, 'Sya’ban', '2020-03-25', '16:30:00', 'Puncak Bendungan Sutami Karangkates, Kabupaten Malang', '08°09\'48.6\" LS', '112°26\'46.2\" BT', '278.00', 'tidak teramati', 'Hilal tidak terlihat karena berawan tebal. Pengamatan dilakukan oleh tim Stasiun Geofisika Malang menggunakan teleskop Skywatcher NEQ6 PRO.', 'Berawan tebal, suhu 27.4°C, kelembapan 79%, tekanan 979.4 milibars', '17:38:15', '18:25:23', '271°59\'06\"', '273°46\'48\"', '10°37\'25\"', '11°30\'49\"', 'Laporan Kegiatan Rukyatul Hilal Awal Bulan Sya’ban 1441 H', 'Bahwa pada tanggal 25 Maret 2020 telah dilakukan kegiatan rukyatul hilal awal bulan Sya’ban 1441 H oleh Stasiun Geofisika Malang di Puncak Bendungan Sutami Karangkates. Kegiatan dimulai pukul 16.30 WIB hingga 19.00 WIB. Pengamatan dilakukan dengan menggunakan teleskop Skywatcher Synscan NEQ6 PRO dan detector William Optics tipe Megrez 90FD. Berdasarkan hasil pengamatan, hilal tidak terlihat dikarenakan kondisi cuaca berawan tebal. Seluruh petugas menyatakan tidak melihat hilal.', NULL, 1, '2025-05-16 06:19:39', '2025-05-16 06:19:51'),
(9, 1441, 9, 'Ramadhan', '2020-04-23', '16:30:00', 'Lantai 8 Kantor Kabupaten Malang', '8°08.4\' LS', '112°33.7\' BT', '367.00', 'tidak teramati', 'Hilal tidak teramati karena cuaca berawan. Posisi bulan saat matahari terbenam berada di arah selatan atas matahari dengan tinggi 3°36’24” dan elongasi 4°37’53”.', 'Berawan, suhu 27.2°C, kelembaban 78%, tekanan udara 979.2 hPa', '17:24:00', '17:41:51', '282°46\'08\"', '280°53\'12\"', '3°36\'24\"', '4°37\'53\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RAMADHAN 1441 H DI LANTAI 8 KANTOR KABUPATEN MALANG', 'Kegiatan rukyatul hilal dilaksanakan pada hari Kamis, 23 April 2020 (29 Sya’ban 1441 H) di Lantai 8 Kantor Kabupaten Malang. Waktu pengamatan dimulai pukul 16:30 WIB hingga 19:00 WIB. Lokasi berada di koordinat 8°08.4\' LS dan 112°33.7\' BT dengan ketinggian 367 meter di atas permukaan laut. Posisi matahari saat terbenam berada pada azimuth 282°46\'08\" dan bulan berada pada azimuth 280°53\'12\". Bulan terbenam pukul 17:41:51, sedangkan matahari terbenam pukul 17:24:00. Tinggi bulan saat matahari terbenam adalah 3°36\'24\" dan elongasi 4°37\'53\". Cuaca saat pengamatan berawan. Hilal tidak berhasil diamati. Alat yang digunakan antara lain: teleskop William Optics tipe megrez 90fd apochromat, mounting Skywatcher Synscan NEQ6 PRO, dan kamera prime focus 65 mm. Petugas: Ken Wirawan, MT; Muhtadi; Komang Gde PS, S.Tr. Ketua tim: Musripan, SE.', NULL, 1, '2025-05-16 06:23:52', '2025-05-16 06:23:59'),
(10, 1441, 10, 'Syawal', '2020-05-23', '16:00:00', 'Puncak Bendungan Sutami, Karangkates', '8°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati dikarenakan tertutup awan. Bulan berada di sebelah selatan atas matahari dengan tinggi 6°24’37” dan elongasi 7°11’45”.', 'Cerah - Berawan, suhu 28.0°C, kelembapan 80%, tekanan 979.4 mb', '17:18:11', '17:49:58', '290°48\'08\"', '291°54\'01\"', '6°24\'37\"', '7°11\'45\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SYAWAL 1441 H DI KABUPATEN MALANG DAN BENDUNGAN SUTAMI', 'Kegiatan rukyatul hilal untuk penentuan awal bulan Syawal 1441 H dilaksanakan pada Jumat–Sabtu, 22–23 Mei 2020, bertempat di lantai 8 Kantor Kabupaten Malang dan Puncak Bendungan Sutami. Pengamatan utama dilakukan pada 23 Mei 2020 di Puncak Bendungan Sutami dengan koordinat 8°09\'36.86\" LS dan 112°26\'48.77\" BT serta ketinggian 281 meter. Cuaca saat pengamatan cerah-berawan. Matahari terbenam pukul 17:18:11 WIB dan bulan terbenam pukul 17:49:58 WIB. Tinggi bulan saat matahari terbenam adalah 6°24\'37\", elongasi 7°11\'45\", dengan posisi bulan di sebelah selatan atas matahari. Petugas tidak berhasil mengamati hilal karena terhalang awan. Tim kemudian menyelesaikan pengamatan pada pukul 19:00 WIB dan kembali ke Kantor Geofisika Malang. Alat yang digunakan meliputi teleskop Skywatcher Synscan tipe NEQ6 PRO dan detector William Optics tipe Megrez 90fd Apochromat dengan pemasangan prime focus 65 mm. Ketua tim: Musripan, SE.', NULL, 1, '2025-05-16 06:25:48', '2025-05-16 06:25:58'),
(11, 1441, 11, 'Dzulko\'dah', '2020-06-21', '16:00:00', 'Puncak Bendungan Sutami, Karangkates', '8°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati karena tertutup awan. Bulan berada di sebelah utara atas matahari dengan tinggi 0°28\'96\" dan elongasi 1°00\'01\".', 'Berawan, suhu 28.0°C, kelembapan 80%, tekanan 977.4 mb', '17:21:00', '17:25:00', '293°21.66\'', '294°07.26\'', '0°28\'96\"', '1°00\'01\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN DZULKO\'DAH 1441 H DI PUNCAK BENDUNGAN SUTAMI', 'Pengamatan rukyatul hilal dilakukan pada 21 Juni 2020 mulai pukul 16.00 WIB hingga 18.00 WIB di Puncak Bendungan Sutami, Karangkates. Cuaca berawan dan hilal tidak terlihat karena tertutup awan. Koordinat lokasi 8°09\'36.86\" LS dan 112°26\'48.77\" BT dengan ketinggian 281 meter. Matahari terbenam pukul 17:21:00 dan bulan terbenam pukul 17:25:00. Tinggi bulan saat matahari terbenam 0°28\'96\" dan elongasi 1°00\'01\". Peralatan yang digunakan adalah teleskop Skywatcher Synscan NEQ6 PRO dengan detector William Optics Megrez 90fd Apochromat. Ketua tim rukyat hilal adalah Musripan, SE.', NULL, 1, '2025-05-16 06:27:04', '2025-05-16 06:27:13'),
(12, 1441, 12, 'Dzulhijah', '2020-07-21', '16:00:00', 'Gedung Kantor Bupati Malang', '8°08\'31.13\" LS', '112°34\'15.43\" BT', '331.00', 'tidak teramati', 'Hilal tidak teramati karena tertutup awan. Bulan di sebelah utara – atas matahari, tinggi bulan 7°32\'42\", elongasi 8°42\'43\".', 'Berawan, suhu 25.5°C, kelembapan 78%, tekanan 978.2 mb', '17:27:37', '18:05:06', '290°25\'26\"', '293°11\'17\"', '7°32\'42\"', '8°42\'43\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN DZULHIJAH 1441 H DI GEDUNG KANTOR BUPATI MALANG', 'Pengamatan rukyatul hilal dilakukan pada 21 Juli 2020 mulai pukul 16.00 WIB hingga 18.30 WIB di Gedung Kantor Bupati Malang. Cuaca berawan dan hilal tidak terlihat karena tertutup awan. Koordinat lokasi 8°08\'31.13\" LS dan 112°34\'15.43\" BT dengan ketinggian 331 meter. Matahari terbenam pukul 17:27:37 dan bulan terbenam pukul 18:05:06. Tinggi bulan saat matahari terbenam 7°32\'42\" dan elongasi 8°42\'43\". Peralatan yang digunakan adalah teleskop Skywatcher Synscan NEQ6 PRO dengan detector William Optics Megrez 90fd Apochromat. Ketua tim rukyat hilal adalah Musripan, SE.', NULL, 1, '2025-05-16 06:34:32', '2025-05-16 06:34:41'),
(13, 1442, 1, 'Muharram', '2020-08-19', '16:00:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan', 'Berawan, suhu 25.0°C, kelembapan 75%, tekanan 979.6 milibars', '17:29:53', '17:48:26', '282°33\'16\"', '286°07\'22\"', '3°37\'16\"', '5°32\'29\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN MUHARRAM 1442 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 19 Agustus 2020 di Puncak Bendungan Sutami Karangkates. Pengamatan dilakukan dari pukul 16.00 WIB hingga 18.00 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan.', '8. MUHARRAM_1442_H.doc', 1, '2025-05-16 06:38:33', '2025-05-16 06:38:49'),
(14, 1442, 2, 'Saffar', '2020-09-18', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan', 'Berawan, suhu 25.5°C, kelembapan 78%, tekanan 981.0 milibars', '17:26:39', '18:23:48', '271°30\'03\"', '272°35\'37\"', '12°50\'15\"', '13°38\'44\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SAFFAR 1442 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 18 September 2020 di Puncak Bendungan Sutami Karangkates. Pengamatan dilakukan dari pukul 16.30 WIB hingga 18.30 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan. Seluruh petugas operasional menyatakan tidak melihat hilal pada hari tersebut. Setelah selesai, peralatan dikemas dan tim kembali ke Kantor Geofisika Malang.', '10. SAFFAR_1442_H.doc', 1, '2025-05-16 06:45:07', '2025-05-16 06:45:15'),
(15, 1442, 3, 'Rabiulawal', '2020-10-17', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan', 'Berawan, suhu 26.0°C, kelembapan 76%, tekanan 977.7 milibars', '18:13:52', '18:49:35', '260°15\'46\"', '262°05\'47\"', '7°38\'59\"', '8°39\'23\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RABIULAWAL 1442 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 17 Oktober 2020 di Puncak Bendungan Sutami Karangkates. Pengamatan dilakukan dari pukul 16.30 WIB hingga 19.00 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan. Setelah selesai, peralatan dikemas dan tim kembali ke Kantor Geofisika Malang.', '11. RABIULAWAL_1442_H.doc', 1, '2025-05-16 06:45:53', '2025-05-16 06:46:09'),
(16, 1442, 4, 'Rabiulakhir', '2020-11-16', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan', 'Berawan, suhu 27.5°C, kelembapan 79%, tekanan 978.6 milibars', '17:29:52', '18:42:38', '250°46\'15\"', '249°58\'09\"', '15°23\'51\"', '16°11\'37\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RABIULAKHIR 1442 H', 'Kegiatan rukyatul hilal dilaksanakan pada tanggal 16 November 2020 di Puncak Bendungan Sutami Karangkates. Pengamatan dilakukan dari pukul 16.30 WIB hingga 19.00 WIB menggunakan teleskop Skywatcher Synscan tipe NEQ6 PRO dengan detektor William optics megrez 90fd apochromat. Hilal tidak teramati karena kondisi cuaca berawan. Setelah selesai, peralatan dikemas dan tim kembali ke Kantor Geofisika Malang.', '12. RABIULAKHIR_1442_H.doc', 1, '2025-05-16 06:47:22', '2025-05-16 06:48:43'),
(17, 1442, 5, 'Jumadil Ula', '2020-12-15', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan dan hujan', 'Berawan dan hujan, suhu 24.0°C, kelembapan 95%, tekanan 978.6 milibars', '17:43:22', '18:27:08', '246°19\'01\"', '246°11\'59\"', '08°45\'19\"', '16°11\'37\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN JUMADIL ULA 1442 H', 'Pengamatan hilal untuk penentuan awal bulan Jumadil Ula 1442 H dilaksanakan pada 15 Desember 2020 di Puncak Bendungan Sutami. Kegiatan dimulai pukul 16.30 WIB dengan peralatan teleskop Skywatcher Synscan NEQ6 PRO dan detektor William Optics Megrez 90FD. Kondisi cuaca berawan dan hujan menyebabkan hilal tidak dapat teramati. Setelah kegiatan selesai pada pukul 18.30 WIB, tim kembali ke kantor.', '13. JUMADIL ULA_1442_H.doc', 1, '2025-05-16 06:48:21', '2025-05-16 06:48:39'),
(18, 1441, 9, 'Ramadhan', '2020-04-23', '16:30:00', 'Lantai 8 Gedung Kantor Kabupaten Malang', '08°08.4\' LS', '112°33.7\' BT', '367.00', 'tidak teramati', 'Hilal tidak teramati disebabkan kondisi berawan.', 'Berawan, suhu 27.2°C, kelembapan 78%, tekanan 979.2 milibars', '17:24:00', '17:41:51', '282°46\'08\"', '280°53\'12\"', '03°36\'24\"', '04°37\'53\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RAMADHAN 1441 H', 'Pengamatan hilal untuk awal Ramadhan 1441 H dilaksanakan pada 23 April 2020 di lantai 8 Kantor Kabupaten Malang. Peralatan yang digunakan adalah teleskop Skywatcher NEQ6 PRO dan detektor William Optics Megrez 90FD. Cuaca berawan selama pelaksanaan membuat hilal tidak dapat diamati. Pengamatan dilakukan hingga pukul 19.00 WIB, lalu tim kembali ke kantor Geofisika Malang.', '01. RAMADHAN_1441_H.doc', 1, '2025-05-16 06:49:27', '2025-05-16 06:49:34'),
(19, 1441, 10, 'Syawal', '2020-05-23', '16:00:00', 'Lantai 8 Gedung Kantor Kabupaten Malang dan Puncak Bendungan Sutami', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan.', 'Cerah - berawan, suhu 28.0°C, kelembapan 80%, tekanan 979.4 milibars', '17:18:11', '17:49:58', '290°48\'08\"', '291°54\'01\"', '06°24\'37\"', '07°11\'45\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SYAWAL 1441 H', 'Pengamatan hilal awal Syawal 1441 H dilaksanakan pada 22 dan 23 Mei 2020 di dua lokasi: lantai 8 Kantor Kabupaten Malang dan Puncak Bendungan Sutami. Peralatan yang digunakan adalah teleskop Skywatcher NEQ6 PRO dan detektor William Optics Megrez 90FD. Meskipun cuaca sempat cerah, namun awan menutupi pandangan ke arah hilal, sehingga hilal tidak teramati. Kegiatan berlangsung hingga pukul 19.00 WIB dan tim kembali ke kantor Geofisika Malang.', '02. SYAWAL_1441_H.doc', 1, '2025-05-16 06:50:14', '2025-05-16 06:50:23'),
(20, 1442, 6, 'Jumadilakhir', '2021-01-13', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan dan hujan.', 'Berawan dan hujan, suhu 24.6°C, kelembapan 90%, tekanan 977.0 milibars', '17:55:29', '18:09:25', '248°14\'32\"', '246°18\'12\"', '02°28\'57\"', '03°36\'51\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN JUMADILAKHIR 1442 H', 'Pengamatan hilal awal Jumadilakhir 1442 H dilakukan pada 13 Januari 2021 di Puncak Bendungan Sutami, Karangkates. Petugas dari Stasiun Geofisika Malang menggunakan teleskop Skywatcher NEQ6 PRO dan detektor William Optics Megrez 90FD. Meskipun peralatan telah disiapkan dengan baik, hilal tidak berhasil diamati karena kondisi cuaca yang berawan dan hujan. Kegiatan berakhir pukul 18.30 WIB dan tim kembali ke kantor.', '03. JUMADILAKHIR_1442_H.doc', 1, '2025-05-16 06:53:04', '2025-05-16 06:53:12'),
(21, 1442, 7, 'Rajab', '2021-02-12', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati disebabkan tertutup awan.', 'Berawan, suhu 25.0°C, kelembapan 80%, tekanan 978.2 milibars', '17:55:48', '18:31:55', '256°11\'47\"', '255°37\'00\"', '07°39\'46\"', '08°24\'12\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RAJAB 1442 H', 'Pengamatan hilal awal Rajab 1442 H dilakukan pada 12 Februari 2021 di Puncak Bendungan Sutami, Karangkates. Petugas dari Stasiun Geofisika Malang menggunakan teleskop Skywatcher NEQ6 PRO dan detektor William Optics Megrez 90FD. Walau peralatan telah disiapkan dan cuaca sempat mendukung, hilal tidak berhasil diamati karena tertutup awan. Kegiatan selesai pukul 18.30 WIB.', '04. RAJAB_1442_H.doc', 1, '2025-05-16 06:54:06', '2025-05-16 06:54:13'),
(22, 1442, 8, 'Sya\'ban', '2021-03-14', '16:30:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Pengamatan tidak dilakukan karena hujan sepanjang waktu rukyat.', 'Berawan dan hujan, suhu 24.8°C, kelembapan 85%, tekanan 978.8 milibars', '17:44:05', '18:31:23', '267°30\'07\"', '269°34\'24\"', '10°39\'44\"', '11°35\'52\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SYA’BAN 1442 H', 'Pada hari Minggu, 14 Maret 2021, tim dari Stasiun Geofisika Malang ditugaskan untuk melakukan rukyatul hilal awal bulan Sya’ban 1442 H di Puncak Bendungan Sutami. Namun, karena hujan yang terus menerus sejak awal hingga akhir waktu pengamatan, kegiatan rukyat tidak dapat dilakukan dan hilal tidak teramati.', '05. SYABAN_1442_H.doc', 1, '2025-05-16 06:55:24', '2025-05-16 06:55:33'),
(23, 1442, 9, 'Ramadhan', '2021-04-12', '13:30:00', 'Gardu Pandang Teluk Putri Pantai Ngliyep, Desa Kedungsalam, Kecamatan Donomulyo, Kabupaten Malang', '08°23\'07.3\" LS', '112°25\'22.0\" BT', '47.00', 'tidak teramati', 'Hilal tidak terlihat karena ketinggian bulan di bawah 4° dan ufuk barat tertutup awan.', 'Berawan, suhu 24.8°C, kelembapan 85%, tekanan 978.8 milibars', '17:29:13', '17:46:18', '278°48\'58\"', '277°29\'49\"', '3°28\'17\"', '4°17\'54\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RAMADHAN 1442 H', 'Pada tanggal 12 April 2021, tim dari Stasiun Geofisika Malang melakukan rukyatul hilal awal Ramadhan 1442 H di Gardu Pandang Teluk Putri Pantai Ngliyep. Pengamatan dilakukan dengan peralatan teleskop Skywatcher NEQ6 PRO dan William Optics. Namun karena ufuk barat tertutup awan dan tinggi hilal masih di bawah 4°, hilal tidak teramati.', '06. RAMADHAN_1442_H.doc', 1, '2025-05-16 06:56:16', '2025-05-16 06:57:57'),
(24, 1442, 10, 'Syawal', '2021-05-12', '13:30:00', 'Gedung Pemkab Malang Lantai 8, Kabupaten Malang', '08°08\'17.10\" LS', '112°34\'21.99\" BT', '337.00', 'tidak teramati', 'Hilal tidak terlihat karena ufuk barat tertutup awan.', 'Berawan, suhu 28.0°C, kelembapan 69%, tekanan 1012.0 milibars', '17:18:49', '17:44:43', '288°18\'44\"', '290°02\'38\"', '5°12\'28\"', '6°07\'59\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SYAWAL 1442 H', 'Pada tanggal 12 Mei 2021, tim dari Stasiun Geofisika Malang melakukan rukyatul hilal awal Syawal 1442 H di Gedung Pemkab Malang Lantai 8. Pengamatan menggunakan teleskop Skywatcher NEQ6 PRO dan William Optics. Hilal tidak terlihat karena ufuk barat tertutup awan.', '07. SYAWAL_1442_H.doc', 1, '2025-05-16 06:58:48', '2025-05-16 06:58:58'),
(25, 1442, 11, 'Dzulkaidah', '2021-06-11', '15:00:00', 'Puncak Bendungan Sutami, Kabupaten Malang', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak terlihat karena ufuk barat tertutup awan tebal.', 'Cerah berawan, suhu 25.8°C, kelembapan 86%, tekanan 1011.0 milibars', '17:19:32', '18:02:19', '293°14\'07\"', '297°26\'15\"', '8°27\'38\"', '10°06\'02\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN DZULKAIDAH 1442 H', 'Pada tanggal 11 Juni 2021, tim dari Stasiun Geofisika Malang melakukan rukyatul hilal awal Dzulkaidah 1442 H di Puncak Bendungan Sutami. Pengamatan menggunakan teleskop Skywatcher NEQ6 PRO dan William Optics. Hilal tidak terlihat karena ufuk barat tertutup awan tebal.', '11. DZULKAIDAH_1442_H.doc', 1, '2025-05-16 07:02:09', '2025-05-16 07:02:19'),
(26, 1443, 6, 'Jumadil Akhir', '2022-01-03', '15:00:00', 'Badan Bendungan Karangkates, Malang', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati karena ufuk berawan dan terhalang pohon.', 'Berawan', '17:52:09', '18:35:14', '246°49\'16\"', '245°19\'05\"', '8°32\'31\"', '9°23\'38\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN JUMADIL AKHIR 1443 H', 'Pada tanggal 3 Januari 2022, Stasiun Geofisika Malang melaksanakan rukyatul hilal awal bulan Jumadil Akhir 1443 H di Badan Bendungan Karangkates. Hilal tidak teramati karena kondisi ufuk berawan dan terhalang pohon.', '03_JANUARI_2022_RUKYATUL_HILAL_JUMADIL_AKHIR.doc', 1, '2025-05-16 07:05:24', '2025-05-16 07:07:10'),
(27, 1443, 7, 'Rajab', '2022-02-01', '18:30:00', 'Pantai Ngliyep, Malang', '08°21\'00.00\" LS', '112°26\'00.00\" BT', '10.00', 'tidak teramati', 'Hilal tidak teramati karena ufuk berawan.', 'Cerah berawan', '17:57:39', '18:14:32', '252°38\'35\"', '249°28\'32\"', '3°9\'26\"', '4°55\'4\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN RAJAB 1443 H', 'Pada tanggal 1 Februari 2022, Stasiun Geofisika Malang melaksanakan rukyatul hilal awal bulan Rajab 1443 H di Pantai Ngliyep. Hilal tidak teramati karena kondisi ufuk berawan.', '01_FEBRUARI_2022_RUKYATUL_HILAL_RAJAB.doc', 1, '2025-05-16 07:06:59', '2025-05-16 07:07:17'),
(28, 1443, 2, 'Safar', '2021-09-07', '17:55:00', 'Puncak Bendungan Sutami Karangkates', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '281.00', 'tidak teramati', 'Hilal tidak teramati karena ufuk tertutup awan.', 'Berawan', '17:28:10', '17:50:21', '285°45\'48\"', '275°50\'21\"', '4°34\'17\"', '6°14\'27\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SAFAR 1443 H', 'Pada tanggal 7 September 2021, Stasiun Geofisika Malang melaksanakan rukyatul hilal awal bulan Safar 1443 H di Puncak Bendungan Sutami. Hilal tidak teramati karena ufuk tertutup awan.', '07_SEPTEMBER_2021_RUKYATUL_HILAL_SAFAR.doc', 1, '2025-05-16 07:08:14', '2025-05-16 07:08:25'),
(30, 1443, 8, 'Sya’ban', '2022-03-03', '18:30:00', 'Pantai Wisata Ngliyep, Donomulyo - Kab. Malang', '08°09\'36.86\" LS', '112°26\'48.77\" BT', '4.00', 'tidak teramati', 'Hilal tidak teramati karena kondisi ufuk barat berawan tebal.', 'Berawan tebal', '17:38:05', '18:48:08', '247°12\'23\"', '245°16\'18\"', '14°15\'11\"', '15°08\'48\"', 'LAPORAN KEGIATAN RUKYATUL HILAL AWAL BULAN SYA’BAN 1443 H', 'Pada tanggal 3 Maret 2022, Stasiun Geofisika Malang melaksanakan rukyatul hilal awal bulan Sya’ban 1443 H di Pantai Wisata Ngliyep, Donomulyo. Hilal tidak teramati dikarenakan kondisi ufuk barat berawan tebal.', '03_MARET_2022_RUKYATUL_HILAL_SYA_BAN.doc', 1, '2025-05-16 07:11:14', '2025-05-16 07:11:23'),
(31, 1446, 6, 'Jumadil Akhir', '2024-12-02', '17:15:00', 'KANTOR BUPATI MALANG', '', '8.14 LS, 112.57 BT', '410.00', 'tidak teramati', 'Pengamatan Hilal Awal Bulan Jumadil Akhir 1446 H tanggal 2 Desember 2024 tidak teramati karena ufuk barat tertutup awan.\r\n', 'Temperatur		: 25 °C\r\nKelembapan		: 92 %\r\nTekanan			: 977.8 mb\r\nKondisi di horizon Barat : Berawan Tebal \r\n', '17:25:00', '18:02:00', '', '', '', '', 'LAPORAN KEGIATAN  PENGAMATAN HILAL AWAL BULAN JUMADIL AKHIR 1446 H', NULL, NULL, 1, '2025-05-21 11:40:23', '2025-05-21 11:40:45'),
(32, 1444, 2, 'syawal', '2025-05-24', '17:24:00', 'xxx', '08676656', '5645667', '1.00', 'tidak dilakukan', 'yapppps', 'cerah', '19:27:00', '18:28:00', '9', '8', '2', '7', 'hloyaayaps', NULL, NULL, 0, '2025-05-24 07:24:51', '2025-05-24 07:24:51'),
(34, 132, 2, 'Safar', '2025-05-24', '15:30:00', 'xxx', '08676656', '5645667', '1.00', 'teramati', 'yaps', 'oke', '18:30:00', '15:32:00', '9', '8', '2', '7', 'hloyaayaps', NULL, NULL, 1, '2025-05-24 08:28:49', '2025-05-24 08:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `petir`
--

CREATE TABLE `petir` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_sambaran` time NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `jenis_petir` enum('cg-0','cg+1','ic2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petir`
--

INSERT INTO `petir` (`id`, `tanggal`, `waktu_sambaran`, `wilayah`, `latitude`, `longitude`, `jenis_petir`) VALUES
(0000000002, '2025-06-02', '10:30:00', 'Surabaya', '-7.257472', '112.752090', 'cg+1'),
(0000000003, '2025-06-03', '17:45:00', 'Sidoarjo', '-7.446535', '112.718137', 'ic2'),
(0000000004, '2025-06-04', '19:00:00', 'Blitar', '-8.095887', '112.168682', 'cg-0'),
(0000000005, '2025-06-05', '22:10:00', 'Batu', '-7.871440', '112.524390', 'cg+1'),
(0000000006, '2025-05-06', '08:25:00', 'Kediri', '-7.810658', '112.011398', 'cg-0'),
(0000000007, '2025-05-07', '11:50:00', 'Jember', '-8.172370', '113.699540', 'ic2'),
(0000000008, '2025-05-08', '16:40:00', 'Probolinggo', '-7.754080', '113.216721', 'cg+1'),
(0000000009, '2025-05-09', '14:35:00', 'Pasuruan', '-7.645716', '112.906020', 'cg-0'),
(0000000010, '2025-05-10', '20:20:00', 'Lumajang', '-8.129010', '113.224930', 'ic2'),
(0000000011, '2025-05-11', '07:10:00', 'Mojokerto', '-7.472522', '112.433878', 'cg-0'),
(0000000012, '2025-05-12', '18:45:00', 'Ngawi', '-7.407339', '111.451249', 'cg+1'),
(0000000013, '2025-05-13', '12:00:00', 'Magetan', '-7.652002', '111.329954', 'cg-0'),
(0000000014, '2025-05-14', '15:30:00', 'Tulungagung', '-8.065996', '111.902038', 'ic2'),
(0000000015, '2025-05-15', '09:25:00', 'Trenggalek', '-8.049176', '111.706911', 'cg+1'),
(0000000016, '2025-05-01', '13:15:00', 'Malang', '-7.966620', '112.632630', 'cg-0'),
(0000000017, '2025-05-02', '10:30:00', 'Surabaya', '-7.257472', '112.752090', 'cg+1'),
(0000000018, '2025-05-03', '17:45:00', 'Sidoarjo', '-7.446535', '112.718137', 'ic2'),
(0000000019, '2025-05-04', '19:00:00', 'Blitar', '-8.095887', '112.168682', 'cg-0'),
(0000000020, '2025-05-05', '22:10:00', 'Batu', '-7.871440', '112.524390', 'cg+1'),
(0000000021, '2025-05-06', '08:25:00', 'Kediri', '-7.810658', '112.011398', 'cg-0'),
(0000000022, '2025-05-07', '11:50:00', 'Jember', '-8.172370', '113.699540', 'ic2'),
(0000000023, '2025-05-08', '16:40:00', 'Probolinggo', '-7.754080', '113.216721', 'cg+1'),
(0000000024, '2025-05-09', '14:35:00', 'Pasuruan', '-7.645716', '112.906020', 'cg-0'),
(0000000025, '2025-05-10', '20:20:00', 'Lumajang', '-8.129010', '113.224930', 'ic2'),
(0000000026, '2025-05-11', '07:10:00', 'Mojokerto', '-7.472522', '112.433878', 'cg-0'),
(0000000027, '2025-05-12', '18:45:00', 'Ngawi', '-7.407339', '111.451249', 'cg+1'),
(0000000028, '2025-05-13', '12:00:00', 'Magetan', '-7.652002', '111.329954', 'cg-0'),
(0000000029, '2025-05-14', '15:30:00', 'Magetan', '-8.065996', '111.902038', 'ic2');

-- --------------------------------------------------------

--
-- Table structure for table `tekanan_udara`
--

CREATE TABLE `tekanan_udara` (
  `id_tekanan_udara` bigint UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `tekanan_udara` decimal(5,1) DEFAULT NULL,
  `kelembaban_07` decimal(4,1) DEFAULT NULL,
  `kelembaban_13` decimal(4,1) DEFAULT NULL,
  `kelembaban_18` decimal(4,1) DEFAULT NULL,
  `kecepatan_rata2` decimal(4,1) DEFAULT NULL,
  `arah_terbanyak` varchar(20) DEFAULT NULL,
  `kecepatan_terbesar` decimal(4,1) DEFAULT NULL,
  `arah_kecepatan_terbesar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tekanan_udara`
--

INSERT INTO `tekanan_udara` (`id_tekanan_udara`, `tgl`, `tekanan_udara`, `kelembaban_07`, `kelembaban_13`, `kelembaban_18`, `kecepatan_rata2`, `arah_terbanyak`, `kecepatan_terbesar`, `arah_kecepatan_terbesar`) VALUES
(2, '2025-05-01', '981.0', '92.0', '79.0', '84.0', '4.0', 'SE', '5.0', 'SE'),
(3, '2025-05-02', '981.2', '93.0', '72.0', '80.0', '4.5', 'SE', '4.0', 'SE'),
(4, '2025-05-03', '981.0', '93.0', '72.0', '80.0', '3.2', 'SE', '4.0', 'SE'),
(5, '2025-05-04', '980.9', '97.0', '80.0', '86.0', '4.7', 'S', '5.0', 'S'),
(6, '2025-05-05', '978.9', '97.0', '78.0', '86.0', '5.2', 'S', '5.0', 'S'),
(8, '2025-05-07', '980.6', '97.0', '94.0', '97.0', '6.5', 'E', '4.0', 'E'),
(9, '2025-05-08', '980.9', '96.0', '84.0', '89.0', '4.0', 'SE', '5.0', 'SE'),
(10, '2025-05-09', '980.9', '94.0', '76.0', '84.0', '3.2', 'SE', '4.0', 'SE'),
(11, '2025-05-10', '981.0', '92.0', '69.0', '76.0', '4.0', 'SE', '4.0', 'SE'),
(12, '2025-05-11', '980.9', '94.0', '56.0', '72.0', '4.7', 'E', '6.0', 'E'),
(13, '2025-05-12', '981.4', '94.0', '49.0', '78.0', '5.8', 'SE', '7.0', 'SE'),
(14, '2025-05-13', '980.9', '91.0', '46.0', '77.0', '6.1', 'SE', '6.0', 'SE'),
(15, '2025-05-14', '981.5', '87.0', '56.0', '79.0', '7.1', 'SE', '6.0', 'SE'),
(16, '2025-05-15', '981.1', '87.0', '56.0', '79.0', '6.1', 'SE', '6.0', 'SE'),
(17, '2025-05-16', '981.3', '95.0', '61.0', '81.0', '7.6', 'SE', '6.0', 'SE'),
(18, '2025-06-17', '981.1', '91.0', '58.0', '74.0', '8.3', 'SE', '5.0', 'SE'),
(19, '2025-06-18', '981.0', '95.0', '61.0', '81.0', '6.5', 'SE', '5.0', 'SE'),
(20, '2025-06-19', '980.9', '95.0', '60.0', '77.0', '7.2', 'SE', '5.0', 'SE'),
(21, '2025-06-20', '981.0', '93.0', '61.0', '71.0', '6.8', 'SE', '6.0', 'SE'),
(22, '2025-06-21', '981.3', '95.0', '60.0', '67.0', '6.1', 'SE', '6.0', 'SE'),
(24, '2025-06-23', '981.2', '96.0', '53.0', '79.0', '8.3', 'SE', '4.0', 'SE'),
(25, '2025-06-24', '981.6', '96.0', '56.0', '76.0', '6.5', 'SE', '6.0', 'SE'),
(26, '2025-06-25', '982.0', '93.0', '53.0', '70.0', '6.8', 'SE', '5.0', 'SE'),
(27, '2025-06-26', '982.3', '93.0', '56.0', '71.0', '6.8', 'SE', '5.0', 'SE'),
(28, '2025-06-27', '982.4', '94.0', '56.0', '77.0', '5.4', 'SE', '5.0', 'SE'),
(29, '2025-06-28', '982.3', '94.0', '57.0', '72.0', '6.5', 'SE', '6.0', 'SE'),
(30, '2025-06-29', '982.4', '93.0', '52.0', '70.0', '7.2', 'SE', '5.0', 'SE'),
(31, '2025-06-30', '982.3', '93.0', '55.0', '71.0', '6.1', 'SE', '5.0', 'SE'),
(32, '2025-07-01', '982.0', '92.0', '53.0', '85.0', '6.1', 'SE', '5.0', 'SE'),
(33, '2025-06-18', '78.0', '76.0', '89.0', '67.0', '89.0', 'se', '78.0', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `temperatur`
--

CREATE TABLE `temperatur` (
  `id_temperatur` bigint UNSIGNED NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `temperatur_07` decimal(4,1) DEFAULT NULL,
  `temperatur_13` decimal(4,1) DEFAULT NULL,
  `temperatur_18` decimal(4,1) DEFAULT NULL,
  `rata2` decimal(4,1) DEFAULT NULL,
  `max` decimal(4,1) DEFAULT NULL,
  `min` decimal(4,1) DEFAULT NULL,
  `curah_hujan_07` decimal(5,1) DEFAULT NULL,
  `penyinaran_matahari` int DEFAULT NULL,
  `peristiwa_khusus` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `temperatur`
--

INSERT INTO `temperatur` (`id_temperatur`, `bulan`, `tahun`, `tgl`, `temperatur_07`, `temperatur_13`, `temperatur_18`, `rata2`, `max`, `min`, `curah_hujan_07`, `penyinaran_matahari`, `peristiwa_khusus`) VALUES
(63, NULL, NULL, '2025-06-01', '23.6', '26.4', '25.6', '25.2', '26.8', '23.0', '0.0', 56, NULL),
(64, NULL, NULL, '2025-06-02', '23.2', '27.4', '25.0', '24.5', '26.2', '22.6', '0.0', 48, NULL),
(65, NULL, NULL, '2025-06-03', '22.2', '27.4', '25.0', '24.2', '29.8', '21.6', '0.0', 0, 'RA'),
(66, NULL, NULL, '2025-06-04', '22.8', '28.2', '25.4', '24.8', '29.6', '23.0', '0.0', 0, NULL),
(67, NULL, NULL, '2025-06-05', '22.2', '27.6', '24.8', '24.6', '28.0', '23.5', '0.0', 0, NULL),
(68, NULL, NULL, '2025-06-06', '22.8', '28.2', '25.6', '25.5', '30.6', '22.0', '0.0', 0, NULL),
(69, NULL, NULL, '2025-06-07', '23.1', '26.4', '24.8', '24.8', '27.5', '22.6', '19.0', 26, 'RA'),
(70, NULL, NULL, '2025-06-08', '23.6', '28.2', '25.6', '25.8', '30.0', '23.0', '1.0', 56, 'RA'),
(71, NULL, NULL, '2025-06-09', '23.6', '28.6', '25.4', '25.9', '31.0', '22.8', '1.0', 56, NULL),
(72, NULL, NULL, '2025-06-10', '23.4', '28.6', '25.4', '25.8', '30.2', '22.4', '0.0', 1, NULL),
(73, NULL, NULL, '2025-06-11', '24.2', '28.6', '25.4', '26.1', '29.2', '23.0', '2.0', 0, NULL),
(74, NULL, NULL, '2025-06-12', '23.6', '28.4', '25.6', '25.9', '29.5', '23.0', '1.0', 56, NULL),
(75, NULL, NULL, '2025-06-13', '23.6', '28.6', '25.6', '25.9', '29.8', '22.8', '0.0', 0, NULL),
(76, NULL, NULL, '2025-06-14', '23.0', '28.6', '25.0', '25.5', '29.2', '23.0', '0.0', 19, NULL),
(77, NULL, NULL, '2025-06-15', '23.8', '28.0', '25.2', '25.7', '29.4', '23.0', '0.0', 68, NULL),
(78, NULL, NULL, '2025-06-16', '23.2', '28.6', '25.2', '25.6', '29.3', '23.0', '0.0', 0, NULL),
(79, NULL, NULL, '2025-06-17', '20.8', '28.0', '24.4', '24.4', '28.6', '19.8', '0.0', 0, NULL),
(80, NULL, NULL, '2025-06-18', '21.0', '28.0', '24.4', '24.5', '29.3', '19.8', '0.0', 0, NULL),
(81, NULL, NULL, '2025-06-19', '21.6', '28.4', '24.8', '24.9', '29.8', '20.0', '0.0', 0, NULL),
(82, NULL, NULL, '2025-06-20', '21.8', '28.2', '25.0', '25.0', '29.3', '20.0', '0.0', 0, NULL),
(83, NULL, NULL, '2025-06-21', '22.0', '28.2', '25.2', '25.1', '30.2', '20.0', '0.0', 0, NULL),
(84, NULL, NULL, '2025-06-22', '21.2', '30.6', '26.4', '26.1', '32.0', '20.4', '80.0', 0, NULL),
(85, NULL, NULL, '2025-06-23', '20.8', '29.0', '25.0', '24.9', '30.0', '20.4', '0.0', 88, NULL),
(86, NULL, NULL, '2025-06-24', '22.4', '28.8', '23.8', '25.0', '29.3', '20.0', '0.0', 0, NULL),
(87, NULL, NULL, '2025-06-25', '22.0', '28.0', '23.8', '24.6', '29.0', '20.2', '0.0', 0, NULL),
(88, NULL, NULL, '2025-06-26', '22.6', '30.2', '23.4', '25.4', '31.2', '19.6', '0.0', 0, NULL),
(89, NULL, NULL, '2025-06-27', '22.4', '30.8', '23.6', '25.6', '32.0', '19.6', '0.0', 0, NULL),
(90, NULL, NULL, '2025-06-28', '21.8', '30.2', '23.6', '25.2', '31.4', '19.8', '0.0', 0, NULL),
(91, NULL, NULL, '2025-06-29', '21.8', '30.4', '23.8', '25.3', '31.5', '19.4', '0.0', 0, NULL),
(92, NULL, NULL, '2025-06-30', '21.0', '28.8', '23.6', '24.5', '29.6', '18.6', '0.0', 0, NULL),
(93, NULL, NULL, '2025-07-01', '20.8', '29.0', '23.2', '24.3', '29.2', '20.2', '0.0', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terbit_tenggelam`
--

CREATE TABLE `terbit_tenggelam` (
  `id_terbit_tenggelam` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_terbit` time NOT NULL,
  `waktu_tenggelam` time NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `terbit_tenggelam`
--

INSERT INTO `terbit_tenggelam` (`id_terbit_tenggelam`, `tanggal`, `waktu_terbit`, `waktu_tenggelam`, `kecamatan`) VALUES
(73, '2025-03-08', '05:34:00', '17:46:00', 'Kepanjen'),
(74, '2025-03-08', '05:36:00', '17:48:00', 'Blitar'),
(75, '2025-03-08', '05:37:00', '17:49:00', 'Malang'),
(76, '2025-03-08', '05:32:00', '17:44:00', 'Jember'),
(77, '2025-03-08', '05:32:00', '17:44:00', 'Lumajang'),
(78, '2025-03-08', '05:27:00', '17:41:00', 'Banyuwangi'),
(80, '2025-05-29', '06:01:00', '06:02:00', 'Malang'),
(81, '2025-05-28', '18:00:00', '05:04:00', 'Lumajang'),
(83, '2025-06-02', '05:28:00', '17:45:00', 'Malang'),
(84, '2025-06-02', '05:29:00', '17:44:00', 'Batu'),
(85, '2025-06-02', '05:30:00', '17:46:00', 'Kepanjen'),
(86, '2025-06-02', '05:31:00', '17:47:00', 'Blitar'),
(87, '2025-06-02', '05:30:00', '17:46:00', 'Tulungagung'),
(88, '2025-06-02', '05:29:00', '17:45:00', 'Jember'),
(89, '2025-06-02', '05:28:00', '17:43:00', 'Lumajang'),
(90, '2025-06-02', '05:27:00', '17:42:00', 'Banyuwangi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `berita_kegiatan`
--
ALTER TABLE `berita_kegiatan`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`) USING BTREE;

--
-- Indexes for table `gambar_hilal`
--
ALTER TABLE `gambar_hilal`
  ADD PRIMARY KEY (`id_gambar_hilal`) USING BTREE;

--
-- Indexes for table `hiposenter`
--
ALTER TABLE `hiposenter`
  ADD PRIMARY KEY (`id_gempa`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`) USING BTREE;

--
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id_pengajuan_surat`) USING BTREE;

--
-- Indexes for table `pengamatan_hilal`
--
ALTER TABLE `pengamatan_hilal`
  ADD PRIMARY KEY (`id_pengamatan_hilal`) USING BTREE;

--
-- Indexes for table `petir`
--
ALTER TABLE `petir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tekanan_udara`
--
ALTER TABLE `tekanan_udara`
  ADD PRIMARY KEY (`id_tekanan_udara`) USING BTREE,
  ADD UNIQUE KEY `id` (`id_tekanan_udara`) USING BTREE;

--
-- Indexes for table `temperatur`
--
ALTER TABLE `temperatur`
  ADD PRIMARY KEY (`id_temperatur`) USING BTREE,
  ADD UNIQUE KEY `id` (`id_temperatur`) USING BTREE;

--
-- Indexes for table `terbit_tenggelam`
--
ALTER TABLE `terbit_tenggelam`
  ADD PRIMARY KEY (`id_terbit_tenggelam`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita_kegiatan`
--
ALTER TABLE `berita_kegiatan`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hiposenter`
--
ALTER TABLE `hiposenter`
  MODIFY `id_gempa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id_pengajuan_surat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengamatan_hilal`
--
ALTER TABLE `pengamatan_hilal`
  MODIFY `id_pengamatan_hilal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `petir`
--
ALTER TABLE `petir`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tekanan_udara`
--
ALTER TABLE `tekanan_udara`
  MODIFY `id_tekanan_udara` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `temperatur`
--
ALTER TABLE `temperatur`
  MODIFY `id_temperatur` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `terbit_tenggelam`
--
ALTER TABLE `terbit_tenggelam`
  MODIFY `id_terbit_tenggelam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
