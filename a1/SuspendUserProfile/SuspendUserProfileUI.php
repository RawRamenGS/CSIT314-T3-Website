<?php

    require_once('SuspendUserProfileController.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $profileId = $_POST['profileId'];
    
    $controller = new SuspendUserProfileController();

    $result = $controller->suspendUserProfile($profileId);

    if ($result === true) {
        echo "<script>alert('Profile Suspended!'); window.location.href='../ViewUserProfile/ViewUserProfileUI.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }


    }