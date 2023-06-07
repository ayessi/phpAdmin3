<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';
$adm = query("SELECT * FROM login");
?>
<?php 
include('head.php')
?>
            <a href="useradd.php" target="_blank"><button class="button2">Tambah</button></a>
            <div>
            <table class="tabel2">
                <h6>
                <tr>
                            <th>No</th>
                            <th>id admin</th>
                            <th>username</th>
                            <th>password</th>
                            <th>aksi</th>
                            <th>level</th>
                            </tr>

        <?php foreach( $adm as $row ) : ?>
                <tr>
                    <td><?= $row['id_login']; ?></td>
                    <td> <?= $row['id_admin']; ?></td>
                    <td><?= $row['username']; ?> </td>
                    <td><?= $row['password']; ?> </td>
                    <td><?= $row['level']; ?> </td>
                    <td>
                        <a>Edit</a> |
                        <a>Delete</a>
                    </td>
                </tr>
                        <?php endforeach; ?>
    </h6>
</table>
</body>
</html>