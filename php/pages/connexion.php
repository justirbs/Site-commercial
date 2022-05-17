<html>

<head>
    <title>Kukulkan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="../../img/kulkulkan.jpg">
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../css/form.css"/>
</head>

<body style="background-color: #333;">
   
    <div style="text-align: center; margin: 30px;">

    <h1>Veuillez vous connecter :</h1>

        <form id="formulaire" method="post" action="../services/verificationConnexion.php" class="form">

            <div class="champForm"><p>Identifiant </p><input type="text" id="pseudo" name="pseudo"/></div>
            <div class="champForm"><p>Mot de passe </p><input type="password" id="mdp" name="mdp"/></div>
            <p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
        </form>

        <?php
        //s'affiche si l'utilistaeur s'est trompé lors de la saisie
        if(!empty($_GET)){
            echo("<p class='affichage'>Il y a une erreur dans l'identifiant et/ou dans le mot de passe</p>");
        }
        ?>

        <div class='affichage'>
            <a href="../../index.php">Retour à l'accueil</a>
        </div>
    
    </div>

</body>

</html>