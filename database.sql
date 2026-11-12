CREATE DATABASE IF NOT EXISTS db_mahasiswa;
USE db_mahasiswa;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id_mahasiswa VARCHAR(6) PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    telepon VARCHAR(12) NOT NULL
);
