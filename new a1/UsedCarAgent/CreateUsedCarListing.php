<?php
require_once 'CreateListingController.php';
$CreateListingController = new CreateListingController();
$sellers = $CreateListingController->getSellersUsernames();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Car Listing</title>
    <link rel="stylesheet" href="CreateUsedCarListing.css">
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

    <main>
        <a href="UsedCarAgentHomeUI.php" class="backBtn">&lt; Back</a>

        <div class="content-wrapper">
            <div class="list-item">
                <h2>List your item</h2>
                <form action="CreateListing.php" method="post">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="carName" placeholder="Enter item name">

                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" placeholder="Enter item price">

                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Enter item description"></textarea>
					
                    <label for="seller">Choose Seller</label>
                    <select name="seller" id="seller">
                        <option value="">Select a Seller</option>
                        <?php
                        foreach ($sellers as $seller) {
                            echo "<option value='{$seller['id']}'>{$seller['username']}</option>";
                        }
                        ?>
                    </select>

                    <button type="submit" class="createBtn">Create</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>