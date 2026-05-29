<?php include 'includes/header.php'; ?>
<?php
require __DIR__ . '/config/db.php';
$trips = $pdo->query("SELECT * FROM trips WHERE event_date >= CURDATE() ORDER BY event_date ASC")->fetchAll();
?>
<div class="container my-4 my-md-5">
  <h2 class="mb-4 text-center">Upcoming Trips & Prices</h2>
  <div id="aroma-trip-list" class="row g-4">
    <?php foreach($trips as $trip): ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 border-primary">
          <?php if($trip['image']): ?>
            <img src="assets/images/trips/<?= htmlspecialchars($trip['image']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($trip['title']) ?></h5>
            <p class="card-text mb-2"><b>Date:</b> <?= htmlspecialchars($trip['event_date']) ?></p>
            <?php if($trip['category']): ?><div><span class="badge bg-info mb-1"><?=htmlspecialchars($trip['category'])?></span></div><?php endif; ?>
            <p class="card-text"><?= htmlspecialchars($trip['details']) ?></p>
            <?php if($trip['location']): ?><p class="card-text mb-1"><b>Location:</b> <?= htmlspecialchars($trip['location']) ?></p><?php endif; ?>
            <?php if($trip['seats']): ?><p class="card-text mb-1"><b>Seats:</b> <?= htmlspecialchars($trip['seats']) ?></p><?php endif; ?>
            <?php if($trip['guide']): ?><p class="card-text mb-1"><b>Guide:</b> <?= htmlspecialchars($trip['guide']) ?></p><?php endif; ?>
            <span class="badge bg-success fs-6 aroma-price-usd" data-price-usd="<?= $trip['price_usd'] ?>">$<?= number_format($trip['price_usd'],2) ?> USD</span>
            <a href="booking.php?package=<?= urlencode($trip['title']) ?>" class="btn btn-primary w-100 mt-3 align-self-end">Book Now</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
