<?php
include 'connect.php';

$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];

$sql = "INSERT INTO books (title, author, price) VALUES ('$title', '$author', '$price')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><br><a href='javascript:history.go(-1)'>Go back</a>";
}

$conn->close();
?>
