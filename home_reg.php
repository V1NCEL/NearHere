<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page Near Here</title>

    <link rel="stylesheet" href="css/home_reg.css" type="text/css"/>

<style>
    .cat_img{
    width: 100px;
    height: 100px;
    border-radius: 10px;
    display: block;
    object-fit: cover; 
}
</style>
</head>
<body>

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




    <div id="main">
        <div>
            <h2>Eventos Populares</h2>
            <a href="home_admin.php"> ADMIN</a>
        </div>
        <div id="top">

        <div class="pop"><img src="./img/img1.jpg" alt="" id="pop_img"></div>
        <div class="pop"><img src="./img/img2.jpeg" alt="" id="pop_img"></div>
        <div class="pop"><img src="./img/img3.jpeg" alt="" id="pop_img"></div>

        </div>

        <div id="middle">
            <h2>Categorias</h2>
            <div id="b1">

                <div class="cat">
                    <img src="./img/music.jpg" alt="" class="cat_img">
                    <p>MUSIC</p>
                </div>
                <div class="cat">
                <img src="./img/art.jpg" alt=""  class="cat_img">
                <p>ART</p>
                </div>

            </div>

            <div id="b2">
                <div class="cat">
                <img src="./img/sport.jpg" alt=""  class="cat_img">
                <p>SPORTS</p>
                </div>
                <div class="cat">
                <img src="./img/gast.jpg" alt=""  class="cat_img">
                <p>GASTRONOMY</p>
                </div>
            </div>

    </div>
    <div id="bottom2">

        <h3>About us</h3>
        <div id="b1_2">
        <div class="own"></div>
        <div class="own"></div>
    </div>
    </div>
</div>

    </div>

    <footer>
    </footer>

    
 
</body>
</html>