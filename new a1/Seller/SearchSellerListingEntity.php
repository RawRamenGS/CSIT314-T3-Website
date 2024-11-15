<?php
require_once('../connect.php');

class SearchSellerListingEntity {
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function searchFavCars($searchTerm) {
        $search = "%" . $searchTerm . "%";
        $stmt = $this->conn->prepare("SELECT c.carName, u.username,c.price,c.favourites,c.views FROM carlisting c 
        INNER JOIN useraccount u ON c.agent = u.id 
        WHERE c.seller = ? AND c.carName LIKE ?");
        
        $stmt->bind_param('is',$_SESSION['id'],$search);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $seller = $result->fetch_All(MYSQLI_ASSOC);
            return $seller;
        }else{
            return "Car not found"; 
        }
    }
}
?>
