// Handle visibility of payment method details
const paymentSelect = document.getElementById("payment");
const debitCardDetails = document.getElementById("debitCardDetails");
const upiDetails = document.getElementById("upiDetails");
const bankTransferDetails = document.getElementById("bankTransferDetails");

paymentSelect.addEventListener("change", function () {
  const paymentMethod = paymentSelect.value;

  // Hide all payment details by default
  debitCardDetails.style.display = "none";
  upiDetails.style.display = "none";
  bankTransferDetails.style.display = "none";

  // Show relevant details based on payment method
  if (paymentMethod === "debit_card" || paymentMethod === "credit_card") {
    debitCardDetails.style.display = "block";
  } else if (paymentMethod === "upi") {
    upiDetails.style.display = "block";
  } else if (paymentMethod === "bank_transfer") {
    bankTransferDetails.style.display = "block";
  }
});

// Form validation and submission handling
document
  .getElementById("donationForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const amount = document.getElementById("amount").value;

    if (!amount || isNaN(amount) || amount <= 0) {
      alert("Please enter a valid donation amount.");
      return;
    }

    // Show confirmation message
    // Show confirmation message
    const confirmationMessage = document.getElementById("confirmationMessage");
    confirmationMessage.style.display = "block";
    confirmationMessage.innerHTML = `Thank you, ${name}, for your generous donation of ₹${amount}.<br>A confirmation email will be sent to ${email}.`;

    // Reset the form
    document.getElementById("donationForm").reset();
    paymentSelect.value = "debit_card"; // Reset payment method
    debitCardDetails.style.display = "block"; // Reset payment details
  });