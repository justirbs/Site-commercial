  <?php
  // Connexion à la Base De Données
  $cnx = mysqli_connect('localhost','devWeb','mdpDevWeb0');
  if (mysqli_connect_errno($cnx)) {
      echo mysqli_connect_error();
  };
  $boolRes = mysqli_select_db($cnx, 'kulkulkan');
  if (!$boolRes) throw new Exception($base.' introuvable');

  // Requêtes à la Base De Données
  $req = 'SELECT pseudo, mdp FROM Client WHERE pseudo = "'.$_POST['pseudo'].'"';

  $result = mysqli_query($cnx,$req);
  
  $estCorrect = 0;
  // Récupération des données
  $data = mysqli_fetch_assoc($result);
  if ( $_POST["mdp"] == $data["mdp"] ) {
    $estCorrect = 1;
  }
  
  mysqli_free_result($data);

  // Déconnexion à la Base De Données
  mysqli_close($cnx);

  
	// si la connexion est correcte, on redirige l'utilisateur vers sa page profil
  if($estCorrect == 1){
    session_start();
    $_SESSION['pseudo'] = $_POST["pseudo"];
    $_SESSION['panier'] = 0;
    header('Location: ../../index.php?connexion=ok');
  } else {
		// si la connexion n'est pas valide, on lui envoie un message d'erreur
    header('Location: ../pages/connexion.php?LoginError=true');
  }

  ?>