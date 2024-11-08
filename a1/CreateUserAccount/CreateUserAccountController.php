<?php

require_once('CreateUserAccountEntity.php');


class CreateUserAccountController {
    public function createAccount($username, $password, $confirmPassword, $email, $phoneNumber, $dob, $roles) {
        // Check if passwords match
        if ($password !== $confirmPassword) {
            return "Passwords do not match.";
        }

        // Initialize entity and insert the user
        $userEntity = new CreateUserAccountEntity();
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        return $userEntity->insertUser($username, $password, $email, $phoneNumber, $dob, $roles);
    }
}
?>