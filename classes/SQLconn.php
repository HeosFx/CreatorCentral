
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
        $dbname = "creatorcentral";
        
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

        $creationSuccessful = false;
        $error = NULL;

        // If the account creation form has been completed
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Checks if there is already an entry for this username in the database
            $username = $this->SecurizeString_ForSQL($_POST["username"]);
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


    // Fonction pour générer une page de posts en HTML à partir de paramètres
    //--------------------------------------------------------------------------------
    function GenerateHTML_forPostsPage($isMyBlog) {

        $query = "SELECT * FROM `posts` ORDER BY `date` DESC LIMIT 20";
        $result = $this->conn->query($query);
        if( mysqli_num_rows($result) != 0 ){
    
            if ($isMyBlog){
            ?>

            <?php
            }
    
            while( $row = $result->fetch_assoc() ){
    
                $timestamp = strtotime($row["date"]);
                echo '
                
                    <div class="post">';
    
//                if ($isMyBlog){
//
//                    echo '
//                    <div class="main-container">
//                        <form action="editPost.php" method="GET">
//                            <input type="hidden" name="postID" value="'.$row["ID_post"].'">
//                            <button type="submit">Modifier/effacer</button>
//                        </form>
//                    </div>';
//                }
//                else {
                        echo '
                        <div class="post-username">par '.$row["username"].'</div>
                        ';
//                }
    
                        echo '<div class="post-title"><p>•'.$row["title"].'</p></div>
                        <div class="post-date"><p>'.date("d/m/y à h:i:s", $timestamp ).'</p></div>
                        ';
    
                        //If an image is linked to the post
                        if (!is_null($row["picturePath"]) && $row["picturePath"] != ""){

                            $location = $row["picturePath"];

                            //je choisis de redimentionner mon image pour 200px de large
                            /*$size = getimagesize("C:\xampp\htdocs\CreatorCentral\uploads\computer.jpg");
                            if ($size){
                                $goalsize = 200;

                                $ratio = $goalsize/$size[0]; //on calcule le redimentionnement
                                $newHeight = $size[1]*$ratio;
                                echo '<div class="post-image"><img src="'.$location.'"width="'.$goalsize.'px" height ="'.$newHeight.'px" alt="post_image"></div>';*/
                            echo '<div class="post-image"><img src="'.$location.' "height ="100% "alt="'.$location.'"></div>';
//                            }
                        }
    
                        echo'
                        <div class="post-text"><p>'.$row["content"].'</p></div>
                        <div class="post-likes"><p>Like</p></div>
                    </div>
               
                ';
            }
        }
        else {
            echo '
            <div><p>Il n\'y a pas de post dans ce blog.</p></div>';
    
            if ($isMyBlog){
            ?>

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