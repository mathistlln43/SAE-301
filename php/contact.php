<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>

        <link href="../css/style.css" rel="stylesheet">
    </head>

    <body id="bodyContact">

        <header id="headerContact">
           <div id="trapeze2">
               <div class="trapeze2Contenu">
                    <p id="contact">Contact</p>
                    <div>
                        <p>+33 6 78 08 94 77</p>
                    </div>
                    <div>
                        <p>amisdelamusique63@gmail.com</p>
                    </div>
               </div>
           </div>
        </header>


        <form action="" method="post" id="formContact">
            <p>Une question ?</p>
            <div class="ligne">
                <input type="text" classe="demi-ligne" placeholder="Nom *" required/>
                <input type="text" classe="demi-ligne" placeholder="Prénom *" required/>
            </div>
            
            <div class="ligne">
                <input type="email" placeholder="Email *" required/>
                <input type="tel" placeholder="Téléphone"/>
            </div>

            <input type="text" id="objet" placeholder="Objet de votre demande *" required/>
            <textarea id="message" placeholder="Message... *" rows="5" required></textarea>

            <div>
                <input type="checkbox"/>
                <label>En soumettant ce formulaire, j’accepte que les informations saisies soient exploitées par les Amis de la Musique *</label>
            </div>
            
            <input id="envoiContact" type="submit" value="Envoyer" />
            
        </form>
        
    </body>

</html>