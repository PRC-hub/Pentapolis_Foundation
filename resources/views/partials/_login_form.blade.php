<div class="global_login">
<div class="body_login">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row box-area shadow">
        <div class="col-md-6 left-box">
            <div class="featured-image">
                <img src="{{ asset('images/logo/PPF-LOGO.jpg') }}" alt="Logo" />
            </div>
        </div>
        <div class="col-md-6 right-box">
            <div class="text-center mb-3">
                <h2>Hello</h2>
                <p>We are happy to have you</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <input type="hidden" name="user_type" id="userType" value="{{ $activeType }}" />   
                <div class="btn-group mb-3 w-100" role="group">
                    @foreach(['Student', 'Employee', 'Customer', 'Admin', 'Trainer'] as $type)
                    
                        <button type="button" class="btn btn-outline-primary" data-type="{{ $type }}">
                            {{ $type }}
                        </button>
                    @endforeach
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email address" required />
                </div>
                <div class="mb-3 password-wrapper">
                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required />
                    <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <input type="checkbox" id="rememberMe" name="remember" />
                        <label for="rememberMe">Remember Me</label>
                    </div>
                    <div>
                        <a href="/forgetPassword" class="text-primary">Forgot Password?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                <div class="text-center mt-3">
                    <small>Don't have an account? <a href="/signUp">Sign Up</a></small>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Toggle password visibility
        document.getElementById("togglePassword").addEventListener("click", function () {
            const passwordInput = document.getElementById("password");
            const isPassword = passwordInput.type === "password";
            passwordInput.type = isPassword ? "text" : "password";
            this.classList.toggle("bi-eye-slash");
            this.classList.toggle("bi-eye");
        });

        // Button group click event
        document.querySelectorAll(".btn-group .btn").forEach((button) => {
            button.addEventListener("click", function () {
                document.querySelectorAll(".btn-group .btn").forEach((btn) => btn.classList.remove("active"));
                button.classList.add("active");
                // Update the hidden input with the selected user type
                document.getElementById("userType").value = button.getAttribute("data-type");
            });
        });

        // Form submit handler
        document.querySelector("form").addEventListener("submit", function (event) {
            event.preventDefault();

            let formData = new FormData(this);
            fetch(this.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message); // Show success message
                    window.location.href = data.redirect; // Redirect to dashboard or home page
                } else {
                    alert(data.message); // Show failure message
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred. Please try again later.");
            });
        });
    });
</script>


