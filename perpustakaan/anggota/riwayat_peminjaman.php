<h4>Riwayat Peminjaman Buku</h4>

<table class="table table-bordered mt-3">
    <tr class="fw-bold text-center">
        <td>No</td>
        <td>Judul Buku</td>
        <td>Tanggal Pinjam</td>
        <td>Tanggal Kembali</td>
    </tr>

<?php
include '../koneksi.php';
$id_anggota = $_SESSION['id_anggota'];

$query = "SELECT * FROM transaksi,buku,anggota
WHERE buku.id_buku=transaksi.id_buku
AND anggota.id_anggota=transaksi.id_anggota
AND anggota.id_anggota='$id_anggota'
ORDER BY transaksi.id_transaksi DESC";
$data = mysqli_query($koneksi, $query);
$no = 1;
if(mysqli_num_rows($data) == 0){
    echo "<tr><td colspan='5' class='text-center'>Belum ada data peminjaman</td></tr>";
}

foreach ($data as $d) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['judul_buku']; ?></td>
        <td><?= $d['tgl_peminjaman']; ?></td>
        <td><?= $d['tgl_pengembalian']; ?></td>
    </tr>
    
<?php } ?>


</table>