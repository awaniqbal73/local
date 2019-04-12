<?php
session_start();


// cek cookie
if( isset($_COOKIE['login']) ){
    if( $_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}


if( isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}


require 'functions.php';

if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


    //cek username
    if( mysqli_num_rows($result) === 1 ){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ) {

            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if( isset($_POST['remember']) ){
                //buat cookie
                
                setcookie('login', 'true', time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    
</head>
<body>

<h1> Halaman Login </h1>

<?php if( isset($error) ): ?>
<p style="color:red">Username / Password Salah</p>
<?php endif; ?>

<form action="" method="post">

<ul>
    <li>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </li>
    <li>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"> 
    </li>
    <li>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </li>
</ul>

<button type="submit" name="login">Login</button>

</form>
    
</body>
</html>