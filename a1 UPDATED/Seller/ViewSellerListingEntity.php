<?php
require_once('../connect.php');

class ViewSellerListingEntity {

    // Constructor to initialize Car properties
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // Method to get cars from the logged-in seller
    public function getlisting() {
        $stmt = $this->conn->prepare("SELECT c.carID, c.carName, u.username, c.price, c.favourites, c.views 
                                      FROM carlisting c 
                                      INNER JOIN useraccount u ON c.agent = u.id 
                                      WHERE c.seller = ?;");
        $stmt->bind_param("s", $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            /*$fav = $result->fetch_all(MYSQLI_ASSOC);
            return $fav;*/
			$fav = [];
			while ($row = $result->fetch_assoc()) {
                $carID = $row['carID'];
                $row['favourites'] = $this->getFavouritesCount($carID);  // Add the favourites count
                $fav[] = $row;  // Add the modified row to the listings array
            }
            return $fav; 
        } else {
            return "No listings found for this user.";
        }
    }
	
	public function getFavouritesCount($carID) {
		global $conn;
        // SQL query to get the count of favourites for the specific car
        $sql = "SELECT COUNT(*) FROM favourites WHERE carID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $carID);
        $stmt->execute();
        $stmt->bind_result($favouritesCount);
        $stmt->fetch();
        $stmt->close();
        return $favouritesCount;
    }
}
