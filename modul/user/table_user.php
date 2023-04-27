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
</head>
<body id="page-top">    
    <?php if ($_SESSION['level']=='kabag'): ?>             
        <a class="btn btn-primary col-auto mt-3 mb-3" href="tambah_user.php" role="button" >Tambah</a>   
    <?php endif ?>   
    <table  id="datatables"  class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Alamat</th>
                <th scope="col">Level</th>
                <th scope="col">Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "select * from user";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_assoc($result)) :
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['alamat']?></td>
                <td><?php echo $row['level']?></td>
                <td>
                    <a class="btn btn-warning" href="update_user.php?id=<?=$row['id']?>" role="button"><i class="fa fa-pen"></i></a>
                    <?php if ($_SESSION['level']=='kabag'): ?> 
                    <a class="btn btn-danger delete" data-id="<?=$row['id']?>"><i class="fa fa-trash"></i></a>    
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
            $('#datatables').DataTable();  
            $(".delete").click(function(){ 
                    Swal.fire({
                    title: 'Hapus user?',
                    icon    : 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.get(
                        'proses_delete_user.php?id=' + $(this).attr("data-id"),
                        function(data){
                            var data = jQuery.parseJSON(data); 
                            Swal.fire( {
                                title   : '',
                                text    : data.msg,
                                icon    : data.icon,
                            }).then(function() {
                                if(data.class == 'success'){
                                    window.location = "table_user.php"; 
                                }
                            });
                    
                                console.log(data)
                            }
                        ); 
                    }
                })
            })
        })         
    </script>
</body>
</html>
