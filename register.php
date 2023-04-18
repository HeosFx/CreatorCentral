<?php
include("./pageparts/databaseFunctions.php");
ConnectDatabase();
$newAccountStatus = CheckNewAccountForm();

?>

<!DOCTYPE html>
<html>
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
    } elseif (isset($newAccountStatus["ErrorMessage"])) {
        echo '<p class="errorMessage">' . $newAccountStatus["ErrorMessage"] . '</p>';
    }
    ?>
    <div>
        <label for="username">Identifiant :</label>
        <input autofocus type="text" id="username" name="username">
        <p id="username_hint" class="errorMessage"></p>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
        <p id="password_hint" class="errorMessage"></p>

    </div>
    <div>
        <label for="confirm">Confirmer le mot de passe :</label>
        <input type="password" id="confirm" name="confirm">
        <p id="confirm_hint" class="errorMessage"></p>
    </div>
    <div class="formbutton">
        <button type="submit">Créer un compte</button>
    </div>

    <?php include './javascript/registerFormHinting.php' ?>
</form>
</body>
</html>

<?php
DisconnectDatabase();
?> 