<html>

<head>
    <title> Kukulkan | Accessoires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="../img/kulkulkan.jpg">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
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

            switch($_GET['cat']){
                case "accessoires":
                    echo "<h2>Nos accesoires</h2>";
                    $id = "tabAccessoire";
                    break;
                case "cigarettes":
                    echo "<h2>Nos cigarettes</h2>";
                    $id = "tabCigarette";
                    break;
                case "gouts":
                    echo "<h2>Nos goûts</h2>";
                    $id = "tabGout";
                    break;
                default:
                    echo "<h2>Nos produits</h2>";
                    break;
            }

            ?>

            <?php

            /*Fonction pour récupérer les informations des produits dans le produits.csv*/
            function construireTabProduits(){
                $row = 1;
                $tabProduits = array(); // tableau contenant toute les infos des produits
                    // on ouvre le fichier
                if (($handle = fopen("../csv/produits.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ";"))) {
                        
                        if($row != 0 && $data[0] == $_GET['cat']){
                            
                            $tabProduits[$row-1] = array(
                                "cat" => $data[0],
                                "ref" => $data[2],
                                "prix" => $data[3],
                                "description" => $data[4],
                                "img" => $data[1]
                            );
                    
                        }
                        $row++;
                    }
                    fclose($handle);
                }
                return($tabProduits);
            }

            $tabProduits = construireTabProduits();

            echo('
            <table id="'.$id.'">
            <tr>
                <th>Photo</th>
                <th>Référence</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Commandes</th>
            </tr>
            ');
            foreach ($tabProduits as $indice => $produit) {
                echo('
                    <tr>
                        <td><img src='.$produit['img'].' onclick="zoomer(this)"/></td>
                        <td>'.$produit['ref'].'</td>
                        <td>'.$produit['description'].'</td>
                        <td>'.$produit['prix'].'</td>
                        <td>
                            <div class="divCommande" id="commande_0">
                                <input type="button" class="button" value="-" onclick="diminuer(this)"> 
                                <p>0</p> 
                                <input type="button" class="button" value="+" onclick="augmenter(this)">
                            </div>
                            <input type="button" class="buttonPanier" value="Ajouter au panier" onclick="">
                        </td>
                    </tr>'
                    );
            }

            ?>
        
            
            </table>

            <div style="text-align:right; margin-top: 20px;" id="divBouton">
                <input type="button" class="button" id="boutonStock" value="Afficher les stocks" onclick="afficherStocks('tabAccessoire')">
            </div>

        </div>
    </div>

    <!-- le footer de la page -->
    <?php include("../components/footer.php"); ?>

</body>

<script type="text/javascript" src="../js/stock.js"></script>
<script type="text/javascript" src="../js/image.js"></script>

</html>