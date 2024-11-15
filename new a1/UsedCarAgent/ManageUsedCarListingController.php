<?php
require_once 'ManageUsedCarListingEntity.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the request is for deletion
    if (isset($_GET['carID'])) {
        $carID = trim($_GET['carID']);
        
        // Create an instance of the controller class
        $controller = new ManageUsedCarListingController();
        
        // Call the delete method
        $result = $controller->deleteCarListing($carID);

        // Redirect after deletion
        if ($result === true) {
            // Redirect to the manage listings page after deletion
            header("Location: ManageUsedCarListing.php");
            exit(); // Always call exit after header redirection
        } else {
            // Handle error in deletion (optional)
            $error = $result;
        }
    }

    // Edit car logic here if carID is set (not shown for brevity)
}

class ManageUsedCarListingController {
    public function getfavcar(){
        $entity = new ManageUsedCarListingEntity();
        return $entity->getfavcar();
    }
	
	public function deleteCarListing($carID) {
        if (empty($carID)) {
            return "Car ID must be provided.";
        }

        // Initialize entity and delete the car listing
        $carEntity = new ManageUsedCarListingEntity();
        return $carEntity->deleteCarListing($carID);
    }
   
}
