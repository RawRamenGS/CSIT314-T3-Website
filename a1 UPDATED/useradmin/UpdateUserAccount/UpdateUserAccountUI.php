<?php
// Retrieve the userId from the URL query parameter
$userId = $_GET['userId'];  // Assuming the userId is passed as a GET parameter
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel="stylesheet" href="UpdateUserAccountUI.css">
</head>
<body>
	<a href="../ViewUserAccount/ViewUserAccountUI.php" class="backBtn">&lt; Back</a>
    <form action="UpdateUserAccount.php" method="post">
        <input type="hidden" name="userId" value="" id="userIdInput">
        <div class="Personal-Detail">
            <div class="name">
                <label>Username</label><br>
                <input type="text" required name="username" >
            </div>
            
            <div class="Password">
                <label>Old Password</label><br>
                <input type="password" required name="oldpassword"><br>
                <br>
                <label>New Password</label><br>
                <input type="password" required name="newpassword">
            </div>
        
            <div class="Email">
                <label>Email</label><br>
                <input type="text" required name="email">
            </div>

            <div class="PhoneNumber">
                <label>Phone Number</label><br>
                <input type="text" required name="phonenumber">
            </div>

            <div class="dob">
                <label for="dob">Date of Birth</label><br>
                <input type="date" id="dob" name="dateBirth" min="1980-01-01" max="2024-10-01" required>
            </div>

            <button type="submit" class="btn">Update</button>

     </div>
    </form>
    <script>
        // Retrieve userId from URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('userId');
        
        // Set the userId as the value for the hidden input field
        document.getElementById('userIdInput').value = userId;
    </script>
</body>
</html>