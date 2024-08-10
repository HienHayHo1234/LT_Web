<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/css/login.css">
</head>
<header>
    <div class="header-container">

        <div class="logo-container">
            <a href="index.html">
                <img src="../asset/images/icon/logo.png" alt="Logo Cửa Hàng Thú Cưng">
            </a>
        </div>

        <div class="buttons-container">
            <a href="cart.html">
                <img class="circle-button" src="../asset/images/icon/cart.png" alt="Cart">
            </a>
            <a href="login.html">
                <img class="circle-button" src="../asset/images/icon/login.png" alt="Login">
            </a>
        </div>

    </div>
</header>

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
        <p>Chưa có tài khoản?<a href="register.html">Đăng ký</a></p>
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