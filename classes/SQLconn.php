<?php
require_once(__ROOT__ . "/Classes/loginStatus.php");

class SQLconn
{
    public $conn = NULL;
    public $loginStatus = NULL;

    // Function that connect the database
    //--------------------------------------------------------------------------------
    function __construct()
    {

        //Créer connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "creatorcentral";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // After connexion, create the object loginStatus
        $this->loginStatus = new LoginStatus($this);
    }

    //Function that secure basically users data
    //--------------------------------------------------------------------------------

    function Process_NewAccount_Form()
    {

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

    //Function that process a form (Sign-in)
    //--------------------------------------------------------------------------------

    function SecurizeString_ForSQL($string)
    {
        $string = trim($string);
        $string = stripcslashes($string);
        $string = addslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }


    // Function that generate a HTML post page from parameters
    //--------------------------------------------------------------------------------

    function query($stringQuery)
    {
        return $this->conn->query($stringQuery);
    }

    //Proxy call query on conn.

    function GenerateHTML_forPostsPage($isMyBlog)
    {
        // Set the default timezone
        date_default_timezone_set('Europe/Paris');

        // Query on either the whole database or only the elements that corresponds to the research
        if (!empty($_GET) && isset($_GET["search"])) {
            // Get the value sent
            $searched = $_GET['search'];

            // Change the html characters to their equivalent
            $formatted_search = htmlspecialchars($searched);

            $query = "SELECT * FROM `posts` WHERE (upper(`title`) LIKE upper('%$formatted_search%')) OR (upper(`content`) LIKE upper('%$formatted_search%')) OR (upper(`username`) LIKE upper('%$formatted_search%')) ORDER BY `date` DESC LIMIT 20";
            $result = $this->conn->query($query);
        } else {
            if ($isMyBlog) {
                $formatted_user = htmlspecialchars($this->loginStatus->userName);
                $query = "SELECT * FROM `posts` WHERE `username` LIKE '$formatted_user' ORDER BY `date` DESC";
            } else {
                $query = "SELECT * FROM `posts` ORDER BY `date` DESC";
            }

            $result = $this->conn->query($query);
        }

        // If there exist at least 1 post in the database
        if (mysqli_num_rows($result) != 0) {

            // Display the posts
            while ($row = $result->fetch_assoc()) {

                // Convert the date
                $timestamp = strtotime($row["date"]);

                echo '
                    <div class="post">
                    ';

                echo '
                    <div class="post-username" id="' . $row["username"] . '"><p>par ' . $row["username"] . '</p></div>
                    ';
//                }

                echo '
                    <div class="post-title"><a>' . $row["title"] . '</a></div>
                    <div class="post-date"><p>' . date("d/m/y à H:i", $timestamp) . '</p></div>
                    ';

                //If an image is linked to the post
                if (!is_null($row["picturePath"]) && $row["picturePath"] != "") {

                    $location = $row["picturePath"];

                    // The image is resized to be the biggest possible while preserving its aspect ratio by the css
                    echo '
                        <div class="post-image"><img src="' . $location . ' " alt="' . $location . '"></div>
                        ';
                }
                echo '
                    <div class="post-text"><p>' . $row["content"] . '</p></div>
                    ';

                // if the post belongs to the user : show edit button
                if ($row["username"] == $this->loginStatus->userName) {
                    echo '
                    <div class="post-likes">
                        <form method="get" action="editpost.php">
                            <input type="hidden" name="postID" value="' . $row["postId"] . '">
                            <input type="submit" value="Modifier" class="like-button">
                        </form>
                    </div>
                    </div>';

                // else, show the like button
                } else {
                    // Format the variables
                    $formatted_post = htmlspecialchars($row["postId"]);
                    $formatted_user = htmlspecialchars($this->loginStatus->userName);

                    // Check if the post has already been liked by the user
                    $query_like = "SELECT * FROM `likes` WHERE (upper(`postId`) LIKE upper('$formatted_post')) AND (upper(`username`) LIKE upper('$formatted_user'))";
                    $result_like = $this->conn->query($query_like);

                    if (mysqli_num_rows($result_like) == 0) {
                        echo '
                        <div class="post-likes"><button class="like-button" id="' . $row["postId"] . '">Like</button></div>
                    </div>
                    ';
                    } else {
                        echo '
                        <div class="post-likes"><button class="like-button like-button-on" id="' . $row["postId"] . '">Like</button></div>
                    </div>
                    ';
                    }
                }
            }
        } else {
            echo '
                <div><p>Il n\'y a pas de post dans ce blog.</p></div>
                ';

            if ($isMyBlog) {
                ?>

                <?php
            }


        }

    }

    // Function that close database connexion
    //--------------------------------------------------------------------------------

    function DisconnectDatabase()
    {
        $this->conn->close();
    }
}

?>