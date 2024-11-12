<?php

    require_once('LoginEntity.php');

    class AdminLoginController{
        public function loginUserAdmin($username,$password){
            $userEntity = new LoginEntity();
            return $userEntity->loginUserAdmin($username,$password);
        }
    }


?>