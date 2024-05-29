<?php
include "../Modele/BaseDeDonnees.php";
class Adherent {
    private $id;
    private $name;
    private $email;
    private $phone;
    function  __construct($id=null, $name=null, $email=null, $phone=null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
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

    function __toString() {
        return "<tr><td>$this->id</td><td>$this->name</td><td>$this->email</td><td>$this->phone</td></tr>";
    }

    public function insererAdherent() {
        global $bd;
        try{
            $stmt = $bd->prepare("INSERT INTO adherent (id,nom, email, phone) VALUES (:id,:name, :email, :phone)");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt->rowCount() > 0;
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout de l'adhérent : " . $e->getMessage();
        }
    }

    public function mettreAJourAdherent() {
            global $bd;
            $stmt=$bd->prepare("SELECT * FROM adherent WHERE id = :id");
            $stmt->bindParam(':id',$this->id); 
            $stmt->execute();
            $modif=false;
            if($stmt->rowCount()>0){
                if($this->name!=""){
                    $stmt=$bd->prepare("UPDATE adherent SET nom = :name WHERE id = :id") ;
                    $stmt->bindParam(':id',$this->id);
                    $stmt->bindParam(':name',$this->name);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
                if($this->email!=""){
                    $stmt=$bd->prepare("UPDATE adherent SET email = :email WHERE id = :id") ;
                    $stmt->bindParam(':id',$this->id);
                    $stmt->bindParam(':email',$this->email);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
                if($this->phone!=""){
                    $stmt=$bd->prepare("UPDATE adherent SET phone =:phone WHERE id = :id") ;
                    $stmt->bindParam(':id',$this->id);
                    $stmt->bindParam(':phone',$this->phone);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
               
                    }
            return $modif;
    }


    
    public function supprimerAdherent() {
        global $bd;
            $stmt = $bd->prepare("DELETE FROM adherent WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $stmt->closeCursor();
    }
public function affichAdherent(){
    global $bd;
    $s = $bd->prepare("SELECT * FROM adherent");
    $s->execute();
    $res= $s->fetchAll(PDO::FETCH_ASSOC);//fetchAll: recuperer toutes les lignes de res
    if ($s->rowCount() >0 )
        return $res;
    else 
      return array();
    }


    public function verifier(){
        global $bd;
        $stmt = $bd->query("SELECT * FROM adherent");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        while($a=$stmt->fetch()){
            if($a->email==$this->email && $a->phone==$this->phone){
                return true;}
        }
            return false;
    
    }
    public function rechercherUtilisateur() {
        global $bd;
            $stmt = $bd->prepare("SELECT * FROM adherent WHERE id = :id AND phone = :phone");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

    
}
?>
