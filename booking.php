<?php include 'includes/header.php'; ?>
<?php
require __DIR__ . '/config/db.php';
$confirmed = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $package = trim($_POST['package']);
  $date = trim($_POST['date']);
  $people = (int)$_POST['people'];
  $requests = trim($_POST['requests']);
  $stmt = $pdo->prepare("INSERT INTO bookings (name, email, phone, package, travel_date, people, requests, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')");
  $stmt->execute([$name, $email, $phone, $package, $date, $people, $requests]);
  $confirmed = true;
}
$selected_package = isset($_GET['package']) ? htmlspecialchars($_GET['package']) : '';
?>
<div class="container my-4 my-md-5">
  <h2 class="text-center mb-4">Safari Booking</h2>
  <?php if ($confirmed): ?>
    <div class="alert alert-success mx-auto" style="max-width: 600px;">Thank you for your booking, <strong><?= htmlspecialchars($name) ?></strong>!<br>We have received your request for <strong><?= htmlspecialchars($package) ?></strong> on <strong><?= htmlspecialchars($date) ?></strong>.<br>We will contact you at <strong><?= htmlspecialchars($email) ?></strong> soon.</div>
  <?php else: ?>
    <form action="" method="POST" class="mx-auto px-2" style="max-width: 600px;">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>
      <div class="mb-3">
        <label for="package" class="form-label">Safari Package</label>
        <select name="package" id="package" class="form-select" required>
          <option value="">Select a package</option>
          <option value="Game Drives in Uganda" <?php if ($selected_package=="Game Drives in Uganda") echo 'selected'; ?>>Game Drives in Uganda</option>
          <option value="Sipi Falls Adventure" <?php if ($selected_package=="Sipi Falls Adventure") echo 'selected'; ?>>Sipi Falls Adventure</option>
          <option value="Camping Safaris" <?php if ($selected_package=="Camping Safaris") echo 'selected'; ?>>Camping Safaris</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Preferred Travel Date</label>
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
      <div class="mb-3">
        <label for="people" class="form-label">Number of People</label>
        <input type="number" class="form-control" id="people" name="people" min="1" max="20" value="1" required>
      </div>
      <div class="mb-3">
        <label for="requests" class="form-label">Special Requests</label>
        <textarea class="form-control" name="requests" id="requests" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-success w-100">Book Safari</button>
    </form>
  <?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>
