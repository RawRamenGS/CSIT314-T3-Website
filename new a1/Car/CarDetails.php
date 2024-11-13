<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
    exit;
}
require_once 'CarController.php';
// Include the controller
require_once 'CarDetailsController.php';

// Get the carID from the URL (make sure to sanitize it)
$carID = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Instantiate the controller and get the specific car data
$carDetailsController = new CarDetailsController();
$car = $carDetailsController->getCarDetails($carID);

// Check if car details were found
if (!$car) {
    echo "<p>Car not found.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details - <?= htmlspecialchars($car->carName) ?></title>
    <link rel="stylesheet" href="CarDetails.css">
</head>
<body>

<header>
	<h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
	<div class="user-profile">
	<div class="profile-icon">&#128100;</div>
	<a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
	</div>
</header>

    <!-- Navigation Tabs -->
	<nav class="navBar">
		<a href="../<?php echo $_SESSION["name"]; ?>/<?php echo $_SESSION["name"]; ?>HomeUI.php" id="BuyerHomeBtn">Home</a>
		<a href="../Car/Car.php" id="SearchBuyerListingBtn">Listings</a>
		<a href="ViewBuyerFavListingUI.php" id="ViewBuyerFavListingBtn">Favourites</a>
		<a href="BuyerRateReviewUI.php" id="BuyerRateReviewBtn">Rate and Review Agents</a>
	</nav>

<div class="car-details">
	<div class="section">
		<h2><?= htmlspecialchars($car->carName) ?></h2>
		<img src="car.png" height="500" width="300" alt="<?= htmlspecialchars($car->carName) ?>">
	</div>
	<div class="section">
	<h2>Car Description</h2>
    <p><b>Price:</b> $<?= htmlspecialchars($car->price) ?></p>
    <p><b>Listed:</b> <?= htmlspecialchars($car->dateListed) ?></p>
    <p><b>Favourites:</b> <?= htmlspecialchars($car->favouritesCount) ?>
		<form action="CarDetailsController.php" method="POST" style="display: inline;">
            <input type="hidden" name="carID" value="<?= htmlspecialchars($car->carID) ?>">
            <button type="submit">❤️</button>
        </form>
	</p>
    <p><b>Views:</b> <?= htmlspecialchars($car->views) ?> views</p>
    <p><b>Description:</b> <?= nl2br(htmlspecialchars($car->description)) ?></p>
    <p><b>Listed by Agent ID:</b> <?= htmlspecialchars($car->agent) ?></p>
    <p><b>Car ID:</b> <?= htmlspecialchars($car->carID) ?></p>
	</div>
	<div class="section">
	<h2>Loan Calculator</h2>
	<div class="form-group">
      <label for="carPrice">Car Price: $</label>
      <span id="carPrice"><?= htmlspecialchars($car->price) ?></span>
    </div>

    <div class="form-group">
      <label for="downpayment">Down Payment:</label>
      <span id="downpayment"></span>
    </div>

    <div class="form-group">
      <button onclick="calculateDownPayment(0.30)">30%</button>
      <button onclick="calculateDownPayment(0.40)">40%</button>
      <button onclick="calculateDownPayment(0.50)">50%</button>
    </div>

    <div class="form-group">
      <label for="interest">Interest Rate: 2.5%</label>
    </div>

    <div class="form-group">
      <label for="term">Loan Term: 12 months</label>
    </div>

    <div class="result">
      <p>Monthly Payment: <span id="monthly-payment">---</span></p>
      <p>Total Loan Amount: <span id="total-loan">---</span></p>
    </div>
	</div>

	<script src="loanCalculator.js"></script>
</div>

<div class="footer">
    <p>&copy; 2024 Website Title. All rights reserved.</p>
</div>

</body>
</html>
