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

<h3>Tambah Transaksi</h3>
    <!-- <form action="proses_tambah_transaksi.php" method="post" enctype="multipart/form-data"> -->
    <!-- attribut form sudah tidak dibutuhkan karna sudah dihandle oleh ajax -->
    <form>
        <div class="mb-3">
            <label for="nama_barang" class="nama " required>Nama</label>
            <input type="text" class="form-control mt-1" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label ms-2">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="2"></textarea>
        </div> 
        <div class="mb-3 mt-3">
            <label for="tanggal" class="tanggal"  required>Tanggal</label>
            <input type="date" class="form-control mt-1" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d') ?>" readonly>
        </div> 
        <!-- <input class="btn btn-primary " type="submit" value="Simpan"> -->
        <!-- input submit diubah jadi button link dengan id="submit" -->
        <a id="submit" class="btn btn-primary ">Simpan</a>
    </form>
    <script>
        $("#submit").click(function(){ // #submit untuk handle aksi setelah klik button id="submit"
            $.post(
                'proses_tambah_transaksi.php', // url mengarah ke proses
                {
                    nama : $('#nama').val(), // memasukan data nama ke array form 
                    alamat : $('#alamat').val(), // memasukan data alamat ke array form 
                    tanggal : $('#tanggal').val(), // memasukan data tanggal ke array form 
                }, 
                function(data){
                    var data = jQuery.parseJSON(data); // konversi response json menjadi array
                        // pakai swal biar cakep popup messagenya
                    Swal.fire( {
                        title   : '',
                        text    : data.msg,
                        icon    : data.icon,
                    }).then(function() {
                        if(data.class == 'success'){
                            window.location = "transaksi.php"; // redirect ke transaksi.php jika proses berhasil
                        }
                    });
                    
                    //alert(data.msg)
                    console.log(data)
                }
            );
        });
    </script>
</body>
</html>
