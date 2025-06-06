<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/registration.css">



</head>
<body>
    

    <div id="main">
        <h1>Join NearHere Now As Admin!</h1>
        <form action="php/ClassUserController.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname">
        
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        
            <label for="pass">Password</label>
            <input type="password" name="password" id="password">
        
            <label for="cpass">Confirm Password</label>
            <input type="password" name="confirmpassword" id="confirmpassword">
        
            <label for="pronouns">Pronouns</label>
            <select name="pronouns" id="pronouns">
                <option value="she/her">She/Her</option>
                <option value="he/him">He/Him</option>
                <option value="they/them">They/Them</option>
                <option value="other">Other</option>
            </select>
        
            <label for="pnumber">Phone Number</label>
            <input type="number" name="pnumber" id="pnumber">
        
            <label for="socials">Socials</label>
            <input type="url" name="socials" id="socials">
        
            <label for="pfp">Profile Picture</label>
            <input type="file" name="image" id="image">

            <?php if (isset($_SESSION['error'])): ?>
    <div style="color:red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
        

            <div id="bot">
                <div>
            <button type="submit" name="register" value="user">Advertiser Account</button>
            </div><br>
            <a href="login.php">
                <p>Already have an account? Sign in Now!</p>
            </a>
        </div>
    </form>

    </div>
</body>
</html>