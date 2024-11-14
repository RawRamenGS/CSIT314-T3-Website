<?php
require_once('SearchFavController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = trim($_POST['search']);
    
    $controller = new SearchFavController();
    $favs = $controller->searchFav($search);

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourite Car Listings</title>
    <link rel="stylesheet" href="ViewBuyerFavListingUi.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Buyer Favourite Car Listings</h1>
        <div class="user-profile">
		<div class="profile-icon">&#128100;</div>
            <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <!-- Navigation Tabs -->
    <nav class="navBar">
		<a href="BuyerHomeUI.php" id="BuyerHomeBtn">Home</a>
		<a href="../Car/Car.php" id="SearchBuyerListingBtn">Listings</a>
		<a href="ViewBuyerFavListingUI.php" id="ViewBuyerFavListingBtn">Favourites</a>
		<a href="BuyerRateReviewUI.php" id="BuyerRateReviewBtn">Rate and Review Agents</a>
    </nav>

    <!-- Search Section -->
    <section class="search-section">
        <p>Search your favourites!</p>
        <form action="SearchFavUI.php" method="post">
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <button type="submit">Search</button>
        </div>
        </form>
    </section>

    <div class="container-table">
            <table>
                <thead>
                    <tr><th>Favourite id</th>
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
                        if(is_array($favs) && !empty($favs)) {
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
                            <td colspan="7">No shortlisted found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>