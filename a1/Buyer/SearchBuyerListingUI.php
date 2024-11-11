<?php
// Hardcoded example car data
$cars = [
    ["id" => 1, "image" => "car.png", "name" => "Car 1", "price" => "$200", "favourites" => 11],
    ["id" => 2, "image" => "car.png", "name" => "Car 2", "price" => "$300", "favourites" => 41],
    ["id" => 3, "image" => "car.png", "name" => "Car 3", "price" => "$100", "favourites" => 24],
    ["id" => 4, "image" => "car.png", "name" => "Car 4", "price" => "$180", "favourites" => 30],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Listings</title>
    <link rel="stylesheet" href="SearchBuyerListingUI.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Buyer Search Car Listing</h1>
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

    <!-- Search Section -->
    <section class="search-section">
        <p>Start by searching for your favorite brand of car!</p>
        <div class="search-bar">
            <!--
            <form method="GET" action="SearchBuyerListingUI.php">
                <input type="text" name="search" placeholder="Search">
                <button type="submit">Search</button>
            </form>
            -->
            <input type="text" placeholder="Search">
        </div>
    </section>

    <!-- Listings Section -->
    <section class="listings-section">
        <h2>Listings</h2>
        <div class="car-list">
            <?php
            // Display each car as a card
            foreach ($cars as $car) {
                echo '
                <a href="ViewBuyerListingUI.php?id=' . $car['id'] . '" class="car-card-link">
                    <div class="car-card">
                        <img src="' . $car['image'] . '" alt="' . $car['name'] . '" class="car-image">
                        <h3>' . $car['name'] . '</h3>
                        <p>' . $car['price'] . '</p>
                        <p class="favourites">
                            <span class="favourites-count">' . $car['favourites'] . '</span>
                            <button class="heart-btn" data-car-id="' . $car['id'] . '">❤️</button>
                        </p>
                    </div>
                </a>';
            }
            ?>
        </div>
    </section>

    <!-- JavaScript to handle favourites -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all heart buttons
        const heartButtons = document.querySelectorAll('.heart-btn');
        heartButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                // Prevent the click event from bubbling up to the link
                event.stopPropagation();
                event.preventDefault();

                // Get the car ID
                const carId = this.getAttribute('data-car-id');

                // Save the car ID to local storage
                let favouriteCarIds = JSON.parse(localStorage.getItem('favouriteCarIds')) || [];
                if (!favouriteCarIds.includes(carId)) {
                    favouriteCarIds.push(carId);
                    localStorage.setItem('favouriteCarIds', JSON.stringify(favouriteCarIds));
                }

                // Add a visual effect to the heart button
                this.classList.add('liked');
                // Disable the button to prevent multiple clicks
                this.disabled = true;
            });
        });
    });
	</script>
</body>
</html>
