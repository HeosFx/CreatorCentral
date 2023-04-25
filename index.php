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
    <link rel="stylesheet" href="./styles/search_bar.css">

    <script type="text/javascript" src="scripts/data_slider.js"></script>
    <script type="text/javascript" src="scripts/popup.js"></script>
</head>

<body onload="clearSearchBar()">

<!--Navigation bar-->

<div class="nav-container">
    <div class="logo-container">
        <img class="logo" src="img/creator_central.png" alt="Creator Central Logo">
    </div>
    <!--Button in the top right corner-->
    <div class="big-button-container">
        <button class="connexion-button" id="log-in-button" role="button" onclick="location.href='login.php'"><span
                    class="button-text">Se connecter</span></button>
        <button class="connexion-button" id="sign-in-button" role="button"><span class="button-text"
                                                                                 onclick="location.href='register.php'">S'inscrire</span>
        </button>
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
            <p class="data-text data-text-big">
                Bienvenue sur <br> Creator Central
            </p>
        </div>
        <button class="data-button" role="button" onclick="location.href='feed.php'" id="slide1-button"><span class="button-data-text">Explorer</span>
        </button>
    </div>

    <!--        Slide 2 : Search bar and text-->
    <div class="data-slide" id="slide2-container">
        <div class="data-text-div">
            <p class="data-text data-text-big">
                Où la créativité rencontre<br> la communauté
            </p>
        </div>
        <!--            Search bar-->
        <div class="search-container">
            <form action="feed.php" class="search-bar" method="get">
                <input type="text" placeholder="Search..." name="search" id="search-input">
                <button type="submit"><img src="img/magnifying_glass.png" alt="glass"></button>
            </form>
        </div>
    </div>

    <!--        Slide 3 : Creator central presentation and button 'More Info'-->
    <div class="data-slide" id="slide3-container">
        <div class="data-text-div">
            <p class="data-text data-text-small">
                Creator Central est un réseau social pour les passionnés de bricolage de tous niveaux, afin de se
                connecter, partager leurs projets, demander des conseils et trouver de l'inspiration pour leur prochain
                projet. Que vous soyez un bricoleur chevronné ou que vous commenciez tout juste, Creator Central est
                l'endroit parfait pour découvrir de nouveaux projets, obtenir des commentaires sur votre travail et se
                connecter avec d'autres personnes qui partagent votre passion pour le bricolage.
            </p>
        </div>
        <button class="data-button" role="button" onclick="openPopup()" id="slide3-button"><span
                    class="button-data-text more-info-text">En savoir plus</span></button>
        <div class="popup" id="popup">
            <img src="img/404-tick.png" alt="tick">
            <h2>Bienvenue sur Creator Central - Le meilleur lieu pour les fans de DIY</h2>
            <p>Bienvenue sur <b>Creator Central</b>, le réseau social ultime pour les amateurs de DIY de
                tous niveaux! Notre plateforme est conçue pour vous aider à vous connecter avec des personnes partageant
                les mêmes intérêts, partager vos projets DIY, obtenir des conseils et trouver de l'inspiration pour
                votre prochain grand projet. Voici ce que vous pouvez attendre lorsque vous rejoignez notre communauté:
                <br><br>
                <b>Connectez-vous avec les autres</b>: Creator Central est l'endroit idéal pour rencontrer d'autres
                passionnés de DIY qui partagent votre passion. Que vous cherchiez à collaborer sur un
                projet, partager des idées ou simplement discuter avec quelqu'un qui comprend, vous trouverez ici de
                nombreuses personnes partageant les mêmes intérêts.
                <br><br>
                <b>Partagez vos projets</b>: Êtes-vous fier d'un récent projet DIY que vous avez réalisé? Partagez-le
                sur Creator Central! Notre plateforme facilite le téléchargement de photos et de vidéos, l'ajout d'une
                description et le balisage de votre projet avec des mots-clés pertinents. Non seulement vous obtiendrez
                des commentaires sur votre travail, mais vous inspirerez également d'autres personnes à entreprendre des
                projets similaires.
                <br><br>
                <b>Demander des conseils</b>: Bloqué sur un projet? Pas sûr de la marche à suivre? Ne vous inquiétez pas
                - Creator Central est là pour vous aider. Demandez des conseils à notre communauté d'experts en travaux
                manuels et obtenez les conseils dont vous avez besoin pour mener votre projet à bien.
                <br><br>
                <b>Trouvez de l'inspiration</b>: Vous cherchez votre prochain grand projet? Parcourez notre bibliothèque
                de projets DIY et trouvez l'inspiration pour votre prochaine création. Que vous soyez intéressé par la
                menuiserie, la décoration d'intérieur ou autre chose, vous trouverez de nombreuses idées pour stimuler
                votre créativité.
                <br><br>
                <b>Apprenez de nouvelles compétences</b>: Creator Central est plus qu'un simple réseau social - c'est
                aussi un endroit pour apprendre de nouvelles compétences. Profitez de nos ressources communautaires,
                tutoriels et ateliers, et améliorez vos compétences en DIY.
                <br><br>
                <b>Creator Central</b> a été fondé par <b>Maxime Blanchard et Flavian Theurel</b>, deux passionnés de
                DIY qui ont voulu créer un espace où les amateurs de bricolage de tous niveaux pourraient se
                connecter, partager leurs projets, demander des conseils et trouver de l'inspiration pour leur prochaine
                création. Avec leur expertise combinée en menuiserie, rénovation domiciliaire et artisanat, Maxime et
                Flavian ont créé une plateforme accueillante, inclusive et favorable à tous les bricoleurs. Rejoignez
                leur communauté dès aujourd'hui et partagez votre passion pour le DIY avec les autres!</p>
            <button type="button" onclick="closePopup()">Fermer</button>
        </div>
    </div>

    <!--        Slide 4 : Text to enroll people and button 'Sign in'-->
    <div class="data-slide" id="slide4-container">
        <div class="data-text-div" id="slide4-text">
            <p class="data-text data-text-small">
                Sur Creator Central, vous pouvez créer un profil, partager des photos et des vidéos de vos projets et vous connecter avec d'autres membres. Vous pouvez également parcourir le site pour trouver de l'inspiration et des idées, et rechercher des projets par catégorie, niveau de difficulté ou matériaux utilisés. Les membres peuvent offrir des commentaires et des conseils sur vos projets, et vous pouvez en faire de même pour les autres.<br><br>
                Rejoignez Creator Central dès aujourd'hui et faites partie d'une communauté dynamique d'enthousiastes du DIY qui partagent votre passion pour la créativité et l'innovation. Que vous cherchiez à entreprendre un grand projet ou simplement à vous connecter avec des personnes ayant des intérêts similaires, Creator Central est l'endroit idéal pour le faire.
            </p>
        </div>
        <button class="data-button" role="button" id="slide4-button" onclick="location.href='register.php'"><span
                    class="button-data-text">S'inscrire</span></button>
    </div>
</div>
</body>

</html>


<?php

?>
