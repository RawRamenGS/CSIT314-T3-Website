<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reviews</title>
    <link rel="stylesheet" href="ViewAgentReview.css">
</head>
<body>
    <header>
        <h1>Website Title</h1>
        <div class="user-profile">
            <div class="profile-icon">&#128100;</div>
            <button class="logoutBtn">Logout</button>
        </div>
    </header>

    <nav class="navBar">
		<a href="UsedCarAgentLandingPage.php" id="homeBtn">Home</a>
        <a href="CreateUsedCarListing.php" id="createNewBtn">Create New Listing</a>
        <a href="ManageUsedCarListing.php" id="listingBtn">My Listings</a>
		<a href="ViewAgentReview.php" id="reviewBtn">My Reviews</a>
    </nav>

    <div class="reviews-container">
        <!-- Review 1 -->
        <div class="review-card">
            <div class="user-info">
                <span class="username">Daven</span>
                <span class="role">Buyer</span>
                <span class="rating">Rating: 3/5</span>
            </div>
            <div class="review-content">
                <p>Lorem Ipsum. Where the review goes</p>
            </div>
        </div>

        <!-- Review 2 -->
        <div class="review-card">
            <div class="user-info">
                <span class="username">Nicholas</span>
                <span class="role">Buyer</span>
                <span class="rating">Rating: 5/5</span>
            </div>
            <div class="review-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
            </div>
        </div>

        <!-- Review 3 -->
        <div class="review-card">
            <div class="user-info">
                <span class="username">John Doe</span>
                <span class="role">Seller</span>
                <span class="rating">Rating: 0/5</span>
            </div>
            <div class="review-content">
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
            </div>
        </div>
    </div>
</body>
</html>
