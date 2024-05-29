<?php

include "BaseDeDonnees.php";
class Bibliothecaire {
    private $email;
    private $password;

    function __construct($email, $password) {
        $this->email = $email;
        $this->motDePasse = $password;
    }

    function __get($att) {
        if (!isset($this->$att)) return "Erreur. L'attribut n'est pas défini pour l'objet !";
        return $this->$att;
    }

    function __set($att, $val) {
        $this->$att = $val;
    }

    function __isset($att) {
        return isset($this->$att);
    }

   
    
}

?>