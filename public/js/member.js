var memberButton = document.getElementById("memberButton");
var memberAccessForm = document.getElementById("memberAccess");
var cancelMemberAccess = document.getElementById("cancelMemberAccess");
var exitMember = document.getElementById("exitMember");
var subscribeMemberButton = document.getElementById("subscribeMember");
var memberSubscriptionForm = document.getElementById("memberSubscription");
var cancelMemberSubscriptionButton = document.getElementById("cancelMemberSubscription");

memberButton.addEventListener("click", function() {
	memberButton.style.display = "none";
	memberAccessForm.style.display = "flex";
	cancelMemberAccess.style.display = "flex";
	subscribeMemberButton.style.display = "flex";
});

cancelMemberAccess.addEventListener("click", function() {
	memberButton.style.display = "flex";
	memberAccessForm.style.display = "none";
	cancelMemberAccess.style.display = "none";
	subscribeMemberButton.style.display = "none";
});

subscribeMemberButton.addEventListener("click", function() {
	subscribeMemberButton.style.display = "none";
	memberAccessForm.style.display = "none";
	cancelMemberAccess.style.display = "none";
	memberSubscriptionForm.style.display = "flex";
	cancelMemberSubscriptionButton.style.display = "flex";
});

cancelMemberSubscriptionButton.addEventListener("click", function(e) {
	e.preventDefault();
	memberSubscriptionForm.style.display = "none";
	cancelMemberSubscriptionButton.style.display = "none";
	memberButton.style.display = "flex";
});
