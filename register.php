<?php
require 'db.php';

if (isset($_POST['register'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (:first_name, :last_name, :email, :phone, :password)");
    $stmt->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':email' => $email,
        ':phone' => $phone,
        ':password' => $password
    ]);
    header("Location: index.php?message=success");
    exit;
}
?>