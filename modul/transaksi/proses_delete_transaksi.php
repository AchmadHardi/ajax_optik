<?php

  include "../../config/koneksi.php";            
  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
  $sql = "delete from transaksi where id=" . $_GET['id'];
  mysqli_query($conn, $sql);
  $response = array(
    'class'=>'success',
    'icon'=>'success',
    'msg'=>'Sukses menghapus transaksi',
  );
  echo json_encode($response);
  exit;
?>