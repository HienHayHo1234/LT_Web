<!-- DetailPet.php -->

<?php
// Kết nối cơ sở dữ liệu
$host = "localhost";
$dbname = "pet-store";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy id sản phẩm từ URL
    $petId = isset($_GET['id']) ? $_GET['id'] : '';

    // Thực hiện truy vấn để lấy chi tiết sản phẩm
        $stmt = $conn->prepare("SELECT * FROM pets WHERE id = :id");
        $stmt->bindParam(':id', $petId);
        $stmt->execute();

    // Lưu kết quả truy vấn
    $pet = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<link rel="stylesheet" href="../asset/css/DetailPet.css">

<div id="product-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        
        <div class="container">
            <img src="<?php echo htmlspecialchars($pet['urlImg']); ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>">
            <div class="container">
        <img src="<?php echo htmlspecialchars($pet['urlImg']); ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>">
        <div class="details">
            <h2><?php echo htmlspecialchars($pet['name']); ?></h2>
            <p>Giá: <span class="price"><?php echo number_format($pet['price'], 0, ',', '.'); ?>đ</span></p>
            <p class="text-price">Giá gốc: <span class="price"><?php echo number_format($pet['price'], 0, ',', '.'); ?>đ</span>
            ➱ Giá khuyến mãi: <span class="sale-price"><?php echo number_format($pet['priceSale'], 0, ',', '.'); ?>đ</span></p>
            <p class="text-quantity">Số lượng còn lại: <span class="quantity"><?php echo $pet['quantity']; ?></span></p>
            <p>Mô tả: <?php echo htmlspecialchars($pet['description']); ?></p>
            <button onclick="cart(<?php echo htmlspecialchars($pet['id']); ?>)">Thêm vào giỏ hàng</button>
            <button onclick="cart(<?php echo htmlspecialchars($pet['id']); ?>)">Mua</button>
        </div>
    </div>
        </div>
    </div>       
</div>
