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
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="SellerHomeUI.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
                <a href="../Login/Logout.php"><button type="submit" class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <nav class="navBar">
		<a href="SellerHomeUI.php" id="SellerHomeBtn">Home</a>
        <a href="ViewSellerListingUI.php" id="SellerListingBtn">Listings</a> <!-- onSellerListingBtn -->
		<a href="SellerRateReviewUI.php" id="SellerRateReviewBtn">Rate and Review Agents</a> <!-- onSubmitReviewBtn -->
    </nav>

    <div class="welcome-message">
        <h2>Welcome to Your Dashboard!</h2>
        <p>Click Listings for your car listings</p>
		<p>Click Rate and Review Agents for rate and review car agents</p>
    </div>
</body>
</html>
