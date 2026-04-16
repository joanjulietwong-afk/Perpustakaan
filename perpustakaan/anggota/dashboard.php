<?php
session_start();

if (!isset($_SESSION['id_anggota'])) {
    header("Location: ../login-anggota.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Anggota - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-3">

    <h4>ANGGOTA</h4>
    <H6>PERPUSTAKAAN DIGITAL</H6>

    <a href="dashboard.php" class="btn btn-success text-white">DASHBOARD</a>
    <a href="?halaman=data_buku" class="btn btn-primary text-white">LIHAT BUKU</a>
    <a href="?halaman=riwayat_peminjaman" class="btn btn-warning text-white">RIWAYAT PEMINJAMAN</a>
    <a href="logout.php" class="btn btn-danger text-white">LOGOUT</a>

    <div class="card p-3 mt-3">
        <?php
        $halaman = isset($_GET['halaman']) ? $_GET['halaman']: '';
        if (file_exists($halaman . ".php")) {
            include $halaman . ".php";
        }else{
            ?>
            <h4>Selamat datang, Sahabat Perpustakaan!</h4>
            <p class="text-justify text-muted">
                Di sini, Anda bisa menjelajahi dunia pengetahuan, menemukan buku favorit, dan memanfaatkan berbagai layanan khusus anggota.
            </p>
       <?php }
        ?>
    </div>

</body>
</html>