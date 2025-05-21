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
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <?php include 'includes/nav.php'; ?>
  <header class="home-page-header">
    <h1>MAXFITNESS</h1>
    <p>Quality Gear, Stronger Results.</p>
    <div>
      <a href="products.php" class="hp-main-button">Shop Now</a>
      <a href="login.php" class="hp-sec-button">Login</a>
    </div>
  </header>
  
  <!-- Exclusive Homepage Deal -->
  <section class="exclusive-deal">
    <h2>Ready to Start Your Fitness Journey?</h2>
    <p>Join our community today and take the first step towards a healthier, stronger you.</p>
    <a href="login.php" class="cta-button">Join Now</a>
  </section>

  <!-- Client Testimonials -->
  <section class="testimonials">
    <h2>What Our Members Say</h2>
    <div class="testimonial-container">
      <div class="testimonial-card">
        <div class="testimonial-header">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Tom_Cruise_in_South_Korea%2C_7_May_2025_02.png" alt="Jessica T.">
          <div>
            <h4>Jessica T.</h4>
            <p>Member since 2020</p>
          </div>
        </div>
        <p class="testimonial-quote">"PowerHouse Gym completely changed my approach to fitness. The trainers are knowledgeable, the equipment is top-notch, and the community is so supportive. I've never been this consistent with my workouts!"</p>
        <div class="testimonial-rating">
          <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="testimonial-header">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Tom_Cruise_in_South_Korea%2C_7_May_2025_02.png" alt="Robert M.">
          <div>
            <h4>Robert M.</h4>
            <p>Member since 2019</p>
          </div>
        </div>
        <p class="testimonial-quote">"After trying multiple gyms, I finally found my fitness home at PowerHouse. The personal training program helped me lose 30 pounds and build muscle like never before. Worth every penny!"</p>
        <div class="testimonial-rating">
          <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="testimonial-header">
          <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Tom_Cruise_in_South_Korea%2C_7_May_2025_02.png" alt="David L.">
          <div>
            <h4>David L.</h4>
            <p>Member since 2021</p>
          </div>
        </div>
        <p class="testimonial-quote">"The nutrition program at PowerHouse has been a game-changer for me. Combined with regular workouts, I've never felt better. The staff really knows how to personalize your fitness experience."</p>
        <div class="testimonial-rating">
          <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
        </div>
      </div>
    </div>
  </section>

 <!-- Business Highlights -->
  <section class="highlights">
    <h2>Our Milestones</h2>
    <div class="highlight-grid">
      <div class="highlight-box">
        <h3 id="customers">0</h3>
        <p>Customers Served Nationwide</p>
      </div>
      <div class="highlight-box">
        <h3>5-Star</h3>
        <p>Average Customer Satisfaction</p>
      </div>
      <div class="highlight-box">
        <h3 id="equipment">0</h3>
        <p>Equipment Sold</p>
      </div>
    </div>
  </section>
  <script src="timeline.js"></script>

  <!-- Redirect Buttons Section -->
  <section class="quick-links">
    <h2>Explore More</h2>
    <div class="button-group">
      <a href="about.php" class="btn">Learn About Us</a>
      <a href="products.php" class="btn">Browse Products</a>
      <a href="contact.php" class="btn">Get in Touch</a>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <script src="timeline.js"></script>
  <script src="nav.js"></script>
</body>
</html>



