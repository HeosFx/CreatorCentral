<?php

class LoginStatus{

    public $loginSuccessful = false;
    public $errorText = "";

    public $userName = "";

    // Constructeur de la classe
    //-------------------------------------------------------------------------------------------------------
    function __construct(&$SQLconn) {

        $this->errorText = NULL;
        $this->loginSuccessful = false;
        $this->userName = NULL;
        session_start();

        // Check the PHP session to see if the user is already logged in
        if ($this->CheckSession()) {
            $this->loginSuccessful = true;
            $this->userName = $_SESSION["username"];
        } // If the login form has been completed
        elseif (isset($_POST["name"]) && isset($_POST["password"])) {
            // Default error message
            $this->errorText = 'Identifiant ou mot de passe invalide(s)';

            $username = $SQLconn->SecurizeString_ForSQL($_POST["name"]);
            $password = $_POST["password"];

            // Get the password (hashed) associated with the username
            $query = "SELECT password FROM users WHERE username = '$username'";
            $result = $SQLconn->conn->query($query);

            // If the username is in the database, verifies the password
            if ($result->num_rows == 1) {
                $hash = $result->fetch_assoc()["password"];
                if (password_verify($password, $hash)) {

                    $_SESSION["username"] = $username;
                    $this->userName = $username;
                    $this->errorText = NULL;
                    $this->loginSuccessful = true;
                }
            }
        }

        /*$this->loginSuccessful = false;

        //Données reçues via formulaire?
        if(isset($_POST["name"]) && isset($_POST["password"])){
            $this->userName = $SQLconn->SecurizeString_ForSQL($_POST["name"]);
            $password = md5($_POST["password"]);
            $this->loginAttempted = true;
        }
        //Données via le cookie?
        elseif ( isset( $_COOKIE["name"] ) && isset( $_COOKIE["password"] ) ) {
            $this->userName = $_COOKIE["name"];
            $password = $_COOKIE["password"];
            $this->loginAttempted = true;
        }
        else {
            $this->loginAttempted = false;
        }

        //Si un login a été tenté, on interroge la BDD
        if ( $this->loginAttempted ){
            $query = "SELECT * FROM login WHERE logname = '".$this->userName."' AND password ='".$password."'";
            $result = $SQLconn->conn->query($query);

            if ( $result ){
                $row = $result->fetch_assoc();
                $this->userID = $row["ID"];
                $this->userName = $row["logname"];
                $this->CreateLoginCookie($this->userName, $password);
                $this->loginSuccessful = true;
            }
            else {
                $this->errorText = "Ce couple login/mot de passe n'existe pas. Créez un Compte";
            }
        }*/

    }// fin de Méthode

    // Méthode pour se déconnecter.
    //-------------------------------------------------------------------------------------------------------
    function Logout(){
        session_unset();
        session_destroy();

    }// fin de Méthode

    // Checks if the user is connected
    function CheckSession()
    {
        return isset($_SESSION["username"]);
    }

} // Fin de classe
?>