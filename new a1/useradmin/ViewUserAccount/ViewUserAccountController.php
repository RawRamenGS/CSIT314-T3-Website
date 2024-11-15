<?php
    require_once('ViewUserAccountEntity.php');

    class ViewUserAccountController {
        public function getAllUsers() {
            $userEntity = new ViewUserAccountEntity();
            // Call the entity's method to retrieve all users
            return $userEntity->retrieveAllUsers();
        }
    }



?>