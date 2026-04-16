<?php
session_start();
include '../koneksi.php';

$id_transaksi = $_GET['id'];
$tgl_pengembalian = date('Y-m-d');

$query = "UPDATE transaksi SET tgl_pengembalian='$tgl_pengembalian', status_transaksi='$kembali'
          WHERE id_transaksi='$id_transaksi'";

mysqli_query($koneksi, $query);
echo "<script>alert('Buku berhasil dikembalikan');window.location='?halaman=riwayat_peminjaman';</script>";
?>