<div class="global_signup_section">
    <div class="body_container">
        <div class="signup-container">
            <h2 class="text-center mb-4">{{ $signUpData['signup']['title'] }}</h2>
<form id="signup-form" method="POST" action="{{ route('register') }}">
    @csrf

    <!-- User Type Dropdown -->
    <div class="mb-2">
        <select class="form-control" name="user_type" id="user-type" required>
            <option value="">Select User Type</option>
            <option value="Admin">Admin</option>
            <option value="Student">Student</option>
            <option value="Employee">Employee</option>
            <option value="Trainer">Trainer</option>
            <option value="Customer">Customer</option>
        </select>
        <div class="error-message" id="user-type-error">Please select a user type.</div>
    </div>

    <!-- Email Input -->
    <div class="mb-2">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
        <div class="error-message" id="email-error">Please enter a valid email address.</div>
    </div>

    <!-- Create Password Input -->
    <div class="mb-2 password-wrapper">
        <input type="password" class="form-control" name="password" id="create-password" placeholder="Create password" required />
        <div class="suggest-password" id="suggest-password">Suggest a strong password</div>
        <div class="error-message" id="password-length-error">Password must be at least 6 characters long.</div>
    </div>

    <!-- Confirm Password Input -->
    <div class="mb-2 password-wrapper">
        <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Confirm password" required />
        <i class="bi bi-eye-slash toggle-password" data-target="confirm-password"></i>
        <div class="error-message" id="password-error">Passwords do not match.</div>
    </div>

    <!-- Terms and Conditions -->
    <div class="mb-2 form-check terms-conditions">
        <input type="checkbox" class="form-check-input" id="terms" name="terms" value="1" required />
        <label class="form-check-label" for="terms">
            I agree to the <a href="#">Terms and Conditions</a>
        </label>
        <div class="error-message" id="terms-error">You must agree to the terms and conditions.</div>

    </div>

    <!-- Send OTP Button -->
    <button type="button" class="btn btn-warning w-100 mb-2" id="send-otp" disabled>
        Send OTP
    </button>

    <!-- OTP Input Box -->
    <div class="mb-2 otp-box" id="otp-box" style="display: none;">
        <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" required />
        <div class="error-message" id="otp-error">Invalid OTP.</div>
        <div class="resend-otp" id="resend-otp">Resend OTP</div>
    </div>

    <!-- Signup Button -->
    <button type="submit" class="btn btn-warning w-100 mb-2" id="signup-button" disabled>
        Signup
    </button>

    <!-- Login Link -->
    <p class="text-center mb-0">
        Already have an account? <a href="{{ route('login') }}">Login</a>
    </p>
</form>

        </div>
    </div>
</div>

<script>
  
    // Toggle Password Visibility
document.querySelectorAll(".toggle-password").forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", function () {
    const targetInput = document.getElementById(
      this.getAttribute("data-target")
    );
    if (targetInput.type === "password") {
      targetInput.type = "text";
      this.classList.remove("bi-eye-slash");
      this.classList.add("bi-eye");
    } else {
      targetInput.type = "password";
      this.classList.remove("bi-eye");
      this.classList.add("bi-eye-slash");
    }
  });
});


// Get Elements
const userTypeSelect = document.getElementById("user-type");
const userTypeError = document.getElementById("user-type-error");
const emailInput = document.getElementById("email");
const emailError = document.getElementById("email-error");
const createPassword = document.getElementById("create-password");
const confirmPassword = document.getElementById("confirm-password");
const passwordError = document.getElementById("password-error");
const termsCheckbox = document.getElementById("terms");
const termsError = document.getElementById("terms-error");
const sendOtpButton = document.getElementById("send-otp");
const otpBox = document.getElementById("otp-box");
const signupButton = document.getElementById("signup-button");
const resendOtpLink = document.getElementById("resend-otp");
const otpInput = document.getElementById("otp");
const otpError = document.getElementById("otp-error");
const passwordLengthError = document.getElementById("password-length-error");

// Function to check form validity
function validateForm() {
  if (
    userTypeSelect.value !== "" &&
    emailInput.value !== "" &&
    emailError.classList.contains("visible") === false &&
    createPassword.value !== "" &&
    confirmPassword.value !== "" &&
    createPassword.value === confirmPassword.value &&
    termsCheckbox.checked
  ) {
    sendOtpButton.disabled = false;
  } else {
    sendOtpButton.disabled = true;
  }
}

