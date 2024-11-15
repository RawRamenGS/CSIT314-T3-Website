<?php 

require_once('../../connect.php');


class SearchUserProfileEntity{
    private $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function searchUserProfile($search){
        $stmt = $this->conn->prepare("SELECT profileId, Name, Description FROM userprofiles WHERE Name = ?");
            $stmt->bind_param("s", $search);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $users = [];
                while ($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }

                $stmt->close();
                return $users; // Return the array of user data
            } else {
                return "User not found";
            }
    }
}



?>