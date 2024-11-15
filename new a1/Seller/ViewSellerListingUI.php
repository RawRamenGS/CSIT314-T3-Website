<?php
// Include the controller
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
    exit;
}
require_once 'ViewSellerListingController.php';

$controller = new ViewSellerListingController();
$listing = $controller->getfavcar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings</title>
    <link rel="stylesheet" href="ViewSellerListingUI.css">
</head>

<body>
    <header>
        <h1>Seller</h1>
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

    <div>
    <a href="SellerHomeUI.php" class="backBtn">&lt; Back</a>
        <div class="tableDiv">
            <div class="search-container">
            <form action="SearchSellerListingUI.php" method="post">
            <input type="text" placeholder="Search" name="search" class="searchTxt" required>
            <button type="submit" class="btn">Search</button>
        </form>
            </div>

            <table>
                <thead>
                    <tr><th>Car Name</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>The Number of Favourite</th>
                        <th>The Number of View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(is_array($listing) && !empty($listing)) {
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
                            <td colspan="7">No shortlisted found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>