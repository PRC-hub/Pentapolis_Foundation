<div class="global_header">
  <nav class="navbar navbar-expand-lg py-3 py-lg-2 shadow nav-custom">
    <div class="container-fluid">
      <!-- Brand Logo -->
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset($header['header']['logo']['src']) }}" 
             alt="{{ $header['header']['logo']['alt'] }}" height="40" />
        <span class="ms-2 nv-logo-title">Pentapolis Foundation</span>
      </a>

      <!-- Hamburger Menu Button -->
      <button id="navbar-toggler" class="navbar-toggler border-0" aria-label="Toggle navigation">
        <span class="burger-menu">
          <i class="fas fa-bars" id="hamburger"></i>
          <i class="fas fa-times" id="close" style="display: none;"></i>
        </span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown d-lg-none">
              <a class="nav-link dropdown-toggle" href="#" id="mobileProfileDropdown"
                 role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i> Profile
              </a>
              <ul class="dropdown-menu" aria-labelledby="mobileProfileDropdown">
                <li>
                  <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user-circle"></i> Profile</a>
                </li>
                @if(auth()->user()->user_type === 'Employee')
                  <li>
                    <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
                  </li>
                @endif
              </ul>
            </li>
          @endauth

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
          
          @auth
            <li class="nav-item d-lg-none">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link btn btn-link"><i class="fa fa-sign-out-alt"></i> Logout</button>
              </form>
            </li>
          @endauth
        </ul>
      
        <!-- Desktop View Profile/Login -->
        <div class="d-none d-lg-flex align-items-center ms-lg-3">
          @auth
            <div class="dropdown profile-dropdown">
              <button class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center profile-btn"
                      type="button" id="profileDropdown">
                @if(auth()->user()->profile_picture)
                  <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                       alt="Profile Picture" class="rounded-circle" width="40" height="40">
                @else
                  <i class="fa fa-user"></i>
                @endif
              </button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-profile" aria-labelledby="profileDropdown">
                <li>
                  <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user-circle"></i> Profile</a>
                </li>
                @if(auth()->user()->user_type === 'Employee')
                  <li>
                    <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
                  </li>
                @endif
              </ul>
            </div>
          @else
            <a href="{{ route('login') }}" class="loginbtn nav-btn nav-btn-outline-primary me-2">
              <i class="fa fa-sign-in"></i> Login
            </a>
          @endauth
        </div>
      </div>
    </div>
  </nav>
</div>

<!-- Custom JavaScript -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // --- Mobile Hamburger Toggle ---
    var navbarNav     = document.getElementById("navbarNav");
    var navbarToggler = document.getElementById("navbar-toggler");
    var hamburger     = document.getElementById("hamburger");
    var closeIcon     = document.getElementById("close");

    // Initialize Bootstrap's Collapse manually
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

    // --- Initialize Bootstrap Dropdowns ---
    var dropdownElements = document.querySelectorAll('.dropdown-toggle');
    dropdownElements.forEach(function(dropdown) {
      new bootstrap.Dropdown(dropdown);
    });

    // --- Mobile Dropdown Toggling ---
    if (window.innerWidth < 992) {
      document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
        toggle.removeAttribute('data-bs-toggle');
      });

      document.addEventListener('click', function(e) {
        if (window.innerWidth < 992) {
          var toggleEl = e.target.closest('.dropdown-toggle');
          if (toggleEl) {
            e.preventDefault();
            e.stopPropagation();
            var dropdownMenu = toggleEl.parentElement.querySelector('.dropdown-menu');
            if (dropdownMenu) {
              dropdownMenu.classList.toggle('show');
            }
          } else {
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
              menu.classList.remove('show');
            });
          }
        }
      });
    }

    // --- Profile Dropdown Hover Effect ---
    var profileDropdown = document.querySelector(".profile-dropdown");
    var dropdownMenu = profileDropdown.querySelector(".dropdown-menu");

    profileDropdown.addEventListener("mouseenter", function () {
      dropdownMenu.classList.add("show");
    });

    profileDropdown.addEventListener("mouseleave", function () {
      dropdownMenu.classList.remove("show");
    });
  });
</script>
