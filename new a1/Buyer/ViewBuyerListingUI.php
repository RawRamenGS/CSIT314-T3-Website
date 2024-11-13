<?php
// Get the car ID from the URL
if (isset($_GET['id'])) {
    $carId = $_GET['id'];

    // Fetch the car details from the database or data source
    // For this example, we'll use the same $cars array
    $cars = [
        ["id" => 1, "image" => "images/car-placeholder.png", "name" => "Car 1", "price" => "200", "favourites" => 11, "description" => "Description of Car 1"],
        ["id" => 2, "image" => "images/car-placeholder.png", "name" => "Car 2", "price" => "300", "favourites" => 41, "description" => "Description of Car 2"],
        ["id" => 3, "image" => "images/car-placeholder.png", "name" => "Car 3", "price" => "100", "favourites" => 24, "description" => "Description of Car 3"],
        ["id" => 4, "image" => "images/car-placeholder.png", "name" => "Car 4", "price" => "180", "favourites" => 30, "description" => "Description of Car 4"],
    ];

    // Find the car with the matching ID
    $selectedCar = null;
    foreach ($cars as $car) {
        if ($car['id'] == $carId) {
            $selectedCar = $car;
            break;
        }
    }

    if ($selectedCar) {
        // Display the car details
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $selectedCar['name']; ?> - Car Details</title>
            <link rel="stylesheet" href="ViewBuyerListingUI.css">
        </head>
        <body>
            <!-- Header -->
            <header>
                <h1>Buyer View Car Listing</h1>
                <div class="user-profile">
				<div class="profile-icon">&#128100;</div>
                    <button class="logoutBtn">Logout</button>
                </div>
            </header>

            <!-- Back Button -->
            <div class="back-button-section">
                <a href="SearchBuyerListingUI.php" class="back-button">⬅ Back</a>
            </div>

            <!-- Car Details Section -->
            <section class="car-details-section">
                <div class="car-details">
                    <img src="<?php echo $selectedCar['image']; ?>" alt="<?php echo $selectedCar['name']; ?>" class="car-image-large">
                    <h2><?php echo $selectedCar['name']; ?></h2>
                    <p id="carPrice" class="price">$<?php echo $selectedCar['price']; ?></p>
                    <p class="description"><?php echo $selectedCar['description']; ?></p>
                    <p class="favourites">
                        <span class="favourites-count"><?php echo $selectedCar['favourites']; ?></span>
                        <button class="heart-btn" data-car-id="<?php echo $selectedCar['id']; ?>">❤️</button>
                    </p>
                </div>
            </section>

			
            <!-- Loan Calculator Section -->
            <section class="loan-calculator-section">
                <h2>Loan Calculator</h2>
                <label for="downPayment">Select Down Payment Percentage:</label>
                <select id="downPayment" onchange="calculateDownPayment(this.value)">
                    <option value="0">Choose</option>
                    <option value="0.1">10%</option>
                    <option value="0.2">20%</option>
                    <option value="0.3">30%</option>
                </select>

                <div class="loan-details">
                    <p>Down Payment: <span id="downpayment"></span></p>
                    <p>Monthly Payment for 12 Months: <span id="monthly-payment"></span></p>
                    <p>Total Loan Amount: <span id="total-loan"></span></p>
                </div>
            </section>

            <!-- JavaScript to handle favourites and loan calculator -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Favourites button functionality
                    const heartButton = document.querySelector('.heart-btn');
                    heartButton.addEventListener('click', function() {
                        console.log('Heart button clicked!');
                        const favouritesCountSpan = document.querySelector('.favourites-count');
                        let favouritesCount = parseInt(favouritesCountSpan.textContent);
                        favouritesCount++;
                        favouritesCountSpan.textContent = favouritesCount;
                        this.classList.add('liked');
                        this.disabled = true;
                    });
                });

                // Loan Calculator Script
                function calculateDownPayment(percentage) {
                    // If "Choose" is selected, do not calculate
                    if (percentage == "0") {
                        document.getElementById('downpayment').textContent = "";
                        document.getElementById('monthly-payment').textContent = "";
                        document.getElementById('total-loan').textContent = "";
                        return;
                    }

                    const carPrice = parseFloat(document.getElementById("carPrice").innerText.replace('$', ''));

                    // Fixed values
                    const interestRate = 2.5 / 100;  // 2.5% interest rate
                    const loanTerm = 12; // 12 months

                    const downPayment = carPrice * percentage;  // Calculate down payment based on selected percentage
                    const loanAmount = carPrice - downPayment;  // Calculate remaining loan amount

                    const monthlyInterestRate = interestRate / 12; // Monthly interest rate
                    const monthlyPayment = (loanAmount * monthlyInterestRate) / (1 - Math.pow(1 + monthlyInterestRate, -loanTerm));

                    const totalLoanAmount = monthlyPayment * loanTerm;

                    // Update the UI with the calculated values
                    document.getElementById('downpayment').textContent = `$${downPayment.toFixed(2)}`;
                    document.getElementById('monthly-payment').textContent = `$${monthlyPayment.toFixed(2)}`;
                    document.getElementById('total-loan').textContent = `$${totalLoanAmount.toFixed(2)}`;
                }
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "Car not found.";
    }
} else {
    echo "No car ID provided.";
}
?>
