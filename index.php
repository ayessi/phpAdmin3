<?php
session_start();
if( !isset($_SESSION["login"])){
            header("Location: login1.php"); exit;
}
require 'function.php';
$adm = query("SELECT * FROM pesanan");
?>
<?php
include('head.php')
?>
<div>
</body>
</html>