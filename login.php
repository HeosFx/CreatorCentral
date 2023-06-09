<?php
include("initialize.php");
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
    if ($SQLconn->loginStatus->loginSuccessful) {
        echo '<p class="successMessage">Connexion réussie</p>';
        header('Location: feed.php');
    } elseif (isset($SQLconn->loginStatus->errorText)) {
        echo '<h3 class="errorMessage">' . $SQLconn->loginStatus->errorText . '</h3>';
    }
    ?>

    <label for="name">Identifiant :</label>
    <input autofocus type="text" id="name" name="name" class="short-text-field">

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" class="short-text-field">

    <button type="submit" class="wide-button">Se Connecter</button>

    <p class="new">Nouveau sur Creator Central ? <a href="./register.php">Créer un compte</a></>
</form>
</body>
</html>

<?php
$SQLconn->DisconnectDatabase();
?>

