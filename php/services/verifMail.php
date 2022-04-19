<?php
// require 'class.phpmailer.php';
// require 'class.smtp.php';

// $mail = new PHPMailer();

// // Settings
// $mail->IsSMTP();
// $mail->CharSet = 'UTF-8';

// // Pour ce TP, nous avons créé notre propre serveur SMTP temporairement.
// $mail->Host       = "smtp.easyname.com";   // mon serveur SMTP
// $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
// $mail->SMTPAuth   = true;                  // activer l'authentification SMTP
// $mail->Port       = 465;                   // definir le port de connexion au serveur SMTP
// $mail->Username   = "143161mail3";         // l'username de mon serveur SMTP
// $mail->Password   = "r92sdpen5xq";         // le mot de passe de mon serveur SMTP

// $mail->SetFrom('kukulkan@justine-ribas.com');
// $mail->AddAddress('sylv.jalbert@gmail.com');


// // Content
// $mail->isHTML(true);                       // Définir le format de mail en HTML
// $mail->Subject = 'Demande de contact';
// $mail->Body    = 'Votre demande de contact à bien été envoyé à notre équipe de support.';

// $mail->send();

header('Location: ../php/pages/contact.php?mail=ok');

?>