// Validate User Type
userTypeSelect.addEventListener("change", () => {
  if (userTypeSelect.value === "") {
    userTypeError.classList.add("visible");
  } else {
    userTypeError.classList.remove("visible");
  }
  validateForm();
});

// Validate Email
emailInput.addEventListener("input", () => {
  const email = emailInput.value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    emailError.classList.add("visible");
  } else {
    emailError.classList.remove("visible");
  }
  validateForm();
});

// Validate Password Length
createPassword.addEventListener("input", () => {
  if (createPassword.value.length < 6) {
    passwordLengthError.classList.add("visible");
  } else {
    passwordLengthError.classList.remove("visible");
  }
  validateForm();
});

// Ensure Password Length Validation Before Submission
document.getElementById("signup-form").addEventListener("submit", function (e) {
  if (createPassword.value.length < 6) {
    passwordLengthError.classList.add("visible");
    e.preventDefault(); // Prevent form submission
  }
});


// Validate Passwords Match
confirmPassword.addEventListener("input", () => {
  if (createPassword.value !== confirmPassword.value) {
    passwordError.classList.add("visible");
  } else {
    passwordError.classList.remove("visible");
  }
  validateForm();
});

// Validate Terms and Conditions
termsCheckbox.addEventListener("change", () => {
  if (!termsCheckbox.checked) {
    termsError.classList.add("visible");
  } else {
    termsError.classList.remove("visible");
  }
  validateForm();
});

// Suggest a Strong Password
document.getElementById("suggest-password").addEventListener("click", () => {
  const strongPassword = generateStrongPassword();
  createPassword.value = strongPassword;
  confirmPassword.value = strongPassword;
  passwordError.classList.remove("visible");
  validateForm();
});

// Generate a Strong Password
function generateStrongPassword() {
  const chars =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()";
  let password = "";
  for (let i = 0; i < 12; i++) {
    password += chars.charAt(Math.floor(Math.random() * chars.length));
  }
  return password;
}

// Simulate Sending OTP
let generatedOtp = null;
let otpResendTimer = 30; // 30-second cooldown for resend OTP

sendOtpButton.addEventListener("click", function () {
  const email = document.getElementById("email").value;
  if (!email ) {
    alert("Please enter your email address.");
    return;
  }
  const createPassword = document.getElementById("create-password").value;
  if (!createPassword || createPassword.length < 6 ) {
    alert("The password must contain atleast 6 characters.");
    return;
  }

  // Simulate OTP Generation
  generatedOtp = Math.floor(100000 + Math.random() * 999999); // Generate a 6-digit OTP
  alert(`OTP sent to ${email}. Your OTP is ${generatedOtp}.`); // Simulate sending OTP
  otpBox.style.display = "block"; // Show OTP input box
  signupButton.disabled = false; // Enable signup button

  // Disable Resend OTP for 30 seconds
  resendOtpLink.classList.add("disabled");
  resendOtpLink.textContent = `Resend OTP (${otpResendTimer}s)`;
  const resendInterval = setInterval(() => {
    otpResendTimer--;
    resendOtpLink.textContent = `Resend OTP (${otpResendTimer}s)`;
    if (otpResendTimer <= 0) {
      clearInterval(resendInterval);
      resendOtpLink.classList.remove("disabled");
      resendOtpLink.textContent = "Resend OTP";
      otpResendTimer = 30; // Reset timer
    }
  }, 1000);
});



// Validate OTP and Submit Form
document.getElementById("signup-form").addEventListener("submit", function (e) {
  let hasErrors = false;

  // Validate User Type
  if (userTypeSelect.value === "") {
    userTypeError.classList.add("visible");
    hasErrors = true;
  } else {
    userTypeError.classList.remove("visible");
  }

  // Validate OTP
  const otp = otpInput.value;
  if (!otp || otp.length !== 6 || otp !== generatedOtp?.toString()) {
    otpError.classList.add("visible");
    hasErrors = true;
  } else {
    otpError.classList.remove("visible");
  }

  // Validate Passwords Match
  if (createPassword.value !== confirmPassword.value) {
    passwordError.classList.add("visible");
    hasErrors = true;
  } else {
    passwordError.classList.remove("visible");
  }

  // Validate Terms and Conditions
  if (!termsCheckbox.checked) {
    termsError.classList.add("visible");
    hasErrors = true;
  } else {
    termsError.classList.remove("visible");
  }

  // ** Fix: Allow form submission if there are no errors**
  if (hasErrors) {
    e.preventDefault(); // Stop submission only if validation fails
  }
});

</script>