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
    <link rel="stylesheet" href="./styles/popup.css">

    <script type="text/javascript" src="scripts/data_slider.js"></script>
    <script type="text/javascript" src="scripts/popup.js"></script>
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
            <button class="data-button" role="button" onclick="openPopup()" id="more-info-button"><span class="button-data-text">More Info</span></button>
            <div class="popup" id="popup">
                <img src="img/404-tick.png">
                <h2>Welcome to Creator Central - The Ultimate Social Network for DIY Enthusiasts</h2>
                <p>
                    Welcome to <b>Creator Central</b>, the ultimate social network for DIY enthusiasts of all levels! Our platform is designed to help you connect with like-minded individuals, share your DIY projects, get advice, and find inspiration for your next big project. Here's what you can expect when you join our community:
                    <br><br>
                    <b>Connect with others</b>: Creator Central is the perfect place to meet other DIY enthusiasts who share your passion. Whether you're looking to collaborate on a project, share ideas, or just chat with someone who "gets it," you'll find plenty of like-minded individuals here.
                    <br><br>
                    <b>Share your projects</b>: Are you proud of a recent DIY project you completed? Share it on Creator Central! Our platform makes it easy to upload photos and videos, add a description, and tag your project with relevant keywords. Not only will you get feedback on your work, but you'll also inspire others to take on similar projects.
                    <br><br>
                    <b>Ask for advice</b>: Stuck on a project? Not sure how to proceed? Don't worry - Creator Central is here to help. Ask for advice from our community of DIY experts, and get the guidance you need to complete your project successfully.
                    <br><br>
                    <b>Find inspiration</b>: Looking for your next big project? Browse through our library of DIY projects, and find inspiration for your next creation. Whether you're interested in woodworking, home decor, or something else entirely, you'll find plenty of ideas to spark your creativity.
                    <br><br>
                    <b>Learn new skills</b>: Creator Central is more than just a social network - it's also a place to learn new skills. Take advantage of our community resources, tutorials, and workshops, and take your DIY skills to the next level.
                    <br><br>
                    <b>Creator Central</b> was founded by <b>Maxime Blanchard and Flavian Theurel</b>, two passionate DIYers who wanted to create a space where DIY enthusiasts of all levels could connect, share their projects, ask for advice, and find inspiration for their next creation. With their combined expertise in woodworking, home renovation, and crafting, Maxime and Flavian have created a platform that is welcoming, inclusive, and supportive of all DIYers. Join their community today, and start sharing your passion for DIY with others!
                </p>
                <button type="button" onclick="closePopup()">Close</button>
            </div>
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
