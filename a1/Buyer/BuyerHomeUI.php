<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Home</title>
    <link rel="stylesheet" href="BuyerHomeUI.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Welcome, Buyer</h1>
        <div class="user-profile">
		<div class="profile-icon">&#128100;</div>
            <button class="logoutBtn">Logout</button>
        </div>
    </header>

    <!-- Navigation Tabs -->
	<nav class="navBar">
		<a href="BuyerHomeUI.php" id="BuyerHomeBtn">Home</a>
		<a href="SearchBuyerListingUI.php" id="SearchBuyerListingBtn">Listings</a>
		<a href="ViewBuyerFavListingUI.php" id="ViewBuyerFavListingBtn">Favourites</a>
		<a href="BuyerRateReviewUI.php" id="BuyerRateReviewBtn">Rate and Review Agents</a>
	</nav>

	<div class="welcome-message">
        <h2>Welcome to Your Dashboard!</h2>
        <p>Click Listings for Search Car Listings</p>
		<p>Click Favourites for Your Favourites Car Listings</p>
    </div>  
</body>
</html>
