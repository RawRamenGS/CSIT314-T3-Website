<?php 
    require_once('SearchUserProfileController.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = trim($_POST['search']);
    
    $controller = new SearchUserProfileController();

    $result = $controller->searchUserProfile($search);

}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Profiles</title>
    <link rel="stylesheet" href="searchuserprofile.css">
</head>
<body>
    <div class="container">  
        <h1>View User Account</h1>
        <form action="SearchUserAccountUI.php" method="post">
        <div class ="input-container">
            <input type="text" placeholder="search" id="search" name="search">
            <button class="btnSearch">Search</button>
        </div>
        </form>
        <div class="container-table">
            <table>
                <thead>
                    <tr><th>Profile id </th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($result)) {
                        foreach ($result  as $user) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['profileId']); ?></td>
                                <td><?php echo htmlspecialchars($user['Name']); ?></td>
                                <td><?php echo htmlspecialchars($user['Description']); ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">No profile found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

