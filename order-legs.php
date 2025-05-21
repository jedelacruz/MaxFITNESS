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
  <title>Leg Gym Equipments</title>
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
    <h1>Leg Gym Equipments</h1>
    <p>Squats and leg presses using squat racks and machines.</p>
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

    <!-- Product 1: Squat Rack with Barbell -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider1">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider1', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider1', 1)">&#10095;</button>
          </div>
          <img src="images/Squat-Rack-Barbell.png" alt="Squat Rack with Barbell Image 1" class="slider-image">
          <img src="images/12-Squat-Rack-Barbell.png" alt="Squat Rack with Barbell Image 2" class="slider-image">
          <img src="images/12-1-Squat-Rack-Barbell.png" alt="Squat Rack with Barbell Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots1"></div>
      </div>
      <div class="product-info">
        <h2>Squat Rack with Barbell</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱220,000.00</div>
        <button class="buy-btn" 
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(14, 'Squat Rack with Barbell', '220000.00', 'order-legs.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features1', this)">Features ↓</button>
        <div class="features" id="features1">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Material:</strong> Heavy-duty steel frame</li>
            <li><strong>Dimensions:</strong> ~84" H × 48" W × 50" D</li>
            <li><strong>Weight Capacity:</strong> 700–1,000 lbs</li>
            <li><strong>Barbell Compatibility:</strong> Olympic (2" sleeve diameter)</li>
            <li><strong>Includes:</strong> J-hooks, spotter arms, pull-up bar</li>
            <li><strong>Finish:</strong> Powder-coated</li>
            <li><strong>Use Cases:</strong> Squats, bench/overhead press, rack pulls, pull-ups</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 2: Leg Press Machine -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider2">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider2', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider2', 1)">&#10095;</button>
          </div>
          <img src="images/Leg-Press-Machine.png" alt="Leg Press Machine Image 1" class="slider-image">
          <img src="images/13-Leg-Press-Machine.png" alt="Leg Press Machine Image 2" class="slider-image">
          <img src="images/13-1-Leg-Press-Machine.png" alt="Leg Press Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots2"></div>
      </div>
      <div class="product-info">
        <h2>Leg Press Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱120,000.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(15, 'Leg Press Machine', '120000.00', 'order-legs.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features2', this)">Features ↓</button>
        <div class="features" id="features2">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> 45° Leg Press (Plate-Loaded)</li>
            <li><strong>Material:</strong> Powder-coated steel frame</li>
            <li><strong>Footplate:</strong> Non-slip diamond steel</li>
            <li><strong>Seat:</strong> Adjustable, padded</li>
            <li><strong>Safety:</strong> Dual safety catches</li>
            <li><strong>Weight Storage:</strong> 4–6 Olympic plate holders</li>
            <li><strong>Max Weight Capacity:</strong> 1,000–1,200 lbs</li>
            <li><strong>Dimensions:</strong> 87" L × 57" W × 52" H</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 3: Hamstring Curl / Leg Extension Machine -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider3">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider3', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider3', 1)">&#10095;</button>
          </div>
          <img src="images/Hamstring-Curl.png" alt="Hamstring Curl / Leg Extension Machine Image 1" class="slider-image">
          <img src="images/14-Hamstring-Curl.png" alt="Hamstring Curl / Leg Extension Machine Image 2" class="slider-image">
          <img src="images/14-1-Hamstring-Curl.png" alt="Hamstring Curl / Leg Extension Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots3"></div>
      </div>
      <div class="product-info">
        <h2>Hamstring Curl / Leg Extension Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱55,000.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(16, 'Hamstring Curl / Leg Extension Machine', '55000.00', 'order-legs.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features3', this)">Features ↓</button>
        <div class="features" id="features3">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Functions:</strong> Leg extensions and hamstring curls</li>
            <li><strong>Build:</strong> Steel frame, padded seat/rollers</li>
            <li><strong>Weight Stack:</strong> ~200 lbs, 10 lb increments</li>
            <li><strong>Dimensions:</strong> ~60" x 40" x 55"</li>
            <li><strong>Net Weight:</strong> ~320 lbs</li>
            <li><strong>User Capacity:</strong> Up to 350 lbs</li>
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