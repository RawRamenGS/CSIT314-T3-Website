<?php
require_once('ViewBuyerFavListingEntity.php');

class ViewBuyerFavListingController {
    
    public function getfavCar($userId) {
        $favEntity = new ViewBuyerFavListingEntity();
        return $favEntity->getfavCar($userId);
    }

    public function searchFavCars($userId, $searchTerm) {
        $favEntity = new ViewBuyerFavListingEntity();
        return $favEntity->searchFavCars($userId, $searchTerm);
    }
}
?>
