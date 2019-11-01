const memberButton = document.getElementById("memberButton");
const form = document.getElementById("memberAccess");
const cancelMemberAccess = document.getElementById("cancelMemberAccess");
const exitMember = document.getElementById("exitMember");


memberButton.addEventListener("click", function() {
	memberButton.style.display = "none";
	memberAccess.style.display = "block";
	cancelMemberAccess.style.display = "block";
});

cancelMemberAccess.addEventListener("click", function() {
	memberButton.style.display = "block";
	memberAccess.style.display = "none";
	cancelMemberAccess.style.display = "none";
});

form.addEventListener("submit", function() {
	memberButton.style.display = "none";
	memberAccess.style.display = "none";
	cancelMemberAccess.style.display = "none";
});

const subscribeMemberButton = document.getElementById("subscribeMember");
subscribeMemberButton.addEventListener("click", function(){
	document.getElementById("memberSubscription").style.display = "block";
});
