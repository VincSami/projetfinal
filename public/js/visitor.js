const memberButton = document.getElementById("memberButton");
const memberAccessForm = document.getElementById("memberAccess");
const cancelMemberAccess = document.getElementById("cancelMemberAccess");
const exitMember = document.getElementById("exitMember");
const subscribeMemberButton = document.getElementById("subscribeMember");
const memberSubscriptionForm = document.getElementById("memberSubscription");
const cancelMemberSubscriptionButton = document.getElementById("cancelMemberSubscription");

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

cancelMemberSubscriptionButton.addEventListener("click", function() {
	memberSubscriptionForm.style.display = "none";
	cancelMemberSubscriptionButton.style.display = "none";
	memberButton.style.display = "flex";
});

