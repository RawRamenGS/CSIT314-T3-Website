<?php
require_once('../connect.php');
require_once '../Car/Car.php';
$agentID = $_SESSION['id'];
class ManageUsedCarListing {
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
        $sql = "SELECT * FROM carlisting WHERE agent = ? LIMIT 3 OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $agentID, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        // Array to store Car objects
   //     $cars = [];

        // Fetch each record and create a Car object
    //    while ($row = $result->fetch_assoc()) {
    //        $cars[] = new Car($row["carName"], $row["dateListed"], $row["price"],
    //            $row["favourites"], $row["views"], $row["description"], $row["agent"], $row["carID"]);
    //    }

		if ($result->num_rows > 0) {
			$cars = $result->fetch_assoc;
			return $cars;
		} else {
			return "car not found";
		}
      //  return $cars;
    }

    // Static method to get the total number of cars (for pagination)
    public static function getTotalCars() {
		global $conn;
        // Corrected SQL Query
        $query = "SELECT COUNT(*) AS total FROM carlisting WHERE agent = ? LIMIT 5";
        
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
        }
        
        $stmt->bind_param("i", $agentID); // Bind session[agentID]
        $stmt->execute();
        
        // Fetch the result
        $result = $stmt->get_result();
        if ($result) {
            $row = $result->fetch_assoc();
            $total = $row['total'];
            $stmt->close();
            return $total;
        } else {
            $stmt->close();
            return "Error fetching total car count";
        }
    }
}
