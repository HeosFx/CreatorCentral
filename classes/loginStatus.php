<?php

class LoginStatus{

    public $loginSuccessful = false;
    public $loginAttempted = false;
    public $errorText = "";
    public $userID = 0;
    public $userName = "";

    // Constructeur de la classe
    //-------------------------------------------------------------------------------------------------------
    function __construct(&$SQLconn) {
        
        $this->loginSuccessful = false;

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
        }
    }// fin de Méthode

    // Méthode pour stocker un login réussi dans un cookie
    //-------------------------------------------------------------------------------------------------------
    function CreateLoginCookie($username, $encryptedPasswd){

        setcookie("name", $username, time() + 24*3600 );
        setcookie("password", $encryptedPasswd, time() + 24*3600);

    }// fin de Méthode

    // Méthode pour se délogger. Détruit le cookie.
    //-------------------------------------------------------------------------------------------------------
    function Logout(){

        setcookie("name", NULL, -1 );
        setcookie("password", NULL, -1);

    }// fin de Méthode

} // Fin de classe

?>