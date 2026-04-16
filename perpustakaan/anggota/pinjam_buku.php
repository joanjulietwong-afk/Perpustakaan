<?php
include'../koneksi.php';
session_start();


$id_buku = $_GET['id'];
$id_anggota = $_SESSION['id_anggota'];

$tgl_peminjaman = date('Y-m-d');

$query = "INSERT INTO transaksi (id_anggota, id_buku, tgl_peminjaman, status_transaksi) 
          VALUES ('$id_anggota', '$id_buku', '$tgl_peminjaman','$status_transaksi')";
$data = mysqli_query($koneksi, $query);

echo "<script>alert('Buku berhasil dipinjam');window.location='?halaman=data_buku';</script>";
?>