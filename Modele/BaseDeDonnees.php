<?php
 try{
    $bd = new PDO ('mysql:host=localhost;dbname=bibliotheque','root',''); 
}
 catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}

?>