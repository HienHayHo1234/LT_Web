
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>
        <div class="logo-container">
            <a href="index.php?page=start">
                <img src="../asset/images/icon/logo.png" alt="Logo Cửa Hàng Thú Cưng">
            </a>
        </div>

<body>
    <form action="Version.php" method="post" class="container">
        <label for="username">User Name:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <div>
            <label><input name="status" type="checkbox"> Remember me</label>
        </div>
        <hr>
        <div>
            <input type="submit" value="Login">
        </div>
        <br>
        <p>Hoặc</p><br>
        <p>Chưa có tài khoản?<a href="register.php">Đăng ký</a></p>
    </form>
    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            if (username === '' || password === '') {
                alert('Please fill out both fields.');
                return false;
            }
            return true;
        }

        document.querySelector('form').onsubmit = function() {
            return validateForm();
        };
    </script>
</body>
<script src="../asset/js/load.js"></script>
</html>