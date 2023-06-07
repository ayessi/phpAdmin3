<?php
session_start();
if( !isset($_SESSION["login"])){
            header("Location: login1.php"); exit;
}
require 'function.php';
$id = $_GET["id_login"];
if(hapususr($id) > 0 ){
            echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = 'userlist.php';
            </script>
            ";
}else {
            echo "
            <script>
            alert('data gagal dihapus');
            document.location.href = 'userlist.php';
            </script>
            ";
}
?>