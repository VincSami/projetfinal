//Configuration Map Leaflet avec zoom sur la ville de Toulouse
var places = document.querySelectorAll("")

var mapLeaflet = {
    mymap: L.map('map').setView([-21.084507, 55.521082], 11),
    initialisation() {
                let marker = L.marker([place.positionx, place.positiony]);
                //Ajout d'un événement au clic sur un marqueur
                marker.on('click', onClick);
                //Ajoute un pop-up qui affiche le nom de la station lors du clic sur un marqueur
				marker.bindPopup(place.title);
    },
    //Configuration de la carte
    mapConfig() {
        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapLeaflet.mymap);
    }
}
mapLeaflet.mapConfig();
mapLeaflet.initialisation();

