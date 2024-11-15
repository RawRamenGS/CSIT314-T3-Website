<?php
    require_once('ViewUserProfileController.php');
    $controller = new ViewUserProfileController(); 
    $allProfiles = $controller->getAllProfiles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Profiles</title>
    <link rel="stylesheet" href="viewuserProfile.css">
</head>
<body>
<a href="../landingPage.php" class="backBtn">&lt; Back</a>
    <div class="container">  
        <h1>View User Profile</h1>
        <form action="../SearchUserProfile/SearchUserProfileUI.php" method="post">
        <div class ="input-container">
            <input type="text" placeholder="search" id="search" name="search">
            <button class="btnSearch">Search</button>
        </div>
        </form>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>Profile Id </th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($allProfiles)) {
                        foreach ($allProfiles as $user) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['profileId']); ?></td>
                                <td><?php echo htmlspecialchars($user['Name']); ?></td>
                                <td><?php echo htmlspecialchars($user['Description']); ?></td>
                                <td><?php echo htmlspecialchars($user['status']); ?></td>
                                <td>
                                    <form action="../UpdateUserProfile/UpdateUserProfileUI.php" method="get">
                                        <input type="hidden" name="profileId" value="<?php echo $user['profileId']; ?>">
                                        <button type="submit" class="btn1">Edit</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="../SuspendUserProfile/SuspendUserProfileUI.php" method="post">
                                        <input type="hidden" name="profileId" value="<?php echo $user['profileId']; ?>">
                                        <button type="submit" class="btn1">Suspend</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">No users found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
