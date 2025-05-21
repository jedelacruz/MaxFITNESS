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
  <title>Cardio Gym Equipments</title>
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
    <h1>Cardio Gym Equipments</h1>
    <p>Treadmills, bikes, and rowing machines to boost endurance.</p>
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

    <!-- Product 1: Treadmill -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider1">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider1', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider1', 1)">&#10095;</button>
          </div>
          <img src="images/Treadmill.png" alt="Treadmill Image 1" class="slider-image">
          <img src="images/17-Treadmill.png" alt="Treadmill Image 2" class="slider-image">
          <img src="images/17-1-Treadmill.png" alt="Treadmill Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots1"></div>
      </div>
      <div class="product-info">
        <h2>Treadmill</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱30,100.00</div>
        <button class="buy-btn" 
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(7, 'Treadmill', '30100.00', 'order-cardio.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features1', this)">Features ↓</button>
        <div class="features" id="features1">
          <h3>Product Features</h3>
          <ul>
            <li>Wide running belt and sturdy handrails</li>
            <li>Digital console: speed, time, distance, calorie tracking</li>
            <li>Motor: 1.5–3.5 HP; Speed: 0.8–16 km/h</li>
            <li>Weight capacity: 100–150 kg</li>
            <li>Foldable, incline settings, shock absorption, Bluetooth</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 2: Stationary Bike -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider2">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider2', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider2', 1)">&#10095;</button>
          </div>
          <img src="images/Stationary-Bike.png" alt="Stationary Bike Image 1" class="slider-image">
          <img src="images/18-Stationary-Bike.png" alt="Stationary Bike Image 2" class="slider-image">
          <img src="images/18-1-Stationary-Bike.png" alt="Stationary Bike Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots2"></div>
      </div>
      <div class="product-info">
        <h2>Stationary Bike</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱11,100.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(8, 'Stationary Bike', '11100.00', 'order-cardio.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features2', this)">Features ↓</button>
        <div class="features" id="features2">
          <h3>Product Features</h3>
          <ul>
            <li>Spin bike with heavy flywheel for smooth ride</li>
            <li>Adjustable seat, handlebars, and pedal straps</li>
            <li>LCD display for speed, time, distance, and calories</li>
            <li>Weight capacity: ~100–150 kg</li>
            <li>Manual knob resistance (magnetic or friction)</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 3: Rowing Machine -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider3">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider3', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider3', 1)">&#10095;</button>
          </div>
          <img src="images/Rowing-Machine.png" alt="Rowing Machine Image 1" class="slider-image">
          <img src="images/19-Rowing-Machine.png" alt="Rowing Machine Image 2" class="slider-image">
          <img src="images/19-1-Rowing-Machine.png" alt="Rowing Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots3"></div>
      </div>
      <div class="product-info">
        <h2>Rowing Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱12,100.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(9, 'Rowing Machine', '12100.00', 'order-cardio.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features3', this)">Features ↓</button>
        <div class="features" id="features3">
          <h3>Product Features</h3>
          <ul>
            <li>Air resistance with large visible flywheel</li>
            <li>Sliding seat and footrests with straps</li>
            <li>Digital monitor: time, distance, calories, strokes/min</li>
            <li>Heavy-duty steel frame, foldable/compact design</li>
            <li>Dimensions: 2.4 meters; Weight capacity: 100–150 kg</li>
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