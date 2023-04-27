<?php
    include "../../config/koneksi.php";
    if(isset($_POST['nama'])|| isset($_POST['alamat'])|| isset($_POST['tanggal'])){
        $sql = "insert into transaksi values (null,'" . $_POST['nama'] . "','" . $_POST['alamat'] . "','" . $_POST['tanggal'] ."')";
        mysqli_query($conn, $sql);
        // echo "<br>";
        // echo "Simpan data transaksi berhasil. <a href='transaksi.php'>Kembali</a>";
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
        echo json_encode($response); // mencetak array $response dengan bentuk json
        exit;
?>