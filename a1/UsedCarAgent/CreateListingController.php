<?php
require_once('CreateListingEntity.php');

class CreateListingController {
	
	public function getSellersUsernames() {
		$userEntity = new CreateListingEntity();
        return $userEntity->getSellersUsernames();
    }
	
    public function createCarListing($carName, $price, $description, $seller) {
        // Check if price is valid 
        if ($price < 0) {
            return "Price of car cannot be negative value.";
        }

        // Initialize entity and insert the car
        $carEntity = new CreateListingEntity();
        return $carEntity->createCarListing($carName, $price, $description, $seller);
    }
	
	
}
?>