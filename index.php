<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Giriş Ekranı</h2>
    <form action="login.php" method="POST">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            <label>Email adresi</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <label>Şifre</label>
        </div>
        <button type="submit" class="btn btn-primary">Giriş</button>
        <a href="register.html" class="btn btn-warning">Kayıt Ol</a>
        <a href="reset_password.html" class="btn btn-secondary">Şifre Yenileme</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>