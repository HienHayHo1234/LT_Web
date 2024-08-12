// Hàm để cập nhật giỏ hàng và hiển thị
function updateCartDisplay() {
        // Hiển thị ảnh thông báo giỏ hàng có sản phẩm
        if (!cartIcon) {
            cartIcon = document.createElement('img');
            cartIcon.className = 'new-icon-cart';
            cartIcon.src = '../asset/images/icon/new-cart.png';
            document.querySelector('.nav-cart').appendChild(cartIcon);
        }
        // Ẩn hoặc xóa ảnh thông báo giỏ hàng không có sản phẩm
        if (cartIcon) {
            cartIcon.remove();
        }
}
// Hàm thêm sản phẩm vào giỏ hàng
function addToPet(petId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../config/order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Debugging
        }
    };

    xhr.send("action=add&pet_id=" + encodeURIComponent(petId));
}


// Hàm xóa sản phẩm khỏi giỏ hàng
function removeFromCart(petId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../config/order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Kiểm tra phản hồi từ máy chủ để xác định xem sản phẩm đã bị xóa thành công chưa
            console.log(xhr.responseText);
        }
    };

    xhr.send("action=remove&pet_id=" + encodeURIComponent(petId));
}

// Gọi hàm để cập nhật giao diện khi tải trang
document.addEventListener('DOMContentLoaded', updateCartDisplay);