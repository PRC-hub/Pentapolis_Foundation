<div class="global_blog">
<div class="blog_body">
<div class="container mt-5">
      <header>
        <h1>BLOG</h1>
      </header>

      <div class="slider">
        <img src="images/blog/blog-banner.jpg" alt="Hot Cocoa" />
      </div>

      <div class="row">
        @foreach ($blogsData['blogs'] as $blog)
        <!-- Blog Card -->
        <div class="col-md-4">
          <div class="blog-card">
            <img src="{{ asset($blog['image']) }}" alt="Blog Image" />
            <div class="blog-card-body">
              <p class="text-muted mb-1">By {{ $blog['author'] }} | {{ $blog['date'] }}</p>
              <h5 class="blog-title">{{ $blog['title'] }}</h5>
              <p>{{ $blog['description'] }}</p>
              <div class="blog-footer">
                <span>{{ $blog['likes'] }} people like this</span>
                <span>{{ $blog['comments'] }} comments</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</div>
