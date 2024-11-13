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
    <title>Used Car Agent Dashboard</title>
    <link rel="stylesheet" href="UsedCarAgentLandingPage.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
            <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
            </form>
        </div>
    </header>

    <nav class="navBar">
		<a href="UsedCarAgentHomeUI.php" id="homeBtn">Home</a>
        <a href="CreateUsedCarListing.php" id="createNewBtn">Create New Listing</a>
        <a href="ManageUsedCarListing.php" id="listingBtn">My Listings</a>
		<a href="ViewRateReviewUI.php" id="reviewBtn">My Reviews</a>
    </nav>

    <div class="welcome-message">
        <h2>Welcome to Your Dashboard!</h2>
        <br/>
        <p>Click Create New Listing to create a NEW car listing</p>
		<p>Click My Listings to view all your listings</p>
        <p>Click My Reviews to view all your reviews</p>
    </div>
</body>
</html>
