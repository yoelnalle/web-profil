-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 06:19 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bptd`
--
CREATE DATABASE IF NOT EXISTS `bptd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bptd`;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(2) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(255) NOT NULL,
  `foto_album` varchar(255) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `foto_album`) VALUES
(1, 'Pelabuhan Bolok', 'bolok3.jpg'),
(4, 'Pelabuhan Waingapu', 'wgp.jpg'),
(5, 'Pelabuhan Ende', 'bolok1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_art` int(3) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `slug` text,
  `artikel` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_publikasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id_art`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_art`, `judul`, `slug`, `artikel`, `foto`, `id_kategori`, `tag`, `tanggal`, `tgl_publikasi`, `status`) VALUES
(1, 'Kunjungan Bapak Walikota Kupang ke BPTD Wil. XIII Prov. NTT', 'Kunjungan-Bapak-Walikota-Kupang-ke-BPTD-Wil.-XIII-Prov.-NTT', '', 'WhatsApp_Image_2019-11-14_at_21_09_27.jpeg', 1, '#kemenhub151  #ditjenhubdat  #bptdxiiintt', '2019-11-14', '2020-01-13 16:00:00', 1),
(2, 'Peresmian UPPKB Nunbaun Sabu ', 'Peresmian-UPPKB-Nunbaun-Sabu-', '<p>Peresmian UPPKB Nunbaun Sabu dan Pernyataan Pembangunan Terminal Barang Internasional Motaain, Motamasin dan Wini.</p>\r\n', '49038fe6-f0c9-4a79-b878-e75464b4d889.jpg', 1, '#kemenhub151 #ditjen_hubdat #bptdxiiintt', '2019-11-15', NULL, 1),
(3, 'Gerakan Nasional Aksi Bersih-Bersih Perlengkapan Lalu Lintas (SIPANTAS) Jalan 2019', 'Gerakan-Nasional-Aksi-Bersih-Bersih-Perlengkapan-Lalu-Lintas-Jalan-2019', '<p>Gerakan Nasional Aksi Bersih-Bersih Perlengkapan Lalu Lintas (SIPANTAS) Jalan 2019.&nbsp;<br />\r\nKegiatan ini dilaksanakan untuk mengembalikan fungsi perlengkapan jalan yang merupakan bagian dari fasilitas keselamatan yang harus dipelihara dan dijaga bersama guna meningkatkan keselamatan lalu lintas jalan.</p>\r\n', '7426faab-42a2-4804-b333-bb9190aac4c4.jpg', 3, '#kemenhub151 #ditjenhubdat  #bptdxiiintt  #sipantas  #sipantasjalan2019', '2019-11-13', '2020-01-12 16:00:00', 1),
(4, 'Kepala BPTD Wil. XIII Prov. NTT beserta seluruh pegawai menggunakan pakaian daerah NTT.', 'Kepala-BPTD-Wil.-XIII-Prov.-NTT', '', 'LRM_EXPORT_65239552669851_20191114_141322510.jpeg', 3, '#PenghubungIndonesia #Perhubungan1Indonesia #HarHubNas2019', '2019-11-15', '2019-11-14 16:00:00', 0),
(5, 'Apel Hari Perhubungan Nasional 2019', 'Apel-Hari-Perhubungan-Nasional-2019', '<p>Apel Hari Perhubungan Nasional 2019<br />\r\n&quot;Merajut Nusantara Membangun Bangsa, Bakti Nyata Insan Perhubungan untuk Indonesia Unggul Indonesia Maju&quot;</p>\r\n', 'LRM_EXPORT_65251263300628_20191114_141334221.jpeg', 1, '@kemenhub151  #PenghubungIndonesia', '2019-11-15', '2020-01-12 16:00:00', 1),
(6, 'STOP PUNGLI !!!', 'STOP-PUNGLI', '', 'f7669e1e-a267-4b24-95a0-e8d9425c5a7d.jpg', 5, '#kemenhub151 #dirjenhubdat #bptdxiiintt', '2019-11-15', '2019-11-14 16:00:00', 1),
(7, 'informasi publik', 'informasi-publik', '', '8bfc1495-c436-497f-881e-c20751e1d897.jpg', 5, 'ahhhh', '2019-11-15', '2019-11-14 16:00:00', 1),
(8, 'Pembukaan Diklat Pemberdayaan Masyarakat', 'Pembukaan-Diklat-Pemberdayaan-Masyarakat', '<p>Pembukaan Diklat Pemberdayaan Masyarakat: Diklat Kecakapan Awak Kapal Sungai dan Danau serta Diklat Pengelasan Dasar yang dilaksanakan oleh Politeknik Trasnportasi Sungai Danau dan Penyeberangan Palembang di Hotel Amaris Kupang.</p>\r\n', '6f1bc1c2-c06a-48dc-8db9-34d11c46f1f9.jpg', 2, '#kemenhub151 #ditjenhubdat #bptdxiiintt', '2019-11-15', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(2) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_album` int(2) NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`, `deskripsi`, `id_album`) VALUES
(2, 'bolok.jpg', 'pelabuhan bolok', 1),
(3, 'bolok2.jpg', '', 1),
(4, '4187241.jpg', 'test', 2),
(5, '557030.jpg', 'test2', 2),
(6, 'download.jpg', '', 4),
(7, 'wgp1.jpg', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Berita'),
(2, 'Artikel'),
(3, 'Kegiatan'),
(4, 'Uncategorised'),
(5, 'informasi publik');

-- --------------------------------------------------------

--
-- Table structure for table `kat_menu`
--

CREATE TABLE IF NOT EXISTS `kat_menu` (
  `id_submenu` int(2) NOT NULL AUTO_INCREMENT,
  `id_menu` int(2) NOT NULL,
  `submenu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_submenu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kat_menu`
--

INSERT INTO `kat_menu` (`id_submenu`, `id_menu`, `submenu`) VALUES
(1, 1, 'profil BPTD'),
(2, 1, 'struktur organisasi'),
(3, 1, 'peta administrasi'),
(4, 1, 'perlengkapan jalan'),
(5, 2, 'satpel bolok'),
(6, 2, 'labuan bajo'),
(7, 2, 'satpel alor'),
(9, 3, 'profil uppkb');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(2) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'profil bptd'),
(2, 'satpel'),
(3, 'profil uppkb');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(2) NOT NULL AUTO_INCREMENT,
  `menu_id` int(2) NOT NULL,
  `submenu_id` int(2) NOT NULL,
  `judul` text,
  `deskripsi` text,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `menu_id`, `submenu_id`, `judul`, `deskripsi`, `foto`) VALUES
