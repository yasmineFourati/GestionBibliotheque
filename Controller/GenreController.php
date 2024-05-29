<?php
include '../Modele/Livre.php'; 
 
if(isset($_GET['rechEnf'])){
    $titreRecherche = $_GET['child']; 
    $sql = $bd->prepare("SELECT * FROM livre WHERE titre LIKE ? AND categorie= 'Enfant'");
    $sql->execute(["$titreRecherche"]);
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$titreRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>TITRE</th>";
        echo "<th>AUTEUR</th>";
        echo "<th>CATEGORIE</th>";
        echo "<th>PRIX</th>";
        echo "<th>NOMBRE EXEMPLAIRES</th>";
        echo "<th>DISPONIBILITE</th>";
        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row = $sql->fetch()){
            echo "<tr>";
            echo "<td>$row->id_livre</td>";
            echo "<td>$row->titre</td>";
            echo "<td>$row->auteur</td>";
            echo "<td>$row->categorie</td>";
            echo "<td>$row->prix</td>";
            echo "<td>$row->nbExp</td>";
            echo "<td>$row->dispo</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun livre trouvé pour '$titreRecherche'</h2>";
    }
}

if(isset($_GET['rechHor'])){
    $titreRecherche = $_GET['horreur']; 
    $sql = $bd->prepare("SELECT * FROM livre WHERE titre LIKE ? AND categorie= 'Horreur'");
    $sql->execute(["$titreRecherche"]);
    
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$titreRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>TITRE</th>";
        echo "<th>AUTEUR</th>";
        echo "<th>CATEGORIE</th>";
        echo "<th>PRIX</th>";
        echo "<th>NOMBRE EXEMPLAIRES</th>";
        echo "<th>DISPONIBILITE</th>";
        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row = $sql->fetch()){
            echo "<tr>";
            echo "<td>$row->id_livre</td>";
            echo "<td>$row->titre</td>";
            echo "<td>$row->auteur</td>";
            echo "<td>$row->categorie</td>";
            echo "<td>$row->prix</td>";
            echo "<td>$row->nbExp</td>";
            echo "<td>$row->dispo</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun livre trouvé pour '$titreRecherche'</h2>";
    }
}
if(isset($_GET['rechSc'])){
    $titreRecherche = $_GET['btnFiction']; 
    $sql = $bd->prepare("SELECT * FROM livre WHERE titre LIKE ? AND categorie= 'Science Fiction'");
    $sql->execute(["$titreRecherche"]);
    
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$titreRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>TITRE</th>";
        echo "<th>AUTEUR</th>";
        echo "<th>CATEGORIE</th>";
        echo "<th>PRIX</th>";
        echo "<th>NOMBRE EXEMPLAIRES</th>";
        echo "<th>DISPONIBILITE</th>";
        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row = $sql->fetch()){
            echo "<tr>";
            echo "<td>$row->id_livre</td>";
            echo "<td>$row->titre</td>";
            echo "<td>$row->auteur</td>";
            echo "<td>$row->categorie</td>";
            echo "<td>$row->prix</td>";
            echo "<td>$row->nbExp</td>";
            echo "<td>$row->dispo</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun livre trouvé pour '$titreRecherche'</h2>";
    }
}
if(isset($_GET['rechR'])){
    $titreRecherche = $_GET['amour']; 
    $sql = $bd->prepare("SELECT * FROM livre WHERE titre LIKE ? AND categorie= 'Romance'");
    $sql->execute(["$titreRecherche"]);
    
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$titreRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>TITRE</th>";
        echo "<th>AUTEUR</th>";
        echo "<th>CATEGORIE</th>";
        echo "<th>PRIX</th>";
        echo "<th>NOMBRE EXEMPLAIRES</th>";
        echo "<th>DISPONIBILITE</th>";
        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row = $sql->fetch()){
            echo "<tr>";
            echo "<td>$row->id_livre</td>";
            echo "<td>$row->titre</td>";
            echo "<td>$row->auteur</td>";
            echo "<td>$row->categorie</td>";
            echo "<td>$row->prix</td>";
            echo "<td>$row->nbExp</td>";
            echo "<td>$row->dispo</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun livre trouvé pour '$titreRecherche'</h2>";
    }
}
echo "<style>";
echo "
.table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd; /* Ajout d'une bordure pour améliorer l'apparence */
}
.table th, .table td {
    padding: 10px; /* Augmentation de la marge intérieure pour un meilleur espacement */
    border-bottom: 1px solid #ddd;
}
.table th {
    background-color: #4caf50; /* Changement de la couleur d'arrière-plan de l'en-tête en vert */
    color: #fff;
    font-weight: bold;
}
.table-hover tbody tr:hover {
    background-color: #f0f0f0; /* Changement de la couleur de survol des lignes du tableau */
}
";
echo "</style>";
?>