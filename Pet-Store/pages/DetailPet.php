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

    // Lấy id sản phẩm từ URL
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Thực hiện truy vấn để lấy chi tiết sản phẩm theo id
    $stmt = $conn->prepare("SELECT * FROM pets WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Lưu kết quả truy vấn vào một mảng
    $pet = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="DetailPet.css"> <!-- Thay đường dẫn theo ý bạn -->
</head>
<body>
    <div class="product-detail-container">
        <?php if (!empty($pet)): ?>
            <img src="<?php echo htmlspecialchars($pet['urlImg']); ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>" class="detail-img">
            <h1><?php echo htmlspecialchars($pet['name']); ?></h1>
            <p><?php echo htmlspecialchars($pet['description']); ?></p>
            <p class="text-price">Giá: <span class="price"><?php echo number_format($pet['price'], 0, ',', '.'); ?>đ</span></p>
            <p class="text-price-sale">Giá khuyến mãi: <span class="price-sale"><?php echo number_format($pet['priceSale'], 0, ',', '.'); ?>đ</span></p>
            <button class="button order" onclick="addToCart('<?php echo htmlspecialchars($pet['id']); ?>', '<?php echo htmlspecialchars($pet['name']); ?>', <?php echo htmlspecialchars($pet['price']); ?>)">Đặt hàng</button>
        <?php else: ?>
            <p>Không tìm thấy sản phẩm.</p>
        <?php endif; ?>
    </div>
</body>
</html>
