<?php
require_once('config/db.php');
require_once('config/controller.php');
$UserResult = ViewUserAccountBtn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Profiles</title>
    <link rel="stylesheet" href="userprofile.css">
</head>
<body>
    <div class="container">  
        <h1>View User Account </h1>
        <div class="container-table">
            <table>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Role</th>
                </tr>
                <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($UserResult))
                        {
                    ?>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phonenumber']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['role']; ?></td>

                    </tr>    
                    <?php   
                        }
                    ?>
            </table>
            <button class="btnBack"><a href="landingPage.html">Back</a></button> 
        </div>
    </div>
</body>
</html>