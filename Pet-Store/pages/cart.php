<?php
require '../config/config.php';

session_start();

// Giả sử user_id là 1, bạn có thể thay đổi theo hệ thống của bạn
$user_id = 1;

// Kiểm tra kết nối có tồn tại hay không
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại.");
}

try {
    // Truy vấn các mặt hàng trong giỏ hàng của người dùng
    $stmt = $conn->prepare("
        SELECT pets.id, pets.name, pets.price, pets.priceSale, pets.urlImg, cart_items.quantity 
        FROM cart_items 
        JOIN pets ON cart_items.pet_id = pets.id 
        WHERE cart_items.user_id = ?
    ");
    $stmt->execute([$user_id]);
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($cartItems === false) {
        throw new Exception("Không thể truy xuất giỏ hàng.");
    }

    // Cập nhật phiên với thông tin giỏ hàng
    $_SESSION['cart-items'] = $cartItems;

    // Tính tổng số tiền
    $totalAmount = 0;
    if (!empty($cartItems)) {
        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
    }
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
    exit;
}

?>

<link rel="stylesheet" href="../asset/css/cart.css">

<div class="cart-grid">
    <?php if (!empty($cartItems)): ?>
    <?php foreach ($cartItems as $item): ?>
    <div class="container-cart">
        <!-- Sử dụng PHP để tạo HTML động với các giá trị từ cơ sở dữ liệu -->
        <img class="imgCart" src="<?php echo htmlspecialchars($item['urlImg']); ?>"
            alt="<?php echo htmlspecialchars($item['name']); ?>">
        <div class="text">
            <p class="name-pet"><?php echo htmlspecialchars($item['name']); ?></p>
            <p>Giá: <span class="price"><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</span> ➱
                <?php echo number_format($item['priceSale'], 0, ',', '.'); ?>đ</p>
            <p class="count">Số lượng: <?php echo htmlspecialchars($item['quantity']); ?></p>
            <p class="text-price">Tổng số tiền:
                <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>đ</p>
        </div>
        <button class="heart-cart">❤</button>
        <button class="button cancel" onclick="removeFromCart('<?php echo htmlspecialchars($item['id']); ?>')">Hủy đặt
            hàng</button>
        <button class="button order" id="button<?php echo htmlspecialchars($item['id']); ?>">Đặt hàng</button>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p>Giỏ hàng trống!</p>
    <?php endif; ?>
</div>