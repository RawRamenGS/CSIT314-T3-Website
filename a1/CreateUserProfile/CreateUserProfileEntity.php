<?php
// UserAccountEntity.php

require_once('../connect.php');

class CreateUserProfileEntity {
    private $conn;

    public function __construct() {
        global $conn; // Assumes $conn is defined in connect.php
        $this->conn = $conn;
    }

    public function checkUserExist($profileName){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM userprofiles WHERE NAME = ?");
            $stmt->bind_param("s", $profileName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return false; 
            } else {
            return true;
            }
        } catch (Exception $e){
            return "Error: " .$e->getMessage();
        }
    }

    public function insertUserProfile($profileName) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO userprofiles(Name) VALUES (?)");
            $stmt->bind_param("s", $profileName);

            if ($stmt->execute()) {
                return true; // Success
            } else {
                return "Failed to create profile user.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }
}
?>