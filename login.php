<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
    if (!$stmt->execute()) {
        print_r($stmt->errorInfo());
    }    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        header("Location: dashboard.php");
        exit;
    } else {
        
        echo '<script>alert("Email veya şifreniz hatalı.")<script>';
    }
}


?>