<?php

  include "../../config/koneksi.php";          
  if(!isset($_SESSION['username'])){
  header("location: login.php");
  }
  $detail_transaksi = "SELECT a.qty,a.id_barang from detail_transaksi as a where a.id = '".$_GET['id']."'";
  $query = mysqli_query($conn, $detail_transaksi);
  $result = mysqli_fetch_array($query);
  $stok = $result['qty'];
  $sql = " update barang set stok = stok   - '" . $stok. "' where id='" . $result['id_barang'] . "'";
  mysqli_query($conn, $sql);
  $sql = "delete from detail_transaksi where id=" . $_GET['id'];
  mysqli_query($conn, $sql);
  $response = array(
    'class'=>'success',
    'icon'=>'success',
    'msg'=>'Sukses menghapus transaksi',
  );
  echo json_encode($response);
  exit;

?>