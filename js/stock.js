var tabStockCigarette = new Array(5, 5, 5, 5, 5);
var tabStockAccessoire = new Array(4, 5, 5, 5, 5);
var tabStockGout = new Array(3, 5, 5, 5, 5);

function afficherStocks(idTab){
    // on récupère le tableau des produits
    var tab = document.getElementById(idTab);
    // on récupère les lignes du tableau
    var lignes = tab.getElementsByTagName("tr");

    // on ajoute la colonne "stock"
    var nouvelleColonne = document.createElement("th");
    nouvelleColonne.innerHTML = "Stock";
    var colonnes = lignes[0].getElementsByTagName("th");
    lignes[0].insertBefore(nouvelleColonne, colonnes[colonnes.length - 2]);

    switch(idTab) {
        case "tabCigarette":
            var tabStock = tabStockCigarette;
            break;
        case "tabAccessoire":
            var tabStock = tabStockAccessoire;
            break;
        case "tabGout":
            var tabStock = tabStockGout;
            break;
        default:
            console.log("Erreur : idTab non reconnu");
            break;
    }

    // pour toutes les autres lignes on ajoute la valeur du stock
    for(var i = 1; i < lignes.length; i++){
        var colonnes = lignes[i].getElementsByTagName("td");
        var nouvelleColonne = document.createElement("td");
        nouvelleColonne.innerHTML = tabStock[i - 1];
        lignes[i].insertBefore(nouvelleColonne, colonnes[colonnes.length - 2]);
    }

    // on change les valeurs du bouton
    var bouton = document.getElementById("boutonStock");
    bouton.setAttribute("value", "Masquer les stocks");
    bouton.setAttribute("onclick", "masquerStock('" + idTab + "')");

}

function masquerStock(idTab){
    // on récupère le tableau des produits
    var tab = document.getElementById(idTab);
    // on récupère les lignes du tableau
    var lignes = tab.getElementsByTagName("tr");

    // on supprime la colonne "stock"
    var colonnes = lignes[0].getElementsByTagName("th");
    lignes[0].removeChild(colonnes[colonnes.length - 3]);

    // pour toutes les autres lignes on supprime la valeur du stock
    for(var i = 1; i < lignes.length; i++){
        var colonnes = lignes[i].getElementsByTagName("td");
        lignes[i].removeChild(colonnes[colonnes.length - 3]);
    }

    // on change les valeurs du bouton
    var bouton = document.getElementById("boutonStock");
    bouton.setAttribute("value", "Afficher les stocks");
    bouton.setAttribute("onclick", "afficherStocks('" + idTab + "')");

}

function augmenter(bouton){
    // on récupère le div contenant la quantité commandée
    var div = bouton.parentNode;
    // on récupère le nombre de produits commandés
    var quantite = div.getElementsByTagName("p")[0];
    // on récupère le tableau des stocks
    var tab = div.parentNode.parentNode.parentNode.parentNode;
    switch(tab.id) {
        case "tabCigarette":
            var tabStock = tabStockCigarette;
            break;
        case "tabAccessoire":
            var tabStock = tabStockAccessoire;
            break;
        case "tabGout":
            var tabStock = tabStockGout;
            break;
        default:
            console.log("Erreur : idTab non reconnu");
            break;
    }

    // on récupère lu numéro du produit
    var numero = parseInt(div.id.split("_")[1]);

    // on incrémente le nombre de produits commandés si le stock n'est pas épuisé
    if(quantite.innerHTML < tabStock[numero]){
        quantite.innerHTML = 1 + parseInt(quantite.innerHTML);
    }
}

function diminuer(bouton){
    // on récupère le div contenant la quantité commandée
    var div = bouton.parentNode;
    // on récupère le nombre de produits commandés
    var quantite = div.getElementsByTagName("p")[0];
    // on décrémente le nombre de produits commandés si le nombre de produits commandés est supérieur à 0
    if(quantite.innerHTML > 0){
        quantite.innerHTML = parseInt(quantite.innerHTML) - 1;
    }
}