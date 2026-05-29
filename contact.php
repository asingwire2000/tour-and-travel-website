<?php include 'includes/header.php'; ?>
<?php
require __DIR__ . '/config/db.php';
$saved = false;
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);
  $subject = 'Website Contact';
  $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message, status) VALUES (?, ?, ?, ?, 'unread')");
  $stmt->execute([$name, $email, $subject, $message]);
  $saved = true;
}
?>
<div class="container my-4 my-md-5">
  <div class="row g-4">
    <div class="col-12 col-md-6">
      <h2>Contact Us</h2>
      <?php if ($saved): ?>
        <div class="alert alert-success">Thank you! Your message has been received.</div>
      <?php endif; ?>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
      </form>
    </div>
    <div class="col-12 col-md-6">
      <?php
      // Fetch contact page content from database
      $contactContent = null;
      try {
        $stmt = $pdo->prepare("SELECT content FROM pages WHERE slug = 'contact' LIMIT 1");
        $stmt->execute();
        $contactContent = $stmt->fetch();
      } catch (Exception $e) {}
      
      if ($contactContent && !empty($contactContent['content'])) {
        echo $contactContent['content'];
      } else {
        // Load contact/office settings from theme_settings
        $settings = [
          'office_address' => 'Kampala, Uganda',
          'office_map_query' => 'Kampala, Uganda',
          'contact_phone1' => '+256 123 456789',
          'contact_email' => 'info@aromasafaris.com'
        ];
        try {
          $stmt = $pdo->query("SELECT setting_key, setting_value FROM theme_settings WHERE setting_key IN ('office_address','office_map_query','contact_phone1','contact_email')");
          foreach ($stmt->fetchAll() as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
          }
        } catch (Exception $e) {}

        $mapQuery = urlencode($settings['office_map_query'] ?: $settings['office_address']);
        echo '<h2 class="mb-3">Our Location</h2>';
        echo '<p class="mb-3">' . nl2br(htmlspecialchars($settings['office_address'])) . '<br>Phone: ' . htmlspecialchars($settings['contact_phone1']) . '<br>Email: ' . htmlspecialchars($settings['contact_email']) . '</p>';
        echo '<div class="ratio ratio-16x9">';
        echo '<iframe src="https://www.google.com/maps?q=' . $mapQuery . '&output=embed" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
