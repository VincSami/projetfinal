var selectAllHelpersButton = document.getElementById("selectAllHelpers");
var selectFleursButton = document.getElementById("fleurs");
var selectPhotosButton = document.getElementById("photos");
var selectVoitureButton = document.getElementById("voiture");
var selectRobeButton = document.getElementById("robe");
var selectCostumeButton = document.getElementById("costume");
var selectNourritureButton = document.getElementById("nourriture");
var selectDessertButton = document.getElementById("dessert");
var elements = document.querySelectorAll(".helpers");

console.log(elements[1].dataset.helper);

selectFleursButton.addEventListener("click", function (){
  for (var i = 0; i < elements.length; i++){
    if(elements[i].dataset.helper === "1"){
	  elements[i].style.display="block";
	}
    else {
      elements[i].style.display="none";
    }
  }
});

selectPhotosButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.helper === "2"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
  });

  selectVoitureButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.helper === "3"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});

selectRobeButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.helper === "4"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});
  
selectCostumeButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.helper === "5"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});

selectNourritureButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.helper === "6"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});

selectDessertButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  if(elements[i].dataset.helper === "7"){
		elements[i].style.display="block";
	  }
	  else {
		elements[i].style.display="none";
	  }
	}
});
  

selectAllHelpersButton.addEventListener("click", function (){
	for (var i = 0; i < elements.length; i++){
	  elements[i].style.display="block";
	}
	selectFleursButton.checked = false;
	selectPhotosButton.checked = false;
	selectVoitureButton.checked = false;
	selectRobeButton.checked = false;
	selectCostumeButton.checked = false;
	selectNourritureButton.checked = false;
	selectDessertButton.checked = false;
});