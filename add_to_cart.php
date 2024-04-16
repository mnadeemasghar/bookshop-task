<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the book ID is provided
    if (isset($_POST['book_id'])) {
        $book_id = $_POST['book_id'];
        // Add the book ID to the cart
        $_SESSION['cart'][] = $book_id;
    }
}

// Redirect back to the view books page
header("Location: view_books.php");
exit();
?>
