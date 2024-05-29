<?php
include "../Modele/Emprunt.php";
include "../Modele/Livre.php";

//ajouter emprunt
if(isset($_GET['ajouterEmprunt'])){
    if(!empty($_GET['id'])&& !empty($_GET['id_adherent'])&& !empty($_GET['id_livre']) 
    && !empty($_GET['date_emprunt']) && !empty($_GET['date_retour_prevue'])&& !empty($_GET['date_retour']) &&!empty($_GET['frais_retard'])
    &&$_GET['date_emprunt']<$_GET['date_retour']&&$_GET['date_emprunt']<$_GET['date_retour_prevue']){
        $id=$_GET['id'];
        $id_adherent = $_GET['id_adherent'];
        $id_livre = $_GET['id_livre'];
        $date_emprunt = $_GET['date_emprunt'];
        $date_retour_prevue = $_GET['date_retour_prevue'];
        $date_retour = $_GET['date_retour'];
        $frais_retard = $_GET['frais_retard'];
        $e = new Emprunt($id,$id_adherent,$id_livre,$date_emprunt,$date_retour_prevue,$date_retour,$frais_retard);
        $e->insererEmprunt();
        $l=new Livre ("","","","","","","");
        $l->diminuerExemplaires();
        echo '<script>alert("Emprunt ajouté avec succès");</script>';
        echo '<script>window.location = "../Views/EmpruntView.php";</script>';
        exit();
    }else {
        echo '<script>alert("date incorrecte");</script>';
        echo '<script>window.location = "../Views/EmpruntView.php";</script>';
    }
}
//modifier emprunt 
if(isset($_GET['mettreAJourEmprunt']))  { 
    $idEmprunt = $_GET['id_emprunt_update'];
    //   $adherant = $_GET['id_adherant_update'];
    //  $livre = $_GET['id_livre_update'];
    $date_emprunt = $_GET['date_emprunt_update'];
    $date_emprunt_retour_prevue = $_GET['date_retour_prevue_update'];
    $date_emprunt_retour = $_GET['date_retour_update'];
    $frais_retour = $_GET['frais_retard_update'] ;
    $emp = new Emprunt ($idEmprunt,"","",$date_emprunt, $date_emprunt_retour_prevue,$date_emprunt_retour, $frais_retour);
    $emp->modifierEmprunt();
    echo '<script>alert("Emprunt modifié avec succès");</script>';
    echo '<script>window.location = "../Views/EmpruntView.php";</script>';
    exit();}
//supprimer emprunt
if(isset($_GET['supprimerEmprunt']))  {
    if(!empty($_GET['id_emprunt_delete'])) {
        $id = $_GET['id_emprunt_delete'];
        $e = new Emprunt($id, '', '', '','','','');
        $e->supprimerEmprunt();
        echo '<script> confirm("Voulez-vous vraiment supprimer cet emprunt ?");</script>';
        echo '<script>window.location = "../Views/EmpruntView.php";</script>';}
}
