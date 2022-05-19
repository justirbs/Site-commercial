function ajouterPanier(bouton){
    // on récupère le div contenant la quantité commandée
    var div = bouton.parentNode;
    // on récupère le nombre de produits commandés
    var quantite = div.getElementsByTagName("p")[0].innerHTML;
    // on récupère le grand div contenant le produit
    var grandDiv = div.parentNode;
    // on récupère le div prix du produit
    var prix = grandDiv.getElementsByTagName("td")[grandDiv.children.length-2].innerHTML;
    // on ajoute le montant du produit au panier
    var montant = parseFloat(quantite) * parseFloat(prix);
    // on récupère la référence du produit
    var ref = grandDiv.getElementsByTagName("td")[1].innerHTML;
    // on récupère le stock
    var stockInit = div.children[0].id;
    // on calcul le nouveau stock
    var stock = stockInit - quantite;

    // requête avec Ajax
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("console").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "../services/ajouterPanier.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("montant="+montant+"&ref="+ref+"&stock="+stock);

    location.reload();
    
}