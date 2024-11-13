<?php
require_once 'CarDetailsEntity.php';

class CarDetailsController {
    // Method to get the details of a specific car
    public function getCarDetails($carID) {
        // Validate the carID (make sure it's a valid ID)
        if ($carID <= 0) {
            return null; // Invalid car ID
        }
		
		$car = CarDetailsEntity::getCarById($carID);
		if ($car) { // if exists
			$car->favouritesCount = CarDetailsEntity::getFavouritesCount($carID);
		}
        // Fetch the car details from the entity (model)
        return $car;
    }
	
	public function updateFavourites() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carID'])) {
            $carID = intval($_POST['carID']);
            // Redirect back to CarDetails of Car with same id
            if (CarDetailsEntity::updateFavourites($carID) !== false) {
                header("Location: CarDetails.php?id=" . $carID);
                exit;
            }
        }
    }
}
$CarDetailsController = new CarDetailsController();
$CarDetailsController->updateFavourites();
?>