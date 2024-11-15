<?php
require_once('../connect.php');

class ViewSellerListingEntity {

    // Constructor to initialize Car properties
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // Method to get cars from the logged-in seller
    public function getfavcar() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if user is logged in and retrieve username or profile ID from session
        if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
            return "User not logged in.";
        }

        $username = $_SESSION['username'];

        // Prepare the SQL query to get only cars for the logged-in user
        $stmt = $this->conn->prepare("SELECT c.carName, u.username, c.price, c.favourites, c.views 
                                      FROM carlisting c 
                                      INNER JOIN useraccount u ON c.agent = u.id 
                                      WHERE u.username = ?;");
        $stmt->bind_param("s", $username);
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
