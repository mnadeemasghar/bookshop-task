<?php
include 'connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];

$sql = "UPDATE books SET title='$title', author='$author', price='$price' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
