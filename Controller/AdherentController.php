<?php
include "../Modele/Adherent.php";
include '../Modele/BaseDeDonnees.php';
include "../Modele/Emprunt.php";

if(isset($_GET['connecter']))  { //verifier si le param est present dans GET(View)
    if(!empty($_GET['email'])&& !empty($_GET['password'])) {
        $mail = $_GET['email'];
        $pwd = $_GET['phone'];
        $b = new Adherent('','',$mail,$pwd);
        if($b->verifier()){
            echo '<script>document.location.href="../Views/Acceuil3.php"</script>';}
        else{
            echo '<script>alert("Identifiant ou mot de passe incorrect! Réessayez") </script>';
            echo '<script>document.location.href="../Views/SignInAdherent.php"</script>';
        } } }
    if(isset($_GET['Ajouter'])){
        if(!empty($_GET['id']) && !empty($_GET['name']) && !empty($_GET['email']) && !empty($_GET['phone'])) {
            $id = $_GET['id'];
            $name = $_GET['name'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            $adherent = new Adherent($id, $name, $email, $phone);
           try{
            $adherent->insererAdherent();
            echo '<script>alert("Adhérent ajouté avec succès");</script>';
            echo '<script>window.location = "../Views/AdherentView.php";</script>';
            exit();
            }catch(PDOException $e){
                echo "Cet id est deja utilisé";
            }
        }
        }
    if(isset($_GET['mettreajour']))  { 
            //if(!empty($_GET['id_update']) && !empty($_GET['name_update']) && !empty($_GET['email_update']) && !empty($_GET['phone_update'])) {
            $id = $_GET['id_update'];
            $name = $_GET['name_update'];
            $email = $_GET['email_update'];
            $phone = $_GET['phone_update'];
            $adherent = new Adherent($id, $name, $email, $phone);
            $adherent->mettreAJourAdherent();
            echo '<script>alert("Adhérent modifié avec succès");</script>';
            echo '<script>window.location = "../Views/AdherentView.php";</script>';
            exit(); //arreter l'excution su script tout de suite      
    }

    if(isset($_GET['supprimer']))  {
        if(!empty($_GET['id_delete'])) {
            $id = $_GET['id_delete'];
            $adherent = new Adherent($id, '', '', '');
            $adherent->supprimerAdherent();
            echo '<script> confirm("Voulez-vous vraiment supprimer cet adhérent ?");</script>'; //confirm: oui ou non
            echo '<script>window.location = "../Views/AdherentView.php";</script>';//rederige vers une nouv page js <script>
        }
    }
    //sign in
    if(isset($_GET['connecter'])) {
        if(!empty($_GET['id']) && !empty($_GET['phone'])) {
            $id = $_GET['id'];
            $pwd = $_GET['phone'];
            $adherent = new Adherent( $id, '', '',$pwd);
            $a = $adherent->rechercherUtilisateur();
            
            if($a) {
                header("Location:../Views/Acceuil3.php?id=".$_GET['id']);//header:renvoyer les en-tetes
               
                exit();
            } else {
                echo '<script>alert("Identifiant ou mot de passe incorrect! Réessayez") </script>';
                echo '<script>document.location.href="../Views/SignInAdherant.php"</script>';
            } 
        } else {
            echo '<script>alert("Veuillez remplir tous les champs du formulaire") </script>';
            echo '<script>document.location.href="../Views/SignInAdherant.php"</script>';

        }
    }

    //session
    function adh($id){
    if(!empty($id)) {//session:verifier si la cle existe dans la session
        $id_adherent = $id;
    $emprunt = new Emprunt("","","","","","","");
    $empruntsClient = $emprunt->getEmpruntsByID($id_adherent);
    return $empruntsClient;}}

?>