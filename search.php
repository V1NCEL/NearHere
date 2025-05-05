<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">

  <title>Search</title>
  
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
    <h2>NearHere</h2>

    <h3>Showing results for "MUSIC"</h3>
    <div style="display: flex;">
      <nav style="min-width: 200px; background-color: #f5f5f5; padding: 20px; border-radius: 15px; display: flex; flex-direction: column; gap: 10px;">
        <a class="nav-button" >Filters</a>
        <a class="nav-button" >Art</a>
        <a class="nav-button" >Music</a>
        <a class="nav-button" >Performances</a>
        <a class="nav-button" >Events</a>
        <a class="nav-button" >Expo</a>
      </nav>
    <div style="display: flex; gap: 20px; margin-top: 20px;">
      <img src="img/img3.jpeg" alt="Madama Butterfly" style="width: 150px; border-radius: 10px;">
      <div>
      <a href="event-page.php">  <strong>Madama Butterfly, de G. Puccini</strong></a>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut ultricies...</p>
      </div>
    </div>
  </div>
</body>
</html>
