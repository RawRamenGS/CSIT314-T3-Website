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
            <div class="search-container">
                <input type="text" placeholder="Search" class="searchTxt">
                <button type="submit" class="btn" id="searchBtn">Search</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Number of Favourites</th>
                        <th>Number of Views</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car 1</td>
                        <td>Daven</td>
                        <td>$200</td>
                        <td>11</td>
                        <td>25</td>
                        <td><a href="EditUsedCarListing.php" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Car 2</td>
                        <td>Nic</td>
                        <td>$300</td>
                        <td>41</td>
                        <td>94</td>
                        <td><a href="#" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Car 3</td>
                        <td>Nicholas</td>
                        <td>$100</td>
                        <td>24</td>
                        <td>65</td>
                        <td><a href="#" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Car 4</td>
                        <td>Nicho</td>
                        <td>$180</td>
                        <td>30</td>
                        <td>70</td>
                        <td><a href="#" class="tableBtn">Edit</a></td>
                        <td><a href="#" class="tableBtn">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
</body>
</html>
