<?php
require_once('CreateListingController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Initialize the controller
    $controller = new CreateListingController();
	
    // Retrieve and sanitize form data
    $carName = trim($_POST['carName']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $seller = trim($_POST['seller']);

    // Call the controller's method to create an account
    $result = $controller->createCarListing($carName, $price, $description, $seller);

    // Display result to the user
    if ($result === true) {
        echo "<script>alert('Listing created'); window.location.href='../UsedCarAgent/ManageUsedCarListing.php';</script>";
    } else {
        echo "<script>alert('$result'); window.history.back();</script>";
    }
}
?>
