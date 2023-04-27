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
<title> Dashboard</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body> 
    <h3>Tambah Detail Transaksi</h3>
    <form> 
        <div class="mb-3">
            <input type="hidden" class="form-control mt-3" value="<?php echo $_GET['id'] ?>"  id="id_transaksi" name="id_transaksi">
        </div> 
        Barang:
        <select class="form-select mt-2" name= "id_barang" aria-label="Default select example" id="id_barang" required>
        <option disabled selected> Pilih </option>
        <?php 
            $sql=("SELECT * FROM barang");
            $result= mysqli_query($conn, $sql);
            while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?=$row['id']?>"><?=$row['nama_barang']?></option> 
            <?php
            }
        ?>
        </select>        
        <div class="mb-3 mt-3">
            <label for="total" class="total"  required>QTY</label>
            <input type="number" class="form-control mt-1" id="qty" name="qty">
        </div>
        <a id="submit" class="btn btn-primary ">Simpan</a>
    </form>
    <script>
        $("#submit").click(function(){ //
            $.post(
                'proses_tambah_detail_transaksi.php', 
                {
                    id_transaksi : $('#id_transaksi').val(), 
                    id_barang : $('#id_barang').val(), 
                    qty : $('#qty').val(),
                }, 
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
        });
    </script>
</body>
</html>

