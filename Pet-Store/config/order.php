<?php
require 'config.php';

// Giả sử user_id là 1, bạn có thể thay đổi theo hệ thống của bạn
$user_id = 1;

// Lấy pet_id từ POST request
if (isset($_POST['action']) && isset($_POST['pet_id'])) {
    $action = $_POST['action'];
    $pet_id = $_POST['pet_id'];

    if ($action === 'add') {
        // Thêm sản phẩm vào giỏ hàng
        addToCart($user_id, $pet_id, 1, $conn);
        echo "Sản phẩm đã được thêm vào giỏ hàng!";
    } elseif ($action === 'remove') {
        // Xóa sản phẩm khỏi giỏ hàng
        removeFromCart($user_id, $pet_id, $conn);
        echo "Sản phẩm đã được xóa khỏi giỏ hàng!";
    } else {
        echo "Hành động không hợp lệ!";
    }
} else {
    echo "Thiếu thông tin cần thiết!";
}

function addToCart($user_id, $pet_id, $quantity = 1, $conn)
{
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $stmt = $conn->prepare("SELECT id, quantity FROM cart_items WHERE user_id = ? AND pet_id = ?");
    $stmt->execute([$user_id, $pet_id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        // Nếu sản phẩm đã có trong giỏ, cập nhật số lượng
        $new_quantity = $item['quantity'] + $quantity;
        $stmt = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
        $stmt->execute([$new_quantity, $item['id']]);
    } else {
        // Nếu sản phẩm chưa có trong giỏ, thêm mới
        $stmt = $conn->prepare("INSERT INTO cart_items (user_id, pet_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $pet_id, $quantity]);
    }
}

function removeFromCart($user_id, $pet_id, $conn)
{
    // Xóa sản phẩm khỏi giỏ hàng
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE user_id = ? AND pet_id = ?");
    $stmt->execute([$user_id, $pet_id]);
}