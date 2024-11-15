<?php
require_once 'ViewSellerListingEntity.php';

class ViewSellerListingController {
    public function getlisting(){
        $entity = new ViewSellerListingEntity();
        return $entity->getlisting();
    }
   
}
