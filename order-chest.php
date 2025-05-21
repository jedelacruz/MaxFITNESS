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
  <title>MAXFITNESS Products</title>
  <link rel="stylesheet" href="order-style.css" />
  <link rel="stylesheet" href="style.css">
  <style>
    /* Order Feedback Message Styling */
    .order-feedback-message {
      padding: 15px;
      margin: 20px auto; /* Centered with auto margins */
      max-width: 800px; /* Max width for the message container */
      border-radius: 5px;
      font-size: 1rem;
      text-align: center;
    }
    .order-feedback-message.success {
      background-color: #d4edda; /* Light green */
      color: #155724; /* Dark green */
      border: 1px solid #c3e6cb;
    }
    .order-feedback-message.error {
      background-color: #f8d7da; /* Light red */
      color: #721c24; /* Dark red */
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>

  <?php include 'includes/nav.php'; ?>

  <header class="page-header">
    <h1>Our Products</h1>
    <p>Quality Gear, Stronger Results</p>
  </header>

  

  <!-- PRODUCT LIST -->
  <div class="order-container">

    <?php 
      if (isset($_SESSION['order_message']) && !empty($_SESSION['order_message'])):
        $message_type = strpos(strtolower($_SESSION['order_message']), 'success') !== false ? 'success' : 'error';
    ?>
      <div class="order-feedback-message <?php echo $message_type; ?>">
        <?php 
          echo htmlspecialchars($_SESSION['order_message']); 
          unset($_SESSION['order_message']); // Clear the message after displaying
        ?>
      </div>
    <?php endif; ?>

    <!-- Product 1: Chest Press Machine -->
    <div class="product-box">
      <div class="product-img">
        <!-- Image Slider for Product 1 -->
        <div class="image-slider" id="slider1">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider1', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider1', 1)">&#10095;</button>
          </div>
          <img src="images/chest-bench-press.png" alt="Chest Press Machine Image 1" class="slider-image">
          <img src="images/1-chest-bench-press.png" alt="Chest Press Machine Image 2" class="slider-image">
          <img src="images/1.1-chest-bench-press.png" alt="Chest Press Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots1"></div>
      </div>
      <div class="product-info">
        <h2>Barbell with Bench Press Station</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱22,999.00</div>
        <button class="buy-btn" 
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(10, 'Barbell with Bench Press Station', '22999.00', 'order-chest.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features1', this)">Features ↓</button>
        <div class="features" id="features1">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Bench Type:</strong> Flat bench with padded vinyl surface</li>
            <li><strong>Barbell:</strong> Olympic 7-ft bar (~45 lbs / 20.4 kg)</li>
            <li><strong>Weight Plates:</strong> Rubber-coated, approx. 160–170 lbs total</li>
            <li><strong>Rack:</strong> Steel frame with fixed-height J-hooks</li>
            <li><strong>Primary Use:</strong> Barbell bench press</li>
            <li><strong>Best For:</strong> Chest, triceps, shoulders</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 2: Adjustable Dumbbell -->
    <div class="product-box">
      <div class="product-img">
        <!-- Image Slider for Product 2 -->
        <div class="image-slider" id="slider2">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider2', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider2', 1)">&#10095;</button>
          </div>
          <img src="images/Adjustable-Dumbbell.png" alt="Adjustable Dumbbell Image 1" class="slider-image">
          <img src="images/2-1-Adjustable-Dumbbell.png" alt="Adjustable Dumbbell Image 2" class="slider-image">
          <img src="images/2-Adjustable-Dumbbell.png" alt="Adjustable Dumbbell Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots2"></div>
      </div>
      <div class="product-info">
        <h2>Adjustable Dumbbell</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱42,000.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(2, 'Adjustable Dumbbell', '42000.00', 'order-chest.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features2', this)">Features ↓</button>
        <div class="features" id="features2">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> Adjustable (dial or selector-based)</li>
            <li><strong>Material:</strong> Metal plates with plastic/metal adjustment system</li>
            <li><strong>Weight Range:</strong> 5–90 lbs, adjustable in 2.5–5 lb increments</li>
            <li><strong>Size:</strong> About 14–17" long, 6–8" wide/high</li>
            <li><strong>Best For:</strong> Chest flyes, presses, shoulder and arm exercises</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Product 3: Cable Machine -->
    <div class="product-box">
      <div class="product-img">
        <!-- Image Slider for Product 3 -->
        <div class="image-slider" id="slider3">
          <div class="slider-nav">
            <button class="prev" onclick="moveSlide('slider3', -1)">&#10094;</button>
            <button class="next" onclick="moveSlide('slider3', 1)">&#10095;</button>
          </div>
          <img src="images/Cable-Machine.png" alt="Cable Machine Image 1" class="slider-image">
          <img src="images/3-1-Cable-Machine.png" alt="Cable Machine Image 2" class="slider-image">
          <img src="images/3-Cable-Machine.png" alt="Cable Machine Image 3" class="slider-image">
        </div>
        <div class="dot-indicators" id="dots3"></div>
      </div>
      <div class="product-info">
        <h2>Cable Machine</h2>
        <div class="brand">MAXFITNESS</div>
        <div class="price">₱75,900.00</div>
        <button class="buy-btn"
          <?php if (isset($_SESSION['user_id'])): ?>
            onclick="confirmOrder(11, 'Cable Machine', '75900.00', 'order-chest.php')"
          <?php else: ?>
            onclick="window.location.href='login.php'"
          <?php endif; ?>
        >Buy Now</button>
        <button class="toggle-btn" onclick="toggleFeatures('features3', this)">Features ↓</button>
        <div class="features" id="features3">
          <h3>Product Features</h3>
          <ul>
            <li><strong>Type:</strong> Dual adjustable pulley (functional trainer)</li>
            <li><strong>Weight Stack:</strong> Two stacks, ~100–200 lbs each</li>
            <li><strong>Adjustment:</strong> Vertical pulleys for multiple angles</li>
            <li><strong>Attachments:</strong> Single-handle grips (others optional)</li>
            <li><strong>Best For:</strong> Flyes, presses, curls, triceps, core</li>
            <li><strong>Design:</strong> Compact, open frame for versatile use</li>
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
    // This script can be in order-script.js, but for simplicity and focus, adding here.
    // If order-script.js is for the image slider, keep this separate or add it there.
    
    function confirmOrder(productId, productName, productPrice, originPage) {
      const userName = "<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Valued Customer'; ?>";
      
      if (confirm(userName + ", are you sure you want to buy " + productName + " for ₱" + productPrice + "?, Your order will be shipped to your registered address.")) {
        // Create a form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'process_order.php';

        // Add product_id to form
        const productIdInput = document.createElement('input');
        productIdInput.type = 'hidden';
        productIdInput.name = 'product_id';
        productIdInput.value = productId;
        form.appendChild(productIdInput);

        // Add product_name to form (optional, for display on next page or messages)
        const productNameInput = document.createElement('input');
        productNameInput.type = 'hidden';
        productNameInput.name = 'product_name';
        productNameInput.value = productName;
        form.appendChild(productNameInput);
        
        // Add product_price to form
        const productPriceInput = document.createElement('input');
        productPriceInput.type = 'hidden';
        productPriceInput.name = 'product_price';
        productPriceInput.value = productPrice;
        form.appendChild(productPriceInput);

        // Add origin_page to form
        const originPageInput = document.createElement('input');
        originPageInput.type = 'hidden';
        originPageInput.name = 'origin_page';
        originPageInput.value = originPage;
        form.appendChild(originPageInput);

        // Append form to body and submit
        document.body.appendChild(form);
        form.submit();
      }
    }
  </script>
</body>
</html>