 <div class="global_myTalent" id="my-talent-workforce">
 
 <!-- Header -->
    <header>
      <h1>{{ $config['title'] }}</h1>
    </header>

    <!-- Brief Description Section -->
    <section class="description-section">
      <h2>Brief Description</h2>
      <p>{{ $config['description'] }}</p>
    </section>

    <!-- Cards Section -->
    <section class="card-container">
      @foreach ($config['cards'] as $card)
      <div class="card" id="card{{ $card['id'] }}">
        <img
          src="{{ $card['image'] }}"
          alt="{{ $card['title'] }}"
          class="card-image"
        />
        <div class="card-content">
          <h3>{{ $card['title'] }}</h3>
          <p>{{ $card['description'] }}</p>
          <button class="MyButton" onclick="showInfo({{ $card['id'] }})">Read More</button>
        </div>
      </div>
      @endforeach
    </section>
    </div>

    <!-- JavaScript -->
    <script>
      function showInfo(cardNumber) {
        const cardInfo = @json(array_column($config['cards'], 'info'));
        alert(cardInfo[cardNumber - 1]);
      }
    </script>
