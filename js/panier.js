function ajouterPanier(bouton){
    // on récupère le div contenant la quantité commandée
    var div = bouton.parentNode;
    // on récupère le nombre de produits commandés
    var quantite = div.getElementsByTagName("p")[0].innerHTML;
    // on récupère le grand div contenant le produit
    var grandDiv = div.parentNode;
    // on récupère le div prix du produit
    var prix = grandDiv.getElementsByTagName("td")[3].innerHTML;
    // on ajoute le montant du produit au panier
    var montant = parseFloat(quantite) * parseFloat(prix);
    // on redirige vers la page ajouterPanier.php
    window.location.href = "../php/services/ajouterPanier.php?montant="+montant;
}