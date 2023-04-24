<?php
include("./pageparts/databaseFunctions.php");
ConnectDatabase();
if (!CheckSession()){
    header("Location: ./login.php");
}
$newPostStatus = CheckPostForm();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau post | Creator Central</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/global.css">
</head>

<body>
    <?php include './pageparts/header.php' ?>
    <div class="main-container">
        <h1>Nouveau post</h1>
        <hr>
        <?php
        if ($newPostStatus["Successful"]) {
            echo '<p class="successMessage">Votre post a bien été publié</p>';
            header("Location: ./feed.php");
        } elseif (isset($newPostStatus["ErrorMessage"])) {
            echo '<p class="errorMessage">' . $newPostStatus["ErrorMessage"] . '</p>';
        }
        ?>

        <form method="post" action="#">
            <label for="title">Entrez un titre:</label>
            <input type="text" class="short-text-field" name="title" id="title">

            <label>Ajoutez une image:</label>
            <input type="file" accept=".png,.jpg,.jpeg,.gif" name="image-file" id="image-file">

            <label>Donnez une description de votre réalisation:</label>
            <textarea class="long-text-field" name="description" id="description"></textarea>

            <br>
            <input type="submit" value="Poster sur Creator Central" class="wide-button">

        </form>
    </div>

</body>
</html>

<?php
DisconnectDatabase();
?>

