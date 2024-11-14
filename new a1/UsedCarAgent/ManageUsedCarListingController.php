<?php
require_once 'ManageUsedCarListingEntity.php';

class ManageUsedCarListingController {
    // Method to get a specific set of cars for pagination
    public function getCars($limit, $offset) {
        return ManageUsedCarListing::getPaginatedCars($limit, $offset);
    }

    // Method to get the total number of cars for pagination
    public function getTotalCars() {
        return ManageUsedCarListing::getTotalCars();
    }
}
