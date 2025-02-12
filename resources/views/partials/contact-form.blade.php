<section class="contact-form">
  <h2>{{ $helpData['contact']['title'] }}</h2>
  <form action="#">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Your Message</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <button type="submit">Submit</button>
  </form>
</section>
