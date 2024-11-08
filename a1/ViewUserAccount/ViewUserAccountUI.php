<?php
    require_once('ViewUserAccountController.php');
    $controller = new ViewUserAccountController(); 
    $allUsers = $controller->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Profiles</title>
    <link rel="stylesheet" href="viewuseraccount.css">
</head>
<body>
    <div class="container">  
        <h1>View User Account</h1>
        <div class ="input-container">
            <input type="text" placeholder="search" id="search">
        </div>
        <div class="container-table">
            <table>
                <thead>
                    <tr><th>User id </th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($allUsers)) {
                        foreach ($allUsers as $user) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['phonenumber']); ?></td>
                                <td><?php echo htmlspecialchars($user['dob']); ?></td>
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
