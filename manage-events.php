<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">

  <title>Event Manager</title>

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
        <h2>Event Manager</h2>
        <h3>Active Events</h3>
        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
          <div class="pop"><img id="pop_img" src="event1.jpg" alt="Event 1"><p>DISTENSIONS #4 Coral</p>
          <a href="edit-event.php">Edit</a>
        <form method="POST" action="php/ClassEventController.php" onsubmit="return confirm('Are you sure?')">
    <input type="hidden" name="event_id" value="<?= $row['event_id'] ?>">
    <button type="submit" name="delete" class="btn-delete" value="delete">Delete</button>
</form></div>
          <div class="pop"><img id="pop_img" src="event2.jpg" alt="Event 2"><p>AMAZÔNIA</p>
            <a href="edit-event.php">Edit</a></div></div>
          <div class="pop"><img id="pop_img" src="event3.jpg" alt="Event 3"><p>Madama Butterfly</p>
            <a href="edit-event.php">Edit</a></div></div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>