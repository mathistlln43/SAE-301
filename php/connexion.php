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
        <img src="../images/piano.jpg">
        <div id="trapeze">
            <div class="trapezeContenu">
                <p id="event">Connexion</p>
                <p>et inscription</p>
            </div>
        </div>
    </header>


    <div id="gridImg">
        <img src="../images/mairie.jpg" id="coImg1">
        <span> 
            <img src="../images/mairie.jpg" id="coImg2">
            <img src="../images/mairie.jpg" id="coImg3">
        </span>
    </div>


    <section id="formulaires">

        <form action="" method="post">
            <p>Connexion</p>

            <input type="email" placeholder="Email *" required />
            <input type="password" placeholder="Mot de passe *" required />
            <input class="envoiForm" type="submit" value="Connexion" />
        </form>

        <form action="" method="post">
            <p>Inscription</p>

            <input type="text" placeholder="Nom *" required />
            <input type="text" placeholder="Prénom *" required />
            <input type="email" placeholder="Email *" required />
            <input type="password" placeholder="Mot de passe *" required />
            <input class="envoiForm" type="submit" value="Inscription" />
        </form>
    </section>


    <footer>
        <img id="logo" src="../images/mairie.jpg">

        <div id="footerContact">
            <div class="contact">
                <img src="../images/phone.svg">
                <p>+33 6 78 08 94 77</p>
            </div>
            <div class="contact">
                <img src="../images/mail.svg">
                <p>amisdelamusique63@gmail.com</p>
            </div>
        </div>

        <img class="reseauxPart" src="../images/facebook_blanc.png">
    </footer>

</body>

</html>