<?php
    $con = mysqli_connect("localhost","root","","db_healthie");

    // Check connection
    if(mysqli_connect_errno()){
        echo "failed to connect to MySQL: " . mysqli_connect_errno();
        exit();
    }

?>