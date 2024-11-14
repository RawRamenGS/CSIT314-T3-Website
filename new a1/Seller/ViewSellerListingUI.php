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
                <input type="text" placeholder="Search" class="searchTxt">
                <button type="submit" class="btn" id="searchBtn">Search</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Listed On</th>
                        <th>Price</th>
                        <th>Number of Favourites</th>
                        <th>Number of Views</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car 1</td>
                        <td>6/11/2024</td>
                        <td>$200</td>
                        <td>11</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>Car 2</td>
                        <td>1/11/2024</td>
                        <td>$300</td>
                        <td>41</td>
                        <td>94</td>
                    </tr>
                    <tr>
                        <td>Car 3</td>
                        <td>20/10/2024</td>
                        <td>$100</td>
                        <td>24</td>
                        <td>65</td>
                    </tr>
                    <tr>
                        <td>Car 4</td>
                        <td>29/10/2024</td>
                        <td>$180</td>
                        <td>30</td>
                        <td>70</td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>