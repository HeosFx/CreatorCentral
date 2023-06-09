<?php
$user_connected = false;

// Checks if the user has pressed the logout button
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["logout"])) {
    $SQLconn->loginStatus->Logout();
    // refresh the feed in order to reset the user variable
    echo "<meta http-equiv='refresh' content='0'>";
} else {
    if ($SQLconn->loginStatus->loginSuccessful) {
        $user_connected = true;
        $username = $SQLconn->loginStatus->userName;
    }
}
?>

<div id="header">
    <div class="header-logo">
        <a href="./feed.php">
            <img id="logo" src="./img/creator_central.png" alt="Creator Central logo">
        </a>
    </div>


    <form class="header-search-bar" action="feed.php" method="get">
        <img src="./img/magnifying_glass.png">
        <input class="search-bar" type="search" placeholder="Rechercher sur Creator Central" name="search">
    </form>


    <div class="header-navbar">
        <?php if ($user_connected) {
            echo '
            <form action="./editpost.php" method="post">
                <input type="submit" class="header-button" value="Poster" name="new">
            </form>
            <div class="dropdown">
                <button class="dropbtn header-button">' . $username . '</button>
        
                <div class="dropdown-content">
                    <form action="profile.php" method="post">
                        <input type="submit" name="profile" value="Mon profil">
                    </form>
                    <form action="feed.php" method="post">
                        <input type="submit" name="logout" value="Se déconnecter">
                    </form>
                </div>
        
            </div>';
        } else {
            echo '<a class="header-button" href="./login.php">Login</a>';
        } ?>
    </div>
</div>

