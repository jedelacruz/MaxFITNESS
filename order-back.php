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
  <title>Back Gym Equipments</title>
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
    <h1>Back Gym Equipments</h1>
    <p>Lat pulldown and seated row for a strong back foundation.</p>
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

    <!-- Product 1: Pull-Up Bar -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider1">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider1', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider1', 1)">&#10095;</button>
          </div>
          <img src="images/Pull-Up-Bar.png" alt="Pull-Up Bar Image 1" class="slider-image">
          <img src="images/4-Pull-Up-Bar.png" alt="Pull-Up Bar Image 2" class="slider-image">
          <img src="images/4-1-Pull-Up-Bar.png" alt="Pull-Up Bar Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots1"></div>
      </div>
      <div class="product-info">
        <h2>Freestanding Power Rack with Pull-Up Bar</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱15,990.00</div>
        <button class="buy-btn" 
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(4, 'Freestanding Power Rack with Pull-Up Bar', '15990.00', 'order-back.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features1', this)">Features ↓</button>
        <div class="features" id="features1">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> Freestanding Power Rack with integrated Pull-Up Bar</li>
            <li><strong>Construction:</strong> Heavy-duty steel frame with reinforced joints</li>
            <li><strong>Pull-Up Bar:</strong> Dual-bar system for varied grip options</li>
            <li><strong>Attachments:</strong> Includes dip handles and J-hooks for barbell exercises</li>
            <li><strong>Adjustability:</strong> Multiple height settings for pull-up and barbell positions</li>
            <li><strong>Stability:</strong> Wide base for stability during intense workouts</li>
            <li><strong>Use Case:</strong> Ideal for pull-ups, chin-ups, dips, squats, and bench presses</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 2: Lat Pulldown & Low Row -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider2">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider2', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider2', 1)">&#10095;</button>
          </div>
          <img src="images/Lat-Pulldown.png" alt="Lat Pulldown & Row Image 1" class="slider-image">
          <img src="images/5-Lat-Pulldown.png" alt="Lat Pulldown & Row Image 2" class="slider-image">
          <img src="images/5-1-Lat-Pulldown.png" alt="Lat Pulldown & Row Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots2"></div>
      </div>
      <div class="product-info">
        <h2>Lat Pulldown & Low Row Combo Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱30,400.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(5, 'Lat Pulldown & Low Row Combo Machine', '30400.00', 'order-back.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features2', this)">Features ↓</button>
        <div class="features" id="features2">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> Dual-function (lat pulldown + seated row)</li>
            <li><strong>Resistance:</strong> Uses standard/Olympic weight plates</li>
            <li><strong>Build:</strong> Steel frame, padded seat and thigh support</li>
            <li><strong>Features:</strong> High and low pulley, footplates for rows</li>
            <li><strong>Use:</strong> Ideal for home or small gyms for back and arm training</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 3: Seated Row Machine -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider3">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider3', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider3', 1)">&#10095;</button>
          </div>
          <img src="images/Seated-Row.png" alt="Seated Row Machine Image 1" class="slider-image">
          <img src="images/6-Seated-Row.png" alt="Seated Row Machine Image 2" class="slider-image">
          <img src="images/6-1-Seated-Row.png" alt="Seated Row Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots3"></div>
      </div>
      <div class="product-info">
        <h2>Seated Row Machine (Plate Loaded)</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱93,000.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(6, 'Seated Row Machine (Plate Loaded)', '93000.00', 'order-back.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features3', this)">Features ↓</button>
        <div class="features" id="features3">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Purpose:</strong> Builds upper/mid-back muscles (lats, rhomboids, traps, biceps)</li>
            <li><strong>Construction:</strong> Heavy-duty steel frame, padded seat & chest pad</li>
            <li><strong>Resistance:</strong> Plate-loaded (fits Olympic plates)</li>
            <li><strong>Capacity:</strong> Up to 600–700 lbs</li>
            <li><strong>Features:</strong> Adjustable seat, rotating handles, compact design</li>
            <li><strong>Size:</strong> Approx. 60" L x 40" W x 50" H</li>
            <li><strong>Weight:</strong> Around 220–250 lbs</li>
          </ul>
        </div>
      </div>
    </div>
<div class="back-container">
  <a href="products.php" class="back-button">← Back to Products</a>
</div>
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