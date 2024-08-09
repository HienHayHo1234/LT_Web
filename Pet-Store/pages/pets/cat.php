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

    // Thực hiện truy vấn để lấy tất cả các sản phẩm thuộc danh mục 'parrot'
    $stmt = $conn->prepare("SELECT * FROM pets WHERE idLoai = :idLoai");
    $stmt->bindParam(':idLoai', $idLoai);
    $idLoai = 'cat'; // Danh mục cần lọc
    $stmt->execute();

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
    <link rel="stylesheet" href="../../asset/css/search.css">

    <link rel="icon" type="image/x-icon" href="../../asset/images/logo.ico">
    <title>Parrot</title>
</head>

<body>
    <header>    
        <div data-include-html="../../Includes/header.html"></div>
    </header>

    <main>
        <?php if (!empty($pets)): ?>
            <?php foreach ($pets as $pet): ?>
                <div class="container">
                    <img src="../<?php echo htmlspecialchars($pet['urlImg']); ?>"
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
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chưa có sản phẩm nào.</p>
        <?php endif; ?>
    </main>

    <script src="../../asset/js/load.js"></script>

    <footer>
        <div data-include-html="../../Includes/footer.html"></div>
    </footer>
</body>
</html>