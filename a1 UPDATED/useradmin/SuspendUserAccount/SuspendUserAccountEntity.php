<?php

    require_once('../../connect.php');

    class SuspendUserAccountEntity{

        public function __construct(){
            global $conn;
            $this->conn = $conn;
        }


        public function suspendUserAccount($userId){
            $stmt = $this->conn->prepare("UPDATE useraccount SET status = 'Suspended' where id = ? ");
            $stmt->bind_param("i",$userId);
            
            if($stmt->execute()){
                return true;
            }else{
                return "User account already suspended";
            }
        }
    }



?>