<?php

    require_once('SuspendUserAccountController.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $userId = $_POST['userId'];
    
    $controller = new SuspendUserAccountController();

    $result = $controller->suspendUserAccount($userId);

    if ($result === true) {
        echo "<script>alert('User Suspended!'); window.location.href='../ViewUserAccount/ViewUserAccountUI.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }


    }