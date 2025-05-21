<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Our Products – MAXFITNESS</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <?php include 'includes/nav.php'; ?>

  <header class="page-header">
    <h1>Our Products</h1>
    <p>Quality Gear, Stronger Results</p>
  </header>

  <main>
    <section class="products">
      <h2>Gym Equipment Guide</h2>
      <p class="section-description">
        Discover the most effective exercises and gear for each muscle group.
      </p>
      <div class="product-grid">
        <div class="product-card">
          <h3>Chest</h3>
          <p>Bench presses and chest fly with barbells, dumbbells, and machines.</p>
          <a href="order-chest.php" class="order-btn">Order Now</a>
        </div>
        <div class="product-card">
          <h3>Back</h3>
          <p>Lat pulldown and seated row for a strong back foundation.</p>
          <a href="order-back.php" class="order-btn">Order Now</a>
        </div>
        <div class="product-card">
          <h3>Shoulders</h3>
          <p>Presses and lateral raises using free weights and machines.</p>
          <a href="order-shoulders.php" class="order-btn">Order Now</a>
        </div>
        <div class="product-card">
          <h3>Arms</h3>
          <p>Bicep curls and tricep pushdowns for muscle definition.</p>
          <a href="order-arms.php" class="order-btn">Order Now</a>
        </div>
        <div class="product-card">
          <h3>Legs</h3>
          <p>Squats and leg presses using squat racks and machines.</p>
          <a href="order-legs.php" class="order-btn">Order Now</a>
        </div>
        <div class="product-card">
          <h3>Core</h3>
          <p>Crunches and cable woodchoppers for a strong midsection.</p>
          <a href="order-core.php" class="order-btn">Order Now</a>
        </div>
        <div class="product-card">
          <h3>Cardio</h3>
          <p>Treadmills, bikes, and rowing machines to boost endurance.</p>
          <a href="order-cardio.php" class="order-btn">Order Now</a>
        </div>
      </div>
    </section>
  </main>

  <?php include 'includes/footer.php'; ?>

</body>
</html>
