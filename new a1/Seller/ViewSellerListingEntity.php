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
        $stmt = $this->conn->prepare("SELECT c.carName, u.username, c.price, c.favourites, c.views 
                                      FROM carlisting c 
                                      INNER JOIN useraccount u ON c.agent = u.id 
                                      WHERE c.seller = ?;");
        $stmt->bind_param("s", $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $fav = $result->fetch_all(MYSQLI_ASSOC);
            return $fav;
        } else {
            return "No listings found for this user.";
        }
    }
}
