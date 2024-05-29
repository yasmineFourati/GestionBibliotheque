
<?php
include "../Modele/Livre.php";
include "../Modele/Emprunt.php";

if (isset($_GET['aa'])) {
    $id=$_GET['emprunt'];
    // Supprimer l'emprunt
    $emp = new Emprunt($id,'','','','','','');
    $emp->supprimerEmprunt();
    $liv=$_GET['id'];
    // Augmenter le nombre d'exemplaires disponibles
    $livre = new Livre($liv,'','','','','','');
    $livre->augmenterExemplaires();

    // Afficher un message d'alerte et rediriger
    echo '<script>alert("Restitution ajoutée avec succès");</script>';
    echo '<script>window.location = "../Views/restitionEmprunt.php";</script>';
}
?>



?>