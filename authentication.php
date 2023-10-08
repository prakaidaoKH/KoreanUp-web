<?php
session_start();

if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true) {
    header("location: login.php");
    exit;
}
?>