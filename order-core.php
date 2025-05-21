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
  <title>Core Gym Equipments</title>
  <link rel="stylesheet" href="order-style.css" />
  <link rel="stylesheet" href="style.css">
  <style>
    /* Order Feedback Message Styling */
    .order-feedback-message {
      padding: 15px;
      margin: 20px auto; 
      max-width: 800px; 
      border-radius: 5px;
      font-size: 1rem;
      text-align: center;
    }
    .order-feedback-message.success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .order-feedback-message.error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>

  <?php include 'includes/nav.php'; ?>

  <header class="page-header">
    <h1>Core Gym Equipments</h1>
    <p>Crunches and cable woodchoppers for a strong midsection.</p>
  </header>

  <div class="order-container">
    <?php 
      if (isset($_SESSION['order_message']) && !empty($_SESSION['order_message'])):
        $message_type = strpos(strtolower($_SESSION['order_message']), 'success') !== false ? 'success' : 'error';
    ?>
      <div class="order-feedback-message <?php echo $message_type; ?>">
        <?php 
          echo htmlspecialchars($_SESSION['order_message']); 
          unset($_SESSION['order_message']);
        ?>
      </div>
    <?php endif; ?>

    <!-- Product 1: Ab Wheel -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider1">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider1', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider1', 1)">&#10095;</button>
          </div>
          <img src="images/Ab-Wheel.png" alt="Ab Wheel Image 1" class="slider-image">
          <img src="images/15-Ab-Wheel.png" alt="Ab Wheel Image 2" class="slider-image">
          <img src="images/15-1-Ab-Wheel.png" alt="Ab Wheel Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots1"></div>
      </div>
      <div class="product-info">
        <h2>Ab Wheel</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱900.00</div>
        <button class="buy-btn" 
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(12, 'Ab Wheel', '900.00', 'order-core.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features1', this)">Features ↓</button>
        <div class="features" id="features1">
          <h3>Product Features</h3>
          <ul>
            <li>Builds and tones core muscles (rectus abdominis, obliques, transverse abdominis)</li>
            <li>Engages shoulders, arms, and back</li>
            <li>Main use: Rollouts for core stability and strength</li>
            <li>Portable, compact, and easy to use at home or gym</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 2: Cable Machine -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider2">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider2', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider2', 1)">&#10095;</button>
          </div>
          <img src="images/Cable-Machine.png" alt="Cable Machine Image 1" class="slider-image">
          <img src="images/3-Cable-Machine.png" alt="Cable Machine Image 2" class="slider-image">
          <img src="images/3-1-Cable-Machine.png" alt="Cable Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots2"></div>
      </div>
      <div class="product-info">
        <h2>Cable Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱75,900.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(11, 'Cable Machine', '75900.00', 'order-core.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features2', this)">Features ↓</button>
        <div class="features" id="features2">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> Dual adjustable pulley (functional trainer)</li>
            <li><strong>Weight Stack:</strong> Two stacks, ~100–200 lbs each</li>
            <li><strong>Adjustment:</strong> Vertical pulleys for multiple angles</li>
            <li><strong>Attachments:</strong> Single-handle grips (others optional)</li>
            <li><strong>Uses:</strong> Flyes, presses, rows, curls, triceps, core</li>
            <li><strong>Design:</strong> Compact open-frame for versatility</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 3: Roman Chair -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider3">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider3', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider3', 1)">&#10095;</button>
          </div>
          <img src="images/Roman-Chair.png" alt="Roman Chair Image 1" class="slider-image">
          <img src="images/16-Roman-Chair.png" alt="Roman Chair Image 2" class="slider-image">
          <img src="images/16-1-Roman-Chair.png" alt="Roman Chair Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots3"></div>
      </div>
      <div class="product-info">
        <h2>Roman Chair</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱3,100.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(13, 'Roman Chair', '3100.00', 'order-core.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features3', this)">Features ↓</button>
        <div class="features" id="features3">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Materials:</strong> Steel frame, foam padding, non-slip foot holders</li>
            <li><strong>Dimensions:</strong> Approx. 45" (L) × 24" (W) × 36" (H)</li>
            <li><strong>Adjustability:</strong> Adjustable thigh support</li>
            <li><strong>Weight Capacity:</strong> 250–300 lbs (113–136 kg)</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="back-container">
      <a href="products.php" class="back-button">← Back to Products</a>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <script src="order-script.js"></script>
  <script>
    function confirmOrder(productId, productName, productPrice, originPage) {
      const userName = "<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Valued Customer'; ?>";
      if (confirm(userName + ", are you sure you want to buy " + productName + " for ₱" + productPrice + "?, Your order will be shipped to your registered address.")) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'process_order.php';
        const productIdInput = document.createElement('input');
        productIdInput.type = 'hidden';
        productIdInput.name = 'product_id';
        productIdInput.value = productId;
        form.appendChild(productIdInput);
        const productNameInput = document.createElement('input');
        productNameInput.type = 'hidden';
        productNameInput.name = 'product_name';
        productNameInput.value = productName;
        form.appendChild(productNameInput);
        const productPriceInput = document.createElement('input');
        productPriceInput.type = 'hidden';
        productPriceInput.name = 'product_price';
        productPriceInput.value = productPrice;
        form.appendChild(productPriceInput);
        const originPageInput = document.createElement('input');
        originPageInput.type = 'hidden';
        originPageInput.name = 'origin_page';
        originPageInput.value = originPage;
        form.appendChild(originPageInput);
        document.body.appendChild(form);
        form.submit();
      }
    }
  </script>
</body>
</html>