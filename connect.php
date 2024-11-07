<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $dateBirth = $_POST['dateBirth'];
    $roles = $_POST['roles'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'tryout');
    if($conn->connect_error){
        error_log('Connection Failed: ' . $conn->connect_error);
        die('Database connection error, Please try again later.');
    } else {
        $stmt = $conn->prepare("INSERT INTO registration(username, password, email, phonenumber, dob, role) 
        VALUES (?, ?, ?, ?, ?, ?)");

        // Bind the parameters: 's' for strings (including date), since password and phone number are strings
        $stmt->bind_param("ssssss", $username, $password, $email, $phonenumber, $dateBirth, $roles);

        if ($stmt->execute()) {
            echo "Registration successful";

        } else {
            error_log('Execute error: ' . $stmt->error); // Log execution error
            echo "Registration failed. Please try again.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
?>
