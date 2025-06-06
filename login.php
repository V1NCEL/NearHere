<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Coral+Pixels&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">



</head>

<body>
    
    <div id="main">
        <h1>Join NearHere Now!</h1>

        <form action="php/ClassUserController.php" method="POST" enctype="multipart/form-data">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">

            <label for="pass">Password</label>
            <input type="password" name="password" id="password">
            <?php if (isset($_SESSION['error'])): ?>
    <div style="color:red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
            <button type="submit" name="login">Log in</button><br>
            <a href="registration.php">
                <p> Don't have an account yet? Sign up Now!</p>
            </a>
        </form>

    </div>
</body>

</html>