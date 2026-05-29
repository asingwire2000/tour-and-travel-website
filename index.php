<?php
/**
 * Aroma Safaris - Modernized Home Page
 * 
 * Modern UI refresh featuring:
 * - Enhanced hero with gradient overlays and animations
 * - Glass morphism design elements
 * - Improved spacing and typography
 * - Interactive elements with smooth transitions
 * - Modern color scheme with safari-inspired palette
 */

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/theme.php';
include __DIR__ . '/includes/header.php';

?>
<style>
:root {
  --brand-primary: #e67e22; /* Warm orange */
  --brand-secondary: #27ae60; /* Nature green */
  --brand-accent: #f39c12; /* Golden yellow */
  --brand-dark: #2c3e50; /* Dark blue-gray */
  --brand-light: #ecf0f1; /* Light gray */
  --gradient-primary: linear-gradient(135deg, #e67e22 0%, #d35400 100%);
  --gradient-secondary: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
  --gradient-hero: linear-gradient(135deg, rgba(44, 62, 80, 0.85) 0%, rgba(231, 126, 34, 0.75) 100%);
  --glass-bg: rgba(255, 255, 255, 0.1);
  --glass-border: rgba(255, 255, 255, 0.2);
  --shadow-soft: 0 8px 32px rgba(0, 0, 0, 0.1);
  --shadow-hover: 0 12px 40px rgba(231, 126, 34, 0.2);
  --border-radius: 16px;
}

/* Modern Reset & Base Styles */
* {
  box-sizing: border-box;
}

body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  line-height: 1.6;
  overflow-x: hidden;
}

/* Enhanced Hero Section */
.hero-section {
  position: relative;
  min-height: 90vh;
  background: linear-gradient(135deg, rgba(44, 62, 80, 0.9) 0%, rgba(231, 126, 34, 0.8) 100%),
              url('assets/images/safaris.jpg') center/cover;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  overflow: hidden;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.05"><path fill="white" d="M500,250c138.07,0,250,111.93,250,250S638.07,750,500,750S250,638.07,250,500S361.93,250,500,250z"/></svg>') center/contain;
  animation: float 20s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(180deg); }
}

.hero-content {
  position: relative;
  z-index: 2;
  text-align: center;
  max-width: 800px;
  padding: 2rem;
}

.hero-title {
  font-size: clamp(2.5rem, 5vw, 4rem);
  font-weight: 800;
  margin-bottom: 1.5rem;
  line-height: 1.1;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  animation: slideUp 1s ease-out;
}

.hero-subtitle {
  font-size: clamp(1.2rem, 2.5vw, 1.5rem);
  margin-bottom: 2.5rem;
  opacity: 0.95;
  animation: slideUp 1s ease-out 0.2s both;
}

.hero-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
  animation: slideUp 1s ease-out 0.4s both;
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Modern Button Styles */
.btn-modern {
  padding: 1rem 2rem;
  border: none;
  border-radius: 50px;
  font-weight: 600;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.btn-modern::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.5s;
}

.btn-modern:hover::before {
  left: 100%;
}

.btn-primary-modern {
  background: var(--gradient-primary);
  color: white;
  box-shadow: var(--shadow-soft);
}

.btn-primary-modern:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-hover);
  color: white;
}

.btn-secondary-modern {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid var(--glass-border);
  color: white;
}

.btn-secondary-modern:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: translateY(-2px);
  color: white;
}

/* Glass Morphism Cards */
.glass-card {
  background: var(--glass-bg);
  backdrop-filter: blur(10px);
  border: 1px solid var(--glass-border);
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-soft);
  transition: all 0.3s ease;
}

.glass-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-hover);
}

/* Stats Section Modernization */
.stats-section {
  background: var(--brand-light);
  padding: 4rem 0;
}

.stat-item {
  text-align: center;
  padding: 2rem 1rem;
}

.stat-icon {
  width: 80px;
  height: 80px;
  margin: 0 auto 1.5rem;
  background: var(--gradient-primary);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: white;
  box-shadow: var(--shadow-soft);
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 800;
  color: var(--brand-dark);
  margin-bottom: 0.5rem;
}

.stat-label {
  color: #7f8c8d;
  font-weight: 500;
}

/* Section Headers */
.section-header {
  text-align: center;
  margin-bottom: 3rem;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--brand-dark);
  margin-bottom: 1rem;
  position: relative;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 4px;
  background: var(--gradient-primary);
  border-radius: 2px;
}

.section-subtitle {
  font-size: 1.2rem;
  color: #7f8c8d;
  max-width: 600px;
  margin: 0 auto;
}

