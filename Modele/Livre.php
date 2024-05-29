<?php
include "BaseDeDonnees.php";
class Livre{
    private $id_livre;
    private $titre;
    private $auteur;
    private $categorie;
    private $prix;
    private $nbExp;
    private $dispo;

    function __construct($id_livre=null, $titre=null, $auteur=null, $categorie=null, $prix=null, $nbExp=null, $dispo=null) {
        $this->id_livre = $id_livre;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->categorie = $categorie;
        $this->prix = $prix;
        $this->nbExp = $nbExp;
        $this->dispo = $dispo;
        
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

    public function ajouterLivre() {
        global $bd;
        try{
        $s = $bd->prepare("INSERT INTO livre (id_livre, titre, auteur, categorie,prix, nbExp, dispo) VALUES (:idlivre, :titre, :auteur, :categorie, :prix, :nbExp, :dispo)");
        $s->bindParam(':idlivre', $this->id_livre);
        $s->bindParam(':titre', $this->titre);
        $s->bindParam(':auteur', $this->auteur);
        $s->bindParam(':categorie', $this->categorie);
        $s->bindParam(':prix', $this->prix);  
        $s->bindParam(':nbExp', $this->nbExp);
        $s->bindParam(':dispo', $this->dispo);
        $s->execute();
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout du livre : " . $e->getMessage();
    }
    }

    public function mettreAJourLivre() {
            global $bd;
            $stmt=$bd->prepare("SELECT * FROM livre WHERE id_livre = :id_livre");
            $stmt->bindParam(':id_livre',$this->id_livre); 
            $stmt->execute();
            $modif=false;
            if($stmt->rowCount()>0){
                if($this->titre!=""){
                    $stmt=$bd->prepare("UPDATE livre SET titre = :titre WHERE id_livre = :id_livre") ;
                    $stmt->bindParam(':id_livre',$this->id_livre);
                    $stmt->bindParam(':titre',$this->titre);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
                if($this->auteur!=""){
                    $stmt=$bd->prepare("UPDATE livre SET auteur = :auteur WHERE id_livre = :id_livre") ;
                    $stmt->bindParam(':id_livre',$this->id_livre);
                    $stmt->bindParam(':auteur',$this->auteur);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
                if($this->categorie !=""){
                        $stmt=$bd->prepare("UPDATE livre SET categorie =:categorie WHERE id_livre = :id_livre") ;
                        $stmt->bindParam(':id_livre',$this->id_livre);
                        $stmt->bindParam(':categorie',$this->categorie);
                        $stmt->execute();
                        $stmt->closeCursor();
                        $modif=true;
                }
                if($this->prix !=""){
                    $stmt=$bd->prepare("UPDATE livre SET prix =:prix WHERE id_livre = :id_livre") ;
                    $stmt->bindParam(':id_livre',$this->id_livre);
                    $stmt->bindParam(':prix',$this->prix);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
                    if($this->nbExp !=""){
                        $stmt=$bd->prepare("UPDATE livre SET nbExp =:nbExp WHERE id_livre = :id_livre") ;
                        $stmt->bindParam(':id_livre',$this->id_livre);
                        $stmt->bindParam(':nbExp',$this->nbExp);
                        $stmt->execute();
                        $stmt->closeCursor();
                        $modif=true;
                        }
                    if($this->dispo !=""){
                            $stmt=$bd->prepare("UPDATE livre SET dispo =:dispo WHERE id_livre = :id_livre") ;
                            $stmt->bindParam(':id_livre',$this->id_livre);
                            $stmt->bindParam(':dispo',$this->dispo);
                            $stmt->execute();
                            $stmt->closeCursor();
                            $modif=true;
                            }
                }
                return $modif;
            }
    
    
     public function supprimerLivre() {
        global $bd;
            $stmt = $bd->prepare("DELETE FROM livre WHERE id_livre = :id_livre");
            $stmt->bindParam(':id_livre', $this->id_livre);
            $stmt->execute();
            $stmt->closeCursor();
    }
    public function affichLivre(){
        global $bd;
        $s = $bd->prepare("SELECT * FROM livre ");
        $s->execute();
        $res= $s->fetchAll(PDO::FETCH_ASSOC);
        if ($s->rowCount() >0 )
            return $res;
        else 
            return array();
    }

     public function rechercherLivreParTitre($titre) {
        global $bd;
        $sql = $bd->prepare("SELECT * FROM livre WHERE titre LIKE :titre");
        $sql->bindParam(':titre', $titre, PDO::PARAM_STR);
        $sql->execute();
        $resultats = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }
    public function diminuerExemplaires() {
        global $bd;
        $stmt = $bd->prepare('UPDATE livre SET nbExp = nbExp -1 WHERE id_livre = :id_livre');
        $stmt->bindParam(':id_livre', $this->id_livre);
        $stmt->execute();
        $this->nbExp--;
    }
    public function augmenterExemplaires() {
        global $bd;
        $stmt = $bd->prepare('UPDATE livre SET nbExp = nbExp +1 WHERE id_livre = :id_livre');
        $stmt->bindParam(':id_livre', $this->id_livre);
        $stmt->execute();
        $this->nbExp++;
    }
}

?>