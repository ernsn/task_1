<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Kullanıcı Yönetim</h2>

    <button id="addUserBtn" class="btn btn-success mb-3">Yeni Kullanıcı</button>
    
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>İsim</th>
            <th>Soyisim</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Eylemler</th>
        </tr>
        </thead>
        <tbody id="userTable"></tbody>
    </table>
</div>

<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Yeni Kullanıcı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="userForm">
                <div class="modal-body">
                    <input type="hidden" id="userId">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Soyisim</label>
                        <input type="text" class="form-control" id="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    loadUsers();

    $('#addUserBtn').click(function() {
        $('#userModalLabel').text('Add User');
        $('#userForm')[0].reset();
        $('#userId').val('');
        $('#userModal').modal('show');
    });

    $('#userForm').submit(function(e) {
        e.preventDefault();
        let userData = {
            user_id: $('#userId').val(),
            first_name: $('#firstName').val(),
            last_name: $('#lastName').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            password: $('#password').val()
        };
        let actionUrl = userData.user_id ? 'update_user.php' : 'add_user.php';

        $.post(actionUrl, userData, function(response) {
            $('#userModal').modal('hide');
            loadUsers();
        });
    });

    $(document).on('click', '.edit-btn', function() {
        let id = $(this).data('id');
        $.get('get_user.php', { user_id: id }, function(data) {
            let user = JSON.parse(data);
            $('#userModalLabel').text('Edit User');
            $('#userId').val(user.user_id);
            $('#firstName').val(user.first_name);
            $('#lastName').val(user.last_name);
            $('#email').val(user.email);
            $('#phone').val(user.phone);
            $('#password').val('');
            $('#userModal').modal('show');
        });
    });

    $(document).on('click', '.delete-btn', function() {
        if (confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')) {
            let id = $(this).data('id');
            $.post('delete_user.php', { user_id: id }, function() {
                loadUsers();
            });
        }
    });

    function loadUsers() {
        $.get('list_users.php', function(data) {
            $('#userTable').html(data);
        });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
