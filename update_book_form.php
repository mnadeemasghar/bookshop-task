<?php
include 'connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
</head>
<body>
    <h1>Update Book</h1>
    <form action="update_book.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo $row['author']; ?>" required><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required><br>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>
<?php
} else {
    echo "Book not found.";
}
$conn->close();
?>
