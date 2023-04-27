<?php

    include "../../config/koneksi.php";

    if(isset($_POST['id_transaksi']) || isset($_POST['id_barang']) || isset($_POST['qty'])){
        $sql = "select * from barang where id=" . $_POST['id_barang'];
        $result = mysqli_query($conn, $sql);
        $stok_barang = 0;
        $harga_barang = 0;
        while($row = mysqli_fetch_assoc($result)){
            $harga_barang = $row['harga'];
            $stok_barang = $row['stok'];
        }
        $total = $harga_barang * $_POST['qty'];
        $saldo_stok = $stok_barang - $_POST['qty'];
        $sql = "update barang set stok='" . $saldo_stok . "' where id='" . $_POST['id_barang'] . "'";
        mysqli_query($conn , $sql);
        $sql = "insert into detail_transaksi values (null,'" . $_POST['id_barang'] . "','" . $harga_barang . "','" . $_POST['qty'] . "','" . $total . "','" . $_POST['id_transaksi'] . "')";
        mysqli_query($conn , $sql);
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