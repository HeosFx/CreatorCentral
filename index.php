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
    <link rel="stylesheet" href="./styles/data_slider.css">

    <script type="text/javascript" src="scripts/data_slider.js"></script>
</head>

<body>

    <!--Navigation bar-->

    <div class="nav-container">
        <div class="logo-container">
            <img class="logo" src="img/creator_central.png" alt="Creator Central Logo">
        </div>
        <!--Button in the top right corner-->
        <div class="big-button-container">
            <button class="connexion-button" id="log-in-button" role="button" onclick="location.href='login.php'"><span class="button-text">Log in</span></button>
            <button class="connexion-button" id="sign-in-button" role="button"><span class="button-text" onclick="location.href='register.php'">Sign in</span></button>
        </div>
    </div>

    <!--Background slider-->

    <div class="main-container">

<!--        Slide 1 : Explore-->
        <input type="radio" onclick="showData1()" id="trigger1" name="slider" checked autofocus>
        <label for="trigger1"><span class="sr-only">Slide 1 of 4. Explore</span></label>
        <div class="slide bg1">
            <img class="wave-img-top" src="img/Waves/wave1-top.png" alt="Wave n°1 Top">
            <img class="wave-img-bot" src="img/Waves/wave1-bot.png" alt="Wave n°1 Bottom">
        </div>

<!--        Slide 2 : Search-->
        <input type="radio" onclick="showData2()" id="trigger2" name="slider">
        <label for="trigger2"><span class="sr-only">Slide 2 of 4. Search</span></label>
        <div class="slide bg2">
            <img class="wave-img-top" src="img/Waves/wave2-top.png" alt="Wave n°2 Top">
            <img class="wave-img-bot" src="img/Waves/wave2-bot.png" alt="Wave n°2 Bottom">
        </div>

<!--        Slide 3 : Information / More info-->
        <input type="radio" onclick="showData3()" id="trigger3" name="slider">
        <label for="trigger3"><span class="sr-only">Slide 3 of 4. Information</span></label>
        <div class="slide bg3">
            <img class="wave-img-top" src="img/Waves/wave3-top.png" alt="Wave n°3 Top">
            <img class="wave-img-bot" src="img/Waves/wave3-bot.png" alt="Wave n°3 Bottom">
        </div>

<!--        Slide 4 : Sign-in-->
        <input type="radio" onclick="showData4()" id="trigger4" name="slider">
        <label for="trigger4"><span class="sr-only">Slide 4 of 4. Sign-in</span></label>
        <div class="slide bg4">
            <img class="wave-img-top" src="img/Waves/wave4-top.png" alt="Wave n°4 Top">
            <img class="wave-img-bot" src="img/Waves/wave4-bot.png" alt="Wave n°4 Bottom">
        </div>

    </div>

    <!--Layer composed of the text, the buttons,etc. on the foreground-->

    <div class="data-container">

<!--        Slide 1 : Button 'Explore' and text-->
        <div class="data-slide show" id="slide1-container">
            <div class="data-text-div">
                <p class="data-text">
                    Welcome on <br> Creator Central
                </p>
            </div>
            <button class="data-button" role="button" onclick="location.href='feed.php'"><span class="button-data-text">Explore</span></button>
        </div>

<!--        Slide 2 : Search bar and text-->
        <div class="data-slide" id="slide2-container">
            <div class="data-text-div">
                <p class="data-text data-text-big">
                    Where Creativity <br> Meets Community
                </p>
            </div>
            <button class="data-button" role="button"><span class="button-data-text">Search</span></button>
        </div>

<!--        Slide 3 : Creator central presentation and button 'More Info'-->
        <div class="data-slide" id="slide3-container">
            <div class="data-text-div">
                <p class="data-text data-text-small">
                    Creator Central is a social network for DIY enthusiasts af all levels to connect,
                    share their projects, ask for advice, and find inspiration for their next project.
                    Whether you're a seasoned DIYer or just starting out, Creator Central is the perfect
                    place to discover new projects, get feedback on your work, and connect with others who
                    share your passion for DIY.
                </p>
            </div>
            <button class="data-button" role="button" id="more-info-button"><span class="button-data-text">More Info</span></button>
        </div>

<!--        Slide 4 : Text to enroll people and button 'Sign in'-->
        <div class="data-slide" id="slide4-container">
            <div class="data-text-div" id="slide4-text">
                <p class="data-text data-text-small">
                    On Creator Central, you can create a profile, share photos and videos of
                    your projects, and connect with other members. You can also browse the
                    site for inspiration and ideas, and search for projects by category,
                    difficulty level, or materials used. Members can offer feedback and advice
                    on your projects, and you can do the same for others.<br><br>
                    Join Creator Central today and become part of a vibrant community of
                    DIY enthusiasts who share your passion for creativity and innovation.
                    Whether you're looking to tackle a big project or just want to connect with
                    like-minded individuals, Creator Central is the perfect place to do it.
                </p>
            </div>
            <button class="data-button" role="button" id="slide4-button"><span class="button-data-text">Sign in</span></button>
        </div>
    </div>
</body>

</html>


<?php

?>
