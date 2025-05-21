<nav class="main-nav">
    <div class="logo">
      <a href="index.php">MAXFITNESS</a>
    </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li class="user-actions">
          <span class="user-greeting-text">Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
          <a href="logout.php" class="portal-button logout-button">Logout</a>
        </li>
      <?php else: ?>
        <li><a href="login.php" class="portal-button">Portal</a></li>
      <?php endif; ?>
    </ul>
    <div class="menu-toggle">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
</nav> 