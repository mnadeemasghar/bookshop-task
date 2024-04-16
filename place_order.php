<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

// Include database connection
include_once 'connect.php';

$user_id = $_SESSION['user_id'];

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $total_price = 0;
    
    $sql = "INSERT INTO orders (user_id, book_id, quantity, total_price) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        foreach ($_SESSION['cart'] as $book_id) {
            $quantity = isset($_SESSION['quantity'][$book_id]) ? $_SESSION['quantity'][$book_id] : 1;
            
            $book_price_sql = "SELECT price FROM books WHERE id = ?";
            $book_price_stmt = $conn->prepare($book_price_sql);
            $book_price_stmt->bind_param("i", $book_id);
            $book_price_stmt->execute();
            $book_price_result = $book_price_stmt->get_result();
            
            if ($book_price_row = $book_price_result->fetch_assoc()) {
                $book_price = $book_price_row['price'];
                $item_total_price = $book_price * $quantity;
                $total_price += $item_total_price;
            }
            
            $stmt->bind_param("iiid", $user_id, $book_id, $quantity, $item_total_price);
            $stmt->execute();
            
            $item_total_price = 0;
        }
        
        if ($stmt->affected_rows > 0) {
            echo "Orders placed successfully!";
            echo "<br>";
            echo "<a href='view_books.php'>View Books</a>";
            
            unset($_SESSION['cart']);
            unset($_SESSION['quantity']);
        } else {
            echo "Failed to place orders.";
        }
        
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Your cart is empty.";
}

$conn->close();
?>
