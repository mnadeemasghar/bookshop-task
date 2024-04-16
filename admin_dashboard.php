<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Bookstore</h1>
    <a href="add_book_form.php">Add Book</a>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        include 'connect.php';

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td><a href='update_book_form.php?id=" . $row["id"] . "'>Update</a> | 
                <a href='delete_book.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
