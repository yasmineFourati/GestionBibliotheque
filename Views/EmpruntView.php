<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des emprunts</title>
    <?php include "Navbar.php"; ?>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
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
    </style>
    
</head>
<body>
    <h1>Gestion des emprunts</h1>
    
    <h2>Ajouter un emprunt</h2>
    <form action="../Controller/EmpruntController.php" method="GET">
        <input type="number" name="id" placeholder="ID de l'Emprunt" required><br><br>
        <select name="id_adherent">
        <option value="">Sélectionnez un Adhérent</option>
        <?php 
        include "../Modele/Adherent.php";
        include "../Modele/BaseDeDonnees.php";
        $login3 = new Adherent(); 
        $s2= $login3->affichAdherent();
        foreach ($s2 as $a) {
            echo "<option value = '" . $a['id'] . "'>" . $a['nom'] . "</option>";
        }
        ?>
        </select><br><br>
        <select name="id_livre">
        <option value="">Sélectionnez un livre</option>
        <?php
        include "../Modele/Livre.php";
        //include "../Modele/BaseDeDonnees.php";
        $login2 = new Livre(); 
        $res= $login2->affichLivre();
        foreach ($res as $liv) {
            echo "<option value = '" . $liv['id_livre'] . "'>" . $liv['titre'] . "</option>";
        }
        ?>
        </select><br> <br>
        <label for="idEmprunt">Date de l'emprunt : </label><br><br>
        <input type="date" name="date_emprunt" placeholder="Date d'emprunt" required><br><br>
        <label for="idEmprunt">Date de retour prévue : </label><br><br>
        <input type="date" name="date_retour_prevue" placeholder="Date de retour prévue" required><br><br>
        <label for="idEmprunt">Date de retour : </label><br><br>
        <input type="date" name="date_retour" placeholder="Date de retour " required><br><br>
        <input type="number" name="frais_retard" placeholder="Frais de retard" required><br>
        <input type="submit" name="ajouterEmprunt" value="Ajouter">
        </form>
    <h2>Liste des emprunts</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID de l'adhérent</th>
            <th>ID du livre</th>
            <th>Date d'emprunt</th>
            <th>Date de retour prévue</th>
            <th>Date de retour</th>
            <th>Frais de retard</th>
        </tr>
        <?php
        //include "../Modele/BaseDeDonnees.php";
        include "../Modele/Emprunt.php";
        $emprunt = new Emprunt();
        $emprunts = $emprunt->affichEmprunt();
        foreach($emprunts as $emp12) {
            echo "<tr>";
            echo "<td>".$emp12['id']."</td>";
            echo "<td>".$emp12['id_adherent']."</td>";
            echo "<td>".$emp12['id_livre']."</td>";
            echo "<td>".$emp12['date_emprunt']."</td>";
            echo "<td>".$emp12['date_retour_prevue']."</td>";
            echo "<td>".$emp12['date_retour']."</td>";
            echo "<td>".$emp12['frais_retard']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </form>
    <h2>Mettre à jour un emprunt</h2>
<form action="../Controller/EmpruntController.php" method="GET">
    <label for="id_emprunt_update">ID de l'emprunt à mettre à jour :</label>
    <input type="text" name="id_emprunt_update" id="id_emprunt_update" > 
    <label for="date_emprunt_update">Date d'emprunt :</label>
    <input type="date" name="date_emprunt_update" id="date_emprunt_update" >
    <label for="date_retour_prevue_update">Date de retour prévue :</label>
    <input type="date" name="date_retour_prevue_update" id="date_retour_prevue_update" >
    <label for="date_retour_update">Date de retour :</label>
    <input type="date" name="date_retour_update" id="date_retour_update" >
    <label for="frais_retard_update">Frais de retard :</label>
    <input type="number" name="frais_retard_update" id="frais_retard_update" >
    <input type="submit" name="mettreAJourEmprunt" value="Mettre à jour">
</form>
    <h2>Rechercher un Emprunt</h2>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Rechercher par id">
        <input type="hidden" name="searchEmprunt">
        <input type="submit" name="rechercher" value="Rechercher">
    </form>
    
    <?php
if(isset($_GET['rechercher'])){
    $idRecherche = $_GET['search']; 
    $sql = $bd->prepare("SELECT * FROM emprunt WHERE id LIKE ?");
    $sql->execute(["%$idRecherche%"]);
    
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$idRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>ID DE L'ADHERENT</th>";
        echo "<th>ID DU LIVRE</th>";
        echo "<th>DATE DE L'EMPRUNT</th>";
        echo "<th>DATE DE RETOUR PREVUE</th>";
        echo "<th>DATE DE RETOUR </th>";
        echo "<th>FRAIS DU RETARD</th>";

        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);//configurer le mode de récupération des résultats d'une requête dans un objet anonyme
        while($row = $sql->fetch()){//fetch:recupere une ligne de res
            echo "<tr>";
            echo "<td>$row->id</td>";
            echo "<td>$row->id_adherent</td>";
            echo "<td>$row->id_livre</td>";
            echo "<td>$row->date_emprunt</td>";
            echo "<td>$row->date_retour_prevue</td>";
            echo "<td>$row->date_retour</td>";
            echo "<td>$row->frais_retard</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun emprunt trouvé pour l'ID '$idRecherche'</h2>";
    }
}
?>

<h2>Supprimer un emprunt</h2>
<form action="../Controller/EmpruntController.php" method="GET">
    <input type="text" name="id_emprunt_delete" id="id_emprunt_delete" placeholder="ID de l'emprunt à supprimer" required>
    <input type="submit" name="supprimerEmprunt" value="Supprimer">
</form>
</body>
</html>