var form = document.getElementById("creationHelper");
var phoneNumber = document.getElementById("phoneNumber");
var correctPhoneNumer = /^((\+)262|0)[1-9](\d{2}){4}$/;

form.addEventListener("submit", function(e){
if(correctPhoneNumer.test("phoneNumber")){
    return true;
}
else{
    e.preventDefault();
    alert("Le numéro de téléphone entré est invalide");
}
});