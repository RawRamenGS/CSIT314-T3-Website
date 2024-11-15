<?php

    require_once('SuspendUserAccountEntity.php');


    class SuspendUserAccountController{
        public function suspendUserAccount($userId){
            $userEntity = new SuspendUserAccountEntity();
            return $userEntity->suspendUserAccount($userId);
        }
    }


?>