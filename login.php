<?php

    include "config/koneksi.php";

        // if(isset($_SESSION['username'])){
        //     header("location: dashboard.php");
        // }
        if(isset($_POST['username']) || isset($_POST['password'])){
          $sql = "select * from user where username='" . $_POST['username'] . "'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
              $row = mysqli_fetch_assoc($result);
              $cek_password = password_verify($_POST['password'], $row['password']);
  
              if($cek_password){
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['level'] = $row['level'];
                  header("location: dashboard.php");
              } else {
                  echo "Pasword anda salah";
              }
          } else {
              echo "Username tidak ada!";
          }
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
<body class="sidebar-pinned"> 
<section class="vh-100" style="background-color: #4169E1;">
  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card mt-2" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/images/kaca_1.jpeg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-3 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Optik Merpati</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="username">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                      style="color: #393f81;">Register here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="assets/js/bootstrap.bundle.min.js"></script>   
</body>
</html>
<?php

?>