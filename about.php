<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">

  <title>About</title>
 
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
        <h2>About</h2>
        <div style="background: #ddd; padding: 20px; border-radius: 10px; font-size: 15px; line-height: 1.6;">
          <h3>About us NearHere</h3>
          <p>
            Near Here is an app where people can find and share nearby exhibitions, shows, and creative events. 
            To make local art and culture more visible, more connected, and more alive.
          </p>
          <p>
            The more we rely on algorithms, the less we see the things we truly care about. 
            Near Here brings everything into one place, creating a community-powered industry supporting local artists. 
            The more people share, the more vibrant the platform becomes, helping us feel connected to culture.
          </p>
          <p>
            Born from the frustration of missing out on exhibitions and cultural events that slip through the cracks 
            of noisy timelines and unpredictable algorithms, Near Here exists to offer something simpler, smarter, 
            and more human. We believe that the search for culture and new inspiration should be a spontaneous discovery 
            and genuine connection. That’s why Near Here focuses on geography helping you find what’s happening near you, 
            right now.
          </p>
          <p>
            We also believe in diversity, equal opportunity, and the freedom to be yourself. 
            We’re committed to an open culture where ideas are shared freely, failure is part of growth, 
            and everyone can express themselves without fear. Creativity thrives when we learn from each other — 
            and that’s what makes us human.
          </p>
          <p>
            We believe in an open world, social justice, and the pursuit of happiness.
          </p>
          <p><strong>See it, share it, live it.<br>Welcome to Near Here.</strong></p>
        </div>
      </section>
    </div>
  </div>
</body>
</html>