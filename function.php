<?php
$conn = mysqli_connect("localhost","root","","kelanahaha" );
$admin = mysqli_query($conn,"SELECT * FROM admin_list");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;

    }
    return $rows;
}

function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $nohp = htmlspecialchars($data["no_hp"]);
    $email = htmlspecialchars($data["email"]);
    
    $foto = upload();
    if( !$foto ) {
        return false;
    }


$query = "INSERT INTO admin_list
          VALUES
          ('','$nama','$jk','$alamat','$nohp','$email','$foto')
          ";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}
//Upload
function upload() {
    $namaFaile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    if( $error === 4 ) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

$ekstensiGambarValid = ['jpg','jpeg','png'];
$ekstensiGambar =explode('.', $namaFaile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
echo "<script>
alert('yang anda upload bukan gambar!');
</script>";
return false;
}
 

if( $ukuranFile > 9999999 ) {
    echo "<script>
    alert('ukuran gambar terlalu besar!');
    </script>";
    return false; 
}


$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
return $namaFileBaru;


}
//Hapus
function hapus($no){
    global $conn;
    mysqli_query($conn, "DELETE FROM admin_list WHERE no = $no");
    return mysqli_affected_rows($conn);
}




//Ubah

function ubah($data){
    global $conn;
    $no = $data["no"];
    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jk"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $email = htmlspecialchars($data["email"]);
    $foto = htmlspecialchars($data["foto"]);
    
    
    $query = "UPDATE admin_list SET
            nama = '$nama',
            jk = '$jk',
            alamat = '$alamat',
            nohp = '$nohp',
            email = '$email',
            foto = '$foto'
            WHERE no = $no
            ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    }


    function ubahperoduk($data){
        global $conn;
        $no = $data["no"];
        $nama = htmlspecialchars($data["nama_produk"]);
        $jk = htmlspecialchars($data["harga"]);
        $alamat = htmlspecialchars($data["stok"]);
        $nohp = htmlspecialchars($data["tanggal_exp"]);
        $email = htmlspecialchars($data["jenis_produk"]);
        $foto = htmlspecialchars($data["foto"]);
        
        
        $query = "UPDATE produk_list SET
                nama_produk = '$nama_produk',
                harga = '$harga',
                stok = '$stok',
                tanggal_exp = '$tanggal_exp',
                jenis_produk = '$jenis_produk',
                foto = '$foto'
                WHERE no = $no
                ";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
        }


        function registrasi($data) {
            global $conn;
        
            $username = strtolower(stripslashes($data["username"]));
            $password = mysqli_real_escape_string($conn, $data["password"]);
            $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        
            if( $password !== $password2 ) {
                echo "<script>
                alert('PASSWORD TIDAK SESUAI');
                </script>";
                return false;
            }

            //username udah ada atau belum
            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

            if( mysqli_fetch_assoc($result) ) {
                echo "<script>
                alert('SUDAH ADA');
                </script>";
                return false;
            }



            // enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // tambahkan userbaru ke database
            mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

            return mysqli_affected_rows($conn);

        }





?>