<?php

    include "../../config/koneksi.php";
    if(isset($_POST['username']) || isset($_POST['alamat'])|| isset($_POST['password'])|| isset($_POST['level'])){
        // untuk validasi supaya tidak sama inputan username
        $sql = "select * from user where username='" . $_POST['username'] . "'";
        $result = mysqli_query($conn, $sql);
         if(mysqli_num_rows($result) > 0){
            die("username sudah ada , silakan ganti username anda");
        }
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql = "insert into user (username,password,alamat,level) values ('" . $_POST['username'] . "' , '" . $password_hash  .  "' , '" . $_POST['alamat'] . "', '" . $_POST['level'] . "')";
        $result = mysqli_query($conn, $sql); 
        $response = array(
            'class'=>'success',
            'icon'=>'success',
            'msg'=>'Sukses menyimpan user',
        );
    }else{
        $response = array(
            'class'=>'danger',
            'icon'=>'error',
            'msg'=>'Gagal menyimpan user',
        );
    }
    echo json_encode($response); // mencetak array $response dengan bentuk json
    exit;
?>