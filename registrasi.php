<?php
session_start();
if(!isset($_SESSION['login'])) {
            header("Location: login1.php"); exit;
}
require 'function.php';

if( isset($_POST['register'])){
if(registrasi($_POST) > 0){
            echo "<script>
            alert('user baru berhasil ditambahkan!');
            </script>";
}else {
echo mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="log.css">
            <title>Halaman Registrasi</title>
            <style>
                        label {
                                    display : block;
                        }
            </style>
</head>
<body>
<div class="login-box">
<h2>Halaman Registrasi</h2>
<form action="" method="post">
            <ul>
                        <li class="user-box">
                                    <input type="text" name ="username" id="username" required="">
                                    <label for="username">Username</label>
            </li>
            <li class="user-box">
                        <input type="password" name="password" id="password" required="">
                        <label for="password">Password</label>
            </li>
            <li class="user-box">
                        <input type="password" name="password2" required="">
                        <label for="password2">Konfirmasi Password</label>
            </li>
            <li><button type="submit" name="register">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        GAS
            </button>
            </li>
            </ul>
            </form>
</body>
</html>