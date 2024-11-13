<?php
    session_start();

    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        header("Location: ../Login/Login.html"); // Redirect to login page if not authenticated
        exit;
    }
    require_once('ViewRateReviewController.php');
    $controller = new ViewRateReviewController();
    $feedbacks = $controller->ViewRateReview();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="ViewRateReview.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
        <div class="user-profile">
		<div class="profile-icon">&#128100;</div>
            <a href="../Login/Logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <!-- Navigation Tabs -->
	<nav class="navBar">
		<a href="UsedCarAgentHomeUI.php" id="homeBtn">Home</a>
        <a href="CreateUsedCarListing.php" id="createNewBtn">Create New Listing</a>
        <a href="ManageUsedCarListing.php" id="listingBtn">My Listings</a>
		<a href="ViewRateReviewUI.php" id="reviewBtn">My Reviews</a>
    </nav>
    <a href="UsedCarAgentHomeUI.php" class="backBtn">&lt; Back</a>
    <div class="container-table">
            <table>
                <thead>
                    <tr><th>Feedback id </th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Respodent</th>  
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (is_array($feedbacks) && !empty($feedbacks)) {
                    foreach ($feedbacks as $feedback){?>
                        <tr>
                            <td class ="td1"><?php echo htmlspecialchars($feedback['feedbackId']); ?></td>
                            <td class ="td1"><?php echo htmlspecialchars($feedback['rating']); ?></td>
                            <td class ="td1"><?php echo htmlspecialchars($feedback['review']); ?></td>
                            <td class ="td1"><?php echo htmlspecialchars($feedback['respondent']); ?></td>
                            <td class ="td1"><?php echo htmlspecialchars($feedback['role']); ?></td>
                    </tr>         
                    <?php
                    }
                }else{?>
                    <tr>
                            <td colspan="5">No users found.</td>
                    </tr>
                <?php
                }
                ?>      
                </tbody>
            </table>
            </div>
</body>
</html>