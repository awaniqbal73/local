<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require'functions.php';
//cek apakah tomboh submit sudah ditekan atau belum
if(isset($_POST["submit"])){




    //cek data berhasih di tambah atau tidak
  if( tambah($_POST) > 0) {
        echo"
            <script>
            alert('data berhasil ditambahakan');
            document.location.href='index.php';
            </script>
        ";
  } else {
      echo "
            <script>
            alert('data gagal ditambahakan');
            document.location.href='tambah.php';
            </script>
      ";
  }
    
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tmbah data Mahasiswa</title>
</head>
<body>
    <h1> Tmbah Data  </h1>
    <form action="" method="post" enctype="multipart/form-data" >
        <ul>
            <li>
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="nrp"> NRP</label>
                <input type="text" name="nrp" id="nrp">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email"> Email</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan"> Jurusan</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>


    </form>


</body>
</html>