function loadCart() {
    // Lấy dữ liệu giỏ hàng từ localStorage, mặc định là đối tượng rỗng
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    
    // Chọn thẻ <main> trong HTML
    let mainContainer = document.querySelector('main');
    
    if (mainContainer) {
        // Lặp qua tất cả các mục trong giỏ hàng
        for (let id in cart) {
            let item = cart[id];

            // Tạo div chứa thông tin sản phẩm
            let itemDiv = document.createElement('div');
            itemDiv.className = 'cart-items'; // Thay đổi class nếu cần

            // Thêm thông tin sản phẩm vào div
            itemDiv.innerHTML = `
                <div class="container">
                    <img src="../asset/images/parrot/${id}.jpg" alt="${item.name}">
                    <div class="text">
                        <p class="name-pet">${item.name}</p>
                        <p>Giá: <span class="price">${item.price.toLocaleString()}đ</span> ➱ ${(item.price).toLocaleString()}đ </p>
                        <p class="count">Số lượng: ${item.quantity}</p>
                        <p class="text-price">Tổng số tiền: ${(item.price * item.quantity).toLocaleString()}đ</p>
                    </div>
                    <button class="heart">❤</button>
                    <button class="button cancel" onclick="removeFromCart('${id}')">Hủy đặt hàng</button>
                    <button class="button order" id="button3">Đặt hàng</button>
                </div>
            `;

            // Thêm div sản phẩm vào container giỏ hàng
            mainContainer.appendChild(itemDiv);
        }
    } else {
        console.error('Không tìm thấy thẻ <main> trong trang.');
    }
}

function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    if (cart[id]) {
        if (cart[id].quantity > 1) {
            // Giảm số lượng nếu nhiều hơn 1
            cart[id].quantity -= 1;
        } else {
            // Xóa mặt hàng khỏi giỏ hàng nếu số lượng là 1
            delete cart[id];
        }

        // Cập nhật giỏ hàng trong localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        // Tải lại giỏ hàng trên giao diện sau khi xóa
        loadCart();
    } else {
        alert('Sản phẩm không có trong giỏ hàng');
    }
}

// Gọi loadCart để hiển thị giỏ hàng khi trang được tải
document.addEventListener('DOMContentLoaded', loadCart);
