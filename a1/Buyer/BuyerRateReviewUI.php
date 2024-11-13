
<?php 

require_once('BuyerRateReviewController.php');


$controller = new BuyerRateReviewController();
$agents = $controller->getAllAgent();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $carAgent = htmlspecialchars($_POST['carAgent']);
    $rating = htmlspecialchars($_POST['rating']);
    $review = htmlspecialchars($_POST['review']);

    
    $result = $controller->BuyerRateReview($carAgent,$rating,$review,$_SESSION['username'],$_SESSION['name']);

    if($result == true){
        echo "<script>alert('Feedback has sent to the agent!'); window.location.href='../Buyer/BuyerRateReviewUI.php';</script>";
    }else{
        echo "<script>alert($result); window.location.href='../Buyer/BuyerRateReviewUI.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate and Review Car Agent</title>
    <link rel="stylesheet" href="BuyerRateReviewUI.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Rate and Review Car Agent</h1>
		<div class="user-profile">
            <div class="profile-icon">&#128100;</div>
            <!-- Logout Form -->
            <!-- <form action="LogoutController.php" method="POST"> -->
                <button type="submit" class="logoutBtn">Logout</button>
            </form>
        </div>
    </header>
	
	    <nav class="navBar">
		<a href="BuyerHomeUI.php" id="BuyerHomeBtn">Home</a>
		<a href="../Car/Car.php" id="SearchBuyerListingBtn">Listings</a>
		<a href="ViewBuyerFavListingUI.php" id="ViewBuyerFavListingBtn">Favourites</a>
		<a href="BuyerRateReviewUI.php" id="BuyerRateReviewBtn">Rate and Review Agents</a>
    </nav>

    <!-- Rate and Review Section -->
    <section class="rate-review-section">
        <form action="BuyerRateReviewUI.php" method="POST"> <!-- Controller havent created yet -->
            <div class="input-box">
                <label for="carAgent">Select Car Agent:</label>
                <select name="carAgent" id="carAgent" required>
                    <option value="" disabled selected>Choose a Car Agent</option>
                    <?php
                    if (is_array($agents) && !empty($agents)) {
                        foreach ($agents as $agent) {
                            echo "<option value='{$agent['id']}'>{$agent['username']}</option>";
                        }
                    }
                    ?>

                </select>
            </div>

            <div class="input-box">
                <label for="rating">Rating (1-5):</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required>
            </div>

            <div class="input-box">
                <label for="review">Review:</label>
                <textarea name="review" id="review" rows="5" placeholder="Leave your review here..." required></textarea>
            </div>

            <button type="submit" class="btn">Submit Review</button>
        </form>
    </section>
</body>
</html>
