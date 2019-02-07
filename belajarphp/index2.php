<?php
$conn = mysqli_connect("localhost","root","","dbbelajar");

//ambil data dari table tablebelajar
$result = mysqli_query($conn, "SELECT * FROM tabelbelajar");
// cek hasil var_dump ($result);

//ambil data dari data tabel belajar dari result (istilahnya fetch)
//1 mysqli_fetch_row()   // Fungsinya Mengembalikan nilai numerik ["1"]
//2 mysqli_fetch_assoc() // mengembalikan array assositif  ["nrp"]
//3 mysqli_fetch_array() //  mengembalikan keduanya (double data)["1"] / ["nrp"]
//4 mysqli_fech_object() // memangil object ->nrp

//while( $blj = mysqli_fetch_assoc($result) ){
//var_dump($blj);
//}
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
    <?php while($row =mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="">Ubah</a>
            <a href="">delete</a>
        </td>
        <td><img src="img/<?= $row["gambar"];?>" alt="" style="width:50px;"></td>
        <td><?= $row["nrp"];?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["jurusan"];?></td>
    </tr>
    <?php $i++; ?>
<?php endwhile; ?>
    </table>
</body>
</html>