  <?php
  /*Fonction pour récupérer les identifiants dans le identifiant.csv*/
  function construireTabIdentifiants(){
    $row = 1;
    $tabIdentifiants = array(); // tableau contenant tous les identifiant et mot de passe
		// on ouvre le fichier
    if (($handle = fopen("../csv/identifiants.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";"))) {
            
            if($row != 0){

                $tabIdentifiants[$data[0]] = $data[1];
        
            }
            $row++;
        }
        fclose($handle);
    }
    return($tabIdentifiants);
  }


  $estCorrect = 0;
  $tabIdentifiants = construireTabIdentifiants();
	// on compare les valeurs entrées par l'utilisateurs à tous les identifiants et mots de passe
  foreach ($tabIdentifiants as $pseudo => $mdp) {
    if($pseudo == $_POST["pseudo"]  &&  $mdp == $_POST["mdp"]){
			// si il y a un identifiant et un mot de passe correspondnat, on valide la connexion
      $estCorrect = 1;
      
    }
  }

	// si la connexion est correcte, on redirige l'utilisateur vers sa page profil
  if($estCorrect == 1){
    session_start();
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['panier'] = 0;
    header('Location: ../index.php?connexion=ok');
  } else {
		// si la connexion n'est pas valide, on lui envoie un message d'erreur
    header('Location: connexion.php?LoginError=true');
  }

  ?>