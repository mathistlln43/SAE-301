<?php
session_start();

if (!isset($_SESSION['nom_utilisateur']) || !isset($_SESSION['prenom_utilisateur'])) {
    header("Location: form.php"); 
    exit;
}

// Connexion à la base de données
require('bdd/config.php');

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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link href="styles.css" rel="stylesheet">
</head>

<body>

    <header>
        <img src="images/nvtheatre.jpg">
        <div id="trapeze">
            <div class="trapezeContenu">
                <p id="event">Compte</p>
                <p>Espace Compte</p>
            </div>
        </div>
    </header>


    <div id="gridImg">
        <img src="images/mairie.jpg" id="coImg1">
        <span>
            <img src="images/mairie.jpg" id="coImg2">
        </span>
    </div>


    <section id="admin">
        <p>Compte</p>
        <h3>Nom : <?php echo $nom_utilisateur; ?></h3>
        <h3>Prénom : <?php echo $prénom_utilisateur; ?></h3>
        <p>Je souhaite assister à :</p>
        <select class="envoiAdmin">
            <option value="pokora">Pokora - salle b - 21h</option>
            <option value="bidule">Bidule - salle a - 22 janvier - 21h</option>
            <option value="patoches">Patoches - salle b - 14 mars</option>
        </select>
        <button class="envoiAdmin" style="margin-top: 2cm;">Deconnexion</button>
    </section>


    <footer>
        <img id="logo" src="images/Logo Blanc.png">

        <div id="footerContact">
            <div class="contact">
                <img src="images/phone.svg">
                <p>+33 6 78 08 94 77</p>
            </div>
            <div class="contact">
                <img src="images/mail.svg">
                <p>amisdelamusique63@gmail.com</p>
            </div>
        </div>

        <img class="reseauxPart" src="images/facebook_blanc.png">
    </footer>

</body>

</html>