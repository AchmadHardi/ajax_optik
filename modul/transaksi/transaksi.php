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
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>   
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    function swal_delete(id) {
        Swal.fire({
            title: 'Hapus Transaksi?',
            icon    : 'question',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.get(
                'proses_delete_transaksi.php?id=' + id,
                function(data){
                var data = jQuery.parseJSON(data); 
                Swal.fire( {
                    title   : '',
                    text    : data.msg,
                    icon    : data.icon,
                    }).then(function() {
                    if(data.class == 'success'){
                        window.location = "transaksi.php"; 
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
<body id="page-top">
    <div class="row m-3">
        <div class="col-12">
            <a class="btn btn-primary col-auto mt-3 mb-3" href="tambah_transaksi.php" role="button" >Tambah</a>
            <table id="datatables"  class="table table-hover">
                <thead>
                    <th scope="col">No</th>
                    <th width="18%" scope="col">Kode Transaksi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal</th>
                    <th width="20%"sscope="col">Total</th>
                    <th width="18%" scope="col">Fungsi</th>
                </thead>
                <tbody>
                    <?php  
                        $sql = "select a.id,a.nama,a.alamat,a.tanggal,sum(b.total) as total from transaksi as a left join detail_transaksi as b on a.id=b.id_transaksi group by a.id,a.nama,a.alamat,a.tanggal";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        if(mysqli_num_rows($result) > 0 ){

                        while($row = mysqli_fetch_assoc($result)) :

                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['nama']?></td>
                        <td><?php echo $row['alamat']?></td>
                        <td><?php echo $row['tanggal']?></td>
                        <td>Rp. <?php echo number_format($row['total'])?></td>

                        <td>
                            <?php if(date('Y-m-d') == $row['tanggal']): ?> 
                            <a class="btn btn-primary" href="detail_transaksi.php?id=<?=$row['id']?>" role="button"><i class="fab fa-cc-amazon-pay"></i></a> 
                            <?php endif ?>
                            <?php if ($_SESSION['level']=='admin'): ?> 
                            <a class="btn btn-success" href="update_transaksi.php?id=<?=$row['id']?> "role="button"><i class="fa fa-pen"></i></a>
                            <?php endif ?>
                            <?php if ($_SESSION['level']=='kabag'): ?> 
                            <a class="btn btn-danger delete" data-id="<?=$row['id']?>" onclick="swal_delete(<?=$row['id']?>)"><i class="fa fa-trash"></i></a>  
                            <?php endif ?>         
                        </td>
                    </tr>
                    <?php 
                            endwhile; 
                        }else {
                    ?>
                    <tr>
                        <td colspan="6">Data tidak ada</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
         $(document).ready(function(){
            $('#datatables').DataTable({
                order: [[3, "desc"]]
            });    
        });
    </script>
</body>
</html>