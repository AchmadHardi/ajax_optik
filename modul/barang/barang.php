<?php

    include "../../config/koneksi.php";
    
    if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    include "../../pages/header.php";
    include "../../pages/sidebar.php";
    include "../../pages/navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Table Karyawan</title>

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>   
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    function swal_delete(id) {
        Swal.fire({
            title: 'Hapus Barang?',
            icon    : 'question',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.get(
                'proses_delete_barang.php?id=' + id,
                function(data){
                var data = jQuery.parseJSON(data); 
                Swal.fire( {
                    title   : '',
                    text    : data.msg,
                    icon    : data.icon,
                    }).then(function() {
                    if(data.class == 'success'){
                        window.location = "barang.php"; 
                    }
                });        
                console.log(data)
                }
                ); 
            }
        })
    }
</script>
</head>
<a class="btn btn-primary col-auto mt-3 mb-3" href="tambah_barang.php" role="button" >Tambah</a>
<body id="page-top">
    <table id="datatables"  class="table table-hover">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Stok</th>
              <th scope="col">Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "select * from barang";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_assoc($result)) :
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_barang']?></td>
                <td><?php echo $row['deskripsi']?></td>
                <td>Rp. <?php echo number_format($row['harga'])?></td>
                <td><?php echo $row['stok']?></td>
                <td>
                <?php if ($_SESSION['level']=='admin'): ?> 
                    <a class="btn btn-primary" href="tambah_stok.php?id=<?=$row['id']?> " role="button"><i class="fas fa-plus-square"></i></a>  
                    <a class="btn btn-success" href="update_barang.php?id=<?=$row['id']?> " role="button"><i class="fa fa-pen"></i></a>
                    <a class="btn btn-danger delete" data-id="<?=$row['id']?>" onclick="swal_delete(<?=$row['id']?>)"><i class="fa fa-trash"></i></a>          
                    <?php endif ?>
                    </td>
            </tr>
            <?php 
                endwhile; 
                }else {
            ?>
            <tr>
                <td colspan="5">Data tidak ada</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#datatables').DataTable({
                order: [[0  , "desc"]]
            });        
        });
    </script>
</body>
</html>
