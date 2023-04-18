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
<form action="#" method="post" >
    <h1>Connexion à Creator Central</h1>
    <?php
    if ($loginStatus["Successful"]) {
        echo '<p class="successMessage">Connexion réussie</p>';
        header('Location: feed.php');
    } elseif (isset($loginStatus["ErrorMessage"])) {
        echo '<h3 class="errorMessage">' . $loginStatus['ErrorMessage'] . '</h3>';
    }
    ?>
    <div>
        <label for="name">Identifiant :</label>
        <input autofocus type="text" id="name" name="name">
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="formbutton">
        <button type="submit">Se Connecter</button>
    </div>
</form>
</body>

</html>

<?php
DisconnectDatabase();
?>

