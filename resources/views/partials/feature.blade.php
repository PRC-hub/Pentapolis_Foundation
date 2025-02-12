<div class="global_feature_section">
<div id="{{ $featureSection['carousel']['id'] }}" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
    <div class="carousel-indicators">
        @foreach($featureSection['carousel']['indicators'] as $index => $indicator)
            <button 
                type="button" 
                data-bs-target="#{{ $featureSection['carousel']['id'] }}" 
                data-bs-slide-to="{{ $indicator['slideTo'] }}" 
                class="{{ $indicator['class'] ?? '' }}" 
                aria-label="{{ $indicator['ariaLabel'] }}" 
                @if(isset($indicator['class']) && $indicator['class'] === 'active') aria-current="true" @endif>
            </button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($featureSection['carousel']['slides'] as $index => $slide)
            <div class="carousel-item @if($index === 0) active @endif">
                <img src="{{ asset($slide['image']) }}" alt="{{ $slide['altText'] }}" class="d-block w-100" style="object-fit: cover; height: 500px;" />
                <div class="carousel-caption text-center">
                    <h1 class="animate__animated animate_slideInDown fs-1 fs-md-2 fs-sm-3">{{ $slide['caption']['title'] }}</h1>
                    <h3 class="animate__animated animate_zoomIn fs-6">{{ $slide['caption']['subtitle'] }}</h3>
                    <button class="{{ $slide['caption']['button']['classes'] }} mt-3" style="position: relative; overflow: hidden;">
                    <a href="{{ $slide['caption']['button']['link'] }}" style="text-decoration:none;color:white">
        {{ $slide['caption']['button']['text'] }}
    </a>
</button>

                </div>
            </div>
        @endforeach
    </div>
    <button 
        class="carousel-control-prev" 
        type="button" 
        data-bs-target="#{{ $featureSection['carousel']['id'] }}" 
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon d-none d-md-block" aria-hidden="true"></span>
        <span class="visually-hidden">{{ $featureSection['carousel']['controls']['prev']['label'] }}</span>
    </button>
    <button 
        class="carousel-control-next" 
        type="button" 
        data-bs-target="#{{ $featureSection['carousel']['id'] }}" 
        data-bs-slide="next">
        <span class="carousel-control-next-icon d-none d-md-block" aria-hidden="true"></span>
        <span class="visually-hidden">{{ $featureSection['carousel']['controls']['next']['label'] }}</span>
    </button>
</div>
</div>