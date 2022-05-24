<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <title>Data Barang</title>
    </head>
    <body>
        <div class="container">
            <h1 class="header">Data Barang</h1>
            <hr>
            <div class="main">
                <a href="tambah.php" class="add-item">Tambah Barang [+]</a>
                <table>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Katagori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if($result): ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><img src="gambar/<?= $row['gambar'];?>" alt="<?=
                        $row['nama'];?>" width="100" height="100"></td>
                        <td><?= $row['nama'];?></td>
                        <td><?= $row['kategori'];?></td>
                        <td><?= $row['harga_beli'];?></td>
                        <td><?= $row['harga_jual'];?></td>
                        <td><?= $row['stok'];?></td>
                        <td>
                            <p class="action"><a href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a></p>
                            <p class="action"><a href="hapus.php?id=<?= $row['id_barang'];?>">Hapus</a></p>
                            <p hidden><?= $row['id_barang'];?></hidden>
                        </td>
                    </tr>
                    <?php endwhile; else: ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </body>
</html>