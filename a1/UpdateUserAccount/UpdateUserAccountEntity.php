<?php

require_once('../connect.php');

class UpdateUserAccountEntity{
    private $conn;
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function updateUserAccount($userId,$username,$newPassword,$email,$phoneNumber,$dob){
        try{
        $stmt = $this->conn->prepare("UPDATE useraccount 
                                      SET username = ?,
                                      password = ?, 
                                      email = ?, 
                                      phonenumber = ?, 
                                      dob = ? 
                                      where id = ?");

        $stmt->bind_param("sssssi",$username,$newPassword,$email,$phoneNumber,$dob,$userId);
        
        if ($stmt->execute()){
            return true;
        }else{
            return "Update fail";
        }
    }   catch (Exception $e) {
        return "Error: " . $e->getMessage();
    } finally {
        $stmt->close();
    }
    }
}

?>