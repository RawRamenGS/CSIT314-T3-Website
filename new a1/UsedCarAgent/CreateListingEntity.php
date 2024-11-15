<?php
require_once('../connect.php');

class CreateListingEntity {


    public function __construct() {
        global $conn; // Assumes $conn is defined in connect.php
        $this->conn = $conn;

    }

    public function createCarListing($carName, $price, $description, $seller) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO carlisting(carName, price, description, seller) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdsi", $carName, $price, $description, $seller);

            if ($stmt->execute()) {
                return true; // Success
            } else {
                return "Failed to create listing2.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }
	
	public function getSellersUsernames() {
        $stmt = $this->conn->prepare("SELECT id, username from useraccount where profileId = 2");
		$stmt->execute();
		$result = $stmt->get_result();
		
		
        if ($result->num_rows > 0) {
            $username = $result->fetch_all(MYSQLI_ASSOC);
			return $username;
        }else{
			return "Seller does not found!";
		}
        
    }
}
?>