-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2015 at 07:55 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ojt`
--

-- --------------------------------------------------------

--
-- Table structure for table `beranda`
--

CREATE TABLE IF NOT EXISTS `beranda` (
  `idberanda` int(10) NOT NULL AUTO_INCREMENT,
  `iduser` int(10) NOT NULL,
  `judulpenghargaan` text NOT NULL,
  `penghargaan` text NOT NULL,
  `model` text NOT NULL,
  `namalegalitas` text NOT NULL,
  `nolegalitas` text NOT NULL,
  `legalitas` text NOT NULL,
  PRIMARY KEY (`idberanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `beranda`
--

INSERT INTO `beranda` (`idberanda`, `iduser`, `judulpenghargaan`, `penghargaan`, `model`, `namalegalitas`, `nolegalitas`, `legalitas`) VALUES
(1, 0, 'Indonesia Commodity and Derivatives Exchange', 'Menempati posisi ketiga di bawah kategori Kinerja Keuangan Terbaik Pialang Berjangka, Millennium Penata Futures dengan bangga menerima penghargaan pada Kamis, 24 November 2011 di Grand Sahid Jaya Hotel, Jakarta, Indonesia. Penghargaan yang diselenggarakan oleh Majalah Harian Investor - majalah yang berbasis di Indonesia dan populer untuk investor keuangan, adalah penghargaan pertama di Indonesia yang bertujuan untuk memberikan wawasan dan skor untuk Indonesia berbasis banyak perusahaan Broker. Penilaian dan review untuk Pialang Berjangka 2011 Terbaik yang dilakukan oleh reviewer independen dengan dukungan dari departemen penelitian internal dari Majalah Harian Investor. Enam kategori yang tersedia untuk take berdasarkan pada tahun 2009 masing-masing perusahaan - 2010 laporan keuangan tahunan. Ajiz Isnawan, Presiden Direktur Millennium Penata Futures, pada keterangannya mengatakan bahwa perusahaan sangat bangga menerima Indonesian Pialang Berjangka Terbaik pertama dan penghargaan lebih memperkuat visi perusahaan untuk menjadi perusahaan brokerage diakui secara global di Indonesia. "Kami akan menyerang untuk meningkatkan semua aspek perusahaan dan kami yakin untuk menyapu penghargaan tambahan untuk penghargaan tahun depan", ia menambahkan.', 'Model bisnis tradisional Millennium Penata Futures adalah sebagai fasilitator keuangan, menjembatani kesenjangan antara dua segmen utama. Pada salah satu ujung spektrum adalah likuiditas - penyedia produk seperti bank internasional, pertukaran dan lain-lain yang memberikan likuiditas berkualitas tinggi yang Millennium Penata Futures terintegrasi ke platform trading onlines. Di ujung lain dari spektrum adalah distribusi - klien swasta, broker dan lembaga keuangan lain yang ingin menyediakan produk terbaik untuk waralaba didirikan klien mereka. Di antara mereka adalah Millennium Penata Futures, fasilitator menghubungkan dua segmen. Melalui platform perdagangan Millennium Penata Futures itu, klien dapat mengakses perdagangan mata uang, CFD, Saham, Futures, dan turunan lainnya. Platform, termasuk Millennium Trader 4 dan 5 Elemen menawarkan harga real-time dan grafik, manajemen risiko, berita, pendidikan dan banyak lagi.', 'BAPPEPTI', '188/BAPPEBTI/SI/II/2003.', 'BAPPEBTI atau Badan Pengatur Perdagangan Komoditi Berjangka dibentuk berdasarkan Undang-Undang Nomor 32 Tahun 1997, BAPPEBTI merupakan salah satu Eselon I di bawah Departemen Perdagangan. BAPPEBTI memiliki tugas untuk melakukan pendiri, mengendalikan, dan memantau semua kegiatan perdagangan berjangka, pasar fisik dan layanan serta sesuai dengan kebijakan yang dibuat oleh Menteri dan peraturan hukum.'),
(2, 0, 'MPF meraih posisi ke-9 ME FX & Investment Award 2011', 'Millennium Penata Futures (MPF), sebuah global terkemuka perusahaan broker CFD, memenangkan "Best Mobile Trading Platform" penghargaan ke-9 di Timur Tengah Forex & Investment Award 2011. Kampanye MPF itu, diluncurkan pada tahun 2010, untuk benar-benar mereformasi masa depan perdagangan MT4 pada perangkat mobile modern telah mendorong status perusahaan sebagai salah satu perusahaan pialang yang berhasil memberikan solusi mobile trading untuk hampir semua perangkat modern yang tersedia di pasar. Penghargaan ini berfungsi sebagai komitmen untuk memajukan layanan untuk semua klien MPF sekarang dan di masa depan. Penghargaan ini berlangsung pada Selasa 15 November 2011 di Hiltonia Lake Garden, Hilton Hotel, Abu Dhabi - UAE', '', 'JAKARTA FUTURES EXCHANGE (JFX)', '048/BBJ/10/02.', 'Jakarta Futures Exchange (JFX) atau PT. Bursa Berjangka Jakarta adalah pertukaran pertama yang didirikan di bawah hukum ini. PT. Bursa Berjangka Jakarta didirikan pada tanggal 19 Agustus 1999 oleh 4 perkebunan sawit, 7 kilang, 8 eksportir kopi, 8 perusahaan efek dan 2 pedagang umum. Dari modal 40 miliar dasar, modal disetor sebesar Rp. 11,6 miliar. Bursa Berjangka Jakarta memenuhi semua persyaratan seperti yang dinyatakan oleh UU.'),
(3, 0, '', '', '', 'Kliring Berjangka Indonesia (KBI)', '17/AK-KBI/X/2003.', 'Bursa Berjangka Jakarta membersihkan semua transaksi melalui Kliring Berjangka Indonesia atau Kliring Berjangka Indonesia. Visi itu adalah menjadi, tumbuh sehat, kliring yang solid, dan memiliki reputasi, pendaftaran, dan tubuh garansi dan untuk menjaga integritas informasi keuangan dan sistem.'),
(4, 0, '', '', '', 'Indonesia Commodity and Derivatives Exchange', '009/SPKB/ICDX/Dir/II/2010.', 'Visi ICDX adalah untuk memberikan peserta pasar dengan tempat untuk perdagangan produk komoditas global dan regional dalam zona waktu Asia, sehingga memungkinkan peserta kemampuan untuk mengurangi risiko dan memfasilitasi proses penemuan harga efisien. Dengan basis sumber daya yang kuat di Indonesia dan terus tumbuh volume transaksi fisik, ICDX yang dipentaskan untuk menjadi patokan harga dunia untuk produk-produk komoditas daerah. ICDX ini bertujuan untuk membuka potensi besar untuk membentuk pasar komoditas lebih transparan, dinamis dan cair, memberdayakan setiap pemangku kepentingan untuk menjadi bagian integral di panggung ekonomi global.'),
(5, 0, '', '', '', 'Identrust Security International (ISI CLearing)', '002/SPKK/ICDX/ISI-MPF/IV/2010.', 'ISI Clearing House menjadi Central Counterparty untuk semua perdagangan dijalankan pada platform trading ICDX melalui proses novasi, dimana ia bertindak sebagai Penjual untuk semua pembeli dan pembeli untuk semua Penjual di Bursa. ICDX menyediakan Jaminan Penyelesaian untuk semua penawaran dijalankan pada platform ICDX. Ini memberikan kepercayaan diri yang luar biasa bagi pelaku pasar sebagai risiko counter-party dihilangkan dalam proses ini. Dalam rangka untuk melindungi pelaku pasar dari setiap risiko kredit counter party, ICDX telah membentuk Dana Penjaminan Penyelesaian (SGF). Jaminan penyelesaian yang disediakan oleh ICDX ditopang oleh sistem margin awal, setiap hari menandai-ke-pasar prosedur dan margin tambahan. Perdagangan difasilitasi secara pre-margin, sehingga mengurangi kebutuhan untuk Dana Jaminan besar untuk Corporation Kliring. Akibatnya, ISI Clearing House dikapitalisasi (seperti yang dipersyaratkan oleh BAPPEBTI) menjadi US $ 2 juta. Setiap anggota kliring yang diperlukan oleh ISI Clearing House untuk deposit jaminan. Sebagai Bursa terus maju dan menjadi menguntungkan, itu akan mempertahankan pendapatan dan memberikan kontribusi pada Dana Jaminan.');

