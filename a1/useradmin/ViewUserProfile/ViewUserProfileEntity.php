<?php
require_once('../../connect.php');

class ViewUserProfileEntity {
    private $conn;

    public function __construct() {
        global $conn; // Assumes $conn is defined in connect.php
        $this->conn = $conn;
    }

    public function getAllUsers() {
        // Prepare and execute the query to select all users
        $stmt = $this->conn->prepare("SELECT profileId, Name, Description, status FROM userprofiles");
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch all rows as an array of associative arrays
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $stmt->close();
        return $users; // Return the array of user data
    }
}

