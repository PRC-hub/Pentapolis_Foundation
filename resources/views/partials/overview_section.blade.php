<div class="global_overview_section">
<section id="about" class="about section-padding">
    <div class="overviewcontainer">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="about-img">
                    <img src="{{ asset($overviewData['image']) }}" alt="{{ $overviewData['imageAlt'] }}" class="img-fluid image-size" />
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                <div class="about-text text-center text-lg-start">
                    <h2>{{ $overviewData['title'] }}</h2>
                    <p>{{ $overviewData['description'] }}</p>
                    <a href="{{ $overviewData['buttonLink'] }}" class="btn btn-warning">{{ $overviewData['buttonText'] }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
