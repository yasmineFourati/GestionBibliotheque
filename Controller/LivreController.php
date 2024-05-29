<?php
include "../Modele/Livre.php";


if(isset($_GET['AjouterLivre'])){
    if(!empty($_GET['idlivre'])&& !empty($_GET['titre'])&& !empty($_GET['auteur']) && !empty($_GET['categorie'])&& !empty($_GET['prix'])&& !empty($_GET['nbExp'])&& !empty($_GET['dispo'])){
        $id=$_GET['idlivre'];
        $titre=$_GET['titre'];
        $aut=$_GET['auteur'];
        $categorie=$_GET['categorie'];
        $prix=$_GET['prix'];
        $NbExm=$_GET['nbExp'];
        $dispo=$_GET['dispo'];
        $livre=new livre($id,$titre,$aut,$categorie,$prix,$NbExm,$dispo);
        $livre->ajouterLivre();
        echo '<script>alert("Livre ajouté avec succès");</script>';
        echo '<script>window.location = "../Views/LivreView.php";</script>';
        exit();
    }
}

if(isset($_GET['mettreAJourLivre'])){
    //if(!empty($_GET['id_livre_update']) && !empty($_GET['titre_update']) && !empty($_GET['auteur_update']) && !empty($_GET['categorie_update'])
    //&& !empty($_GET['prix_update'])&& !empty($_GET['nbExp_update'])&& !empty($_GET['dispo_update'])) {    
    $id = $_GET['id_livre_update'];
    $tit = $_GET['titre_update'];
    $aut = $_GET['auteur_update'];
    $cat = $_GET['categorie_update'];
    $prix = $_GET['prix_update'];
    $exp = $_GET['nbExp_update'];
    $disp = $_GET['dispo_update'];
    $l = new Livre($id, $tit, $aut, $cat, $prix, $exp, $disp);
    $l->mettreAJourLivre();
    echo '<script>alert("Livre modifié avec succès");</script>';
    echo '<script>window.location = "../Views/LivreView.php";</script>';
    exit();} 
if(isset($_GET['supprimerLivre']))  {
    if(!empty($_GET['id_livre_delete'])) {
        $id = $_GET['id_livre_delete'];
        $l = new Livre($id, '', '', '','','','');
        $l->supprimerLivre();
       echo '<script> confirm("Voulez-vous vraiment supprimer ce livre ?");</script>';
       echo '<script>window.location = "../Views/LivreView.php";</script>';
    }}

?>