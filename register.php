<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; // No hashing as per request
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']); // Added address

    // Basic validation
    if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)) { // Added address to validation
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Check if email already exists
        $stmt_check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $message = "Email already registered.";
        } else {
            // Insert new user
            $stmt_insert = $conn->prepare("INSERT INTO users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)"); // Added address column
            $stmt_insert->bind_param("sssss", $name, $email, $password, $phone, $address); // Added 's' for address string
            
            if ($stmt_insert->execute()) {
                // $message = "Registration successful! You can now <a href='login.php'>login</a>."; // Message no longer needed if redirecting
                // Optionally, redirect to login page or log the user in directly
                header("Location: login.php");
                exit(); // Ensure no further code is executed after redirect
            } else {
                $message = "Error: " . $stmt_insert->error;
            }
            $stmt_insert->close();
        }
        $stmt_check->close();
    }
    // $conn->close(); // Connection should be closed after potential redirect or if an error message needs to be displayed using $conn
    if (!empty($message)) { // Close connection only if we are displaying a message and not redirecting
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - MAXFITNESS</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .form-container {
      max-width: 400px;
      margin: 40px auto;
      padding: 30px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .form-container h2 {
      text-align: center;
      color: #123499;
      margin-bottom: 20px;
    }

    .form-container label {
      display: block;
      margin-bottom: 6px;
      color: #333;
    }

    .form-container input {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .form-container button {
      width: 100%;
      padding: 10px;
      background-color: #123499;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    .form-container button:hover {
      background-color: #0b286e;
    }

    .toggle-link {
      text-align: center;
      margin-top: 10px;
      color: #444;
    }

    .toggle-link a {
      color: #123499;
      text-decoration: none;
      font-weight: bold;
    }

    .toggle-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <?php include 'includes/nav.php'; ?>



  <div class="form-container">
    <form action="register.php" method="POST">
      <label for="regName">Full Name:</label>
      <input type="text" id="regName" name="name" required />

      <label for="regEmail">Email:</label>
      <input type="email" id="regEmail" name="email" required />

      <label for="regPassword">Password:</label>
      <input type="password" id="regPassword" name="password" required />
      
      <label for="regPhone">Phone Number:</label>
      <input type="text" id="regPhone" name="phone" required />

      <label for="regAddress">Address:</label>
      <textarea id="regAddress" name="address" rows="3" required style="width: 100%; padding: 10px; margin-bottom: 16px; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box;"></textarea>

      <button type="submit">Register</button>
    </form>
    <div class="toggle-link">
      Already have an account? <a href="login.php">Login here</a>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

</body>
</html>