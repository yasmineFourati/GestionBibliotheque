<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "Navbar.php"; ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('bib2.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    color: #333;
    padding-bottom: 96px;
    background-color: #12141d; /* Ajout d'une couleur de fond de secours */
}

.panel {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: start;
    -webkit-align-items: flex-start;
    -ms-flex-align: start;
    align-items: flex-start;
    border-radius: 12px;
    background-color: hsla(0, 0%, 100%, 0.05);
    direction: ltr;
    background-color:grey;
    opacity: .8;
}
.panel-body {
    display: flex;
    align-items: center;
}
.display-heading-3{
    padding-left:300px;
    color:black;
    font-size:40px;
}
.center-content {
    padding: 20px; /* Réduction de la taille du padding pour une apparence plus compacte */
    border-radius: 20px;
}

a {
    text-decoration: none;
    color: #6D071A;
}

a:hover {
    color: yellow;
}

h5 {
    font-size: 20px;
    padding-top: 20px; /* Réduction de l'espacement en haut du titre */
    padding-left:300px;
}


</style>
</head>
<body>
    <div class="container grid-container">
    <div class="panel">
        <div class="panel-body align-content-center">
            <div class="center-content">
                <div class="display-heading-3 text-primary-4">Gestion des Adhérents</div>
                <h5><a href="AdherentView.php">Cliquez ici pour pouvoir gérer les adhérents</a></h5>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body align-content-center">
            <div class="center-content">
                <div class="display-heading-3 text-primary-4">Gestion des Livres</div>
                <h5><a href="LivreView.php">Cliquez ici pour pouvoir gérer les livres</a></h5>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body align-content-center">
            <div class="center-content">
                <div class="display-heading-3 text-primary-4">Gestion des Emprunts</div>
                <h5><a href="EmpruntView.php">Cliquez ici pour pouvoir gérer les emprunts</a></h5>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body align-content-center">
            <div class="center-content">
                <div class="display-heading-3 text-primary-4">Restitution</div>
                <h5><a href="restitionEmprunt.php">Cliquez ici pour pouvoir restituer</a></h5>
            </div>
        </div>
    </div>
    </div>
</body>
</html>