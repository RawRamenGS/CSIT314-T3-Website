<?php
session_start(); // Start session management

require_once('LoginController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $controller = new LoginController();
    $result = $controller->loginUser($username, $password);

    if (is_array($result) && !empty($result)) {
        if ($result['Name'] == "UserAdmin") {
            echo "<script>alert('Login Successful!'); window.location.href='../useradmin/landingPage.php';</script>";
        }if ($result['Name'] == "Buyer") {
            echo "<script>alert('Login Successful!'); window.location.href='../Buyer/BuyerHomeUI.php';</script>";
        }if ($result['Name'] == "UsedCarAgent") {
            echo "<script>alert('Login Successful!'); window.location.href='../UsedCarAgent/UsedCarAgentHomeUI.php';</script>";
        }if ($result['Name'] == "Seller") {
            echo "<script>alert('Login Successful!'); window.location.href='../Seller/SellerHomeUI.php';</script>";
        } else {
            echo "<script>alert('Access Denied: You do not have admin rights.'); window.history.back();</script>";
        }
    } else {
        $errorMessage = addslashes($result);
        echo "<script>alert('$errorMessage'); window.history.back();</script>";
    }
}
?>
