<?php

    session_start();

    if($_SESSION['pseudo'] == ""){
        header('Location: ../php/pages/connexion.php');
    } else {
        $_SESSION['panier'] += $_GET['montant'];
        header('Location: ../php/pages/accueil.php');
    }

?>