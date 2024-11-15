<?php

session_start();
require_once('../connect.php');

class LoginEntity {
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function loginUser($username, $password) {
        // Prepare statement to check user login and suspension status in a single query
        $stmt = $this->conn->prepare("SELECT userprofiles.Name, useraccount.status, useraccount.id, useraccount.username
                                      FROM useraccount 
                                      JOIN userprofiles ON useraccount.profileId = userprofiles.profileId
                                      WHERE useraccount.username = ? 
                                      AND useraccount.password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['status'] !== "Suspend") {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['Name'];
                $_SESSION['is_logged_in'] = true;
                return $user;  // Successfully logged in, return user data
            } else {
                return "User has been suspended.";
            }
        } else {
            return "User not found .";
        }
    }
}

?>