(2, 1, 3, 'PETA ADMINISTRASI', '', 'administrasi-ntt-a1-1.jpg'),
(3, 3, 9, 'SATPEL UPPKB Nun Baun Sabu', '<p><strong>Sejarah Singkat Satpel UPPKB Nun Baun Sabu</strong></p>\r\n\r\n<p>Satuan Pelayanan Unit Penimbangan Kendaraan Bermotor Nun Baun Sabu (Satpel UPPKB NBS) sebelumnya bernama Jembatan Timbang Nun Baun Sabu yang di kelola dan dioperasikan oleh Kanwil XIII Departemen Perhubungan di Provinsi NTT sejak Tahun 1973 sampai Tahun 2000 atau sebelum pelaksanaan otonomi daerah. Setelah diterbitkannya Undang&ndash;Undang Otonomi Daerah dan Perda Gubernur Provinsi NTT pada Tahun 2000, maka pengelolaan dan pengoperasian Jembatan Timbang Nun Baun Sabu diserahkan sepenuhnya untuk dikelolah oleh Dinas Perhubungan Provinsi Nusa Tenggara Timur, pengelolaan dan pengoperasian Jembatan Timbang Nun Baun Sabu di bawah Dinas Perhubungan dilaksanakan oleh Unit Pelaksana Teknis Perijinan dan Pengawasan Lalu Lintas Angkutan Jalan Wilayah Kabupaten Kupang, Kota Kupang, Rote Ndao, dan TTS.Kemudian setelah beberapa kali mengalami perubahan, maka&nbsp; sesuai amanat Undang - Undang Nomor 23 Tahun 2014 tentang&nbsp; Pemerintahan Daerah, dan Surat Edaran Menteri Dalam Negeri Nomor 120/5935/SJ Tanggal 16 Oktober 2015 tentang Percepatan Pelaksanaan Pengalihan Urusan Berdasarkan Undang - Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah, maka&nbsp; dilakukan penyerahan pelimpahan kewenangan Personel Pendanaan Sarana dan Prasarana serta Dokumen (P3D) Jembatan&nbsp; Timbang Dari Pemerintah Daerah kepada Pemerintah Pusat dalam&nbsp; hal ini Kementerian Perhubungan republik Indonesia, dan melalui Surat Keputusan Menteri Perhubungan PM. 154 Tahun 2016 tentang Organisasi dan tata kerja Balai Pengelola Transportasi Darat sebagaimana terakhir diubah dengan PM No. 20 tahun 2018, pegoperasian Jembatan Timbang dilaksanakan oleh Unit Penimbangan Kendaraan Bermotor dibawah Balai Pengelola Transportasi Darat, sehingga secara resmi Jembatan Timbang Nun Baun Sabu berubah Nama menjadi Satuan Pelayanan Unit Penimbangan Kendaraan Bermotor Nun Baun Sabu yang merupakan unit teknis dari Balai Pengelola Transportasi darat Wilaya XIII Provinsi Nusa Tenggara Timur.</p>\r\n\r\n<p><strong>HISTORY OF THE COMPANY</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>1973</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Bernama Jembatan Timbang Nun Baun Sabu yang di kelolah dan dioperasikan oleh Kanwil XIII Departemen Perhubungan di Provinsi NTT</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>2000 - 2016</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Sesuai Undang-Undang Otonomi, dikelolah dan dioperasikan oleh Dinas Perhubungan Provinsi Nusa Tenggara Timur dengan tetap memakai nama Jembatan Timbang Nun Baun Sabu.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>2017</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Berganti nama&nbsp; menjadi Satuan Pelayanan Unit Pelaksana Penimbangan Kendaraan Bermotor Nun Baun Sabu, yang dikelolah oleh Balai Pengelola Transportasi Darat Wilayah XIII Provinsi Nusa Tenggara Timur.</p>\r\n', 'UPPKB_NUNBAUN_SABU.png'),
(4, 1, 4, 'PERLENGKAPAN JALAN', '', 'Slide8.PNG'),
(5, 1, 4, 'PERLENGKAPAN JALAN', '', 'Slide9.PNG'),
(6, 1, 1, 'TUGAS BALAI PENGELOLA TRANSPORTASI DARAT WILAYAH XIII PROV. NTT', '<p>Melaksanakan pengelolaan lalu lintas dan angkutan jalan, sungai, danau dan penyeberangan, serta penyelenggaraan pelabuhan penyeberangan pada pelabuhan yang diusahakan secara komersial dan pelabuhan yang belum diusahakan secara komersial.</p>\r\n\r\n<p>FUNGSI BPTD</p>\r\n\r\n<ul>\r\n	<li>penyusunan rencana, program, dan anggaran;</li>\r\n	<li>pelaksanaan pembangunan, pemeliharaan, peningkatan, penyelenggaraan, dan pengawasan terminal penumpang Tipe A, Terminal Barang, Unit Pelaksana Penimbangan Kendaraan Bermotor (UPPKB), pelaksanaan kalibrasi peralatan pengujian berkala kendaraan bermotor, pelaksanaan pemeriksaan fisik rancang bangun sarana angkutan jalan serta pengawasan teknis sarana lalu lintas dan angkutan jalan di jalan nasional dan pengujian berkala kendaraan bermotor dan industri karoseri;</li>\r\n	<li>pelaksanaan manajemen dan rekayasa lalu lintas, pengawasan angkutan jalan antar kota antar provinsi, angkutan orang tidak dalam trayek, angkutan barang, penyidikan dan pengusulan sanksi administrasi terhadap pelanggaran peraturan perundang-undangan di bidang lalu lintas dan angkutan jalan, peningkatan kinerja dan keselamatan lalu lintas dan angkutan jalan, serta pengawasan tarif angkutan jalan;</li>\r\n	<li>pelaksanaan pembangunan, pemeliharaan, peningkatan, penyelenggaraan, dan pengawasan pelabuhan sungai, danau dan penyeberangan yang diusahakan secara komersial dan pelabuhan yang belum diusahakan secara komersial, serta pengaturan, pengendalian dan pengawasan angkutan sungai, danau dan penyeberangan yang diusahakan secara komersial dan pelabuhan yang belum diusahakan secara komersial, penjaminan keamanan dan ketertiban, penyidikan dan pengusulan sanksi adminitratif terhadap pelanggaran peraturan perundang-undangan di bidang lalu lintas dan angkutan sungai, danau, dan penyeberangan yang diusahakan secara komersial dan pelabuhan yang belum diusahakan secara komersial, peningkatan kinerja dan keselamatan lalu lintas dan angkutan, pelayanan jasa kepelabuhanan serta pengusulan dan pemantauan tarif dan penjadwalan angkutan sungai, danau, dan penyeberangan yang diusahakan secara komersial dan pelabuhan yang belum diusahakan secara komersial;</li>\r\n	<li>pelaksanaan urusan tata usaha, rumah tangga, kepegawaian, keuangan, hukum, dan hubungan masyarakat; dan</li>\r\n	<li>pelaksanaan evaluasi dan pelaporan<br />\r\n	<br />\r\n	&nbsp;</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n', 'LOGO-WEB-1.png'),
(7, 2, 5, 'SATPEL BOLOK', '<p>Satuan Pelayanan Unit Penimbangan Kendaraan&nbsp; Bermotor Nun Baun Sabu (Satpel UPPKB NBS)&nbsp; sebelumnya bernama Jembatan Timbang Nun Baun&nbsp; Sabu yang di kelola dan dioperasikan oleh Kanwil XIII&nbsp; Departemen Perhubungan di Provinsi NTT sejak Tahun&nbsp; 1973 sampai Tahun 2000 atau sebelum pelaksanaan&nbsp; otonomi daerah. Setelah diterbitkannya Undang &ndash;&nbsp; Undang Otonomi Daerah dan P<img alt="" src="https://www.instagram.com/p/B4B7yIXHzYp/?utm_source=ig_web_copy_link" />erda Gubernur Provinsi&nbsp; NTT pada Tahun 2000, maka pengelolaan dan&nbsp; pengoperasian Jembatan Timbang Nun Baun Sabu&nbsp; diserahkan sepenuhnya untuk dikelolah oleh Dinas&nbsp; Perhubungan Provinsi Nusa Tenggara Timur,&nbsp; pengelolaan dan pengoperasian Jembatan Timbang Nun&nbsp; Baun Sabu di bawah Dinas Perhubungan dilaksanakan&nbsp; oleh Unit Pelaksana Teknis Perijinan dan Pengawasan&nbsp; Lalu Lintas Angkutan Jalan Wilayah Kabupaten&nbsp; Kupang, Kota Kupang, Rote Ndao, dan TTS.</p>\r\n\r\n<p>Kemudian setelah beberapa kali mengalami perubahan, maka&nbsp; sesuai amanat Undang - Undang Nomor 23 Tahun 2014 tentang&nbsp; Pemerintahan Daerah, dan Surat Edaran Menteri Dalam Negeri&nbsp; Nomor : 120/5935/SJ Tanggal 16 Oktober 2015 tentang Percepatan&nbsp; Pelaksanaan Pengalihan Urusan Berdasarkan Undang - Undang&nbsp; Nomor 23 Tahun 2014 tentang Pemerintahan Daerah, maka&nbsp; dilakukan penyerahan pelimpahan kewenangan Personel,&nbsp; Pendanaan, Sarana dan Prasarana serta Dokumen (P3D) Jembatan&nbsp; Timbang Dari Pemerintah Daerah kepada Pemerintah Pusat dalam&nbsp; hal ini Kementerian Perhubungan republik Indonesia, dan melalui&nbsp; Surat Keputusan Menteri Perhubungan PM. 154 Tahun 2016&nbsp; tentang Organisasi dan tata kerja Balai Pengelola Transportasi&nbsp; Darat sebagaimana terakhir diubah dengan PM No. 20 tahun 2018,&nbsp; pegoperasian Jembatan Timbang dilaksanakan oleh Unit&nbsp; Penimbangan Kendaraan Bermotor dibawah Balai Pengelola&nbsp; Transportasi Darat, sehingga secara resmi Jembatan Tiimbang Nun&nbsp; Baun Sabu berubah Nama menjadi Satuan Pelayanan Unit&nbsp; Penimbangan Kendaraan Bermotor Nun Baun Sabu yang&nbsp; merupakan unit teknis dari Balai Pengelola Transportasi darat&nbsp; Wilaya XIII Provinsi Nusa Tenggara Timur.</p>\r\n', 'Slide22.PNG'),
(8, 2, 7, 'satpel alor', '', 'Slide221.PNG'),
(9, 2, 6, 'SATPEL LABUAN BAJO', '', 'Slide222.PNG'),
(11, 1, 2, 'STRUKTUR ORGANISASI BPTD WILAYAH XIII PROVINSI NTT', '', 'WhatsApp_Image_2019-11-04_at_20_52_56.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(5, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vidio`
--

CREATE TABLE IF NOT EXISTS `vidio` (
  `id_vidio` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id_vidio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vidio`
--

INSERT INTO `vidio` (`id_vidio`, `judul`, `link`) VALUES
(1, 'Profil Satpel Kalabahi', 'https://www.youtube.com/embed/8PWFkIG6g-U');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
