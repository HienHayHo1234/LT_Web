<?php
// Khai báo các thông số kết nối cơ sở dữ liệu
$host = "localhost";
$dbname = "pet-store";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Xử lý form đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Vui lòng nhập đầy đủ thông tin.";
    } elseif ($password !== $confirmPassword) {
        echo "Mật khẩu xác nhận không khớp.";
    } else {
        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thêm người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            echo "Đăng ký thành công!";
        } else {
            echo "Đã xảy ra lỗi khi đăng ký.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form with Buttons and Logo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../asset/css/register.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <label for="usename">User Name</label>
        <input type="text" id="usename"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email"><br>
        <label for="password">Password</label><br>
        <input type="text" id="password"><br>
        <label for="confirmPassword">Confirm Password</label><br>
        <input type="text" id="confirmPassword"><br>
        <div class="button-container">
            <button onclick="validateForm()">Submit</button>
            <button onclick="clearForm()">Clear</button>
        </div>
        <p>Or</p>
        <a href="index.html"><img src="../asset/images/icon/logo.png" alt="Logo"></a>
    </div>
</body>

</html>