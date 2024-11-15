<?php
require_once('../connect.php');

class SearchSellerListingEntity {
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function searchlisting($searchTerm) {
        $search = "%" . $searchTerm . "%";
        $stmt = $this->conn->prepare("SELECT c.carID, c.carName, u.username,c.price,c.favourites,c.views FROM carlisting c 
        INNER JOIN useraccount u ON c.agent = u.id 
        WHERE c.seller = ? AND c.carName LIKE ?");
        
        $stmt->bind_param('is',$_SESSION['id'],$search);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            /*$seller = $result->fetch_All(MYSQLI_ASSOC);
            return $seller;*/
			$fav = [];
			while ($row = $result->fetch_assoc()) {
                $carID = $row['carID'];
                $row['favourites'] = $this->getFavouritesCount($carID);  // Add the favourites count
                $fav[] = $row;  // Add the modified row to the listings array
            }
            return $fav; 
        }else{
            return "Car not found"; 
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
?>
