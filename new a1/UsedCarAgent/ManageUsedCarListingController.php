<?php
require_once 'ManageUsedCarListingEntity.php';

class ManageUsedCarListingController {
    public function getfavcar(){
        $entity = new ManageUsedCarListingEntity();
        return $entity->getfavcar();
    }
   
}
