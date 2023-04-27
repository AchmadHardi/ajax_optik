<?php

    include "../../config/koneksi.php";

    if(isset($_POST['nama_barang']) || isset($_POST['deskripsi'])|| isset($_POST['harga'])|| isset($_POST['stok'])){
        $sql = "insert into barang values (null,'" . $_POST['nama_barang'] . "','" . $_POST['deskripsi'] . "','" . $_POST['harga'] . "','" . $_POST['stok'] ."')";
        mysqli_query($conn, $sql);
         $response = array(
            'class'=>'success',
            'icon'=>'success',
            'msg'=>'Sukses menyimpan transaksi',
        );
        }else{
            $response = array(
                'class'=>'danger',
                'icon'=>'error',
                'msg'=>'Gagal menyimpan transaksi',
            );
        }
        echo json_encode($response); 
       exit;
?>