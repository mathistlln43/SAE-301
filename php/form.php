<?php
session_start();

require('config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* Verification */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['reg_password'];

        $check_user = "SELECT * FROM compte WHERE nom_utilisateur = '$nom' AND prenom_utilisateur = '$prenom'";
        $result = $conn->query($check_user);
        
        if ($result->num_rows > 0) {
            echo "Ce compte existe déjà.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_user = "INSERT INTO compte (nom_utilisateur, prenom_utilisateur, motdepasse) VALUES ('$nom', '$prenom', '$hashed_password')";
            
            if ($conn->query($insert_user) === TRUE) {
                echo "Inscription réussie !";
            } else {
                echo "Erreur lors de l'inscription : " . $conn->error;
            }
        }
    } elseif (isset($_POST['login'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['login_password'];

        $check_user = "SELECT * FROM compte WHERE nom_utilisateur = '$nom' AND prenom_utilisateur = '$prenom'";
        $result = $conn->query($check_user);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['motdepasse'])) {
                $_SESSION['nom_utilisateur'] = $nom;
                $_SESSION['prenom_utilisateur'] = $prenom;

                // On ajoute une condition pour la redirection vers admin.php
                if ($nom === 'admin' && $prenom === 'adminadmin' && $password === 'adminmdp') {
                    header("Location: admin.php");
                } else {
                    header("Location: compte.php");
                }
                
                exit;
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription et Connexion</title>
</head>
<body>

    <div id="Inscription">
        <h3>Inscription</h3>
        <form method="post" action="">
            <label>Nom:</label>
            <input type="text" name="nom" required><br><br>
            
            <label>Prénom:</label>
            <input type="text" name="prenom" required><br><br>
            
            <label>Mot de passe:</label>
            <input type="password" name="reg_password" required><br><br>
            
            <input type="submit" name="register" value="S'inscrire">
        </form>
    </div>

    <div id="Connexion">
        <h3>Connexion</h3>
        <form method="post" action="">
            <label>Nom:</label>
            <input type="text" name="nom" required><br><br>
            
            <label>Prénom:</label>
            <input type="text" name="prenom" required><br><br>
            
            <label>Mot de passe:</label>
            <input type="password" name="login_password" required><br><br>
            
            <input type="submit" name="login" value="Se connecter">
        </form>
    </div>

</body>
</html>

<?php
$conn->close();
?>
