<?php
    session_start();

    include("POO/Artiste.php"); /* On inclut la classe Artiste qui est dans le fichier Artiste.php */

    include("config.php"); /* On inclut le fichier config.php */

    // On vérifie si on a pu se connecter à la base de données
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // On récupère les données de la table "artiste"
    $sql = "SELECT * FROM artiste";
    $result = $conn->query($sql);
    
    // On vérifie si la requête s'est bien éxécuté
    if (!$result) {
        die("Erreur lors de l'exécution de la requête : " . $conn->error);
    }

    $artists = array();

    // On récupère les données et on crée des objets "Artistes"
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
    </head>

    <body>

        <h2>Liste des artistes</h2>

        <?php
            // On vérifie s'il y a des données dans la table "artiste"
            if (!empty($artists)) {
                echo '<table>';
                echo "<tr><th>ID de l'artiste</th><th>Nom de l'artiste</th><th>Genre musical</th><th>Biographie</th></tr>";

                // On affiche les données
                foreach ($artists as $artist) {
                    echo '<tr>';
                    echo '<td>' . $artist->id_artiste . '</td>';
                    echo '<td>' . $artist->nom_artiste . '</td>';
                    echo '<td>' . $artist->genre . '</td>';
                    echo '<td>' . $artist->biographie . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo 'Aucune donnée trouvée dans la table "artiste".';
            }
        ?>

    </body>
</html>