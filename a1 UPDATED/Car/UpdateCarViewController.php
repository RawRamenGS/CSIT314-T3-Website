<?php


require_once('CarDetailsEntity.php');

class UpdateCarViewController {
    public function updateCarView($carID) {
        // First, retrieve the car details from the database
        $carEntity = CarDetailsEntity::getCarById($carID); // This will return the car object with all details
        
        if ($carEntity) {
            // If car exists, call the updateCarView method
            return $carEntity->updateCarView($carID);
        } else {
            // Handle the case where car doesn't exist
            return false;
        }
    }
}
?>







