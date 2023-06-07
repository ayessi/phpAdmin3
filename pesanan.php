<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';
$adm = query("SELECT * FROM pesanan");
?>
<?php 
include('head.php')
?>
             <a href="#" target="_blank">
<button class="button">Tambah</button></a>
       
       <div>
       <table class="tabel3">
           <h6>
           <tr>
            <th>No</th>
               <th>Nama Pemesan</th>
               <th>Produk</th>
               <th>Jumlah</th>
               <th>Harga</th>
               <th>Total</th>
               <th>Status</th>
               <th>Aksi</th>
           </tr>
           <?php foreach( $adm as $row ) : ?>
                <tr>
                    <td><?= $row['no']; ?></td>
                    <td> <?= $row['nama_pemesan']; ?></td>
                    <td><?= $row['produk']; ?> </td>
                    <td><?= $row['jumlah']; ?> </td>
                    <td><?= $row['harga']; ?> </td>
                    <td><?= $row['total']; ?> </td>
                    <td><?= $row['status']; ?> </td>
                    <td>
                        <a href="">Edit</a> |
                        <a href="">Delete</a>
                    </td>
                </tr>
                        <?php endforeach; ?>
    </h6>
     </table>
      </body>
      </html>