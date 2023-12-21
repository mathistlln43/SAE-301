<?php

session_start();

include("POO/Artiste.php");
include("bdd/config.php");

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$sql = "SELECT * FROM artiste";
$result = $conn->query($sql);

if (!$result) {
    die("Erreur lors de l'exécution de la requête : " . $conn->error);
}

$artists = array();

while ($row = $result->fetch_assoc()) {
    $artist = new Artiste($row['id_artiste'], $row['nom_artiste'], $row['genre'], $row['biographie']);
    $artists[] = $artist;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des artistes</title>

    <!-- Ajoutez ces lignes pour inclure Swiper -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.js"></script>

    <style>        
        .swiper-container {
            width: 100%; /* Ajuste la largeur à 100% de la fenêtre */
        }

        .swiper-button-prev, .swiper-button-next {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin: 0 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>Liste des artistes</h2>

    <?php
    if (!empty($artists)) {
        // Utilisez une classe spécifique pour le conteneur Swiper
        echo '<div class="swiper-container">';
        echo '<div class="swiper-wrapper">';

        foreach ($artists as $artist) {
            // Utilisez une classe spécifique pour chaque diapositive Swiper
            echo '<div class="swiper-slide">';
            echo "<img src='../Images/$artist->id_artiste.jpg' width='500px'>";
            echo '<p>ID de l\'artiste: ' . $artist->id_artiste . '</p>';
            echo '<p>Nom de l\'artiste: ' . $artist->nom_artiste . '</p>';
            echo '<p>Genre musical: ' . $artist->genre . '</p>';
            echo '<p>Biographie: ' . $artist->biographie . '</p>';
            echo '</div>';
        }

        echo '</div>';

        // Ajoutez des boutons de navigation personnalisés
        echo '<div class="swiper-button-prev"></div>';
        echo '<div class="swiper-button-next"></div>';

        echo '</div>';

        // Ajoutez le script Swiper pour l'initialisation avec les boutons de navigation
        echo '<script>';
        echo 'var swiper = new Swiper(".swiper-container", {';
        echo '  slidesPerView: 1,';
        echo '  spaceBetween: 10,';
        echo '  navigation: {';
        echo '    nextEl: ".swiper-button-next",';
        echo '    prevEl: ".swiper-button-prev",';
        echo '  },';
        echo '  allowTouchMove: false,'; // Désactiver la navigation par glissement
        echo '});';
        echo '</script>';
    } else {
        echo 'Aucune donnée trouvée dans la table "artiste".';
    }
    ?>

</body>
</html>