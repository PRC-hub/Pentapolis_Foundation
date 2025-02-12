<div class="global_donation_section">
<div class="hero-section" id="donation">
    <h1 data-aos="fade-up" data-aos-duration="1500">{{ $donationData['hero']['title'] }}</h1>
    

</div>

<div id="donation-section" class="container py-5 pt-0">
    <h2 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1500">Donate to Our Cause</h2>
    <div class="row g-4">
        @foreach ($donationData['donations'] as $item)
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                <div class="card donation-card">
                    <img src="{{ asset($item['image']) }}" class="card-img-top" alt="{{ $item['imageAlt'] }}" />
                    <div class="card-body">
                        <i class="{{ $item['icon'] }} fa-3x mb-3"></i>
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text">{{ $item['description'] }}</p>
                        <a href="{{ $item['buttonLink'] }}" class="btn btn-donate w-100">{{ $item['buttonText'] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>

