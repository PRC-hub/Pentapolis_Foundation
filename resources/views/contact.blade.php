@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
@include('partials.header', ['header' => $header])
@include('partials.contact_us')
@include('partials.footer', ['footerData' => $footerData])
  
@endsection

@push('scripts')

  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
  <script>
    // Fetch cities data from JSON
    fetch('/js/cities.json')
      .then(response => response.json())
      .then(data => {
        const map = L.map("map").setView([20.5937, 78.9629], 5); // Centered on India

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          maxZoom: 18,
          attribution: "© OpenStreetMap contributors",
        }).addTo(map);

        // Add markers to the map
        data.cities.forEach(city => {
          L.marker(city.coords)
            .addTo(map)
            .bindPopup(`<b>${city.name}</b>`)
            .openPopup();
        });
      });

    // Form submission handler
    document.getElementById("contactForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("{{ route('contact.submit') }}", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}",
          "Accept": "application/json"
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => alert(data.message))
      .catch(error => console.error("Error:", error));
    });
  </script>
@endpush
