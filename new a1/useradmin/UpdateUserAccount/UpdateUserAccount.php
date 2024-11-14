<?php

require_once('UpdateUserAccountController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $userId = $_POST['userId'];
    $username = trim($_POST['username']);
    $oldPassword = trim($_POST['oldpassword']);
    $newPassword = trim($_POST['newpassword']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phonenumber']);
    $dob = trim($_POST['dateBirth']);

    $controller = new UpdateUserAccountController();

    if(empty($userId)){
        echo "<script>alert('nothing inside')";
    }

    if ($oldPassword == $newPassword){
        echo "<script>alert('Old password and new password is same!'); window.location.href='../ViewUserAccount/ViewUserAccountUI.php';</script>";
    }else{
        $result = $controller->updateUserAccount($userId,$username,$newPassword,$email,$phoneNumber,$dob);
    }

    if ($result === true) {
        echo "<script>alert('Update successful!'); window.location.href='../ViewUserAccount/ViewUserAccountUI.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
    
}

?>