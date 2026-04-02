<?php
require 'config.php';
$sql = 'SELECT id, slug, title, LENGTH(content) as len FROM posts WHERE id > 10 AND LENGTH(content) < 1000 ORDER BY id ASC LIMIT 10';
$stmt = $pdo->query($sql);
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']} | Slug: {$row['slug']} | Title: {$row['title']} | Len: {$row['len']}\n";
}
?>
