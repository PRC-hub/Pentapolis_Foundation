<div class="global_achievement_section">
<div class="achievement-section">
    <!-- Header -->
    <div class="achievement-header">
        <h2>Our Achievements</h2>
        <p>Here are some of our amazing achievements that drive our success!</p>
    </div>

    <!-- Achievement Cards -->
    <div class="container">
        <div class="row text-center">
            @foreach ($achievements as $achievement)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="achievement-card">
                        <i class="{{ $achievement['icon'] }}"></i>
                        <h3>{{ $achievement['title'] }}</h3>
                        <p>{{ $achievement['count'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Learn More Button -->
        <button class="learn-more-btn"><a href ="/blog">Blog</a></button>
    </div>
</div>
</div>
