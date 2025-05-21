<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/db.php'; // Ensure this path is correct

$_SESSION['contact_message'] = ''; // Initialize contact message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']); // Optional
    $subject = trim($_POST['subject']);
    $message_text = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($message_text)) {
        $_SESSION['contact_message'] = "Error: Name, Email, Subject, and Message are required.";
        header("Location: contact.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['contact_message'] = "Error: Invalid email format.";
        header("Location: contact.php");
        exit();
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            // Error preparing statement
            error_log("MySQL Prepare Error: " . $conn->error);
            $_SESSION['contact_message'] = "Error: Could not prepare the statement. Please try again later.";
            header("Location: contact.php");
            exit();
        }
        
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message_text);

        if ($stmt->execute()) {
            $_SESSION['contact_message'] = "Success: Your message has been sent successfully!";
        } else {
            // Error executing statement
            error_log("MySQL Execute Error: " . $stmt->error);
            $_SESSION['contact_message'] = "Error: Could not send your message. Please try again later.";
        }
        $stmt->close();
    }
    $conn->close();
    header("Location: contact.php");
    exit();
} else {
    // Not a POST request, redirect to contact page or show an error
    header("Location: contact.php");
    exit();
}
?> 