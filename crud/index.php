<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM tabelbelajar")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tmbah Data Mahaiswa</a>
<br>
<br>
    <table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>no</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i = 1;?>
    <?php foreach( $mahasiswa as $row ) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="">Ubah</a>
            <a href="delete.php?no=<?= $row["no"];?>" onclick="return confirm('Apa yakin di hapus?');">delete</a>
        </td>
        <td><img src="img/<?= $row["gambar"];?>" alt="" style="width:50px;"></td>
        <td><?= $row["nrp"];?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["jurusan"];?></td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
    </table>
</body>
</html>