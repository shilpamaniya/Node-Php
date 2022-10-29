<?php 
    $servername = "localhost";
    $username = "root";
    $password = "shilpa1612";
    $dbname = "card";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
        // echo "<script> alert('Database Connected Successfully......')</script>";
    }
    else
    {
        die("connection failed because".mysqli_connect_errno());
    }
?>