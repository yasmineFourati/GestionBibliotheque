<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Restitution</title>
    <?php include "Navbar.php"; ?>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers une feuille de style externe -->
</head>
<body>
<style>
    .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.restitution-form {
    margin-bottom: 20px;
}

.select-emprunt {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease; /* Ajouter une transition pour le changement de couleur de la bordure */
}

.select-emprunt:hover {
    border-color: #666; /* Changer la couleur de la bordure au survol */
}

.restitution-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.restitution-btn:hover {
    background-color: #45a049;
}

.restitution-form input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.restitution-form input[type="text"]:hover {
    border-color: #666;
}
</style>

<div class="container">
    <h1>Restitution des emprunts</h1>

    <form action="../Controller/ControlleurRestition.php" method="GET" class="restitution-form">
        <select name="emprunt" class="select-emprunt">
            <option value="">Sélectionnez un emprunt</option>
            <?php
            include "../Modele/Emprunt.php";
            $empruntModel = new Emprunt();
            $emprunts = $empruntModel->affichEmprunt();
            foreach ($emprunts as $emp) {
                echo "<option value='" . $emp['id'] . "'>" . $emp['id'] . "</option>";
            }
            ?>
        </select>
        <br>
        <input type="text" name="id" placeholder="ID du livre" class="restitution-form" required><br><br>
        <input type="submit" name="aa" value="Restitution" class="restitution-btn">
        
    </form>
</div>

</body>
</html>