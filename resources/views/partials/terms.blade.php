<div class="global_terms">
  <div class="terms_body">
    <div class="overlay" id="overlay"></div>

    <div class="popup" id="termsPopup">
      <button class="close-icon" id="closeIcon">&times;</button>
      <h1>{{ $termsData['terms']['title'] }}</h1>
      <p>{{ $termsData['terms']['welcome_message'] }}</p>

      @foreach ($termsData['terms']['sections'] as $section)
        <h2>{{ $section['title'] }}</h2>
        <p>{{ $section['content'] }}</p>
      @endforeach

      <div class="link-container">
        <a href="#" id="acceptLink">{{ $termsData['terms']['links']['accept'] }}</a>
      </div>
    </div>
  </div>
</div>

<script>
  const popup = document.getElementById("termsPopup");
  const overlay = document.getElementById("overlay");
  const closeIcon = document.getElementById("closeIcon");
  const acceptLink = document.getElementById("acceptLink");

  // Show the popup and overlay when the page loads
  window.addEventListener("load", () => {
    popup.classList.add("active");
    overlay.classList.add("active");
  });

  // Close the popup and redirect to the contact page
  closeIcon.addEventListener("click", () => {
    popup.classList.remove("active");
    overlay.classList.remove("active");
    window.location.href = "/contact"; // Redirect to contact page
  });

  // Accept the terms and set checkbox state
  acceptLink.addEventListener("click", (event) => {
    event.preventDefault();
    // Save checkbox state to localStorage
    localStorage.setItem("termsAccepted", "true");

    // Close popup and redirect to contact page
    popup.classList.remove("active");
    overlay.classList.remove("active");
    window.location.href = "/contact"; // Redirect to contact page
  });
</script>

