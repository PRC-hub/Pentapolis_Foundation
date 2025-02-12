<div class="global_partners_and_clients">
<section class="features3 cid-qKT6knwV2G" id="clients2-2p">
    <div class="container mb-4">
        <div class="media-container-row">
            <div class="col-12 align-center">
                <h2 class="mbr-section-title text-center pb-2 mbr-fonts-style display-2">Our Partners</h2>
                <h3 class="mbr-section-subtitle mbr-light mbr-fonts-style display-7"></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slider-container">
            <div class="slider-track">
                @foreach ($partnerData as $partner)
                    <div class="client-wrapper">
                        <div class="wrap-img">
                            <img src="{{ $partner['src'] }}" class="img-responsive clients-img" alt="{{ $partner['alt'] }}" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
</div>
