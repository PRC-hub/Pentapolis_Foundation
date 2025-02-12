<section class="faq">
  <h2>{{ $helpData['faq']['title'] }}</h2>
  @foreach ($helpData['faq']['items'] as $faq)
    <div class="faq-item">
      <h3>{{ $faq['question'] }}</h3>
      <p>{{ $faq['answer'] }}</p>
    </div>
  @endforeach
</section>
