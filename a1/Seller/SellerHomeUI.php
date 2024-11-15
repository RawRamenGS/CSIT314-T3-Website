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
        <h1>Welcome, Seller!</h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
            <!-- Logout Form -->
            <!-- <form action="LogoutController.php" method="POST"> -->
                <button type="submit" class="logoutBtn">Logout</button>
            </form>
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
