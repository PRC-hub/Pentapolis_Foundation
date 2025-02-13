<div class="global_partner_seeMore">
<div class="container">
    <h1 class="title">{{ $partnersSeeMoreData['title'] }}</h1>
    <div class="sector-grid">
        @foreach($partnersSeeMoreData['partners'] as $partner)
            <div class="sector">
                <img src="{{ asset($partner['image']) }}" alt="{{ $partner['alt'] }}">
                <a href="#"></a>
            </div>
        @endforeach
    </div>
</div>
</div>
<script>
    window.addEventListener('load', () => {
        document.getElementById('preloader')?.style.display = 'none';
    });
</script>

