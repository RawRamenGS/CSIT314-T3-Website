<?php

    require_once('../../connect.php');

    class SuspendUserAccountEntity{

        public function __construct(){
            global $conn;
            $this->conn = $conn;
        }


        public function suspendUserAccount($userId){
            $stmt = $this->conn->prepare("UPDATE useraccount SET status = 'Suspend' where id = ? ");
            $stmt->bind_param("i",$userId);
            
            if($stmt->execute()){
                return true;
            }else{
                return "User was recently active or already suspend";
            }
        }
    }



?>