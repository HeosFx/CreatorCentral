<?php
include "initialize.php";

if (isset($_GET["user"])) {
    $user = $_GET["user"];
} else if ($SQLconn->loginStatus->loginSuccessful) {
    $user = $SQLconn->loginStatus->userName;
} else {
    $user = NULL;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Feed | Creator Central</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/post.css">
</head>

<body>
<?php include "./pageparts/header.php" ?>

<div class="main-container">
    <?php
    if ($user == NULL) {
        echo "<h1>Ce compte n'existe pas</h1>";
    } else {
        if ($SQLconn->loginStatus->loginSuccessful) {
            if ($user == $SQLconn->loginStatus->userName) {
                echo "<h1>Mon profil</h1><hr>";
            } else {
                echo "<h1>Profil de '.$user'</h1><hr>";
            }
        } else {
            echo "<h1>Profil de '.$user'</h1><hr>";
        }

        echo '<div class="post-container full-width">';
        $SQLconn->GenerateHTML_forPostsPage(0);
        echo "</div>";
    }
    ?>

</div>

</body>