// Initialize Charts
const salesChartCtx = document.getElementById("salesChart").getContext("2d");
new Chart(salesChartCtx, {
  type: "bar",
  data: {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG"],
    datasets: [
      {
        label: "Target",
        data: [12, 19, 3, 5, 2, 3, 7, 10],
        backgroundColor: "#6c5ce7",
      },
      {
        label: "Achieved",
        data: [2, 3, 20, 5, 1, 4, 9, 12],
        backgroundColor: "#74b9ff",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
    },
  },
});

const trafficChartCtx = document
  .getElementById("trafficChart")
  .getContext("2d");
new Chart(trafficChartCtx, {
  type: "doughnut",
  data: {
    labels: ["Student Enrolled", "Student not Enrolled"],
    datasets: [
      {
        data: [20, 80],
        backgroundColor: ["#74b9ff", "#55efc4"],
      },
    ],
  },
});

const pieChartCtx = document.getElementById("pieChart").getContext("2d");
new Chart(pieChartCtx, {
  type: "pie",
  data: {
    labels: ["Sector Engaged", "Sector not Engaged"],
    datasets: [
      {
        data: [40, 60],
        backgroundColor: ["#74b9ff", "#fd79a8"],
      },
    ],
  },
});

const funnelChartCtx = document.getElementById("funnelChart").getContext("2d");
new Chart(funnelChartCtx, {
  type: "bar",
  data: {
    labels: [
      "Prospecting",
      "Qualified",
      "Proposal",
      "Negotiation",
      "Closed Won",
      "Closed Lost",
    ],
    datasets: [
      {
        label: "Sales Funnel",
        data: [50, 30, 20, 10, 6, 5],
        backgroundColor: [
          "#00ff37bb",
          "#55efc4",
          "#fffb00b5",
          "#ff9d00f5",
          "#ff3e04be",
          "#ff0000",
        ],
      },
    ],
  },
  options: {
    responsive: true,
    indexAxis: "y",
    elements: {
      bar: {
        borderRadius: 10,
        borderSkipped: "bottom",
      },
    },
    scales: {
      x: {
        beginAtZero: true,
      },
    },
  },
});

// Function to animate numbers
function animateNumbers(id, start, end, duration) {
  const stepTime = Math.abs(Math.floor(duration / (end - start)));
  let current = start;
  const increment = end > start ? 1 : -1;
  const timer = setInterval(() => {
    current += increment;
    document.getElementById(id).textContent = current.toLocaleString() + "+";
    if (current === end) clearInterval(timer);
  }, stepTime);
}

// Animate the numbers in the cards
animateNumbers("weeklySales", 0, 65, 1000);
animateNumbers("weeklyOrders", 0, 160, 1000);
animateNumbers("visitorsOnline", 0, 250, 1000);

// Function to toggle dark mode
function toggleDarkMode() {
  document.body.classList.toggle("dark-mode");
  const darkModeButton = document.querySelector(".dark-mode-toggle button");
  if (document.body.classList.contains("dark-mode")) {
    darkModeButton.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
    Chart.defaults.color = "#ffffff";
  } else {
    darkModeButton.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
    Chart.defaults.color = "#000000";
  }
  // Update all charts to reflect dark mode changes
  Chart.helpers.each(Chart.instances, function (chart) {
    chart.options.plugins.legend.labels.color = Chart.defaults.color;
    chart.options.scales.x.ticks.color = Chart.defaults.color;
    chart.options.scales.y.ticks.color = Chart.defaults.color;
    chart.update();
  });
}

// Function to animate progress bars
function animateProgressBar(id, textId, start, end, total, duration) {
  let progressBar = document.getElementById(id);
  let progressText = document.getElementById(textId);
  let current = start;
  let increment = end > start ? 1 : -1;
  let stepTime = Math.abs(Math.floor(duration / (end - start)));
  let timer = setInterval(() => {
    current += increment;
    progressBar.style.width = current + "%";
    progressBar.setAttribute("aria-valuenow", current);
    progressBar.textContent = current + "%";
    if (current === end) clearInterval(timer);
  }, stepTime);
}

// Animate progress bars
animateProgressBar("completionProgress", "progressText", 0, 85, 100, 1500);
animateProgressBar("completionProgres", "progressTex", 0, 25, 100, 1500);














