<?php
require 'db.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    $stmt = $pdo->prepare("SELECT user_id, first_name, last_name, email, phone FROM users WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode($user);
    } else {
        echo json_encode(["message" => "Kullanıcı bulunamadı."]);
    }
}
?>