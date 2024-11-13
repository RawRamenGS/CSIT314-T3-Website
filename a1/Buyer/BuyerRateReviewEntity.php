<?php
require_once('../connect.php');

class BuyerRateReviewEntity{
    public function __construct(){
        global $conn;
        $this->conn = $conn;
    }

    public function getAllAgent(){
        $stmt = $this->conn->prepare("SELECT useraccount.username, useraccount.id from useraccount where profileId = 3");
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows>0){
            $user = $result->fetch_all(MYSQLI_ASSOC);
            return $user;
        }else{
            return "There is no agent at this moment";
        }
    }

    public function BuyerRateReview($carAgent,$rating,$review,$buyer ){
        $stmt = $this->conn->prepare("INSERT INTO feedback(AgentID,rating,review,respondent,role) VALUES (?,?,?,?,?)");
        $stmt->bind_param("iisss",$carAgent,$rating,$review,$_SESSION['username'],$_SESSION['name']);
        
        if($stmt->execute()){
            return true;
        }else{
            return "fail to sent";
        }
        
    }
}



?>