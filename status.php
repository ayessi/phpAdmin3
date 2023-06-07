<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
include('head.php')
?>
       <div class="main6">
      <div class="header6">
        <h3>
 ADMIN ADD </h3>
</div>

<div class="kiri6">
    <h2>Nama Pemesan</h2> 
    <h2>Alamat Pemesan</h2>
    <br>
    <h2>Produk</h2> 
    <h2>Qty</h2> 
    <h2>Harga</h2> 
    <h2>Biaya Kirim</h2> 
    <h2>Total Bayar</h2> 
    <h2>Bukti Pemesanan</h2> 
    </div>
<div class="kanan6">
    <h2>: Samsoel Arif</h2>
    <br>
    <h2>: JI.Mochamad Hatta RT/RW 001/017 Kp.Benda, Ds.Babakan New Kota.Tasikmalaya</h2>
    <br>
    <h2>: Cheese Cake</h2>
    <br>
    <h2>: 20</h2> 
    <br>
    <h2>: Rp.5000</h2> 
    <br>
    <h2>: Rp.15000</h2> 
    <br>
    <h2>: Rp.115000</h2> 
    <br>
    <h2>: </h2> 
    
    
 <img class="klm6" src="bank.jpg">
    
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</div>
       
       
       
       
       
       
    </body>
</html>