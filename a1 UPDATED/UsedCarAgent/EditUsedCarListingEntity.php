<?php
require_once('../connect.php');

class EditUsedCarListingEntity {


    public function __construct() {
        global $conn; // Assumes $conn is defined in connect.php
        $this->conn = $conn;

    }

    public function editCarListing($carName, $price, $description, $carID) {
        try {
            $stmt = $this->conn->prepare("UPDATE carlisting SET carName = ?, price = ?, description = ? WHERE carID = ?");
            $stmt->bind_param("sdsi", $carName, $price, $description, $carID);

            if ($stmt->execute()) {
                return true; // Success
            } else {
                return "Failed to edit.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }
}
?>