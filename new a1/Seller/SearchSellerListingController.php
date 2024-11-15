<?php
require_once 'SearchSellerListingEntity.php'; // Ensure this path is correct

class SearchSellerListingController {
    
    public function searchFavCars($searchTerm) {
        $favEntity = new SearchSellerListingEntity();
        return $favEntity->searchFavCars($searchTerm);
    }
}
?>
