<?php

//koneksi ke database
$conn = mysqli_connect("localhost","root","","dbbelajar");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc ($result) ) {
        $rows[] = $row;
    }
    return $rows;
}



function tambah($data){
    global $conn;
    //UPLOD GAMBAR
    $gambar = upload();
    if (!$gambar){
        return false;
    }
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //query insert data
    $query = "INSERT INTO tabelbelajar
                VALUES
                ('','$gambar','$nrp','$nama','$email','$jurusan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete($no) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tabelbelajar WHERE no = $no");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    //cek apakah yang di upload gambar
    $ekstensiGambarValid =['jpg','jpeg','png'];
    $ekstensiGambar = explode ('.',$namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('yang di upload bukan gambar');
        </script>";
    return false;
    }


    //cek jika ukuran file gambar erlalu besar
    if( $ukuranFile > 1000000){
        echo "<script>
        alert('ukuran terlalu besar');
        </script>";
    return false;
    }

    //lolos pengecekan, gambar siap di upload
    //generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .= $ekstensiGambar;
   


    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;

}



function ubah($data){
    global $conn;
    $no = $data["no"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //cek apakah usert memilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //query UPDATE  data
    $query = "UPDATE tabelbelajar SET
            gambar='$gambar',
            nrp ='$nrp', 
            nama='$nama',
            email='$email',
            jurusan='$jurusan'
        
        WHERE no=$no
            ";


    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}


function cari($keyword) {
    $query ="SELECT * FROM tabelbelajar
    WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    jurusan Like '%$keyword%'
    ";

    return query($query);
}

?>