<?php 

include 'koneksi.php' ;

session_start();

$username = $_POST['nama'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE nama='$username' AND password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_assoc($login);
    if($data ['level']=="admin"){
        header("location:das.admin.php");
    }else if($data ['level']=="user"){
        header("location:das.user.php");
    }else if($data ["level"]== "guru"){
        header("location:das.guru.php");
    }else{
        header("location:leveltidakada.php");
    }
}else {
    header("location:tidak.php");
}

?>