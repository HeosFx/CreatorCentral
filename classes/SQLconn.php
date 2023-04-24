
<?php
require_once(__ROOT__."/Classes/loginStatus.php");

class SQLconn {
    public $conn = NULL;
    public $loginStatus = NULL;

    // Fonction qui connecte la BDD
    //--------------------------------------------------------------------------------
    function __construct() {

        //Créer connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "td_exemple_final";
        
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ( $this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // Après connection, créer l'objet loginstatus
        $this->loginStatus = new LoginStatus($this);
    }

    //Fonction pour sécuriser les données utilisateur de manière basique
    //--------------------------------------------------------------------------------
    function SecurizeString_ForSQL($string) {
        $string = trim($string);
        $string = stripcslashes($string);
        $string = addslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    //Fonction pour traiter un formulaire de création de compte
    //--------------------------------------------------------------------------------
    function Process_NewAccount_Form(){

        // If the account creation form has been completed
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Checks if there is already an entry for this username in the database
            $username = SecurizeString_ForSQL($_POST["username"]);
            $result = $this->conn->query("SELECT * FROM users WHERE username='$username'");

            if ($result->num_rows > 0) {
                $error = "Echec: l'identifiant est déjà utilisé";
            } // Checks if the username is at least 4 characters long
            elseif (strlen($username) < 4) {
                $error = "Echec: le nom utilisateur doit comporter au moins 4 caractères";
            } // Checks if the two password match
            elseif ($_POST["password"] != $_POST["confirm"]) {
                $error = "Echec: les mots de passe ne correspondent pas";
            } // Checks if the password is at least 8 characters long
            elseif (strlen($_POST["password"]) < 8) {
                $error = "Echec: le mot de passe doit comporter au moins 8 caractères";
            } else {
                // Hashes the password with the Bcrypt algorithm, using a salt
                $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

                $query = "INSERT INTO `users` VALUES ('$username', '$hash')";
                $result = $this->conn->query($query);
                $_SESSION["username"] = $username;

                if (mysqli_affected_rows($this->conn) == 0) {
                    $error = "Echec: erreur lors de l'insertion dans la base de données. Essayez un nom/mot de passe sans caractères spéciaux";
                } else {
                    $creationSuccessful = true;
                }
            }
        }

        return ['Successful' => $creationSuccessful,
            'ErrorMessage' => $error];
    }

    // Fonction pour obtenir le nom d'un propriétaire de blog + savoir si c'est "moi"
	// "moi" est relatif au nom du "mec connecté", qui est fourni en paramètre
    //--------------------------------------------------------------------------------
    /*function GetBlogOwnerFromID($ID, $connectedGuyName){
        $query = "SELECT `logname` from `login` WHERE `ID` = $ID";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0 ){
			
			//There should only be one result
            $row = $result->fetch_assoc();
			
			//We compare the
            if ($row["logname"] == $connectedGuyName){
                return array($connectedGuyName, true);
            }
            else {
                return array($row["logname"], false);
            }
        }
        else {
            return array("Invalid", false);
        }
    }*/

    // Fonction pour générer une page de posts en HTML à partir de paramètres
    //--------------------------------------------------------------------------------
    function GenerateHTML_forPostsPage($blogID, $ownerName, $isMyBlog) {

        $query = "SELECT * FROM `post` WHERE `owner_login` = ".$blogID." ORDER BY `date_lastedit` DESC LIMIT 10";
        $result = $this->conn->query($query);
        if( mysqli_num_rows($result) != 0 ){
    
            if ($isMyBlog){
            ?>
    
            <form action="editPost.php" method="POST">
                <input type="hidden" name="newPost" value="1">
                <button type="submit">Ajouter un nouveau post!</button>
            </form>
    
            <?php    
            }
    
            while( $row = $result->fetch_assoc() ){
    
                $timestamp = strtotime($row["date_lastedit"]);
                echo '
                <div class="blogPost">
                    <div class="postTitle">';
    
                if ($isMyBlog){
    
                    echo '
                    <div class="postModify">
                        <form action="editPost.php" method="GET">
                            <input type="hidden" name="postID" value="'.$row["ID_post"].'">
                            <button type="submit">Modifier/effacer</button>
                        </form>
                    </div>';
                }
                else {
                    echo '
                    <div class="postAuthor">par '.$ownerName.'</div>
                    ';
                }
    
                echo '<h3>•'.$row["title"].'</h3>
                <p>dernière modification le '.date("d/m/y à h:i:s", $timestamp ).'</p>
                </div>
                ';
    
                //On regarde si il y a une image, si oui, on l'insère
                if (!is_null($row["image_url"])){

                    //je choisis de redimentionner mon image pour 200px de large
                    $size = getimagesize($row["image_url"]);
                    if ($size){
                        $goalsize = 200;

                        $ratio = $goalsize/$size[0]; //on calcule le redimentionnement
                        $newHeight = $size[1]*$ratio;
                        echo '<img class ="postImg" src="'.$row["image_url"].'"width="'.$goalsize.'px" height ="'.$newHeight.'px">';
                    } 
                }
    
                echo'
                <p class="postContent">'.$row["content"].'</p>
                <div style="clear:both; height:0px; margin:0; padding:0"></div>
                </div>
                ';
            }
        }
        else {
            echo '
            <p>Il n\'y a pas de post dans ce blog.</p>';
    
            if ($isMyBlog){
            ?>
                <form action="editPost.php" method="POST">
                    <input type="hidden" name="newPost" value="1">
                    <button type="submit">Ajouter un premier post!</button>
                </form>
            <?php
            }
            
    
        }

    }
	
	//Proxy qui appelle query sur conn. Juste là pour le confort.
	function query($stringQuery){
		return $this->conn->query($stringQuery);
	}

    //Fonction pour fermer la connection sur base de données
    //--------------------------------------------------------------------------------
    function DisconnectDatabase(){
        $this->conn->close();
    }
}

?>