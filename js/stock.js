var tabStockCigarette = new Array(50, 50, 50, 50, 50);
var tabStockAccessoire = new Array(40, 50, 50, 50, 50);
var tabStockGout = new Array(30, 50, 50, 50, 50);

function afficherStocks(idTab){
    // on récupère le tableau des produits
    var tab = document.getElementById(idTab);
    // on récupère les lignes du tableau
    var lignes = tab.getElementsByTagName("tr");

    // on ajoute la colonne "stock"
    var nouvelleColonne = document.createElement("th");
    nouvelleColonne.innerHTML = "Stock";
    var colonnes = lignes[0].getElementsByTagName("th");
    lignes[0].insertBefore(nouvelleColonne, colonnes[colonnes.length - 1]);

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
        lignes[i].insertBefore(nouvelleColonne, colonnes[colonnes.length - 1]);
    }
}