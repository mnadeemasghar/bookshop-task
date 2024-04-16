<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

// Database connection
include 'connect.php';

// Fetch all books from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[$row['id']] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is the user dashboard.</p>
    
    <h2>Books</h2>
    <ul>
        <?php foreach ($books as $book): ?>
        <li>
            <strong><?php echo $book['title']; ?></strong> by <?php echo $book['author']; ?> - $<?php echo $book['price']; ?>
            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>

    <h2>Cart</h2>
    <ul>
        <?php if(isset($_SESSION['cart'])) {foreach ($_SESSION['cart'] as $book_id): ?>
        <li>
            <strong><?php echo $books[$book_id]['title']; ?></strong> by <?php echo $books[$book_id]['author']; ?> - $<?php echo $books[$book_id]['price']; ?>
            <form action="remove_from_cart.php" method="POST">
                <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                <button type="submit">Remove</button>
            </form>
        </li>
        <?php endforeach; } ?>
    </ul>

    <?php if (!empty($_SESSION['cart'])): ?>
    <a href="place_order.php">Place Order</a>
    <?php endif; ?>
</body>
</html>
