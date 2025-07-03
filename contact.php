<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kontak | MBC Laboratory</title>
  <link rel="stylesheet" href="css/contact.css">

  <!-- Include EmailJS SDK -->
  <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script type="text/javascript">
    (function(){
      emailjs.init("1zeFziOqw-9haRkkN"); // Ganti dengan Public Key EmailJS kamu
    })();
  </script>
</head>
<body>

<?php include 'includes/header.php'; ?>

<section class="features">
  <div class="container">
    <h1>Informasi Kontak</h1><br>
    <p><strong>Alamat:</strong> Jl. Teknologi No.88, Bandung</p>
    <p><strong>Email:</strong> contact@mbclab.com</p>
    <p><strong>Telepon:</strong> (022) 1234-5678</p>
    <div style="margin-top: 1rem;">
      <iframe src="https://maps.google.com/maps?q=Telkom+University+Bandung&z=15&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</section>

<section class="contact-form">
  <div class="container">
    <h1>Formulir Kontak</h1><br>
    <form id="contact-form">
      <label for="name">Nama:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Pesan:</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit" class="cta-button">Kirim Pesan</button>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
  // Mengambil data dari form
  document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    // Kirim data ke EmailJS
    emailjs.sendForm('service_81qw80q', 'template_y8uovjp', this)
      .then(function(response) {
        alert('Pesan berhasil dikirim!');
      }, function(error) {
        alert('Gagal mengirim pesan: ' + error);
      });
  });
</script>

</body>
</html>
