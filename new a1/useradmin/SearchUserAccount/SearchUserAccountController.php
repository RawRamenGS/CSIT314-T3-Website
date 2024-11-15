<?php 
require_once("SearchUserAccountEntity.php");


class SearchUserAccountController{
    public function searchUserAccount($username){
        $userEntity = new searchUserAccountEntity();
        return $userEntity->searchUserAccount($username);
    }
}



?>