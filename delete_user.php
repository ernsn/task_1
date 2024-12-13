<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];

    $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $userId]);

    echo "Kullanıcı silindi.";
}
?>