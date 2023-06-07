<?php
session_start();
require 'function.php';


//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if( $key === hash('sha256', $row ['username'])){
        $_SESSION['login'] = true;
    }

}
if( isset($_SESSION["login"])){
    header("Location: adminlist.php");
    exit;
}

if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                // set session
                $_SESSION["login"] = true;

                //cek remember me
                if( isset($_POST['remember']) ) {
                    //buat cookie

                    setcookie('id', $row['id'], time()+60);
                    setcookie('key', hash('sha256', $row['username']),
                time()+60);
                }


                header("Location: index.php");
                exit;
            }
        }
        $error = true;

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lore.css">
    <title>Halaman Login</title>
</head>
<body>

<div class="login-box">
    <h2>Halaman Login</h2>
    <?php if( isset($error)) : ?>
        <p>SALAH BRO !!!</p>
        <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li  class="user-box">
                <input type="text" name="username" id="username" required="">
                <label for="username">username</label>
            </li>
            <li  class="user-box">
                <input type="password" name="password" id="password" required="">
                <label for="password">Password</label>
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label style="color: white;" for="remember">Remember me</label>
            </li>
            <li>
                <!-- <button type="submit" name="login"> -->
                <button type="submit" name="login">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Submit
        </button>
            </li>
</ul>


</form>
</div>
</body>
</html>