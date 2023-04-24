<?php
class postStorage{

    public $titre;
    public $dateModif;
    public $contenu;

    function __construct($titre_ini, $date_ini, $contenu_ini){
        $this->titre = $titre_ini;
        $this->dateModif = date_ini;
        $this->contenu = $contenu_ini;
    }

    function DisplayToHTML($isMyBlog){
        //Fonction qui echo le HTML d'un post sur un blog
    }
}

?>