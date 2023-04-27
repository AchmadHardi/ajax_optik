<?php

  include "../../config/koneksi.php";
      
  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
  $sql = "delete from barang where id=" . $_GET['id'];
  mysqli_query($conn, $sql);
  $response = array(
    'class'=>'success',
    'icon'=>'success',
    'msg'=>'Sukses menghapus barang',
  );
 
  echo json_encode($response);
  exit;

?>