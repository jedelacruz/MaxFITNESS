<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != true) {
    // If not admin, redirect to login page or homepage with an error message
    $_SESSION['login_message'] = "Access denied. You must be an admin to view this page.";
    header("Location: ../login.php"); // Adjust path as needed
    exit();
}

include '../includes/db.php'; // Adjust path to db connection

// Initialize variables for storing fetched data
$users = [];
$products = [];
$orders = [];
$messages = [];

// --- Fetch Users ---
$result_users = $conn->query("SELECT id, name, email, phone, address, is_admin, created_at FROM users ORDER BY created_at DESC");
if ($result_users) {
    while ($row = $result_users->fetch_assoc()) {
        $users[] = $row;
    }
}

// --- Fetch Products ---
$result_products = $conn->query("SELECT id, name, description, price, category, image_url, stock_quantity, created_at FROM products ORDER BY created_at DESC");
if ($result_products) {
    while ($row = $result_products->fetch_assoc()) {
        $products[] = $row;
    }
}

// --- Fetch Messages ---
$result_messages = $conn->query("SELECT id, name, email, phone, subject, message, received_at, is_read FROM messages ORDER BY received_at DESC");
if ($result_messages) {
    while ($row = $result_messages->fetch_assoc()) {
        $messages[] = $row;
    }
}

// --- Fetch Orders ---
// This query joins orders with users, and then we'll fetch order items separately for simplicity in display
$sql_orders = "SELECT o.id, o.order_date, o.total_amount, o.order_status, o.shipping_address, 
                  u.name AS user_name, u.email AS user_email
                FROM orders o
                JOIN users u ON o.user_id = u.id
                ORDER BY o.order_date DESC";
$result_orders = $conn->query($sql_orders);
if ($result_orders) {
    while ($row = $result_orders->fetch_assoc()) {
        // Fetch items for each order
        $stmt_items = $conn->prepare(
            "SELECT oi.quantity, oi.price_at_purchase, p.name AS product_name 
             FROM order_items oi 
             JOIN products p ON oi.product_id = p.id 
             WHERE oi.order_id = ?"
        );
        if ($stmt_items) {
            $stmt_items->bind_param("i", $row['id']);
            $stmt_items->execute();
            $result_items = $stmt_items->get_result();
            $row['items'] = [];
            while ($item_row = $result_items->fetch_assoc()) {
                $row['items'][] = $item_row;
            }
            $stmt_items->close();
        }
        $orders[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - MAXFITNESS</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <header>
        <h1>MAXFITNESS Admin Dashboard</h1>
        <nav>
            <a href="#users-section">Users</a>
            <a href="#products-section">Products</a>
            <a href="#orders-section">Orders</a>
            <a href="#messages-section">Messages</a>
            <a href="../logout.php">Logout</a> <!-- Adjust path to logout -->
        </nav>
    </header>

    <main>
        <section id="users-section">
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Is Admin?</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($user['address'])); ?></td>
                        <td><?php echo $user['is_admin'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($users)): ?>
                        <tr><td colspan="7">No users found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <section id="products-section">
            <h2>Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Added At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td>₱<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></td>
                        <td><?php echo htmlspecialchars($product['category']); ?></td>
                        <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
                        <td><img src="../<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 50px; height: auto;"></td>
                        <td><?php echo nl2br(htmlspecialchars($product['description'])); ?></td>
                        <td><?php echo htmlspecialchars($product['created_at']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($products)): ?>
                        <tr><td colspan="8">No products found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <section id="orders-section">
            <h2>Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Shipping Address</th>
                        <th>Items Ordered</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['user_email']); ?></td>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td>₱<?php echo htmlspecialchars(number_format($order['total_amount'], 2)); ?></td>
                        <td><?php echo htmlspecialchars($order['order_status']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($order['shipping_address'])); ?></td>
                        <td>
                            <?php if (!empty($order['items'])):
                                echo '<ul>';
                                foreach ($order['items'] as $item) {
                                    echo '<li>' . htmlspecialchars($item['product_name']) . 
                                         ' (Qty: ' . htmlspecialchars($item['quantity']) . ')' . 
                                         ' @ ₱' . htmlspecialchars(number_format($item['price_at_purchase'], 2)) . '</li>';
                                }
                                echo '</ul>';
                            else:
                                echo 'No items found for this order.';
                            endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                     <?php if (empty($orders)): ?>
                        <tr><td colspan="8">No orders found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <section id="messages-section">
            <h2>Messages</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Received At</th>
                        <th>Read?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($message['id']); ?></td>
                        <td><?php echo htmlspecialchars($message['name']); ?></td>
                        <td><?php echo htmlspecialchars($message['email']); ?></td>
                        <td><?php echo htmlspecialchars($message['phone']); ?></td>
                        <td><?php echo htmlspecialchars($message['subject']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($message['message'])); ?></td>
                        <td><?php echo htmlspecialchars($message['received_at']); ?></td>
                        <td><?php echo $message['is_read'] ? 'Yes' : 'No'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($messages)): ?>
                        <tr><td colspan="8">No messages found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> MAXFITNESS Admin</p>
    </footer>
</body>
</html> 