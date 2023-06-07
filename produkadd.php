<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}

$conn = mysqli_connect("localhost","root","","kelanahaha");

if( isset($_POST["submit"])){


$nama_produk = $_POST["nama_produk"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];
$tanggal_exp = $_POST["tanggal_exp"];
$jenis_produk = $_POST["jenis_produk"];
$foto = $_POST["foto"];


$query = "INSERT INTO produk_list
          VALUES
          ('','$nama_produk','$harga','$stok','$tanggal_exp','$jenis_produk','$foto')
          ";
mysqli_query($conn, $query);


}

?>
<?php 
include('head.php')
?>
       <div class="main5">
      <div class="header5">

        <h3>
 PRODUK ADD </h3>
</div>

<form action="" method="post">
    <div class="box5">
      <input type="text" name="nama_produk" id="nama_produk" placeholder="Nama Produk"/>
      <input type="text" name="harga" id="harga"placeholder="Harga"/>
      <input type="text" name="stok" id="stok" placeholder="Stok" />
      <input type="text" name="tanggal_exp" id="tanggal_exp" placeholder="Tanggal Exp"/>
      <input type="text" name="jenis_produk" id="jenis_produk" placeholder="Jenis Produk"/>
      <input placeholder="Foto" type="file" name="foto" id="foto" tabindex="2" required>

</div>
   <br>
        <center>
            <a href="#" target="_blank">
<button type="submit" name="submit" class="button5">Done</button></a>
</center>
<br>
</div>
</div>
       
       
       
       
       
       
    </body>
</html>