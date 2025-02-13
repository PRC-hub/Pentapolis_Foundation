<!-- resources/views/partials/footer.blade.php -->
<div class="global_footer">
<div class="footer_body">
    <!-- Particle Background -->

    <!-- Social Media Section -->
    <section class="footer-social">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start">
                    <h4>Connect with us on Social Networks:</h4>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="icon-spacing"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="icon-spacing"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="icon-spacing"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="icon-spacing"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Links Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-md-4 mb-4">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo/PPF-LOGO.jpg') }}" alt="Pentapolis Foundation">
                    </div>
                    <hr class="bg-warning mb-4" style="height: 2px;">
                    <p>
                        {{ $footerData['about'] ?? 'Pentapolis Foundation is dedicated to creating a better future through innovation and community support.' }}
                    </p>
                </div>

                <!-- Useful Links -->
                <div class="col-md-4 mb-4">
                    <h1 class="footer-links">Useful</h1>
                    <h2 class="footer-links"> Links</h2>
                    <hr class="bg-warning mb-4" style="height: 2px;">
                    <ul class="list-unstyled">
                        @foreach($footerData['links'] as $link)
                            <li><a href="{{ $link['url'] }}" class="text-white">{{ $link['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-4 mb-4">
                    <h1 class="footer-links">Contact</h1>
                    <h2 class="footer-links">know more...</h2>
                    <hr class="bg-warning mb-4" style="height: 2px;">
                    <p><i class="fas fa-home"></i> {{ $footerData['contact']['address'] }}</p>
                    <p><i class="fas fa-envelope"></i> {{ $footerData['contact']['email'] }}</p>
                    <p><i class="fas fa-phone"></i> {{ $footerData['contact']['phone'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Copyright Section -->
    <div class="footer-copyright text-center">
        <img src="{{ asset('images/footer/img1.png') }}" alt="Pentapolis Foundation" class="footer-logo-small" >
        <img src="{{ asset('images/footer/img2.png') }}" alt="Pentapolis Foundation" class="footer-logo-small" >
        <hr>
        <p class="mb-0 mt-3">
            <h6>© 2024 Copyright:</h6>
            <a href="https://www.pentapolisfoundation.com">
                <h6>www.pentapolisfoundation.com</h6>
            </a>
        </p>
    </div>


<!-- Scroll-to-Top Button -->
<button class="scroll-to-top" onclick="scrollToTop()"><i class="fas fa-arrow-up"></i></button>
</div>
</div>
<!-- Scripts -->
<script>
    // Scroll-to-Top Functionality
const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
};

// Show/Hide Scroll-to-Top Button
window.onscroll = () => {
  const scrollButton = document.querySelector(".scroll-to-top");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollButton.style.display = "block";
  } else {
    scrollButton.style.display = "none";
  }
};

// GSAP Animations
gsap.from(".footer-social h4", {
  opacity: 0,
  y: -50,
  duration: 1,
  scrollTrigger: {
    trigger: ".footer-social",
    start: "top 80%",
  },
});

gsap.from(".icon-spacing", {
  opacity: 0,
  x: -50,
  stagger: 0.2,
  duration: 1,
  scrollTrigger: {
    trigger: ".footer-social",
    start: "top 80%",
  },
});

// Particles.js Configuration
particlesJS.load("particles-js", "particles.json", function () {
  console.log("Particles.js loaded!");
});
</script>