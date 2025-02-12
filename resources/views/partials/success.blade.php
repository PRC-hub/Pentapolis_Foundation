<div class="global_success">
<div class="unique-success-container">
  <h1>Success Story</h1>
  <!-- Blog Section -->
  <div class="unique-blog-container">
    <h1 class="unique-blog-title">{{ $success['blog']['title'] }}</h1>
    <div class="unique-blog-content">
      @foreach($success['blog']['sections'] as $section)
        <h2>{{ $section['heading'] }}</h2>
        <p>{!! $section['content'] !!}</p>
      @endforeach
    </div>
  </div>

  <!-- Our Team Section -->
  <div class="unique-team-section">
    <div class="unique-team-header">
      {{ $success['team']['header'] }}
    </div>

    <!-- Flip Cards Section -->
    <div class="unique-row">
      @foreach($success['team']['members'] as $member)
        <div class="unique-col-md-4 d-flex justify-content-center">
          <div class="unique-flip-card">
            <div class="unique-flip-card-inner">
              <!-- Front Side -->
              <div class="unique-flip-card-front">
                <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}">
              </div>
              <!-- Back Side -->
              <div class="unique-flip-card-back">
                <h5>{{ $member['name'] }}</h5>
                <p>{{ $member['role'] }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
</div>
