CREATE DATABASE IF NOT EXISTS db_sekolah_kelas11 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_sekolah_kelas11;
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS nilai;
DROP TABLE IF EXISTS jadwal;
DROP TABLE IF EXISTS mapel;
DROP TABLE IF EXISTS siswa;
DROP TABLE IF EXISTS guru;
DROP TABLE IF EXISTS kelas;
DROP TABLE IF EXISTS users;
SET FOREIGN_KEY_CHECKS=1;
CREATE TABLE users (
 id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 nama VARCHAR(100) NOT NULL,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role ENUM('admin','guru') NOT NULL DEFAULT 'admin',
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
INSERT INTO users(nama,username,password,role) VALUES ('Administrator','admin','$2y$12$qBOa4uIQxnAPDvSOP4oQUuAjhMiXQf3TdytyRyr8xekFcggvdicam','admin');

CREATE TABLE kelas (
 id_kelas INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 nama_kelas VARCHAR(20) NOT NULL UNIQUE,
 wali_kelas VARCHAR(100) NULL
) ENGINE=InnoDB;
INSERT INTO kelas(nama_kelas,wali_kelas) VALUES ('XI RPL 1','Budi Santoso, S.Kom'),('XI RPL 2','Siti Aminah, S.Kom'),('XI RPL 3','Ahmad Fauzi, S.Kom');

CREATE TABLE guru (
 id_guru INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 nip VARCHAR(30) NOT NULL UNIQUE,
 nama_guru VARCHAR(100) NOT NULL,
 jenis_kelamin ENUM('L','P') NOT NULL,
 no_hp VARCHAR(20) NULL
) ENGINE=InnoDB;
INSERT INTO guru(nip,nama_guru,jenis_kelamin,no_hp) VALUES
('G001','Budi Santoso','L','081234567801'),('G002','Siti Aminah','P','081234567802'),('G003','Ahmad Fauzi','L','081234567803');

CREATE TABLE siswa (
 id_siswa INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 nis VARCHAR(30) NOT NULL UNIQUE,
 nama_siswa VARCHAR(100) NOT NULL,
 jenis_kelamin ENUM('L','P') NOT NULL,
 id_kelas INT UNSIGNED NOT NULL,
 alamat VARCHAR(255) NULL,
 CONSTRAINT fk_siswa_kelas FOREIGN KEY(id_kelas) REFERENCES kelas(id_kelas) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;
INSERT INTO siswa(nis,nama_siswa,jenis_kelamin,id_kelas,alamat) VALUES
('11001','Andi Pratama','L',1,'Surabaya'),('11002','Alya Putri','P',1,'Surabaya'),('11003','Bagas Saputra','L',2,'Sidoarjo'),('11004','Citra Lestari','P',2,'Gresik'),('11005','Dimas Ramadhan','L',3,'Surabaya');

CREATE TABLE mapel (
 id_mapel INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 kode_mapel VARCHAR(20) NOT NULL UNIQUE,
 nama_mapel VARCHAR(100) NOT NULL,
 id_guru INT UNSIGNED NOT NULL,
 CONSTRAINT fk_mapel_guru FOREIGN KEY(id_guru) REFERENCES guru(id_guru) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;
INSERT INTO mapel(kode_mapel,nama_mapel,id_guru) VALUES ('PBO','Pemrograman Berorientasi Objek',1),('BD','Basis Data',2),('WEB','Pemrograman Web',3);

CREATE TABLE jadwal (
 id_jadwal INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 id_kelas INT UNSIGNED NOT NULL,
 id_mapel INT UNSIGNED NOT NULL,
 hari ENUM('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
 jam_mulai TIME NOT NULL,
 jam_selesai TIME NOT NULL,
 CONSTRAINT fk_jadwal_kelas FOREIGN KEY(id_kelas) REFERENCES kelas(id_kelas) ON UPDATE CASCADE ON DELETE RESTRICT,
 CONSTRAINT fk_jadwal_mapel FOREIGN KEY(id_mapel) REFERENCES mapel(id_mapel) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;
INSERT INTO jadwal(id_kelas,id_mapel,hari,jam_mulai,jam_selesai) VALUES (1,1,'Senin','07:00','08:30'),(1,2,'Selasa','08:30','10:00'),(2,3,'Rabu','10:00','11:30');

CREATE TABLE nilai (
 id_nilai INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 id_siswa INT UNSIGNED NOT NULL,
 id_mapel INT UNSIGNED NOT NULL,
 tugas DECIMAL(5,2) NOT NULL DEFAULT 0,
 uts DECIMAL(5,2) NOT NULL DEFAULT 0,
 uas DECIMAL(5,2) NOT NULL DEFAULT 0,
 nilai_akhir DECIMAL(5,2) NOT NULL DEFAULT 0,
 semester ENUM('1','2') NOT NULL DEFAULT '1',
 CONSTRAINT fk_nilai_siswa FOREIGN KEY(id_siswa) REFERENCES siswa(id_siswa) ON UPDATE CASCADE ON DELETE CASCADE,
 CONSTRAINT fk_nilai_mapel FOREIGN KEY(id_mapel) REFERENCES mapel(id_mapel) ON UPDATE CASCADE ON DELETE RESTRICT,
 UNIQUE KEY uq_nilai_siswa_mapel_semester(id_siswa,id_mapel,semester)
) ENGINE=InnoDB;
INSERT INTO nilai(id_siswa,id_mapel,tugas,uts,uas,nilai_akhir,semester) VALUES
(1,1,85,80,90,86.00,'1'),(2,1,90,88,92,90.20,'1'),(3,2,78,80,82,80.20,'1'),(4,3,88,84,86,86.00,'1');
