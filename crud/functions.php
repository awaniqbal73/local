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
    $gambar = htmlspecialchars($data["gambar"]);
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



function ubah($data){
    global $conn;
    $no = $data["no"];
    $gambar = htmlspecialchars($data["gambar"]);
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