<?php

    session_start();
    $_SESSION['pseudo'] = "";
    header('Location: ../index.php');

?>