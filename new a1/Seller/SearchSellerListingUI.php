<?php
session_start();
require_once 'SearchSellerListingController.php';

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html");
    exit;
}

$controller = new SearchSellerListingController();
$userId = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchTerm = trim($_POST['search']);
    $listing = $controller->searchFavCars($userId, $searchTerm);
} else {
    $listing = [];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Listings</title>
    <link rel="stylesheet" href="ViewSellerListingUI.css">
</head>
<body>
    <header>
        <h1>Search Seller Listings</h1>
    </header>
	
	<nav class="navBar">
		<a href="SellerHomeUI.php" id="SellerHomeBtn">Home</a>
        <a href="ViewSellerListingUI.php" id="SellerListingBtn">Listings</a> <!-- onSellerListingBtn -->
		<a href="SellerRateReviewUI.php" id="SellerRateReviewBtn">Rate and Review Agents</a> <!-- onSubmitReviewBtn -->
    </nav>
	
	<a href="ViewSellerListingUI.php" class="backBtn">&lt; Back to Listings</a>

    <div class="search-container">
        <form action="SearchSellerListingUI.php" method="post">
            <input type="text" placeholder="Search" name="search" class="searchTxt" required>
            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    <div class="tableDiv">
        <table>
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Seller</th>
                    <th>Price</th>
                    <th>The Number of Favourite</th>
                    <th>The Number of View</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($listing)) {
                    foreach ($listing as $l) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($l['carName']); ?></td>
                            <td><?php echo htmlspecialchars($l['username']); ?></td>
                            <td><?php echo htmlspecialchars($l['price']); ?></td>
                            <td><?php echo htmlspecialchars($l['favourites']); ?></td>
                            <td><?php echo htmlspecialchars($l['views']); ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">No results found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
