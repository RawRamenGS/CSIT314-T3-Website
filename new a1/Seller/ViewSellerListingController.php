<?php
require_once 'ViewSellerListingEntity.php';

class ViewSellerListingController {
    public function getfavcar(){
        $entity = new ViewSellerListingEntity();
        return $entity->getfavcar();
    }
   
}
