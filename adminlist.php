<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';
$adm = query("SELECT * FROM admin_list");
?>
<?php 
include('head.php')
?>
             <a href="adminadd.php" target="_blank"><button class="button2">Tambah</button></a>
       <div>
       <table class="tabel2">
           <h6>
           <tr>
            <th>No</th>
               <th>Nama</th>
               <th>Jenis Kelamin</th>
               <th>Alamat</th>
               <th>No Handphone</th>
               <th>Email</th>
               <th>Foto</th>
               <th>Aksi</th>
           </tr>

           <?php foreach( $adm as $row ) : ?>
                <tr>
                    <td><?= $row['no']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jenis_kelamin']; ?> </td>
                    <td><?= $row['alamat']; ?> </td>
                    <td><?= $row['no_hp']; ?> </td>
                    <td><?= $row['email']; ?> </td>
                    <td>  <img class="foto2" src="img/<?= $row['foto']; ?>"> </td>
                    <td>
                        <a href="ubah.php?no=<?= $row['no'];?>">Edit</a> |
                        <a href="hapus.php?no=<?= $row['no'];?>">Delete</a>
                    </td>
                </tr>
                        <?php endforeach; ?>
    </h6>
     </table>
      </body>
      </html>