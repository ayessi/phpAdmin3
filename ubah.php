<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';

$no = $_GET["no"];

$mrid = query("SELECT * FROM admin_list WHERE no = $no")[0];

// $conn = mysqli_connect("localhost","root","","kelanahaha");

if( isset($_POST["submit"])){

if( ubah($_POST) > 0 ) {
    echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href = 'adminlist.php';
    </script>
    ";

} else {
    echo "
    <script>
    alert('data gagal diubah!');
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
<!DOCTYPE html>

      <div class="add1">
      <div class="add2">

        <h3>
 ADMIN UPDATE </h3>
</div>

<form action="" method="post">
    <input type="hidden" name="no" value="<?= $mrid["no"]; ?>">
    <div class="box1">
      <input type="text" name="nama" id="nama" placeholder="Nama" tabindex="1" required value="<?= $mrid["nama"];?>">
      <input placeholder="Jenis Kelamin" type="text" name="jk" id="jk" tabindex="2"  value="<?= $mrid["jenis_kelamin"];?>">
      <input type="text" name="alamat" id="alamat" placeholder="Alamat" tabindex="3" value="<?= $mrid["alamat"];?>">
      <input placeholder="No hp" type="text" name="nohp" id="nohp" tabindex="4" value="<?= $mrid["no_hp"];?>">
      <input placeholder="Email" type="text" name="email" id="email" tabindex="5" value="<?= $mrid["email"];?>">
      <input placeholder="Foto" type="text" name="foto" id="foto" tabindex="6" value="<?= $mrid["foto"]; ?>">
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