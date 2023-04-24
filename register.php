<?php
include("./pageparts/databaseFunctions.php");
ConnectDatabase();
$newAccountStatus = CheckNewAccountForm();

if (CheckSession()){
    header("Location: ./feed.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register | Creator Central</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/login_page.css">
</head>

<body>
<form action="#" method="post">
    <h1>S'inscrire sur Creator Central</h1>

    <?php
    if ($newAccountStatus["Successful"]) {
        echo '<p class="successMessage">Nouveau compte créé avec succès!</p>';
        header("Location: ./feed.php");
    } elseif (isset($newAccountStatus["ErrorMessage"])) {
        echo '<p class="errorMessage">' . $newAccountStatus["ErrorMessage"] . '</p>';
    }
    ?>

    <label for="username">Identifiant :</label>
    <input autofocus type="text" id="username" name="username" class="short-text-field">
    <p id="username_hint" class="errorMessage"></p>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" class="short-text-field">
    <p id="password_hint" class="errorMessage"></p>

    <label for="confirm">Confirmer le mot de passe :</label>
    <input type="password" id="confirm" name="confirm" class="short-text-field">
    <p id="confirm_hint" class="errorMessage"></p>

    <button type="submit" class="wide-button">Créer un compte</button>

    <script src="./javascript/registerFormHinting.js"></script>
</form>
</body>
</html>

<?php
DisconnectDatabase();
?> 