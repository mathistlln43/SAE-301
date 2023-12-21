<!DOCTYPE html>
<html lang="fr">

<!-- Métadonnées de la page web -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author"
        content="TALLARON Mathis, COQBLIN Jeremy, SERRE Melodie, MANZONI Lucie, KERFRIDEN Theo, MMI2 TD2 TP3">
    <link href="css/style.css" rel="stylesheet">
    <title>Les Amis de la Musique</title>
</head>

<!-- Corps de la page web -->

<body>
    <?php require "header.php"; ?>

    <header>
        <img src="../images/theatre-le-puy.jpg">
        <div id="trapezeA">
            <div class="trapezeContenuA">
                <p id="eventA">Les Amis de la Musique vous présente :
                </p>
                <p>“En Accord”</p>
            </div>
        </div>
    </header>
    <section id="concerto">

        <div class="Rouge">


            <div class="cadre">
                <h1 id="titre1">Un concerto Musical à travers le </h1>
                <h1 id="titre1S">temps et les générations</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ratione nihil commodi! Excepturi
                    perferendis aliquid similique natus, veniam doloribus magnam voluptatum fugit quis praesentium unde
                    aperiam quasi nihil sequi perspiciatis!</p>
            </div>

            <div class=" imgHaut">
                <img src="../images/théâtreAncien.jpg" alt="puy">
            </div>
            <div class=" imgBas">
                <img src="../images/musiciens-amateurs.jpg" alt="puy">
            </div>
        </div>
    </section>

    <section id="concours">
        <div class="imgFF">
            <img src="../images/ensemble-619260_1280.jpg" alt="">
        </div>
        <div class="blocR1">
            <h1>Un concours pour les découvrir</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ratione nihil commodi! Excepturi
                perferendis aliquid similique natus, veniam doloribus magnam voluptatum fugit quis praesentium unde
                aperiam quasi nihil sequi perspiciatis!</p>
            <div class="imgBas2">
                <img src="../images/trompettiste.jpg" alt="">
            </div>
        </div>
    </section>

    <section id="stand">
        <div class="imgFF2">
            <img src="../images/Stand.jpg" alt="">
        </div>
        <div class="blocR2">
            <h1>Des stands pendant le week-ends</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis ratione nihil commodi! Excepturi
                perferendis aliquid similique natus, veniam doloribus magnam voluptatum fugit quis praesentium unde
                aperiam quasi nihil sequi perspiciatis!</p>
            <div class="imgHaut2">
                <img src="../images/orchestre2.jpg" alt="">
            </div>
        </div>
    </section>
    <?php require "footer.php"; ?>
</body>

</html>
