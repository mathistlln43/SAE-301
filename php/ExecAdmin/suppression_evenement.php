<?php

require('../bdd/config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant de l'event à supprimer depuis le formulaire
    $id_evenement = $_POST['id_evenement'];

    $sql = "DELETE FROM evenement WHERE id_evenement = $id_evenement";
    if ($conn->query($sql) === TRUE) {
        // Vérifier si des lignes ont été affectées
        if ($conn->affected_rows > 0) {
            echo "Evenement supprimé avec succès.";
        } else {
            echo "Aucun événement ne possède cet ID.";
        }
    } else {
        echo "Erreur lors de la suppression de l'evenement : " . $conn->error;
    }
}

$conn->close();
?>
