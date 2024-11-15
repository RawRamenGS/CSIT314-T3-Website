<?php
require_once('EditUsedCarListingEntity.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $carName = trim($_POST['carName']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
	$carID = trim($_POST['carID']);
	
	// Create an instance of the controller class
    $controller = new EditUsedCarListingController();
    
    // Validate and edit car listing
    $result = $controller->editCarListing($carName, $price, $description, $carID);
    
    // Handle result (either error message or success)
    if ($result === true) {
        // Redirect to the manage listings page after success
        header("Location: ManageUsedCarListing.php");
        exit(); // Always call exit after header redirection
    } else {
        // If validation or DB operation failed, pass the error message
        $error = $result; 
    }
}
	
class EditUsedCarListingController {
	
    public function editCarListing($carName, $price, $description, $carID) {
        if (empty($carName)) {
            return "Car name must be provided.";
        }
        if (empty($description)) {
            return "Description must be provided.";
        }

        // Check if price is a numeric value
        if (!is_numeric($price)) {
            return "Price of car must be a number.";
        }
        
        // Check if price is valid (non-negative)
        if ($price < 0) {
            return "Price of car cannot be a negative value.";
        }

        // Initialize entity and insert the car
        $carEntity = new EditUsedCarListingEntity();
        return $carEntity->editCarListing($carName, $price, $description, $carID);
    }
	
}
?>
