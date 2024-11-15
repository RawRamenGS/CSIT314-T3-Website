<?php

require_once('UpdateUserProfileController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $profileId = $_POST['profileId'];
    $profileName = trim($_POST['profileName']);
    $description = trim($_POST['description']);
    

    $controller = new UpdateUserProfileController();

    if(empty($profileId)){
        echo "<script>alert('nothing inside')";
    }


    $result = $controller->updateUserProfile($profileId,$profileName,$description);

    if ($result === true) {
        echo "<script>alert('Update successful!'); window.location.href='../ViewUserProfile/ViewUserProfileUI.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
    
}

?>