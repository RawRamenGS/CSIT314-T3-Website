<?php

    require_once('../../connect.php');

    class SuspendUserProfileEntity{

        public function __construct(){
            global $conn;
            $this->conn = $conn;
        }


        public function suspendUserProfile($profileId){
            $stmt = $this->conn->prepare("UPDATE userprofiles SET status = 'Suspended' where profileid = ? ");
            $stmt->bind_param("i",$profileId);
            
            if($stmt->execute()){
                return true;
            }else{
                return "User profile already suspended";
            }
        }
    }



?>