<div class="global_contact_us_section">
  <div class="container contact-container">
    <div class="row">
      <!-- Form Column -->
      <div class="col-lg-6 col-md-12 form-column animate_animated animate_fadeInLeft">
        <h3>Contact Us</h3>
<form id="contactForm" method="POST" action="{{ url('/contact-us/submit') }}">
    @csrf  <!-- This generates a hidden CSRF token input field -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your Name" required />
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter a valid email address" required />
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Enter your Message" required></textarea>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" id="terms" class="form-check-input" name="terms" />
        <label for="terms" class="form-check-label">
            I accept the <a href="/terms-and-conditions" class="text-decoration-none">Terms of Service</a>
        </label>
    </div>
    <button type="submit" class="btn btn-warning w-100" id="submitBtn" disabled>SUBMIT</button>
</form>
</div>

      <!-- Details Column -->
      <div class="col-lg-6 col-md-12 details-column animate_animated animate_fadeInRight">
        <h5>CALL US</h5>
        <p>1 (234) 567-891</p>
        <p>1 (234) 987-654</p>

        <h5>LOCATION</h5>
        <p>121 Rock Street, 21 Avenue,</p>
        <p>New York, NY 92103-9000</p>

        <h5>OUR TOP SERVICES</h5>
        <p>Local Transfers</p>
        <p>Airport Transfers</p>
        <p>Excursions and Tours</p>

        <!-- Map -->
        <h5>INDIA MAP</h5>
        <div id="map"></div>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Map Initialization Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const termsCheckbox = document.getElementById("terms");
    const submitButton = document.getElementById("submitBtn");

    if (localStorage.getItem("termsAccepted") === "true") {
      termsCheckbox.checked = true;
      submitButton.disabled = false;
    }

    termsCheckbox.addEventListener("change", () => {
      submitButton.disabled = !termsCheckbox.checked;
    });

    document.getElementById("contactForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("{{ url('/contact-us/submit') }}", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        },
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        alert(data.message);
        document.getElementById("contactForm").reset();
        submitButton.disabled = true;
      })
      .catch(error => console.error("Error submitting the form:", error));
    });
  });
</script>

