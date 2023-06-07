<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';

$conn = mysqli_connect("localhost","root","","kelanahaha");

if( isset($_POST["submit"])){



if( tambah($_POST) > 0 ) {
    echo "
    <script>
    alert('data berhasil ditambahkan!');
    document.location.href = 'adminlist.php';
    </script>
    ";

} else {
    echo "
    <script>
    alert('data gagal ditambahkan!');
    document.location.href = 'adminlist.php';
    </script>
    ";
}


if(mysqli_affected_rows($conn) > 0 ) {
    echo "berhasil";
} else {
    echo "gagal!";
    echo "<br>";
    echo mysqli_error($conn);
}

}

?>
<?php 
include('head.php')
?>

<link rel="stylesheet" href="adminadd.css">
    <div class="add1">
    <div class="add2">

        <h3>
ADMIN ADD </h3>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <div class="box1">
    <input type="text" name="nama" id="nama" placeholder="Nama" tabindex="2" required/>
    <input placeholder="Jenis Kelamin" type="text" name="jk" id="jk" tabindex="2" required>
    <input type="text" name="alamat" id="alamat" placeholder="Alamat" tabindex="2" required/>
      <input placeholder="No hp" type="text" name="nohp" id="nohp" tabindex="3" required>
      <input placeholder="Email" type="text" name="email" id="email" tabindex="2" required>
      <input placeholder="Foto" type="file" name="foto" id="foto" tabindex="2" required>
 </div>
        <center>
            <a href="#" target="_blank">
 <button type="submit" name="submit" class="button1">Done</button></a>
 </center>
 <br>
 </div>
 </div>
    </body>
 </html>