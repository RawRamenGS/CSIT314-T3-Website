<?php
require_once('CreateListingEntity.php');

class CreateListingController {
	
	public function getSellersUsernames() {
		$userEntity = new CreateListingEntity();
        return $userEntity->getSellersUsernames();
    }
	
    public function createCarListing($carName, $price, $description, $seller) {
        // Check if carName, description, and seller are not empty
        if (empty($carName)) {
            return "Car name must be provided.";
        }
        if (empty($description)) {
            return "Description must be provided.";
        }
        if (empty($seller)) {
            return "Seller must be provided.";
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
        $carEntity = new CreateListingEntity();
        return $carEntity->createCarListing($carName, $price, $description, $seller);
    }
	
}
?>
