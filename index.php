

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Creator Central</title>
    <link rel="stylesheet" href="./styles/background-image.css">
    <link rel="stylesheet" href="./styles/homepage.css">
    <link rel="stylesheet" href="./styles/font.css">
    <link rel="stylesheet" href="./styles/nav_bar.css">
    <link rel="stylesheet" href="./styles/slider_background.css">
</head>

<body>

    <div class="nav-container">
        <div class="logo-container">
            <img class="logo" src="img/creator_central.png" alt="Creator Central Logo">
        </div>
        <div class="big-button-container">
            <button class="connexion-button" id="log-in-button" role="button"><span class="button-text">Log in</span></button>
            <button class="connexion-button" id="sign-in-button" role="button"><span class="button-text">Sign in</span></button>
        </div>
    </div>


    <div class="main-container">

        <input type="radio" id="trigger1" name="slider" checked autofocus>
        <label for="trigger1"><span class="sr-only">Slide 1 of 4. Explorer</span></label>
        <div class="slide bg1">
            <img class="wave-img-top" src="img/Waves/wave1-top.png" alt="Wave n°1 Top">
            <img class="wave-img-bot" src="img/Waves/wave1-bot.png" alt="Wave n°1 Bottom">
            <button class="test-button" role="button"><span class="button-text">Log in</span></button>
        </div>

        <input type="radio" id="trigger2" name="slider">
        <label for="trigger2"><span class="sr-only">Slide 2 of 4. Search</span></label>
        <div class="slide bg2">
            <img class="wave-img-top" src="img/Waves/wave2-top.png" alt="Wave n°2 Top">
            <img class="wave-img-bot" src="img/Waves/wave2-bot.png" alt="Wave n°2 Bottom">
        </div>

        <input type="radio" id="trigger3" name="slider">
        <label for="trigger3"><span class="sr-only">Slide 3 of 4. Information</span></label>
        <div class="slide bg3">
            <img class="wave-img-top" src="img/Waves/wave3-top.png" alt="Wave n°3 Top">
            <img class="wave-img-bot" src="img/Waves/wave3-bot.png" alt="Wave n°3 Bottom">
        </div>

        <input type="radio" id="trigger4" name="slider">
        <label for="trigger4"><span class="sr-only">Slide 4 of 4. Sign-in</span></label>
        <div class="slide bg4">
            <img class="wave-img-top" src="img/Waves/wave4-top.png" alt="Wave n°4 Top">
            <img class="wave-img-bot" src="img/Waves/wave4-bot.png" alt="Wave n°4 Bottom">
        </div>

    </div>
</body>
</html>


<?php

?>
