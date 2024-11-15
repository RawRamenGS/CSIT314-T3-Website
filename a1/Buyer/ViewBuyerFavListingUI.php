<?php
// Hardcoded example car data
$cars = [
    ["id" => 1, "image" => "images/car-placeholder.png", "name" => "Car 1", "price" => "$200", "favourites" => 11],
    ["id" => 2, "image" => "images/car-placeholder.png", "name" => "Car 2", "price" => "$300", "favourites" => 41],
    ["id" => 3, "image" => "images/car-placeholder.png", "name" => "Car 3", "price" => "$100", "favourites" => 24],
    ["id" => 4, "image" => "images/car-placeholder.png", "name" => "Car 4", "price" => "$180", "favourites" => 30],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourite Car Listings</title>
    <link rel="stylesheet" href="ViewBuyerFavListingUI.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Buyer Favourite Car Listings</h1>
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
        <p>Search your favourites!</p>
        <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>
    </section>

    <!-- Listings Section -->
    <section class="listings-section">
        <h2>Your Favourite Listings</h2>
        <div class="car-list" id="car-list">
            <!-- Car cards will be inserted here by JavaScript -->
        </div>
    </section>

    <!-- JavaScript to display favourite cars -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the favourite car IDs from local storage
            let favouriteCarIds = JSON.parse(localStorage.getItem('favouriteCarIds')) || [];

            // Hardcoded example car data
            const cars = <?php echo json_encode($cars); ?>;

            // Filter the cars to only include those that are favourited
            const favouritedCars = cars.filter(car => favouriteCarIds.includes(car.id.toString()));

            const carListElement = document.getElementById('car-list');

            if (favouritedCars.length > 0) {
                favouritedCars.forEach(car => {
                    const carCard = document.createElement('a');
                    carCard.href = 'ViewBuyerListingUI.php?id=' + car.id;
                    carCard.className = 'car-card-link';
                    carCard.innerHTML = `
                        <div class="car-card">
                            <img src="${car.image}" alt="${car.name}" class="car-image">
                            <h3>${car.name}</h3>
                            <p>${car.price}</p>
                            <p class="favourites">
                                <span class="favourites-count">${car.favourites}</span>
                                <button class="heart-btn liked" data-car-id="${car.id}" disabled>❤️</button>
                            </p>
                        </div>
                    `;
                    carListElement.appendChild(carCard);
                });
            } else {
                carListElement.innerHTML = '<p class="no-favourites-message">You have no favourite listings.</p>';
            }
        });
    </script>
</body>
</html>
