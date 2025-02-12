<div class="global_privacy_policy">
<div class="privacy-container">
    <header>
        <h1>{{ $privacyPolicy['title'] }}</h1>
    </header>

    <section class="privacy-content">
        <!-- Introduction -->
        <h2>{{ $privacyPolicy['sections']['introduction']['heading'] }}</h2>
        <p>{{ $privacyPolicy['sections']['introduction']['content'] }}</p>

        <!-- Our Values -->
        <h2>{{ $privacyPolicy['sections']['ourValues']['heading'] }}</h2>
        <p>{{ $privacyPolicy['sections']['ourValues']['content'] }}</p>

        <!-- Why We Process Your Information -->
        <h2>{{ $privacyPolicy['sections']['whyProcess']['heading'] }}</h2>
        <p>{{ $privacyPolicy['sections']['whyProcess']['content'] }}</p>
        <ul>
            @foreach ($privacyPolicy['sections']['whyProcess']['points'] as $point)
                <li>{{ $point }}</li>
            @endforeach
        </ul>

        <!-- Your Rights Over Your Information -->
        <h2>{{ $privacyPolicy['sections']['yourRights']['heading'] }}</h2>
        <p>{{ $privacyPolicy['sections']['yourRights']['content'] }}</p>
        <ul>
            @foreach ($privacyPolicy['sections']['yourRights']['points'] as $point)
                <li>{{ $point }}</li>
            @endforeach
        </ul>

        <!-- Where We Need Your Information -->
        <h2>{{ $privacyPolicy['sections']['whereWeNeed']['heading'] }}</h2>
        <p>{{ $privacyPolicy['sections']['whereWeNeed']['content'] }}</p>
        <ul>
            @foreach ($privacyPolicy['sections']['whereWeNeed']['points'] as $point)
                <li>{{ $point }}</li>
            @endforeach
        </ul>

        <!-- How Long Do We Retain Your Information -->
        <h2>{{ $privacyPolicy['sections']['dataRetention']['heading'] }}</h2>
        <p>{{ $privacyPolicy['sections']['dataRetention']['content'] }}</p>

        <!-- Contact Information -->
        <h2>{{ $privacyPolicy['sections']['contact']['heading'] }}</h2>
        <p>
            {{ $privacyPolicy['sections']['contact']['content'] }}
            <a href="mailto:{{ $privacyPolicy['sections']['contact']['email'] }}">{{ $privacyPolicy['sections']['contact']['email'] }}</a>.
        </p>
    </section>

</div>
</div>
