
-- Database Backup --
-- Ver. : 1.0.1
-- Host : 127.0.0.1
-- Generating Time : Mar 11, 2023 at 18:37:01:PM


CREATE TABLE `detailtransaksi` (
  `iddetailtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idtransaksi` int(11) NOT NULL,
  `idjeniscucian` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`iddetailtransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4;

INSERT INTO detailtransaksi VALUES
("59","15","4","30","200"),
("60","15","7","500","3000"),
("61","15","11","30","200"),
("62","16","2","43","150"),
("63","16","2","23","150"),
("64","16","3","34","100"),
("65","17","3","90","100"),
("66","17","2","50","150"),
("67","17","7","10","3000"),
("68","18","4","90","200"),
("69","19","12","10","1000"),
("70","19","2","2","150"),
("71","20","3","90","100"),
("72","20","4","12","200"),
("73","21","2","2121","150"),
("75","22","5","21","10000"),
("76","22","3","50","100"),
("77","22","4","30","200"),
("78","27","2","20","15"),
("79","27","11","90","200"),
("80","27","4","10","200"),
("81","28","2","21","15"),
("82","28","4","21","200"),
("83","34","2","200","150"),
("84","34","11","500","200"),
("85","34","7","100","3000"),
("86","39","2","1212","150"),
("87","39","6","111","5000"),
("88","40","3","1","100");

CREATE TABLE `jeniscucian` (
  `idjeniscucian` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`idjeniscucian`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO jeniscucian VALUES
("2","Kemeja Berwarna","150"),
("3","Baju Kaos","100"),
("4","Handuk","200"),
("5","Jas","500"),
("6","Daster","5000"),
("7","Selimut","3000"),
("8","Kaos Kaki","25"),
("11","Celana","200"),
("12","Karpet","1000");

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jeniskelamin` varchar(9) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL,
  `tanggallahir` date NOT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

INSERT INTO pelanggan VALUES
("43","Jubilia Luiza Ornai Barros","Perempuan","Dili","08988676767","juvi@gmail.com","123321","1","2022-12-11"),
("49","TOME ORNAI BARROS","Laki-Laki","Kayu-Putih","082808280","tomeobarros@gmail.com","1","1","2022-12-24");

CREATE TABLE `petugas` (
  `idpetugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jeniskelamin` varchar(9) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`idpetugas`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

INSERT INTO petugas VALUES
("28","Tome Ornai Barros","Laki-Laki","Kayu-Putih","0821212121212","tome@gmail.com","2121"),
("29","Silvester Vianei Mado","Laki-Laki","Kayu-Putih","21212121212","silvester@gmail.com","1233331");

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalterima` date NOT NULL,
  `idpetugaspenerima` int(11) NOT NULL,
  `tanggalserah` date DEFAULT NULL,
  `idpetugasserah` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `simpan` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO transaksi VALUES
("40","2022-12-11","28","2022-12-19","29","Selesai","43","Barang Aman","8787878","1");