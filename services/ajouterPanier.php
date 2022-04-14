<?php

    session_start();

    if($_SESSION['pseudo'] == ""){
        header('Location: ../pages/connexion.php');
    } else {
        $_SESSION['panier'] += $_GET['montant'];
        header('Location: ../pages/accueil.php');
    }

?>