<?php
include('../Modele/Bibliothecaire.php');

if(isset($_GET['connecter'])) {
    if(!empty($_GET['email']) && !empty($_GET['password'])) {
        $mail = $_GET['email'];
        $pwd = $_GET['password'];
    
        //$zz = $b->verifier();
        if($pwd == "azerty31" && $mail == "yasminefourati339@gmail.com") {
            header("Location:../Views/Acceuil2.php");
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            echo '<script>alert("Identifiant ou mot de passe incorrect! Réessayez") </script>';
            echo '<script>document.location.href="../Views/SignInBibliothecaire.php"</script>';
        } 
    } else {
        echo '<script>alert("Veuillez remplir tous les champs du formulaire") </script>';
        echo '<script>document.location.href="../Views/SignInBibliothecaire.php"</script>';

    }
}
?>