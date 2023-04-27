<?php

    include "../../config/koneksi.php";

    if(isset($_POST['id'])||isset($_POST['nama_barang']) || isset($_POST['deskripsi'])|| isset($_POST['harga'])){
        $sql = " update barang set nama_barang='" . $_POST['nama_barang'] . "' , deskripsi='" . $_POST['deskripsi'] . "' , harga='" . $_POST['harga'] . "' where id='" . $_POST['id'] . "'";
        mysqli_query ($conn, $sql);
        $response = array(
            'class'=>'success',
            'icon'=>'success',
            'msg'=>'Sukses mengubah barang',
        );
        }else{
            $response = array(
                'class'=>'danger',
                'icon'=>'error',
                'msg'=>'Gagal mengubah barang',
            );
        }
        echo json_encode($response);
        exit;
?>