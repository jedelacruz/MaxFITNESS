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
  <title>Shoulder Gym Equipments</title>
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
    <h1>Shoulder Gym Equipments</h1>
    <p>Presses and lateral raises using free weights and machines.</p>
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

    <!-- Product 1: Adjustable Dumbbell -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider1">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider1', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider1', 1)">&#10095;</button>
          </div>
          <img src="images/Adjustable-Dumbbell.png" alt="Adjustable Dumbbell Image 1" class="slider-image">
          <img src="images/2-Adjustable-Dumbbell.png" alt="Adjustable Dumbbell Image 2" class="slider-image">
          <img src="images/2-1-Adjustable-Dumbbell.png" alt="Adjustable Dumbbell Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots1"></div>
      </div>
      <div class="product-info">
        <h2>Adjustable Dumbbell</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱42,000.00</div>
        <button class="buy-btn" 
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(2, 'Adjustable Dumbbell', '42000.00', 'order-shoulders.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features1', this)">Features ↓</button>
        <div class="features" id="features1">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> Adjustable (dial or selector-based)</li>
            <li><strong>Material:</strong> Metal plates with plastic/metal adjustment system</li>
            <li><strong>Weight Range:</strong> 5–90 lbs, adjustable in 2.5–5 lb increments</li>
            <li><strong>Size:</strong> Approx. 14–17" L, 6–8" W/H</li>
            <li><strong>Best For:</strong> Flyes, presses, shoulder & arm exercises</li>
            <li><strong>Ideal Use:</strong> Compact and versatile for home gyms</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 2: Smith Machine -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider2">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider2', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider2', 1)">&#10095;</button>
          </div>
          <img src="images/Smith-Machine.png" alt="Smith Machine Image 1" class="slider-image">
          <img src="images/7-Smith-Machine.png" alt="Smith Machine Image 2" class="slider-image">
          <img src="images/7-1-Smith-Machine.png" alt="Smith Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots2"></div>
      </div>
      <div class="product-info">
        <h2>Smith Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱122,000.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(17, 'Smith Machine', '122000.00', 'order-shoulders.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features2', this)">Features ↓</button>
        <div class="features" id="features2">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Size:</strong> ~7 ft tall, ~4–5 ft wide, ~6.5 ft deep</li>
            <li><strong>Weight Capacity:</strong> Bar holds 600–1,000 lbs</li>
            <li><strong>Bar Weight:</strong> 15–25 lbs (some are counterbalanced)</li>
            <li><strong>Material:</strong> Heavy-duty steel with powder coating</li>
            <li><strong>Key Features:</strong> Guided barbell, safety lockouts, plate pegs, adjustable stops</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 3: Cable Tower -->
    <div class="product-box">
      <div class="product-img">
        <div class="image-slider" id="slider3">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider3', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider3', 1)">&#10095;</button>
          </div>
          <img src="images/Cable-Tower.png" alt="Cable Tower Image 1" class="slider-image">
          <img src="images/8-Cable-Tower.png" alt="Cable Tower Image 2" class="slider-image">
          <img src="images/8-1-Cable-Tower.png" alt="Cable Tower Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots3"></div>
      </div>
      <div class="product-info">
        <h2>Cable Tower</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱70,900.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(18, 'Cable Tower', '70900.00', 'order-shoulders.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features3', this)">Features ↓</button>
        <div class="features" id="features3">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Weight Stack:</strong> Up to 90 kg (198 lbs)</li>
            <li><strong>Pulley System:</strong> Adjustable height, smooth multi-pulley resistance</li>
            <li><strong>Attachments:</strong> Dual stirrup handles, compatible with other accessories</li>
            <li><strong>Design:</strong> Compact – 210cm H, 60cm W, 70cm D</li>
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