<?php
session_start();
$userid = $_SESSION['id'];
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

        return $car;
    }
	
	public static function updateFavourites($carID) { 
		global $conn, $userid;
		// IF favourite not found -> (Insert) into db, ELSE -> (Delete) from db
        // Get the current favourites count
        $stmt = $conn->prepare('SELECT COUNT(*) FROM favourites WHERE carID = ? AND favouriteBy = ?');
        $stmt->bind_param('ii', $carID, $userid);
        $stmt->execute();
		$stmt->bind_result($count);
		$stmt->fetch();
		$stmt->close();
		if ($count > 0) { // Favourite by user already
			// DELETE
			$deleteStmt = $conn->prepare('DELETE FROM favourites WHERE carID = ? AND favouriteBy = ?');
			$deleteStmt->bind_param('ii', $carID, $userid);
			$deleteStmt->execute();
			return true;
		} else { // None found, insert new record UserID-tagged-CarID
			// INSERT
			$insertStmt = $conn->prepare('INSERT INTO favourites (carID, favouriteBy) VALUES (?, ?)');
			$insertStmt->bind_param('ii', $carID, $userid);
			$insertStmt->execute();
			return true;
			//return "Added car to your favourites!";
		}
    }
	
	public static function getFavouritesCount($carID) {
        global $conn;

        // SQL query to get the count of favourites for the specific car
        $sql = "SELECT COUNT(*) FROM favourites WHERE carID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $carID);
        $stmt->execute();
        $stmt->bind_result($favouritesCount);
        $stmt->fetch();
        $stmt->close();

        return $favouritesCount;
    }
}
