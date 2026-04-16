<?php
include '../koneksi.php';
$anggota = mysqli_query($koneksi, "SELECT*FROM anggota");
$buku = mysqli_query($koneksi, "SELECT*FROM buku WHERE status='tersedia'");
?>
<h4>Tambah Peminjaman </h4>
<form method="post" action="#" class="mt-3">
    <select name="id_anggota" class="form-control mb-2" required>
        <option value="">=== Pilih Anggota ===</option>
        <?php
        foreach($anggota as $data){
            echo"<option value='$data[id_anggota]'>$data[nama_anggota]</option>";
        }
        ?>
    </select>
    <select name="id_buku" class="form-control mb-2" required>
        <option value="">=== Pilih Buku ===</option>
        <?php
        foreach($buku as $data){
            echo"<option value='$data[id_buku]'>$data[judul_buku]</option>";
        }
        ?>
    </select>
    <input name="tgl_pinjam" type="datetime-local" class="form-control mb-2">
    <button name="tombol" type="submit" class="btn btn_primary">SIMPAN</button>
</form>
<?php
if (isset($_POST['tombol'])) {
    $id_anggota = $_POST['id_anggota'];
    $id_buku    = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_peminjaman'];
    $status_transaksi = "Peminjaman";
    include'../koneksi.php';
    $query = "INSERT INTO transaksi(id_anggota,id_buku,tgl_peminjaman,status_transaksi) VALUES('$id_anggota','$id_buku','tgl_peminjaman','$status_transaksi')";
    $data = mysqli_query($koneksi, $query);
    if($data){
        mysqli_query($koneksi, "UPDATE buku SET status='tidak' WHERE id_buku='$id_buku'");
        echo "<script>alert('Data Peminjaman Berhasil!');window.location='?halaman=data_peminjaman';</script>";
    }
    echo "<script>alert('Data Gagal dipinjam!');window.location='?halaman=input_peminjaman';</script>";
}
?>