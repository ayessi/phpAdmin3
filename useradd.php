<?php
require 'function.php';
?>
<?php
if(isset($_POST['submit'])){
$id = $_POST['id_admin'];
$us = $_POST['username'];
$pass = $_POST['password'];
$levl = $_POST['level'];

//enkripsi 
$enkr =  password_hash($pass, PASSWORD_DEFAULT);

//simpan ke database
mysqli_query($conn, "INSERT INTO login VALUES('','$id','$us','$enkr','$pass','$levl')");
//

if(mysqli_affected_rows($conn)){
    echo "
    <script>
    alert('Data tersimpan');
    document.location.href='userlist.php';
    </script>";
}
}
?>
<form action="" method="post">
    <div>
        <label for="id_admin">ID admin</label>
        <select name="id_admin" id="">
            <option value="">pilih</option>
            <?php
            foreach($admin as $row){
                ?>
                <option value="<?= $row['No'] ?>"><?= $row['Nama'] ?> </option>
                <?php
            }
            ?>
        </select>
        </div>
        <div>
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="">Level</label>
            <select name="level" id="">
                <option value="">pilih level</option>
                <option value="1">superadmin</option>
                <option value="2">admin</option>
            </select>
        </div>
        <div>
            <button type="submit" name="submit">simpan</button>
        </div>
</form>



