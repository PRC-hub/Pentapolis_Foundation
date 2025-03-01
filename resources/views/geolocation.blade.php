@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Salesperson Live Tracking</h2>
    
    <input type="text" id="searchBar" placeholder="Search for a team member..." class="form-control mb-3">

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="salesTableBody"></tbody>
        </table>
    </div>

    <div id="map-container">
        <div id="locationMap" style="height: 500px;"></div>
    </div>
</div>

<!-- Add CSRF token for Axios requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Required Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.iife.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Initialize the Leaflet map
    const locationMap = L.map("locationMap").setView([20.5937, 78.9629], 5);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(locationMap);

    let markers = {};

    // Function to update the map with salesperson locations
    function updateMap(salespeople) {
        salespeople.forEach(sp => {
            const userId = sp.user.id;
            if (markers[userId]) {
                // Update existing marker position
                markers[userId].setLatLng([sp.latitude, sp.longitude]);
            } else {
                // Add new marker
                markers[userId] = L.circleMarker([sp.latitude, sp.longitude], {
                    radius: 8,
                    color: 'blue',
                    fillColor: 'blue',
                    fillOpacity: 0.8
                }).addTo(locationMap).bindPopup(`<b>${sp.user.name}</b>`);
            }
        });
    }

    // Function to fetch all salesperson locations
    function fetchLocations() {
        axios.get('/get-locations')
            .then(response => {
                updateMap(response.data);
                updateTable(response.data);
            })
            .catch(error => {
                console.error("Error fetching locations:", error.response?.data || error.message);
            });
    }

    // Function to update the salesperson's own location
    function updateOwnLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(position => {
                axios.post('/update-location', {
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).catch(error => {
                    console.error("Error updating location:", error.response?.data || error.message);
                });
            }, error => {
                console.error("Geolocation error:", error);
            }, { enableHighAccuracy: true });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    // Function to update the table with salesperson data
    function updateTable(salespeople) {
        let tbody = document.getElementById("salesTableBody");
        tbody.innerHTML = "";
        salespeople.forEach(sp => {
            tbody.innerHTML += `<tr>
                <td>${sp.user.name}</td>
                <td class="${sp.active ? 'text-success' : 'text-danger'}">
                    ${sp.active ? 'Active' : 'Inactive'}
                </td>
            </tr>`;
        });
    }

    // Debounced search function for filtering the table
    let searchTimeout;
    function searchTable() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const input = document.getElementById("searchBar").value.toLowerCase();
            axios.get('/get-locations')
                .then(response => {
                    let filtered = response.data.filter(sp => sp.user.name.toLowerCase().includes(input));
                    updateMap(filtered);
                    updateTable(filtered);
                })
                .catch(error => {
                    console.error("Error searching locations:", error.response?.data || error.message);
                });
        }, 300);
    }

    document.getElementById("searchBar").addEventListener("keyup", searchTable);

    // Initialize functions
    updateOwnLocation();
    fetchLocations();

    // Real-time updates using Pusher
    const pusher = new Pusher("1ccd89c9086aa7fb8793", { cluster: "ap2", forceTLS: true });
    const channel = pusher.subscribe("salesperson-location");
    channel.bind("location-updated", fetchLocations);
</script>
@endsection
