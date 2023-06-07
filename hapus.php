<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login1.php"); exit;
}
require 'function.php';

$no = $_GET["no"];
if( hapus($no) > 0 ){

    echo " 
    <script> 
    alert('data berhasil dihapus');
    document.location.href = 'adminlist.php';
    </script>
    ";
} else {
    echo " 
    <script> 
    alert('data gagal dihapus');
    document.location.href = 'adminlist.php';
    </script>
    ";
}


?>