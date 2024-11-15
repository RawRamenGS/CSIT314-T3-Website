<?php 
require_once("SearchUserProfileEntity.php");


class SearchUserProfileController{
    public function searchUserProfile($search){
        $userEntity = new searchUserProfileEntity();
        return $userEntity->searchUserProfile($search);
    }
}



?>