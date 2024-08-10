// Hàm để cập nhật giỏ hàng và hiển thị
function updateCartDisplay() {
    var cartCount = parseInt(localStorage.getItem('cartCount')) || 0;
    var cartIcon = document.querySelector('.nav-cart img');

    if (cartCount > 0) {
        // Hiển thị ảnh thông báo giỏ hàng có sản phẩm
        if (!cartIcon) {
            cartIcon = document.createElement('img');
            cartIcon.className = 'new-icon-cart';
            cartIcon.src = '../asset/images/icon/new-cart.png';
            document.querySelector('.nav-cart').appendChild(cartIcon);
        }
    } else {
        // Ẩn hoặc xóa ảnh thông báo giỏ hàng không có sản phẩm
        if (cartIcon) {
            cartIcon.remove();
        }
    }
}

// Hàm thêm sản phẩm vào giỏ hàng
function addToPet(petId) {
    var cartCount = parseInt(localStorage.getItem('cartCount')) || 0;
    localStorage.setItem('cartCount', cartCount + 1);

    // Cập nhật giao diện giỏ hàng
    updateCartDisplay();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../config/order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Có thể thêm mã xử lý khác nếu cần
        }
    };

    xhr.send("action=add&pet_id=" + encodeURIComponent(petId));
}

// Hàm xóa sản phẩm khỏi giỏ hàng
function removeFromCart(petId) {
    var cartCount = parseInt(localStorage.getItem('cartCount')) || 0;

    if (cartCount > 0) {
        localStorage.setItem('cartCount', cartCount - 1);
    }

    // Cập nhật giao diện giỏ hàng
    updateCartDisplay();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../config/order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Có thể thêm mã xử lý khác nếu cần
        }
    };

    xhr.send("action=remove&pet_id=" + encodeURIComponent(petId));
}

// Gọi hàm để cập nhật giao diện khi tải trang
document.addEventListener('DOMContentLoaded', updateCartDisplay);
