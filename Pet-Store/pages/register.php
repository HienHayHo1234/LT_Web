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
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Vui lòng nhập đầy đủ thông tin.";
    } elseif ($password !== $confirmPassword) {
        echo "Mật khẩu xác nhận không khớp.";
    } else {
        // Kiểm tra nếu người dùng đã tồn tại
        $checkUser = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $checkUser->bindParam(':username', $username);
        $checkUser->bindParam(':email', $email);
        $checkUser->execute();

        if ($checkUser->rowCount() > 0) {
            echo "Tài khoản hoặc email đã tồn tại. Vui lòng <a href='index.php'>đăng nhập</a>.";
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
                header("Location: index.php");
                exit();
            } else {
                echo "Đã xảy ra lỗi khi đăng ký.";
            }
        }
    }
}
?>
