// on récupère le chemin de l'image dans l'url
let params = (new URL(window.location)).searchParams;
let src = params.get("src");
console.log(src);
// on affiche l'image dans la nouvelle fenêtre
let div = document.getElementById("divImage");
let img = document.createElement("img");
img.setAttribute("src", src);
img.setAttribute("style", "height:800px");
div.appendChild(img);

function fermer(){
    // on ferme la fenêtre
    window.close();
}