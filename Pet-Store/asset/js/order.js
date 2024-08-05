// Nút đặt hàng
function addToCart(id, name, price) {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};

    if (cart[id]) {
        cart[id].quantity += 1;
    } else {
        cart[id] = {
            name: name,
            price: price,
            quantity: 1
        };
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}
