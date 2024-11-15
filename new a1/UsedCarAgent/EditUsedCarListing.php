<?php
//require_once 'EditUsedCarListingController.php';
if (!isset($_GET['carID']) || empty($_GET['carID'])) {
    die('Error: carID not specified.');
}

$carID = $_GET['carID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EditUsedCarListing.css">
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
        <a href="ManageUsedCarListing.php" class="backBtn">&lt; Back</a>

        <div class="content-wrapper">
            <div class="list-item">
                <h2>Edit Car Listing</h2>
                <form action="EditUsedCarListingController.php" method="post">
					<input type="hidden" id="carID" name="carID" value="<?= htmlspecialchars($carID) ?>">
                    <label for="name">Name</label>
                    <!-- PHP Takes over here, EXAMPLE USE value="Hello" in <input type.... placeholder="" value=""> for the name-->
                    <input type="text" required id="name" name="carName" placeholder="Enter item name">

                    <label for="price">Price</label>
                    <input type="text" required id="price" name="price" placeholder="Enter item price">

                    <label for="description">Description</label>
                    <textarea id="description" required name="description" placeholder="Enter item description"></textarea>

                    <button type="submit" class="editBtn">Save</button>
                    <a href="ManageUsedCarListing.php"><button type="button" class="cancelBtn">Cancel</button></a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>