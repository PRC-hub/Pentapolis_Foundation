<div class="global_header">
  <nav class="navbar navbar-expand-lg py-3 py-lg-2 shadow nav-custom">
    <div class="container-fluid">
      <!-- Brand Logo -->
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset($header['header']['logo']['src']) }}" alt="{{ $header['header']['logo']['alt'] }}" height="40" />
        <span class="ms-2 nv-logo-title">Pentapolis Foundation</span>
      </a>

      <!-- Hamburger Menu Button (manual toggle) -->
      <button id="navbar-toggler" class="navbar-toggler border-0" aria-label="Toggle navigation">
        <span class="burger-menu">
          <i class="fas fa-bars" id="hamburger"></i>
          <i class="fas fa-times" id="close" style="display: none;"></i>
        </span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @foreach ($header['header']['navMenu'] as $menu)
            @if (isset($menu['dropdown']))
              <!-- Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="{{ Str::slug($menu['name']) }}Dropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="{{ $menu['icon'] }}"></i> {{ $menu['name'] }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="{{ Str::slug($menu['name']) }}Dropdown">
                  @foreach ($menu['dropdown'] as $subMenu)
                    <li>
                      <a class="dropdown-item" href="{{ $subMenu['url'] }}" aria-label="{{ $subMenu['name'] }}">
                        <i class="{{ $subMenu['icon'] }} me-2"></i> {{ $subMenu['name'] }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
            @else
              <!-- Regular Menu Item -->
              <li class="nav-item">
                <a class="nav-link" href="{{ $menu['url'] }}" aria-label="{{ $menu['name'] }}">
                  <i class="{{ $menu['icon'] }}"></i> {{ $menu['name'] }}
                </a>
              </li>
            @endif
          @endforeach
        </ul>

        <!-- Conditional Login/Profile Button -->
        @auth
          <div class="d-flex align-items-center ms-lg-3">
            <div class="dropdown">
              <button class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center profile-btn"
                      type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->user()->profile_picture)
                  <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                       alt="Profile Picture" class="rounded-circle" width="40" height="40">
                @else
                  <i class="fa fa-user"></i>
                @endif
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                  <a class="dropdown-item" href="/profile"><i class="fa fa-user-circle"></i> Profile</a>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fa fa-sign-out-alt"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        @else
          <div class="d-flex align-items-center ms-lg-3">
            <a href="/login" class="nav-btn nav-btn-outline-primary me-2"><i class="fa fa-sign-in"></i> Login</a>
          </div>
        @endauth
      </div>
    </div>
  </nav>
</div>

<!-- Custom JavaScript -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // --- Mobile Hamburger Toggle ---
    var navbarNav    = document.getElementById("navbarNav");
    var navbarToggler = document.getElementById("navbar-toggler");
    var hamburger     = document.getElementById("hamburger");
    var closeIcon     = document.getElementById("close");

    // Initialize Bootstrap's Collapse manually (disable auto-toggle)
    var bsCollapse = new bootstrap.Collapse(navbarNav, { toggle: false });

    navbarToggler.addEventListener('click', function() {
      bsCollapse.toggle();
    });

    // Swap icons based on collapse events
    navbarNav.addEventListener('shown.bs.collapse', function () {
      hamburger.style.display = "none";
      closeIcon.style.display = "block";
    });
    navbarNav.addEventListener('hidden.bs.collapse', function () {
      hamburger.style.display = "block";
      closeIcon.style.display = "none";
    });

    // --- For small screens, remove Bootstrap's dropdown toggle attribute ---
    // This prevents Bootstrap’s native dropdown handling from interfering.
    if (window.innerWidth < 992) {
      document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
        toggle.removeAttribute('data-bs-toggle');
      });
    }

    // --- Mobile Dropdown Toggling via Event Delegation ---
    document.addEventListener('click', function(e) {
      if (window.innerWidth < 992) {
        // Check if the click is on (or within) a dropdown toggle.
        var toggleEl = e.target.closest('.dropdown-toggle');
        if (toggleEl) {
          e.preventDefault();
          e.stopPropagation();
          var dropdownMenu = toggleEl.parentElement.querySelector('.dropdown-menu');
          if (dropdownMenu) {
            dropdownMenu.classList.toggle('show');
          }
        } else {
          // If the click is outside any dropdown, close all open dropdown menus.
          if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
              menu.classList.remove('show');
            });
          }
        }
      }
    });
  });
</script>