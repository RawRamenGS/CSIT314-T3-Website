<?php
// Include the controller
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
    exit;
}
require_once 'ManageUsedCarListingController.php';

// Get the current page from the URL (defaults to page 1 if not set)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;  // Number of cars per page
$offset = ($page - 1) * $perPage;

// Instantiate the controller and get the paginated car data
$carController = new ManageUsedCarListingController();
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
    <title>Manage Listing</title>
    <link rel="stylesheet" href="ManageUsedCarListing.css">
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
		<a href="UsedCarAgentHomeUI.php" id="homeBtn">Home</a>
        <a href="CreateUsedCarListing.php" id="createNewBtn">Create New Listing</a>
        <a href="ManageUsedCarListing.php" id="listingBtn">My Listings</a>
		<a href="ViewRateReviewUI.php" id="reviewBtn">My Reviews</a>
    </nav>

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

    <div>
        <a href="UsedCarAgentHomeUI.php" class="backBtn">&lt; Back</a>
        <div class="tableDiv">
            <div class="search-container">
                <input type="text" placeholder="Search" class="searchTxt">
                <button type="submit" class="btn" id="searchBtn">Search</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Number of Favourites</th>
                        <th>Number of Views</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car 1</td>
                        <td>Daven</td>
                        <td>$200</td>
                        <td>11</td>
                        <td>25</td>
                        <td><a href="EditUsedCarListing.php" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Car 2</td>
                        <td>Nic</td>
                        <td>$300</td>
                        <td>41</td>
                        <td>94</td>
                        <td><a href="#" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Car 3</td>
                        <td>Nicholas</td>
                        <td>$100</td>
                        <td>24</td>
                        <td>65</td>
                        <td><a href="#" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Car 4</td>
                        <td>Nicho</td>
                        <td>$180</td>
                        <td>30</td>
                        <td>70</td>
                        <td><a href="#" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>
