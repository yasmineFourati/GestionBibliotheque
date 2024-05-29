<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de bibliothèque</title>
    <?php include "Navbar.php"; ?>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1, h2 {
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .message-box {
            background-color: #dff0d8; 
            color: #3c763d; 
            border: 1px solid #d6e9c6; 
            padding: 15px;
            margin-bottom: 20px; 
            border-radius: 4px; 
        }
    </style>
    
</head>
<body>
    <h1>Gestion des livres</h1>
    
    <h2>Ajouter un livre</h2>
    <form action="../Controller/LivreController.php" method="GET">
        <input type="number" name="idlivre" placeholder="ID du livre" required><br>
        <input type="text" name="titre" placeholder="Titre" required><br>
        <input type="text" name="auteur" placeholder="Auteur" required><br>
        <input type="text" name="categorie" placeholder="Catégorie" required><br>
        <input type="number" name="prix" placeholder="Prix" required><br>
        <input type="number" name="nbExp" placeholder="Nombre d'exemplaires existants" required><br>
        <input type="number" name="dispo" placeholder="Disponibilité" required><br>
        <input type="submit" name="AjouterLivre" value="Ajouter">
    </form>
    <h2>Liste des livres</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Exemplaires</th>
            <th>Disponibilité</th>
        </tr>
        <?php
        include "../Modele/BaseDeDonnees.php";
        include "../Modele/Livre.php";
        $l=new Livre("","","","","","","");
        $l=$l->affichLivre();
        foreach($l as $liv){
           $s= "<tr>
            <td>
            ".$liv['id_livre']."</td>
            <td>".$liv['titre']."</td>
            <td>".$liv['auteur']."</td>
            <td>".$liv['categorie']."</td>
            <td>".$liv['prix']."</td>
            <td>".$liv['nbExp']."</td>
            <td>".$liv['dispo']."</td>
        </tr> "; 
    echo $s;    
    }
        ?>
    </table>
    <h2>Mettre à jour un livre</h2>
<form action="../Controller/LivreController.php" method="GET">
    <label for="id_livre_update">ID du livre à mettre à jour :</label>
    <input type="text" name="id_livre_update" id="id_livre_update" >
    <label for="titre_update">Nouveau titre :</label>
    <input type="text" name="titre_update" id="titre_update" >
    <label for="auteur_update">Nouvel auteur :</label>
    <input type="text" name="auteur_update" id="auteur_update" >
    <label for="categorie_update">Nouvelle catégorie :</label>
    <input type="text" name="categorie_update" id="categorie_update" >
    <label for="prix_update">Nouveau prix :</label>
    <input type="number" name="prix_update" id="prix_update" >
    <label for="nbExp_update">Nouveau nombre d'exemplaires :</label>
    <input type="number" name="nbExp_update" id="nbExp_update" >
    <label for="dispo_update">Nouvelle disponibilité :</label>
    <input type="number" name="dispo_update" id="dispo_update" >
    <input type="submit" name="mettreAJourLivre" value="Mettre à jour">
</form>

    <h2>Rechercher un livre</h2>
    <form method="GET" action=""> 
    <input type="text" name="search0" placeholder="Rechercher par id">
    <input type="submit" name="rechercher0" value="Rechercher">
</form> 
    <?php
if(isset($_GET['rechercher0'])){
    $titreRecherche = $_GET['search0']; 
    $sql = $bd->prepare("SELECT * FROM livre WHERE id_livre LIKE ?");
    $sql->execute(["%$titreRecherche%"]);
    
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
?>
<form method="GET" action=""> 
    <input type="text" name="search" placeholder="Rechercher par titre">
    <input type="submit" name="rechercher" value="Rechercher">
</form> 
    <?php
if(isset($_GET['rechercher'])){
    $titreRecherche = $_GET['search']; 
    $sql = $bd->prepare("SELECT * FROM livre WHERE titre LIKE ?");
    $sql->execute(["%$titreRecherche%"]);
    
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
?>


    <h2>Supprimer un livre</h2>
<form action="../Controller/LivreController.php" method="GET">
    <label for="id_livre_delete">ID du livre à supprimer :</label>
    <input type="text" name="id_livre_delete" id="id_livre_delete" required>
    <input type="submit" name="supprimerLivre" value="Supprimer">
</form>

</body>
</html>