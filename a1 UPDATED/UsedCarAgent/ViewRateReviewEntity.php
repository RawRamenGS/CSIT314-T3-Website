<?php

    require_once('../connect.php');

    class ViewRateReviewEntity{

        public function __construct(){
            global $conn;
            $this->conn = $conn;
        }
        public function ViewRateReview(){
            $stmt = $this->conn->prepare("SELECT feedbackId, rating, review, respondent, role from feedback where AgentID = ?");
            $stmt->bind_param("i",$_SESSION['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($result->num_rows>0){
                $feedback = $result->fetch_All(MYSQLI_ASSOC);
                return $feedback;
            }else{
                return "No feedback in it";
            }
            
        }
    }

?>