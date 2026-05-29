<?php 
include 'includes/header.php';
require __DIR__ . '/config/db.php';

// Fetch gallery images from database
$galleryImages = [];
try {
  $galleryImages = $pdo->query("SELECT * FROM gallery ORDER BY display_order ASC, created_at DESC")->fetchAll();
} catch (Exception $e) {
  // Table doesn't exist yet, show fallback images
  $galleryImages = [];
}

// Fallback images if database is empty
$fallbackImages = [
  ['src' => 'assets/images/1.jpg', 'alt' => 'Safari Image 1'],
  ['src' => 'assets/images/2.jpg', 'alt' => 'Safari Image 2'],
  ['src' => 'assets/images/3.jpg', 'alt' => 'Safari Image 3'],
  ['src' => 'assets/images/4.jpg', 'alt' => 'Safari Image 4'],
  ['src' => 'assets/images/5.jpg', 'alt' => 'Safari Image 5'],
  ['src' => 'assets/images/6.jpg', 'alt' => 'Safari Image 6'],
  ['src' => 'assets/images/lion.jpg', 'alt' => 'Lion'],
  ['src' => 'assets/images/tiger.jpg', 'alt' => 'Tiger']
];
?>

<div class="container my-4 my-md-5">
  <h2 class="text-center mb-4">Safari Gallery</h2>
  <div class="row g-2 g-md-3">
    <?php if (!empty($galleryImages)): ?>
      <?php foreach($galleryImages as $img): ?>
      <div class="col-6 col-md-4 col-lg-3">
        <div class="position-relative">
          <img src="assets/images/gallery/<?=htmlspecialchars($img['image'])?>" class="img-fluid rounded shadow-sm" alt="<?=htmlspecialchars($img['title'] ?? 'Gallery image')?>" style="width: 100%; height: 250px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal<?=$img['id']?>">
          <?php if($img['title']): ?>
            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom">
              <small><?=htmlspecialchars($img['title'])?></small>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Modal for image -->
      <div class="modal fade" id="galleryModal<?=$img['id']?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?=htmlspecialchars($img['title'] ?? 'Gallery Image')?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <img src="assets/images/gallery/<?=htmlspecialchars($img['image'])?>" class="img-fluid w-100" alt="<?=htmlspecialchars($img['title'] ?? 'Gallery image')?>">
              <?php if($img['description']): ?>
                <div class="p-3">
                  <p class="mb-0"><?=nl2br(htmlspecialchars($img['description']))?></p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <?php foreach($fallbackImages as $img): ?>
      <div class="col-6 col-md-4 col-lg-3">
        <img src="<?=$img['src']?>" class="img-fluid rounded shadow-sm" alt="<?=$img['alt']?>" style="width: 100%; height: 250px; object-fit: cover;">
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  
  <?php if (empty($galleryImages) && empty($fallbackImages)): ?>
  <div class="text-center py-5">
    <i class="bi bi-images fs-1 text-muted mb-3 d-block"></i>
    <p class="text-muted">No gallery images yet. Admin can upload images from the admin panel.</p>
  </div>
  <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
