<?php
session_start();

// Function to open connection to database
//--------------------------------------------------------------------------------
function ConnectDatabase()
{
    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "creatorcentral";
    global $conn;

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

//Function to clean up a user input for safety reasons
//--------------------------------------------------------------------------------
function SecurizeString_ForSQL($string)
{
    $string = trim($string);
    $string = stripcslashes($string);
    $string = addslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

// Function to check login -> [Boolean, String]
// Boolean: true if login successful
// String: error message, NULL if the login is successful
//--------------------------------------------------------------------------------
function CheckLoginForm()
{
    global $conn, $username, $userID;

    $error = NULL;
    $loginSuccessful = false;


    // Check the PHP session to see if the user is already logged in
    if (CheckSession()) {
        $loginSuccessful = true;
    } // If the login form has been completed
    elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Default error message
        $error = 'Identifiant ou mot de passe invalide(s)';

        $username = SecurizeString_ForSQL($_POST["name"]);
        $password = $_POST["password"];

        // Get the password (hashed) associated with the username
        $query = "SELECT password FROM users WHERE username = '$username'";
        $result = $conn->query($query);

        // If the username is in the database, verifies the password
        if ($result->num_rows == 1) {
            $hash = $result->fetch_assoc()["password"];
            if (password_verify($password, $hash)) {

                $_SESSION["username"] = $username;
                $error = NULL;
                $loginSuccessful = true;
            }
        }
    }

    return ['Successful' => $loginSuccessful,
        'ErrorMessage' => $error];
}


// Function to check a account creation form -> [Boolean, String]
// Boolean: true if the account was created successfully
// String: error message, NULL if the account creation is successful
//--------------------------------------------------------------------------------
function CheckNewAccountForm()
{
    global $conn;

    $creationSuccessful = false;
    $error = NULL;

    // If the account creation form has been completed
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Checks if there is already an entry for this username in the database
        $username = SecurizeString_ForSQL($_POST["username"]);
        $result = $conn->query("SELECT * FROM users WHERE username='$username'");

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
            $result = $conn->query($query);
            $_SESSION["username"] = $username;

            if (mysqli_affected_rows($conn) == 0) {
                $error = "Echec: erreur lors de l'insertion dans la base de données. Essayez un nom/mot de passe sans caractères spéciaux";
            } else {
                $creationSuccessful = true;
            }
        }
    }

    return ['Successful' => $creationSuccessful,
        'ErrorMessage' => $error];
}


function CheckPostForm()
{
    global $conn;

    $creationSuccessful = false;
    $error = NULL;


    // If the post creation form has been completed
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && CheckSession()) {
        echo '<br><br><br><br>bonjour';
        $title = SecurizeString_ForSQL($_POST['title']);
        $desc = SecurizeString_ForSQL($_POST['description']);


        // Checks if the user entered a title
        if (strlen($title) < 1) {
            $error = "Echec: Le titre ne peut pas être vide";
        } elseif (!isset($_FILES["image-file"])) { // Checks the image file is valid
            $error = "Echec: Le post doit contenir une image"; // Checks the file extension
        } else {
            // Generates a unique id for the post
            $postId = md5($_SESSION["username"] . microtime());
            $extension = pathinfo($_FILES["image-file"]["tmp_name"], PATHINFO_EXTENSION);
            $targetImage = "../uploads/" . $postId . $extension;
            move_uploaded_file($_FILES["image-file"]["tmp_name"], $targetImage);

        }

    }

    return ['Successful' => $creationSuccessful,
        'ErrorMessage' => $error];
}


function CheckSession()
{
    return isset($_SESSION["username"]);
}

// Function to close connection to database
//--------------------------------------------------------------------------------

function DisconnectDatabase()
{
    global $conn;
    $conn->close();
}
?>




