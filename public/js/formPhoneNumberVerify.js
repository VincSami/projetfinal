var form = document.getElementsByClassName("creationForm");
var phoneNumber = document.getElementsByClassName("phoneNumber");
var regex = /^0[1-9](\d{2}){4}$/g;

console.log(phoneNumber[0].value);


form[0].addEventListener("submit", function(e){
if(regex.test(phoneNumber[0].value)){
    return true;
}
else{
    e.preventDefault();
    alert("Le numéro de téléphone entré est invalide");
}
});