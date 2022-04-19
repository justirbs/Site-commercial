<?php

    session_start();

?>

<div class="header">
    <div class="topnav">
        <img src="../img/kulkulkan.jpg" alt="logo" />
        <a href="../php/pages/accueil.php">Société Kukulkan</a>
        <a href="../php/pages/produit.php?cat=cigarettes">Cigarettes</a>
        <a href="../php/pages/produit.php?cat=gouts">Goûts</a>
        <a href="../php/pages/produit.php?cat=accessoires">Accessoires</a>
        <a href="../php/pages/contact.php">Contact</a>
        <?php

            if ($_SESSION['pseudo'] != "") {
                echo '
                <a href="../php/services/deconnexion.php" style="float:right" class="active">Déconnexion</a>
                <a style="float:right" class="panier">Panier : '.$_SESSION['panier'].'€</a>
                ';
            } else {
                echo '<a href="../php/pages/connexion.php" style="float:right" class="active">Connexion</a>';
            }

        ?>
    </div>
</div>