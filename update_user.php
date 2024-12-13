<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone" . ($password ? ", password = :password" : "") . " WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    
    $params = [
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':email' => $email,
        ':phone' => $phone,
        ':user_id' => $userId
    ];
    
    if ($password) {
        $params[':password'] = $password;
    }

    $stmt->execute($params);
    echo "Kullanıcı güncellendi.";
}
?>