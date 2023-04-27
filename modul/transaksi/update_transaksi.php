<?php
  
    include "../../config/koneksi.php";            
    if(!isset($_SESSION['username'])){
    header("location: login.php");
    }
    include "../../pages/header.php";
    include "../../pages/sidebar.php";
    include "../../pages/navbar.php";
    
    $sql = "select * from transaksi where id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $nama = $row['nama'];
        $alamat = $row['alamat'];
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
    <h3>Update Transaksi</h3>
    <form>
        <div class="mb-3">
            <input type="hidden" class="form-control mt-1" id="id" name="id"  value="<?=($_GET['id'])?>">
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="nama" required>Nama</label>
            <input type="text" class="form-control mt-1" id="nama" name="nama" value="<?=($nama)?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="2"><?=($alamat)?></textarea>
        </div>
        <a id="submit" class="btn btn-primary ">Simpan</a>
    </form>
    <script>
        $("#submit").click(function(){ 
            $.post(
                'proses_update_transaksi.php',
                {
                    id : $('#id').val(), 
                    nama : $('#nama').val(), 
                    alamat : $('#alamat').val(),      
                }, 
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
        });
    </script>
</body>
</html>

