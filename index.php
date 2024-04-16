<?php
session_start();

if(isset($_SESSION['role'])) {
    if($_SESSION['role'] === 'admin') {
        header('Location: admin_dashboard.php');
        exit();
    } elseif($_SESSION['role'] === 'user') {
        header('Location: user_dashboard.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
