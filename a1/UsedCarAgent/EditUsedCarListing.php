<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Title</title>
    <link rel="stylesheet" href="EditUsedCarListing.css">
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
        <a href="" id="homeBtn">Home</a>
        <a href="" id="favBtn">Favourites</a>
        <a hred="" id="listingBtn">Listings</a>
    </nav>

    <main>
        <a href="#" class="backBtn">&lt; Back</a>

        <div class="content-wrapper">
            <div class="list-item">
                <h2>Edit Car Listing</h2>
                <form>
                    <label for="name">Name</label>
                    <!-- PHP Takes over here, EXAMPLE USE value="Hello" in <input type.... placeholder="" value=""> for the name-->
                    <input type="text" id="name" placeholder="Enter item name">

                    <label for="price">Price</label>
                    <input type="text" id="price" placeholder="Enter item price">

                    <label for="description">Description</label>
                    <textarea id="description" placeholder="Enter item description"></textarea>

                    <button type="submit" class="editBtn">Save</button>
                    <a href="#"><button type="button" class="cancelBtn">Cancel</button></a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>