<?php
    require_once('../connect.php');

    class SearchFavEntity{
        public function __construct(){
            global $conn;
            $this->conn = $conn;
        }

        public function searchFav($search){
        $strCar = "%" . strval($search) . "%";
        $query = "SELECT favourites.id, carlisting.carName, carlisting.dateListed, carlisting.price, 
                                        carlisting.description, useraccount.username FROM favourites
                                        INNER JOIN carlisting ON carlisting.carID = favourites.carID
                                        JOIN useraccount ON useraccount.id = carlisting.Agent
                                        WHERE UPPER(carlisting.carName) LIKE UPPER(?)";
        
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
        }
        $stmt->bind_param("s", $strCar,);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            $cars = [];
            while ($row = $result->fetch_assoc()) {
                $cars[] = $row;
            }
    
            $stmt->close();
            return $cars;
        } else {
            $stmt->close();
            return "Car not found";
        }
    }
        }



?>