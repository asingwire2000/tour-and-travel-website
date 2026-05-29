<?php include 'includes/header.php'; ?> 
<!-- Includes the website's header file (common navigation, meta tags, etc.) -->

<?php
// Get the error code from the URL (e.g., ?code=404 or ?code=500)
// If no code is provided, default to 404
$code = isset($_GET['code']) ? (int)$_GET['code'] : 404;

// Set the page title and description based on the error code
$title = $code === 500 ? 'Something went wrong' : 'Page not found';
$desc = $code === 500
  ? 'An unexpected error occurred. Please try again or contact support.'
  : 'The page you are looking for doesn\'t exist or may have been moved.';
?>

<!-- ================== CUSTOM ERROR PAGE STYLES ================== -->
<style>
  /* Error page background and layout */
  .error-hero {
    position: relative;
    background: radial-gradient(1200px 600px at 50% -10%, rgba(255,166,0,.15), transparent),
                linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
    overflow: hidden;
  }

  /* Circular badge showing the error code (e.g., 404, 500) */
  .error-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: rgba(255,166,0,.12);
    color: #e36900;
    box-shadow: inset 0 0 0 2px rgba(255,166,0,.35);
    font-weight: 700;
  }

  /* Progress bar background */
  .error-progress {
    height: 6px;
    background: #e9ecef;
    border-radius: 999px;
    overflow: hidden;
  }

  /* Animated progress bar fill */
  .error-progress > div {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, #ffa600, #e36900);
  }
</style>

<!-- ================== ERROR PAGE CONTENT ================== -->
<section class="error-hero py-5 py-lg-6">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        
        <!-- Display error code inside styled badge -->
        <div class="mx-auto mb-4 error-badge display-6"><?=$code?></div>

        <!-- Error title (e.g., "Page not found" or "Something went wrong") -->
        <h1 class="fw-semibold mb-3"><?=$title?></h1>

        <!-- Description message -->
        <p class="text-muted mb-4" style="max-width: 700px; margin: 0 auto;">
          <?=htmlspecialchars($desc)?>
        </p>

        <!-- Progress bar for countdown -->
        <div class="error-progress my-4 mx-auto" style="max-width: 420px;">
          <div id="redirectProgress"></div>
        </div>

        <!-- Countdown text -->
        <p class="text-muted small mb-4">Redirecting to the homepage in <span id="redirectSeconds">6</span>s…</p>

        <!-- Button for manual redirect to homepage -->
        <div class="d-flex gap-2 justify-content-center">
          <a href="localhost/aromasafraris.com" class="btn btn-primary">
            <i class="bi bi-house me-1"></i> Go Home Now
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Hidden SVG placeholder (can be used for future shapes or effects) -->
  <svg width="0" height="0" style="position:absolute"></svg>

  <!-- ================== JAVASCRIPT REDIRECT LOGIC ================== -->
  <script>
    (function(){
      var total = 6; // total countdown seconds
      var left = total; // remaining seconds
      var secondsEl = document.getElementById('redirectSeconds'); // countdown text element
      var bar = document.getElementById('redirectProgress'); // progress bar element

      // Timer to update countdown and progress bar every second
      var tick = setInterval(function(){
        left -= 1;
        if (secondsEl) secondsEl.textContent = left; // update text
        var pct = Math.min(100, ((total - left) / total) * 100); // calculate percentage
        if (bar) bar.style.width = pct + '%'; // update progress width

        // When countdown reaches zero, stop timer and redirect to homepage
        if (left <= 0) {
          clearInterval(tick);
          window.location.href = 'index.php';
        }
      }, 1000);

      // Initialize progress bar at 0%
      if (bar) bar.style.width = '0%';
    })();
  </script>
</section>

<?php include 'includes/footer.php'; ?> 
<!-- Includes the website footer (common footer links, scripts, etc.) -->
