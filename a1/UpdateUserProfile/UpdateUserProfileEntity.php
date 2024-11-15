<?php

require_once('../connect.php');

class UpdateUserProfileEntity{
    private $conn;
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function updateUserProfile($profileId,$profileName,$description){
        try{
        $stmt = $this->conn->prepare("UPDATE userprofiles 
                                      SET Name = ?,
                                      Description = ? 
                                      where profileId = ?");

        $stmt->bind_param("ssi",$profileName,$description,$profileId);
        
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