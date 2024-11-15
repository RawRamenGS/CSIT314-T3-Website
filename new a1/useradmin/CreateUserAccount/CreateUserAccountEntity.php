<?php
// UserAccountEntity.php

require_once('../../connect.php');

class CreateUserAccountEntity {
    private $conn;

    public function __construct() {
        global $conn; // Assumes $conn is defined in connect.php
        $this->conn = $conn;
    }

    public function insertUser($username, $password, $email, $phoneNumber, $dob, $roles) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO useraccount(username, password, email, phonenumber, dob, profileId) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssd", $username, $password, $email, $phoneNumber, $dob, $roles);

            if ($stmt->execute()) {
                return true; // Success
            } else {
                return "Failed to register user.";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt->close();
        }
    }
}
?>