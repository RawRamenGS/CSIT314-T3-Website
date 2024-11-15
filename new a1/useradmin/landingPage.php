<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="landingpage.css">
</head>
<body>
    <header>
        <h1>Website Title</h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
         <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <div class="form">
    <h1>Welcome to Admin page, <?php echo $_SESSION['username'] ?> what would you like to do?</h1>
    <a href="CreateUserAccount/CreateUserAccountUI.html" class="a1"><button class="btn1" >Create New User Account</button></a>
	<a href="CreateUserProfile/CreateUserProfileUI.html" class="a1"><button class="btn1" >Create New User Profile</button></a>
    <a href="ViewUserAccount/ViewUserAccountUI.php" class="a1"><button class="btn1">View User Accounts</button></a>
    <a href="ViewUserProfile/ViewUserProfileUI.php" class="a1"><button class="btn1" >View User Profiles</button></a>
</div>
</body>
</html>