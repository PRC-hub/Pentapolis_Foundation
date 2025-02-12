<div class="global_capacity_building_section">
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ $capacityBuildingData['title'] }}</h1>
    <p class="text-center">{{ $capacityBuildingData['description'] }}</p>

    <div class="row">
        @foreach ($capacityBuildingData['cards'] as $card)
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="{{ asset($card['image']) }}" alt="{{ $card['altText'] }}" />
                    <div class="blog-card-body">
                        <p class="text-muted mb-1">{{ $card['date'] }}</p>
                        <h5 class="blog-title">{{ $card['title'] }}</h5>
                        <p>{{ $card['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>