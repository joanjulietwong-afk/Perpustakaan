<h4>Data Peminjaman</h4>

<a href="?halaman=input_peminjaman" class="btn btn-secondary">
    + Tambah Data peminjaman
</a>

<table class="table table-bordered mt-3">
    <tr class="fw-bold">
        <td>No</td>
        <td>NIS</td>
        <td>Nama Anggota</td>
        <td>Buku</td>
        <td>Tanggal Pinjam</td>
        <td>Kelola</td>
    </tr>
    <?php
    $no = 1;
    include'../koneksi.php';
    $query = "SELECT*FROM transaksi,buku,anggota
    WHERE buku.id_buku=transaksi.id_buku
    AND anggota.id_anggota=transaksi.id_anggota
    AND transaksi.status_transaksi='Peminjaman'
    ORDER BY transaksi.id_transaksi DESC";
    $data = mysqli_query($koneksi, $query);
    foreach ($data as $pinjam) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $pinjam['nis'] ?></td>
        <td><?= $pinjam['nama_anggota'] ?></td>
        <td><?= $pinjam['judul_buku'] ?></td>
        <td><?= $pinjam['tgl_peminjaman'] ?></td>
        <td>
            <?php
            $pesan = "Pengembalian buku oleh {$pinjam['nama_anggota']}, Buku {$pinjam['judul_buku']}";
            ?>
            <a onclick="pengembalian('<?= $pesan ?>','<?= $pinjam['id_transaksi'] ?>','<?= $pinjam['id_buku'] ?>')" class="btn btn-danger">
                Pengembalian
            </a>
            <?php
            $pesan = "Anda Yakin Ingin Menghapus Data {$pinjam['nama_anggota']}, Buku {$pinjam['judul_buku']}";
            ?>
            <a onclick="hapus('<?= $pesan ?>','<?= $pinjam['id_transaksi'] ?>','<?= $pinjam['id_buku'] ?>')" class="btn btn-danger">
                Hapus
            </a>
        </td>
    </tr>    
    <?php } ?>
</table>
<hr>
<h4>Data Pengembalian</h4>
<table class="table table-bordered mt-3">
    <tr class="fw-bold">
        <td>No</td>
        <td>NIS</td>
        <td>Nama Anggota</td>
        <td>Buku</td>
        <td>Tanggal Pengembalian</td>
        <td>Kelola</td>
    </tr>
    <?php
    $no = 1;
    include'../koneksi.php';
    $query = "SELECT * FROM transaksi,buku,anggota
    WHERE buku.id_buku = transaksi.id_buku
    AND anggota.id_anggota = transaksi.id_anggota
    AND transaksi.status_transaksi='Pengembalian'
    ORDER BY transaksi.id_transaksi DESC";
    $data = mysqli_query($koneksi, $query);
    foreach ($data as $pinjam) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $pinjam['nis'] ?></td>
        <td><?= $pinjam['nama_anggota'] ?></td>
        <td><?= $pinjam['judul_buku'] ?></td>
        <td><?= $pinjam['tgl_peminjaman'] ?></td>
        <td><?= $pinjam['tgl_pengembalian'] ?></td>
        <td>
            <?php
            $pesan = "Pengembalian buku oleh {$pinjam['nama_anggota']}, Buku {$pinjam['judul_buku']}";
            ?>
            <a onclick="pengembalian('<?= $pesan ?>','<?= $pinjam['id_transaksi'] ?>','<?= $pinjam['id_buku'] ?>')" class="btn btn-danger">
                Pengembalian
            </a>
            <?php
            $pesan = "Anda Yakin Ingin Menghapus Data {$pinjam['nama_anggota']}, Buku {$pinjam['judul_buku']}";
            ?>
            <a onclick="hapus('<?= $pesan ?>','<?= $pinjam['id_transaksi'] ?>','<?= $pinjam['id_buku'] ?>')" class="btn btn-danger">
                Hapus
            </a>
        </td>
    </tr>    
    <?php } ?>
</table>
<script>
    function pengembalian(pesan, id_transaksi, id_buku){
    if(confirm(pesan)){
        window.location.href = '?halaman=proses_pengembalian&id=' + id_transaksi + '&buku=' + id_buku;
    }
}

function hapus(pesan, id_transaksi, id_buku){
    if(confirm(pesan)){
        window.location.href = '?halaman=hapus&id=' + id_transaksi + '&buku=' + id_buku;
    }
}
</script>