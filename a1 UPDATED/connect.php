<?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'a1_database');
    if($conn->connect_error){
        error_log('Connection Failed: ' . $conn->connect_error);
        die('Database connection error, Please try again later.');
    } 
?>
