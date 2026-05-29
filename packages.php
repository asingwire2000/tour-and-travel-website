<?php 
include 'includes/header.php';
require __DIR__ . '/config/db.php';

// Fetch packages from database
$packages = [];
try {
  $packages = $pdo->query("SELECT * FROM packages WHERE active = 1 ORDER BY display_order ASC, created_at DESC")->fetchAll();
} catch (Exception $e) {
  // Table doesn't exist yet, use default
}

// Default packages if database is empty
$defaultPackages = [
  ['name' => 'Game Drives in Uganda', 'description' => 'Experience the thrill of wildlife encounters, breathtaking landscapes, and guided tours across Uganda\'s renowned parks.', 'image' => 'assets/images/Game Drives in Uganda.jpg', 'features' => ['Customizable durations', 'All-ages friendly', 'Expert guides']],
  ['name' => 'Sipi Falls Adventure', 'description' => 'Journey to the stunning Sipi Falls for hiking, scenery, and vibrant local culture at the foothills of Mount Elgon.', 'image' => 'assets/images/Sipi Falls in Uganda.jpg', 'features' => ['Guided hikes', 'Photography tours', 'Community visits']],
  ['name' => 'Camping Safaris', 'description' => 'Spend your nights under the stars and embrace the wild side of Uganda with our well-equipped, safe camping tours.', 'image' => 'assets/images/camping.jpg', 'features' => ['All gear supplied', 'Experienced camp staff', 'Unique wilderness spots']]
];

// Use database packages if available, otherwise use defaults
$displayPackages = !empty($packages) ? $packages : $defaultPackages;

// Helper function to parse features
function parseFeatures($features) {
  if (empty($features)) return [];
  // Split by newline or comma
  $items = preg_split('/[\n\r,]+/', $features);
  return array_filter(array_map('trim', $items));
}
?>

<div class="container my-4 my-md-5">
  <h2 class="text-center mb-4">Safari Packages</h2>
  <div class="row g-4">
    <?php foreach($displayPackages as $pkg): 
      // Check if this is from database (has 'id' field) or default
      $isFromDb = isset($pkg['id']);
      
      $features = $isFromDb ? parseFeatures($pkg['features'] ?? '') : ($pkg['features'] ?? []);
      $name = $pkg['name'] ?? '';
      $description = $pkg['description'] ?? '';
      $image = $pkg['image'] ?? '';
      $price = $isFromDb ? ($pkg['price_from'] ?? null) : null;
      $duration = $isFromDb ? ($pkg['duration'] ?? '') : '';
      $category = $isFromDb ? ($pkg['category'] ?? '') : '';
      
      // Determine image path
      if ($isFromDb && $image) {
        $imgSrc = 'assets/images/packages/'.$image;
      } elseif ($isFromDb && !$image) {
        $imgSrc = 'assets/images/default-package.jpg';
      } else {
        $imgSrc = $image; // Default packages have full path
      }
    ?>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm">
        <img src="<?=htmlspecialchars($imgSrc)?>" class="card-img-top" style="height: 220px; object-fit: cover;" alt="<?=htmlspecialchars($name)?>">
        <div class="card-body d-flex flex-column">
          <?php if($category): ?>
          <span class="badge bg-info mb-2" style="width: fit-content;"><?=htmlspecialchars($category)?></span>
          <?php endif; ?>
          <h5 class="card-title"><?=htmlspecialchars($name)?></h5>
          <div class="card-text flex-grow-1"><?php
            $allowed = '<p><br><strong><em><u><ol><ul><li><h1><h2><h3><h4><h5><h6><blockquote><a><span><b><i>';
            echo strip_tags($description, $allowed);
          ?></div>
          <?php if($duration): ?>
          <p class="small text-muted mb-2"><i class="bi bi-clock me-1"></i><?=htmlspecialchars($duration)?></p>
          <?php endif; ?>
          <?php if($price): ?>
          <p class="mb-2"><strong class="text-primary aroma-price-usd" data-price-usd="<?= $price ?>">From $<?=number_format($price, 2)?> USD</strong></p>
          <?php endif; ?>
          <?php if(!empty($features)): ?>
          <ul class="mb-3">
            <?php foreach($features as $feature): ?>
            <li><?=htmlspecialchars($feature)?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <a href="booking.php?package=<?=urlencode($name)?>" class="btn btn-success w-100 mt-auto">Book Now</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  
  <?php if (empty($displayPackages)): ?>
  <div class="text-center py-5">
    <i class="bi bi-box fs-1 text-muted mb-3 d-block"></i>
    <p class="text-muted">No packages available at the moment. Please check back later.</p>
  </div>
  <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
