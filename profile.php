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
      <form method="POST" action="php/ClassUserController.php" enctype="multipart/form-data" style="flex: 1; padding: 20px;" onsubmit="return confirm('Are you sure you want to delete your account?')">
  <h2>Profile</h2>
  <div style="display: flex; flex-wrap: wrap; gap: 20px;">
    <div style="flex: 1 1 45%;">
      <label for="name">Name</label>
      <input type="text" id="name" name="name">
    </div>
    <div style="flex: 1 1 45%;">
      <label for="username"> Surname</label>
      <input type="text" id="username" name="username">
    </div>
    <div style="flex: 1 1 45%;">
      <label for="email">Email</label>
      <input type="email" id="email" name="email">
    </div>
    <div style="flex: 1 1 45%;">
      <label for="number">Phone Number</label>
      <input type="number" id="number" name="number">
    </div>
    <div style="flex: 1 1 45%;">
      <label for="profile_picture">Profile Picture</label>
      <input type="file" id="profile_picture" name="profile_picture">
      <!-- <div class="profile-picture"></div> -->
    </div>
    <div style="flex: 1 1 45%;">
      <label for="pronouns">Pronouns</label>
      <input type="text" id="pronouns" name="pronouns">
    </div>
    <div style="flex: 1 1 calc(100% - 170px);">
      <label for="socials">Socials</label>
      <input type="text" id="socials" name="socials">
    </div>
  </div>

  <div style="margin-top: 20px;">
    <button class="nav-button" type="submit" name="update">Edit Info</button>
    <button class="nav-button" type="submit"  name="delete">Delete Account</button>
  </div>

  <div style="margin-top: 30px;">
    <a href="home_reg.php">Return to homepage</a>
  </div>
</form>

    </div>
  </div>
</body>
</html>