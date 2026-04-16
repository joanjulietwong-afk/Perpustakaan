<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota - Aplikasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="vh-100 d-flex justify-content-center align-items-center">
    <form method="post" class="col-md-4 border p-4 bg-white rounded-4">
        <h4 class="text-center mb-3">Daftar Anggota</h4>

        <input name="nis" class="form-control mb-2" placeholder="NIS" required>
        <input name="nama_anggota" class="form-control mb-2" placeholder="Nama Lengkap" required>
        <input name="username" class="form-control mb-2" placeholder="Username" required>
        <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>
        <input name="kelas" class="form-control mb-3" placeholder="Kelas" required>

        <button type="submit" name="tombol" class="btn btn-primary w-100">Daftar</button>

        <div class="text-center mt-2">
            <a href="login-anggota.php">Sudah punya akun? Login</a>
        </div>
    </form>
</div>

</body>
</html>

<?php
if(isset($_POST['tombol'])){

    $nis            = $_POST['nis'];
    $nama_anggota   = $_POST['nama_anggota'];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $kelas          = $_POST['kelas'];

    // cek username sudah ada atau belum
    $cek = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username'");

    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Username sudah digunakan!');</script>";
    }else{

        $query = "INSERT INTO anggota (nis, nama_anggota, username, password, kelas) 
                  VALUES ('$nis', '$nama_anggota', '$username', '$password', '$kelas')";

        mysqli_query($koneksi, $query);

        echo "<script>alert('Pendaftaran berhasil!');window.location='login-anggota.php';</script>";
    }
}
?>