<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once __DIR__ . '/php/ClassEventController.php';

$event_id = $_GET['event_id'] ?? null;

// if (!$event_id) {
//   echo "No event selected.";
//   exit();
// }

$controller = new ClassEventController();
$events = $controller->getEvents();

foreach ($events as $event) {
  if ($event['event_id'] == $event_id) {
    $event_name = $eventName = array_search($event, $events);
    $description = $event['description'];
    $event_date = $event['event_date'];
    $start_time = $event['start_time'];
    $end_time = $event['end_time'];
    $ticket_price = $event['price'];
    $tickets_available = $event['quantity'];
    $location = $event['location'];
    $main_event_picture = $event['main_event_picture'];
    break;
  }
}

// if (!isset($event_name)) {
//   echo "Event not found.";
// //   exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/edit-event.css">

  <title>Edit Event</title>

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

    <h2>Edit Event</h2>
    <form method="POST" action="edit-event.php" enctype="multipart/form-data" style="display: flex; flex-wrap: wrap; gap: 20px;">
      <input type="hidden" name="event_id" value="<?= $event_id ?>">
      <input type="hidden" name="current_picture" value="<?= $main_event_picture ?>">
      <div style="flex: 1 1 45%;">
        <label>Name of the event</label>
        <input type="text" name="event_name" value="<?= $event_name ?>">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Description</label>
        <input type="text" name="description" value="<?= $description ?>">
      </div>
      <div style="flex: 1 1 100%;">
        <label>Date</label>
        <input type="date" name="event_date" value="<?= $event_date ?>">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Start Time</label>
        <input type="time" name="start_time" value="<?= $start_time ?>">
      </div>
      <div style="flex: 1 1 45%;">
        <label>End Time</label>
        <input type="time" name="end_time" value="<?= $end_time ?>">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Capacity</label>
        <input type="number" name="Capacity" value="<?= $Capacity ?>">
      </div>
      <div style="flex: 1 1 45%;">
        <label>Tickets Available</label>
        <input type="number" name="tickets_available" value="<?= $tickets_available ?>">
      </div>
      <div style="flex: 1 1 30%;">
        <label>Ticket Price</label>
        <input type="text" name="ticket_price" value="<?= $ticket_price ?>">
      </div>
      <div style="flex: 1 1 100%;">
        <label>Location</label>
        <input type="text" name="location" value="<?= $location ?>">
      </div>
      <div style="flex: 1 1 100%;">
        <label>Main Event Picture</label>
        <div style="background-color: #ddd; height: 150px; border-radius: 10px;"></div>
      </div>
      <div style="flex: 1 1 100%; text-align: right;">
        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
        <button type="submit" name="update" class="nav-button">Save Changes</button>
      </div>
    </form>
  </div>
  <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  require_once __DIR__ . '/php/ClassEventController.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $controller = new ClassEventController();
    $controller->update();

    header(header: 'Location: edit-event.php?message=Event updated successfully');
    exit();
  }
  ?>
</body>

</html>