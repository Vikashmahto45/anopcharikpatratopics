<?php
session_start();
require_once '../config.php';

// Simple authentication settings
// CHANGE THIS PASSWORD FOR PRODUCTION IF DESIRED
$admin_password = 'admin'; 

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

// Redirect to login if not authenticated
function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}
?>
