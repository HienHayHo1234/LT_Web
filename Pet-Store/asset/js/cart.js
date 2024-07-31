// giohang.js

function loadCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    let cartItemsContainer = document.getElementById('cart-items');

    cartItemsContainer.innerHTML = '';

    for (let id in cart) {
        let item = cart[id];
        let itemDiv = document.createElement('div');
        itemDiv.className = 'container';

        itemDiv.innerHTML = `
            <img src="../asset/images/vet/${id}.jpg" alt="${item.name}">
            <div class="text">
                <p class="name-pet">${item.name}</p>
                <p>Giá: <span class="price">${item.price.toLocaleString()}đ</span> ➱ ${(item.price * item.quantity).toLocaleString()}đ </p>
                <p class="count">Số lượng: ${item.quantity}</p>
                <p class="text-price">Tổng số tiền: ${(item.price * item.quantity).toLocaleString()}đ</p>
            </div>
            <button class="heart">❤</button>
            <button class="button order">Đặt hàng</button>
        `;

        cartItemsContainer.appendChild(itemDiv);
    }
}

window.onload = loadCart;
