<div class="global_salesperson_dashboard">
  <div class="body_dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="images/logo/PPF-LOGO.jpg" alt="Logo">
            <span>Pentapolis Foundation</span>
        </div>
        <a href="/profile-Dashboard"><i class="fa-solid fa-user"></i> Profile</a>
        <a href="/task"><i class="fa-solid fa-list-check"></i> Task</a>
        <a href="/timesheet"><i class="fa-solid fa-hourglass-half"></i> Timesheet</a>
        <a href="/geolocation"><i class="fa-solid fa-map-location-dot"></i> Geo Tracking</a>
        <a href="/sales"><i class="fa-solid fa-pen-to-square"></i> Update Plan</a>
        <a href="/photos"><i class="fa-solid fa-images"></i> Upload Photo</a>
        <a href="/invoices"><i class="fa-solid fa-receipt"></i> Upload Invoice</a>
        <div class="sidebar-footer">
            <a href="/help-center"><i class="fa-solid fa-circle-question"></i> Help Center</a>
            <a href="/"><i class="fas fa-home"></i> Home</a>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar d-flex justify-content-between align-items-center">
        <div class="icons">
            <button class="searchformobile btn btn-light" onclick="toggleSearchBox()">
                <i class="fas fa-search" title="Search"></i>
            </button>
            <a href="https://pentapolisfoundation.com/webmail" target="_blank" class="btn btn-light"><i class="fas fa-envelope" title="Gmail"></i></a>
            <button class="btn btn-light" onclick="toggleNotificationBox()">
                <i class="fas fa-bell" title="Notification"></i>
            </button>
            <button class="btn btn-light" onclick="toggleCalendarBox()">
                <i class="fas fa-calendar-alt" title="Calendar"></i>
            </button>
        </div>
        <div class="hamburger" onclick="toggleSidebar()">☰</div>
        <!-- Search Box inside Navbar -->
        <div id="searchBox" class="search-box">
            <input type="text" placeholder="Search..." class="form-control">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="row mb-4">
    @php
        function getKpiClass($achieved, $target) {
            $percentage = $target > 0 ? ($achieved / $target) * 100 : 0;
            return $percentage >= 90 ? 'bg-gradient-success' : ($percentage >= 70 ? 'bg-gradient-warning' : 'bg-gradient-danger');
        }
    @endphp

    <div class="col-md-4 col-12">
        <div class="card text-white {{ getKpiClass($dashboardData['dashboard']['currentTarget']['agriculture'], 100) }}">
            <div class="card-body">
                <h5>Current Target</h5>
                <h3 class="number">{{ $dashboardData['dashboard']['currentTarget']['agriculture'] }}<span>+</span></h3>
                <p>Agriculture: {{ $dashboardData['dashboard']['currentTarget']['agriculture'] }}/100</p>
                
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12">
        <div class="card text-white {{ getKpiClass($dashboardData['dashboard']['previousTarget']['agriculture'], 100) }}">
            <div class="card-body">
                <h5>Previous Target</h5>
                <h3 class="number">{{ $dashboardData['dashboard']['previousTarget']['agriculture'] }}<span>+</span></h3>
                <p>Agriculture: {{ $dashboardData['dashboard']['previousTarget']['agriculture'] }}/100</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12">
        <div class="card text-white {{ getKpiClass($dashboardData['dashboard']['overallTarget']['agriculture'], 100) }}">
            <div class="card-body">
                <h5>Overall Target Achieved</h5>
                <h3 class="number">{{ $dashboardData['dashboard']['overallTarget']['agriculture'] }}<span>+</span></h3>
                <p>Agriculture: {{ $dashboardData['dashboard']['overallTarget']['agriculture'] }}/100</p>
            </div>
        </div>
    </div>
</div>

         <!-- Card section Ending-->

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Visit And Sales Statistics</h5>
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Student Enrolled</h5>
                        <div class="chart-container">
                            <canvas id="trafficChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Sector Engaged</h5>
                        <div class="chart-container">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Sales Funnel</h5>
                        <div class="chart-container">
                            <canvas id="funnelChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="progress-box">
            <h5>Student Program Completion</h5>
            <div class="progress">
                <div id="completionProgress" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
            <div id="progressText" class="progress-text">Target Completed: {{ $dashboardData['dashboard']['studentProgramCompletion']['completed'] }} / Total Target: {{ $dashboardData['dashboard']['studentProgramCompletion']['total'] }}</div>
        </div>

        <div class="progress-box">
            <h5>Invoice Submitted</h5>
            <div class="progress">
                <div id="completionProgres" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
            <div id="progressTex" class="progress-text">Target Completed: {{ $dashboardData['dashboard']['invoiceSubmission']['submitted'] }} / Total Target: {{ $dashboardData['dashboard']['invoiceSubmission']['total'] }}</div>
        </div>
    </div>

    <!-- Dark Mode Toggle -->
    <div class="dark-mode-toggle">
        <button class="btn btn-dark" onclick="toggleDarkMode()"><i class="fas fa-moon"></i> Dark Mode</button>
    </div>

    <!-- Notification Box -->
    <div id="notificationBox" class="notification-box" style="display: none">
        <div class="notification-header">
            <h5>Notifications</h5>
            <button class="btn btn-light" onclick="toggleNotificationBox()"><i class="fas fa-times"></i></button>
        </div>
        <div class="notification-list">
            <div class="notification-item">
                <i class="fas fa-bell"></i>
                <p>New task assigned: Complete the sales report.</p>
            </div>
            <div class="notification-item">
                <i class="fas fa-bell"></i>
                <p>Reminder: Meeting at 3 PM today.</p>
            </div>
        </div>
    </div>

    <!-- Calendar Box -->
    <div id="calendarBox" class="calendar-box" style="display: none">
        <div class="calendar-header">
            <h5>Calendar</h5>
            <button class="btn btn-light" onclick="toggleCalendarBox()"><i class="fas fa-times"></i></button>
        </div>
        <div class="calendar">
            <iframe src="https://calendar.google.com/calendar/embed?src=en.indian%23holiday%40group.v.calendar.google.com&ctz=Asia%2FKolkata" style="border: 0" width="100%" height="300" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>

  </div>
</div>

<script> 

// Function to toggle sidebar
function toggleSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.classList.toggle("show");
}

// Function to close sidebar on scroll
function closeSidebarOnScroll() {
  const sidebar = document.querySelector(".sidebar");
  if (sidebar.classList.contains("show")) {
    sidebar.classList.remove("show");
  }
}

// Add scroll event listener to close sidebar
window.addEventListener("scroll", closeSidebarOnScroll);

// Function to toggle calendar box
function toggleCalendarBox() {
  const calendarBox = document.getElementById("calendarBox");
  if (calendarBox.style.display === "none") {
    calendarBox.style.display = "block";
  } else {
    calendarBox.style.display = "none";
  }
}

// Function to toggle notification box
function toggleNotificationBox() {
  const notificationBox = document.getElementById("notificationBox");
  notificationBox.style.display =
    notificationBox.style.display === "none" ? "block" : "none";
}

// Function to toggle search box
function toggleSearchBox() {
  const searchBox = document.getElementById("searchBox");
  if (window.innerWidth <= 768) {
    searchBox.classList.toggle("active");
  } else {
    searchBox.style.display =
      searchBox.style.display === "none" ? "flex" : "none";
  }
}
</script>