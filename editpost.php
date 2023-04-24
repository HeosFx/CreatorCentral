<?php include("./initialize.php"); ?>

    <!DOCTYPE html>
    <html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Poster | Creator Central</title>
    <link rel="stylesheet" href="styles/font.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/header.css">
</head>
<body>

<?php
include(__ROOT__ . "/pageparts/header.php");

//First, try to see if there is POST data. This allows us to identify
//if we are in the "create new post" case
if (isset($_POST["new"])) {
?>
<div class="main-container">
    <h1>Nouveau post</h1>
    <hr>
    <!-- Pour un form avec fichier, "enctype" DOIT être spécifié comme ce qui suit -->
    <form enctype="multipart/form-data" action="./pageparts/processPost.php" method="POST">

        <div>
            <input type="hidden" name="action" value="new">
            <label for="title">Titre :</label>
            <input autofocus type="text" name="title" class="short-text-field">
        </div>
        <div>
            <label for="content">Message :</label>
            <textarea name="content" class="long-text-field" placeholder="Decrivez votre création"></textarea>
        </div>
        <div>
            <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
            <input type="hidden" name="MAX_FILE_SIZE" value="5242880"/>
            <label for="imageFile">Fichier d'image :</label>
            <input name="imageFile" type="file"/>
        </div>
        <div><p>(le fichier d'image est facultatif)</p></div>
        <div class="formbutton">
            <button type="submit" class="wide-button">Ajouter ce post à mon blog</button>
        </div>
    </form>

    <?php
    } //Otherwise, we are in "edit" mode. Then, try to get post for ID used as GET parameter
    elseif (isset($_GET["postID"])) {

        $query = 'SELECT * FROM `posts` WHERE `postId` =' . $_GET["postID"];
        $result = $SQLconn->conn->query($query);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            ?>

            <h1>Edition du post</h1>
            <!-- Pour un form avec fichier, "enctype" DOIT être spécifié comme ce qui suit -->
            <form enctype="multipart/form-data" action="./processPost.php" method="POST">
                <div>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="postID" value="<?php echo $data["ID_post"]; ?>">
                    <label for="title">Titre :</label>
                    <input autofocus type="text" name="title" class="short-text-field" value="<?php echo $data["title"]; ?>">
                </div>
                <div>
                    <label for="content">Message :</label>
                    <textarea name="content" class="long-text-field"><?php echo $data["content"]; ?></textarea>
                </div>
                <div>
                    <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880"/>
                    <label for="imageFile">Fichier d'image :</label>
                    <input name="imageFile" type="file"/>
                </div>
                <div><p>(le fichier d'image est facultatif)</p></div>
                <div class="formbutton">
                    <button type="submit" class="wide-button">Modifier le post</button>
                </div>
            </form>
            <form action="./processPost.php" onsubmit="return confirm('Etes vous sur de vouloir effacer?')"
                  method="POST">
                <div class="formbutton">Cliquez le bouton ci-dessous pour effacer le post</div>
                <div>
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="postID" value="<?php echo $data["ID_post"]; ?>">
                </div>
                <div class="formbutton">
                    <button type="submit">Supprimer le post</button>
                </div>
            </form>

            <?php
        } else {
            echo "<h1>Erreur! Cette ID ne correspond à aucun post!</h1>";
        }
    } ?>
</div>
</body>

<?php
$SQLconn->DisconnectDatabase();
?>