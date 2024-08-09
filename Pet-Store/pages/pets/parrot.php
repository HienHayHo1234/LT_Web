<?php
// Khai báo các thông số kết nối cơ sở dữ liệu
$host = "localhost";
$dbname = "pet-store";
$username = "root";
$password = "";

try {
    // Tạo đối tượng PDO để kết nối với cơ sở dữ liệu MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thực hiện truy vấn để lấy tất cả các sản phẩm từ bảng `pets`
    $stmt = $conn->query("SELECT * FROM pets");

    // Lưu kết quả truy vấn vào một mảng
    $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../asset/css/pets.css">
    <link rel="stylesheet" href="../../asset/css/index.css">
    <link rel="icon" type="image/x-icon" href="../../asset/images/logo.ico">
    <title>Parrot</title>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="../index.html">
                    <img src="../../asset/images/icon/logo.png" alt="Logo Cửa Hàng Thú Cưng">
                </a>
            </div>
            <div class="buttons-container">
                <a href="../cart.html">
                    <img class="circle-button" src="../../asset/images/icon/cart.png" alt="Cart">
                </a>
                <a href="../login.html">
                    <img class="circle-button" src="../../asset/images/icon/login.png" alt="Login">
                </a>
            </div>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="../index.html">Trang Chủ</a></li>
            <li class="dropdown">
                <a class="dropdown-btn">Sản Phẩm</a>
                <div class="dropdown-content">
                    <a href="cat.php">Mèo</a>
                    <a href="#dogs">Chó</a>
                    <a href="parrot.php">Vẹt</a>
                </div>
            </li>
            <li><a href="#about">Giới Thiệu</a></li>
            <li><a href="#contact">Liên Hệ</a></li>
            <li><a href="../cart.html">Giỏ hàng</a></li>
            <li><a href="../admin.html">Admin</a></li>
        </ul>
    </nav>

    <main>
        <div class="container">
            <?php if (!empty($pets)): ?>
            <?php foreach ($pets as $pet): ?>
            <img src="../../asset/images/<?php echo htmlspecialchars($pet['urlImg']); ?>"
                alt="<?php echo htmlspecialchars($pet['name']); ?>">
            <div class="row">
                <p class="name-pet"><?php echo htmlspecialchars($pet['name']); ?></p>
                <button class="heart" id="button1">❤</button>
            </div>
            <p class="text-price">Giá: <span
                    class="price"><?php echo number_format($pet['price'], 0, ',', '.'); ?>đ</span> ➱
                <?php echo number_format($pet['priceSale'], 0, ',', '.'); ?>đ</p>
            <button class="button view-detail" id="button2">Xem chi tiết</button>
            <button class="button order" id="button3"
                onclick="addToCart('<?php echo htmlspecialchars($pet['id']); ?>', '<?php echo htmlspecialchars($pet['name']); ?>', <?php echo htmlspecialchars($pet['price']); ?>)">Đặt
                hàng</button>
            <?php endforeach; ?>
            <?php else: ?>
            <p>Chưa có sản phẩm nào.</p>
            <?php endif; ?>
        </div>

    </main>

    <footer>
        <p>&copy; 2024 Cửa Hàng Thú Cưng. Bảo lưu mọi quyền.</p>
    </footer>
</body>

</html>