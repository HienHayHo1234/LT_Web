<?php
require '../config/config.php';


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

<link rel="stylesheet" href="../asset/css/cart.css?v=<?php echo time(); ?>">

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
                <button class="button order" id="button<?php echo htmlspecialchars($item['id']); ?>"
                    onclick="showOrderForm('<?php echo htmlspecialchars($item['id']); ?>')">Đặt hàng</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Giỏ hàng trống!</p>
    <?php endif; ?>
</div>

<div class="cart-form" id="orderForm" style="display: none">
    <p class="text-chat">HÃY ĐIỀN THÔNG TIN GIAO HÀNG</p>
    <img class="img-note" src="../asset/images/background/background-cart.png" alt="">

    <img onclick="btnClose()" class="btn-close" src="../asset/images/icon/close.png" alt="">

    <form action="" method="post" class="order-form">
        <h2>Đặt hàng sản phẩm</h2>

        <input type="hidden" id="productId" name="productId">

        <label for="name">Tên của bạn:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Địa chỉ giao hàng:</label>
        <input type="text" id="address" name="address" required>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="size">Chọn độ tuổi:</label>
        <div class="btnS">
            <!-- uống sữa -->
            <img class="btn-stage" src="../asset/images/parrot/macaw-parrot-2.jpg" alt="">
            <!-- mở mắt -->
            <img class="btn-stage" src="../asset/images/parrot/macaw-parrot-2.jpg" alt="">
            <!-- trưởng thành -->
            <img class="btn-stage" src="../asset/images/parrot/macaw-parrot-2.jpg" alt="">
        </div>

        <label for="gender">Chọn giới tính thú cưng:</label>
        <select id="gender" name="gender" required>
            <option value="">Chọn giới tính</option>
            <option value="male">Nam</option>
            <option value="female">Nữ</option>
        </select>

        <button type="submit">Đặt hàng</button>
    </form>
</div>

<script>
    function showOrderForm(productId) {
        // Hiển thị form đặt hàng
        var orderForm = document.getElementById('orderForm');
        orderForm.style.display = '';
        // Gán giá trị productId vào hidden input
        document.getElementById('productId').value = productId;
        // Cuộn trang đến form đặt hàng
        orderForm.scrollIntoView({
            behavior: 'smooth'
        });
    }

    function btnClose() {
        var orderForm = document.getElementById('orderForm');
        orderForm.style.display = 'none';
    }
</script>