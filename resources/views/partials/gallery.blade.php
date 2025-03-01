<div class = "global_gallery">
<div class="follow-us" id="mainSection">
    <h2 class="fw-bold">Our Work & Program</h2>
    <div class="photo-gallery" id="photoGallery">
        @foreach ($images as $image)
            <img src="{{ asset($image)}}" alt="Gallery Image">
        @endforeach
    </div>
    <button class="load-more" id="loadMoreBtn"><a href="{{ route('gallery.loadMore') }}" style="text-decoration:none">Load More</a></button>
    
</div>
</div>
<script>
    document.getElementById('loadMoreBtn').addEventListener('click', function() {
        fetch("{{ route('gallery.loadMore') }}")
            .then(response => response.json())
            .then(data => {
                const gallery = document.getElementById('photoGallery');
                data.forEach(image => {
                    let img = document.createElement('img');
                    img.src = "{{ asset('') }}"+ image;
                    img.alt = "Gallery Image";
                    gallery.appendChild(img);
                });
            })
            .catch(error => console.log('Error:', error));
    });
</script>
