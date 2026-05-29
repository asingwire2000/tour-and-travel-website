<?php 
include 'includes/header.php';
require __DIR__ . '/config/db.php';

// Fetch page content from database
$pageContent = null;
try {
  $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = 'about' LIMIT 1");
  $stmt->execute();
  $pageContent = $stmt->fetch();
} catch (Exception $e) {
  // Table doesn't exist yet
}

// Default content if not in database
$defaultContent = '
<div class="row align-items-center g-4">
  <div class="col-12 col-md-6">
    <img src="assets/images/Lake Bunyonyi_ A Natural Wonder of the World_.jpg" class="img-fluid rounded shadow" alt="Aroma Safaris Camp">
  </div>
  <div class="col-12 col-md-6">
    <h2 class="mb-3">About Aroma Safaris</h2>
    <p>Aroma Safaris was founded out of a passion for Africa\'s natural beauty and adventure. Our team of expert guides and safari planners bring decades of collective experience, ensuring every journey is unique, memorable, and respectful of wildlife and local cultures.</p>
    <h4>Our Mission</h4>
    <p>To connect travelers with Africa\'s wild wonders through responsible, safe, and inspiring safaris tailored to all interests and abilities.</p>
    <h5 class="mt-4">Why Choose Us?</h5>
    <ul>
      <li>Personalized, expertly planned itineraries</li>
      <li>Local guides with deep knowledge</li>
      <li>Small group and private safari options</li>
      <li>Commitment to conservation and sustainability</li>
    </ul>
  </div>
</div>';

$pageTitle = $pageContent ? $pageContent['title'] : 'About Aroma Safaris';
$pageHTML = $pageContent && !empty($pageContent['content']) ? $pageContent['content'] : $defaultContent;
?>

<div class="container my-4 my-md-5">
  <?php echo $pageHTML; ?>
</div>

<?php include 'includes/footer.php'; ?>
