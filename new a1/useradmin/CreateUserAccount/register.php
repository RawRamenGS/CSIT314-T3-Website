<?php
require_once('CreateUserAccountController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phonenumber']);
    $dob = trim($_POST['dateBirth']);
    $roles = trim($_POST['roles']);


    // Initialize the controller
    $controller = new CreateUserAccountController();

    // Call the controller's method to create an account
    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password does not match'); window.location.href='CreateUseAccountUI.html';</script>";
    }else{
        $result = $controller->createAccount($username, $password, $confirmPassword, $email, $phoneNumber, $dob, $roles);
    }
    // Display result to the user
    if ($result === true) {
        echo "<script>alert('Registration successful!'); window.location.href='../Login.html';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
}
?>
