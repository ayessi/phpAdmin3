<?php
session_start();
if ( !isset($_SESSION["login"])) {
            header("Location:login1.php"); exit;
}
require 'function.php';
$no = $_GET["no"];
if( hapusprdk($no) > 0){
            echo "
            <script>
            alert('data berhasil dihapus');
            document.location.href = 'produk_list.php';
            </script>
            ";
} else {
            echo "
            <script>
            alert('data gagal dihapus');
            document.location.href = 'produk_list.php';
            </script>
            ";
}
?>