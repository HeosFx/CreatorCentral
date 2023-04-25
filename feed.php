<?php
include("./initialize.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login | Creator Central</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/post.css">
</head>

<body>
<br>
<br>

<?php include './pageparts/header.php';

if (isset($_GET["newaccount"])){
    //TODO popup lors de la création d'un compte
    echo "
    <script>
        alert('Compte créé avec succès. Bienvenue sur Creator Central !');
    </script>";
}
?>
<div class="post-container">
<?php
    $SQLconn->GenerateHTML_forPostsPage(0);
?>
</div>

</body>
</html>

<?php
$SQLconn->DisconnectDatabase();
?>

