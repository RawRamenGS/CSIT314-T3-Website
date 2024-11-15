<?php
require_once 'ManageUsedCarListingEntity.php';

class ManageUsedCarListingController {
    public function getlisting(){
        $entity = new ManageUsedCarListingEntity();
        return $entity->getlisting();
    }
   
}
