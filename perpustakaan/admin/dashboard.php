<?php
session_start();
if (empty($_SESSION['id_admin'])) {
    header("Location:../login-admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-3">
    <h4>Selamat Datang di Halaman Admin - Aplikasi Perpustakaan Digital Sekolah</h4>
    <a href="dashboard.php" class="btn btn-success text-white">Dashboard</a>
    <a href="?halaman=data_buku" class="btn btn-primary text-white">Buku</a>
    <a href="?halaman=data_anggota" class="btn btn-info text-white">Anggota</a>
    <a href="?halaman=data_peminjaman" class="btn btn-warning text-white">Peminjaman</a>
    <a href="logout.php" class="btn btn-danger text-white">Logout</a>

    <div class="card p-3 mt-3">
        <?php
        $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
        if (file_exists($halaman . ".php")) {
            include $halaman . ".php";
        }else{
            ?>
            <h4>Selamat Datang <?= $_SESSION['nama_admin']; ?> </h4>
            <p class="text-justify text-muted">
                Website Aplikasi Perpustakaan Digital Sekolah ini dibuat untuk memudahkan pengelolaan buku dan peminjaman buku didalam perpustakaan
            </p>

          
       <?php }
        ?>
    </div>
</body>