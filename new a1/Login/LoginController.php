<?php

    require_once('LoginEntity.php');

    class AdminLoginController{
        public function loginUser($username,$password){
            $userEntity = new LoginEntity();
            return $userEntity->loginUser($username,$password);
        }
    }


?>