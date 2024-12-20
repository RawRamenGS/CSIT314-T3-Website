<?php
require_once('../connect.php');

class ManageUsedCarListingEntity{

    // Constructor to initialize Car properties
    public function __construct() {
        global $conn;
        $this->conn = $conn;
       
    }


    // Static method to get the total number of cars (for pagination)
    public function getlisting(){
        $stmt = $this->conn->prepare("SELECT c.carID, c.carName, u.username, c.price, c.favourites, c.views FROM carlisting c INNER JOIN useraccount u ON c.seller = u.id WHERE u.profileId = 2;");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $fav = $result->fetch_All(MYSQLI_ASSOC);
            return $fav;
        }else{
            return "No business yet";
        }
    }
	
	public function deleteCarListing($carID) {
        try {
            // Prepare the DELETE statement
            $stmt = $this->conn->prepare("DELETE FROM carlisting WHERE carID = ?");
            $stmt->bind_param("i", $carID);

            // Execute the statement
            if ($stmt->execute()) {
                return true; // Deletion success
            } else {
                return "Failed to delete.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }
 }

