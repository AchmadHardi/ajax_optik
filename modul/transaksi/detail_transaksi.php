<?php

    include "../../config/koneksi.php";              
    if(!isset($_SESSION['username'])){
    header("location: login.php");
    }
    include "../../pages/header.php";
    include "../../pages/sidebar.php";
    include "../../pages/navbar.php";    
?>
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
                'proses_delete_detail_transaksi.php?id=' + id, 
                function(data){
                var data = jQuery.parseJSON(data); 
                Swal.fire( {
                    title   : '',
                    text    : data.msg,
                    icon    : data.icon,
                    }).then(function() {
                    if(data.class == 'success'){
                        window.location = "detail_transaksi.php?id=<?php echo $_GET['id'] ?>"; 
                    }
                });        
                console.log(data)
                }
                ); 
            }
        })
    }
</script>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice Transaction</h2>
    		</div>
                <a class="btn btn-danger" href="transaksi.php" role="button"><i class="fa fa-chevron-circle-left"></i> Back Transaksi </a> 
                <a class="btn btn-primary" href="print.php?id=<?=$_GET['id']?>" role="button"><i class="fa fa-print"></i> Print </a>
            <hr>
    		<div class="row">
    			
    			<div class="col-xs-6 text-right">
        			<h4><strong>Shipped To:</strong><br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<h4><strong>Payment Method:</strong><br></h4>
    					<h4>Visa ending **** 4242<br></h4>
    					<h4>Optik_Merpati@email.com</h4>
    				</address>
                    <a class="btn btn-primary col-auto mt-3" href="tambah_detail_transaksi.php?id=<?php echo $_GET['id'] ?>" role="button" >Tambah</a>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2023<br><br>
    				</address>
    			</div>
    		</div>
    	</div>   
    </div>   
</div>     
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Latihan DataBase</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <table  class="table table-hover">
        <thead>
            <tr>
              <th scope="col" >No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">QTY</th>
              <th scope="col">Total</th>
              <th scope="col">Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT a.id,b.nama_barang,a.harga_satuan,a.qty,a.total,a.id as id_detail from detail_transaksi as a inner join barang as b on a.id_barang=b.id  where a.id_transaksi = '".$_GET['id']."'";
            $result = mysqli_query($conn, $sql);

            if($result){
            $i=1;
            $total = 0;
            while($row = mysqli_fetch_assoc($result)) :
            $total = $total + $row['total'];
            ?>
            <tr>
                <td><?php echo $i++?></td>
                <td><?php echo $row['nama_barang']?></td>
                <td>Rp. <?php echo number_format($row['harga_satuan'])?></td>
                <td><?php echo $row['qty']?></td>
                <td>Rp. <?php echo number_format($row['total'])?></td>
                <td>
                    <?php if ($_SESSION['level']=='admin'): ?> 
                    <a class="btn btn-danger delete"  data-id="<?=$row['id']?>" onclick="swal_delete(<?=$row['id']?>)"><i class="fa fa-trash"></i></a>  
                    <?php endif ?>
                </td>
            </tr>
            <?php 
                endwhile; 
            ?>
            <tr>
                <td colspan="3"></td>
                <td>Total</td>
                <td>Rp. <?php echo number_format($total)?></td>
                <td></td>
            </tr>
            <?php  
            }else {
            ?>
            <tr>
                <td colspan="6">Data tidak ada</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#datatables').DataTable();
        });
    </script>
</body>
</html>