-- --------------------------------------------------------

--
-- Table structure for table `cmb`
--

CREATE TABLE IF NOT EXISTS `cmb` (
  `iduser` int(10) NOT NULL,
  `idcmb` int(10) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  `tanggal` varchar(199) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  PRIMARY KEY (`idcmb`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cmb`
--

INSERT INTO `cmb` (`iduser`, `idcmb`, `status`, `tanggal`, `alamat`, `telp`, `nama`, `jam`, `kota`) VALUES
(0, 2, 1, '19 juni 2015', 'kediri', '085649845093', 'm.agus rizakul mustofa', 'sekitar jam 4 sore', 'kediri'),
(0, 3, 1, 'csa', 'ca', 'ca', 'cc', 'ccccc', 'cdac'),
(0, 4, 1, '32', 'swsx', 'sw', 'xswx', 'sw', 'cdfc'),
(0, 5, 0, '23 agt', 'dfghj', '12346', 'wertyu', '4', 'fgh');

-- --------------------------------------------------------

--
-- Table structure for table `kebijakan`
--

CREATE TABLE IF NOT EXISTS `kebijakan` (
  `idkebijakan` int(10) NOT NULL AUTO_INCREMENT,
  `iduser` int(10) NOT NULL,
  `pembatalan` text NOT NULL,
  `slippage` text NOT NULL,
  `bas` text NOT NULL,
  PRIMARY KEY (`idkebijakan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kebijakan`
--

INSERT INTO `kebijakan` (`idkebijakan`, `iduser`, `pembatalan`, `slippage`, `bas`) VALUES
(1, 0, 'Perdagangan yang tidak sesuai,Scalping \r\nMillennium Penata Futures berhak untuk membatalkan atau menolak setiap perdagangan yang dianggap tidak benar atau dibuka dengan harga fiktif tidak ada di pasaran pada saat membuka atau menutup posisi \r\nKebijakan perdagangan Millennium Penata Futures tidak disesuaikan untuk teknik trading yang dikenal sebagai "scalping" atau "picking" ("Scalping")', 'Millennium Penata Futures menjamin pemenuhan order buy/sell untuk sebagian besar waktu dengan harga diminta klien. Namun, dalam kondisi tertentu dan peristiwa di mana volatilitas harga menjadi terlalu fluktuatif, mustahil bagi MPF untuk memenuhi harga yg diminta klien. Dalam hal keadaan seperti itu dan peristiwa dipicu, MPF akan memenuhi permintaan klien pada harga di tick berikutnya. Silakan lihat Aturan Perdagangan ditandatangani untuk kondisi yang termasuk dalam hal ini.', 'Millennium Penata Futures platform akan menyediakan klien dengan kutipan harga terus menerus dalam bentuk BID dan ASK.\r\n\r\nBID akan menjadi harga dirujuk untuk order sell, sedangkan ASK akan menjadi harga referensi order buy. Perbedaan antara BID dan ASK akan SPREAD tersebut. SPREAD akan berbeda dari seluruh produk dan jenis rekening.\r\nUmumnya, SPREAD akan sebagai berikut:\r\n\r\n    Untuk produk mata uang forex major pair, lebih dari 95% dalam setahun spread akan tetap pada 3 pips.\r\n    Untuk Spot Emas, lebih dari 95% dalam setahun spread akan tetap pada 50 sen.\r\n    Untuk Spot Silver, lebih dari 95% dalam setahun spread akan tetap pada 3 sen.\r\n    Untuk CFD Ekuitas Asia (Indeks Asia), lebih dari 95% dalam setahun spread akan tetap baik di 5 atau 10 points.\r\n    Untuk produk matauang forex (yang masih berada di bawah kategori G8), lebih dari 95% dalam setahun spread akan tetap dan dimulai dari 4 pips.\r\n    Untuk produk lain yang tidak tercantum di atas, diterapkan floating spread. Spread dikatakan floating berarti bahwa jarak antara BID dan ASK mungkin tidak sama untuk setiap pergerakan / setiap ticks.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `legalitas`
--

CREATE TABLE IF NOT EXISTS `legalitas` (
  `iduser` int(10) NOT NULL,
  `idlegalitas` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `legalitas` text NOT NULL,
  PRIMARY KEY (`idlegalitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `legalitas`
--

INSERT INTO `legalitas` (`iduser`, `idlegalitas`, `nama`, `nomor`, `legalitas`) VALUES
(1, 1, 'BAPPEPTI', '188/BAPPEBTI/SI/II/2003.', 'BAPPEBTI atau Badan Pengatur Perdagangan Komoditi Berjangka dibentuk berdasarkan Undang-Undang Nomor 32 Tahun 1997, BAPPEBTI merupakan salah satu Eselon I di bawah Departemen Perdagangan. BAPPEBTI memiliki tugas untuk melakukan pendiri, mengendalikan, dan memantau semua kegiatan perdagangan berjangka, pasar fisik dan layanan serta sesuai dengan kebijakan yang dibuat oleh Menteri dan peraturan hukum.'),
(1, 2, 'JAKARTA FUTURES EXCHANGE (JFX)', '048/BBJ/10/02.', 'Jakarta Futures Exchange (JFX) atau PT. Bursa Berjangka Jakarta adalah pertukaran pertama yang didirikan di bawah hukum ini. PT. Bursa Berjangka Jakarta didirikan pada tanggal 19 Agustus 1999 oleh 4 perkebunan sawit, 7 kilang, 8 eksportir kopi, 8 perusahaan efek dan 2 pedagang umum. Dari modal 40 miliar dasar, modal disetor sebesar Rp. 11,6 miliar. Bursa Berjangka Jakarta memenuhi semua persyaratan seperti yang dinyatakan oleh UU.'),
(1, 3, 'Kliring Berjangka Indonesia (KBI)', '17/AK-KBI/X/2003.', 'Bursa Berjangka Jakarta membersihkan semua transaksi melalui Kliring Berjangka Indonesia atau Kliring Berjangka Indonesia. Visi itu adalah menjadi, tumbuh sehat, kliring yang solid, dan memiliki reputasi, pendaftaran, dan tubuh garansi dan untuk menjaga integritas informasi keuangan dan sistem.'),
(1, 4, 'Indonesia Commodity and Derivatives Exchange', '009/SPKB/ICDX/Dir/II/2010.', 'Visi ICDX adalah untuk memberikan peserta pasar dengan tempat untuk perdagangan produk komoditas global dan regional dalam zona waktu Asia, sehingga memungkinkan peserta kemampuan untuk mengurangi risiko dan memfasilitasi proses penemuan harga efisien. Dengan basis sumber daya yang kuat di Indonesia dan terus tumbuh volume transaksi fisik, ICDX yang dipentaskan untuk menjadi patokan harga dunia untuk produk-produk komoditas daerah. ICDX ini bertujuan untuk membuka potensi besar untuk membentuk pasar komoditas lebih transparan, dinamis dan cair, memberdayakan setiap pemangku kepentingan untuk menjadi bagian integral di panggung ekonomi global.'),
(1, 5, 'Identrust Security International (ISI CLearing)', '002/SPKK/ICDX/ISI-MPF/IV/2010.', 'ISI Clearing House menjadi Central Counterparty untuk semua perdagangan dijalankan pada platform trading ICDX melalui proses novasi, dimana ia bertindak sebagai Penjual untuk semua pembeli dan pembeli untuk semua Penjual di Bursa. ICDX menyediakan Jaminan Penyelesaian untuk semua penawaran dijalankan pada platform ICDX. Ini memberikan kepercayaan diri yang luar biasa bagi pelaku pasar sebagai risiko counter-party dihilangkan dalam proses ini. Dalam rangka untuk melindungi pelaku pasar dari setiap risiko kredit counter party, ICDX telah membentuk Dana Penjaminan Penyelesaian (SGF). Jaminan penyelesaian yang disediakan oleh ICDX ditopang oleh sistem margin awal, setiap hari menandai-ke-pasar prosedur dan margin tambahan. Perdagangan difasilitasi secara pre-margin, sehingga mengurangi kebutuhan untuk Dana Jaminan besar untuk Corporation Kliring. Akibatnya, ISI Clearing House dikapitalisasi (seperti yang dipersyaratkan oleh BAPPEBTI) menjadi US $ 2 juta. Setiap anggota kliring yang diperlukan oleh ISI Clearing House untuk deposit jaminan. Sebagai Bursa terus maju dan menjadi menguntungkan, itu akan mempertahankan pendapatan dan memberikan kontribusi pada Dana Jaminan.');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `iduser` int(10) NOT NULL,
  `idlink` int(10) NOT NULL,
  `dester` text NOT NULL,
  `desmul` text NOT NULL,
  `android` text NOT NULL,
  `mobter` text NOT NULL,
  `smart` text NOT NULL,
  `panbuk` varchar(200) NOT NULL,
  `pandep` varchar(200) NOT NULL,
  `bar` varchar(200) NOT NULL,
  `tt` varchar(200) NOT NULL,
  `iwv` varchar(200) NOT NULL,
  `iwm` varchar(200) NOT NULL,
  PRIMARY KEY (`idlink`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`iduser`, `idlink`, `dester`, `desmul`, `android`, `mobter`, `smart`, `panbuk`, `pandep`, `bar`, `tt`, `iwv`, `iwm`) VALUES
(0, 1, 'http://mpf.co/download/software/mt4setup.exe', 'http://mpf.co/download/software/mt4setup.exe', 'http://mpf.co/download/software/mt4setup.exe', 'http://mpf.co/download/software/mt4setup.exe', 'http://mpf.co/download/software/mt4setup.exe', 'http://www.vifx.co', 'http://www.vifx.co', 'http://www.vifx.co', 'http://www.vifx.co', 'http://www.vifx.co', 'http://www.vifx.co'),
(0, 2, 'Millennium Trader 4 Client Terminal has been created to provide trade operations and technical analysis in real time mode, when working at Forex and Futures financial markets. A wide range of orders allows flexible management of trading activities. As well as many technical indicators and line studies, there is built-in language for trade strategies programming MetaQuotes Language 4. Using this language, you can create Expert Advisors, Custom Indicators and Scripts. Expert Advisors can analyze the situation on the market, make decisions, put pending orders, and open positions in on-line mode without traders participation. Custom Indicators, just like technical ones, can analyze the situation on the market and generate various signals. As for Scripts, they are designed for single execution of some actions. To download MT4 Client Terminal please Login or Register first.', 'Millennium Trader 4 Online Trading Platform now has a new component called MultiTerminal. The MultiTerminal is intended for simultaneous management of multiple accounts, for which is mostly helpful for those whom manage investors accounts and for traders working with many accounts simultaneously. Millennium Trader 4 MultiTerminal allows working with any amounts of accounts, receiving quotes for any symbols, placing all types of orders, and viewing history for all accounts. Moreover, within this application the financial news can be delivered in the real-time mode. The new terminal successfully combines great functionalities that allow effective trading with many accounts and with exceptional usability. The program interface is similar to that of the Millennium Trader 4 Client Terminal. It is very simple, any trader using the Millennium Trader 4 Client Terminal can easily get acquainted to this new program within a few minutes.', 'Salah satu platform transaksi paling populer di dunia, MetaTrader4, kini tersedia untuk telepon dan tablet Android secara gratis. Melalui aplikasi ini, Anda dapat mengelola account transaksi Anda, melakukan transaksi dan menggunakan analisis pasar dengan 30 indikator teknikal.', 'This terminal allows to work at financial markets being mobile. For Millennium Trader 4 Mobile to operate, a Pocket PC with Microsoft Windows Pocket PC 2002 or higher is necessary. Mobile terminal enables you control of trading account via mobile devices such a cellular phone or a PDA (Personal Digital Assistant). Wireless access technologies WAP and GPRS provide access to the Internet.\r\n\r\nMillennium Trader 4 Mobile program is comparable with full-function trading terminal. You have a possibility of full access to financial markets and making deals from anywhere of the world. Moreover, technical analysis and graphical visualization of financial instruments are available (including off-line mode without connecting to server). Trade dealing is done with careful observation of confidentiality and is absolutely safe. If required, you always have the history of completed trade deals.', 'Mobile Trading(M-Trading)-manajemen akun trading melalui perangkat mobile, seperti ponsel atau Personal Digital Assistant .\r\n\r\nMillenium trader 4 edisi smartphone adalah terminal mobile untuk smartphone, dengan ini anda bisa mendapatkan akses ke pasar keuangan dan melakukan trading di seluruh dunia. Dilengkapi grafik, simbol dan, berita keuangan yang akan membantu anda untuk membuat keputusan apakah akan membuka atau menutuo posisi. Trading melalui analisa ini sepenuhnya aman dan benar-benar rahasia. Jika diperlukan, anda dapat menemukan sejarah perdagangan di Millenium Trader 4 anda setiap saat.', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `iduser` int(10) NOT NULL,
  `idmanager` int(10) NOT NULL AUTO_INCREMENT,
  `quote` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `poto` varchar(100) NOT NULL,
  PRIMARY KEY (`idmanager`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`iduser`, `idmanager`, `quote`, `nama`, `poto`) VALUES
(0, 1, 'prospek', 'rio', 'images/manager/rio.jpg'),
(0, 2, 'statusnya', 'jessica aurellia', 'images/manager/cece.jpg'),
(0, 3, 'statusnda', 'erna', 'images/manager/erna.jpg'),
(0, 4, 'statussssss', 'boni', 'images/manager/boni.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `iduser` int(10) NOT NULL,
  `idmodel` int(10) NOT NULL AUTO_INCREMENT,
  `model` text NOT NULL,
  PRIMARY KEY (`idmodel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`iduser`, `idmodel`, `model`) VALUES
(1, 1, 'Model bisnis tradisional Millennium Penata Futures adalah sebagai fasilitator keuangan, menjembatani kesenjangan antara dua segmen utama. Pada salah satu ujung spektrum adalah likuiditas - penyedia produk seperti bank internasional, pertukaran dan lain-lain yang memberikan likuiditas berkualitas tinggi yang Millennium Penata Futures terintegrasi ke platform trading onlines. Di ujung lain dari spektrum adalah distribusi - klien swasta, broker dan lembaga keuangan lain yang ingin menyediakan produk terbaik untuk waralaba didirikan klien mereka. Di antara mereka adalah Millennium Penata Futures, fasilitator menghubungkan dua segmen. Melalui platform perdagangan Millennium Penata Futures itu, klien dapat mengakses perdagangan mata uang, CFD, Saham, Futures, dan turunan lainnya. Platform, termasuk Millennium Trader 4 dan 5 Elemen menawarkan harga real-time dan grafik, manajemen risiko, berita, pendidikan dan banyak lagi.');

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE IF NOT EXISTS `penghargaan` (
  `iduser` int(10) NOT NULL,
  `idpenghargaan` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(500) NOT NULL,
  `penghargaan` text NOT NULL,
  PRIMARY KEY (`idpenghargaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`iduser`, `idpenghargaan`, `judul`, `penghargaan`) VALUES
(1, 1, 'Indonesia Commodity and Derivatives Exchange', 'Menempati posisi ketiga di bawah kategori Kinerja Keuangan Terbaik Pialang Berjangka, Millennium Penata Futures dengan bangga menerima penghargaan pada Kamis, 24 November 2011 di Grand Sahid Jaya Hotel, Jakarta, Indonesia. Penghargaan yang diselenggarakan oleh Majalah Harian Investor - majalah yang berbasis di Indonesia dan populer untuk investor keuangan, adalah penghargaan pertama di Indonesia yang bertujuan untuk memberikan wawasan dan skor untuk Indonesia berbasis banyak perusahaan Broker. Penilaian dan review untuk Pialang Berjangka 2011 Terbaik yang dilakukan oleh reviewer independen dengan dukungan dari departemen penelitian internal dari Majalah Harian Investor. Enam kategori yang tersedia untuk take berdasarkan pada tahun 2009 masing-masing perusahaan - 2010 laporan keuangan tahunan. Ajiz Isnawan, Presiden Direktur Millennium Penata Futures, pada keterangannya mengatakan bahwa perusahaan sangat bangga menerima Indonesian Pialang Berjangka Terbaik pertama dan penghargaan lebih memperkuat visi perusahaan untuk menjadi perusahaan brokerage diakui secara global di Indonesia. "Kami akan menyerang untuk meningkatkan semua aspek perusahaan dan kami yakin untuk menyapu penghargaan tambahan untuk penghargaan tahun depan", ia menambahkan.'),
(1, 2, 'MPF meraih posisi ke-9 ME FX & Investment Award 2011', 'Millennium Penata Futures (MPF), sebuah global terkemuka perusahaan broker CFD, memenangkan "Best Mobile Trading Platform" penghargaan ke-9 di Timur Tengah Forex & Investment Award 2011. Kampanye MPF itu, diluncurkan pada tahun 2010, untuk benar-benar mereformasi masa depan perdagangan MT4 pada perangkat mobile modern telah mendorong status perusahaan sebagai salah satu perusahaan pialang yang berhasil memberikan solusi mobile trading untuk hampir semua perangkat modern yang tersedia di pasar. Penghargaan ini berfungsi sebagai komitmen untuk memajukan layanan untuk semua klien MPF sekarang dan di masa depan. Penghargaan ini berlangsung pada Selasa 15 November 2011 di Hiltonia Lake Garden, Hilton Hotel, Abu Dhabi - UAE');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `idprofil` int(10) NOT NULL AUTO_INCREMENT,
  `iduser` int(10) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `telp` int(20) NOT NULL,
  `tambahan` text NOT NULL,
  PRIMARY KEY (`idprofil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`idprofil`, `iduser`, `alamat`, `email`, `deskripsi`, `telp`, `tambahan`) VALUES
(1, 0, 'CAFE VICTORY JL. Veteran no. 2 Lantai Mezzanine / Lantai 1 Blok GE & GS, Malang Town Square - Jawa Timur Indonesia.', 'Vifmatos@yahoo.com', 'Didirikan pada tahun 2000, PT.Millennium Penata Futures telah berkembang menjadi Broker Indonesia yang sepenuhnya berlisensi dan diatur mengkhususkan diri dalam perdagangan dan investasi, mendukung basis klien internasional dari kantor pusatnya di Indonesia dan jaringan yang berkembang kantor di seluruh Indonesia dan Dunia. PT. Platform Millennium Penata Futures telah berevolusi untuk memenuhi perubahan kebutuhan pedagang dan investor. PT. Millennium Penata Futures saat ini telah menawarkan rangkaian platform dengan memanfaatkan teknologi web dan mobile.', 341559151, 'Perdagangan Margin adalah produk leverage, dikenakan tingkat resiko yang tinggi dan sangat mungkin untuk kehilangan semua modal yang diinvestasikan. Pastikan bahwa Anda memahami risiko yang terlibat dan mencari nasihat independen jika diperlukan');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `idslide` int(10) NOT NULL AUTO_INCREMENT,
  `iduser` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`idslide`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`idslide`, `iduser`, `gambar`, `keterangan`, `status`) VALUES
(1, 0, 'images/slideshow/1.jpg', 'the way of success', 1),
(4, 0, 'images/slideshow/e2.jpg', 'Come join us', 1),
(5, 0, 'images/slideshow/slide3.png', 'come join us', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `poto` varchar(100) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `user`, `nama`, `password`, `poto`) VALUES
(1, 'user', 'victory international futures', '827ccb0eea8a706c4c34a16891f84e7b', 'images/users/author.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
