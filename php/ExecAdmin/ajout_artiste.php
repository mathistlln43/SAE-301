<?php

include("../config.php"); /* On inclut le fichier config.php à ce script php */

// On récupère les données du formulaire de la page admin.html
$id_artiste = $_POST["id_artiste"];
$nom_artiste = $_POST["nom_artiste"];
$genre = $_POST["genre"];
$biographie = $_POST["biographie"];


/* On insère les données rentrés dans le formulaire dans le base de données via une requête SQL */
$requete = $conn->prepare("INSERT INTO artiste (id_artiste, nom_artiste, genre, biographie) VALUES (?, ?, ?, ?)");
$requete->bind_param("isss", $id_artiste, $nom_artiste, $genre, $biographie);
$requete->execute();

echo("<h2>Cet artiste a été ajouté à la base de données !</h2>");

$requete->close();
$conn->close();

echo("<a href='../../admin.html'>Retour a l'accueil</a></li>")
?>