<?php
    require_once('ViewUserProfileEntity.php');

    class ViewUserProfileController {
        public function getAllProfiles() {
            $userEntity = new ViewUserProfileEntity();
            // Call the entity's method to retrieve all users
            return $userEntity->retrieveAllProfiles();
        }
    }




?>