/* Modern Card Components */
.modern-card {
  border: none;
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-soft);
  overflow: hidden;
  transition: all 0.3s ease;
  height: 100%;
}

.modern-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-hover);
}

.card-image {
  height: 200px;
  object-fit: cover;
  width: 100%;
}

.card-body-modern {
  padding: 1.5rem;
}

.card-badge {
  background: var(--gradient-primary);
  color: white;
  padding: 0.25rem 0.75rem;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 600;
  display: inline-block;
  margin-bottom: 1rem;
}

/* CTA Section */
.cta-section {
  background: var(--gradient-primary);
  color: white;
  padding: 5rem 0;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" opacity="0.05"><polygon fill="white" points="500,250 750,750 250,750"/></svg>') center/contain;
  animation: rotate 30s linear infinite;
}

@keyframes rotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

.cta-content {
  position: relative;
  z-index: 2;
  max-width: 600px;
  margin: 0 auto;
}

.cta-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.cta-description {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  opacity: 0.9;
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-section {
    min-height: 80vh;
  }
  
  .hero-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .btn-modern {
    width: 100%;
    max-width: 300px;
    justify-content: center;
  }
  
  .section-title {
    font-size: 2rem;
  }
}

/* Loading Animation */
.fade-in {
  animation: fadeIn 0.8s ease-in;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

<?php
// Fetch data (existing code)
$videos = $upcomingEvents = $trendingNews = $featuredTrips = $homePackages = [];
$homeContent = '';

// Videos
try {
    $videos = $pdo->query("SELECT * FROM videos WHERE status = 'active' ORDER BY uploaded_at DESC LIMIT 3")->fetchAll();
} catch (Exception $e) {}

// Upcoming events
try {
    $upcomingEvents = $pdo->query("SELECT * FROM newsfeed WHERE category='Upcoming Event' AND (published_at IS NOT NULL OR scheduled_publish_date IS NOT NULL) ORDER BY COALESCE(scheduled_publish_date, published_at) ASC LIMIT 5")->fetchAll();
} catch (Exception $e) {}

// Trending news
try {
    $trendingNews = $pdo->query("SELECT * FROM newsfeed WHERE category IN ('Trending','News') AND published_at IS NOT NULL ORDER BY published_at DESC LIMIT 3")->fetchAll();
} catch (Exception $e) {}

// Featured trips
try {
    $featuredTrips = $pdo->query("SELECT * FROM trips WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 3")->fetchAll();
} catch (Exception $e) {}

// Home packages
try {
    $homePackages = $pdo->query("SELECT * FROM packages WHERE active=1 ORDER BY display_order ASC, created_at DESC LIMIT 6")->fetchAll();
} catch (Exception $e) {}

// Home content
try {
    $stmt = $pdo->prepare("SELECT content FROM pages WHERE slug='home' LIMIT 1");
    $stmt->execute();
    $homeContent = $stmt->fetchColumn();
} catch (Exception $e) {}
?>

<!-- Modern Hero Section -->
<section class="hero-section">
  <div class="hero-content">
    <h1 class="hero-title">Discover the Wild Beauty of Africa</h1>
    <p class="hero-subtitle">Experience unforgettable safari adventures with expert guides and luxury accommodations</p>
    <div class="hero-buttons">
      <a href="packages.php" class="btn-modern btn-primary-modern">
        <i class="bi bi-compass me-2"></i>Explore Packages
      </a>
      <a href="trips.php" class="btn-modern btn-secondary-modern">
        <i class="bi bi-calendar-check me-2"></i>View Trips
      </a>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
  <div class="container">
    <div class="row g-4">
      <?php
        try {
          $tripCount = $pdo->query("SELECT COUNT(*) FROM trips WHERE event_date >= CURDATE()")->fetchColumn();
          $bookingCount = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status='Confirmed'")->fetchColumn();
          $packageCount = $pdo->query("SELECT COUNT(*) FROM packages WHERE active=1")->fetchColumn();
        } catch (Exception $e) { 
          $tripCount = 12; 
          $bookingCount = 850; 
          $packageCount = 8;
        }
      ?>
      <div class="col-md-4">
        <div class="stat-item fade-in">
          <div class="stat-icon">
            <i class="bi bi-calendar-event"></i>
          </div>
          <div class="stat-number"><?= $tripCount ?></div>
          <div class="stat-label">Upcoming Trips</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-item fade-in">
          <div class="stat-icon">
            <i class="bi bi-people"></i>
          </div>
          <div class="stat-number"><?= $bookingCount ?>+</div>
          <div class="stat-label">Happy Travelers</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-item fade-in">
          <div class="stat-icon">
            <i class="bi bi-star-fill"></i>
          </div>
          <div class="stat-number">4.9</div>
          <div class="stat-label">Average Rating</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Introduction Section -->
<section class="container my-5 py-5">
  <div class="row align-items-center g-5">
    <div class="col-lg-6">
      <div class="glass-card p-4 p-md-5">
        <h2 class="section-title text-start">Why Choose Aroma Safaris?</h2>
        <p class="lead mb-4">With over a decade of experience, we provide authentic safari experiences that connect you with Africa's most breathtaking landscapes and wildlife.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-shield-check text-primary me-3 fs-4"></i>
              <span>Expert Guides</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-award text-primary me-3 fs-4"></i>
              <span>5-Star Rated</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-heart text-primary me-3 fs-4"></i>
              <span>Eco-Friendly</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-geo-alt text-primary me-3 fs-4"></i>
              <span>Multiple Parks</span>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <a href="about.php" class="btn-modern btn-primary-modern me-3">Our Story</a>
          <a href="contact.php" class="btn-modern btn-secondary-modern">Contact Us</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="position-relative">
        <img src="assets/images/lion.jpg" alt="Aroma Safaris Adventure" class="img-fluid rounded-3 shadow-lg modern-card">
        <div class="position-absolute bottom-0 start-0 m-4">
          <span class="card-badge">Featured Experience</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Packages -->
<?php if(!empty($homePackages)): ?>
<section class="bg-light py-5">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Popular Safari Packages</h2>
      <p class="section-subtitle">Curated experiences for every type of adventurer</p>
    </div>
    <div class="row g-4">
      <?php foreach($homePackages as $pkg): ?>
        <div class="col-md-6 col-lg-4 fade-in">
          <div class="modern-card">
            <?php if(!empty($pkg['image'])): ?>
              <img src="assets/images/packages/<?= htmlspecialchars($pkg['image']) ?>" class="card-image" alt="<?= htmlspecialchars($pkg['name']) ?>">
            <?php else: ?>
              <div class="card-image bg-gradient-primary d-flex align-items-center justify-content-center text-white">
                <i class="bi bi-camera fs-1"></i>
              </div>
            <?php endif; ?>
            <div class="card-body-modern">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <h5 class="card-title fw-bold"><?= htmlspecialchars($pkg['name']) ?></h5>
                <span class="text-primary fw-bold">$<?= number_format($pkg['price'] ?? 0) ?></span>
              </div>
              <p class="text-muted mb-3"><?= htmlspecialchars(mb_substr(strip_tags($pkg['description'] ?? ''), 0, 100)) ?>...</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                  <i class="bi bi-clock me-1"></i>
                  <?= $pkg['duration'] ?? 'Flexible' ?>
                </small>
                <a href="package-details.php?id=<?= $pkg['id'] ?>" class="btn btn-sm btn-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-5">
      <a href="packages.php" class="btn-modern btn-primary-modern">View All Packages</a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Upcoming Trips -->
<?php if(!empty($featuredTrips)): ?>
<section class="container my-5 py-5">
  <div class="section-header">
    <h2 class="section-title">Upcoming Adventures</h2>
    <p class="section-subtitle">Don't miss these exclusive safari experiences</p>
  </div>
  <div class="row g-4">
    <?php foreach($featuredTrips as $trip) include __DIR__.'/includes/components/trip-card.php'; ?>
  </div>
  <div class="text-center mt-4">
    <a href="trips.php" class="btn-modern btn-outline-primary">View All Trips</a>
  </div>
</section>
<?php endif; ?>

<!-- Video Gallery -->
<?php if(!empty($videos)): ?>
<section class="bg-dark text-white py-5">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title text-white">Safari Moments</h2>
      <p class="section-subtitle text-light">Experience the magic through our lens</p>
    </div>
    <div class="row g-4">
      <?php foreach($videos as $video) include __DIR__.'/includes/components/video-card.php'; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Latest News -->
<?php if(!empty($trendingNews)): ?>
<section class="container my-5 py-5">
  <div class="section-header">
    <h2 class="section-title">Latest Updates</h2>
    <p class="section-subtitle">News and insights from the wild</p>
  </div>
  <div class="row g-4">
    <?php foreach($trendingNews as $news) include __DIR__.'/includes/components/news-card.php'; ?>
  </div>
</section>
<?php endif; ?>

<!-- Final CTA -->
<section class="cta-section">
  <div class="cta-content">
    <h2 class="cta-title">Ready for Your Adventure?</h2>
    <p class="cta-description">Join thousands of travelers who have experienced the magic of Africa with us</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="booking.php" class="btn-modern btn-light">Book Your Trip</a>
      <a href="contact.php" class="btn-modern btn-secondary-modern">Get Custom Quote</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>