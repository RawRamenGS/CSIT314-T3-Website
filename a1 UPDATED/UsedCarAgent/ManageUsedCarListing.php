<?php
// Include the controller
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
    exit;
}
require_once 'ManageUsedCarListingController.php';

$controller = new ManageUsedCarListingController();
$listing = $controller->getlisting();
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

    <div>
        <a href="UsedCarAgentHomeUI.php" class="backBtn">&lt; Back</a>
        <div class="tableDiv">
        <form action="SearchUsedCarListingUI.php">
            <div class="search-container">
                <input type="text" placeholder="Search" class="searchTxt" name = "search">
                <button type="submit" class="btn" id="searchBtn">Search</button>
            </div>
            </form>

            <table>
                <thead>
                    <tr><th>Car Name</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>The Number of View</th>
                        <th></th>
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
                                <td><?php echo htmlspecialchars($l['views']); ?></td>
                                <td>
                                    <form action="EditUsedCarListing.php" method="get">
                                        <input type="hidden" name="carID" value="<?php echo $l['carID']; ?>">
                                        <button type="submit" class="btn1">Edit</button>
										</form>
											<form action="ManageUsedCarListing.php" method="get">
											<input type="hidden" name="carID" value="<?php echo $l['carID']; ?>">
											<input type="hidden" name="delete" value="1">
                                        <button type="submit" class="btn2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="7">No listing found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>
