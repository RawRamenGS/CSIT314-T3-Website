<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <form action="connect.php" method="post">
        <div class="Personal-Detail">
            <div class="name">
                <label>Username</label><br>
                <input type="text" required name="username" >
            </div>
            
            <div class="Password">
                <label>Password</label><br>
                <input type="password" required ><br>
                <br>
                <label>Retype Password</label><br>
                <input type="password" required name="password">
            </div>
        
            <div class="Email">
                <label>Email</label><br>
                <input type="text" required name="email">
            </div>

            <div class="PhoneNumber">
                <label>Phone Number</label><br>
                <input type="text" required name="phonenumber">
            </div>
            <div class="dob-role">
                <div class="dob">
                        <label for="dob">Date of Birth</label><br>
                        <input type="date" id="dob" name="dateBirth" min="1980-01-01" max="2024-10-01" required>
                </div>

                <div class="role">
                    <label for="role">Register  as a</label><br>
                    <select name="roles" id="roles">
                        <option value="B" selected>Buyer</option>
                        <option value="S">Seller</option>
                        <option value="UA">User admin</option>
                        <option value="UCA">Agent</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn">Register</button>
            
            <div class="login-link">
                <p> Click <a href="Login.html">here</a> to login</p>
            </div>
        </div>
    </form>
     
</body>
</html>