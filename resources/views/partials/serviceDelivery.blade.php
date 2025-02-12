<div class="global_serviceDelivery">
<div class="solution-header animate__animated animate__fadeIn">
        <h1>Our Goals</h1>
    </div>

    <div class="container text-center my-5">
        <h2 class="mb-4 animate__animated animate__fadeInDown">
            Service Delivery
        </h2>

        <div class="row g-4">
        @foreach ($sectionsData['sections'] as $index => $section)
                <div class="col-md-4">
                    <div class="info-box animate__animated animate__zoomIn animate__delay-{{ $index }}s">
                        <img src="{{ asset($section['image']) }}" alt="{{ $section['title'] }}" />
                        <h3>{{ $section['title'] }}</h3>
                        <p>{{ $section['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>