<?php

require_once('../connect.php');

class RemoveEntity{
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }


    public function Remove($favId){
        $stmt = $this->conn->prepare("DELETE FROM favourites WHERE id = ?;");
        $stmt->bind_param("i",$favId);

        if($stmt->execute()){
            return true;
        }else{
            return "Remove failed";
        }
        
        
        
    }
}





?>