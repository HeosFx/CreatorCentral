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

<body onload="init()">

<!--Get the username of the current logged in user (global scope variable)-->
<script>let user = "<?php echo $SQLconn->loginStatus->userName; ?>";</script>
<script type="text/javascript" src="scripts/like.js"></script>

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