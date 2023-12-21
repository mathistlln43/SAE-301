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


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <header>
        <img src="../img/nvtheatre.jpg">
        <div id="trapeze">
            <div class="trapezeContenu">
                <p id="event">Compte</p>
                <p>Espace Compte</p>
            </div>
        </div>
    </header>


    <div id="gridImg">
        <img src="../img/mairie.jpg" id="coImg1">
        <span>
            <img src="../img/mairie.jpg" id="coImg2">
        </span>
    </div>


    <section id="admin">
        <p>Compte</p>
        <h3>Nom : <?php echo $nom_utilisateur; ?></h3>
        <h3>Prénom : <?php echo $prenom_utilisateur; ?></h3>
        <p>Je souhaite assister à :</p>
        <select class="envoiAdmin">
        <?php
    
        // Récupération des evenement
        $sql = "SELECT nom_evenement, lieu, date_evenement FROM evenement";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['nom_evenement'] . "'>" . $row['nom_evenement'] . " - " . $row['lieu'] . " - " . $row['date_evenement'] . "</option>";
            }
        } else {
            echo "<option value=''>Aucun événement trouvé</option>";
        }

        $conn->close();
        ?>
    </select>
        <a href="connexion.php"><button type="" class="envoiAdmin" style="margin-top: 2cm; ">Deconnexion</button></a>
    </section>



</body>

</html>
