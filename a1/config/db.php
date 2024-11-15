<?php
    $conn = mysqli_connect("localhost","root","","tryout");
    if($conn->connect_error){
        error_log('Connection Failed: ' . $conn->connect_error);
        die('Database connection error, Please try again later.');
    }
?>