<div class="global_galleryLoadmore">
    <h1>Chronical of Pentapolis Foundation</h1>
    <h3 id="toggleButton">Click me to go to Instagram post</h3>

    <div class="grid-container">
    @foreach($images as $image)
        <div>
            <img src="{{ $image['src'] }}" alt="Gallery Image">
            <p>{{ $image['caption'] }}</p>
        </div>
    @endforeach
</div>

    <div class="instagram-profile" id="instagramProfile" style="display: none; opacity: 0;">
        <img src="https://via.placeholder.com/150" alt="Profile Picture">
        <p>Instagram Profile</p>
        <p>Followers: 1M | Following: 500</p>
        <p>Posts: 100</p>
    </div>
</div>
    <script>
        const toggleButton = document.getElementById('toggleButton');
        const gridContainer = document.querySelector('.grid-container');
        const instagramProfile = document.getElementById('instagramProfile');

        toggleButton.addEventListener('click', () => {
            if (gridContainer.style.display !== 'none') {
                gridContainer.style.opacity = '0';
                setTimeout(() => {
                    gridContainer.style.display = 'none';
                    instagramProfile.style.display = 'block';
                    setTimeout(() => {
                        instagramProfile.style.opacity = '1';
                    }, 50);
                }, 500);
                toggleButton.textContent = 'Click me to go to gallery';
            } else {
                instagramProfile.style.opacity = '0';
                setTimeout(() => {
                    instagramProfile.style.display = 'none';
                    gridContainer.style.display = 'block';
                    setTimeout(() => {
                        gridContainer.style.opacity = '1';
                    }, 50);
                }, 500);
                toggleButton.textContent = 'Click me to go to Instagram post';
            }
        });
    </script>
