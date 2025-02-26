<div class="global_salesperson_locationPhotos">
    <div class="container mt-5">
    <div class="back-navigation">
        <a href="{{ route('dashboard') }}" class="back-button">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Upload Photos
        </a>
    </div>
        <h1 class="text-center mb-4">Upload Location Photos</h1>

        <!-- Upload Form -->
        <div class="mb-4">
            <input type="file" id="photoInput" class="form-control mb-2" accept="image/*">
            <textarea id="descriptionInput" class="form-control mb-2" placeholder="Enter description..."></textarea>
            <button id="uploadButton" class="btn btn-success w-100">Upload Photo</button>
        </div>

        <!-- Photo Gallery -->
        <div class="row" id="photoGallery">
            @foreach ($photos as $photo)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/location_photos/' . $photo->file_name) }}" class="card-img-top" alt="Uploaded Photo">
                        <div class="card-body">
                            <p class="card-text">{{ $photo->description ?? 'No description provided.' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById("uploadButton").addEventListener("click", () => {
            const photoInput = document.getElementById("photoInput");
            const descriptionInput = document.getElementById("descriptionInput");
            const gallery = document.getElementById("photoGallery");

            if (photoInput.files.length === 0) {
                alert("Please select a photo to upload.");
                return;
            }

            const file = photoInput.files[0];
            const formData = new FormData();
            formData.append("photo", file);
            formData.append("description", descriptionInput.value);
            formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

            fetch("{{ route('photos.upload') }}", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const newPhoto = document.createElement("div");
                    newPhoto.className = "col-md-4 mb-4";
                    newPhoto.innerHTML = `
                        <div class="card">
                            <img src="${data.photo_url}" class="card-img-top" alt="Uploaded Photo">
                            <div class="card-body">
                                <p class="card-text">${data.description || "No description provided."}</p>
                            </div>
                        </div>
                    `;

                    gallery.prepend(newPhoto);

                    // Clear inputs
                    photoInput.value = "";
                    descriptionInput.value = "";
                } else {
                    alert("Upload failed, please try again.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    </script>
