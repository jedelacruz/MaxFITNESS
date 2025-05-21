<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/db.php'; // Ensure this path is correct

$_SESSION['order_message'] = ''; // Initialize order message

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['order_message'] = "Error: You must be logged in to place an order.";
    // Redirect to login page or the page where the order originated if possible
    // For simplicity, redirecting to login, then they have to navigate back.
    header("Location: login.php"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['product_price'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = (int)$_POST['product_id'];
    $product_price = (float)$_POST['product_price'];
    // $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : 'Selected Product'; // Optional: for messages

    // Fetch user's address from the database
    $stmt_user = $conn->prepare("SELECT address FROM users WHERE id = ?");
    if ($stmt_user === false) {
        error_log("MySQL Prepare Error (User Address): " . $conn->error);
        $_SESSION['order_message'] = "Error: Could not fetch user details. Please try again.";
        header("Location: order-chest.php"); // Or a general error page
        exit();
    }
    $stmt_user->bind_param("i", $user_id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    if ($result_user->num_rows > 0) {
        $user_data = $result_user->fetch_assoc();
        $shipping_address = $user_data['address'];
    } else {
        $_SESSION['order_message'] = "Error: User address not found. Please update your profile.";
        header("Location: order-chest.php"); // Or profile page
        exit();
    }
    $stmt_user->close();

    // Start a transaction (optional but good practice for multiple inserts)
    $conn->begin_transaction();

    try {
        // Insert into orders table
        $stmt_order = $conn->prepare("INSERT INTO orders (user_id, total_amount, order_status, shipping_address, billing_address) VALUES (?, ?, 'Pending', ?, ?)");
        if ($stmt_order === false) {
            throw new Exception("MySQL Prepare Error (Order Insert): " . $conn->error);
        }
        // Assuming billing_address is the same as shipping_address for simplicity
        $stmt_order->bind_param("idss", $user_id, $product_price, $shipping_address, $shipping_address);
        
        if (!$stmt_order->execute()) {
            throw new Exception("MySQL Execute Error (Order Insert): " . $stmt_order->error);
        }
        $order_id = $conn->insert_id; // Get the ID of the new order
        $stmt_order->close();

        // Insert into order_items table
        $quantity = 1; // Default quantity
        $stmt_order_item = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)");
        if ($stmt_order_item === false) {
            throw new Exception("MySQL Prepare Error (Order Item Insert): " . $conn->error);
        }
        $stmt_order_item->bind_param("iiid", $order_id, $product_id, $quantity, $product_price);

        if (!$stmt_order_item->execute()) {
            throw new Exception("MySQL Execute Error (Order Item Insert): " . $stmt_order_item->error);
        }
        $stmt_order_item->close();

        // If all good, commit the transaction
        $conn->commit();
        $_SESSION['order_message'] = "Success: Your order has been placed successfully! Order ID: " . $order_id;

    } catch (Exception $e) {
        $conn->rollback(); // Rollback on error
        error_log($e->getMessage());
        $_SESSION['order_message'] = "Error: Could not place your order due to a system issue. " . $e->getMessage();
    }

    $conn->close();
    // Redirect back to the page where the order originated
    $redirect_page = isset($_POST['origin_page']) && !empty($_POST['origin_page']) ? $_POST['origin_page'] : 'index.php';
    header("Location: " . $redirect_page);
    exit();

} else {
    // Not a POST request or missing data, redirect
    $_SESSION['order_message'] = "Error: Invalid request to process order.";
    $redirect_page = isset($_POST['origin_page']) && !empty($_POST['origin_page']) ? $_POST['origin_page'] : 'index.php';
    header("Location: " . $redirect_page);
    exit();
}
?> 