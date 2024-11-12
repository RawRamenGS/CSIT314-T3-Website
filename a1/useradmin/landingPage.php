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
    <link rel="stylesheet" href="landingPage.css">
</head>
<body>
    <header>
        <h1>Website Title</h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
         <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <nav class="navBar">
        <a href="landingPage.html" id="homeBtn">Home</a>
        <!-- <a href="" id="recentBtn">Recent</a>  -->
        <a href="" id="favBtn">Favourites</a>
        <a hred="" id="listingBtn">Listings</a>
    </nav>

    <div class="form">
    <h1>Welcome to Admin page, <?php echo $_SESSION['username'] ?> what would like to do!</h1>
    <a href="../CreateUserAccount/CreateUserAccountUI.html" class="a1"><button class="btn1" >Create new user account</button></a>
    <a href="../ViewUserAccount/ViewUserAccountUI.php" class="a1"><button class="btn1">View user accounts</button></a>
    <a href="../ViewUserProfile/ViewUserProfileUI.php" class="a1"><button class="btn1" >View User profiles</button></a>
    <a href="#" class="a1"><button class="btn1">New thing....</button></a>
</div>
</body>
</html>