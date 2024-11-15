<?php
require_once('../connect.php');

class SearchSellerListingEntity {
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function searchFavCars($agentId, $searchTerm) {
        $searchTerm = "%" . $searchTerm . "%";
        $stmt = $this->conn->prepare("SELECT carlisting.carID, carlisting.carName, carlisting.price, carlisting.favourites, carlisting.views, useraccount.username 
                                      FROM carlisting
                                      JOIN useraccount ON useraccount.id = carlisting.Agent
                                      WHERE carlisting.Agent = ? AND carlisting.carName LIKE ?");
        
        $stmt->bind_param('is', $agentId, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
