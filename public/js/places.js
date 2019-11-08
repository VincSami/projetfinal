var selectAllPlacesButton = document.getElementById("selectAllPlaces");
var selectTopPlacesButton = document.getElementById("selectTopPlaces");
var selectPlacesNorthButton = document.getElementById("selectPlacesNorth");
var selectPlacesWestButton = document.getElementById("selectPlacesWest");
var selectPlacesSouthButton = document.getElementById("selectPlacesSouth");
var selectPlacesEastButton = document.getElementById("selectPlacesEast");
var elements = document.querySelectorAll(".places");

selectTopPlacesButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
    if(elements[i].dataset.ranked >= "5"){
      elements[i].style.display="block";
    }
    else {
      elements[i].style.display="none";
    }
  }
});

selectPlacesNorthButton.addEventListener("click", function (){
  for (var i = 0; i < elements.length; i++){
    if(elements[i].dataset.region === "Nord"){
      elements[i].style.display="block";
    }
    else {
      elements[i].style.display="none";
    }
  }
});

selectPlacesWestButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.region === "Ouest"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
  });

selectPlacesSouthButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.region === "Sud"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});

selectPlacesEastButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.region === "Est"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});
  

selectAllPlacesButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  elements[i].style.display="block";
	}
	selectPlacesNorthButton.checked = false;
	selectPlacesWestButton.checked = false;
	selectPlacesSouthButton.checked = false;
	selectPlacesEastButton.checked = false;
});
