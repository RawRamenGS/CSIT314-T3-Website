<?php
    require_once('db.php');


    function ViewUserAccountBtn(){
        global $conn;
        $query = 'select * from registration';
        $result = mysqli_query($conn,$query);
        return $result;
    }

    // function CreateUserAccountBtn(){
    //     global $conn;
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     $email = $_POST['email'];
    //     $phonenumber = $_POST['phonenumber'];
    //     $dateBirth = $_POST['dateBirth'];
    //     $roles = $_POST['roles'];
        
    //     $stmt = $conn->prepare("INSERT INTO registration(username, password, email, phonenumber, dob, role) 
    //     VALUES (?, ?, ?, ?, ?, ?)");

    //     $stmt->bind_param("ssssss", $username, $password, $email, $phonenumber, $dateBirth, $roles);

    //     if ($stmt->execute()) {
    //         echo "Registration successful";

    //     } else {
    //         error_log('Execute error: ' . $stmt->error); // Log execution error
    //         echo "Registration failed. Please try again.";
    //     }

    // }
?>