<?php
require_once('../connect.php');

class SearchUsedCarListingEntity {
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function searchlisting($searchTerm) {
        $search = "%" . $searchTerm . "%";
        $stmt = $this->conn->prepare("SELECT c.carID,c.carName, u.username,c.price,c.favourites,c.views FROM carlisting c 
        INNER JOIN useraccount u ON c.seller = u.id 
        WHERE c.agent = ? AND UPPER(c.carName) LIKE UPPER(?)");
        
        $stmt->bind_param('is',$_SESSION['id'],$search);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $listing = $result->fetch_All(MYSQLI_ASSOC);
            return $listing;
        }else{
            return "Car not found"; 
        }
    }
}
?>
