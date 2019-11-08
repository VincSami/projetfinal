var selectAllWeddingplannersButton = document.getElementById("selectAllWeddingplanners");
var selectBohemeButton = document.getElementById("boheme");
var selectInsoliteButton = document.getElementById("insolite");
var selectPlageButton = document.getElementById("plage");
var selectLuxeButton = document.getElementById("luxe");
var selectIntimisteButton = document.getElementById("intimiste");
var selectMontagneButton = document.getElementById("montagne");
var elements = document.querySelectorAll(".weddingplanners");

selectInsoliteButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
    if(elements[i].dataset.specialty === "Mariage insolite"){
		elements[i].style.display="block";
    }
    else {
		elements[i].style.display="none";
    }
  }
});

selectBohemeButton.addEventListener("click", function (){
  for (var i = 0; i < elements.length; i++){
    if(elements[i].dataset.specialty === "Mariage bohème"){
		elements[i].style.display="block";
    }
    else {
		elements[i].style.display="none";
    }
  }
});

selectPlageButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.specialty === "Mariage de plage"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
  });

  selectLuxeButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.specialty === "Mariage haut de gamme"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});

selectIntimisteButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.specialty === "Mariage intimiste"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});

selectMontagneButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.specialty === "Mariage de montagne"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});
  

selectAllWeddingplannersButton.addEventListener("click", function (){
  for (var i = 0; i < elements.length; i++){
	elements[i].style.display="block";
	}
	selectInsoliteButton.checked = false;
	selectBohemeButton.checked = false;
	selectPlageButton.checked = false;
	selectLuxeButton.checked = false;
	selectIntimisteButton.checked = false;
	selectMontagneButton.checked = false;
});