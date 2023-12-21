<?php

require('../bdd/config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant de l'artiste à supprimer depuis le formulaire
    $id_artiste = $_POST['id_artiste'];

    $sql = "DELETE FROM artiste WHERE id_artiste = $id_artiste";
    if ($conn->query($sql) === TRUE) {
        // Vérifier si des lignes ont été affectées
        if ($conn->affected_rows > 0) {
            echo "Artiste supprimé avec succès.";
        } else {
            echo "Cet ID ne correspond à aucun artiste.";
        }
    } else {
        echo "Erreur lors de la suppression de l'artiste : " . $conn->error;
    }
}

$conn->close();
?>
