<?php
    
    include "../../config/koneksi.php";
    
    if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    include "../../pages/header.php";
    include "../../pages/sidebar.php";
    include "../../pages/navbar.php";  
    $sql = "select * from user where id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $username = $row['username'];
        $alamat = $row['alamat'];
        $level = $row['level'];
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
    <h3>Update User</h3 mt-3>
    <form>
        <div class="mb-3">
        <input type="hidden" class="form-control mt-1" id="id" name="id"  value="<?=($_GET['id'])?>">
        </div>
        <div class="mb-3">
            <label for="username" class="username">Username</label>
            <input type="username" class="form-control" id="username" name="username" value="<?=($username)?>" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?=($alamat)?>"id="alamat">
        </div>
        <br>
        <a id="submit" class="btn btn-primary ">Simpan</a>
    </form>
    <script>
        $("#submit").click(function(){ 
            $.post(
                'proses_update_user.php',
                {
                    id : $('#id').val(), 
                    username : $('#username').val(), 
                    alamat : $('#alamat').val(), 
                    level : $('#level').val(), 
                }, 
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
        });
    </script>
</body>
</html>