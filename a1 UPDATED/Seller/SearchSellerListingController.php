<?php
require_once 'SearchSellerListingEntity.php'; // Ensure this path is correct

class SearchSellerListingController {
    
    public function searchlisting($searchTerm) {
        $favEntity = new SearchSellerListingEntity();
        return $favEntity->searchlisting($searchTerm);
    }
}
?>
