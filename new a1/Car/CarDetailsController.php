<?php
require_once 'CarDetailsEntity.php';

class CarDetailsController {
    // Method to get the details of a specific car
    public function getCarDetails($carID) {
        // Validate the carID (make sure it's a valid ID)
        if ($carID <= 0) {
            return null; // Invalid car ID
        }

        // Fetch the car details from the entity (model)
        return CarDetailsEntity::getCarById($carID);
    }
}
