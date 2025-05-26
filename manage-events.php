<?php
require_once 'php/ClassEventController.php';
$event = new ClassEventController();
$events = $event->getEvents();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/manage-events.css">

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

      <div class="event-cards-container">
  

    <?php if (isset($_SESSION['error'])): ?>
    <div style="color:red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
    <div style="color:green;"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <?php
  foreach ($events as $event_name => $event) {
  ?>
    <div class="event-card">
    <img src="img/<?php echo htmlspecialchars($event['main_event_picture']); ?>" alt="Event Image" class="event-image"> 
      <div class="event-details">
        <h3><?php echo htmlspecialchars($event_name); ?></h3>
        <p><strong>Date:</strong> <?php echo htmlspecialchars($event['event_date']); ?></p>
        <p><strong>Time:</strong> <?php echo htmlspecialchars($event['start_time'] . ' - ' . $event['end_time']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
        <p><strong>Tickets Available:</strong> <?php echo $event['quantity']; ?></p>
        <p><strong>Ticket Price:</strong> €<?php echo number_format($event['price'], 2); ?></p>
        <div class="card-actions">
        <form method="POST" action="php/ClassEventController.php" onsubmit="return confirm('Are you sure you want to update this event?');">
  <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event['event_id']); ?>">
  <button type="submit" name="edit" class="btn-edit">Edit</button>
</form>

<form method="POST" action="php/ClassEventController.php" onsubmit="return confirm('Are you sure you want to delete this event?');">
  <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event['event_id']); ?>">
  <button type="submit" name="delete" class="btn-delete">Delete</button>
</form>
        </div>
      </div>
      <br>
    </div>
  <?php } ?>
</div>

    </div>
  </div>
</body>
</html>