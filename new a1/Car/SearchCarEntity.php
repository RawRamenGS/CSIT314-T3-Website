<?php

require_once('../connect.php');

class SearchCarEntity {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getTotalCar($carname) {
        // Corrected SQL Query
        $query = "SELECT COUNT(*) AS total FROM carlisting WHERE carName = ?";
        
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
        }
        
        $stmt->bind_param("s", $carname); // Bind carName
        $stmt->execute();
        
        // Fetch the result
        $result = $stmt->get_result();
        if ($result) {
            $row = $result->fetch_assoc();
            $total = $row['total'];
            $stmt->close();
            return $total;
        } else {
            $stmt->close();
            return "Error fetching total car count";
        }
    }

    public function SearchCar($carname, $perPage, $offset) {
		$strCar = "%" . strval($carname) . "%";
        $query = "SELECT carID, carName, dateListed, price, views, description, agent 
                  FROM carlisting 
                  WHERE UPPER(carName) LIKE UPPER(?) 
                  LIMIT ? OFFSET ?";
        
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error);
        }
        $stmt->bind_param("sii", $strCar, $perPage, $offset);
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
