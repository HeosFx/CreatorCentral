<?php
include "initialize.php";

if (!$SQLconn->loginStatus->loginSuccessful) {
    header("Location: ./login.php");
}

$user = $SQLconn->loginStatus->userName;
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

<div class="main-container width-1000">
    <h1>Mon profil</h1>
    <hr>
    <div class="post-container">
        <?php
        $SQLconn->GenerateHTML_forPostsPage(true);
        ?>
    </div>
</div>




</body>