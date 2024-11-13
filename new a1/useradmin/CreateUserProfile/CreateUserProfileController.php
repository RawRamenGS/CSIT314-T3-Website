<?php

require_once('CreateUserProfileEntity.php');


class CreateUserProfileController {
    public function createProfile($profileName) {
       
        // Initialize entity and insert the user
        $userEntity = new CreateUserProfileEntity();

        if ($userEntity->checkUserExist($profileName)){
            return $userEntity->insertUserProfile($profileName);
        }else{
            return "Profile already existed";
        }
        
    
    }
}
?>