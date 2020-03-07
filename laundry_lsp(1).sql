-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2020 pada 08.26
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_lsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detaillaundry`
--

CREATE TABLE `detaillaundry` (
  `iddetail` int(20) NOT NULL,
  `idtransaksi` int(20) NOT NULL,
  `idlaundry` int(20) NOT NULL,
  `idstatus` int(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detaillaundry`
--

INSERT INTO `detaillaundry` (`iddetail`, `idtransaksi`, `idlaundry`, `idstatus`, `harga`, `total`, `keterangan`) VALUES
(1, 1, 1, 1, 2000, 5000, 'iyo santai'),
(2, 6, 2, 1, 2324, 324234, 'werwer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laundry`
--

CREATE TABLE `laundry` (
  `idlaundry` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laundry`
--

INSERT INTO `laundry` (`idlaundry`, `nama`, `harga`, `type`) VALUES
(1, 'baju batik', 2000, 'baju'),
(2, 'zd', 2324, 'baju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(20) NOT NULL,
  `idtransaksi` int(20) NOT NULL,
  `totalbayar` int(50) NOT NULL,
  `tglbayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuslaundry`
--

CREATE TABLE `statuslaundry` (
  `idstatus` int(20) NOT NULL,
  `namastatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statuslaundry`
--

INSERT INTO `statuslaundry` (`idstatus`, `namastatus`) VALUES
(1, 'diproses'),
(2, 'dicuci'),
(3, 'dibayar'),
(4, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `id_user`, `tgltransaksi`, `keterangan`) VALUES
(1, 2, '2020-02-09', 'iyo'),
(3, 4, '2020-02-25', 'sdsd'),
(6, 5, '2020-02-28', 'asd'),
(7, 6, '2020-03-01', 'asdad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` set('male','female') NOT NULL,
  `address` text NOT NULL,
  `role` set('admin','pelanggan') NOT NULL DEFAULT 'pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `fullname`, `email`, `phone`, `gender`, `address`, `role`) VALUES
(1, 'admin', '$2y$10$TMM6pKjxsPul2IU0JK/i1ulLFZphfrVw3rMUeSGNj2HiiqwN1rvbe', 'admin', 'admin@mail.com', '02131293123', 'male', 'sadasd', 'admin'),
(2, 'user', '$2y$10$PtpY/qI2oMd0LiHsXt5UK.HRlUTwyfHwNoPrVKtfSj.yxBsiB8xia', 'user', 'user@mail.com', '9213123124', 'male', 'macanan', 'pelanggan'),
(4, 'sdf', '$2y$10$idoYJgvHAP3kJEfyBZ0cluhjkm3ABBTbAer6vAYAYQPQhYtjzUYqa', 'sds', 'asd@m', '232342', 'male', 'sdsf', 'pelanggan'),
(5, 'bj', '$2y$10$o1F7A8PX9Kyw5K4arWjCJ.RgN/MGPKY/Oqov5FVq8vLabcoHfytOa', 'asdas', 'g@mail.com', '2424234', 'male', 'asd', 'pelanggan'),
(6, 'asd', '$2y$10$mIcmadYWLsfvY1RHV4xVYupGiahFeVI0aCBA/g45WbeO15whUNjKi', 'asd', 'asd@m', '213213', 'male', 'asd', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detaillaundry`
--
ALTER TABLE `detaillaundry`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `idstatus` (`idstatus`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indeks untuk tabel `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`idlaundry`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD UNIQUE KEY `idtransaksi` (`idtransaksi`);

--
-- Indeks untuk tabel `statuslaundry`
--
ALTER TABLE `statuslaundry`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detaillaundry`
--
ALTER TABLE `detaillaundry`
  MODIFY `iddetail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laundry`
--
ALTER TABLE `laundry`
  MODIFY `idlaundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `statuslaundry`
--
ALTER TABLE `statuslaundry`
  MODIFY `idstatus` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detaillaundry`
--
ALTER TABLE `detaillaundry`
  ADD CONSTRAINT `detaillaundry_ibfk_1` FOREIGN KEY (`iddetail`) REFERENCES `laundry` (`idlaundry`),
  ADD CONSTRAINT `detaillaundry_ibfk_2` FOREIGN KEY (`idstatus`) REFERENCES `statuslaundry` (`idstatus`),
  ADD CONSTRAINT `detaillaundry_ibfk_3` FOREIGN KEY (`idtransaksi`) REFERENCES `transaksi` (`idtransaksi`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `transaksi` (`idtransaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
