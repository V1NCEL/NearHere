<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">

  <title>Profile</title>
  
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
            <img src="<?php echo 'img/' . $_SESSION['image']; ?>" alt="Profile" class="profile-pic">
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
  <form method="POST" action="php/ClassUserController.php" enctype="multipart/form-data" style="flex: 1; padding: 20px;" onsubmit="return confirm('Are you sure you want to update your account information?');">
    <h2>Profile</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
      <div style="flex: 1 1 45%;">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
      </div>
      <div style="flex: 1 1 45%;">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname">
      </div>
      <div style="flex: 1 1 45%;">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
      </div>
      <div style="flex: 1 1 45%;">
        <label for="pnumber">Phone Number</label>
        <input type="number" id="pnumber" name="pnumber">
      </div>
      <div style="flex: 1 1 45%;">
        <label for="image">Profile Picture</label>
        <input type="file" id="image" name="image">
      </div>
      <div style="flex: 1 1 45%;">
        <label for="pronouns">Pronouns</label><br>
        <select name="pronouns" id="pronouns">
          <option value="she/her">She/Her</option>
          <option value="he/him">He/Him</option>
          <option value="they/them">They/Them</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div style="flex: 1 1 calc(100% - 170px);">
        <label for="socials">Socials</label>
        <input type="text" id="socials" name="socials">
      </div>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
    <div style="color:red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
    <div style="color:green;"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <div style="margin-top: 20px;">
      <button class="nav-button" type="submit" name="update" value="update">Edit Info</button>
    </div>
  </form>

  <form method="POST" action="php/ClassUserController.php" style="padding: 20px;" onsubmit="return confirm('Are you sure you want to delete your account?');">
    <button class="nav-button" type="submit" name="delete" value="delete">Delete Account</button>
  </form>
</div>

<div style="margin-top: 30px; padding: 20px;">
  <a href="home_reg.php">Return to homepage</a>
</div>

    </div>
  </div>
</body>
</html>