<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Sebagai Anggota - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="vh-100 d-flex justify-content-center align-items-center">
    <form method="post" class="col-md-3 border p-4 bg-white rounded-4">
        <h4 class="text-center">Login Sebagai Anggota</h4>

        <input name="nis" class="form-control mb-2" placeholder="NIS">
        <input name="nama_anggota" class="form-control mb-2" placeholder="Nama Anggota">
        <input name="username" class="form-control mb-2" placeholder="Username" required>
        <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>
        <input name="kelas" class="form-control mb-2" placeholder="Kelas">

        <button type="submit" name="tombol" class="btn btn-success w-100">Login</button>
    </form>
</div>

</body>
</html>

<?php
if(isset($_POST['tombol'])){
include 'koneksi.php';

$nis            = $_POST['nis'];
$nama_anggota   = $_POST['nama_anggota'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$kelas          = $_POST['kelas'];

$query = "SELECT * FROM anggota WHERE username='$username' AND password='$password'";
$data = mysqli_query($koneksi, $query);

if (mysqli_num_rows($data) > 0){

    $d = mysqli_fetch_array($data);

    $_SESSION['id_anggota'] = $d['id_anggota'];
    $_SESSION['username'] = $d['username'];
    $_SESSION['nama_anggota'] = $d['nama_anggota'];

    header("Location: anggota/dashboard.php");
    exit;

}else{
    echo "<script>alert('Login Gagal, Username / Password Salah')</script>";
}
}
?>