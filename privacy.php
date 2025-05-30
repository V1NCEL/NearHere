<?php session_start(); ?>

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
<br><br>
        <h3>Change Password</h3><br>
        <form method="POST" action="php/ClassUserController.php" onsubmit="return confirm('Are you sure you want to update your password?');">
    <input type="password" name="current_password" placeholder="Current Password" required>
    <input type="password" name="new_password" placeholder="New Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm New Password" required>

    
    <?php if (isset($_SESSION['error'])): ?>
    <div style="color:red;">
      <?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
    <div style="color:green;"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <br>



    <button type="submit" name="update_password">Change Password</button>
</form>
      </section>
    </div>
  </div>
</body>
</html>