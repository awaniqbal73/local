<?php

require'functions.php';


//ambil data di URL 
$no=$_GET["no"];

//Query data berdasarkan nomer
$mhs=  query ("SELECT * FROM tabelbelajar  WHERE no = $no")[0];


//cek apakah tomboh submit sudah ditekan atau belum
if(isset($_POST["submit"])){

    


    //cek data berhasih di Ubah atau tidak
  if( ubah($_POST) > 0) {
        echo"
            <script>
            alert('data berhasil ubah');
            document.location.href='index.php';
            </script>
        ";
  } else {
      echo "
            <script>
            alert('data gagal ubah');
            document.location.href='ubah.php';
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
    <title>Ubah data Mahasiswa</title>
</head>
<body>
    <h1> Tmbah Data  </h1>
    <form action="" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="no" value="<?= $mhs["no"];?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>">
        <ul>
            <li>
                <label for="gambar">gambar</label><br>
                <img src="img/<?= $mhs['gambar']; ?>" width="60"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="nrp"> NRP</label>
                <input type="text" name="nrp" id="nrp" 
                value="<?=$mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama"
                value="<?=$mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email"> Email</label>
                <input type="text" name="email" id="email"
                value="<?=$mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan"> Jurusan</label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?=$mhs["jurusan"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>


    </form>


</body>
</html>