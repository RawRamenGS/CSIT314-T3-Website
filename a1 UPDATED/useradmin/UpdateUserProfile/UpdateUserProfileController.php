<?php

require_once('UpdateUserProfileEntity.php');

class UpdateUserProfileController {
    public function updateUserProfile($profileId,$profileName,$description){
        $profileEntity = new UpdateUserProfileEntity();
        return $profileEntity->updateUserProfile($profileId,$profileName,$description);
    }
}

?>