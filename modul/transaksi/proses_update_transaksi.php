<?php

    include "../../config/koneksi.php";
    
    if(isset($_POST['id']) ||isset($_POST['nama']) || isset($_POST['alamat'])){
        $sql = " update transaksi set nama='" . $_POST['nama'] . "' , alamat='" . $_POST['alamat'] . "' where id='" . $_POST['id'] . "'";
        mysqli_query ($conn, $sql);
        $response = array(
            'class'=>'success',
            'icon'=>'success',
            'msg'=>'Sukses mengubah transaksi',
        );
    }else{
        $response = array(
            'class'=>'danger',
            'icon'=>'error',
            'msg'=>'Gagal mengubah transaksi',
        );
    }
    echo json_encode($response); // mencetak array $response dengan bentuk json
    exit;
?>