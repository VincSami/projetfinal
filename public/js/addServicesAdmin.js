const addServicesButtonAdmin = document.getElementById("addServicesButtonAdmin");
const addServicesFormAdmin = document.getElementById("addServicesFormAdmin");
const cancelAddServicesAdminButton = document.getElementById("cancelAddServicesAdminButton");
addServicesFormAdmin.style.display = "none";

addServicesButtonAdmin.addEventListener("click", function(){
    addServicesButtonAdmin.style.display = "none";
    addServicesFormAdmin.style.display = "block";
})

cancelAddServicesAdminButton.addEventListener("click", function(e){
    e.preventDefault();
    addServicesButtonAdmin.style.display = "block";
    addServicesFormAdmin.style.display = "none";
})