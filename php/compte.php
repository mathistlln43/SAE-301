<?php
session_start();

if (!isset($_SESSION['nom_utilisateur']) || !isset($_SESSION['prenom_utilisateur'])) {
    header("Location: form.php"); 
    exit;
}

// Connexion à la base de données
require('config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nom = $_SESSION['nom_utilisateur'];
$prenom = $_SESSION['prenom_utilisateur'];

// Récupération des informations du compte connecté
$retrieve_user = "SELECT * FROM compte WHERE nom_utilisateur = '$nom' AND prenom_utilisateur = '$prenom'";
$result = $conn->query($retrieve_user);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nom_utilisateur = $row['nom_utilisateur'];
    $prenom_utilisateur = $row['prenom_utilisateur'];
} else {
    echo "Erreur: Compte non trouvé.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Informations du Compte</title>
</head>
<body>

    <h2>Informations du Compte</h2>
    <p>Nom d'utilisateur: <?php echo $nom_utilisateur; ?></p>
    <p>Prénom d'utilisateur: <?php echo $prenom_utilisateur; ?></p>

</body>
</html>