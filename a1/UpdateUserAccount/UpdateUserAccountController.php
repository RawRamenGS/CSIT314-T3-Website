<?php

require_once('UpdateUserAccountEntity.php');

class UpdateUserAccountController {
    public function updateUserAccount($userId,$username,$newPassword,$email,$phoneNumber,$dob){
        $userEntity = new UpdateUserAccountEntity();
        return $userEntity->updateUserAccount($userId,$username,$newPassword,$email,$phoneNumber,$dob);
    }
}

?>