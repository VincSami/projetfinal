const memberButton = document.getElementById("memberButton");
const memberAccessForm = document.getElementById("memberAccess");
const cancelMemberAccess = document.getElementById("cancelMemberAccess");
const exitMember = document.getElementById("exitMember");
const subscribeMemberButton = document.getElementById("subscribeMember");
const memberSubscriptionForm = document.getElementById("memberSubscription");
const cancelMemberSubscriptionButton = document.getElementById("cancelMemberSubscription");

memberButton.addEventListener("click", function() {
	memberButton.style.display = "none";
	memberAccessForm.style.display = "block";
	cancelMemberAccess.style.display = "block";
	subscribeMemberButton.style.display = "block";
});

cancelMemberAccess.addEventListener("click", function() {
	memberButton.style.display = "block";
	memberAccessForm.style.display = "none";
	cancelMemberAccess.style.display = "none";
	subscribeMemberButton.style.display = "none";
});

subscribeMemberButton.addEventListener("click", function() {
	subscribeMemberButton.style.display = "none";
	memberAccessForm.style.display = "none";
	cancelMemberAccess.style.display = "none";
	memberSubscriptionForm.style.display = "block";
	cancelMemberSubscriptionButton.style.display = "block";
});

cancelMemberSubscriptionButton.addEventListener("click", function() {
	memberSubscriptionForm.style.display = "none";
	cancelMemberSubscriptionButton.style.display = "none";
	memberButton.style.display = "block";
});

