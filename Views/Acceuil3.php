<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Ajoutez ici vos styles personnalisés si nécessaire */
        .gallery {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .gallery-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .gallery-item img {
            width: 200px; /* Définir une largeur fixe pour toutes les images */
            height: 200px; /* Définir une hauteur fixe pour toutes les images */
            object-fit: cover; /* Assurez-vous que l'image couvre entièrement le conteneur sans déformer */
            border-radius: 50%; /* Assurez-vous que chaque image est un cercle */
            transition: transform 0.3s ease-in-out; /* Ajoutez une transition au survol pour un effet fluide */
        }

        .gallery-item img:hover {
            transform: scale(1.1); /* Zoom sur l'image au survol */
        }

        .book-category {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        body {
            background: #005EB8;
            color: white;
            padding: 20px;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        * Styliser la liste des livres empruntés */
.borrowed-books {
    list-style-type: none;
    padding: 0;
}

/* Styliser chaque élément de livre */
.book-item {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
}

/* Titre du livre */
.book-title {
    font-size: 18px;
    color: black;
}

/* Auteur du livre */
.book-author {
    font-style: italic;
}

/* Date de retour */
.book-return-date {
    font-weight: bold;
}
        h2 {
            margin-top: 20px;
            text-align: center;
        }

        .borrowed-books {
            list-style: none;
            padding: 0;
            margin-top: 20px; /* Ajoute un espacement en haut de la liste */
        }

        .book-item {
            background-color: #f9f9f9; /* Couleur de fond pour chaque élément de livre */
            border-radius: 5px; /* Bord arrondi pour un aspect plus doux */
            padding: 15px; /* Ajoute de l'espace à l'intérieur de chaque élément */
            margin-bottom: 10px; /* Espacement entre chaque élément */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre douce pour un effet de profondeur */
        }

        .book-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px; /* Espacement en bas du titre */
            color:blue;
        }

        .book-author,
        .book-return-date {
            font-size: 16px;
            color: #666; /* Couleur de texte plus douce */
        }

        select {
            width: 100%; /* Occupe toute la largeur disponible */
            padding: 10px; /* Ajoute un peu d'espace autour du sélecteur */
            margin-top: 10px; /* Espacement en haut du sélecteur */
            border-radius: 5px; /* Bord arrondi pour un aspect plus doux */
            border: 1px solid #ccc; /* Bordure légère */
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="gallery">
            <div class="gallery-item">
                <span class="book-category">Enfant</span>
                <a href="Enfant.php?category=enfant"><img src="https://img.freepik.com/photos-gratuite/enfants-jouant-herbe_1098-504.jpg?t=st=1714556939~exp=1714560539~hmac=7a3ccdd4976a18e75b34a02c674533e9531536d67e894bd140d5e6d0b306e027&w=826" alt="enfant"></a>
            </div>
            <div class="gallery-item">
                <span class="book-category">Science Fiction</span>
                <a href="ScienceFiction.php?category=science"><img src="https://img.freepik.com/photos-premium/plongez-dans-domaine-science-marine-octane-re-generative-ai_1198249-20550.jpg?w=826" alt="science fiction"></a>
            </div>
        </div>
        <div class="gallery">
            <div class="gallery-item">
                <span class="book-category">Horreur</span>
                <a href="Horreur.php?category=horreur"><img src="https://img.freepik.com/photos-gratuite/fond-ecran-halloween-main-zombie_23-2149122586.jpg?t=st=1714557379~exp=1714560979~hmac=7527637709c0de333cffdd1da9e4f73086d185780f1cf2423af46622b76dc6ea&w=360" alt="horreur"></a>
            </div>
            <div class="gallery-item">
                <span class="book-category">Romance</span>
                <a href="Romance.php?category=romance"><img src="https://img.freepik.com/photos-premium/jour-saint-valentin-couple-amour-romantique_701806-570.jpg?w=740" alt="romance"></a>
            </div>
        </div>

        <h2>Emprunts en cours :</h2>
        <form action="" method="GET">
        <ul class="borrowed-books">
            
                <option value=""></option>
                <?php        
                include "../Controller/AdherentController.php";
                
                
                $empruntsClient = adh($_GET['id']);
                foreach ($empruntsClient as $emprunt) : ?>
                    <li class="book-item">
                        <h2 class="book-title">ID du livre : <?= $emprunt['id_livre'] ?></h2>
                        <p class="book-author">Date de l'emprunt : <?= $emprunt['date_emprunt'] ?></p>
                        <p class="book-return-date">Date de retour : <?= $emprunt['date_retour'] ?></p>
                    </li>
                <?php endforeach; ?>
           
        </ul>
        </form>
    </div>
</body>
</html>