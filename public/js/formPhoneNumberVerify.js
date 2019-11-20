var form = document.getElementsByClassName("creationForm");
var phoneNumber = document.getElementsByClassName("phoneNumber");
var correctPhoneNumer = /^((\+)262|0)[1-9](\d{2}){4}$/;

form[0].addEventListener("submit", function(e){
if(correctPhoneNumer.test("phoneNumber[0]")){
    return true;
}
else{
    e.preventDefault();
    alert("Le numéro de téléphone entré est invalide");
}
});