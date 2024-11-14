<?php
session_start();
require_once('FavController.php');
$controller = new FavController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchTerm = trim($_POST['search']);
    $favs = $controller->searchFavCars($_SESSION['id'], $searchTerm);
} else {
    $favs = $controller->getFavCar($_SESSION['id']);
}
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
    <header>
        <h1>Buyer Favourite Car Listings</h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
            <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <nav class="navBar">
        <a href="BuyerHomeUI.php" id="BuyerHomeBtn">Home</a>
        <a href="../Car/Car.php" id="SearchBuyerListingBtn">Listings</a>
        <a href="ViewBuyerFavListingUI.php" id="ViewBuyerFavListingBtn">Favourites</a>
        <a href="BuyerRateReviewUI.php" id="BuyerRateReviewBtn">Rate and Review Agents</a>
    </nav>

    <section class="search-section">
        <form action="ViewBuyerFavListingUI.php" method="post">
            <div class="search-container">
                <input type="text" placeholder="Search" id="search" name="search" class="searchTxt" required>
                <button type="button" class="btn" id="searchBtn" onclick="searchListings()">Search</button>
            </div>
        </form>
    </section>

    <div class="container-table">
        <table>
            <thead>
                <tr>
                    <th>Favourite ID</th>
                    <th>Car Name</th>
                    <th>Date-Listed</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Agent Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (is_array($favs) && !empty($favs)) {
                    foreach ($favs as $fav) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($fav['id']); ?></td>
                            <td><?php echo htmlspecialchars($fav['carName']); ?></td>
                            <td><?php echo htmlspecialchars($fav['dateListed']); ?></td>
                            <td><?php echo htmlspecialchars($fav['price']); ?></td>
                            <td><?php echo htmlspecialchars($fav['description']); ?></td>
                            <td><?php echo htmlspecialchars($fav['username']); ?></td>
                            <td>
                                <form action="../Buyer/RemoveUI.php" method="post">
                                    <input type="hidden" name="favId" value="<?php echo $fav['id']; ?>">
                                    <button type="submit" class="btn1">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php } 
                } else { ?>
                    <tr>
                        <td colspan="7">No favourites found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
