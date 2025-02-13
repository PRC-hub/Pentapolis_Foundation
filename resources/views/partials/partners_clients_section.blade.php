<div class="global_partners_and_clients">
        <section class="features3" id="clients2-2p">
            <div class="container mb-4">
                <div class="media-container-row">
                    <div class="col-12 text-center">
                        <h2 class="mbr-section-title">{{ $partnerData['title'] ?? 'Our Partners' }}</h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="slider-container">
                    <div class="slider-track">
                        @foreach($partnerData['partners'] as $partner)
                            @if(isset($partner['image']) && isset($partner['alt']))
                                <div class="client-wrapper">
                                    <img src="{{ asset($partner['image']) }}" class="clients-img" alt="{{ $partner['alt'] }}" />
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ $partnerData['see_more_link'] ?? '#' }}" class="btn btn-custom">See All</a>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
  const track = document.querySelector(".slider-track");
  const slides = Array.from(track.children);

  // Duplicate slides for seamless loop
  slides.forEach((slide) => {
    let clone = slide.cloneNode(true);
    track.appendChild(clone);
  });

  // Set track width based on number of images to adjust smoothness
  const totalSlides = slides.length;
  const slideWidth = slides[0].getBoundingClientRect().width;
  track.style.width = `${totalSlides * slideWidth * 2}px`; // Multiply by 2 for cloned slides
});
</script>
