<?php
require 'config.php';
$stmt = $pdo->query('DESCRIBE posts');
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}
?>
