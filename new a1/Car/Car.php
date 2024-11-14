<?php
// Include the controller
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
    exit;
}
require_once 'CarController.php';

// Get the current page from the URL (defaults to page 1 if not set)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;  // Number of cars per page
$offset = ($page - 1) * $perPage;

// Instantiate the controller and get the paginated car data
$carController = new CarController();
$cars = $carController->getCars($perPage, $offset);

// Get the total number of cars for pagination (to calculate total pages)
$totalCars = $carController->getTotalCars();
$totalPages = ceil($totalCars / $perPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Title</title>
    <link rel="stylesheet" href="Car.css">>
</head>
<body>

<header>
        <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
        <div class="user-profile">
		<div class="profile-icon">&#128100;</div>
            <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <!-- Navigation Tabs -->
	<nav class="navBar">
		<a href="../Buyer/BuyerHomeUI.php" id="BuyerHomeBtn">Home</a>
		<a href="../Car/Car.php" id="SearchBuyerListingBtn">Listings</a>
		<a href="../Buyer/ViewBuyerFavListingUI.php" id="ViewBuyerFavListingBtn">Favourites</a>
		<a href="../Buyer/BuyerRateReviewUI.php" id="BuyerRateReviewBtn">Rate and Review Agents</a>
	</nav>

<div class="search-section">
    <h2>Start by searching for your favorite brand of car!</h2>
    <input type="text" class="search-box" placeholder="Search">
</div>

<div class="listings">
    <?php
    // Loop through each car from the controller data and display it
    foreach ($cars as $car) {
        echo '<div class="listing-card">';
        echo '<a href="CarDetails.php?id=' . urlencode($car->carID) . '">';
        echo '<img src="car.png" height="200" width="300" alt="' . htmlspecialchars($car->carName) . '">';
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
    ?>
</div>

<!-- Pagination Controls -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=1">&laquo; First</a>
        <a href="?page=<?= $page - 1 ?>">Previous</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>
    
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?= $page + 1 ?>">Next</a>
        <a href="?page=<?= $totalPages ?>">Last &raquo;</a>
    <?php endif; ?>
</div>

<div class="footer">
    <p>&copy; 2024 Website Title. All rights reserved.</p>
</div>

</body>
</html>
