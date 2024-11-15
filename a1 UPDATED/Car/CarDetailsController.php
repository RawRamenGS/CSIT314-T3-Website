<?php
require_once 'CarDetailsEntity.php';

class CarDetailsController {
    // Method to get the details of a specific car
        // Method to get the details of a specific car
        public function getCarDetails($carID) {
            // Validate the carID (make sure it's a valid ID)
            if ($carID <= 0) {
                return null; // Invalid car ID
            }
    
            // Fetch the car details from the entity (model)
            $car = CarDetailsEntity::getCarById($carID);
            
            if ($car) { // if car exists
                // Fetch favourites and views count for the car
                $car->favouritesCount = CarDetailsEntity::getFavouritesCount($carID);
            
                
            }
            return $car;
            
        }
            
            
    

    // Method to update favourites
    public static function updateFavourites() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carID'])) {
            // Validate and sanitize the carID
            $carID = intval($_POST['carID']);
            
            // Make sure the carID is valid
            if ($carID > 0) {
                // Call the updateFavourites method from the entity (model)
                $isUpdated = CarDetailsEntity::updateFavourites($carID);
                
                if ($isUpdated) {
                    // After updating the favourites, redirect back to the car details page
                    header("Location: CarDetails.php?id=" . $carID);
                    exit; // Always call exit after header redirection
                } else {
                    // Handle errors if the update fails
                    echo "Error updating favourites.";
                }
            } else {
                // Handle invalid carID
                echo "Invalid car ID.";
            }
        }
    }
}

// Instantiate and call the controller
$CarDetailsController = new CarDetailsController();
$CarDetailsController->updateFavourites();
?>
