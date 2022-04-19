<?php

    session_start();
    $_SESSION['pseudo'] = "";
    $_SESSION['panier'] = 0;
    header('Location: ../index.php');

?>