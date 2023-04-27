
<?php

    function activestate($url)
    {
        $url_components = parse_url($url);
        if(strlen($url_components['path'])>0){
            $exp = explode("/",$url_components['path']);
            array_pop($exp);
            $url_components['path'] = implode("/",$exp);
        }
        $current_path = $_SERVER['REQUEST_URI'] ?? '';
        if(strlen($current_path)>0){
            $exp = explode("/",$current_path);
            array_pop($exp);
            $current_path = implode("/",$exp);
        }
        
        if (isset($url_components['path']) && $url_components['path'] === $current_path) {
            return 'active';
        }
        return '';
    }
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Transaksi</title>
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Custom fonts for this template -->
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="../../css/sb-admin-2.min.css" rel="stylesheet">
<!-- Custom styles for this page -->
<link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?=$root?>dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">   
    <?php $url = $root.'modul/transaksi/' ?>
    <li class="nav-item <?=activestate($url)?>"> 
    <a href="<?=$url?>transaksi.php" class="nav-link ">       
            <i class="fas fa-money-check-alt"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <?php $url = $root.'modul/barang/' ?>
    <li class="nav-item <?=activestate($url)?>"> 
        <a href="<?=$url?>barang.php" class="nav-link">
            <i class="fas fa-glasses"></i>
            <span>Item Barang</span>
        </a>
    </li>
    <?php $url = $root.'modul/user/' ?>
    <li class="nav-item <?=activestate($url)?>"> 
        <a class="nav-link" href="<?=$url?>table_user.php">
            <i class="fas fa-user-alt"></i>
            <span>Users</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
</ul>
<!-- End of Sidebar -->
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<!-- Custom styles for this template-->

