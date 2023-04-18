<?php
include("./pageparts/databaseFunctions.php");
ConnectDatabase();
$loginStatus = CheckLoginForm();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login | Creator Central</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/login_page.css">
</head>

<body>
<form action="#" method="post">
    <h1>Connexion à Creator Central</h1>

    <?php
    if ($loginStatus["Successful"]) {
        echo '<p class="successMessage">Connexion réussie</p>';
        header('Location: feed.php');
    } elseif (isset($loginStatus["ErrorMessage"])) {
        echo '<h3 class="errorMessage">' . $loginStatus['ErrorMessage'] . '</h3>';
    }
    ?>

    <label for="name">Identifiant :</label>
    <input autofocus type="text" id="name" name="name" class="short-text-field">

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" class="short-text-field">

    <button type="submit">Se Connecter</button>
</form>
</body>
</html>

<?php
DisconnectDatabase();
?>

