<?php
// Retrieve the userId from the URL query parameter
$profileId = $_GET['profileId'];  // Assuming the userId is passed as a GET parameter
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link rel="stylesheet" href="Update.css">
</head>
<body>
    <h1>Update Page</h1>
    <form action="UpdateUserProfile.php" method="post">
        <input type="hidden" name="profileId" value="" id="profileIdInput">
        <div class="sellerwelcome">Welcome to Profile Creation Page</div>
        <div class="input-container">
            <label for="pf">Update Profile Name:</label>
            <input type="text" id="profileName" name="profileName" required>
            <label for="df">Update Profile Description:</label>
            <input type="text" id="description" name="description" required>
        </div>

        <button type="submit" id="createBtn">Update Profile</button>

     </div>
    </form>
    <script>
        // Retrieve userId from URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const profileId = urlParams.get('profileId');
        
        // Set the userId as the value for the hidden input field
        document.getElementById('profileIdInput').value = profileId;
    </script>
</body>
</html>