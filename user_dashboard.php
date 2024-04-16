<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This is the user dashboard.</p>

    <a href="view_books.php">View Books</a>
</body>
</html>
