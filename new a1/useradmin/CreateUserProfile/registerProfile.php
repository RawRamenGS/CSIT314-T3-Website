<?php
require_once('CreateUserProfileController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
  $profileName = trim($_POST['profileName']);


    // Initialize the controller
    $controller = new CreateUserProfileController();

    // Call the controller's method to create an account
    $result = $controller->createProfile($profileName);

    // Display result to the user
    if ($result === true) {
        echo "<script>alert('Profile created successful!'); window.location.href='../landingPage.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
}
?>
