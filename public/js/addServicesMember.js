var addServicesButton = document.getElementById("addServicesButton");
var addServicesForm = document.getElementById("addServicesForm");
var cancelAddServicesButton = document.getElementById("cancelAddServicesButton");
addServicesForm.style.display = "none";
cancelAddServicesButton.style.display = "none";

addServicesButton.addEventListener("click", function(){
    addServicesButton.style.display = "none";
    addServicesForm.style.display = "block";
    cancelAddServicesButton.style.display = "block";
})

cancelAddServicesButton.addEventListener("click", function(e){
    e.preventDefault();
    addServicesButton.style.display = "block";
    addServicesForm.style.display = "none";
    cancelAddServicesButton.style.display = "none";
})


