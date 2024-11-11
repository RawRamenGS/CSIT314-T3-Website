<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate and Review Car Agent</title>
    <link rel="stylesheet" href="SellerRateReviewUI.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Rate and Review Car Agent</h1>
		<div class="user-profile">
            <div class="profile-icon">&#128100;</div>
            <button class="logoutBtn">Logout</button>
        </div>
    </header>
	
	    <nav class="navBar">
        <a href="ViewSellerListingUI.php" id="listingBtn">Listings</a>
		<a href="SellerRateReviewUI.php" id="rateReviewBtn">Rate and Review Agents</a>
    </nav>

    <!-- Rate and Review Section -->
    <section class="rate-review-section">
        <form action="SellerRateReviewController.php" method="POST"> <!-- Controller havent created yet -->
            <div class="input-box">
                <label for="carAgent">Select Car Agent:</label>
                <select name="carAgent" id="carAgent" required>
                    <option value="" disabled selected>Choose a Car Agent</option>
                    <option value="Agent1">Agent 1</option>
                    <option value="Agent2">Agent 2</option>
                    <option value="Agent3">Agent 3</option>
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
