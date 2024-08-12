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
