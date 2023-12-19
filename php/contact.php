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
                    <p></p>
               </div>
           </div>
        </header>


        <form action="" method="post" id="formContact">
            <p>Une question ?</p>
            <div class="ligne">
                <input type="text" classe="demi-ligne" placeholder="Nom *"/>
                <input type="text" classe="demi-ligne" placeholder="Prénom *"/>
            </div>
            
            <div class="ligne">
                <input type="email" placeholder="Email *"/>
                <input type="tel" placeholder="Téléphone *"/>
            </div>

            <input type="text" id="objet" placeholder="Objet de votre demande *"/>
            <input type="textarea" id="message" placeholder="Message... *"/>

            <div>
                <input type="checkbox"/>
                <label>En soumettant ce formulaire, j’accepte que les informations saisies soient exploitées par les Amis de la Musique *</label>
            </div>
            
            <input class="envoiContact" type="submit" value="ENVOYER" />
            
        </form>
        
    </body>

</html>