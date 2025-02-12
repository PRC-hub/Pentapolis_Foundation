<div class="global_courses">
<section class="py-5">
    <div class="container shadow p-3 mb-5">
        <h2 class="text-center mb-4 text-dark">Our Featured Courses</h2>
        <div id="coursesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1800">
            <div class="carousel-inner">
                @foreach (collect($courses)->chunk(3) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach ($chunk as $course)
                                <div class="col-md-4">
                                    <div class="card text-center">
                                        @if (!empty($course['badge']))
                                            <span class="badge-{{ strtolower($course['badge']) }}">{{ $course['badge'] }}</span>
                                        @endif
                                        <div class="card-body">
                                            <img src="{{ asset($course['image']) }}" class="card-img-top" alt="{{ $course['title'] }}" />
                                            <h5 class="card-title">{{ $course['title'] }}</h5>
                                            <p class="card-text">{{ $course['description'] }}</p>
                                            <a href="{{ $course['buttonLink'] }}" class="btn btn-warning">{{ $course['buttonText'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="button-container">
            <button class="learn-more-btn">See More</button>
        </div>
    </div>
</section>
</div>
