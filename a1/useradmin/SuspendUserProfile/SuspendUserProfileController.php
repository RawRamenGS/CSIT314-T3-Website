<?php

    require_once('SuspendUserProfileEntity.php');


    class SuspendUserProfileController{
        public function suspendUserProfile($profileId){
            $userEntity = new SuspendUserProfileEntity();
            return $userEntity->suspendUserProfile($profileId);
        }
    }


?>