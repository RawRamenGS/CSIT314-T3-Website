<?php
require_once('FavEntity.php');

class FavController {
    
    public function getfavCar($userId) {
        $favEntity = new FavEntity();
        return $favEntity->getfavCar($userId);
    }

    public function searchFavCars($userId, $searchTerm) {
        $favEntity = new FavEntity();
        return $favEntity->searchFavCars($userId, $searchTerm);
    }
}
?>
