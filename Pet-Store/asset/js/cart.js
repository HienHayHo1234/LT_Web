// Hàm thêm sản phẩm vào giỏ hàng
function addToPet(petId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../config/order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
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
            location.reload();
        }
    };

    xhr.send("action=remove&pet_id=" + encodeURIComponent(petId));
}
// nút cộng trừ
document.addEventListener('DOMContentLoaded', function() {
    const minusButtons = document.querySelectorAll('.quantity-btn.minus');
    const plusButtons = document.querySelectorAll('.quantity-btn.plus');

    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const quantitySpan = this.nextElementSibling;
            let quantity = parseInt(quantitySpan.textContent, 10);

            if (quantity > 1) {
                quantity--;
                quantitySpan.textContent = quantity;
                updateQuantity(itemId, quantity);
            }
        });
    });

    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const quantitySpan = this.previousElementSibling;
            let quantity = parseInt(quantitySpan.textContent, 10);

            quantity++;
            quantitySpan.textContent = quantity;
            updateQuantity(itemId, quantity);
        });
    });

    function updateQuantity(itemId, quantity) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../config/update-quantity.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`id=${itemId}&quantity=${quantity}`);
        
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Cập nhật tổng số tiền
                    document.getElementById('totalAmount').textContent = response.totalAmount;
                    location.reload();
                } else {
                    alert('Lỗi: ' + response.message);
                }
            }
        };
    }
});
