<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">

  <title>Privacy</title>

</head>
<body>

  <div id="main">


  <header class="user-header">
    <a href="home_reg.php"><img src="img/NearHereLogo.jpeg" alt="Logo" class="header-logo"></a>

    <div>
        <form class="search-container" action="search.php" method="GET">
            <input type="text" name="q" placeholder="Search..." />
     <button type="submit"><img src="img/search.png" alt="search" id="searchimg"></button> 
          </form>
        </div>

    <div class="header-profile">
        <a href="profile.php">
            <img src="img/pfp.webp" alt="Profile" class="profile-pic">
        </a>
    </div>
</header>
    <div style="display: flex;">
      <nav style="min-width: 200px; background-color: #f5f5f5; padding: 20px; border-radius: 15px; display: flex; flex-direction: column; gap: 10px;">
        <a class="nav-button" href="profile.php">My Profile</a>
        <a class="nav-button" href="privacy.php">Privacy</a>
        <a class="nav-button" href="support.php">Support</a>
        <a class="nav-button" href="help.php">Help</a>
        <a class="nav-button" href="about.php">About</a>
        <a class="nav-button" href="manage-events.php">Manage my events</a>
        <a class="nav-button" href="logout.php">Log Out</a>
      </nav>
      <section style="flex: 1; padding: 20px;">
        <h2>Privacy</h2>
        <button class="nav-button">2 Factor Authentication</button>
        <button class="nav-button">Payment Methods</button>
        <button class="nav-button">Cookies</button>
        <button class="nav-button">Third Part Companies</button>
      </section>
    </div>
  </div>
</body>
</html>