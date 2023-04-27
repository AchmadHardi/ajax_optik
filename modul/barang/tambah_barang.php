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
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Barang</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body> 
    <h3>Tambah Barang</h3>
    <form>
        <div class="mb-3">
            <label for="nama_barang" class="nama_barang" required>Nama Barang</label>
            <input type="text" class="form-control mt-1" id="nama_barang" name="nama_barang">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="deskripsi" required>Deskripsi</label>
            <input type="text" class="form-control mt-1" id="deskripsi" name="deskripsi">
        </div>
        <div class="mb-3 mt-3">
            <label for="harga" class="harga"  required>Harga</label>
            <input type="number" class="form-control mt-1" id="harga" name="harga">
        </div>
        <div class="mb-3 mt-3">
            <label for="harga" class="harga"  required>Stok</label>
            <input type="number" class="form-control mt-1" id="stok" name="stok">
        </div>
        <!-- <input class="btn btn-primary" type="submit" value="Simpan"> -->
        <a id="submit" class="btn btn-primary ">Simpan</a>
    </form>
    <script>
        $("#submit").click(function(){ // #submit untuk handle aksi setelah klik button id="submit"
            $.post(
                'proses_tambah_barang.php', // url mengarah ke proses
                {
                    nama_barang : $('#nama_barang').val(), // memasukan data nama ke array form 
                    deskripsi : $('#deskripsi').val(), // memasukan data alamat ke array form 
                    harga : $('#harga').val(),
                    stok : $('#stok').val(), // memasukan data tanggal ke array form 
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
                            window.location = "barang.php"; // redirect ke transaksi.php jika proses berhasil
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

