<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/event-page.css">
  <title>Event Page</title>

  
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
    <h3>Madama Butterfly, de G. Puccini</h3>
    <div class="nav-button">Òpera escenificada en dos actes</div>

    <div class="event-layout">
      <div class="event-description">
        <p>
          Madama Butterfly de Giacomo Puccini és una de les òperes més aclamades i freqüentment representades a nivell internacional.
          Poques òperes del repertori habitual emocionen i commouen el públic com aquesta obra mestra d’inicis del segle XX (1904). 
          Basada en el drama teatral de David Belasco, la seva meravellosa orquestració i inspiració melòdica, verista i a la vegada exòtica 
          i extremadament passional, han fet d’ella una de les històries més tràgiques i alhora més penetrants i emotives de tots els temps.
        </p>
        <p>
          Versió escenificada de dues hores amb un entreacte de 15 minuts. Orquestra simfònica integrada a l’espectacle, cantants solistes, 
          cor, ballet, vestuari d’època, il·luminació i muntatge tècnic únic, aprofitant les característiques tan especials de la Sala de 
          Concerts del Palau de la Música Catalana. Més de 60 artistes a escena!
        </p>
      </div>
      <div class="event-image">
        <img src="img/img3.jpeg" alt="Event Main Image">
      </div>
    </div>

    <div class="event-section">
      <h4>Photos</h4>
      <div class="photo-box"></div>
    </div>

    <div class="event-bottom">
      <div class="review-box">
        <h4>Check the reviews on this event!</h4>
        <div class="review"></div>
      </div>
      <div class="contact-box">
        <p>Get in Contact with the main event managers!</p>
        <button class="nav-button">Contact Request</button>
      </div>
    </div>

    <div class="join-button">
      <button class="nav-button">JOIN EVENT NOW!</button>
    </div>
  </div>
</body>
</html>
