<?php
include("../config.php");

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_artiste = $_POST['id_artiste'];

    $sql = "DELETE FROM artistes WHERE id = $id_artiste"; 
    if ($conn->query($sql) === TRUE) {
        echo "Artiste supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'artiste : " . $conn->error;
    }
}


$conn->close();
?>
