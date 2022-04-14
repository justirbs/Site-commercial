<?php

    session_start();

?>

<div class="header">
    <div class="topnav">
        <img src="../img/kulkulkan.jpg" alt="logo" />
        <a href="../pages/accueil.php">Société Kukulkan</a>
        <a href="../pages/produit.php?cat=cigarettes">Cigarettes</a>
        <a href="../pages/produit.php?cat=gouts">Goûts</a>
        <a href="../pages/produit.php?cat=accessoires">Accessoires</a>
        <a href="../pages/contact.php">Contact</a>
        <?php

            if ($_SESSION['pseudo'] != "") {
                echo '<a href="../services/deconnexion.php" style="float:right" class="active">Déconnexion</a>';
            } else {
                echo '<a href="../pages/connexion.php" style="float:right" class="active">Connexion</a>';
            }

        ?>
    </div>
</div>