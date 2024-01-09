<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('location: login.php');
} else if ($_SESSION['user']['type'] != "user" && $_SESSION['user']['type'] == "admin") {
    header('location: admin_home.php');
}
?>