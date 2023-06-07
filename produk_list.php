<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';
$adm = query("SELECT * FROM Produk_list");
?>
<?php 
include('head.php')
?>
             <a href="produkadd.php" target="_blank">
<button class="button4">Tambah</button></a>
       
       <div>
       <table class="tabel4">
           <h6>
           <tr>
               <th>No</th>
               <th>Nama Produk</th>
               <th>Harga</th>
               <th>Stok</th>
               <th>Tanggal Exp</th>
               <th>Jenis Produk</th>
               <th>Foto</th>
               <th>Aksi</th>
           </tr>
           <?php foreach( $adm as $row ) : ?>
                <tr>
                    <td><?= $row['no']; ?></td>
                    <td> <?= $row['nama_produk']; ?></td>
                    <td><?= $row['harga']; ?> </td>
                    <td><?= $row['stok']; ?> </td>
                    <td><?= $row['tanggal_exp']; ?> </td>
                    <td><?= $row['jenis_produk']; ?> </td>
                    <td>  <img class="foto4" src="img/<?= $row['foto'];?>"> </td>
                    <td> 
                    <a href="ubahproduk.php?no=<?= $row['no'];?>">Edit</a> |
                        <a href="">Delete</a>  
                </td>
                </tr>
                        <?php endforeach?>
    </h6>
     </table>
      </body>
      </html>