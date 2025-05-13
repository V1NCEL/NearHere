<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/create-event.css">

  <title>Create Event</title>

</head>
<body>




  <div id="main">

    <header class="user-header">
      <a href="home_admin.php"><img src="img/NearHereLogo.jpeg" alt="Logo" class="header-logo"></a>
  
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
    <h2>Create Event</h2>
    <form action="php/ClassEventController.php" method="POST" enctype="multipart/form-data" style="display: flex; flex-wrap: wrap; gap: 20px;">
      <div style="flex: 1 1 45%;">
        <label>Name of the event</label>
        <input type="text" name="event_name">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Description</label>
        <input type="text" name="description">
      </div>
      <div style="flex: 1 1 100%;">
        <label>Date</label>
        <input type="date" name="event_date">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Start Time</label>
        <input type="time" name="start_time">
      </div>
      <div style="flex: 1 1 45%;">
        <label>End Time</label>
        <input type="time" name="end_time">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Capacity</label>
        <input type="number" name="capacity">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Tickets Available</label>
        <input type="number" name="tickets_available	
">
      </div>
      <div style="flex: 1 1 30%;">
        <label>Ticket Price</label>
        <input type="text" name="ticket_price">
      </div>
      <div style="flex: 1 1 100%;">
        <label>Location</label>
        <input type="text" name="location">
      </div>
      <div style="flex: 1 1 100%;">
        <label>Main Event Picture</label>
        <div style="background-color: #ddd; height: 150px; border-radius: 10px;">
        <input type="file" name="main_event_picture" id="main_event_picture">
        </div>
      </div>
      <div style="flex: 1 1 100%; text-align: right;">
        <button class="nav-button">Create Event</button>
      </div>
    </form>
  </div>
</body>
</html>
