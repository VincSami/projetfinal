//Configuration Map Leaflet avec zoom sur la ville de Toulouse
var mapLeaflet = {
    mymap: L.map('map').setView([-21.084507, 55.521082], 11),
    initialisation() {
        //Appel de la fonction générique AJAX implantée au sein du fichier ajax.js
        ajaxGet("index.php?action=getPlacesCoords", function (response) {
            //Transforme les donnés au format JSON
            var placesCoords = JSON.parse(response);
            //Mise en place d'une boucle sur les données
            placesCoords.forEach(function (placeCoords) {
                //Configuration du positionnement des marqueurs selon les coordonnées des stations récupérées grâce à l'API JCDecaux
            let marker = L.marker([placeCoords.positionx, placeCoords.positiony]).addTo(mapLeaflet.mymap);
            marker.bindPopup(placeCoords.title);
            marker.on('click', onClick);
            function onClick(e) {
                document.getElementById("mapSide").style.display = 'block';
                document.getElementById("placeName").textContent = placeCoords.title;
                document.getElementById("placeImage").innerHTML = "<a href=\"index.php?action=place&amp;id="+placeCoords.id+"\"><img src=\"public/img/place"+placeCoords.id+"\".jpg\"></a>";
                document.getElementById("placePresentation").textContent = placeCoords.presentation;
            }
            });
        });
    },
    //Configuration de la carte
    mapConfig() {
        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapLeaflet.mymap);
    }
}

mapLeaflet.initialisation();
mapLeaflet.mapConfig();

document.getElementById("closeMapSide").addEventListener("click", function (e) {
    document.getElementById("mapSide").style.display = "none";
});