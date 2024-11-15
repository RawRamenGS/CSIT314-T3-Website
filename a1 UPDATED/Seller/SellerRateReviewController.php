
<?php
require_once('SellerRateReviewEntity.php');

class SellerRateReviewController{
    public function getAllAgent(){
        $userEntity = new SellerRateReviewEntity();
        return $userEntity->getAllAgent();
    }

    public function SellerRateReview($carAgent,$rating,$review){
        $userEntity = new SellerRateReviewEntity();
        return $userEntity->SellerRateReview($carAgent,$rating,$review,$_SESSION['username'],$_SESSION['name']);
    }
}


?>