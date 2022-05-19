<html>

<head>
    <title> Kukulkan | Accessoires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="../../img/kulkulkan.jpg">
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
</head>

<body>

    <!-- le header de la page -->
    <?php include("../components/header.php"); ?>

    <!-- le corps de la page -->
    <div class="corps">

        <!-- le menu à gauche de la page -->
        <?php include("../components/menu.php"); ?>

        <!-- le contenu principal à droite de la page -->
        <div class="principal">
            <?php

            
            // Connexion à la Base De Données
            $cnx = mysqli_connect('localhost','devWeb','mdpDevWeb0');
            if (mysqli_connect_errno($cnx)) {
                echo mysqli_connect_error();
            };
            $boolRes = mysqli_select_db($cnx, 'kulkulkan');
            if (!$boolRes) throw new Exception($base.' introuvable');

            // Requêtes à la Base De Données
            $req = 'SELECT p.reference, p.img, p.descriptionProduit, p.prix, p.stock, c.nom as categorie 
                FROM Produit as p 
                INNER JOIN Categorie as c 
                WHERE p.idCategorie = c.idCategorie';
            $result = mysqli_query($cnx,$req);
            
            // Récupération des données
            $tabProduits = array();
            $row = 1;
            while ($data = mysqli_fetch_assoc($result)) {
                $tabProduits[$row] = array(
                    "cat" => $data['categorie'],
                    "ref" => $data['reference'],
                    "prix" => $data['prix'],
                    "description" => $data['descriptionProduit'],
                    "img" => $data['img'],
                    "stock" => $data['stock']
                );
                $row ++;
            }
            mysqli_free_result($data);

            echo('
            <table id="'.$_GET['cat'].'">
            <tr>
                <th>Photo</th>
                <th>Référence</th>
                <th>Description</th>
                <th>Prix(€)</th>
                <th>Commandes</th>
            </tr>
            ');
            foreach ($tabProduits as $indice => $produit) {
                if($produit['cat'] == $_GET['cat']){
                    echo('
                    <tr>
                        <td><img src='.$produit['img'].' onclick="zoomer(this)"/></td>
                        <td>'.$produit['ref'].'</td>
                        <td>'.$produit['description'].'</td>
                        <td>'.$produit['prix'].'</td>
                        <td>
                            <div class="divCommande" id="'.$produit["stock"].'">
                                <input type="button" class="button" value="-" onclick="diminuer(this)"> 
                                <p>0</p> 
                                <input type="button" class="button" value="+" onclick="augmenter(this)">
                            </div>
                            <input type="button" class="buttonPanier" value="Ajouter au panier" onclick="ajouterPanier(this)">
                        </td>
                    </tr>'
                    );
                }
            }

            
            // Déconnexion à la Base De Données
            mysqli_close($cnx);
            

            ?>
        
            
            </table>

            <div style="text-align:right; margin-top: 20px;" id="divBouton">
                <?php echo('
                <input type="button" class="button" id="boutonStock" value="Afficher les stocks" onclick="afficherStocks(\''.$_GET['cat'].'\')">
                '); ?>
            </div>

        </div>
    </div>

    <!-- le footer de la page -->
    <?php include("../components/footer.php"); ?>

</body>

<script type="text/javascript" src="../../js/stock.js"></script>
<script type="text/javascript" src="../../js/image.js"></script>
<script type="text/javascript" src="../../js/panier.js"></script>

</html>