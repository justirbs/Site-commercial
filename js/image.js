function zoomer(image){
    // on récupère le chemin de l'image
    chemin = image.getAttribute("src");
    // on ouvre une autre fenêtre
    var myWindow = window.open("zoom.php?src="+chemin); 
}