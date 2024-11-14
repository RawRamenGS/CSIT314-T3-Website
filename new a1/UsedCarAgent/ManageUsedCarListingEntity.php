<?php
require_once('../connect.php');

class ManageUsedCarListingEntity{

    // Constructor to initialize Car properties
    public function __construct() {
        global $conn;
        $this->conn = $conn;
       
    }


    // Static method to get the total number of cars (for pagination)
    public function getfavcar(){
        $stmt = $this->conn->prepare("SELECT c.carName, u.username, c.price, c.favourites, c.views FROM carlisting c INNER JOIN useraccount u ON c.agent = u.id WHERE u.profileId = 2;");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $fav = $result->fetch_All(MYSQLI_ASSOC);
            return $fav;
        }else{
            return "No business yet";
        }


    
    }
 }

