<?php
echo("Ceci est la page admin")
//require_once 'config.php';
//require_once 'AdminManager.php';

//session_start();

// On vérifie les informations d'identification de l'administrateur
//$adminManager = new AdminManager($db);

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $nom = $_POST["nom"];
//    $prenom = $_POST["prenom"];
//    $mdp = $_POST["mdp"];
//
//    if ($adminManager->verifierIdentifiants($nom, $prenom, $mdp)) {
//        $_SESSION["admin"] = true; // Authentification réussie, enregistrez une variable de session
//    } else {
//        echo "Identifiants incorrects.";
//    }
//}

// Vérifier si l'administrateur est authentifié
//if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
//    // Afficher les boutons pour ajouter, modifier ou supprimer des éléments
//    echo "Bienvenue, Admin!";
//    echo "<br><button>Ajouter</button>";
//    echo "<button>Modifier</button>";
//    echo "<button>Supprimer</button>";
//    echo "<br><a href='deconnexion.php'>Déconnexion</a>"; // Lien pour déconnecter l'administrateur
//} else {
//    // Afficher le formulaire de connexion
//    ?>
<!--    <form method="post" action="admin.php">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" required><br>

        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp" required><br>

        <input type="submit" value="Se connecter">
    </form>
