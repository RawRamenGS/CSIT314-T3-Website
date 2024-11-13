<?php 

require_once('../../connect.php');


class SearchUserAccountEntity{
    private $conn;

    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function searchUserAccount($username){
        $stmt = $this->conn->prepare("SELECT id, username, email, phonenumber,dob FROM useraccount WHERE username = ?");
            $stmt->bind_param("s", $username);
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
                return "User does not found";
            }
    }
}



?>