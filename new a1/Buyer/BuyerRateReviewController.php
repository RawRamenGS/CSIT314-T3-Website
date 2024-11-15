
<?php
require_once('BuyerRateReviewEntity.php');

class BuyerRateReviewController{
    public function getAllAgent(){
        $userEntity = new BuyerRateReviewEntity();
        return $userEntity->getAllAgent();
    }

    public function BuyerRateReview($carAgent,$rating,$review){
        $userEntity = new BuyerRateReviewEntity();
        return $userEntity->BuyerRateReview($carAgent,$rating,$review,$_SESSION['username'],$_SESSION['name']);
    }
}


?>