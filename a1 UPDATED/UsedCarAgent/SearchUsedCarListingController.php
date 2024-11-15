<?php
require_once 'SearchUsedCarListingEntity.php'; // Ensure this path is correct

class SearchUsedCarListingController {
    
    public function searchlisting($searchTerm) {
        $listEntity = new SearchUsedCarListingEntity();
        return $listEntity->searchlisting($searchTerm);
    }
}
?>