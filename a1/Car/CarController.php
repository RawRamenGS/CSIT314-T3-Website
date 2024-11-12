<?php
require_once 'CarEntity.php';

class CarController {
    // Method to get a specific set of cars for pagination
    public function getCars($limit, $offset) {
        return Car::getPaginatedCars($limit, $offset);
    }

    // Method to get the total number of cars for pagination
    public function getTotalCars() {
        return Car::getTotalCars();
    }
}
