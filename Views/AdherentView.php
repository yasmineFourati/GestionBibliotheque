<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Adhérents</title>
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
        input[type="email"],
        input[type="tel"],
        input[type="submit"] {
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

        .btn-danger {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Gestion des adhérents</h1>

        <h2>Ajouter un adhérent</h2>
        <form action="../Controller/AdherentController.php" method="GET">
            <label for="name">id :</label>
            <input type="text" name="id" id="name" required>   
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>
            <label for="phone">Téléphone :</label>
            <input type="tel" name="phone" id="phone" required>
            <input type="submit" name="Ajouter" value="Ajouter">
        </form>

        <h2>Liste des adhérents</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        <?php
        include "../Modele/BaseDeDonnees.php";
        include "../Modele/Adherent.php";
        $adh=new Adherent("","","","");
        $adh=$adh->affichAdherent();
        foreach($adh as $f){
           $s= "<tr>
            <td>".$f['id']."</td>
            <td>".$f['nom']."</td>
            <td>".$f['email']."</td>
            <td>".$f['phone']."</td>
        </tr> "; 
    echo $s;    
    }
        ?>
    </table>
        <h2>Mettre à jour un adhérent</h2>
        <form action="../Controller/AdherentController.php" method="GET">
            <label for="id_update">ID de l'adhérent à mettre à jour :</label>
            <input type="text" name="id_update" id="id_update" >
            <label for="name_update">Nouveau nom :</label>
            <input type="text" name="name_update" id="name_update" >
            <label for="email_update">Nouvel email :</label>
            <input type="email" name="email_update" id="email_update" >
            <label for="phone_update">Nouveau téléphone :</label>
            <input type="tel" name="phone_update" id="phone_update" >
            <input type="submit" name="mettreajour" value="Mettre à jour">
        </form>
        <h2>Rechercher un adhérent</h2>
    <form method="GET" action=""> 
    <input type="text" name="search" placeholder="Rechercher par id">
    <input type="submit" name="rechercher" value="Rechercher">
</form> 
    <?php
if(isset($_GET['rechercher'])){
    $idRecherche = $_GET['search']; 
    $sql = $bd->prepare("SELECT * FROM adherent WHERE id LIKE ?");
    $sql->execute(["%$idRecherche%"]);
    
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$idRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>NOM</th>";
        echo "<th>EMAIL</th>";
        echo "<th>TELEPHONE</th>";
        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row = $sql->fetch()){
            echo "<tr>";
            echo "<td>$row->id</td>";
            echo "<td>$row->nom</td>";
            echo "<td>$row->email</td>";
            echo "<td>$row->phone</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun adhérent trouvé pour l'ID '$idRecherche'</h2>";
    }
}
?>
    <form method="GET" action=""> 
<input type="text" name="search1" placeholder="Rechercher par nom">
    <input type="submit" name="rechercher1" value="Rechercher">
</form> 
    <?php
if(isset($_GET['rechercher1'])){
    $nomRecherche = $_GET['search1']; 
    $sql = $bd->prepare("SELECT * FROM adherent WHERE nom LIKE ?");
    $sql->execute(["%$nomRecherche%"]);
    
    if($sql->rowCount() > 0){
        echo "<h2>Résultats de la recherche pour '$nomRecherche'</h2>";
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>ID</th>";
        echo "<th>NOM</th>";
        echo "<th>EMAIL</th>";
        echo "<th>TELEPHONE</th>";
        echo "</tr>";
        
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row = $sql->fetch()){
            echo "<tr>";
            echo "<td>$row->id</td>";
            echo "<td>$row->nom</td>";
            echo "<td>$row->email</td>";
            echo "<td>$row->phone</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h2>Aucun adhérent trouvé pour '$nomRecherche'</h2>";
    }
}
?>
        <h2>Supprimer un adhérent</h2>
        <form action="../Controller/AdherentController.php" method="GET">
            <label for="id_delete">ID de l'adhérent à supprimer :</label>
            <input type="text" name="id_delete" id="id_delete" required>
            <input type="submit" name="supprimer" value="Supprimer" class="btn-danger">
        </form>
    </div>
    
</body>
</html>