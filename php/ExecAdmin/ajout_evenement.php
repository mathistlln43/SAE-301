<?php

include("../config.php"); /* On inclut le fichier config.php à ce script php */

// On récupère les données du formulaire de la page admin.html
$id_evenement = $_POST["id_evenement"];
$nom_evenement = $_POST["nom_evenement"];
$date_evenement = $_POST["date_evenement"];
$lieu = $_POST["lieu"];
$heure = $_POST["heure"];


/* On insère les données rentrés dans le formulaire dans le base de données via une requête SQL */
$requete = $conn->prepare("INSERT INTO evenement (id_evenement, nom_evenement, date_evenement, lieu, heure) VALUES (?, ?, ?, ?, ?)");
$requete->bind_param("issss", $id_evenement, $nom_evenement, $date_evenement, $lieu, $heure);
$requete->execute();

echo("<h2>Cet evenement a été ajouté à la base de données !</h2>");

$requete->close();
$conn->close();

echo("<a href='../../admin.html'>Retour a l'accueil</a></li>")
?>