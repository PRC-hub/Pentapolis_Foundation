<div class="global_goal_section">
<div class="goals-section">
    <!-- Goals Header -->
    <div class="goals-header">
        <h2>Goals Section</h2>
    </div>

    <!-- Goals Cards -->
    <div class="container goals-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($sections as $section)
                    <div class="goals-card animate__animated">
                        <!-- Icon Section -->
                        <div class="goals-icon">
                            <i class="{{ $section['icon'] }}"></i>
                        </div>
                        <!-- Title -->
                        <div class="goals-title">{{ $section['title'] }}</div>
                        <!-- Description -->
                        <p class="goals-description">{{ $section['description'] }}</p>
                        <!-- Read More Button -->
                        <a href="{{ $section['link'] }}" class="goals-read-more-btn">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

<!-- Include Bootstrap and Custom Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const goalCards = document.querySelectorAll(".goals-card");

    const checkGoalVisibility = () => {
        goalCards.forEach((card) => {
            const cardPosition = card.getBoundingClientRect();
            if (
                cardPosition.top >= 0 &&
                cardPosition.bottom <= window.innerHeight
            ) {
                card.classList.add("in-view");
            }
        });
    };

    window.addEventListener("scroll", checkGoalVisibility);
    checkGoalVisibility(); // Initial check to apply animation if already in view
</script>
