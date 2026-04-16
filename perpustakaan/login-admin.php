<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Admin - Aplikasi Perpustakaan Digital Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="vh-100 d-flex justify-content-center align-items-center">
    <form method="post" action="#" class="col-md-3 border p-4 bg-white rounded-4">
        <h4 class="text-center">Login Admin</h4>
        <h5 class="text-center mb-3">Aplikasi Perpustakaan Digital Sekolah</h5>
        <input name="username" class="form-control mb-3" placeholder="Username" required>
        <input name="password" type="password" class="form-control mb-3" placeholder="Password" required>

        <button type="submit" name="tombol" class="btn btn-success w-100 mb-2">Login</button>
        <a href="login-anggota.php" class="text-decoration-none">Login Sebagai Anggota Perpustakaan..?</a>
    </form>
</div>

</body>
</html>

<?php
if(isset($_POST['tombol'])){
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT*FROM admin WHERE username='$username' AND password='$password'";
$data = mysqli_query($koneksi, $query);
if (mysqli_num_rows($data)>0){
    $data = mysqli_fetch_array($data);
    session_start();
    $_SESSION['id_admin']   = $data['id_admin'];
    $_SESSION['username']   = $data['username'];
    $_SESSION['nama_admin'] = $data['nama_admin'];
    header("Location:admin/dashboard.php");
    }else{
        echo"<script>alert('Login Gagal, Username / Password Salah')</script>";
    }
}
?>