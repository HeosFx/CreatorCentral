<?php include("./initialize.php");
if (!$SQLconn->loginStatus->loginSuccessful) {
    header('Location: ./login.php');
}
?>


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
        <input type="hidden" name="action" value="new">
        <label for="title">Titre :</label>
        <input autofocus type="text" name="title" class="short-text-field" id="title">
        <p class="errorMessage" id="title_hint">Le post doit contenir un titre</p>


        <label for="content">Message :</label>
        <textarea name="content" class="long-text-field" placeholder="Decrivez votre création" id="content"></textarea>
        <p class="errorMessage" id="content_hint">Le post doit contenir un message</p>

        <input type="hidden" name="MAX_FILE_SIZE" value="5242880"/>
        <label for="imageFile">Ajouter une image (facultatif) :</label>
        <input name="imageFile" type="file"/>

        <button type="submit" class="wide-button" id="post-button" disabled="true">Poster sur Creator Central</button>
    </form>

    <script type="text/javascript" src="scripts/postFormHinting.js"></script>

    <?php
    } //Otherwise, we are in "edit" mode. Then, try to get post for ID used as GET parameter
    elseif (isset($_GET["postID"])) {

        $query = 'SELECT * FROM `posts` WHERE `postId` =' . $_GET["postID"];
        $result = $SQLconn->conn->query($query);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            ?>

            <div class="main-container">

                <h1>Edition du post</h1>
                <hr>
                <!-- Pour un form avec fichier, "enctype" DOIT être spécifié comme ce qui suit -->
                <form enctype="multipart/form-data" action="./pageparts/processPost.php" method="POST">

                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="postID" value="<?php echo $data["postId"]; ?>">
                    <label for="title">Titre :</label>
                    <input autofocus type="text" name="title" class="short-text-field"
                           value="<?php echo $data["title"]; ?>">
                    <p class="errorMessage" id="title_hint"></p>


                    <label for="content">Message :</label>
                    <textarea name="content" class="long-text-field"><?php echo $data["content"]; ?></textarea>
                    <p class="errorMessage" id="content_hint"></p>

                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880"/>
                    <label for="imageFile">Ajouter une image (facultatif) :</label>
                    <input name="imageFile" type="file"/>

                    <button type="submit" class="wide-button" id="post-button">Modifier le post</button>
                </form>

                <form action="./processPost.php" onsubmit="return confirm('Etes vous sur de vouloir effacer?')"
                      method="POST">

                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="postID" value="<?php echo $data["postId"]; ?>">


                        <button type="submit" class="wide-button red-bg">Supprimer le post</button>

                </form>
            </div>

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