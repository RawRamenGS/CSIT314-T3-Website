<?php
require_once 'SearchSellerListingEntity.php'; // Ensure this path is correct

class SearchSellerListingController {
    
    public function searchFavCars($userId, $searchTerm) {
        $favEntity = new SearchSellerListingEntity();
        return $favEntity->searchFavCars($userId, $searchTerm);
    }
}
?>
