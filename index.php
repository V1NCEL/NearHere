<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page Near Here</title>

    <link rel="stylesheet" href="css/index.css" type="text/css"/>


</head>
<body>

    <header>
        <a href="login.php"> SIGN IN</a>
        <a href="registration.php"> SIGN UP</a>
        <a href="registration_admin.php"> SIGN UP ADMIN</a>


    </header>


    <img src="img/NearHereLogo.jpeg" alt="" srcset="" id="logo">
    <div>
    <form class="search-container" action="search.php" method="GET">
        <input type="text" name="q" placeholder="Search..." />
 <button type="submit"><img src="img/search.png" alt="search" id="searchimg"></button> 
      </form>
      
    
   

    </div>

    <div id="main">
        <div>
            <h2>Eventos Populares</h2>
        </div>
        <div id="top">
        <div class="pop"><img src="./img/img1.jpg" alt="" id="pop_img"></div>
        <div class="pop"><img src="./img/img2.jpeg" alt="" id="pop_img"></div>
        <div class="pop"><img src="./img/img3.jpeg" alt="" id="pop_img"></div>

        </div>

        <div id="middle">
            <h2>Categorias</h2>
            <div id="b1">

                <div class="cat"></div>
                <div class="cat"></div>
                <div class="cat"></div>
            </div>

            <div id="b2">
                <div class="cat"></div>
                <div class="cat"></div>
                <div class="cat"></div>
            </div>

    </div>
    <div id="bottom2">

        <h3>About us</h3>
        <div id="b1_2">
        <div class="own"></div>
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