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
    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Kiểm tra nếu petId đã có trong giỏ hàng
    if (!cartItems.includes(petId)) {
        // Thêm petId vào mảng cartItems
        cartItems.push(petId);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));

        // Cập nhật giao diện giỏ hàng
        updateCartDisplay();

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../config/order.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Cập nhật số lượng trong localStorage
                localStorage.setItem('cartCount', cartCount + 1);
            }
        };

        xhr.send("action=add&pet_id=" + encodeURIComponent(petId));
    }
}

// Hàm xóa sản phẩm khỏi giỏ hàng
function removeFromCart(petId) {
    var cartCount = parseInt(localStorage.getItem('cartCount')) || 0;
    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Xóa petId khỏi mảng cartItems
    var index = cartItems.indexOf(petId);
    if (index > -1) {
        cartItems.splice(index, 1);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    // Cập nhật giao diện giỏ hàng
    updateCartDisplay();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../config/order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Kiểm tra phản hồi từ máy chủ để xác định xem sản phẩm đã bị xóa thành công chưa
            console.log(xhr.responseText);
            if (cartCount > 0) {
                localStorage.setItem('cartCount', cartCount - 1);
            }

            // Làm mới lại trang để cập nhật giao diện giỏ hàng
            location.reload();
        }
    };

    xhr.send("action=remove&pet_id=" + encodeURIComponent(petId));
}

// Gọi hàm để cập nhật giao diện khi tải trang
document.addEventListener('DOMContentLoaded', updateCartDisplay);