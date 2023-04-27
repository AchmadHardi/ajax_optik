<?php

    include "../../config/koneksi.php";
    if(isset($_POST['id']) ||isset($_POST['username']) || isset($_POST['alamat'])|| isset($_POST['level'])){
        $sql = " update user set username='" . $_POST['username'] . "' , alamat='" . $_POST['alamat'] . "', level='" . $_POST['level'] . "' where id='" . $_POST['id'] . "'";
        mysqli_query ($conn, $sql);
        $response = array(
            'class'=>'success',
            'icon'=>'success',
            'msg'=>'Sukses mengubah user',
        );
    }else{
        $response = array(
            'class'=>'danger',
            'icon'=>'error',
            'msg'=>'Gagal mengubah user',
        );
    }
    echo json_encode($response); // mencetak array $response dengan bentuk json
    exit;
?>