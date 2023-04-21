<?php
// Checks if the user has pressed the logout button
if ($_SERVER["REQUEST_METHOD"] && isset($_POST["logout"])) {
    session_unset();
    session_destroy();
}

if (isset($_SESSION["username"])) {
    $user_connected = true;
    $username = $_SESSION["username"];
} else {
    $user_connected = false;
}
?>

<div id="header">
    <!-- TODO: remplacer le logo-->
    <div class="header-logo">
        <a href="./index.php">
            <img id="logo" src="./img/computer.jpg">
        </a>
    </div>


    <div class="header-search-bar">
        <img src="./img/magnifying_glass.png">
        <input class="search-bar" type="search" placeholder="Rechercher sur Creator Central">
    </div>


    <div class="header-navbar">
        <?php if ($user_connected) {
            echo '
            <a href="./newpost.php" class="header-button" onclick="">Poster</a>
            <div class="dropdown">
                <button class="dropbtn header-button">' . $username . '</button>
        
                <form action="feed.php" method="post" class="dropdown-content" id="myDropdown">
                    <input type="submit" name="profile" value="Mon profil">
                    <input type="submit" name="logout" value="Se déconnecter">
                </form>
        
            </div>';
            } else {
                echo '<a class="header-button" href="./login.php">Login</a>';
        }    ?>
    </div>
</div>

