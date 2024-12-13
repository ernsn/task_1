<?php
require 'db.php';

$stmt = $pdo->prepare("SELECT user_id, first_name, last_name, email, phone FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo "<tr>
            <td>{$user['user_id']}</td>
            <td>{$user['first_name']}</td>
            <td>{$user['last_name']}</td>
            <td>{$user['email']}</td>
            <td>{$user['phone']}</td>
            <td>
                <button class='btn btn-warning edit-btn' data-id='{$user['user_id']}'>Düzenle</button>
                <button class='btn btn-danger delete-btn' data-id='{$user['user_id']}'>Sil</button>
            </td>
          </tr>";
}
?>