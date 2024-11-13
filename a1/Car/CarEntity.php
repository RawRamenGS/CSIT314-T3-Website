<?php
require_once('../connect.php');

class Car {
    public $carName;
    public $dateListed;
    public $price;
    public $favourites;
    public $views;
    public $description;
    public $agent;
    public $carID;

    // Constructor to initialize Car properties
    public function __construct($carName, $dateListed, $price, $favourites, $views, $description, $agent, $carID) {
        $this->carName = $carName;
        $this->dateListed = $dateListed;
        $this->price = $price;
        $this->favourites = $favourites;
        $this->views = $views;
        $this->description = $description;
        $this->agent = $agent;
        $this->carID = $carID;
    }

    // Static method to retrieve a set of cars for pagination
    public static function getPaginatedCars($limit, $offset) {
		global $conn;
        // Query to retrieve a paginated set of cars
        $sql = "SELECT * FROM carlisting LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        // Array to store Car objects
        $cars = [];

        // Fetch each record and create a Car object
        while ($row = $result->fetch_assoc()) {
            $cars[] = new Car($row["carName"], $row["dateListed"], $row["price"],
                $row["favourites"], $row["views"], $row["description"], $row["agent"], $row["carID"]);
        }

        return $cars;
    }

    // Static method to get the total number of cars (for pagination)
    public static function getTotalCars() {
        global $conn;
        // Query to count the total number of cars
        $sql = "SELECT COUNT(*) as total FROM carlisting";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // Get the total number of cars
        $total = $row['total'];

        return $total;
    }
}
