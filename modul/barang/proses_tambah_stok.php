<?php

    include "../../config/koneksi.php";

    if(isset($_POST['stok'])){
        $sql = " update barang set stok = stok + '" . $_POST['stok'] . "' where id='" . $_POST['id'] . "'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $response = array(
                'class'=>'success',
                'icon'=>'success',
                'msg'=>'Sukses menambah stok',
            );
        } else {
            
            $response = array(
                'class'=>'danger',
                'icon'=>'error',
                'msg'=>'Gagal menyimpan stok',
            );
        }   
    }
    echo json_encode($response);
    exit;
?>