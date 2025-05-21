<?php
session_start();
include 'includes/db.php';

$message = '';

// If user is already logged in, redirect to index.php
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_identifier']) && isset($_POST['password'])) {
    $login_identifier = trim($_POST['login_identifier']);
    $password = $_POST['password']; // No hashing as per request

    if (empty($login_identifier) || empty($password)) {
        $message = "Username/Email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, name, email, is_admin FROM users WHERE (email = ? OR name = ?) AND password = ?");
        $stmt->bind_param("sss", $login_identifier, $login_identifier, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'];
            
            // Redirect to a dashboard or home page
            header("Location: index.php"); 
            exit();
        } else {
            $message = "Invalid username/email or password.";
        }
        $stmt->close();
    }
    $conn->close();
}

// Logic for the registration part of the form if it submits to login.php and then processed by register.php
// This example assumes the second form (register) on login.php submits to register.php directly.
// If it submits to login.php, you would need to handle those POST variables here too,
// or better, ensure it submits to register.php as it currently does.

?>
<!DOCTYPE html>  
<html lang="en">  
<head>  
  <meta charset="UTF-8" />  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
  <title>Login - MAXFITNESS</title>  
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
      background-color: #123499;  
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
  
  <?php if (!empty($message)): ?>
    <div style="padding: 10px; margin-bottom: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; text-align: center;">
      <?php echo $message; ?>
    </div>
  <?php endif; ?>

  <div class="form-container" id="loginForm">  
    <h2>Login</h2>  
    <form action="login.php" method="POST">  
      <label for="loginEmail">Username/Email:</label>  
      <input type="text" id="loginEmail" name="login_identifier" required>  
  
      <label for="loginPassword">Password:</label>  
      <input type="password" id="loginPassword" name="password" required>  
  
      <button type="submit">Login</button>  
    </form>  
    <div class="toggle-link">  
      Don't have an account? <a href="register.php">Register here</a>  
    </div>  
  </div>  
  
  <?php include 'includes/footer.php'; ?>
  
</body>  
</html>
