<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Coral+Pixels&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="main">
        <h1>You're about to log out</h1>
        <form action="php/ClassUserController.php" method="POST">
            <button type="submit" name="logout">Log Out</button><br>
            <a href="profile.php">
                <p>Changed your mind? Return to Dashboard</p>
            </a>
        </form>
    </div>
</body>

</html>