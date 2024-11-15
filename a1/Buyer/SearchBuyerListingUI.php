<?php
    require_once('../Caar/CarController.php');
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $perPage = 5;  // Number of cars per page
    $offset = ($page - 1) * $perPage;

    // Instantiate the controller and get the paginated car data
    $carController = new CarController();
    $cars = $carController->getCars($perPage, $offset);

    // Get the total number of cars for pagination (to calculate total pages)
    $totalCars = $carController->getTotalCars();
    $totalPages = ceil($totalCars / $perPage);;
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
            if(!empty($cars)){
            foreach ($cars as $car) {
                echo '<div class="listing-card">';
                echo '<a href="CarDetails.php?id=' . urlencode($car->carID) . '">';
                echo '<img src="car.png" height="100" width="200" alt="' . htmlspecialchars($car->carName) . '">';
                echo '</a>';
                echo '<p><b>$' . htmlspecialchars($car->price) . '</b></p>';
                echo '<p>' . htmlspecialchars($car->carName) . '</p>';
		        $dt = new DateTime($car->dateListed);
                echo '<p>Listed ' . htmlspecialchars($dt->format('Y-m-d')) . '</p>';
                //echo '<p>' . htmlspecialchars($car->favourites) . ' ❤️</p>';
                //echo '<p>' . htmlspecialchars($car->views) . ' views</p>';
                //echo '<p>Description: ' . htmlspecialchars($car->description) . '</p>';
                //echo '<p>Listed by Agent ID: ' . htmlspecialchars($car->agent) . '</p>';
                echo '<p>Car ID: ' . htmlspecialchars($car->carID) . '</p>';
		        echo '<p>-------------------------------</p>';
                echo '</div>';
                }
            }
            ?>
        </div>
    </section>

    <!-- JavaScript to handle favourites -->
    <!-- <script>
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
	</script> -->
</body>
</html>
