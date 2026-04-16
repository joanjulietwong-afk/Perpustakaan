
<table class="table table-bordered mt-3">
    <tr class="fw-bold text-center">
        <td>No</td>
        <td>Judul Buku</td>
        <td>Pengarang</td>
        <td>Penerbit</td>
        <td>Tahun Terbit</td>
        <td>Status</td>
    </tr>

<?php
$no = 1;
include '../koneksi.php';
$query = "SELECT * FROM buku ORDER BY id_buku DESC";
$data = mysqli_query($koneksi, $query);

foreach ($data as $buku) {
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $buku['judul_buku']; ?></td>
        <td><?= $buku['pengarang']; ?></td>
        <td><?= $buku['penerbit']; ?></td>
        <td><?= $buku['tahun_terbit']; ?></td>
        <td><?= $buku['status']; ?></td>
        <td>

            <a class="btn btn-primary btn-sm"
               href="?halaman=pinjam_buku&id=<?= $buku['id_buku'] ?>">
               Pinjam
            </a>

           
        </td>
    </tr>    
<?php } ?>

</table>