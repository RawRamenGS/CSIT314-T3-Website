<?php

    require_once('ViewRateReviewEntity.php');

    class ViewRateReviewController{
        public function ViewRateReview(){
            $feedbackEntity = new ViewRateReviewEntity();
            return $feedbackEntity->ViewRateReview();
        }
    }

?>