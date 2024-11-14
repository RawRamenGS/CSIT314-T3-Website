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
    <title>View User Account</title>
    <link rel="stylesheet" href="ViewUserAccountUI.css">
</head>
<body>
<a href="../landingPage.php" class="backBtn">&lt; Back</a>
    <div class="container">  
        <h1>View User Account</h1>
        <form action="../SearchUserAccount/SearchUserAccountUI.php" method="post">
        <div class ="input-container">
            <input type="text" placeholder="search" id="search" name="search">
            <button class="btnSearch">Search</button>
        </div>
        </form>
        <div class="container-table">
            <table>
                <thead>
                    <tr><th>User id </th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($allUsers)) {
                        foreach ($allUsers as $user) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['phonenumber']); ?></td>
                                <td><?php echo htmlspecialchars($user['dob']); ?></td>
                                <td><?php echo htmlspecialchars($user['status']); ?></td>
                                <td>
                                    <form action="../UpdateUserAccount/UpdateUserAccountUI.php" method="get">
                                        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                                        <button type="submit" class="btn1">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="../SuspendUserAccount/SuspendUserAccountUI.php" method="post">
                                        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                                        <button type="submit" class="btn1">Suspend</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="7">No users found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
