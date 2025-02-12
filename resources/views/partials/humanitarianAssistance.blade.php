<div class="global_humanitarian">
<div class="solution-header animate_animated animate_fadeIn">
    <h1>Our Goals</h1>
</div>

<div class="container text-center my-5">
<h2 class="mb-4 animate__animated animate__fadeInDown">
            Humanitarian Assistance
        </h2>
    <div class="row g-4">
        @foreach ($humanitarianData['sections'] as $section)
            <div class="col-md-4">
                <div class="info-box animate_animated animate_zoomIn animate_delay-{{ $loop->index }}s">
                    <img src="{{ asset($section['image']) }}" alt="{{ $section['title'] }}" />
                    <h3>{{ $section['title'] }}</h3>
                    <p>{{ $section['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>