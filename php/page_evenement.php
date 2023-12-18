<?php
    session_start();

    include("config.php"); /* On inclut le fichier config.php à ce script php */

    // Vérification de la connexion à la base de données

    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour récupérer les données de la table 'artiste'
    $sql = "SELECT * FROM evenement";
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
        <title>Liste des événements</title>
    </head>

    <body>

        <h2>Liste des événements</h2>

        <?php
        // Vérification s'il y a des données dans la table 'artiste'
        if ($result->num_rows > 0) {
            echo '<table>';
            echo "<tr><th>ID de l'événement</th><th>Nom de l'événement</th><th>Date de l'événement</th><th>Lieu de l'événement</th><th>Heure de l'événement</th></tr>";

            // Affichage des données
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id_evenement'] . '</td>';
                echo '<td>' . $row['nom_evenement'] . '</td>';
                echo '<td>' . $row['date_evenement'] . '</td>';
                echo '<td>' . $row['lieu'] . '</td>';
                echo '<td>' . $row['heure'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Aucune donnée trouvée dans la table "evenement".';
        }

        // Fermeture de la connexion à la base de données
        $conn->close();
        ?>

    </body>
</html>