<?php
require_once 'ManageUsedCarListingEntity.php';
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
