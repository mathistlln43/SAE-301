<?php
    session_start();

    include("config.php"); /* On inclut le fichier config.php à ce script php */

    // Vérification de la connexion à la base de données

    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour récupérer les données de la table 'artiste'
    $sql = "SELECT * FROM artiste";
    $result = $conn->query($sql);
    
    // Vérification de la réussite de la requête
    if (!$result) {
        die("Erreur lors de l'exécution de la requête : " . $conn->error);
    }
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
        // Vérification s'il y a des données dans la table 'artiste'
        if ($result->num_rows > 0) {
            echo '<table>';
            echo "<tr><th>ID de l'artiste</th><th>Nom de l'artiste</th><th>Genre musical</th><th>Biographie</th></tr>";

            // Affichage des données
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id_artiste'] . '</td>';
                echo '<td>' . $row['nom_artiste'] . '</td>';
                echo '<td>' . $row['genre'] . '</td>';
                echo '<td>' . $row['biographie'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Aucune donnée trouvée dans la table "artiste".';
        }

        // Fermeture de la connexion à la base de données
        $conn->close();
        ?>

    </body>
</html>