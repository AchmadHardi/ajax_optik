<?php
    $root = 'http://localhost/ajax_optik/';
    session_start();
    $servername = "localhost";
    $usernama = "root";
    $password = "";
    $dbname = "amiroh";

    $conn = mysqli_connect($servername,$usernama,$password,$dbname);


    if(!$conn){
        die("Database tidak terhubung");
        
    }

    

?>  