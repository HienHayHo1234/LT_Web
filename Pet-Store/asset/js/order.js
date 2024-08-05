function addToCart(id, name, price) {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    let petData = JSON.parse(localStorage.getItem(id));

    // Kiểm tra xem sản phẩm có tồn tại trong localStorage không
    if (petData) {
        // So sánh số lượng trong giỏ hàng với số lượng có sẵn
        if (cart[id] && cart[id].quantity >= petData.quantity) {
            alert('Sản phẩm đã hết hàng.');
            return; // Không thêm vào giỏ hàng nữa
        }

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
    } else {
        alert('Sản phẩm không tồn tại.');
    }
}
