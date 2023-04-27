<?php
  
    include "../../config/koneksi.php";
            
    if(!isset($_SESSION['username'])){
    header("location: login.php");
    }
    include "../../pages/header.php";
    include "../../pages/sidebar.php";
    include "../../pages/navbar.php";

    $sql = "select * from barang where id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $nama_barang = $row['nama_barang'];
        $deskripsi = $row['deskripsi'];
        $harga = $row['harga'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>   
    <h3>Update Barang</h3>
    <form>
        <div class="mb-3">
            <input type="hidden" id="id" value="<?=$_GET['id']?>">
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="nama_barang" required>Nama Barang</label>
            <input type="text" class="form-control mt-1" id="nama_barang" name="nama_barang"  value="<?=($nama_barang)?>">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="deskripsi" required>Deskripsi</label>
            <input type="text" class="form-control mt-1" id="deskripsi" name="deskripsi"  value="<?=($deskripsi)?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="harga" class="harga"  required>Harga</label>
            <input type="number" class="form-control mt-1" id="harga" name="harga" value="<?=($harga)?>" >
        </div>
        <a id="submit" class="btn btn-primary ">Simpan</a>
    </form>
    <script>
        $("#submit").click(function(){ 
            $.post(
                'proses_update_barang.php',
                {
                    id : $('#id').val(), 
                    nama_barang : $('#nama_barang').val(), 
                    deskripsi : $('#deskripsi').val(), 
                    harga : $('#harga').val(), 
                }, 
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
        });
    </script>
</body>
</html>

