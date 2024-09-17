<?php 

include("koneksi.php");

function tambah($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data ["nama"]);
    $password = htmlspecialchars($data ["password"]);
    $level = htmlspecialchars($data ["level"]);
    $email = htmlspecialchars($data ["email"]);
    $telepon = htmlspecialchars($data ["telepon"]);

    $query = "INSERT INTO tb_user (nama,password,level,email,telepon) VALUES
    ('$nama','$password','$level','$email','$telepon')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

?>