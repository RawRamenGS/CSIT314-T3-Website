<?php
require_once('../connect.php');
class CarDetailsEntity {
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

    // Static method to retrieve a car by ID
    public static function getCarById($carID) {
		global $conn;
        // Query to retrieve the car by ID
        $sql = "SELECT * FROM carlisting WHERE carID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $carID);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the car exists
        if ($result->num_rows > 0) {
            // Fetch the record and create a CarDetailsEntity object
            $row = $result->fetch_assoc();
            $car = new CarDetailsEntity($row["carName"], $row["dateListed"], $row["price"],
                                        $row["favourites"], $row["views"], $row["description"],
                                        $row["agent"], $row["carID"]);
        } else {
            $car = null; // No car found with the given ID
        }

        // Close the database connection
        $conn->close();

        return $car;
    }
}
