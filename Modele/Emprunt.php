<?php
include "../Modele/BaseDeDonnees.php";
class Emprunt {
    private $id;
    private $id_adherent;
    private $id_livre;
    private $date_emprunt;
    private $date_retour_prevue;
    private $date_retour;
    private $frais_retard;


    public function __construct($id=null, $id_adherent=null, $id_livre=null, $date_emprunt=null, $date_retour_prevue=null,
     $date_retour=null, $frais_retard=null) {
        $this->id = $id;
        $this->id_adherent = $id_adherent;
        $this->id_livre = $id_livre;
        $this->date_emprunt = $date_emprunt;
        $this->date_retour_prevue = $date_retour_prevue;
        $this->date_retour = $date_retour;
        $this->frais_retard = $frais_retard;
    }
    function __get($att) {
        if(!isset($this->$att)) return "erreur. Attribut non défini pour l'objet! <br>";
        return $this->$att;
    }

    function __set($att, $val) {
        $this->$att = $val;
    }

    function __isset($att) {
        return isset($this->$att);
    }
     function insererEmprunt() {
        global $bd;
        $stmt = $bd->prepare("INSERT INTO emprunt (id, id_adherent, id_livre, date_emprunt, date_retour_prevue, date_retour, frais_retard) 
            VALUES (:id, :id_adherent, :id_livre, :date_emprunt, :date_retour_prevue, :date_retour, :frais_retard)");
        $stmt->bindParam(':id', $this->id);//lie une variable à un paramètre dans une requête SQL
        $stmt->bindParam(':id_adherent', $this->id_adherent);
        $stmt->bindParam(':id_livre', $this->id_livre);
        $stmt->bindParam(':date_emprunt', $this->date_emprunt);
        $stmt->bindParam(':date_retour_prevue', $this->date_retour_prevue);
        $stmt->bindParam(':date_retour', $this->date_retour);
        $stmt->bindParam(':frais_retard', $this->frais_retard);
        $stmt->execute();//executer la requette préparée
       
       /* if ($stmt->rowCount() > 0) {
            return true;
            } else {
            return false;
        }*/
    }
    function modifierEmprunt() {
        global $bd;
        $stmt = $bd->prepare("SELECT * FROM emprunt WHERE id = :id");
        $stmt->bindParam(':id', $this->id); 
        $stmt->execute();
        $modif = false;
        
        if($stmt->rowCount() > 0) { //verifiés le nb de ligne aff
            if($this->id_adherent != "") {
                $stmt = $bd->prepare("UPDATE emprunt SET id_adherent = :id_adherent WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':id_adherent', $this->id_adherent);
                $stmt->execute();
                $stmt->closeCursor();
                $modif = true;
            }
            
            if($this->id_livre != "") {
                $stmt = $bd->prepare("UPDATE emprunt SET id_livre = :id_livre WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':id_livre', $this->id_livre);
                $stmt->execute();
                $stmt->closeCursor();//fermer le curseur de la requette
                $modif = true;
            }
            
            if($this->date_emprunt != "") {
                $stmt = $bd->prepare("UPDATE emprunt SET date_emprunt = :date_emprunt WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':date_emprunt', $this->date_emprunt);
                $stmt->execute();
                $stmt->closeCursor();
                $modif = true;
            }
            
            if($this->date_retour_prevue != "") {
                $stmt = $bd->prepare("UPDATE emprunt SET date_retour_prevue = :date_retour_prevue WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':date_retour_prevue', $this->date_retour_prevue);
                $stmt->execute();
                $stmt->closeCursor();
                $modif = true;
            }
            
            if($this->date_retour != "") {
                $stmt = $bd->prepare("UPDATE emprunt SET date_retour = :date_retour WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':date_retour', $this->date_retour);
                $stmt->execute();
                $stmt->closeCursor();
                $modif = true;
            }
            
            if($this->frais_retard != "") {
                $stmt = $bd->prepare("UPDATE emprunt SET frais_retard = :frais_retard WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':frais_retard', $this->frais_retard);
                $stmt->execute();
                $stmt->closeCursor();
                $modif = true;
            }
        }
        
        return $modif;
    }
  
    public function affichEmprunt(){
        global $bd;
        $s = $bd->prepare("SELECT * FROM emprunt");
        $s->execute();
        $res= $s->fetchAll(PDO::FETCH_ASSOC);//recuperer toutes les lignes résultantes sous forme d'un tab assos
        if ($s->rowCount() >0 )
            return $res;
        else 
          return array();
        }
    public function supprimerEmprunt() {
            global $bd;
                $stmt = $bd->prepare("DELETE FROM emprunt WHERE id = :id");
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();
                $stmt->closeCursor();
        }

        public function getEmpruntsByID($id_adherent) {
            global $bd;
            $stmt = $bd->prepare("SELECT * FROM emprunt WHERE id_adherent = :id_adherent");
            $stmt->bindParam(':id_adherent', $id_adherent);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}
?>