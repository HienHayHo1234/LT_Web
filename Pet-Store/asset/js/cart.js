function loadCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    let cartItemsContainer = document.getElementById('cart-items');

    cartItemsContainer.innerHTML = '';

    for (let id in cart) {
        let item = cart[id];
        let itemDiv = document.createElement('div');
        itemDiv.className = 'container';

        itemDiv.innerHTML = `
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
        `;

        cartItemsContainer.appendChild(itemDiv);
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
        loadCart(); // Cập nhật lại giỏ hàng trên giao diện sau khi xóa
    } else {
        alert('Sản phẩm không có trong giỏ hàng');
    }
}

// Gọi loadCart để hiển thị giỏ hàng khi trang được tải
document.addEventListener('DOMContentLoaded', loadCart);
