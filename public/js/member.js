const addServicesButton = document.getElementById("addServicesButton");
const addServicesForm = document.getElementById("addServicesForm");
const cancelAddServicesButton = document.getElementById("cancelAddServicesButton");
addServicesForm.style.display = "none";
cancelAddServicesButton.style.display = "none";

addServicesButton.addEventListener("click", function(){
    addServicesButton.style.display = "none";
    addServicesForm.style.display = "block";
    cancelAddServicesButton.style.display = "block";
})

cancelAddServicesButton.addEventListener("click", function(){
    addServicesButton.style.display = "block";
    addServicesForm.style.display = "none";
    cancelAddServicesButton.style.display = "none";
})