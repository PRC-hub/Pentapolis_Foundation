<!-- Include Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Include AOS CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

<div class="aboutUs_section">

<section class="hero animate_animated animate_fadeIn" data-aos="fade-in" style="background-image: url('{{ $data['hero_section']['background_image'] }}');">
    <div class="container">
        <h1 class="display-30">{{ $data['hero_section']['title'] }}</h1>
        <p class="lead">{{ $data['hero_section']['subheading'] }}</p>
    </div>
</section>


<!-- About Us Section -->
<section id="about" class="py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h2 class="section-title text-center">{{ $data['about_section']['title'] }}</h2>
        <div class="row">
            <div class="col-lg-6 animate_animated animate_fadeInLeft" data-aos="fade-right">
                @foreach ($data['about_section']['text'] as $paragraph)
                    <p>{!! $paragraph['paragraph'] !!}</p>
                @endforeach
            </div>
            <div class="col-lg-6 animate_animated animate_fadeInRight" data-aos="fade-left">
                <img src="{{ $data['about_section']['image'] }}" class="img-fluid rounded" alt="About Us" />
            </div>
        </div>
    </div>
</section>

<!-- What We Do Section -->
<section class="bg-dark py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h2 class="section-title text-center">{{ $data['what_we_do_section']['title'] }}</h2>
        <p class="text-center text-white mb-4">{{ $data['what_we_do_section']['subheading'] }}</p>
        <p class="text-center text-white mb-4">Our core areas of focus include:</p>
        <div class="row text-white">
            @foreach ($data['what_we_do_section']['core_focus'] as $focus)
                <div class="col-md-6 mb-3">
                    <div class="feature-box">
                        <h5 class="font-weight-bold text-warning">{{ $focus['title'] }}</h5>
                        <p>{{ $focus['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-center text-white mt-4">{{ $data['what_we_do_section']['final_paragraph'] }}</p>
    </div>
</section>

<!-- How We Do It Section -->
<section class="py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h2 class="section-title text-center">{{ $data['how_we_do_it_section']['title'] }}</h2>
        @foreach ($data['how_we_do_it_section']['content'] as $paragraph)
            <p>{{ $paragraph['paragraph'] }}</p>
        @endforeach
    </div>
</section>

<!-- Meet The Team Section -->
<section class="bg-dark py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h2 class="section-title text-center">{{ $data['meet_the_team_section']['title'] }}</h2>
        <p>{{ $data['meet_the_team_section']['subheading'] }}</p>
        <div class="row text-center">
            @foreach ($data['meet_the_team_section']['team_members'] as $member)
                <div class="col-md-4" data-aos="fade-in" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="team-member">
                        <img src="{{ $member['image'] }}" alt="Team Member" />
                        <h5 class="mt-3">{{ $member['name'] }}</h5>
                        <p>{{ $member['position'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Where We Work Section -->
<section class="py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h2 class="section-title text-center">{{ $data['where_we_work_section']['title'] }}</h2>
        <p>{{ $data['where_we_work_section']['content'] }}</p>
    </div>
</section>

<!-- Map Section -->
<section class="py-5" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h2 class="section-title text-center">{{ $data['location_section']['title'] }}</h2>
        <div class="row">
            <div class="col-12">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $data['location_section']['map_iframe'] }}" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>

<script>
    AOS.init({
        offset: 200, // Trigger point
        duration: 1000, // Animation duration
        easing: "ease-out-back",
        delay: 100, // Delay before animation starts
        once: true, // Animation occurs only once
    });
</script>