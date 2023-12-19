<?php
    session_start();

    include("POO/Evenement.php"); /* On inclut la classe Evenement qui est dans le fichier Evenement.php */

    include("bdd/config.php"); /* On inclut le fichier config.php à ce script php */

    // On vérifie si on a pu se connecter à la base de données
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    // On récupère les données de la table "evenement"
    $sql = "SELECT * FROM evenement";
    $result = $conn->query($sql);
    
    // On vérifie si la requête s'est bien éxécuté
    if (!$result) {
        die("Erreur lors de l'exécution de la requête : " . $conn->error);
    }

    $events = array();

    // On récupère les données et on crée des objets "Evenements"
    while ($row = $result->fetch_assoc()) {
        $event = new Evenement($row['id_evenement'], $row['nom_evenement'], $row['date_evenement'], $row['lieu'], $row['heure']);
        $events[] = $event;
    }

    $conn->close();
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
            // On vérifie s'il y a des données dans la table "evenement"
            if (!empty($events)) {
                echo '<table>';
                echo "<tr><th>ID de l'événement</th><th>Nom de l'événement</th><th>Date de l'événement</th><th>Lieu de l'événement</th><th>Heure de l'événement</th></tr>";

                // On affiche les données
                foreach ($events as $event) {
                    echo '<tr>';
                    echo '<td>' . $event->id_evenement . '</td>';
                    echo '<td>' . $event->nom_evenement . '</td>';
                    echo '<td>' . $event->date_evenement . '</td>';
                    echo '<td>' . $event->lieu . '</td>';
                    echo '<td>' . $event->heure . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo 'Aucune donnée trouvée dans la table "evenement".';
            }
        ?>

    </body>
</html>