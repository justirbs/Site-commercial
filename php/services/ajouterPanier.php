<?php

    session_start();

    if($_SESSION['pseudo'] == ""){
        header('Location: ../pages/connexion.php');
    } else {
        // on augmente la valeur du panier
        $_SESSION['panier'] += $_POST['montant'];

        echo($_POST["cat"]);

        // on change la valeur du stock dans la BDD
        // Connexion à la Base De Données
        $cnx = mysqli_connect('localhost','devWeb','mdpDevWeb0');
        if (mysqli_connect_errno($cnx)) {
            echo mysqli_connect_error();
        };
        $boolRes = mysqli_select_db($cnx, 'kulkulkan');
        if (!$boolRes) throw new Exception($base.' introuvable');

        // Requêtes à la Base De Données
        $req = 'UPDATE Produit
            SET stock = '.$_POST["stock"].'
            WHERE reference = '.$_POST["ref"];

        $result = mysqli_query($cnx,$req);
        
        // Déconnexion à la Base De Données
        mysqli_close($cnx);

    }

?>