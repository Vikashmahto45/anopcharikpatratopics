<?php
require_once 'auth.php';
require_login();
require_once '../includes/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: index.php?msg=Post+deleted+successfully');
        exit;
    } catch (PDOException $e) {
        die("Error deleting post: " . $e->getMessage());
    }
} else {
    header('Location: index.php');
}
?>
